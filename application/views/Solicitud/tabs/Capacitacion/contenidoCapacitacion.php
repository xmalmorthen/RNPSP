     <div class="tab-pane fade" id="Idiomas_dialectos" role="tabpanel" aria-labelledby="Idiomas_dialectos-tab">
        <div class="_container">
            <form action="#" name="Idiomas_dialectos_form" id="Idiomas_dialectos_form"autocomplete="off">
                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <center><strong class="titulo">Idiomas y/o dialectos</strong></center>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>Idioma y/o dialecto  <!-- Se llena del catalogo "CAT_IDIOMA" -->
                        <select  class="form-control" id="pID_IDIOMA" name="pID_IDIOMA" data-error="#err_pID_IDIOMA" data-query='aG50TjNGbGpMZDNwM1lqVnlmQVBwaWRodzFUL0ZJSy9HNERwYk5nSXorekhySlNyOFZpWnNqUHZvQjY1MGhXeitYVUcxV0kzUGtHRHlFV3gxNkZhS2llRVQzWUt6Z0lsTGJDVlRLT2lvM2NSelNmRGVXR2ZlSExzaGJjUHpqOTA=' required></select>
                        <span id="err_pID_IDIOMA"></span>
                    </div>
                    <div class="col-md-2">
                        Lectura
                        <div class="row">
                            <div class="col-md-10">
                                <Input type="text" class="form-control" class="form-control" id="pGRADO_LECTURA" name="pGRADO_LECTURA" minlength="1" maxlength="10">
                            </div>
                            <div class="col-md-1" style="margin-left: -12px;margin-top: 7px;" >%</div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        Escritura
                        <div class="row">
                            <div class="col-md-10">
                                <Input type="text" class="form-control" class="form-control" id="pGRADO_ESCRITURA" name="pGRADO_ESCRITURA" minlength="1" maxlength="10">
                            </div>
                            <div class="col-md-1" style="margin-left: -12px;margin-top: 7px;" >%</div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        Conversación
                        <div class="row">
                            <div class="col-md-10">
                                <Input type="text" class="form-control" class="form-control" id="pGRADO_CONVERSACION" name="pGRADO_CONVERSACION" minlength="1" maxlength="10">
                            </div>
                            <div class="col-md-1" style="margin-left: -12px;margin-top: 7px;" >%</div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default" id="guardarIdioma">Guardar idioma y/o dialecto</button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">

                    </div>
                </div>
                <br>
                <hr>
                <br>
                <table id="tableIdiomas" class="table display">
                    <thead>
                        <th>Id idioma y/o dialecto</th>
                        <th>Idioma</th>
                        <th>Porcentaje de lectura</th>
                        <th>Porcentaje de escritura</th>
                        <th>Porcentaje de conversación</th>
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
                <input type="hidden" id="pID_ALTERNA_Idioma" name="pID_ALTERNA_Idioma" value="" >
                <input type="hidden" id="pID_ESTADO_EMISOR_Idioma" name="pID_ESTADO_EMISOR_Idioma" value="" >
                <input type="hidden" id="pID_EMISOR_Idioma" name="pID_EMISOR_Idioma" value="" >
                <input type="hidden" id="pID_IDIOMA_HABLADO_EXT" name="pID_IDIOMA_HABLADO_EXT" value="" >
            </form>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-default btnSiguienteAnterior anteriorTab" id="anteriorIdioma"> Anterior</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default btnSiguienteAnterior siguienteTab" id="siguienteIdioma">Siguiente</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-4"></div>

            </div>
        </div>
    </div>

     <div class="tab-pane fade" id="Habilidades_aptitudes" role="tabpanel" aria-labelledby="Habilidades_aptitudes-tab">
        <div class="_container">
            <form action="#" id="Habilidades_aptitudes_form" name="Habilidades_aptitudes_form"autocomplete="off">
                <br>
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <center><strong class="titulo">Habilidades y/o aptitudes</strong></center>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>Tipo de habilidad y/o aptitud<!-- Se llena con el catalogo "CAT_TIPO_APTITUD" -->
                        <select  class="form-control" id="ID_TIPO_APTITUD" name="ID_TIPO_APTITUD" data-error="#err_ID_TIPO_APTITUD" data-query='VXRtRTZNWVIrVUphUzQ4MFNkQzZRcytBbFZDMzQ3c01vR21jTXIyNmZPT2FPdnRua2N3MlRYT0ZKczc5SFRSN00vQjBML2l3dXJwVVliTG5paHNzQ3ZKR0hvaHRKUUdSSW9xdzI4TUpLL2VmTVNObVRzaFpVSHBpZnJuTWtrODdCcG8wc0VOSlZXUTJUNkIwSEVRM2JSQnFzaitKUFJwUDdCTXZqNXFsOHJzPQ==' required></select>
                        <span id="err_ID_TIPO_APTITUD"></span>
                    </div>
                    <div class="col-md-4">
                        Descripción
                        <input type="text" class="form-control" id="ESPECIFIQUE" name="ESPECIFIQUE" minlength="0" maxlength="100">
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Grado de aptitud o dominio <!-- Se rellena con el catalogo "CAT_GRADO_APTITUD_HAB" depende del select "TIPO_ACTITUD" -->
                        <select  class="form-control" id="ID_GRADO_APT_HAB" name="ID_GRADO_APT_HAB" data-error="#err_ID_GRADO_APT_HAB" data-query='Qks2NHVpUW94OUlNMmxDU3ZpcXdsYUFXKzZtUm13a1l0enMxY0dsY2c1Q2I1VndmSlA4N3kxRmlFMjlldkt0UkpOcy9xS253Z1JaWUx3N3FiTE5rR0hGbGRUZzgzV0RxMlRHa1U5MDFST1VXUFpyQjliSTRqRkZKSzhmUFBvK3V1cFhjUnZXY0F1MEV6dHlvQUlEZnE1cnNxeSs2VTBKWEVZdWp1TFBqTFdnPQ==' required></select>
                        <span id="err_ID_GRADO_APT_HAB"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default" id="guardarHabilidad">Guardar habilidad y/o aptitud</button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">

                    </div>
                </div>
                <br>
                <hr>
                <br>
                <table id="tableHabilidades" class="table display">
                    <thead>
                        <th>Id habilidad y/o aptitud</th>
                        <th>Tipo de habilidad y/o aptitud</th>
                        <th>Grado</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    </tbody>
                </table>
                <input type="hidden" id="pID_ALTERNA_Habilidades" name="pID_ALTERNA_Habilidades" value="">
                <input type="hidden" id="pID_ESTADO_EMISOR_Habilidades" name="pID_ESTADO_EMISOR_Habilidades" value="">
                <input type="hidden" id="pID_EMISOR_Habilidades" name="pID_EMISOR_Habilidades" value="">
                <input type="hidden" id="pID_HABILIDAD_APTIT_EXT" name="pID_HABILIDAD_APTIT_EXT" value="">
            </form>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-default btnSiguienteAnterior anteriorTab" id="anteriorHabilidad" data-nexttab="#Idiomas_dialectos-tab"> Anterior</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default btnSiguienteAnterior siguienteTab" id="SiguienteHabilidad">Siguiente</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-4"></div>

            </div>
        </div>
    </div>