<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">
<div class="_container">
    <!-- LISTA DE TABS DEL MENU PRINCIPAL -->
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="mainContainerTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="datosGenerales-tab" data-toggle="tab" href="#datosGenerales" role="tab" aria-controls="datosGenerales" aria-selected="true">Datos generales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Laboral-tab" data-toggle="tab" href="#Laboral" role="tab" aria-controls="Laboral" aria-selected="false">Laboral</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Capacitacion-tab" data-toggle="tab" href="#Capacitacion" role="tab" aria-controls="Capacitacion" aria-selected="false">Capacitación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Identificacion-tab" data-toggle="tab" href="#Identificacion" role="tab" aria-controls="Identificacion" aria-selected="false">Identificación</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- LISTA DE SUBMENUS -->
       <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="datosGenerales" role="tabpanel" aria-labelledby="Tab1-tab">
                 <?php echo $this->load->view('Solicitud/tabs/datosGenerales/mnuTabDatosGenerales',null,TRUE) ?>
                <div class="tab-content" id="contentDatosGenerales">
                     <?php echo $this->load->view('Solicitud/tabs/datosGenerales/contenidoDatosGenerales',null,TRUE) ?>
                </div>
            </div>
            <div class="tab-pane fade" id="Laboral" role="tabpanel" aria-labelledby="profile-tab">
                <?php echo $this->load->view('Solicitud/tabs/Laboral/mnuTabLaboral',null,TRUE) ?>
                <div class="tab-content" id="contentLaboral">
                    <?php echo $this->load->view('Solicitud/tabs/Laboral/contenidoLaboral',null,TRUE) ?>
                </div>
            </div>
            <div class="tab-pane fade" id="Capacitacion" role="tabpanel" aria-labelledby="Tab3-tab">
                <?php echo $this->load->view('Solicitud/tabs/Capacitacion/mnuTabCapacitacion',null,TRUE) ?>
                <div class="tab-content" id="contentCapacitacion">
                    <?php echo $this->load->view('Solicitud/tabs/Capacitacion/contenidoCapacitacion',null,TRUE) ?>
                </div>
            </div>
             <div class="tab-pane fade" id="Identificacion" role="tabpanel" aria-labelledby="Tab3-tab">
                <?php echo $this->load->view('Solicitud/tabs/Identificacion/mnuTabIdentificacion',null,TRUE) ?>
                <div class="tab-content">
                     <?php echo $this->load->view('Solicitud/tabs/Identificacion/contenidoIdentificacion',null,TRUE) ?>
                </div>
            </div>
        </div>
</div>

<script src="<?php echo base_url('assets/vendor/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/collectionGenerics.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/dom.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/populateFormsCatalogs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/alerts.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/dynamicTabs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/catalogs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/serialized.js') ?>"></script>

<script src="<?php echo base_url('assets/js/views/solicitud/datosGeneralesTab.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/laboralTab.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/capacitacionTab.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/identificacionTab.js') ?>"></script>


<script type="text/javascript">
    $(function() {
        //CAMBIO DE TABS
        $('#mainContainerTab a[data-toggle="tab"]').on('show.bs.tab',mainTabMenu.tab.change);

        var linkRefHash = MyCookie.tabRef.get('mainTab');
        if (!linkRefHash){
            linkRefHash = $('#mainContainerTab .nav-item a.nav-link.active')[0].id;
            MyCookie.tabRef.save('mainTab',linkRefHash);
        }
        var linkRef = $('#' + linkRefHash);

        mainTabMenu.actions.init(
            linkRef.attr('aria-controls'),
            function(){
                linkRef.trigger('click');
            }
        );
    });

    var mainTabMenu = {
        tab : {
            change : function(e){
                var tabRef = $(e.currentTarget);
                mainTabMenu.actions.init(tabRef.attr('aria-controls'));
                MyCookie.tabRef.save('mainTab',tabRef.attr('id'));
            }
        },
        actions : {
            init : function(tabRef, callback){
                switch (tabRef) {
                    case 'datosGenerales':
                        objViewDatosGenerales.init();
                    break;
                    case 'Laboral':
                        objViewLaboral.init();
                    break;
                    case 'Capacitacion':
                        objViewCapacitacion.init();
                    break;
                    case 'Identificacion':
                        objViewIdentificacion.init();
                    break;
                }
                if (callback)
                    if ($.isFunction( callback ))
                        callback();
            },
            changeTab : function(){
                var linkRefHash = MyCookie.tabRef.get('childTab');
                if (!linkRefHash){
                    linkRefHash = $('#myTabContent .nav-item a.nav-link.active')[0].id;
                    MyCookie.tabRef.save('childTab',linkRefHash);
                }
                var linkRef = $('#' + linkRefHash);
                linkRef.trigger('click');
            }
        }
    }


</script>