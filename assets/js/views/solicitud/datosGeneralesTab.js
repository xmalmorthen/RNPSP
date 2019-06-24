var objViewDatosGenerales = {
    vars : {
        general : {
            init : false,
            datosGeneralesContentTab : null,
        },
        datosGenerales : {
            forms : {
                Datos_personales_form : null,
                Datos_personales_CIB_form : null,
                Desarrollo_form : null,
                Domicilio_form : null,
                Referencias_form : null,
                Socioeconomicos_form : null,
                Dependientes_form : null
            },
            btns : {
                guardarDatosPersonales : null,
                generarCIB : null,
                guardarDesarrolloacademico : null,
                guardarDomicilio : null,
                guardarReferencia : null,
                guardarSocioeconomico : null,
                guardarDependiente: null
            },
            objs : {
                pCURP : null
            },
            tables : {
                tableDatospersonales : {
                    obj : null,
                    dom : null
                },
                tableDesarrollo  : {
                    obj : null,
                    dom : null
                },
                tableDomicilio  : {
                    obj : null,
                    dom : null
                },
                tableReferencias : {
                    obj : null,
                    dom : null
                },
                tableSocioeconomicos: {
                    obj : null,
                    dom : null
                }
            }
        }
    },
    init : function(callback){
        if (objViewDatosGenerales.vars.general.init)
            return false;

        $('#myTabContent').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

        objViewDatosGenerales.vars.general.mainContentTab = $('#datosGenerales');
        
        // INIT DATATABLE
        objViewDatosGenerales.vars.datosGenerales.tables.tableDatospersonales.dom = $('#tableDatospersonales');
        objViewDatosGenerales.vars.datosGenerales.tables.tableDatospersonales.obj = objViewDatosGenerales.vars.datosGenerales.tables.tableDatospersonales.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});
        objViewDatosGenerales.vars.datosGenerales.tables.tableDesarrollo.dom = $('#tableDesarrollo');
        objViewDatosGenerales.vars.datosGenerales.tables.tableDesarrollo.obj = objViewDatosGenerales.vars.datosGenerales.tables.tableDesarrollo.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}, "order": [[ 0, "desc" ]]});
        objViewDatosGenerales.vars.datosGenerales.tables.tableDomicilio.dom = $('#tableDomicilio');
        objViewDatosGenerales.vars.datosGenerales.tables.tableDomicilio.obj = objViewDatosGenerales.vars.datosGenerales.tables.tableDomicilio.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"},"order": [[ 0, "desc" ]]});        
        objViewDatosGenerales.vars.datosGenerales.tables.tableReferencias.dom = $('#tableReferencias');
        objViewDatosGenerales.vars.datosGenerales.tables.tableReferencias.obj = objViewDatosGenerales.vars.datosGenerales.tables.tableReferencias.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"},"order": [[ 0, "desc" ]]});        
        objViewDatosGenerales.vars.datosGenerales.tables.tableSocioeconomicos.dom = $('#tableSocioeconomicos');
        objViewDatosGenerales.vars.datosGenerales.tables.tableSocioeconomicos.obj = objViewDatosGenerales.vars.datosGenerales.tables.tableSocioeconomicos.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"},"order": [[ 0, "desc" ]]});

        // INIT ELEMENTS
        // FORMS
        objViewDatosGenerales.vars.datosGenerales.forms.Datos_personales_form = $('#Datos_personales_form');
        objViewDatosGenerales.vars.datosGenerales.forms.Datos_personales_CIB_form = $('#Datos_personales_CIB_form');
        objViewDatosGenerales.vars.datosGenerales.forms.Desarrollo_form = $('#Desarrollo_form');
        objViewDatosGenerales.vars.datosGenerales.forms.Domicilio_form = $('#Domicilio_form');
        objViewDatosGenerales.vars.datosGenerales.forms.Referencias_form = $('#Referencias_form');
        objViewDatosGenerales.vars.datosGenerales.forms.Socioeconomicos_form = $('#Socioeconomicos_form');
        objViewDatosGenerales.vars.datosGenerales.forms.Dependientes_form = $('#Dependientes_form');
        // BUTTONS
        objViewDatosGenerales.vars.datosGenerales.btns.guardarDatosPersonales = $('#guardarDatosPersonales');        
        objViewDatosGenerales.vars.datosGenerales.btns.generarCIB = $('#GUARDAR_CIB');
        objViewDatosGenerales.vars.datosGenerales.btns.guardarDesarrolloacademico = $('#guardarDesarrolloacademico');        
        objViewDatosGenerales.vars.datosGenerales.btns.guardarDomicilio = $('#guardarDomicilio');  
        objViewDatosGenerales.vars.datosGenerales.btns.guardarReferencia = $('#guardarReferencia');        
        objViewDatosGenerales.vars.datosGenerales.btns.guardarSocioeconomico = $('#guardarSocioeconomico');  
        objViewDatosGenerales.vars.datosGenerales.btns.guardarDependiente = $('#guardarDependiente');        

        // OBJS
        objViewDatosGenerales.vars.datosGenerales.objs.pCURP = $('#pCURP');

        // INIT SELECTS
        objViewDatosGenerales.vars.general.mainContentTab.find('select').select2({width : '100%'});
        $(document).on('focus', '.select2.select2-container', function (e) {
            if (e.originalEvent) {
                if ($(this).siblings('select').is(':enabled'))
                    $(this).siblings('select').select2('open');
            }
        });

        //EVENTS
        //SUBMIT
        objViewDatosGenerales.vars.general.mainContentTab.find("form").attr('novalidate', 'novalidate');
        objViewDatosGenerales.vars.general.mainContentTab.find('form').submit(function(e){
            e.preventDefault();
        });
        // CLICK
        objViewDatosGenerales.vars.datosGenerales.btns.guardarDatosPersonales.on('click',objViewDatosGenerales.events.click.datosGenerales.guardarDatosPersonales);
        objViewDatosGenerales.vars.datosGenerales.btns.generarCIB.on('click',objViewDatosGenerales.events.click.datosGenerales.generarCIB);

        objViewDatosGenerales.vars.datosGenerales.btns.guardarDesarrolloacademico.on('click',objViewDatosGenerales.events.click.datosGenerales.guardarDesarrolloacademico);
        objViewDatosGenerales.vars.datosGenerales.btns.guardarDomicilio.on('click',objViewDatosGenerales.events.click.datosGenerales.guardarDomicilio);
        objViewDatosGenerales.vars.datosGenerales.btns.guardarReferencia.on('click',objViewDatosGenerales.events.click.datosGenerales.guardarReferencia);
        objViewDatosGenerales.vars.datosGenerales.btns.guardarSocioeconomico.on('click',objViewDatosGenerales.events.click.datosGenerales.guardarSocioeconomico);
        objViewDatosGenerales.vars.datosGenerales.btns.guardarDependiente.on('click',objViewDatosGenerales.events.click.datosGenerales.guardarDependiente);
        
        //CHANGE
        $('#pID_GRADO_ESCOLAR').on("change", objViewDatosGenerales.events.change.pID_GRADO_ESCOLAR);
        $('#pID_PAIS_NAC').on("change", objViewDatosGenerales.events.change.pID_PAIS_NAC);
        $('#pID_NACIONALIDAD').on("change", objViewDatosGenerales.events.change.pID_NACIONALIDAD);
        
        //CAMBIO DE TABS
        objViewDatosGenerales.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('hide.bs.tab',function(e){ dynTabs.change({ discardFunction: objViewDatosGenerales.actions.discartChanges}, e); } );
        objViewDatosGenerales.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('show.bs.tab',dynTabs.showTab);        
        objViewDatosGenerales.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('shown.bs.tab',objViewDatosGenerales.events.change.tableResponsive);

        //FOCUSOUT
        $('input[type="date"]').on('focusout',function(event){
            $(this).val( $(this).val() );
        });
        
        populate.form($('#Datos_personales_form')); //popular selects del primer tab NOTA: cambiar programación al tab actual si se obtiene por cookie
        dynTabs.setCurrentTab($('#myTabContent'));

        mainTabMenu.actions.changeTab();

        $('#myTabContent').LoadingOverlay("hide");

        if (callback){
            if ($.isFunction( callback )){
                callback();
            }
        }

        objViewDatosGenerales.actions.ajax.populateCmbOperacion();

        $('#pFECHA_NACIONALIDAD, #pINICIO_DESARROLLO,#pFECHA_NAC_SOCIOECONOMICOS,#pTERMINO_DESARROLLO').attr('max', moment( new Date() ).format('YYYY-MM-DD'));
        // $('#pTERMINO_DESARROLLO').attr('min', moment( new Date() ).add(1,'days').format('YYYY-MM-DD') );

        $.validator.addMethod("validRFCFormat", function(value, element) {
            return validarInputRFC(value);
        }, "Formato incorrecto");

        $.validator.addMethod("validarCveElector", function(value, element) {
            return validarCveElector(value);
        }, "Formato incorrecto");

        $.validator.addMethod("validCIB", function(value, element) {        
            if ( $('#CIB').val() )
                return $('#motivoCIB').val() ? true : false;
            else
                return true;            
        }, "Información obligatoria.");

        $.validator.addMethod("validarMotivoCIB", function(value, element) {
            if ( $('#motivoCIB').val() )
                return $('#CIB').val() ? true : false;
            else
                return true;            
        }, "Información obligatoria.");

        $.validator.addMethod("validarNumberSpecial", function(value, element) {
            
            value = value.trim().toUpperCase();

            if ( isNaN(value) ) {
                if ( value != 'S/N' ) {
                   return false;
                }
            }

            return true;

        }, "Formato incorrecto.");
                            
        objViewDatosGenerales.vars.datosGenerales.forms.Datos_personales_form.validate({
            rules: {
                pRFC_DOMICILIO: {
                    validRFCFormat : true
                },
                pCREDENCIAL_ELECTOR: {
                    validarCveElector : true
                },
                CIB: {
                    validarMotivoCIB : true
                },
                motivoCIB: {
                    validCIB : true
                }
            }
        });
        
        $('#pTELEFONO_DOMICILIO').on('input', function () { 
            this.value = this.value.replace(/[^0-9\-\(\)]/g,'');
        });


        $(':input[type="number"]').on('input', function () { 
            this.value = this.value.replace(/[^0-9\-\(\)]/g,'');
        });

        $('.validarNumberSpecial').on('input', function () {
            this.value = this.value.replace(/[^0-9\-\(\)snSN\/]/g,'');
        });

        objViewDatosGenerales.vars.general.init = true;

        // $('#CIB,#motivoCIB').on('change',function(e){

        //     if ( $('#CIB').val().length == 0 && $('#motivoCIB').val().length == 0 ){
        //         $('#Datos_personales_CIB_form').removeData('hasChanged');
        //         $('#Datos_personales_CIB_form').closeAlert({alertType : 'alert-danger'});
        //         e.preventDefault();
        //         e.stopPropagation();
        //         e.stopImmediatePropagation();

        //     };

        // });

        $('#Datos_personales_form').find('input, select').removeData('hasSaved').removeData('hasDiscardChanges').removeData('withError').removeData('hasChanged');
    },
    events : {
        click : {
            general : {                
            },
            datosGenerales : {
                guardarDatosPersonales : function(e, from, tabRef){
                    e.preventDefault();                    

                    objViewDatosGenerales.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveDatosGeneralesDatosPersonales','', tabRef, false , function(data){
                        
                        mainTabMenu.var.pID_ALTERNA = data.results.data.pID_ALTERNA ? data.results.data.pID_ALTERNA : null;

                        if (mainTabMenu.var.pID_ALTERNA == null){
                            Swal.fire({
                                type: 'error',                        
                                title: 'Error',
                                html: "No se recuperó el ID ALTERNA",
                                allowOutsideClick : false,
                            }).then(function(result){
                                window.location.href = base_url + 'Solicitud';
                            });
                            return null;
                        }
                    });

                },
                generarCIB : function(e, from, tabRef){

                    if ( !from ) {
                        
                        $('#CIB,#motivoCIB').removeError();

                        if (  !$('#CIB').val() && !$('#motivoCIB').val() ) { 
                            $('#CIB,#motivoCIB').setError('Información obligatoria.');
                            $("#Datos_personales_CIB_form").setAlert({
                                alertType :  'alert-danger',
                                dismissible : true,
                                header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                                msg : 'Formulario incompleto'
                            });

                            $("#Datos_personales_CIB_form").removeData('hasSaved').removeData('hasDiscardChanges');
                            $("#Datos_personales_CIB_form").data('withError',true);

                            dynTabs.markTab( $('#Datos_personales-tab'),  '<span class="text-danger tabMark mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>');                            

                            return false;
                        }
                    }

                    if (  $('#CIB').val() && !$('#motivoCIB').val() ) {
                        $('#motivoCIB').setError('Información obligatoria.');
                        objViewDatosGenerales.actions.ajax.throwError({message: 'Formulario incompleto'},$("#Datos_personales_CIB_form"),from,tabRef);                        
                        return false;
                    }

                    if ( $('#motivoCIB').val() && !$('#CIB').val() ) {
                        $('#CIB').setError('Información obligatoria.');
                        objViewDatosGenerales.actions.ajax.throwError({message: 'Formulario incompleto'},$("#Datos_personales_CIB_form"),from,tabRef);
                        return false;
                    }

                    $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                    e.preventDefault();
                    var form = $("#Datos_personales_CIB_form");
                    try {
                                                
                        if (!mainTabMenu.var.pID_ALTERNA)
                             throw new Error("Debe registrar primero los datos personales");                        
                        
                        $selectDisabled = form.find('select:disabled');
                        $selectDisabled.prop("disabled", false);

                        var model = 'CIB=' + $('#CIB').val() + '&motivoCIB=' + $('#motivoCIB').val() + '&pID_ALTERNA=' + mainTabMenu.var.pID_ALTERNA;
                        model = {model : model};
                        model[csrf.token_name] = csrf.hash;

                        $selectDisabled.prop("disabled", true);
                        
                        var callUrl = base_url + 'Solicitud/ajaxSaveDatosGeneralesGenerarCIB';

                        $.post(callUrl,model,
                        function (data) {  
                            objViewDatosGenerales.actions.ajax.callResponseValidations(form,data, from, tabRef, false, function(data){
                                $('#CIB,#motivoCIB').val('');
                                form.removeData('hasChanged');
                                $.LoadingOverlay("hide",true);
                                fillData.datosGenerales.CIB(mainTabMenu.var.pID_ALTERNA);
                            });
                        }).fail(function (err) {
                            objViewDatosGenerales.actions.ajax.throwError(err,form,from,tabRef);
                        }).always(function () {
                            MyCookie.session.reset();
                        });

                    }catch(err) {
                        
                        objViewDatosGenerales.actions.ajax.throwError(err,form,from,tabRef);
                        
                        if (callback)
                            callback(false);

                    }
                    
                },
                guardarDesarrolloacademico : function(e, from, tabRef){
                    e.preventDefault();
                    objViewDatosGenerales.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveDatosGeneralesDesAcad',from, tabRef, true, function(data,form){
                        fillData.datosGenerales.desarrolloAcademico(mainTabMenu.var.pID_ALTERNA);                        
                    });
                },
                guardarDomicilio : function(e, from, tabRef){
                    e.preventDefault();
                    objViewDatosGenerales.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveDatosGeneralesDomicilio',from, tabRef, true, function(data,form){
                        fillData.datosGenerales.domicilio(mainTabMenu.var.pID_ALTERNA);
                    });
                },
                guardarReferencia : function(e, from, tabRef){
                    e.preventDefault();
                    objViewDatosGenerales.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveDatosGeneralesReferencia',from, tabRef, true, function(data,form){
                        fillData.datosGenerales.referencias(mainTabMenu.var.pID_ALTERNA);
                    });
                },
                guardarSocioeconomico : function(e, from, tabRef){
                    e.preventDefault();

                    if ( !$('#pVIVE_FAMILIA').val()
                        && !$('#pINGRESO_FAMILIAR').val()
                        && !$('#pID_TIPO_DOMICILIO').val()
                        && !$('#pACTIVIDAD_CULTURAL').val()
                        && !$('#pINMUEBLES').val()
                        && !$('#pINVERSIONES').val()
                        && !$('#pNUMERO_AUTOS').val()
                        && !$('#pCALIDAD_VIDA').val()
                        && !$('#pVICIOS').val()
                        && !$('#pIMAGEN_PUBLICA').val()
                        && !$('#pCOMPORTA_SOCIAL').val()
                        // && !$('#pINGRESO_MENSUAL').val() 
                        ){

                            Swal.fire({ type: 'warning', title: 'Atención', html: 'Debe especificar al menos un dato del formulario' });

                    } else {


                        $('#pNOMBRE_SOCIOECONOMICOS,#pPATERNO_SOCIOECONOMICOS,#pSEXO_SOCIOECONOMICOS,#pFECHA_NAC_SOCIOECONOMICOS,#pID_RELACION,#pID_RELACION_SOCIOECONOMICOS').removeAttr('required');

                        objViewDatosGenerales.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveDatosGeneralesSocio',from, tabRef, false, function(data){
                            
                            objViewDatosGenerales.vars.datosGenerales.forms.Dependientes_form.closeAlert({alertType : 'alert-danger'});
                            objViewDatosGenerales.vars.datosGenerales.forms.Dependientes_form.removeData('withError');

                        });

                    }
                },
                guardarDependiente : function(e, from, tabRef){
                    e.preventDefault();

                    $('#pNOMBRE_SOCIOECONOMICOS,#pPATERNO_SOCIOECONOMICOS,#pSEXO_SOCIOECONOMICOS,#pFECHA_NAC_SOCIOECONOMICOS,#pID_RELACION,#pID_RELACION_SOCIOECONOMICOS').prop('required',true);

                    objViewDatosGenerales.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveDatosGeneralesDependiente',from, tabRef, true, function(data,form){
                        
                        fillData.datosGenerales.dependientesEconomicos(mainTabMenu.var.pID_ALTERNA);

                    });
                }
            }
        },
        change : {
            tableResponsive : function(){
                $.each( objViewDatosGenerales.vars.datosGenerales.tables, function( key, value ) {
                    try {value.obj.responsive.rebuild().responsive.recalc();}catch(err){}
                });                
            },
            pID_GRADO_ESCOLAR : function(e){
                var value = $(this).val(),
                    inputs = $('#pNOMBRE_ESCUELA,#pESPECIALIDAD_DESARROLLO,#pCEDULA_PROFESIONAL,#pINICIO_DESARROLLO,#pTERMINO_DESARROLLO,#pREGISTRO_SEP,#pFOLIO_CERTIFICADO,#pPROMEDIO');
                if (value == -1 || value == 1){
                    inputs.prop( "disabled", true );
                } else {
                    inputs.prop( "disabled", false );
                }
            },
            pID_PAIS_NAC : function(e){
                
                var value = $(this).val();

                if (value != 82){ // país diferente a méxico
                    
                    if ( ($('#pID_MUNICIPIO_NAC').val() != value && $('#pID_MUNICIPIO_NAC').data('populated') ) || $('#pID_MUNICIPIO_NAC').val() == null) {
                    
                        if (value == -1) { // sin información


                                $('#pID_ENTIDAD_NAC').val(value).trigger('change',[function(){

                                    if ( $('#pID_ENTIDAD_NAC').val() == value)
                                        $('#pID_MUNICIPIO_NAC').val(-1).trigger('change.select2');

                                }]).trigger('change.select2');
                                
                            

                        } else { // cualquier otro país

                            $('#pID_ENTIDAD_NAC').val(99).trigger('change',[function(){

                                if ( $('#pID_ENTIDAD_NAC').val() == 99) {
                                    $('#pID_MUNICIPIO_NAC').data('populated',true);
                                    $('#pID_MUNICIPIO_NAC').val(999999).trigger('change.select2');
                                }

                            }]).trigger('change.select2');
                            
                        }
                        
                    }
                }

            },
            pID_NACIONALIDAD : function(e){
                var value = $(this).val();
                if (value != 82){
                    $('#pMODO_NACIONALIDAD').val(3).trigger('change').trigger('change.select2');
                }
            }
        }
    },
    actions : { 
        populateCURPData : function(data){
            
            objViewDatosGenerales.vars.datosGenerales.objs.pCURP.val(data.CURP);
            $('#pNOMBRE_DATOS_PERSONALES').val(data.nombres);
            $('#pPATERNO_DATOS_PERSONALES').val(data.apellido1);
            $('#pMATERNO_DATOS_PERSONALES').val(data.apellido2);
            $('#pSEXO_DATOS_PERSONALES').val(data.sexo).trigger('change').trigger('change.select2');

            if (data.CURP)            
                $('#pRFC_DOMICILIO').val( data.CURP.substr(0,10));

            var dateParts = data.fechNac.split("/");
            var dateObject = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]); 
            date = moment( dateObject ).format('YYYY-MM-DD');
            $('#pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES').val(date);

            objViewDatosGenerales.vars.datosGenerales.objs.pCURP.removeError();
            $('#pNOMBRE_DATOS_PERSONALES').removeError();
            $('#pPATERNO_DATOS_PERSONALES').removeError();
            $('#pMATERNO_DATOS_PERSONALES').removeError();
            $('#pSEXO_DATOS_PERSONALES').removeError();
            $('#pSEXO_DATOS_PERSONALES').removeError();
            $('#pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES').removeError();

            $('.consultaCURP').readOnly();

            $('#pSEXO_DATOS_PERSONALES').prop("disabled", true);

            dynTabs.loaderTab();
        },    
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
                    form.data('requireddata',false);

                    if (from) {
                        if(from == 'tab') {
                            $(tabRef.relatedTarget).trigger('click');
                            dynTabs.markTab( $(tabRef.currentTarget),  '<span class="text-success tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true" ></i></span>');
                            if (callback) 
                                if ($.isFunction( callback ))
                                    callback(data,form); 
                            return null;
                        }
                    }
                    dynTabs.markTab( dynTabs.getCurrentTab($('#myTabContent')).linkRef ,'<span class="text-success tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true" ></i></span>');

                    if (callback) 
                        if ($.isFunction( callback ))
                            callback(data,form); 
                    
                    $.LoadingOverlay("hide",true);
                }catch(err) {
                    objViewDatosGenerales.actions.ajax.throwError(err,form,from,tabRef);
                }
            },
            throwError: function(err,form,from,tabRef){
                $.LoadingOverlay("hide",true);
                
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
                        objViewDatosGenerales.actions.ajax.callResponseValidations(form,data, from, tabRef, resetForm, callback);
                    }).fail(function (err) {
                        objViewDatosGenerales.actions.ajax.throwError(err,form,from,tabRef);                            
                    }).always(function () {                        
                        MyCookie.session.reset();
                    });

                }catch(err) {
                    objViewDatosGenerales.actions.ajax.throwError(err,form,from,tabRef);                        
                }
            },
            populateCmbOperacion: function(){
                var obj = $('#pTIPO_OPERACION');
                var callUrl = base_url + "Solicitud/cmbTipoOperacion";

                obj.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                obj.append('<option disabled selected value><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i> Actualizando, favor de esperar...</option>');

                $.get(callUrl,
                    function (data) {
                        if (data) {
                            obj.find("option").remove();
                            obj.append('<option disabled selected value>Seleccione una opción</option>');
                            if (data.results) {
                                $.each(data.results.data,function(key, value) 
                                {
                                    var option = new Option(value.pdescripcion, value.pclave);
                                    obj.append(option);
                                });
                            }
                        }
                        obj.data('populated',true);
                        obj.prop("disabled", false);

                    }).fail(function (err) {                    
                        obj.find("option").remove();
                        obj.setError('ERROR al actualizar');
                    }).always(function () {
                        obj.LoadingOverlay("hide");
                        MyCookie.session.reset();                                            
                    });
            }

        }
    }
}