var objViewDatosGenerales = {
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
        // objViewDatosGenerales.vars.table = $('#table').DataTable({"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"},"columnDefs": [{ "orderable": false, "targets": [2] }]});

        // INIT ELEMENTS
        // FORMS
        objViewDatosGenerales.vars.datosGenerales.forms.Datos_personales_form = $('#Datos_personales_form');
        objViewDatosGenerales.vars.datosGenerales.forms.Desarrollo_form = $('#Desarrollo_form');
        objViewDatosGenerales.vars.datosGenerales.forms.Domicilio_form = $('#Domicilio_form');
        objViewDatosGenerales.vars.datosGenerales.forms.Referencias_form = $('#Referencias_form');
        objViewDatosGenerales.vars.datosGenerales.forms.Socioeconomicos_form = $('#Socioeconomicos_form');
        // BUTTONS
        objViewDatosGenerales.vars.datosGenerales.btns.guardarDatosPersonales = $('#guardarDatosPersonales');        
        objViewDatosGenerales.vars.datosGenerales.btns.generarCIB = $('#generarCIB');        
        objViewDatosGenerales.vars.general.btnSiguienteAnterior = $('.btnSiguienteAnterior');
        // OBJS
        objViewDatosGenerales.vars.datosGenerales.objs.pCURP = $('#pCURP');

        // INIT SELECTS
        $('select').select2();

        //EVENTS
        //SUBMIT
        $("form").attr('novalidate', 'novalidate');
        $('form').submit(function(e){
            e.preventDefault();
        });
        // CLICK
        objViewDatosGenerales.vars.datosGenerales.btns.guardarDatosPersonales.on('click',objViewDatosGenerales.events.click.datosGenerales.guardarDatosPersonales);
        objViewDatosGenerales.vars.datosGenerales.btns.generarCIB.on('click',objViewDatosGenerales.events.click.datosGenerales.generarCIB);
        objViewDatosGenerales.vars.general.btnSiguienteAnterior.on('click',objViewDatosGenerales.events.click.general.btnSiguienteAnterior);
        //FOCUSOUT
        objViewDatosGenerales.vars.datosGenerales.objs.pCURP.on('focusout',objViewDatosGenerales.events.focus.out.pCURP);      
        //CHANGE

        //Rutina para verificar si se hace algún cambio en cualquier forulario
        $.each(objViewDatosGenerales.vars.datosGenerales.forms, function( index, value ) {
            var form = value;
            form.find('input, select').change(function(e) {
                form.removeData('hasSaved');
                form.removeData('hasDiscardChanges');
                form.data('hasChanged',true);

                console.log(e);
                $(e.target).removeError();
            });
        });
        
        //CAMBIO DE TABS
        $('a[data-toggle="tab"]').on('hide.bs.tab',function(e){ dynTabs.change({ discardFunction: objViewDatosGenerales.actions.discartChanges}, e); } );
        $('a[data-toggle="tab"]').on('show.bs.tab',dynTabs.showTab);

        populate.form($('#Datos_personales_form')); //popular selects del primer tab NOTA: cambiar programación al tab actual si se obtiene por cookie
        dynTabs.setCurrentTab($('#myTabContent'));
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
                guardarDatosPersonales : function(e, from){
                    e.preventDefault();

                    var $this = $(this),
                        form = $this.parents('form:first');
                    
                    form.closeAlert({alertType : 'alert-danger'});

                    //VALID FORM
                    try {
                        if (!objViewDatosGenerales.vars.datosGenerales.forms.Datos_personales_form.valid())
                            //throw "Invalid FORM"; //TODO: Xmal - Quitar comentario al implementar

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
                                console.log(data);
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
                generarCIB : function(e){
                    e.preventDefault();

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

                    if ($this.data('find') == value)
                        return null;

                    $this.removeError();
                    if (value == 0) return null;
                    if ( value.length < 18 || value.length > 20 ) {
                        $this.setError('Formato de CURP incorrecto');
                        return null;
                    }

                    $this.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                    //TODO: XMAL - Verificar si exite registro en BD

                    var callUrl = base_url + 'ajaxAPIs/curp',
                        model = {CURP : value};

                    //desactivar controles involucrados en la consulta CURP
                    $('.consultaCURP').readOnly();

                    generic.ajax.async.get(
                        callUrl,
                        model,
                        //success
                        function(data){
                            $this.data('find',value);

                            $('#pNOMBRE_DATOS_PERSONALES').val(data[0].nombres);
                            $('#pPATERNO_DATOS_PERSONALES').val(data[0].apellido1);
                            $('#pMATERNO_DATOS_PERSONALES').val(data[0].apellido2);
                            $('#pSEXO_DATOS_PERSONALES').val(data[0].sexo);
                            $('#pSEXO_DATOS_PERSONALES').select2(); //ACTUALIZAR SELECT PARA QUE SE MUESTRE LA SELECCIÓN

                            var dateParts = data[0].fechNac.split("/");
                            var dateObject = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]); 
                            date = moment( dateObject ).format('YYYY-MM-DD');
                            $('#pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES').val(date);

                            $('#pNOMBRE_DATOS_PERSONALES').removeError();
                            $('#pPATERNO_DATOS_PERSONALES').removeError();
                            $('#pMATERNO_DATOS_PERSONALES').removeError();
                            $('#pSEXO_DATOS_PERSONALES').removeError();
                            $('#pSEXO_DATOS_PERSONALES').removeError();
                            $('#pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES').removeError();

                        }, 
                        //error
                        function(err){
                            var msg = err.status + ' - ' + err.statusText;
                            swal({ type: 'error', title: 'Error', html: msg }); 
                            $this.setError(err.statusText);
                            $('.consultaCURP').resetReadOnly();
                        },
                        //always
                        function(){
                            //
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
        discartChanges : function(e){   
            dynTabs.markTab(dynTabs.tabs.prebTab.linkRef,'<span class="text-warning tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true"></i></span>');
            Swal.close();
                
            dynTabs.tabs.prebTab.tabForm.removeData('hasChanged');
            dynTabs.tabs.prebTab.tabForm.data('hasDiscardChanges',true);
            dynTabs.tabs.prebTab.tabForm.find('.btnSiguienteAnterior.siguienteTab').trigger('click');
        }
    }
}