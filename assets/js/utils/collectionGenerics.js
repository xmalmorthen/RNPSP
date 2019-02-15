var generic = {
    click : function(options,fnc, success, error) {
        var defaults = {
            evt : null, 
            showLoading : false
        };
        options = $.extend(defaults, options);

        if (options.evt)
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
                        MyCookie.session.reset();
                    }
                );
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
                        MyCookie.session.reset();
                    }
                );
            }
        },
        get : function(callUrl,model,success,error,always){
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
                        MyCookie.session.reset();

                        if (always) 
                                if ($.isFunction( always ))
                                    always();
                    }
                );
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
                        MyCookie.session.reset();

                        if (always) 
                                if ($.isFunction( always ))
                                    always();                    
                        }
                    );
            }
        }
    }
}