var objViewDatosGenerales = {
    vars : {
    },
    init : function(){
        $.each(objViewDatosGenerales.vars,function(key,val){
            var cmd = "objViewDatosGenerales.vars." + key + "= $('#" + key + "')";
            eval(cmd); // DOM ref
            cmd = "objViewDatosGenerales.vars." + key + ".on('click',objViewDatosGenerales.events.click." + key + ")";
            eval(cmd); // CLICK enent ref
        });
    },
    events : {
        click : {
        }        
    }    
}