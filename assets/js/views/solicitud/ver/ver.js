var objViewVer = {
    var : {
        pID_ALTERNA : null
    },
    objs : {
        btnEdit : null
    },
    init : function(){

        objViewVer.objs.btnEdit = $('.btnEdit');
        objViewVer.objs.btnEdit.on('click',objViewVer.actions.btnEdit);

        $('.btnSiguienteAnterior').on('click',function(e){
            e.preventDefault();
            var tab = $(this).data('nexttab'); 
            $(tab).tab('show');
        });

        $('.endTab').on('click',function(e){
            var nextTab = $('#mainContainerTab li.nav-item a.nav-link.active').closest('li').next('li.nav-item').find('a.nav-link');
            nextTab.tab('show'); 
        });

        objViewDatosGenerales.init();
    },
    actions : {
        btnEdit : function(e){
            e.preventDefault();

            var principalTab = $('#mainContainerTab li.nav-item a.nav-link.active'),
                subTab = $('#myTabContent li.nav-item a.nav-link.active'),
                callUrl = `${base_url}Solicitud/Modificar/${id}/${principalTab[0].id}/${subTab[0].id}`;

            debugger;
            window.location.href = callUrl;
        }
    }
}