  
    <div class="tab-pane fade show active" id="Adscripcion_actual" role="tabpanel" aria-labelledby="Adscripcion_actual-tab">
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
                            <input type="text"  id="pCP_EMP_ADSCRIPCION_ACTUAL" name="pCP_EMP_ADSCRIPCION_ACTUAL" class="form-control" class="form-control" required maxlength="5">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Estado <!-- Se llena del catalogo "ENTIDAD" -->
                            <select  class="form-control" id="pID_ENTIDAD" name="pID_ENTIDAD" maxlength="10" required></select>
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Municipio <!-- Se llena del catalogo "MUNICIPIO" dependiendo del catalogo de "ENTIDAD" -->
                            <select  class="form-control" id="pID_MUNICIPIO" name="pID_MUNICIPIO" maxlength="10" required></select>
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
                            <input type="text" class="form-control" class="form-control" required maxlength="60">
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Calle
                            <input type="text" class="form-control" required maxlength="50">
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
                            <span class="clr">*</span>Puesto <!-- Se llena del catalogo "PUESTO" -->
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
                            Nivel de mando <!-- Se llena del catalogo "NIVEL_MANDO" -->
                            <select  class="form-control" id="pID_NIVEL_MANDO" name="pID_NIVEL_MANDO">
                                <option value="">Seleccione</option>
                            </select>
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
                            Área o departamento <!-- Se llena del catalogo "AREA" -->
                        <select  class="form-control" id="pID_AREA" name="pID_AREA"></select>
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
                            <div class="col-md-6">
                                <button class="btn btn-default" id="anteriorAdscripcion"> Anterior</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-default" id="siguienteAdscripcion">Siguiente</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4"></div>

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
                            <input type="text" id="pEMPRESA" name="pEMPRESA" required  class="form-control"  maxlength="100" >
                        </div>
                        <div class="col-md-4">
                            <span class="clr">*</span>Código postal
                            <input type="text" id="pCP_EMP_EMPLEOS_DIVERSOS" name="pCP_EMP_EMPLEOS_DIVERSOS" required  class="form-control"  maxlength="5">
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
                        <span class="clr">*</span>Municipio <!-- Se llena del catalogo "MUNICIPIO" dependiendo del catalogo "ENTIDAD" -->
                            <select  class="form-control" id="pID_MUNICIPIO_EMPLEOS_DIVERSOS" name="pID_MUNICIPIO_EMPLEOS_DIVERSOS" required></select>
                        </div>
                        <div class="col-md-4">
                            Colonia/Localidad
                            <input type="text" id="pCOLONIA_EMP" name="pCOLONIA_EMP" required  class="form-control"  maxlength="60">
                        </div>
                        <div class="col-md-4">
                            Calle y número
                            <input type="text" id="pCALLE_Y_NUM_EMP" name="pCALLE_Y_NUM_EMP" required  class="form-control"  maxlength="60">
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
                                    <button class="btn btn-default" id="anteriorEmpleo"> Anterior</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-default" id="siguienteEmpleo">Siguiente</button>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4"></div>

                    </div>


            </div>


        </form>
    </div>
 
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
                        <select id="pCONOCE_REG_RECON" name="pCONOCE_REG_RECON" class="form-control"><option value="" id="">Seleccione</option></select>
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
                        <select  class="form-control" id="pCONOCE_REG_ASCENSO" name="pCONOCE_REG_ASCENSO">
                            <option value="">Seleccione</option>
                        </select>
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
                            <button class="btn btn-default" id="anteriorActitud"> Anterior</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default" id="siguienteActitud">Siguiente</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-4"></div>
            </div>
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
                            <button class="btn btn-default" id="anteriorComision"> Anterior</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default" id="FinalizarLaboral">Finalizar</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-4"></div>

            </div>
        </div>
    </div>




