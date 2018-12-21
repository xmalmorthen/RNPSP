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
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.css'); ?>" />
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
				site_url = '<?php echo site_url(); ?>';
		</script>
		<!-- /JS -->	

		<script src="<?php echo base_url('assets/javascripts/utils/compatibilidad.js'); ?>"></script>
		<script src="<?php echo base_url('assets/javascripts/masterPage.js'); ?>"></script>		
	</head>
	<body>
		<noscript><meta http-equiv="refresh" content="0;url=<?php echo site_url('Error/noScript') ?>"></noscript>
		<section class="body">
			<!-- HEADER -->
			<?php echo $this->load->view('/shared/header',NULL,TRUE); ?>
			<!-- /HEADER -->

			<div class="inner-wrapper">
				<!-- MENU -->
				<?php echo $this->load->view('shared/menus/masterPageLateralIzquierdo',NULL,TRUE) ?>
				<!-- /MENU -->

				<!-- HEADER BODY PAGE -->
				<section role="main" class="content-body">
					<header class="page-header">
						<h2><?php echo $this->session->flashdata('titleBody');?></h2>					
						<div class="right-wrapper pull-right">
							<?php echo $this->session->flashdata('breadcrumb'); ?>							
						</div>
					</header>
					<!-- /HEADER BODY PAGE -->

					<!-- BODY -->
					<?php echo isset($body) ? $body : '' ?>
					<!-- BODY -->
				</section>
			</div>			
		</section>
	</body>	
	<!-- Theme Base, Components and Settings -->
	<script src="<?php echo base_url('assets/javascripts/theme.js'); ?>"></script>
	
	<!-- Theme Custom -->
	<script src="<?php echo base_url('assets/javascripts/theme.custom.js'); ?>"></script>
	
	<!-- Theme Initialization Files -->
	<script src="<?php echo base_url('assets/javascripts/theme.init.js'); ?>"></script>
</html>