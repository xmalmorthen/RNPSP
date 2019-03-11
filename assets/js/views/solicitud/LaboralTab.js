var objViewLaboral = {
    vars : {
        general : {
            init : false,
        },
        laboral : {
            forms : {
                Adscripcion_actual_form : null,
                Empleos_diversos_form : null,
                Actitudes_hacia_el_empleo_form : null,
                Comisiones_form : null
            },
            btns : {
                guardarAdscripcion : null,
                guardarEmpleo : null,
                guardarActitud : null,
                guardarComision : null
            },
            cmbs : {
                pID_INSTITUCION : null,
            },
            tables : {
                tableAdscripcionactual : {
                    obj : null,
                    dom : null
                },
                tableEmpleosdiversos  : {
                    obj : null,
                    dom : null
                },
                tableComisiones  : {
                    obj : null,
                    dom : null
                }
            }
        }
    },
    init : function(callback){        
        if (objViewLaboral.vars.general.init)
            return false;

        $('#myTabContent').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
        
        objViewLaboral.vars.general.mainContentTab = $('#Laboral');
        
        // INIT DATATABLE
        objViewLaboral.vars.laboral.tables.tableAdscripcionactual.dom = $('#tableAdscripcionactual');
        objViewLaboral.vars.laboral.tables.tableAdscripcionactual.obj = objViewLaboral.vars.laboral.tables.tableAdscripcionactual.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});
        objViewLaboral.vars.laboral.tables.tableEmpleosdiversos.dom = $('#tableEmpleosdiversos');
        objViewLaboral.vars.laboral.tables.tableEmpleosdiversos.obj = objViewLaboral.vars.laboral.tables.tableEmpleosdiversos.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});
        objViewLaboral.vars.laboral.tables.tableComisiones.dom = $('#tableComisiones');
        objViewLaboral.vars.laboral.tables.tableComisiones.obj = objViewLaboral.vars.laboral.tables.tableComisiones.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});

        // INIT ELEMENTS
        // FORMS
        objViewLaboral.vars.laboral.forms.Adscripcion_actual_form = $('#Adscripcion_actual_form');
        objViewLaboral.vars.laboral.forms.Empleos_diversos_form = $('#Empleos_diversos_form');
        objViewLaboral.vars.laboral.forms.Actitudes_hacia_el_empleo_form = $('#Actitudes_hacia_el_empleo_form');
        objViewLaboral.vars.laboral.forms.Comisiones_form = $('#Comisiones_form');
        // BUTTONS
        objViewLaboral.vars.laboral.btns.guardarAdscripcion = $('#guardarAdscripcion');
        objViewLaboral.vars.laboral.btns.guardarEmpleo = $('#guardarEmpleo');
        objViewLaboral.vars.laboral.btns.guardarActitud = $('#guardarActitud');
        objViewLaboral.vars.laboral.btns.guardarComision = $('#guardarComision');

        // SELECTS
        objViewLaboral.vars.laboral.cmbs.pID_INSTITUCION = $('#pID_INSTITUCION');

        // INIT SELECTS
        objViewLaboral.vars.general.mainContentTab.find('select').select2({width : '100%'});
        $(document).on('focus', '.select2.select2-container', function (e) {
            if (e.originalEvent) {
                if ($(this).siblings('select').is(':enabled'))
                    $(this).siblings('select').select2('open');
            }
        });

        //EVENTS
        //SUBMIT
        objViewLaboral.vars.general.mainContentTab.find("form").attr('novalidate', 'novalidate');
        objViewLaboral.vars.general.mainContentTab.find('form').submit(function(e){
            e.preventDefault();
        });
        // CLICK
        objViewLaboral.vars.laboral.btns.guardarAdscripcion.on('click',objViewLaboral.events.click.laboral.guardarAdscripcion);
        objViewLaboral.vars.laboral.btns.guardarEmpleo.on('click',objViewLaboral.events.click.laboral.guardarEmpleo);
        objViewLaboral.vars.laboral.btns.guardarActitud.on('click',objViewLaboral.events.click.laboral.guardarActitud);
        objViewLaboral.vars.laboral.btns.guardarComision.on('click',objViewLaboral.events.click.laboral.guardarComision);
        
        //FOCUSOUT
        
        //CHANGE
        //objViewLaboral.vars.laboral.cmbs.pID_INSTITUCION.on('select2:select',objViewLaboral.events.change.pID_INSTITUCION);
        objViewLaboral.vars.laboral.cmbs.pID_INSTITUCION.on('change',objViewLaboral.events.change.pID_INSTITUCION);

        //CAMBIO DE TABS
        objViewLaboral.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('hide.bs.tab',function(e){ dynTabs.change({ discardFunction: objViewLaboral.actions.discartChanges}, e); } );
        objViewLaboral.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('show.bs.tab',dynTabs.showTab);
        objViewLaboral.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('shown.bs.tab',objViewLaboral.events.change.tableResponsive);

        populate.form($('#Adscripcion_actual_form')); //popular selects del primer tab NOTA: cambiar programación al tab actual si se obtiene por cookie
        dynTabs.setCurrentTab($('#myTabContent'));

        mainTabMenu.actions.changeTab();        

        objViewLaboral.vars.general.init = true;

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
            laboral : {
                guardarAdscripcion : function(e, from, tabRef){
                    e.preventDefault();
                    objViewLaboral.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveLaboralAdscripcion',from, tabRef, true, function(data){
                        console.log(data);
                        debugger;
                    });
                },
                guardarEmpleo : function(e, from, tabRef){
                    e.preventDefault();
                    objViewLaboral.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveLaboralEmpleo',from, tabRef, true, function(data){
                        console.log(data);
                        debugger;
                    });
                },
                guardarActitud : function(e, from, tabRef){
                    e.preventDefault();
                    objViewLaboral.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveLaboralActitud',from, tabRef, false, function(data){
                        console.log(data);
                        debugger;
                    });
                },
                guardarComision : function(e, from, tabRef){
                    e.preventDefault();
                    objViewLaboral.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveLaboralComision',from, tabRef, true, function(data){
                        console.log(data);
                        debugger;
                    });
                }
            }
        },
        change : {
            pID_INSTITUCION : function(e){
                var $this = $(this),
                    valInstitucion = $this.val(),
                    valDependencia = $('#pID_DEPENDENCIA_ADSCRIPCION_ACTUAL').val();

                if (!valInstitucion) return null;

                $('#pID_ENTIDAD_ADSCRIPCION_ACTUAL').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                var callUrl = base_url + 'ajaxCatalogos';
                $.get(callUrl,
                {
                    qry : 'bTgxZG9aN21oYUhOaDZ6RUxFQ2dJNGo0QmczOXgxNGlodVpVbnJYY0ljNk5yeU5NT3k0NzdvWHVYdm5QR2tNeDNyWGRBQzg3TmpZZGFqV1BQMitOUmZTZnl5OEYrdTNYcmw2R1Q2SHEvUmF3cXBaSjNKZkEwcmRUN0FERzh5a0U=',
                    params : 'ID_INSTITUCION=' + valInstitucion
                },
                function (data) {
                    if (!data)
                        return null;

                    var id = data.results[0].ID_ENTIDAD;
                    if (id) 
                        $('#pID_ENTIDAD_ADSCRIPCION_ACTUAL').val(id).trigger('change').trigger('change.select2');
                }).fail(function (err) {})
                .always(function () {
                    $('#pID_ENTIDAD_ADSCRIPCION_ACTUAL').LoadingOverlay("hide");
                    MyCookie.session.reset();
                });
                
                $('#pID_AREA').getCatalog({
                    query : 'dlIwdE11aDdRNlltQitFQjRFVWd6UXZGbUFDS2xxeFJpNDA2b1pkUi9GMUtabi9ncDZERVVDTnlMLzBEakEwTzAybnVNa0RUUGdlek92bjNmZWozNkVCbU12UG5MdUZZVExjdnZvczdwbm43c0lONnAyeHFSUU96SWlkd3NDZVQ=',
                    params :  '[ID_DEPENDENCIA]=' + valDependencia + ' and [ID_INSTITUCION]=' + valInstitucion,
                    emptyOption : true
                });
            },
            tableResponsive : function(){
                $.each( objViewLaboral.vars.laboral.tables, function( key, value ) {
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
            callResponseValidations : function(form, data, from, tabRef, resetForm, callback){
                try{
                    if (!data) 
                        throw new Error('Respuesta inesperada, favor de intentarlo de nuevo.');
                    if (!data.results)
                        throw new Error('Respuesta inesperada, favor de intentarlo de nuevo.');
                    if (typeof data.results.status === "undefined")
                        throw new Error('Estatus desconocido, favor de contactar a soporte.');
                    if (!data.results.status)
                        throw new Error(data.results.message ? data.results.message : 'Error desconocido.' );
                    
                    if (resetForm) {
                        form[0].reset();                        
                    }

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
                    objViewLaboral.actions.ajax.throwError(err,form,from,tabRef);
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
            generateRequest: function($this,callUrl,from,tabRef, resetForm, callback){
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
                        objViewLaboral.actions.ajax.callResponseValidations(form,data, from, tabRef, resetForm, callback);
                    }).fail(function (err) {
                        objViewLaboral.actions.ajax.throwError(err,form,from,tabRef);                            
                    }).always(function () {
                        $.LoadingOverlay("hide");
                        MyCookie.session.reset();
                    });

                }catch(err) {
                    objViewLaboral.actions.ajax.throwError(err,form,from,tabRef);                        
                }
            }
        }
    }
}