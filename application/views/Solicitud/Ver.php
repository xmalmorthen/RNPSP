<div class="_container">
    <!-- LISTA DE TABS DEL MENU PRINCIPAL -->
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="mainContainerTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="datosGenerales-tab" data-toggle="tab" href="#datosGenerales" role="tab" aria-controls="datosGenerales" aria-selected="true" data-finish='false'>Datos generales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Laboral-tab" data-toggle="tab" href="#Laboral" role="tab" aria-controls="Laboral" aria-selected="false" data-finish='false'>Laboral</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Capacitacion-tab" data-toggle="tab" href="#Capacitacion" role="tab" aria-controls="Capacitacion" aria-selected="false" data-finish='false'>Capacitación</a>
                </li>                            
                <?php if (verificaPermiso(15) == true) 
                { ?>
                <li class="nav-item">
                    <a class="nav-link" id="Identificacion-tab" data-toggle="tab" href="#Identificacion" role="tab" aria-controls="Identificacion" aria-selected="false" data-finish='false'>Identificación</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <!-- LISTA DE SUBMENUS -->
    <div class="tab-content" id="myTabContent">
        <div class="row mt-2 mr-2">
            <div class="col-md-12 text-right">
                <button class="btn btn-primary btn-lg btnEdit">Modificar</button>
            </div>
        </div>

        <div class="tab-pane fade show active" id="datosGenerales" role="tabpanel" aria-labelledby="Tab1-tab">
                <?php echo $this->load->view('Solicitud/tabsVer/datosGenerales/mnuTabDatosGenerales',null,TRUE) ?>
            <div class="tab-content" id="contentDatosGenerales">
                <?php echo $this->load->view('Solicitud/tabsVer/datosGenerales/contenidoDatosGenerales',null,TRUE) ?>
            </div>
        </div>
        <div class="tab-pane fade" id="Laboral" role="tabpanel" aria-labelledby="profile-tab">
            <?php echo $this->load->view('Solicitud/tabsVer/Laboral/mnuTabLaboral',null,TRUE) ?>
            <div class="tab-content" id="contentLaboral">
                <?php echo $this->load->view('Solicitud/tabsVer/Laboral/contenidoLaboral',null,TRUE) ?>
            </div>
        </div>
        <div class="tab-pane fade" id="Capacitacion" role="tabpanel" aria-labelledby="Tab3-tab">
            <?php echo $this->load->view('Solicitud/tabsVer/Capacitacion/mnuTabCapacitacion',null,TRUE) ?>
            <div class="tab-content" id="contentCapacitacion">
                <?php echo $this->load->view('Solicitud/tabsVer/Capacitacion/contenidoCapacitacion',null,TRUE) ?>
            </div>
        </div>
        <?php if (verificaPermiso(15) == true) 
        { ?>
        <div class="tab-pane fade" id="Identificacion" role="tabpanel" aria-labelledby="Tab3-tab">
            <?php echo $this->load->view('Solicitud/tabsVer/Identificacion/mnuTabIdentificacion',null,TRUE) ?>
            <div class="tab-content">
                    <?php echo $this->load->view('Solicitud/tabsVer/Identificacion/contenidoIdentificacion',null,TRUE) ?>
            </div>
        </div>
        <?php } ?>
    </div>    
</div>

<!-- JS -->
<script src="<?php echo base_url('assets/js/views/solicitud/ver/datosGeneralesTab.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/ver/ver.js') ?>"></script>

<script>
    var id = "<?php echo isset($id) ? $id : ''; ?>";    
    $(function() {
        objViewVer.init();
    });
</script>
<!-- /JS -->