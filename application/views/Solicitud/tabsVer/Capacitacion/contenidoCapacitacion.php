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
                <!-- <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom">Idioma y/o dialecto</h6>
                        <p id='pIDIOMA'></p>
                    </div>
                    <div class="col-md-2">
                        <h6 class="borderButtom">Lectura</h6>
                        <span id='pPORCENTAJE_LECTURA'></span> %
                        
                    </div>
                    <div class="col-md-2">
                        <h6 class="borderButtom">Escritura</h6>
                        <span id='pPORCENTAJE_ESCRITURA'></span> %
                    </div>
                    <div class="col-md-2">
                        <h6 class="borderButtom">Conversación</h6>
                        <span id='pPORCENTAJE_CONVERSACION'></span> %                        
                    </div>
                </div> -->

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
                <!-- <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom">Tipo de habilidad y/o aptitud</h6>
                        <p id='pTIPO_HABAILIDAD'></p>
                    </div>
                    <div class="col-md-4">
                         <h6 class="borderButtom">Descripción</h6>
                        <p id='pDESCRIPCION'></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">Grado de aptitud o dominio </h6>
                        <p id='pGRADO_APTITUD'></p>
                    </div>
                </div> -->

                <table id="tableHabilidades" class="table display table-striped dt-responsive" style="width:100%">
                    <thead>
                        <th>Id habilidad y/o aptitud</th>
                        <th>Tipo de habilidad y/o aptitud</th>
                        <th>Grado</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                
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