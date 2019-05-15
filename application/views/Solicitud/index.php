<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap4.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/responsive.bootstrap4.min.css"); ?>">

<!-- /CSS -->

<div class="row bodyVew">
    <div class="col-md-12 mb-4">
        <button class="btn btn-default btn-lg" id="Nuevo"> Nuevo </button>
    </div>
	
    <div class="col-md-12">
        <!-- BEGIN TABLE -->
        <table id="tableAdministrarsolicitud" class="d-none table table-striped dt-responsive" style="width:100%">
            <thead>
                <tr>
                    <th><input type="checkbox" name='checkAll' id='checkAll' class='checkAll'></th>
                    <th>Folio</th>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Fecha de registro</th>
                    <th>Tipo de solicitud</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $key => $value) { ?>
                    <tr>
                        <td>
                            <div class="checkbox">
                                <input type="checkbox" class="checkItem" data-idReg="<?php echo $value['options']['id']; ?>">
                            </div>
                        </td>
                <?php foreach ($value as $item => $valueItem) {
                    if (!is_array($valueItem)) {?>
                        <td><?php echo $valueItem ? $valueItem : ''; ?></td>
                <?php }} ?>
                        <td>
                            <a class='m-2' href="<?php echo site_url("Solicitud/Ver/{$value['options']['id']}") ?>" title='Ver'><i class="fa fa-eye fa-2x"></i></a>
                            <a class='m-2' href="<?php echo site_url("Solicitud/Modificar/{$value['options']['id']}") ?>" title='Modificar'><i class="fa fa-pencil-square-o fa-2x"></i></a>
                            <a class='m-2' href="<?php echo site_url("Solicitud/Eliminar/{$value['options']['id']}") ?>" title='Eliminar'><i class="fa fa-trash fa-2x"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- END TABLE -->
    </div>
</div>
<div class="row pull-right mt-2">
    <div class="col-md-12">
        <button class="btn btn-default m-1" id="Imprimir" data-toggle="modal" data-target="#imprimir">Imprimir</button>
        <button class="btn btn-default m-1" id="Replicar">Replicar</button>
    </div>
</div>

<!-- JS -->
<script src="<?php echo base_url("assets/vendor/datatable/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/dataTables.responsive.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/responsive.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/index.js') ?>"></script>
<script>
    $(function() {
        objViewIndex.init();    
    });
</script>
<!-- /JS -->
