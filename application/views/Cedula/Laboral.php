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
                    <a class="nav-link active" id="Empleos_en_seguridad_publica-tab" data-toggle="tab" href="#Empleos_en_seguridad_publica" role="tab" aria-controls="Empleos_en_seguridad_publica" aria-selected="true">Empleos en seguridad pública</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Empleos_diversos-tab" data-toggle="tab" href="#Empleos_diversos" role="tab" aria-controls="Empleos_diversos" aria-selected="false">Empleos diversos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Adscripcion_actual-tab" data-toggle="tab" href="#Adscripcion_actual" role="tab" aria-controls="Adscripcion_actual" aria-selected="false">Adscripción actual</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Actitudes_hacia_el_empleo-tab" data-toggle="tab" href="#Actitudes_hacia_el_empleo" role="tab" aria-controls="Actitudes_hacia_el_empleo" aria-selected="false">Actitudes hacia el empleo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Disciplina_policial-tab" data-toggle="tab" href="#Disciplina_policial" role="tab" aria-controls="Disciplina_policial" aria-selected="false">Disciplina policial</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="Comisiones-tab" data-toggle="tab" href="#Comisiones" role="tab" aria-controls="Comisiones" aria-selected="false">Comisiones</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="Empleos_en_seguridad_publica" role="tabpanel" aria-labelledby="Empleos_en_seguridad_publica-tab">
                    <div class="container">
                        <form action="#" autocomplete="off">  
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <strong class="titulo">Empleos en seguridad pública</strong>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="clr">*</span>Dependencia <!-- Se llena del catalogo "DEPENDENCIA" -->
                                            <select  class="form-control" id="pID_DEPENDENCIA" name="pID_DEPENDENCIA">
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <sppan class="clr">*</sppan>Corporación <!-- Se llena del catalogo "INSTITUCION" -->
                                            <select  class="form-control" id="pINSTITUCION" name="pINSTITUCION">
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Domicilio de la corporación</strong>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Calle
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            Colonia
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            Número exterior
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Número interior
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            Código postal
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            Ciudad
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Número telefónico
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                        <span class="clr">*</span>Ingreso
                                            <input type="date" id="pFECHA_INGRESO" name="pFECHA_INGRESO" required  class="form-control"  class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <span class="clr">*</span>Separación
                                            <input type="date" id="pFECHA_BAJA" name="pFECHA_BAJA" required  class="form-control" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <span class="clr">*</span>Puesto funcional <!-- Se llena del catalogo "PUESTO" -->
                                            <select  class="form-control" id="pID_PUESTO" name="pID_PUESTO" required  class="form-control">
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Funciones
                                            <input type="text" id="pFUNCIONES" name="pFUNCIONES"  class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            Especialidad
                                            <input type="text" id="pESPECIALIDAD" name="pESPECIALIDAD"  class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            Rango o categoría
                                            <input type="text" id="pRANGO" name="pRANGO"  class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Nivel de mando <!-- Se llena del catalogo "NIVEL_MANDO" -->
                                            <select  class="form-control" id="pID_NIVEL_MANDO" name="pID_NIVEL_MANDO"></select>
                                        </div>
                                        <div class="col-md-4">
                                            Número de placa
                                            <input type="text" id="pNUMERO_PLACA" name="pNUMERO_PLACA"  class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            Número de empleado
                                            <input type="text" id="pNUMERO_EMPLEADO" name="pNUMERO_EMPLEADO"  class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Sueldo base(Mensual)
                                            <input type="text" id="SUELDO_BASE" name="SUELDO_BASE"  class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            Compensaciones(Mensuales)
                                            <input type="text" id="pCOMPENSACION" name="pCOMPENSACION"  class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            Área
                                            <input type="text"  class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            División
                                            <input type="text" id="pDIVISION" name="pDIVISION"  class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            CUIP del jefe inmediato
                                            <input type="text"  class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            Nombre del jefe inmediato
                                            <input type="text"  class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="clr">*</span>Entidad federativa <!-- Se llena del catalogo "ENTIDAD" -->
                                            <select  class="form-control" id="pID_ENTIDAD" name="pID_ENTIDAD" required>
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="clr">*</span>Municipio o delegación <!-- Se llena del catalogo "MUNICIPIO" dependiendo de la entidad -->
                                            <select  class="form-control" id="pID_MUNICIPIO" name="pID_MUNICIPIO" required>
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="clr">*</span>Motivo de separación <!-- Se llena del catalogo "MOTIVO_MOV_LAB" -->
                                            <select  class="form-control" id="pID_MOTIVO_MOV_LAB" name="pID_MOTIVO_MOV_LAB" required><option value="">Seleccione</option></select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="clr">*</span>Tipo de separación <!-- Se llena del catalogo "TIPO_MOV_LAB" -->
                                            <select  class="form-control" id="ID_TIPO_MOV_LAB" name="ID_TIPO_MOV_LAB" required>
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            Tipo de baja <!-- Existe "TIPO_BAJA" (ELEMENTO) "TIPO_BAJA_INSC"(ASPIRANTE) -->
                                            <select  class="form-control" id="pID_TIPO_BAJA" name="pID_TIPO_BAJA">
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            Comentarios
                                            <input type="text" id="pOBSERVACION_BAJA" name="pOBSERVACION_BAJA"  class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Funciones del puesto <!-- Se llena del catalogo "FUNCION_PUESTO" -->
                                            <select  class="form-control" id="pID_FUNCION_PUESTO" name="pID_FUNCION_PUESTO"></select>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="row">
                                                                <div class="col-md-4">
                                        <button class="btn btn-light">Guardar empleo</button>
                                    </div>
                                    <div class="col-md-4">
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-light">Limpiar formato</button>
                                    </div>
                                    </div>
                                    <br>
                                    <div class="row">                
                                        <div class="col-md-12">
                                            <table id="table" class="table display">
                                                <thead>
                                                    <tr>
                                                        <th>Id empleo en SP.</th>
                                                        <th>Dependencia</th>
                                                        <th>Corporación</th>
                                                        <th>Ingreso</th>
                                                        <th>Separación</th>
                                                        <th>Número de empleado</th>
                                                        <th>Entidad</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- HIDDEN INPUTS -->
                                     <input type="number" id="pID_ALTERNA" name="pID_ESTADO_EMISOR" autocomplete="off" hidden>
                                     <input type="number" id="pID_ESTADO_EMISOR" name="pID_ALTERNA" autocomplete="off" hidden>
                                     <input type="number" id="pID_EMISOR" name="pID_EMISOR" autocomplete="off" hidden>
                                     <input type="number" id="pID_DOC_BAJA" name="pID_DOC_BAJA" autocomplete="off" hidden>
                                     <input type="number" id="pID_DOC_BAJA" name="pID_DOC_BAJA" autocomplete="off" hidden>
                                     <input type="number" id="pID_TIPO_CONTRATO" name="pID_TIPO_CONTRATO" autocomplete="off" hidden>
                                     <input type="number" id="pID_TIPO_CONTRATO" name="pID_TIPO_CONTRATO" autocomplete="off" hidden>
                                     <input type="text" id="pNUMERO_EXPEDIENTE" name="pNUMERO_EXPEDIENTE" autocomplete="off" hidden>
                                     <input type="number" id="pID_CATEGORIA_PUEST" name="pID_CATEGORIA_PUEST" autocomplete="off" hidden>
                                     <input type="number" id="pID_JERARQUIA_PUEST" name="pID_JERARQUIA_PUEST" autocomplete="off" hidden>
                                     <input type="number" id="pID_AMBITO_PUESTO" name="pID_AMBITO_PUESTO" autocomplete="off" hidden>
                        </form> 
                        <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                    </div>
                </div>

                <div class="tab-pane fade" id="Empleos_diversos" role="tabpanel" aria-labelledby="Empleos_diversos-tab">
                    <div class="container">
                        <form action="#" autocomplete="off">  
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <strong class="titulo">Empleos diversos</strong>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Empresa
                                        <input type="text" id="pEMPRESA" name="pEMPRESA" required  class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Código postal
                                        <input type="text" id="pCP_EMP" name="pCP_EMP" required  class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Entidad <!-- Se llena del catalogo "ENTIDAD" -->
                                        <select  class="form-control">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        Municipio <!-- Se llena del catalogo "MUNICIPIO" dependiendo del catalogo "ENTIDAD" -->
                                        <select  class="form-control" id="pID_MUNICIPIO" name="pID_MUNICIPIO" required></select>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Colonias
                                        <input type="text" id="pCOLONIA_EMP" name="pCOLONIA_EMP" required  class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                      <span class="clr">*</span>Calle y número
                                        <input type="text" id="pCALLE_Y_NUM_EMP" name="pCALLE_Y_NUM_EMP" required  class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                   <div class="col-md-4">
                                        Número telefónico
                                    <input type="text" id="pNUM_TELEFONICO" name="pNUM_TELEFONICO"  class="form-control">
                                   </div>
                                   <div class="col-md-4">
                                       <span class="clr">*</span>Área o departamento
                                       <input type="text" id="pDESCRIP_AREA" name="pDESCRIP_AREA" required  class="form-control">
                                   </div>
                                   <div class="col-md-4">
                                       Funciones
                                       <input type="text" id="pDESCRIP_FUNCION" name="pDESCRIP_FUNCION"  class="form-control">
                                   </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        Ingreso neto mensual
                                        <input type="text" id="pSUELDO" name="pSUELDO"  class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Ingreso
                                        <input type="date" id="pFECHA_INICIO" name="pFECHA_INICIO" required  class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Separación
                                        <input type="date" id="pFECHA_TERMINO" name="pFECHA_TERMINO" required  class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Motivo de separación <!-- Se llena del catalogo "MOTIVO_LAB" -->
                                        <select  class="form-control" id="pID_MOTIVO_MOV_LAB" name="pID_MOTIVO_MOV_LAB" required >
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Tipo de separación <!-- Se llena del catalogo "TIPO_MOV_LAB" -->
                                        <select  class="form-control" id="ID_TIPO_MOV_LAB" name="ID_TIPO_MOV_LAB" required>
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        Descripción
                                        <input type="text" id="pDESCRIPCION" name="pDESCRIPCION" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                    <button class="btn btn-light">Guardar empleo</button>
                                    </div>
                                    <div class="col-md-4">
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-light">Limpiar formato</button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">                
                                    <div class="col-md-12">
                                        <table id="table" class="table display">
                                            <thead>
                                                <tr>
                                                    <th>Id empleo adicional</th>
                                                    <th>Empresa</th>
                                                    <th>Número telefónico</th>
                                                    <th>Área o departamento</th>
                                                    <th>Ingreso neto mensual</th>
                                                    <th>Ingreso</th>
                                                    <th>Separación</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            <!-- HIDDEN INPUTS -->
                            <input type="number" id="pID_ALTERNA" name="pID_ALTERNA" autocomplete="off" hidden>
                            <input type="number" id="pID_ESTADO_EMISOR" name="pID_ESTADO_EMISOR" autocomplete="off" hidden>
                            <input type="number" id="pID_EMISOR" name="pID_EMISOR" autocomplete="off" hidden>
                            </form> 
                        <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                    </div>
                </div>
                <div class="tab-pane fade" id="Adscripcion_actual" role="tabpanel" aria-labelledby="Adscripcion_actual-tab">
                    <div class="container">
                        <form action="#" autocomplete="off">
                      
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <strong class="titulo">Adscripción actual</strong>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Adscripción de la persona</strong>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="clr">*</span>Dependencia <!-- Se llena del catalogo "DEPENDENCIA" -->
                                        <select  class="form-control">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="clr">*</span>Corporación <!-- Se llena del catalogo "INSTITUCION" -->
                                        <select  class="form-control" id="pINSTITUCION" name="pINSTITUCION" required>
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Domicilio de la corporación</strong>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Código postal
                                        <input type="text" class="form-control" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Entidad federativa <!-- Se llena del catalogo "ENTIDAD" -->
                                        <select  class="form-control" id="pID_ENTIDAD" name="pID_ENTIDAD" required></select>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Municipio <!-- Se llena del catalogo "MUNICIPIO" dependiendo del catalogo de "ENTIDAD" -->
                                        <select  class="form-control" id="pID_MUNICIPIO" name="pID_MUNICIPIO" required></select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Colonia/localidad
                                        <input type="text" class="form-control" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        Ciudad
                                        <input type="text" class="form-control" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Calle
                                        <input type="text" class="form-control">
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Número exterior
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        Número interior
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                    <span class="clr">*</span>Número telefónico
                                        <input type="text" class="form-control">
                                    </div>
                                
                                    
                                </div>
                        
                             
                                <br>
                                <hr>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Ingreso
                                        <input type="date" id="pFECHA_INGRESO" name="pFECHA_INGRESO" required class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Puesto <!-- Se llena del catalogo "PUESTO" -->
                                        <select  class="form-control" id="pPUESTO" name="pPuesto">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        Especialidad
                                        <input type="text" id="pESPECIALIDAD" name="pESPECIALIDAD" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        Rango o categoría
                                    <input type="text" id="pRANGO" name="pRANGO" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        Nivel de mando <!-- Se llena del catalogo "NIVEL_MANDO" -->
                                        <select  class="form-control" id="pID_NIVEL_MANDO" name="pID_NIVEL_MANDO">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        Número de placa
                                        <input type="text" id="pNUMERO_PLACA" name="pNUMERO_PLACA" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        Número de expediente
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        Sueldo base $
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        Compensaciones
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        Área <!-- Se llena del catalogo "AREA" -->
                                    <select  class="form-control" id="pID_AREA" name="pID_AREA"></select>
                                    </div>
                                    <div class="col-md-4">
                                        División
                                        <input type="text" id="pDIVISION" name="pDIVISION"  class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        Funciones
                                        <input type="text"  id="pFUNCIONES" name="pFUNCIONES" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        CUIP del jefe inmediato
                                        <input type="text" id="ID_JEFE" name="ID_JEFE" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        Nombre del jefe inmediato
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Entidad federativa <!-- Se llena del catalogo "ENTIDAD" -->
                                        <select  class="form-control" id="pID_ENTIDAD" name="pID_ENTIDAD" required></select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="clr">*</span>Municipio o delegación <!-- Se llena del catalogo "MUNICIPIO" dependiendo del catalogo de "ENTIDAD" -->
                                        <select  class="form-control" id="pID_MUNICIPIO" name="pID_MUNICIPIO" required></select>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button class="btn btn-light">Guardar adscripción</button>
                                    </div>
                                    <div class="col-md-4">
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-light">Limpiar formato</button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-md-12">
                                    <!-- BEGIN TABLE -->
                                    <table id="table" class="table display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id adscripción</th>
                                                <th>Dependencia</th>
                                                <th>Corporación</th>
                                                <th>Área</th>
                                                <th>Puesto</th>
                                                <th>Entidad</th>
                                                <th>Municipio</th>
                                            </tr>
                                        </thead>
                                      <tbody>  
                                          <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                         
                                      </tbody>
                                    </table>
                                    <!-- END TABLE -->
                                  </div>
                                </div>

                                <!-- INPUTS OCULTOS -->
                                <input type="number" id="pID_ALTERNA" name="pID_ESTADO_EMISOR" autocomplete="off" hidden>
                                <input type="number" id="pID_ESTADO_EMISOR" name="pID_ALTERNA" autocomplete="off" hidden>
                                 <input type="number" id="pID_EMISOR" name="pID_EMISOR" autocomplete="off" hidden>
                                 <input type="number" id="pID_DOC_BAJA" name="pID_DOC_BAJA" autocomplete="off" hidden>
                                 <input type="number" id="pID_DOC_BAJA" name="pID_DOC_BAJA" autocomplete="off" hidden>
                                 <input type="number" id="pID_TIPO_CONTRATO" name="pID_TIPO_CONTRATO" autocomplete="off" hidden>
                                 <input type="number" id="pID_TIPO_CONTRATO" name="pID_TIPO_CONTRATO" autocomplete="off" hidden>
                                 <input type="text" id="pNUMERO_EXPEDIENTE" name="pNUMERO_EXPEDIENTE" autocomplete="off" hidden>
                                 <input type="number" id="pID_CATEGORIA_PUEST" name="pID_CATEGORIA_PUEST" autocomplete="off" hidden>
                                 <input type="number" id="pID_JERARQUIA_PUEST" name="pID_JERARQUIA_PUEST" autocomplete="off" hidden>
                                 <input type="number" id="pID_AMBITO_PUESTO" name="pID_AMBITO_PUESTO" autocomplete="off" hidden>
                            </form> 
                        <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                    </div>
                </div>
                <div class="tab-pane fade" id="Actitudes_hacia_el_empleo" role="tabpanel" aria-labelledby="Actitudes_hacia_el_empleo-tab">
                    <div class="container">
                        <form action="#" autocomplete="off">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    
                                </div>
                                <div class="col-md-4">
                                    <strong class="titulo">Actitudes hacia el empleo</strong>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    ¿Por qué eligió éste empleo?
                                    <input type="text" id="pELECCION_EMPLEO" name="pELECCION_EMPLEO" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    ¿Qué puesto desearía tener?
                                    <input type="text" id="pPUESTO" name="pPUESTO" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    ¿En qué área desearía estar?
                                <input type="text" id="pAREA" name="pAREA" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4" style="margin-top: 27px;">
                                    ¿En qué tiempo desea ascender?
                                    <input type="text" id="pTIEMPO_ASCENDER" name="pTIEMPO_ASCENDER" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    ¿Conoce el reglamento de los reconocimientos? <!-- S/N = SI/NO -->
                                    <select id="pCONOCE_REG_RECON" name="pCONOCE_REG_RECON" class="form-control"><option value="" id="">Seleccione</option></select>
                                </div>
                                <div class="col-md-4" style="margin-top: 11px;">
                                    ¿Razones por las que no ha obtenido un reconocimiento?
                                    <input type="text" id="pRAZON_NO_RECON" name="pRAZON_NO_RECON" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    ¿Conoce la reglamentación de los ascensos? <!-- S/N = SI/NO -->
                                    <select  class="form-control" id="pCONOCE_REG_ASCENSO" name="pCONOCE_REG_ASCENSO">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    ¿Razones por las que no ha obtenido un ascenso?
                                    <input type="text" id="pRAZON_NO_RECON" name="pRAZON_NO_RECON" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    ¿Qué capacitación le gustaría recibir?
                                    <input type="text" style="margin-top: 21px;" id="pCAPACITACION" name="pCAPACITACION" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                            <div class="col-md-4">
                                
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-light">Guardar actitud</button>
                            </div>
                            </div>
                            <br>
                            <br>

                            <!-- HIDDEN INPUTS -->
                            <input type="number" id="pID_ALTERNA" name="pID_ESTADO_EMISOR" autocomplete="off" hidden>
                            <input type="number" id="pID_ESTADO_EMISOR" name="pID_ALTERNA" autocomplete="off" hidden>
                            <input type="number" id="pID_EMISOR" name="pID_EMISOR" autocomplete="off" hidden>
                        </form> 
                        <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                    </div>
                </div>
                <div class="tab-pane fade" id="Disciplina_policial" role="tabpanel" aria-labelledby="Disciplina_policial-tab">
                    <div class="container">
                        <form action="#" autocomplete="off">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    
                                </div>
                                <div class="col-md-4">
                                    <strong class="titulo">Disciplina policial</strong>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Tipo disciplina <!-- Se llena del catalogo "TIPO_DISCIPLINA" -->
                                    <select  class="form-control" id="pID_TIPO_DISCIPLINA" name="pID_TIPO_DISCIPLINA" required><option value="">Seleccione</option></select>
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Subtipo disciplina <!-- Se llena del catalogo "SUBTIPO_DISCIPLINA" dependiendo del catalogo "TIPO_DISCIPLINA" -->
                                    <select  class="form-control" id="pID_SUBTIPO_DIS" name="pID_SUBTIPO_DIS" required><option value="">Seleccione</option></select>
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Tipo
                                    <input type="text" id="pTIPO" name="pTIPO" required class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Motivo
                                    <input type="text" id="pMOTIVO" name="pMOTIVO" required class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-light">Guardar disciplina</button>
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-light">Limpiar formato</button>
                            </div>
                            </div>
                            <br>
                            <div class="row">                
                                <div class="col-md-12">
                                    <table id="table" class="table display">
                                        <thead>
                                            <tr>
                                                <th>Id disciplinal</th>
                                                <th>Tipo disciplina</th>
                                                <th>Subtipo disciplina</th>
                                                <th>Motivo</th>
                                                <th>Tipo</th>
                                                <th>Fecha de inicio</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>

                            <!-- HIDDEN INPUTS  -->
                            <input type="number" id="pID_ALTERNA" name="pID_ESTADO_EMISOR" autocomplete="off" hidden>
                            <input type="number" id="pID_ESTADO_EMISOR" name="pID_ALTERNA" autocomplete="off" hidden>
                            <input type="number" id="pID_EMISOR" name="pID_EMISOR" autocomplete="off" hidden>
                            <input type="date" id="pFECHA_INICIO" name="pFECHA_INICIO" autocomplete="off" hidden>
                            <input type="date" id="pFECHA_TERMINO" name="pFECHA_TERMINO" autocomplete="off" hidden>
                            <input type="number" id="pDURACION_DIA" name="pDURACION_DIA" autocomplete="off" hidden>
                            <input type="number" id="pDURACION_SEMANA" name="pDURACION_SEMANA" autocomplete="off" hidden>
                            <input type="number" id="pDURACION_MES" name="pDURACION_MES" autocomplete="off" hidden>



                        </form>
                        <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
                    </div>
                </div>
                <div class="tab-pane fade" id="Comisiones" role="tabpanel" aria-labelledby="Comisiones-tab">
                    <div class="container">
                        <form action="#" autocomplete="off">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    
                                </div>
                                <div class="col-md-4">
                                    <strong class="titulo">Comisiones</strong>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Fecha de inicio
                                    <input type="date"  id="pFECHA_INICIO" name="pFECHA_INICIO" required class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Fecha de término
                                    <input type="date"  id="pFECHA_TERMINO" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Tipo <!-- Se llena del catalogo "TIPO_COMISION" -->
                                    <select  class="form-control" id="ID_TIPO_COMISION" name="ID_TIPO_COMISION" required><option value="">Seleccione</option></select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Motivo <!-- Se llena del catalogo "MOTIVO" -->
                                    <select  class="form-control" id="pID_MOTIVO" name="pID_MOTIVO" required><option value="">Seleccione</option></select>
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Destino
                                    <input type="text" id="pDESTINO" name="pDESTINO" required class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-light">Guardar comisión</button>
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-light">Limpiar formato</button>
                            </div>
                            </div>
                            <br>
                            <div class="row">                
                                <div class="col-md-12">
                                    <table id="table" class="table display">
                                        <thead>
                                            <tr>
                                                <td>Id comisión</td>
                                                <td>Fecha inicio</td>
                                                <td>Fecha término</td>
                                                <td>Tipo</td>
                                                <td>Motivo</td>
                                                <td>Destino</td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>

                            <!-- HIDDEN INPUTS -->
                            <input type="number" id="pID_ALTERNA" name="pID_ESTADO_EMISOR" autocomplete="off" hidden>
                            <input type="number" id="pID_ESTADO_EMISOR" name="pID_ALTERNA" autocomplete="off" hidden>
                            <input type="number" id="pID_EMISOR" name="pID_EMISOR" autocomplete="off" hidden>
                        </form>
                        <input type="button" name="next" class="next action-button" style="height:40px;" value="Siguiente"/>
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