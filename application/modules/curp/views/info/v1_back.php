<?php
$this->carabiner->display('datatables');
?>
<!-- begin invoice -->
<div class="portlet light ">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-puzzle font-grey-gallery"></i>
            <span class="caption-subject bold font-grey-gallery uppercase"> METODOS DISPONIBLES</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-scrollable">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> Metodo </th>
                        <th> Detalles </th>
                        <th> Paramentros Entrada </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(is_array($metodos)){
                        foreach ($metodos as $key => $metodo) {
                    ?>
                    
                    <tr> 
                        <td style="padding-top:15px;" > <?php echo ($metodo['Protegido'] == 1)? '<span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x text-danger"></i><i class="fa fa-lock fa-stack-1x"></i></span>' : '<span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x text-success"></i><i class="fa fa-unlock-alt fa-stack-1x"></i></span>'; ?> </td>
                        <td> <?php echo $metodo['Nombre']; ?> </td>
                        <td> 
                            <b>URL:</b><br/>
                            <code><?php echo site_url('/'.$metodo['Modulo'].'/'.$metodo['Controlador'].'/'.$metodo['Metodo']); ?></code>
                            <hr/>
                            <b>Descripción:</b><br/>
                            <?php echo $metodo['Descripcion']; ?>
                            <hr/>
                            <b>Metodo de envio:</b><br/>
                            <code><?php echo $metodo['MetodoEnvio']; ?></code>
                            <hr/>
                            <b>Metodo de webservice:</b><br/>
                            <code><?php echo $metodo['TipoWebService']; ?></code>
                        </td>
                        <td>
                            <?php echo $metodo['ParametrosEntrada']; ?>
                        </td>
                    </tr>
                    <?php        
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
   </div>
</div>

<div class="portlet light ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cog font-grey-gallery"></i>
            <span class="caption-subject bold font-grey-gallery uppercase"> Actividad Webservice</span>
        </div>
    </div>
    <div class="portlet-body">
        
        <div class="table-scrollable table-scrollable-borderless">
            <table class="table table-striped table-bordered table-hover table-checkable order-column" width="100%" id="listado"></table>
        </div>
        
   </div>
</div>
