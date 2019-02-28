var objViewIdentificacion = {
    vars : {
        general : {
            init : false,
            btnSiguienteAnterior : null
        },
        identificacion : {
            forms : {
                mediafiliacion_form : null,
                Datos_form : null,
                Senas_particulares_form : null,
                Ficha_fotografica_form : null,
                Registro_decadactilar_form : null,
                Digitalizacion_de_documento_form: null,
                Identificacion_de_voz_form: null
            },
            btns : {
                guardarmediafiliación : null,
                guardarSenia : null,                
                guardarFicha : null,
                guardarRegistrodecadactilar : null,
                guardarDocumento : null,
                guardarVoz : null,
                validarVoz : null,
                validarReplicar : null
            },
            tables : {
                tableSenasparticulares : {
                    obj : null,
                    dom : null
                },
                tableFichafotografica  : {
                    obj : null,
                    dom : null
                },
                tableRegistrodecadactilar  : {
                    obj : null,
                    dom : null
                },
                tableDigitalizaciondoc : {
                    obj : null,
                    dom : null
                }
            },
            files : {
                inputFile : null
            }
        }
    },
    init : function(callback){        
        if (objViewIdentificacion.vars.general.init)
            return false;

        $('#myTabContent').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
        
        objViewIdentificacion.vars.general.mainContentTab = $('#Identificacion');
        
        // INIT DATATABLE
        objViewIdentificacion.vars.identificacion.tables.tableSenasparticulares.dom = $('#tableSenasparticulares');
        objViewIdentificacion.vars.identificacion.tables.tableSenasparticulares.obj = objViewIdentificacion.vars.identificacion.tables.tableSenasparticulares.dom.DataTable({"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});
        objViewIdentificacion.vars.identificacion.tables.tableFichafotografica.dom = $('#tableFichafotografica');
        objViewIdentificacion.vars.identificacion.tables.tableFichafotografica.obj = objViewIdentificacion.vars.identificacion.tables.tableFichafotografica.dom.DataTable({"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});
        objViewIdentificacion.vars.identificacion.tables.tableRegistrodecadactilar.dom = $('#tableRegistrodecadactilar');
        objViewIdentificacion.vars.identificacion.tables.tableRegistrodecadactilar.obj = objViewIdentificacion.vars.identificacion.tables.tableRegistrodecadactilar.dom.DataTable({"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});
        objViewIdentificacion.vars.identificacion.tables.tableDigitalizaciondoc.dom = $('#tableDigitalizaciondoc');
        objViewIdentificacion.vars.identificacion.tables.tableDigitalizaciondoc.obj = objViewIdentificacion.vars.identificacion.tables.tableDigitalizaciondoc.dom.DataTable({"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});        

        //INIT TYPE FILES
        objViewIdentificacion.vars.identificacion.files.inputFile = $('.inputFile');

        // INIT ELEMENTS
        // FORMS
        objViewIdentificacion.vars.identificacion.forms.mediafiliacion_form = $('#mediafiliacion_form');
        objViewIdentificacion.vars.identificacion.forms.Datos_form = $('#Datos_form');
        objViewIdentificacion.vars.identificacion.forms.Senas_particulares_form = $('#Senas_particulares_form');
        objViewIdentificacion.vars.identificacion.forms.Ficha_fotografica_form = $('#Ficha_fotografica_form');
        objViewIdentificacion.vars.identificacion.forms.Registro_decadactilar_form = $('#Registro_decadactilar_form');
        objViewIdentificacion.vars.identificacion.forms.Digitalizacion_de_documento_form = $('#Digitalizacion_de_documento_form');
        objViewIdentificacion.vars.identificacion.forms.Identificacion_de_voz_form = $('#Identificacion_de_voz_form');

        // BUTTONS
        objViewIdentificacion.vars.identificacion.btns.guardarmediafiliación = $('#guardarmediafiliación');
        objViewIdentificacion.vars.identificacion.btns.guardarSenia = $('#guardarSenia');
        objViewIdentificacion.vars.identificacion.btns.guardarFicha = $('#guardarFicha');
        objViewIdentificacion.vars.identificacion.btns.guardarRegistrodecadactilar = $('#guardarRegistrodecadactilar');
        objViewIdentificacion.vars.identificacion.btns.guardarDocumento = $('#guardarDocumento');
        objViewIdentificacion.vars.identificacion.btns.guardarVoz = $('#guardarVoz');
        objViewIdentificacion.vars.identificacion.btns.validarVoz = $('#validarVoz');
        objViewIdentificacion.vars.identificacion.btns.validarReplicar = $('#validarReplicar');

        objViewIdentificacion.vars.general.btnSiguienteAnterior = $('.btnSiguienteAnterior');

        // INIT SELECTS
        objViewIdentificacion.vars.general.mainContentTab.find('select').select2({width : '100%'});
        $(document).on('focus', '.select2.select2-container', function (e) {
            if (e.originalEvent) {
                $(this).siblings('select').select2('open');
            }
        });

        //EVENTS
        //SUBMIT
        objViewIdentificacion.vars.general.mainContentTab.find("form").attr('novalidate', 'novalidate');
        objViewIdentificacion.vars.general.mainContentTab.find('form').submit(function(e){
            e.preventDefault();
        });
        // CLICK
        objViewIdentificacion.vars.identificacion.btns.guardarmediafiliación.on('click',objViewIdentificacion.events.click.identificacion.guardarmediafiliación);
        objViewIdentificacion.vars.identificacion.btns.guardarSenia.on('click',objViewIdentificacion.events.click.identificacion.guardarSenia);
        objViewIdentificacion.vars.identificacion.btns.guardarFicha.on('click',objViewIdentificacion.events.click.identificacion.guardarFicha);
        objViewIdentificacion.vars.identificacion.btns.guardarRegistrodecadactilar.on('click',objViewIdentificacion.events.click.identificacion.guardarRegistrodecadactilar);
        objViewIdentificacion.vars.identificacion.btns.guardarDocumento.on('click',objViewIdentificacion.events.click.identificacion.guardarDocumento);
        objViewIdentificacion.vars.identificacion.btns.guardarVoz.on('click',objViewIdentificacion.events.click.identificacion.guardarVoz);
        objViewIdentificacion.vars.identificacion.btns.validarVoz.on('click',objViewIdentificacion.events.click.identificacion.validarVoz);
        objViewIdentificacion.vars.identificacion.btns.validarReplicar.on('click',objViewIdentificacion.events.click.identificacion.validarReplicar);
        
        objViewIdentificacion.vars.general.btnSiguienteAnterior.on('click',objViewIdentificacion.events.click.general.btnSiguienteAnterior);
        
        // INIT TYPE FILES
        objViewIdentificacion.vars.identificacion.files.inputFile.on('change',objViewIdentificacion.events.change.inputFile);

        //Rutina para verificar si se hace algún cambio en cualquier forulario
        $.each(objViewIdentificacion.vars.identificacion.forms, function( index, value ) {
            var form = value;
            form.find('input, select').change(function(e) {
                form.removeData('hasSaved');
                form.removeData('hasDiscardChanges');
                form.data('hasChanged',true);

                $(e.target).removeError();
            });
        });
        
        //CAMBIO DE TABS
        objViewIdentificacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('hide.bs.tab',function(e){ dynTabs.change({ discardFunction: objViewIdentificacion.actions.discartChanges}, e); } );
        objViewIdentificacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('show.bs.tab',dynTabs.showTab);

        populate.form($('#mediafiliacion_form')); //popular selects del primer tab NOTA: cambiar programación al tab actual si se obtiene por cookie
        dynTabs.setCurrentTab($('#myTabContent'));

        mainTabMenu.actions.changeTab();

        objViewIdentificacion.vars.general.init = true;

        $('#myTabContent').LoadingOverlay("hide");

        if (callback){
            if ($.isFunction( callback )){
                callback();
            }
        }
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
            identificacion : {
                guardarmediafiliación : function(e, from){
                    e.preventDefault();

                    var $this = $(this),
                        form = $this.parents('form:first');
                    
                    form.closeAlert({alertType : 'alert-danger'});

                    //VALID FORM
                    try {
                        if (!objViewIdentificacion.vars.identificacion.forms.Adscripcion_actual_form.valid())
                            throw "Invalid FORM";

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
                                        //Swal.fire({ type: 'error', title: 'Error', html: msg }); //se comenta porque al mostrar el modal no respeta el scroll top al bloque del alert.
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
                guardarSenia : function(e, from){},                
                guardarFicha : function(e, from){},
                guardarRegistrodecadactilar : function(e, from){},
                guardarDocumento : function(e, from){},
                guardarVoz : function(e, from){},
                validarVoz : function(e, from){},
                validarReplicar : function(e, from){}
            }
        },
        change : {
            inputFile : function(e){

                var $this = this,
                    labelNameFile = $( $this ).closest( ".custom-file" ).find('label.custom-file-label');
                    
                if ($this.files && $this.files[0]) {   
                    var reader = new FileReader();
                    var filename = $($this).val();
                    filename = filename.substring(filename.lastIndexOf('\\')+1);
                    reader.onload = function(e) {
                        var renderTarjet = $('#' + $($this).data('renderin'));

                        renderTarjet.attr('src', e.target.result);
                        renderTarjet.hide();
                        renderTarjet.fadeIn(500);

                        labelNameFile.text(filename);
                    };
                    reader.readAsDataURL($this.files[0]);
                } else {
                    labelNameFile.text('');
                }
            } 
        }
    },
    actions : {        
        discartChanges : function(e,relatedTarget){ 
            
            dynTabs.markTab(dynTabs.tabs.prebTab.linkRef,'<span class="text-warning tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true"></i></span>');
            Swal.close();
                
            dynTabs.tabs.prebTab.tabForm.removeData('hasChanged');
            dynTabs.tabs.prebTab.tabForm.data('hasDiscardChanges',true);

            $("#" + relatedTarget.id).trigger('click');
            //dynTabs.tabs.prebTab.tabForm.find('.btnSiguienteAnterior.siguienteTab').trigger('click');
        }
    }
}