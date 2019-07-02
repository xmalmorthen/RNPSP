<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">
<script src="<?php echo base_url('assets/vendor/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/alerts.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/utils/catalogs.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/views/usuarios/registro.js'); ?>"></script>
<div class="_container">
	<form action="" id="Usuarios_form" name="Usuarios_form" autocomplete="off">
		<br>
		<div class="row">
			<div class="col-md-4">
				<span class="clr">*</span> CURP
				<input type="text" class="form-control" id="pCURP" name="pCURP"  minlength="18" maxlength="20" required>
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Nombre
				<input type="text" class="form-control" id="pNOMBRE" name="pNOMBRE"  minlength="2" maxlength="30" required>
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Apellido paterno
				<input type="text" class="form-control" id="pPATERNO" name="pPATERNO"  minlength="1" maxlength="30" required>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<span class="clr">*</span>Apellido materno
				<input type="text" class="form-control" id="pMATERNO" name="pMATERNO"  minlength="1" maxlength="30" required>
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Adscripción
				<select id="pID_ADSCRIPCION" name="pID_ADSCRIPCION" class="form-control" data-error="#err_pID_ADSCRIPCION" required>
					<option disabled selected value>Seleccione una opción</option>
					{adscripcion}
					<option value="{ID_ADSCRIPCION}">{ADSCRIPCION}</option>
					{/adscripcion}
				</select>
				<span id="err_pID_ADSCRIPCION"></span>
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
				<span class="clr">*</span>Tipo de usuario
				<select id="pTIPO_USUARIO" name="pTIPO_USUARIO" class="form-control" data-error="#err_pTIPO_USUARIO" required>
					<option disabled selected value>Seleccione una opción</option>
					{tiposUsuario}
					<option value="{id}">{description}</option>
					{/tiposUsuario}
				</select>
				<span id="err_pTIPO_USUARIO"></span>
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Correo electrónico
				<input type="email" id="pCORREO" name="pCORREO" class="form-control" required>
			</div>
			<div class="col-md-4">
				Jefe inmediato
				<input type="text" class="form-control" id="pID_JEFE" name="pID_JEFE">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12 text-center">
				<button type="button" onclick="app.guardar();" class="btn btn-defaul btn-lg mr-2">Guardar</button>
				<button type="button" onclick="app.regresar();" class="btn btn-default btn-lg">Regresar</button>
			</div>
		</div>
		<br>
	</form>
</div>