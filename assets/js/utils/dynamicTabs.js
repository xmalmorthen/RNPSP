var dynTabs = {
    mode : '',
    loading : null,
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
                form = tabRefObj.find('form'),
                linkRef = $('#' + e.currentTarget.id);

            dynTabs.tabs.prebTab.tabPanel = tabRefObj;
            dynTabs.tabs.prebTab.linkRef = $('#' + e.currentTarget.id);

            $.each( form, function( key, formElement ) {
                
                formElement = $(formElement);

                dynTabs.tabs.prebTab.tabForm = formElement;

                if ( formElement.data('loading') == true ) {

                    intervalLoading = setInterval(function(){

                        if ( formElement.data('loading') != true ) {
                        
                            clearInterval(intervalLoading);
                            linkRef.find('span.tabMark.loadingMark').remove();
                            $("#" + e.relatedTarget.id).trigger('click');
                            $.LoadingOverlay("hide", true);
                            return false;
                        }

                        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                    }, 100);


                    dynTabs.markTab( linkRef,'<span class="tabMark loadingMark mr-2"><i class="fa fa-spinner fa-pulse fa-fw" aria-hidden="true" ></i></span>');
                    $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

                    e.preventDefault();
                    return null;

                }

                if (formElement.data('hasSaved') == true || formElement.data('hasDiscardChanges') == true || formElement.data('retrieved') == true)
                    return null;

                if ( formElement.data('requireddata') != false  ) {
                    
                    if (!formElement.valid()){
                                                    
                        if (!linkRef.hasClass('errorValidation')) {
                            dynTabs.markTab( linkRef,'<span class="text-danger tabMark errorValidation mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i></span>');
                        }
                        formElement.setAlert({
                            alertType :  'alert-danger',
                            dismissible : true,
                            header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                            msg : 'Formulario incompleto'
                        });
        
                        e.preventDefault();
                        return null;
                    }

                }   

                if (formElement.data('hasChanged') == true){

                    dynTabs.markTab( linkRef,'<span class="text-warning tabMark errorValidation mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i></span>');

                    formElement.setAlert({
                        alertType :  'alert-danger',
                        dismissible : true,
                        header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Atención',
                        msg : 'Para continuar, debe guardar los cambios' + ( mainTabMenu.var.pID_ALTERNA && options.discardFunction ? '<br><br><div><button class="btn btn-warning discartChanges">Continuar sin guardar</button></div>' : '' )
                    });

                    if (options.discardFunction){
                        if ($.isFunction( options.discardFunction )){
                            $('.discartChanges').on('click',function(evnt) { options.discardFunction(evnt,e); });
                        }
                    }

                    e.preventDefault();
                    return false;

                } else if ( formElement.data('requireddata') != false )  {
                    
                    dynTabs.markTab( linkRef,'<span class="text-warning tabMark errorValidation mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i></span>');
                    
                    formElement.setAlert({
                        alertType :  'alert-danger',
                        dismissible : true,
                        header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
                        msg : 'Se requiere registrar la información del formulario'
                    });
                    e.preventDefault();
                    return false;

                }

            });
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

        var initIntervalLoaderTab = [];

        $.each( form, function( key, formElement ) {
            
            formElement = $(formElement);

            initIntervalLoaderTab[key] = setInterval(function(){

                var objsToInsertLoaderTab = 0;
                $.each( formElement.find('select'), function() {
                    if ($(this).data('insert') !== undefined) 
                        objsToInsertLoaderTab ++;
                });  
                

                if (objsToInsertLoaderTab == 0) {
                    
                    clearInterval(initIntervalLoaderTab[key]);

                    dynTabs.loading = false;

                    $.LoadingOverlay("hide",true);

                    //Rutina para verificar si se hace algún cambio en cualquier forulario
                    formElement.find('input, select').change(function(e) {

                        if ( $(e.target).data('ignoreChangeFirst') ) {
                            $(e.target).removeData('ignoreChangeFirst');
                            return null;
                        }

                        formElement.removeData('hasSaved').removeData('hasDiscardChanges').removeData('withError').removeData('withError').removeData('retrieved');
                        formElement.data('hasChanged',true);
                        $(e.target).removeError();

                        console.log(e.currentTarget.id + ' agregado el hasChanged');

                    });

                } else {
                    if (!loaderShow) {
                        loaderShow = true;

                        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
                    }
                }

            }, 100);
            
        });
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