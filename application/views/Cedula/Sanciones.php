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
            <!-- TABS -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="Sanciones_recomendaciones-tab" data-toggle="tab" href="#Sanciones_recomendaciones" role="tab" aria-controls="Sanciones_recomendaciones" aria-selected="true">Sanciones y/o recomendaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Resoluciones_ministeriales_judiciales-tab" data-toggle="tab" href="#Resoluciones_ministeriales_judiciales" role="tab" aria-controls="Resoluciones_ministeriales_judiciales" aria-selected="false">Resoluciones ministeriales y/o judiciales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Estimulos_recibidos-tab" data-toggle="tab" href="#Estimulos_recibidos" role="tab" aria-controls="Estimulos_recibidos" aria-selected="false">Estímulos recibidos</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="Sanciones_recomendaciones" role="tabpanel" aria-labelledby="Sanciones_recomendaciones-tab">
                    <div class="container">       
                        <form action="#" autocomplete="off">       
                            <br>                  
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <strong class="titulo">Sanciones y/o recomendaciones</strong>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                <span class="clr">*</span>Tipo <!-- Se llena del catálogo "TIPO_OBSERVACION" -->
                                    <select  class="form-control" id="pID_TIPO_OBS" name="pID_TIPO_OBS" required></select>
                                </div>     
                                <div class="col-md-4">
                                <span class="clr">*</span>Determinación
                                    <input type="date"  class="form-control" id="pDETERMINACION" name="pDETERMINACION" required>
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Descripción
                                    <input type="text" class="form-control" id="pDESCRIPCION" name="pDESCRIPCION" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Situación
                                    <input type="text" class="form-control" id="pSITUACION" name="pSITUACION" required>
                                </div>
                                <div class="col-md-4">
                                    Inicio de inhabilitación
                                    <input type="date" class="form-control" id="pFECHA_INICIO" name="pFECHA_INICIO"> 
                                </div>
                                <div class="col-md-4">
                                    Término de inhabilitación
                                    <input type="date" class="form-control" id="pFECHA_TERMINO" name="pFECHA_TERMINO">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Dependencia u organismo que emite la determinación <!-- Se llena del catálogo "DEPENDENCIA" -->
                                    <select  class="form-control" id="pID_DEPENDENCIA" name="pID_DEPENDENCIA" required></select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-default">Guardar sanción</button>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button class="btn btn-default">Limpiar formulario</button>
                                </div>    
                            </div>
                            <br> 
                            <br>
                            <hr>
                            <br><br>                          
                            <table class="table table-bordered">
                                <thead>
                                    <th>Id sanción recomendación</th>
                                    <th>Descripción</th>
                                    <th>Situación</th>
                                    <th>Inicio inhabilitación</th>
                                    <th>Término inhabilitación</th>
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
                            <input type="number" id="pID_ALTERNA" name="pID_ALTERNA" hidden>
                            <input type="number" id="pID_ESTADO_EMISOR" name="pID_ESTADO_EMISOR" hidden>
                            <input type="number" id="pID_EMISOR" name="pID_EMISOR" hidden>
                            <input type="number" id="pID_SANC_RECOM_EXT" name="pID_SANC_RECOM_EXT" hidden>
                        </form>
                        <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                    </div>
                </div>
                <div class="tab-pane fade" id="Resoluciones_ministeriales_judiciales" role="tabpanel" aria-labelledby="Resoluciones_ministeriales_judiciales-tab">
                    <div class="container">  
                        <form action="#" autocomplete="off">                                  
                            <br>                  
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <strong class="titulo">Resoluciones ministeriales y/o judiciales</strong>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Institución emisora <!-- Se llena del catálogo "INSTITUCION" -->
                                    <select  class="form-control" id="pID_INSTITUCION" name="pID_INSTITUCION" required></select>
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Entidad federativa <!-- Se llena del catálogo de "ENTIDAD" -->
                                    <select  class="form-control" id="pID_ENTIDAD" name="pID_ENTIDAD" required></select>
                                </div>
                                <div class="col-md-4">
                                    Delito(s)
                                    <input type="text" class="form-control" id="pDELITO" name="pDELITO">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    Motivo
                                    <input type="text" class="form-control" id="pMOTIVO" name="pMOTIVO">
                                </div>
                                <div class="col-md-4">
                                    Número de expediente
                                    <input type="text" class="form-control" id="pEXPEDIENTE" name="pEXPEDIENTE">
                                </div>
                                <div class="col-md-4">
                                    Agencia del MP
                                    <input type="text" class="form-control" id="pAGENCIA_MP" name="pAGENCIA_MP">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    Averiguación previa
                                    <input type="text" class="form-control" id="pAVERIGUACION_PREV" name="pAVERIGUACION_PREV">
                                </div>
                                <div class="col-md-4">
                                    Estado de la averiguación previa
                                    <input type="text" class="form-control" id="pESTADO_AVERIGUACIO" name="pESTADO_AVERIGUACIO">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Tipo de fuero
                                    <input type="text" class="form-control" id="pFUERO" name="pFUERO" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    Inicio de la averiguación previa
                                    <input type="date"  class="form-control" id="pFECHA_AVERIGUACION" name="pFECHA_AVERIGUACION">
                                </div>
                                <div class="col-md-4">
                                    Al día
                                    <input type="date"  class="form-control" id="pFECHA_ESTADO_AV" name="pFECHA_ESTADO_AV">
                                </div>
                                <div class="col-md-4">
                                    Juzgado
                                    <input type="text" class="form-control" id="pJUZGADO" name="pJUZGADO">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    No. de proceso
                                    <input type="text" class="form-control" id="pNUM_PROCESO" name="pNUM_PROCESO">
                                </div>
                                <div class="col-md-4">
                                    Estado procesal
                                    <input type="text" class="form-control" id="pESTADO_PROCESO" name="pESTADO_PROCESO">
                                </div>
                                <div class="col-md-4">
                                    Inicio del proceso
                                    <input type="date"  class="form-control" id="pFECHA_PROCESO" name="pFECHA_PROCESO">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    Al día
                                    <input type="date"  class="form-control" id="pFECHA_ESTADO_PROC" name="pFECHA_ESTADO_PROC">
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-default">Guardar resolución</button>
                                </div>
                                <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <button class="btn btn-default">Limpiar formulario</button>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <hr>
                                <br><br>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <th>Id resolución</th>
                                    <th>Entidad</th>
                                    <th>Delito</th>
                                    <th>Agencia MP</th>
                                    <th>Tipo fuero</th>
                                    <th>Inicio averiguación prev.</th>
                                    <th>Al dia averiguación prev.</th>
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
                            <input type="number" id="pID_ALTERNA" name="pID_ALTERNA" hidden>
                            <input type="number" id="pID_ESTADO_EMISOR" name="pID_ESTADO_EMISOR" hidden>
                            <input type="number" id="pID_EMISOR" name="pID_EMISOR" hidden>
                            <input type="number" id="pID_PENAL_EXT" name="pID_PENAL_EXT" hidden>
                            <input type="number" id="pID_DEPENDENCIA" name="pID_DEPENDENCIA" hidden>
                        </form>
                        <input type="button" name="previous" class="previous action-button-previous" style="height:40px;" value="Anterior"/>
                        <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                    </div>
                </div>
                <div class="tab-pane fade" id="Estimulos_recibidos" role="tabpanel" aria-labelledby="Estimulos_recibidos-tab">
                    <div class="container">    
                        <form action="#" autocomplete="off">                            
                            <br>                  
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <strong class="titulo">Estímulos recibidos</strong>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Tipo <!-- Se llena del catálogo "TIPO_ESTIMULO" -->
                                    <select  class="form-control" id="pID_TIPO_ESTIMULO" name="pID_TIPO_ESTIMULO" required></select>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    Descripción
                                    <input type="text" class="form-control" id="pDESCRIPCION" name="pDESCRIPCION">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    Dependencia que otorga
                                    <input type="text" class="form-control" id="pDEPENDENCIA" name="pDEPENDENCIA">
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Otorgado
                                    <input type="date" class="form-control" id="pFECHA_OTORGAMIENTO" name="pFECHA_OTORGAMIENTO" required>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-default">Guardar estímulo</button>
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-default">Limpiar formulario</button>
                                </div>
                            </div>
                            <br>
                            <br>
                            <hr>
                            <br><br>
                            <table class="table table-bordered">
                                <thead>
                                    <th>Id estimulo</th>
                                    <th>Tipo estímulo</th>
                                    <th>Descripción</th>
                                    <th>Dependencia que otorga</th>
                                    <th>Fecha otorgamiento</th>
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
                            <input type="number" id="pID_ALTERNA" name="pID_ALTERNA" hidden>
                            <input type="number" id="pID_ESTADO_EMISOR" name="pID_ESTADO_EMISOR" hidden>
                            <input type="number" id="pID_EMISOR" name="pID_EMISOR" hidden>
                            <input type="number" id="pID_ESTIMULO_EXT" name="pID_ESTIMULO_EXT" hidden>
                        </form>
                        <input type="button" name="previous" class="previous action-button-previous" style="height:40px;" value="Anterior"/>
                        <input type="submit" name="submit" class="submit action-button" style="height:40px;" value="Finalizar"/>
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