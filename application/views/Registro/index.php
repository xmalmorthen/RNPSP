<link rel="stylesheet" href="<?php echo base_url('assets/css/dise.css') ?>">
<div class="container">
    <!-- LISTA DE TABS DEL MENU PRINCIPAL -->
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="datosGenerales-tab" data-toggle="tab" href="#datosGenerales" role="tab" aria-controls="datosGenerales" aria-selected="true">Datos generales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="objetosAsignados-tab" data-toggle="tab" href="#objetosAsignados" role="tab" aria-controls="objetosAsignados" aria-selected="false">Objetos asignados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Laboral-tab" data-toggle="tab" href="#Laboral" role="tab" aria-controls="Laboral" aria-selected="false">Laboral</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Capacitacion-tab" data-toggle="tab" href="#Capacitacion" role="tab" aria-controls="Capacitacion" aria-selected="false">Capacitación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Sanciones-tab" data-toggle="tab" href="#Sanciones" role="tab" aria-controls="Sanciones" aria-selected="false">Sanciones/Estimulos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Identificacion-tab" data-toggle="tab" href="#Identificacion" role="tab" aria-controls="Identificacion" aria-selected="false">Identificación</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- LISTA DE SUBMENUS -->
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
    <div class="row" id="submenu_objetos_asignados" style="display: none">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="Armamento_asignado-tab" data-toggle="tab" href="#Armamento_asignado" role="tab" aria-controls="Armamento_asignado" aria-selected="true">Armamento asignado</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Vehiculo_asignado-tab" data-toggle="tab" href="#Vehiculo_asignado" role="tab" aria-controls="Vehiculo_asignado" aria-selected="false">Vehículo asignado</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Equipo_policial-tab" data-toggle="tab" href="#Equipo_policial_asignado" role="tab" aria-controls="Equipo_policial_asignado" aria-selected="false">Equipo policial</a>
            </li>
        </ul>
    </div>
    <div class="row" id="submenu_laboral" style="display: none">
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
    </div>
    <div class="row" id="submenu_capacitacion" style="display: none">
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
    </div>
    <div class="row" id="submenu_sanciones_y_estimulos" style="display: none" >
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
    </div>
    <div class="row" id="submenu_identificacion" style="display: none">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="mediafiliacion-tab" data-toggle="tab" href="#mediafiliacion" role="tab" aria-controls="mediafiliacion" aria-selected="false">Media filiación</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Datos-tab" data-toggle="tab" href="#Datos" role="tab" aria-controls="Datos" aria-selected="false">Datos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Senas_particulares-tab" data-toggle="tab" href="#Senas_particulares" role="tab" aria-controls="Senas_particulares" aria-selected="false">Señas particulares</a>
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
    </div>
    <!-- CONTENIDOS PARA LOS SUBMENUS -->
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
                                                    <input type="text" id="@pCURP" name="@pCURP" class="form-control" required>
                                                </div>
                                                <div class="col-md-4">
                                                <span class="clr">*</span>Nombre
                                                    <input type="text" id="@pNOMBRE" name="@pNOMBRE" class="form-control" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Apellido paterno
                                                    <input type="text" id="@pPATERNO" name="@pPATERNO" class="form-control" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Apellido materno
                                                    <input type="text" id="@pMATERNO" name="@pMATERNO" class="form-control" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Sexo
                                                    <select name="" id="" class="form-control" id="@pSEXO" name="@pSEXO" required></select>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Fecha de nacimiento
                                                    <input type="date" name="" id="" id="@pFECHA_NAC" name="@pFECHA_NAC" class="form-control" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                <span class="clr">*</span>País de nacimiento
                                                <select name="" id="" class="form-control" id="@pID_PAIS_NAC" name="@pID_PAIS_NAC" required><option value="">Seleccione</option></select>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Estado de nacimiento
                                                    <select name="" id="" class="form-control" id="@pID_ENTIDAD_NAC" name="@pID_ENTIDAD_NAC" required></select>
                                                </div>
                                                <div class="col-md-4">
                                                <span class="clr">*</span>Municipio de nacimiento
                                                    <select name="" id="" class="form-control" id="@pID_MUNICIPIO_NAC" name="@pID_MUNICIPIO_NAC" required></select>
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
                                                    <select name="" id="" class="form-control" id="@pID_NACIONALIDAD" name="@pID_NACIONALIDAD" required></select>
                                                </div>
                                                <div class="col-md-4">
                                                <span class="clr">*</span>Modo de nacionalidad
                                                    <select name="" id="" class="form-control" id="@pMODO_NACIONALIDAD" name="@pMODO_NACIONALIDAD" required></select>
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
                                                    <input type="text" id="@pRFC" name="@pRFC" class="form-control" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Estado civil
                                                    <select name="" id="" class="form-control" id="@pID_ESTADO_CIVIL" name="@pID_ESTADO_CIVIL" required><option value="">Seleccione</option></select>
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
                                                Vigencia de licencia
                                                    <input type="date" id="@pLICENCIA_VIG" name="@pLICENCIA_VIG" class="form-control" required>
                                                </div>
                                                <div class="col-md-4">
                                                    CUIP
                                                    <input type="text" id="@pCUIP" name="@pCUIP" class="form-control" required>
                                                </div>
                                            </div>
                                            <br><hr><br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    CIB
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
                                                    <select name="" id="" class="form-control" id="@pID_GRADO_ESCOLAR" name="@pID_GRADO_ESCOLAR" required></select>
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
                                                    Fecha de inicio
                                                    <input type="date" class="form-control" id="@pINICIO" name="@pINICIO">
                                                </div>
                                                <div class="col-md-4">
                                                    Fecha de término
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
                                                    <input type="text" class="form-control" id="@pCURSO" name="@pCURSO" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Nombre de la Institución
                                                    <input type="text" class="form-control" id="@pINSTITUCION" name="@pINSTITUCION" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Fecha de inicio
                                                    <input type="date" class="form-control" id="@pFECHA_INICIO" name="@pFECHA_INICIO" required>
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
                                                    <input type="text" class="form-control" id="@pCERTIFICADO" name="@pCERTIFICADO" required>
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
                                                    <th>Id experiencia docente</th>
                                                    <th>Nombre del curso</th>
                                                    <th>Nombre de la institución</th>
                                                    <th>Institución que certifica</th>
                                                    <th>Fecha de inicio</th>
                                                    <th>Fecha de término</th>
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
                                                    <input type="text" class="form-control" id="@pCODIGO_POSTAL" name="@pCODIGO_POSTAL" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Estado
                                                    <select name="" id="" class="form-control" id="@pID_ENTIDAD" name="@pID_ENTIDAD" required></select>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Municipio
                                                    <select name="" id="" class="form-control" id="@pID_MUNICIPIO" name="@pID_MUNICIPIO" required></select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    Ciudad
                                                    <input type="text" class="form-control" id="@pCOLONIA" name="@pCOLONIA">
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Colonia/Localidad
                                                    <input type="text" class="form-control" id="@pCIUDAD" name="@pCIUDAD" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Calle
                                                    <input type="text" class="form-control" id="@pCALLE" name="@pCALLE" required>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Número exterior
                                                    <input type="text" class="form-control" id="@pNUM_EXTERIOR" name="@pNUM_EXTERIOR" required>
                                                </div>
                                                <div class="col-md-4">
                                                    Número interior
                                                    <input type="text" class="form-control" id="@pNUM_INTERIOR" name="@pNUM_INTERIOR">
                                                </div>


                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Entre la calle de
                                                    <input type="text" class="form-control" id="@pENTRE_CALLE" name="@pENTRE_CALLE" required>
                                                </div>
                                                <div class="col-md-4">
                                                    Y la calle de
                                                    <input type="text" class="form-control" id="@pY_CALLE" name="@pY_CALLE">
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Número telefónico
                                                    <input type="text" class="form-control" id="@pTELEFONO" name="@pTELEFONO" required>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>RFC
                                                    <input type="text" class="form-control" id="@pRFC" name="@pRFC" required>
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
                                    <div class="tab-pane" id="Referencias" role="tabpanel" aria-labelledby="Referencias-tab">
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
                                                  <input type="text" id="NOMBRE" name="NOMBRE" class="form-control" required>
                                          </div>
                                            <div class="col-md-4">
                                                <span class="clr">*</span>Apellido paterno
                                                <input type="text" id="PATERNO" name="PATERNO" class="form-control" required>
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
                                                <select name="SEXO" id="SEXO" class="form-control" required></select>
                                            </div>

                                            <div class="col-md-4">
                                                <span class="clr">*</span>Ocupación
                                                <input type="text" name="OCUPACION" id="OCUPACION" class="form-control" required>
                                            </div>

                                            <div class="col-md-4">
                                                <span class="clr">*</span>Tipo de referencia
                                                <select name="" id="ID_TIPO_REFERENCIA" name="ID_TIPO_REFERENCIA" class="form-control" required></select>
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
                                                <select name="" id="ID_ENTIDAD" name="ID_ENTIDAD" class="form-control" required></select>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="clr">*</span>Municipio
                                                <select name="ID_MUNICIPIO" id="ID_MUNICIPIO" class="form-control" required></select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                Ciudad
                                                <input type="text" id="CIUDAD" name="CIUDAD" class="form-control" required>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="clr">*</span>Colonia/Localidad
                                                <input type="text"  id="COLONIA" name="COLONIA" class="form-control" required>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="clr">*</span>Calle
                                                <input type="text" id="CALLE" name="CALLE" class="form-control" required>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <span class="clr">*</span>Número exterior
                                                <input type="text" class="form-control" name="NUM_EXTERIOR" id="NUM_EXTERIOR" required>
                                            </div>
                                            <div class="col-md-4">
                                                Número interior
                                                <input type="text" class="form-control" name="NUM_INTERIOR" id="NUM_INTERIOR">
                                            </div>


                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                Entre la calle de
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
                                    <div class="tab-pane fade" id="Socioeconomicos" role="tabpanel" arialabelledby="Socioeconomicos-tab" >
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
                                                  <input type="text" class="form-control" id="NOMBRE" name="NOMBRE" required>
                                              </div>
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Apellido paterno
                                                    <input type="text" class="form-control" id="PATERNO" name="PATERNO" required>
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
                                                  <select name="" id="" class="form-control" id="SEXO" name="SEXO" required></select>
                                              </div>
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Fecha de nacimiento
                                                    <input type="date" class="form-control" id="FECHA_NAC" name="FECHA_NAC" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="clr">*</span>Parentesco
                                                    <select name="" id="" class="form-control" id="" required></select>
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
                                    <div class="tab-pane fade" id="Prestaciones" role="tabpanel"aria-labelledby="Prestaciones-tab" >
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
                                                <select name="" id="" class="form-control" id="ID_TIPO_PRESTACION" name="ID_TIPO_PRESTACION" required></select>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="clr">*</span>Fecha de prestación
                                                <input type="date" class="form-control" id="FECHA" name="FECHA" required>
                                            </div>
                                            <div class="col-md-4">
                                            <span class="clr">*</span>Monto
                                                <input type="text" class="form-control" id="MONTO" name="MONTO" required>
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
    <div class="content_submenu_objetos_asignados" style="display: none">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Armamento_asignado" role="tabpanel" arialabelledby="Armamento_asignado-tab">
                <div class="container">
                    <form action="#" autocomplete="off">
                            <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <center><strong class="titulo">Armamento asignado (de cargo)</strong></center>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Número de licencia de portación
                                <input type="text" class="form-control" id="pNUMERO_LICENCIA" name="pNUMERO_LICENCIA" required>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Número de matrícula
                                <input type="text" class="form-control" id="pNumero_MATRICULA" name="pNumero_MATRICULA" required>
                            </div>
                            <div class="col-md-4">
                                Inicio de vigencia
                                <input type="date" class="form-control" id="pINICIO_LICENCIA" name="pINICIO_LICENCIA" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Término de vigencia
                                <input type="date"class="form-control"  id="pTERMINO_LICENCIA" name="pTERMINO_LICENCIA">
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Tipo de arma <!-- Se llena del catalogo "TIPO_ARMA" -->
                                <select class="form-control" id="pID_TIPO_ARMA" name="pID_TIPO_ARMA" required></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Marca de arma <!-- Se llena del catalogo "MARCA_ARMA" dependiendo del catalogo "TIPO_ARMA" -->
                                <select class="form-control" id="pID_MARCA_ARMA" name="pID_MARCA_ARMA" required ></select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Modelo de arma <!-- Se llena del catalogo "MODELO_ARMA" dependiendo del catalogo "TIPO_ARMA" y "MARCA_ARMA" -->
                                <select name="pID_MODELO_ARMA" id="pID_MODELO_ARMA" class="form-control" required></select>
                            </div>
                            <div class="col-md-4">
                                Calibre de arma <!-- Se llena del catalogo "CALIBRE_ARMA" dependiendo del catalogo "TIPO_ARMA", "MARCA_ARMA" y "MODELO_ARMA" -->
                                <select name="pID_CALIBRE_ARMA" id="pID_CALIBRE_ARMA" class="form-control"></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Fecha de asignación
                                <input type="date" name="pINICIO_ASIGNACION" id="pINICIO_ASIGNACION" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Término de asignación
                                <input type="date" name="pTERMINO_ASIGNACION" id="pTERMINO_ASIGNACION" class="form-control">
                            </div>
                            <div class="col-md-4">
                                Documento de asignación
                                <input type="text" class="form-control" id="pDOC_ASIGNACION" name="pDOC_ASIGNACION">
                            </div>
                            <div class="col-md-4">
                                Documento de descargo
                                <input type="text" class="form-control" id="pDOC_DESCARGO" name="pDOC_DESCARGO" >
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-default">Guardar arma</button>
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
                                <th>Id arma asignada</th>
                                <th>Número de licencia</th>
                                <th>Matrícula</th>
                                <th>Tipo de arma</th>
                                <th>Marca de arma</th>
                                <th>Fecha de asignación</th>
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
                        <input type="number" id="pID_ARMA_EXT" name="pID_ARMA_EXT" hidden>


                    </form>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                           <center><button class="btn btn-default">Siguiente</button></center> 
                        </div>
                    </div>

                </div>

            </div>
            <div class="tab-pane fade show" id="Vehiculo_asignado" role="tabpanel" arialabelledby="Vehiculo_asignado-tab">
                <div class="container">
                    <form action="#" autocomplete="off">
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <center><strong class="titulo">Vehículo asignado</strong></center>

                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Número de identificación vehicular (VIN)
                                <input type="text" class="form-control" id="pVIN" name="pVIN">
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Número de motor
                                <input type="text" class="form-control" id="pMOTOR" name="pMOTOR" required>
                            </div>
                            <div class="col-md-4">
                                Número de constancia de inscripción
                                <input type="text" class="form-control" id="pNCI" name="pNCI">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <center><strong>Datos del vehículo</strong></center>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Clase de vehículo   <!-- Se llena del catálogo "CLASE_VEHICULO" dependiendo del catálogo "TIPO_VEH"-->
                                <select class="form-control"></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Tipo de vehículo<!-- Se llena con el catálogo "TIPO_VEH" -->
                                <select class="form-control" id="pID_TIPO_VEH" name="pID_TIPO_VEH" required></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Marca  <!-- Se llena del catalogo "MARCA" depende del catálogo "TIPO_VEH" -->
                                <select class="form-control" id="pID_MARCA" name="pID_MARCA" required></select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Submarca <!-- Se llena del catálogo "SUBMARCA" y depende del catálogo "MARCA" y "TIPO_VEH" -->
                                <select class="form-control" id="pID_SUBMARCA" name="pID_SUBMARCA" required></select>
                            </div>
                            <div class="col-md-4">
                                Modelo
                                <input type="text" class="form-control" id="pMODELO" name="pMODELO">
                            </div>
                            <div class="col-md-4">
                                Placa
                                <input type="" class="form-control" id="pPLACA" name="pPLACA">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Tipo de asignación <!-- TIPO DE ASIGNACION DEL VEHICULO (1/2) = (TITULAR/ACOMPAÑANTE) -->
                                <select class="form-control" id="pID_TIPO_ASIGNACION" name="pID_TIPO_ASIGNACION" required></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Fecha de inicio de asignación
                                <input type="date" class="form-control" id="INICIO_ASIGNACION" name="INICIO_ASIGNACION" required>
                            </div>
                            <div class="col-md-4">
                                Término de asignación
                                <input type="date" class="form-control" id="pTERMINO_ASIGNACION" name="pTERMINO_ASIGNACION">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Documento de asignación
                                <input type="text" class="form-control" id="pDOC_ASIGNACION" name="pDOC_ASIGNACION">
                            </div>
                            <div class="col-md-4">
                                Documento de descargo
                                <input type="text" class="form-control" id="pDOC_DESCARGO" name="pDOC_DESCARGO">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-disable">Guardar vehículo</button>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                        <br>
                        <hr>
                        <br> <!-- Verificar con el modelo de datos -->
                        <table id="table" class="table display">
                            <thead>
                                <th>Id vehículo asignado</th>
                                <th>VIN</th>
                                <th>Número de motor</th>
                                <th>Tipo de vehículo</th>
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
                        <input type="number" id="pID_ALTERNA" name="pID_ALTERNA" hidden>
                        <input type="number" id="pID_ESTADO_EMISOR" name="pID_ESTADO_EMISOR" hidden>
                        <input type="number" id="pID_EMISOR" name="pID_EMISOR" hidden>
                        <input type="number" id="pID_VEHICULO_ASIG_EXT" name="pID_VEHICULO_ASIG_EXT" hidden>



                    </form>
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
            <div class="tab-pane fade show" id="Equipo_policial_asignado" role="tabpanel" arialabelledby="Equipo_policial_asignado-tab">
                <div class="container">
                    <form action="#" autocomplete=off>
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <center><strong class="titulo">Equipo policial asignado</strong></center>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Tipo de equipo <!-- Se llena del catálogo "TIPO_EQUIPO" -->
                                <select  class="form-control" id="pID_TIPO_EQUIPO" name="pID_TIPO_EQUIPO" required></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Marca de equipo <!-- Se llena del catálogo "MARCA_EQUIPO" y depende del catálogo "TIPO_EQUIPO" -->
                                <select class="form-control" id="pID_MARCA_EQUIPO" name="pID_MARCA_EQUIPO" required></select>
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
                                <span class="clr">*</span>Fecha de inicio de asignación
                                <input type="date" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Fecha de término de asignación
                                <input type="date" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Documento de asignación
                                <input type="text" class="form-control">
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
                        </div>
                        <br>
                        <hr>
                        <br>
                        <table class="table display">
                            <thead>
                                <th>Id equipo asignado</th>
                                <th>Tipo de equipo</th>
                                <th>Marca</th>
                                <th>Inventario</th>
                                <th>Serie</th>
                                <th>Inicio de asignación</th>
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
                        <input type="number" id="pID_EQUIPO_ASIG_EXT" name="pID_EQUIPO_ASIG_EXT" hidden>


                    </form>
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
    </div>
    <div class="content_submenu_laboral" style="display: none">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Empleos_en_seguridad_publica" role="tabpanel" aria-labelledby="Empleos_en_seguridad_publica-tab">
                <form action="">
                <br>
                    <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Empleos en seguridad pública</strong></center>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <span class="clr">*</span>Dependencia <!-- Se llena del catalogo "DEPENDENCIA" -->
                            <select  class="form-control" id="pID_DEPENDENCIA" name="pID_DEPENDENCIA" required>
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
                            <center><strong>Domicilio de la corporación</strong></center>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Código postal
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                          Estado
                          <select class="form-control" name="pID_ENTIDAD" id="ID_MUNICPIO"></select>
                        </div>
                        <div class="col-md-4">
                          Municipio
                            <select class="form-control" name="ID_MUNICPIO" id="ID_MUNICPIO"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-4">
                          Colonia/Localidad
                          <input type="text" class="form-control">
                      </div>
                      <div class="col-md-4">
                          Calle
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
                            Número exterior
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            Número telefónico
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                        <span class="clr">*</span>Fecha de ingreso
                            <input type="date" id="pFECHA_INGRESO" name="pFECHA_INGRESO" required  class="form-control"  class="form-control">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Fecha de separación
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
                            Sueldo base (Mensual)
                            <input type="text" id="SUELDO_BASE" name="SUELDO_BASE"  class="form-control">
                        </div>
                        <div class="col-md-4">
                            Compensaciones (Mensuales)
                            <input type="text" id="pCOMPENSACION" name="pCOMPENSACION"  class="form-control">
                        </div>
                        <div class="col-md-4">
                            Área o departamento
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
                            <span class="clr">*</span>Estado<!-- Se llena del catalogo "ENTIDAD" -->
                            <select  class="form-control" id="pID_ENTIDAD" name="pID_ENTIDAD" required>
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Municipio <!-- Se llena del catalogo "MUNICIPIO" dependiendo de la entidad -->
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
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-light">Guardar empleo</button>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="table" class="table display">
                                <thead>
                                    <tr>
                                        <th>Id empleo en seguridad pública</th>
                                        <th>Dependencia</th>
                                        <th>Corporación</th>
                                        <th>Fecha de ingreso</th>
                                        <th>Fecha de separación</th>
                                        <th>Número de empleado</th>
                                        <th>Estado</th>
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
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <center><input type="button" name="next" class="btn btn-default" style="height:40px;" value="Siguiente"/></center>
                    </div>
                </div>

            </div>

            <div class="tab-pane fade" id="Empleos_diversos" role="tabpanel" aria-labelledby="Empleos_diversos-tab">
                <form action="#">
                    <div class="container">
                    <br>
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">
                                    <center><strong class="titulo">Empleos diversos</strong></center>
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
                                    <span class="clr">*</span>Estado <!-- Se llena del catalogo "ENTIDAD" -->
                                    <select  class="form-control" required>
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
                                    <span class="clr">*</span>Colonia/Localidad
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
                                    Ingreso neto (mensual)
                                    <input type="text" id="pSUELDO" name="pSUELDO"  class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Fecha de ingreso
                                    <input type="date" id="pFECHA_INICIO" name="pFECHA_INICIO" required  class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Fecha de separación
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
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-light">Guardar empleo</button>
                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>
                            <br>
                            <hr>
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
                                                <th>Fecha de ingreso</th>
                                                <th>Fecha de separación</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                                <!-- HIDDEN INPUTS -->
                            <input type="number" id="pID_ALTERNA" name="pID_ALTERNA" autocomplete="off" hidden>
                            <input type="number" id="pID_ESTADO_EMISOR" name="pID_ESTADO_EMISOR" autocomplete="off" hidden>
                            <input type="number" id="pID_EMISOR" name="pID_EMISOR" autocomplete="off" hidden>

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


                </form>
            </div>
            <!-- Fin de tab de empleos diversos -->
            <!-- Inicio de adsccripción actual -->
            <div class="tab-pane fade" id="Adscripcion_actual" role="tabpanel" aria-labelledby="Adscripcion_actual-tab">
                <div class="container">
                    <form action="#" autocomplete="off">

                            <br>
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">
                                    <center><strong>Adscripción de la persona</strong></center>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="clr">*</span>Dependencia <!-- Se llena del catalogo "DEPENDENCIA" -->
                                    <select  class="form-control" required>
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
                                    <center><strong>Domicilio de la corporación</strong></center>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Código postal
                                    <input type="text" class="form-control" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Estado <!-- Se llena del catalogo "ENTIDAD" -->
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
                                    Ciudad
                                    <input type="text" class="form-control" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Colonia/Localidad
                                    <input type="text" class="form-control" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Calle
                                    <input type="text" class="form-control" required>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Número exterior
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    Número interior
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                <span class="clr">*</span>Número telefónico
                                    <input type="text" class="form-control" required>
                                </div>


                            </div>


                            <br>
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Fecha de ingreso
                                    <input type="date" id="pFECHA_INGRESO" name="pFECHA_INGRESO" required class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <span class="clr">*</span>Puesto <!-- Se llena del catalogo "PUESTO" -->
                                    <select  class="form-control" id="pPUESTO" name="pPuesto" required>
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
                                    Sueldo base (Mensual)
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    Compensaciones (Mensuales)
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    Área o departamento <!-- Se llena del catalogo "AREA" -->
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
                                    <span class="clr">*</span>Estado <!-- Se llena del catalogo "ENTIDAD" -->
                                    <select  class="form-control" id="pID_ENTIDAD" name="pID_ENTIDAD" required></select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="clr">*</span>Municipio <!-- Se llena del catalogo "MUNICIPIO" dependiendo del catalogo de "ENTIDAD" -->
                                    <select  class="form-control" id="pID_MUNICIPIO" name="pID_MUNICIPIO" required></select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-light">Guardar adscripción</button>
                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>
                            <br>
                            <hr>
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
                                              <th>Área o departamento</th>
                                              <th>Puesto</th>
                                              <th>Estado</th>
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
            <!-- Fin de adscripción actual -->
            <div class="tab-pane fade" id="Actitudes_hacia_el_empleo" role="tabpanel" aria-labelledby="Actitudes_hacia_el_empleo">
                <div class="container">
                <form action="#" autocomplete="off">
                    <br>
                    <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Actitudes hacia el empleo</strong></center>

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
                            ¿En qué Área o departamento desearía estar?
                            <input type="text" id="pAREA" name="pAREA" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4" >
                            ¿En qué tiempo desea ascender?
                            <input type="text" id="pTIEMPO_ASCENDER" name="pTIEMPO_ASCENDER" class="form-control">
                        </div>
                        <div class="col-md-4">
                            ¿Conoce el reglamento de los reconocimientos? <!-- S/N = SI/NO -->
                            <select id="pCONOCE_REG_RECON" name="pCONOCE_REG_RECON" class="form-control"><option value="" id="">Seleccione</option></select>
                        </div>
                        <div class="col-md-4" >
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
                            <input type="text" id="pCAPACITACION" name="pCAPACITACION" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-light">Guardar actitud</button>
                    </div>
                    <div class="col-md-4">

                    </div>
                    </div>
                    <br>
                    <hr>
                    <br>

                    <!-- HIDDEN INPUTS -->
                    <input type="number" id="pID_ALTERNA" name="pID_ESTADO_EMISOR" autocomplete="off" hidden>
                    <input type="number" id="pID_ESTADO_EMISOR" name="pID_ALTERNA" autocomplete="off" hidden>
                    <input type="number" id="pID_EMISOR" name="pID_EMISOR" autocomplete="off" hidden>
                </form>
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
            <!-- Inicio de disciplina policial -->
            <div class="tab-pane fade" id="Disciplina_policial" role="tabpanel" aria-labelledby="Disciplina_policial-tab">
                <div class="container">
                    <form action="#" autocomplete="off">
                        <br>
                        <div class="row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">

                                <center><strong class="titulo">Disciplina policial</strong></center>

                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Tipo de disciplina <!-- Se llena del catalogo "TIPO_DISCIPLINA" -->
                                <select  class="form-control" id="pTIPO" name="pTIPO" required><option value="">Seleccione</option></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Subtipo de disciplina <!-- Se llena del catalogo "SUBTIPO_DISCIPLINA" dependiendo del catalogo "TIPO_DISCIPLINA" -->
                                <select  class="form-control" id="pID_SUBTIPO_DIS" name="pID_SUBTIPO_DIS" required><option value="">Seleccione</option></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Motivo de disciplina
                                <input type="text" id="pMOTIVO" name="pMOTIVO" required class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-light">Guardar disciplina</button>
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="table" class="table display">
                                    <thead>
                                        <tr>
                                            <th>Id disciplina</th>
                                            <th>Tipo de disciplina</th>
                                            <th>Subtipo de disciplina</th>
                                            <th>Motivo de disciplina</th>
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
                        <input type="number" name="pID_TIPO_DISCIPLINA" id="pID_TIPO_DISCIPLINA" value="" hidden>
                    </form>
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
            <!-- Fin de disciplina policial -->
            <!-- Inicio de comisiones -->
            <div class="tab-pane fade" id="Comisiones" role="tabpanel" aria-labelledby="Comisiones-tab">
                <div class="container">
                    <form action="#" autocomplete="off">
                        <br>
                        <div class="row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">

                                <center><strong class="titulo">Comisiones</strong></center>

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
                                <input type="date"  id="pFECHA_TERMINO" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Tipo de comisión<!-- Se llena del catalogo "TIPO_COMISION" -->
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
                        <div class="row">
                          <div class="col-md-4">
                              <button class="btn btn-light">Guardar comisión</button>
                          </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="table" class="table display">
                                    <thead>
                                        <tr>
                                            <th>Id comisión</th>
                                            <th>Fecha de inicio</th>
                                            <th>Fecha de término</th>
                                            <th>Tipo de comisión</th>
                                            <th>Motivo</th>
                                            <th>Destino</th>
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
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- HIDDEN INPUTS -->
                        <input type="number" id="pID_ALTERNA" name="pID_ESTADO_EMISOR" autocomplete="off" hidden>
                        <input type="number" id="pID_ESTADO_EMISOR" name="pID_ALTERNA" autocomplete="off" hidden>
                        <input type="number" id="pID_EMISOR" name="pID_EMISOR" autocomplete="off" hidden>
                    </form>
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
    </div>
    <div class="content_submenu_capacitacion" style="display: none">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Capacitacion_seguridad_publica" role="tabpanel" aria-labelledby="Capacitacion_seguridad_publica-tab">
                <div class="container">
                    <form action="#" autocomplete="off">
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <center><strong class="titulo">Capacitación de seguridad pública</strong></center>

                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Dependencia responsable <!-- Traer contenido del catalogo "DEP_RESPONSABLE" -->
                                <select  class="form-control" id="pID_RESPONSABLE" name="pID_RESPONSABLE" required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Institución capacitadora <!-- Se llena del catalogo  "INSTITUCION_CAPACI" -->
                                <select  class="form-control" id="pINST_CAPACITA" name="pINST_CAPACITA" required>
                                    <option value=""></option>
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
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Nivel del curso recibido <!-- Se llena del catalogo "NIVEL" y depende del select "TEMA"-->
                                <select  class="form-control" id="pID_NIVEL" name="pID_NIVEL" required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                Eficiencia terminal <!-- Lo saca del catalogo de "EFICIENCIA" -->
                                <select  class="form-control" id="pID_EFICIENCIA" name="pID_EFICIENCIA">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Fecha de inicio
                                <input type="date"  class="form-control" id="pINICIO" name="pINICIO">
                            </div>
                            <div class="col-md-4">
                                Fecha de conclusión
                                <input type="date"  class="form-control" id="pCONCLUSION" name="pCONCLUSION">
                            </div>
                            <div class="col-md-4">
                                Duración en horas
                                <Input type="text" class="form-control" id="pDURACION" name="pDURACION">
                            </div>
                        </div>
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
                            <hr>
                            <br>
                            <table id="table" class="table display">
                                <thead>
                                    <th>Id capacitación</th>
                                    <th>Dependencia responsable</th>
                                    <th>Institución capacitadora</th>
                                    <th>Nombre del curso</th>
                                    <th>Tema del curso</th>
                                    <th>Nivel del curso recibido</th>
                                    <th>Duración en horas</th>
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
                    <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <center><input type="button" name="next" class="btn btn-default" style="height:40px;" value="Siguiente"/></center>
                        </div>
                    </div>
                </div>
            <div class="tab-pane fade" id="Capacitacion_adicional" role="tabpanel" aria-labelledby="Capacitacion_adicional-tab">
                <div class="container">
                    <form action="#" autocomplete="off">
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <center><strong class="titulo">Capacitación adicional</strong></center>

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
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>El curso fué <!-- Se llena del catalogo "MODALIDAD_CURSO"<-->
                                <select name ="" id="" class="form-control" id="pID_MODALIDAD_CURSO" name="pID_MODALIDAD_CURSO" required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Eficiencia terminal <!-- Se llena del catalogo "EFICIENCIA" -->
                                <select  class="form-control" id="pID_EFICIENCIA" name="pID_EFICIENCIA" required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                Fecha de inicio
                                <input type="date"  class="form-control" id="pFECHA_INICIO" name=pFECHA_INICIO>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Fecha de conclusión
                                <input type="date"  class="form-control" id="pFECHA_FIN" name="pFECHA_FIN">
                            </div>
                            <div class="col-md-4">
                                Duración en horas
                                <Input type="text" class="form-control" id="pDURACION" name="pDURACION">
                            </div>
                        </div>
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
                        <hr>
                        <br>
                        <table id="table" class="table display">
                            <thead>
                                <th>Id capacitación adicional</th>
                                <th>Institución o empresa</th>
                                <th>Estudio o curso</th>
                                <th>Modalidad</th>
                                <th>Eficiencia terminal</th>
                                <th>Duración en horas</th>
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
            <div class="tab-pane fade" id="Idiomas_dialectos" role="tabpanel" aria-labelledby="Idiomas_dialectos-tab">
                <div class="container">
                    <form action="#" autocomplete="off">
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <center><strong class="titulo">Idiomas y/o dialectos</strong></center>

                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Idioma y/o dialecto  <!-- Se llena del catalogo "IDIOMA" -->
                                <select  class="form-control" id="pID_IDIOMA" name="pID_IDIOMA" required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                Lectura
                                <div class="row">
                                    <div class="col-md-10">
                                        <Input type="text" class="form-control" class="form-control" id="pGRADO_LECTURA" name="pGRADO_LECTURA">
                                    </div>
                                    <div class="col-md-1" style="margin-left: -12px;margin-top: 7px;" >%</div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                Escritura
                                <div class="row">
                                    <div class="col-md-10">
                                        <Input type="text" class="form-control" class="form-control" id="pGRADO_ESCRITURA" name="pGRADO_ESCRITURA">
                                    </div>
                                    <div class="col-md-1" style="margin-left: -12px;margin-top: 7px;" >%</div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                Conversación
                                <div class="row">
                                    <div class="col-md-10">
                                        <Input type="text" class="form-control" class="form-control" id="pGRADO_CONVERSACION" name="pGRADO_CONVERSACION">
                                    </div>
                                    <div class="col-md-1" style="margin-left: -12px;margin-top: 7px;" >%</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-default">Guardar idioma y/o dialecto</button>
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
                                <th>Id idioma y/o dialecto</th>
                                <th>Idioma</th>
                                <th>Porcentaje de lectura</th>
                                <th>Porcentaje de escritura</th>
                                <th>Porcentaje de conversación</th>
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
            <div class="tab-pane fade" id="Habilidades_aptitudes" role="tabpanel" aria-labelledby="Habilidades_aptitudes-tab">
                <div class="container">
                    <form action="#" autocomplete="off">
                        <br>
                        <div class="row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <center><strong class="titulo">Habilidades y/o aptitudes</strong></center>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Tipo de habilidad y/o aptitud<!-- Se llena con el catalogo "TIPO_APTITUD" -->
                                <select name="" id="" class="form-control" id="ID_TIPO_APTITUD" name="ID_TIPO_APTITUD" required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                Descripción
                                <input type="text" class="form-control" id="ESPECIFIQUE" name="ESPECIFIQUE">
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Grado de aptitud o dominio <!-- Se rellena con el catalogo "GRADO_APTITUD_HAB" depende del select "TIPO_ACTITUD" -->
                                <select name="" id="" class="form-control" id="ID_GRADO_APT_HAB" name="ID_GRADO_APT_HAB" required>
                                </select>
                            </div>
                        </div>
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
                        <hr>
                        <br>
                        <table id="table" class="table display">
                            <thead>
                                <th>Id habilidad y/o aptitud</th>
                                <th>Tipo de habilidad y/o aptitud</th>
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
            <div class="tab-pane fade" id="Afiliacion_agrupaciones" role="tabpanel" aria-labelledby="Afiliacion_agrupaciones-tab">
                <div class="container">
                    <form action="#" autocomplete="off">
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <center><strong class="titulo">Afiliación a agrupaciones</strong></center>

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
                                <span class="clr">*</span>Fecha de tipo de agrupación<!-- Se llena con el catalogo "TIPO_AGRUPACION" -->
                                <select  class="form-control" id="pID_TIPO_AGRUPACION" name="pID_TIPO_AGRUPACION" required></select>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Fecha de inicio de afiliación
                                <input type="date" class="form-control" id="pFECHA_INICIO" name="pFECHA_INICIO" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Término de afiliación
                                <input type="date" class="form-control" id="pFECHA_TERMINO" name="pFECHA_TERMINO">
                            </div>
                        </div>
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
                        <hr>
                        <br>
                        <table id="table" class="table display">
                            <thead>
                                <th>Id agrupación</th>
                                <th>Nombre de la agrupación</th>
                                <th>Tipo de agrupación</th>
                                <th>Inicio de afiliación</th>
                                <th>Término de afiliación</th>
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
    </div>
    <div class="content_submenu_sanciones_y_estimulos" style="display: none">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Sanciones_recomendaciones" role="tabpanel" aria-labelledby="Sanciones_recomendaciones-tab">
                <div class="container">
                    <form action="#" autocomplete="off">
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <center><strong class="titulo">Sanciones y/o recomendaciones</strong></center>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                            <span class="clr">*</span>Tipo de sanción y/o recomendación <!-- Se llena del catálogo "TIPO_OBSERVACION" -->
                                <select  class="form-control" id="pID_TIPO_OBS" name="pID_TIPO_OBS" required></select>
                            </div>
                            <div class="col-md-4">
                            <span class="clr">*</span>Fecha de determinación
                                <input type="date"  class="form-control" id="pDETERMINACION" name="pDETERMINACION" required>
                            </div>
                            <div class="col-md-4">
                                <span class="clr">*</span>Descripción de la sanción y/o recomendación
                                <input type="text" class="form-control" id="pDESCRIPCION" name="pDESCRIPCION" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Situación de la sanción y/o recomendación
                                <input type="text" class="form-control" id="pSITUACION" name="pSITUACION" required>
                            </div>
                            <div class="col-md-4">
                                Fecha de inicio de la inhabilitación
                                <input type="date" class="form-control" id="pFECHA_INICIO" name="pFECHA_INICIO">
                            </div>
                            <div class="col-md-4">
                                Fecha de término de la inhabilitación
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
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-default">Guardar sanción</button>
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
                                <th>Id sanción y/o recomendación</th>
                                <th>Descripción de la sanción y/o recomendación</th>
                                <th>Situación de la sanción y/o recomendación</th>
                                <th>Fecha de inicio de la inhabilitación</th>
                                <th>Fecha de término de la inhabilitación</th>
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
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><input type="button" name="next" class="btn btn-default" style="height:40px;" value="Siguiente"/></center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="Resoluciones_ministeriales_judiciales" role="tabpanel" aria-labelledby="Resoluciones_ministeriales_judiciales-tab">
                <div class="container">
                <form action="#" autocomplete="off">
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Resoluciones ministeriales y/o judiciales</strong></center>

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
                            <span class="clr">*</span>Estado <!-- Se llena del catálogo de "ENTIDAD" -->
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
                            Agencia del ministerio público
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
                            Fecha de inicio de la averiguación previa
                            <input type="date"  class="form-control" id="pFECHA_AVERIGUACION" name="pFECHA_AVERIGUACION">
                        </div>
                        <div class="col-md-4">
                            Fecha del estado de la averiguación previa
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
                            Número de proceso
                            <input type="text" class="form-control" id="pNUM_PROCESO" name="pNUM_PROCESO">
                        </div>
                        <div class="col-md-4">
                            Estado procesal
                            <input type="text" class="form-control" id="pESTADO_PROCESO" name="pESTADO_PROCESO">
                        </div>
                        <div class="col-md-4">
                            Fecha de inicio del proceso
                            <input type="date"  class="form-control" id="pFECHA_PROCESO" name="pFECHA_PROCESO">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Fecha del estado procesal
                            <input type="date"  class="form-control" id="pFECHA_ESTADO_PROC" name="pFECHA_ESTADO_PROC">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-default">Guardar resolución</button>
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
                                <th>Id resolución</th>
                                <th>Estado</th>
                                <th>Delito(s)</th>
                                <th>Agencia del ministerio público</th>
                                <th>Tipo de fuero</th>
                                <th>Fecha de nicio de averiguación previa</th>
                                <th>Fecha de estado de averiguación previa</th>
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
                    </div>
                </form>
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
            <div class="tab-pane fade" id="Estimulos_recibidos" role="tabpanel" aria-labelledby="Estimulos_recibidos-tab">
                <div class="container">
                    <form action="#" autocomplete="off">
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <center><strong class="titulo">Estímulos recibidos</strong></center>

                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="clr">*</span>Tipo de estímulo <!-- Se llena del catálogo "TIPO_ESTIMULO" -->
                                <select  class="form-control" id="pID_TIPO_ESTIMULO" name="pID_TIPO_ESTIMULO" required></select>
                            </div>
                            <div class="col-md-4">
                                Descripción
                                <input type="text" class="form-control" id="pDESCRIPCION" name="pDESCRIPCION">
                            </div>
                            <div class="col-md-4">
                                Dependencia que otorga
                                <input type="text" class="form-control" id="pDEPENDENCIA" name="pDEPENDENCIA">
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-4">
                                <span class="clr">*</span>Fecha de otorgamiento
                                <input type="date" class="form-control" id="pFECHA_OTORGAMIENTO" name="pFECHA_OTORGAMIENTO" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-default">Guardar estímulo</button>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <table id="table" class="table display">
                            <thead>
                                <th>Id estimulo</th>
                                <th>Tipo de estímulo</th>
                                <th>Descripción</th>
                                <th>Dependencia que otorga</th>
                                <th>Fecha de otorgamiento</th>
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
    </div>
    <div class="content_submenu_identificacion"  style="display: none">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="mediafiliacion" role="tabpanel" aria-labelledby="mediaFiliacion-tab">
            <div class="container">
                <form action="#" autocomplete="off">
                <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                        <center><strong >Media filiación</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Complexión
                            <select name="pCAT_COMPLEXION" id="pCAT_COMPLEXION" class="form-control"></select>
                        </div>
                        <div class="col-md-4">
                            Color de piel
                            <select name="pCAT_COLOR_PIEL" id="pCAT_COLOR_PIEL" class="form-control"></select>
                        </div>
                        <div class="col-md-4">
                            Cara
                            <select name="pCAT_CARA" id="pCAT_CARA" class="form-control"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Cabello</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            Cantidad
                            <select name="pCaT_CABELLO_CANTIDAD" id="pCAT_CABELLO_CANTIDAD" class="form-control"></select>
                        </div>
                        <div class="col-md-3">
                            Color
                            <select name="pCAT_CABELLO_COLOR" id="pCAT_CABELLO_COLOR" class="form-control"></select>
                        </div>
                        <div class="col-md-3">
                            Forma
                            <select name="pCAT_CABELLO_FORMA" id="pCAT_CABELLO_FORMA" class="form-control"></select>
                        </div>
                        <div class="col-md-3">
                            Calvicie
                            <select name="pCAT_CABELLO_CALVICIE" id="pCAT_CABELLO_CALVICIE" class="form-control"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            Implantación
                            <select name="pCAT_CABELLO_IMPLANTAC" id="pCAT_CABELLO_IMPLANTAC" class="form-control"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Frente</strong></center>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Altura
                            <select name="pCAT_FRENTE_ALTURA" id="pCAT_FRENTE_ALTURA" class="form-control"></select>
                        </div>
                        <div class="col-md-4">
                            Inclinación
                            <select name="pCAT_FRENTE_INCLINACION" id="pCAT_FRENTE_INCLINACION" class="form-control"></select>
                        </div>
                        <div class="col-md-4">
                            Ancho
                            <select name="pCAT_FRENTE_ANCHO" id="pCAT_FRENTE_ANCHO" class="form-control"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Cejas</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            Dirección
                            <select name="pCAT_CEJAS_DIRECCION" id="pCAT_CEJAS_DIRECCION" class="form-control"></select>
                        </div>
                        <div class="col-md-3">
                            Implantación
                            <select name="pCAT_CEJAS_IMPLANTAC" id="pCAT_CEJAS_IMPLANTAC" class="form-control"></select>
                        </div>
                        <div class="col-md-3">
                            Forma
                            <select name="pCAT_CEJAS_FORMA" id="pCAT_CEJAS_FORMA" class="form-control"></select>
                        </div>
                        <div class="col-md-3">
                            Tamaño
                            <select name="pCAT_CEJAS_TAMANO" id="pCAT_CEJAS_TAMANO" class="form-control"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Ojos</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Color
                            <select name="pCAT_OJOS_COLOR" id="pCAT_OJOS_COLOR" class="form-control"></select>
                        </div>
                        <div class="col-md-4">
                            Forma
                            <select name="pCAT_OJOS_FORMA" id="pCAT_OJOS_FORMA" class="form-control"></select>
                        </div>
                        <div class="col-md-4">
                        Tamaño
                        <select name="pCAT_OJOS_TAMANO" id="pCAT_OJOS_TAMANO" class="form-control"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Nariz</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            Raíz
                            <select name="pCAT_NARIZ_RAIZ" id="pCAT_NARIZ_RAIZ" class="form-control"></select>
                        </div>
                        <div class="col-md-3">
                            Dorso
                            <select name="pCAT_NARIZ_DORSO" id="pCAT_NARIZ_DORSO" class="form-control"></select>
                        </div>
                        <div class="col-md-3">
                            Ancho
                            <select name="pCAT_NARIZ_ANCHO" id="pCAT_NARIZ_ANCHO" class="form-control"></select>
                        </div>
                        <div class="col-md-3">
                            Base
                            <select name="pCAT_NARIZ_BASE" id="pCAT_NARIZ_BASE" class="form-control"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            Altura
                            <select name="pCAT_NARIZ_ALTURA" id="pCAT_NARIZ_ALTURA" class="form-control"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Boca</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Tamaño
                            <select name="pCAT_BOCA_TAMANO" id="pCAT_BOCA_TAMANO" class="form-control"></select>
                        </div>
                        <div class="col-md-4">
                            Comisuras
                            <select name="pCAT_BOCA_COMISURAS" id="pCAT_BOCA_COMISURAS" class="form-control"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Labios</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Espesor
                            <select name="pCAT_LABIOS_ESPESOR" id="pCAT_LABIOS_ESPESOR" class="form-control"></select>
                        </div>
                        <div class="col-md-4">
                            Altura naso-labial
                            <select name="pCAT_LABIOS_ALTURA" id="pCAT_LABIOS_ALTURA" class="form-control"></select>
                        </div>
                        <div class="col-md-4">
                            Prominencia
                            <select name="pCAT_LABIOS_PROMINENCIA" id="pCAT_LABIOS_PROMINENCIA" class="form-control"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Mentón</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Tipo
                            <select name="pCAT_MENTON_TIPO" id="pCAT_MENTON_TIPO" class="form-control"></select>
                        </div>
                        <div class="col-md-4">
                            Forma
                            <select name="pCAT_MENTON_FORMA" id="pCAT_MENTON_FORMA" class="form-control"></select>
                        </div>
                        <div class="col-md-4">
                            Inclinación
                            <select name="pCAT_MENTON_INCLINACION" id="pCAT_MENTON_INCLINACION" class="form-control"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Oreja derecha</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-md-4">
                            Forma
                            <select name="pCAT_OREJA_FORMA" id="pCAT_OREJA_FORMA" class="form-control"></select>
                        </div>
                        <div class="col-md-4">
                            Original
                            <select name="pCAT_OREJA_ORIGINAL" id="pCAT_OREJA_ORIGINAL" class="form-control"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <center><h6 style="color: #6b6b6b; font-size: 1.0rem"><strong>Helix</strong></h6></center>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            Superior
                            <select name="pCAT_OREJA_HEL_SUP" id="pCAT_OREJA_HEL_SUP" class="form-control"></select>
                        </div>
                        <div class="col-md-3">
                            Posterior
                            <select name="pCAT_OREJA_HEL_POST" id="pCAT_OREJA_HEL_POST" class="form-control"></select>
                        </div>
                        <div class="col-md-3">
                            Adherencia
                            <select name="pCAT_OREJA_HEL_ADHEREN" id="pCAT_OREJA_HEL_ADHEREN" class="form-control"></select>
                        </div>
                        <div class="col-md-3">
                            Contorno
                            <select name="pCAT_OREJA_HEL_CONTORNO" id="pCAT_OREJA_HEL_CONTORNO" class="form-control"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <center><h6 style="color: #6b6b6b; font-size: 1.0rem"><strong>Lóbulo</strong></h6></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                                Adherencia
                                <select name="pCAT_OREJA_LOB_ADHEREN" id="pCAT_OREJA_LOB_ADHEREN" class="form-control"></select>
                            </div>
                            <div class="col-md-3">
                                Particularidad
                                <select name="pCAT_OREJA_LOB_PARTIC" id="pCAT_OREJA_LOB_PARTIC" class="form-control"></select>
                            </div>
                            <div class="col-md-3">
                                Dimensión
                                <select name="pCAT_OREJA_LOB_DIMEN" id="pCAT_OREJA_LOB_DIMEN" class="form-control"></select>
                            </div>


                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><h6 style="color: #6b6b6b; font-size: 1.0rem"><strong>Sangre</strong></h6></center>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Tipo
                            <select class="form-control" name="pCAT_SANGRE" id="pCAT_SANGRE"></select>
                        </div>
                        <div class="col-md-4">
                            Factor RH
                            <select class="form-control" name="pCAT_FACTOR_RH" id="pCAT_FACTOR_RH"></select>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><h6 style="color: #6b6b6b; font-size: 1.0rem"><strong>Otros</strong></h6></center>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            *¿Usa anteojos?
                            <select class="form-control" name="pCAT_LENTES" id="pCAT_LENTES"></select>
                        </div>
                        <div class="col-md-4">
                            *Estatura (cm)
                            <input type="text" class="form-control" id="pCAT_ESTATURA" name="pCAT_ESTATURA" >
                        </div>
                        <div class="col-md-4">
                            *Peso (kg)
                            <select class="form-control" name="pCAT_PESO" id="pCAT_PESO"></select>
                        </div>

                    </div>
                </form>
                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <center><input type="button" name="next" class="btn btn-default" style="height:40px;" value="Siguiente"/></center>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="Datos" role="tabpanel" aria.labelledby="Datos-tab">
            <div class="container">
                <form action="#" autocomplete="off">
                <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                        <center><strong >Media filiación</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Complexión: <p>Delgada</p>

                        </div>
                        <div class="col-md-4">
                            Color de piel: <p>Blanca</p>

                        </div>
                        <div class="col-md-4">
                            Cara: <p>Ovalada</p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Cabello</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            Cantidad: <p>Escaso</p>

                        </div>
                        <div class="col-md-3">
                            Color: <p>Castaño oscuro</p>

                        </div>
                        <div class="col-md-3">
                            Forma: <p>Ondulado</p>

                        </div>
                        <div class="col-md-3">
                            Calvicie: <p>Calvicie</p>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            Implantación: <p>Circular</p>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Frente</strong></center>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Altura: <p>Grande</p>

                        </div>
                        <div class="col-md-4">
                            Inclinación: <p>Intermedia</p>

                        </div>
                        <div class="col-md-4">
                            Ancho: <p>Grande</p>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Cejas</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            Dirección: <p>Horizonal</p>

                        </div>
                        <div class="col-md-3">
                            Implantación: <p>Altas</p>

                        </div>
                        <div class="col-md-3">
                            Forma: <p>Arqueadas</p>

                        </div>
                        <div class="col-md-3">
                            Tamaño: <p>Delgadas</p>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Ojos</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Color: <p>Café oscuro</p>

                        </div>
                        <div class="col-md-4">
                            Forma: <p>Ovales</p>

                        </div>
                        <div class="col-md-4">
                        Tamaño: <p>Regulares</p>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Nariz</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            Raiz: <p>Pequeña</p>

                        </div>
                        <div class="col-md-3">
                            Dorso: <p>Recto</p>

                        </div>
                        <div class="col-md-3">
                            Ancho: <p>Mediana</p>

                        </div>
                        <div class="col-md-3">
                            Base: <p>Horizontal</p>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            Altura: <p>Pequeña</p>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Boca</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Tamaño: <p>Mediana</p>

                        </div>
                        <div class="col-md-4">
                            Comisuras: <p>Comisuras</p>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Labios</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Espesor: <p>Delgados</p>

                        </div>
                        <div class="col-md-4">
                            Altura naso-labial: <p>Mediana</p>

                        </div>
                        <div class="col-md-4">
                            Prominencia: <p>Ninguno</p>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Mentón</strong></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Tipo: <p>Ninguno</p>

                        </div>
                        <div class="col-md-4">
                            Forma: <p>Oval</p>

                        </div>
                        <div class="col-md-4">
                            Inclinación: <p>Vertical</p>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Oreja derecha</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-md-4">
                            Forma: <p>Ovalada</p>

                        </div>
                        <div class="col-md-4">
                            Original: <p>Pequeño</p>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <center><h6 style="color: #6b6b6b; font-size: 1.0rem"><strong>Helix</strong></h6></center>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            Superior: <p>Mediano</p>

                        </div>
                        <div class="col-md-3">
                            Posterior: <p>Mediano</p>

                        </div>
                        <div class="col-md-3">
                            Adherencia: <p>Muy separado</p>

                        </div>
                        <div class="col-md-3">
                            Contorno: <p>En golfo</p>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <center><h6 style="color: #6b6b6b; font-size: 1.0rem"><strong>Lóbulo</strong></h6></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                                Adherencia: <p>Separado</p>

                            </div>
                            <div class="col-md-3">
                                Particularidad: <p>Islote</p>

                            </div>
                            <div class="col-md-3">
                                Dimensión: <p>Mediano</p>

                            </div>


                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><h6 style="color: #6b6b6b; font-size: 1.0rem"><strong>Sangre</strong></h6></center>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Tipo: <p>A</p>

                        </div>
                        <div class="col-md-4">
                            Factor RH: <p>+</p>


                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><h6 style="color: #6b6b6b; font-size: 1.0rem"><strong>Otros</strong></h6></center>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            *Usa anteojos: <p>Si</p>

                        </div>
                        <div class="col-md-4">
                            *Estatura (Cm): <p>1.80Cm</p>

                        </div>
                        <div class="col-md-4">
                            *Peso(KG): <p>81 Kg</p>

                        </div>

                    </div>
                </form>

            </div>
        </div>
        <div class="tab-pane fade show" id="Senas_particulares" role="tabpanel" aria-labelledby="Senas_particulares-tab">
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
                            <select name="" id="" class="form-control" required></select>
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Lado
                            <select name="" id="" class="form-control" required></select>
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Región
                            <select name="" id="" class="form-control" required></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="clr">*</span>Vista
                            <select name="" id="" class="form-control" required></select>
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Cantidad
                            <input type="text" class="form-control" required>
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
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                                <table id="table" class="table display">
                                    <thead>
                                            <th>Id seña</th>
                                            <th>Tipo de seña</th>
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
        <div class="tab-pane fade show" id="Registro_decadactilar" role="tabpanel" aria-labelledby="Registro_decadactilar-tab">
            <div class="container">
                <form action="#" autocomplete="off">
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <!-- SPACE -->
                        </div>
                        <div class="col-md-4">
                            <center><strong class="titulo">Registro decadactilar</strong></center>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <dd>CUIP:</dd>
                                <dd>Adscripcion:</dd>
                                <dd>Dependencia:</dd>
                                <dd>Nombre(s):</dd>
                                <dd>Apellido materno:</dd>
                                <dd>Sexo:</dd>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <dd>Folio:</dd>
                                <dd>Institución</dd>
                                <dd>Apellido paterno</dd>
                                <dd>Edad:</dd>
                                <dd>Fecha de nacimiento:</dd>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <!-- SPACE -->
                        </div>
                        <div class="col-md-4">
                            Seleccione un documento
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
                        <div class="col-md-4">
                            <button class="btn btn-light">
                                Guardar registro
                            </button>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="table" class="table display">
                                <thead>
                                        <th>Id registro dactilar</th>
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
        <div class="tab-pane fade show " id="Identificacion_de_voz" role="tabpanel" aria-labelledby="Identificacion_de_voz-tab">
            <div class="container">
                <form action="#" autocomplete="off">
                        <br>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <strong class="titulo"><center>Identificación de voz</center></strong>
                        </div>
                    </div>
                        <br>
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">
                            <strong><center>Especificaciones para el archivo de identificación de voz</center></strong>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <dd>Formato: WAV PCM</dd>
                                <dd>Sonido: Monoaural</dd>
                                <dd>Duración del sonido: 2 minutos</dd>
                                <dd>Frecuencia de muestreo: 8000HZ-11025HZ</dd>
                            </ul>
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
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <dd>Adscripción:</dd>
                                <dd>Dependencia</dd>
                                <dd>Institución</dd>
                            </ul>
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
        <div class="tab-pane fade show" id="Ficha_fotografica" role="tabpanel" aria-labelledby="Ficha_fotografica-tab">
            <div class="container">
                <form action="#" autocomplete="off">
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <!-- SPACE -->
                        </div>
                        <div class="col-md-4">
                            <strong class="titulo"><center>Ficha fotográfica</center></strong>
                        </div>
                    </div>
                    <br>

                        <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <strong><center>Parámetros</center></strong>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <dd>CUIP:</dd>
                                <dd>Nombre(s):</dd>
                                <dd>Apellido paterno:</dd>
                                <dd>Apellido materno</dd>
                                <dd>Fecha de nacimiento:</dd>
                                <dd>Adscripción:</dd>
                                <dd>Dependencia:</dd>
                                <dd>Institución</dd>
                            </ul>
                        </div>
                    </div>
                    <hr>
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
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <button class="btn btn-light">subir</button>
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
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <button class="btn btn-light">subir</button>
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
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <button class="btn btn-light">subir</button>
                        </div>
                    </div>
                    <br>
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
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <button class="btn btn-light">subir</button>
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
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <button class="btn btn-light">subir</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="table" class="table display">
                                <thead>
                                        <th>Id evaluación</th>
                                        <th>Tipo de evaluación</th>
                                        <th>Examen</th>
                                        <th>Lugar de aplicación</th>
                                        <th>Fecha de programación</th>
                                        <th>Fecha de resultado</th>
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
        <div class="tab-pane fade show" id="Digitalizacion_de_documento" role="tabpanel" aria-labelledby="Digitalizacion_de_documento-tab">
                <form action="#" autocomplete="off">
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                            <!-- SPACE -->
                        </div>
                        <div class="col-md-8">
                            <strong class="titulo"><center>Digitalización de documento</center></strong>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Tipo de documento
                            <select name="" id="" class="form-control">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            Categoría de documento
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
                        <div class="col-md-4">
                            <button class="btn btn-light">
                                Guardar ficha
                            </button>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="table" class="table display">
                                <thead>
                                        <th>Id documento</th>
                                        <th>Categoría de documento</th>
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
    </div>
