var objViewCapacitacion = {
    vars : {
    },
    init : function(){
        $.each(objViewCapacitacion.vars,function(key,val){
            var cmd = "objViewCapacitacion.vars." + key + "= $('#" + key + "')";
            eval(cmd); // DOM ref
            cmd = "objViewCapacitacion.vars." + key + ".on('click',objViewCapacitacion.events.click." + key + ")";
            eval(cmd); // CLICK enent ref
        });

        objViewCapacitacion.fill.all();
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
            objViewCapacitacion.fill.idiomasDialectos(objViewVer.var.pID_ALTERNA);
            objViewCapacitacion.fill.habilidadesAptitudes(objViewVer.var.pID_ALTERNA);            
        },
        idiomasDialectos : function(pID_ALTERNA){
            $('#Idiomas_dialectos_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            // var callUrl = base_url + `Solicitud/vwIdiomaHablado`;
            // objViewCapacitacion.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            // .then( (data) => {  
            //     if (data) {
            //         $.each(data,function(key,value){
            //             objViewCapacitacion.fill.insertValueInSelect(key,value,'Idiomas_dialectos_form');
            //         });
            //     }
            //     $('#Idiomas_dialectos_form').LoadingOverlay("hide");
            // })
            // .catch( (err) => {
            //     $('#Idiomas_dialectos_form').setAlert({
            //         alertType :  'alert-danger',
            //         dismissible : true,
            //         header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
            //         msg : err.statusText
            //     });
            //     $('#Idiomas_dialectos_form').LoadingOverlay("hide");
            // });

            var tableRef = $('#tableIdiomas'),
                tableObj = $('#tableIdiomas').DataTable({stateSave: true,destroy: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"},"order": [[ 0, "desc" ]]}),
                callUrl = base_url + `Solicitud/getIdiomaHablado`;

            tableObj.clear().draw();

            objViewCapacitacion.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_IDIOMA_HABLADO_EXT, value.pIDIOMA, value.pPORCENTAJE_LECTURA, value.pPORCENTAJE_ESCRITURA, value.pPORCENTAJE_CONVERSACION ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                $('#Idiomas_dialectos_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                $('#Idiomas_dialectos_form').LoadingOverlay("hide");
            });


        },
        habilidadesAptitudes : function(pID_ALTERNA){
            $('#Habilidades_aptitudes_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            // var callUrl = base_url + `Solicitud/vwHabilidadAptitud`;
            // objViewCapacitacion.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            // .then( (data) => {  
            //     if (data) {
            //         $.each(data,function(key,value){
            //             objViewCapacitacion.fill.insertValueInSelect(key,value,'Habilidades_aptitudes_form');
            //         });
            //     }
            //     $('#Habilidades_aptitudes_form').LoadingOverlay("hide");
            // })
            // .catch( (err) => {
            //     $('#Habilidades_aptitudes_form').setAlert({
            //         alertType :  'alert-danger',
            //         dismissible : true,
            //         header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
            //         msg : err.statusText
            //     });
            //     $('#Habilidades_aptitudes_form').LoadingOverlay("hide");
            // });

            var tableRef = $('#tableHabilidades'),
                tableObj = $('#tableHabilidades').DataTable({stateSave: true,destroy: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"},"order": [[ 0, "desc" ]]}),
                callUrl = base_url + `Solicitud/getHabilidadAptitud`;

            tableObj.clear().draw();

            objViewCapacitacion.fill.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_HABILIDAD_APTIT_EXT, value.pTIPO_HABAILIDAD, value.pGRADO ];                        
                        tableObj.row.add( row ).draw( false );
                    });
                }

                $('#Habilidades_aptitudes_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                $('#Habilidades_aptitudes_form').LoadingOverlay("hide");
            });

        }        
    }
}