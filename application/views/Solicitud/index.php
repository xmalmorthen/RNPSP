<!-- CSS -->
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
                            <th>Folio</th>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Fecha de registro</th>
                            <th>Tipo de solicitud</th>
                            <th>Estatus</th>
                            <th colspan="4" style="text-align: center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    
                        <td>
                            <a href="<?php echo site_url("Solicitud/Ver") ?>"><i class="fa fa-eye"></i></a>
                        </td>
                        <td>
                            <a href="<?php echo site_url("Solicitud/Modificar") ?>"><i class="fa fa-pencil-square-o"></i></a>
                        </td>
                        <td>
                            <a href="#"><i class="fa fa-trash"></i></a>
                        </td>
                        <td>
                            <div class="checkbox">
                            
                                <input type="checkbox"  name="Select" id="">
                                
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     
                        <td>
                            <a href="<?php echo site_url("Solicitud/Ver") ?>"><i class="fa fa-eye"></i></a>
                        </td>
                        <td>
                            <a href="<?php echo site_url("Solicitud/Modificar") ?>"><i class="fa fa-pencil-square-o"></i></a>
                        </td>
                        <td>
                            <a href="#"><i class="fa fa-trash"></i></a>
                        </td>
                         <td>
                            <div class="checkbox">
                            
                                <input type="checkbox"  name="Select" id="">
                                
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      
                        <td>
                            <a href="<?php echo site_url("Solicitud/Ver") ?>"><i class="fa fa-eye"></i></a>
                        </td>
                        <td>
                            <a href="<?php echo site_url("Solicitud/Modificar") ?>"><i class="fa fa-pencil-square-o"></i></a>
                        </td>
                        <td>
                            <a href="#"><i class="fa fa-trash"></i></a>
                        </td>
                         <td>
                            <div class="checkbox">
                            
                                <input type="checkbox"  name="Select" id="">
                                
                            </div>
                        </td>
                        </tr>

                    </tbody>
                </table>
                <!-- END TABLE -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                
                    <button class="btn btn-default" id="Nuevo">Nuevo</button>
                
                </div>

                <div class="col-md-7">
                
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-default" id="Imprimir" disabled>Imprimir</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default" id="Replicar" disabled>Replicar</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <div>
    </div>
        <br>
    </div>

<!-- JS -->
<script src="<?php echo base_url("assets/vendor/datatable/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url('assets/vendor/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/plugins/datetimepicker/js/daterangepicker.js') ?>"></script>
<script>
    
  $(function() {
    $("#Nuevo").on("click",function(e){
        e.preventDefault();
        location.href="<?php echo site_url("Solicitud/Alta");?>";
    })
    
    });

    
</script>
<!-- /JS -->
