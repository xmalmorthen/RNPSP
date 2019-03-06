var objViewCapacitacion = {
    vars : {
        general : {
            init : false,
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
        objViewCapacitacion.vars.capacitacion.tables.tableIdiomas.obj = objViewCapacitacion.vars.capacitacion.tables.tableIdiomas.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});
        objViewCapacitacion.vars.capacitacion.tables.tableHabilidades.dom = $('#tableHabilidades');
        objViewCapacitacion.vars.capacitacion.tables.tableHabilidades.obj = objViewCapacitacion.vars.capacitacion.tables.tableHabilidades.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});

        // INIT ELEMENTS
        // FORMS
        objViewCapacitacion.vars.capacitacion.forms.Idiomas_dialectos_form = $('#Idiomas_dialectos_form');
        objViewCapacitacion.vars.capacitacion.forms.Habilidades_aptitudes_form = $('#Habilidades_aptitudes_form');
        // BUTTONS
        objViewCapacitacion.vars.capacitacion.btns.guardarIdioma = $('#guardarIdioma');
        objViewCapacitacion.vars.capacitacion.btns.guardarHabilidad = $('#guardarHabilidad');

        // INIT SELECTS
        objViewCapacitacion.vars.general.mainContentTab.find('select').select2({width : '100%'});
        $(document).on('focus', '.select2.select2-container', function (e) {
            if (e.originalEvent) {
                if ($(this).siblings('select').is(':enabled'))
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
        
        //FOCUSOUT
        
        //Rutina para verificar si se hace algún cambio en cualquier forulario
        $.each(objViewCapacitacion.vars.capacitacion.forms, function( index, value ) {
            var form = value;
            form.find('input, select').change(function(e) {
                form.removeData('hasSaved').removeData('hasDiscardChanges').removeData('withError');
                form.data('hasChanged',true);

                $(e.target).removeError();
            });
        });
        
        //CAMBIO DE TABS
        objViewCapacitacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('hide.bs.tab',function(e){ dynTabs.change({ discardFunction: objViewCapacitacion.actions.discartChanges}, e); } );
        objViewCapacitacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('show.bs.tab',dynTabs.showTab);
        objViewCapacitacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('shown.bs.tab',objViewCapacitacion.events.change.tableResponsive);

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
            },
            capacitacion : {
                guardarIdioma : function(e, from, tabRef){
                    e.preventDefault();
                    objViewCapacitacion.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveCapacitacionIdioma',from, tabRef, function(data){
                        console.log(data);
                    });
                },
                guardarHabilidad : function(e, from, tabRef){
                    e.preventDefault();
                    objViewCapacitacion.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveCapacitacionHabilidad',from, tabRef, function(data){
                        console.log(data);
                    });
                }
            }
        },
        change : {
            tableResponsive : function(){
                $.each( objViewCapacitacion.vars.capacitacion.tables, function( key, value ) {
                    try{value.obj.responsive.rebuild().responsive.recalc();}catch(err){}
                });                
            }
        }
    },
    actions : {        
        discartChanges : function(e,eTab){
            var form = $('#' + $(eTab.currentTarget).attr('aria-controls')).find('form');
            form.closeAlert({alertType : 'alert-danger'});

            dynTabs.markTab(dynTabs.tabs.prebTab.linkRef,'<span class="text-warning tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true"></i></span>');
            Swal.close();
                
            dynTabs.tabs.prebTab.tabForm.removeData('hasChanged');
            dynTabs.tabs.prebTab.tabForm.data('hasDiscardChanges',true);

            $("#" + eTab.relatedTarget.id).trigger('click');
        },
        ajax : {
            callResponseValidations : function(form, data, from, tabRef, callback){
                try{
                    if (!data) 
                        throw new Error('Respuesta inesperada, favor de intentarlo de nuevo.');
                    if (!data.results)
                        throw new Error('Respuesta inesperada, favor de intentarlo de nuevo.');
                    if (typeof data.results.status === "undefined")
                        throw new Error('Estatus desconocido, favor de contactar a soporte.');
                    if (!data.results.status)
                        throw new Error(data.results.message ? data.results.message : 'Error desconocido.' );
                    
                    form.removeData('hasChanged').removeData('hasDiscardChanges').removeData('withError');
                    form.data('hasSaved',true);

                    if (from) {
                        if(from == 'tab') {
                            $(tabRef.relatedTarget).trigger('click');
                            dynTabs.markTab( $(tabRef.currentTarget),  '<span class="text-success tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true" ></i></span>');
                            return null;
                        }
                    }
                    dynTabs.markTab( dynTabs.getCurrentTab($('#myTabContent')).linkRef ,'<span class="text-success tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true" ></i></span>');

                    if (callback) 
                        if ($.isFunction( callback ))
                            callback(data); 

                }catch(err) {
                    objViewCapacitacion.actions.ajax.throwError(err,form,from,tabRef);
                }
            },
            throwError: function(err,form,from,tabRef){
                $.LoadingOverlay("hide");
                
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.message ? err.message : err.statusText
                });

                form.removeData('hasSaved').removeData('hasDiscardChanges');
                form.data('withError',true);

                if (from) {
                    if(from == 'tab') {
                        dynTabs.markTab( $(tabRef.currentTarget),  '<span class="text-danger tabMark mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>');
                        return null;
                    }
                }
                dynTabs.markTab( dynTabs.getCurrentTab($('#myTabContent')).linkRef,'<span class="text-danger tabMark mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>');
            },
            generateRequest: function($this,callUrl,from,tabRef, callback){
                var form = $this.parents('form:first');
                form.closeAlert({alertType : 'alert-danger'});
                
                try {
                    //VALID FORM
                    if (!form.valid())
                        throw new Error("Formulario incompleto");

                    $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
                    
                    $selectDisabled = form.find('select:disabled');
                    $selectDisabled.prop("disabled", false);

                    var model = form.serialize();
                    model += '&pID_ALTERNA=' + mainTabMenu.var.pID_ALTERNA;
                    model = {model : model};
                    model[csrf.token_name] = csrf.hash;

                    $selectDisabled.prop("disabled", true);
                    
                    $.post(callUrl,model,
                    function (data) {  
                        objViewCapacitacion.actions.ajax.callResponseValidations(form,data, from, tabRef, callback);
                    }).fail(function (err) {
                        objViewCapacitacion.actions.ajax.throwError(err,form,from,tabRef);                            
                    }).always(function () {
                        $.LoadingOverlay("hide");
                        MyCookie.session.reset();
                    });

                }catch(err) {
                    objViewCapacitacion.actions.ajax.throwError(err,form,from,tabRef);                        
                }
            }
        }
    }
}