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
        <button class="btn btn-default m-1" id="Imprimir">Imprimir</button>
        <button class="btn btn-default m-1" id="Replicar">Replicar</button>
    </div>
</div>

<div class="modal fade" id="imprimir" tabindex="-1" role="dialog" aria-labelledby="Imprimir" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="imprimirLabel">Ingresar datos para oficio</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" id="formImprimir" name="formImprimir" autocomplete="off">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="row">
						<div class="col-md-6">
							Número de folio
						</div>
						<div class="col-md-6">
							<input id='noFolio' name='noFolio' type="text" class="form-control" maxlength="20"  required>
						</div>
					</div>
					<br>	
					<div class="row">
						<div class="col-md-6">
							Nombre del encargado del despacho del secretariado ejecutivo del SESESP
						</div>
						<div class="col-md-6">
							<input id='encargadoDespacho' name='encargadoDespacho' type="text" class="form-control" maxlength="60"  required>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6">
							Subcoordinador de sistemas de información SESESP
						</div>
						<div class="col-md-6">
							<input id='subcoordinador' name='subcoordinador' type="text" class="form-control" maxlength="60"  required>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6">
							Nombre de quien emite el oficio
						</div>
						<div class="col-md-6">
							<input id='nombreEmisor' name='nombreEmisor' type="text" class="form-control" maxlength="60"  required>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6">
							Cargo de quien emite el oficio
						</div>
						<div class="col-md-6">
							<input id='cargoEmisor' name='cargoEmisor' type="text" class="form-control" maxlength="60"  required>
						</div>
					</div>
					<br>
					<button class="btn btn-light" id="aceptarFrmImprimir">Aceptar</button>
					<button class="btn btn-light" id="cancelarFrmImprimir" data-dismiss="modal">Cancelar</button>				
				</form>
			</div>
		</div>
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
