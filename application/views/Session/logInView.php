<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7 fixed" lang="es-MX"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 fixed" lang="es-MX"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 fixed" lang="es-MX"> <![endif]-->
<!--[if gt IE 8]> -->
<html class="fixed" lang="es-MX">
<!--<![endif]-->
	<head>
		<!-- Basic -->
		<meta charset="iso-8859-1">

		<title><?php echo isset($title) ? $title : ''; ?></title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="<?php echo isset($title) ? $title : ''; ?>">
		<meta name="Xmal Morthen" content="">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">		
		
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" href="<?php echo base_url('assets/img/favIcons/apple-icon.png') ?>">
		<link rel="shortcut icon" href="<?php echo base_url('assets/img/favIcons/favicon.ico') ?>">

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.css'); ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/font-awesome-4.7.0/css/font-awesome.min.css'); ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/magnific-popup/magnific-popup.css'); ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-datepicker/css/datepicker3.css'); ?>" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/stylesheets/theme.css'); ?>" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/stylesheets/skins/default.css'); ?>" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/stylesheets/theme-custom.css'); ?>">

		<!-- Head Libs -->
		<script src="<?php echo base_url('assets/vendor/modernizr/modernizr.js'); ?>"></script>

		<!-- Vendor -->
		<script src="<?php echo base_url('assets/vendor/jquery/jquery.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/nanoscroller/nanoscroller.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/magnific-popup/magnific-popup.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/jquery-placeholder/jquery.placeholder.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/loadingoverlay/loadingoverlay.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert2.all.min.js'); ?>"></script>

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
		<!-- /JS -->	

		<script src="<?php echo base_url('assets/javascripts/utils/compatibilidad.js'); ?>"></script>
		<script src="<?php echo base_url('assets/javascripts/masterPage.js'); ?>"></script>		
	</head>
	<body>
		<noscript><meta http-equiv="refresh" content="0;url=<?php echo site_url('Error/noScript') ?>"></noscript>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="<?php echo base_url(); ?>" class="logo pull-left"><img src="<?php echo base_url('assets/images/logo.png'); ?>" height="54" alt="Gobierno del Estado de Colima" /></a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Iniciar sesión</h2>
					</div>
					<div class="panel-body">
						<form action="<?php echo site_url('usuario/iniciarSesion'); ?>" method="post">
							<div class="form-group mb-lg">
								<label>Nombre de usuario</label>
								<div class="input-group input-group-icon">
									<input name="username" type="text" class="form-control input-lg" autofocus required/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Contraseña</label>
									<a href="pages-recover-password.html" class="pull-right">Contraseña perdida?</a>
								</div>
								<div class="input-group input-group-icon">
									<input name="pwd" type="password" class="form-control input-lg" required/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									&nbsp;
								</div>
								<div class="col-sm-4 text-right">
									<button class="btn btn-default hidden-xs submit">Iniciar sesión</button>
									<button class="btn btn-default btn-block btn-lg visible-xs mt-lg submit">Iniciar sesión</button>
								</div>
							</div>
							<br>
							<p class="text-center">Aún no tienes una cuenta? <a href="<?php echo site_url('usuario/registrarse'); ?>">Regístrate!</a>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- end: page -->
	</body>	
	<!-- Theme Base, Components and Settings -->
	<script src="<?php echo base_url('assets/javascripts/theme.js'); ?>"></script>
	
	<!-- Theme Custom -->
	<script src="<?php echo base_url('assets/javascripts/theme.custom.js'); ?>"></script>
	
	<!-- Theme Initialization Files -->
	<script src="<?php echo base_url('assets/javascripts/theme.init.js'); ?>"></script>

	<!-- JS -->
	<script>
		$(function() {      
			$('.submit').on('click',function(e){
				$.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});
				e.preventDefault();
				
				var callUrl = base_url + "UserSession/ajaxLogIn",
					model = $( this ).serialize();

				$.post(callUrl,{
					model: model
				},
				function (data) {					
					if (data.status == true){
						window.location.href = site_url;
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
			});
		}); 	
	</script>
	<!-- /JS -->
</html>