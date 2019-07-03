<div class="_container">
    <table id="tablePersonal" class="table display">
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