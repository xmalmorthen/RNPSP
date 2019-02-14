var objView = {
    vars : {
        general : {
            btnSiguienteAnterior : null
        },
        datosGenerales : {
            forms : {
                Datos_personales_form : null,
                Desarrollo_form : null,
                Domicilio_form : null,
                Referencias_form : null,
                Socioeconomicos_form : null
            },
            btns : {
                guardarDatosPersonales : null,
                generarCIB : null
            }
        }
    },
    init : function(){
        // INIT DATATABLE
        // objView.vars.table = $('#table').DataTable({"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"},"columnDefs": [{ "orderable": false, "targets": [2] }]});

        // INIT ELEMENTS
        // FORMS
        objView.vars.datosGenerales.forms.Datos_personales_form = $('#Datos_personales_form');
        objView.vars.datosGenerales.forms.Desarrollo_form = $('#Desarrollo_form');
        objView.vars.datosGenerales.forms.Domicilio_form = $('#Domicilio_form');
        objView.vars.datosGenerales.forms.Referencias_form = $('#Referencias_form');
        objView.vars.datosGenerales.forms.Socioeconomicos_form = $('#Socioeconomicos_form');
        // BUTTONS
        objView.vars.datosGenerales.btns.guardarDatosPersonales = $('#guardarDatosPersonales');        
        objView.vars.datosGenerales.btns.generarCIB = $('#generarCIB');        
        
        objView.vars.general.btnSiguienteAnterior = $('.btnSiguienteAnterior');

        // INIT SELECTS
        $('select').select2();

        // INIT DATEPICKER
        // $('.singledatepicker').daterangepicker({
        //     singleDatePicker: true,
        //     showDropdowns: true,
        // });

        // CLICK EVENTS
        objView.vars.datosGenerales.btns.guardarDatosPersonales.on('click',objView.events.click.datosGenerales.guardarDatosPersonales);
        objView.vars.datosGenerales.btns.generarCIB.on('click',objView.events.click.datosGenerales.generarCIB);
        objView.vars.general.btnSiguienteAnterior.on('click',objView.events.click.general.btnSiguienteAnterior);
        $('a[data-toggle="tab"]').on('hide.bs.tab',objView.actions.changeTab);
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
            datosGenerales : {
                guardarDatosPersonales : function(e){
                    generic.click(
                    {
                        evt : e
                    },
                    //event
                    function(){
                        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                        //VALID FORM
                        try {
                            if (!objView.vars.datosGenerales.forms.Datos_personales_form.valid())
                                throw "Invalid FORM";
                        }catch(err) {
                            $.LoadingOverlay("hide");
                        }

                        var callUrl = base_url + 'Ejemplos/ajaxGetSample';
                        model = {
                            var1 : 'val1',
                            var2 : 'val2'
                        };
                        generic.ajax.get(
                            callUrl,
                            model,
                            //success
                            function(data){
                                console.log(data);
                                $.LoadingOverlay("hide");
                            },
                            //error
                            function(err){
                                $.LoadingOverlay("hide");
                                var msg = err.status + ' - ' + err.statusText;
                                swal({ type: 'error', title: 'Error', html: msg });
                            }
                        );                        
                    }, 
                    //success
                    function (successResponse){                        
                    }, 
                    //error
                    function(){
                    });
                },
                generarCIB : function(e){
                    generic.click(
                    {
                        evt : e
                    },
                    //event
                    function(){
                        //TODO: IMPLEMENTAR
                        alert('Implementar generarCIB');
                    }, 
                    //success
                    function (successResponse){                        
                    }, 
                    //error
                    function(){
                        $.LoadingOverlay("hide");
                        var msg = err.status + ' - ' + err.statusText;
                        swal({ type: 'error', title: 'Error', html: msg });
                    });
                },
                siguienteDatosPersonales : function(e){
                    generic.click(
                    {
                        evt : e
                    },
                    //event
                    function(){
                        //TODO: IMPLEMENTAR
                        alert('Implementar siguienteDatosPersonales');
                    }, 
                    //success
                    function (successResponse){
                    }, 
                    //error
                    function(){
                        $.LoadingOverlay("hide");
                        var msg = err.status + ' - ' + err.statusText;
                        swal({ type: 'error', title: 'Error', html: msg });
                    });
                }
            }
        }
    },
    actions : {
        changeTab : function(e){ 
            var tabRefObj = $(e.currentTarget.hash),
                form = tabRefObj.find('form');

            //VALIDATE FORM
            if (!form.valid()){                
                var linkRef = $('#' + e.currentTarget.id);
                if (!linkRef.hasClass('errorValidation')) {
                    linkRef.prepend('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ');
                    linkRef.addClass('text-danger errorValidation');
                    form.prepend('<div class="alert alert-danger mt-4 mb-0" role="alert">Faltan datos requeridos!!!</div>');
                    
                }
                e.preventDefault();
                $("html, body").animate({ scrollTop: $('nav nav-tabs').offset().top }, 200);
            }
        }
    }
}