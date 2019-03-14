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
                        <h6 class="borderButtom">ependencia</h6> <!-- Se llena del catalogo "CAT_DEPENDENCIA" -->
                        <p></p>
                        <span id="err__dependenciaAdscripcionActual"></span>
                    </div>
                    <div class="col-md-6">
                        <h6 class="borderButtom"><span class="clr">*</span>Corporación</h6> <!-- Se llena del catalogo "CAT_INSTITUCION" -->
                        <p></p>
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
                
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"> <span class="clr">*</span>Código postal</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom"><span class="clr">*</span>Estado</h6> <!-- Se llena del catalogo "CAT_ENTIDAD" -->
                        <p></p>
                        <span id="err_pID_ENTIDAD_ADSCRIPCION_ACTUAL"></span>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom"><span class="clr">*</span>Municipio</h6> <!-- Se llena del catalogo "CAT_MUNICIPIO" dependiendo del catalogo de "ENTIDAD" -->
                        <p></p>
                        <span id="err_pID_MUNICIPIO_ADSCRIPCION_ACTUAL"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"> <span class="clr">*</span>Número exterior</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Número interior</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom"><span class="clr">*</span>Número telefónico</h6>
                        <p></p>
                    </div>
                </div>

                <br>
                <hr>
                <br>
                    <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"><span class="clr">*</span>Fecha de ingreso</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom"><span class="clr">*</span>Puesto</h6> <!-- pendiente -->
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Especialidad</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom">Rango o categoría</h6>
                    <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Nivel de mando </h6><!-- Se llena del catalogo "CAT_NIVEL_MANDO" -->
                        <p></p>
                        <span id="err_pID_NIVEL_MANDO"></span>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Número de placa</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                    <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"> Número de expediente</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Sueldo base (Mensual)</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Compensaciones (Mensuales)</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"> Área o departamento</h6> <!-- Se llena del catalogo "CAT_AREA" -->
                        <p></p>
                        <span id="err_pID_AREA"></span>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">División</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom"> Funciones</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"> CUIP del jefe inmediato</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom"> Nombre del jefe inmediato</h6>
                        <p></p>
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
                            <h6 class="borderButtom"><span class="clr">*</span>Empresa</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                            <h6 class="borderButtom"><span class="clr">*</span>Código postal</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom"> <span class="clr">*</span>Estado </h6><!-- Se llena del catalogo "CAT_ENTIDAD" -->                            
                        <p></p>
                        <span id="err_pID_ENTIDAD_EMPLEOS_DIVERSOS"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"><span class="clr">*</span>Municipio</h6> <!-- Se llena del catalogo "CAT_MUNICIPIO" dependiendo del catalogo "ENTIDAD" -->
                        <p></p>
                        <span id="err_pID_MUNICIPIO_EMPLEOS_DIVERSOS"></span>
                    </div>

                    <div class="col-md-4">
                        <h6 class="borderButtom"> Colonia/Localidad</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                            <h6 class="borderButtom">Calle y número</h6>
                            <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                            <h6 class="borderButtom"> Número telefónico</h6>
                            <p></p>
                    </div>
                    <div class="col-md-4">
                            <h6 class="borderButtom"><span class="clr">*</span>Área o departamento </h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                            <h6 class="borderButtom">Funciones</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"> Ingreso neto (mensual)</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom"><span class="clr">*</span>Fecha de ingreso
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom"><span class="clr">*</span>Fecha de separación
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"><span class="clr">*</span>Motivo de separación <!-- Se llena del catalogo "MOTIVO_MOB_LAB" -->
                        <p></p>
                        <span id="err_ID_MOTIVO_MOV_LAB"></span>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom"> <span class="clr">*</span>Tipo de separación <!-- Se llena del catalogo "TIPO_MOB_LAB" -->
                        <p></p>
                        
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Descripción
                        <p></p>
                    </div>
                </div>
                <!-- HIDDEN INPUTS -->
                <input type="hidden" id="pID_ALTERNA_Empleos_diversos" name="pID_ALTERNA_Empleos_diversos"  value="">
                <input type="hidden" id="pID_ESTADO_EMISOR_Empleos_diversos" name="pID_ESTADO_EMISOR_Empleos_diversos"  value="">
                <input type="hidden" id="pID_EMISOR_Empleos_diversos" name="pID_EMISOR_Empleos_diversos"  value="">
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
                        <p></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButtom">¿Qué puesto desearía tener?</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButtom">¿En qué Área o departamento desearía estar?</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                         <h6 class="borderButtom">¿En qué tiempo desea ascender?</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButtom">¿Conoce el reglamento de los reconocimientos?</h6> <!-- S/N = SI/NO -->
                        <p></p>
                        <span id="err_pCONOCE_REG_RECON"></span>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">¿Razones por las que no ha obtenido un reconocimiento?</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom">¿Conoce la reglamentación de los ascensos? </h6><!-- S/N = SI/NO -->
                        <p></p>
                        <span id="err_pCONOCE_REG_ASCENSO"></span>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">¿Razones por las que no ha obtenido un ascenso?</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">¿Qué capacitación le gustaría recibir?</h6>
                        <p></p>
                    </div>
                </div>
                <!-- HIDDEN INPUTS -->
                <input type="hidden" id="pID_ALTERNA_Actitudes" name="pID_ESTADO_EMISOR_Actitudes" value="" >
                <input type="hidden" id="pID_ESTADO_EMISOR_Actitudes" name="pID_ALTERNA_Actitudes" value="" >
                <input type="hidden" id="pID_EMISOR_Actitudes" name="pID_EMISOR_Actitudes" value="" >
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
                         <h6 class="borderButtom"><span class="clr">*</span>Fecha de inicio</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButtom"><span class="clr">*</span>Fecha de término</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButtom"><span class="clr">*</span>Tipo de comisión</h6><!-- Se llena del catalogo "CAT_TIPO_COMISION" -->
                        <p></p>
                        <span id="err_ID_TIPO_COMISION"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom"><span class="clr">*</span>Motivo</h6> <!-- Se llena del catalogo "CAT_MOTIVO" -->
                        <p></p>
                        <span id="err_pID_MOTIVO"></span>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">estino</h6>
                        <p></p>
                    </div>
                </div>
                <!-- HIDDEN INPUTS -->
                <input type="hidden" id="pID_ALTERNA_Comisiones" name="pID_ESTADO_EMISOR_Comisiones" value="" >
                <input type="hidden" id="pID_ESTADO_EMISOR_Comisiones" name="pID_ALTERNA_Comisiones" value="" >
                <input type="hidden" id="pID_EMISOR_Comisiones" name="pID_EMISOR_Comisiones" value="" >
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