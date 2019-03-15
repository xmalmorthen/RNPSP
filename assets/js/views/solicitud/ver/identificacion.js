var objViewIdentificacion = {
    vars : {
    },
    init : function(){
        $.each(objViewIdentificacion.vars,function(key,val){
            var cmd = "objViewIdentificacion.vars." + key + "= $('#" + key + "')";
            eval(cmd); // DOM ref
            cmd = "objViewIdentificacion.vars." + key + ".on('click',objViewIdentificacion.events.click." + key + ")";
            eval(cmd); // CLICK enent ref
        });

        objViewIdentificacion.fill.all();
    },
    events : {
        click : {
        }        
    }, 
    fill : {
        insertValueInSelect : function(ref,value,form){            
            $('#'+ form + ' #' + ref).html(value);
        },
        genericPromise : function(callUrl,model){
            return new Promise ( (resolve, reject) => {
                generic.ajax.async.get(callUrl,model, 
                    //success
                    function(data){
                        if (data)
                            if (data.results)
                                if (data.results.status) {
                                    resolve(data.results.data);
                                    return true;
                                }
                        
                        resolve(null);
                    },
                    //error
                    function(err){
                        reject(err);
                    }
                );
            });
        },
        all : function(){
            objViewIdentificacion.fill.mediaFiliacion(objViewVer.var.pID_ALTERNA);
            objViewIdentificacion.fill.seniasParticulares(objViewVer.var.pID_ALTERNA);
            objViewIdentificacion.fill.fichaFotografica(objViewVer.var.pID_ALTERNA);
            objViewIdentificacion.fill.registroDecadactilar(objViewVer.var.pID_ALTERNA);
            objViewIdentificacion.fill.registroDocumento(objViewVer.var.pID_ALTERNA);
            objViewIdentificacion.fill.identificacionVoz(objViewVer.var.pID_ALTERNA);
        },
        mediaFiliacion : function(pID_ALTERNA){
            $('#mediafiliacion_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/vwFiliacion`;
            objViewIdentificacion.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewIdentificacion.fill.insertValueInSelect(key,value,'mediafiliacion_form');
                    });
                }
                $('#mediafiliacion_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#mediafiliacion_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#mediafiliacion_form').LoadingOverlay("hide");
            });
        },
        seniasParticulares : function(pID_ALTERNA){
            $('#Senas_particulares_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/vwSenasParticulares`;
            objViewIdentificacion.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewIdentificacion.fill.insertValueInSelect(key,value,'Senas_particulares_form');
                    });
                }
                $('#Senas_particulares_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Senas_particulares_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Senas_particulares_form').LoadingOverlay("hide");
            });
        },
        fichaFotografica : function(pID_ALTERNA){
            $('#Ficha_fotografica_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/vwFichaFotografica`;
            objViewIdentificacion.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewIdentificacion.fill.insertValueInSelect(key,value,'Ficha_fotografica_form');
                    });

                    // IMÁGENES
                    var thumb_pIMAGEN_IZQUIERDO = $('#thumb_pIMAGEN_IZQUIERDO'),
                        thumb_pIMAGEN_FRENTE = $('#thumb_pIMAGEN_FRENTE'),
                        thumb_pIMAGEN_DERECHO = $('#thumb_pIMAGEN_DERECHO'),
                        thumb_pIMAGEN_FIRMA = $('#thumb_pIMAGEN_FIRMA'),
                        thumb_pIMAGEN_HUELLA = $('#thumb_pIMAGEN_HUELLA'),
                        imageBreak = base_url + 'assets/images/imageError.png';

                    /*******************************************************************************/            
                    //CAMPOS DE IMÁGENES
                    thumb_pIMAGEN_IZQUIERDO.attr("src", data.pIMG_PERFILIZQ ? data.pIMG_PERFILIZQ.name : imageBreak ).attr("alt", data.pIMG_PERFILIZQ ? data.pIMG_PERFILIZQ.originalName : data.pIMG_PERFILIZQ.name);
                    thumb_pIMAGEN_FRENTE.attr("src", data.pIMG_FRENTE ? data.pIMG_FRENTE.name : imageBreak ).attr("alt", data.pIMG_FRENTE ? data.pIMG_FRENTE.originalName : data.pIMG_FRENTE.name);
                    thumb_pIMAGEN_DERECHO.attr("src", data.pIMG_PERFILDR ? data.pIMG_PERFILDR.name : imageBreak ).attr("alt", data.pIMG_PERFILDR ? data.pIMG_PERFILDR.originalName : data.pIMG_PERFILDR.name);
                    thumb_pIMAGEN_FIRMA.attr("src", data.pIMG_FIRMA ? data.pIMG_FIRMA.name : imageBreak ).attr("alt", data.pIMG_FIRMA ? data.pIMG_FIRMA.originalName : data.pIMG_FIRMA.name);
                    thumb_pIMAGEN_HUELLA.attr("src", data.pIMG_HUELLA ? data.pIMG_HUELLA.name : imageBreak ).attr("alt", data.pIMG_HUELLA ? data.pIMG_HUELLA.originalName : data.pIMG_HUELLA.name);
                    /*******************************************************************************/
                    
                }
                $('#Ficha_fotografica_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Ficha_fotografica_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Ficha_fotografica_form').LoadingOverlay("hide");
            });
        },
        registroDecadactilar : function(pID_ALTERNA){
            $('#Registro_decadactilar_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/vwRegDecadactilar`;
            objViewIdentificacion.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewIdentificacion.fill.insertValueInSelect(key,value,'Registro_decadactilar_form');
                    });

                    $('#documentoLink').append(`<a href="${data.pIMG_DOCUMENTO.name}" target="_blank" rel="noopener noreferrer">${data.pIMG_DOCUMENTO.originalName}</a>`)
                }
                $('#Registro_decadactilar_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Registro_decadactilar_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Registro_decadactilar_form').LoadingOverlay("hide");
            });
        },
        registroDocumento : function(pID_ALTERNA){
            $('#Digitalizacion_de_documento_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/xxx`;
            objViewIdentificacion.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewIdentificacion.fill.insertValueInSelect(key,value,'Digitalizacion_de_documento_form');
                    });
                }
                $('#Digitalizacion_de_documento_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Digitalizacion_de_documento_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Digitalizacion_de_documento_form').LoadingOverlay("hide");
            });
        },
        identificacionVoz : function(pID_ALTERNA){
            $('#Identificacion_de_voz_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/xxx`;
            objViewIdentificacion.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewIdentificacion.fill.insertValueInSelect(key,value,'Identificacion_de_voz_form');
                    });
                }
                $('#Identificacion_de_voz_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Identificacion_de_voz_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Identificacion_de_voz_form').LoadingOverlay("hide");
            });
        }
    }
}