<!-- begin invoice -->
<div class="invoice">
    <div class="invoice-company">
        <span class="pull-right hidden-print">
            <a href="javascript:;" class="btn btn-sm btn-danger m-b-10"><i class="fa fa-download m-r-5"></i>Errores <span class="label label-theme m-l-5">1</span></a>
            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-warning m-b-10"><i class="fa fa-print m-r-5"></i>Bitacora <span class="label label-theme m-l-5">1</span></a>
            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-info m-b-10"><i class="fa fa-print m-r-5"></i>Consumir Servicio</a>
        </span>
        <?php echo $detalle['NombreModulo']; ?><br />
    </div>
    
    <div class="invoice-header">
        <div class="invoice-from">
            <h4><center><?php echo $detalle['DescripcionModulo']; ?></center></h4>
        </div>
    </div>
    
    <div class="invoice-content">
        <div class="col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-invoice table-striped">
                    <thead>
                        <tr>
                            <th colspan="2">
                                Características
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Tipo de webservice
                            </td>
                            <td><b>REST</b></td>
                        </tr>
                        <tr>
                            <td>
                                Método de Envio
                            </td>
                            <td><b>POST</b></td>
                        </tr>
                        <tr>
                            <td>
                                Parámetros Entrada
                            </td>
                            <td>
                                <?php echo $detalle['ParametrosEntrada']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Parámetros Salida
                            </td>
                            <td>
                                <?php echo $detalle['ParametrosSalida']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Protegido
                            </td>
                            <td><b><?php echo ($detalle['Protegido'] == 1)? 'SI' : 'NO'; ?></b></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="invoice-price">
            <div class="invoice-price-left">
                <div class="sep1"></div>
                <small><b>Url del Servicio</b></small>
                <center>
                    <label class="text-success" data-toggle="tooltip" data-placement="top" title="Dirección del servidor"><?php echo site_url(); ?></label>/
                    <label class="text-warning" data-toggle="tooltip" data-placement="bottom" title="Servicio WEB" ><?php echo $detalle['Modulo']; ?></label>/
                    <label class="text-info" data-toggle="tooltip" data-placement="top" title="Version" ><?php echo $detalle['Controlador']; ?></label>/
                    <label class="text-danger" data-toggle="tooltip" data-placement="bottom" title="Metodo" ><?php echo $detalle['Metodo']; ?></label>
                </center>
                <div class="sep1"></div>          
            </div>                    
        </div>
        
    </div>
                <div class="invoice-note">
                    * Make all cheques payable to [Your Company Name]<br />
                    * Payment is due within 30 days<br />
                    * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
                </div>
                <div class="invoice-footer text-muted">
                    <p class="text-center m-b-5">
                        THANK YOU FOR YOUR BUSINESS
                    </p>
                    <p class="text-center">
                        <span class="m-r-10"><i class="fa fa-globe"></i> matiasgallipoli.com</span>
                        <span class="m-r-10"><i class="fa fa-phone"></i> T:016-18192302</span>
                        <span class="m-r-10"><i class="fa fa-envelope"></i> rtiemps@gmail.com</span>
                    </p>
                </div>
            </div>


<script>
    $(function () {
        $('label[data-toggle="tooltip"]').tooltip()
    })
</script>