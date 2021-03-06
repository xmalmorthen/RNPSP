<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap4.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/responsive.bootstrap4.min.css"); ?>">

<div class="_container">
    
    <div class="row">
        <div class="col-md-1">
            <a href="#" id='refreshView' title='Actualizar información'><i class="fa fa-refresh fa-3x mb-3" aria-hidden="true"></i></a>
        </div>
        <?php if ( isset($isFromPersonal) == true ) {?>
        <div class="col-md-11 text-right">
            <a class="btn btn-secondary btn-lg" href="<?php echo site_url('Personal'); ?>">Regresar</a>
        </div>
        <?php } ?>
    </div>
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
                <?php if (verificaTipoUsuarioSesion() == 1 || ( isset($isFromPersonal) == true )) { // solo usurios del c4 y superadministrador?>
                <li class="nav-item">
                    <a class="nav-link" id="Identificacion-tab" data-toggle="tab" href="#Identificacion" role="tab" aria-controls="Identificacion" aria-selected="false" data-finish='false'>Identificación</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <!-- LISTA DE SUBMENUS -->
    <div class="tab-content" id="myTabContent">
        
        <?php if ( isset($isFromPersonal) == false && !isConsultasUser()) {
            $this->session->set_flashdata('isFromPersonal',false);?>
        <div class="row mt-2 mr-2 d-none modeificarBtnSection">
            <div class="col-md-12 text-right">
                <button class="btn btn-primary btn-lg btnEdit">Modificar</button>
            </div>
        </div>
        <?php } ?>
        
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
        <?php if (verificaTipoUsuarioSesion() == 1) { // solo usurios del c4 y superadministrador?>
        <div class="tab-pane fade" id="Identificacion" role="tabpanel" aria-labelledby="Tab3-tab">
            <?php echo $this->load->view('Solicitud/tabsVer/Identificacion/mnuTabIdentificacion',null,TRUE) ?>
            <div class="tab-content">
                    <?php echo $this->load->view('Solicitud/tabsVer/Identificacion/contenidoIdentificacion',null,TRUE) ?>
            </div>
        </div>
        <?php } ?>
    </div>    

    <div class="row">
        <?php if ( isset($isFromPersonal) == true) {?>
        <div class="col-md-12 text-right">
            <a class="btn btn-secondary btn-lg" href="<?php echo site_url('Personal'); ?>">Regresar</a>
        </div>
        <?php } ?>
    </div>
</div>

<!-- JS -->
<script src="<?php echo base_url('assets/js/utils/alerts.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/collectionGenerics.js') ?>"></script>

<script src="<?php echo base_url("assets/vendor/datatable/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/dataTables.responsive.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/responsive.bootstrap4.min.js"); ?>"></script>

<script src="<?php echo base_url('assets/js/views/solicitud/ver/datosGeneralesTab.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/ver/laboral.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/ver/capacitacion.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/ver/identificacion.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/ver/ver.js') ?>"></script>

<script>
    var id = "<?php echo isset($id) ? $id : ''; ?>";    
    var tipoUsuario = "<?php echo $this->session->userdata(SESSIONVAR)['idTipoUsuario']; ?>",
        tUsr = "<?php echo verificaTipoUsuarioSesion(); ?>";
    $(function() {
        objViewVer.init();
    });
</script>
<!-- /JS -->