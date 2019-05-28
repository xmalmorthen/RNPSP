<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">

<div class="">
    <br>
    <div class="row">
        <div class="col-md-4">
            <h6 class="borderButtom">CURP</h6>                
            <p><?php echo $pCURP; ?></p>
        </div>
        <div class="col-md-4">
            <h6 class="borderButtom">CUIP</h6>                
            <p><?php echo $pCUIP; ?></p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <h6 class="borderButtom">Nombre</h6>
            <p><?php echo $pNOMBRE; ?></p>
        </div>
        <div class="col-md-4">
            <h6 class="borderButtom">Apellido paterno</h6>
            <p><?php echo $pPATERNO; ?></p>
        </div>
        <div class="col-md-4">
            <h6 class="borderButtom">Apellido materno</h6>
            <p><?php echo $pMATERNO; ?></p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <h6 class="borderButtom">Fecha de nacimiento</h6>
            <p><?php echo $pFECHA_NAC; ?></p>
        </div>
        <div class="col-md-4">
            <h6 class="borderButtom">RFC</h6>
            <p><?php echo $pRFC; ?></p>
        </div>
    </div>
    <hr/>
    <form id="Validar_examen_form" name="Validar_examen_form" action="#">
        <input type="hidden" name="pID_ALTERNA" value='<?php echo $pID_ALTERNA; ?>'>
        <input type="hidden" name="pID_DEPENDENCIA" value='<?php echo $pID_DEPENDENCIA; ?>'>
        <div class="row">   
            <div class="col-md-4">
                Lugar de aplicación
                <input type="text" class="form-control" name="pLUGAR" id="pLUGAR" maxlength="250" required>
            </div>
            <div class="col-md-4">
                Hora
                <input type="time" class="form-control" name="pHORA_EXAMEN" id="pHORA_EXAMEN" required>
            </div>
            <div class="col-md-4">
                Fecha de aplicación 
                <input type="date" class="form-control" name="pFECHA_APLICACION" id="pFECHA_APLICACION" required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                Estatus
                <select style="width:356px;" class="form-control" id="pESTATUS_EXAMEN" name="pESTATUS_EXAMEN" data-error="#err_pESTATUS_EXAMEN" data-query='' required>
                    <option disabled selected value>Seleccione una opción</option>
                    <option value="1">Aprobado</option>
                    <option value="0">No aprobado</option>
                    <option value="-1">Sin examen</option>
                </select>
                <span id="err_pESTATUS_EXAMEN"></span>
            </div>
            <div class="col-md-4">
                Fecha del examen
                <input type="date" class="form-control" id="pFECHA_EXAMEN" name="pFECHA_EXAMEN" required>
            </div>
            <div class="col-md-4">
                Vigencia
                <select style="width:356px;" class="form-control" id="pVIGENCIA_EXAMEN" name="pVIGENCIA_EXAMEN" data-error="#err_pVIGENCIA_EXAMEN" data-query='' required>
                    <option disabled selected value>Seleccione una opción</option>
                    <option value="1">Vigente</option>
                    <option value="2">No vigente</option>
                </select>
                <span id="err_pVIGENCIA_EXAMEN"></span>
            </div>
        </div>
        <br>
        <a class="btn btn-light mr-3" role="button" href="<?php echo site_url('Examen'); ?>">Regresar</a>
        <button class="btn btn-light" id='guardar'>Guardar</button>
    </form>
</div>

<script src="<?php echo base_url('assets/vendor/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/dom.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/alerts.js') ?>"></script>

<script src="<?php echo base_url('assets/js/views/examen/formularioExamen.js') ?>"></script>

<!-- JS -->
<script type="text/javascript">
    objViewFormularioExamen.init();
</script>
<!-- /JS -->
