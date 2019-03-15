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
                    <h6 class="borderButtom">CURP</h6>
                    <p id='pCURP'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">RFC</h6>
                    <p id='pRFC'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Tipo de movimiento</h6>  <!-- Se llena de la tabla CAT_TIPO_OPERACION  -->
                    <p id='pNOMBRE_TIPO_OPERACION'></p>
                </div>
            </div>
            <br>
            <div class="row">
            <div class="col-md-4">
                    <h6 class="borderButtom">Nombre</h6> 
                    <p id='pNOMBRE'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"> Apellido paterno</h6>
                    <p id='pPATERNO'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Apellido materno</h6>
                    <p id='pMATERNO'></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Sexo <!-- Se llena de la tabla de CAT_SEXO --></h6>
                    <p id='pNOM_SEXO'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"> Fecha de nacimiento</h6>
                    <p id='pFECHA_NAC'></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">País de nacimiento <!-- Se llena del catálogo CAT_PAIS --></h6>
                    <p id='pPAIS_NAC'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Estado de nacimiento <!-- Se llena del catálogo CAT_ENTIDAD --></h6>
                    <p id='pENTIDAD_NAC'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Municipio de nacimiento <!-- Se llena del catálogo de CAT_MUNICIPIO --></h6>
                    <p id='pMUNICIPIO_NAC'></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Descripción ciudad de nacimiento <!--  Campo CIUDAD_NAC--></h6> 
                    <p id='pCIUDAD_NAC'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Nacionalidad <!-- Se llena de CAT_PAIS --></h6>
                    <p id='pNACIONALIDAD'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Modo de nacionalidad <!-- se llena con CAT_NACIONALIDAD  --></h6>
                    <p id='pNOM_MODO_NACIONALIDAD'></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Fecha de nacionalidad</h6>
                    <p id='pFECHA_NACIONALIDAD'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Estado civil <!-- Se llena del catálogo CAT_ESTADO_CIVIL --></h6>
                    <p id='pEDO_CIVIL'></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Cartilla del SMN</h6>
                    <p id='pCARTILLA_SMN'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Clave de elector</h6>
                    <p id='pCREDENCIAL_ELECTOR'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Pasaporte</h6>
                    <p id='pPASAPORTE'></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Licencia de conducir</h6>
                    <p id='pLICENCIA'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Vigencia de licencia</h6>
                    <p id='pFECHA_LICENCIA_VIG'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">CUIP</h6>
                    <p id='pCUIP'></p>
                </div>
            </div>
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
                    <h6 class="borderButtom">Máxima escolaridad <!-- CAT_GRADO_ESCOLAR --></h6>
                    <p id='pGRADO_ESCOLAR'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Escuela</h6>
                    <p id='pNOMBRE_ESCUELA'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Especialidad o estudio</h6>
                    <p id='pESPECIALIDAD'></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Cédula profesional</h6>
                    <p id='pCEDULA_PROFESIONAL'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Fecha de inicio</h6>
                    <p id='pFECHA_INICIO'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Fecha de término</h6>
                    <p id='pFECHA_TERMINO'></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Registro SEP</h6>
                    <p id='pREGISTRO_SEP'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Número de folio de certificado</h6> 
                    <p id='pFOLIO_CERTIFICADO'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Promedio</h6>
                    <p id='pPROMEDIO'></p>
                </div>
            </div>
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
                    <h6 class="borderButtom">Código postal</h6>
                    <p id='pCODIGO_POSTAL'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Estado<!-- Se  llena del catálogo CAT_ENTIDAD--></h6>
                    <p id='pNOM_ENTIDAD'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Municipio<!-- Se llena del catálogo CAT_MUNICIPIO --></h6>
                    <p id='pMUNICIPIO_DOM'></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Ciudad</h6>
                    <p id='pCIUDAD'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Colonia/Localidad</h6>
                    <p id='pCOLONIA'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Calle</h6>
                    <p id='pCALLE'></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Número exterior</h6>
                    <p id='pNUM_EXTERIOR'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Número interior</h6>
                    <p id='pNUM_INTERIOR'></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Entre la calle de</h6>
                    <p id='pENTRE_CALLE'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Y la calle de</h6>
                    <p id='pY_CALLE'></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Número telefónico</h6>
                    <p id='pTELEFONO'></p>
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
                    <h6 class="borderButtom">Nombre</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                <h6 class="borderButtom">Apellido paterno</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                <h6 class="borderButtom">Apellido materno</h6>
                    <p id=''></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Sexo</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Ocupación</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Tipo de referencia</h6>
                    <p id=''></p>
                </div>
            </div>
            
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Código postal</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Estado</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Municipio</h6>
                    <p id=''></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Ciudad</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Colonia/Localidad</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Calle</h6>
                    <p id=''></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Número exterior</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Número interior</h6>
                    <p id=''></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Entre la calle de</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Y la calle de</h6>
                    <p id=''></p>
                </div>
            </div>
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
                    <h6 class="borderButtom">¿Vive con su familia?</h6><!-- S/N = SI/NO -->
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Ingreso familiar adicional (mensual)</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Su domicilio es</h6>  <!-- Se llena del catálogo CAT_TIPO_DOMICILIO -->
                    <p id=''></p>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-4" >
                    <h6 class="borderButtom"> Actividades culturales o deportivas que practica</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Especificación de inmuebles y costos</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Inversión y monto aproximado</h6>
                    <p id=''></p>
                </div>
            </div>  
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Vehículo y costo aproximado</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom"> Calidad de vida</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Vicios</h6>
                    <p id=''></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4" >
                    <h6 class="borderButtom">Imágen pública</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Comportamiento social</h6>
                    <p id=''></p>
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
                    <h6 class="borderButtom">Nombre</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Apellido paterno</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Apellido materno</h6>
                    <p id=''></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Sexo</h6> <!-- Se llena del catálogo CAT_SEXO -->
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Fecha de nacimiento</h6>
                    <p id=''></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">Parentesco</h6>
                    <p id=''></p>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">Relación o parentesco</h6>
                    <p id=''></p>
                </div>
            </div>
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