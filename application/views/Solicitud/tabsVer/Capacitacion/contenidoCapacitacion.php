    <div class="tab-pane fade show active" id="Idiomas_dialectos" role="tabpanel" aria-labelledby="Idiomas_dialectos-tab">
        <div class="_container">
            <form action="#" name="Idiomas_dialectos_form" id="Idiomas_dialectos_form" autocomplete="off">
                 <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="titulo">Idiomas y/o dialectos</h3>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom">Idioma y/o dialecto</h6>  <!-- Se llena del catalogo "CAT_IDIOMA" -->
                        <p id=''></p>
                    </div>
                    <div class="col-md-2">
                        <h6 class="borderButtom">Lectura</h6>
                        <div class="row">
                            <div class="col-md-10">
                                <p id=''></p>
                            </div>
                            <div class="col-md-1" style="margin-left: -12px;margin-top: 7px;" >%</div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h6 class="borderButtom">Escritura</h6>
                        <div class="row">
                            <div class="col-md-10">
                                <p id=''></p>
                            </div>
                            <div class="col-md-1" style="margin-left: -12px;margin-top: 7px;" >%</div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h6 class="borderButtom">Conversación</h6>
                        <div class="row">
                            <div class="col-md-10">
                                <p id=''></p>
                            </div>
                            <div class="col-md-1" style="margin-left: -12px;margin-top: 7px;" >%</div>
                        </div>
                    </div>
                </div>
            </form>
            <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn btn-secondary btn-lg btnSiguienteAnterior siguienteTab" id="siguienteIdioma" data-nexttab="#Habilidades_aptitudes-tab">Siguiente Ficha</button>
                </div>
            </div>
        </div>
    </div>

     <div class="tab-pane fade" id="Habilidades_aptitudes" role="tabpanel" aria-labelledby="Habilidades_aptitudes-tab">
        <div class="_container">
            <form action="#" id="Habilidades_aptitudes_form" name="Habilidades_aptitudes_form"autocomplete="off">
                 <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="titulo">Habilidades y/o actitudes</h3>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom">Tipo de habilidad y/o aptitud</h6><!-- Se llena con el catalogo "CAT_TIPO_APTITUD" -->
                        <p id=''></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButtom">Descripción</h6>
                        <p id=''></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Grado de aptitud o dominio </h6><!-- Se rellena con el catalogo "CAT_GRADO_APTITUD_HAB" depende del select "TIPO_ACTITUD" -->
                        <p id=''></p>
                    </div>
                </div>
            </form>
            <br>
            <div class="row">                    
                <div class="col-md-12 text-center">
                    <button class="btn btn-secondary btn-lg btnSiguienteAnterior anteriorTab" id="anteriorHabilidad" data-nexttab="#Idiomas_dialectos-tab">Anterior Ficha</button>
                    <button class="btn btn-secondary btn-lg btnSiguienteAnterior siguienteTab endTab" id="SiguienteHabilidad">Siguiente Ficha</button>
                </div>                            
            </div>
        </div>
    </div>