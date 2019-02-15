

    <div class="tab-pane fade show active" id="Datos_personales" role="tab-panel" aria-labelledby="Datos_personales-tab">
        <div class="container">
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
                        Tipo de movimiento
                        <select  class="form-control" name="" id=""></select>
                    </div>
                </div>
                <br>
                <div class="row">
                <div class="col-md-4">
                        <span class="clr">*</span>Nombre
                        <input type="text" id="pNOMBRE_DATOS_PERSONALES" name="pNOMBRE_DATOS_PERSONALES" class="form-control consultaCURP" maxlength="40" required>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Apellido paterno
                        <input type="text" id="pPATERNO" name="pPATERNO" class="form-control consultaCURP" maxlength="40" required>
                    </div>
                    <div class="col-md-4">
                        Apellido materno
                        <input type="text" id="pMATERNO" name="pMATERNO" class="form-control consultaCURP" maxlength="40" >
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>Sexo
                        <select  class="form-control consultaCURP" id="pSEXO_DATOS_PERSONALES" name="pSEXO_DATOS_PERSONALES" required></select>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Fecha de nacimiento
                        <input type="date"  id="pFECHA_NAC_DATOS_PERSONALES" name="pFECHA_NAC_DATOS_PERSONALES" class="form-control consultaCURP" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>País de nacimiento
                        <select  class="form-control" id="pID_PAIS_NAC" name="pID_PAIS_NAC" required><option value="">Seleccione</option></select>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Estado de nacimiento
                        <select  class="form-control" id="pID_ENTIDAD_NAC" name="pID_ENTIDAD_NAC" required></select>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Municipio de nacimiento
                        <select  class="form-control" id="pID_MUNICIPIO_NAC" name="pID_MUNICIPIO_NAC" required></select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Ciudad o población de nacimiento
                        <select  class="form-control" id="pCIUDAD_NAC" name="pCIUDAD_NAC"></select>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Nacionalidad
                        <select  class="form-control" id="pID_NACIONALIDAD" name="pID_NACIONALIDAD" required></select>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Modo de nacionalidad
                        <select  class="form-control" id="pMODO_NACIONALIDAD" name="pMODO_NACIONALIDAD" required></select>
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
                        <span class="clr">*</span>Estado civil
                        <select  class="form-control" id="pID_ESTADO_CIVIL" name="pID_ESTADO_CIVIL" required><option value="">Seleccione</option></select>
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
                        <button class="btn btn-default" id="GUARDAR_CIB" name   GUARDAR_CIB style="margin-top: 16px;"> Guardar CIB</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default" id="guardarDatosPersonales"> Guardar datos personales</button>
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
            </form>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <center><button class="btn btn-default"  id="siguienteDatosPersonales">Siguiente</button></center>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
    
    <div class="tab-pane fade" id="Desarrollo" role="tabpanel" aria-labelledby="Desarrollo-tab">
        <div class="container">
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
                        <span class="clr">*</span>Máxima escolaridad
                        <select  class="form-control" id="pID_GRADO_ESCOLAR" name="pID_GRADO_ESCOLAR" required></select>
                    </div>
                    <div class="col-md-4">
                        Escuela
                        <input type="text" class="form-control" id="pNOMBRE_ESCUELA" name="pNOMBRE_ESCUELA" maxlength="100">
                    </div>
                    <div class="col-md-4">
                        Especialidad o estudio
                        <input type="text" class="form-control" id="pESPECIALIDAD" name="pESPECIALIDAD" maxlength="100">
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
            </form>
            <br>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-default" id="anteriorDesarrolloacademico"> Anterior</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default" id="siguienteDesarrolloacademico">Siguiente</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="Domicilio" role="tabpanel" aria-labelledby="Domicilio-tab">
        <div class="container">
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
                        <input type="text" class="form-control" id="pCODIGO_POSTAL" name="pCODIGO_POSTAL" maxlength="10" required>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Estado
                        <select  class="form-control" id="pID_ENTIDAD" name="pID_ENTIDAD" required></select>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Municipio
                        <select  class="form-control" id="pID_MUNICIPIO" name="pID_MUNICIPIO" required></select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Ciudad
                        <input type="text" class="form-control" id="pCOLONIA" name="pCOLONIA" maxlength="50"> 
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Colonia/Localidad
                        <input type="text" class="form-control" id="pCIUDAD" name="pCIUDAD" maxlength="60" required>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Calle
                        <input type="text" class="form-control" id="pCALLE" name="pCALLE" maxlength="60" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>Número exterior
                        <input type="text" class="form-control" id="pNUM_EXTERIOR" name="pNUM_EXTERIOR" maxlength="30" minlength="5" required>
                    </div>
                    <div class="col-md-4">
                        Número interior
                        <input type="text" class="form-control" id="pNUM_INTERIOR" name="pNUM_INTERIOR" maxlength="30" minlength="4">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>Entre la calle de
                        <input type="text" class="form-control" id="pENTRE_CALLE" name="pENTRE_CALLE" maxlength="60" required>
                    </div>
                    <div class="col-md-4">
                        Y la calle de
                        <input type="text" class="form-control" id="pY_CALLE" name="pY_CALLE" maxlength="45">
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Número telefónico
                        <input type="text" class="form-control" id="pTELEFONO" name="pTELEFONO" maxlength="13" minlength="10" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>RFC
                        <input type="text" class="form-control" id="pRFC" name="pRFC" maxlength="13" minlength="10" required>
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
            </form>
            <br>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-default" id="anteriorDomicilio"> Anterior</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default" id="siguienteDomicilio">Siguiente</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div> 

    <div class="tab-pane fade" id="Referencias" role="tabpanel" aria-labelledby="Referencias-tab">
        <div class="container">
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
                        <span class="clr">*</span>Sexo
                        <select name="SEXO_REFERENCIAS" id="SEXO_REFERENCIAS" class="form-control" required></select>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Ocupación
                        <select name="OCUPACION" id="OCUPACION" class="form-control" required></select>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Tipo de referencia
                        <select name="" id="ID_TIPO_REFERENCIA" name="ID_TIPO_REFERENCIA" class="form-control" required></select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Relación o parentesco
                        <select name="ID_RELACION" id="ID_RELACION" class="form-control"></select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Código postal
                        <input type="text" id="CODIGO_POSTAL_REFERENCIAS" name="CODIGO_POSTAL_REFERENCIAS" class="form-control" maxlength="10">
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Estado
                        <select name="ID_ENTIDAD_REFERENCIAS" id="ID_ENTIDAD_REFERENCIAS"  class="form-control" required></select>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Municipio
                        <select name="ID_MUNICIPIO_REFERENCIAS" id="ID_MUNICIPIO_REFERENCIAS" class="form-control" required></select>
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
            </form>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-default" id="anteriorReferencia"> Anterior</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default" id="siguienteReferencia ">Siguiente</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div> 

    <div class="tab-pane fade" id="Socioeconomicos" role="tabpanel" arialabelledby="Socioeconomicos-tab" >
        <div class="container">
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
                        ¿Vive con su familia?
                        <select  class="form-control" id="VIVE_FAMILIA" name="VIVE_FAMILIA"></select>
                    </div>
                    <div class="col-md-4">
                        Ingreso familiar adicional (mensual)
                        <input type="text" class="form-control" id="INGRESO_FAMILIAR" name="INGRESO_FAMILIAR" maxlength="10.2">
                    </div>
                    <div class="col-md-4">
                        Su domicilio es
                        <select name="ID_TIPO_DOMICILIO" id="ID_TIPO_DOMICILIO" class="form-control">
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
                        <input type="text" class="form-control" id="INMUEBLES_SOCIOECONOMICO" name="INMUEBLES_SOCIOECONOMICO" maxlength="100">
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
                        <input type="text" class="form-control" id="VICIOS_SOCIOECONOMICO" name="VICIOS_SOCIOECONOMICO" maxlength="100">
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
                        <input type="text" class="form-control" id="NOMBRE_SOCIOECONOMICO_DEPENDIENTES_ECONOMICOS" name="NOMBRE_SOCIOECONOMICO_DEPENDIENTES_ECONOMICOS" maxlength="40" required>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Apellido paterno
                        <input type="text" class="form-control" id="PATERNO_SOCIOECONOMICO_DEPENDIENTES_ECONOMICOS" name="PATERNO_SOCIOECONOMICO_DEPENDIENTES_ECONOMICOS" maxlength="40" required>
                    </div>
                    <div class="col-md-4">
                        Apellido materno
                        <input type="text" class="form-control" id="MATERNO_SOCIOECONOMICO_DEPENDIENTES_ECONOMICOS" name="MATERNO_SOCIOECONOMICO_DEPENDIENTES_ECONOMICOS" maxlength="40">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>Sexo
                        <select  class="form-control" id="SEXO_SOCIOECONOMICO_DEPENDIENTES_ECONOMICOS" name="SEXO_SOCIOECONOMICO_DEPENDIENTES_ECONOMICOS" required></select>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Fecha de nacimiento
                        <input type="date" class="form-control" id="FECHA_NAC_SOCIOECONOMICO_DEPENDIENTES_ECONOMICOS" name="FECHA_NAC_SOCIOECONOMICO_DEPENDIENTES_ECONOMICOS" required>
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Parentesco
                        <select  class="form-control" id="pPARENTESCO_SOCIOECONOMICO_DEPENDIENTES_ECONOMICOS" name="pPARENTESCO_SOCIOECONOMICO_DEPENDIENTES_ECONOMICOS" required></select>
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
            </form>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-default" id="anteriorSocioeconomico"> Anterior</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default" id="finalizarDatosGenerales">Finalizar</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>









