<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap4.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/responsive.bootstrap4.min.css"); ?>">

<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/datetimepicker/css/daterangepicker.css"); ?>"> 
<!-- /CSS -->
<div class="">
    <div class="row">
        <div class="col-md-12">
                <div class="">
                    <form action="#" autocomplete="off">
                    <div class="row">
                        <div class="col-md-4">
                                <button type="button" onclick="app.nuevoUsuario()" class="btn btn-default btn-lg" id="Nuevo" >Nuevo</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                            <!-- BEGIN TABLE -->
                            <table id="table" class="table display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Estatus</th>
                                        <th>Nombre</th>
                                        <th>Apellido paterno</th>
                                        <th>Apellido materno</th>
                                        <th>Adscripción</th>
                                        <th>Jefe inmediato</th>
                                        <th>Acciones</th> <!-- Ver,Modificar,Dar de baja -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usuarios as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $value['EstatusUsuario']; ?></td>
                                        <td><?php echo $value['NOMBRE']; ?></td>
                                        <td><?php echo $value['PATERNO']; ?></td>
                                        <td><?php echo $value['MATERNO']; ?></td>
                                        <td><?php echo $value['ADSCRIPCION']; ?></td>
                                        <td><?php echo $value['JEFE']; ?></td>
                                        <td>
                                            <!-- <a class='m-2' href="<?php echo site_url("personaCedula/index?id={$value['id']}"); ?>"><i class="fa fa-print fa-2x"></i></a> -->
                                            <a class='m-2' href="<?php echo site_url("Usuarios/Ver?curp={$value['CURP']}"); ?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                                            <a class='m-2' href="<?php echo site_url("Usuarios/Modificar?curp={$value['CURP']}")?>"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                                            <!-- id_EstatusUsuario = 2 => Inactivo -->
                                            <?php if ($value['id_EstatusUsuario'] != 2) {?>
                                                <a class='m-2 borrar' onclick="app.borrarUsuario(<?php echo $value['id']; ?>)" href="#" data-id="<?php echo $value['id']; ?>"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- END TABLE -->
                            </div>
                        </div>                        
                    </form>
                    <br>

                </div>

            </div>
        </div>
    </div>
    
</div>
<!-- JS -->
<script src="<?php echo base_url("assets/vendor/datatable/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/dataTables.responsive.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/responsive.bootstrap4.min.js"); ?>"></script>


<script src="<?php echo base_url('assets/vendor/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/plugins/datetimepicker/js/daterangepicker.js') ?>"></script>

<script src="<?php echo base_url('assets/js/utils/catalogs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/serialized.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/usuarios/index.js'); ?>"></script>
<!-- /JS -->
