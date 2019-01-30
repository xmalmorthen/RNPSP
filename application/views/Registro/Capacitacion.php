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
                <a class="nav-link active" id="Capacitacion_seguridad_publica-tab" data-toggle="tab" href="#Capacitacion_seguridad_publica" role="tab" aria-controls="Capacitacion_seguridad_publica" aria-selected="true">Capacitación de seguridad pública</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Capacitacion_adicional-tab" data-toggle="tab" href="#Capacitacion_adicional" role="tab" aria-controls="Capacitacion_adicional" aria-selected="false">Capacitación adicional</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Idiomas_dialectos-tab" data-toggle="tab" href="#Idiomas_dialectos" role="tab" aria-controls="Idiomas_dialectos" aria-selected="false">Idiomas y/o dialectos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Habilidades_aptitudes-tab" data-toggle="tab" href="#Habilidades_aptitudes" role="tab" aria-controls="Habilidades_aptitudes" aria-selected="false">Habilidades y aptitudes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Afiliacion_agrupaciones-tab" data-toggle="tab" href="#Afiliacion_agrupaciones" role="tab" aria-controls="Afiliacion_agrupaciones" aria-selected="false">Afiliación a agrupaciones</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Capacitacion_seguridad_publica" role="tabpanel" aria-labelledby="Capacitacion_seguridad_publica-tab">
                <div class="container">     
                    <form action="#" autocomplete="off">      
                        <br>                  
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <strong class="titulo">Capacitación de seguridad pública</strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Dependencia responsable <!-- Traer contenido del catalogo "DEP_RESPONSABLE" -->
                                <select  class="form-control" id="pID_RESPONSABLE" name="pID_RESPONSABLE" required>
                                    <option value="">--Seleccione</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Institución capacitadora <!-- Se llena del catalogo  "INSTITUCION_CAPACI" -->
                                <select  class="form-control" id="pINST_CAPACITA" name="pINST_CAPACITA" required>
                                    <option value="">--Seleccione</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                Nombre del curso
                                <Input type="text" class="form-control" id="pCURSO" name="pCURSO">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Tema del curso <!-- Se llena del catalogo de "TEMA" -->
                                <select  class="form-control" id="pID_TEMA" name="pID_TEMA" required>
                                    <option value="">--Seleccione</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Nivel del curso recibido <!-- Se llena del catalogo "NIVEL" y depende del select "TEMA"-->
                                <select  class="form-control" id="pID_NIVEL" name="pID_NIVEL" required>
                                    <option value="">--Seleccione</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                Eficiencia terminal <!-- Lo saca del catalogo de "EFICIENCIA" -->
                                <select  class="form-control" id="pID_EFICIENCIA" name="pID_EFICIENCIA">
                                    <option value="">--Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Inicio
                                <input type="date"  class="form-control" id="pINICIO" name="pINICIO">
                            </div>
                            <div class="col-md-4">
                                Conclusión
                                <input type="date"  class="form-control" id="pCONCLUSION" name="pCONCLUSION">
                            </div>
                            <div class="col-md-4">
                                Duración horas
                                <Input type="text" class="form-control" id="pDURACION" name="pDURACION">
                            </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-default">Guardar capacitación</button>
                            </div>
                            <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    
                                </div>    
                            </div>
                            <br>
                            <br>
                            <hr>
                            <br><br>
                            <table class="table table-bordered">
                                <thead>
                                    <th>Id capacitación</th>
                                    <th>Dependencia</th>
                                    <th>Institución</th>
                                    <th>Curso</th>
                                    <th>Tema</th>
                                    <th>Nivel curso</th>
                                    <th>Duración en hrs</th>
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
                        <input type="number" id="pID_ALTERNA" name="pID_ALTERNA" hidden>
                        <input type="number" id="pID_ESTADO_EMISOR" name="pID_ESTADO_EMISOR" hidden>
                        <input type="number" id="pID_EMISOR" name="pID_EMISOR" hidden>
                        <input type="number" id="pID_CAPACITACION_EXT" name="pID_CAPACITACION_EXT" hidden>
                    </form>   
                    <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                </div>
            </div>
            <div class="tab-pane fade" id="Capacitacion_adicional" role="tabpanel" aria-labelledby="Capacitacion_adicional-tab">
                <div class="container">
                    <form action="#" autocomplete="off">
                        <br>                  
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <strong class="titulo">Capacitación adicional</strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Institución o empresa
                                <Input type="text" class="form-control" id="pEMPRESA" name="pEMPRESA" required> 
                            </div>
                            <div class="col-md-4">
                                Estudio o curso
                                <Input type="text" class="form-control" id="pCURSO" name="pCURSO">
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Tipo de curso <!--Se llena del catalogo "TIPO_CURSO_ADIC" -->
                                <select  class="form-control" id="pID_TIPO_CURSO" name="pID_TIPO_CURSO" required>
                                    <option value="">--Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>El curso fué <!-- Se llena del catalogo "MODALIDAD_CURSO"<-->
                                <select name ="" id="" class="form-control" id="pID_MODALIDAD_CURSO" name="pID_MODALIDAD_CURSO" required>
                                    <option value="">--Seleccione</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Eficiencia terminal <!-- Se llena del catalogo "EFICIENCIA" -->
                                <select  class="form-control" id="pID_EFICIENCIA" name="pID_EFICIENCIA" required>
                                    <option value="">--Seleccione</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                Inicio
                                <input type="date"  class="form-control" id="pFECHA_INICIO" name=pFECHA_INICIO>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Conclusión
                                <input type="date"  class="form-control" id="pFECHA_FIN" name="pFECHA_FIN">
                            </div>
                            <div class="col-md-4">
                                Duración horas
                                <Input type="text" class="form-control" id="pDURACION" name="pDURACION">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-default">Guardar capacitación adicional</button>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                
                            </div>    
                        </div>
                        <br>
                        <br>
                        <hr>
                        <br><br>
                        <table class="table table-bordered">
                            <thead>
                                <th>Id capacitación adicional</th>
                                <th>Institución empresa</th>
                                <th>Curso</th>
                                <th>Modalidad</th>
                                <th>Eficiencia</th>
                                <th>Duración en hrs</th>
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
                        <input type="number" id="pID_ALTERNA" name="pID_ALTERNA" hidden>
                        <input type="number" id="pID_ESTADO_EMISOR" name="pID_ESTADO_EMISOR" hidden>
                        <input type="number" id="pID_EMISOR" name="pID_EMISOR" hidden>
                        <input type="number" id="pID_CAP_ADICIONAL_EXT" name="pID_CAP_ADICIONAL_EXT" hidden>
                    </form>              
                    <input type="button" name="previous" class="previous action-button-previous" style="height:40px;" value="Anterior"/>
                    <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                </div>
            </div>
            <div class="tab-pane fade" id="Idiomas_dialectos" role="tabpanel" aria-labelledby="Idiomas_dialectos-tab">
                <div class="container">     
                    <form action="#" autocomplete="off">         
                        <br>                  
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <strong class="titulo">Idiomas y/o dialectos</strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Idioma o dialecto  <!-- Se llena del catalogo "IDIOMA" -->
                                <select  class="form-control" id="pID_IDIOMA" name="pID_IDIOMA" required>
                                    <option value="">--Seleccione</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                Lectura
                                <div class="row">                                 
                                    <div class="col-md-10">                                 
                                        <Input type="text" class="form-control" class="form-control" id="pGRADO_LECTURA" name="pGRADO_LECTURA">
                                    </div>
                                    <div class="col-md-1" style="margin-left: -25px;">%</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                Escritura
                                <div class="row">                                 
                                    <div class="col-md-10">                             
                                        <Input type="text" class="form-control" class="form-control" id="pGRADO_ESCRITURA" name="pGRADO_ESCRITURA">
                                    </div>
                                    <div class="col-md-1" style="margin-left: -25px;">%</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Conversación
                                <div class="row">                                 
                                    <div class="col-md-10">                             
                                        <Input type="text" class="form-control" class="form-control" id="pGRADO_CONVERSACION" name="pGRADO_CONVERSACION">
                                    </div>
                                    <div class="col-md-1" style="margin-left: -25px;">%</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-default">Guardar idioma</button>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                
                            </div>    
                        </div>
                        <br> 
                        <br>
                        <hr>
                        <br><br>
                        <table class="table table-bordered">
                            <thead>
                                <th>Id idioma</th>
                                <th>Idioma</th>
                                <th>Grado lectura</th>
                                <th>Grado escritura</th>
                                <th>Grado conversación</th>
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
                        <input type="number" id="pID_IDIOMA_HABLADO_EXT" name="pID_IDIOMA_HABLADO_EXT" hidden>
                    </form>
                    <input type="button" name="previous" class="previous action-button-previous" style="height:40px;" value="Anterior"/>
                    <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                </div>
            </div>
            <div class="tab-pane fade" id="Habilidades_aptitudes" role="tabpanel" aria-labelledby="Habilidades_aptitudes-tab">
                <div class="container">
                    <form action="#" autocomplete="off">
                        <br>                  
                        <div class="row">
                            <div class="col-md-4">
                                
                            </div>
                            <div class="col-md-4">
                                <strong class="titulo">Habilidades y aptitudes</strong>
                            </div>
                        </div>
                        <br> 
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Tipo <!-- Se llena con el catalogo "TIPO_APTITUD" -->
                                <select name="" id="" class="form-control" id="@pID_TIPO_APTITUD" name="@pID_TIPO_APTITUD" required>
                                    <option value="">--Seleccione</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                Especifique
                                <input type="text" id="@pESPECIFIQUE" name="@pESPECIFIQUE">
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Grado de aptitud o dominio <!-- Se rellena con el catalogo "GRADO_APTITUD_HAB" depende del select "TIPO_ACTITUD" -->
                                <select name="" id="" class="form-control" id="@pID_GRADO_APT_HAB" name="@pID_GRADO_APT_HAB" required>
                                    <option value="">--Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-default">Guardar habilidad y/o aptitud</button>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                
                            </div>    
                        </div>
                        <br>
                        <br>
                        <hr>
                        <br><br>
                        <table class="table table-bordered">
                            <thead>
                                <th>Id habilidad y/o aptitud</th>
                                <th>Tipo</th>
                                <th>Descripción</th>
                                <th>Grado</th>
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
                        <input type="number" id="pID_ALTERNA" name="pID_ALTERNA" hidden>
                        <input type="number" id="pID_ESTADO_EMISOR" name="pID_ESTADO_EMISOR" hidden>
                        <input type="number" id="pID_EMISOR" name="pID_EMISOR" hidden>
                        <input type="number" id="pID_HABILIDAD_APTIT_EXT" name="pID_HABILIDAD_APTIT_EXT" hidden>
                    </form>                                      
                    <input type="button" name="previous" class="previous action-button-previous" style="height:40px;" value="Anterior"/>
                    <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                </div>
            </div>
            <div class="tab-pane fade" id="Afiliacion_agrupaciones" role="tabpanel" aria-labelledby="Afiliacion_agrupaciones-tab">
                <div class="container">  
                    <form action="#" autocomplete="off">           
                        <br>                  
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <strong class="titulo">Afiliación a agrupaciones</strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Nombre
                                <Input type="text" class="form-control" id="pNOMBRE_AGRUPACION" name="pNOMBRE_AGRUPACION" required>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Tipo <!-- Se llena con el catalogo "TIPO_AGRUPACION" -->
                                <select  class="form-control" id="pID_TIPO_AGRUPACION" name="pID_TIPO_AGRUPACION" required>
                                    <option value="">--Seleccione</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Desde
                                <input type="date" class="form-control" id="pFECHA_INICIO" name="pFECHA_INICIO" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Hasta
                                <input type="date" class="form-control" id="pFECHA_TERMINO" name="pFECHA_TERMINO">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-default">Guardar afiliación</button>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                
                            </div>    
                        </div>
                        <br>
                        <br>
                        <hr>
                        <br><br>
                        <table class="table table-bordered">
                            <thead>
                                <th>Id agrupación</th>
                                <th>Nombre agrupación</th>
                                <th>Tipo agrupación</th>
                                <th>Desde</th>
                                <th>Hasta</th>
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
                        <input type="number" id="pID_AGRUPACION_EXT" name="pID_AGRUPACION_EXT" hidden>
                    </form> 
                    <input type="button" name="previous" class="previous action-button-previous" style="height:40px;" value="Anterior"/>
                    <input type="submit" name="submit" class="submit action-button" style="height:40px;" value="Finalizar"/>
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
<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script>
  $(function() {
        objView.init();
    });
</script>
<!-- /JS -->