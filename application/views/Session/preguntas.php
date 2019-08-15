<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pregunta de seguridad - <small id="numeroIntento">Intento: 1/3</small></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form id="formContenedorVeri" autocomplete="off" novalidate>
        <div class="modal-body">
          <p><?php echo $pregunta; ?></p>
          <input type="hidden" class="form-control" value="<?php echo $idPregunta; ?>" name="idPreguntaSeguridad" >
          <input type="hidden" class="form-control" value="<?php echo $pregunta; ?>" name="DescPreguntaSeguridad" >
          <input type="text" class="form-control" name="preguntaSeguridad" required minlength="5">
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-default" value="Verificar">
          <!-- <button onclick="verificarRegistro();" type="button" class="btn btn-default" >Verificar</button> -->
          <button onclick="hideModal();" type="button" class="btn btn-danger" >Cancelar</button>
        </div>
      </form>
    </div>
  </div>

<!-- JS -->
<script>  
  $(function() {
    $('#formContenedorVeri').submit(function(e){
      e.preventDefault();
      verificarRegistro();
    });    
  });

  function hideModal(){
		$('div#modalPregunta').modal('hide');
	}

</script>