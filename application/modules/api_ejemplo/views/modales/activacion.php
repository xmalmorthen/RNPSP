<div class="modal-dialog" class="modal-md">    
    <div class="modal-content">
        <div class="modal-body">
        <?php echo form_open(false,array('id'=>"form_cambiarestatus"));?>
            
        <p><?php echo $mensaje;?></p>
        <div class="sep10"></div>
        <input type="text" name="id" id="id" value="<?php echo $id_catalogo;?>" />
        <input type="text" name="activo" id="activo" value="<?php echo $activo;?>" />
        </div>
        <div class="modal-footer">
            <div class="derecha">
                <button class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="button" class="btn btn-success" id="ActivarDesactivarCatalogo"><span class="glyphicon glyphicon-check"></span> Aceptar</button>
            </div>
        </div>
        <?php echo form_close(); ?>

    </div>
</div>

