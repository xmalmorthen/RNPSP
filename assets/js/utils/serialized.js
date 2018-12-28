var serialized = {
    save : function(model,callback, error){
        var callUrl = base_url + 'ajaxSerealize/ajaxSaveProgress';
        $.post(callUrl,{
            model: model
        },
        function (data) {
            callback(data);            
        }).fail(function (err) {
            error(err);            
        }).always(function () {});
    },
    get : function(callback,error){
        var callUrl = base_url + 'ajaxSerealize/ajaxGetProgress';
        $.post(callUrl,{
            model: $('#current_url').val()
        },
        function (data) {
            callback(data);            
        }).fail(function (err) {
            error(err);
        }).always(function () {});
    },
    delete : function(){
        
    }
}