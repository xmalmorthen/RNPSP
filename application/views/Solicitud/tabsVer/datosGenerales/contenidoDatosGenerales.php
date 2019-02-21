     <div class="tab-pane fade show active" id="Datos_personales" role="tab-panel" aria-labelledby="Datos_personales-tab">
        <div class="_container">
            <form action="#" id="Datos_personales_form" name="Datos_personales_form" autocomplete="off">
                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <center><strong class="titulo">Datos personales</strong></center>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>CURP</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Tipo de movimiento</h6>  <!-- Se llena de la tabla CAT_TIPO_OPERACION  -->
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                <div class="col-md-4">
                       <h6 class="borderButton"><span class="clr">*</span>Nombre</h6> 
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"> <span class="clr">*</span>Apellido paterno</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Apellido materno</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Sexo <!-- Se llena de la tabla de CAT_SEXO --></h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"> <span class="clr">*</span>Fecha de nacimiento</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>País de nacimiento <!-- Se llena del catálogo CAT_PAIS --></h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Estado de nacimiento <!-- Se llena del catálogo CAT_ENTIDAD --></h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Municipio de nacimiento <!-- Se llena del catálogo de CAT_MUNICIPIO --></h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                       <h6 class="borderButton">Descripción ciudad de nacimiento <!--  Campo CIUDAD_NAC--></h6> 
                       <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Nacionalidad <!-- Se llena de CAT_PAIS --></h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Modo de nacionalidad <!-- se llena con CAT_NACIONALIDAD  --></h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton">Fecha de nacionalidad</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>RFC</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Estado civil <!-- Se llena del catálogo CAT_ESTADO_CIVIL --></h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton">Cartilla del SMN</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Clave de elector</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Pasaporte</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton">Licencia de conducir</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Vigencia de licencia</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">CUIP</h6>
                        <p></p>
                    </div>
                </div>
                <br><hr><br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton">CIB </h6>                       
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Motivo de cambio de CIB </h6>
                        <p></p>
                    <br>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-default" id="GUARDAR_CIB" style="margin-top: 16px;"> Guardar CIB</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default btnGuardarSection" id="guardarDatosPersonales"> Guardar datos personales</button>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table id="tableDatospersonales" class="table display" style="width:100%">
                            <thead>
                                <th><center>CIB</center></th>
                                <th><center>Motivo</center></th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <input type="hidden" id="ID_ALTERNA_Datos_personales" name="ID_ALTERNA_Datos_personales" value="" >
                <input type="hidden" id="pID_ESTADO_EMISOR_Datos_personales" name="pID_ESTADO_EMISOR_Datos_personales" value="" >
                <input type="hidden" id="pID_EMISOR_Datos_personales" name="pID_EMISOR_Datos_personales" value="" >

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <center><button class="btn btn-default btnSiguienteAnterior siguienteTab"  id="siguienteDatosPersonales" data-nexttab="#Desarrollo-tab">Siguiente</button></center>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>            
        </div>
    </div>
    
     <div class="tab-pane fade" id="Desarrollo" role="tabpanel" aria-labelledby="Desarrollo-tab">
        <div class="_container">
            <form action="#" id="Desarrollo_form" name="Desarrollo_form" autocomplete="off">
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
                        <h6 class="borderButton"><span class="clr">*</span>Máxima escolaridad <!-- CAT_GRADO_ESCOLAR --></h6>
                        <br>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Escuela</h6>
                       <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Especialidad o estudio</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton">Cédula profesional</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Fecha de inicio</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Fecha de término</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton">Registro SEP</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                       <h6 class="borderButton">Número de folio de certificado</h6> 
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Promedio</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default" id="guardarDesarrolloacademico">Guardar desarrollo académico</button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                </div>
                <br><hr><br>
                <div class="row">
                    <div class="col-md-12">
                        <table id="tableDesarrollo" class="table display" style="width:100%">
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
                </div>
                <input type="hidden" id="ID_ALTERNA_Desarrollo" name="ID_ALTERNA_Desarrollo" value="" >
                <input type="hidden" id="pID_ESTADO_EMISOR_Desarrollo" name="pID_ESTADO_EMISOR_Desarrollo" value="" >
                <input type="hidden" id="pID_EMISOR_Desarrollo" name="pID_EMISOR_Desarrollo" value="" >

                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-default btnSiguienteAnterior anteriorTab" id="anteriorDesarrolloacademico" data-nexttab="#Datos_personales-tab"> Anterior</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-default btnSiguienteAnterior siguienteTab" id="siguienteDesarrolloacademico" data-nexttab="#Domicilio-tab">Siguiente</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
            
            
        </div>
    </div>

    <div class="tab-pane fade" id="Domicilio" role="tabpanel" aria-labelledby="Domicilio-tab">
        <div class="_container">
            <form action="#" id="Domicilio_form" name="Domicilio_form" autocomplete="off">
                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <center><strong class="titulo">Domicilio</strong></center>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Código postal</h6>
                       <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Estado <br><!-- Se  llena del catálogo CAT_ENTIDAD--></h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Municipio <br> <!-- Se llena del catálogo CAT_MUNICIPIO --></h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton">Ciudad</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Colonia/Localidad</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Calle</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Número exterior</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Número interior</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Entre la calle de</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Y la calle de</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Número telefónico</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>RFC</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default" id="guardarDomicilio">Guardar domicilio</button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                </div>
                <br>
                <hr>
                <br>
                <table id="tableDesarrollo" class="table display" style="width:100%">
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
                <input type="hidden" id="ID_ALTERNA_Domicilio" name="ID_ALTERNA_Domicilio" value="" >
                <input type="hidden" id="pID_ESTADO_EMISOR_Domicilio" name="pID_ESTADO_EMISOR_Domicilio" value="" >
                <input type="hidden" id="pID_EMISOR_Domicilio" name="pID_EMISOR_Domicilio" value="" >

                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-default btnSiguienteAnterior anteriorTab" id="anteriorDomicilio" data-nexttab="#Desarrollo-tab"> Anterior</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-default btnSiguienteAnterior siguienteTab" id="siguienteDomicilio" data-nexttab="#Referencias-tab">Siguiente</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>            
        </div>
    </div> 


    <div class="tab-pane fade" id="Referencias" role="tabpanel" aria-labelledby="Referencias-tab">
        <div class="_container">
            <form action="#" id="Referencias_form" name="Referencias_form" autocomplete="off">
                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <center><strong class="titulo">Referencias</strong></center>
                    </div>
                </div>
                <br>
                 <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Nombre</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Apellido paterno</h6>
                        <p></p>
                    <div class="col-md-4">
                        <h6 class="borderButton">Apellido materno</h6>
                       <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Sexo <br> <!-- Se llena del catálogo CAT_SEXO --></h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Ocupación <br> <!-- Se llena del catálogo CAT_OCUPACION --></h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Tipo de referencia <br> <!-- Se llena del catálogo CAT_REFERENCIA --></h6>
                        <p></p>
                    </div>
                </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton">Relación o parentesco <br> <!-- Se llena del catálogo CAT_RELACION --></h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton">Código postal</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Estado <br> <!-- Se llena del catálog CAT_ENTIDAD --></h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Municipio <br><!-- Se llena del catálogo CAT_MUNICIPIO --></h6>
                        <p></p>
                    </div>
                </div>
                <br>
               <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton">Ciudad</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Colonia/Localidad</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Calle</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Número exterior</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButton">Número interior</h6>
                        <p></p>
                    </div>
                </div>
                <br>
               <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton">Entre la calle de</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Y la calle de</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default" id="guardarReferencia">Guardar referencia</button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                </div>
                <br>
                <hr>
                <br>
                <table id="tableReferencias" class="table display" style="width:100%">
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
                 <input type="hidden" id="ID_ALTERNA_Referencias" name="ID_ALTERNA_Referencias" value="" >
                <input type="hidden" id="pID_ESTADO_EMISOR_Referencias" name="pID_ESTADO_EMISOR_Referencias" value="" >
                <input type="hidden" id="pID_EMISOR_Referencias" name="pID_EMISOR_Referencias" value="" >

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-default btnSiguienteAnterior anteriorTab" id="anteriorReferencia" data-nexttab="#Domicilio-tab"> Anterior</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-default btnSiguienteAnterior siguienteTab" id="siguienteReferencia" data-nexttab="#Socioeconomicos-tab">Siguiente</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>            
        </div>
    </div> 

    <div class="tab-pane fade" id="Socioeconomicos" role="tabpanel" arialabelledby="Socioeconomicos-tab" >
        <div class="_container">
            <form action="#" id="Socioeconomicos_form" name="Socioeconomicos_form" autocomplete="off">
                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <center><strong class="titulo">Socioeconómicos</strong></center>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                         <h6 class="borderButton">¿Vive con su familia?</h6> <br><!-- S/N = SI/NO -->
                        <p></p>
                        <span id="err_VIVE_FAMILIA"></span>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Ingreso familiar adicional (mensual)</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Su domicilio es</h6> <br> <!-- Se llena del catálogo CAT_TIPO_DOMICILIO -->
                        <p></p>
                         <h6 class="borderButton"><span id="err_ID_TIPO_DOMICILIO"></span></h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4" >
                       <h6 class="borderButton"> Actividades culturales o deportivas que practica</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Especificación de inmuebles y costos</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Inversión y monto aproximado</h6>
                        <p></p>
                    </div>
                </div>  
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton">Vehículo y costo aproximado</h6>
                        <p></p>
                        <!-- ¿? -->
                    </div>
                    <div class="col-md-4">
                       <h6 class="borderButton"> Calidad de vida</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Vicios</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4" >
                        <h6 class="borderButton">Imágen pública</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Comportamiento social</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default" id="guardarSocioeconomico">Guardar socioeconómico</button>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <center><strong>Dependientes económicos</strong></center>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Nombre</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Apellido paterno</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton">Apellido materno</h6>
                        <p></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Sexo <br></h6> <!-- Se llena del catálogo CAT_SEXO -->
                        <p></p>
                        <span id="err_SEXO"></span>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Fecha de nacimiento</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButton"><span class="clr">*</span>Parentesco</h6> <br><!-- Se llena del catálogo CAT_RELACION -->
                        <p></p>
                        <span id="err_ID_RELACION"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default" id="guardarDependiente">Guardar dependiente</button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                </div>
                <br>
                <hr>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table id="tableSocioeconomicos" class="table display" style="width:100%">
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
                 <input type="hidden" id="ID_ALTERNA_Socioeconomico" name="ID_ALTERNA_Socioeconomico" value="" >
                <input type="hidden" id="pID_ESTADO_EMISOR_Socioeconomico" name="pID_ESTADO_EMISOR_Socioeconomico" value="" >
                <input type="hidden" id="pID_EMISOR_Socioeconomico" name="pID_EMISOR_Socioeconomico" value="" >
                
                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-default btnSiguienteAnterior anteriorTab" id="anteriorSocioeconomico" data-nexttab="#Referencias-tab"> Anterior</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-default btnSiguienteAnterior siguienteTab endTab" id="finalizarDatosGenerales">Finalizar</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
        </div>
    </div>









