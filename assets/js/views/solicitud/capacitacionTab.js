var objViewCapacitacion = {
    vars : {
        general : {
            init : false,
            btnSiguienteAnterior : null
        },
        capacitacion : {
            forms : {
                Idiomas_dialectos_form : null,
                Habilidades_aptitudes_form : null
            },
            btns : {
                guardarIdioma : null,
                guardarHabilidad : null
            },
            tables : {
                tableIdiomas : {
                    obj : null,
                    dom : null
                },
                tableHabilidades  : {
                    obj : null,
                    dom : null
                }
            }
        }
    },
    init : function(callback){        
        if (objViewCapacitacion.vars.general.init)
            return false;

        $('#myTabContent').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
        
        objViewCapacitacion.vars.general.mainContentTab = $('#Capacitacion');
        
        // INIT DATATABLE
        objViewCapacitacion.vars.capacitacion.tables.tableIdiomas.dom = $('#tableIdiomas');
        objViewCapacitacion.vars.capacitacion.tables.tableIdiomas.obj = objViewCapacitacion.vars.capacitacion.tables.tableIdiomas.dom.DataTable({"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});
        objViewCapacitacion.vars.capacitacion.tables.tableHabilidades.dom = $('#tableHabilidades');
        objViewCapacitacion.vars.capacitacion.tables.tableHabilidades.obj = objViewCapacitacion.vars.capacitacion.tables.tableHabilidades.dom.DataTable({"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});

        // INIT ELEMENTS
        // FORMS
        objViewCapacitacion.vars.capacitacion.forms.Idiomas_dialectos_form = $('#Idiomas_dialectos_form');
        objViewCapacitacion.vars.capacitacion.forms.Habilidades_aptitudes_form = $('#Habilidades_aptitudes_form');
        // BUTTONS
        objViewCapacitacion.vars.capacitacion.btns.guardarIdioma = $('#guardarIdioma');
        objViewCapacitacion.vars.capacitacion.btns.guardarHabilidad = $('#guardarHabilidad');

        objViewCapacitacion.vars.general.btnSiguienteAnterior = $('.btnSiguienteAnterior');
        
        // INIT SELECTS
        objViewCapacitacion.vars.general.mainContentTab.find('select').select2({width : '100%'});
        $(document).on('focus', '.select2.select2-container', function (e) {
            if (e.originalEvent) {
                $(this).siblings('select').select2('open');
            }
        });

        //EVENTS
        //SUBMIT
        objViewCapacitacion.vars.general.mainContentTab.find("form").attr('novalidate', 'novalidate');
        objViewCapacitacion.vars.general.mainContentTab.find('form').submit(function(e){
            e.preventDefault();
        });
        // CLICK
        objViewCapacitacion.vars.capacitacion.btns.guardarIdioma.on('click',objViewCapacitacion.events.click.capacitacion.guardarIdioma);
        objViewCapacitacion.vars.capacitacion.btns.guardarHabilidad.on('click',objViewCapacitacion.events.click.capacitacion.guardarHabilidad);
        objViewCapacitacion.vars.general.btnSiguienteAnterior.on('click',objViewCapacitacion.events.click.general.btnSiguienteAnterior);
        //FOCUSOUT
        
        //Rutina para verificar si se hace algún cambio en cualquier forulario
        $.each(objViewCapacitacion.vars.capacitacion.forms, function( index, value ) {
            var form = value;
            form.find('input, select').change(function(e) {
                form.removeData('hasSaved');
                form.removeData('hasDiscardChanges');
                form.data('hasChanged',true);

                $(e.target).removeError();
            });
        });
        
        //CAMBIO DE TABS
        objViewCapacitacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('hide.bs.tab',function(e){ dynTabs.change({ discardFunction: objViewCapacitacion.actions.discartChanges}, e); } );
        objViewCapacitacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('show.bs.tab',dynTabs.showTab);

        populate.form($('#Idiomas_dialectos_form')); //popular selects del primer tab NOTA: cambiar programación al tab actual si se obtiene por cookie
        dynTabs.setCurrentTab($('#myTabContent'));

        mainTabMenu.actions.changeTab();

        objViewCapacitacion.vars.general.init = true;

        $('#myTabContent').LoadingOverlay("hide");

        if (callback){
            if ($.isFunction( callback )){
                callback();
            }
        }
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
            capacitacion : {
                guardarIdioma : function(e, from){
                    e.preventDefault();

                    var $this = $(this),
                        form = $this.parents('form:first');
                    
                    form.closeAlert({alertType : 'alert-danger'});

                    //VALID FORM
                    try {
                        if (!objViewCapacitacion.vars.capacitacion.forms.Adscripcion_actual_form.valid())
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
                                        //Swal.fire({ type: 'error', title: 'Error', html: msg }); //se comenta porque al mostrar el modal no respeta el scroll top al bloque del alert.
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
                guardarHabilidad : function(e, from){}                
            }
        }
    },
    actions : {        
        discartChanges : function(e,relatedTarget){  
            dynTabs.markTab(dynTabs.tabs.prebTab.linkRef,'<span class="text-warning tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true"></i></span>');
            Swal.close();
                
            dynTabs.tabs.prebTab.tabForm.removeData('hasChanged');
            dynTabs.tabs.prebTab.tabForm.data('hasDiscardChanges',true);

            $("#" + relatedTarget.id).trigger('click');
            // dynTabs.tabs.prebTab.tabForm.find('.btnSiguienteAnterior.siguienteTab').trigger('click');
        }
    }
}