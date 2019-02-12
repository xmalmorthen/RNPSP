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
        <!-- FORM -->
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
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[]" value="check1">
                        <label class="form-check-label" for="defaultCheck1">Checkbox 1</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[]" value="check2">
                        <label class="form-check-label" for="defaultCheck1">Checkbox 2</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[]" value="check3">
                        <label class="form-check-label" for="defaultCheck1">Checkbox 3</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[]" value="check4">
                        <label class="form-check-label" for="defaultCheck1">Checkbox 4</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[]" value="check5">
                        <label class="form-check-label" for="defaultCheck1">Checkbox 5</label>
                    </div>                    
                </div>                                
            </div>
            <div class="btns">
                <button class="btn btn-primary guardarAvance">Guardar avance</button>
                <button class="btn btn-success submit">Registrar</button>
            </div>
        </form>
        <!-- /FORM -->
    </div>
</div>

<div class="my-2">&nbsp;</div>
<hr class="mr-30p">
<h1>Prueba de tabs</h1>
<div class="row">
    <div class="col-md-12">
        <!-- TABS -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="Tab1-tab" data-toggle="tab" href="#Tab1" role="tab" aria-controls="Tab1" aria-selected="true">Tab1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tab2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Tab3-tab" data-toggle="tab" href="#Tab3" role="tab" aria-controls="Tab3" aria-selected="false">Tab3</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Tab1" role="tabpanel" aria-labelledby="Tab1-tab">
                <div class="m-3">                                        
                    <p>Contenido de TAB 1</p>
                    <!-- TAB INTERIOR -->
                    <ul class="nav nav-tabs" id="myTabInterior1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="Tab1-tabInterior1" data-toggle="tab" href="#Tab1Interior1" role="tab" aria-controls="Tab1Interior1" aria-selected="true">Padre Tab1 - Tab1 Interior</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tabInterior1" data-toggle="tab" href="#Tab2Interior1" role="tab" aria-controls="Tab2Interior1" aria-selected="false">Padre Tab1 - Tab2 Interior</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Tab3-tabInterior1" data-toggle="tab" href="#Tab3Interior1" role="tab" aria-controls="Tab3Interior1" aria-selected="false">Padre Tab1 - Tab3 Interior</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContentInterior1">
                        <div class="tab-pane fade show active" id="Tab1Interior1" role="tabpanel" aria-labelledby="Tab1-tabInterior1">
                            <div class="m-3">                                        
                                <p>Contenido de TAB 1 Interior</p>                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Tab2Interior1" role="tabpanel" aria-labelledby="profile-tabInterior1">
                            <div class="m-3">
                                <p>Contenido de TAB 2 Interior</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Tab3Interior1" role="tabpanel" aria-labelledby="Tab3-tabInterior1">
                            <div class="m-3">
                                <p>Contenido de TAB 3 Interior</p>
                            </div>
                        </div>
                    </div>
                    <!-- FIN - TAB INTERIOR -->
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="m-3">
                    <p>Contenido de TAB 2</p>
                    <!-- TAB INTERIOR -->
                    <ul class="nav nav-tabs" id="myTabInterior2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="Tab1-tabInterior2" data-toggle="tab" href="#Tab1Interior2" role="tab" aria-controls="Tab1Interior2" aria-selected="true">Padre Tab2 - Tab1 Interior</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tabInterior2" data-toggle="tab" href="#Tab2Interior2" role="tab" aria-controls="Tab2Interior2" aria-selected="false">Padre Tab2 - Tab2 Interior</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Tab3-tabInterior2" data-toggle="tab" href="#Tab3Interior2" role="tab" aria-controls="Tab3Interior2" aria-selected="false">Padre Tab2 - Tab3 Interior</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContentInterior2">
                        <div class="tab-pane fade show active" id="Tab1Interior2" role="tabpanel" aria-labelledby="Tab1-tabInterior2">
                            <div class="m-3">                                        
                                <p>Contenido de TAB 1 Interior</p>                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Tab2Interior2" role="tabpanel" aria-labelledby="profile-tabInterior2">
                            <div class="m-3">
                                <p>Contenido de TAB 2 Interior</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Tab3Interior2" role="tabpanel" aria-labelledby="Tab3-tabInterior2">
                            <div class="m-3">
                                <p>Contenido de TAB 3 Interior</p>
                            </div>
                        </div>
                    </div>
                    <!-- FIN - TAB INTERIOR -->
                </div>
            </div>
            <div class="tab-pane fade" id="Tab3" role="tabpanel" aria-labelledby="Tab3-tab">
                <div class="m-3">
                    <p>Contenido de TAB 3</p>
                </div>
            </div>
        </div>
        <!-- FIN - TAB3 -->
      </div>
    </div>
</div>
<div class="my-2">&nbsp;</div>
<hr class="mr-30p">
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