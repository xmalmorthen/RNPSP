
        <div class="table-responsive">
            <table class="table table-invoice table-striped">
                <tbody>
                    <tr>
                        <td>
                            Descripcion
                        </td>
                        <td><b><?php echo $detalle['DescripcionModulo']; ?></b></td>
                    </tr>
                    <tr>
                        <td>
                            Tipo de webservice
                        </td>
                        <td><b><?php echo $detalle['tipoWebService']; ?></b></td>
                    </tr>
                    <tr>
                        <td>
                            Método de Envio
                        </td>
                        <td><b><?php echo $detalle['metodoEnvio']; ?></b></td>
                    </tr>
                     <tr>
                        <td>
                            Protegido
                        </td>
                        <td><b><?php echo ($detalle['Protegido'] == 1)? 'SI' : 'NO'; ?></b></td>
                    </tr>
                    <tr>
                        <td>
                            Parámetros Entrada
                        </td>
                        <td>
                            <?php if(is_array($parametrosEntrada)){ ?>
                             <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Opcional</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                foreach ($parametrosEntrada as $parametroEntrada) {
                                    echo '<tr>';
                                    echo '<td>'.$parametroEntrada['Nombre'].'</td>';
                                    echo '<td>'.$parametroEntrada['Tipo'].'</td>';
                                    echo '<td>'.(($parametroEntrada['Obligatorio'] == 1)? 'SI' : 'NO').'</td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                             </table>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Parámetros Salida
                        </td>
                        <td>
                            <?php if(is_array($parametrosSalida)){ ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nodo</th>
                                        <th>Parametro</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $nodoAct = '';
                                $html = '';
                                $i = 0;
                                foreach ($parametrosSalida as $parametroSalida){ 
                                    $i++;
                                    $html .= '<tr>';
                                    if($nodoAct != $parametroSalida['Nodo']){
                                        $html = str_replace("[{rowspan}]", $i, $html);
                                        $html .= '<td rowspan="[{rowspan}]" >'.$parametroSalida['Nodo'].'</td>';
                                        $nodoAct = $parametroSalida['Nodo'];
                                        $i = 0;
                                    }
                                    $html .= '<td>'.$parametroSalida['Nombre'].'</td>';
                                    $html .= '<td>'.$parametroSalida['Tipo'].'</td>';
                                    $html .= '</tr>';


                                }
                                $i++;
                                $html = str_replace("[{rowspan}]", $i, $html);
                                print $html;
                                ?>
                                </tbody>
                             </table>
                            <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>