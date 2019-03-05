$.fn.getCatalog = function(options) {  
    var defaults = {
        query : '', 
        params : {},
        emptyOption : true,       
        success: function() {},
        error: function() {},
        always: function() {}
    };
    options = $.extend(defaults, options);

    return this.each(function() {
        var callUrl = base_url + "ajaxCatalogos/index";
        var obj = $(this);

        var doJob = false;
        if (obj.data('populated') == true) {            
            if (typeof obj.data('force-refresh') !== "undefined") {
                doJob = obj.data('force-refresh');
            } else if (typeof obj.data('cascade') !== "undefined") {
                doJob = obj.data('cascade');
            }
            if (!doJob)
                return null;
        }

        var typeOfObj = obj[0].tagName.toLowerCase();
        switch (typeOfObj) {
            case 'select':
                obj.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
                obj.prop("disabled", true);
                obj.find("option").remove();                
                
                //POPULATE FROM INDEXDB
                iDB.actions.populateObjectFromIDB(obj,options);
                break;
            default:
                $.get(callUrl,{
                    qry : options.query,
                    params : options.params
                },
                function (data) {                    
                    options.success(data);
                }).fail(function (err) {                    
                    options.error(err);
                }).always(function () {   
                    MyCookie.session.reset();                 
                    options.always();
                });
                break;
        }
    });
};


$.fn.setError = function(msg){
    var content = '<label class="text-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ' + msg + '</label>';
    $(this).parent().append(content);    
};
$.fn.removeError = function(){
    var errores = $(this).parent().find("label.text-danger:visible");
    $(this).removeClass("text-danger");
    errores.remove();
};
$.fn.withError = function(){
    var status = $(this).parent().find(".text-danger:visible").length > 0 ? true : false;
    return status;
};

