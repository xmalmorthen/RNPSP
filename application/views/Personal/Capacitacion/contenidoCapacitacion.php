    <div class="tab-pane fade show active" id="Capacitacion_adicional" role="tabpanel" aria-labelledby="Capacitacion_adicional-tab">
        <div class="container">
            <form action="#" id="Capacitacion_adicional_form" name="Capacitacion_adicional_form" autocomplete="off">
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
                        <Input type="text" class="form-control" id="pEMPRESA" name="pEMPRESA" required minlength="2" maxlength="100">
                    </div>
                    <div class="col-md-4">
                        Estudio o curso
                        <Input type="text" class="form-control" id="pCURSO_CAPACITACION_ADICIONAL" name="pCURSO_CAPACITACION_ADICIONAL" minlength="2" maxlength="60">
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
                        <select class="form-control" id="pID_MODALIDAD_CURSO" name="pID_MODALIDAD_CURSO" required>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Eficiencia terminal <!-- Se llena del catalogo "EFICIENCIA" -->
                        <select  class="form-control" id="pID_EFICIENCIA_CAPACITACION_ADICIONAL" name="pID_EFICIENCIA_CAPACITACION_ADICIONAL" required>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        Fecha de inicio
                        <input type="date"  class="form-control" id="pFECHA_INICIO_CAPACITACION_ADICIONAL" name=pFECHA_INICIO_CAPACITACION_ADICIONAL
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
                        <Input type="text" class="form-control" id="pDURACION_CAPACITACION_ADICIONAL" name="pDURACION_CAPACITACION_ADICIONAL" minlength="1" maxlength="10">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default" id="guardarCapacitacion">Guardar capacitación adicional</button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">

                    </div>
                </div>
                <br>
                <hr>
                <br>
                <table id="tableCapacitacionadicional" class="table display">
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
                            <button class="btn btn-default" id="anteriorCapacitacion"> Anterior</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default" id="siguienteCapacitacion">Siguiente</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-4"></div>

            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="Capacitacion_seguridad_publica" role="tabpanel" aria-labelledby="Capacitacion_seguridad_publica-tab">
        <div class="container">
            <form action="#" id="Capacitacion_seguridad_publica_form" name="Capacitacion_seguridad_publica" autocomplete="off">
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
                        <Input type="text" class="form-control" id="pCURSO_CAPACITACION_SEGURIDAD_PUBLICA" name="pCURSO_CAPACITACION_SEGURIDAD_PUBLICA" minlength="2" maxlength="150">
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
                        <select  class="form-control" id="pID_EFICIENCIA_CAPACITACION_SEGURIDAD_PUBLICA" name="pID_EFICIENCIA_CAPACITACION_SEGURIDAD_PUBLICA">
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
                        <Input type="text" class="form-control" id="pDURACION_CAPACITACION_SEGURIDAD_PUBLICA" name="pDURACION_CAPACITACION_SEGURIDAD_PUBLICA" minlength="1" maxlength="10">
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
                    <table id="tableCapacitacionseguridapublica" class="table display">
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

     <div class="tab-pane fade" id="Idiomas_dialectos" role="tabpanel" aria-labelledby="Idiomas_dialectos-tab">
        <div class="container">
            <form action="#" name="Idiomas_dialectos_form" id="Idiomas_dialectos_form"autocomplete="off">
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
                                <Input type="text" class="form-control" class="form-control" id="pGRADO_LECTURA" name="pGRADO_LECTURA" minlength="1" maxlength="10">
                            </div>
                            <div class="col-md-1" style="margin-left: -12px;margin-top: 7px;" >%</div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        Escritura
                        <div class="row">
                            <div class="col-md-10">
                                <Input type="text" class="form-control" class="form-control" id="pGRADO_ESCRITURA" name="pGRADO_ESCRITURA" minlength="1" maxlength="10">
                            </div>
                            <div class="col-md-1" style="margin-left: -12px;margin-top: 7px;" >%</div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        Conversación
                        <div class="row">
                            <div class="col-md-10">
                                <Input type="text" class="form-control" class="form-control" id="pGRADO_CONVERSACION" name="pGRADO_CONVERSACION" minlength="1" maxlength="10">
                            </div>
                            <div class="col-md-1" style="margin-left: -12px;margin-top: 7px;" >%</div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default" id="guardarIdioma">Guardar idioma y/o dialecto</button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">

                    </div>
                </div>
                <br>
                <hr>
                <br>
                <table id="tableIdiomas" class="table display">
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
                            <button class="btn btn-default" id="anteriorIdioma"> Anterior</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default" id="siguienteIdioma">Siguiente</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-4"></div>

            </div>
        </div>
    </div>

     <div class="tab-pane fade" id="Habilidades_aptitudes" role="tabpanel" aria-labelledby="Habilidades_aptitudes-tab">
        <div class="container">
            <form action="#" id="Habilidades_aptitudes_form" name="Habilidades_aptitudes_form"autocomplete="off">
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
                        <select class="form-control" id="ID_TIPO_APTITUD" name="ID_TIPO_APTITUD" required>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        Descripción
                        <input type="text" class="form-control" id="ESPECIFIQUE" name="ESPECIFIQUE" minlength="0" maxlength="100">
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Grado de aptitud o dominio <!-- Se rellena con el catalogo "GRADO_APTITUD_HAB" depende del select "TIPO_ACTITUD" -->
                        <select class="form-control" id="ID_GRADO_APT_HAB" name="ID_GRADO_APT_HAB" required>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default" id="guardarHabilidad">Guardar habilidad y/o aptitud</button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">

                    </div>
                </div>
                <br>
                <hr>
                <br>
                <table id="tableHabilidades" class="table display">
                    <thead>
                        <th>Id habilidad y/o aptitud</th>
                        <th>Tipo de habilidad y/o aptitud</th>
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
                            <button class="btn btn-default" id="anteriorHabilidad"> Anterior</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default" id="SiguienteHabilidad">Siguiente</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-4"></div>

            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="Afiliacion_agrupaciones" role="tabpanel" aria-labelledby="Afiliacion_agrupaciones-tab">
        <div class="container">
            <form action="#" id="Afiliacion_agrupaciones_form" name="Afiliacion_agrupaciones_form" autocomplete="off">
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
                        <Input type="text" class="form-control" id="pNOMBRE_AGRUPACION" name="pNOMBRE_AGRUPACION" required minlength="2" maxlength="90">
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Fecha de tipo de agrupación<!-- Se llena con el catalogo "TIPO_AGRUPACION" -->
                        <select  class="form-control" id="pID_TIPO_AGRUPACION" name="pID_TIPO_AGRUPACION" required></select>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Fecha de inicio de afiliación
                        <input type="date" class="form-control" id="pFECHA_INICIO_AGRUPACION" name="pFECHA_INICIO_AGRUPACION" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Término de afiliación
                        <input type="date" class="form-control" id="pFECHA_TERMINO_AGRUPACION" name="pFECHA_TERMINO_AGRUPACION">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default" id="guardarAfilicacion">Guardar afiliación</button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">

                    </div>
                </div>
                <br>
                <hr>
                <br>
                <table id="tableAfiliacionagrupaciones" class="table display">
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
                            <button class="btn btn-default" id="anteriorAfiliacion"> Anterior</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default" id="finalizarCapacitacion">Finalizar</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-4"></div>

            </div>
        </div>
    </div>


 