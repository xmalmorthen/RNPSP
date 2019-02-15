$.fn.setAlert = function(options) {  
    var defaults = {
        alertType : 'alert-primary',    //Tipo de alert
        dismissible : false,            //Si va a ser alert con boton de cerrar
        header : '',                    //Cabecera del alert
        msg : '',                       //mensaje
        closeOtherAlert : true          //Si va a cerrar otros alert del mismo tipo
    };
    options = $.extend(defaults, options);

    if (options.msg.length == 0 )
        return null;

    return this.each(function() {
        if (options.closeOtherAlert)
            $(this).closeAlert({alertType : options.alertType});

        var template = '<div class="alert ' + options.alertType + ' ' + (options.dismissible ? 'alert-dismissible show' : '') + ' m-3 errorForm" role="alert">' +
                        ( options.header.length != 0 ? '<h4 class="alert-heading">' + options.header + '</h4>' : '') +                        
                        options.msg +
                        (options.dismissible ? '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' : '') +
                       '</div>';
        $(this).prepend(template);
    });
};

$.fn.closeAlert = function(options){
    var defaults = {
        alertType : '', 
    };
    options = $.extend(defaults, options);

    if (options.alertType.length == 0)
        throw 'Falta indicar el tipo de alert';

    return this.each(function() {  
        $(this).find('.alert.' + options.alertType).alert('close');
    });
}