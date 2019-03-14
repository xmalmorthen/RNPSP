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
        insertValueInSelect : function(ref,value){
            $('#'+ ref).html(value);
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
        },
        datosPersonales : function(pID_ALTERNA){
            $('#Datos_personales_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/xxx`;
            objViewDatosGenerales.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewDatosGenerales.fill.insertValueInSelect(key,value);
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
        }
    }
}