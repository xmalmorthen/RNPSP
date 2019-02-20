var objViewIdentificacion = {
    vars : {
        general : {
            init : false,
            btnSiguienteAnterior : null
        },
        identificacion : {
            forms : {
                mediafiliacion_form : null,
                Datos_form : null,
                Senas_particulares_form : null,
                Ficha_fotografica_form : null,
                Registro_decadactilar_form : null,
                Digitalizacion_de_documento_form: null,
                Identificacion_de_voz_form: null
            },
            btns : {
                guardarmediafiliación : null,
                guardarSenia : null,                
                guardarFicha : null,
                guardarRegistrodecadactilar : null,
                guardarDocumento : null,
                guardarVoz : null,
                validarVoz : null,
                validarReplicar : null
            }
        }
    },
    init : function(){        
        if (objViewIdentificacion.vars.general.init)
            return false;

        $('#myTabContent').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
        
        objViewIdentificacion.vars.general.mainContentTab = $('#Identificacion');
        
        // INIT DATATABLE
        // objViewIdentificacion.vars.table = $('#table').DataTable({"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"},"columnDefs": [{ "orderable": false, "targets": [2] }]});

        // INIT ELEMENTS
        // FORMS
        objViewIdentificacion.vars.identificacion.forms.mediafiliacion_form = $('#mediafiliacion_form');
        objViewIdentificacion.vars.identificacion.forms.Datos_form = $('#Datos_form');
        objViewIdentificacion.vars.identificacion.forms.Senas_particulares_form = $('#Senas_particulares_form');
        objViewIdentificacion.vars.identificacion.forms.Ficha_fotografica_form = $('#Ficha_fotografica_form');
        objViewIdentificacion.vars.identificacion.forms.Registro_decadactilar_form = $('#Registro_decadactilar_form');
        objViewIdentificacion.vars.identificacion.forms.Digitalizacion_de_documento_form = $('#Digitalizacion_de_documento_form');
        objViewIdentificacion.vars.identificacion.forms.Identificacion_de_voz_form = $('#Identificacion_de_voz_form');

        // BUTTONS
        objViewIdentificacion.vars.identificacion.btns.guardarmediafiliación = $('#guardarmediafiliación');
        objViewIdentificacion.vars.identificacion.btns.guardarSenia = $('#guardarSenia');
        objViewIdentificacion.vars.identificacion.btns.guardarFicha = $('#guardarFicha');
        objViewIdentificacion.vars.identificacion.btns.guardarRegistrodecadactilar = $('#guardarRegistrodecadactilar');
        objViewIdentificacion.vars.identificacion.btns.guardarDocumento = $('#guardarDocumento');
        objViewIdentificacion.vars.identificacion.btns.guardarVoz = $('#guardarVoz');
        objViewIdentificacion.vars.identificacion.btns.validarVoz = $('#validarVoz');
        objViewIdentificacion.vars.identificacion.btns.validarReplicar = $('#validarReplicar');

        objViewIdentificacion.vars.general.btnSiguienteAnterior = $('.btnSiguienteAnterior');

        // INIT SELECTS
        objViewIdentificacion.vars.general.mainContentTab.find('select').select2({width : '100%'});

        //EVENTS
        //SUBMIT
        objViewIdentificacion.vars.general.mainContentTab.find("form").attr('novalidate', 'novalidate');
        objViewIdentificacion.vars.general.mainContentTab.find('form').submit(function(e){
            e.preventDefault();
        });
        // CLICK
        objViewIdentificacion.vars.identificacion.btns.guardarmediafiliación.on('click',objViewIdentificacion.events.click.identificacion.guardarmediafiliación);
        objViewIdentificacion.vars.identificacion.btns.guardarSenia.on('click',objViewIdentificacion.events.click.identificacion.guardarSenia);
        objViewIdentificacion.vars.identificacion.btns.guardarFicha.on('click',objViewIdentificacion.events.click.identificacion.guardarFicha);
        objViewIdentificacion.vars.identificacion.btns.guardarRegistrodecadactilar.on('click',objViewIdentificacion.events.click.identificacion.guardarRegistrodecadactilar);
        objViewIdentificacion.vars.identificacion.btns.guardarDocumento.on('click',objViewIdentificacion.events.click.identificacion.guardarDocumento);
        objViewIdentificacion.vars.identificacion.btns.guardarVoz.on('click',objViewIdentificacion.events.click.identificacion.guardarVoz);
        objViewIdentificacion.vars.identificacion.btns.validarVoz.on('click',objViewIdentificacion.events.click.identificacion.validarVoz);
        objViewIdentificacion.vars.identificacion.btns.validarReplicar.on('click',objViewIdentificacion.events.click.identificacion.validarReplicar);
        
        objViewIdentificacion.vars.general.btnSiguienteAnterior.on('click',objViewIdentificacion.events.click.general.btnSiguienteAnterior);
        //FOCUSOUT

        //Rutina para verificar si se hace algún cambio en cualquier forulario
        $.each(objViewIdentificacion.vars.identificacion.forms, function( index, value ) {
            var form = value;
            form.find('input, select').change(function(e) {
                form.removeData('hasSaved');
                form.removeData('hasDiscardChanges');
                form.data('hasChanged',true);

                $(e.target).removeError();
            });
        });
        
        //CAMBIO DE TABS
        objViewIdentificacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('hide.bs.tab',function(e){ dynTabs.change({ discardFunction: objViewIdentificacion.actions.discartChanges}, e); } );
        objViewIdentificacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('show.bs.tab',dynTabs.showTab);

        populate.form($('#mediafiliacion_form')); //popular selects del primer tab NOTA: cambiar programación al tab actual si se obtiene por cookie
        dynTabs.setCurrentTab($('#myTabContent'));

        mainTabMenu.actions.changeTab();

        objViewIdentificacion.vars.general.init = true;

        $('#myTabContent').LoadingOverlay("hide");
    },
    events : {
        click : {
            general : {
                btnSiguienteAnterior : function(e){
                    e.preventDefault();
                    var tab = $(this).data('nexttab'); 
                    $(tab).tab('show');
                }
            },
            identificacion : {
                guardarmediafiliación : function(e, from){
                    e.preventDefault();

                    var $this = $(this),
                        form = $this.parents('form:first');
                    
                    form.closeAlert({alertType : 'alert-danger'});

                    //VALID FORM
                    try {
                        if (!objViewIdentificacion.vars.identificacion.forms.Adscripcion_actual_form.valid())
                            throw "Invalid FORM";

                        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                        var callUrl = base_url + 'Ejemplos/ajaxGetSample';
                        model = {
                            var1 : 'val1',
                            var2 : 'val2'
                        };

                        $.when(
                            $.get(callUrl,{model : model})
                            .always(function () {
                                MyCookie.session.reset();
                            })
                        ).then( 
                            //success
                            function(data, textStatus, jqXHR){
                                form.removeData('hasChanged');
                                form.data('hasSaved',true);

                                dynTabs.markTab( ( dynTabs.tabs.prebTab.linkRef ? dynTabs.tabs.prebTab.linkRef : dynTabs.tabs.currentTab.linkRef),  '<span class="text-success tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true" ></i></span>');

                                $.LoadingOverlay("hide");

                                if (from)
                                    if(from == 'tab')
                                        dynTabs.tabs.prebTab.tabForm.find('.btnSiguienteAnterior.siguienteTab').trigger('click');
                            },
                            //error
                            function(err, textStatus, jqXHR){
                                $.LoadingOverlay("hide");
                                var msg = err.status + ' - ' + err.statusText;
                                                                
                                form.setAlert({
                                    alertType :  'alert-danger',
                                    dismissible : true,
                                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error al guardar',
                                    msg : msg,
                                    callback : function(){
                                        //swal({ type: 'error', title: 'Error', html: msg }); //se comenta porque al mostrar el modal no respeta el scroll top al bloque del alert.
                                    }
                                });

                                dynTabs.markTab( ( dynTabs.tabs.prebTab.linkRef ? dynTabs.tabs.prebTab.linkRef : dynTabs.tabs.currentTab.linkRef),  '<span class="text-danger tabMark mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>');
                            } 
                        );
                    }catch(err) {
                        dynTabs.markTab( ( dynTabs.tabs.prebTab.linkRef ? dynTabs.tabs.prebTab.linkRef : dynTabs.tabs.currentTab.linkRef),  '<span class="text-danger tabMark mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>');
                        form.setAlert({
                            alertType :  'alert-danger',
                            dismissible : true,
                            header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                            msg : 'Formulario incompleto'
                        });
                    }
                },
                guardarSenia : function(e, from){},                
                guardarFicha : function(e, from){},
                guardarRegistrodecadactilar : function(e, from){},
                guardarDocumento : function(e, from){},
                guardarVoz : function(e, from){},
                validarVoz : function(e, from){},
                validarReplicar : function(e, from){}
            }
        }
    },
    actions : {        
        discartChanges : function(e){ 
            dynTabs.markTab(dynTabs.tabs.prebTab.linkRef,'<span class="text-warning tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true"></i></span>');
            Swal.close();
                
            dynTabs.tabs.prebTab.tabForm.removeData('hasChanged');
            dynTabs.tabs.prebTab.tabForm.data('hasDiscardChanges',true);
            dynTabs.tabs.prebTab.tabForm.find('.btnSiguienteAnterior.siguienteTab').trigger('click');
        }
    }
}