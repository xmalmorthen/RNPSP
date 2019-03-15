    <div class="tab-pane fade show active" id="Adscripcion_actual" role="tabpanel" aria-labelledby="Adscripcion_actual-tab">
        <div class="_container">
            <form action="#" id="Adscripcion_actual_form" name="Adscripcion_actual_form" autocomplete="off">
                     <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="titulo">Adscripción de la persona</h3>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="borderButtom">Dependencia</h6> <!-- Se llena del catalogo "CAT_DEPENDENCIA" -->
                        <p id="pNOMBRE_DEPENDENCIA"></p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="borderButtom">Corporación</h6> <!-- Se llena del catalogo "CAT_INSTITUCION" -->
                        <p id="pCORPORACION"></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="titulo">Adscripción de la persona</h3>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"> Código postal</h6>
                        <p id="pCODIGO_POSTAL"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Estado</h6> <!-- Se llena del catalogo "CAT_ENTIDAD" -->
                        <p id="pNOM_ENTIDAD"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Municipio</h6> <!-- Se llena del catalogo "CAT_MUNICIPIO" dependiendo del catalogo de "ENTIDAD" -->
                        <p id="pNOM_MUNICIPIO"></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"> Número exterior</h6>
                        <p id="pNUM_EXTERIOR"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Número interior</h6>
                        <p id="pNUM_INTERIOR"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Número telefónico</h6>
                        <p id="pTELEFONO"></p>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                    <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom">Fecha de ingreso</h6>
                        <p id="pFECHA_INGRESO"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Puesto</h6> <!-- pendiente -->
                        <p id="pNOMBRE_PUESTO"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Especialidad</h6>
                        <p id="pESPECIALIDAD"></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom">Rango o categoría</h6>
                        <p id="pRANGO"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Nivel de mando </h6><!-- Se llena del catalogo "CAT_NIVEL_MANDO" -->
                        <p id="pNOMBRE_NIVEL_MANDO"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Número de placa</h6>
                        <p id="pNUMERO_PLACA"></p>
                    </div>
                </div>
                <br>
                    <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"> Número de expediente</h6>
                        <p id="pNUMERO_EXPEDIENTE"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Sueldo base (Mensual)</h6>
                        <p id="pSUELDO_BASE"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Compensaciones (Mensuales)</h6>
                        <p id="pCOMPENSACION"></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"> Área o departamento</h6> <!-- Se llena del catalogo "CAT_AREA" -->
                        <p id="pNOMBRE_AREA"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">División</h6>
                        <p id="pDIVISION"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom"> Funciones</h6>
                        <p id="pFUNCIONES"></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"> CUIP del jefe inmediato</h6>
                        <p id="pCUIP_JEFE"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom"> Nombre del jefe inmediato</h6>
                        <p id="pNOMBRE_JEFE"></p>
                    </div>
                </div>
            </form>
            <br>            
            <div class="row">                                
                <div class="col-md-12 text-center">
                    <button class="btn btn-secondary btn-lg btnSiguienteAnterior siguienteTab" id="siguienteAdscripcion" data-nexttab="#Empleos_diversos-tab">Siguiente Ficha</button>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="Empleos_diversos" role="tabpanel" aria-labelledby="Empleos_diversos-tab">
        <div class="_container">
            <form name="Empleos_diversos_form" id="Empleos_diversos_form" action="#">
                <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="titulo">Empleos diversos</h3>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                            <h6 class="borderButtom">Empresa</h6>
                        <p id="pEMPRESA"></p>
                    </div>
                    <div class="col-md-4">
                            <h6 class="borderButtom">Código postal</h6>
                        <p id="pCP_EMP"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom"> Estado </h6><!-- Se llena del catalogo "CAT_ENTIDAD" -->                            
                        <p id="pNOM_ENTIDAD"></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom">Municipio</h6> <!-- Se llena del catalogo "CAT_MUNICIPIO" dependiendo del catalogo "ENTIDAD" -->
                        <p id="pNOM_MUNICIPIO"></p>
                    </div>

                    <div class="col-md-4">
                        <h6 class="borderButtom"> Colonia/Localidad</h6>
                        <p id="pCOLONIA_EMP"></p>
                    </div>
                    <div class="col-md-4">
                            <h6 class="borderButtom">Calle y número</h6>
                            <p id="pCALLE_Y_NUM_EMP"></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                            <h6 class="borderButtom"> Número telefónico</h6>
                            <p id="pNUM_TELEFONICO"></p>
                    </div>
                    <div class="col-md-4">
                            <h6 class="borderButtom">Área o departamento </h6>
                        <p id="pAREA"></p>
                    </div>
                    <div class="col-md-4">
                            <h6 class="borderButtom">Funciones</h6>
                        <p id="pDESCRIP_FUNCION"></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"> Ingreso neto (mensual)</h6>
                        <p id="pSUELDO"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Fecha de ingreso</h6>
                        <p id="pFECHA_INGRESO"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Fecha de separación</h6>
                        <p id="pFECHA_SEPARACION"></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom">Motivo de separación</h6> <!-- Se llena del catalogo "MOTIVO_MOB_LAB" -->
                        <p id="pMOTIVO_SEPARACION"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom"> Tipo de separación</h6> <!-- Se llena del catalogo "TIPO_MOB_LAB" -->
                        <p id="pTIPO_SEPARACION"></p>
                        
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Descripción</h6>
                        <p id="pDESCRIPCION"></p>
                    </div>
                </div>
            </form>
            <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn btn-secondary btn-lg btnSiguienteAnterior anteriorTab" id="anteriorEmpleo" data-nexttab="#Adscripcion_actual-tab">Anterior Ficha</button>                                
                    <button class="btn btn-secondary btn-lg btnSiguienteAnterior siguienteTab" id="siguienteEmpleo" data-nexttab="#Actitudes_hacia_el_empleo-tab">Siguiente Ficha</button>
                </div>
            </div>
        </div>
    </div>
 
    <div class="tab-pane fade" id="Actitudes_hacia_el_empleo" role="tabpanel" aria-labelledby="Actitudes_hacia_el_empleo">
        <div class="_container">
            <form name="Actitudes_hacia_el_empleo_form" id="Actitudes_hacia_el_empleo_form" action="#" autocomplete="off">
                <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="titulo">Actitudes hacia el empleo</h3>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"> ¿Por qué eligió éste empleo?</h6>
                        <p id="pELECCION_EMPLEO"></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButtom">¿Qué puesto desearía tener?</h6>
                        <p id="pPUESTO"></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButtom">¿En qué Área o departamento desearía estar?</h6>
                        <p id="pAREA"></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                         <h6 class="borderButtom">¿En qué tiempo desea ascender?</h6>
                        <p id="pTIEMPO_ASCENDER"></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButtom">¿Conoce el reglamento de los reconocimientos?</h6> <!-- S/N = SI/NO -->
                        <p id="pCONOCE_REG_RECON"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">¿Razones por las que no ha obtenido un reconocimiento?</h6>
                        <p id="pRAZON_NO_RECON"></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom">¿Conoce la reglamentación de los ascensos? </h6><!-- S/N = SI/NO -->
                        <p id="pCONOCE_REG_ASCENSO"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">¿Razones por las que no ha obtenido un ascenso?</h6>
                        <p id="pRAZON_NO_ASCENSO"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">¿Qué capacitación le gustaría recibir?</h6>
                        <p id="pCAPACITACION"></p>
                    </div>
                </div>
            </form>
            <br>
            <div class="row">                    
                <div class="col-md-12 text-center">
                    <button class="btn btn-secondary btn-lg btnSiguienteAnterior anteriorTab" id="anteriorActitud" data-nexttab="#Empleos_diversos-tab">Anterior Ficha</button>                            
                    <button class="btn btn-secondary btn-lg btnSiguienteAnterior siguienteTab" id="siguienteActitud" data-nexttab="#Comisiones-tab">Siguiente Ficha</button>
                </div>                        
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="Comisiones" role="tabpanel" aria-labelledby="Comisiones-tab">
        <div class="_container">
            <form id="Comisiones_form" name="Comisiones_form" action="#" autocomplete="off">
                <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="titulo">Comisiones</h3>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                         <h6 class="borderButtom">Fecha de inicio</h6>
                        <p id="pFECHA_INICIO"></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButtom">Fecha de término</h6>
                        <p id="pFECHA_TERMINO"></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButtom">Tipo de comisión</h6><!-- Se llena del catalogo "CAT_TIPO_COMISION" -->
                        <p id="pTIPO_COMISION"></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom">Motivo</h6> <!-- Se llena del catalogo "CAT_MOTIVO" -->
                        <p id="pMOTIVO"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Destino</h6>
                        <p id="pDESTINO"></p>
                    </div>
                </div>
            </form>
            <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn btn-secondary btn-lg btnSiguienteAnterior anteriorTab" id="anteriorComision" data-nexttab="#Actitudes_hacia_el_empleo-tab">Anterior Ficha</button>
                    <button class="btn btn-secondary btn-lg btnSiguienteAnterior siguienteTab endTab" id="FinalizarLaboral">Siguiente Ficha</button>
                </div>
            </div>
        </div>
    </div>