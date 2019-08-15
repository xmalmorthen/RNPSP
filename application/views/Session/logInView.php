<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7 fixed" lang="es-MX"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 fixed" lang="es-MX"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 fixed" lang="es-MX"> <![endif]-->
<!--[if gt IE 8]> -->
<html lang="es-MX">
<!--<![endif]-->
	<head>
		<!-- Basic -->
		<meta charset="iso-8859-1">

		<title><?php echo isset($title) ? $title : ''; ?></title>
		<meta name="keywords" content="<?php echo isset($title) ? $title : ''; ?>" />
		<meta name="description" content="<?php echo isset($title) ? $title : ''; ?>">
		<meta name="Xmal Morthen" content="">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">		
		
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Favicon -->
		<link rel="apple-touch-icon" href="<?php echo base_url('assets/images/favIcons/apple-icon.png') ?>">
		<link rel="shortcut icon" href="<?php echo base_url('assets/images/favIcons/favicon.ico') ?>">

		<!-- VENDOR -->		
		<!-- CSS -->
		<link href="<?php echo base_url('assets/vendor/css/animate.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/vendor/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/vendor/css/style.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/css/customStyles.css') ?>" rel="stylesheet" type="text/css" />		
		<!-- /CSS -->

		<!-- JS -->
		<script src="<?php echo base_url('assets/vendor/js/modernizr.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/jquery.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/moment.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/popper.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/detect.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/fastclick.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/jquery.blockUI.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/jquery.nicescroll.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/plugins/sweetAlert2/sweetalert2.all.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/plugins/LoadingOverlay/v2.1.5/loadingOverlay.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/plugins/jquery-validation/dist/jquery.validate.min.js'); ?>"></script>
		<script src="<?php echo base_url("assets/vendor/plugins/jquery-validation/dist/messages_es.js"); ?>"></script>
		<script src="<?php echo base_url('assets/js/utils/dom.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/utils/guid.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/utils/alerts.js') ?>"></script>

		<!-- /JS -->
		<!-- /VENDOR -->

		<!-- CSS -->
		<link href="<?php echo base_url('assets/css/views/logInView.css') ?>" rel="stylesheet" type="text/css" />
		<!-- /CSS -->

		<!-- JS -->
		<script>
			var base_url = '<?php echo base_url(); ?>',
				site_url = '<?php echo site_url(); ?>',
				uri = {
					uri_string : JSON.parse('<?php echo json_encode($this->uri->uri_string);  ?>'),
					segments : JSON.parse('<?php echo json_encode($this->uri->segments);  ?>'),
					rsegments : JSON.parse('<?php echo json_encode($this->uri->rsegments);  ?>')
				};
		</script>
		<script src="<?php echo base_url('assets/js/utils/compatibilidad.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/masterPage.js'); ?>"></script>
		<!-- /JS -->		
