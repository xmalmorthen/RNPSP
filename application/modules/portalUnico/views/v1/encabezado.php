<!DOCTYPE html>
<html ng-app="PortalUnico">
  <head >
    <meta name="google-site-verification" content="vgE7xTPnRDI9JNHuGHmNQeU55Yr58j9hwq9Wk06R8qk" />  
    <title>
      <?php 
            if ($Dependencia['id_dependencia'] == "10200") { echo "Gobierno del Estado de Colima";
            }elseif (isset($Dependencia)) { echo $Dependencia['dependencia'];
            }else{ echo ""; }
            
      ?>
    </title>
    <link rel="SHORTCUT ICON" href="<?php echo base_url()?>img/favicon.ico" rel="icon" type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
      if(isset($Bootstrap)){
        if($Bootstrap){
          ?>
          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="<?php echo base_url(); ?>css/bs4/bootstrap.min.css">        
          <?php
        }
      }
    ?>        
    <!-- Customcss -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bs4/layout.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <?php if ($archivos != '0' && strlen($archivos) > 0) { echo utf8_decode(base64_decode($archivos)) ; }  ?>
  </head>
  <body data-url="<?php echo base_url(); ?>">
  <!-- nav container -->
    <div class="container-fluid navbar-container-pu op"> 
      <?php echo $navbar; ?>
      
    </div>
 