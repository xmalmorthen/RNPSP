<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pregunta de seguridad - <small id="numeroIntento">Intento: 1/3</small></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formContenedorVeri">
            <p><?php echo $pregunta; ?></p>
            <input type="hidden" class="form-control" value="<?php echo $idPregunta; ?>" name="idPreguntaSeguridad" >
            <input type="hidden" class="form-control" value="<?php echo $pregunta; ?>" name="DescPreguntaSeguridad" >
					  <input type="text" class="form-control" name="preguntaSeguridad" required>
            </form>
      </div>
      <div class="modal-footer">
        <button onclick="verificarRegistro();" type="button" class="btn btn-default" >Verificar</button>
      </div>
    </div>
  </div>