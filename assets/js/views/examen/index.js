var objViewIndex = {
    vars : {
        general :{
            init : false,
            table : {
                dom : null,
                obj : null
            }
        },
        btns : {
            Imprimir : null
        },
        checkbox : {
            checkAll : null
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
        objViewIndex.vars.general.table.dom = $('#tableData');
        objViewIndex.vars.btns.Imprimir = $('#Imprimir');
        objViewIndex.vars.checkbox.checkAll = $('#checkAll');

        // INIT DATATABLE
        objViewIndex.vars.general.table.obj = $('#tableData').DataTable({
            stateSave: true,
            "language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"},
            "columnDefs": [{"orderable": false,"targets": [0,6]}],
            "order" : [[1]],
            "initComplete": function(settings, json) {
                objViewIndex.vars.general.table.dom.removeClass('d-none');
                $('.bodyVew').LoadingOverlay("hide");
            }
        });

        //EVENTS
        // CLICK
        objViewIndex.vars.btns.Imprimir.on('click',objViewIndex.events.click.Imprimir);
        
        //CHANGE
        objViewIndex.vars.checkbox.checkAll.on('change',objViewIndex.events.change.checkAll);
        $('.checkItem').on('change',objViewIndex.events.change.checkItem);

        objViewIndex.vars.general.init = true;
    },
    events : {
        click : {
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
                    $('#frmAlert').addClass('d-none');

                })
                .modal('show');
                
            },
            aceptarFrmImprimir : function(e){
                e.preventDefault();
                e.stopPropagation();
                
                var form = $('#formImprimir');
                try {
                    //VALID FORM
                    if (!form.valid())
                        throw new Error("Formulario incompleto");

                    $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                    var ids = []
                    $.each( objViewIndex.vars.objs.itemsCheckeds, function( key, value ) {
                        ids.push($(value).data().idreg);
                    });

                    var model = form.serialize();
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

                            var errorList = '<ul>';
                            var areErrors = false;
                            var areValid = false;
                            $.each(data.results.data, function( index, item ) {
                                if (item.estatus != 1){
                                    errorList += '<li>' + (item.nombre + ' ' + item.paterno +  ( item.materno ? ' ' + item.materno : '' )) + ' - ' + item.motivo + '</li>';
                                    areErrors = true;
                                } else {
                                    areValid = true;
                                }
                            });

                            if (areErrors) {
                                $('#frmAlertMsg').html('Eror al procesar una o varias de las solicitudes. <br/>' + errorList);
                                $('#frmAlert').removeClass('d-none');
                            }

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

                                        document.body.appendChild(link);
                                        link.click();
                                        document.body.removeChild(link);

                                        objViewIndex.vars.checkbox.checkAll.trigger('click');
                                        
                                        $('#imprimir').modal('hide');
                                    } else {

                                        $('#frmAlertMsg').html(request.statusText);
                                        $('#frmAlert').removeClass('d-none');

                                    }
                                    $.LoadingOverlay("hide", true);
                                };

                                model = form.serialize();
                                model += '&ids=' + ids.join(',') + '&valida=false';
                                model = {model : model};
                                model[csrf.token_name] = csrf.hash;
                                
                                request.send(model.model);
                            }

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
            }
        }
    },
    actions : {
        setBadgetinButtons : function(badgetContent){            
            objViewIndex.vars.btns.Imprimir.html('Imprimir <span class="badge badge-success">' + badgetContent + ' registros </span>');
        },
        deleteBadgetinButtons : function(badgetContent){            
            objViewIndex.vars.btns.Imprimir.html('Imprimir');
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
        }
    }
}