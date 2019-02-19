<div class="portlet light ">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings font-red"></i>
            <span class="caption-subject font-red sbold uppercase">Catalogo de clasificaciones</span>
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
                        <td> Obtiene el <b>Listado Completo</b> de Clasificaciones </td>
                        <td> 
                            <b>URL completo:</b><br/>
                            <code>
                            <?php echo site_url('api/catalogos/clasificaciones'); ?>
                            </code>
                            <br/>
                            <b>URL sin path:</b><br/>
                            <code>
                                api/catalogos/clasificaciones
                            </code>
                            <br/>
                            <b>Llamar desde controlador:</b><br/>
                            <code>
                            $this->load->model('Caclasificaciones_model');<br/>
                            $this->Caclasificaciones_model->get();   
                            </code>
                        </td>
                        <td> GET </td>
                        <td>
                        </td>
                    </tr>
                    <tr> 
                        <td> 2 </td>
                        <td> Obtiene el <b>Listado de activos</b> de Clasificaciones </td>
                        <td> 
                            <b>URL completo:</b><br/>
                            <code>
                            <?php echo site_url('api/catalogos/clasificacionesActivos'); ?>
                            </code>
                            <br/>
                            <b>URL sin path:</b><br/>
                            <code>
                                api/catalogos/clasificacionesActivos
                            </code>
                            <br/>
                            <b>Llamar desde controlador:</b><br/>
                            <code>
                            $this->load->model('Caclasificaciones_model');<br/>
                            $this->Caclasificaciones_model->getActivos();   
                            </code>
                        </td>
                        <td> GET </td>
                        <td>
                        </td>
                    </tr>
                    <tr> 
                        <td> 3 </td>
                        <td> <b>Busqueda</b> de Clsificaciones por la descripcion </td>
                        <td> 
                            <b>URL completo:</b><br/>
                            <code>
                            <?php echo site_url('api/catalogos/busquedaClasificaciones'); ?>
                            </code>
                            <br/>
                            <b>URL sin path:</b><br/>
                            <code>
                                api/catalogos/busquedaClasificaciones
                            </code>
                            <br/>
                            <b>Llamar desde controlador:</b><br/>
                            <code>
                            $this->load->model('Caclasificaciones_model');<br/>
                            $this->Caclasificaciones_model->busqueda();   
                            </code>
                        </td>
                        <td> POST </td>
                        <td>
                        </td>
                    </tr>
                    <tr> 
                        <td> 4 </td>
                        <td> <b>Obtiene</b> la Clsificacion por la id </td>
                        <td> 
                            <b>URL completo:</b><br/>
                            <code>
                            <?php echo site_url('api/catalogos/clasificacion'); ?>
                            </code>
                            <br/>
                            <b>URL sin path:</b><br/>
                            <code>
                                api/catalogos/clasificacion
                            </code>
                            <br/>
                            <b>Llamar desde controlador:</b><br/>
                            <code>
                            $this->load->model('Caclasificaciones_model');<br/>
                            $this->Caclasificaciones_model->get_idClasificacion({idClasificacion});   
                            </code>
                        </td>
                        <td> GET </td>
                        <td>
                            <ul>
                                <li>id:<b>id_Clasificacion</b></li>
                            </ul>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
   </div>
</div>