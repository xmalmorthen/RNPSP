var objView = {
    vars : {
        table : null
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
            Swal({
                title: 'Guardado',
                text: "Se encontró información guardada, desea recuperarla?",
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
                    objView.actions.deleteSerializedFORM();                    
                }
            });
        }
    },
    events : {
        click : {
            guardarAvance : function(e){
                e.preventDefault();
                $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
                    
                model = $('form').serialize();

                serialized.save(model,function(data){
                    if (data.status == true){
                        swal({ type: 'success', title: 'Guardado', html: 'Avance guardado correctamente'});
                    } else {
                        throw data.message;
                    }
                    $.LoadingOverlay("hide");
                }, function(err){
                    $.LoadingOverlay("hide");
                    swal({ type: 'error', title: 'Error', html: err.status + ' - ' + err.statusText });
                });
            },
            submit : function(e){
                e.preventDefault();
                try {
                    if (!$('form').valid()){
                        throw "Invalid FORM";
                    }

                    $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
                    
                    var callUrl = 'not end point', //base_url
                    model = $('form').serialize();

                    $.LoadingOverlay("hide");
                    swal({ type: 'success', title: 'Post Form', html: 'Formulario enviado [ ' + model + ' ]' });

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
                            swal({ type: 'error', title: 'Error', html: data.message });
                        }
                    }).fail(function (err) {
                        $.LoadingOverlay("hide");
                        var msg = err.status + ' - ' + err.statusText;
                        swal({ type: 'error', title: 'Error', html: msg });
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
        getSerializedFORM : function(){
            $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
            serialized.get(function(data){
                if (data.status == true){
                    unserialize.do($('form'),data,function(){
                        $('.select2').select2();
                        swal({ type: 'success', title: 'Formulario', html: 'Información recuperada'});
                    });
                } else {
                    throw data.message;
                }
                $.LoadingOverlay("hide");
            }, function(err){
                $.LoadingOverlay("hide");
                swal({ type: 'error', title: 'Error', html: err.status + ' - ' + err.statusText });
            });            
        },
        deleteSerializedFORM : function(){

        }
    }
}