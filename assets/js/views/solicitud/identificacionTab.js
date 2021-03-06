var objViewIdentificacion = {
    vars : {
        general : {
            init : false,
        },
        identificacion : {
            forms : {
                mediafiliacion_form : null,
                Datos_form : null,
                Senas_particulares_form : null,
                Ficha_fotografica_form : null,
                Registro_decadactilar_form : null,
                Digitalizacion_de_documento_form: null,
                Identificacion_de_voz_form: null
            },
            btns : {
                guardarMediafiliacion : null,
                guardarSenia : null,                
                guardarFicha : null,
                guardarRegistrodecadactilar : null,
                guardarDocumento : null,
                guardarVoz : null                
            },
            tables : {
                tableSenasparticulares : {
                    obj : null,
                    dom : null
                },
                tableFichafotografica  : {
                    obj : null,
                    dom : null
                },
                tableRegistrodecadactilar  : {
                    obj : null,
                    dom : null
                },
                tableDigitalizaciondoc : {
                    obj : null,
                    dom : null
                }
            },
            files : {
                inputFile : null
            }
        }
    },
    init : function(callback){        
        if (objViewIdentificacion.vars.general.init)
            return false;

        $('#myTabContent').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
        
        objViewIdentificacion.vars.general.mainContentTab = $('#Identificacion');
        
        // INIT DATATABLE
        objViewIdentificacion.vars.identificacion.tables.tableSenasparticulares.dom = $('#tableSenasparticulares');
        objViewIdentificacion.vars.identificacion.tables.tableSenasparticulares.obj = objViewIdentificacion.vars.identificacion.tables.tableSenasparticulares.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});
        objViewIdentificacion.vars.identificacion.tables.tableFichafotografica.dom = $('#tableFichafotografica');
        objViewIdentificacion.vars.identificacion.tables.tableFichafotografica.obj = objViewIdentificacion.vars.identificacion.tables.tableFichafotografica.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});
        objViewIdentificacion.vars.identificacion.tables.tableRegistrodecadactilar.dom = $('#tableRegistrodecadactilar');
        objViewIdentificacion.vars.identificacion.tables.tableRegistrodecadactilar.obj = objViewIdentificacion.vars.identificacion.tables.tableRegistrodecadactilar.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});
        objViewIdentificacion.vars.identificacion.tables.tableDigitalizaciondoc.dom = $('#tableDigitalizaciondoc');
        objViewIdentificacion.vars.identificacion.tables.tableDigitalizaciondoc.obj = objViewIdentificacion.vars.identificacion.tables.tableDigitalizaciondoc.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});        

        //INIT TYPE FILES
        objViewIdentificacion.vars.identificacion.files.inputFile = $('.inputFile');

        // INIT ELEMENTS
        // FORMS
        objViewIdentificacion.vars.identificacion.forms.mediafiliacion_form = $('#mediafiliacion_form');
        objViewIdentificacion.vars.identificacion.forms.Datos_form = $('#Datos_form');
        objViewIdentificacion.vars.identificacion.forms.Senas_particulares_form = $('#Senas_particulares_form');
        objViewIdentificacion.vars.identificacion.forms.Ficha_fotografica_form = $('#Ficha_fotografica_form');
        objViewIdentificacion.vars.identificacion.forms.Registro_decadactilar_form = $('#Registro_decadactilar_form');
        objViewIdentificacion.vars.identificacion.forms.Digitalizacion_de_documento_form = $('#Digitalizacion_de_documento_form');
        objViewIdentificacion.vars.identificacion.forms.Identificacion_de_voz_form = $('#Identificacion_de_voz_form');

        // BUTTONS
        objViewIdentificacion.vars.identificacion.btns.guardarMediafiliacion = $('#guardarMediafiliacion');
        objViewIdentificacion.vars.identificacion.btns.guardarSenia = $('#guardarSenia');
        objViewIdentificacion.vars.identificacion.btns.guardarFicha = $('#guardarFicha');
        objViewIdentificacion.vars.identificacion.btns.guardarRegistrodecadactilar = $('#guardarRegistrodecadactilar');
        objViewIdentificacion.vars.identificacion.btns.guardarDocumento = $('#guardarDocumento');
        objViewIdentificacion.vars.identificacion.btns.guardarVoz = $('#guardarVoz');        

        // INIT SELECTS
        objViewIdentificacion.vars.general.mainContentTab.find('select').select2({width : '100%'});
        $(document).on('focus', '.select2.select2-container', function (e) {
            if (e.originalEvent) {
                if ($(this).siblings('select').is(':enabled'))
                    $(this).siblings('select').select2('open');
            }
        });

        //EVENTS
        //SUBMIT
        objViewIdentificacion.vars.general.mainContentTab.find("form").attr('novalidate', 'novalidate');
        objViewIdentificacion.vars.general.mainContentTab.find('form').submit(function(e){
            e.preventDefault();
        });
        // CLICK
        objViewIdentificacion.vars.identificacion.btns.guardarMediafiliacion.on('click',objViewIdentificacion.events.click.identificacion.guardarMediafiliacion);
        objViewIdentificacion.vars.identificacion.btns.guardarSenia.on('click',objViewIdentificacion.events.click.identificacion.guardarSenia);
        objViewIdentificacion.vars.identificacion.btns.guardarFicha.on('click',objViewIdentificacion.events.click.identificacion.guardarFicha);
        objViewIdentificacion.vars.identificacion.btns.guardarRegistrodecadactilar.on('click',objViewIdentificacion.events.click.identificacion.guardarRegistrodecadactilar);
        objViewIdentificacion.vars.identificacion.btns.guardarDocumento.on('click',objViewIdentificacion.events.click.identificacion.guardarDocumento);
        objViewIdentificacion.vars.identificacion.btns.guardarVoz.on('click',objViewIdentificacion.events.click.identificacion.guardarVoz);        
        
        // INIT TYPE FILES
        objViewIdentificacion.vars.identificacion.files.inputFile.on('change',objViewIdentificacion.events.change.inputFile);

        //FOCUSOUT
        $('input[type="date"]').on('focusout',function(event){
            $(this).val( $(this).val() );
        });

        //CAMBIO DE TABS
        objViewIdentificacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('hide.bs.tab',function(e){ dynTabs.change({ discardFunction: objViewIdentificacion.actions.discartChanges}, e); } );
        objViewIdentificacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('show.bs.tab',dynTabs.showTab);
        objViewIdentificacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('show.bs.tab',objViewIdentificacion.events.change.handleTabShow);
        objViewIdentificacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('shown.bs.tab',objViewIdentificacion.events.change.tableResponsive);

        populate.form($('#mediafiliacion_form')); //popular selects del primer tab NOTA: cambiar programación al tab actual si se obtiene por cookie
        dynTabs.setCurrentTab($('#myTabContent'));

        mainTabMenu.actions.changeTab();

        $('#myTabContent').LoadingOverlay("hide");

        if (callback){
            if ($.isFunction( callback )){
                callback();
            }
        }

        $('#FECHA_DOCUMENTO').attr('max', moment( new Date() ).format('YYYY-MM-DD'));

        $(':input[type="number"]').on('input', function () { 
            this.value = this.value.replace(/[^0-9\-\(\)]/g,'');
        });
        
        objViewIdentificacion.vars.general.init = true;
    },
    events : {
        click : {
            general : {                
            },
            identificacion : {
                guardarMediafiliacion : function(e, from, tabRef){
                    e.preventDefault();
                    objViewIdentificacion.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveIdentificacionMediafiliacion',from, tabRef, false, function(data){
                        
                    });
                },
                guardarSenia : function(e, from, tabRef){
                    e.preventDefault();
                    objViewIdentificacion.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveIdentificacionSenia',from, tabRef, true, function(data){                        
                        fillData.identificacion.seniasParticulares(mainTabMenu.var.pID_ALTERNA);
                    });
                },                
                guardarFicha : function(e, from, tabRef){
                    e.preventDefault();

                    var form = $(this).parents('form:first'),
                        inputFiles = form.find('input:file'),
                        model = new FormData(),
                        callUrl = base_url + 'Solicitud/ajaxSaveIdentificacionFicha';

                    form.closeAlert({alertType : 'alert-danger'});

                    try {
                        //VALID FORM
                        if (mainTabMenu.var.nuevoRegistro)
                            if (!form.valid())
                                throw new Error("Formulario incompleto");

                        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                        model.append("pID_ALTERNA",  mainTabMenu.var.pID_ALTERNA);
                        model.append(csrf.token_name,  csrf.hash);
                        
                        var filesComplete = false;
                        for (var i = 0; i < inputFiles.length ; i++) {
                            if (inputFiles[i].files.length > 0) {
                                model.append("fichaFotografica[" + inputFiles[i].id + "]", inputFiles[i].files[0]);
                                filesComplete = true;
                            }
                        }
                        
                        if (filesComplete) {
                            $.ajax({
                                type: "POST",
                                enctype: 'multipart/form-data',
                                url: callUrl,
                                data: model,
                                processData: false,
                                contentType: false,
                                cache: false,
                                timeout: 600000,
                                success: function (data) {
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
                                        
                                        populate.reset(form, function(){
                                            
                                            form.removeData('hasChanged');

                                        });

                                        $.LoadingOverlay("hide",true);

                                        fillData.identificacion.fichaFotografica(mainTabMenu.var.pID_ALTERNA);


                                    }catch(err) {
                                        $.LoadingOverlay("hide",true);
                    
                                        form.setAlert({
                                            alertType :  'alert-danger',
                                            dismissible : true,
                                            header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                                            msg : err.message ? err.message : err.statusText
                                        });

                                        if (data.results.data)
                                        $.each(data.results.data, function( index, value ) {
                                            $('#' + value.idDoc).setError(value.error);
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
                                    }
                                },
                                error: function (err) {
                                    objViewIdentificacion.actions.ajax.throwError(err,form,from,tabRef);                                 
                                },
                                always : function(){
                                    $.LoadingOverlay("hide",true);
                                }
                            });
                        } else {
                            msg = "Debe" + ( form.data('requireddata') == false ? ' remplazar ' : ' seleccionar' ) + ' al menos una imagen.';
                            throw new Error(msg);
                        }

                    }catch(err) {
                        objViewIdentificacion.actions.ajax.throwError(err,form,from,tabRef);                        
                    }                    
                },
                guardarRegistrodecadactilar : function(e, from, tabRef){
                    e.preventDefault();

                    var form = $(this).parents('form:first'),
                        inputFiles = form.find('input:file'),
                        model = new FormData(),
                        callUrl = base_url + 'Solicitud/ajaxSaveIdentificacionRegistrodecadactilar';

                    form.closeAlert({alertType : 'alert-danger'});

                    try {
                        //VALID FORM
                        if (!form.valid())
                            throw new Error("Formulario incompleto");

                        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                        model.append("pID_ALTERNA",  mainTabMenu.var.pID_ALTERNA);
                        model.append(csrf.token_name,  csrf.hash);
                        
                        var filesComplete = true;
                        for (var i = 0; i < inputFiles.length ; i++) {
                            if (inputFiles[i].files.length > 0)
                                model.append("fichaDecadactilar[" + inputFiles[i].id + "]", inputFiles[i].files[0]);
                            else {
                                $(inputFiles[i]).setError('Información obligatoria.');
                                filesComplete = false;
                            }
                        }

                        if (filesComplete) {
                            $.ajax({
                                type: "POST",
                                enctype: 'multipart/form-data',
                                url: callUrl,
                                data: model,
                                processData: false,
                                contentType: false,
                                cache: false,
                                timeout: 600000,
                                success: function (data) {
                                    try{
                                        if (!data) 
                                            throw new Error('Respuesta inesperada, favor de intentarlo de nuevo.');
                                        if (!data.results)
                                            throw new Error('Respuesta inesperada, favor de intentarlo de nuevo.');
                                        if (typeof data.results.status === "undefined")
                                            throw new Error('Estatus desconocido, favor de contactar a soporte.');
                                        if (!data.results.status)
                                            throw new Error(data.results.message ? data.results.message : 'Error desconocido.' );
                                        
                                        fillData.identificacion.registroDecadactilar(mainTabMenu.var.pID_ALTERNA);

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
                                        
                                        populate.reset(form, function(){
                                            
                                            form.removeData('hasChanged');

                                        });                                        

                                        $.LoadingOverlay("hide",true);
                                    }catch(err) {
                                        $.LoadingOverlay("hide",true);
                    
                                        form.setAlert({
                                            alertType :  'alert-danger',
                                            dismissible : true,
                                            header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                                            msg : err.message ? err.message : err.statusText
                                        });

                                        if (data.results.data)
                                            $.each(data.results.data, function( index, value ) {
                                                $('#' + value.idDoc).setError(value.error);
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
                                    }
                                },
                                error: function (err) {
                                    objViewIdentificacion.actions.ajax.throwError(err,form,from,tabRef);                                 
                                },
                                always : function(){
                                    $.LoadingOverlay("hide",true);
                                }
                            });
                        } else {
                            throw new Error("Formulario incompleto");                            
                        }

                    }catch(err) {
                        objViewIdentificacion.actions.ajax.throwError(err,form,from,tabRef);                        
                    } 
                },
                guardarDocumento : function(e, from, tabRef){
                    e.preventDefault();

                    var form = $(this).parents('form:first'),
                        inputFiles = form.find('input:file'),
                        model = new FormData(),
                        callUrl = base_url + 'Solicitud/ajaxSaveIdentificacionDocumento';

                    form.closeAlert({alertType : 'alert-danger'});

                    try {
                        //VALID FORM
                        if (!form.valid())
                            throw new Error("Formulario incompleto");

                        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                        model.append("pID_ALTERNA",  mainTabMenu.var.pID_ALTERNA);
                        model.append("pID_CATEGORIA_DOC",  $('#pID_CATEGORIA_DOC').val());
                        model.append("FECHA_DOCUMENTO",  $('#FECHA_DOCUMENTO').val());
                        model.append(csrf.token_name,  csrf.hash);
                        
                        var filesComplete = true;
                        for (var i = 0; i < inputFiles.length ; i++) {
                            if (inputFiles[i].files.length > 0)
                                model.append("fichaDocumento[" + inputFiles[i].id + "]", inputFiles[i].files[0]);
                            else {
                                $(inputFiles[i]).setError('Información obligatoria.');
                                filesComplete = false;
                            }
                        }

                        if (filesComplete) {
                            $.ajax({
                                type: "POST",
                                enctype: 'multipart/form-data',
                                url: callUrl,
                                data: model,
                                processData: false,
                                contentType: false,
                                cache: false,
                                timeout: 600000,
                                success: function (data) {
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

                                        populate.reset(form, function(){
                                            
                                            form.removeData('hasChanged');

                                        });

                                        fillData.identificacion.digitalizacionDocumento(mainTabMenu.var.pID_ALTERNA);

                                        $.LoadingOverlay("hide",true);
                                    }catch(err) {
                                        $.LoadingOverlay("hide",true);
                    
                                        form.setAlert({
                                            alertType :  'alert-danger',
                                            dismissible : true,
                                            header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                                            msg : err.message ? err.message : err.statusText
                                        });

                                        if (data.results.data)
                                            $.each(data.results.data, function( index, value ) {
                                                $('#' + value.idDoc).setError(value.error);
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
                                    }
                                },
                                error: function (err) {
                                    objViewIdentificacion.actions.ajax.throwError(err,form,from,tabRef);                                 
                                },
                                always : function(){
                                    $.LoadingOverlay("hide",true);
                                }
                            });
                        } else {
                            throw new Error("Formulario incompleto");                            
                        }

                    }catch(err) {
                        objViewIdentificacion.actions.ajax.throwError(err,form,from,tabRef);                        
                    }
                },
                guardarVoz : function(e, from, tabRef){
                    e.preventDefault();

                    var form = $(this).parents('form:first'),
                        inputFiles = form.find('input:file'),
                        model = new FormData(),
                        callUrl = base_url + 'Solicitud/ajaxSaveIdentificacionVoz';

                    form.closeAlert({alertType : 'alert-danger'});

                    try {
                        //VALID FORM
                        if (!form.valid())
                            throw new Error("Formulario incompleto");

                        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                        model.append("pID_ALTERNA",  mainTabMenu.var.pID_ALTERNA);
                        model.append(csrf.token_name,  csrf.hash);
                        
                        var filesComplete = true;
                        for (var i = 0; i < inputFiles.length ; i++) {
                            if (inputFiles[i].files.length > 0)
                                model.append("fichaVoz[" + inputFiles[i].id + "]", inputFiles[i].files[0]);
                            else {
                                $(inputFiles[i]).setError('Información obligatoria.');
                                filesComplete = false;
                            }
                        }

                        if (filesComplete) {
                            $.ajax({
                                type: "POST",
                                enctype: 'multipart/form-data',
                                url: callUrl,
                                data: model,
                                processData: false,
                                contentType: false,
                                cache: false,
                                timeout: 600000,
                                success: function (data) {
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
                                        
                                        populate.reset(form, function(){
                                            
                                            form.removeData('hasChanged');

                                        });                                        

                                        fillData.identificacion.identificacionVoz(mainTabMenu.var.pID_ALTERNA);

                                        $.LoadingOverlay("hide",true);
                                    }catch(err) {
                                        $.LoadingOverlay("hide",true);
                    
                                        form.setAlert({
                                            alertType :  'alert-danger',
                                            dismissible : true,
                                            header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                                            msg : err.message ? err.message : err.statusText
                                        });

                                        if (data.results.data)
                                            $.each(data.results.data, function( index, value ) {
                                                $('#' + value.idDoc).setError(value.error);
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
                                    }
                                },
                                error: function (err) {
                                    objViewIdentificacion.actions.ajax.throwError(err,form,from,tabRef);                                 
                                },
                                always : function(){
                                    $.LoadingOverlay("hide",true);
                                }
                            });
                        } else {
                            throw new Error("Formulario incompleto");                            
                        }

                    }catch(err) {
                        objViewIdentificacion.actions.ajax.throwError(err,form,from,tabRef);                        
                    } 
                }                
            }
        },
        change : {
            inputFile : function(e){

                var $this = this,
                    labelNameFile = $( $this ).closest( ".custom-file" ).find('label.custom-file-label');
                    
                if ($this.files && $this.files[0]) {

                    if ($.inArray( $this.files[0].type, $this.accept.split(',') ) == -1) {

                        $(this).val('');
                        e.preventDefault();
                        e.stopPropagation();
                        e.stopImmediatePropagation();

                        Swal.fire({
                            type: 'error',
                            text: 'Formato de archivo incorrecto',
                            footer: 'Se aceptan archivos en formato ' + $($this).data('accept')
                        });
                        
                        return false;
                    }

                    maxFileSize = $($this).data('maxfilesize') ? $($this).data('maxfilesize') : 204800;

                    if ( $this.files[0].size > maxFileSize ){
                        
                        $(this).val('');
                        e.preventDefault();
                        e.stopPropagation();
                        e.stopImmediatePropagation();

                        Swal.fire({
                            type: 'error',
                            text: 'Tamaño de archivo superior al límite',
                            footer: 'Se aceptan archivos con un tamaño máximo de ' + (maxFileSize / 1024) + ' kb'
                        });
                        
                        return false;
                    }

                    var reader = new FileReader();
                    var filename = $($this).val();
                    filename = filename.substring(filename.lastIndexOf('\\')+1);
                    reader.onload = function(e) {
                        var renderTarjet = $('#' + $($this).data('renderin'));

                        renderTarjet.attr('src', e.target.result);
                        renderTarjet.hide();
                        renderTarjet.fadeIn(500);

                        labelNameFile.text(filename);
                    };
                    reader.readAsDataURL($this.files[0]);
                } else {
                    labelNameFile.text('');
                }
            },
            tableResponsive : function(){
                $.each( objViewIdentificacion.vars.identificacion.tables, function( key, value ) {
                    try{value.obj.responsive.rebuild().responsive.recalc();}catch(err){}
                });                
            },
            handleTabShow : function(e){

                if ( $(e.currentTarget).data('callback') )
                    eval($(e.currentTarget).data('callback') + '()');

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
            // dynTabs.tabs.prebTab.tabForm.find('.btnSiguienteAnterior.siguienteTab').trigger('click');
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
                            return null;
                        }
                    }
                    dynTabs.markTab( dynTabs.getCurrentTab($('#myTabContent')).linkRef ,'<span class="text-success tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true" ></i></span>');

                    if (callback) 
                        if ($.isFunction( callback ))
                            callback(data); 

                }catch(err) {
                    objViewIdentificacion.actions.ajax.throwError(err,form,from,tabRef);
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
                        objViewIdentificacion.actions.ajax.callResponseValidations(form,data, from, tabRef, resetForm, callback);
                    }).fail(function (err) {
                        objViewIdentificacion.actions.ajax.throwError(err,form,from,tabRef);
                    }).always(function () {
                        $.LoadingOverlay("hide",true);
                        MyCookie.session.reset();
                    });

                }catch(err) {
                    objViewIdentificacion.actions.ajax.throwError(err,form,from,tabRef);                        
                }
            }
        }
    },
    callback : {
        fichaFotografica : function(){
            
            if (mainTabMenu.var.nuevoRegistro)
                fillData.identificacion.fichaFotografica(mainTabMenu.var.pID_ALTERNA);

        },
        registroDecadactilar : function(){
            
            if (mainTabMenu.var.nuevoRegistro)
                fillData.identificacion.registroDecadactilar(mainTabMenu.var.pID_ALTERNA);
        },
        identificacionVoz : function(){
            
            if (mainTabMenu.var.nuevoRegistro)
                fillData.identificacion.identificacionVoz(mainTabMenu.var.pID_ALTERNA);
                
        }
    }
}