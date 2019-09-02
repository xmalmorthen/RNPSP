var objViewCapacitacion = {
    vars : {
        general : {
            init : false,
        },
        capacitacion : {
            forms : {
                Idiomas_dialectos_form : null,
                Habilidades_aptitudes_form : null
            },
            btns : {
                guardarIdioma : null,
                guardarHabilidad : null,
                solicitudCompleta : null
            },
            tables : {
                tableIdiomas : {
                    obj : null,
                    dom : null
                },
                tableHabilidades  : {
                    obj : null,
                    dom : null
                }
            }
        }
    },
    init : function(callback){        
        if (objViewCapacitacion.vars.general.init)
            return false;

        $('#myTabContent').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
        
        objViewCapacitacion.vars.general.mainContentTab = $('#Capacitacion');
        
        // INIT DATATABLE
        objViewCapacitacion.vars.capacitacion.tables.tableIdiomas.dom = $('#tableIdiomas');
        objViewCapacitacion.vars.capacitacion.tables.tableIdiomas.obj = objViewCapacitacion.vars.capacitacion.tables.tableIdiomas.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});
        objViewCapacitacion.vars.capacitacion.tables.tableHabilidades.dom = $('#tableHabilidades');
        objViewCapacitacion.vars.capacitacion.tables.tableHabilidades.obj = objViewCapacitacion.vars.capacitacion.tables.tableHabilidades.dom.DataTable({stateSave: true,"language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"}});

        // INIT ELEMENTS
        // FORMS
        objViewCapacitacion.vars.capacitacion.forms.Idiomas_dialectos_form = $('#Idiomas_dialectos_form');
        objViewCapacitacion.vars.capacitacion.forms.Habilidades_aptitudes_form = $('#Habilidades_aptitudes_form');
        // BUTTONS
        objViewCapacitacion.vars.capacitacion.btns.guardarIdioma = $('#guardarIdioma');
        objViewCapacitacion.vars.capacitacion.btns.guardarHabilidad = $('#guardarHabilidad');
        objViewCapacitacion.vars.capacitacion.btns.solicitudCompleta = $('#solicitudCompleta');

        // INIT SELECTS
        objViewCapacitacion.vars.general.mainContentTab.find('select').select2({width : '100%'});
        $(document).on('focus', '.select2.select2-container', function (e) {
            if (e.originalEvent) {
                if ($(this).siblings('select').is(':enabled'))
                    $(this).siblings('select').select2('open');
            }
        });

        //EVENTS
        //SUBMIT
        objViewCapacitacion.vars.general.mainContentTab.find("form").attr('novalidate', 'novalidate');
        objViewCapacitacion.vars.general.mainContentTab.find('form').submit(function(e){
            e.preventDefault();
        });
        // CLICK
        objViewCapacitacion.vars.capacitacion.btns.guardarIdioma.on('click',objViewCapacitacion.events.click.capacitacion.guardarIdioma);
        objViewCapacitacion.vars.capacitacion.btns.guardarHabilidad.on('click',objViewCapacitacion.events.click.capacitacion.guardarHabilidad);
        objViewCapacitacion.vars.capacitacion.btns.solicitudCompleta.on('click',objViewCapacitacion.events.click.capacitacion.solicitudCompleta);
        
        //FOCUSOUT
        $('input[type="date"]').on('focusout',function(event){
            $(this).val( $(this).val() );
        });
        
        //CAMBIO DE TABS
        objViewCapacitacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('hide.bs.tab',function(e){ dynTabs.change({ discardFunction: objViewCapacitacion.actions.discartChanges}, e); } );
        objViewCapacitacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('show.bs.tab',dynTabs.showTab);
        objViewCapacitacion.vars.general.mainContentTab.find('a[data-toggle="tab"]').on('shown.bs.tab',objViewCapacitacion.events.change.tableResponsive);

        populate.form($('#Idiomas_dialectos_form')); //popular selects del primer tab NOTA: cambiar programación al tab actual si se obtiene por cookie
        dynTabs.setCurrentTab($('#myTabContent'));

        mainTabMenu.actions.changeTab();

        $('#myTabContent').LoadingOverlay("hide");

        if (callback){
            if ($.isFunction( callback )){
                callback();
            }
        }

        objViewCapacitacion.vars.general.init = true;
    },
    events : {
        click : {
            general : {                
            },
            capacitacion : {
                guardarIdioma : function(e, from, tabRef){
                    e.preventDefault();
                    objViewCapacitacion.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveCapacitacionIdioma',from, tabRef, true, function(data){
                        fillData.capacitacion.idiomasDialectos(mainTabMenu.var.pID_ALTERNA);
                    });
                },
                guardarHabilidad : function(e, from, tabRef){
                    e.preventDefault();
                    objViewCapacitacion.actions.ajax.generateRequest($(this),base_url + 'Solicitud/ajaxSaveCapacitacionHabilidad',from, tabRef, true, function(data){
                        fillData.capacitacion.habilidadesAptitudes(mainTabMenu.var.pID_ALTERNA);
                    });
                },
                solicitudCompleta : function(e){
                    e.preventDefault();
                    
                    var callUrl = base_url + "Solicitud/ajaxSolicitudCompleta";

                    $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                    $.get(callUrl, 
                        { id : mainTabMenu.var.pID_ALTERNA },
                        function (data) {
                            if (data) {
                                if (data.results.status){

                                    toIgnore = [ 
                                        { idPestania: 1, idFicha: 4}, // datos generales - referencias
                                        { idPestania: 1, idFicha: 5}, // datos generales - socioeconónico / dependientes económnicos
                                        { idPestania: 2, idFicha: 2}, // laboral - Empleos diversos
                                        { idPestania: 2, idFicha: 3}, // laboral - Actitudes hacia el empleo
                                        { idPestania: 2, idFicha: 4}, // laboral - Comisiones
                                        { idPestania: 3, idFicha: 1}, // capacitación - idiomnas y/o dialecto
                                        { idPestania: 3, idFicha: 2},  // capacitación - habilidades y aptitudes                                        
                                        { idPestania: 4, idFicha: 1},  // identificación - Media Filiación
                                        { idPestania: 4, idFicha: 2},  // identificación - Señas Particulares
                                        { idPestania: 4, idFicha: 3},  // identificación - Ficha Fotográfica
                                        { idPestania: 4, idFicha: 4},  // identificación - Registro decadactilar
                                        { idPestania: 4, idFicha: 5},  // identificación - Digitalización de documento
                                        { idPestania: 4, idFicha: 6}  // identificación - Identificación de voz
                                    ];

                                    valid = true;
                                    itemsProcessed = 0;

                                    data.results.data.forEach( (item, index, array) => {
                                        
                                        if ( !toIgnore.find( qry => qry.idPestania == item.idPestania && qry.idFicha == item.idFicha ) ) {
                                            
                                            if ( item.tranEstatus == 0 ) {
                                                
                                                console.log(item);
                                                valid = false;

                                                //TODO - Xmal - MMarcar pestaña y ficha que contengan error
                                                selectorPestania = '';
                                                switch (item.idPestania) {
                                                    case 1:
                                                        selectorPestania = '#datosGenerales';
                                                    break;
                                                    case 2:
                                                        selectorPestania = '#Laboral';
                                                    break;
                                                    case 3:
                                                        selectorPestania = '#Capacitacion';
                                                    break;
                                                    case 4:
                                                        selectorPestania = '#Identificacion';
                                                    break;
                                                
                                                }
                                                objPestania = $('#mainContainerTab ' + selectorPestania + '-tab')
                                                dynTabs.markTab( objPestania,'<span class="text-danger tabMark errValidSolicitud mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>');
                                                
                                                objFicha = $('#myTabContent ' + selectorPestania + '.tab-pane .nav.nav-tabs li.nav-item:nth-child(' + item.idFicha + ') a.nav-link');
                                                dynTabs.markTab( objFicha,'<span class="text-danger tabMark errValidSolicitud mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>');

                                            }

                                        }

                                        itemsProcessed++;
                                        if(itemsProcessed === array.length) {
                                            
                                            $.LoadingOverlay("hide");
                                    
                                            if (valid){
                                                $('.validarReplicar').removeClass('d-none');
                                                Swal.fire({ 
                                                    type: 'success', 
                                                    title: 'Aviso', 
                                                    html: 'Solicitud válida'})
                                                .then( function(){

                                                    $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
                                                    window.location.href = site_url + 'Solicitud/Ver/' + mainTabMenu.var.pID_ALTERNA;

                                                });
                                            } else {
                                                $('.validarReplicar').addClass('d-none');
                                                Swal.fire({ 
                                                    type: 'warning', 
                                                    title: 'Aviso', 
                                                    html: 'Solicitud incompleta, favor de complementar la información necesaria',
                                                    footer: '<div>La información faltante requerida se ha marcado <br/>con el símbolo <span class="text-danger tabMark errValidSolicitud mr-2"><i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i></span>' });
                                            }

                                        }
                                        
                                    });
                                    
                                    return null;
                                }
                            }

                            Swal.fire({ type: 'error', title: 'Error', html: data.results.message ? data.results.message : 'Error no especificado al intentar validar la solicitud.' });

                        }).fail(function (err) {                    
                            
                            $.LoadingOverlay("hide",true);
                            var msg = err.responseText;
                            Swal.fire({ type: 'error', title: 'Error', html: msg });

                        }).always(function () {
                                        
                            MyCookie.session.reset();

                        });

                }
            }
        },
        change : {
            tableResponsive : function(){
                $.each( objViewCapacitacion.vars.capacitacion.tables, function( key, value ) {
                    try{value.obj.responsive.rebuild().responsive.recalc();}catch(err){}
                });                
            }
        }
    },
    actions : {        
        discartChanges : function(e,eTab){
            var form = $('#' + $(eTab.currentTarget).attr('aria-controls')).find('form');
            form.closeAlert({alertType : 'alert-danger'});

            dynTabs.markTab(dynTabs.tabs.prebTab.linkRef,'<span class="text-warning tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true"></i></span>');
            Swal.close();
                
            dynTabs.tabs.prebTab.tabForm.removeData('hasChanged');
            dynTabs.tabs.prebTab.tabForm.data('hasDiscardChanges',true);

            $("#" + eTab.relatedTarget.id).trigger('click');
        },
        ajax : {
            callResponseValidations : function(form, data, from, tabRef, resetForm, callback){
                try{
                    if (!data) 
                        throw new Error('Respuesta inesperada, favor de intentarlo de nuevo.');
                    if (!data.results)
                        throw new Error('Respuesta inesperada, favor de intentarlo de nuevo.');
                    if (typeof data.results.status === "undefined")
                        throw new Error('Estatus desconocido, favor de contactar a soporte.');
                    if (!data.results.status)
                        throw new Error(data.results.message ? data.results.message : 'Error desconocido.' );
                    
                    if (resetForm) {
                        form[0].reset();                        
                    }
                    
                    form.removeData('hasChanged').removeData('hasDiscardChanges').removeData('withError');
                    form.data('hasSaved',true);
                    form.data('requireddata',false);

                    if (from) {
                        if(from == 'tab') {
                            $(tabRef.relatedTarget).trigger('click');
                            dynTabs.markTab( $(tabRef.currentTarget),  '<span class="text-success tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true" ></i></span>');
                            return null;
                        }
                    }
                    dynTabs.markTab( dynTabs.getCurrentTab($('#myTabContent')).linkRef ,'<span class="text-success tabMark mr-2"><i class="fa fa-floppy-o" aria-hidden="true" ></i></span>');

                    if (callback) 
                        if ($.isFunction( callback ))
                            callback(data); 

                }catch(err) {
                    objViewCapacitacion.actions.ajax.throwError(err,form,from,tabRef);
                }
            },
            throwError: function(err,form,from,tabRef){
                $.LoadingOverlay("hide",true);
                
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.message ? err.message : err.statusText
                });

                form.removeData('hasSaved').removeData('hasDiscardChanges');
                form.data('withError',true);

                if (from) {
                    if(from == 'tab') {
                        dynTabs.markTab( $(tabRef.currentTarget),  '<span class="text-danger tabMark mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>');
                        return null;
                    }
                }
                dynTabs.markTab( dynTabs.getCurrentTab($('#myTabContent')).linkRef,'<span class="text-danger tabMark mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>');
            },
            generateRequest: function($this,callUrl,from,tabRef, resetForm, callback){
                var form = $this.parents('form:first');
                form.closeAlert({alertType : 'alert-danger'});
                
                try {
                    //VALID FORM
                    if (!form.valid())
                        throw new Error("Formulario incompleto");

                    $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
                    
                    $selectDisabled = form.find('select:disabled');
                    $selectDisabled.prop("disabled", false);

                    var model = form.serialize();
                    model += '&pID_ALTERNA=' + mainTabMenu.var.pID_ALTERNA;
                    model = {model : model};
                    model[csrf.token_name] = csrf.hash;

                    $selectDisabled.prop("disabled", true);
                    
                    $.post(callUrl,model,
                    function (data) {  
                        objViewCapacitacion.actions.ajax.callResponseValidations(form,data, from, tabRef, resetForm, callback);
                    }).fail(function (err) {
                        objViewCapacitacion.actions.ajax.throwError(err,form,from,tabRef);                            
                    }).always(function () {
                        $.LoadingOverlay("hide",true);
                        MyCookie.session.reset();
                    });

                }catch(err) {
                    objViewCapacitacion.actions.ajax.throwError(err,form,from,tabRef);                        
                }
            }
        }
        
    }
}