</div>


<script type="text/javascript">
//DATOS GENERALES
$("#datosGenerales-tab").click(function(){
    $("#submenu_datos_generales").css("display","block");
    $(".content_submenu_datos_generales").css("display","block");
    $("#submenu_objetos_asignados").css("display","none");
    $(".content_submenu_objetos_asignados").css("display","none");
    $("#submenu_laboral").css("display","none");
    $(".content_submenu_laboral").css("display","none");
    $("#submenu_capacitacion").css("display","none");
    $(".content_submenu_capacitacion").css("display","none");
    $("#submenu_sanciones_y_estimulos").css("display","none");
    $(".content_submenu_sanciones_y_estimulos").css("display","none");
    $("#submenu_identificacion").css("display","none");
    $(".content_submenu_identificacion").css("display","none");
});
//OBJETOS ASIGNADOS
$("#objetosAsignados-tab").click(function(){
    $("#submenu_datos_generales").css("display","none");
    $(".content_submenu_datos_generales").css("display","none");
    $("#submenu_objetos_asignados").css("display","block");
    $(".content_submenu_objetos_asignados").css("display","block");
    $("#submenu_laboral").css("display","none");
    $(".content_submenu_laboral").css("display","none");
    $("#submenu_capacitacion").css("display","none");
    $(".content_submenu_capacitacion").css("display","none");
    $("#submenu_sanciones_y_estimulos").css("display","none");
    $(".content_submenu_sanciones_y_estimulos").css("display","none");
    $("#submenu_identificacion").css("display","none");
    $(".content_submenu_identificacion").css("display","none");
});
//LABORAL
$("#Laboral-tab").click(function(){


    $("#submenu_datos_generales").css("display","none");
    $(".content_submenu_datos_generales").css("display","none");
    $("#submenu_objetos_asignados").css("display","none");
    $(".content_submenu_objetos_asignados").css("display","none");
    $("#submenu_laboral").css("display","block");
    $(".content_submenu_laboral").css("display","block");
    $("#submenu_capacitacion").css("display","none");
    $(".content_submenu_capacitacion").css("display","none");
    $("#submenu_sanciones_y_estimulos").css("display","none");
    $(".content_submenu_sanciones_y_estimulos").css("display","none");
    $("#submenu_identificacion").css("display","none");
    $(".content_submenu_identificacion").css("display","none");
});

