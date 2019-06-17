<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="<?php echo base_url('assets/js/utils/catalogs.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/views/usuarios/modificar.js'); ?>"></script>
<script>
	var id_Usuario = "<?php echo $user_id;?>";
	var id_UsuarioMSG = "<?php echo $this->lang->line('MSJ11');?>";
</script>
<div class="container">
	<form action="" id="Usuarios_form" name="Usuarios_form" autocomplete="off">
		<br>
		<div class="row">
			<div class="col-md-4">
				<h6 class="borderButtom">CURP</h6>
				<p><?php echo (isset($usuario))? $usuario['CURP'] : ''; ?></p>				
			</div>
			<div class="col-md-4">
				<h6 class="borderButtom">Nombre</h6>
				<p><?php echo (isset($usuario))? $usuario['NOMBRE'] : ''; ?></p>
			</div>
			<div class="col-md-4">
				<h6 class="borderButtom">Apellido paterno</h6>
				<p><?php echo (isset($usuario))? $usuario['PATERNO'] : ''; ?></p>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<h6 class="borderButtom">Apellido materno</h6>
				<p><?php echo (isset($usuario))? $usuario['MATERNO'] : ''; ?></p>
			</div>
			<div class="col-md-4">
				<h6 class="borderButtom">Adscripción</h6>
				<p><?php echo (isset($usuario))? $usuario['ADSCRIPCION'] : ''; ?></p>
			</div>
			<div class="col-md-4">
				<h6 class="borderButtom">Contraseña</h6>
				<p>******</p>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<h6 class="borderButtom">Estatus</h6>
				<p><?php echo (isset($usuario))? $usuario['EstatusUsuario'] : ''; ?></p>
				<div id="MotivoInactivo" style="display:<?php echo (isset($usuario) && strlen($usuario['MotivoInactivo'])>0)? 'block':'none'; ?>">
					<hr/>
					<h6 class="borderButtom">Motivo de cambio estatus a Inactivo</h6>
					<p><?php echo isset($usuario)? trim($usuario['MotivoInactivo']) : ''; ?></p>
				</div>
			</div>
			<div class="col-md-4">
				<h6 class="borderButtom">Correo electrónico</h6>
				<p><?php echo isset($usuario)? $usuario['email'] : ''; ?></p>
			</div>
			<div class="col-md-4">
				<h6 class="borderButtom">Jefe inmediato</h6>
				<p><?php echo isset($usuario)? $usuario['JEFE'] : ''; ?></p>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<h6 class="borderButtom">Tipo de usuario</h6>
				<p><?php echo (isset($usuario))? $usuario['TipoUsuario'] : ''; ?></p>
			</div>			
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6">
						<button type="button" onclick="app.regresar();" class="btn btn-default">Regresar</button>
					</div>
				</div>
			</div>
		</div>
		<br>
	</form>
</div>