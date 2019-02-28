$(function() {
    var statusIDBInterval = setInterval(function(){
        if (iDB.status) {
            clearInterval(statusIDBInterval);
            statusIDBInterval = null;
            mainTabMenu.fireInit();

        }
    }, 1000);
});

var mainTabMenu = {
    fireInit : function(){
        if (formMode.length == 0)
            window.location.href = base_url + 'Error/setError?err=No se especificó el modo del formulario!!!';

        dynTabs.mode = formMode;

        //CAMBIO DE TABS
        //MAIN TAB
        $('#mainContainerTab a[data-toggle="tab"]').on('show.bs.tab',mainTabMenu.tab.change);
        $('#mainContainerTab a[data-toggle="tab"]').on('shown.bs.tab',dynTabs.loaderTab);
        

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
    },
    tab : {
        change : function(e){
            var tabRef = $(e.currentTarget);
            mainTabMenu.actions.init(tabRef.attr('aria-controls'));
            MyCookie.tabRef.save(dynTabs.mode + 'MainTab',tabRef.attr('id'));
        }
    },
    actions : {
        inited : false,
        init : function(tabRef, callback){
            mainTabMenu.actions.inited = false;

            //dynTabs.validForm = formMode != 'edit' ? true : false;

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
                        if (!data.results) {
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

                        } else
                            return {from:'bd', data: data[0]};
                    }).catch(function(err){
                        Swal.showValidationMessage(err.statusText);
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
                    mainFormActions.fillData(results.value.data);
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
        var callUrl = base_url + `Solicitud/ajaxGetSolicitudById/${idRef}`;
        fetch(callUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error(response.statusText);
                }
                return response.json();
            })
            .then(response => {
                if (!response.results) {
                    throw new Error('No se encontró información');
                } else {
                    mainFormActions.fillData(response.results);
                }
            })
            .catch(error => {
                Swal.fire({ type: 'error', title: 'Error', html: error.message });
                window.location.href = base_url + 'Solicitud';
            });
    },
    fillData : function(data){
        $('.consultaCURP').readOnly();

        objViewDatosGenerales.vars.datosGenerales.objs.pCURP.val('RUAM811123HCMDGG05');
        mainFormActions.insertValueInSelect($('#pTIPO_MOV'),'BE');
        mainFormActions.insertValueInSelect($('#pID_ENTIDAD_NAC'),'6');
        mainFormActions.insertValueInSelect($('#pID_MUNICIPIO_NAC'),'2');
        
        mainFormActions.insertValueInSelect($('#_dependenciaAdscripcionActual'),'9');
        mainFormActions.insertValueInSelect($('#pINSTITUCION'),'3817');
        mainFormActions.insertValueInSelect($('#pID_AREA'),'173525');                
        
        dynTabs.loaderTab();
    },
    insertValueInSelect : function(ref,value){
        if (ref){
            if (ref.find('option:enabled').size() == 0)
                ref.data('insert', value);
            else {                
                ref.val(value);
                ref.trigger('change.select2').trigger('change');
            }
            //ref.val(value).data('insert',value).trigger('change').trigger('change.select2');
        }
    }
}