</head>
	<body class="adminbody">
		<div id="main" class="animated fadeIn faster">
			<div class="headerbar">
				<div class="headerbar-left">
					<a href="<?php echo site_url('/'); ?>" class="logo">
						<img alt="Logo" src="<?php echo base_url('assets/images/logo.png') ?>" width="100px" /> 
					</a>
				</div>
				<nav class="navbar-custom">        
					<ul class="list-inline menu-left mb-0">
						<li class="float-left">
							<div class='titleHeader'>
								<span >Sistema Integral de Seguridad Pública</span>
							</div>                
						</li>            
					</ul>
				</nav>
			</div>
    		<div class="content-page">
				<div class="content">
					<br><br>
					<div class="row justify-content-md-center">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
							<div class="card">
								<div class="card-header">
									<h2><i class="fa fa-user-circle-o" aria-hidden="true"></i> Inicio de sesión</h2>
								</div>
								<div class="card-body">
									<form action="<?php echo site_url('usuario/iniciarSesion'); ?>" method="post" data-parsley-validate novalidate>										
										<input type="hidden" id="toGo" name="toGo" value="<?php echo isset($toGo) ? $toGo : ''; ?> ">
										<div class="form-group">
											<label for="userName">Nombre de usuario</label>
											<input type="text" id="nombreUsuario" name="nombreUsuario" class="form-control" data-parsley-trigger="change" autofocus required value="Superadmin">
										</div>
										<div class="form-group">
											<label for="emailAddress">Contraseña</label>
											<input type="password" id="pwd" name="pwd" class="form-control" data-parsley-trigger="change" required value="123456">
										</div>
										<div class="form-group text-right m-b-0">
											<button class="btn btn-default submit">
												Iniciar sesión
											</button>
									</form>
								</div>														
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url('assets/vendor/js/pikeadmin.js'); ?>"></script>
		<!-- JS -->
		<script>
			$.validator.setDefaults({
				ignore: [':disabled'],
				errorClass: "text-danger",
				debug: true
			});

			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 15000
			});


			$(function() {

				$('div#modalPregunta').on('shown.bs.modal', function (e) {
					$('form#formContenedorVeri').find('input[type=text]:first').focus();
                });

				$('.submit').on('click',function(e){					
					e.preventDefault();

					try {
						if (!$('form').valid()){
							throw "Invalid FORM";
						}

						$.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
						
						var callUrl = base_url + "UserSession/ajaxLogIn",
						model = $('form').serialize();

						$.post(callUrl,{
							"<?php echo $this->security->get_csrf_token_name(); ?>" : "<?php echo $this->security->get_csrf_hash(); ?>",
							model: model
						},
						function (data) {					
							if (data.status == true){
								if(data.pregunta.cambioContrasena == '0'){
									$.LoadingOverlay("hide",true);

									$('div#modalPregunta').html(data.pregunta.modal).appendTo("body").modal({backdrop : false, show: true});

									// $('div#modalPregunta').modal();
									// $('div#modalPregunta').appendTo();
								}else{
									window.location.href = site_url+'preguntas';
								}
								
								// return false;
								// if (data.toGo.length > 0) {
								// 	window.location.href = site_url+'preguntas';
								// } else {
								// 	window.location.href = site_url+'preguntas';
								// }
							} else {
								$.LoadingOverlay("hide",true);
								Swal.fire({ type: 'error', title: 'Error', html: data.message ? data.message : 'Error al intentar iniciar sesión, favor de intentarlo.' });
							}
						}).fail(function (err) {
							$.LoadingOverlay("hide",true);
							var msg = err.responseText;
							Swal.fire({ type: 'error', title: 'Error', html: msg });
						}).always(function () {

						});
						
					}					
					catch(err) {
						$.LoadingOverlay("hide",true);
					}
				});
			}); 	

	function verificarRegistro(){

		var form = $('#formContenedorVeri');

		try {
			form.closeAlert({alertType : 'alert-danger'});

			//VALID FORM
			if (!form.valid())
				throw new Error("Formulario incompleto");
		}catch(err) {

			form.setAlert({
				alertType :  'alert-danger',
				dismissible : true,
				header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
				msg : err.message ? err.message : err.statusText
			});

			return null;
		}

		var sendData = $('form#formContenedorVeri').serializeArray();
		sendData.push({
			name: "<?php echo $this->security->get_csrf_token_name(); ?>",
			value: "<?php echo $this->security->get_csrf_hash(); ?>"
		});
		$.ajax({
			dataType: "json",
			method: 'POST',
			url: base_url + 'Preguntas/registroSaveVerifica',
			data: sendData,
			beforeSend: function () {
				$('div#modalPregunta').hide();
				$.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
			},
			success: function (response) {
				
				if (response.status == 'ok') {
					window.location.href=site_url;
				} else if(response.status == false){
					location.reload();
				} else {

					$.LoadingOverlay("hide",true);
					$('div#modalPregunta').show();

					if(response.contadorIntentos != undefined){
						$('small#numeroIntento').html('Intento: '+response.contadorIntentos+'/3');
					}
					
					if (response.status == 'failer') {
						$('div#modalPregunta').hide();
						swal({
								type: 'error',
								title: 'Cuenta de usuario bloqueado'
							}).then(function() {
								location.reload(); 
							});

					}else if(response.status == 'fail'){
						
						// Toast.fire({
						// 	type: 'error',
						// 	title: 'Respuesta no válida'
						// });

						form.setAlert({
							alertType :  'alert-danger',
							dismissible : true,
							header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
							msg : "Respuesta no válida"
						});	

						$('form#formContenedorVeri').find('input[type=text]:first').focus().select();					
						
					}else{
						fnsshowError(response.message);

						$('form#formContenedorVeri').find('input[type=text]:first').focus().select();
					}
				}
			},
			complete: function () {
				//$.LoadingOverlay("hide",true);
			}
		});

	}

	function fnsshowError(message) {
		
		$.each(message, function (index, value) {

			form.setAlert({
				alertType :  'alert-danger',
				dismissible : true,
				header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
				msg : value
			});
			
			// Toast.fire({
			// 	type: 'error',
			// 	title: value
			// });

			// if ($('input[name=' + index + ']').length > 0) {
			// 	$('input[name=' + index + ']').attr('error', true);
			// 	$('input[name=' + index + ']').setError(value);			
			// } else {
			// 	error += value + '<br/>';
			// }
		});

	}

		</script>
		<!-- /JS -->
	</body>

	<div id="modalPregunta" class="modal fade" tabindex="-1" role="dialog">
	
	</div>

</html>