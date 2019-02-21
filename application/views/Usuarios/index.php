<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatable/jquery.dataTables.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/datetimepicker/css/daterangepicker.css"); ?>"> 
<!-- /CSS -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="container">
                    <form action="#" autocomplete="off">
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
                                {usuarios}
                                    <tr>
                                    <td>{EstatusUsuario}</td>
                                        <td>{NOMBRE}</td>
                                        <td>{PATERNO}</td>
                                        <td>{MATERNO}</td>
                                        <td>{ADSCRIPCION}</td>
                                        <td>{JEFE}</td>
                                        <td>
                                            <a href="<?php echo site_url('personaCedula/index?id='); ?>{id}"><i class="fa fa-print"></i></a>
                                            <a href="<?php echo site_url('Usuarios/Ver?id='); ?>{id}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="<?php echo site_url('Usuarios/Modificar?id=')?>{id}"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="<?php echo site_url('Usuarios/darBaja?id=')?>{id}"<i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    {/usuarios}
                                </tbody>
                            </table>
                            <!-- END TABLE -->
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                                
                                <button type="button" onclick="app.nuevoUsuario()" class="btn btn-default" id="Nuevo" >Nuevo</button>
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
<script src="<?php echo base_url('assets/vendor/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/plugins/datetimepicker/js/daterangepicker.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/catalogs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/serialized.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/usuarios/index.js'); ?>"></script>
<!-- /JS -->
