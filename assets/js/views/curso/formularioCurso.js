var objViewFormularioCurso = {
    vars : {
        general : {
            init : false,
        },
        FormularioCurso : {
            forms : {
                Validar_examen_form : null,
            },
            btns : {
                guardar : null
            }
        }
    },
    init : function(){
        if (objViewFormularioCurso.vars.general.init)
            return false;
        
        // INIT ELEMENTS
        // FORMS
        objViewFormularioCurso.vars.FormularioCurso.forms.Validar_examen_form = $('#Validar_examen_form');
        
        objViewFormularioCurso.vars.FormularioCurso.forms.Validar_examen_form.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

        // BUTTONS
        objViewFormularioCurso.vars.FormularioCurso.btns.guardar = $('#guardar');

        // INIT SELECTS
        objViewFormularioCurso.vars.FormularioCurso.forms.Validar_examen_form.find('select').select2({width : '100%'});
        $(document).on('focus', '.select2.select2-container', function (e) {
            if (e.originalEvent) {
                if ($(this).siblings('select').is(':enabled'))
                    $(this).siblings('select').select2('open');
            }
        });

        //EVENTS
        //SUBMIT
        objViewFormularioCurso.vars.FormularioCurso.forms.Validar_examen_form.attr('novalidate', 'novalidate');
        objViewFormularioCurso.vars.FormularioCurso.forms.Validar_examen_form.submit(function(e){
            e.preventDefault();
        });

        // CLICK
        objViewFormularioCurso.vars.FormularioCurso.btns.guardar.on('click',objViewFormularioCurso.events.click.FormularioCurso.guardar);
               
        objViewFormularioCurso.ajax.populateCmbCurso();

        $('#pFECHA_INICIO').attr('max', moment( new Date() ).format('YYYY-MM-DD'));

        $.validator.addMethod("FECHA_FIN", function(value, element) {
            
            return value < $('#pFECHA_INICIO').val() ? false : true;

        }, "La fecha debe ser mayor o igual a la fecha de inicio del curso.");

        objViewFormularioCurso.vars.FormularioCurso.forms.Validar_examen_form.LoadingOverlay("hide");

        
        objViewFormularioCurso.vars.general.init = true;
    },
    events : {
        click : {
            general : {
            },
            FormularioCurso : {
                guardar : function(e){
                    e.preventDefault();

                    var form = objViewFormularioCurso.vars.FormularioCurso.forms.Validar_examen_form;
                    form.closeAlert({alertType : 'alert-danger'});
                    
                    try {
                        //VALID FORM
                        if (!form.valid())
                            throw new Error("Formulario incompleto");

                        Swal.fire({
                            title: 'Confirmación',
                            html: "¿Seguro que desea guardar el curso?",
                            type: 'question',
                            allowOutsideClick : false,
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',                            
                        }).then(function(result){
                            if (result.value && !result.dismiss ){
                                
                                $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
                        
                                $selectDisabled = form.find('select:disabled');
                                $selectDisabled.prop("disabled", false);

                                var model = form.serialize();
                                model = {model : model};
                                model[csrf.token_name] = csrf.hash;

                                $selectDisabled.prop("disabled", true);

                                var callUrl = base_url + "Curso/ajaxValidar";

                                $.post(callUrl,model,
                                function (data) {  
                                    
                                    var alertOpt = {
                                        alertType : !data.results.status ? 'alert-danger' : 'alert-success',
                                        dismissible : true,
                                        header : !data.results.status ? '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error' : '<i class="fa fa-check" aria-hidden="true"></i> Guardado',
                                        msg : data.results.message
                                    };
                                    form.setAlert(alertOpt);
                                    
                                    form.trigger('reset');
                                    $('select').trigger('change');
                                    
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

                                    $.LoadingOverlay("hide",true);
                                    MyCookie.session.reset();

                                });

                            }
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
    ajax:{
        populateCmbCurso: function(){
            
            var cmbSelect = $('#pID_CURSO');
            var callUrl = base_url + "ajaxCatalogos/index";
            
            cmbSelect.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
            
            $.get(callUrl,{
                qry : cmbSelect.data('query')
            },
            function (data) {
                cmbSelect.append('<option disabled selected value>Seleccione una opción</option>');
                
                data.results.forEach(item => {
                    var option = new Option(item.text,item.id);
                    cmbSelect.append(option);
                });

                cmbSelect.val(null).trigger("change");

            }).fail(function (err) {

            }).always(function () {   
                MyCookie.session.reset();
                cmbSelect.LoadingOverlay("hide");
            });
        }
    }
}