<div class="row">
    <!-- begin invoice -->
    <div class="invoice">
        <div class="invoice-company">
            <?php echo $detalle['NombreModulo']; ?><br />
        </div>

        <div class="invoice-header">
            <div class="invoice-from">
                <div class="sep1"></div>
                <h3>
                    <center>
                        <label class="text-success" data-toggle="tooltip" data-placement="top" title="Dirección del servidor"><?php echo site_url(); ?></label>/
                        <label class="text-warning" data-toggle="tooltip" data-placement="bottom" title="Servicio WEB" ><?php echo $detalle['Modulo']; ?></label>/
                        <label class="text-info" data-toggle="tooltip" data-placement="top" title="Version" ><?php echo $detalle['Controlador']; ?></label>/
                        <label class="text-danger" data-toggle="tooltip" data-placement="bottom" title="Metodo" ><?php echo $detalle['Metodo']; ?></label>
                    </center>
                </h3>
                <div class="sep1"></div>          
            </div>                        
        </div>
    </div>
</div>

<div class="sep20"></div>

<div class="row">
    <div class="">
        <ul class="nav nav-tabs">
                <li class="active">
                    <a tab="caracteristicas" href="#default-tab-1" data-toggle="tab">
<!--                        <div class="text-center">
                            <i class="fa fa-th-list fa-2x"></i>
                        </div>
                        <span class="hidden-xs m-l-3">-->
                            Características
                        <!--</span>-->
                    </a>
                </li>
                <li class="">
                    <a tab="consumir_servicio" href="#default-tab-2" data-toggle="tab">
<!--                        <div class="text-center">
                            <i class="fa fa-wpforms fa-2x"></i>
                        </div>
                        <span class="hidden-xs m-l-3">-->
                            Consumir Servicio
                        <!--</span>-->
                    </a>
                </li>
                <li class="">
                    <a tab="bitacora" href="#default-tab-3" data-toggle="tab">
<!--                        <div class="text-center">
                            <i class="fa fa-television fa-2x"></i>
                        </div>
                        <span class="hidden-xs m-l-3">-->
                            Bitacora
                        <!--</span>-->
                    </a>
                </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="default-tab-1">
                <?php include 'caracteristicas.php'; ?>
            </div>
            <div class="tab-pane fade" id="default-tab-2">
                <?php include 'consumirServicio.php'; ?>
            </div>
            <div class="tab-pane fade" id="default-tab-3">
                <?php include 'bitacora.php'; ?>
            </div>
        </div>
    </div>
</div>

<div class="sep1"></div>

<div class="row">
    <div class="invoice">
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
</div>

<div id="calendarDetail" class="modal fade">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body"> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
</div>