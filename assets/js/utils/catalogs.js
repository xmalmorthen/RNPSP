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

        if (obj.data('populated') == true)
            if (obj.data('force-refresh') != true || obj.data('cascade') != true) 
                return null;

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
                    obj.data('populated',true);
                    obj.prop("disabled", false);
                    
                    //SI SE ASIGNA UN VALOR Y AUN NO ESTA POPULADO
                    //LO OBTIENE DEL DATA [INSERT]
                    if ( obj.data('insert') ) {
                        obj.val(obj.data('insert')).trigger('change.select2');
                        obj.removeData('insert');
                    }

                    options.success(data);
                }).fail(function (err) {                    
                    obj.find("option").remove();
                    obj.setError('ERROR al actualizar');
                    options.error(err);
                }).always(function () {
                    obj.LoadingOverlay("hide");
                    options.always();
                                        
                    MyCookie.session.reset();
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

