

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
                        <span class="clr">*</span>CURP
                        <input type="text" id="pCURP" name="pCURP" class="form-control" maxlength="20" required>
                    </div>
                    <div class="col-md-4">
                        Tipo de movimiento <!-- Se llena de la tabla CAT_TIPO_OPERACION  -->
                        <select  class="form-control" name="pTIPO_MOV" id="pTIPO_MOV" data-error="#err_tipoMovimiento_DATOS_PERSONALES" data-query='WEh6TEJUUFROWVFUNWdLYVVqOSt0eE5rRFBwL3NLWFhyY1RBYXNhUlQvMXJkaFN5bVhWNFUwRWJKdG1YQWFtWWl3VTVlQWtQVnp3NmVNOGdZT1hMWmFDczlzZnBNQVhWaGxhS1BibktwdklnckgxNmplYXkvblpVSWhIMWtoNlNIM041THFhTEdvMlQybDA4N1FiSndSWjVlMmRLQndqRTkvTHJrbS9jUkRvPQ==' required></select>
                        <span id="err_tipoMovimiento"></span>
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
                        Descripción ciudad de nacimiento <!--  Campo CIUDAD_NAC-->
                        <input type="text" class="form-control" id="pCIUDAD_NAC_DATOS_PERSONALES" name="pCIUDAD_NAC_DATOS_PERSONALES" max="50">
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Nacionalidad <!-- Se llena de CAT_NACIONALIDAD -->
                        <select  class="form-control" id="pID_NACIONALIDAD" name="pID_NACIONALIDAD" data-error="#err_pID_NACIONALIDAD" data-query='cXlBMWI5djl3TXFIaFo2akFJUEN5QXVjbnhoa29iMHhtSENyNkJLUmc0VTVOM2N6QW5SYmZFZVE0SUJSNWtkdzBZaHhRUDNGbVdGVFBGU0NwWFpKUURRY0xMQWNNbkZxK05uWFQ0WTI2ZU53L1N1SEhyaWhzck5pTitzcTBETytGbk5rMzNoaHlmckpRQnA1S3ZtYms5SWpSZzNhdXNPWTFha3pkT1RkY1FBPQ==' required></select>
                        <span id="err_pID_NACIONALIDAD"></span>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Modo de nacionalidad
                        <select  class="form-control" id="pMODO_NACIONALIDAD" name="pMODO_NACIONALIDAD" data-error="#err_pMODO_NACIONALIDAD" data-query='' required></select>
                        <span id="err_pMODO_NACIONALIDAD"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Fecha de nacionalidad
                        <input type="date" id="pFECHA_NACIONALIDAD" name="pFECHA_NACIONALIDAD" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>RFC
                        <input type="text" id="pRFC_DATOS_PERSONALES" name="pRFC_DATOS_PERSONALES" class="form-control" minlength="10" maxlength="13" required>
                    </div>
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
                        <input type="text" id="pCARTILLA_SMN" name="pCARTILLA_SMN" class="form-control" maxlength="20">
                    </div>
                    <div class="col-md-4">
                        Clave de elector
                        <input type="text" id="pCREDENCIAL_LECTOR" name="pCREDENCIAL_LECTOR" class="form-control" maxlength="30">
                    </div>
                    <div class="col-md-4">
                        Pasaporte
                        <input type="text" id="pPASAPORTE" name="pPASAPORTE" class="form-control" maxlength="20">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Licencia de conducir
                        <input type="text" id="pLICENCIA_DATOS_PERSONALES" name="pLICENCIA_DATOS_PERSONALES" class="form-control" minlength="20" maxlength="20">
                    </div>
                    <div class="col-md-4">
                        Vigencia de licencia
                        <input type="date" id="pLICENCIA_VIG" name="pLICENCIA_VIG" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        CUIP
                        <input type="text" id="pCUIP" name="pCUIP" class="form-control" maxlength="40" required>
                    </div>
                </div>
                <br><hr><br>
                <div class="row">
                    <div class="col-md-4">
                        CIB
                        <input type="text" class="form-control" maxlength="30">
                    </div>
                    <div class="col-md-4">
                        Motivo de cambio de CIB 
                        <input type="text" class="form-control" maxlength="250">
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
                        <span class="clr">*</span>Máxima escolaridad <!-- CAT_GRADO_ESCOLAR -->
                        <select  class="form-control" id="pID_GRADO_ESCOLAR" name="pID_GRADO_ESCOLAR" data-error="#err_pID_GRADO_ESCOLAR" data-query='SzRVaytUUWZjNUhCUko5cjlsMS92YkZaMTQ0RzN3eG45VmljYTFqc2xDVHFabWxmd2xIenF1VmFyT1J6b1ZpS3k4bEluRlMwQnRiT3lnUmZDVTUxMVVQRXZUOHIyR1BOWE5yZGt4cHVlbjd5eU1JcXdWSkYwdnFQQ0pOUW8yWDRXdmdud3o2YVV5cXpzOGF1NmdYTG1kcDNYWElyM3FnY2tYRG5qZUhubEE4PQ==' required></select>
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
                        <input type="text" class="form-control" id="pCEDULA_PROFESIONAL" name="pCEDULA_PROFESIONAL" maxlength="30">
                    </div>
                    <div class="col-md-4">
                        Fecha de inicio
                        <input type="date" class="form-control" id="pINICIO" name="pINICIO">
                    </div>
                    <div class="col-md-4">
                        Fecha de término
                        <input type="date" class="form-control" id="pTERMINO" name="pTERMINO">
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
                        <input type="text" class="form-control" id="pPROMEDIO" name="pPROMEDIO" maxlength="5.2">
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
                        <span class="clr">*</span>Código postal
                        <input type="text" class="form-control" id="pCODIGO_POSTAL_DOMICILIO" name="pCODIGO_POSTAL_DOMICILIO" maxlength="10" required>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Estado <!-- Se  llena del catálogo CAT_ENTIDAD-->
                        <select  class="form-control" id="pID_ENTIDAD_DOMICILIO" name="pID_ENTIDAD_DOMICILIO" data-error="#err_pID_ENTIDAD_DOMICILIO" data-query='RG51N2cyVWNFVVp5Rlc5WDYydU0wcm0wbys4dElkSU1uaHBpTTJHMEJqOGVqdmRkUXJRUzB0TVZIa2Y0UldSWGpiMS9xQXhOWE5oVndVN0QzSFpHWHI4NEVzWTRIRU5RTmxjS09EK243V002bi9RV1ZUTU0waGRHdWlHSzFaT04=' required></select>
                        <span id="err_pID_ENTIDAD_DOMICILIO"></span>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Municipio <!-- Se llena del catálogo CAT_MUNICIPIO -->
                        <select  class="form-control" id="pID_MUNICIPIO_DOMICILIO" name="pID_MUNICIPIO_DOMICILIO" data-error="#err_pID_MUNICIPIO" data-query='c244RWRmblByTDlCWExpTHc0ZnQ3NGUzbWMza1Y5MnZCck9rQmpCQ1hTdlA3dzJyRVNMRjhXTll4WmNmYkplM1BKM1BWckJ3RFdieG55eUNldGZ3N1dyS2taNXhWd2RWczkzT0lsVTk1anZPcVJFclZBN05mTUtwbjJuazJqa0tSaXVENkI2WVErcmUxNlFoVUFNamttMjB1S3RxK0ZjUFA3cEFhM0Fvak53PQ==' data-cascade='true' data-force-refresh='true' data-cascade-id-ref='pID_ENTIDAD_DOMICILIO' data-params='ID_ENTIDAD={0}' required></select>
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
                        <input type="text" class="form-control" id="pNUM_EXTERIOR_DOMICILIO" name="pNUM_EXTERIOR_DOMICILIO" maxlength="30" minlength="5" required>
                    </div>
                    <div class="col-md-4">
                        Número interior
                        <input type="text" class="form-control" id="pNUM_INTERIOR_DOMICILIO" name="pNUM_INTERIOR_DOMICILIO" maxlength="30" minlength="4">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>Entre la calle de
                        <input type="text" class="form-control" id="pENTRE_CALLE_DOMICILIO" name="pENTRE_CALLE_DOMICILIO" maxlength="60" required>
                    </div>
                    <div class="col-md-4">
                        Y la calle de
                        <input type="text" class="form-control" id="pY_CALLE_DOMICILIO" name="pY_CALLE_DOMICILIO" maxlength="45">
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Número telefónico
                        <input type="text" class="form-control" id="pTELEFONO_DOMICILIO" name="pTELEFONO_DOMICILIO" maxlength="13" minlength="10" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>RFC
                        <input type="text" class="form-control" id="pRFC_DOMICILIO" name="pRFC_DOMICILIO" maxlength="13" minlength="10" required>
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
                        <span class="clr">*</span>Nombre
                        <input type="text" id="NOMBRE_REFERENCIAS" name="NOMBRE_REFERENCIAS" class="form-control" maxlength="30" required>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Apellido paterno
                        <input type="text" id="PATERNO_REFERENCIAS" name="PATERNO_REFERENCIAS" class="form-control" maxlength="30" required>
                    </div>
                    <div class="col-md-4">
                        Apellido materno
                        <input type="text" class="form-control" id="MATERNO_REFERENCIAS" name="MATERNO_REFERENCIAS" maxlength="30">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>Sexo <!-- Se llena del catálogo CAT_SEXO -->
                        <select name="SEXO_REFERENCIAS" id="SEXO_REFERENCIAS" class="form-control" data-error="#err_SEXO_REFERENCIAS" data-query='cmw2WmwzeW03a1lsakNJd1dEWWt0WmRmOU95OFFzS0ZESENTMmpyYkNySis1VlhVOFEza205bHF1Z0trTWVLVW4zV081M284cjNPc0pObExOZ2dKcGhnTE9KZU83SlM0bkZIaWhBdm4rV2ZjOGRZRmpnMkI3N1ZaZWVoZnk4R0g=' required></select>
                        <span id="err_SEXO_REFERENCIAS"></span>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Ocupación <!-- Se llena del catálogo CAT_OCUPACION -->
                        <select name="OCUPACION" id="OCUPACION" class="form-control" data-error="#err_OCUPACION" data-query='cjB0dGsrdDFKdDJNRVR4RVRUQmlVZTRES2tSTmhFZXRxUktaZm5UTjFTM1F6T0VMbHkyMTQ1L3JkaHZ2d1AwZkRWVlpIMlVOMnpNam1pUnFSUWRZM2xBMXJncWl0d3hEYTQrTnh6WStWcUsrUWRwTnNGc2lUVUNndEp4YUFRNVY=' required></select>
                        <span id="err_OCUPACION"></span>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Tipo de referencia <!-- Se llena del catálogo CAT_REFERENCIA -->
                        <select name="" id="ID_TIPO_REFERENCIA" name="ID_TIPO_REFERENCIA" class="form-control" data-error="#err_ID_TIPO_REFERENCIA_REFERENCIAS" data-query='d1lEQ2dSOSsrZUtnU2wwVjJWRHBCSE12STBKUElSU2l5bHA4OTRJbzlXc01BVFNvYms3V0lYYm1QWkVPellLdlNsZmNicy83akdkaEVTZDAxTDVGNVRzdnZtK3k5KzRzZFJxYXZCNERJRmhwOCtFb0ZFS0hjNEhaZTd4cWw1U2Y=' required></select>
                        <span id="err_ID_TIPO_REFERENCIA"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Relación o parentesco <!-- Se llena del catálogo CAT_RELACION -->
                        <select name="ID_RELACION_REFERENCIAS" id="ID_RELACION_REFERENCIAS" class="form-control" data-error="#err_ID_RELACION" data-query='WGJqek5KZDlveE96NE4rQ3grdWlnU01adGw1clZVQ3dhUmlrN3N1VjNxd2ZBZ2pZTXRGWnhEeTFRWmFwTllUUU5TTnpra0wra05SQTVXRUxXQUovdk1LaVRndXlwNHVKcUdVMjErdVZhR0hWRFp3TTNiNEgvWksrbjkxUFlFb0U='></select>
                        <span id="err_ID_RELACION"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Código postal
                        <input type="text" id="CODIGO_POSTAL_REFERENCIAS" name="CODIGO_POSTAL_REFERENCIAS" class="form-control" maxlength="10">
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Estado <!-- Se llena del catálog CAT_ENTIDAD -->
                        <select name="ID_ENTIDAD_REFERENCIAS" id="ID_ENTIDAD_REFERENCIAS"_REFERENCIAS  class="form-control" data-error="#err_ID_ENTIDAD_REFERENCIAS" data-query='RG51N2cyVWNFVVp5Rlc5WDYydU0wcm0wbys4dElkSU1uaHBpTTJHMEJqOGVqdmRkUXJRUzB0TVZIa2Y0UldSWGpiMS9xQXhOWE5oVndVN0QzSFpHWHI4NEVzWTRIRU5RTmxjS09EK243V002bi9RV1ZUTU0waGRHdWlHSzFaT04=' required></select>
                        <span id="err_ID_ENTIDAD_REFERENCIAS"></span>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Municipio <!-- Se llena del catálogo CAT_MUNICIPIO -->
                        <select name="ID_MUNICIPIO_REFERENCIAS" id="ID_MUNICIPIO_REFERENCIAS" class="form-control" data-error="#err_ID_MUNICIPIO_REFERENCIAS" data-query='c244RWRmblByTDlCWExpTHc0ZnQ3NGUzbWMza1Y5MnZCck9rQmpCQ1hTdlA3dzJyRVNMRjhXTll4WmNmYkplM1BKM1BWckJ3RFdieG55eUNldGZ3N1dyS2taNXhWd2RWczkzT0lsVTk1anZPcVJFclZBN05mTUtwbjJuazJqa0tSaXVENkI2WVErcmUxNlFoVUFNamttMjB1S3RxK0ZjUFA3cEFhM0Fvak53PQ==' data-cascade='true' data-force-refresh='true' data-cascade-id-ref='ID_ENTIDAD_REFERENCIAS' data-params='ID_ENTIDAD={0}' required></select>
                        <span id="err_ID_MUNICIPIO_REFERENCIAS"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Ciudad
                        <input type="text" id="CIUDAD_REFERENCIAS" name="CIUDAD_REFERENCIAS" class="form-control" maxlength="50" required>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Colonia/Localidad
                        <input type="text"  id="COLONIA_REFERENCIAS" name="COLONIA_REFERENCIAS" class="form-control" maxlength="60" required>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Calle
                        <input type="text" id="CALLE_REFERENCIAS" name="CALLE_REFERENCIAS" class="form-control" maxlength="60" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>Número exterior
                        <input type="text" class="form-control" name="NUM_EXTERIOR_REFERENCIAS" id="NUM_EXTERIOR_REFERENCIAS" maxlength="30" minlength="5" required>
                    </div>
                    <div class="col-md-4">
                        Número interior
                        <input type="text" class="form-control" name="NUM_INTERIOR_REFERENCIAS" id="NUM_INTERIOR_REFERENCIAS" maxlength="30" minlength="4">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Entre la calle de
                        <input type="text" class="form-control" id="ENTRE_CALLE_REFERENCIAS" name="ENTRE_CALLE_REFERENCIAS" maxlength="60">
                    </div>
                    <div class="col-md-4">
                        Y la calle de
                        <input type="text" class="form-control" id="Y_CALLE_REFERENCIAS" name="Y_CALLE_REFERENCIAS" maxlength="45">
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
                        ¿Vive con su familia?<!-- S/N = SI/NO -->
                        <select  class="form-control" id="VIVE_FAMILIA" name="VIVE_FAMILIA" data-error="#err_VIVE_FAMILIA" data-query=''>
                            <option disabled selected value>Seleccione una opción</option>
                            <option value="S">SI</option>
                            <option value="N">NO</option>
                        </select>
                        <span id="err_VIVE_FAMILIA"></span>
                    </div>
                    <div class="col-md-4">
                        Ingreso familiar adicional (mensual)
                        <input type="text" class="form-control" id="INGRESO_FAMILIAR" name="INGRESO_FAMILIAR" maxlength="10.2">
                    </div>
                    <div class="col-md-4">
                        Su domicilio es <!-- Se llena del catálogo CAT_TIPO_DOMICILIO -->
                        <select name="ID_TIPO_DOMICILIO" id="ID_TIPO_DOMICILIO" class="form-control" data-error="#err_ID_TIPO_DOMICILIO" data-query='Y3ZMRjVwQ3hJdU1nVy95Yk15enNSWmpyaXBYbHFmQVdMOHUxTkVlY3RSZ3ZWTElpRVRkZ2V6alpURTQ5WC9ONm9oVnBsTEpSNzdPMDFUUTFUcVBZQzFFL2d2LytMZVFWR1dWS1FKSmt0c2JYWDBOWTd1dW85TTFENjVVYnJadlJuNG5za3kyRkhHMitISmIxTTZlQ2JZaGtqQTdaeHplRE5LNzVrWHp1cW53PQ=='>
                        <span id="err_ID_TIPO_DOMICILIO"></span>
                        <option value="">Seleccione</option></select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4" >
                        Actividades culturales o deportivas que practica
                        <input type="text" class="form-control" id="ACTIVIDAD_CULTURAL" name="ACTIVIDAD_CULTURAL" maxlength="100">
                    </div>
                    <div class="col-md-4">
                        Especificación de inmuebles y costos
                        <input type="text" class="form-control" id="INMUEBLES" name="INMUEBLES" maxlength="100">
                    </div>
                    <div class="col-md-4">
                        Inversión y monto aproximado
                        <input type="text" class="form-control" id="INVERSIONES" name="INVERSIONES" maxlength="100">
                    </div>
                </div>  
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Vehículo y costo aproximado
                        <input type="text" class="form-control" id="NUMERO_AUTOS" name="NUMERO_AUTOS" maxlength="100">
                        <!-- ¿? -->
                    </div>
                    <div class="col-md-4">
                        Calidad de vida
                        <input type="text" class="form-control" id="CALIDAD_VIDA" name="CALIDAD_VIDA" maxlength="50">
                    </div>
                    <div class="col-md-4">
                        Vicios
                        <input type="text" class="form-control" id="VICIOS" name="VICIOS" maxlength="100">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4" >
                        Imágen pública
                        <input type="text" class="form-control" id="IMAGEN_PUBLICA" name="IMAGEN_PUBLICA" maxlength="50">
                    </div>
                    <div class="col-md-4">
                        Comportamiento social
                        <input type="text" class="form-control" id="COMPORTA_SOCIAL" name="COMPORTA_SOCIAL" maxlength="50">
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
                        <span class="clr">*</span>Nombre
                        <input type="text" class="form-control" id="NOMBRE_SOCIOECONOMICOS" name="NOMBRE_SOCIOECONOMICOS" maxlength="40" required>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Apellido paterno
                        <input type="text" class="form-control" id="PATERNO_SOCIOECONOMICOS" name="PATERNO_SOCIOECONOMICOS" maxlength="40" required>
                    </div>
                    <div class="col-md-4">
                        Apellido materno
                        <input type="text" class="form-control" id="MATERNO_SOCIOECONOMICOS" name="MATERNO_SOCIOECONOMICOS" maxlength="40">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>Sexo <!-- Se llena del catálogo CAT_SEXO -->
                        <select  class="form-control" id="SEXO_SOCIOECONOMICOS" name="SEXO_SOCIOECONOMICOS" data-error="#err_SEXO" data-query='cmw2WmwzeW03a1lsakNJd1dEWWt0WmRmOU95OFFzS0ZESENTMmpyYkNySis1VlhVOFEza205bHF1Z0trTWVLVW4zV081M284cjNPc0pObExOZ2dKcGhnTE9KZU83SlM0bkZIaWhBdm4rV2ZjOGRZRmpnMkI3N1ZaZWVoZnk4R0g=' required></select>
                        <span id="err_SEXO"></span>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Fecha de nacimiento
                        <input type="date" class="form-control" id="FECHA_NAC_SOCIOECONOMICOS" name="FECHA_NAC_SOCIOECONOMICOS" required>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Parentesco <!-- Se llena del catálogo CAT_RELACION -->
                        <select  class="form-control" id="ID_RELACION" data-error="#err_ID_RELACION" data-query='NXMrSFhUSXFSNWxoNmJ4Ri9TTUNjRGROSzBpY01FSmxaSndnN3ZXdHlKU2hFWjRUZGF4M0JkSGUzMHE2Z0dFT1k0T3I2UmsveUU0L2JpUjJRL3Q3YjA5ZXBUZkVXNFFiaFIxYXdOTnNkQXg0RTNySEpseDJUam1wSWRnWjNvZ3c=' required></select>
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









