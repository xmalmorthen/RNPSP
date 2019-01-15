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
    <div class="row">
        <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="AdministrarUsuario-tab" data-toggle="tab" href="#AdministrarUsuario" role="tab" aria-controls="AdministrarUsuario" aria-selected="false">Administrar usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="VerDetalle-tab" data-toggle="tab" href="#VerDetalle" role="tab" aria-controls="VerDetalle" aria-selected="false">Ver detalle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="ModificarUsuario-tab" data-toggle="tab" href="#ModificarUsuario" role="tab" aria-controls="ModificarUsuario" aria-selected="true">Modificar usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="RegistrarUsuario-tab" data-toggle="tab" href="#RegistrarUsuario" role="tab" aria-controls="RegistrarUsuario" aria-selected="false">Registrar usuario</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="AdministrarUsuario" role="tabpanel" aria-labelledby="AdministrarUsuario-tab">
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
                                                <th colspan="3">Acciones</th> <!-- Ver,Modificar,Dar de baja -->
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

                                                <td><i class="fa fa-eye" aria-hidden="true"></i></td>
                                                <td><i class="fa fa-pencil-square-o"></i></td>
                                                <td><i class="fa fa-trash-o" aria-hidden="true"></i></td>
                                            </tr>
                                      </tbody>
                                    </table>
                                    <!-- END TABLE -->
                                  </div>
                                </div>
                                <div class="row">       
                                <div class="col-md-5"></div>          
                                    <div class="col-md-4">
                                        <button class="btn btn-light">Nuevo</button>
                                    </div>
                                </div>
                            </form>
                            <br>
             
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="ModificarUsuario" role="tabpanel" aria-labelledby="ModificarUsuario-tab">
                        <div class="container">
                            <form action="#" autocomplete="off">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span> CURP
                                    <input type="text" class="form-control" id="pCURP" name="pCURP">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Nombre
                                    <input type="text" class="form-control" id="pNOMBRE" name="pNOMBRE">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Apellido paterno
                                    <input type="text" class="form-control" id="pPATERNO" name="pPATERNO">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Apellido materno
                                    <input type="text" class="form-control" id="pMATERNO" name="pMATERNO">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Adscripción
                                    <input type="text" class="form-control" id="pID_ADSCRIPCION" name="pID_ADSCRIPCION">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Contraseña
                                    <input type="text" class="form-control" id="pCONTRASENA" name="pCONTRASENA">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Tipo de usuario
                                    <select id="pTIPO_USUARIO" name="pTIPO_USUARIO" class="form-control"></select>
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Correo electrónico
                                    <input type="email" id="pCORREO" name="pCORREO" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-light">Guardar</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-light">Regresar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="VerDetalle" role="tabpanel" aria-labelledby="VerDetalle-tab">
                        <div class="container">
                            <form action="#" autocomplete="off">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span> CURP
                                    <input type="text" class="form-control" id="pCURP" name="pCURP">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Nombre
                                    <input type="text" class="form-control" id="pNOMBRE" name="pNOMBRE">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Apellido paterno
                                    <input type="text" class="form-control" id="pPATERNO" name="pPATERNO">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Apellido materno
                                    <input type="text" class="form-control" id="pMATERNO" name="pMATERNO">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Adscripción
                                    <input type="text" class="form-control" id="pID_ADSCRIPCION" name="pID_ADSCRIPCION">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Contraseña
                                    <input type="text" class="form-control" id="pCONTRASENA" name="pCONTRASENA">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Tipo de usuario
                                    <select id="pTIPO_USUARIO" name="pTIPO_USUARIO" class="form-control"></select>
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Correo electrónico
                                    <input type="text" id="pCORREO" name="pCORREO" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-light">Modificar</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-light">Regresar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </form>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="RegistrarUsuario" role="tabpanel" aria-labelledby="RegistrarUsuario-tab">
                        <form action="#" autocomplete="off">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span> CURP
                                    <input type="text" class="form-control" id="pCURP" name="pCURP">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Nombre
                                    <input type="text" class="form-control" id="pNOMBRE" name="pNOMBRE">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Apellido paterno
                                    <input type="text" class="form-control" id="pPATERNO" name="pPATERNO">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Apellido materno
                                    <input type="text" class="form-control" id="pMATERNO" name="pMATERNO">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Adscripción
                                    <input type="text" class="form-control" id="pID_ADSCRIPCION" name="pID_ADSCRIPCION">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Contraseña
                                    <input type="text" class="form-control" id="pCONTRASENA" name="pCONTRASENA">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Tipo de usuario
                                    <select id="pTIPO_USUARIO" name="pTIPO_USUARIO" class="form-control"></select>
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Correo electrónico
                                    <input type="email" id="pCORREO" name="pCORREO" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-light">Guardar</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-light">Regresar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</script>
<!-- /JS -->