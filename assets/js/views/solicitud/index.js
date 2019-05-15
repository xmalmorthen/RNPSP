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
            Nuevo : null,
            Imprimir : null,
            Replicar : null
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
        objViewIndex.vars.general.table.dom = $('#tableAdministrarsolicitud');
        objViewIndex.vars.btns.Nuevo = $('#Nuevo');
        objViewIndex.vars.btns.Imprimir = $('#Imprimir');
        objViewIndex.vars.btns.Replicar = $('#Replicar');
        objViewIndex.vars.checkbox.checkAll = $('#checkAll');

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
        
        //CHANGE
        objViewIndex.vars.checkbox.checkAll.on('change',objViewIndex.events.change.checkAll);
        $('.checkItem').on('change',objViewIndex.events.change.checkItem);

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
                
                //TODO: Xmal -  Implementar la impresión
                $('#imprimir')
                .on('shown.bs.modal', function (e) {

                    $('#aceptarFrmImprimir').on('click',objViewIndex.events.click.aceptarFrmImprimir);
                    $('#noFolio').focus();

                })
                .on('hidden.bs.modal', function (e) {
                    
                    $('#formImprimir').trigger("reset");

                })
                .modal('show');
                
            },
            Replicar : function(e, from){
                e.preventDefault();
                if (!objViewIndex.actions.validSelectedsCheck())
                    return null;

                //TODO: Xmal -  Implementar la replicación
            },
            aceptarFrmImprimir : function(e){
                var form = $('#formImprimir');
                try {
                    //VALID FORM
                    if (!form.valid())
                        throw new Error("Formulario incompleto");

                    // $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                    $.each( objViewIndex.vars.objs.itemsCheckeds, function( key, value ) {
                        debugger;
                    });

                    var model = form.serialize();
                    model += '&pID_ALTERNA=' + mainTabMenu.var.pID_ALTERNA;
                    model = {model : model};
                    model[csrf.token_name] = csrf.hash;                    
                    

                    // var callUrl = base_url + 'Solicitud/ajaxSaveDatosGeneralesGenerarCIB';

                    // $.post(callUrl,model,
                    // function (data) {  
                    //     objViewDatosGenerales.actions.ajax.callResponseValidations(form,data, from, tabRef, true, function(data){
                    //         console.log(data);
                    //         $.LoadingOverlay("hide");
                    //     });
                    // }).fail(function (err) {
                    //     objViewDatosGenerales.actions.ajax.throwError(err,form,from,tabRef);                            
                    // }).always(function () {
                    //     MyCookie.session.reset();
                    // });

                }catch(err) {
                    $.LoadingOverlay("hide");
                    //objViewDatosGenerales.actions.ajax.throwError(err,form,from,tabRef);
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
        }
    }
}