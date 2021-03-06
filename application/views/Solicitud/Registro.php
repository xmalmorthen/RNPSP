<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap4.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/responsive.bootstrap4.min.css"); ?>">

<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">
<!-- /CSS -->

<div class="_container d-none tabsContainer">
    <div class="alert alert-success text-right iconografia" role="alert">
        <span class="">[ <i class="text-success fa fa-floppy-o fa-2x" aria-hidden="true" ></i> Formulario guardado ] - </span>
        <span class="">[ <i class="text-danger fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Error en formulario ] -</span>
        <span class="">[ <i class="text-warning fa fa-floppy-o fa-2x" aria-hidden="true"></i> Cambios ignorados ]</span>
    </div>
    <!-- <div class="text-right"">
        <button class="btn btn-warning btn-lg validarVoz">Validar Solicitud</button>
        <button class="btn btn-success btn-lg ml-2 d-none validarReplicar">Replicar Solicitud</button>
    </div> -->

    <div id='frmAlertSumary' class="alert alert-danger alert-dismissible fade show d-none" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span id='frmAlertSumaryMsg'></span>
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
                <?php if (verificaTipoUsuarioSesion() == 1) { // solo usurios del c4 y superadministrador?>
                <li class="nav-item">
                    <a class="nav-link" id="Identificacion-tab" data-toggle="tab" href="#Identificacion" role="tab" aria-controls="Identificacion" aria-selected="false" data-finish='false'>Identificación</a>
                </li>
                <?php } ?>
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
        <?php if (verificaTipoUsuarioSesion() == 1) { // solo usurios del c4 y superadministrador?>
        <div class="tab-pane fade" id="Identificacion" role="tabpanel" aria-labelledby="Tab3-tab">
            <?php echo $this->load->view('Solicitud/tabs/Identificacion/mnuTabIdentificacion',null,TRUE) ?>
            <div class="tab-content">
                    <?php echo $this->load->view('Solicitud/tabs/Identificacion/contenidoIdentificacion',null,TRUE) ?>
            </div>
        </div>
        <?php } ?>
    </div>

    <!-- <div class="text-right"">
        <button class="btn btn-warning btn-lg validarVoz">Validar Solicitud</button>
        <button class="btn btn-success btn-lg ml-2 d-none validarReplicar">Replicar Solicitud</button>
    </div> -->
    
</div>

<!-- JS -->
<script src="<?php echo base_url("assets/vendor/datatable/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/dataTables.responsive.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/responsive.bootstrap4.min.js"); ?>"></script>

<script src="<?php echo base_url('assets/vendor/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/collectionGenerics.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/dom.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/populateFormsCatalogs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/alerts.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/dynamicTabs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/indexDB.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/catalogs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/serialized.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/validaRFC.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/validaCveElector.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/imageExists.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/groupBy.js') ?>"></script>

<script src="<?php echo base_url('assets/js/views/solicitud/datosGeneralesTab.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/laboralTab.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/capacitacionTab.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/registro.js') ?>"></script>


<?php if (verificaTipoUsuarioSesion() == 1) { // solo usurios del c4 y superadministrador?>
    <script src="<?php echo base_url('assets/js/views/solicitud/identificacionTab.js') ?>"></script>
<?php } ?>

<script type="text/javascript">
    var formMode = "<?php echo $this->session->flashdata('formMode'); ?>",
        selectPrincipalTabId = "<?php echo $this->session->flashdata('selectPrincipalTabId'); ?>",
        selectSubTabId = "<?php echo $this->session->flashdata('selectSubTabId'); ?>",
        id = "<?php echo isset($id) ? $id : ''; ?>",
        tipoUsuario = "<?php echo $this->session->userdata(SESSIONVAR)['idTipoUsuario']; ?>",
        tUsr = "<?php echo verificaTipoUsuarioSesion(); ?>";
</script>
<!-- /JS -->