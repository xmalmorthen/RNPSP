$(function() {
    var statusIDBInterval = setInterval(function(){
        if (iDB.status) {
            clearInterval(statusIDBInterval);
            statusIDBInterval = null;
            mainTabMenu.fireInit();
        }
    }, 300);
});

var mainTabMenu = {
    var : {
        pID_ALTERNA : null
    },
    fireInit : function(){
        $('._container.d-none').removeClass('d-none');

        if (formMode.length == 0)
            window.location.href = base_url + 'Error/setError?err=No se especificó el modo del formulario!!!';

        dynTabs.mode = formMode;

        //CAMBIO DE TABS
        //MAIN TAB
        $('#mainContainerTab a[data-toggle="tab"]').on('show.bs.tab',mainTabMenu.tab.change);
        $('#mainContainerTab a[data-toggle="tab"]').on('shown.bs.tab',function() {dynTabs.loaderTab()});
        $('#mainContainerTab a[data-toggle="tab"]').on('shown.bs.tab',mainTabMenu.actions.tableResponsive);
        

        var linkRefHash = MyCookie.tabRef.get(dynTabs.mode + 'MainTab');
        if (!linkRefHash){
            linkRefHash = $('#mainContainerTab .nav-item a.nav-link.active')[0].id;
            MyCookie.tabRef.save(dynTabs.mode + 'MainTab',linkRefHash);
        }
        var linkRef = $('#' + linkRefHash);

        mainTabMenu.actions.init(
            linkRef.attr('aria-controls'),
            function(){
                linkRef.trigger('click');
            }
        );

        switch (formMode) {
            case 'edit':
                mainFormActions.populateData(id);
            break;
            case 'add' : 
                mainTabMenu.mainInit();
            break;
        }

        $('.btnSiguienteAnterior').on('click',function(e){
            e.preventDefault();
            var tab = $(this).data('nexttab'); 
            $(tab).tab('show');
        })

        $('.endTab').on('click',function(e){
            var nextTab = $('#mainContainerTab li.nav-item a.nav-link.active').closest('li').next('li.nav-item').find('a.nav-link');
            nextTab.tab('show'); 
        });

        $('form').on('reset', function(e){
            $(this).find('select').val(null).trigger('change.select2').trigger('change');
        });

    },
    tab : {
        change : function(e){
            var tabRef = $(e.currentTarget),
                forms = $('#myTabContent>.tab-pane.show.active form'),
                allFormsSaved = true;


            forms.each(function( index ) {
                if ( $(this).data('hasSaved') != true ) {
                    allFormsSaved = false;
                    return false;
                }
            });

            $(e.relatedTarget).data('finish',allFormsSaved);

            // TODO: Xmal - Quitar comentarios en bloque para implementación
            // if (!$(tabRef).data('finish')){
            //     e.preventDefault();
            //     Swal.fire({ type: 'warning', title: 'Aviso', html: 'Debe completar y guardar la información de las pestañas que actualmente se muestran.' });
            //     return null;
            // }

            mainTabMenu.actions.init(tabRef.attr('aria-controls'));
            MyCookie.tabRef.save(dynTabs.mode + 'MainTab',tabRef.attr('id'));
        }
    },
    actions : {
        inited : false,
        init : function(tabRef, callback){
            mainTabMenu.actions.inited = false;

            // dynTabs.validForm = formMode != 'edit' ? true : false;

            switch (tabRef) {
                case 'datosGenerales':
                    objViewDatosGenerales.init(function(){
                        dynTabs.validForm = true; 
                        mainTabMenu.actions.inited = true;                         
                    });
                break;
                case 'Laboral':
                    objViewLaboral.init(function(){
                        if (dynTabs.mode == 'edit' && !objViewLaboral.vars.general.init) { 
                            fillData.laboral.all();
                        }

                        dynTabs.validForm = true; 
                        mainTabMenu.actions.inited = true;
                    });
                break;
                case 'Capacitacion':
                    objViewCapacitacion.init(function(){ 
                        if (dynTabs.mode == 'edit' && !objViewCapacitacion.vars.general.init) { 
                            fillData.capacitacion.all();
                        }

                        dynTabs.validForm = true; 
                        mainTabMenu.actions.inited = true;
                    });
                break;
                case 'Identificacion':
                    objViewIdentificacion.init(function(){ dynTabs.validForm = true; mainTabMenu.actions.inited = true;});
                break;
            }
            if (callback) {
                if ($.isFunction( callback )) {
                    callback();
                    var initInterval = setInterval(function(){
                        if (mainTabMenu.actions.inited) {
                            clearInterval(initInterval);
                            callback();
                        }
                    }, 100);
                }
            }
        },
        changeTab : function(){
            var linkRefHash = MyCookie.tabRef.get(dynTabs.mode + 'ChildTab');
            if (!linkRefHash){
                linkRefHash = $('#myTabContent .tab-pane.active .nav-item a.nav-link.active')[0].id;
                MyCookie.tabRef.save(dynTabs.mode + 'ChildTab',linkRefHash);
            }
            var linkRef = $('#' + linkRefHash);
            linkRef.trigger('click');
        },
        tableResponsive : function(){
            if ($.isFunction(objViewDatosGenerales.events.change.tableResponsive))
                objViewDatosGenerales.events.change.tableResponsive();
            if ($.isFunction(objViewLaboral.events.change.tableResponsive))
                objViewLaboral.events.change.tableResponsive();
            if ($.isFunction(objViewCapacitacion.events.change.tableResponsive))
                objViewCapacitacion.events.change.tableResponsive();
            if ($.isFunction(objViewIdentificacion.events.change.tableResponsive))
                objViewIdentificacion.events.change.tableResponsive();
        }
    },
    mainInit : function(){
        Swal.fire({
            title: 'Clave CURP',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
            showLoaderOnConfirm: true,
            preConfirm: (CURP) => {
                try {
                    if (CURP.length < 18 || CURP.length > 20)
                        throw new Error('Formato de CURP incorrecto');

                    var callUrl = base_url + `Solicitud/ajaxGetSolicitudByCURP`;

                    return new Promise(function (resolve, reject) {
                        $.get(callUrl,{
                            CURP : CURP
                        },
                        function (data) {
                            resolve(data);
                        }).fail(function (err) {                    
                            reject(err);
                        });
                    }).then(function (data) {
                        if (data.results.status == 0) {
                            return new Promise(function (resolve,reject){
                                callUrl = base_url + `ajaxAPIs/curp`;
                                $.get(callUrl,{
                                    model : {CURP : CURP }
                                },
                                function (data) {
                                    resolve(data);
                                }).fail(function (err) {                    
                                    reject(err);
                                });
                                
                            }).then(function(data){
                                return {from:'query', data: data[0]};
                            });
                        } else if (data.results.status == 1) {
                            return {from:'bd', data: data};
                        } else {
                            throw new Error(data.results.message);
                        }                        
                    }).catch(function(err){
                        Swal.showValidationMessage(err.statusText ? err.statusText : err.message);
                    });
                } catch (error) {
                    Swal.showValidationMessage(error);
                }
            },
            allowOutsideClick: false,
            onBeforeOpen: () => {  
                $('.swal2-container').css('z-index','2000');
                $('.swal2-container').data('preserve',true).data('preserveCall','mainTabMenu.mainInit');
            }
        }).then((result) => {
            if ( typeof result.dismiss !== 'undefined') {
                window.location.href = base_url + 'Solicitud';
            }else {
                if (result.value.from == 'query')
                    mainFormActions.populateCURPFields(result.value.data);
                else
                    mainFormActions.fillData(result.value.data);
            }
        });
    }
}

