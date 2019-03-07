var serialized = {
    save : function(model,callback, error){
        var callUrl = base_url + 'ajaxSerealize/ajaxSaveProgress';
        
        model = {model : model};
        model[csrf.token_name] = csrf.hash;

        $.post(callUrl,model,
        function (data) {
            callback(data);            
        }).fail(function (err) {
            error(err);            
        }).always(function () {
            MyCookie.session.reset();
        });
    },
    get : function(callback,error){
        var callUrl = base_url + 'ajaxSerealize/ajaxGetProgress';

        var model = {model : $('#current_url').val()};
            model[csrf.token_name] = csrf.hash;

        $.post(callUrl,model,
        function (data) {
            callback(data);            
        }).fail(function (err) {
            error(err);
        }).always(function () {
            MyCookie.session.reset();
        });
    },
    delete : function(){
        
    },
    unserialize : function(form,object,callback){
        $.each(object.serializedData, function(key,val) {                        
            $obj = !$.isArray(val) ? form.find('[name="'+ key +'"]') : form.find('[name="'+ key +'[]"]');
            $objTypeOf = $obj[0].tagName.toLowerCase();            

            switch ($objTypeOf) {
                case 'input':
                    $type = $obj.attr('type').toLowerCase();
                    switch ($type) {
                        case 'text':
                        case 'password':
                        case 'date':
                        case 'email':
                        case 'hidden':
                        case 'numeric':
                            $obj.val(val);
                        break;
                        case 'checkbox': 
                            if ($.isArray(val)) {
                                $.each(val, function(keyCheckBox,valCheckBox) {
                                    $item = null;
                                    $obj.each(function (index, value) { 
                                        if ($(this).val() === valCheckBox){
                                            $item = $(this);
                                            return false;
                                        }                                        
                                    });
                                    $item.prop('checked', true);
                                });
                            }
                        break;
                    }
                break;
                case 'select':                
                    $obj.val(val);
                break;                                    
                default:
                break;
            }            
        });        
        callback();
    }
};