var dynTabs = {
    mode : '',
    loading : false,
    validForm : true,
    tabs : {
        currentTab : {
            tabPanel : null,
            linkRef : null,
            tabForm : null
        },
        prebTab : {
            tabPanel : null,
            linkRef : null,
            tabForm : null
        }
    },
    change : function(options,e){
        var defaults = {
            discardFunction : null
        };
        options = $.extend(defaults, options);

            var tabRefObj = $(e.currentTarget.hash),
                    form = tabRefObj.find('form');

            dynTabs.tabs.prebTab.tabPanel = tabRefObj;
            dynTabs.tabs.prebTab.tabForm = form;
            dynTabs.tabs.prebTab.linkRef = $('#' + e.currentTarget.id);

            if (form.data('hasSaved') == true || form.data('hasDiscardChanges') == true) 
                return null;

            //VALIDATE FORM 
            if (dynTabs.validForm) {
                if (!form.valid()){
                    var linkRef = $('#' + e.currentTarget.id);
                    
                    if (!linkRef.hasClass('errorValidation')) {
                        dynTabs.markTab( linkRef,'<span class="text-danger tabMark errorValidation mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i></span>');
                    }                
                    form.setAlert({
                        alertType :  'alert-danger',
                        dismissible : true,
                        header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                        msg : 'Formulario incompleto'
                    });
    
                    //TODO: Xmal - Quitar comentarios en bloque para implementación
                    e.preventDefault();
                    return null;
                }
                if (form.data('hasChanged') == true){
                    Swal.fire({
                        title: 'Aviso',
                        html: "Para continuar, debe guardar los cambios",
                        footer: mainTabMenu.var.pID_ALTERNA ? "<div><button class='btn btn-warning discartChanges'>Continuar sin guardar</button></div>" : null,
                        type: 'warning',                        
                        allowOutsideClick : false,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33'
                    }).then(function(result){
                        if (result.value === true){
                            form.find('.btnGuardarSection').trigger('click',['tab',e]);
                        }
                    });
                    e.preventDefault();
                    if (options.discardFunction){
                        if ($.isFunction( options.discardFunction )){
                            $('.discartChanges').on('click',function(evnt) { options.discardFunction(evnt,e); });
                        }
                    }                    
                }
            }
    },
    showTab : function(e){
        var tabRefObj = $(e.currentTarget.hash),
            form = tabRefObj.find('form');
            
        populate.form(form); 
        MyCookie.tabRef.save(dynTabs.mode +'ChildTab',e.currentTarget.id);  
        dynTabs.loaderTab(e);
    },
    setCurrentTab : function(tabContent){        
    },
    markTab : function(linkRef,content){        
        linkRef.find('span.tabMark').remove();
        linkRef.prepend(content);

        var date = moment( new Date() ).format('DD/MM/YYYY'),
            time = moment( new Date() ).format('h:mm:ss a'),
            titleMsg = 'Acción realizada [ ' + time + ' - ' + date + ' ]';

        linkRef.find('span.tabMark').data('toggle','tooltip').prop('title',titleMsg);
        $('[data-toggle="tooltip"]').tooltip();
    },
    unMarkTab : function(linkRef){
        linkRef.find('span.tabMark').remove();
    },
    loaderTab : function(e){
        
        dynTabs.loading = true;

        var form = e ? $('#' + $(e.currentTarget).attr('aria-controls')).find('form') : $('#' + $('#myTabContent .tab-pane.active .nav-item a.nav-link.active').attr('aria-controls')).find('form'),
            loaderShow = false;
                    
            var initInterval = setInterval(function(){
                objsToInsert = 0;
                for (var index = 0; index < form.length; index++) {
                    $.each( $(form[index]).find('select'), function( key, value ) {
                        if ($(this).data('insert') !== undefined) 
                            objsToInsert ++;
                    });                    
                }
                
                if (objsToInsert == 0) {
                    clearInterval(initInterval);

                    $.LoadingOverlay("hide",true);
                    dynTabs.loading = false;

                    //Rutina para verificar si se hace algún cambio en cualquier forulario
                    form.find('input, select').change(function(e) {                
                        form.removeData('hasSaved').removeData('hasDiscardChanges').removeData('withError');
                        form.data('hasChanged',true);
                        $(e.target).removeError();
                    });

                } else {
                    if (!loaderShow) {
                        loaderShow = true;
                        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
                    }
                }
            }, 100);
    },
    getCurrentTab : function(tabContent){
        var linkRef = tabContent.find('.tab-pane.active.show').find('.nav.nav-tabs').find('a.nav-link.active'),
            tabPanel = $(linkRef[0].hash),
            tabForm = tabPanel.find('form');

        return {
            linkRef : linkRef,
            tabPanel : tabPanel,
            tabForm : tabForm
        };
    }
}