<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dise.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dise.css">

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
                <a class="nav-link active" id="Criterios_de_busqueda-tab" data-toggle="tab" href="#Criterios_de_busqueda" role="tab" aria-controls="Criterios_de_busqueda" aria-selected="true">Criterios de búsqueda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Reportes-tab" data-toggle="tab" href="#Reportes" role="tab" aria-controls="Reportes" aria-selected="false">Reportes</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Criterios_de_busqueda" role="tabpanel" aria-labelledby="Criterios_de_busqueda-tab">
                <div class="container">
                    <form action="#" autocomplete="off">           
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <strong class="titulo">Criterios de búsqueda</strong>
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
                                Entidad de adscripción
                                <select name="" id="" class="form-control"></select>
                            </div>
                            <div class="col-md-4">
                                Municipio de adscripción
                                <select name="" id="" class="form-control"></select>
                            </div>
                        </div>   
                        <br>
                    </form> 
                    <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                </div>
            </div>
            <div class="tab-pane fade" id="Reportes" role="tabpanel" aria-labelledby="Reportes-tab">
                <div class="container">
                    <form action="#" autocomplete="off">  
                        <br>                  
                        <div class="row">
                            <div class="col-md-4">
                                Dependencia
                                <select name="" id="" class="form-control" disabled></select>
                            </div>
                            <div class="col-md-4">
                                Corporación
                                <select name="" id="" class="form-control" disabled></select>
                            </div>
                            <div class="col-md-4">
                                Puesto
                                <select name="" id="" class="form-control" disabled></select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Entidad de adscripción
                                <select name="" id="" class="form-control" disabled></select>
                            </div>
                            <div class="col-md-4">
                                Municipio de adscripción
                                <select name="" id="" class="form-control" disabled></select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <strong>Secciones de la cédula</strong>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive1" style="width: 100%">Datos personales</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive2" onclick="loadModalSelects()" style="width: 100%">Desarrollo académico</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive3" onclick="loadModalSelects()" style="width: 100%">Domicilio</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive4" onclick="loadModalSelects()" style="width: 100%">Adscripción</button>
                            </div>
                        </div> 
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive5" onclick="loadModalSelects()" style="width: 100%">Armamento</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive6" onclick="loadModalSelects()" style="width: 100%">Vehículo</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive7" onclick="loadModalSelects()" style="width: 100%">Equipo policial</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive8" onclick="loadModalSelects()" style="width: 100%">Referencias</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive9" onclick="loadModalSelects()" style="width: 100%">Capacitación en SP</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive10" onclick="loadModalSelects()" style="width: 100%">Capacitación adicional</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive11" onclick="loadModalSelects()" style="width: 100%">Idiomas y/o dialectos</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive12" onclick="loadModalSelects()" style="width: 100%">Habilidades y <br> aptitudes</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive13" onclick="loadModalSelects()" style="width: 100%">Empleos en SSP</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive14" onclick="loadModalSelects()" style="width: 100%">Empleos diversos</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive15" onclick="loadModalSelects()" style="width: 100%">Actitudes</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive16" onclick="loadModalSelects()" style="width: 100%">Afiliación a <br> agrupaciones</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive17" onclick="loadModalSelects()" style="width: 100%">Sanciones y/o <br> recomendaciones</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive18" onclick="loadModalSelects()" style="width: 100%">Resols. ministeriales <br> y jud.</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive19" onclick="loadModalSelects()" style="width: 100%">Media filiación</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" id="ModalActive20" style="width: 100%">S. particulares</button>
                            </div>
                        </div>
                        <br>
                 
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <strong>Otros reportes</strong>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3" id="ModalActive21">
                                <button class="btn btn-light" style="width: 100%">Por corporación</button>
                            </div>
                            <div class="col-md-3" id="ModalActive22">
                                <button class="btn btn-light" style="width: 100%">Listado nominal</button>
                            </div>
                            <div class="col-md-3" id="ModalActive23">
                                <button class="btn btn-light" style="width: 100%">Descargar imágenes</button>
                            </div>
                            <div class="col-md-3" id="ModalActive24">
                                <button class="btn btn-light" style="width: 100%">Constancia</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn btn-light"  id="ModalActive25" style="width: 100%">Hoja de servicio</button>
                            </div>
                        </div>
                        <br>
                        </div>
                        <div class="container" id="ReporteSeleccion" style="display: none;">
                            <div class="row" id="">
                                <div class="col-md-12">
                                    <hr>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-light" >Bajar información</button>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <hr>
                            </div>
                        </div>      
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
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script>
    $(function() {
        objView.init();
    });
</script>
<!-- /JS -->