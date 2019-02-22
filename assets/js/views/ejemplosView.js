var objView = {
    vars : {
        table : null,
        form : null
    },
    init : function(){
        // INIT DATATABLE
        objView.vars.table = $('#table').DataTable({
                                "language": {
                                    "url": base_url + "assets/vendor/datatable/Spanish.txt"
                                },
                                "columnDefs": [
                                    { "orderable": false, "targets": [2] }
                                ]
                            });
        // INIT ELEMENTS
        objView.vars.form = $('form');

        // INIT SELECTS
        $('.select2').select2();

        // INIT DATEPICKER
        $('.singledatepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
        });

        // CLICK EVENTS
        $('.guardarAvance').on('click',objView.events.click.guardarAvance);
        $('.submit').on('click',objView.events.click.submit);        

        // OTHER ACIONS
        $('#ajaxSelect').getCatalog({
            query : 'Yi8reWI5VGNTY2d1YmJ3YWRPRnhhU0pFZzhEWkZUR1lmUDdTdzhQUHFEdmVZbEJ3M0xmMVVBVVpmUE9sL3Fud2tKZkg3ZnRFS0ZrUElNdVVBNmVad1BPMUwzZVRvS0hMS2F4SVdOWDMxTmhTeFFNSjRmQmcyZXRRQTFSUjd0bWJzMkxZWldsd0pNL2dlQ1pJNkFHVGZ2RlJjK1NZeFZRS21VTXh5TGt1K0hzPQ==',
            //params : 'ID_ACTIVO_SP = -1 AND ID_ACTIVO_SP = 1',
            emptyOption : true
        });

        // VERIFICAR SI EXISTE SERIALIZACIÓN DEL FORMULARIO
        if (isSerializedFORM === 'true'){
            Swal.fire({
                title: 'Guardado',
                html: "Se encontró información guardada, desea recuperarla?",
                type: 'question',
                position : 'top-end',
                allowOutsideClick : false,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
            }).then(function(result){
                if (result.value === true){
                    objView.actions.getSerializedFORM();
                } else if (result.dismiss === 'cancel') {
                    objView.vars.form.prepend('<div class="form-row"><div class="form-group col align-self-end"><button class="btn btn-outline-secondary pull-right btnRecoverProgress">Recuperar avance</button></div></div>');
                    $('.btnRecoverProgress').on('click', function(e){
                        e.preventDefault();
                        Swal.fire({
                            title: 'Recuperación',
                            html: "Se recuperará la última información guardada, cualquier cambio realizado será omitido...",
                            type: 'info',
                            position : 'top-end',
                            allowOutsideClick : false,
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33'
                        }).then(function(result){
                            if (result.value === true){
                                objView.actions.getSerializedFORM(function(result){
                                    if (result){
                                        $('.btnRecoverProgress').remove();
                                    }
                                });
                            }
                        });
                    })
                }
            });
        }
    },
    events : {
        click : {
            guardarAvance : function(e){
                e.preventDefault();
                $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
                    
                model = objView.vars.form.serialize();

                serialized.save(model,function(data){
                    if (data.status == true){
                        Swal.fire({ type: 'success', title: 'Guardado', html: 'Avance guardado correctamente'});
                    } else {
                        throw data.message;
                    }
                    $.LoadingOverlay("hide");
                }, function(err){
                    $.LoadingOverlay("hide");
                    Swal.fire({ type: 'error', title: 'Error', html: err.status + ' - ' + err.statusText });
                });
            },
            submit : function(e){
                e.preventDefault();
                try {
                    if (!objView.vars.form.valid()){
                        throw "Invalid FORM";
                    }

                    $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
                    
                    var callUrl = 'not end point', //base_url
                    model = objView.vars.form.serialize();

                    $.LoadingOverlay("hide");
                    Swal.fire({ type: 'success', title: 'Post Form', html: 'Formulario enviado [ ' + model + ' ]' });

                    /*$.post(callUrl,{
                        model: model
                    },
                    function (data) {					
                        if (data.status == true){
                            if (data.toGo.length > 0) {
                                window.location.href = data.toGo;
                            } else {
                                window.location.href = site_url;
                            }
                        } else {
                            $.LoadingOverlay("hide");
                            Swal.fire({ type: 'error', title: 'Error', html: data.message });
                        }
                    }).fail(function (err) {
                        $.LoadingOverlay("hide");
                        var msg = err.status + ' - ' + err.statusText;
                        Swal.fire({ type: 'error', title: 'Error', html: msg });
                    }).always(function () {
                    });*/
                }
                catch(err) {
                    $.LoadingOverlay("hide");
                }
            }
        }
    },
    actions : {
        getSerializedFORM : function(callback){
            $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
            serialized.get(function(data){
                if (data.status == true){
                    serialized.unserialize(objView.vars.form,data,function(){
                        $('.select2').select2();
                        Swal.fire({ type: 'success', title: 'Formulario', html: 'Información recuperada'});
                    });
                } else {
                    throw data.message;
                }
                $.LoadingOverlay("hide");
                callback(true);
            }, function(err){
                $.LoadingOverlay("hide");
                Swal.fire({ type: 'error', title: 'Error', html: err.status + ' - ' + err.statusText });
                callback(false);
            });            
        }
    }
}