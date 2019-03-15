var objViewDatosGenerales = {
    vars : {
    },
    init : function(){
        $.each(objViewDatosGenerales.vars,function(key,val){
            var cmd = "objViewDatosGenerales.vars." + key + "= $('#" + key + "')";
            eval(cmd); // DOM ref
            cmd = "objViewDatosGenerales.vars." + key + ".on('click',objViewDatosGenerales.events.click." + key + ")";
            eval(cmd); // CLICK enent ref
        });

        objViewDatosGenerales.fill.all();
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
            objViewDatosGenerales.fill.datosPersonales(objViewVer.var.pID_ALTERNA);
            objViewDatosGenerales.fill.desarrolloAcademico(objViewVer.var.pID_ALTERNA);
            objViewDatosGenerales.fill.domicilio(objViewVer.var.pID_ALTERNA);
            objViewDatosGenerales.fill.referencias(objViewVer.var.pID_ALTERNA);
            objViewDatosGenerales.fill.socioeconomicos(objViewVer.var.pID_ALTERNA);
            objViewDatosGenerales.fill.dependientesEconomicos(objViewVer.var.pID_ALTERNA);            
        },
        datosPersonales : function(pID_ALTERNA){
            $('#Datos_personales_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/getPersona`;
            objViewDatosGenerales.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewDatosGenerales.fill.insertValueInSelect(key,value,'Datos_personales_form');
                    });
                }
                $('#Datos_personales_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Datos_personales_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Datos_personales_form').LoadingOverlay("hide");
            });
        },
        desarrolloAcademico : function(pID_ALTERNA){
            $('#Desarrollo_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/vwNivelEstudios`;
            objViewDatosGenerales.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewDatosGenerales.fill.insertValueInSelect(key,value,'Desarrollo_form');
                    });
                }
                $('#Desarrollo_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Desarrollo_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Desarrollo_form').LoadingOverlay("hide");
            });
        },
        domicilio : function(pID_ALTERNA){
            $('#Domicilio_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/vwDomicilio`;
            objViewDatosGenerales.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewDatosGenerales.fill.insertValueInSelect(key,value,'Domicilio_form');
                    });
                }
                $('#Domicilio_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Domicilio_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Domicilio_form').LoadingOverlay("hide");
            });
        },
        referencias : function(pID_ALTERNA){
            $('#Referencias_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/vwReferencias`;
            objViewDatosGenerales.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewDatosGenerales.fill.insertValueInSelect(key,value,'Referencias_form');
                    });
                }
                $('#Referencias_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Referencias_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Referencias_form').LoadingOverlay("hide");
            });
        },
        socioeconomicos : function(pID_ALTERNA){
            $('#Socioeconomicos_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/vwSocioEconomico`;
            objViewDatosGenerales.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewDatosGenerales.fill.insertValueInSelect(key,value,'Socioeconomicos_form');
                    });
                }
                $('#Socioeconomicos_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Socioeconomicos_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Socioeconomicos_form').LoadingOverlay("hide");
            });
        },
        dependientesEconomicos : function(pID_ALTERNA){
            $('#DependientesEconomicos_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/vwDependientes`;
            objViewDatosGenerales.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewDatosGenerales.fill.insertValueInSelect(key,value,'DependientesEconomicos_form');
                    });
                }
                $('#DependientesEconomicos_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#DependientesEconomicos_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#DependientesEconomicos_form').LoadingOverlay("hide");
            });
        },
    }
}