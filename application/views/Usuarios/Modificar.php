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
				<span class="clr">*</span> CURP
				<input type="text" class="form-control" value="<?php echo (isset($usuario))? $usuario['CURP'] : ''; ?>" readonly />
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
				<input type="hidden" name="curp" value="<?php echo (isset($usuario))? $usuario['CURP'] : ''; ?>" />
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Nombre
				<input type="text" class="form-control" value="<?php echo (isset($usuario))? $usuario['NOMBRE'] : ''; ?>" readonly />
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Apellido paterno
				<input type="text" class="form-control" value="<?php echo (isset($usuario))? $usuario['PATERNO'] : ''; ?>" readonly />
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<span class="clr">*</span>Apellido materno
				<input type="text" class="form-control" value="<?php echo (isset($usuario))? $usuario['MATERNO'] : ''; ?>" readonly />
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Adscripción
				<input type="text" class="form-control"  value="<?php echo (isset($adscripcion))? $adscripcion['ADSCRIPCION'] : ''; ?>" readonly />
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Contraseña
				<div class="input-group mb-3">
					<input readly type="text" class="form-control" id="pCONTRASENA" readonly value="" />
					<input type="hidden" name="pCONTRASENA" />
					<div class="input-group-append">
						<button onclick="app.generatePassword();" class="btn btn-outline-secondary" type="button">Regenerar contraseña</button>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<span class="clr">*</span>Estatus
				<select id="pID_ESTATUS" onchange="app.mostarMotivo(this.value);" name="pID_ESTATUS" class="form-control" selector="<?php echo isset($usuario)? $usuario['id_EstatusUsuario'] : ''; ?>" />
					{estatus}
					<option value="{id_EstatusUsuario}">{Nombre}</option>
					{/estatus}
				</select>
				<div id="MotivoInactivo" style="display:<?php echo (isset($usuario) && $usuario['id_EstatusUsuario'] == 2)? 'block':'none'; ?>">
					<hr/>
					<div class="form-group">
						<label for="comment"><span class="clr">*</span>Motivo de cambio estatus a Inactivo:</label>
						<textarea name="MotivoInactivo" class="form-control" rows="5" id="comment"><?php echo isset($usuario)? trim($usuario['MotivoInactivo']) : ''; ?></textarea>
					</div> 
				</div>
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Correo electrónico
				<input type="email" id="pCORREO" name="pCORREO" class="form-control" value="<?php echo isset($usuario)? $usuario['email'] : ''; ?>" >
			</div>
			<!-- <div class="col-md-4">
				Jefe inmediato
				<input type="text" class="form-control" id="pID_JEFE" name="pID_JEFE">
			</div> -->
		</div>
		<br>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6">
						<button type="button" onclick="app.confirmar();" class="btn btn-defaul">Guardar</button>
					</div>
					<div class="col-md-6">
						<button type="button" onclick="app.regresar();" class="btn btn-default">Regresar</button>
					</div>
				</div>
			</div>
		</div>
		<br>
	</form>
</div>