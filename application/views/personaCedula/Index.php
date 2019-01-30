<link rel="stylesheet" href="<?php echo base_url('assets/css/dise.css') ?>">
<div class="row" id="submenu_datos_generales">
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
</div>


<div class="content_submenu_datos_generales">
    <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="datosGenerales" role="tabpanel" aria-labelledby="datosGenerales-tab" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                              <!-- TABS -->
                            <div class="tab-content" id="myTabContent">
                            <!-- Inicio de tab de datos personales -->
                                <div class="tab-pane fade show active" id="Datos_personales" role="tab-panel" aria-labelledby="Datos_personales-tab">
                                    <div class="container">
                                    <br>
                                        <div class="row">
                                            <div class="col-md-4">

                                            </div>
                                            <div class="col-md-4">
                                                <center><strong class="titulo">Datos personales</strong></center>

                                            </div>
                                        </div>
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
                                                <span class="clr">*</span>Estado de nacimiento
                                                <select name="" id="" class="form-control" id="@pID_ENTIDAD_NAC" name="@pID_ENTIDAD_NAC"></select>
                                            </div>
                                            <div class="col-md-4">
                                            <span class="clr">*</span>Municipio de nacimiento
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
                                        <br><hr><br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <span class="clr">*</span>CIB
                                                <input type="text" class="form-control">

                                            </div>
                                            <div class="col-md-4">
                                                <span class="clr">*</span>Motivo de cambio de CIB <!-- PENDIENTE -->
                                                <input type="text" class="form-control">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <button class="btn btn-default"> Generar CIB</button>
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table id="table" class="table display" style="width:100%">
                                                    <thead>
                                                        <th><center>CIB</center></th>
                                                        <th><center>Motivo</center></th>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <center><button class="btn btn-default">Siguiente</button></center>
                                            </div>
                                            <div class="col-md-4"></div>

                                        </div>

                                    </div>

                                </div>
                                <!-- Fin de tab de datos personales -->
                                <!-- Inicio de tab de desarrollo academico -->
                                <div class="tab-pane fade" id="Desarrollo" role="tabpanel" aria-labelledby="Desarrollo-tab">
                                    <div class="container">
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">

                                            </div>
                                            <div class="col-md-4">
                                                <center><strong class="titulo">Desarrollo académico</strong></center>

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
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <button class="btn btn-default">Guardar desarrollo académico</button>
                                            </div>
                                            <div class="col-md-4">

                                            </div>
                                            <div class="col-md-4">

                                            </div>
                                        </div>
                                        <br><hr><br>
                                        <div class="row">
                                        <div class="col-md-12">


                                            <table id="table" class="table display" style="width:100%">
                                                <thead>
                                                    <th>Id nivel</th>
                                                    <th>Máxima escolaridad</th>
                                                    <th>Especialidad</th>
                                                    <th>Año de inicio</th>
                                                    <th>Año de término</th>
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

                                    <br>

                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button class="btn btn-default"> Anterior</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn btn-default">Siguiente</button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4"></div>

                                    </div>
                                    </div>
                                </div>
                                <!-- Fin de tab de desarrollo académico -->
                                <!-- Inicio de experiencia docente  -->
                                <div class="tab-pane" id="Experiencia_docente" role="tabpanel" aria-labelledby="Experiencia_docente-tab">
                                    <div class="container">
                                    <br>
                                        <div class="row">
                                            <div class="col-md-4">

                                            </div>
                                            <div class="col-md-4">
                                                <center><strong class="titulo">Experiencia docente</strong></center>
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

                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                      <!-- PENDIENTE POR CHECAR, LOS CAMPOS NO CONCUERDAN  -->
                                        <table id="table" class="table display" style="width:100%">
                                            <thead>
                                                <th>Id nivel</th>
                                                <th>Máxima escolaridad</th>
                                                <th>Especialidad</th>
                                                <th>Fecha de inicio</th>
                                                <th>Fecha de término</th>
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

                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button class="btn btn-default"> Anterior</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn btn-default">Siguiente</button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4"></div>

                                    </div>

                                </div>
                                <!-- Fin de tab de expriencia docente -->
                                <!-- Inicio de tab de domicilio  -->
                                <div class="tab-pane" id="Domicilio" role="tabpanel" aria-labelledby="Domicilio-tab">
                                    <div class="container">
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">

                                            </div>
                                            <div class="col-md-4">
                                                <center><strong class="titulo">Domicilio</strong></center>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <span class="clr">*</span>Código postal
                                                <input type="text" class="form-control" id="@pCODIGO_POSTAL" name="@pCODIGO_POSTAL">
                                            </div>
                                            <div class="col-md-4">
                                                <span class="clr">*</span>Estado
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
                                                <span class="clr">*</span>Colonia/Localidad
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

                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                        <table id="table" class="table display" style="width:100%">
                                            <thead>
                                                <th>Id domicilio</th>
                                                <th>Código postal</th>
                                                <th>Estado</th>
                                                <th>Colonia/Localidad</th>
                                                <th>Calle </th>
                                                <th>Número exterior</th>
                                                <th>Número interior</th>
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
                                        <br>

                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button class="btn btn-default"> Anterior</button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button class="btn btn-default">Siguiente</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4"></div>

                                        </div>


                                    </div>
                                </div>
                                <!-- Fin de tab de Domicilio -->
                                <!-- Inicio de tab Referencias -->
                                <div class="tab-pane" id="Referencias" role="tabpanel" aria-labelledby="Refrerencias-tab">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4">
                                            <center><strong class="titulo">Referencias</strong></center>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-md-4">
                                          <span class="clr">*</span>Nombre
                                              <input type="text" id="NOMBRE" name="NOMBRE" class="form-control">
                                      </div>
                                        <div class="col-md-4">
                                            <span class="clr">*</span>Apellido paterno
                                            <input type="text" id="PATERNO" name="PATERNO" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            Apellido materno
                                            <input type="text" class="form-control" id="MATERNO" name="MATERNO">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">

                                        <div class="col-md-4">
                                            <span class="clr">*</span>Sexo
                                            <select name="SEXO" id="SEXO" class="form-control"></select>
                                        </div>

                                        <div class="col-md-4">
                                            <span class="clr">*</span>Ocupación
                                            <input type="text" name="OCUPACION" id="OCUPACION" class="form-control">
                                        </div>

                                        <div class="col-md-4">
                                            <span class="clr">*</span>Tipo de referencia
                                            <select name="" id="ID_TIPO_REFERENCIA" name="ID_TIPO_REFERENCIA" class="form-control"></select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Relación o parentesco
                                            <select name="ID_RELACION" id="ID_RELACION" class="form-control"></select>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Código postal
                                            <input type="text" id="CODIGO_POSTAL" name="CODIGO_POSTAL" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <span class="clr">*</span>Estado
                                            <select name="" id="ID_ENTIDAD" name="ID_ENTIDAD" class="form-control"></select>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="clr">*</span>Municipio
                                            <select name="ID_MUNICIPIO" id="ID_MUNICIPIO" class="form-control"></select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="clr">*</span>Colonia/Localidad
                                            <input type="text"  id="COLONIA" name="COLONIA" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            Ciudad
                                            <input type="text" id="CIUDAD" name="CIUDAD" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <span class="clr">*</span>Calle
                                            <input type="text" id="CALLE" name="CALLE" class="form-control">
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="clr">*</span>Número exterior
                                            <input type="text" class="form-control" name="NUM_EXTERIOR" id="NUM_EXTERIOR">
                                        </div>
                                        <div class="col-md-4">
                                            Número interior
                                            <input type="text" class="form-control" name="NUM_INTERIOR" id="NUM_INTERIOR">
                                        </div>


                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Entre calle de
                                            <input type="text" class="form-control" id="ENTRE_CALLE" name="ENTRE_CALLE">
                                        </div>
                                        <div class="col-md-4">
                                            Y la calle de
                                            <input type="text" class="form-control" id="Y_CALLE" name="Y_CALLE">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button class="btn btn-default">Guardar referencia</button>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">

                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <br>
                                    <table id="table" class="table display" style="width:100%">
                                        <thead>
                                            <th>Id referencia</th>
                                            <th>Nombre</th>
                                            <th>Apellido paterno</th>
                                            <th>Apellido materno</th>
                                            <th>Tipo de referencia</th>
                                            <th>Domicilio</th>
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
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button class="btn btn-default"> Anterior</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn btn-default">Siguiente</button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4"></div>

                                    </div>


                                </div>
                                <!-- Fin de tab de referencia -->
                                <div class="tab-pane fade" id="Socioeconomicos" role="tabpanel" arialabelledby="Socioeconomicos" >
                                    <div class="container">
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">

                                            </div>
                                            <div class="col-md-4">
                                                <center><strong class="titulo">Socioeconómicos</strong></center>

                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                ¿Vive con su familia?
                                                <select name="" id="" class="form-control" id="VIVE_FAMILIA" name="VIVE_FAMILIA"></select>
                                            </div>
                                            <div class="col-md-4">
                                                Ingreso familiar adicional (mensual)
                                                <input type="text" class="form-control" id="INGRESO_FAMILIAR" name="INGRESO_FAMILIAR">
                                            </div>
                                            <div class="col-md-4">
                                                Su domicilio es
                                                <select name="ID_TIPO_DOMICILIO" id="ID_TIPO_DOMICILIO" class="form-control">
                                                <option value="">Seleccione</option></select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                                <div class="col-md-4" >
                                                    Actividades culturales o deportivas que practica
                                                    <input type="text" class="form-control" id="ACTIVIDAD_CULTURAL" name="ACTIVIDAD_CULTURAL">
                                                </div>
                                                <div class="col-md-4">
                                                    Especificación de inmuebles y costos
                                                    <input type="text" class="form-control" id="INMUEBLES" name="INMUEBLES">
                                                </div>
                                                <div class="col-md-4">
                                                    Inversión y monto aproximado
                                                    <input type="text" class="form-control" id="INVERSIONES" name="INVERSIONES">
                                                </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                Vehículo y costo aproximado
                                                <input type="text" class="form-control" id="NUMERO_AUTOS" name="NUMERO_AUTOS">
                                                <!-- ¿? -->
                                            </div>
                                            <div class="col-md-4">
                                                Calidad de vida
                                                <input type="text" class="form-control" id="CALIDAD_VIDA" name="CALIDAD_VIDA">
                                            </div>
                                            <div class="col-md-4">
                                                Vicios
                                                <input type="text" class="form-control" id="VICIOS" name="@VICIOS">
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4" >
                                                Imágen pública
                                                <input type="text" class="form-control" id="IMAGEN_PUBLICA" name="IMAGEN_PUBLICA">

                                            </div>
                                            <div class="col-md-4">
                                                Comportamiento social
                                                <input type="text" class="form-control" id="COMPORTA_SOCIAL" name="COMPORTA_SOCIAL">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <button class="btn btn-default">Guardar socioeconómico</button>
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                        <div class="row">
                                        <div class="col-md-4">

                                        </div>
                                            <div class="col-md-4">
                                                <center><strong>Dependientes económicos</strong></center>

                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                          <div class="col-md-4">
                                              <span class="clr">*</span>Nombre
                                              <input type="text" class="form-control" id="NOMBRE" name="NOMBRE">
                                          </div>
                                            <div class="col-md-4">
                                                <span class="clr">*</span>Apellido paterno
                                                <input type="text" class="form-control" id="PATERNO" name="PATERNO" >
                                            </div>
                                            <div class="col-md-4">
                                                Apellido materno
                                                <input type="text" class="form-control" id="MATERNO" name="MATERNO">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                          <div class="col-md-4">
                                              <span class="clr">*</span>Sexo
                                              <select name="" id="" class="form-control" id="SEXO" name="SEXO"></select>
                                          </div>
                                            <div class="col-md-4">
                                                <span class="clr">*</span>Fecha de nacimiento
                                                <input type="date" class="form-control" id="FECHA_NAC" name="FECHA_NAC">
                                            </div>
                                            <div class="col-md-4">
                                                <span class="clr">*</span>Parentesco
                                                <select name="" id="" class="form-control" id=""></select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <button class="btn btn-default">Guardar dependiente</button>
                                            </div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <table id="table" class="table display" style="width:100%">
                                                    <thead>
                                                        <th>Id dependiente</th>
                                                        <th>Nombre</th>
                                                        <th>Apellido paterno</th>
                                                        <th>Apellido materno</th>
                                                        <th>Sexo</th>
                                                        <th>Fecha de nacimiento</th>
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

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button class="btn btn-default"> Anterior</button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button class="btn btn-default">Siguiente</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4"></div>

                                        </div>


                                    </div>

                                </div>
                                <!-- Fin de tab de socioeconomicos -->
                                <!-- Inicio de tab de prestaciones -->
                                <div class="tab-pane fade" id="Prestaciones" role="tabpanel"aria-labelledby="Prestaciones" >
                                <div class="Content">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4">
                                            <center><strong class="titulo">Prestaciones</strong></center>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="clr">*</span>Tipo de prestación
                                            <select name="" id="" class="form-control" id="ID_TIPO_PRESTACION" name="ID_TIPO_PRESTACION"></select>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="clr">*</span>Fecha de prestación
                                            <input type="date" class="form-control" id="FECHA" name="FECHA">
                                        </div>
                                        <div class="col-md-4">
                                        <span class="clr">*</span>Monto
                                            <input type="text" class="form-control" id="MONTO" name="MONTO">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button class="btn btn-default">Guardar prestación</button>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">

                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <br>
                                    <table id="table" class="table display">
                                        <thead>
                                            <th>Id prestación</th>
                                            <th>Tipo de prestación</th>
                                            <th>Fecha de prestación</th>
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

                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button class="btn btn-default"> Anterior</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-default">Finalizar</button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4"></div>

                                </div>

                                 </div>

                                </div>
                            </div>
                            <!-- Fin de tabs de menú datos personales -->

                        </div>

                    </div>

                </div>

    </div>
</div>
