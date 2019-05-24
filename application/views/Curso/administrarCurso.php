<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap4.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/responsive.bootstrap4.min.css"); ?>">

<!-- /CSS -->
<div class="row bodyVew">
    <div class="col-md-12">
        <!-- BEGIN TABLE -->
        <table id="tableData" class="d-none table table-striped dt-responsive" style="width:100%">
            <thead>
                <tr>
                    <th><input type="checkbox" name='checkAll' id='checkAll' class='checkAll'></th>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Adscripción</th>
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
                            <a class='m-2' href="<?php echo site_url("Curso/Validar/{$value['options']['id']}/{$value['options']['ads']}") ?>" title='Validar'><i class="fa fa-eye fa-2x"></i></a>
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
        <button class="btn btn-default m-1" id="Imprimir">Imprimir</button>
    </div>
</div>

<!-- JS -->
<script src="<?php echo base_url("assets/vendor/datatable/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/dataTables.responsive.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/responsive.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo base_url('assets/js/views/curso/index.js') ?>"></script>
<script>
    $(function() {
        objViewIndex.init();    
    });
</script>
<!-- /JS -->