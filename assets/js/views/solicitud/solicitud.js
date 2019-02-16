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
            },
            objs : {
                pCURP : null
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
        // OBJS
        objView.vars.datosGenerales.objs.pCURP = $('#pCURP');

        // INIT SELECTS
        $('select').select2();
        
        // CLICK EVENTS
        objView.vars.datosGenerales.btns.guardarDatosPersonales.on('click',objView.events.click.datosGenerales.guardarDatosPersonales);
        objView.vars.datosGenerales.btns.generarCIB.on('click',objView.events.click.datosGenerales.generarCIB);
        objView.vars.general.btnSiguienteAnterior.on('click',objView.events.click.general.btnSiguienteAnterior);
        //FOCUSOUT
        objView.vars.datosGenerales.objs.pCURP.on('focusout',objView.events.focus.out.pCURP);      

        //CAMBIO DE TABS
        $('a[data-toggle="tab"]').on('hide.bs.tab',objView.actions.changeTab);
        $('a[data-toggle="tab"]').on('show.bs.tab',objView.actions.showTab);

        populate.form($('#Datos_personales_form')); //popular selects del primer tab NOTA: cambiar programación al tab actual si se obtiene por cookie
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
                }                
            }
        },
        focus : {
            out : {
                pCURP : function(){
                    $this = $(this);

                    var value = $(this).val();

                    if ( value.length < 18 || value.length > 20 )
                        return null;

                    $this.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                    //TODO: XMAL - Verificar si exite registro en BD

                    var callUrl = base_url + 'ajaxAPIs/curp',
                        model = {CURP : value};

                    //desactivar controles involucrados en la consulta CURP
                    $('.consultaCURP').readOnly();

                    generic.ajax.get(
                        callUrl,
                        model,
                        //success
                        function(data){
                            $('#pNOMBRE_DATOS_PERSONALES').val(data[0].nombres);
                            $('#pPATERNO_DATOS_PERSONALES').val(data[0].apellido1);
                            $('#pMATERNO_DATOS_PERSONALES').val(data[0].apellido2);
                            var dateParts = data[0].fechNac.split("/");
                            var dateObject = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]); 
                            date = moment( dateObject ).format('YYYY-MM-DD');
                            $('#pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES').val(date);
                        }, 
                        //error
                        function(err){
                            var msg = err.status + ' - ' + err.statusText;
                            swal({ type: 'error', title: 'Error', html: msg });                            
                        },
                        //always
                        function(){
                            $('.consultaCURP').resetReadOnly();
                            $this.LoadingOverlay("hide");
                        }
                    );
                }
            }
        },
        change : {            
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
                }                
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : 'Formulario incompleto'
                });

                //e.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, 200);
            }
        },
        showTab : function(e){ 
            var tabRefObj = $(e.currentTarget.hash),
                form = tabRefObj.find('form');
            
            populate.form(form);
        }
    }
}