<div class="portlet light ">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings font-red"></i>
            <span class="caption-subject font-red sbold uppercase">Autorizadores Articulo 41</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-scrollable">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> Descripcion </th>
                        <th> URL </th>
                        <th> Tipo </th>
                        <th> Paramentros Entrada </th>
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        <td> 1 </td>
                        <td> <b>Busqueda</b> de Autorizadores de articulo 41 por id_Dependencia </td>
                        <td> 
                            <b>URL completo:</b><br/>
                            <code>
                            <?php echo site_url('api/catalogos/busquedaAutorizadoresArt41'); ?>
                            </code>
                            <br/>
                            <b>URL sin path:</b><br/>
                            <code>
                                api/catalogos/busquedaAutorizadoresArt41
                            </code>
                            <br/>
                            <b>Llamar desde controlador:</b><br/>
                            <code>
                            $this->load->model('DeAutorizadoresArt41_model');<br/>
                            $this->DeAutorizadoresArt41_model->getAutorizadores_idDependencia({id_Dependencia);   
                            </code>
                        </td>
                        <td> GET </td>
                        <td>
                            <ul>
                                <li>id({id_Dependencia})</li>
                            </ul>
                        </td>
                    </tr>
                    
                    <tr> 
                        <td> 2 </td>
                        <td> <b>Agrega</b> un autorizador de Articulo 41 </td>
                        <td> 
                            <b>URL completo:</b><br/>
                            <code>
                            <?php echo site_url('/api/catalogos/autorizadorArt41'); ?>
                            </code><br/>
                            <b>URL sin path:</b><br/>
                            <code>
                            api/catalogos/autorizadorArt41    
                            </code><br/>
                            <b>Llamar desde controlador:</b><br/>
                            <code>
                                $this->load->model('DeAutorizadoresArt41_model');<br/>
                                $this->DeAutorizadoresArt41_model->set_Autorizador({id_Usuario},{id_Dependencia});
                            </code>
                        </td>
                        <td> POST </td>
                        <td>
                            <ul>
                                <li>id_Usuario (ID USUARIO AUTORIZADOR)</li>
                                <li>id_Dependencia</li>
                            </ul>
                        </td>
                    </tr>
                    
                    <tr> 
                        <td> 3 </td>
                        <td> <b>Elimina</b> un autorizador de Articulo 41 </td>
                        <td> 
                            <b>URL completo:</b><br/>
                            <code>
                            <?php echo site_url('/api/catalogos/autorizadorArt41'); ?>
                            </code><br/>
                            <b>URL sin path:</b><br/>
                            <code>
                                api/catalogos/autorizadorArt41
                            </code><br/>
                            <b>Llamar desde controlador:</b><br/>
                            <code>
                            $this->load->model('DeAutorizadoresArt41_model');<br/>
                            $result = $this->DeAutorizadoresArt41_model->delete_Autorizador({idUsuario},{id_Dependencia});
                            </code>
                                 
                        </td>
                        <td> DELETE </td>
                        <td>
                            <ul>
                                <li>id_Usuario (ID USUARIO AUTORIZADOR)</li>
                                <li>id_Dependencia</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
   </div>
</div>