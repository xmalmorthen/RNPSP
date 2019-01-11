<?php



?>

<!-- CSS -->

<link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatable/jquery.dataTables.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/datetimepicker/css/daterangepicker.css"); ?>"> 
<link rel="stylesheet" href="<?php echo base_url('assets/css/views/ejemplosView.css') ?>">
<!-- /CSS -->



<div class="container">

<div class="row">
    <div class="col-md-12">
        <!-- TABS -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="Busqueda_persona_dinamica-tab" data-toggle="tab" href="#Busqueda_persona_dinamica" role="tab" aria-controls="Busqueda_persona_dinamica" aria-selected="true">Personal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Busqueda_persona_dinamica_adscripcion-tab" data-toggle="tab" href="#Busqueda_persona_dinamica_adscripcion" role="tab" aria-controls="Busqueda_persona_dinamica_adscripcion" aria-selected="false">Adscripción</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Busqueda_persona_dinamica_fotografia-tab" data-toggle="tab" href="#Busqueda_persona_dinamica_fotografia" role="tab" aria-controls="Busqueda_persona_dinamica_fotografia" aria-selected="false">Fotografias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Informacion_persona-tab" data-toggle="tab" href="#Informacion_persona" role="tab" aria-controls="Informacion_persona" aria-selected="false">Informacion de la persona</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Baja_adscripcion-tab" data-toggle="tab" href="#Baja_adscripcion" role="tab" aria-controls="Baja_adscripcion" aria-selected="false">Baja de adscripción</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Busqueda_persona_dinamica" role="tabpanel" aria-labelledby="Busqueda_persona_dinamica-tab">
               
                <div class="container">
                <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <strong class="titulo">Busqueda de persona dinamica</strong>
                        </div>
                    </div>
                        <br>
                        <br>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-4">
                            <center><strong>Personales</strong></center>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                                <div class="col-md-4">
                                    CURP
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    Nombre
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    Apellido paterno
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    Apellido materno
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    CUIP
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    RFC
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    NCP
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    Estatus
                                    <select name="" id="" class="form-control"></select>
                                </div>
                            </div>
                            <br>
                            <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                </div>
            </div>
            <div class="tab-pane fade" id="Busqueda_persona_dinamica_adscripcion" role="tabpanel" aria-labelledby="Busqueda_persona_dinamica_adscripcion-tab">
                <div class="container">              
                    <div class="Content">
                        <br>                  
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <strong class="titulo">Busqueda persona dinamica</strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <center><strong>Adscripción</strong></center>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Dependencia
                                <select name="" id="" class="form-control"></select>
                            </div>
                            <div class="col-md-4">
                                Corporación
                                <select name="" id="" class="form-control"></select>
                            </div>
                            <div class="col-md-4">
                                Puesto
                                <select name="" id="" class="form-control"></select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Entidad
                                <select name="" id="" class="form-control"></select>
                            </div>
                            <div class="col-md-4">
                                Municipio o delegación
                                <select name="" id="" class="form-control"></select>
                            </div>
                        </div>
                        <br>
                        <div class="titulo">
                            <strong>Rango de fechas de ingreso</strong>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Fecha de inicio
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-4">
                                Fecha final
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="titulo">
                            <strong>Rango de fechas de captura</strong>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Fecha de inicio
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-4">
                                Fecha final 
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="titulo">
                            <strong>Rango de fechas de actualización</strong>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Fecha de inicio
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-4">
                                Fecha final
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="titulo">
                            <strong>Resultado</strong>
                        </div>
                        <br>
                        <table id="table" class="table display">
                            <thead>
                                <tr>
                                    <th>CUIP</th>
                                    <th>Apellido paterno</th>
                                    <th>Apellido materno</th>
                                    <th>Nombre</th>
                                    <th>Estatus</th>
                                </tr>
                            </thead>
                            <tbody>                       
                            </tbody>
                        </table>
                    </div>
                </div>
                <button class="btn btn-default" id="Informacion">Información de la persona</button>
                <button class="btn btn-default" id="Fotografia">Ver fotografías</button>
                <br>
                <br>
                <input type="button" name="previous" class="previous action-button-previous" value="Anterior" style="height:40px;"/>
                <input type="button" name="next" class="action-button" style="height:40px;" value="Buscar"/>
            </div>
            <div class="tab-pane fade" id="Busqueda_persona_dinamica_fotografia" role="tabpanel" aria-labelledby="Busqueda_persona_dinamica_fotografia-tab">
                <div class="container">              
                    <div class="Content">
                        <br>                  
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <strong class="titulo">Busqueda personaa dinamica</strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <center><strong>Fotografia</strong></center>
                            </div>
                        </div>
                        <br>
                        <br>  
                        <div class="row">
                            <div class="col-md-4">
                                Perfil izquierdo
                                <img src="<?php echo base_url(); ?>assets/img/avatar.png" style="height:150px; width:150px;" alt="">
                            </div>
                            <div class="col-md-4">
                                <div style="position:top; ">Frente</div>
                                <img src="<?php echo base_url(); ?>assets/img/avatar.png" alt="" style="height:150px; width:150px;">
                            </div>
                            <div class="col-md-4">
                                <div style="position:top;">Perfil derecho</div>
                                <img src="<?php echo base_url(); ?>assets/img/avatar.png" alt="" style="height:150px; width:150px;">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-3">
                                Firma
                                <img src="<?php echo base_url(); ?>assets/img/avatar.png" alt="" style="height:150px; width:150px;">
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                Huella
                                <img src="<?php echo base_url(); ?>assets/img/avatar.png" alt="" style="height:150px; width:150px;">
                            </div>
                            <div class="col-md-2"> </div>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous" value="Anterior" style="height:40px;"/>    
                </div>
            </div>
            <div class="tab-pane fade" id="Informacion_persona" role="tabpanel" aria-labelledby="Informacion_persona-tab">
                <div class="container">              
                    <div class="Content">
                        <br>                  
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <strong class="titulo">Informacion de la persona</strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                RFC
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-4">
                                CUIP
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-4">
                                Nombre:
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Apellido paterno
                                <input type="text" class="form-control">
                            </div>            
                            <div class="col-md-4">
                                Apellido materno
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-4">
                                Estatus
                                <select name="" id="" class="form-control"></select>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="titulo">
                                    <strong>Operaciones</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-1">
                                        <button class="btn btn-light">a.</button>
                                    </div>
                                    <div class="col-md-11" style="text-align: left;margin-top: 10px;">
                                        Consultar a detalle de la información de la persona
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-1">
                                        <button class="btn btn-light">b.</button>
                                    </div>
                                    <div class="col-md-11" style="text-align: left;margin-top: 10px;">
                                        Actualización de la información de la persona (Agregar)
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-1">
                                        <button class="btn btn-light">c.</button>
                                    </div>
                                    <div class="col-md-11" style="text-align: left;margin-top: 10px;">
                                        Modificación de la información de la persona
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-1">
                                        <button class="btn btn-light next">d.</button>
                                    </div>
                                    <div class="col-md-11" style="text-align: left;margin-top: 10px;">
                                        Baja de la persona
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-1">
                                        <button class="btn btn-light">e.</button>
                                    </div>
                                    <div class="col-md-11" style="text-align: left;margin-top: 10px;">
                                        Impresión de la cédula de la persona
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-1">
                                        <button class="btn btn-light">f.</button>
                                    </div>
                                    <div class="col-md-11" style="text-align: left;margin-top: 10px;">
                                        Reingreso. Activación de la persona
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-1">
                                        <button class="btn btn-light">g.</button>
                                    </div>
                                    <div class="col-md-11" style="text-align: left;margin-top: 10px;">
                                        Constancia
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-1">
                                        <button class="btn btn-light">h.</button>
                                    </div>
                                    <div class="col-md-11" style="text-align: left;margin-top: 10px;">
                                        Eliminación
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-1">
                                        <button class="btn btn-light">i.</button>
                                    </div>
                                    <div class="col-md-11" style="text-align: left;margin-top: 10px;">
                                        Hoja de servicio
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous" style="width:220px; height:40px;" value="Anterior" style="height:40px;"/>                        
                </div>
            </div>
            <div class="tab-pane fade" id="Baja_adscripcion" role="tabpanel" aria-labelledby="Baja_adscripcion-tab">
                <div class="container">              
                    <div class="Content">
                        <br>                  
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <strong class="titulo">Informacion de la persona</strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="titulo">
                                    <strong>Baja de adscripción</strong>
                                </div>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Nombre
                                <input type="text" class="form-control">
                            
                            </div>
                            <div class="col-md-4">
                                Apellido paterno
                                <input type="text" class="form-control">
                            
                            </div>
                            <div class="col-md-4">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN - TAB3 -->
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
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script>
	$(function() {
        objView.init();
    });
</script>
<!-- /JS -->