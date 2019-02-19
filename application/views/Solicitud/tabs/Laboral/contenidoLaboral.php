    <div class="tab-pane fade show active" id="Adscripcion_actual" role="tabpanel" aria-labelledby="Adscripcion_actual-tab">
        <div class="_container">
            <form action="#" id="Adscripcion_actual_form" name="Adscripcion_actual_form" autocomplete="off">
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
                            <span class="clr">*</span>Dependencia <!-- Se llena del catalogo "CAT_DEPENDENCIA" -->
                            <select id="_dependenciaAdscripcionActual" name="_dependenciaAdscripcionActual"  class="form-control" data-error="#err__dependenciaAdscripcionActual" data-query='KzF1aFlFL3JFNDJyUzRxUUVFeGM5d3A4SEp0YXZjYnltR0NvMUFRbytnVi9JbVhtOW1XTnl6MW5qMzdOZ3dUZVI4enMyMElxcDVrZWlDTXVPcXdFUG9sT2s3TkZyUnlqQkdiY0pUNStPbTU5dVFlOGJhMzVvaXNNWEU1dmo5NWlHNmx3YzdCbzNueUsvWngwa2RFeEYvdnNsTUNVdlNTR3ZoOWsrRVVaY2NvPQ==' required></select> <!-- FALTA ID Y NAME -->
                            <span id="err__dependenciaAdscripcionActual"></span>
                        </div>
                        <div class="col-md-6">
                            <span class="clr">*</span>Corporación <!-- Se llena del catalogo "CAT_INSTITUCION" -->
                            <select  class="form-control" id="pINSTITUCION" name="pINSTITUCION" data-error="#err_pINSTITUCION" data-query='Q1B0ZnNNbzI4bEFpTG5sSGdqVHVMNU4xMXlKVXBCUXpFbUt5Ynh2ZzFneTM0eUdiSmRubTJUdE5HYjBTY2FSV2hUUkE4ZVUzSGhjZVlEWWdxQ2krNnBpaVlQazk5MTgwV1pybktnN0NQOW0vQXlBZnVEZnJpWmk4b0x3V1VRSTBaM0U1LzBERjcvcmVWMjBQWXNKMlNNMFVkWTlDNFVrSythaU43bHhia3BVPQ==' data-cascade='true' data-force-refresh='true' data-cascade-id-ref='_dependenciaAdscripcionActual' data-params='ID_DEPENDENCIA={0}' required></select>
                            <span id="err_pINSTITUCION"></span>
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
                            <input type="text"  id="pCP_EMP_ADSCRIPCION_ACTUAL" name="pCP_EMP_ADSCRIPCION_ACTUAL" class="form-control" class="form-control" required maxlength="5">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Estado <!-- Se llena del catalogo "CAT_ENTIDAD" -->
                            <select  class="form-control" id="pID_ENTIDAD_ADSCRIPCION_ACTUAL" name="pID_ENTIDAD_ADSCRIPCION_ACTUAL" data-error="#err_pID_ENTIDAD_ADSCRIPCION_ACTUAL" data-query='RG51N2cyVWNFVVp5Rlc5WDYydU0wcm0wbys4dElkSU1uaHBpTTJHMEJqOGVqdmRkUXJRUzB0TVZIa2Y0UldSWGpiMS9xQXhOWE5oVndVN0QzSFpHWHI4NEVzWTRIRU5RTmxjS09EK243V002bi9RV1ZUTU0waGRHdWlHSzFaT04=' required></select>
                            <span id="err_pID_ENTIDAD_ADSCRIPCION_ACTUAL"></span>
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Municipio <!-- Se llena del catalogo "CAT_MUNICIPIO" dependiendo del catalogo de "ENTIDAD" -->
                            <select  class="form-control" id="pID_MUNICIPIO_ADSCRIPCION_ACTUAL" name="pID_MUNICIPIO_ADSCRIPCION_ACTUAL" data-error="#err_pID_MUNICIPIO_ADSCRIPCION_ACTUAL" data-query='c244RWRmblByTDlCWExpTHc0ZnQ3NGUzbWMza1Y5MnZCck9rQmpCQ1hTdlA3dzJyRVNMRjhXTll4WmNmYkplM1BKM1BWckJ3RFdieG55eUNldGZ3N1dyS2taNXhWd2RWczkzT0lsVTk1anZPcVJFclZBN05mTUtwbjJuazJqa0tSaXVENkI2WVErcmUxNlFoVUFNamttMjB1S3RxK0ZjUFA3cEFhM0Fvak53PQ==' data-cascade='true' data-force-refresh='true' data-cascade-id-ref='pID_ENTIDAD_ADSCRIPCION_ACTUAL' data-params='ID_ENTIDAD={0}' required></select>
                            <span id="err_pID_MUNICIPIO_ADSCRIPCION_ACTUAL"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Ciudad
                            <input type="text" class="form-control" class="form-control" maxlength="50">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Colonia/Localidad
                            <input type="text" id="Colonia_Adscripcion_actual" name="Colonia_Adscripcion_actual" class="form-control" class="form-control" required maxlength="60">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Calle
                            <input type="text" id="Calle" name="Calle" class="form-control" required maxlength="50">
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="clr">*</span>Número exterior
                            <input type="text" id="pNUM_EXTERIOR" name="pNUM_EXTERIOR" class="form-control" required maxlength="30" minlength="5"  required> 
                        </div>
                        <div class="col-md-4">
                            Número interior
                            <input type="text" id="pNUM_INTERIOR" name="pNUM_INTERIOR" class="form-control" maxlength="30" minlength="4">
                        </div>
                        <div class="col-md-4">
                        <span class="clr">*</span>Número telefónico
                            <input type="text"  id="pTELEFONO" name="pTELEFONO"  class="form-control" required minlength="10" maxlength="13">
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
                            <span class="clr">*</span>Puesto <!-- pendiente -->
                            <select  class="form-control" id="pPUESTO_ADSCRIPCION_ACTUAL" name="pPUESTO_ADSCRIPCION_ACTUAL" required>
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            Especialidad
                            <input type="text" id="pESPECIALIDAD" name="pESPECIALIDAD" class="form-control" maxlength="100">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Rango o categoría
                        <input type="text" id="pRANGO" name="pRANGO" class="form-control" maxlength="30">
                        </div>
                        <div class="col-md-4">
                            Nivel de mando <!-- Se llena del catalogo "CAT_NIVEL_MANDO" -->
                            <select  class="form-control" id="pID_NIVEL_MANDO" name="pID_NIVEL_MANDO" data-error="#err_pID_NIVEL_MANDO" data-query='ZTNHS0t4VzB5TTVIWFRSOTJyTk1EaklOUWNzYm9RZ0FqN1lFQUFuSWpZVWQ4c3FMMEtjNU12TUlxWFJXR2p0R3g4TWx3Q1FBVEI5Q2dLcnVnZldsT1dqaWRIWjZURGFLVGI1S3ZpV2NlZEVMMklJZTM5VmFWNGdjbmFhdit5bkd5ZFE5UkYyRkNuU0kzanNxaGxXM2NnMFlKU0pGaHZFZTkvMTZvVFZwdFNvPQ=='></select>
                            <span id="err_pID_NIVEL_MANDO"></span>
                        </div>
                        <div class="col-md-4">
                            Número de placa
                            <input type="text" id="pNUMERO_PLACA" name="pNUMERO_PLACA" class="form-control" maxlength="20">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Número de expediente
                            <input id="pNUMERO_EXPEDIENTE" name="pNUMERO_EXPEDIENTE" type="text" class="form-control" maxlength="20">
                        </div>
                        <div class="col-md-4">
                            Sueldo base (Mensual)
                            <input id="pSUELDO_BASE" name="pSUELDO_BASE" type="text" class="form-control" maxlength="10">
                        </div>
                        <div class="col-md-4">
                            Compensaciones (Mensuales)
                            <input id="pCOMPENSACION" name="pCOMPENSACION" type="text" class="form-control" maxlength="10">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Área o departamento <!-- Se llena del catalogo "CAT_AREA" -->
                            <select  class="form-control" id="pID_AREA" name="pID_AREA" data-error="#err_pID_AREA"></select>
                            <span id="err_pID_AREA"></span>
                        </div>
                        <div class="col-md-4">
                            División
                            <input type="text" id="pDIVISION" name="pDIVISION"  class="form-control" maxlength="30">
                        </div>
                        <div class="col-md-4">
                            Funciones
                            <input type="text"  id="pFUNCIONES" name="pFUNCIONES" class="form-control" maxlength="100">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            CUIP del jefe inmediato
                            <input type="text" id="ID_JEFE" name="ID_JEFE" class="form-control" maxlength="10" >
                        </div>
                        <div class="col-md-4">
                            Nombre del jefe inmediato
                            <input type="text" class="form-control" maxlength="50" >
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-default" id="guardarAdscripcion">Guardar adscripción</button>
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
                            <table id="tableAdscripcionactual" class="table display" style="width:100%">
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
                    <input type="hidden" id="pID_ALTERNA_Adscripcion_actual" name="pID_ESTADO_EMISOR_Adscripcion_actual" value="" >
                    <input type="hidden" id="pID_ESTADO_EMISOR_Adscripcion_actual" name="pID_ALTERNA_Adscripcion_actual" value="" >
                    <input type="hidden" id="pID_EMISOR_Adscripcion_actual" name="pID_EMISOR_Adscripcion_actual" value="" >
                    <input type="hidden" id="pID_DOC_BAJA_Adscripcion_actual" name="pID_DOC_BAJA_Adscripcion_actual" value="" >
                    <input type="hidden" id="pID_TIPO_CONTRATO_Adscripcion_actual" name="pID_TIPO_CONTRATO_Adscripcion_actual" value="" >
                    <input type="hidden" id="pNUMERO_EXPEDIENTE_Adscripcion_actual" name="pNUMERO_EXPEDIENTE_Adscripcion_actual" value="" >
                    <input type="hidden" id="pID_CATEGORIA_PUEST_Adscripcion_actual" name="pID_CATEGORIA_PUEST_Adscripcion_actual" value="" >
                    <input type="hidden" id="pID_JERARQUIA_PUEST_Adscripcion_actual" name="pID_JERARQUIA_PUEST_Adscripcion_actual" value="" >
                    <input type="hidden" id="pID_AMBITO_PUESTO_Adscripcion_actual" name="pID_AMBITO_PUESTO_Adscripcion_actual" value="" >
                </form>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <center><button class="btn btn-default btnSiguienteAnterior siguienteTab" id="siguienteAdscripcion">Siguiente</button></centar>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4"></div>

                </div>
        </div>
    </div>

    <div class="tab-pane fade" id="Empleos_diversos" role="tabpanel" aria-labelledby="Empleos_diversos-tab">
        <form name="Empleos_diversos_form" id="Empleos_diversos_form" action="#">
            <div class="_container">
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
                            <input type="text" id="pEMPRESA" name="pEMPRESA" required  class="form-control"  maxlength="100" >
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Código postal
                            <input type="text" id="pCP_EMP_EMPLEOS_DIVERSOS" name="pCP_EMP_EMPLEOS_DIVERSOS" required  class="form-control"  maxlength="5">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Estado <!-- Se llena del catalogo "CAT_ENTIDAD" -->                            
                            <select  class="form-control" id="pID_ENTIDAD_EMPLEOS_DIVERSOS" name="pID_ENTIDAD_EMPLEOS_DIVERSOS" data-error="#err_pID_ENTIDAD_EMPLEOS_DIVERSOS" data-query='RG51N2cyVWNFVVp5Rlc5WDYydU0wcm0wbys4dElkSU1uaHBpTTJHMEJqOGVqdmRkUXJRUzB0TVZIa2Y0UldSWGpiMS9xQXhOWE5oVndVN0QzSFpHWHI4NEVzWTRIRU5RTmxjS09EK243V002bi9RV1ZUTU0waGRHdWlHSzFaT04=' required></select>
                            <span id="err_pID_ENTIDAD_EMPLEOS_DIVERSOS"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                        <span class="clr">*</span>Municipio <!-- Se llena del catalogo "CAT_MUNICIPIO" dependiendo del catalogo "ENTIDAD" -->
                            <select  class="form-control" id="pID_MUNICIPIO_EMPLEOS_DIVERSOS" name="pID_MUNICIPIO_EMPLEOS_DIVERSOS" data-error="#err_pID_MUNICIPIO_EMPLEOS_DIVERSOS" data-query='c244RWRmblByTDlCWExpTHc0ZnQ3NGUzbWMza1Y5MnZCck9rQmpCQ1hTdlA3dzJyRVNMRjhXTll4WmNmYkplM1BKM1BWckJ3RFdieG55eUNldGZ3N1dyS2taNXhWd2RWczkzT0lsVTk1anZPcVJFclZBN05mTUtwbjJuazJqa0tSaXVENkI2WVErcmUxNlFoVUFNamttMjB1S3RxK0ZjUFA3cEFhM0Fvak53PQ==' data-cascade='true' data-force-refresh='true' data-cascade-id-ref='pID_ENTIDAD_EMPLEOS_DIVERSOS' data-params='ID_ENTIDAD={0}' required></select>
                            <span id="err_pID_MUNICIPIO_EMPLEOS_DIVERSOS"></span>
                        </div>

                        <div class="col-md-4">
                            Colonia/Localidad
                            <input type="text" id="pCOLONIA_EMPLEOS_DIVERSOS" name="pCOLONIA_EMPLEOS_DIVERSOS" required  class="form-control"  maxlength="60">
                        </div>
                        <div class="col-md-4">
                            Calle y número
                            <input type="text" id="pCALLE_Y_NUM_EMPLEOS_DIVERSOS" name="pCALLE_Y_NUM_EMPLEOS_DIVERSOS" required  class="form-control"  maxlength="60">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                                Número telefónico
                            <input type="text" id="pNUM_TELEFONICO" name="pNUM_TELEFONICO"  class="form-control" maxlength="20">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Área o departamento 
                            <input type="text" id="pDESCRIP_AREA" name="pDESCRIP_AREA" required  class="form-control" maxlength="50">
                        </div>
                        <div class="col-md-4">
                            Funciones
                            <input type="text" id="pDESCRIP_FUNCION" name="pDESCRIP_FUNCION"  class="form-control" maxlength="100">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            Ingreso neto (mensual)
                            <input type="text" id="pSUELDO_EMPLEOS_DIVERSOS" name="pSUELDO_EMPLEOS_DIVERSOS"  class="form-control" maxlength="10">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Fecha de ingreso
                            <input type="date" id="pFECHA_INICIO_EMPLEOS_DIVERSOS" name="pFECHA_INICIO_EMPLEOS_DIVERSOS" required  class="form-control">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Fecha de separación
                            <input type="date" id="pFECHA_TERMINO_EMPLEOS_DIVERSOS" name="pFECHA_TERMINO_EMPLEOS_DIVERSOS" required  class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="clr">*</span>Motivo de separación <!-- Se llena del catalogo "TIPO_MOV_LABORAL" -->
                            <select  class="form-control" id="pID_TIPO_MOV_LAB" name="pID_TIPO_MOV_LAB" required >
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Tipo de separación <!-- Se llena del catalogo "MOTIVO_MOV_LAB" -->
                            <select  class="form-control" id="ID_MOTIVO_MOV_LAB" name="ID_MOTIVO_MOV_LAB" required>
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            Descripción
                            <input type="text" id="pDESCRIPCION" name="pDESCRIPCION" class="form-control" maxlength="150">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-default" id="guardarEmpleo">Guardar empleo</button>
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="tableEmpleosdiversos" class="table display">
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
                    <input type="hidden" id="pID_ALTERNA_Empleos_diversos" name="pID_ALTERNA_Empleos_diversos"  value="">
                    <input type="hidden" id="pID_ESTADO_EMISOR_Empleos_diversos" name="pID_ESTADO_EMISOR_Empleos_diversos"  value="">
                    <input type="hidden" id="pID_EMISOR_Empleos_diversos" name="pID_EMISOR_Empleos_diversos"  value="">

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-default btnSiguienteAnterior anteriorTab" id="anteriorEmpleo"> Anterior</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-default btnSiguienteAnterior siguienteTab" id="siguienteEmpleo">Siguiente</button>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4"></div>

                    </div>


            </div>


        </form>
    </div>
 
    <div class="tab-pane fade" id="Actitudes_hacia_el_empleo" role="tabpanel" aria-labelledby="Actitudes_hacia_el_empleo">
        <div class="_container">
            <form name="Actitudes_hacia_el_empleo_form" id="Actitudes_hacia_el_empleo_form" action="#" autocomplete="off">
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
                        <input type="text" id="pELECCION_EMPLEO" name="pELECCION_EMPLEO" class="form-control" maxlength="250">
                    </div>
                    <div class="col-md-4">
                        ¿Qué puesto desearía tener?
                        <input type="text" id="pPUESTO_ACTITUDES_EMPLEO" name="pPUESTO_ACTITUDES_EMPLEO" class="form-control" maxlength="150">
                    </div>
                    <div class="col-md-4">
                        ¿En qué Área o departamento desearía estar?
                        <input type="text" id="pAREA" name="pAREA" class="form-control" maxlength="150">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4" style="margin-top: 42px;" >
                        ¿En qué tiempo desea ascender?
                        <input type="text" id="pTIEMPO_ASCENDER" name="pTIEMPO_ASCENDER" class="form-control" maxlength="20">
                    </div>
                    <div class="col-md-4" style="margin-top: 42px;">
                        ¿Conoce el reglamento de los reconocimientos? <!-- S/N = SI/NO -->
                        <select class="form-control" id="pCONOCE_REG_RECON" name="pCONOCE_REG_RECON" data-error="#err_pCONOCE_REG_RECON" data-query=''>
                            <option disabled selected value>Seleccione una opción</option>
                            <option value="S">SI</option>
                            <option value="N">NO</option>
                        </select>
                        <span id="err_pCONOCE_REG_RECON"></span>
                    </div>
                    <div class="col-md-4" style="margin-top: 21px;">
                        ¿Razones por las que no ha obtenido un reconocimiento?
                        <input type="text" id="pRAZON_NO_RECON" name="pRAZON_NO_RECON" class="form-control" maxlength="150">
                    </div>
                </div>
                <br>
                <div class="row" style="margin-top: 21px;">
                    <div class="col-md-4" style="margin-top: 21px;">
                        ¿Conoce la reglamentación de los ascensos? <!-- S/N = SI/NO -->
                        <select class="form-control" id="pCONOCE_REG_ASCENSO" name="pCONOCE_REG_ASCENSO" data-error="#err_pCONOCE_REG_ASCENSO" data-query=''>
                            <option disabled selected value>Seleccione una opción</option>
                            <option value="S">SI</option>
                            <option value="N">NO</option>
                        </select>
                        <span id="err_pCONOCE_REG_ASCENSO"></span>
                    </div>
                    <div class="col-md-4">
                        ¿Razones por las que no ha obtenido un ascenso?
                        <input type="text" id="pRAZON_NO_RECON" name="pRAZON_NO_RECON" class="form-control" maxlength="150">
                    </div>
                    <div class="col-md-4" style="margin-top: 21px;">
                        ¿Qué capacitación le gustaría recibir?
                        <input type="text" id="pCAPACITACION" name="pCAPACITACION" class="form-control" maxlength="100">
                    </div>
                </div>
                <br>
                <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-default" id="guardarActitud">Guardar actitud</button>
                </div>
                <div class="col-md-4">

                </div>
                </div>
                <br>
                <hr>
                <br>

                <!-- HIDDEN INPUTS -->
                <input type="hidden" id="pID_ALTERNA_Actitudes" name="pID_ESTADO_EMISOR_Actitudes" value="" >
                <input type="hidden" id="pID_ESTADO_EMISOR_Actitudes" name="pID_ALTERNA_Actitudes" value="" >
                <input type="hidden" id="pID_EMISOR_Actitudes" name="pID_EMISOR_Actitudes" value="" >
            </form>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-default btnSiguienteAnterior anteriorTab" id="anteriorActitud"> Anterior</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default btnSiguienteAnterior siguienteTab" id="siguienteActitud">Siguiente</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="Comisiones" role="tabpanel" aria-labelledby="Comisiones-tab">
        <div class="_container">
            <form id="Comisiones_form" name="Comisiones_form" action="#" autocomplete="off">
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
                        <input type="date"  id="pFECHA_INICIO_COMISIONES" name="pFECHA_INICIO_COMISIONES" required class="form-control">
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Fecha de término
                        <input type="date"  id="pFECHA_TERMINO_COMISIONES" name="pFECHA_TERMINO_COMISIONES" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Tipo de comisión<!-- Se llena del catalogo "CAT_TIPO_COMISION" -->
                        <select  class="form-control" id="ID_TIPO_COMISION" name="ID_TIPO_COMISION" required><option value="">Seleccione</option></select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>Motivo <!-- Se llena del catalogo "CAT_MOTIVO" -->
                        <select  class="form-control" id="pID_MOTIVO" name="pID_MOTIVO" required><option value="">Seleccione</option></select>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Destino
                        <input type="text" id="pDESTINO" name="pDESTINO" required class="form-control" maxlength="250" >
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default" id="guardarComision">Guardar comisión</button>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table id="tableComisiones" class="table display">
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
                <input type="hidden" id="pID_ALTERNA_Comisiones" name="pID_ESTADO_EMISOR_Comisiones" value="" >
                <input type="hidden" id="pID_ESTADO_EMISOR_Comisiones" name="pID_ALTERNA_Comisiones" value="" >
                <input type="hidden" id="pID_EMISOR_Comisiones" name="pID_EMISOR_Comisiones" value="" >
            </form>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-default btnSiguienteAnterior anteriorTab" id="anteriorComision"> Anterior</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default btnSiguienteAnterior siguienteTab endTab" id="FinalizarLaboral">Finalizar</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-4"></div>

            </div>
        </div>
    </div>




