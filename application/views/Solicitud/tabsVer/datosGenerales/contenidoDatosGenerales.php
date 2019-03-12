<div class="tab-pane fade show active" id="Datos_personales" role="tab-panel" aria-labelledby="Datos_personales-tab">
    <div class="_container">
        <form action="#" id="Datos_personales_form" name="Datos_personales_form" autocomplete="off">
                <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="titulo">Datos personales</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>CURP</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Tipo de movimiento</h6>  <!-- Se llena de la tabla CAT_TIPO_OPERACION  -->
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
            <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Nombre</h6> 
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"> <span class="clr">*</span>Apellido paterno</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Apellido materno</h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Sexo <!-- Se llena de la tabla de CAT_SEXO --></h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"> <span class="clr">*</span>Fecha de nacimiento</h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>País de nacimiento <!-- Se llena del catálogo CAT_PAIS --></h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Estado de nacimiento <!-- Se llena del catálogo CAT_ENTIDAD --></h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Municipio de nacimiento <!-- Se llena del catálogo de CAT_MUNICIPIO --></h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Descripción ciudad de nacimiento <!--  Campo CIUDAD_NAC--></h6> 
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Nacionalidad <!-- Se llena de CAT_PAIS --></h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Modo de nacionalidad <!-- se llena con CAT_NACIONALIDAD  --></h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Fecha de nacionalidad</h6>
                    <p></p>
                </div>
                <!-- <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>RFC</h6>
                    <p></p>
                </div> -->
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Estado civil <!-- Se llena del catálogo CAT_ESTADO_CIVIL --></h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Cartilla del SMN</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Clave de elector</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Pasaporte</h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Licencia de conducir</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Vigencia de licencia</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">CUIP</h6>
                    <p></p>
                </div>
            </div>
            <input type="hidden" id="ID_ALTERNA_Datos_personales" name="ID_ALTERNA_Datos_personales" value="" >
            <input type="hidden" id="pID_ESTADO_EMISOR_Datos_personales" name="pID_ESTADO_EMISOR_Datos_personales" value="" >
            <input type="hidden" id="pID_EMISOR_Datos_personales" name="pID_EMISOR_Datos_personales" value="" >
        </form>            
        <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <button class="btn btn-secondary btn-lg btnSiguienteAnterior siguienteTab"  id="siguienteDatosPersonales" data-nexttab="#Desarrollo-tab">Siguiente Ficha</button>
            </div>
        </div>
    </div>
</div>

    <div class="tab-pane fade" id="Desarrollo" role="tabpanel" aria-labelledby="Desarrollo-tab">
    <div class="_container">
        <form action="#" id="Desarrollo_form" name="Desarrollo_form" autocomplete="off">
                <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="titulo">Desarrollo académico</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Máxima escolaridad <!-- CAT_GRADO_ESCOLAR --></h6>
                    <br>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Escuela</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Especialidad o estudio</h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Cédula profesional</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Fecha de inicio</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Fecha de término</h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Registro SEP</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Número de folio de certificado</h6> 
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Promedio</h6>
                    <p></p>
                </div>
            </div>
            <input type="hidden" id="ID_ALTERNA_Desarrollo" name="ID_ALTERNA_Desarrollo" value="" >
            <input type="hidden" id="pID_ESTADO_EMISOR_Desarrollo" name="pID_ESTADO_EMISOR_Desarrollo" value="" >
            <input type="hidden" id="pID_EMISOR_Desarrollo" name="pID_EMISOR_Desarrollo" value="" >
        </form>
        <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <button class="btn btn-secondary btn-lg btnSiguienteAnterior anteriorTab" id="anteriorDesarrolloacademico" data-nexttab="#Datos_personales-tab">Anterior Ficha</button>
                <button class="btn btn-secondary btn-lg btnSiguienteAnterior siguienteTab" id="siguienteDesarrolloacademico" data-nexttab="#Domicilio-tab">Siguiente Ficha</button>
            </div>
        </div>
    </div>
</div>

<div class="tab-pane fade" id="Domicilio" role="tabpanel" aria-labelledby="Domicilio-tab">
    <div class="_container">
        <form action="#" id="Domicilio_form" name="Domicilio_form" autocomplete="off">
            <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="titulo">Domicilio</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Código postal</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Estado <br><!-- Se  llena del catálogo CAT_ENTIDAD--></h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Municipio <br> <!-- Se llena del catálogo CAT_MUNICIPIO --></h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Ciudad</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Colonia/Localidad</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Calle</h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Número exterior</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Número interior</h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Entre la calle de</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Y la calle de</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Número telefónico</h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>RFC</h6>
                    <p></p>
                </div>
            </div>
        </form>            
        <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <button class="btn btn-secondary btn-lg btnSiguienteAnterior anteriorTab" id="anteriorDomicilio" data-nexttab="#Desarrollo-tab"> Anterior Ficha</button>
                <button class="btn btn-secondary btn-lg btnSiguienteAnterior siguienteTab" id="siguienteDomicilio" data-nexttab="#Referencias-tab">Siguiente Ficha</button>
            </div>
        </div>
    </div>
