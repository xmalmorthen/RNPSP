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
                    <a class="nav-link active" id="mediaFiliacion-tab" data-toggle="tab" href="#mediaFiliacion" role="tab" aria-controls="mediaFiliacion" aria-selected="false">Media filiación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="Senas_particulares-tab" data-toggle="tab" href="#Senas_particulares" role="tab" aria-controls="Senas_particulares" aria-selected="false">Señas particulares</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Ficha_fotografica-tab" data-toggle="tab" href="#Ficha_fotografica" role="tab" aria-controls="Ficha_fotografica" aria-selected="false">Ficha fotográfica</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Registro_decadactilar-tab" data-toggle="tab" href="#Registro_decadactilar" role="tab" aria-controls="Registro_decadactilar" aria-selected="true">Registro decadactilar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Digitalizacion_de_documento-tab" data-toggle="tab" href="#Digitalizacion_de_documento" role="tab" aria-controls="Digitalizacion_de_documento" aria-selected="false">Digitalización de documento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Identificacion_de_voz-tab" data-toggle="tab" href="#Identificacion_de_voz" role="tab" aria-controls="Identificacion_de_voz" aria-selected="false">Identificacion de voz</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Senas_particulares" role="tabpanel" aria-labelledby="Senas_particulares-tab">
                    
            </div>
            
            <div class="tab-pane fade show active" id="Senas_particulares" role="tabpanel" aria-labelledby="Senas_particulares-tab">
                    <div class="container">
                        <form action="#" autocomplete="off">  
                            <br>  
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- SPACE -->
                                </div>
                                <div class="col-md-4">
                                    <center><strong >Señas particulares</strong></center>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Tipo de seña
                                    <select name="" id="" class="form-control"></select>
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Lado
                                    <select name="" id="" class="form-control"></select>
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Región
                                    <select name="" id="" class="form-control"></select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Vista
                                    <select name="" id="" class="form-control"></select>
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Cantidad
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    Descripción
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-light">
                                        Guardar seña
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <!-- SPACE -->
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-light">
                                        Limpiar formato
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="row">                
                                    <div class="col-md-12">
                                        <table id="table" class="table display">
                                            <thead>
                                                    <th>Id seña</th>
                                                    <th>Tipo seña</th>
                                                    <th>Lado</th>
                                                    <th>Región</th>
                                                    <th>Vista</th>
                                                    <th>Cantidad</th>
                                                    <th>Descripción</th>
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
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </form>
                        <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                    </div>
                </div>

                <div class="tab-pane fade show" id="Ficha_fotografica" role="tabpanel" aria-labelledby="Ficha_fotografica-tab">
                    <div class="container">
                        <form action="#" autocomplete="off">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- SPACE -->
                                </div>
                                <div class="col-md-4">
                                    <strong class="titulo">Ficha fotográfica</strong>
                                </div>
                            </div>
                            <br>
                        
                                <div class="row">
                                <div class="col-md-4">
                                    
                                </div>
                                <div class="col-md-4">
                                    <strong>Parámetros</strong>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                            <div class="col-md-4" style="text-align: left;">
                                CUIP:
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="text-align: left;">
                                Apellido paterno:
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="text-align: left;">
                                Apellido materno:
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="text-align: left;">
                                Nombre(s):
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="text-align: left;">
                                Fecha de nacimiento:
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="text-align: left;">
                                <span class="clr">*</span>Seleccione la adscripción:
                                </div>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control"></select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="text-align: left;">
                                Dependencia:
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="text-align: left;">
                                Institución:
                            </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <table id="table" class="table display">
                                        <thead>
                                            <tr>
                                                <td><center>Perfil izquierdo</center></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="file"> <br>
                                                    <button class="btn btn-light">subir</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table id="table" class="table display">
                                        <thead>
                                            <tr>
                                                <td><center>Frente</center></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="file"> <br>
                                                    <button class="btn btn-light">subir</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table id="table" class="table display">
                                        <thead>
                                            <tr>
                                                <td><center>Perfil derecho</center></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="file"> <br>
                                                    <button class="btn btn-light">subir</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    
                                </div>
                                                        <div class="col-md-4">
                                    <table id="table" class="table display">
                                        <thead>
                                            <tr>
                                                <td><center>Firma</center></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="file"> <br>
                                                    <button class="btn btn-light">subir</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                                        <div class="col-md-4">
                                    <table id="table" class="table display">
                                        <thead>
                                            <tr>
                                                <td><center>Huella</center></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="file"> <br>
                                                    <button class="btn btn-light">subir</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="table" class="table display">
                                        <thead>
                                                <th>Id evaluación</th>
                                                <th>Tipo</th>
                                                <th>Examen</th>
                                                <th>Lugar de aplicación</th>
                                                <th>Fecha programación</th>
                                                <th>Fecha resultado</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                        <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                    </div>
                </div>

                <div class="tab-pane fade show" id="Registro_decadactilar" role="tabpanel" aria-labelledby="Registro_decadactilar-tab">
                    <div class="container">
                        <form action="#" autocomplete="off">
                            <br>  
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- SPACE -->
                                </div>
                                <div class="col-md-4">
                                    <strong class="titulo">Registro decadactilar</strong>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-3" style="text-align: left;">
                                    CUIP:
                                </div>
                                <div class="col-md-3"style="text-align: left;">
                                    
                                </div>
                                <div class="col-md-3"style="text-align: left;">
                                    Folio:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: left;">
                                    Seleccione la adscripción:
                                </div>
                                <div class="col-md-3"style="text-align: left;">
                                    <select name="" id="" class="form-control"></select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: left;">
                                    Dependencia:
                                </div>
                                <div class="col-md-3"style="text-align: left;">
                                    
                                </div>
                                <div class="col-md-3"style="text-align: left;">
                                    Institución:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: left;">
                                    Apellido paterno:
                                </div>
                                <div class="col-md-3"style="text-align: left;">
                                    
                                </div>
                                <div class="col-md-3"style="text-align: left;">
                                    Apellido materno:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: left;">
                                    Nombre(s):
                                </div>
                                <div class="col-md-3"style="text-align: left;">
                                    
                                </div>
                                <div class="col-md-3"style="text-align: left;">
                                    Fecha de nacimiento:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: left;">
                                    Edad:
                                </div>
                                <div class="col-md-3"style="text-align: left;">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-3"style="text-align: left;">
                                    Sexo:
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- SPACE -->
                                </div>
                                <div class="col-md-4">
                                    <input type="file">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- SPACE -->
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-light">
                                    Subir
                                </button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-8">
                                    <table id="table" class="table display">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                                    </td>
                                                </tr>
                                            </thead>
                                        </table>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-light">
                                        Guardar registro
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <!-- SPACE -->
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-light">
                                        Limpiar formulario
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="table" class="table display">
                                        <thead>
                                                <th>Id reg. dactilar</th>
                                                <th>Dependencia</th>
                                                <th>Institución</th>
                                                <th>Fecha de registro</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                        <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                    </div>
                </div>

                <div class="tab-pane fade show" id="Digitalizacion_de_documento" role="tabpanel" aria-labelledby="Digitalizacion_de_documento-tab">
                        <form action="#" autocomplete="off">
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <!-- SPACE -->
                                </div>
                                <div class="col-md-8">
                                    <strong class="titulo">Digitalización de documento</strong>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    Tipo documento
                                    <select name="" id="" class="form-control">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    Categoría documento
                                    <select name="" id="" class="form-control">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    Fecha documento
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    
                                </div>
                                <div class="col-md-4">
                                    Seleccione un documento
                                    <input type="file">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button class="btn btn-light">Subir</button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <!-- SPACE -->
                                </div>
                                <div class="col-md-8" style="border-color: solid black;">
                                    <table id="table" class="table display">
                                        <thead>
                                            <tr>
                                                <td>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-light">
                                        Guardar ficha
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <!-- SPACE -->
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-light">
                                        Limpiar formulario
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="table" class="table display">
                                        <thead>
                                                <th>Id documento</th>
                                                <th>Categoría documento</th>
                                                <th>Valor</th>
                                                <th>Fecha documento</th>
                                                <th>Estatus</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                        <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                    </div>
                    <div class="tab-pane fade show " id="Identificacion_de_voz" role="tabpanel" aria-labelledby="Identificacion_de_voz-tab">
                        <div class="container">
                            <form action="#" autocomplete="off">
                                    <br>
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                        <strong class="titulo">Identificación de voz</strong>
                                    </div>
                                </div>
                                    <br>
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <strong>Especificaciones para el archivo de identificación de voz</strong>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6" style="text-align: left;">
                                        Formato: WAV PCM
                                    </div>                       
                                </div>
                                <div class="row">
                                    <div class="col-md-6"style="text-align: left;">
                                        Sonido: Monoaural
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"style="text-align: left;">
                                        Duración del sonido: 2 minutos
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8"style="text-align: left;">
                                        Frecuencia de muestreo: 8000HZ-11025HZ
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="text-align: left;">
                                        <span class="clr">*</span>Seleccione la adscripción
                                    </div>
                                    <div class="col-md-4"style="text-align: left;">
                                        <select name="" id="" class="form-control"></select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"style="text-align: left;">
                                        Dependencia:
                                    </div>
                                    <div class="col-md-4"style="text-align: left;">
                                        Institución:
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        
                                    </div>
                                    <div class="col-md-8">
                                        <center><strong>Información de identificación de voz</strong></center>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- SPACE -->
                                    </div>
                                    <div class="col-md-4">
                                        <center><audio id="audio" controls style="margin-left: -24px;">
                                        <source src="ruta_de_audio">
                                            Tu navegador no es compatible
                                    </audio></center>
                                    </div>
                                </div>
                                <br>
                            </form>
                            <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                        </div>
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