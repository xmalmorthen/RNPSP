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
                $.LoadingOverlay("hide",true);
        }
    },
    ajax : {
        sync : {
            post : function(callUrl,model,success,error){
                var ajaxCall = null;

                if (!model){
                    model = {};
                    model[csrf.token_name] = csrf.hash;
                    
                    ajaxCall = $.post(callUrl,model)
                        .always(function () {
                            MyCookie.session.reset();
                        }
                    );
                } else {
                    model = {model : model};
                    model[csrf.token_name] = csrf.hash;

                    ajaxCall = $.post(callUrl,model)
                        .always(function () {
                            MyCookie.session.reset();
                        }
                    );
                }

                $.when(ajaxCall).then( 
                    //sussecc
                    function(data, textStatus, jqXHR){
                        if (success) 
                            if ($.isFunction( success ))
                                success(data);                    
                    },
                    //error
                    function(data, textStatus, jqXHR){
                        if (error) 
                            if ($.isFunction( error ))
                                error(data);
                    } 
                );
            },
            get : function(callUrl,model,success,error,always){
                var ajaxCall = null;

                if (!model) {
                    ajaxCall = $.get(callUrl)
                        .always(function () { 
                            MyCookie.session.reset();

                            if (always) 
                                    if ($.isFunction( always ))
                                        always();
                        }
                    );
                } else {
                    ajaxCall = $.get(callUrl,{model : model})
                        .always(function () {
                            MyCookie.session.reset();

                            if (always) 
                                    if ($.isFunction( always ))
                                        always();                    
                            }
                        );
                }

                $.when(ajaxCall).then( 
                    //sussecc
                    function(data, textStatus, jqXHR){
                        if (success) 
                            if ($.isFunction( success ))
                                    success(data);                    
                    },
                    //error
                    function(data, textStatus, jqXHR){
                        if (error) 
                            if ($.isFunction( error ))
                                error(data);
                    } 
                );
            }
        },
        async : {
            post : function(callUrl,model,success,error){
                if (!model){
                    model = {};
                    model[csrf.token_name] = csrf.hash;
                    $.post(callUrl,model,
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
                    model = {model : model};
                    model[csrf.token_name] = csrf.hash;

                    $.post(callUrl,model,
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
                    $.get(callUrl,model,
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
        },
        certified : function(value,success,error,always){
            var callUrl = base_url + 'ajaxAPIs/curp',
                model = {CURP : value};

            //desactivar controles involucrados en la consulta CURP
            $('.consultaCURP').readOnly();

            generic.ajax.async.get(
                callUrl,
                model,
                //success
                function(data){
                    if (success) 
                        if ($.isFunction( success ))
                            success(data); 
                }, 
                //error
                function(err){
                    if (error) 
                        if ($.isFunction( error ))
                            error(err);
                },
                //always
                function(){
                    if (always) 
                        if ($.isFunction( always ))
                            always(err);
                }
            );
        }
    }
}