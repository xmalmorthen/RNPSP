var objViewLaboral = {
    vars : {
    },
    init : function(){
        $.each(objViewLaboral.vars,function(key,val){
            var cmd = "objViewLaboral.vars." + key + "= $('#" + key + "')";
            eval(cmd); // DOM ref
            cmd = "objViewLaboral.vars." + key + ".on('click',objViewLaboral.events.click." + key + ")";
            eval(cmd); // CLICK enent ref
        });

        objViewLaboral.fill.all();
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
            objViewLaboral.fill.adscripcionActual(objViewVer.var.pID_ALTERNA);
            objViewLaboral.fill.empleosDiversos(objViewVer.var.pID_ALTERNA);
            objViewLaboral.fill.actitudesHaciaEmpleo(objViewVer.var.pID_ALTERNA);
            objViewLaboral.fill.comisiones(objViewVer.var.pID_ALTERNA);
        },
        adscripcionActual : function(pID_ALTERNA){
            $('#Adscripcion_actual_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/vwAdscripcion`;
            objViewLaboral.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewLaboral.fill.insertValueInSelect(key,value,'Adscripcion_actual_form');
                    });

                    //special
                    var nombreCompleto = (data.pMATERNO_JEFE ? data.pMATERNO_JEFE + ' ' : '') + (data.pPATERNO_JEFE ? data.pPATERNO_JEFE + ' ' : '') + (data.pNOMBRE_JEFE ? data.pNOMBRE_JEFE : '');
                    objViewLaboral.fill.insertValueInSelect('pNOMBRE_JEFE',nombreCompleto,'Adscripcion_actual_form');
                    
                }
                $('#Adscripcion_actual_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Adscripcion_actual_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Adscripcion_actual_form').LoadingOverlay("hide");
            });
        },
        empleosDiversos : function(pID_ALTERNA){
            $('#Empleos_diversos_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/vwEmpleoAdicional`;
            objViewLaboral.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewLaboral.fill.insertValueInSelect(key,value,'Empleos_diversos_form');
                    });
                }
                $('#Empleos_diversos_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Empleos_diversos_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Empleos_diversos_form').LoadingOverlay("hide");
            });
        },
        actitudesHaciaEmpleo : function(pID_ALTERNA){
            $('#Actitudes_hacia_el_empleo_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/vwActitud`;
            objViewLaboral.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewLaboral.fill.insertValueInSelect(key,value,'Actitudes_hacia_el_empleo_form');
                    });
                }
                $('#Actitudes_hacia_el_empleo_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Actitudes_hacia_el_empleo_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Actitudes_hacia_el_empleo_form').LoadingOverlay("hide");
            });
        },
        comisiones : function(pID_ALTERNA){
            $('#Comisiones_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/vwComision`;
            objViewLaboral.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        objViewLaboral.fill.insertValueInSelect(key,value,'Comisiones_form');
                    });
                }
                $('#Comisiones_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Comisiones_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Comisiones_form').LoadingOverlay("hide");
            });
        }
    }
}