var mainFormActions = {
    populateCURPFields : function (data) {
        objViewDatosGenerales.actions.populateCURPData(data);
    },
    populateData : function(idRef){
        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
        var callUrl = base_url + 'Solicitud/ajaxGetSolicitudById';

        return new Promise(function (resolve, reject) {
            $.get(callUrl,{
                idRef : idRef
            },
            function (data) {
                resolve(data);
            }).fail(function (err) {                    
                reject(err);
            });
        }).then(function (data) {
            if (data.results) {
                mainFormActions.fillData(response.results);
            } else
                throw new Error('No se encontró información');
        }).catch(function(err){
            $.LoadingOverlay("hide");
            Swal.fire({ type: 'error', title: 'Error', html: err.statusText ? err.statusText : err.message})
            .then(() => {
                window.location.href = base_url + 'Solicitud';
            });
        });        
    },
    fillData : function(data){
        data = data.results.data;

        mainTabMenu.var.pID_ALTERNA = data.pID_ALTERNA;

        fillData.datosGenerales.all(data);

        $('.consultaCURP').readOnly();
        dynTabs.mode = 'edit';
        
        dynTabs.loaderTab();
    },
    insertValueInSelect : function(ref,value){

        if (ref.length > 0 && value){
            $objTypeOf = ref[0].tagName.toLowerCase();            

            switch ($objTypeOf) {
                case 'input':
                    $type = ref.attr('type').toLowerCase();
                    switch ($type) {
                        case 'text':
                        case 'password':
                        case 'date':
                        case 'email':
                        case 'hidden':
                        case 'numeric':
                            ref.val(value);
                        break;                        
                    }
                break;
                case 'select':                
                    if (ref.find('option:enabled').size() == 0)
                        ref.data('insert', value);
                    else {                
                        ref.val(value);
                        ref.trigger('change.select2').trigger('change');
                    }
                break;                                    
                default:
                break;
            }            
        }
    }
}

