<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatable/jquery.dataTables.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/views/principalView.css') ?>">
<!-- /CSS -->

<h1>Prueba de formulario</h1>

<div class="row">    
    <div class="col-md-8">
        <form autocomplete="off" action="#">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Text</label>
                    <input type="text" class="form-control" autocomplete="off">
                </div>                
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>                
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password" autocomplete="off">
                </div>
            </div>                        
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Select</label>
                    <select class="form-control select2" id="CAT_ACADEMIA" name="CAT_ACADEMIA">
                        <option disabled selected value>Seleccione una opción</option>
                        <?php foreach ($data['catalogs']['CAT_ACADEMIA'] as $key => $value) {?>                            
                            <option value="<?php echo isset($value->ID_ACADEMIA) ? $value->ID_ACADEMIA : ''?>"><?php echo isset($value->DESCRIPCION) ? $value->DESCRIPCION : '[ Sin valor ]'?></option>
                        <?php } ?>
                    </select>
                </div>                
                <div class="form-group col-md-6">
                    <label for="inputCity">Select Ajax</label>
                    <select class="form-control select2" id="ajaxSelect" name="ajaxSelect"></select>
                </div>
            </div>            
            <button type="submit" class="btn btn-primary">Sign in</button>
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
<script src="<?php echo base_url("assets/vendor/plugins/jquery-validation/dist/jquery.validate.min.js"); ?>"></script>
<script src="<?php echo base_url('assets/vendor/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/principalView.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/catalogs.js') ?>"></script>

<script>
	$(function() {
        var table = $('#table').DataTable({
            "language": {
                "url": base_url + "assets/vendor/datatable/Spanish.txt"
            },
            "columnDefs": [
                { "orderable": false, "targets": [2] }
            ]
        });

        table.on( 'draw', function () {
            //$('[name="table_length"]').select2();
        });

        $('.select2').select2();
                
        $('#ajaxSelect').getCatalog({
            query : 'Yi8reWI5VGNTY2d1YmJ3YWRPRnhhU0pFZzhEWkZUR1lmUDdTdzhQUHFEdmVZbEJ3M0xmMVVBVVpmUE9sL3Fud2tKZkg3ZnRFS0ZrUElNdVVBNmVad1BPMUwzZVRvS0hMS2F4SVdOWDMxTmhTeFFNSjRmQmcyZXRRQTFSUjd0bWJzMkxZWldsd0pNL2dlQ1pJNkFHVGZ2RlJjK1NZeFZRS21VTXh5TGt1K0hzPQ==',
            emptyOption : true
        });
    });
</script>
<!-- /JS -->