$("#Capacitacion-tab").click(function(){
    $("#submenu_datos_generales").css("display","none");
    $(".content_submenu_datos_generales").css("display","none");
    $("#submenu_objetos_asignados").css("display","none");
    $(".content_submenu_objetos_asignados").css("display","none");
    $("#submenu_laboral").css("display","none");
    $(".content_submenu_laboral").css("display","none");
    $("#submenu_capacitacion").css("display","block");
    $(".content_submenu_capacitacion").css("display","block");
    $("#submenu_sanciones_y_estimulos").css("display","none");
    $(".content_submenu_sanciones_y_estimulos").css("display","none");
    $("#submenu_identificacion").css("display","none");
    $(".content_submenu_identificacion").css("display","none");
});

$("#Sanciones-tab").click(function(){
    $("#submenu_datos_generales").css("display","none");
    $(".content_submenu_datos_generales").css("display","none");
    $("#submenu_objetos_asignados").css("display","none");
    $(".content_submenu_objetos_asignados").css("display","none");
    $("#submenu_laboral").css("display","none");
    $(".content_submenu_laboral").css("display","none");
    $("#submenu_capacitacion").css("display","none");
    $(".content_submenu_capacitacion").css("display","none");
    $("#submenu_sanciones_y_estimulos").css("display","block");
    $(".content_submenu_sanciones_y_estimulos").css("display","block");
    $("#submenu_identificacion").css("display","none");
    $(".content_submenu_identificacion").css("display","none");
})
$("#Identificacion-tab").click(function(){
    $("#submenu_datos_generales").css("display","none");
    $(".content_submenu_datos_generales").css("display","none");
    $("#submenu_objetos_asignados").css("display","none");
    $(".content_submenu_objetos_asignados").css("display","none");
    $("#submenu_laboral").css("display","none");
    $(".content_submenu_laboral").css("display","none");
    $("#submenu_capacitacion").css("display","none");
    $(".content_submenu_capacitacion").css("display","none");
    $("#submenu_sanciones_y_estimulos").css("display","none");
    $(".content_submenu_sanciones_y_estimulos").css("display","none");
    $("#submenu_identificacion").css("display","block");
    $(".content_submenu_identificacion").css("display","block");
})
</script>