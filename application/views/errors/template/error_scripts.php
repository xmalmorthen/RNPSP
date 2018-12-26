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
		<link href="<?php echo base_url('assets/vendor/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/vendor/css/style.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/css/customStyles.css') ?>" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/views/errorsView.css'); ?>">
		<!-- /CSS -->

		<!-- /VENDOR -->
</head>
	<body class="adminbody">
		<div id="main">
			<div class="content">
				<div class="container-fluid">
					<div class="headerbar">
						<div class="row">
							<div class="col-sm-4">
								<a href="<?php echo site_url('/'); ?>">
									<img alt="Logo" src="<?php echo base_url('assets/images/logo.png') ?>" width="200px" /> 
								</a>
							</div>
							<div class="col-sm-8 title">
								Sistema Integral de Seguridad Pública
							</div>
						</div>
					</div>
					<br><br>
					<section class="body-error">
						<div class="center-error pt-5">
							<div class="row">
								<div class="col-sm-12">
									<div class="main-error mb-xlg">
										<h2 class="error-code text-dark text-center text-semibold m-none">403 <i class="fa fa-file"></i></h2>								
										<p class="error-explanation text-center">Su navegador no soporta JavaScript!</p>
									</div>
								</div>            
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</body>
</html>