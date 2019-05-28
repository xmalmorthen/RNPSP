var objViewFormularioExamen = {
    vars : {
        general : {
            init : false,
        },
        FormularioExamen : {
            forms : {
                Validar_examen_form : null,
            },
            btns : {
                guardar : null
            }
        }
    },
    init : function(){
        if (objViewFormularioExamen.vars.general.init)
            return false;
        
        // INIT ELEMENTS
        // FORMS
        objViewFormularioExamen.vars.FormularioExamen.forms.Validar_examen_form = $('#Validar_examen_form');
        
        objViewFormularioExamen.vars.FormularioExamen.forms.Validar_examen_form.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

        // BUTTONS
        objViewFormularioExamen.vars.FormularioExamen.btns.guardar = $('#guardar');

        // INIT SELECTS
        objViewFormularioExamen.vars.FormularioExamen.forms.Validar_examen_form.find('select').select2({width : '100%'});
        $(document).on('focus', '.select2.select2-container', function (e) {
            if (e.originalEvent) {
                if ($(this).siblings('select').is(':enabled'))
                    $(this).siblings('select').select2('open');
            }
        });

        //EVENTS
        //SUBMIT
        objViewFormularioExamen.vars.FormularioExamen.forms.Validar_examen_form.attr('novalidate', 'novalidate');
        objViewFormularioExamen.vars.FormularioExamen.forms.Validar_examen_form.submit(function(e){
            e.preventDefault();
        });

        // CLICK
        objViewFormularioExamen.vars.FormularioExamen.btns.guardar.on('click',objViewFormularioExamen.events.click.FormularioExamen.guardar);

        objViewFormularioExamen.vars.FormularioExamen.forms.Validar_examen_form.LoadingOverlay("hide");

        objViewFormularioExamen.vars.general.init = true;
    },
    events : {
        click : {
            general : {
            },
            FormularioExamen : {
                guardar : function(e){
                    e.preventDefault();

                    var form = objViewFormularioExamen.vars.FormularioExamen.forms.Validar_examen_form;
                    form.closeAlert({alertType : 'alert-danger'});
                    
                    try {
                        //VALID FORM
                        if (!form.valid())
                            throw new Error("Formulario incompleto");

                        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
                        
                        $selectDisabled = form.find('select:disabled');
                        $selectDisabled.prop("disabled", false);

                        var model = form.serialize();
                        model = {model : model};
                        model[csrf.token_name] = csrf.hash;

                        $selectDisabled.prop("disabled", true);

                        var callUrl = base_url + "Examen/ajaxValidar";

                        $.post(callUrl,model,
                        function (data) {  
                            
                            var alertOpt = {
                                alertType : !data.results.status ? 'alert-danger' : 'alert-success',
                                dismissible : true,
                                header : !data.results.status ? '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error' : '<i class="fa fa-check" aria-hidden="true"></i> Guardado',
                                msg : data.results.message
                            };
                            form.setAlert(alertOpt);
                            form.data('withError',false);

                        }).fail(function (err) {
                            
                            form.setAlert({
                                alertType :  'alert-danger',
                                dismissible : true,
                                header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                                msg : err.message ? err.message : err.statusText
                            });
                            
                            form.data('withError',true);

                        }).always(function () {      

                            $.LoadingOverlay("hide");
                            MyCookie.session.reset();

                        });

                    }catch(err) {

                        form.setAlert({
                            alertType :  'alert-danger',
                            dismissible : true,
                            header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                            msg : err.message ? err.message : err.statusText
                        });

                    }

                }                
            }
        }
    },
    ajax:{}
}