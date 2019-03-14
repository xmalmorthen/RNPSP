var objViewVer = {
    var : {
        pID_ALTERNA : null
    },
    objs : {
        btnEdit : null
    },
    init : function(){
        objViewVer.var.pID_ALTERNA = id;

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
        objViewIdentificacion.init();
    },
    actions : {
        btnEdit : function(e){
            e.preventDefault();

            var principalTab = $('#mainContainerTab li.nav-item a.nav-link.active'),
                subTab = $('#myTabContent .tab-pane.active.show li.nav-item a.nav-link.active'),
                callUrl = `${base_url}Solicitud/Modificar/${id}?selectPrincipalTabId=${principalTab[0].id}&selectSubTabId=${subTab[0].id}`;

            window.location.href = callUrl;
        }
    }
}