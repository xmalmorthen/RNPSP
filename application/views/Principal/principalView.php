<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatable/jquery.dataTables.min.css'); ?>">
<!-- <link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap.min.css"); ?>"> -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/views/principalView.css') ?>">
<!-- /CSS -->

<br><br>
<div class="row">
  <div class="col-md-10">
    <!-- BEGIN TABLE -->
    <table id="table" class="table display" style="width:100%">
      <thead>
          <tr>
              <th>Modalidad</th>
              <th>Acción</th>
              <th>Estatus</th>
          </tr>
      </thead>
      <tbody>  
          <tr>
              <td>1</td>
              <td>asd</td>
              <td>qwe</td>
          </tr>
      </tbody>
    </table>
    <!-- END TABLE -->
  </div>
</div>

<!-- JS -->
<script src="<?php echo base_url("assets/vendor/datatable/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/plugins/jquery-validation/dist/jquery.validate.min.js"); ?>"></script>
<script src="<?php echo base_url('assets/js/views/principalView.js') ?>"></script>
<script>
	$(function() {
    $('#table').DataTable({
          "language": {
              "url": base_url + "assets/vendor/datatable/Spanish.txt"
          },
          "columnDefs": [
              { "orderable": false, "targets": [2] }
          ]
      });
  }); 	
</script>
<!-- /JS -->