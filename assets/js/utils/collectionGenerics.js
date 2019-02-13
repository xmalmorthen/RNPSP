var generic = {
    click : function(options,fnc, success, error) {
        options.evt.preventDefault();
        if (options.showLoading)
            $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
        try {
            var returnResponse = fnc();
            if (success) 
                if ($.isFunction( success ))
                    success(returnResponse);
        }
        catch(err) {
            if (error) 
                if ($.isFunction( error ))
                    error();
        } 
        finally {
            if (options.showLoading)
                $.LoadingOverlay("hide");
        }
    },
    ajax : {
        post : function(callUrl,model,success,error){
            if (!model){
                $.post(callUrl,
                    function (data) {
                        if (success) 
                            if ($.isFunction( success ))
                                success(data);                    
                    }).fail(function (err) {
                        if (error) 
                            if ($.isFunction( error ))
                                error(err);
                    }).always(function () {
                });
            } else {
                $.post(callUrl,{
                        model: model
                    },
                    function (data) {
                        if (success) 
                            if ($.isFunction( success ))
                                success(data);                    
                    }).fail(function (err) {
                        if (error) 
                            if ($.isFunction( error ))
                                error(err);
                    }).always(function () {
                });
            }
        },
        get : function(callUrl,model,success,error){
            if (!model) {
                $.get(callUrl,
                    function (data) {
                        if (success) 
                                if ($.isFunction( success ))
                                    success(data);
                    }).fail(function (err) {
                        if (error) 
                                if ($.isFunction( error ))
                                    error(err);
                    }).always(function () {                    
                });                
            } else {
                $.get(callUrl,{
                        model : model                    
                    },
                    function (data) {
                        if (success) 
                                if ($.isFunction( success ))
                                    success(data);
                    }).fail(function (err) {
                        if (error) 
                                if ($.isFunction( error ))
                                    error(err);
                    }).always(function () {                    
                    });
            }
        }
    }
}