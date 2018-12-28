<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatable/jquery.dataTables.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/datetimepicker/css/daterangepicker.css"); ?>"> 
<link rel="stylesheet" href="<?php echo base_url('assets/css/views/ejemplosView.css') ?>">
<!-- /CSS -->

<h1>Prueba de formulario</h1>

<div class="row">    
    <div class="col-md-8">
        <form autocomplete="off" action="#">
            <input type="hidden" name="current_url" id="current_url" value="<?php echo current_url(); ?>">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="text">Text</label>
                    <input type="text" class="form-control" id="text" name="text" autocomplete="off" required>
                </div>                
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>                
                    <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" autocomplete="off" required>
                </div>
            </div>                        
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Select</label>
                    <select class="form-control select2" id="CAT_ACADEMIA" name="CAT_ACADEMIA" autocomplete="off" data-error="#err_CAT_ACADEMIA" required>
                        <option disabled selected value>Seleccione una opción</option>
                        <?php foreach ($data['catalogs']['CAT_ACADEMIA'] as $key => $value) {?>                            
                            <option value="<?php echo isset($value->ID_ACADEMIA) ? $value->ID_ACADEMIA : ''?>"><?php echo isset($value->DESCRIPCION) ? $value->DESCRIPCION : '[ Sin valor ]'?></option>
                        <?php } ?>
                    </select>
                    <span id="err_CAT_ACADEMIA"></span>
                </div>                
                <div class="form-group col-md-6">
                    <label for="ajaxSelect">Select Ajax</label>
                    <select class="form-control select2" id="ajaxSelect" name="ajaxSelect" autocomplete="off" data-error="#err_ajaxSelect" required></select>
                    <span id="err_ajaxSelect"></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="date">Date</label>
                    <input type="text" class="form-control singledatepicker" id="date" name="date" autocomplete="off" required/>
                </div>                
            </div>
            <button class="btn btn-primary guardarAvance">Guardar avance</button>
            <button class="btn btn-success submit">Registrar</button>
        </form>
    </div>
</div>
<div class="my-2">&nbsp;</div>
<h1>Prueba de tabla</h1>
<div class="row">
  <div class="col-md-12">
    <!-- BEGIN TABLE -->
    <table id="table" class="table display" style="width:100%">
      <thead>
          <tr>
              <th>Cmp1</th>
              <th>Cmp2</th>
              <th>Cmp3</th>
          </tr>
      </thead>
      <tbody>  
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
          <tr><td>1</td><td>asd</td><td>qwe</td></tr>
      </tbody>
    </table>
    <!-- END TABLE -->
  </div>
</div>

<!-- JS -->
<script src="<?php echo base_url("assets/vendor/datatable/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url('assets/vendor/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/plugins/datetimepicker/js/daterangepicker.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/ejemplosView.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/catalogs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/serialized.js') ?>"></script>

<script>
	$(function() {
        objView.init();
    });
</script>
<!-- /JS -->