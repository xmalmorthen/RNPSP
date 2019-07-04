var objViewIndex = {
    vars : {
        general :{
            init : false,
            table : {
                dom : null,
                obj : null
            },
            replicationInterval : null,
            replicationCancel : false
        },
        btns : {
            Nuevo : null,
            Imprimir : null,
            Replicar : null,
            Eliminar : null,
            cancelReplication : null
        },
        checkbox : {
            checkAll : null
        },
        select : {
            optionPDF : null
        },
        objs : {
            itemsCheckeds : null
        }
    },
    init : function(){
        if (objViewIndex.vars.general.init)
            return false;

        $('.bodyVew').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
        
        // INIT ELEMENTS
        // BUTTONS
        objViewIndex.vars.general.table.dom = $('#tableAdministrarsolicitud');
        objViewIndex.vars.btns.Nuevo = $('#Nuevo');
        objViewIndex.vars.btns.Imprimir = $('#Imprimir');
        objViewIndex.vars.btns.Replicar = $('#Replicar');
        objViewIndex.vars.checkbox.checkAll = $('#checkAll');
        objViewIndex.vars.btns.Eliminar = $("a[name='eliminarSolicitud']");
        objViewIndex.vars.btns.cancelReplication = $('#cancelReplication');

        // SELECT
        objViewIndex.vars.select.optionPDF = $('#optionPDF');


        // INIT DATATABLE
        objViewIndex.vars.general.table.obj = $('#tableAdministrarsolicitud').DataTable({
            stateSave: true,
            "language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"},
            "columnDefs": [{"orderable": false,"targets": [0,8]}],
            "order" : [[1]],
            "initComplete": function(settings, json) {
                objViewIndex.vars.general.table.dom.removeClass('d-none');
                $('.bodyVew').LoadingOverlay("hide");
            }
        });

        //EVENTS
        // CLICK
        objViewIndex.vars.btns.Nuevo.on('click',objViewIndex.events.click.Nuevo);
        objViewIndex.vars.btns.Imprimir.on('click',objViewIndex.events.click.Imprimir);
        objViewIndex.vars.btns.Replicar.on('click',objViewIndex.events.click.Replicar);
        objViewIndex.vars.btns.Eliminar.on('click',objViewIndex.events.click.Eliminar);
        objViewIndex.vars.btns.cancelReplication.on('click',objViewIndex.events.click.cancelReplication);
        
        //CHANGE
        objViewIndex.vars.checkbox.checkAll.on('change',objViewIndex.events.change.checkAll);
        $('.checkItem').on('change',objViewIndex.events.change.checkItem);        
        objViewIndex.vars.select.optionPDF.on('change',objViewIndex.events.change.optionPDF);

        objViewIndex.vars.general.init = true;
    },
    events : {
        click : {
            Nuevo : function(e){
                e.preventDefault();
                location.href= base_url + "Solicitud/Alta";
            },
            Imprimir : function(e){

                e.preventDefault();
                if (!objViewIndex.actions.validSelectedsCheck())
                    return null;
                
                $('#imprimir')
                .on('shown.bs.modal', function (e) {

                    try {
                        $('#aceptarFrmImprimir').prop("onclick", null).off("click");    
                    } catch (error) {
                        
                    }
                    
                    $('#aceptarFrmImprimir').on('click',objViewIndex.events.click.aceptarFrmImprimir);

                    try {
                        $('#noFolio').focus();
                    } catch (error) {}

                })
                .on('hidden.bs.modal', function (e) {
                    
                    $('#aceptarFrmImprimir').prop("onclick", null).off("click");

                    $("#formImprimir").validate().resetForm();

                    $("#formImprimir")[0].reset();
                    $('#optionPDF').val(-1).trigger('change');

                    $('#frmAlert').addClass('d-none');

                })
                .modal('show');
                
            },
            Replicar : function(e, from){
                e.preventDefault();
                e.stopPropagation();

                if (!objViewIndex.actions.validSelectedsCheck())
                    return null;

                if ( localStorage.getItem('replicationProc') ){
                    
                    Swal.fire({ type: 'warning', title: 'Replicación', html: 'Actualmente se encuentra un proceso de replicación en ejecución, favor de esperar.' });
                    objViewIndex.actions.doIntervalReplication();
                    return false;

                }

                try {
                    
                    $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                    var ids = []
                    $.each( objViewIndex.vars.objs.itemsCheckeds, function( key, value ) {
                        ids.push($(value).data().idreg);
                    });

                    var model = 'ids=' + ids.join(',');
                    model = {model : model};
                    model[csrf.token_name] = csrf.hash;
                    
                    var callUrl = base_url + 'Solicitud/ajaxReplicar';

                    $.post(callUrl,model,
                    function (data) {

                        if (data.results.status != 1) {

                            $('#frmAlertSumaryMsg').html('<h5>Eror al replicar.</h5> <br/>' + data.results.message);
                            $('#frmAlertSumary').removeClass('d-none');
                            $.LoadingOverlay("hide",true);

                        } else {

                            guid = data.results.data[0].g_uid;
                            localStorage.setItem('replicationProc', JSON.stringify( { guid: guid, ids: ids } ) );

                            $('#Replicar').html('<i class="fa fa-cog fa-spin fa-fw"></i> Replicando, favor de esperar.').prop('disabled', true);
                            objViewIndex.actions.doIntervalReplication();
                            
                        }
                        
                    }).fail(function (err) {
                    
                        $('#frmAlertSumaryMsg').html('<h5>Eror al replicar.</h5> <br/>' + (err.message ? err.message : err.statusText));
                        $('#frmAlertSumary').removeClass('d-none');
                        $.LoadingOverlay("hide",true);

                    }).always(function () {

                        MyCookie.session.reset();

                    });

                }catch(err) {

                    $('#frmAlertSumaryMsg').html('<h5>Eror al replicar.</h5> <br/>' + (err.message ? err.message : err.statusText));
                    $('#frmAlertSumary').removeClass('d-none');
                    $.LoadingOverlay("hide",true);

                }

            },
            cancelReplication : function(e){
                e.preventDefault();

                Swal.fire({
                    type: 'question',
                    title: 'Confirmar cancelación del proceso de replicación',
                    showConfirmButton: true,
                    confirmButtonText: '<i class="fa fa-times" aria-hidden="true"></i> Si',
                    confirmButtonColor: 'red',
                    showCancelButton: true,
                    cancelButtonText: 'No'
                }).then((result) => {
                    
                    if (result.value) {
                        
                        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin",text:'Cancelando proceso de replicación.'});
                        objViewIndex.vars.general.replicationCancel = true;

                    }

                });


            },
            Eliminar : function(e){
                e.preventDefault();

                Swal.fire({
                    title: 'Aviso',
                    html: "Confirmar cancelación de la solicitud.",                    
                    type: 'question',
                    allowOutsideClick : false,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    input: 'textarea',
                    inputPlaceholder: 'Motivo de cancelación',
                    preConfirm: (motivo) => {
                        try {
                            if (!motivo)
                                throw new Error('Es necesario indicar el motivo');
                        } catch (error) {
                            Swal.showValidationMessage(error);
                        }
                    }
                }).then(function(result){
                    if (result.value && !result.dismiss ){
                        
                        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                        var id = $(e.currentTarget).data('id');
                        var callUrl = base_url + 'Solicitud/ajaxEliminar';
                        
                        var model = [];
                        model = { id : id, motivo: result.value};
                        model[csrf.token_name] = csrf.hash;
        
                        $.post(callUrl,model,
                        function (data) {
                            
                            if (!data.results.status) 
                                Swal.fire({ type: 'error', title: 'Error', html: data.results.message});
                            else 
                                location.reload();

                            $.LoadingOverlay("hide",true);
                        })
                        .fail(function (err) {
                            $.LoadingOverlay("hide",true);
                            Swal.fire({ type: 'error', title: 'Error', html: err.message ? err.message : err.statusText });
                        })
                        .always(function () {
                            MyCookie.session.reset();
                        });

                    }
                });

            },
            aceptarFrmImprimir : function(e){
                e.preventDefault();
                e.stopPropagation();

                try {
                    $form = $('#formImprimir');

                    //VALID FORM
                    if (!$form.valid())
                        throw new Error("Formulario incompleto");

                    $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                    var ids = []
                    $.each( objViewIndex.vars.objs.itemsCheckeds, function( key, value ) {
                        ids.push($(value).data().idreg);
                    });

                    var model = $form.serialize();
                    model += '&ids=' + ids.join(',') + '&valida=true';
                    model = {model : model};
                    model[csrf.token_name] = csrf.hash;
                    
                    var callUrl = base_url + 'Reportes/ajaxImprimirSolicitudes';

                    $.post(callUrl,model,
                    function (data) {

                        if (data.results.status != 1) {

                            $('#frmAlertMsg').html(data.results.message);
                            $('#frmAlert').removeClass('d-none');
                            $.LoadingOverlay("hide",true);

                        } else {

                            var errorList = '<ul class="list-group">';
                            var areErrors = false;
                            var areValid = false;
                            $.each(data.results.data, function( index, item ) {
                                if (item.estatus != 1){
                                    errorList += '<li class="list-group-item d-flex justify-content-between align-items-center"><strong>' + (item.nombre + ' ' + item.paterno +  ( item.materno ? ' ' + item.materno : '' )) + '</strong><span class="badge badge-danger" style="font-size: 100%!Important;">' + item.motivo + '</span></li>';
                                    areErrors = true;
                                } else {
                                    areValid = true;
                                }
                            });

                            //TODO: Xmal - Quitar línea de código al implementar
                            areValid = true;

                            if (areValid) {

                                var request = new XMLHttpRequest();

                                request.open('POST', callUrl, true);
                                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
                                request.setRequestHeader(csrf.token_name, csrf.hash);
                                request.responseType = 'blob';

                                request.onload = function() {

                                    if(request.status === 200) {
                                        var disposition = request.getResponseHeader('content-disposition');
                                        var matches = /"([^"]*)"/.exec(disposition);
                                        var filename = (matches != null && matches[1] ? matches[1] : 'reporte.pdf');

                                        var blob = new Blob([request.response], { type: 'application/pdf' });
                                        var link = document.createElement('a');
                                        link.href = window.URL.createObjectURL(blob);
                                        link.download = filename;

                                        $( "body" ).bind("DOMNodeRemoved", function(e){
                                            
                                            $( "body" ).unbind("DOMNodeRemoved");

                                            if (areErrors) {
                                                $('#frmAlertSumaryMsg').html('<h5>Eror al procesar una o varias de las solicitudes.</h5> <br/><br/>' + errorList);
                                                $('#frmAlertSumary').removeClass('d-none');
                                            }

                                        });

                                        document.body.appendChild(link);
                                        link.click();
                                        document.body.removeChild(link);

                                    } else {
                                        
                                        $('#frmAlertMsg').html(request.statusText);
                                        $('#frmAlert').removeClass('d-none');

                                    }

                                    // TODO: Xmal - Quitar comentarios al implementar
                                    // objViewIndex.vars.checkbox.checkAll.trigger('click');                                        
                                    $('#imprimir').modal('hide');
                                    $.LoadingOverlay("hide", true);

                                };

                                model = $form.serialize();
                                model += '&ids=' + ids.join(',') + '&valida=false';
                                model = {model : model};
                                model[csrf.token_name] = csrf.hash;
                                
                                request.send(model.model);
                            } else {
                                
                                $('#imprimir').modal('hide');

                                if (areErrors) {
                                    $('#frmAlertSumaryMsg').html('<h5>Eror al procesar una o varias de las solicitudes.</h5> <br/><br/>' + errorList);
                                    $('#frmAlertSumary').removeClass('d-none');
                                }

                                $.LoadingOverlay("hide",true);

                            }
                            
                            $('#formImprimir')[0].reset();
                            $('#optionPDF').val(-1).trigger('change');
                            
                        }
                        
                    }).fail(function (err) {
                    
                        $('#frmAlertMsg').html(err.message ? err.message : err.statusText);
                        $('#frmAlert').removeClass('d-none');
                        $.LoadingOverlay("hide",true);

                    }).always(function () {
                        MyCookie.session.reset();
                    });

                }catch(err) {

                    $('#frmAlertMsg').html(err.message ? err.message : err.statusText);
                    $('#frmAlert').removeClass('d-none');
                    $.LoadingOverlay("hide",true);

                }
                
            }
        },
        change : {
            checkAll : function(e){
                var rows = objViewIndex.vars.general.table.obj.rows({ 'search': 'applied' }).nodes();
                $('input[type="checkbox"]', rows).prop('checked', this.checked);

                var itemsSelecteds = $('input[type="checkbox"]:checked',rows);
                objViewIndex.vars.objs.itemsCheckeds = itemsSelecteds;
                itemsSelecteds.length > 0 ? objViewIndex.actions.setBadgetinButtons(itemsSelecteds.length): objViewIndex.actions.deleteBadgetinButtons();
            },
            checkItem : function(e){

                if (!this.checked && objViewIndex.vars.checkbox.checkAll.is(':checked'))
                    objViewIndex.vars.checkbox.checkAll.prop('checked', false);

                var rows = objViewIndex.vars.general.table.obj.rows({ 'search': 'applied' }).nodes(),
                    itemsSelecteds = $('input[type="checkbox"]:checked',rows);
                objViewIndex.vars.objs.itemsCheckeds = itemsSelecteds;
                itemsSelecteds.length > 0 ? objViewIndex.actions.setBadgetinButtons(itemsSelecteds.length): objViewIndex.actions.deleteBadgetinButtons();
            },
            optionPDF : function(e){
                
                try {
                    //CREATE DYNAMICALLY FORM
                    
                    $formRef = $('#div' + $(this).val());
                    if (!$formRef)
                        throw new Error("Referencia a formulario no encontrada.");

                    $dynamicallyContent = $('#dynamicallyContent');                    
                    if ( $dynamicallyContent.html().length > 0 ) {
                        $dynamicallyContent.find('>div').addClass('d-none').appendTo('#containerForms');
                    }

                    $formRef.removeClass('d-none').appendTo('#dynamicallyContent');
                    
                }catch(err) {

                    $('#frmAlertMsg').html(err.message ? err.message : err.statusText);
                    $('#frmAlert').removeClass('d-none');

                }

            }
        }
    },
    actions : {
        setBadgetinButtons : function(badgetContent){            
            objViewIndex.vars.btns.Imprimir.html('Imprimir <span class="badge badge-success">' + badgetContent + ' registros </span>');
            objViewIndex.vars.btns.Replicar.html('Replicar <span class="badge badge-success">' + badgetContent + ' registros </span>');
        },
        deleteBadgetinButtons : function(badgetContent){            
            objViewIndex.vars.btns.Imprimir.html('Imprimir');
            objViewIndex.vars.btns.Replicar.html('Replicar');
        },
        validSelectedsCheck : function(){
            var returnResponse = false;
            try {
                if (objViewIndex.vars.objs.itemsCheckeds.length <= 0)
                    throw '';
                returnResponse = true;
            } catch (error) {
                Swal.fire({ type: 'error', title: 'Error', html: 'Debe seleccionar al menos un registro' });
            }
            return returnResponse;
        },
        doIntervalReplication : function(){

            replicationProc = localStorage.getItem('replicationProc');

            if ( !replicationProc )
                return false;

            replicationProc = JSON.parse(replicationProc);
            
            $.LoadingOverlay("hide",true);
            // $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin",text:'Replicando solicitud(es)',progress : true});

            $('#frmAlertReplication, #frmAlertSumary').addClass('d-none');

            $('#frmAlertReplication .progress-bar').attr('aria-valuenow', 0).css('width', 0);
            $('#frmAlertReplication').removeClass('d-none');

            requestPending = false;
            objViewIndex.vars.general.replicationInterval = setInterval(function(){

                var model = 'guid=' + replicationProc.guid;
                model = {model : model};
                model[csrf.token_name] = csrf.hash;

                var callUrl = base_url + 'Solicitud/ajaxReplicarStatus';
                
                if (requestPending) 
                    return false;

                // $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin",text:'Replicando solicitud(es)',progress : true});                

                requestPending = true;
                $.post(callUrl,model,
                function (data) {

                    if (!data){

                        clearInterval( objViewIndex.vars.general.replicationInterval );

                        localStorage.removeItem('replicationProc');

                        $('#frmAlertSumaryMsg').html('<h5>Eror al replicar.</h5> <br/>' + data.results.message);
                        $('#frmAlertSumary').removeClass('d-none');
                        $('#frmAlertReplication').addClass('d-none');
                        $('#Replicar').html('Replicar').prop('disabled', false);
                        // $.LoadingOverlay("hide",true);

                    } else if (data.results.status != 1) {

                        clearInterval( objViewIndex.vars.general.replicationInterval );

                        localStorage.removeItem('replicationProc');

                        $('#frmAlertSumaryMsg').html('<h5>Eror al replicar.</h5> <br/>' + data.results.message);
                        $('#frmAlertSumary').removeClass('d-none');
                        $('#frmAlertReplication').addClass('d-none');
                        $('#Replicar').html('Replicar').prop('disabled', false);
                        // $.LoadingOverlay("hide",true);

                    } else {
                        
                        // $.LoadingOverlay("progress", ( (data.results.data.length * 100) / replicationProc.ids.length ) );
                        $('#frmAlertReplication .progress-bar').attr('aria-valuenow', ((data.results.data.length * 100) / replicationProc.ids.length ) ).css('width', ((data.results.data.length * 100) / replicationProc.ids.length ) + '%').html( data.results.data.length + ' de ' + replicationProc.ids.length + ' solicitud(es).');
                        $('#frmAlertReplication').removeClass('d-none');

                        if ( (data.results.data.length == replicationProc.ids.length) || objViewIndex.vars.general.replicationCancel){

                            clearInterval( objViewIndex.vars.general.replicationInterval );

                            localStorage.removeItem('replicationProc');

                            data.replicationCancel = objViewIndex.vars.general.replicationCancel;

                            localStorage.setItem( replicationProc.guid, JSON.stringify( data ));

                            window.location.href = site_url + 'Solicitud?replicationResult=' + replicationProc.guid;                            

                        }

                        $('#Replicar').html('<i class="fa fa-cog fa-spin fa-fw"></i> Replicando, favor de esperar.').prop('disabled', true);

                    }
                    
                }).fail(function (err) {
                
                    clearInterval( objViewIndex.vars.general.replicationInterval );

                    localStorage.removeItem('replicationProc');

                    $('#frmAlertSumaryMsg').html('<h5>Eror al replicar.</h5> <br/>' + (err.message ? err.message : err.statusText));
                    $('#frmAlertSumary').removeClass('d-none');
                    $('#frmAlertReplication').addClass('d-none');
                    $('#Replicar').html('Replicar').prop('disabled', false);
                    // $.LoadingOverlay("hide",true);
                    
                }).always(function () {
                    
                    requestPending = false;

                });

            }, 2000);            
            
        },
        showReplicationResult : function(guid){

            data = localStorage.getItem(guid);

            if (!data) 
                return false;

            localStorage.removeItem(guid);

            data = JSON.parse(data);

            var errorList = '<ul class="list-group">';
            var solicitudesError = 0;
            var solicitudesValidas = 0;
            $.each(data.results.data, function( index, item ) {
                if (item.estatus != 1){
                    errorList += '<li class="list-group-item d-flex justify-content-between align-items-center"><strong>' + (item.nombre + ' ' + item.paterno +  ( item.materno ? ' ' + item.materno : '' )) + '</strong><span class="badge badge-danger" style="font-size: 100%!Important;">' + item.motivo + '</span></li>';
                    solicitudesError ++;
                } else {
                    solicitudesValidas ++;
                }
            });

            if (solicitudesError > 0) {
                $('#frmAlertSumaryMsg').html('<h5>Eror al procesar una o varias de las solicitudes.</h5> <br/><br/>' + errorList);
                $('#frmAlertSumary').removeClass('d-none');
            }

            $.LoadingOverlay("hide",true);

            msg = 'Proceso de replicación ' + (data.replicationCancel ? '<strong class="text-danger _display-4">cancelado por el usuario.</strong> <br/>' : '<strong class="text-success _display-4">concluido.</strong> <br/>') +
            'Solicitudes válidas <strong class="text-success _display-4">' + solicitudesValidas + '</strong>' + ', con error <strong class="text-danger _display-4">' + solicitudesError + '</strong> de <strong class="text-info _display-4">' + data.results.data.length + '</strong> enviados.' ;

            Swal.fire({
                type: 'success',
                title: 'Replicación',
                html: msg,
                footer: solicitudesError > 0 ? 'Favor de revisar el sumario de errores' : ''
            });

        }
    }
}