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
                            <h6 class="borderButton"><span class="clr">*</span>Dependencia</h6> <!-- Se llena del catalogo "CAT_DEPENDENCIA" -->
                            <p></p>
                            <span id="err__dependenciaAdscripcionActual"></span>
                        </div>
                        <div class="col-md-6">
                            <h6 class="borderButton"><span class="clr">*</span>Corporación</h6> <!-- Se llena del catalogo "CAT_INSTITUCION" -->
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
                           <h6 class="borderButton"> <span class="clr">*</span>Código postal</h6>
                            <p></p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="borderButton"><span class="clr">*</span>Estado</h6> <!-- Se llena del catalogo "CAT_ENTIDAD" -->
                            <p></p>
                            <span id="err_pID_ENTIDAD_ADSCRIPCION_ACTUAL"></span>
                        </div>
                        <div class="col-md-4">
                            <h6 class="borderButton"><span class="clr">*</span>Municipio</h6> <!-- Se llena del catalogo "CAT_MUNICIPIO" dependiendo del catalogo de "ENTIDAD" -->
                            <p></p>
                            <span id="err_pID_MUNICIPIO_ADSCRIPCION_ACTUAL"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                           <h6 class="borderButton"> <span class="clr">*</span>Número exterior</h6>
                            <p></p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="borderButton">Número interior</h6>
                            <p></p>
                        </div>
                        <div class="col-md-4">
                        	<h6 class="borderButton"><span class="clr">*</span>Número telefónico</h6>
                            <p></p>
                        </div>
                    </div>

                    <br>
                    <hr>
                    <br>
                     <div class="row">
                        <div class="col-md-4">
                            <h6 class="borderButton"><span class="clr">*</span>Fecha de ingreso</h6>
                            <p></p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="borderButton"><span class="clr">*</span>Puesto</h6> <!-- pendiente -->
                            <p></p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="borderButton">Especialidad</h6>
                           <p></p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="borderButton">Rango o categoría</h6>
                        <p></p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="borderButton">Nivel de mando </h6><!-- Se llena del catalogo "CAT_NIVEL_MANDO" -->
                            <p></p>
                            <span id="err_pID_NIVEL_MANDO"></span>
                        </div>
                        <div class="col-md-4">
                            <h6 class="borderButton">Número de placa</h6>
                           <p></p>
                        </div>
                    </div>
                    <br>
                     <div class="row">
                        <div class="col-md-4">
                           <h6 class="borderButton"> Número de expediente</h6>
                           <p></p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="borderButton">Sueldo base (Mensual)</h6>
                            <p></p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="borderButton">Compensaciones (Mensuales)</h6>
                            <p></p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                           <h6 class="borderButton"> Área o departamento</h6> <!-- Se llena del catalogo "CAT_AREA" -->
                            <p></p>
                            <span id="err_pID_AREA"></span>
                        </div>
                        <div class="col-md-4">
                            <h6 class="borderButton">División</h6>
                            <p></p>
                        </div>
                        <div class="col-md-4">
                           <h6 class="borderButton"> Funciones</h6>
                            <p></p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="borderButton"> CUIP del jefe inmediato</h6>
                           <p></p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="borderButton"> Nombre del jefe inmediato</h6>
                            <p></p>
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
                                <center><button class="btn btn-default btnSiguienteAnterior siguienteTab" id="siguienteAdscripcion" data-nexttab="#Empleos_diversos-tab">Siguiente</button></centar>
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
                             <h6 class="borderButton"><span class="clr">*</span>Empresa</h6>
                            <p></p>
                        </div>
                        <div class="col-md-4">
                             <h6 class="borderButton"><span class="clr">*</span>Código postal</h6>
                            <p></p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="borderButton"> <span class="clr">*</span>Estado </h6><!-- Se llena del catalogo "CAT_ENTIDAD" -->                            
                            <p></p>
                            <span id="err_pID_ENTIDAD_EMPLEOS_DIVERSOS"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                         <h6 class="borderButton"><span class="clr">*</span>Municipio</h6> <!-- Se llena del catalogo "CAT_MUNICIPIO" dependiendo del catalogo "ENTIDAD" -->
                            <p></p>
                            <span id="err_pID_MUNICIPIO_EMPLEOS_DIVERSOS"></span>
                        </div>

                        <div class="col-md-4">
                            <h6 class="borderButton"> Colonia/Localidad</h6>
                           <p></p>
                        </div>
                        <div class="col-md-4">
                             <h6 class="borderButton">Calle y número</h6>
                         	 <p></p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                                <h6 class="borderButton"> Número telefónico</h6>
                           		<p</p>
                        </div>
                        <div class="col-md-4">
                             <h6 class="borderButton"><span class="clr">*</span>Área o departamento </h6>
                            <p</p>
                        </div>
                        <div class="col-md-4">
                             <h6 class="borderButton">Funciones</h6>
                            <p</p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="borderButton"> Ingreso neto (mensual)</h6>
                            <p</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="borderButton"><span class="clr">*</span>Fecha de ingreso
                            <p</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="borderButton"><span class="clr">*</span>Fecha de separación
                            <p</p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="borderButton"><span class="clr">*</span>Motivo de separación <!-- Se llena del catalogo "MOTIVO_MOB_LAB" -->
                            <p</p>
                            <span id="err_ID_MOTIVO_MOV_LAB"></span>
                        </div>
                        <div class="col-md-4">
                           <h6 class="borderButton"> <span class="clr">*</span>Tipo de separación <!-- Se llena del catalogo "TIPO_MOB_LAB" -->
                            <p</p>
                           <h6 class="borderButton"> <span id="err_pID_TIPO_MOV_LAB"></span>
                        </div>
                        <div class="col-md-4">
                            <h6 class="borderButton">Descripción
                            <p</p>
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
                                    <button class="btn btn-default btnSiguienteAnterior anteriorTab" id="anteriorEmpleo" data-nexttab="#Adscripcion_actual-tab"> Anterior</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-default btnSiguienteAnterior siguienteTab" id="siguienteEmpleo" data-nexttab="#Actitudes_hacia_el_empleo-tab">Siguiente</button>
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
                        <h6 class="borderButton"> ¿Por qué eligió éste empleo?</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButton">¿Qué puesto desearía tener?</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButton">¿En qué Área o departamento desearía estar?</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4" style="margin-top: 42px;" >
                         <h6 class="borderButton">¿En qué tiempo desea ascender?</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4" style="margin-top: 42px;">
                         <h6 class="borderButton">¿Conoce el reglamento de los reconocimientos?</h6> <!-- S/N = SI/NO -->
                        <p></p>
                        <span id="err_pCONOCE_REG_RECON"></span>
                    </div>
                    <div class="col-md-4" style="margin-top: 21px;">
                        <h6 class="borderButton">¿Razones por las que no ha obtenido un reconocimiento?</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row" style="margin-top: 21px;">
                    <div class="col-md-4" style="margin-top: 21px;">
                        <h6 class="borderButton">¿Conoce la reglamentación de los ascensos? </h6><!-- S/N = SI/NO -->
                        <p></p>
                        <span id="err_pCONOCE_REG_ASCENSO"></span>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">¿Razones por las que no ha obtenido un ascenso?</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4" style="margin-top: 21px;">
                        <h6 class="borderButton">¿Qué capacitación le gustaría recibir?</h6>
                        <p></p>
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
                            <button class="btn btn-default btnSiguienteAnterior anteriorTab" id="anteriorActitud" data-nexttab="#Empleos_diversos-tab"> Anterior</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default btnSiguienteAnterior siguienteTab" id="siguienteActitud" data-nexttab="#Comisiones-tab">Siguiente</button>
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
                         <h6 class="borderButton"><span class="clr">*</span>Fecha de inicio</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButton"><span class="clr">*</span>Fecha de término</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButton"><span class="clr">*</span>Tipo de comisión</h6><!-- Se llena del catalogo "CAT_TIPO_COMISION" -->
                        <p></p>
                        <span id="err_ID_TIPO_COMISION"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Motivo</h6> <!-- Se llena del catalogo "CAT_MOTIVO" -->
                        <p></p>
                        <span id="err_pID_MOTIVO"></span>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Destino</h6>
                        <p></p>
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
                            <button class="btn btn-default btnSiguienteAnterior anteriorTab" id="anteriorComision" data-nexttab="#Actitudes_hacia_el_empleo-tab"> Anterior</button>
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




