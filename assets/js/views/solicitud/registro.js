$(function() {
    var statusIDBInterval = setInterval(function(){
        if (iDB.status) {
            clearInterval(statusIDBInterval);
            statusIDBInterval = null;
            mainTabMenu.fireInit();
        }
    }, 300);

    validarVoz = $('.validarVoz');
    validarReplicar = $('.validarReplicar');

    validarVoz.on('click',validarVozFnc);
    validarReplicar.on('click',validarReplicarFnc);

});

validarVozFnc = function(e){
    e.preventDefault();
    
    var callUrl = base_url + "Solicitud/ajaxValidar";

    $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

    $.get(callUrl, 
        { id : mainTabMenu.var.pID_ALTERNA },
        function (data) {
            if (data) {
                if (data.results.status){

                    //data.results.data
                    
                    // Descomentar al implementar: es para habilitar el botón de replicar una vez de haya validado el registro de la solicitud                
                    //$('validarReplicar').removeAttr("disabled");
                    return null;
                }
            }

            Swal.fire({ type: 'error', title: 'Error', html: data.results.message ? data.results.message : 'Error no especificado al intentar validar la solicitud.' });

        }).fail(function (err) {                    
            
            $.LoadingOverlay("hide",true);
            var msg = err.responseText;
            Swal.fire({ type: 'error', title: 'Error', html: msg });

        }).always(function () {
            
            $.LoadingOverlay("hide");
            MyCookie.session.reset();

        });

    
    
};

validarReplicarFnc = function(e){
    e.preventDefault();
                    
    Swal.fire({
        type: 'warning',
        title: 'Oops...!!!',
        text: 'Funcionalidad sin implementar!'                        
    });
};