var fillData = {
    genericPromise : function(callUrl,model){
        return new Promise ( (resolve, reject) => {
            generic.ajax.async.get(callUrl,model, 
                //success
                function(data){
                    if (data)
                        if (data.results)
                            if (data.results.status) {
                                resolve(data.results.data);
                                return true;
                            }
                    
                    resolve(null);
                },
                //error
                function(err){
                    reject(err);
                }
            );
        });
    },
    datosGenerales : {
        all : function(data){
            fillData.datosGenerales.datosPersonales(data);
            fillData.datosGenerales.desarrolloAcademico(mainTabMenu.var.pID_ALTERNA);
            fillData.datosGenerales.domicilio(mainTabMenu.var.pID_ALTERNA);
            fillData.datosGenerales.referencias(mainTabMenu.var.pID_ALTERNA);
            fillData.datosGenerales.socioeconomicos(mainTabMenu.var.pID_ALTERNA);
            fillData.datosGenerales.dependientesEconomicos(mainTabMenu.var.pID_ALTERNA);
        },
        datosPersonales : function(data){
            //AutoFill
            $.each(data,function(key,value){
                mainFormActions.insertValueInSelect($('#'+ key),value);
            });

            //Special
            //DATOS GENERALES - DATOS PERSONALES
            mainFormActions.insertValueInSelect($('#pRFC_DOMICILIO'),data.pRFC);        
            mainFormActions.insertValueInSelect($('#pNOMBRE_DATOS_PERSONALES'),data.pNOMBRE);
            mainFormActions.insertValueInSelect($('#pPATERNO_DATOS_PERSONALES'),data.pPATERNO);
            mainFormActions.insertValueInSelect($('#pMATERNO_DATOS_PERSONALES'),data.pMATERNO);
            mainFormActions.insertValueInSelect($('#pSEXO_DATOS_PERSONALES'),data.pSEXO);
            mainFormActions.insertValueInSelect($('#pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES'),data.pFECHA_NAC);
            mainFormActions.insertValueInSelect($('#pCIUDAD_NAC_DATOS_PERSONALES'),data.pCIUDAD_NAC);
            mainFormActions.insertValueInSelect($('#pCREDENCIAL_ELECTOR'),data.pCREDENCIAL_ELECTOR);
            mainFormActions.insertValueInSelect($('#pPASAPORTE'),data.pPASAPORTE);
            mainFormActions.insertValueInSelect($('#pLICENCIA_DATOS_PERSONALES'),data.pLICENCIA);

            fillData.datosGenerales.CIB(mainTabMenu.var.pID_ALTERNA);
        },
        CIB : function(pID_ALTERNA){
            if (!objViewDatosGenerales.vars.datosGenerales.tables.tableDatospersonales.dom) 
                return false;

            var tableRef = $('#' + objViewDatosGenerales.vars.datosGenerales.tables.tableDatospersonales.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewDatosGenerales.vars.datosGenerales.tables.tableDatospersonales.obj,
                callUrl = base_url + `Solicitud/getPersonaCIB`;

            
            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pCIB, value.pMotivoCIB ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.datosGenerales.CIB(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        desarrolloAcademico : function(pID_ALTERNA){
            var tableRef = $('#' + objViewDatosGenerales.vars.datosGenerales.tables.tableDesarrollo.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewDatosGenerales.vars.datosGenerales.tables.tableDesarrollo.obj,
                callUrl = base_url + `Solicitud/getNivelEstudios`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
            
            tableObj.clear().draw();
            
            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_NIVEL_ESTUDIOS_EXT, value.pMAXIMA_ESCOLARIDAD, value.pESPECIALIDAD, value.pFECHA_INICIO, value.pFECHA_TERMINO, value.pPROMEDIO ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.datosGenerales.desarrolloAcademico(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        domicilio : function(pID_ALTERNA){
            var tableRef = $('#' + objViewDatosGenerales.vars.datosGenerales.tables.tableDomicilio.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewDatosGenerales.vars.datosGenerales.tables.tableDomicilio.obj,
                callUrl = base_url + `Solicitud/getDomicilio`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_DOMICILIO_EXT, value.pCODIGO_POSTAL, value.pNOM_ESTADO, value.pCOLONIA, value.pCALLE, value.pNUM_EXTERIOR, value.pNUM_INTERIOR ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.datosGenerales.domicilio(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        referencias : function(pID_ALTERNA){
            var tableRef = $('#' + objViewDatosGenerales.vars.datosGenerales.tables.tableReferencias.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewDatosGenerales.vars.datosGenerales.tables.tableReferencias.obj,
                callUrl = base_url + `Solicitud/getReferencias`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {                
                if (data) {
                    $.each( data, function(key,value) {
                        var domicilio = value.pCALLE + ' ' + value.pNUM_EXTERIOR + ' ' + (value.pNUM_INTERIOR ? value.pNUM_INTERIOR + ' ' : '' ) + (value.pCOLONIA ? value.COLONIA + ' ' : '' ) + value.pMUNICIPIO_DOM;
                        var row = [ value.pID_REFERENCIA_EXT, value.pNOMBRE, value.pPATERNO, value.pMATERNO, value.pID_TIPO_REFERENCIA, domicilio ];
                        tableObj.row.add( row ).draw( false );
                    });
                }
                
                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.datosGenerales.referencias(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        socioeconomicos : function(pID_ALTERNA){
            var callUrl = base_url + `Solicitud/getSocioEconomico`;
            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        mainFormActions.insertValueInSelect($('#'+ key),value);
                    });

                    //special
                    mainFormActions.insertValueInSelect($('#pID_TIPO_DOMICILIO'),data.pID_TIPO_DOMIC);
                }
            })
            .catch( (err) => {
                $('#Socioeconomicos_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
            });
        },
        dependientesEconomicos : function(pID_ALTERNA){
            var tableRef = $('#' + objViewDatosGenerales.vars.datosGenerales.tables.tableSocioeconomicos.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewDatosGenerales.vars.datosGenerales.tables.tableSocioeconomicos.obj,
                callUrl = base_url + `Solicitud/getDependientes`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
            
            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {                
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_DEPENDIENTE_EXT, value.pNOMBRE, value.pPATERNO, value.pMATERNO, value.pSEXO, value.pFECHA_NACIMIENTO, value.pPARENTESCO ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.datosGenerales.dependientesEconomicos(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        }
    },
    laboral : {
        all : function(){
            fillData.laboral.adscripcionActual(mainTabMenu.var.pID_ALTERNA);
            fillData.laboral.empleosDiversos(mainTabMenu.var.pID_ALTERNA);
            fillData.laboral.actitudesHaciaEmpleo(mainTabMenu.var.pID_ALTERNA);
            fillData.laboral.comisiones(mainTabMenu.var.pID_ALTERNA);
        },
        adscripcionActual : function(pID_ALTERNA){
            var tableRef = $('#' + objViewLaboral.vars.laboral.tables.tableAdscripcionactual.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewLaboral.vars.laboral.tables.tableAdscripcionactual.obj,
                callUrl = base_url + `Solicitud/getAdscripcion`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_ADSCRIPCION_EXT, value.pNOMBRE_DEPENDENCIA, value.pCORPORACION, value.pNOMBRE_AREA, value.pNOMBRE_PUESTO ? value.pNOMBRE_PUESTO : 'No viene en el modelo de bd', value.pNOM_ENTIDAD, value.pNOM_MUNICIPIO ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.laboral.adscripcionActual(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");


                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        empleosDiversos : function(pID_ALTERNA){
            var tableRef = $('#' + objViewLaboral.vars.laboral.tables.tableEmpleosdiversos.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewLaboral.vars.laboral.tables.tableEmpleosdiversos.obj,
                callUrl = base_url + `Solicitud/getEmpleoAdicional`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_EMPLEO_ADIC_EXT, value.pEMPRESA, value.pNUM_TELEFONICO, value.pAREA, value.pSUELDO, value.pFECHA_INGRESO, value.pFECHA_SEPARACION ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.laboral.empleosDiversos(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        actitudesHaciaEmpleo : function(pID_ALTERNA){
            var callUrl = base_url + `Solicitud/getActitud`;
            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        mainFormActions.insertValueInSelect($('#'+ key),value);
                    });

                    //special
                    mainFormActions.insertValueInSelect($('#pPUESTO_ACTITUDES_EMPLEO'),data.pPUESTO);
                }
            })
            .catch( (err) => {
                $('#Actitudes_hacia_el_empleo_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
            });
        },
        comisiones : function(pID_ALTERNA){
            var tableRef = $('#' + objViewLaboral.vars.laboral.tables.tableComisiones.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewLaboral.vars.laboral.tables.tableComisiones.obj,
                callUrl = base_url + `Solicitud/getComision`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_COMISION_EXT, value.pFECHA_INICIO, value.pFECHA_TERMINO, value.pTIPO_COMISION, value.pMOTIVO, value.pDESTINO ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.laboral.comisiones(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
    },
    capacitacion : {
        all : function(){
            fillData.capacitacion.idiomasDialectos(mainTabMenu.var.pID_ALTERNA);
            fillData.capacitacion.habilidadesAptitudes(mainTabMenu.var.pID_ALTERNA);
        },
        idiomasDialectos : function(pID_ALTERNA){
            var tableRef = $('#' + objViewCapacitacion.vars.capacitacion.tables.tableIdiomas.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewCapacitacion.vars.capacitacion.tables.tableIdiomas.obj,
                callUrl = base_url + `Solicitud/getIdiomaHablado`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_IDIOMA_HABLADO_EXT, value.pIDIOMA, value.pPORCENTAJE_LECTURA, value.pPORCENTAJE_ESCRITURA, value.pPORCENTAJE_CONVERSACION ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.capacitacion.idiomasDialectos(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        habilidadesAptitudes : function(pID_ALTERNA){
            var tableRef = $('#' + objViewCapacitacion.vars.capacitacion.tables.tableHabilidades.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewCapacitacion.vars.capacitacion.tables.tableHabilidades.obj,
                callUrl = base_url + `Solicitud/getHabilidadAptitud`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_HABILIDAD_APTIT_EXT, value.pTIPO_HABAILIDAD, value.pGRADO ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.capacitacion.habilidadesAptitudes(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        }
    }
}

function refreshTable(e,self){
    e.preventDefault();
    eval($(self).data('call'));
}