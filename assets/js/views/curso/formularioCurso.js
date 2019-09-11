var objViewFormularioCurso = {
    vars : {
        general : {
            init : false,
        },
        FormularioCurso : {
            forms : {
                Validar_examen_form : null,
            },
            cmbs: {
                pTIPO_CURSO : null,
                pID_CURSO: null
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

        // SELECTS
        objViewFormularioCurso.vars.FormularioCurso.cmbs.pTIPO_CURSO = $('#pTIPO_CURSO');
        objViewFormularioCurso.vars.FormularioCurso.cmbs.pID_CURSO = $('#pID_CURSO');

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
               
        // CHANGE
        objViewFormularioCurso.vars.FormularioCurso.cmbs.pTIPO_CURSO.on('change',objViewFormularioCurso.events.change.pTIPO_CURSO);

        objViewFormularioCurso.ajax.populateCmbTipoCurso();

        $('#pFECHA_INICIO').attr('max', moment( new Date() ).format('YYYY-MM-DD'));

        $.validator.addMethod("pFECHA_FIN", function(value, element) {
            
            return value < $('#pFECHA_INICIO').val() ? false : true;

        }, "La fecha debe ser mayor o igual a la fecha de inicio del curso.");

        $.validator.addMethod("pVIGENCIA", function(value, element) {
            
            return value < $('#pFECHA_FIN').val() ? false : true;

        }, "La fecha debe ser mayor o igual a la fecha final del curso.");

        objViewFormularioCurso.vars.FormularioCurso.forms.Validar_examen_form.LoadingOverlay("hide");

        objViewFormularioCurso.vars.general.init = true;

        objViewFormularioCurso.fireInitEvent();
        
    },
    fireInitEvent : function(){
        Swal.fire({
            title: 'Clave CURP',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            showLoaderOnConfirm: true,
            preConfirm: function(CURP) {
                try {

                    if (CURP.length == 0)
                        throw new Error('Debe especificar la clave CURP');
                    else if (CURP.length < 18 || CURP.length > 20)
                        throw new Error('Formato de CURP incorrecto');

                    return new Promise(function(resolve, reject) {

                        var callUrl = base_url + 'Curso/ajaxGetData';

                        $.get(callUrl,{
                            CURP : CURP.toUpperCase()
                        },
                        function (data) {
                            
                            if (!data){
                                reject('Ocurrió un problema, favor de intentarlo de nuevo.');
                            } else if (data.results.status != true){
                                reject(data.results.message);
                            } else {

                                $('#pCURP').html(CURP.toUpperCase());
                                $('#pFECHA_NAC').html(data.results.data.FECHANAC);
                                $('#pNOMBRE').html(data.results.data.NOMBRE);
                                $('#pPATERNO').html(data.results.data.PATERNO);
                                $('#pMATERNO').html(data.results.data.MATERNO);

                                resolve (true);
                            }

                        }).fail(function (err) {    
                            
                            reject(err);

                        });

                    }).then( function(response) {
                        return true;
                    }).catch( function(err) {
                        Swal.showValidationMessage(err.statusText ? err.statusText : (err.message ? err.message : err));
                    });

                } catch (error) {

                    Swal.showValidationMessage(error);

                }
            },
            allowOutsideClick: false,
            onBeforeOpen: function() {  
                $('.swal2-container').css('z-index','2000');
                $('.swal2-container').data('preserve',true).data('preserveCall','mainTabMenu.mainInit');
            }
        }).then(function(result) {
            if ( typeof result.dismiss !== 'undefined') {
                window.location.href = base_url;
            }
        });
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

                                var callUrl = base_url + "Curso/ajaxSaveCurso";

                                $.post(callUrl,model,
                                function (data) {  
                                    
                                    Swal.fire({
                                        title: 'Guardado',
                                        html: "Curso registrado con éxito",
                                        type: 'info',                                        
                                    }).then(function(result){

                                        form.trigger('reset');
                                        $('select').trigger('change');
                                        form.data('withError',false);

                                        objViewFormularioCurso.fireInitEvent();

                                    });

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
        },
        change : {
            pTIPO_CURSO : function(e){

                let cmbSelect = objViewFormularioCurso.vars.FormularioCurso.cmbs.pID_CURSO;
                let callUrl = base_url + "ajaxCatalogos/index";
                
                cmbSelect.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
                cmbSelect.prop("disabled", true);
                
                $.get(callUrl,{
                    qry : cmbSelect.data('query'),
                    params : "ID_TIPO_CAPACITACI = " + objViewFormularioCurso.vars.FormularioCurso.cmbs.pTIPO_CURSO.val()
                },
                function (data) {

                    if (!data){
                        cmbSelect.setError('ERROR al actualizar');
                        return null;
                    }

                    cmbSelect.empty().append('<option disabled selected value>Seleccione una opción</option>');
                    
                    data.results.forEach(item => {
                        option = new Option(item.text,item.id);
                        cmbSelect.append(option);
                    });

                    cmbSelect.val(null).trigger("change");
                    cmbSelect.prop("disabled", false);

                }).fail(function (err) {

                }).always(function () {   
                    MyCookie.session.reset();
                    cmbSelect.LoadingOverlay("hide", true);
                });

            }

        }
    },
    ajax:{
        populateCmbTipoCurso: function(){
            
            let cmbSelect = $('#pTIPO_CURSO');
            let callUrl = base_url + "ajaxCatalogos/index";
            
            cmbSelect.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
            cmbSelect.prop("disabled", true);
            
            $.get(callUrl,{
                qry : cmbSelect.data('query')
            },
            function (data) {

                if (!data){
                    cmbSelect.setError('ERROR al actualizar');
                    return null;
                }

                cmbSelect.empty().append('<option disabled selected value>Seleccione una opción</option>');
                
                data.results.forEach(item => {
                    option = new Option(item.text,item.id);
                    cmbSelect.append(option);
                });

                cmbSelect.val(null).trigger("change");
                cmbSelect.prop("disabled", false);

            }).fail(function (err) {

            }).always(function () {   
                MyCookie.session.reset();
                cmbSelect.LoadingOverlay("hide", true);
            });
        }
    }
}