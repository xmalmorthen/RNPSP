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
				<input type="text" class="form-control" id="pCURP" name="pCURP"  readonly tabindex="-1">
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Nombre
				<input type="text" class="form-control" id="pNOMBRE" name="pNOMBRE" readonly tabindex="-1">
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Apellido paterno
				<input type="text" class="form-control" id="pPATERNO" name="pPATERNO"  readonly tabindex="-1">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<span class="clr">*</span>Apellido materno
				<input type="text" class="form-control" id="pMATERNO" name="pMATERNO"  readonly tabindex="-1">
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Adscripción
				<input type="text" class="form-control" id="pADSCRIPCION" name="pADSCRIPCION" readonly tabindex="-1" />
				<input type="hidden" id="pID_ADSCRIPCION" name="pID_ADSCRIPCION" />
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Contraseña
				<div class="input-group mb-3">
					<input readly type="text" class="form-control" id="pCONTRASENA" readonly value="" tabindex="-1" />
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
				<button type="button" onclick="app.confirmar();" class="btn btn-defaul btn-lg mr-2">Guardar</button>
				<button type="button" onclick="app.regresar();" class="btn btn-default btn-lg">Regresar</button>
			</div>
		</div>
		<br>
	</form>
</div>