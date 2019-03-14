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
            objViewIdentificacion.fill.mediaFiliacion(objViewVer.var.pID_ALTERNA);
        },
        mediaFiliacion : function(pID_ALTERNA){
            $('#mediafiliacion_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/vwFiliacion`;
            objViewIdentificacion.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    //console.log(data);
                    $.each(data,function(key,value){
                        objViewIdentificacion.fill.insertValueInSelect(key,value);
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
        }
    }
}