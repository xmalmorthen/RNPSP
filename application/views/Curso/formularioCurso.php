<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">

<div class="">
    <br>
    <h2 class='text-center'>Datos personales</h2>
    <br>
    <div class="row">
        <div class="col-md-4">
            <h6 class="borderButtom">CURP</h6>                
            <p id='pCURP'></p>
        </div>
        <div class="col-md-4">
            <h6 class="borderButtom">Fecha de nacimiento</h6>
            <p id='pFECHA_NAC'></p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <h6 class="borderButtom">Nombre</h6>
            <p id='pNOMBRE'></p>
        </div>
        <div class="col-md-4">
            <h6 class="borderButtom">Apellido paterno</h6>
            <p id='pPATERNO'></p>
        </div>
        <div class="col-md-4">
            <h6 class="borderButtom">Apellido materno</h6>
            <p id='pMATERNO'></p>
        </div>
    </div>    
    <hr/>
    <h2 class='text-center'>Datos del curso</h2>
    <br>
    <form id="Validar_examen_form" name="Validar_examen_form" action="#">
        <input type="hidden" name="pID_ALTERNA" value=''>
        <input type="hidden" name="pID_DEPENDENCIA" value=''>

        <div class="row">   
            <div class="col-md-3">
                Tipo de curso
                <select name="pTIPO_CURSO" id="pTIPO_CURSO"  class="form-control" data-error="#err_pTIPO_CURSO" data-query='NUMzcXVkTGtuK3hmbEZqcm52TVVCb2FETW5IajVDSXBjcUNkOFBBZ2FaUDM5dVRDNHQyRVZNU25CRHNJUUJ2Wnc5Q281aWtINnVEcFI5aXB3ajdFZUl0b01qOGYxM25LUjRqc2VaaGJwcHpKRGUrZDF2ZFJucmJEOEtoNjJ5SGRFWDRyVVRBQ24rdG9HQWhHbFFJbmwwSlhwcWNNa2ptemlzclgrbTlzd21jPQ==' disabled required></select>
                <span id="err_pTIPO_CURSO"></span>
            </div>
            <div class="col-md-3">
                Curso
                <select name="pID_CURSO" id="pID_CURSO"  class="form-control" data-error="#err_pID_CURSO" data-query='UlIyVzIvZ0JnWkZWaEgvOW9NME9rd2puR0pGWnR6VVc1cXJMSTk0eldMN1pxNHpiNHlOdVNRcHl4dkpLcjB0emMrMjg2WnMzU1FKdkNEWS9TbXdJZndsZTh6UDMyVUtWUUEzRVhkZEtRUUZWdS9FSTdSYVhRSkNPamRPNzFKLzExdDJMbmNkaFMvRmZMRUNqRU5qWlQ1Kzl2NjRickxNSWZmd0FWSi8rZGh3PQ==' data-cascade='true' data-force-refresh='true' disabled required></select>
                <span id="err_pID_CURSO"></span>
            </div>
            <div class="col-md-3">
                Fecha de inicio
                <input type="date" class="form-control" name="pFECHA_INICIO" id="pFECHA_INICIO" required>
            </div>
            <div class="col-md-3">
                Fecha de fin
                <input type="date" class="form-control pFECHA_FIN" name="pFECHA_FIN" id="pFECHA_FIN" required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                Vigencia
                <input type="date" class="form-control pVIGENCIA" name="pVIGENCIA" id="pVIGENCIA" required>
                <!-- <select style="width:356px;" class="form-control" id="pVIGENCIA" name="pVIGENCIA" data-error="#err_pVIGENCIA" data-query='' required>
                    <option disabled selected value>Seleccione una opción</option>
                    <option value="1">Vigente</option>
                    <option value="2">No vigente</option>
                </select>
                <span id="err_pVIGENCIA"></span> -->
            </div>
            <div class="col-md-3">
                Estatus
                <select style="width:356px;" class="form-control" id="pESTATUS_CURSO" name="pESTATUS_CURSO" data-error="#err_pESTATUS_CURSO" data-query='' required>
                    <option disabled selected value>Seleccione una opción</option>
                    <option value="01">En curso</option>
                    <option value="02">Aprobado</option>
                    <option value="03">No aprobado</option>
                    <option value="04">Sin curso</option>
                </select>
                <span id="err_pESTATUS_CURSO"></span>
            </div>            
        </div>
        <br>
        <button class="btn btn-light" id='guardar'>Guardar</button>
        <a class="btn btn-light mr-3" role="button" href="<?php echo site_url('curso'); ?>">Cancelar</a>
    </form>
</div>

<script src="<?php echo base_url('assets/vendor/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/dom.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/catalogs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/alerts.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/curso/formularioCurso.js') ?>"></script>

<!-- JS -->
<script type="text/javascript">
    objViewFormularioCurso.init();
</script>
<!-- /JS -->
