<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">
<script src="<?php echo base_url('assets/js/utils/catalogs.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/views/usuarios/modificar.js'); ?>"></script>
<div class="container">
	<form action="" id="Usuarios_form" name="Usuarios_form" autocomplete="off">
		<br>
		<div class="row">
			<div class="col-md-4">
				<span class="clr">*</span> CURP
				<input type="text" class="form-control" id="pCURP" name="pCURP"  minlength="18" maxlength="20">
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Nombre
				<input type="text" class="form-control" id="pNOMBRE" name="pNOMBRE"  minlength="2" maxlength="30">
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Apellido paterno
				<input type="text" class="form-control" id="pPATERNO" name="pPATERNO"  minlength="1" maxlength="30">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<span class="clr">*</span>Apellido materno
				<input type="text" class="form-control" id="pMATERNO" name="pMATERNO"  minlength="1" maxlength="30">
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Adscripción
				<select class="form-control" id="pID_ADSCRIPCION" name="pID_ADSCRIPCION"  >
				 {adscripcion}
				 	<option value="{ID_ADSCRIPCION}">{ADSCRIPCION}</option>
				 {/adscripcion}
				 </select>
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Contraseña
				<input readly type="text" class="form-control" id="pCONTRASENA" readonly />
				<input type="hidden" name="pCONTRASENA" />
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<span class="clr">*</span>Tipo de usuario
				<select id="pTIPO_USUARIO" name="pTIPO_USUARIO" class="form-control" >
					{tiposUsuario}
					<option value="{id}">{description}</option>
					{/tiposUsuario}
				</select>
			</div>
			<div class="col-md-4">
				<span class="clr">*</span>Correo electrónico
				<input type="email" id="pCORREO" name="pCORREO" class="form-control" >
			</div>
			<div class="col-md-4">
				Jefe inmediato
				<input type="text" class="form-control" id="pID_JEFE" name="pID_JEFE">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6">
						<button type="button" onclick="app.guardar();" class="btn btn-defaul">Guardar</button>
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