var objViewVer = {
    var : {
        pID_ALTERNA : null
    },
    objs : {
        btnEdit : null,
        refreshView : null 
    },
    init : function(){
        objViewVer.var.pID_ALTERNA = id;

        objViewVer.objs.btnEdit = $('.btnEdit');
        objViewVer.objs.btnEdit.on('click',objViewVer.actions.click.btnEdit);

        objViewVer.objs.refreshView = $('#refreshView');
        objViewVer.objs.refreshView.on('click',objViewVer.actions.click.refreshView);

        $('.btnSiguienteAnterior').on('click',function(e){
            e.preventDefault();
            var tab = $(this).data('nexttab'); 
            $(tab).tab('show');
        });

        $('.endTab').on('click',function(e){
            var nextTab = $('#mainContainerTab li.nav-item a.nav-link.active').closest('li').next('li.nav-item').find('a.nav-link');
            nextTab.tab('show'); 
        });

        objViewVer.actions.statusSolicitud();

        objViewVer.objs.refreshView.trigger('click');
    },    
    actions : {
        click : {
            btnEdit : function(e){
                e.preventDefault();

                var principalTab = $('#mainContainerTab li.nav-item a.nav-link.active'),
                    subTab = $('#myTabContent .tab-pane.active.show li.nav-item a.nav-link.active'),
                    callUrl = `${base_url}Solicitud/Modificar/${id}?selectPrincipalTabId=${principalTab[0].id}&selectSubTabId=${subTab[0].id}`;

                window.location.href = callUrl;
            },
            refreshView : function(e){
                e.preventDefault();
                objViewVer.actions.initAll();
            }
        },
        initAll : function(){
            objViewDatosGenerales.init();
            objViewLaboral.init();
            objViewCapacitacion.init();
            objViewIdentificacion.init();
        },
        statusSolicitud : function(){

            if (tUsr == 1){

                $('.modeificarBtnSection').removeClass('d-none');

            } else {

                var callUrl = base_url + "Solicitud/ajaxStatusSolicitud/" + objViewVer.var.pID_ALTERNA;

                $.get(callUrl,
                function (data) {  
                    
                    try {
                        if (data.results[0].ESTATUS == 7) {
                            $('.modeificarBtnSection').remove();
                        } else {
                            $('.modeificarBtnSection').removeClass('d-none');
                        }
                    } catch (error) {}

                }).fail(function (err) {
                }).always(function () {
                    MyCookie.session.reset();
                });
            }
        }
    }
}