</div> 


<div class="tab-pane fade" id="Referencias" role="tabpanel" aria-labelledby="Referencias-tab">
    <div class="_container">
    <form action="#" id="Referencias_form" name="Referencias_form" autocomplete="off">
            <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="titulo">Referencias</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Nombre</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                <h6 class="borderButtom"><span class="clr">*</span>Apellido paterno</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                <h6 class="borderButtom">Apellido materno</h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Sexo</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Ocupación</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Tipo de referencia</h6>
                    <p></p>
                </div>
            </div>
            
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Código postal</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Estado</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Municipio</h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Ciudad</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Colonia/Localidad</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Calle</h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Número exterior</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Número interior</h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Entre la calle de</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Y la calle de</h6>
                    <p></p>
                </div>
            </div>
            <input type="hidden" id="ID_ALTERNA_Referencias" name="ID_ALTERNA_Referencias" value="" >
            <input type="hidden" id="pID_ESTADO_EMISOR_Referencias" name="pID_ESTADO_EMISOR_Referencias" value="" >
            <input type="hidden" id="pID_EMISOR_Referencias" name="pID_EMISOR_Referencias" value="" >
        </form>               
        <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <button class="btn btn-secondary btn-lg btnSiguienteAnterior anteriorTab" id="anteriorReferencia" data-nexttab="#Domicilio-tab"> Anterior Ficha</button>
                <button class="btn btn-secondary btn-lg btnSiguienteAnterior siguienteTab" id="siguienteReferencia" data-nexttab="#Socioeconomicos-tab">Siguiente Ficha</button>
            </div>
        </div>
    </div>
</div> 

<div class="tab-pane fade" id="Socioeconomicos" role="tabpanel" arialabelledby="Socioeconomicos-tab" >
    <div class="_container">
        <form action="#" id="Socioeconomicos_form" name="Socioeconomicos_form" autocomplete="off">
                <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="titulo">Socioeconomicos</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                        <h6 class="borderButtom">¿Vive con su familia?</h6> <br><!-- S/N = SI/NO -->
                    <p></p>
                
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Ingreso familiar adicional (mensual)</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Su domicilio es</h6>  <!-- Se llena del catálogo CAT_TIPO_DOMICILIO -->
                    <p></p>
                    
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-4" >
                    <h6 class="borderButtom"> Actividades culturales o deportivas que practica</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Especificación de inmuebles y costos</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Inversión y monto aproximado</h6>
                    <p></p>
                </div>
            </div>  
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Vehículo y costo aproximado</h6>
                    <p></p>
                    <!-- ¿? -->
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"> Calidad de vida</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Vicios</h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4" >
                    <h6 class="borderButtom">Imágen pública</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Comportamiento social</h6>
                    <p></p>
                </div>
            </div>             
            <br>
            <hr>
            <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="titulo">Dependientes económicos</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Nombre</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Apellido paterno</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Apellido materno</h6>
                    <p></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Sexo <br></h6> <!-- Se llena del catálogo CAT_SEXO -->
                    <p></p>
                    <span id="err_SEXO"></span>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Fecha de nacimiento</h6>
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"><span class="clr">*</span>Parentesco</h6> <br><!-- Se llena del catálogo CAT_RELACION -->
                    <p></p>
                    <span id="err_ID_RELACION"></span>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Relación o parentesco</h6>
                    <p></p>
                </div>
            </div>
            <input type="hidden" id="ID_ALTERNA_Socioeconomico" name="ID_ALTERNA_Socioeconomico" value="" >
            <input type="hidden" id="pID_ESTADO_EMISOR_Socioeconomico" name="pID_ESTADO_EMISOR_Socioeconomico" value="" >
            <input type="hidden" id="pID_EMISOR_Socioeconomico" name="pID_EMISOR_Socioeconomico" value="" >
        </form>
        <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <button class="btn btn-secondary btn-lg btnSiguienteAnterior anteriorTab" id="anteriorSocioeconomico" data-nexttab="#Referencias-tab"> Anterior Ficha</button>
                <button class="btn btn-secondary btn-lg btnSiguienteAnterior siguienteTab endTab" id="finalizarDatosGenerales">Siguiente Ficha</button>
            </div>
        </div>
    </div>
</div>