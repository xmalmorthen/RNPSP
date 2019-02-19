<div class="portlet light ">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings font-red"></i>
            <span class="caption-subject font-red sbold uppercase">Catalogos de Marcas</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-scrollable">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> Descripcion </th>
                        <th> Acceso </th>
                        <th> Tipo </th>
                        <th> Paramentros Entrada </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> Obtiene el <b>listado de activos</b> del catalogo de Unidades Medidas </td>
                        <td>
                            <label>Servicio REST</label><br/>
                            <code><label class="text-muted"><small><?php echo site_url(); ?></small></label><small>/api/catalogos/unidadesMedidasActivos</small></code>
                            <br/>
                            <label>Modelo</label><br/>
                            <code>
                                <small>$this->load->model('CaUnidadesMedidas_model');</small>
                            </code>
                            <br/>
                            <code>
                                <small>$this->CaUnidadesMedidas_model->getActivos();</small>
                            </code>
                        </td>
                        <td> GET </td>
                        <td></td>
                    </tr>
                    <tr> 
                        <td> 2 </td>
                        <td> <b>Busqueda</b> por descripción del catalogo de marcas </td>
                        <td>
                            <label>Servicio REST</label><br/>
                            <code><label class="text-muted"><small><?php echo site_url(); ?></small></label><small>/api/catalogos/busquedaMarcas</small></code>
                            <br/>
                            <label>Modelo</label><br/>
                            <code>
                                <small>$this->load->model('CaMarcas_model');</small>
                            </code>
                            <br/>
                            <code>
                                <small>$this->CaMarcas_model->busquedaMarcas({term});</small>
                            </code>
                        </td>
                        <td> POST </td>
                        <td>
                            <ul>
                                <li>term (descripcion a buscar)</li>
                                <li>activo</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
   </div>
</div>