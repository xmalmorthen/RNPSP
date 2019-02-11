<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dise.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <br>
        <form id="Validar_examen_form" name="Validar_examen_form" action="#">
            <div class="row">
                <div class="col-md-4">
                    CURP
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-4">
                    CUIP
                    <input type="text" class="form-control">
                </div>
            </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Nombre
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        Apellido paterno
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        Apellido materno
                        <input type="text" class="form-control">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Fecha de nacimiento
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-4">
                        RFC
                        <input type="text" class="form-control">
                    </div>
                </div>
                <br>
                <div class="row">   
                    <div class="col-md-4">
                        Fecha en la que precenta examen
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-4">
                        Fecha de expiración
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-4">
                        Estatus
                        <select name="" id="" class="form-control"></select>
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
