     <div class="tab-pane fade show active" id="Idiomas_dialectos" role="tabpanel" aria-labelledby="Idiomas_dialectos-tab">
        <div class="_container">
            <form action="#" name="Idiomas_dialectos_form" id="Idiomas_dialectos_form" autocomplete="off" data-requireddata=false>
                 <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="titulo">Idiomas y/o dialectos</h3>
                    </div>
                </div>
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
                        <button class="btn btn-default btnGuardarSection" id="guardarIdioma">Guardar idioma y/o dialecto</button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">

                    </div>
                </div>
                <input type="hidden" id="pID_ALTERNA_Idioma" name="pID_ALTERNA_Idioma" value="" >
                <input type="hidden" id="pID_ESTADO_EMISOR_Idioma" name="pID_ESTADO_EMISOR_Idioma" value="" >
                <input type="hidden" id="pID_EMISOR_Idioma" name="pID_EMISOR_Idioma" value="" >
                <input type="hidden" id="pID_IDIOMA_HABLADO_EXT" name="pID_IDIOMA_HABLADO_EXT" value="" >
            </form>
            <br>
            <hr>
            <br>
            <table id="tableIdiomas" class="table display table-striped dt-responsive" style="width:100%">
                <thead>
                    <th>Id idioma y/o dialecto</th>
                    <th>Idioma</th>
                    <th>Porcentaje de lectura</th>
                    <th>Porcentaje de escritura</th>
                    <th>Porcentaje de conversación</th>
                </thead>
                <tbody>                        
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn btn-secondary btn-lg btnSiguienteAnterior siguienteTab" id="siguienteIdioma" data-nexttab="#Habilidades_aptitudes-tab">Siguiente Ficha</button>
                </div>
            </div>
        </div>
    </div>

     <div class="tab-pane fade" id="Habilidades_aptitudes" role="tabpanel" aria-labelledby="Habilidades_aptitudes-tab">
        <div class="_container">
            <form action="#" id="Habilidades_aptitudes_form" name="Habilidades_aptitudes_form" autocomplete="off" data-requireddata=false>
                <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="titulo">Habilidades y/o actitudes</h3>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span class="clr">*</span>Tipo de habilidad y/o aptitud<!-- Se llena con el catalogo "CAT_TIPO_APTITUD" -->
                        <select  class="form-control" id="pID_TIPO_APTITUD" name="pID_TIPO_APTITUD" data-error="#err_pID_TIPO_APTITUD" data-query='VXRtRTZNWVIrVUphUzQ4MFNkQzZRcytBbFZDMzQ3c01vR21jTXIyNmZPT2FPdnRua2N3MlRYT0ZKczc5SFRSN00vQjBML2l3dXJwVVliTG5paHNzQ3ZKR0hvaHRKUUdSSW9xdzI4TUpLL2VmTVNObVRzaFpVSHBpZnJuTWtrODdCcG8wc0VOSlZXUTJUNkIwSEVRM2JSQnFzaitKUFJwUDdCTXZqNXFsOHJzPQ==' required></select>
                        <span id="err_pID_TIPO_APTITUD"></span>
                    </div>
                    <div class="col-md-4">
                        Descripción
                        <input type="text" class="form-control" id="pESPECIFIQUE" name="pESPECIFIQUE" minlength="0" maxlength="100">
                    </div>
                    <div class="col-md-4">
                        <span class="clr">*</span>Grado de aptitud o dominio <!-- Se rellena con el catalogo "CAT_GRADO_APTITUD_HAB" depende del select "TIPO_ACTITUD" -->
                        <select  class="form-control" id="pID_GRADO_APT_HAB" name="pID_GRADO_APT_HAB" data-error="#err_pID_GRADO_APT_HAB" data-query='Qks2NHVpUW94OUlNMmxDU3ZpcXdsYUFXKzZtUm13a1l0enMxY0dsY2c1Q2I1VndmSlA4N3kxRmlFMjlldkt0UkpOcy9xS253Z1JaWUx3N3FiTE5rR0hGbGRUZzgzV0RxMlRHa1U5MDFST1VXUFpyQjliSTRqRkZKSzhmUFBvK3V1cFhjUnZXY0F1MEV6dHlvQUlEZnE1cnNxeSs2VTBKWEVZdWp1TFBqTFdnPQ==' required></select>
                        <span id="err_pID_GRADO_APT_HAB"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default btnGuardarSection" id="guardarHabilidad">Guardar habilidad y/o aptitud</button>
                    </div>
                    <div class="col-md-4"></div>
                    <?php if (verificaTipoUsuarioSesion() == 2 || verificaTipoUsuarioSesion() == 3) { // usuarios administrador de dependnecias y usuarios de dependencias?>
                    <div class="col-md-4 text-right">
                        <button class="btn btn-default btnGuardarSection" id="solicitudCompleta">Solicitud completa</button>
                    </div>
                    <?php } ?>
                </div>
                <input type="hidden" id="pID_ALTERNA_Habilidades" name="pID_ALTERNA_Habilidades" value="">
                <input type="hidden" id="pID_ESTADO_EMISOR_Habilidades" name="pID_ESTADO_EMISOR_Habilidades" value="">
                <input type="hidden" id="pID_EMISOR_Habilidades" name="pID_EMISOR_Habilidades" value="">
                <input type="hidden" id="pID_HABILIDAD_APTIT_EXT" name="pID_HABILIDAD_APTIT_EXT" value="">
            </form>
            <br>
            <hr>
            <br>
            <table id="tableHabilidades" class="table display table-striped dt-responsive" style="width:100%">
                <thead>
                    <th>Id habilidad y/o aptitud</th>
                    <th>Tipo de habilidad y/o aptitud</th>
                    <th>Grado</th>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="row">                    
                <div class="col-md-12 text-center">
                    <button class="btn btn-secondary btn-lg btnSiguienteAnterior anteriorTab" id="anteriorHabilidad" data-nexttab="#Idiomas_dialectos-tab">Anterior Ficha</button>
                    <button class="btn btn-secondary btn-lg btnSiguienteAnterior siguienteTab endTab" id="SiguienteHabilidad">Finalizar</button>
                </div>                            
            </div>
        </div>
    </div>