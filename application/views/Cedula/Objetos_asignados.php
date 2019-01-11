
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatable/jquery.dataTables.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/datetimepicker/css/daterangepicker.css"); ?>"> 
<link rel="stylesheet" href="<?php echo base_url('assets/css/views/ejemplosView.css') ?>">

<div class="row">
    <div class="col-md-12">
        <!-- TABS -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="Armamento_asignado-tab" data-toggle="tab" href="#Armamento_asignado" role="tab" aria-controls="Armamento_asignado" aria-selected="true">Armamento asignado (de cargo)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Vehiculo_asignado-tab" data-toggle="tab" href="#Vehiculo_asignado" role="tab" aria-controls="Vehiculo_asignado" aria-selected="false">Vehiculo asignado</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Equipo_policial_asignado-tab" data-toggle="tab" href="#Equipo_policial_asignado" role="tab" aria-controls="Equipo_policial_asignado" aria-selected="false">Equipo policial asignado</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Armamento_asignado" role="tabpanel" aria-labelledby="Armamento_asignado-tab">
                <div class="container">              
                    <div class="Content">
                        <br>                  
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <strong class="titulo">Armamento asignado (de cargo)</strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Num. licencia de portación
                                <input type="text" class="form-control" id="@pNUMERO_LICENCIA" name="@pNUMERO_LICENCIA" required>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Número de matricula
                                <input type="text" class="form-control" id="@pNumero_MATRICULA" name="@pNumero_MATRICULA" required>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Inicio de vigencia 
                                <input type="date" name="" id="" class="form-control" id="@pINICIO_LICENCIA" name="@pINICIO_LICENCIA">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Término de vigencia 
                                <input type="date" name="" id="" class="form-control"  id="@pTERMINO_LICENCIA" name="@pTERMINO_LICENCIA">
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Tipo de arma 
                                <select name="" id="" class="form-control" id="@pID_TIPO_ARMA" name="@pID_TIPO_ARMA" required></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Marca de arma
                                <select name="" id="" class="form-control" id="@pID_MARCA_ARMA" name="@pID_MARCA_ARMA" required ></select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Modelo de arma
                                <select name="@pID_MODELO_ARMA" id="@pID_MODELO_ARMA" class="form-control" required></select>
                            </div>
                            <div class="col-md-4">
                                Calibre de arma
                                <select name="@pID_CALIBRE_ARMA" id="@pID_CALIBRE_ARMA" class="form-control"></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Inicio de asignación 
                                <input type="date" name="@pINICIO_ASIGNACION" id="@pINICIO_ASIGNACION" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Término de asignación 
                                <input type="date" name="@pTERMINO_ASIGNACION" id="@pTERMINO_ASIGNACION" class="form-control">
                            </div>
                            <div class="col-md-4">
                                Documento de asignación 
                                <input type="text" class="form-control" id="@pDOC_ASIGNACION" name="@pDOC_ASIGNACION">
                            </div>
                            <div class="col-md-4">
                                Documento de descargo
                                <input type="text" class="form-control" id="@pDOC_DESCARGO" name="@pDOC_DESCARGO" >
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-default">Guardar arma</button>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button class="btn btn-default">Limpiar formulario</button>
                            </div>                        
                        </div>
                        <br>
                        <hr>
                        <br>
                        <table id="table" class="table display">
                            <thead> 
                                <th>ID arma asig.</th>
                                <th>Num. licencia</th>
                                <th>Matrícula</th>
                                <th>Tipo</th>
                                <th>Marca</th>
                                <th>Inicio asig.</th>
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
                    <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                </div>
            </div>
            <div class="tab-pane fade" id="Vehiculo_asignado" role="tabpanel" aria-labelledby="Vehiculo_asignado-tab">
                <div class="container">              
                    <div class="Content">
                        <br>                  
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <strong class="titulo">Vehiculo asignado</strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Número de identificación vehicular 
                                <input type="text" class="form-control" id="@pVIN" name="@pVIN">
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Número de motor 
                                <input type="text" class="form-control" id="@pMOTOR" name="@pMOTOR" required>
                            </div>
                            <div class="col-md-4">
                                Número de constancia de inscripción
                                <input type="text" class="form-control" id="@pNCI" name="@pNCI">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <strong>Datos del vehiculo</strong>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Clase
                                <select name="" id="" class="form-control" ></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Tipo
                                <select name="" id="" class="form-control" id="@pID_TIPO_VEH" name="@pID_TIPO_VEH" required></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Marca 
                                <select name="" id="" class="form-control" id="@pID_MARCA" name="@pID_MARCA" required></select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Submarca
                                <select name="" id="" class="form-control" id="@pID_SUBMARCA" name="@pID_SUBMARCA" required></select>
                            </div>
                            <div class="col-md-4">
                                Modelo 
                                <input type="text" class="form-control" id="@pMODELO" name="@pMODELO">
                            </div>
                            <div class="col-md-4">
                                Placa
                                <input type="" class="form-control" id="@pPLACA" name="@pPLACA">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Tipo de asignación
                                <select name="" id="" class="form-control" id="@pID_TIPO_ASIGNACION" name="@pID_TIPO_ASIGNACION"></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Inicio de asignación
                                <input type="date" class="form-control" id="@INICIO_ASIGNACION" name="@INICIO_ASIGNACION">
                            </div>
                            <div class="col-md-4">
                                Término de asignación
                                <input type="date" class="form-control" id="@pTERMINO_ASIGNACION" name="@pTERMINO_ASIGNACION">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Documento de asignación
                                <input type="text" class="form-control" id="@pDOC_ASIGNACION" name="@pDOC_ASIGNACION">
                            </div>
                            <div class="col-md-4">
                                Documento de descargo
                                <input type="text" class="form-control" id="@pDOC_DESCARGO" name="@pDOC_DESCARGO">
                            </div>                        
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-disable">Guardar vehiculo</button>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-default">Limpiar formulario</button>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <th>ID equipo asig.</th>
                                <th>VIN</th>
                                <th>No. motor</th>
                                <th>Tipo vehiculo</th>
                                <th>Modelo</th>
                                <th>Placa</th>
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
                    <input type="button" name="previous" class="previous action-button-previous" style="height:40px;" value="Anterior"/>
                    <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                </div>
            </div>
            <div class="tab-pane fade" id="Equipo_policial_asignado" role="tabpanel" aria-labelledby="Equipo_policial_asignado-tab">
                <div class="container">              
                    <div class="Content">
                        <br>                  
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <strong class="titulo">Equipo policial asignado</strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Tipo de equipo 
                                <select name="" id="" class="form-control"></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Marca de equipo 
                                <select name="" id="" class="form-control"></select>
                            </div>
                            <div class="col-md-4">
                                Modelo del equipo
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Número de serie de equipo
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Inicio de asignación 
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-4">
                                Documento de asignación
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Término de asignación 
                                <input type="date" name="" id="" class="form-control">
                            </div>
                            <div class="col-md-4">
                                Documento de descargo
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-default">Guardar equipo</button>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button class="btn btn-default">Limpiar formulario</button>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <table class="table table-bordered"> 
                            <thead>
                                <th>ID equipo asig</th>
                                <th>Tipo de equipo</th>
                                <th>Marca</th>
                                <th>Inventario</th>
                                <th>Serie</th>
                                <th>Inicio asig.</th>
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
                    <input type="button" name="previous" class="previous action-button-previous" style="height:40px;" value="Anterior"/>
                    <input type="button" name="previous" class="submit action-button-previous" style="height:40px;" value="Finalizar"/>
                </div>
            </div>
            
        </div>
        <!-- FIN - TAB3 -->
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