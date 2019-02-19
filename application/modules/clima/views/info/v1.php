<?php
$this->carabiner->display('datatables');
?>

<style>
.cortar{
    width:300px;
    height:20px;
    padding:20px;
    border:1px solid blue;
    text-overflow:ellipsis;
    white-space:nowrap; 
    overflow:hidden; 
}
.cortar:hover {
    width: auto;
    white-space: initial;
    overflow:visible;
    cursor: pointer;
}
</style>
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
            <table class="table">
                <thead>
                    <tr>
                        <th>  </th>
                        <th> Metodo </th>
                        <th> Detalles </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(is_array($metodos)){
                        foreach ($metodos as $key => $metodo) {
                    ?>
                    
                    <tr class="<?php echo ($metodo['MetodoPrueba'] == 0)? 'active' : 'warning'; ?>"> 
                        <td style="padding-top:15px;" > <?php echo ($metodo['Protegido'] == 1)? '<span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x text-danger"></i><i class="fa fa-lock fa-stack-1x"></i></span>' : '<span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x text-success"></i><i class="fa fa-unlock-alt fa-stack-1x"></i></span>'; ?> </td>
                        <td> <b><?php echo $metodo['Nombre']; ?></b> </td>
                        <td>
                            
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="width: 215px;" > URL: </td>
                                        <td> <code><?php echo site_url('/'.$metodo['Modulo'].'/'.$metodo['Controlador'].'/'.$metodo['Metodo']); ?></code> </td>
                                    </tr>
                                    <tr>
                                        <td> Descripción: </td>
                                        <td> <?php echo $metodo['Descripcion']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td> Metodo de envio: </td>
                                        <td> <code><?php echo $metodo['MetodoEnvio']; ?></code> </td>
                                    </tr>
                                    
                                    <tr>
                                        <td> Metodo de webservice: </td>
                                        <td> <code><?php echo $metodo['TipoWebService']; ?></code> </td>
                                    </tr>
                                    <tr>
                                        <td> Paramentros Entrada: </td>
                                        <td> <?php echo $metodo['ParametrosEntrada']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td> Usuarios con acceso: </td>
                                        <td> <?php 
                                        if(is_array($metodo['usuarios']) && count($metodo['usuarios'])>0){
                                            echo '<ul>';
                                            foreach ($metodo['usuarios'] as $value) {
                                                echo '<li>'.$value['username'].(($metodo['MetodoPrueba'] == 0)? '': ' <b>('.$value['email'].')</b>' ).'</li>'; 
                                            }
                                            echo '</ul>';
                                        }
                                        
                                        ?> </td>
                                    </tr>
                                </tbody>
                            </table>
                           
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
