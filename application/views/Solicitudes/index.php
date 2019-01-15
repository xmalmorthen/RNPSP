<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/dise.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatable/jquery.dataTables.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/datetimepicker/css/daterangepicker.css"); ?>"> 
<link rel="stylesheet" href="<?php echo base_url('assets/css/views/ejemplosView.css') ?>">
<!-- /CSS -->

             
    <div class="container">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="Administracion-tab" data-toggle="tab" href="#Administracion" role="tab" aria-controls="Administracion" aria-selected="true">Administración</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="darBaja-tab" data-toggle="tab" href="#darBaja" role="tab" aria-controls="darBaja" aria-selected="false">Dar de baja</a>
            </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="Capacitacion_seguridad_publica" role="tabpanel" aria-labelledby="Capacitacion_seguridad_publica-tab">
        <form action="#" autocomplete="off">

            <br>
            <div class="row">
                <div class="col-md-12">
                <!-- BEGIN TABLE -->
                <table id="table" class="table display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Estatus</th>
                            <th colspan="4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="<?php echo site_url("personaCedula/datosPersonalestab") ?>"><i class="fa fa-print"></i></a>
                        </td>
                        <td>
                            <a href="<?php echo site_url("personaCedula/datosPersonalestab") ?>"><i class="fa fa-eye"></i></a>
                        </td>
                        <td>
                            <a href="<?php echo site_url("personaCedula/datosPersonalestab") ?>"><i class="fa fa-pencil-square-o"></i></a>
                        </td>
                        <td>
                            <a href="#"><i class="fa fa-trash"></i></a>
                        </td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="<?php echo site_url("personaCedula/datosPersonalestab") ?>"><i class="fa fa-print"></i></a>
                        </td>
                        <td>
                            <a href="<?php echo site_url("personaCedula/datosPersonalestab") ?>"><i class="fa fa-eye"></i></a>
                        </td>
                        <td>
                            <a href="<?php echo site_url("personaCedula/datosPersonalestab") ?>"><i class="fa fa-pencil-square-o"></i></a>
                        </td>
                        <td>
                            <a href="#"><i class="fa fa-trash"></i></a>
                        </td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="<?php echo site_url("personaCedula/datosPersonalestab") ?>"><i class="fa fa-print"></i></a>
                        </td>
                        <td>
                            <a href="<?php echo site_url("personaCedula/datosPersonalestab") ?>"><i class="fa fa-eye"></i></a>
                        </td>
                        <td>
                            <a href="<?php echo site_url("personaCedula/datosPersonalestab") ?>"><i class="fa fa-pencil-square-o"></i></a>
                        </td>
                        <td>
                            <a href="#"><i class="fa fa-trash"></i></a>
                        </td>
                        </tr>
                        
                    </tbody>
                </table>
                <!-- END TABLE -->
                </div>
            </div>
        <button class="btn btn-default" id="Nuevo">Nuevo</button>
        </form>
        <div>
    </div>
        <br>
        
    </div>

<!-- JS -->
<script src="<?php echo base_url("assets/vendor/datatable/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url('assets/vendor/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/plugins/datetimepicker/js/daterangepicker.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/ejemplosView.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/catalogs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/serialized.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script>
  $(function() {
        objView.init();
    });

    $("#Nuevo").on("click",function(e){
        e.preventDefault();
        window.location.href="<?php echo site_url("personaCedula/datosPersonalestab");?>";
    })
</script>
<!-- /JS -->