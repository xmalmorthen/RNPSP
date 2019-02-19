<legend>Detalle</legend>

<form class="form-horizontal form-bordered">
    
    <div class="form-group">
        <label class="control-label col-md-4">ID</label>
        <div class="col-md-8">
            <pre><?php echo $detalle['id_Bitacora'] ?></pre>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4">Fecha Ejecucion</label>
        <div class="col-md-8">
            <pre><?php echo $detalle['LogFecha'] ?></pre>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-md-4">Tiempo Ejecucion</label>
        <div class="col-md-8">
            <pre><?php echo $detalle['TiempoEjecucion'] ?></pre>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-md-4">Error</label>
        <div class="col-md-8">
            <pre><?php echo ($detalle['Error'] == 1)? 'SI' : 'NO'; ?></pre>
        </div>
    </div>
    
</form>

<legend>Parametros de entrada</legend>
<pre class="size08em"><?php print_r(json_decode($detalle['DatosEntrada'])); ?></pre>

<legend>Parametros de salida</legend>
<pre class="size08em"><?php print_r(json_decode($detalle['DatosSalida'])); ?></pre>
