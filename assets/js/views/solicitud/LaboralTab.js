var objViewLaboral = {
    vars : {
        general : {
            datosGeneralesContentTab : null,
            btnSiguienteAnterior : null
        },
        laboral : {
            forms : {
                Adscripcion_actual_form : null,
                Empleos_diversos_form : null,
                Actitudes_hacia_el_empleo_form : null,
                Comisiones_form : null
            },
            btns : {
                guardarAdscripcion : null,
                guardarEmpleo : null,
                guardarActitud : null,
                guardarComision : null
            }
        }
    },
    init : function(){
        objViewLaboral.vars.general.mainContentTab = $('#Laboral');
        
        // INIT DATATABLE
        // objViewLaboral.vars.table = $('#table').DataTable({"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"},"columnDefs": [{ "orderable": false, "targets": [2] }]});

        // INIT ELEMENTS
        // FORMS
        objViewLaboral.vars.laboral.forms.Adscripcion_actual_form = $('#Adscripcion_actual_form');
        objViewLaboral.vars.laboral.forms.Empleos_diversos_form = $('#Empleos_diversos_form');
        objViewLaboral.vars.laboral.forms.Actitudes_hacia_el_empleo_form = $('#Actitudes_hacia_el_empleo_form');
        objViewLaboral.vars.laboral.forms.Comisiones_form = $('#Comisiones_form');
        // BUTTONS
        objViewLaboral.vars.laboral.btns.guardarAdscripcion = $('#guardarAdscripcion');
        objViewLaboral.vars.laboral.btns.guardarEmpleo = $('#guardarEmpleo');
        objViewLaboral.vars.laboral.btns.guardarActitud = $('#guardarActitud');
        objViewLaboral.vars.laboral.btns.guardarComision = $('#guardarComision');

        objViewLaboral.vars.general.btnSiguienteAnterior = $('.btnSiguienteAnterior');
        
        // INIT SELECTS
        objViewLaboral.vars.general.mainContentTab.find('select').select2({width : '100%'});

        //EVENTS
        //SUBMIT
        objViewLaboral.vars.general.mainContentTab.find("form").attr('novalidate', 'novalidate');
        objViewLaboral.vars.general.mainContentTab.find('form').submit(function(e){
            e.preventDefault();
        });
        // CLICK
        objViewLaboral.vars.laboral.btns.guardarAdscripcion.on('click',objViewLaboral.events.click.laboral.guardarAdscripcion);
        objViewLaboral.vars.laboral.btns.guardarEmpleo.on('click',objViewLaboral.events.click.laboral.guardarEmpleo);
        objViewLaboral.vars.laboral.btns.guardarActitud.on('click',objViewLaboral.events.click.general.guardarActitud);
        objViewLaboral.vars.laboral.btns.guardarComision.on('click',objViewLaboral.events.click.general.guardarComision);
        objViewLaboral.vars.general.btnSiguienteAnterior.on('click',objViewDatosGenerales.events.click.general.btnSiguienteAnterior);
        //FOCUSOUT
        
        //CHANGE

        //Rutina para verificar si se hace algún cambio en cualquier forulario
        $.each(objViewLaboral.vars.laboral.forms, function( index, value ) {
            var form = value;
            form.find('input, select').change(function(e) {
                form.removeData('hasSaved');
                form.removeData('hasDiscardChanges');
                form.data('hasChanged',true);

                $(e.target).removeError();
            });
        });
        
        //CAMBIO DE TABS
        objViewLaboral.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('hide.bs.tab',function(e){ dynTabs.change({ discardFunction: objViewLaboral.actions.discartChanges}, e); } );
        objViewLaboral.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('show.bs.tab',dynTabs.showTab);

        populate.form($('#Adscripcion_actual_form')); //popular selects del primer tab NOTA: cambiar programación al tab actual si se obtiene por cookie
        dynTabs.setCurrentTab($('#myTabContent'));
    },
    events : {
        click : {
            general : {
                btnSiguienteAnterior : function(e){
                    e.preventDefault();
                    var tab = $(this).data('nexttab'); 
                    $(tab).tab('show');
                }
            },
            laboral : {
                guardarAdscripcion : function(e, from){
                    e.preventDefault();

                    var $this = $(this),
                        form = $this.parents('form:first');
                    
                    form.closeAlert({alertType : 'alert-danger'});

                    //VALID FORM
                    try {
                        if (!objViewLaboral.vars.laboral.forms.Adscripcion_actual_form.valid())
                            //throw "Invalid FORM"; //TODO: Xmal - Quitar comentario al implementar

                        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                        var callUrl = base_url + 'Ejemplos/ajaxGetSample';
                        model = {
                            var1 : 'val1',
                            var2 : 'val2'
                        };

                        $.when(
                            $.get(callUrl,{model : model})
                            .always(function () {
                                MyCookie.session.reset();
                            })
                        ).then( 
                            //success
                            function(data, textStatus, jqXHR){
                                form.removeData('hasChanged');
                                form.data('hasSaved',true);

                                dynTabs.markTab( ( dynTabs.tabs.prebTab.linkRef ? dynTabs.tabs.prebTab.linkRef : dynTabs.tabs.currentTab.linkRef),  '<span class="text-success tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true" ></i></span>');

                                $.LoadingOverlay("hide");

                                if (from)
                                    if(from == 'tab')
                                        dynTabs.tabs.prebTab.tabForm.find('.btnSiguienteAnterior.siguienteTab').trigger('click');
                            },
                            //error
                            function(err, textStatus, jqXHR){
                                $.LoadingOverlay("hide");
                                var msg = err.status + ' - ' + err.statusText;
                                                                
                                form.setAlert({
                                    alertType :  'alert-danger',
                                    dismissible : true,
                                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error al guardar',
                                    msg : msg,
                                    callback : function(){
                                        //swal({ type: 'error', title: 'Error', html: msg }); //se comenta porque al mostrar el modal no respeta el scroll top al bloque del alert.
                                    }
                                });

                                dynTabs.markTab( ( dynTabs.tabs.prebTab.linkRef ? dynTabs.tabs.prebTab.linkRef : dynTabs.tabs.currentTab.linkRef),  '<span class="text-danger tabMark mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>');
                            } 
                        );
                    }catch(err) {
                        dynTabs.markTab( ( dynTabs.tabs.prebTab.linkRef ? dynTabs.tabs.prebTab.linkRef : dynTabs.tabs.currentTab.linkRef),  '<span class="text-danger tabMark mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>');
                        form.setAlert({
                            alertType :  'alert-danger',
                            dismissible : true,
                            header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                            msg : 'Formulario incompleto'
                        });
                    }
                },
                guardarEmpleo : function(e, from){},
                guardarActitud : function(e, from){},
                guardarComision : function(e, from){}
            }
        }
    },
    actions : {        
        discartChanges : function(e){   
            dynTabs.markTab(dynTabs.tabs.prebTab.linkRef,'<span class="text-warning tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true"></i></span>');
            Swal.close();
                
            dynTabs.tabs.prebTab.tabForm.removeData('hasChanged');
            dynTabs.tabs.prebTab.tabForm.data('hasDiscardChanges',true);
            dynTabs.tabs.prebTab.tabForm.find('.btnSiguienteAnterior.siguienteTab').trigger('click');
        }
    }
}