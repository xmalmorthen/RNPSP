<?php
$this->carabiner->display('datatables');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
<script>
    var labelMes = <?php echo json_encode($mes); ?>;
    var labelMesCantidad = <?php echo json_encode($mesCantidad); ?>;
    var labelDia = <?php echo json_encode($dia); ?>;
    var labelDiaCantidad = <?php echo json_encode($diaCantidad); ?>;
</script>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-green-sharp">
                        <span data-counter="counterup" data-value="0" id="PeticionesTotal"></span>
                    </h3>
                    <small>Total</small>
                </div>
                <div class="icon">
                    <i class="icon-check"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="progress">
                    <span id="porcentajeExito" style="width: 0%;" class="progress-bar progress-bar-success green-sharp"></span>
                </div>
                <div class="status">
                    <div class="status-title"> Exito </div>
                    <div class="status-number" id="porcentajeExito"> 0% </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-blue-sharp">
                        <span data-counter="counterup" data-value="0" id="PeticionesTotalHoy"></span>
                    </h3>
                    <small>HOY</small>
                </div>
                <div class="icon">
                    <i class="icon-check"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="progress">
                    <span id="porcentajeExitoHoy" style="width: 0%;" class="progress-bar progress-bar-success green-sharp"></span>
                </div>
                <div class="status">
                    <div class="status-title"> Exito </div>
                    <div class="status-number" id="porcentajeExitoHoy"> 0% </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                        <span id='tiempoRespuestaGeneral' data-counter="counterup" data-value="1349">0</span>
                        <small class="font-red-haze">segundos</small>
                    </h3>
                    <small>Tiempo de respuesta</small>
                </div>
                <div class="icon">
                    <i class="icon-clock"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="progress">
                    <span id='tiempoRespuesta' style="width: 0%;" class="progress-bar progress-bar-success red-haze">
                    </span>
                </div>
                <div class="status">
                    <div class="status-title"> Tiempo de respuesta hoy </div>
                    <div id='tiempoRespuesta' class="status-number"> 0% </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-lg-6 col-xs-12 col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">Total de peticiones mensuales</span>
                </div>
            </div>
            <div class="portlet-body">
                <div style="width:100%;">
                    <canvas id="canvas"></canvas>
                </div> 
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xs-12 col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption ">
                    <span class="caption-subject bold uppercase font-dark">Total de peticiones diarios</span>
                </div>
            </div>
            <div class="portlet-body">
                <div style="width:100%;">
                    <canvas id="canvas2"></canvas>
                </div> 
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">ACTIVIDAD WEBSERVICE</span>
                    <span class="caption-helper"> (General) </span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable table-scrollable-borderless">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" width="100%" id="listado"></table>
                </div>
            </div>
        </div>
    </div>
</div>