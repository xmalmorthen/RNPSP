<div class="tab-pane fade show active" id="Datos_personales" role="tab-panel" aria-labelledby="Datos_personales-tab">
    <div class="_container">
        <form action="#" id="Datos_personales_form" name="Datos_personales_form" autocomplete="off">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="titulo">Datos personales</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <span class="clr">*</span>CURP
                    <input type="text" id="pCURP" name="pCURP" class="form-control consultaCURP " minlength="18" maxlength="20" required>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>RFC
                    <input type="text" class="form-control" id="pRFC_DOMICILIO" name="pRFC_DOMICILIO" maxlength="13" minlength="10" required>
                </div>
                <div class="col-md-4"> <!-- PENDIENTEEEEE -->
                    Tipo de movimiento <!-- Se llena de la tabla CAT_TIPO_OPERACION  -->
                    <select  class="form-control" name="pTIPO_OPERACION" id="pTIPO_OPERACION" data-error="#err_pTIPO_OPERACION" required></select>
                    <span id="err_pTIPO_OPERACION"></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <span class="clr">*</span>Nombre
                    <input type="text" id="pNOMBRE_DATOS_PERSONALES" name="pNOMBRE_DATOS_PERSONALES" class="form-control consultaCURP"  maxlength="40" required>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Apellido paterno
                    <input type="text" id="pPATERNO_DATOS_PERSONALES" name="pPATERNO_DATOS_PERSONALES" class="form-control consultaCURP" maxlength="40" required>
                </div>
                <div class="col-md-4">
                    Apellido materno
                    <input type="text" id="pMATERNO_DATOS_PERSONALES" name="pMATERNO_DATOS_PERSONALES" class="form-control consultaCURP" maxlength="40" >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <span class="clr">*</span>Sexo <!-- Se llena de la tabla de CAT_SEXO -->
                    <select  class="form-control consultaCURP" id="pSEXO_DATOS_PERSONALES" name="pSEXO_DATOS_PERSONALES" data-error="#err_pSEXO_DATOS_PERSONALES" data-query='cmw2WmwzeW03a1lsakNJd1dEWWt0WmRmOU95OFFzS0ZESENTMmpyYkNySis1VlhVOFEza205bHF1Z0trTWVLVW4zV081M284cjNPc0pObExOZ2dKcGhnTE9KZU83SlM0bkZIaWhBdm4rV2ZjOGRZRmpnMkI3N1ZaZWVoZnk4R0g=' required></select>
                    <span id="err_pSEXO_DATOS_PERSONALES"></span>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Fecha de nacimiento
                    <input type="date"  id="pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES" name="pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES" class="form-control consultaCURP" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <span class="clr">*</span>País de nacimiento <!-- Se llena del catálogo CAT_PAIS -->
                    <select  class="form-control" id="pID_PAIS_NAC" name="pID_PAIS_NAC" data-error="#err_pID_PAIS_NAC" data-query='Vng1R1BwYXMzcnpkdHJEcjUxbG13VFhkcStKTTRvTW5idXdHa1F3TVBNcGhnS1JpQmtZMW5RR0ZKdEEvdUJiVVd6enhqNFdTNEhsaTNlVmI0Uzcxb1ZkSFVlQ3l4cnhKMVQwdWpvY2ZPRm8zckszc1JzNjlDbFhXTGFqZFlPd2s=' required><option value="">Seleccione</option></select>
                    <span id="err_pID_PAIS_NAC"></span>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Estado de nacimiento <!-- Se llena del catálogo CAT_ENTIDAD -->
                    <select  class="form-control" id="pID_ENTIDAD_NAC" name="pID_ENTIDAD_NAC" data-error="#err_pID_ENTIDAD_NAC" data-query='RG51N2cyVWNFVVp5Rlc5WDYydU0wcm0wbys4dElkSU1uaHBpTTJHMEJqOGVqdmRkUXJRUzB0TVZIa2Y0UldSWGpiMS9xQXhOWE5oVndVN0QzSFpHWHI4NEVzWTRIRU5RTmxjS09EK243V002bi9RV1ZUTU0waGRHdWlHSzFaT04=' required></select>
                    <span id="err_pID_ENTIDAD_NAC"></span>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Municipio de nacimiento <!-- Se llena del catálogo de CAT_MUNICIPIO -->
                    <select  class="form-control" id="pID_MUNICIPIO_NAC" name="pID_MUNICIPIO_NAC" data-error="#err_pID_MUNICIPIO_NAC" data-query='c244RWRmblByTDlCWExpTHc0ZnQ3NGUzbWMza1Y5MnZCck9rQmpCQ1hTdlA3dzJyRVNMRjhXTll4WmNmYkplM1BKM1BWckJ3RFdieG55eUNldGZ3N1dyS2taNXhWd2RWczkzT0lsVTk1anZPcVJFclZBN05mTUtwbjJuazJqa0tSaXVENkI2WVErcmUxNlFoVUFNamttMjB1S3RxK0ZjUFA3cEFhM0Fvak53PQ==' data-cascade='true' data-force-refresh='true' data-cascade-id-ref='pID_ENTIDAD_NAC' data-params='ID_ENTIDAD={0}' required></select>
                    <span id="err_pID_MUNICIPIO_NAC"></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <span class="clr">*</span>Ciudad o Población de Nacimiento <!--  Campo CIUDAD_NAC-->
                    <input type="text" class="form-control" id="pCIUDAD_NAC_DATOS_PERSONALES" name="pCIUDAD_NAC_DATOS_PERSONALES" maxlength="50" required>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Nacionalidad <!-- Se llena de CAT_PAIS -->
                    <select  class="form-control" id="pID_NACIONALIDAD" name="pID_NACIONALIDAD" data-error="#err_pID_NACIONALIDAD" data-query='Vng1R1BwYXMzcnpkdHJEcjUxbG13VFhkcStKTTRvTW5idXdHa1F3TVBNcGhnS1JpQmtZMW5RR0ZKdEEvdUJiVVd6enhqNFdTNEhsaTNlVmI0Uzcxb1ZkSFVlQ3l4cnhKMVQwdWpvY2ZPRm8zckszc1JzNjlDbFhXTGFqZFlPd2s=' required></select>
                    <span id="err_pID_NACIONALIDAD"></span>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Modo de nacionalidad <!-- se llena con CAT_NACIONALIDAD  -->
                    <select  class="form-control" id="pMODO_NACIONALIDAD" name="pMODO_NACIONALIDAD" data-error="#err_pMODO_NACIONALIDAD" data-query='cXlBMWI5djl3TXFIaFo2akFJUEN5QXVjbnhoa29iMHhtSENyNkJLUmc0VTVOM2N6QW5SYmZFZVE0SUJSNWtkdzBZaHhRUDNGbVdGVFBGU0NwWFpKUURRY0xMQWNNbkZxK05uWFQ0WTI2ZU53L1N1SEhyaWhzck5pTitzcTBETytGbk5rMzNoaHlmckpRQnA1S3ZtYms5SWpSZzNhdXNPWTFha3pkT1RkY1FBPQ==' required></select>
                    <span id="err_pMODO_NACIONALIDAD"></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    Fecha de nacionalidad
                    <input type="date" id="pFECHA_NACIONALIDAD" name="pFECHA_NACIONALIDAD" class="form-control" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
                </div>
                <!-- <div class="col-md-4">
                    <span class="clr">*</span>RFC
                    <input type="text" id="pRFC_DATOS_PERSONALES" name="pRFC_DATOS_PERSONALES" class="form-control" minlength="10" maxlength="13" required>
                </div> -->
                <div class="col-md-4">
                    <span class="clr">*</span>Estado civil <!-- Se llena del catálogo CAT_ESTADO_CIVIL -->
                    <select  class="form-control" id="pID_ESTADO_CIVIL" name="pID_ESTADO_CIVIL" data-error="#err_pID_ESTADO_CIVIL" data-query='ZXdxV1A3eEYrWDRZeVJ0dVhkeEdNNDNoOWZPY2o3d21HempWZml4Ukg1ZDdzWDNKWkpuWmNjS01VVHJDUFZtZjZ4NDBCRitGdzNlTktaUTl6STYxV2pmY0dtbk5qWnRDakUyZmVSMW5yREVubVlxNW5GdVFqOGNlY3oxd0JGNTlZUWZSeGZwcmk1VVgzWVBGVFBnWnpzS29ycEQrRHdGUkh1REd1NTBuSTNJPQ==' required></select>
                    <span id="err_pID_ESTADO_CIVIL"></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    Cartilla del SMN
                    <input type="text" id="pCARTILLA_SMN" name="pCARTILLA_SMN" class="form-control" minlength="8" maxlength="11">
                </div>
                <div class="col-md-4">
                    Clave de elector
                    <input type="text" id="pCREDENCIAL_ELECTOR" name="pCREDENCIAL_ELECTOR" class="form-control" minlength="18" maxlength="18">
                </div>
                <div class="col-md-4">
                    Pasaporte
                    <input type="text" id="pPASAPORTE" name="pPASAPORTE" class="form-control" maxlength="11">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    Licencia de conducir
                    <input type="text" id="pLICENCIA_DATOS_PERSONALES" name="pLICENCIA_DATOS_PERSONALES" class="form-control" minlength="8" maxlength="11">
                </div>
                <div class="col-md-4">
                    Vigencia de licencia
                    <input type="date" id="pLICENCIA_VIG" name="pLICENCIA_VIG" class="form-control">
                </div>
                <div class="col-md-4">
                    CUIP
                    <input type="text" id="pCUIP" name="pCUIP" class="form-control" maxlength="40">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-default btnGuardarSection" id="guardarDatosPersonales"> Guardar datos personales</button>
                </div>
            </div>
            <input type="hidden" id="PID_ALTERNA_Datos_personales" name="PID_ALTERNA_Datos_personales" value="" >
            <input type="hidden" id="pID_ESTADO_EMISOR_Datos_personales" name="pID_ESTADO_EMISOR_Datos_personales" value="" >
            <input type="hidden" id="pID_EMISOR_Datos_personales" name="pID_EMISOR_Datos_personales" value="" >
        </form>
        <!-- CIB BLOQUE -->        
        <?php if (verificaPermiso(14) == true) { ?>
        <br>
        <hr>
        <br>
        <form action="#" id="Datos_personales_CIB_form" name="Datos_personales_CIB_form" autocomplete="off" data-requireddata=false>
            <div id="Datos_personales_CIB_form">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="row ">
                    <div class="col-md-4">
                        CIB                        
                        <input type="text" id="CIB" name="CIB" class="form-control" maxlength="30" >
                    </div>
                    <div class="col-md-4">
                        Motivo de cambio de CIB 
                        <input type="text" id="motivoCIB" name="motivoCIB" class="form-control" maxlength="250" >                    
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-default" id="GUARDAR_CIB" style="margin-top: 16px;"> Guardar CIB</button>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table id="tableDatospersonales" class="table display table-striped dt-responsive" style="width:100%">
                    <thead>
                        <th>CIB</th>
                        <th>Motivo</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } ?>        
        <!-- /CIB BLOQUE -->
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
                    <span class="clr">*</span>Máxima escolaridad <!-- CAT_GRADO_ESCOLAR -->
                    <br>
                    <select class="form-control w-100" id="pID_GRADO_ESCOLAR" name="pID_GRADO_ESCOLAR" data-error="#err_pID_GRADO_ESCOLAR" data-query='SzRVaytUUWZjNUhCUko5cjlsMS92YkZaMTQ0RzN3eG45VmljYTFqc2xDVHFabWxmd2xIenF1VmFyT1J6b1ZpS3k4bEluRlMwQnRiT3lnUmZDVTUxMVVQRXZUOHIyR1BOWE5yZGt4cHVlbjd5eU1JcXdWSkYwdnFQQ0pOUW8yWDRXdmdud3o2YVV5cXpzOGF1NmdYTG1kcDNYWElyM3FnY2tYRG5qZUhubEE4PQ==' required></select>
                    <span id="err_pID_GRADO_ESCOLAR"></span>
                </div>
                <div class="col-md-4">
                    Escuela
                    <input type="text" class="form-control" id="pNOMBRE_ESCUELA" name="pNOMBRE_ESCUELA" maxlength="100">
                </div>
                <div class="col-md-4">
                    Especialidad o estudio
                    <input type="text" class="form-control" id="pESPECIALIDAD_DESARROLLO" name="pESPECIALIDAD_DESARROLLO" maxlength="100">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    Cédula profesional
                    <input type="number" class="form-control" id="pCEDULA_PROFESIONAL" name="pCEDULA_PROFESIONAL" maxlength="8">
                </div>
                <div class="col-md-4">
                    Fecha de inicio
                    <input type="date" class="form-control" id="pINICIO_DESARROLLO" name="pINICIO_DESARROLLO">
                </div>
                <div class="col-md-4">
                    Fecha de término
                    <input type="date" class="form-control pTERMINO_DESARROLLO" id="pTERMINO_DESARROLLO" name="pTERMINO_DESARROLLO">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    Registro SEP
                    <input type="text" class="form-control" id="pREGISTRO_SEP" name="pREGISTRO_SEP" maxlength="1">
                </div>
                <div class="col-md-4">
                    Número de folio de certificado
                    <input type="text" class="form-control" id="pFOLIO_CERTIFICADO" name="pFOLIO_CERTIFICADO" maxlength="30">
                </div>
                <div class="col-md-4">
                    Promedio
                    <input type="number" class="form-control" id="pPROMEDIO" name="pPROMEDIO" min=0>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-default btnGuardarSection" id="guardarDesarrolloacademico">Guardar desarrollo académico</button>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
            </div>
            <input type="hidden" id="pID_ALTERNA_Desarrollo" name="pID_ALTERNA_Desarrollo" value="" >
            <input type="hidden" id="pID_ESTADO_EMISOR_Desarrollo" name="pID_ESTADO_EMISOR_Desarrollo" value="" >
            <input type="hidden" id="pID_EMISOR_Desarrollo" name="pID_EMISOR_Desarrollo" value="" >
        </form>
        <br><hr><br>
        <div class="row">
            <div class="col-md-12">                
                <table id="tableDesarrollo" class="table display table-striped dt-responsive tableDetail" style="width:100%">
                    <thead>
                        <th>Id nivel</th>
                        <th>Máxima escolaridad</th>
                        <th>Especialidad</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de término</th>
                        <th>Promedio</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
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
                    <span class="clr">*</span>Código postal
                    <input type="number" class="form-control" id="pCODIGO_POSTAL_DOMICILIO" name="pCODIGO_POSTAL_DOMICILIO" minlength=5 maxlength=5 required>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Estado <br><!-- Se  llena del catálogo CAT_ENTIDAD-->
                    <select style="width:356px;" class="form-control" id="pID_ENTIDAD_DOMICILIO" name="pID_ENTIDAD_DOMICILIO" data-error="#err_pID_ENTIDAD_DOMICILIO" data-query='RG51N2cyVWNFVVp5Rlc5WDYydU0wcm0wbys4dElkSU1uaHBpTTJHMEJqOGVqdmRkUXJRUzB0TVZIa2Y0UldSWGpiMS9xQXhOWE5oVndVN0QzSFpHWHI4NEVzWTRIRU5RTmxjS09EK243V002bi9RV1ZUTU0waGRHdWlHSzFaT04=' required></select>
                    <span id="err_pID_ENTIDAD_DOMICILIO"></span>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Municipio <br> <!-- Se llena del catálogo CAT_MUNICIPIO -->
                    <select style="width:356px;" class="form-control" id="pID_MUNICIPIO_DOMICILIO" name="pID_MUNICIPIO_DOMICILIO" data-error="#err_pID_MUNICIPIO_DOMICILIO" data-query='c244RWRmblByTDlCWExpTHc0ZnQ3NGUzbWMza1Y5MnZCck9rQmpCQ1hTdlA3dzJyRVNMRjhXTll4WmNmYkplM1BKM1BWckJ3RFdieG55eUNldGZ3N1dyS2taNXhWd2RWczkzT0lsVTk1anZPcVJFclZBN05mTUtwbjJuazJqa0tSaXVENkI2WVErcmUxNlFoVUFNamttMjB1S3RxK0ZjUFA3cEFhM0Fvak53PQ==' data-cascade='true' data-force-refresh='true' data-cascade-id-ref='pID_ENTIDAD_DOMICILIO' data-params='ID_ENTIDAD={0}' required></select>
                    <span id="err_pID_MUNICIPIO_DOMICILIO"></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    Ciudad
                    <input type="text" class="form-control" id="pCIUDAD_DOMICILIO" name="pCIUDAD_DOMICILIO" maxlength="50"> 
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Colonia/Localidad
                    <input type="text" class="form-control" id="pCOLONIA_DOMICILIO" name="pCOLONIA_DOMICILIO" maxlength="60" required>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Calle
                    <input type="text" class="form-control" id="pCALLE_DOMICILIO" name="pCALLE_DOMICILIO" maxlength="60" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <span class="clr">*</span>Número exterior
                    <input type="text" class="form-control validarNumberSpecial" id="pNUM_EXTERIOR_DOMICILIO" name="pNUM_EXTERIOR_DOMICILIO" required>
                </div>
                <div class="col-md-4">
                    Número interior
                    <input type="text" class="form-control" id="pNUM_INTERIOR_DOMICILIO" name="pNUM_INTERIOR_DOMICILIO" >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    Entre la calle de
                    <input type="text" class="form-control" id="pENTRE_CALLE_DOMICILIO" name="pENTRE_CALLE_DOMICILIO" maxlength="60">
                </div>
                <div class="col-md-4">
                    Y la calle de
                    <input type="text" class="form-control" id="pY_CALLE_DOMICILIO" name="pY_CALLE_DOMICILIO" maxlength="45">
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Número telefónico.
                    <input type="text" class="form-control" id="pTELEFONO_DOMICILIO" name="pTELEFONO_DOMICILIO" maxlength="13" minlength="10" required>
                </div>
            </div>
            <br>                
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-default btnGuardarSection" id="guardarDomicilio">Guardar domicilio</button>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
            </div>
            <input type="hidden" id="pID_ALTERNA_Domicilio" name="pID_ALTERNA_Domicilio" value="" >
            <input type="hidden" id="pID_ESTADO_EMISOR_Domicilio" name="pID_ESTADO_EMISOR_Domicilio" value="" >
            <input type="hidden" id="pID_EMISOR_Domicilio" name="pID_EMISOR_Domicilio" value="" >
        </form>
        <br>
        <hr>
        <br>
        <table id="tableDomicilio" class="table display table-striped dt-responsive tableDetail" style="width:100%">
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
            </tbody>
        </table>
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
                    <span class="clr">*</span>Tipo domicilio <br>
                    <select style="width:356px;" name="pID_TIPO_DOM" id="pID_TIPO_DOM" class="form-control" data-error="#err_pID_TIPO_DOM" data-query='Y1lyVjUzQWNiNnc2UlN1UGhHbTNLRC9QZFhvelZUSVIxOC9HemtrSzZSdnZBYlpSR1lXU1BQb1VSOTI4a1M2MFBrOWxXL3MxYWhDSG5uMUZMZDIrU3hzNkd6UllzMndnMlExZjNmZUZOblNqQnEwbjQ0bUJ6N0laaEpsTW4xTVVsL2dtczlReTN0emxjTU04ZVFpeUxqYU9CeFgySUY1eUdOVk9aZVI5VlRZPQ==' required></select>
                    <span id="err_pID_TIPO_DOM"></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <span class="clr">*</span>Nombre
                    <input type="text" id="pNOMBRE_REFERENCIAS" name="pNOMBRE_REFERENCIAS" class="form-control" maxlength="30" required>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Apellido paterno
                    <input type="text" id="pPATERNO_REFERENCIAS" name="pPATERNO_REFERENCIAS" class="form-control" maxlength="30" required>
                </div>
                <div class="col-md-4">
                    Apellido materno
                    <input type="text" class="form-control" id="pMATERNO_REFERENCIAS" name="pMATERNO_REFERENCIAS" maxlength="30">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <span class="clr">*</span>Sexo <br> <!-- Se llena del catálogo CAT_SEXO -->
                    <select style="width:356px;" name="pSEXO_REFERENCIAS" id="pSEXO_REFERENCIAS" class="form-control" data-error="#err_pSEXO_REFERENCIAS" data-query='cmw2WmwzeW03a1lsakNJd1dEWWt0WmRmOU95OFFzS0ZESENTMmpyYkNySis1VlhVOFEza205bHF1Z0trTWVLVW4zV081M284cjNPc0pObExOZ2dKcGhnTE9KZU83SlM0bkZIaWhBdm4rV2ZjOGRZRmpnMkI3N1ZaZWVoZnk4R0g=' required></select>
                    <span id="err_pSEXO_REFERENCIAS"></span>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Ocupación <br> <!-- Se llena del catálogo CAT_OCUPACION -->
                    <select style="width:356px;" name="pID_OCUPACION" id="pID_OCUPACION" class="form-control" data-error="#err_pID_OCUPACION" data-query='cjB0dGsrdDFKdDJNRVR4RVRUQmlVZTRES2tSTmhFZXRxUktaZm5UTjFTM1F6T0VMbHkyMTQ1L3JkaHZ2d1AwZkRWVlpIMlVOMnpNam1pUnFSUWRZM2xBMXJncWl0d3hEYTQrTnh6WStWcUsrUWRwTnNGc2lUVUNndEp4YUFRNVY=' required></select>
                    <span id="err_pID_OCUPACION"></span>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Tipo de referencia <br> <!-- Se llena del catálogo CAT_REFERENCIA -->
                    <select style="width:356px;" id="pID_TIPO_REFERENCIA" name="pID_TIPO_REFERENCIA" class="form-control" data-error="#err_pID_TIPO_REFERENCIA" data-query='d1lEQ2dSOSsrZUtnU2wwVjJWRHBCSE12STBKUElSU2l5bHA4OTRJbzlXc01BVFNvYms3V0lYYm1QWkVPellLdlNsZmNicy83akdkaEVTZDAxTDVGNVRzdnZtK3k5KzRzZFJxYXZCNERJRmhwOCtFb0ZFS0hjNEhaZTd4cWw1U2Y=' required></select>
                    <span id="err_pID_TIPO_REFERENCIA"></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <span class="clr">*</span>Código postal
                    <input type="number" id="pCODIGO_POSTAL_REFERENCIAS" name="pCODIGO_POSTAL_REFERENCIAS" class="form-control" required minlength=5 maxlength=5>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Estado <br> <!-- Se llena del catálog CAT_ENTIDAD -->
                    <select style="width:356px;" name="pID_ENTIDAD_REFERENCIAS" id="pID_ENTIDAD_REFERENCIAS"  class="form-control" data-error="#err_pID_ENTIDAD_REFERENCIAS" data-query='RG51N2cyVWNFVVp5Rlc5WDYydU0wcm0wbys4dElkSU1uaHBpTTJHMEJqOGVqdmRkUXJRUzB0TVZIa2Y0UldSWGpiMS9xQXhOWE5oVndVN0QzSFpHWHI4NEVzWTRIRU5RTmxjS09EK243V002bi9RV1ZUTU0waGRHdWlHSzFaT04=' required></select>
                    <span id="err_pID_ENTIDAD_REFERENCIAS"></span>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Municipio <br><!-- Se llena del catálogo CAT_MUNICIPIO -->
                    <select style="width:356px;" name="pID_MUNICIPIO_REFERENCIAS" id="pID_MUNICIPIO_REFERENCIAS" class="form-control" data-error="#err_pID_MUNICIPIO_REFERENCIAS" data-query='c244RWRmblByTDlCWExpTHc0ZnQ3NGUzbWMza1Y5MnZCck9rQmpCQ1hTdlA3dzJyRVNMRjhXTll4WmNmYkplM1BKM1BWckJ3RFdieG55eUNldGZ3N1dyS2taNXhWd2RWczkzT0lsVTk1anZPcVJFclZBN05mTUtwbjJuazJqa0tSaXVENkI2WVErcmUxNlFoVUFNamttMjB1S3RxK0ZjUFA3cEFhM0Fvak53PQ==' data-cascade='true' data-force-refresh='true' data-cascade-id-ref='pID_ENTIDAD_REFERENCIAS' data-params='ID_ENTIDAD={0}' required></select>
                    <span id="err_pID_MUNICIPIO_REFERENCIAS"></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <span class="clr">*</span>Ciudad
                    <input type="text" id="pCIUDAD_REFERENCIAS" name="pCIUDAD_REFERENCIAS" class="form-control" maxlength="50" required>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Colonia/Localidad
                    <input type="text"  id="pCOLONIA_REFERENCIAS" name="pCOLONIA_REFERENCIAS" class="form-control" maxlength="60" required>
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Calle
                    <input type="text" id="pCALLE_REFERENCIAS" name="pCALLE_REFERENCIAS" class="form-control" maxlength="60" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <span class="clr">*</span>Número exterior
                    <input type="text" class="form-control validarNumberSpecial" name="pNUM_EXTERIOR_REFERENCIAS" id="pNUM_EXTERIOR_REFERENCIAS" required>
                </div>
                <div class="col-md-4">
                    Número interior
                    <input type="text" class="form-control" name="pNUM_INTERIOR_REFERENCIAS" id="pNUM_INTERIOR_REFERENCIAS" >
                </div>
                <div class="col-md-4">
                    <span class="clr">*</span>Número telefónico.
                    <input type="text" class="form-control" id="pTELEFONO_REFERENCIAS" name="pTELEFONO_REFERENCIAS" maxlength="13" minlength="10" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    Entre la calle de
                    <input type="text" class="form-control" id="pENTRE_CALLE_REFERENCIAS" name="pENTRE_CALLE_REFERENCIAS" maxlength="60">
                </div>
                <div class="col-md-4">
                    Y la calle de
                    <input type="text" class="form-control" id="pY_CALLE_REFERENCIAS" name="pY_CALLE_REFERENCIAS" maxlength="45">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-default btnGuardarSection" id="guardarReferencia">Guardar referencia</button>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
            </div>
            <input type="hidden" id="pID_ALTERNA_Referencias" name="pID_ALTERNA_Referencias" value="" >
            <input type="hidden" id="pID_ESTADO_EMISOR_Referencias" name="pID_ESTADO_EMISOR_Referencias" value="" >
            <input type="hidden" id="pID_EMISOR_Referencias" name="pID_EMISOR_Referencias" value="" >
        </form>
        <br>
        <hr>
        <br>
        <table id="tableReferencias" class="table display table-striped dt-responsive tableDetail" style="width:100%">
            <thead>
                <th>Id referencia</th>
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Tipo de referencia</th>
                <th>Domicilio</th>
            </thead>
            <tbody>
            </tbody>
        </table>
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
        <form action="#" id="Socioeconomicos_form" name="Socioeconomicos_form" autocomplete="off" data-requireddata=false>
            <br>
            <div class="Socioeconomicos_form">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="titulo">Socioeconómicos</h3>
                    </div>
                </div>                
                <br>
                <div class="row">
                    <div class="col-md-4">
                        ¿Vive con su familia? <br><!-- S/N = SI/NO -->
                        <select style="width:356px;" class="form-control" id="pVIVE_FAMILIA" name="pVIVE_FAMILIA" data-error="#err_pVIVE_FAMILIA" data-query=''>
                            <option disabled selected value>Seleccione una opción</option>
                            <option value="S">SI</option>
                            <option value="N">NO</option>
                        </select>
                        <span id="err_pVIVE_FAMILIA"></span>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Ingreso familiar adicional (mensual)
                        <input type="number" class="form-control" id="pINGRESO_FAMILIAR" name="pINGRESO_FAMILIAR" required>
                    </div>
                    <div class="col-md-4">
                        Su domicilio es <br> <!-- Se llena del catálogo CAT_TIPO_DOMICILIO -->
                        <select style="width:356px;" name="pID_TIPO_DOMICILIO" id="pID_TIPO_DOMICILIO" class="form-control" data-error="#err_pID_TIPO_DOMICILIO" data-query='Y3ZMRjVwQ3hJdU1nVy95Yk15enNSWmpyaXBYbHFmQVdMOHUxTkVlY3RSZ3ZWTElpRVRkZ2V6alpURTQ5WC9ONm9oVnBsTEpSNzdPMDFUUTFUcVBZQzFFL2d2LytMZVFWR1dWS1FKSmt0c2JYWDBOWTd1dW85TTFENjVVYnJadlJuNG5za3kyRkhHMitISmIxTTZlQ2JZaGtqQTdaeHplRE5LNzVrWHp1cW53PQ=='></select>
                        <span id="err_pID_TIPO_DOMICILIO"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4" >
                        Actividades culturales o deportivas que practica
                        <input type="text" class="form-control" id="pACTIVIDAD_CULTURAL" name="pACTIVIDAD_CULTURAL" maxlength="100">
                    </div>
                    <div class="col-md-4">
                        Especificación de inmuebles y costos
                        <input type="text" class="form-control" id="pINMUEBLES" name="pINMUEBLES" maxlength="100">
                    </div>
                    <div class="col-md-4">
                        Inversión y monto aproximado
                        <input type="text" class="form-control" id="pINVERSIONES" name="pINVERSIONES" maxlength="100">
                    </div>
                </div>  
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Vehículo y costo aproximado
                        <input type="text" class="form-control" id="pNUMERO_AUTOS" name="pNUMERO_AUTOS" maxlength="100">
                        <!-- ¿? -->
                    </div>
                    <div class="col-md-4">
                        Calidad de vida
                        <input type="text" class="form-control" id="pCALIDAD_VIDA" name="pCALIDAD_VIDA" maxlength="50">
                    </div>
                    <div class="col-md-4">
                        Vicios
                        <input type="text" class="form-control" id="pVICIOS" name="pVICIOS" maxlength="100">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4" >
                        Imágen pública
                        <input type="text" class="form-control" id="pIMAGEN_PUBLICA" name="pIMAGEN_PUBLICA" maxlength="50">
                    </div>
                    <div class="col-md-4">
                        Comportamiento social
                        <input type="text" class="form-control" id="pCOMPORTA_SOCIAL" name="pCOMPORTA_SOCIAL" maxlength="50">
                    </div>
                    <!-- <div class="col-md-4">
                        Ingreso mensual adicional
                        <input type="number" class="form-control" id="pINGRESO_MENSUAL" name="pINGRESO_MENSUAL" maxlength="50">
                    </div> -->
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default btnGuardarSection" id="guardarSocioeconomico">Guardar socioeconómico</button>
                    </div>
                </div>
                <br>
                <input type="hidden" id="pID_ALTERNA_Socioeconomico" name="pID_ALTERNA_Socioeconomico" value="" >
                <input type="hidden" id="pID_ESTADO_EMISOR_Socioeconomico" name="pID_ESTADO_EMISOR_Socioeconomico" value="" >
                <input type="hidden" id="pID_EMISOR_Socioeconomico" name="pID_EMISOR_Socioeconomico" value="" >
            </div>
        </form>
        <hr>
        <form action="#" id="Dependientes_form" name="Dependientes_form" autocomplete="off" data-requireddata=false>
            <br>
            <div class="Dependientes_form">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="titulo">Dependientes económicos</h3>
                    </div>
                </div> 
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>Nombre
                        <input type="text" class="form-control" id="pNOMBRE_SOCIOECONOMICOS" name="pNOMBRE_SOCIOECONOMICOS" maxlength="40" required>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Apellido paterno
                        <input type="text" class="form-control" id="pPATERNO_SOCIOECONOMICOS" name="pPATERNO_SOCIOECONOMICOS" maxlength="40" required>
                    </div>
                    <div class="col-md-4">
                        Apellido materno
                        <input type="text" class="form-control" id="pMATERNO_SOCIOECONOMICOS" name="pMATERNO_SOCIOECONOMICOS" maxlength="40">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>Sexo <br> <!-- Se llena del catálogo CAT_SEXO -->
                        <select style="width:356px;" class="form-control" id="pSEXO_SOCIOECONOMICOS" name="pSEXO_SOCIOECONOMICOS" data-error="#err_pSEXO_SOCIOECONOMICOS" data-query='cmw2WmwzeW03a1lsakNJd1dEWWt0WmRmOU95OFFzS0ZESENTMmpyYkNySis1VlhVOFEza205bHF1Z0trTWVLVW4zV081M284cjNPc0pObExOZ2dKcGhnTE9KZU83SlM0bkZIaWhBdm4rV2ZjOGRZRmpnMkI3N1ZaZWVoZnk4R0g=' required></select>
                        <span id="err_pSEXO_SOCIOECONOMICOS"></span>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Fecha de nacimiento
                        <input type="date" class="form-control" id="pFECHA_NAC_SOCIOECONOMICOS" name="pFECHA_NAC_SOCIOECONOMICOS" required>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Parentesco <br><!-- Se llena del catálogo CAT_RELACION -->
                        <select style="width:356px;" id="pID_RELACION" name="pID_RELACION" class="form-control" data-error="#err_pID_RELACION" data-query='d1lEQ2dSOSsrZUtnU2wwVjJWRHBCSE12STBKUElSU2l5bHA4OTRJbzlXc01BVFNvYms3V0lYYm1QWkVPellLdlNsZmNicy83akdkaEVTZDAxTDVGNVRzdnZtK3k5KzRzZFJxYXZCNERJRmhwOCtFb0ZFS0hjNEhaZTd4cWw1U2Y=' required></select>                        
                        <span id="err_pID_RELACION"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>Relación <br> <!-- Se llena del catálogo CAT_RELACION -->
                        <select
                            class="form-control" 
                            id="pID_RELACION_SOCIOECONOMICOS" 
                            name="pID_RELACION_SOCIOECONOMICOS" 
                            data-error="#err_pID_RELACION_SOCIOECONOMICOS" 
                            data-query='aVlaNnpEUWZuQ2J4Ulp2VytYNHVlWDR1ck9LRE83R3ZOWmVnenRuampBcnR3WmliWUVqTno4VEhNdFFrdDB0L2tyTCs5YWZHdUlVYUxMVFZuc2tpS05maVhXaXBUcjN1eWtoS0hCS3IrWnJKdkFqSDBQanRvbzhtSFlvZU1zMlVLNFdTeVZxSFR5Mng5VjU2RzlnTkpiM1BqTWZQamRXS095T1J6bnRsTVRrPQ==' 
                            data-cascade='true' 
                            data-force-refresh='true' 
                            data-cascade-id-ref='pID_RELACION' 
                            data-params='ID_TIPO_REFERENCIA={0}' 
                            required></select>
                        <span id="err_pID_RELACION_SOCIOECONOMICOS"></span>
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
                <input type="hidden" id="pID_ALTERNA_Socioeconomico" name="pID_ALTERNA_Socioeconomico" value="" >
                <input type="hidden" id="pID_ESTADO_EMISOR_Socioeconomico" name="pID_ESTADO_EMISOR_Socioeconomico" value="" >
                <input type="hidden" id="pID_EMISOR_Socioeconomico" name="pID_EMISOR_Socioeconomico" value="" >
            </div>
        </form>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table id="tableSocioeconomicos" class="table display table-striped dt-responsive tableDetail" style="width:100%">
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
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <button class="btn btn-secondary btn-lg btnSiguienteAnterior anteriorTab" id="anteriorSocioeconomico" data-nexttab="#Referencias-tab"> Anterior Ficha</button>
                <button class="btn btn-secondary btn-lg btnSiguienteAnterior siguienteTab endTab" id="finalizarDatosGenerales">Finalizar</button>
            </div>
        </div>
    </div>
</div>