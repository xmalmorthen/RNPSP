$(function() {
    var statusIDBInterval = setInterval(function(){
        if (iDB.status) {
            clearInterval(statusIDBInterval);
            statusIDBInterval = null;
            mainTabMenu.fireInit();
        }
    }, 300);

    validarVoz = $('.validarVoz');
    validarReplicar = $('.validarReplicar');

    validarVoz.on('click',validarVozFnc);
    validarReplicar.on('click',validarReplicarFnc.replicar);

    validarReplicarFnc.doIntervalReplication();

});

validarVozFnc = function(e){
    e.preventDefault();
    
    var callUrl = base_url + "Solicitud/ajaxValidar";

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
                        { idPestania: 3, idFicha: 2}, // capacitación - habilidades y aptitudes
                        { idPestania: 4, idFicha: 2}, // identificación - señas particulares
                        { idPestania: 4, idFicha: 4},  // identificación - Registro decadactilar
                        { idPestania: 4, idFicha: 6}  // identificación - identificación de voz
                    ];

                    valid = true;
                    itemsProcessed = 0;

                    data.results.data.forEach( (item, index, array) => {
                        
                        if ( !toIgnore.find( qry => qry.idPestania == item.idPestania && qry.idFicha == item.idFicha ) ) {
                            
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

                            objPestania = $('#mainContainerTab ' + selectorPestania + '-tab');

                            if ( item.tranEstatus == 0 ) {
                                
                                valid = false;

                                dynTabs.markTab( objPestania,'<span class="text-danger tabMark errValidSolicitud mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>');
                                
                                objFicha = $('#myTabContent ' + selectorPestania + '.tab-pane .nav.nav-tabs li.nav-item:nth-child(' + item.idFicha + ') a.nav-link');
                                dynTabs.markTab( objFicha,'<span class="text-danger tabMark errValidSolicitud mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>');

                            } else {
                                
                                dynTabs.unMarkTab( objPestania );

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
                                    html: 'Solicitud válida'});
                            } else {
                                $('.validarReplicar').addClass('d-none');
                                Swal.fire({ 
                                    type: 'warning', 
                                    title: 'Aviso', 
                                    html: 'No es válida la solicitud, favor de completar la información necesaria',
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

    
    
};

validarReplicarFnc = { 
    vars : {
        replicationInterval : null
    },
    replicar : function(e){
        e.preventDefault();

        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin",text:'Replicando solicitud'});

        var model = 'ids=' + mainTabMenu.var.pID_ALTERNA;
        model = {model : model};
        model[csrf.token_name] = csrf.hash;

        var callUrl = base_url + 'Solicitud/ajaxReplicar';

        $.post(callUrl,model,
        function (data) {

            if (data.results.status != 1) {

                $('#frmAlertSumaryMsg').html('<h5>Error al replicar.</h5> <br/>' + data.results.message);
                $('#frmAlertSumary').removeClass('d-none');
                $.LoadingOverlay("hide",true);

            } else {

                guid = data.results.data[0].g_uid;
                localStorage.setItem('replicationSingleProc', JSON.stringify( { guid: guid, ids: mainTabMenu.var.pID_ALTERNA } ) );

                $('.validarReplicar').html('<i class="fa fa-cog fa-spin fa-fw"></i> Replicando, favor de esperar.').prop('disabled', true);
                validarReplicarFnc.doIntervalReplication();
                
            }
            
        }).fail(function (err) {
        
            $('#frmAlertSumaryMsg').html('<h5>Error al replicar.</h5> <br/>' + (err.message ? err.message : err.statusText) );
            $('#frmAlertSumary').removeClass('d-none');
            $.LoadingOverlay("hide",true);

        }).always(function () {

            MyCookie.session.reset();

        });
        
    },
    doIntervalReplication : function(){

        replicationSingleProc = localStorage.getItem('replicationSingleProc');

        if ( !replicationSingleProc )
            return false;

        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin",text:'Replicando solicitud'});

        $('#frmAlertSumary').addClass('d-none');
        
        replicationSingleProc = JSON.parse(replicationSingleProc);
                
        requestPending = false;
        validarReplicarFnc.vars.replicationInterval = setInterval(function(){

            var model = 'guid=' + replicationSingleProc.guid;
            model = {model : model};
            model[csrf.token_name] = csrf.hash;

            var callUrl = base_url + 'Solicitud/ajaxReplicarStatus';
            
            if (requestPending) 
                return false;

            $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin",text:'Replicando solicitud'});
            
            requestPending = true;
            $.post(callUrl,model,
            function (data) {

                if (!data){

                    clearInterval( validarReplicarFnc.vars.replicationInterval );

                    localStorage.removeItem('replicationSingleProc');

                    $('#frmAlertSumaryMsg').html('<h5>Error al replicar.</h5> <br/>' + data.results.message);
                    $('#frmAlertSumary').removeClass('d-none');                    
                    $('.validarReplicar').html('Replicar').prop('disabled', false);
                    $.LoadingOverlay("hide",true);

                } else if (data.results.status != 1) {

                    clearInterval( validarReplicarFnc.vars.replicationInterval );

                    localStorage.removeItem('replicationSingleProc');

                    $('#frmAlertSumaryMsg').html('<h5>Error al replicar.</h5> <br/>' + data.results.message);
                    $('#frmAlertSumary').removeClass('d-none');                    
                    $('.validarReplicar').html('Replicar').prop('disabled', false);
                    $.LoadingOverlay("hide",true);

                } else {
                    
                    $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin",text:'Replicando solicitud'});                    

                    if ( data.results.data.length ==  1){

                        clearInterval( validarReplicarFnc.vars.replicationInterval );

                        localStorage.removeItem('replicationSingleProc');

                        $('.validarReplicar').html('Replicar');

                        validarReplicarFnc.showReplicationResult(data);

                    }

                    $('#Replicar').html('<i class="fa fa-cog fa-spin fa-fw"></i> Replicando, favor de esperar.').prop('disabled', true);

                }
                
            }).fail(function (err) {
            
                clearInterval( validarReplicarFnc.vars.replicationInterval );

                localStorage.removeItem('replicationSingleProc');

                $('#frmAlertSumaryMsg').html('<h5>Error al replicar.</h5> <br/>' + (err.message ? err.message : err.statusText) );
                $('#frmAlertSumary').removeClass('d-none');
                $('.validarReplicar').html('Replicar').prop('disabled', false);
                $.LoadingOverlay("hide",true);
                
            }).always(function () {
                
                requestPending = false;

            });

        }, 2000);            
        
    },
    showReplicationResult : function(data){

        if (!data) 
            return false;

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
            $('#frmAlertSumaryMsg').html('<h5>Error al procesar una o varias de las solicitudes.</h5> <br/>' + errorList);
            $('#frmAlertSumary').removeClass('d-none');
        }

        $.LoadingOverlay("hide",true);

        if ( solicitudesValidas > 0) {
            msg = 'Solicitud' + ( solicitudesValidas > 1  ? 'es' : '' ) + ' enviada' + ( solicitudesValidas > 1  ? 's' : '' ) + ' al RNPSP';

            Swal.fire({
                type: 'success',
                title: 'Replicación',
                text: msg
            });
        }
    }
}

var mainTabMenu = {
    var : {
        pID_ALTERNA : null,
        nuevoRegistro: true
    },
    fireInit : function(){
        $('._container.d-none').removeClass('d-none');

        if (formMode.length == 0)
            window.location.href = base_url + 'Error/setError?err=No se especificó el modo del formulario!!!';

        dynTabs.mode = formMode;

        //CAMBIO DE TABS
        //MAIN TAB
        $('#mainContainerTab a[data-toggle="tab"]').on('show.bs.tab',mainTabMenu.tab.change);
        $('#mainContainerTab a[data-toggle="tab"]').on('shown.bs.tab',function() {dynTabs.loaderTab()});
        $('#mainContainerTab a[data-toggle="tab"]').on('shown.bs.tab',mainTabMenu.actions.tableResponsive);
        

        var linkRefHash = MyCookie.tabRef.get(dynTabs.mode + 'MainTab');
        if (!linkRefHash){
            linkRefHash = $('#mainContainerTab .nav-item a.nav-link.active')[0].id;
            MyCookie.tabRef.save(dynTabs.mode + 'MainTab',linkRefHash);
        }
        var linkRef = $('#' + linkRefHash);

        mainTabMenu.actions.init(
            linkRef.attr('aria-controls'),
            function(){
                linkRef.trigger('click');
            }
        );
        switch (formMode) {
            case 'edit':
                mainTabMenu.var.nuevoRegistro = false;
                mainFormActions.populateData(id);
            break;
            case 'add' : 
                mainTabMenu.mainInit();
            break;
        }

        $('.btnSiguienteAnterior').on('click',function(e){
            e.preventDefault();
            var tab = $(this).data('nexttab'); 
            $(tab).tab('show');
        })

        $('.endTab').on('click',function(e){

            refFirstTab = $('#myTabContent .tab-pane.show.active .nav.nav-tabs li.nav-item a.nav-link:first');

            refFirstTab.trigger('click');

            var tabChanged = false;
            var itervalEndTab = setInterval(function() {

                refFirstTab = $('#myTabContent .tab-pane.show.active .nav.nav-tabs li.nav-item a.nav-link:first');
                refActualTab = $('#myTabContent .tab-pane.show.active .nav.nav-tabs li.nav-item a.nav-link.active');
                
                if ( refFirstTab.attr('id') == refActualTab.attr('id') ) {

                    clearInterval(itervalEndTab);
                    
                    if (!tabChanged) {
                        tabChanged = true;

                        var nextTab = $('#mainContainerTab li.nav-item a.nav-link.active').closest('li').next('li.nav-item').find('a.nav-link');
                        nextTab.tab('show');

                    }

                }

            }, 1000);

        });

        $('form').on('reset', function(e){
            $(this).find('select').val(null).trigger('change').trigger('change.select2');
        });        
    },
    tab : {
        change : function(e){
            var tabRef = $(e.currentTarget),
                tabRefId = $("#" + e.currentTarget.id),        
                forms = $('#myTabContent>.tab-pane.show.active form'),
                allFormsSaved = true;

            e.preventDefault();

            $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var intervalLoadingChange = setInterval(function(){

                formsInLoading = false;
                forms.each(function( index ) {
                    if ( $(this).data('loading') == true ) {
                        formsInLoading = true;
                    }
                });

                if (!formsInLoading){

                    window.clearInterval(intervalLoadingChange);

                    setTimeout(function(){}, 1000);

                    forms.each(function( index ) {
                
                        if ( $(this).data('requireddata') != false ) {

                            //console.log()

                            allFormsSaved = false;
                            
                            idrefForm = $(this).closest('.tab-pane').attr('id');

                            $.each( $("#myTabContent .tab-pane .nav.nav-tabs .nav-item a.nav-link"), function( key, value ) {
                                if ( $(this).attr('aria-controls') == idrefForm ) {
                                    
                                    $(this).find('span.tabMark').remove();
                                    $(this).prepend('<span class="text-danger tabMark errorValidation mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i></span>');

                                    var date = moment( new Date() ).format('DD/MM/YYYY'),
                                        time = moment( new Date() ).format('h:mm:ss a'),
                                        titleMsg = 'Acción realizada [ ' + time + ' - ' + date + ' ]';

                                    $(this).find('span.tabMark').data('toggle','tooltip').prop('title',titleMsg);
                                    $('[data-toggle="tooltip"]').tooltip();

                                }
                            });

                        }

                    });

                    $(e.relatedTarget).data('finish',allFormsSaved);
                    
                    if (!$(e.relatedTarget).data('finish')){
                        
                        $.LoadingOverlay("hide", true);
                        e.preventDefault();
                        Swal.fire({ type: 'warning', title: 'Aviso', html: 'Debe completar y guardar la información de las pestañas que actualmente se muestran.' });
                        return null;
                        
                    }

                    mainTabMenu.actions.init(tabRef.attr('aria-controls'));
                    MyCookie.tabRef.save(dynTabs.mode + 'MainTab',tabRef.attr('id'));
                    
                    $('#mainContainerTab.nav li.nav-item a.nav-link.active').removeClass('active');
                    $('#myTabContent.tab-content>.tab-pane.active.show').removeClass('active show');

                    tabRef.addClass('active');
                    $(tabRef[0].hash).addClass('active show');

                    dynTabs.loaderTab();

                    return null;
                }                

            }, 1000);
            
        }
    },
    actions : {
        inited : false,
        init : function(tabRef, callback){
            mainTabMenu.actions.inited = false;

            // dynTabs.validForm = formMode != 'edit' ? true : false;

            switch (tabRef) {
                case 'datosGenerales':
                    objViewDatosGenerales.init(function(){
                        dynTabs.validForm = true; 
                        mainTabMenu.actions.inited = true;                         
                    });
                break;
                case 'Laboral':
                    objViewLaboral.init(function(){
                        if (dynTabs.mode == 'edit' && !objViewLaboral.vars.general.init) { 
                            fillData.laboral.all();
                        }

                        dynTabs.validForm = true; 
                        mainTabMenu.actions.inited = true;
                    });
                break;
                case 'Capacitacion':
                    objViewCapacitacion.init(function(){ 
                        if (dynTabs.mode == 'edit' && !objViewCapacitacion.vars.general.init) { 
                            fillData.capacitacion.all();
                        }

                        dynTabs.validForm = true; 
                        mainTabMenu.actions.inited = true;
                    });
                break;
                case 'Identificacion':
                    objViewIdentificacion.init(function(){ 
                        if (dynTabs.mode == 'edit' && !objViewIdentificacion.vars.general.init) { 
                            fillData.identificacion.all();
                        }

                        dynTabs.validForm = true; 
                        mainTabMenu.actions.inited = true;
                    });
                break;
            }
            if (callback) {
                if ($.isFunction( callback )) {
                    callback();
                    var initInterval = setInterval(function(){
                        if (mainTabMenu.actions.inited) {
                            clearInterval(initInterval);
                            callback();
                        }
                    }, 100);
                }
            }
        },
        changeTab : function(){
            var linkRefHash = MyCookie.tabRef.get(dynTabs.mode + 'ChildTab');
            if (!linkRefHash){
                linkRefHash = $('#myTabContent .tab-pane.active .nav-item a.nav-link.active')[0].id;
                MyCookie.tabRef.save(dynTabs.mode + 'ChildTab',linkRefHash);
            }
            var linkRef = $('#' + linkRefHash);
            linkRef.trigger('click');
        },
        tableResponsive : function(){            
            try {
                objViewDatosGenerales.events.change.tableResponsive();
            } catch (error) {}
            try {
                objViewLaboral.events.change.tableResponsive();
            } catch (error) {}
            try {
                objViewCapacitacion.events.change.tableResponsive();
            } catch (error) {}
            try {
                objViewIdentificacion.events.change.tableResponsive();
            } catch (error) {}
        }
    },
    mainInit : function(){
        Swal.fire({
            title: 'Clave CURP',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            showLoaderOnConfirm: true,
            preConfirm: (CURP) => {
                try {
                    if (CURP.length < 18 || CURP.length > 20)
                        throw new Error('Formato de CURP incorrecto');

                    var callUrl = base_url + `Solicitud/ajaxGetSolicitudByCURP`;

                    return new Promise(function (resolve, reject) {
                        $.get(callUrl,{
                            CURP : CURP.toUpperCase()
                        },
                        function (data) {
                            resolve(data);
                        }).fail(function (err) {                    
                            reject(err);
                        });
                    }).then(function (data) {
                        if (data.results.status == 0) {
                            return new Promise(function (resolve,reject){
                                callUrl = base_url + `ajaxAPIs/curp`;
                                $.get(callUrl,{
                                    model : {CURP : CURP.toUpperCase() }
                                },
                                function (data) {
                                    resolve(data);
                                }).fail(function (err) {                    
                                    reject(err);
                                });
                                
                            }).then(function(data){
                                return {from:'query', data: data[0]};
                            });
                        } else if (data.results.status == 1) {
                            return {from:'bd', data: data};
                        } else {
                            throw new Error(data.results.message);
                        }                        
                    }).catch(function(err){
                        Swal.showValidationMessage(err.statusText ? err.statusText : err.message);
                    });
                } catch (error) {
                    Swal.showValidationMessage(error);
                }
            },
            allowOutsideClick: false,
            onBeforeOpen: () => {  
                $('.swal2-container').css('z-index','2000');
                $('.swal2-container').data('preserve',true).data('preserveCall','mainTabMenu.mainInit');
            }
        }).then((result) => {
            if ( typeof result.dismiss !== 'undefined') {
                window.location.href = base_url + 'Solicitud';
            }else {                
                if (result.value.from == 'query')                    
                    mainFormActions.populateCURPFields(result.value.data);                    
                else {
                    mainTabMenu.var.nuevoRegistro = false;
                    mainFormActions.fillData(result.value.data);
                }
            }
        });
    }
}

var mainFormActions = {
    populateCURPFields : function (data) {
        objViewDatosGenerales.actions.populateCURPData(data);
    },
    populateData : function(idRef){        
        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
        var callUrl = base_url + 'Solicitud/ajaxGetSolicitudById';

        return new Promise(function (resolve, reject) {
            $.get(callUrl,{
                idRef : idRef
            },
            function (data) {
                resolve(data);
            }).fail(function (err) {                    
                reject(err);
            });
        }).then(function (data) {
            if (data.results) {
                mainFormActions.fillData(data);
            } else
                throw new Error('No se encontró información');

        }).catch(function(err){
            $.LoadingOverlay("hide",true);
            Swal.fire({ type: 'error', title: 'Error', html: err.statusText ? err.statusText : err.message})
            .then(() => {
                window.location.href = base_url + 'Solicitud';
            });
        });        
    },
    fillData : function(data){

        data = data.results.data;

        mainTabMenu.var.pID_ALTERNA = data.pID_ALTERNA;

        $('#pID_ALTERNA').val(mainTabMenu.var.pID_ALTERNA);

        if (mainTabMenu.var.pID_ALTERNA == null){
            Swal.fire({
                type: 'error',                        
                title: 'Error',
                html: "No se recuperó el ID ALTERNA",
                allowOutsideClick : false,
            }).then(function(result){
                window.location.href = base_url + 'Solicitud';
            });
            return null;
        }

        fillData.datosGenerales.all(data);

        $('.consultaCURP').readOnly();
        dynTabs.mode = 'edit';
        
        dynTabs.loaderTab();
    },
    insertValueInSelect : function(ref,value){

        if (ref.length > 0 && value){
            $objTypeOf = ref[0].tagName.toLowerCase();            

            switch ($objTypeOf) {
                case 'input':
                    $type = ref.attr('type').toLowerCase();
                    switch ($type) {
                        case 'text':
                        case 'password':
                        case 'date':
                        case 'email':
                        case 'hidden':
                        case 'number':
                            ref.val(value);
                        break;                        
                    }
                break;
                case 'select':                

                    $options = ref.children('option:enabled');
                    if ($options.length == 0) {
                        ref.data('insert', value);

                        //console.log( 'insertValueInSelect [' + ref.attr('name') + '] data insert [ ' + value + ' ]');

                    } else {

                        if (!ref.data('populated')) {
                            ref.data('insert', value);
                            
                            //console.log( 'insertValueInSelect [' + ref.attr('name') + '] data insert [ ' + value + ' ]');

                        } else {

                            $areInserted = false;

                            $options.each(function ($key, $value) {
                                if ($value.value == value) {
                                    ref.val(value).trigger('change.select2').trigger('change');
                                    $areInserted = true;
                                }
                            });

                            if (!$areInserted) {
                                ref.data('insert', value);

                                //console.log( 'insertValueInSelect [' + ref.attr('name') + '] data insert [ ' + value + ' ]');

                            } else {
                                ref.removeData('insert');

                                //console.log( 'insertValueInSelect [' + ref.attr('name') + '] val [ ' + value + ' ]');
                            }
                        }
                    }
                    
                break;                                    
                default:
                    ref.html(value);
                break;
            }            
        }
    }
};

var fillData = {
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
    previewImg : function($this){
        const $href = $($this).attr('href'),
            $alt = $($this).attr('alt');


        if ($href == '#')
            Swal.fire({
                type: 'error',
                title: 'Imagen',
                text: 'No se pudo recuperar la imagen'
            });
        else 
            Swal.fire({
                imageUrl: $href,
                imageWidth: 250,
                imageAlt: $alt,
                text: $alt,
                onOpen: () => {},
                onBeforeOpen: () =>{
                    $('.swal2-image').addClass('img-thumbnail');
                }
            });
        
        return false;
    },
    datosGenerales : {
        rules : {
            disabledComponents : 
                    [
                    'pCURP',
                    'pRFC_DOMICILIO',
                    'pNOMBRE_DATOS_PERSONALES',
                    'pPATERNO_DATOS_PERSONALES',
                    'pMATERNO_DATOS_PERSONALES',
                    'pSEXO_DATOS_PERSONALES',
                    'pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES',
                    'pID_PAIS_NAC',
                    'pID_ENTIDAD_NAC',
                    'pID_MUNICIPIO_NAC',
                    'pCIUDAD_NAC_DATOS_PERSONALES',
                    'pID_NACIONALIDAD',
                    'pMODO_NACIONALIDAD',
                    'pFECHA_NACIONALIDAD',
                    'pID_ESTADO_CIVIL',
                    'pCARTILLA_SMN',
                    'pCREDENCIAL_ELECTOR',
                    'pPASAPORTE',
                    'pLICENCIA_DATOS_PERSONALES',
                    'pLICENCIA_VIG',
                    'pCUIP'],
            tmov :  ['AE', 'CE', 'DE', 'HE', 'RE', 'AA', 'CA', 'HA', 'RA', 'BE', 'BA']
        },
        all : function(data){
            fillData.datosGenerales.datosPersonales(data);
            fillData.datosGenerales.desarrolloAcademico(mainTabMenu.var.pID_ALTERNA);
            fillData.datosGenerales.domicilio(mainTabMenu.var.pID_ALTERNA);
            fillData.datosGenerales.referencias(mainTabMenu.var.pID_ALTERNA);
            fillData.datosGenerales.socioeconomicos(mainTabMenu.var.pID_ALTERNA);
            fillData.datosGenerales.dependientesEconomicos(mainTabMenu.var.pID_ALTERNA);

            // Si viene de la vista de ver -  posicionar en el tab que se encontraba para su edición
            if (selectPrincipalTabId){
                $('#' + selectPrincipalTabId).trigger('click');
                if (selectSubTabId){
                    $('#' + selectSubTabId).trigger('click');
                }

                var intervalTop = setInterval(function(){
                    clearInterval(intervalTop);
                    $('html, body').scrollTop(0);
                },500);

            }
        },
        datosPersonales : function(data){

            //console.log(data);

            if ( $.inArray( data.pTIPO_OPERACION, fillData.datosGenerales.rules.tmov ) == -1 ){
                fillData.datosGenerales.rules.disabledComponents.push('pTIPO_OPERACION');
                $("#Datos_personales_form .btnGuardarSection").attr('offEvent','true');
            }
            
            //AutoFill
            $ignore = ['pID_ENTIDAD_NAC','pID_MUNICIPIO_NAC']
            $.each(data,function(key,value){
                if ( $.inArray(key,$ignore) == -1) {
                    mainFormActions.insertValueInSelect($('#'+ key),value);
                }
            });

            $('#pID_ENTIDAD_NAC, #pID_MUNICIPIO_NAC').data('ignoreChangeFirst', true);

            //Special
            //DATOS GENERALES - DATOS PERSONALES
            mainFormActions.insertValueInSelect($('#pRFC_DOMICILIO'),data.pRFC);        
            mainFormActions.insertValueInSelect($('#pNOMBRE_DATOS_PERSONALES'),data.pNOMBRE);
            mainFormActions.insertValueInSelect($('#pPATERNO_DATOS_PERSONALES'),data.pPATERNO);
            mainFormActions.insertValueInSelect($('#pMATERNO_DATOS_PERSONALES'),data.pMATERNO);
            mainFormActions.insertValueInSelect($('#pSEXO_DATOS_PERSONALES'),data.pSEXO);
            mainFormActions.insertValueInSelect($('#pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES'),moment( data.pFECHA_NAC,'DD/MM/YYYY' ).format('YYYY-MM-DD'));
            mainFormActions.insertValueInSelect($('#pCIUDAD_NAC_DATOS_PERSONALES'),data.pCIUDAD_NAC);
            mainFormActions.insertValueInSelect($('#pCREDENCIAL_ELECTOR'),data.pCREDENCIAL_ELECTOR);
            mainFormActions.insertValueInSelect($('#pPASAPORTE'),data.pPASAPORTE);
            mainFormActions.insertValueInSelect($('#pLICENCIA_DATOS_PERSONALES'),data.pLICENCIA);
            mainFormActions.insertValueInSelect($('#pLICENCIA_VIG'),data.pFECHA_LICENCIA_VIG);
            mainFormActions.insertValueInSelect($('#pFECHA_NAC'), moment( data.pFECHA_NAC ).format('DD/MM/YYYY'));

            fillData.datosGenerales.CIB(mainTabMenu.var.pID_ALTERNA);

            objViewDatosGenerales.actions.ajax.populateCmbOperacion();

            actualizaInputsFormDissable(data.pTIPO_OPERACION);

            $('#Datos_personales_form').data('retrieved',true).data('requireddata',false).data('hasChanged',false);

        },
        CIB : function(pID_ALTERNA){
            if (!objViewDatosGenerales.vars.datosGenerales.tables.tableDatospersonales.dom) 
                return false;

            var tableRef = $('#' + objViewDatosGenerales.vars.datosGenerales.tables.tableDatospersonales.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewDatosGenerales.vars.datosGenerales.tables.tableDatospersonales.obj,
                callUrl = base_url + `Solicitud/getPersonaCIB`;

            
            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pCIB, value.pMotivoCIB ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.datosGenerales.CIB(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });

            $('#Datos_personales_CIB_form').data('requireddata',false);
            
        },
        desarrolloAcademico : function(pID_ALTERNA){

            const form = $('#Desarrollo_form');
            $('.tabsContainer').LoadingOverlay("show");
            form.data('loading',true);

            fillData.genericPromise(base_url + `Solicitud/vwNivelEstudios`,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {

                if (data) {

                    mainFormActions.insertValueInSelect($('#pID_GRADO_ESCOLAR'),data.pID_GRADO_ESCOLAR);
                    mainFormActions.insertValueInSelect($('#pNOMBRE_ESCUELA'),data.pNOMBRE_ESCUELA);
                    mainFormActions.insertValueInSelect($('#pESPECIALIDAD_DESARROLLO'),data.pESPECIALIDAD);
                    mainFormActions.insertValueInSelect($('#pCEDULA_PROFESIONAL'),data.pCEDULA_PROFESIONAL);
                    mainFormActions.insertValueInSelect($('#pINICIO_DESARROLLO'), moment( data.pFECHA_INICIO,'DD/MM/YYYY' ).format('YYYY-MM-DD'));
                    mainFormActions.insertValueInSelect($('#pTERMINO_DESARROLLO'), moment( data.pFECHA_TERMINO,'DD/MM/YYYY' ).format('YYYY-MM-DD'));
                    mainFormActions.insertValueInSelect($('#pREGISTRO_SEP'),data.pREGISTRO_SEP);
                    mainFormActions.insertValueInSelect($('#pFOLIO_CERTIFICADO'),data.pFOLIO_CERTIFICADO);
                    mainFormActions.insertValueInSelect($('#pPROMEDIO'),data.pPROMEDIO);

                }

                form.removeData('loading');
                form.data('requireddata',false);
                form.data('retrieved', true);

                $('.tabsContainer').LoadingOverlay("hide");
            })
            .catch( (err) => {
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                
                $('.tabsContainer').LoadingOverlay("hide");
            });

            var tableRef = $('#' + objViewDatosGenerales.vars.datosGenerales.tables.tableDesarrollo.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewDatosGenerales.vars.datosGenerales.tables.tableDesarrollo.obj,
                callUrl = base_url + `Solicitud/getNivelEstudios`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
            
            tableObj.clear().draw();
            
            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_NIVEL_ESTUDIOS_EXT, value.pMAXIMA_ESCOLARIDAD, value.pESPECIALIDAD, value.pFECHA_INICIO, value.pFECHA_TERMINO, value.pPROMEDIO ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.datosGenerales.desarrolloAcademico(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
                
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });

        },
        domicilio : function(pID_ALTERNA){
            
            const form = $('#Domicilio_form');

            $('.tabsContainer').LoadingOverlay("show");
            form.data('loading',true);

            fillData.genericPromise(base_url + `Solicitud/vwDomicilio`,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {

                if (data) {

                    mainFormActions.insertValueInSelect($('#pCODIGO_POSTAL_DOMICILIO'),data.pCODIGO_POSTAL);
                    mainFormActions.insertValueInSelect($('#pID_ENTIDAD_DOMICILIO'),data.pID_ENTIDAD);
                    mainFormActions.insertValueInSelect($('#pID_MUNICIPIO_DOMICILIO'),data.pID_MUNICIPIO);
                    mainFormActions.insertValueInSelect($('#pCIUDAD_DOMICILIO'),data.pCIUDAD);
                    mainFormActions.insertValueInSelect($('#pCOLONIA_DOMICILIO'),data.pCOLONIA);
                    mainFormActions.insertValueInSelect($('#pCALLE_DOMICILIO'),data.pCALLE);
                    mainFormActions.insertValueInSelect($('#pNUM_EXTERIOR_DOMICILIO'),data.pNUM_EXTERIOR);
                    mainFormActions.insertValueInSelect($('#pNUM_INTERIOR_DOMICILIO'),data.pNUM_INTERIOR);
                    mainFormActions.insertValueInSelect($('#pENTRE_CALLE_DOMICILIO'),data.pENTRE_CALLE);
                    mainFormActions.insertValueInSelect($('#pY_CALLE_DOMICILIO'),data.pY_CALLE);
                    mainFormActions.insertValueInSelect($('#pTELEFONO_DOMICILIO'),data.pTELEFONO);
                }

                form.removeData('loading');
                form.data('requireddata',false);
                form.data('retrieved', true);

                $('.tabsContainer').LoadingOverlay("hide");
            })
            .catch( (err) => {
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                
                $('.tabsContainer').LoadingOverlay("hide");
            });


            var tableRef = $('#' + objViewDatosGenerales.vars.datosGenerales.tables.tableDomicilio.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewDatosGenerales.vars.datosGenerales.tables.tableDomicilio.obj,
                callUrl = base_url + `Solicitud/getDomicilio`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_DOMICILIO_EXT, value.pCODIGO_POSTAL, value.pNOM_ESTADO, value.pCOLONIA, value.pCALLE, value.pNUM_EXTERIOR, value.pNUM_INTERIOR ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.datosGenerales.domicilio(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");                
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });

        },
        referencias : function(pID_ALTERNA){

            const form = $('#Referencias_form');

            $('.tabsContainer').LoadingOverlay("show");
            form.data('loading',true);
            form.data('requireddata',false);

            fillData.genericPromise(base_url + `Solicitud/vwReferencias`,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {

                if (data) {

                    mainFormActions.insertValueInSelect($('#pID_TIPO_DOM'),data.pID_TIPO_DOM);
                    mainFormActions.insertValueInSelect($('#pNOMBRE_REFERENCIAS'),data.pNOMBRE);
                    mainFormActions.insertValueInSelect($('#pPATERNO_REFERENCIAS'),data.pPATERNO);
                    mainFormActions.insertValueInSelect($('#pMATERNO_REFERENCIAS'),data.pMATERNO);
                    mainFormActions.insertValueInSelect($('#pSEXO_REFERENCIAS'),data.pSEXO);
                    mainFormActions.insertValueInSelect($('#pID_OCUPACION'),data.pID_OCUPACION);
                    mainFormActions.insertValueInSelect($('#pID_TIPO_REFERENCIA'),data.pID_TIPO_REFERENCIA);
                    mainFormActions.insertValueInSelect($('#pCODIGO_POSTAL_REFERENCIAS'),data.pCODIGO_POSTAL);
                    mainFormActions.insertValueInSelect($('#pID_ENTIDAD_REFERENCIAS'),data.pID_ENTIDAD);
                    mainFormActions.insertValueInSelect($('#pID_MUNICIPIO_REFERENCIAS'),data.pID_MUNICIPIO);
                    mainFormActions.insertValueInSelect($('#pCIUDAD_REFERENCIAS'),data.pCIUDAD);
                    mainFormActions.insertValueInSelect($('#pCOLONIA_REFERENCIAS'),data.pCOLONIA);
                    mainFormActions.insertValueInSelect($('#pCALLE_REFERENCIAS'),data.pCALLE);
                    mainFormActions.insertValueInSelect($('#pNUM_EXTERIOR_REFERENCIAS'),data.pNUM_EXTERIOR);
                    mainFormActions.insertValueInSelect($('#pNUM_INTERIOR_REFERENCIAS'),data.pNUM_INTERIOR);
                    mainFormActions.insertValueInSelect($('#pTELEFONO_REFERENCIAS'),data.pTELEFONO_REFERENCIAS);
                    mainFormActions.insertValueInSelect($('#pENTRE_CALLE_REFERENCIAS'),data.pENTRE_CALLE);
                    mainFormActions.insertValueInSelect($('#pY_CALLE_REFERENCIAS'),data.pY_CALLE);

                }

                form.removeData('loading');
                form.data('retrieved', true);

                $('.tabsContainer').LoadingOverlay("hide");
            })
            .catch( (err) => {
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                
                $('.tabsContainer').LoadingOverlay("hide");
            });

            var tableRef = $('#' + objViewDatosGenerales.vars.datosGenerales.tables.tableReferencias.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewDatosGenerales.vars.datosGenerales.tables.tableReferencias.obj,
                callUrl = base_url + `Solicitud/getReferencias`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {                
                if (data) {
                    $.each( data, function(key,value) {
                        var domicilio = value.pCALLE + ' ' + value.pNUM_EXTERIOR + ' ' + (value.pNUM_INTERIOR ? value.pNUM_INTERIOR + ' ' : '' ) + (value.pCOLONIA ? value.pCOLONIA + ' ' : '' ) + value.pMUNICIPIO_DOM;
                        var row = [ value.pID_REFERENCIA_EXT, value.pNOMBRE, value.pPATERNO, value.pMATERNO, value.pTIPO_REFERENCIA, domicilio ];
                        tableObj.row.add( row ).draw( false );
                    });
                }
                
                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.datosGenerales.referencias(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
            
        },
        socioeconomicos : function(pID_ALTERNA){
            $('#Socioeconomicos_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            var callUrl = base_url + `Solicitud/getSocioEco`;
            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        mainFormActions.insertValueInSelect($('#'+ key),value);
                    });

                    //special
                    mainFormActions.insertValueInSelect($('#pID_TIPO_DOMICILIO'),data.pID_TIPO_DOMIC);

                    $('#Socioeconomicos_form').removeData('hasChanged');

                    $('#Socioeconomicos_form').data('requireddata',false);
                    
                }
                
                $('#Socioeconomicos_form').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Socioeconomicos_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Socioeconomicos_form').LoadingOverlay("hide");
            });
        },
        dependientesEconomicos : function(pID_ALTERNA){

            const form = $('#Dependientes_form');
            form.data('requireddata',false);
            //$('#Socioeconomicos_form').removeData('hasChanged');

            $('.tabsContainer').LoadingOverlay("show");
            form.data('loading',true);

            fillData.genericPromise(base_url + `Solicitud/vwDependientes`,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {

                if (data) {

                    mainFormActions.insertValueInSelect($('#pNOMBRE_SOCIOECONOMICOS'),data.pNOMBRE);
                    mainFormActions.insertValueInSelect($('#pPATERNO_SOCIOECONOMICOS'),data.pPATERNO);
                    mainFormActions.insertValueInSelect($('#pMATERNO_SOCIOECONOMICOS'),data.pMATERNO);
                    mainFormActions.insertValueInSelect($('#pSEXO_SOCIOECONOMICOS'),data.pSEXO);
                    mainFormActions.insertValueInSelect($('#pFECHA_NAC_SOCIOECONOMICOS'),moment( data.pFECHA_NACIMIENTO,'DD/MM/YYYY' ).format('YYYY-MM-DD') );
                    mainFormActions.insertValueInSelect($('#pID_RELACION'),data.pID_TIPO_DEPENDIENT);
                    mainFormActions.insertValueInSelect($('#pID_RELACION_SOCIOECONOMICOS'),data.pID_SUBTIPO_REF);
                    
                }

                form.removeData('loading');
                form.data('retrieved', true);

                $('.tabsContainer').LoadingOverlay("hide");
            })
            .catch( (err) => {
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                
                $('.tabsContainer').LoadingOverlay("hide");
            });



            var tableRef = $('#' + objViewDatosGenerales.vars.datosGenerales.tables.tableSocioeconomicos.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewDatosGenerales.vars.datosGenerales.tables.tableSocioeconomicos.obj,
                callUrl = base_url + `Solicitud/getDependientes`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
            
            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {                
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_DEPENDIENTE_EXT, value.pNOMBRE, value.pPATERNO, value.pMATERNO, value.pSEXO, value.pFECHA_NACIMIENTO, value.pPARENTESCO ];
                        tableObj.row.add( row ).draw( false );
                    });

                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.datosGenerales.dependientesEconomicos(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });

            
            

        }
    },
    laboral : {
        all : function(){
            fillData.laboral.adscripcionActual(mainTabMenu.var.pID_ALTERNA);
            fillData.laboral.empleosDiversos(mainTabMenu.var.pID_ALTERNA);
            fillData.laboral.actitudesHaciaEmpleo(mainTabMenu.var.pID_ALTERNA);
            fillData.laboral.comisiones(mainTabMenu.var.pID_ALTERNA);
        },
        adscripcionActual : function(pID_ALTERNA){
            
            const form = $('#Adscripcion_actual_form');

            $('.tabsContainer').LoadingOverlay("show");
            form.data('loading',true);            

            fillData.genericPromise(base_url + `Solicitud/vwAdscripcion`,{ pID_ALTERNA : pID_ALTERNA})
            .then( async (data) => {

                if (data) {
                    var nombreCompleto = (data.pMATERNO_JEFE ? data.pMATERNO_JEFE + ' ' : '') + (data.pPATERNO_JEFE ? data.pPATERNO_JEFE + ' ' : '') + (data.pNOMBRE_JEFE ? data.pNOMBRE_JEFE : '');
                    
                    mainFormActions.insertValueInSelect($('#pCP_EMP_ADSCRIPCION_ACTUAL'),data.pCODIGO_POSTAL);                    
                    mainFormActions.insertValueInSelect($('#pCIUDAD'),data.pCIUDAD);
                    mainFormActions.insertValueInSelect($('#Colonia_Adscripcion_actual'),data.pCOLONIA);
                    mainFormActions.insertValueInSelect($('#Calle'),data.pCALLE);
                    mainFormActions.insertValueInSelect($('#pNUM_EXTERIOR'),data.pNUM_EXTERIOR);
                    mainFormActions.insertValueInSelect($('#pNUM_INTERIOR'),data.pNUM_INTERIOR);
                    mainFormActions.insertValueInSelect($('#pTELEFONO'),data.pTELEFONO);
                    mainFormActions.insertValueInSelect($('#pFECHA_INGRESO'),moment( data.pFECHA_INGRESO,'DD/MM/YYYY' ).format('YYYY-MM-DD'));
                    mainFormActions.insertValueInSelect($('#pPUESTO_ADSCRIPCION_ACTUAL'),data.pID_PUESTO);
                    mainFormActions.insertValueInSelect($('#pESPECIALIDAD'),data.pESPECIALIDAD);
                    mainFormActions.insertValueInSelect($('#pRANGO'),data.pRANGO);
                    mainFormActions.insertValueInSelect($('#pID_NIVEL_MANDO'),data.pID_NIVEL_MANDO);
                    mainFormActions.insertValueInSelect($('#pNUMERO_PLACA'),data.pNUMERO_PLACA);
                    mainFormActions.insertValueInSelect($('#pNUMERO_EXPEDIENTE'),data.pNUMERO_EXPEDIENTE);
                    mainFormActions.insertValueInSelect($('#pSUELDO_BASE'),data.pSUELDO_BASE);
                    mainFormActions.insertValueInSelect($('#pCOMPENSACION'),data.pCOMPENSACION);
                    mainFormActions.insertValueInSelect($('#pDIVISION'),data.pDIVISION);
                    mainFormActions.insertValueInSelect($('#pFUNCIONES'),data.pFUNCIONES);
                    mainFormActions.insertValueInSelect($('#ID_JEFE'),data.pCUIP_JEFE);
                    mainFormActions.insertValueInSelect($('#pNOMBREJEFEINMEDIATO'),nombreCompleto);

                    await new Promise( (resolve) => {
                        const $interval = setInterval(() => {
                            if ($('#pID_DEPENDENCIA_ADSCRIPCION_ACTUAL').data('populated')) {
                                clearInterval($interval);
                                mainFormActions.insertValueInSelect($('#pID_DEPENDENCIA_ADSCRIPCION_ACTUAL'),data.pID_DEPENDENCIA);
                                resolve(true);
                            }
                        }, 300);
                    });

                    if (!$('#pID_DEPENDENCIA_ADSCRIPCION_ACTUAL').select2('data')[0].id)
                        $('#pID_DEPENDENCIA_ADSCRIPCION_ACTUAL').trigger('change');

                    await new Promise( (resolve) => {
                        const $interval = setInterval(() => {
                            if ($('#pID_INSTITUCION').data('populated')) {
                                clearInterval($interval);
                                mainFormActions.insertValueInSelect($('#pID_INSTITUCION'),data.pID_INSTITUCION);
                                resolve(true);
                            }
                        }, 300);
                    });

                    if (!$('#pID_INSTITUCION').select2('data')[0].id)
                        $('#pID_INSTITUCION').trigger('change');
                    
                    await new Promise( (resolve) => {
                        const $interval = setInterval(() => {
                            if ($('#pID_AREA').data('populated')) {
                                clearInterval($interval);
                                mainFormActions.insertValueInSelect($('#pID_AREA'),data.pID_AREA);
                                resolve(true);
                            }
                        }, 300);
                    });

                    if (!$('#pID_AREA').select2('data')[0].id)
                        $('#pID_AREA').trigger('change');

                    await new Promise( (resolve) => {
                        const $interval = setInterval(() => {
                            if ($('#pID_ENTIDAD_ADSCRIPCION_ACTUAL').data('populated')) {
                                clearInterval($interval);                                
                                
                                resolve(true);
                            }
                        }, 300);
                    });

                    mainFormActions.insertValueInSelect($('#pID_ENTIDAD_ADSCRIPCION_ACTUAL'),data.pID_ENTIDAD);

                    if (!$('#pID_ENTIDAD_ADSCRIPCION_ACTUAL').select2('data')[0].id)
                        $('#pID_ENTIDAD_ADSCRIPCION_ACTUAL').trigger('change');

                    await new Promise( (resolve) => {
                        const $interval = setInterval(() => {
                            if ($('#pID_MUNICIPIO_ADSCRIPCION_ACTUAL').data('populated')) {
                                clearInterval($interval);                                
                                resolve(true);
                            }
                        }, 300);
                    });

                    mainFormActions.insertValueInSelect($('#pID_MUNICIPIO_ADSCRIPCION_ACTUAL'),data.pID_MUNICIPIO);

                    const $val = await new Promise( (resolve) => {
                        $resend = false;
                        const $interval = setInterval(() => {
                            if ($('#pID_MUNICIPIO_ADSCRIPCION_ACTUAL').val() != null) {
                                clearInterval($interval);
                                resolve($('#pID_MUNICIPIO_ADSCRIPCION_ACTUAL').val());
                            } else if (!$resend) {
                                mainFormActions.insertValueInSelect($('#pID_MUNICIPIO_ADSCRIPCION_ACTUAL'),data.pID_MUNICIPIO);
                                $resend = true;
                            }
                        }, 1000);
                    });

                    //if (!$('#pID_MUNICIPIO_ADSCRIPCION_ACTUAL').select2('data')[0].id) 
                        //$('#pID_MUNICIPIO_ADSCRIPCION_ACTUAL').trigger('change');

                }

                form.data('requireddata',false);
                form.data('retrieved', true);
                form.data('hasChanged', false);
                
                form.removeData('loading');

                $('.tabsContainer').LoadingOverlay("hide");
            })
            .catch( (err) => {
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                
                $('.tabsContainer').LoadingOverlay("hide");
            });            

            var tableRef = $('#' + objViewLaboral.vars.laboral.tables.tableAdscripcionactual.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewLaboral.vars.laboral.tables.tableAdscripcionactual.obj,
                callUrl = base_url + `Solicitud/getAdscripcion`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_ADSCRIPCION_EXT, value.pNOMBRE_DEPENDENCIA, value.pCORPORACION, value.pNOMBRE_AREA, value.pNOMBRE_PUESTO ? value.pNOMBRE_PUESTO : 'No viene en el modelo de bd', value.pNOM_ENTIDAD, value.pNOM_MUNICIPIO ];
                        tableObj.row.add( row ).draw( false );
                    });

                    $('#Adscripcion_actual_form').data('requireddata',false);

                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.laboral.adscripcionActual(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");


                tableRef.LoadingOverlay("hide");

                $('#Adscripcion_actual_form').removeData('loading');

            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        empleosDiversos : function(pID_ALTERNA){
            const form = $('#Empleos_diversos_form');
            
            $('.tabsContainer').LoadingOverlay("show");
            form.data('loading',true);

            fillData.genericPromise(base_url + `Solicitud/vwEmpleoAdicional`,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {

                if (data) {
                    mainFormActions.insertValueInSelect($('#pEMPRESA'),data.pEMPRESA);
                    mainFormActions.insertValueInSelect($('#pCP_EMP_EMPLEOS_DIVERSOS'),data.pCP_EMP);
                    mainFormActions.insertValueInSelect($('#pID_ENTIDAD_EMPLEOS_DIVERSOS'),data.pID_ENTIDAD);
                    mainFormActions.insertValueInSelect($('#pID_MUNICIPIO_EMPLEOS_DIVERSOS'),data.pID_MUNICIPIO);
                    mainFormActions.insertValueInSelect($('#pCOLONIA_EMPLEOS_DIVERSOS'), data.pCOLONIA_EMP);
                    mainFormActions.insertValueInSelect($('#pCALLE_Y_NUM_EMPLEOS_DIVERSOS'),data.pCALLE_Y_NUM_EMP);
                    mainFormActions.insertValueInSelect($('#pNUM_TELEFONICO'),data.pNUM_TELEFONICO);
                    mainFormActions.insertValueInSelect($('#pDESCRIP_AREA'),data.pAREA);
                    mainFormActions.insertValueInSelect($('#pDESCRIP_FUNCION'),data.pDESCRIP_FUNCION);
                    mainFormActions.insertValueInSelect($('#pSUELDO_EMPLEOS_DIVERSOS'),data.pSUELDO);
                    mainFormActions.insertValueInSelect($('#pFECHA_INICIO_EMPLEOS_DIVERSOS'),moment( data.pFECHA_INGRESO,'DD/MM/YYYY' ).format('YYYY-MM-DD'));
                    mainFormActions.insertValueInSelect($('#pFECHA_TERMINO_EMPLEOS_DIVERSOS'),moment( data.pFECHA_SEPARACION,'DD/MM/YYYY' ).format('YYYY-MM-DD'));
                    mainFormActions.insertValueInSelect($('#ID_MOTIVO_MOV_LAB'),data.pID_MOTIVO_MOV_LAB);
                    mainFormActions.insertValueInSelect($('#pID_TIPO_MOV_LAB'),data.pID_TIPO_MOV_LAB);
                    mainFormActions.insertValueInSelect($('#pDESCRIPCION'),data.pDESCRIPCION);
                }

                form.removeData('loading');
                form.data('retrieved', true);

                $('.tabsContainer').LoadingOverlay("hide");
            })
            .catch( (err) => {
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                
                $('.tabsContainer').LoadingOverlay("hide");
            });
            
            var tableRef = $('#' + objViewLaboral.vars.laboral.tables.tableEmpleosdiversos.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewLaboral.vars.laboral.tables.tableEmpleosdiversos.obj,
                callUrl = base_url + `Solicitud/getEmpleoAdicional`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_EMPLEO_ADIC_EXT, value.pEMPRESA, value.pNUM_TELEFONICO, value.pAREA, value.pSUELDO, value.pFECHA_INGRESO, value.pFECHA_SEPARACION ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.laboral.empleosDiversos(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        actitudesHaciaEmpleo : function(pID_ALTERNA){
            const form = $('#Actitudes_hacia_el_empleo_form');
            
            $('.tabsContainer').LoadingOverlay("show");
            form.data('loading',true);
                 
            var callUrl = base_url + `Solicitud/getActitud`;
            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    $.each(data,function(key,value){
                        mainFormActions.insertValueInSelect($('#'+ key),value);
                    });

                    //special
                    mainFormActions.insertValueInSelect($('#pPUESTO_ACTITUDES_EMPLEO'),data.pPUESTO);

                    $('#Actitudes_hacia_el_empleo_form').removeData('hasChanged');
                }

                form.removeData('loading');
                form.data('retrieved', true);

                $('.tabsContainer').LoadingOverlay("hide");
            })
            .catch( (err) => {
                $('#Actitudes_hacia_el_empleo_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
            });
        },
        comisiones : function(pID_ALTERNA){
            const form = $('#Comisiones_form');
            
            $('.tabsContainer').LoadingOverlay("show");
            form.data('loading',true);

            fillData.genericPromise(base_url + `Solicitud/vwComision`,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {

                if (data) {
                    mainFormActions.insertValueInSelect($('#pFECHA_INICIO_COMISIONES'),moment( data.pFECHA_INICIO,'DD/MM/YYYY' ).format('YYYY-MM-DD'));
                    mainFormActions.insertValueInSelect($('#pFECHA_TERMINO_COMISIONES'),moment( data.pFECHA_TERMINO,'DD/MM/YYYY' ).format('YYYY-MM-DD'));
                    mainFormActions.insertValueInSelect($('#ID_TIPO_COMISION'),data.pID_TIPO_COMISION);
                    mainFormActions.insertValueInSelect($('#pID_MOTIVO'),data.pID_MOTIVO);
                    mainFormActions.insertValueInSelect($('#pDESTINO'), data.pDESTINO);
                }

                form.removeData('loading');
                form.data('retrieved', true);

                $('.tabsContainer').LoadingOverlay("hide");
            })
            .catch( (err) => {
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                
                $('.tabsContainer').LoadingOverlay("hide");
            });
            
            var tableRef = $('#' + objViewLaboral.vars.laboral.tables.tableComisiones.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewLaboral.vars.laboral.tables.tableComisiones.obj,
                callUrl = base_url + `Solicitud/getComision`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_COMISION_EXT, value.pFECHA_INICIO, value.pFECHA_TERMINO, value.pTIPO_COMISION, value.pMOTIVO, value.pDESTINO ];
                        tableObj.row.add( row ).draw( false );
                    });

                    $('#Comisiones_form').data('requireddata',false);

                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.laboral.comisiones(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
                
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
    },
    capacitacion : {
        all : function(){
            fillData.capacitacion.idiomasDialectos(mainTabMenu.var.pID_ALTERNA);
            fillData.capacitacion.habilidadesAptitudes(mainTabMenu.var.pID_ALTERNA);
        },
        idiomasDialectos : function(pID_ALTERNA){
            const form = $('#Idiomas_dialectos_form');
            
            $('.tabsContainer').LoadingOverlay("show");
            form.data('loading',true);

            fillData.genericPromise(base_url + `Solicitud/getIdiomaHablado`,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {

                if (data) {
                    mainFormActions.insertValueInSelect($('#pID_IDIOMA'),data[0].pID_IDIOMA);
                    mainFormActions.insertValueInSelect($('#pGRADO_LECTURA'),data[0].pPORCENTAJE_LECTURA);
                    mainFormActions.insertValueInSelect($('#pGRADO_ESCRITURA'),data[0].pPORCENTAJE_ESCRITURA);
                    mainFormActions.insertValueInSelect($('#pGRADO_CONVERSACION'),data[0].pPORCENTAJE_CONVERSACION);
                }

                form.removeData('loading');
                form.data('retrieved', true);

                $('.tabsContainer').LoadingOverlay("hide");
            })
            .catch( (err) => {
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                
                $('.tabsContainer').LoadingOverlay("hide");
            });
            
            var tableRef = $('#' + objViewCapacitacion.vars.capacitacion.tables.tableIdiomas.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewCapacitacion.vars.capacitacion.tables.tableIdiomas.obj,
                callUrl = base_url + `Solicitud/getIdiomaHablado`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_IDIOMA_HABLADO_EXT, value.pIDIOMA, value.pPORCENTAJE_LECTURA, value.pPORCENTAJE_ESCRITURA, value.pPORCENTAJE_CONVERSACION ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.capacitacion.idiomasDialectos(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        habilidadesAptitudes : function(pID_ALTERNA){
            const form = $('#Habilidades_aptitudes_form');
            
            $('.tabsContainer').LoadingOverlay("show");
            form.data('loading',true);

            fillData.genericPromise(base_url + `Solicitud/getHabilidadAptitud`,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {

                if (data) {
                    mainFormActions.insertValueInSelect($('#pID_TIPO_APTITUD'),data[0].pID_TIPO_APTITUD);
                    mainFormActions.insertValueInSelect($('#pESPECIFIQUE'),data[0].pESPECIFIQUE);
                    mainFormActions.insertValueInSelect($('#pID_GRADO_APT_HAB'),data[0].pID_GRADO_APT_HAB);
                }

                form.removeData('loading');
                form.data('retrieved', true);

                $('.tabsContainer').LoadingOverlay("hide");
            })
            .catch( (err) => {
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                
                $('.tabsContainer').LoadingOverlay("hide");
            });
            
            var tableRef = $('#' + objViewCapacitacion.vars.capacitacion.tables.tableHabilidades.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewCapacitacion.vars.capacitacion.tables.tableHabilidades.obj,
                callUrl = base_url + `Solicitud/getHabilidadAptitud`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_HABILIDAD_APTIT_EXT, value.pTIPO_HABAILIDAD, value.pGRADO ];
                        tableObj.row.add( row ).draw( false );
                    });
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.capacitacion.habilidadesAptitudes(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        }
    },
    identificacion : {
        all : function(){
            fillData.identificacion.mediaFiliacion(mainTabMenu.var.pID_ALTERNA);
            fillData.identificacion.seniasParticulares(mainTabMenu.var.pID_ALTERNA);
            fillData.identificacion.fichaFotografica(mainTabMenu.var.pID_ALTERNA);
            fillData.identificacion.registroDecadactilar(mainTabMenu.var.pID_ALTERNA);
            fillData.identificacion.digitalizacionDocumento(mainTabMenu.var.pID_ALTERNA);
            fillData.identificacion.identificacionVoz(mainTabMenu.var.pID_ALTERNA);
        },
        mediaFiliacion : function(pID_ALTERNA){
            const form = $('#mediafiliacion_form');

            $('.tabsContainer').LoadingOverlay("show");
            form.data('loading',true);

            var callUrl = base_url + `Solicitud/spB2MFgetFiliacion`;
            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each(data,function(key,value){
                        $('#'+ key).data('ignoreChangeFirst', true);
                        mainFormActions.insertValueInSelect($('#'+ key),value);
                    });
                    
                    form.data('requireddata',false);
                    form.removeData('hasChanged');
                }

                form.removeData('loading');
                form.data('retrieved', true);

                $('.tabsContainer').LoadingOverlay("hide");
            })
            .catch( (err) => {
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });

                $('.tabsContainer').LoadingOverlay("hide");
            });
        },
        seniasParticulares : function(pID_ALTERNA){
            
            const form = $('#Senas_particulares_form');
            
            $('.tabsContainer').LoadingOverlay("show");
            form.data('loading',true);

            fillData.genericPromise(base_url + `Solicitud/vwSenasParticulares`,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {

                if (data) {
                    mainFormActions.insertValueInSelect($('#pID_TIPO_SENAS'),data.pID_TIPO_SENAS);
                    mainFormActions.insertValueInSelect($('#pLADO'),data.pLADO);
                    mainFormActions.insertValueInSelect($('#pID_REGION'),data.pID_REGION);
                    mainFormActions.insertValueInSelect($('#pVISTA'),data.pVISTA);
                    mainFormActions.insertValueInSelect($('#pCANTIDAD'),data.pCANTIDAD);
                    mainFormActions.insertValueInSelect(form.find('#pDESCRIPCION'),data.pDESCRIPCION);

                    form.data('requireddata',false);
                }

                form.removeData('loading');
                form.data('retrieved', true);

                $('.tabsContainer').LoadingOverlay("hide");
            })
            .catch( (err) => {
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                
                $('.tabsContainer').LoadingOverlay("hide");
            });

            var tableRef = $('#' + objViewIdentificacion.vars.identificacion.tables.tableSenasparticulares.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewIdentificacion.vars.identificacion.tables.tableSenasparticulares.obj,
                callUrl = base_url + `Solicitud/getSenasParticulares`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, function(key,value) {
                        var row = [ value.pID_SENAS_PART_EXT, value.pDESC_TIPO_SENA, value.pDESC_LADO, value.pDESC_REGION, value.pDESC_VISTA, value.pCANTIDAD, value.pDESCRIPCION ];
                        tableObj.row.add( row ).draw( false );
                    });                    
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.identificacion.seniasParticulares(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");

                $('#Senas_particulares_form').removeData('loading');

            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        fichaFotografica : function(pID_ALTERNA){
            
            const form = $('#Ficha_fotografica_form');
            
            $('.tabsContainer').LoadingOverlay("show");
            form.data('loading',true);            

            var callUrl = base_url + `Solicitud/vwFichaFotografica`;
            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {  
                if (data) {
                    //BLOQUE PARA LAS IMÁGENES E INFORMACIÓN
                    //INFORMACIÓN
                    fillData.camposGeneralesInformacionFichaFotografica(data);

                    // IMÁGENES
                    const imageBreak = base_url + 'assets/images/imageError.png',
                          imageThumb = base_url + 'assets/images/imgThumb.png';

                    /*******************************************************************************/            
                    //CAMPOS DE IMÁGENES
                                            
                    if (!data.pIMG_PERFILIZQ) data.pIMG_PERFILIZQ = { content: '' }; data.pIMG_PERFILIZQ.content = $('#thumb_pIMAGEN_IZQUIERDO');
                    if (!data.pIMG_FRENTE) data.pIMG_FRENTE = { content: '' }; data.pIMG_FRENTE.content = $('#thumb_pIMAGEN_FRENTE');
                    if (!data.pIMG_PERFILDR) data.pIMG_PERFILDR = { content: '' }; data.pIMG_PERFILDR.content = $('#thumb_pIMAGEN_DERECHO');
                    if (!data.pIMG_FIRMA) data.pIMG_FIRMA = { content: '' }; data.pIMG_FIRMA.content = $('#thumb_pIMAGEN_FIRMA');
                    if (!data.pIMG_HUELLA) data.pIMG_HUELLA = { content : ''}; data.pIMG_HUELLA.content = $('#thumb_pIMAGEN_HUELLA')

                    const $iterImages = [data.pIMG_PERFILIZQ,data.pIMG_FRENTE,data.pIMG_PERFILDR,data.pIMG_FIRMA,data.pIMG_HUELLA]

                    $.each($iterImages, function( index, value ) {
                        const $content = value.content;

                        if ('name' in value) {

                            imageExists(value.name).then( (response) =>{
                                if (response){
                                    $content.attr("src", value.name).attr("alt", value.originalName);
                                    $content.parent().find('div.custom-file label.custom-file-label').html(value.originalName);
                                } else {
                                    const $alt = 'Error al recuperar imagen';
                                    $content.attr("src", imageBreak ).attr("alt", $alt);
                                    $content.parent().find('div.custom-file label.custom-file-label').html($alt);
                                }
                            });
                            
                            form.data('requireddata',false);
                        } else {
                            $content.attr("src", imageThumb ).attr("alt", 'Sin imagen');
                            $content.parent().find('div.custom-file label.custom-file-label').html( 'Seleccionar imagen' );
                        }

                    }); 

                    /*******************************************************************************/

                }

                $('.tabsContainer').LoadingOverlay("hide");

            })
            .catch( (err) => {
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                
                $('.tabsContainer').LoadingOverlay("hide");

            });
            
            //BLOQUE PARA EL GRID
            var tableRef = $('#' + objViewIdentificacion.vars.identificacion.tables.tableFichafotografica.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewIdentificacion.vars.identificacion.tables.tableFichafotografica.obj,
                callUrl = base_url + `Solicitud/getFichaFotografica`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( async (data) => {
                if (data) {

                    groupByFechaRegistro = groupBy('pFECHA_REGISTRO');
                    data = groupByFechaRegistro(data);
                    
                    const $keys = Object.keys(data);
                    for (let i = 0; i < $keys.length; i++) {
                        const value = data[$keys[i]]

                        let $action = '<div class="imgPreview"><ul>';

                        for (let index = 0; index < value.length; index++) {
                            const item = value[index]
                            let $imageExist = false;
                            if ('pimgPath' in item)
                                $imageExist = await imageExists(item.pimgPath.name)

                            $action += '<li class="mx-2"><a class="' + ( !$imageExist ? 'text-danger' : '') + '" href="' + ( $imageExist ? item.pimgPath.name : '#') + '" onclick="return fillData.previewImg(this)" title="Ver" alt="' + ( $imageExist ? item.pimgPath.originalName : 'No se pudo recuperar')  + '"><i class="fa ' + ( $imageExist ? 'fa-eye' : 'fa-exclamation-triangle') + '"></i><span>' + item.pIMAGEN + '<sspan></a></li>';
                        }

                        $action += '</ul></div>'
                                                
                        // var row = [ value.pID_FICHA_FOTOGRAF_EXT, value.pNUM_FOLIO, value.pIMAGEN, value.pDEPENDENCIA, value.pINSTITUCION,value.pFECHA_REGISTRO ];
                        var row = [ value[0].pDEPENDENCIA, value[0].pINSTITUCION,value[0].pFECHA_REGISTRO,$action ];
                        tableObj.row.add( row ).draw( false );
                    };

                    $('#Ficha_fotografica_form').data('requireddata',false);

                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.identificacion.fichaFotografica(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");

                $('#Ficha_fotografica_form').removeData('loading');

            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        registroDecadactilar : function(pID_ALTERNA){
            
            const form = $('#Registro_decadactilar_form');
            
            $('.tabsContainer').LoadingOverlay("show");
            form.data('loading',true);

            //BLOQUE PARA EL LINK AL DOCUMENTO E INFORMACIÓN
            var callUrl = base_url + `Solicitud/vwRegDecadactilar`;
            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( async (data) => {  
                if (data) {
                    //INFORMACIÓN
                    fillData.camposGeneralesInformacionRegistroDecadactilar(data);

                    if (data.pIMG_DOCUMENTO) {
                        //DOCUMENTO
                        const imageBreak = base_url + 'assets/images/imageError.png';

                        imageExists(data.pIMG_DOCUMENTO.name).then( (result) => {

                            if (result) {
                                $('#thumb_pIMAGEN_Decadactilar').attr("src", data.pIMG_DOCUMENTO.name).attr("alt", data.pIMG_DOCUMENTO.originalName);
                                $('#thumb_pIMAGEN_Decadactilar').parent().find('div.custom-file label.custom-file-label').html(data.pIMG_DOCUMENTO.originalName);
                            } else {
                                $alt = 'Error al recuperar imagen';
                                $('#thumb_pIMAGEN_Decadactilar').attr("src", imageBreak).attr("alt", $alt);
                                $('#thumb_pIMAGEN_Decadactilar').parent().find('div.custom-file label.custom-file-label').html($alt);
                            }

                            form.data('requireddata',false);

                        });
                        
                    }
                }

                form.removeData('loading');
                form.data('retrieved', true);
                $('.tabsContainer').LoadingOverlay("hide");

            })
            .catch( (err) => {
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('.tabsContainer').LoadingOverlay("hide");
            });

            //BLOQUE PARA EL GRID
            var tableRef = $('#' + objViewIdentificacion.vars.identificacion.tables.tableRegistrodecadactilar.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewIdentificacion.vars.identificacion.tables.tableRegistrodecadactilar.obj,
                callUrl = base_url + `Solicitud/getRegDecadactilar`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( async (data) => {
                if (data) {

                    groupByFechaRegistro = groupBy('pFECHA_REGISTRO');
                    data = groupByFechaRegistro(data);

                    const $keys = Object.keys(data);
                    for (let i = 0; i < $keys.length; i++) {
                        const value = data[$keys[i]]

                        let $action = '<div class="imgPreview"><ul>';

                        for (let index = 0; index < value.length; index++) {
                            const item = value[index]
                            let $imageExist = false;
                            if ('pimgPath' in item)
                                $imageExist = await imageExists(item.pimgPath.name)

                            $action += '<li class="mx-2"><a class="' + ( !$imageExist ? 'text-danger' : '') + '" href="' + ( $imageExist ? item.pimgPath.name : '#') + '" onclick="return fillData.previewImg(this)" title="Ver" alt="' + ( $imageExist ? item.pimgPath.originalName : 'No se pudo recuperar')  + '"><i class="fa ' + ( $imageExist ? 'fa-eye' : 'fa-exclamation-triangle') + '"></i><span>' + item.pimgPath.originalName + '<sspan></a></li>';
                        }

                        $action += '</ul></div>'
                                                
                        var row = [ value[0].pDEPENDENCIA, value[0].pINSTITUCION,value[0].pFECHA_REGISTRO,$action ];
                        tableObj.row.add( row ).draw( false );
                    };


                    // await new Promise( (resolve) =>{
                    //     let count = data.length;
                    //     $.each( data, async function(key,value) {

                    //         let $imageExist = false;
                    //         if ('pimgPath' in value)
                    //             $imageExist = await imageExists(value.pimgPath.name)

                    //         let preview = '<th class="text-danger"><a class="m-2 previewImg" href="#" onclick="return fillData.previewImg(this)"  title="Ver" ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></a></th>'
                    //         if ($imageExist)
                    //             preview = '<th><a class="m-2 " href="' + value.pimgPath.name + '" onclick="return fillData.previewImg(this)" title="Ver" alt="' + value.pimgPath.originalName + '" ><i class="fa fa-eye fa-2x"></i></a></th>';

                    //         var row = [ value.pID_REG_DECADACT_EXT, value.pDEPENDENCIA, value.pINSTITUCION, value.pFECHA_REGISTRO, preview ];

                    //         tableObj.row.add( row ).draw( false );

                    //         count --;
                    //         if (count == 0)
                    //             resolve(true);
                    //     });
                    // });                    
                    
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.identificacion.registroDecadactilar(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        digitalizacionDocumento : function(pID_ALTERNA){

            const form = $('#Digitalizacion_de_documento_form');
            $('.tabsContainer').LoadingOverlay("show");
            form.data('loading',true);

            fillData.genericPromise(base_url + `Solicitud/vwDocumento`,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {

                if (data) {

                    mainFormActions.insertValueInSelect($('#pID_CATEGORIA_DOC'),data.pID_CATEGORIA_DOC);
                    mainFormActions.insertValueInSelect($('#FECHA_DOCUMENTO'),moment( data.pFECHA_DOCUMENTO,'DD/MM/YYYY' ).format('YYYY-MM-DD'));
                    $('#thumb_pIMAGEN_Digitalizacion').attr("src", data.pNOMBRE_DOCUMENTO.name).attr("alt", data.pNOMBRE_DOCUMENTO.originalName);
                    $('#thumb_pIMAGEN_Digitalizacion').parent().find('div.custom-file label.custom-file-label').html(data.pNOMBRE_DOCUMENTO.originalName);

                }

                form.removeData('loading');
                form.data('requireddata',false);
                form.data('retrieved', true);

                $('.tabsContainer').LoadingOverlay("hide");
            })
            .catch( (err) => {
                form.setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                
                $('.tabsContainer').LoadingOverlay("hide");
            });

            //BLOQUE PARA EL GRID
            var tableRef = $('#' + objViewIdentificacion.vars.identificacion.tables.tableDigitalizaciondoc.obj.tables().nodes().to$().attr('id')),
                tableObj = objViewIdentificacion.vars.identificacion.tables.tableDigitalizaciondoc.obj,
                callUrl = base_url + `Solicitud/getDocumento`;

            tableRef.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            tableObj.clear().draw();

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    $.each( data, async function(key,value) {

                        let $imageExist = false;
                        if ('pVALOR' in value)
                            $imageExist = await imageExists(value.pVALOR.name)

                        let preview = '<th class="text-danger"><a class="m-2 previewImg" href="#" onclick="return fillData.previewImg(this)"  title="Ver" ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></a></th>';
                        if ($imageExist)
                            preview = '<th><a class="m-2 " href="' + value.pVALOR.name + '" onclick="return fillData.previewImg(this)" title="Ver" alt="' + value.pVALOR.originalName + '" ><i class="fa fa-eye fa-2x"></i></a></th>';

                        var row = [ value.pID_DOCUMENTO_EXT, value.pDESC_CATEGORIA_DOC, value.pFECHA_DOCUMENTO, value.pESTATUS, preview];
                        tableObj.row.add( row ).draw( false );
                    });

                     $('#Digitalizacion_de_documento_form').data('requireddata',false);
                }

                //Boton para refrescar datatable
                var btnRefreshRef = $('#' + tableRef[0].id + '_wrapper .dataTables_length');
                if (btnRefreshRef.find('.refreshTable').length == 0)
                    btnRefreshRef.prepend("<a href='#' class='refreshTable mr-3 float-left' data-call='fillData.identificacion.digitalizacionDocumento(mainTabMenu.var.pID_ALTERNA);' onclick='refreshTable(event,this)' title='Actualizar registros'><i class='fa fa-refresh fa-3x' aria-hidden='true'></i></a>");

                tableRef.LoadingOverlay("hide");

                $('#Digitalizacion_de_documento_form').removeData('loading');
            })
            .catch( (err) => {
                tableRef.setError(err.statusText);
                tableRef.LoadingOverlay("hide");
            });
        },
        identificacionVoz : function(pID_ALTERNA){
            
            $('#Identificacion_de_voz_form').data('loading',true);

            $('#Identificacion_de_voz_form').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            //BLOQUE PARA INSERTAR EL VÍNCULO AL AUDIO
            var callUrl = base_url + `Solicitud/opcRegistroVoz`;

            fillData.genericPromise(callUrl,{ pID_ALTERNA : pID_ALTERNA})
            .then( (data) => {
                if (data) {
                    var inAdscripcion = $('#Identificacion_de_voz_form .inAdscripcion'),
                        inDependencia = $('#Identificacion_de_voz_form .inDependencia'),
                        inInstitucion = $('#Identificacion_de_voz_form .inInstitucion'),
                        audioRef = $('#Identificacion_de_voz_form #audio')

                    inAdscripcion.html(data.pAREA_ADSCRIPCION);
                    inDependencia.html(data.pDEPENDENCIA);
                    inInstitucion.html(data.pINSTITUCION);

                    if (data.pPATH_ARCHIVO) {
                        audioRef.attr("src", data.pPATH_ARCHIVO.name);
                        audioRef[0].pause();
                        audioRef[0].load();
                        audioRef.removeClass('d-none');
                        
                        $('#Identificacion_de_voz_form').data('requireddata',false);

                    }

                    if (data.pESTATUS == 8)
                        $('.validarReplicar').removeClass('d-none');

                }
                
                $('#Identificacion_de_voz_form').LoadingOverlay("hide");

                $('#Identificacion_de_voz_form').removeData('loading');

            })
            .catch( (err) => {
                $('#Identificacion_de_voz_form').setAlert({
                    alertType :  'alert-danger',
                    dismissible : true,
                    header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                    msg : err.statusText
                });
                $('#Identificacion_de_voz_form').LoadingOverlay("hide");
            });
        }
    },
    camposGeneralesInformacionFichaFotografica : function(data){
        var inCUIP = $('#Ficha_fotografica_form .inCUIP'),
            inNombre = $('#Ficha_fotografica_form  .inNombre'),
            inApellidoaPaterno = $('#Ficha_fotografica_form  .inApellidoaPaterno'),
            inApellidoMaterno = $('#Ficha_fotografica_form  .inApellidoMaterno'),
            inFechaNacimiento = $('#Ficha_fotografica_form  .inFechaNacimiento'),
            inAdscripcion = $('#Ficha_fotografica_form  .inAdscripcion'),
            inDependencia = $('#Ficha_fotografica_form  .inDependencia'),
            inInstitucion = $('#Ficha_fotografica_form  .inInstitucion');
        
        inCUIP.html(data.pCUIP);
        inNombre.html(data.pNOMBRE);
        inApellidoaPaterno.html(data.pPATERNO);
        inApellidoMaterno.html(data.pMATERNO);
        inFechaNacimiento.html(data.pFECHA_NACIMIENTO);
        inAdscripcion.html(data.pAREA_ADSCRIPCION);
        inDependencia.html(data.pDEPENDENCIA);
        inInstitucion.html(data.pINSTITUCION);        
    },
    camposGeneralesInformacionRegistroDecadactilar : function(data){
        var inCUIP = $('#Registro_decadactilar_form .inCUIP'),
            inFolio = $('#Registro_decadactilar_form  .inFolio'),
            inAdscripcion = $('#Registro_decadactilar_form  .inAdscripcion'),
            inInstitucion = $('#Registro_decadactilar_form  .inInstitucion'),
            inDependencia = $('#Registro_decadactilar_form  .inDependencia'),
            inApellidoaPaterno = $('#Registro_decadactilar_form  .inApellidoaPaterno'),
            inFechaNacimiento = $('#Registro_decadactilar_form  .inFechaNacimiento'),
            inSexo = $('#Registro_decadactilar_form  .inSexo');
        
        inCUIP.html(data.pCUIP);
        inFolio.html(data.pFOLIO_PERSONA);
        inAdscripcion.html(data.pAREA_ADSCRIPCION);
        inInstitucion.html(data.pINSTITUCION);        
        inDependencia.html(data.pDEPENDENCIA);
        inApellidoaPaterno.html(data.pPATERNO);
        inFechaNacimiento.html(data.pFECHA_NACIMIENTO);
        inSexo.html(data.pSEXO);
    }    
}

function refreshTable(e,self){
    e.preventDefault();
    eval($(self).data('call'));
}

function actualizaInputsFormDissable(pTIPO_OPERACION){

    if (tUsr == 1){
                
        $rule = [ 'BE', 'BA', 'AS' ];

        if ( $.inArray( pTIPO_OPERACION, $rule ) != -1 ){

            $array = fillData.datosGenerales.rules.disabledComponents;
            $search_term = 'pTIPO_OPERACION';

            for (var i=$array.length-1; i>=0; i--) {
                if ($array[i] === $search_term) {
                    $array.splice(i, 1);
                    break;
                }
            }

            fillData.datosGenerales.rules.disabledComponents = $array;

            $("#Datos_personales_form .btnGuardarSection").removeAttr('offEvent');

            $('#Datos_personales_form').append('<input type="hidden" name="allValidateDatosPersonales" id="allValidateDatosPersonales" value="false" />');
        }

    }

    $exception = ['AE']
    if ( $.inArray( pTIPO_OPERACION, $exception ) == -1 ){

        fillData.datosGenerales.rules.disabledComponents.forEach( function(item) {
            $("#" + item).prop("disabled", true);
        });
        $('*[offEvent="true"]').off('click').addClass('d-none');

        intervalRulesDatosPersonales(true);
        
    }
}

var _intervalRulesDatosPersonales = null;
function intervalRulesDatosPersonales( $make = true) {

    if ($make) {

        _intervalRulesDatosPersonales = setInterval(function(){  
            fillData.datosGenerales.rules.disabledComponents.forEach( function(item) {
                $("#" + item).prop("disabled", true);    
            });
            
            $('*[offEvent="true"]').off('click').addClass('d-none');
        }, 100);        

    } else {

        clearInterval(_intervalRulesDatosPersonales);

    }

}