<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap4.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/responsive.bootstrap4.min.css"); ?>">

<div class="_container bodyVew">
    <table id="tableData" class="table table-striped dt-responsive d-none">
        <thead>
                <th>Folio</th>
                <th>Fecha de registro RNPSP</th>
                <th>Nombre completo</th>
                <th>Jefe inmediato</th>
                <th>Dependencia</th>
                <th>Puesto</th>
                <th>Estatus</th>
                <th colspan="2">Acciones</th>
        </thead>
        <tbody>
            {personal}
            <tr>
                <td>{pidPersona}</td>
                <td>{pFechaReg}</td>
                <td>{pnombre} {paterno} {pmaterno}</td>
                <td>{pNOMBRE_JEFE} {pPATERNO_JEFE} {pMATERNO_JEFE}</td>
                <td>{pDependencia}</td>
                <td>{pNOMBRE_PUESTO}</td>
                <td>{pEstatus}</td>
                <td><a class='m-2' href="<?php echo site_url('Personal/Ver/'); ?>{pidPersona}"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a></td>
                <!-- <td><a href="#"><i class="fa fa-print" aria-hidden="true"></i></a></td> -->
            </tr>
            {/personal}
        </tbody>
    </table>
</div>

<!-- JS -->
<script src="<?php echo base_url("assets/vendor/datatable/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/dataTables.responsive.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/responsive.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo base_url('assets/js/views/examen/index.js') ?>"></script>
<script>
    $(function() {
        
        $('.bodyVew').LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

        $('#tableData').DataTable({
            stateSave: true,
            "language": {"url": base_url + "assets/vendor/datatable/Spanish.txt"},
            "columnDefs": [{"orderable": false,"targets": [7]}],
            "order" : [[1]],
            "initComplete": function(settings, json) {
                
                $('#tableData').removeClass('d-none');

                $('.bodyVew').LoadingOverlay("hide", true);
            }
        });
    });
</script>
<!-- /JS -->