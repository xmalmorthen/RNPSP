
<body>
    <div class="container">
        <br>
        <form id="Validar_examen_form" name="Validar_examen_form" action="#">
            <div class="row">
                <div class="col-md-4">
                    CURP
                    <input type="text" class="form-control" id="pCURP" name="pCURP" maxlength="20" required>
                </div>
                <div class="col-md-4">
                    CUIP
                    <input type="text" id="pCUIP" name="pCUIP" class="form-control" maxlength="40" required>
                </div>
            </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Nombre
                    <input type="text" id="pNOMBRE_DATOS_PERSONALES" name="pNOMBRE_DATOS_PERSONALES" class="form-control consultaCURP" maxlength="40" required>
                    </div>
                    <div class="col-md-4">
                        Apellido paterno
                        <input type="text"  id="pPATERNO" name="pPATERNO" class="form-control consultaCURP" maxlength="40" required>
                    </div>
                    <div class="col-md-4">
                        Apellido materno
                        <input type="text" id="pMATERNO" name="pMATERNO" class="form-control consultaCURP" maxlength="40">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Fecha de nacimiento
                        <input type="date"  id="pFECHA_NAC_DATOS_PERSONALES" name="pFECHA_NAC_DATOS_PERSONALES" class="form-control consultaCURP" required>
                    </div>
                    <div class="col-md-4">
                        RFC
                        <input type="text" id="pRFC_DATOS_PERSONALES" name="pRFC_DATOS_PERSONALES" class="form-control" minlength="10" maxlength="13" required>
                    </div>
                </div>
                <br>
                <div class="row">   
                    <div class="col-md-4">
                        Fecha en la que presenta examen
                        <input type="date" class="form-control" name="pFECHA_EXAMEN" id="pFECHA_EXAMEN">
                    </div>
                    <div class="col-md-4">
                        Fecha de expiración
                        <input type="date" class="form-control" name="pVIGENCIAEXAMEN" id="pVIGENCIAEXAMEN">
                    </div>
                    <div class="col-md-4">
                        Estatus
                        <select name="" id="" class="form-control" id="pESTATUS_Examen" name="pESTATUS_Examen"></select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-light" id="Regresar_form_btn">Regresar</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-light" id="Guardar_form_btn">Guardar</button>
                    </div>
                </div>
        </form>
    </div>

</body>
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
</script>
</html>
