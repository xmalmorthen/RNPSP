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

        var typeOfObj = obj[0].tagName.toLowerCase();
        switch (typeOfObj) {
            case 'select':
                obj.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
                obj.prop("disabled", true);
                obj.find("option").remove();
                obj.append('<option disabled selected value><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i> Actualizando, favor de esperar...</option>');
                
                $.get(callUrl,{
                    qry : options.query,
                    params : options.params
                },
                function (data) {
                    if (data) {
                        obj.find("option").remove();
                        if (options.emptyOption){
                            obj.append('<option disabled selected value>Seleccione una opción</option>');
                        }
                        if (data.results) {
                            $.each(data.results,function(key, value) 
                            {
                                obj.append('<option value=' + value.id + '>' + value.text + '</option>');
                            });
                        }
                    }
                    obj.prop("disabled", false);
                    options.success(data);
                }).fail(function (err) {
                    obj.find("option").remove();
                    obj.setError('ERROR al actualizar');
                    options.error(err);
                }).always(function () {
                    obj.LoadingOverlay("hide");
                    options.always();
                });
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
