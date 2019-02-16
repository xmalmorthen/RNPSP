var dynTabs = {
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
            
            //TODO: XMAL - Quitar comentarios despues de implementar lo del guardado antes de cambiar de tab

            // if (!form.valid()){                
            //     var linkRef = $('#' + e.currentTarget.id);
            //     if (!linkRef.hasClass('errorValidation')) {
            //         linkRef.prepend('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ');
            //         linkRef.addClass('text-danger errorValidation');                    
            //     }                
            //     form.setAlert({
            //         alertType :  'alert-danger',
            //         dismissible : true,
            //         header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
            //         msg : 'Formulario incompleto'
            //     });

            //     e.preventDefault();
            //     $("html, body").animate({ scrollTop: 0 }, 200);
            // } else {
                if (form.data('hasChanged') == true){

                    Swal({
                        title: 'Aviso',
                        html: "Para continuar, debe guardar los cambios",
                        footer: "<div><button class='btn btn-warning discartChanges'>Continuar sin guardar</button></div>",
                        type: 'warning',                        
                        allowOutsideClick : false,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33'
                    }).then(function(result){
                        if (result.value === true){
                            form.find('.btnGuardarSection').trigger('click');
                        }
                    });
                    e.preventDefault();
                    if (options.discardFunction){
                        if ($.isFunction( options.discardFunction )){
                            $('.discartChanges').on('click',options.discardFunction);
                        }
                    }                    
                }
            // }
    },
    showTab : function(e){
        var tabRefObj = $(e.currentTarget.hash),
            form = tabRefObj.find('form');

        dynTabs.tabs.currentTab.tabPanel = tabRefObj;
        dynTabs.tabs.currentTab.tabForm = form;
        dynTabs.tabs.currentTab.linkRef = $('#' + e.currentTarget.id);

        populate.form(dynTabs.tabs.currentTab.tabForm);        
    },
    setCurrentTab : function(tabContent){
        dynTabs.tabs.currentTab.linkRef = tabContent.find('.tab-pane.active.show').find('.nav.nav-tabs').find('a.nav-link.active');
        dynTabs.tabs.currentTab.tabPanel = $(dynTabs.tabs.currentTab.linkRef[0].hash);
        dynTabs.tabs.currentTab.tabForm = dynTabs.tabs.currentTab.tabPanel.find('form');
    },
    markTab : function(linkRef,content){        
        linkRef.find('span.tabMark').remove();
        linkRef.prepend(content);
    }
}