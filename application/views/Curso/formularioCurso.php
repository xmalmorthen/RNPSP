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
                Nombre del curso
                <select name="pID_CURSO" id="pID_CURSO"  class="form-control" data-error="#err_pID_CURSO" data-query='QUNadzI2Tklxcjk2KzRCMjlEelp1WFlvZldEMHBhdnBCZG1pNTYrdDViTHBnM1Uvc2lLc0xac1BNOGJUZmo4Y0tWREFrQzZ5YjMxR24xQnoyM1FZU0Q5WVVkaE9FaXNKQ0RSRlVlaUFQbHd2WmJTNmZXaWZQb3FLSWdtRTFNQUNWSkt4NkRUN2xDeEdJZk5GWjYxeG95dm5xbnRObDBQY0gzb3R0cExnUThJPQ==' required></select>
                <span id="err_pID_CURSO"></span>
            </div>
            <div class="col-md-4">
                Fecha de inicio del curso
                <input type="date" class="form-control" name="pFECHA_INICIO" id="pFECHA_INICIO" required>
            </div>
            <div class="col-md-4">
                Fecha de término del curso
                <input type="date" class="form-control" name="FECHA_FIN" id="FECHA_FIN" required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
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
            <div class="col-md-4">
                Vigencia
                <select style="width:356px;" class="form-control" id="pVIGENCIA" name="pVIGENCIA" data-error="#err_pVIGENCIA" data-query='' required>
                    <option disabled selected value>Seleccione una opción</option>
                    <option value="1">Vigente</option>
                    <option value="2">No vigente</option>
                </select>
                <span id="err_pVIGENCIA"></span>
            </div>
        </div>
        <br>
        <a class="btn btn-light mr-3" role="button" href="<?php echo site_url('Curso'); ?>">Regresar</a>
        <button class="btn btn-light" id='guardar'>Guardar</button>
    </form>
</div>

<script src="<?php echo base_url('assets/vendor/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/dom.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/alerts.js') ?>"></script>

<script src="<?php echo base_url('assets/js/views/curso/formularioCurso.js') ?>"></script>

<!-- JS -->
<script type="text/javascript">
    objViewFormularioCurso.init();
</script>
<!-- /JS -->
