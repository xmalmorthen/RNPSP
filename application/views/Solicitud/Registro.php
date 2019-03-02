<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatable/jquery.dataTables.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">
<!-- /CSS -->

<div class="_container d-none">
    <div class="alert alert-success text-right" role="alert">
        <span class="">[ <i class="text-success fa fa-floppy-o fa-2x" aria-hidden="true" ></i> Formulario guardado ] - </span>
        <span class="">[ <i class="text-danger fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Error en formulario ] -</span>
        <span class="">[ <i class="text-warning fa fa-floppy-o fa-2x" aria-hidden="true"></i> Cambios ignorados ]</span>
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
                <?php if (verificaPermiso(15) == true) { ?>
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
        <?php if (verificaPermiso(15) == true) { ?>
        <div class="tab-pane fade" id="Identificacion" role="tabpanel" aria-labelledby="Tab3-tab">
            <?php echo $this->load->view('Solicitud/tabs/Identificacion/mnuTabIdentificacion',null,TRUE) ?>
            <div class="tab-content">
                    <?php echo $this->load->view('Solicitud/tabs/Identificacion/contenidoIdentificacion',null,TRUE) ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- JS -->
<script src="<?php echo base_url("assets/vendor/datatable/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url('assets/vendor/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/collectionGenerics.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/dom.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/populateFormsCatalogs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/alerts.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/dynamicTabs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/indexDB.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/catalogs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/serialized.js') ?>"></script>

<script src="<?php echo base_url('assets/js/views/solicitud/datosGeneralesTab.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/laboralTab.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/capacitacionTab.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/registro.js') ?>"></script>


<?php if (verificaPermiso(15) == true) { ?>
    <script src="<?php echo base_url('assets/js/views/solicitud/identificacionTab.js') ?>"></script>
<?php } ?>

<script type="text/javascript">
    var formMode = "<?php echo $this->session->flashdata('formMode'); ?>",
        id = "<?php echo isset($id) ? $id : ''; ?>";    
</script>
<!-- /JS -->