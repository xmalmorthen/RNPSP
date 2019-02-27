<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/dise.css'); ?>">

<!-- /CSS -->

<body>
    <div class="row bodyVew">

        <div class="container">
        <br>
        <div class="row">
            <div class="col-md-4">
            
            </div>
            <div class="col-md-4">
                <center>
                    <div class="titulo">
                        <h5><strong>Preguntas de verificación</strong></h5>
                    </div>
                </center>
            </div>
        </div>
        <br>
            <div class="row">
                <div class="col-md-6">

                        <p><span class="clr">*</span>¿Cuál es el nombre de la mamá de tu mamá?</p>
                        <input type="text" class="form-control" id="pregunta1" required>
                
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">

                        <p><span class="clr">*</span>¿Cuál es el nombre del papá de tu papá?</p>
                        <input type="text" class="form-control" id="pregunta2" required>

                </div>
            
            </div>
            <br>
            <div class="row">
            
                <div class="col-md-6">

                        <p><span class="clr">*</span>¿Cuál es el nombre de tu mamá?</p>
                        <input type="text" class="form-control" id="pregunta3" required>

                </div>

            </div>
        
            <br>
            <div class="row">
                <div class="col-md-6">

                    <p><span class="clr">*</span>¿Cómo te llamaban en tu familia cuando eras niño?</p>
                    <input type="text" class="form-control" id="pregunta4" required>

                </div>
            </div>
            <br>
            <div class="row">
            
                <div class="col-md-6">

                    <p><span class="clr">*</span>¿En qué ciudad conociste a tu esposo(a), novio(a)?</p>
                    <input type="text" class="form-control" id="pregunta5" required>
                
                </div>

            </div>
            <br>
            <div class="row">
            
                <div class="col-md-6">

                    <p><span class="clr">*</span>¿Quién era el mejor amigo en infancia?</p>
                    <input type="text" class="form-control" id="pregunta6" required>
                
                </div>
            
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <p><span class="clr">*</span>¿Porque calle vivías cuando tenías 10 años?</p>
                    <input type="text" class="form-control" id="Pregunta7" required>
                </div>
            </div>
            <br>
            <div class="row">
            
                <div class="col-md-6">
                    <p><span class="clr">*</span>¿Cuál es la fecha de nacimiento de tu hermano mayor?</p>
                    <input type="text" class="form-control" id="Pregunta8" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <p><span class="clr">*</span>¿Cuál es el segundo nombre de tu hijo menor?</p>
                    <input type="text" class="form-control" id="Pregunta9" required>
                </div>
            
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <p><span class="clr">*</span>¿Cuál es el nombre de tu hermano mayor?</p>
                    <input type="text" class="form-control" id="Pregunta10" required>
                </div>

            
            </div>
            <br>
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <button class="btn btn-default" id="guardarPreguntas">Guardar respuestas</button>
                </div>
            </div>
       
            
        </div>

    </div>
    <!-- Modal -->

     <!-- Modal -->
  <div class="modal fade" id="modalPregunta" role="dialog">
   	   <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p>Intento: 1/3 </p>
            <h4 class="modal-title">Pregunta de seguridad</h4>
        </div>
        <div class="modal-body">
            <p>Pregunta</p>
            <input type="text" class="form-control" id="preguntaSeguridad" required>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Verificar</button>
        </div>
        </div>

    </div>
  	    
  	
    

</body>

<script type="text/javascript">
    $("#preguntaUnica").on("click", function(e){
        e.preventDefault();
        $("#modalPregunta").modal("show");
 
       
    });
    

</script>






