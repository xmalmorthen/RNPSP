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
        $('#mainContainerTab a[data-toggle="tab"]').on('shown.bs.tab',dynTabs.loaderTab);
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
                    objViewLaboral.init(function(){ dynTabs.validForm = true; mainTabMenu.actions.inited = true;});
                break;
                case 'Capacitacion':
                    objViewCapacitacion.init(function(){ dynTabs.validForm = true; mainTabMenu.actions.inited = true;});
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

        //AutoFill
        $.each(data,function(key,value){
            mainFormActions.insertValueInSelect($('#'+ key),value);
        });

        //Special
        mainFormActions.insertValueInSelect($('#pRFC_DOMICILIO'),data.pRFC);        
        mainFormActions.insertValueInSelect($('#pNOMBRE_DATOS_PERSONALES'),data.pNOMBRE);
        mainFormActions.insertValueInSelect($('#pPATERNO_DATOS_PERSONALES'),data.pPATERNO);
        mainFormActions.insertValueInSelect($('#pMATERNO_DATOS_PERSONALES'),data.pMATERNO);
        mainFormActions.insertValueInSelect($('#pSEXO_DATOS_PERSONALES'),data.pSEXO);
        mainFormActions.insertValueInSelect($('#pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES'),data.pFECHA_NAC);
        mainFormActions.insertValueInSelect($('#pCIUDAD_NAC_DATOS_PERSONALES'),data.pCIUDAD_NAC);
        mainFormActions.insertValueInSelect($('#pCREDENCIAL_ELECTOR'),data.pCREDENCIAL_ELECTOR);//
        mainFormActions.insertValueInSelect($('#pPASAPORTE'),data.pPASAPORTE);
        mainFormActions.insertValueInSelect($('#pLICENCIA_DATOS_PERSONALES'),data.pLICENCIA);
        //mainFormActions.insertValueInSelect($('#pCUIP'),data.);
        $('#pCUIP').setError('No se encontró en el modelo...');

        $('.consultaCURP').readOnly();
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