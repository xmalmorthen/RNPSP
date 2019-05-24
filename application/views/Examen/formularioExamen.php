
<body>
    <style>
        .borderButtom{border-bottom: 1px solid #cacaca!Important;}
    </style>
    <div class="container">
        <br>
        <form id="Validar_examen_form" name="Validar_examen_form" action="#">
            <div class="row">
                <div class="col-md-4">
                    <h6 class="borderButtom">
                        CURP 
                    </h6>
                    <p id="pCURP"></p>
                </div>
                <div class="col-md-4">
                    <h6 class="borderButtom">
                        CUIP 
                    </h6>
                    <p id="pCUIP"></p>
                </div>
            </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom">
                            Nombre 
                        </h6>
                        <p id="pNOMBRE_DATOS_PERSONALES"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">
                            Apellido paterno 
                        </h6>
                        <p id="pPATERNO"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">
                            Apellido materno 
                        </h6>
                        <p id="pMATERNO"></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="borderButtom">
                                Fecha de nacimiento 
                        </h6>
                        <p id="pFECHA_NAC_DATOS_PERSONALES"></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="borderButtom">
                            RFC
                        </h6>
                        <p id="pRFC_DATOS_PERSONALES"></p>
                    </div>
                </div>
                <br>
                <div class="row">   
                    <div class="col-md-4">
                        Lugar de aplicación
                        <input type="text" class="form-control" name="pLUGAR" id="pLUGAR" maxlength="250">
                    </div>
                    <div class="col-md-4">
                        Hora
                        <input type="time" class="form-control" name="pHORA_EXAMEN" id="pHORA_EXAMEN">
                    </div>
                    <div class="col-md-4">
                        Fecha de aplicación 
                        <input type="date" class="form-control" name="" id="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Estatus del examen de confianza
                        <select type="text" class="form-control" id="pESTATUS_EXAMEN" name="pESTATUS_EXAMEN"> </select>
                    </div>
                    <div class="col-md-4">
                        Fecha del examen
                        <input type="date" class="form-control" id="pFECHA_EXAMEN" name="pFECHA_EXAMEN">
                    </div>
                    <div class="col-md-4">
                        Vigencia del examen
                        <input type="date" class="form-control" id="pVIGENCIA_EXAMEN" name="pVIGENCIA_EXAMEN">
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
