var objView = {
    vars : {
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
                generarCIB : null,
                siguienteDatosPersonales : null
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
        objView.vars.datosGenerales.btns.siguienteDatosPersonales = $('#siguienteDatosPersonales');        

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
        objView.vars.datosGenerales.btns.siguienteDatosPersonales.on('click',objView.events.click.datosGenerales.siguienteDatosPersonales);
    },
    events : {
        click : {
            datosGenerales : {
                guardarDatosPersonales : function(e){
                    generic.click(
                    {
                        evt : e,
                        showLoading : false
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
                    generic.click(e,
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
                    generic.click(e,
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
    }
}