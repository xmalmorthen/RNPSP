    <div class="tab-pane fade show active" id="Idiomas_dialectos" role="tabpanel" aria-labelledby="Idiomas_dialectos-tab">
        <div class="_container">
            <form action="#" name="Idiomas_dialectos_form" id="Idiomas_dialectos_form" autocomplete="off">
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
                         <h6 class="borderButtom"><span class="clr">*</span>Idioma y/o dialecto</h6>  <!-- Se llena del catalogo "CAT_IDIOMA" -->
                        <p></p>
                        <span id="err_pID_IDIOMA"></span>
                    </div>
                    <div class="col-md-2">
                         <h6 class="borderButtom">Lectura</h6>
                        <div class="row">
                            <div class="col-md-10">
                                <p></p>
                            </div>
                            <div class="col-md-1" style="margin-left: -12px;margin-top: 7px;" >%</div>
                        </div>
                    </div>
                    <div class="col-md-2">
                         <h6 class="borderButtom">Escritura</h6>
                        <div class="row">
                            <div class="col-md-10">
                                <p></p>
                            </div>
                            <div class="col-md-1" style="margin-left: -12px;margin-top: 7px;" >%</div>
                        </div>
                    </div>
                    <div class="col-md-2">
                         <h6 class="borderButtom">Conversación</h6>
                        <div class="row">
                            <div class="col-md-10">
                                <p></p>
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
                         <h6 class="borderButtom"><span class="clr">*</span>Tipo de habilidad y/o aptitud</h6><!-- Se llena con el catalogo "CAT_TIPO_APTITUD" -->
                        <p></p>
                        <span id="err_ID_TIPO_APTITUD"></span>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButtom">Descripción</h6>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButtom"><span class="clr">*</span>Grado de aptitud o dominio </h6><!-- Se rellena con el catalogo "CAT_GRADO_APTITUD_HAB" depende del select "TIPO_ACTITUD" -->
                        <p></p>
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