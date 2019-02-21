var dynTabs = {
    mode : '',
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
                if (form.valid()){
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
                                form.find('.btnGuardarSection').trigger('click',['tab']);
                            }
                        });
                        e.preventDefault();
                        if (options.discardFunction){
                            if ($.isFunction( options.discardFunction )){
                                $('.discartChanges').on('click',function(evnt) { options.discardFunction(evnt,e.relatedTarget); });
                            }
                        }                    
                    }
                }
                else {
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

                    //e.preventDefault();
                }
            }
    },
    showTab : function(e){
        var tabRefObj = $(e.currentTarget.hash),
            form = tabRefObj.find('form');

        dynTabs.tabs.currentTab.tabPanel = tabRefObj;
        dynTabs.tabs.currentTab.tabForm = form;
        dynTabs.tabs.currentTab.linkRef = $('#' + e.currentTarget.id);

        populate.form(dynTabs.tabs.currentTab.tabForm); 

        MyCookie.tabRef.save(dynTabs.mode +'ChildTab',e.currentTarget.id);       
    },
    setCurrentTab : function(tabContent){
        dynTabs.tabs.currentTab.linkRef = tabContent.find('.tab-pane.active.show').find('.nav.nav-tabs').find('a.nav-link.active');
        dynTabs.tabs.currentTab.tabPanel = $(dynTabs.tabs.currentTab.linkRef[0].hash);
        dynTabs.tabs.currentTab.tabForm = dynTabs.tabs.currentTab.tabPanel.find('form');
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
    }
}