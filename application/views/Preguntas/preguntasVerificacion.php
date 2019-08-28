<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/dise.css'); ?>">
<script src="<?php echo base_url('assets/js/utils/dom.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/alerts.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/preguntas/registro.js'); ?>"></script>
<!-- /CSS -->

    <?php if ($cambioContrasena != 0) { ?>
	<div class="row bodyVew">

		<div class="container">
			<br>
            <form id="formContenedor">
			<div class="row">
				<div class="col-md-4">

				</div>
				<div class="col-md-4">
					<center>
						<div class="titulo">
							<h5><strong>Preguntas de verificación</strong></h5>
						</div>
					</center>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">

					<p><span class="clr">*</span>¿Cuál es el nombre de la mamá de tu mamá?</p>
					<input type="text" class="form-control" name="pregunta1" required minlength="3">

				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">

					<p><span class="clr">*</span>¿Cuál es el nombre del papá de tu papá?</p>
					<input type="text" class="form-control" name="pregunta2" required minlength="3">

				</div>

			</div>
			<br>
			<div class="row">

				<div class="col-md-6">

					<p><span class="clr">*</span>¿Cuál es el nombre de tu mamá?</p>
					<input type="text" class="form-control" name="pregunta3" required minlength="3">

				</div>

			</div>

			<br>
			<div class="row">
				<div class="col-md-6">

					<p><span class="clr">*</span>¿Cómo te llamaban en tu familia cuando eras niño?</p>
					<input type="text" class="form-control" name="pregunta4" required minlength="3">

				</div>
			</div>
			<br>
			<div class="row">

				<div class="col-md-6">

					<p><span class="clr">*</span>¿En qué ciudad conociste a tu esposo(a), novio(a)?</p>
					<input type="text" class="form-control" name="pregunta5" required minlength="3">

				</div>

			</div>
			<br>
			<div class="row">

				<div class="col-md-6">

					<p><span class="clr">*</span>¿Quién era el mejor amigo en infancia?</p>
					<input type="text" class="form-control" name="pregunta6" required minlength="3">

				</div>

			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					<p><span class="clr">*</span>¿Porque calle vivías cuando tenías 10 años?</p>
					<input type="text" class="form-control" name="pregunta7" required minlength="3">
				</div>
			</div>
			<br>
			<div class="row">

				<div class="col-md-6">
					<p><span class="clr">*</span>¿Cuál es la fecha de nacimiento de tu hermano mayor?</p>
					<input type="text" class="form-control" name="pregunta8" required minlength="3">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					<p><span class="clr">*</span>¿Cuál es el segundo nombre de tu hijo menor?</p>
					<input type="text" class="form-control" name="pregunta9" required minlength="3">
				</div>

			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					<p><span class="clr">*</span>¿Cuál es el nombre de tu hermano mayor?</p>
					<input type="text" class="form-control" name="pregunta10" required minlength="3">
				</div>


			</div>
			<br>
			<div class="row">
				<div class="col-md-9"></div>
				<div class="col-md-3">
					<button onclick="app.guardar();" type="button" class="btn btn-default" id="guardarPreguntas">Guardar
						respuestas</button>
				</div>
			</div>
			</form>

		</div>

	</div>
	<!-- Modal -->
    <?php } else { ?>

	<!-- Modal -->
	<div class="row justify-content-sm-center">

    <form id="formContenedorVeri">
			<!-- Modal content-->
			<div class="row">
            <div class="col-12">
				<div class="modal-header">
					<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
					<h6>Intento: 1/3 </h6>
                    <br/>
                    <div class="sep1"></div>
					<h4 class="modal-title">Pregunta de seguridad</h4>
				</div>
				<div class="modal-body">
					<p><?php echo $pregunta; ?></p>
                    <input type="hidden" class="form-control" value="<?php echo $idPregunta; ?>" name="idPreguntaSeguridad" >
                    <input type="hidden" class="form-control" value="<?php echo $pregunta; ?>" name="DescPreguntaSeguridad" >
					<input type="text" class="form-control" name="preguntaSeguridad" required>
				</div>
				<div class="modal-footer">
					<button onclick="app.verificar();" type="button" class="btn btn-default" data-dismiss="modal">Verificar</button>
				</div>
                </div>
                </div>
			</div>
            <?php } ?>

<script type="text/javascript">
	var alertMsg = "<?php echo $this->session->flashdata('alertMsg'); ?>";
	if (alertMsg){
      Swal.fire({ type: 'warning', title: 'Atención', html: alertMsg });
    }

	$(function() {
		$("#preguntaUnica").on("click", function (e) {
			e.preventDefault();
			$("#modalPregunta").modal("show");

		});
	});

</script>