var mainTabMenu = {
    var : {
        pID_ALTERNA : null,
        nuevoRegistro: true
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
                mainTabMenu.var.nuevoRegistro = false;
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

            refFirstTab = $('#myTabContent .tab-pane.show.active .nav.nav-tabs li.nav-item a.nav-link:first');

            refFirstTab.trigger('click');

            var tabChanged = false;
            var itervalEndTab = setInterval(function() {

                refFirstTab = $('#myTabContent .tab-pane.show.active .nav.nav-tabs li.nav-item a.nav-link:first');
                refActualTab = $('#myTabContent .tab-pane.show.active .nav.nav-tabs li.nav-item a.nav-link.active');
                
                if ( refFirstTab.attr('id') == refActualTab.attr('id') ) {

                    clearInterval(itervalEndTab);
                    
                    if (!tabChanged) {
                        tabChanged = true;

                        var nextTab = $('#mainContainerTab li.nav-item a.nav-link.active').closest('li').next('li.nav-item').find('a.nav-link');
                        nextTab.tab('show');

                    }

                }

            }, 1000);

        });

        $('form').on('reset', function(e){
            $(this).find('select').val(null).trigger('change').trigger('change.select2');
        });        
    },
    tab : {
        change : function(e){
            var tabRef = $(e.currentTarget),
                tabRefId = $("#" + e.currentTarget.id),        
                forms = $('#myTabContent>.tab-pane.show.active form'),
                allFormsSaved = true;

            e.preventDefault();

            $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var intervalLoadingChange = setInterval(function(){

                formsInLoading = false;
                forms.each(function( index ) {
                    if ( $(this).data('loading') == true ) {
                        formsInLoading = true;
                    }
                });

                if (!formsInLoading){

                    window.clearInterval(intervalLoadingChange);

                    setTimeout(function(){}, 1000);

                    forms.each(function( index ) {
                
                        if ( $(this).data('requireddata') != false ) {
                            allFormsSaved = false;
                            
                            idrefForm = $(this).closest('.tab-pane').attr('id');

                            $.each( $("#myTabContent .tab-pane .nav.nav-tabs .nav-item a.nav-link"), function( key, value ) {
                                if ( $(this).attr('aria-controls') == idrefForm ) {
                                    
                                    $(this).find('span.tabMark').remove();
                                    $(this).prepend('<span class="text-danger tabMark errorValidation mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i></span>');

                                    var date = moment( new Date() ).format('DD/MM/YYYY'),
                                        time = moment( new Date() ).format('h:mm:ss a'),
                                        titleMsg = 'Acción realizada [ ' + time + ' - ' + date + ' ]';

                                    $(this).find('span.tabMark').data('toggle','tooltip').prop('title',titleMsg);
                                    $('[data-toggle="tooltip"]').tooltip();

                                }
                            });

                        }

                    });

                    $(e.relatedTarget).data('finish',allFormsSaved);

                    // TODO: Xmal - Quitar comentarios en bloque para implementación
                    if (!$(e.relatedTarget).data('finish')){
                        
                        $.LoadingOverlay("hide", true);
                        e.preventDefault();
                        Swal.fire({ type: 'warning', title: 'Aviso', html: 'Debe completar y guardar la información de las pestañas que actualmente se muestran.' });
                        return null;
                        
                    }

                    mainTabMenu.actions.init(tabRef.attr('aria-controls'));
                    MyCookie.tabRef.save(dynTabs.mode + 'MainTab',tabRef.attr('id'));
                    
                    $('#mainContainerTab.nav li.nav-item a.nav-link.active').removeClass('active');
                    $('#myTabContent.tab-content>.tab-pane.active.show').removeClass('active show');

                    tabRef.addClass('active');
                    $(tabRef[0].hash).addClass('active show');

                    dynTabs.loaderTab();

                    return null;
                }                

            }, 1000);
            
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
                    objViewIdentificacion.init(function(){ 
                        if (dynTabs.mode == 'edit' && !objViewIdentificacion.vars.general.init) { 
                            fillData.identificacion.all();
                        }

                        dynTabs.validForm = true; 
                        mainTabMenu.actions.inited = true;
                    });
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
            try {
                objViewDatosGenerales.events.change.tableResponsive();
            } catch (error) {}
            try {
                objViewLaboral.events.change.tableResponsive();
            } catch (error) {}
            try {
                objViewCapacitacion.events.change.tableResponsive();
            } catch (error) {}
            try {
                objViewIdentificacion.events.change.tableResponsive();
            } catch (error) {}
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
                else {
                    mainTabMenu.var.nuevoRegistro = false;
                    mainFormActions.fillData(result.value.data);
                }
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
                mainFormActions.fillData(data);
            } else
                throw new Error('No se encontró información');

        }).catch(function(err){
            $.LoadingOverlay("hide",true);
            Swal.fire({ type: 'error', title: 'Error', html: err.statusText ? err.statusText : err.message})
            .then(() => {
                window.location.href = base_url + 'Solicitud';
            });
        });        
    },
    fillData : function(data){
        data = data.results.data;

        mainTabMenu.var.pID_ALTERNA = data.pID_ALTERNA;

        if (mainTabMenu.var.pID_ALTERNA == null){
            Swal.fire({
                type: 'error',                        
                title: 'Error',
                html: "No se recuperó el ID ALTERNA",
                allowOutsideClick : false,
            }).then(function(result){
                window.location.href = base_url + 'Solicitud';
            });
            return null;
        }

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
                        case 'number':
                            ref.val(value);
                        break;                        
                    }
                break;
                case 'select':                
                    
                    if (!$(ref).data('query') || $(ref).data('query').trim().length == 0) {

                        ref.val(value);
                        ref.trigger('change');

                    } else {

                        ref.data('insert', value);
                        
                    }

                break;                                    
                default:
                break;
            }            
        }
    }
}

