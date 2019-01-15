<!-- CSS -->
<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dise.css"> -->
<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/dise.css'); ?>">
<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dise.css"> -->

<link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatable/jquery.dataTables.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/datetimepicker/css/daterangepicker.css"); ?>"> 
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/views/ejemplosView.css') ?>"> -->

<!-- /CSS -->

<div class="container">

<div class="row">
    <div class="col-md-12">
        <!-- TABS -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="Datos_personales-tab" data-toggle="tab" href="#Datos_personales" role="tab" aria-controls="Datos_personales" aria-selected="true">Datos personales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Desarrollo-tab" data-toggle="tab" href="#Desarrollo" role="tab" aria-controls="Desarrollo" aria-selected="false">Desarrollo académico</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Experiencia_docente-tab" data-toggle="tab" href="#Experiencia_docente" role="tab" aria-controls="Experiencia_docente" aria-selected="false">Experiencia docente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Domicilio-tab" data-toggle="tab" href="#Domicilio" role="tab" aria-controls="Domicilio" aria-selected="false">Domicilio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Referencias-tab" data-toggle="tab" href="#Referencias" role="tab" aria-controls="Referencias" aria-selected="false">Referencias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Socioeconomicos-tab" data-toggle="tab" href="#Socioeconomicos" role="tab" aria-controls="Socioeconomicos" aria-selected="false">Socioeconómicos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Prestaciones-tab" data-toggle="tab" href="#Prestaciones" role="tab" aria-controls="Prestaciones" aria-selected="false">Prestaciones</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Datos_personales" role="tabpanel" aria-labelledby="Datos_personales-tab">
                <div class="container">
               
                    <div class="Content">
                    <br>                  
                    <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4">
                            <strong class="titulo">Datos personales</strong>
                        </div>
                    </div>
                    <br>
                        <br>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="clr">*</span>CURP
                            <input type="text" id="@pCURP" name="@pCURP" class="form-control">
                        </div>
                        <div class="col-md-4">
                        <span class="clr">*</span>Nombre
                            <input type="text" id="@pNOMBRE" name="@pNOMBRE" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Apellido paterno
                            <input type="text" id="@pPATERNO" name="@pPATERNO" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="clr">*</span>Apellido materno
                            <input type="text" id="@pMATERNO" name="@pMATERNO" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Sexo
                            <select name="" id="" class="form-control" id="@pSEXO" name="@pSEXO"></select>
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Fecha de nacimiento
                            <input type="date" name="" id="" id="@pFECHA_NAC" name="@pFECHA_NAC" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                        <span class="clr">*</span>País de nacimiento
                        <select name="" id="" class="form-control" id="@pID_PAIS_NAC" name="@pID_PAIS_NAC"><option value="">Seleccione</option></select>
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Entidad federativa de nacimiento
                            <select name="" id="" class="form-control" id="@pID_ENTIDAD_NAC" name="@pID_ENTIDAD_NAC"></select>
                        </div>
                        <div class="col-md-4">
                        <span class="clr">*</span> Municipio o delegación de nacimiento
                            <select name="" id="" class="form-control" id="@pID_MUNICIPIO_NAC" name="@pID_MUNICIPIO_NAC"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Ciudad o población de nacimiento
                            <select name="" id="" class="form-control" id="@pCIUDAD_NAC" name="@pCIUDAD_NAC"></select>
                        </div>
                        <div class="col-md-4">
                        <span class="clr">*</span>Nacionalidad
                            <select name="" id="" class="form-control" id="@pID_NACIONALIDAD" name="@pID_NACIONALIDAD"></select>
                        </div>
                        <div class="col-md-4">
                        <span class="clr">*</span>Modo de nacionalidad
                            <select name="" id="" class="form-control" id="@pMODO_NACIONALIDAD" name="@pMODO_NACIONALIDAD"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Fecha de nacionalidad
                        <input type="date" id="@pFECHA_NACIONALIDAD" name="@pFECHA_NACIONALIDAD" class="form-control">
                        </div>
                        <div class="col-md-4">
                        <span class="clr">*</span>RFC
                            <input type="text" id="@pRFC" name="@pRFC" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Estado civil
                            <select name="" id="" class="form-control" id="@pID_ESTADO_CIVIL" name="@pID_ESTADO_CIVIL"><option value="">Seleccione</option></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Cartilla del SMN
                            <input type="text" id="@pCARTILLA_SMN" name="@pCARTILLA_SMN" class="form-control">
                        </div>
                        <div class="col-md-4">
                            Clave de elector
                            <input type="text" id="@pCREDENCIAL_LECTOR" name="@pCREDENCIAL_LECTOR" class="form-control">
                        </div>
                        <div class="col-md-4">
                            Pasaporte
                            <input type="text" id="@pPASAPORTE" name="@pPASAPORTE" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Licencia de conducir
                        <input type="text" id="@pLICENCIA" name="@pLICENCIA" class="form-control">
                        </div>
                        <div class="col-md-4">
                        <span class="clr">*</span>Vigencia de licencia
                            <input type="date" id="@pLICENCIA_VIG" name="@pLICENCIA_VIG" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>CUIP
                            <input type="text" id="@pCUIP" name="@pCUIP" class="form-control">
                        </div>
                    </div>
                        <br>
                        <hr>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                 <span class="clr">*</span>CIB
                                <input type="text" class="form-control">
                            
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Motivo de cambio de CIB <!-- PENDIENTE -->
                                <input type="text" class="form-control">
                                <br>
                                <button class="btn btn-default"> Generar CIB</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="table" class="table display" style="width:100%">
                                    <thead>
                                        <th>CIB</th>
                                        <th>Motivo</th>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       
                    </div>
                   
                    <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                </div>
            </div>
            <div class="tab-pane fade" id="Desarrollo" role="tabpanel" aria-labelledby="Desarrollo-tab">
            <div class="Content">
                    <br>                  
                    <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4">
                            <strong class="titulo">Desarrollo académico</strong>
                        </div>
                    </div>
                    <br>
                      
                       <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Máxima escolaridad
                                <select name="" id="" class="form-control" id="@pID_GRADO_ESCOLAR" name="@pID_GRADO_ESCOLAR"></select>
                            </div>
                            <div class="col-md-4">
                                Escuela
                                <input type="text" class="form-control" id="@pNOMBRE_ESCUELA" name="@pNOMBRE_ESCUELA">
                            </div>
                            <div class="col-md-4">
                                Especialidad o estudio
                                <input type="text" class="form-control" id="@pESPECIALIDAD" name="@pESPECIALIDAD">
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Cédula profesional
                                <input type="text" class="form-control" id="@pCEDULA_PROFESIONAL" name="@pCEDULA_PROFESIONAL">
                            </div>
                            <div class="col-md-4">
                                Año de inicio
                                <input type="date" class="form-control" id="@pINICIO" name="@pINICIO">
                            </div>
                            <div class="col-md-4">
                                Año de término
                                <input type="date" class="form-control" id="@pTERMINO" name="@pTERMINO">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                              Registro SEP
                             <input type="text" class="form-control" id="@pREGISTRO_SEP" name="@pREGISTRO_SEP">
                            </div>
                            <div class="col-md-4">
                                Número de folio de certificado
                                <input type="text" class="form-control" id="@pFOLIO_CERTIFICADO" name="@pFOLIO_CERTIFICADO">
                            </div>
                            <div class="col-md-4">
                                Promedio
                                <input type="text" class="form-control" id="@pPROMEDIO" name="@pPROMEDIO">
                            </div>

                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-default">Guardar desarrollo académico</button>
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
                        <div class="row">
                            <table id="table" class="table display" style="width:100%">
                                <thead>
                                    <th>ID nivel</th>
                                    <th>Máxima escolaridad</th>
                                    <th>Especialidad</th>
                                    <th>Inicio</th>
                                    <th>Término</th>
                                    <th>Promedio</th>
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
                    
                    <input type="button" name="previous" class="previous action-button-previous" style="height:40px;" value="Anterior"/>
                    <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
            </div>
            <div class="tab-pane fade" id="Experiencia_docente" role="tabpanel" aria-labelledby="Experiencia_docente-tab">
            <div class="Content">
                    <br>                  
                    <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4">
                            <strong class="titulo">Experiencia docente</strong>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="clr">*</span>Nombre del curso
                            <input type="text" class="form-control" id="@pCURSO" name="@pCURSO">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Nombre de la Institución
                            <input type="text" class="form-control" id="@pINSTITUCION" name="@pINSTITUCION">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Fecha de inicio
                            <input type="date" class="form-control" id="@pFECHA_INICIO" name="@pFECHA_INICIO">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Fecha de término
                            <input type="date"  class="form-control" id="@pFECHA_TERMINO" namne="@pFECHA_TERMINO"> 
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Institución que certifica
                            <input type="text" class="form-control" id="@pCERTIFICADO" name="@pCERTIFICADO">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-default">Guardar información docente</button>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button class="btn btn-default">Limpiar formulario</button>
                        </div>
                    </div>
                    <br><br>
                    <hr>
                    <br><br>
                    <table id="table" class="table display" style="width:100%">
                                <thead>
                                    <th>ID nivel</th>
                                    <th>Máxima escolaridad</th>
                                    <th>Especialidad</th>
                                    <th>Inicio</th>
                                    <th>Término</th>
                                    <th>Promedio</th>
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
            <div class="tab-pane fade" id="Domicilio" role="tabpanel" aria-labelledby="Domicilio">
            <div class="Content">
                    <br>                  
                    <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4">
                            <strong class="titulo">Domicilio</strong>
                        </div>
                    </div>
                    <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Código postal
                                <input type="text" class="form-control" id="@pCODIGO_POSTAL" name="@pCODIGO_POSTAL">
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Entidad federativa
                                <select name="" id="" class="form-control" id="@pID_ENTIDAD" name="@pID_ENTIDAD"></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Municipio
                                <select name="" id="" class="form-control" id="@pID_MUNICIPIO" name="@pID_MUNICIPIO"></select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Colonia/localidad
                                <input type="text" class="form-control" id="@pCOLONIA" name="@pCOLONIA">
                            </div>
                            <div class="col-md-4">
                                Ciudad
                                <input type="text" class="form-control" id="@pCIUDAD" name="@pCIUDAD">
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Calle
                                <input type="text" class="form-control" id="@pCALLE" name="@pCALLE">
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Número exterior
                                <input type="text" class="form-control" id="@pNUM_EXTERIOR" name="@pNUM_EXTERIOR">
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Número interior
                                <input type="text" class="form-control" id="@pNUM_INTERIOR" name="@pNUM_INTERIOR">
                            </div>
                        
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Entre calle de
                                <input type="text" class="form-control" id="@pENTRE_CALLE" name="@pENTRE_CALLE">
                            </div>
                            <div class="col-md-4">
                                Y la calle de 
                                <input type="text" class="form-control" id="@pY_CALLE" name="@pY_CALLE">
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Número telefónico
                                <input type="text" class="form-control" id="@pTELEFONO" name="@pTELEFONO">
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>RFC
                                <input type="text" class="form-control" id="@pRFC" name="@pRFC">
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-default">Guardar domicilio</button>
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
                        <table id="table" class="table display" style="width:100%">
                            <thead>
                                <th>Id domicilio</th>
                                <th>Calle </th>
                                <th>Número ext.</th>
                                <th>Número int.</th>
                                <th>Colonia </th>
                                <th>C.P.</th>
                                <th>Entidad</th>
                                <th>Domicilio</th>
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
                                    <td></td>
                                </tr>
                            </tbody>
                        
                        </table>

                    </div>
                   
                    <input type="button" name="previous" class="previous action-button-previous" style="height:40px;" value="Anterior"/>
                    <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
            </div>
            <div class="tab-pane fade" id="Referencias" role="tabpanel" aria-labelledby="Referencias">
            <br>                  
                    <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4">
                            <strong class="titulo">Referencias</strong>
                        </div>
                    </div>
                    <br>
                <div class="row">
                          
                          <div class="col-md-4">
                              <span class="clr">*</span>Apellido paterno
                              <input type="text" id="@pPATERNO" name="@pPATERNO" class="form-control">
                          </div>
                      
                          <div class="col-md-4">
                              Apellido materno
                              <input type="text" class="form-control" id="@pMATERNO" name="@pMATERNO">
                          </div>

                          <div class="col-md-4">
                              <span class="clr">*</span>Nombre
                                  <input type="text" id="@pNOMBRE" name="@pNOMBRE" class="form-control">
                          </div>
                     
                      </div>
                      <br>
                      <div class="row">
                          <div class="col-md-4">
                              <span class="clr">*</span>Sexo
                              <select name="@pSEXO" id="@pSEXO" class="form-control"></select>
                          </div>
                          <div class="col-md-4">
                              <span class="clr">*</span>Ocupación
                              <input type="text" name="@pOCUPACION" id="@pOCUPACION" class="form-control">
                          </div>
                          <div class="col-md-4">
                              <span class="clr">*</span>Tipo de referencia
                              <select name="" id="@pID_TIPO_REFERENCIA" name="@pID_TIPO_REFERENCIA" class="form-control"></select>
                          </div>
                      </div>

                      <br>
                      <div class="row">
                          <div class="col-md-4">
                              Relación o parentesco
                              <select name="@pID_RELACION" id="@pID_RELACION" class="form-control"></select>
                          </div>
                         
                      </div>
                      <br>
                      <div class="row">
                          <div class="col-md-4">
                              Código postal
                              <input type="text" id="@pCODIGO_POSTAL" name="@pCODIGO_POSTAL" class="form-control">
                          </div>
                          <div class="col-md-4">
                              <span class="clr">*</span>Entidad federativa
                              <select name="" id="@pID_ENTIDAD" name="@pID_ENTIDAD" class="form-control"></select>
                          </div>
                          <div class="col-md-4">
                              <span class="clr">*</span>Municipio
                              <select name="@pID_MUNICIPIO" id="@pID_MUNICIPIO" class="form-control"></select>
                          </div>
                      </div>
                      <br>
                      <div class="row">
                          <div class="col-md-4">
                              <span class="clr">*</span>Colonia/localidad
                              <input type="text"  id="@pCOLONIA" name="@pCOLONIA" class="form-control">
                          </div>
                          <div class="col-md-4">
                              Ciudad
                              <input type="text" id="@pCIUDAD" name="@pCIUDAD" class="form-control">
                          </div>
                          <div class="col-md-4">
                              <span class="clr">*</span>Calle
                              <input type="text" id="@pCALLE" name="@pCALLE" class="form-control">
                          </div>

                      </div>
                      <br>
                      <div class="row">
                          <div class="col-md-4">
                              <span class="clr">*</span>Número exterior
                              <input type="text" class="form-control" name="@pNUM_EXTERIOR" id="@pNUM_EXTERIOR">
                          </div>
                          <div class="col-md-4">
                              Número interior
                              <input type="text" class="form-control" name="@pNUM_INTERIOR" id="@pNUM_INTERIOR">
                          </div>
                      
                          
                      </div>
                      <br>
                      <div class="row">
                          <div class="col-md-4">
                              Entre calle de
                              <input type="text" class="form-control" id="@pENTRE_CALLE" name="@pENTRE_CALLE">
                          </div>
                          <div class="col-md-4">
                              Y la calle de 
                              <input type="text" class="form-control" id="@pY_CALLE" name="@pY_CALLE">
                          </div>
                       </div>   
                      <br>
                     
                      <br>
                      <div class="row">
                          <div class="col-md-4">
                              <button class="btn btn-default">Guardar referencia</button>
                          </div>
                          <div class="col-md-4"></div>
                          <div class="col-md-4">
                              <button class="btn btn-default">Limpiar formulario</button>
                          </div>
                      </div>
                      <br>
                      <hr>
                      <br>
                      <table id="table" class="table display" style="width:100%">
                          <thead>
                              <th>Id referencia</th>
                              <th>Paterno</th>
                              <th>Nombre</th>
                              <th>Tipo de referencia</th>
                              <th>Id domicilio</th>
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
              
                   <input type="button" name="previous" class="previous action-button-previous" style="height:40px;" value="Anterior"/>
                  <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
            </div>
            <div class="tab-pane fade" id="Socioeconomicos" role="tabpanel" aria-labelledby="Socioeconomicos">
            <div class="Content">
                    <br>                  
                    <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4">
                            <strong class="titulo">Socioeconómicos</strong>
                        </div>
                    </div>
                    <br>
                       <div class="row">
                            <div class="col-md-4">
                                Vive con su familia
                                <select name="" id="" class="form-control" id="@pVIVE_FAMILIA" name="@pVIVE_FAMILIA"></select>
                            </div>
                            <div class="col-md-4">
                                Ingreso familiar adicional mensual
                                <input type="text" class="form-control" id="@pINGRESO_FAMILIAR" name="@pINGRESO_FAMILIAR">
                            </div>
                            <div class="col-md-4">
                                Su domicilio es
                                <select name="@pID_TIPO_DOMICILIO" id="@pID_TIPO_DOMICILIO" class="form-control">
                                <option value="">Seleccione</option></select>
                            </div>
                       </div>
                       <br>
                       <div class="row">
                            <div class="col-md-4" style="margin-top: -20px;">
                                Actividades culturales o deportivas que practica
                                <input type="text" class="form-control" id="@pACTIVIDAD_CULTURAL" name="@pACTIVIDAD_CULTURAL">
                            </div>
                            <div class="col-md-4">
                                Especificación de inmuebeles y costos
                                <input type="text" class="form-control" id="@pINMUEBLES" name="@pINMUEBLES">
                            </div>
                            <div class="col-md-4">
                                Inversión y monto aproximado
                                <input type="text" class="form-control" id="@pINVERSIONES" name="@pINVERSIONES">
                            </div>
                        
                       </div>
                       <br>
                       <br>
                       <div class="row">
                            <div class="col-md-4">
                                Vehículo y costo aproximado
                                <input type="text" class="form-control" id="@pNUMERO_AUTOS" name="@pNUMERO_AUTOS">
                                <!-- ¿? -->
                            </div>
                            <div class="col-md-4">
                                Calidad de vida 
                                <input type="text" class="form-control" id="@pCALIDAD_VIDA" name="@pCALIDAD_VIDA">
                            </div>
                            <div class="col-md-4">
                                Vicios
                                <input type="text" class="form-control" id="@pVICIOS" name="@VICIOS">
                            </div>
                        
                       </div>
                       <br>
                       <div class="row">
                            <div class="col-md-4" >
                                Imágen pública 
                                <input type="text" class="form-control" id="@pIMAGEN_PUBLICA" name="@pIMAGEN_PUBLICA">
                            
                            </div>
                            <div class="col-md-4">
                                Comportamiento social
                                <input type="text" class="form-control" id="@pCOMPORTA_SOCIAL" name="@pCOMPORTA_SOCIAL">
                            </div>
                       </div>
                       <br>
                       <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button class="btn btn-default">Guardar socioeconómico</button>
                            </div>
                            <div class="col-md-4">
                            
                            </div>
                       </div>
                       <br>
                       <hr>
                       <br>
                       <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                            <div class="col-md-4">
                                <strong>Dependientes económicos</strong>
                            </div>
                       </div>
                       <br>
                       <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Apellido paterno
                                <input type="text" class="form-control" id="@pPATERNO" name="@pPATERNO" >
                            </div>
                            <div class="col-md-4">
                                Apellido materno
                                <input type="text" class="form-control" id="@pMATERNO" name="@pMATERNO">
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Nombre
                                <input type="text" class="form-control" id="@pNOMBRE" name="@pNOMBRE">
                            </div>
                       </div>
                       <br>
                       <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Fecha de nacimiento
                                <input type="date" class="form-control" id="@pFECHA_NAC" name="@pFECHA_NAC">
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Sexo
                                <select name="" id="" class="form-control" id="@pSEXO" name="@pSEXO"></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Parentesco
                                <select name="" id="" class="form-control" id="@p"></select>
                            </div>
                       </div>
                       <br>
                       <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-default">Guardar dependiente</button>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button class="btn btn-default">Limpiar dependiente</button>
                            </div>
                       </div>
                       <br>
                        <div class="row">
                        <div class="col-md-1">
                        
                        </div>
                        <div class="col-md-10">
                        
                        <table>
                            <thead id="table" class="table display" style="width:100%">
                                <th>ID dependiente</th>
                                <th>Paterno</th>
                                <th>Materno</th>
                                <th>Nombre</th>
                                <th>Fecha nacimiento</th>
                                <th>Sexo</th>
                                <th>Parentesco</th>
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
                        <div class="col-md-1">
                        </div>
                        </div>
                       <br><br>
                    </div>
                    
                    <input type="button" name="previous" class="previous action-button-previous" style="height:40px;" value="Anterior"/>
                    <input type="submit" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
            </div>
            <div class="tab-pane fade" id="Prestaciones" role="tabpanel" aria-labelledby="Prestaciones">
            <div class="Content">
                    <br>                  
                    <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4">
                            <strong class="titulo">Prestaciones</strong>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="clr">*</span>Tipo
                            <select name="" id="" class="form-control" id="@pID_TIPO_PRESTACION" name="@pID_TIPO_PRESTACION"></select>
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Fecha
                            <input type="date" class="form-control" id="@pFECHA" name="@pFECHA">
                        </div>
                        <div class="col-md-4">
                        <span class="clr">*</span>Monto 
                            <input type="text" class="form-control" id="@pMONTO" name="@pMONTO">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-default">Guardar prestación</button>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button class="btn btn-default">Limpiar formulario</button>
                        </div>
                    </div>
                    <br><br>
                    <hr>
                    <br><br>
                    <table class="table table-bordered">
                        <thead>
                            <th>Id presentación</th>
                            <th>Tipo presentación</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Justificación</th>
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
                    
                   <input type="button" name="previous" class="previous action-button-previous" style="height:40px;" value="Anterior"/>
                    
                    <input type="submit" name="submit" class="submit action-button" style="height:40px;" value="Finalizar"/>
            
            </div>
        </div>
        <!-- FIN - Experiencia_docente -->
      </div>
    </div>
</div>



<!-- JS -->
<script src="<?php echo base_url("assets/vendor/datatable/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url('assets/vendor/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/plugins/datetimepicker/js/daterangepicker.js') ?>"></script>
<!-- <script src="<?php echo base_url('assets/js/views/ejemplosView.js') ?>"></script> -->
<!-- <script src="<?php echo base_url('assets/js/utils/catalogs.js') ?>"></script> -->
<!-- <script src="<?php echo base_url('assets/js/utils/serialized.js') ?>"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> -->
<!-- <script> -->
	<!-- $(function() { -->
        <!-- objView.init(); -->
    <!-- }); -->
<!-- </script> -->
<!-- /JS -->