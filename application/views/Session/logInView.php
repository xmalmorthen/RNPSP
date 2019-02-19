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
											<input type="text" id="nombreUsuario" name="nombreUsuario" class="form-control" data-parsley-trigger="change" autofocus required value="admin@admin.com">
										</div>
										<div class="form-group">
											<label for="emailAddress">Contraseña</label>
											<input type="password" id="pwd" name="pwd" class="form-control" data-parsley-trigger="change" required value="password">
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

			$(function() {
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
							model: model
						},
						function (data) {					
							if (data.status == true){
								if (data.toGo.length > 0) {
									window.location.href = data.toGo;
								} else {
									window.location.href = site_url;
								}
							} else {
								$.LoadingOverlay("hide");
								swal({ type: 'error', title: 'Error', html: data.message });
							}
						}).fail(function (err) {
							$.LoadingOverlay("hide");
							var msg = err.responseText;
							swal({ type: 'error', title: 'Error', html: msg });
						}).always(function () {

						});
						
					}					
					catch(err) {
						$.LoadingOverlay("hide");
					}
				});
			}); 	
		</script>
		<!-- /JS -->
	</body>
</html>