var fillData = {
    insertValueInSelect : function(ref,value,form){            
        $('#'+ form + ' #' + ref).html(value);
    },
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

            // Si viene de la vista de ver -  posicionar en el tab que se encontraba para su edición
            if (selectPrincipalTabId){
                $('#' + selectPrincipalTabId).trigger('click');
                if (selectSubTabId){
                    $('#' + selectSubTabId).trigger('click');
                }

                var intervalTop = setInterval(function(){
                    clearInterval(intervalTop);
                    $('html, body').scrollTop(0);
                },500);

            }
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
            mainFormActions.insertValueInSelect($('#pLICENCIA_VIG'),data.pFECHA_LICENCIA_VIG);

            fillData.datosGenerales.CIB(mainTabMenu.var.pID_ALTERNA);

            $('#Datos_personales_form').data('requireddata',false);

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

            $('#Datos_personales_CIB_form').data('requireddata',false);
            
        },
        desarrolloAcademico : function(pID_ALTERNA){

            $('#Desarrollo_form').data('loading',true);

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
                    
                    $('#Desarrollo_form').data('requireddata',false);

                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.datosGenerales.desarrolloAcademico(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");

                $('#Desarrollo_form').removeData('loading');
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });

            

        },
        domicilio : function(pID_ALTERNA){
            $('#Domicilio_form').data('loading',true);

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

                    $('#Domicilio_form').data('requireddata',false);

                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.datosGenerales.domicilio(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");

                $('#Domicilio_form').removeData('loading');
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
            
            $('#Referencias_form').data('requireddata',false);

        },
        socioeconomicos : function(pID_ALTERNA){
            $('#Socioeconomicos_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/getSocioEco`;
            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        mainFormActions.insertValueInSelect($('#'+ key),value);
                    });

                    //special
                    mainFormActions.insertValueInSelect($('#pID_TIPO_DOMICILIO'),data.pID_TIPO_DOMIC);

                    $('#Socioeconomicos_form').removeData('hasChanged');

                    $('#Socioeconomicos_form').data('requireddata',false);
                    
                }
                
                $('#Socioeconomicos_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Socioeconomicos_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Socioeconomicos_form').LoadingOverlay("hide");
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

            $('#Dependientes_form').data('requireddata',false);
            $('#Socioeconomicos_form').removeData('hasChanged');

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
            
            $('#Adscripcion_actual_form').data('loading',true);

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

                    $('#Adscripcion_actual_form').data('requireddata',false);

                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.laboral.adscripcionActual(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");


                tableRef.LoadingOverlay("hide");

                $('#Adscripcion_actual_form').removeData('loading');

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

                    $('#Actitudes_hacia_el_empleo_form').removeData('hasChanged');
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
    },
    identificacion : {
        all : function(){
            fillData.identificacion.mediaFiliacion(mainTabMenu.var.pID_ALTERNA);
            fillData.identificacion.seniasParticulares(mainTabMenu.var.pID_ALTERNA);
            fillData.identificacion.fichaFotografica(mainTabMenu.var.pID_ALTERNA);
            fillData.identificacion.registroDecadactilar(mainTabMenu.var.pID_ALTERNA);
            fillData.identificacion.digitalizacionDocumento(mainTabMenu.var.pID_ALTERNA);
            fillData.identificacion.identificacionVoz(mainTabMenu.var.pID_ALTERNA);
        },
        mediaFiliacion : function(pID_ALTERNA){

            $('#mediafiliacion_form').data('loading',true);

            $('#mediafiliacion_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/spB2MFgetFiliacion`;
            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each(data,function(key,value){
                        mainFormActions.insertValueInSelect($('#'+ key),value);
                    });

                    $('#mediafiliacion_form').removeData('hasChanged');

                    $('#mediafiliacion_form').data('requireddata',false);
                }
                $('#mediafiliacion_form').LoadingOverlay("hide");

                $('#mediafiliacion_form').removeData('loading');
            })
            .catch( (err) => {
                $('#mediafiliacion_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#mediafiliacion_form').LoadingOverlay("hide");
            });
        },
        seniasParticulares : function(pID_ALTERNA){
            
            $('#Senas_particulares_form').data('loading',true);

            var tableRef = $('#' + objViewIdentificacion.vars.identificacion.tables.tableSenasparticulares.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewIdentificacion.vars.identificacion.tables.tableSenasparticulares.obj,
                callUrl = base_url + `Solicitud/getSenasParticulares`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_SENAS_PART_EXT, value.pDESC_TIPO_SENA, value.pDESC_LADO, value.pDESC_REGION, value.pDESC_VISTA, value.pCANTIDAD, value.pDESCRIPCION ];
                        tableObj.row.add( row ).draw( false );
                    });

                    $('#Senas_particulares_form').data('requireddata',false);
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.identificacion.seniasParticulares(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");

                $('#Senas_particulares_form').removeData('loading');

            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        fichaFotografica : function(pID_ALTERNA){
            
            $('#Ficha_fotografica_form').data('loading',true);

            $('#Ficha_fotografica_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/vwFichaFotografica`;
            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    //BLOQUE PARA LAS IMÁGENES E INFORMACIÓN
                    //INFORMACIÓN
                    fillData.camposGeneralesInformacionFichaFotografica(data);

                    // IMÁGENES
                    var thumb_pIMAGEN_IZQUIERDO = $('#thumb_pIMAGEN_IZQUIERDO'),
                        thumb_pIMAGEN_FRENTE = $('#thumb_pIMAGEN_FRENTE'),
                        thumb_pIMAGEN_DERECHO = $('#thumb_pIMAGEN_DERECHO'),
                        thumb_pIMAGEN_FIRMA = $('#thumb_pIMAGEN_FIRMA'),
                        thumb_pIMAGEN_HUELLA = $('#thumb_pIMAGEN_HUELLA'),
                        imageBreak = base_url + 'assets/images/imageError.png';

                    /*******************************************************************************/            
                    //CAMPOS DE IMÁGENES
                    thumb_pIMAGEN_IZQUIERDO.attr("src", data.pIMG_PERFILIZQ ? data.pIMG_PERFILIZQ.name : imageBreak ).attr("alt", data.pIMG_PERFILIZQ ? data.pIMG_PERFILIZQ.originalName : 'Sin imagen');
                    thumb_pIMAGEN_IZQUIERDO.parent().find('div.custom-file label.custom-file-label').html( data.pIMG_PERFILIZQ ? data.pIMG_PERFILIZQ.originalName : 'Seleccionar imágen' );

                    thumb_pIMAGEN_FRENTE.attr("src", data.pIMG_FRENTE ? data.pIMG_FRENTE.name : imageBreak ).attr("alt", data.pIMG_FRENTE ? data.pIMG_FRENTE.originalName : 'Sin imagen');
                    thumb_pIMAGEN_FRENTE.parent().find('div.custom-file label.custom-file-label').html( data.pIMG_FRENTE ? data.pIMG_FRENTE.originalName : 'Seleccionar imágen' );
                    
                    thumb_pIMAGEN_DERECHO.attr("src", data.pIMG_PERFILDR ? data.pIMG_PERFILDR.name : imageBreak ).attr("alt", data.pIMG_PERFILDR ? data.pIMG_PERFILDR.originalName : 'Sin imagen');
                    thumb_pIMAGEN_DERECHO.parent().find('div.custom-file label.custom-file-label').html( data.pIMG_PERFILDR ? data.pIMG_PERFILDR.originalName : 'Seleccionar imágen' );

                    thumb_pIMAGEN_FIRMA.attr("src", data.pIMG_FIRMA ? data.pIMG_FIRMA.name : imageBreak ).attr("alt", data.pIMG_FIRMA ? data.pIMG_FIRMA.originalName : 'Sin imagen');
                    thumb_pIMAGEN_FIRMA.parent().find('div.custom-file label.custom-file-label').html( data.pIMG_FIRMA ? data.pIMG_FIRMA.originalName : 'Seleccionar imágen' );

                    thumb_pIMAGEN_HUELLA.attr("src", data.pIMG_HUELLA ? data.pIMG_HUELLA.name : imageBreak ).attr("alt", data.pIMG_HUELLA ? data.pIMG_HUELLA.originalName : 'Sin imagen');
                    thumb_pIMAGEN_HUELLA.parent().find('div.custom-file label.custom-file-label').html( data.pIMG_HUELLA ? data.pIMG_HUELLA.originalName : 'Seleccionar imágen' );
                    /*******************************************************************************/

                    if ( thumb_pIMAGEN_IZQUIERDO || thumb_pIMAGEN_FRENTE || thumb_pIMAGEN_DERECHO || thumb_pIMAGEN_FIRMA ||thumb_pIMAGEN_HUELLA ) 
                        $('#Ficha_fotografica_form').data('requireddata',false);

                }
                $('#Ficha_fotografica_form').LoadingOverlay("hide");

                

            })
            .catch( (err) => {
                $('#Ficha_fotografica_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Ficha_fotografica_form').LoadingOverlay("hide");
            });
            
            //BLOQUE PARA EL GRID
            var tableRef = $('#' + objViewIdentificacion.vars.identificacion.tables.tableFichafotografica.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewIdentificacion.vars.identificacion.tables.tableFichafotografica.obj,
                callUrl = base_url + `Solicitud/getFichaFotografica`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_FICHA_FOTOGRAF_EXT, value.pNUM_FOLIO, value.pIMAGEN, value.pDEPENDENCIA, value.pINSTITUCION,value.pFECHA_REGISTRO ];
                        tableObj.row.add( row ).draw( false );
                    });

                    $('#Ficha_fotografica_form').data('requireddata',false);

                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.identificacion.fichaFotografica(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");

                $('#Ficha_fotografica_form').removeData('loading');

            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        registroDecadactilar : function(pID_ALTERNA){
            
            $('#Registro_decadactilar_form').data('loading',true);

            $('#Registro_decadactilar_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            //BLOQUE PARA EL LINK AL DOCUMENTO E INFORMACIÓN
            var callUrl = base_url + `Solicitud/vwRegDecadactilar`;
            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    //INFORMACIÓN
                    fillData.camposGeneralesInformacionRegistroDecadactilar(data);

                    if (data.pIMG_DOCUMENTO) {
                        //DOCUMENTO
                        $('#Registro_decadactilar_form .custom-file').parent('div').find('.jumbotron').remove();
                        
                        $('#Registro_decadactilar_form .custom-file').parent('div').append(`
                            <div class="jumbotron jumbotron-fluid mb-3">
                                <div class="container">
                                    <i class="fa fa-file-text-o fa-4x mb-3" aria-hidden="true"></i>
                                    <h5 class='text-truncate'><a href="${data.pIMG_DOCUMENTO.name}" target="_blank" rel="noopener noreferrer">${data.pIMG_DOCUMENTO.originalName}</a></h5>
                                </div>
                            </div>
                        `);
                    }

                }
                $('#Registro_decadactilar_form').LoadingOverlay("hide");

            })
            .catch( (err) => {
                $('#Registro_decadactilar_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Registro_decadactilar_form').LoadingOverlay("hide");
            });

            //BLOQUE PARA EL GRID
            var tableRef = $('#' + objViewIdentificacion.vars.identificacion.tables.tableRegistrodecadactilar.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewIdentificacion.vars.identificacion.tables.tableRegistrodecadactilar.obj,
                callUrl = base_url + `Solicitud/getRegDecadactilar`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_REG_DECADACT_EXT, value.pDEPENDENCIA, value.pINSTITUCION, value.pFECHA_REGISTRO ];
                        tableObj.row.add( row ).draw( false );
                    });

                    $('#Registro_decadactilar_form').data('requireddata',false);
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.identificacion.registroDecadactilar(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");

                $('#Registro_decadactilar_form').removeData('loading');
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        digitalizacionDocumento : function(pID_ALTERNA){

            $('#Digitalizacion_de_documento_form').data('loading',true);

            //BLOQUE PARA EL GRID
            var tableRef = $('#' + objViewIdentificacion.vars.identificacion.tables.tableDigitalizaciondoc.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewIdentificacion.vars.identificacion.tables.tableDigitalizaciondoc.obj,
                callUrl = base_url + `Solicitud/getDocumento`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_DOCUMENTO_EXT, value.pDESC_CATEGORIA_DOC, value.pVALOR ? `<a href="${value.pVALOR.name}" target="_blank" rel="noopener noreferrer"><i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i> ${value.pVALOR.originalName}</a>` : '', value.pFECHA_DOCUMENTO, value.pESTATUS];
                        tableObj.row.add( row ).draw( false );
                    });

                     $('#Digitalizacion_de_documento_form').data('requireddata',false);
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.identificacion.digitalizacionDocumento(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");

                $('#Digitalizacion_de_documento_form').removeData('loading');
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        identificacionVoz : function(pID_ALTERNA){
            
            $('#Identificacion_de_voz_form').data('loading',true);

            $('#Identificacion_de_voz_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            //BLOQUE PARA INSERTAR EL VÍNCULO AL AUDIO
            var callUrl = base_url + `Solicitud/opcRegistroVoz`;

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    var inAdscripcion = $('#Identificacion_de_voz_form .inAdscripcion'),
                        inDependencia = $('#Identificacion_de_voz_form .inDependencia'),
                        inInstitucion = $('#Identificacion_de_voz_form .inInstitucion'),
                        audioRef = $('#Identificacion_de_voz_form #audio')

                    inAdscripcion.html(data.pAREA_ADSCRIPCION);
                    inDependencia.html(data.pDEPENDENCIA);
                    inInstitucion.html(data.pINSTITUCION);

                    if (data.pPATH_ARCHIVO) {
                        audioRef.attr("src", data.pPATH_ARCHIVO.name);
                        audioRef[0].pause();
                        audioRef[0].load();
                        audioRef.removeClass('d-none');
                    }

                    $('#Identificacion_de_voz_form').data('requireddata',false);
                }
                $('#Identificacion_de_voz_form').LoadingOverlay("hide");

                $('#Identificacion_de_voz_form').removeData('loading');

            })
            .catch( (err) => {
                $('#Identificacion_de_voz_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Identificacion_de_voz_form').LoadingOverlay("hide");
            });
        }
    },
    camposGeneralesInformacionFichaFotografica : function(data){
        var inCUIP = $('#Ficha_fotografica_form .inCUIP'),
            inNombre = $('#Ficha_fotografica_form  .inNombre'),
            inApellidoaPaterno = $('#Ficha_fotografica_form  .inApellidoaPaterno'),
            inApellidoMaterno = $('#Ficha_fotografica_form  .inApellidoMaterno'),
            inFechaNacimiento = $('#Ficha_fotografica_form  .inFechaNacimiento'),
            inAdscripcion = $('#Ficha_fotografica_form  .inAdscripcion'),
            inDependencia = $('#Ficha_fotografica_form  .inDependencia'),
            inInstitucion = $('#Ficha_fotografica_form  .inInstitucion');
        
        inCUIP.html(data.pCUIP);
        inNombre.html(data.pNOMBRE);
        inApellidoaPaterno.html(data.pPATERNO);
        inApellidoMaterno.html(data.pMATERNO);
        inFechaNacimiento.html(data.pFECHA_NACIMIENTO);
        inAdscripcion.html(data.pAREA_ADSCRIPCION);
        inDependencia.html(data.pDEPENDENCIA);
        inInstitucion.html(data.pINSTITUCION);        
    },
    camposGeneralesInformacionRegistroDecadactilar : function(data){
        var inCUIP = $('#Registro_decadactilar_form .inCUIP'),
            inFolio = $('#Registro_decadactilar_form  .inFolio'),
            inAdscripcion = $('#Registro_decadactilar_form  .inAdscripcion'),
            inInstitucion = $('#Registro_decadactilar_form  .inInstitucion'),
            inDependencia = $('#Registro_decadactilar_form  .inDependencia'),
            inApellidoaPaterno = $('#Registro_decadactilar_form  .inApellidoaPaterno'),
            inFechaNacimiento = $('#Registro_decadactilar_form  .inFechaNacimiento'),
            inSexo = $('#Registro_decadactilar_form  .inSexo');
        
        inCUIP.html(data.pCUIP);
        inFolio.html(data.pFOLIO_PERSONA);
        inAdscripcion.html(data.pAREA_ADSCRIPCION);
        inInstitucion.html(data.pINSTITUCION);        
        inDependencia.html(data.pDEPENDENCIA);
        inApellidoaPaterno.html(data.pPATERNO);
        inFechaNacimiento.html(data.pFECHA_NACIMIENTO);
        inSexo.html(data.pSEXO);
    }    
}

function refreshTable(e,self){
    e.preventDefault();
    eval($(self).data('call'));
}