<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap4.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/responsive.bootstrap4.min.css"); ?>">

<!-- /CSS -->
<div class="row bodyVew">
    <div class="col-md-12 mb-4">
        <button class="btn btn-default btn-lg" id="Nuevo"> Nuevo </button>
    </div>
	
    <div class="col-md-12">
		<div id='frmAlertSumary' class="alert alert-danger alert-dismissible fade show d-none" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<span id='frmAlertSumaryMsg'></span>
		</div>
		<div id='frmAlertReplication' class="alert alert-info alert-dismissible fade show d-none" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<div class="row">
				<div class="col align-self-start">
					<h3><i class="fa fa-cog fa-spin fa-fw"></i> Replicando solicitudes</h3>
    			</div>
				<div class="col align-self-end text-right">
					<button id='cancelReplication' type="button" class="btn btn-danger mb-1 mr-3"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</button>
    			</div>
			</div>
			<div class="progress" style="height: 20px;">
				<div class="progress-bar bg-success" role="progressbar" style="width: 0;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
		
        <!-- BEGIN TABLE -->
        <table id="tableAdministrarsolicitud" class="d-none table table-striped dt-responsive" style="width:100%">
            <thead>
                <tr>
                    <th><input type="checkbox" name='checkAll' id='checkAll' class='checkAll'></th>
                    <th>Folio</th>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Fecha de registro</th>
                    <th>Tipo de solicitud</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $key => $value) { ?>
                    <tr>
                        <td>
                            <div class="checkbox">
                                <input type="checkbox" class="checkItem" data-idReg="<?php echo $value['options']['id']; ?>">
                            </div>
                        </td>
                		<?php foreach ($value as $item => $valueItem) {
                    		if (!is_array($valueItem)) {?>
                        <td><?php echo $valueItem ? $valueItem : ''; ?></td>
                		<?php }} ?>
                        <td>
                            <a class='m-2' href="<?php echo site_url("Solicitud/Ver/{$value['options']['id']}") ?>" title='Ver'><i class="fa fa-eye fa-2x"></i></a>
                            <?php if ( (verificaTipoUsuarioSesion() != 1  && $value['options']['idEstatus'] != 7 && $value['TipodeSolicitud'] == 'AS')  || verificaTipoUsuarioSesion() == 1) { // usuarios y administrador de dependencias y que el estatus de solicitud no este en concluida ó usuarios superadmin y c4?> 
								<a class='m-2' href="<?php echo site_url("Solicitud/Modificar/{$value['options']['id']}") ?>" title='Modificar'><i class="fa fa-pencil-square-o fa-2x"></i></a>
							<?php }?>
                            <?php if ($value['TipodeSolicitud'] == 'AS' && ( $value['options']['idEstatus'] == 1 || $value['options']['idEstatus'] == 6 ) ) { ?>
								<a class='m-2' href="#"  name='eliminarSolicitud' data-id="<?php echo $value['options']['id'] ?>" title='Eliminar'><i class="fa fa-trash fa-2x"></i></a>
							<?php } ?>								
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- END TABLE -->
    </div>


</div>
<div class="row pull-right mt-2">
    <div class="col-md-12">
        <button class="btn btn-default m-1 d-none" id="Imprimir">Imprimir</button>
		<?php if ( $_SESSION[SESSIONVAR]['ID_ADSCRIPCION'] == 5 ) { // solo usuarios del c4 ?>
        <button class="btn btn-default m-1" id="Replicar">Replicar</button>
		<?php } ?>
    </div>
</div>

<div class="modal fade" id="imprimir" tabindex="-1" role="dialog" aria-labelledby="Imprimir" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="imprimirLabel">Ingresar datos para oficio</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id='frmAlert' class="alert alert-danger alert-dismissible fade show d-none" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<span id='frmAlertMsg'></span>
				</div>
				<form action="#" id="formImprimir" name="formImprimir" autocomplete="off">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					Tipo de reporte
					<div>
						<select name="optionPDF" id="optionPDF" class="form-control" required>
							<option disabled selected value='-1'>Seleccione una opción</option>
							<option value="PSB">Petición Solicitud de baja</option>
							<option value="PSEC">Petición Solicitud de examen de confianza</option>
							<option value="PSC">Petición Solicitud de curso</option>
							<option value="PCUIP">Petición de CUIP</option>
							<option value="PCA">Petición de cambio de adscripción</option>
							<option value="PSA">Petición solicitud de alta </option>
							<option value="RSB">Respuesta solicitud de baja</option>
							<option value="RSA">Respuesta solicitud de alta</option>
						</select>
					</div>
					<br>
					<div id='dynamicallyContent'></div>
					<br>
					<button class="btn btn-light" id="aceptarFrmImprimir">Aceptar</button>
					<button class="btn btn-light" id="cancelarFrmImprimir" data-dismiss="modal">Cancelar</button>
				</form>

				<div id='containerForms'>
					<!-- Petición Solicitud de baja -->
					<div id="divPSB" class='d-none'>
						<div class="row">
							<div class="col-md-6">
								Nombre de la persona que elaboró la solicitud
							</div>
							<div class="col-md-6">
								<input type="text" id="PSB_PersonaElaboro" name="PSB_PersonaElaboro" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Motivo de baja
							</div>
							<div class="col-md-6">
								<input type="text" id="Motivo_Baja" name="Motivo_Baja" class="form-control" maxlength="60" required>
							</div>
						</div>
					</div>
					<!-- Petición solicitud de examen de confianza -->
					<div id="divPSEC" class='d-none'>
						<div class="row">
							<div class="col-md-6">
								Número de oficio
							</div>
							<div class="col-md-6">
								<input id='PSECNoFolio' name='PSECNoFolio' type="text" class="form-control" maxlength="10" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre a quien va dirigido el oficio
							</div>
							<div class="col-md-6">
								<input id='PSECNombreDestino' name='PSECNombreDestino' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre de quien solicita
							</div>
							<div class="col-md-6">
								<input id='Nombre_De_Quien_Solicita' name='Nombre_De_Quien_Solicita' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Cargo de quien solicita
							</div>
							<div class="col-md-6">
								<input id='Cargo_De_Quien_Solicita' name='Cargo_De_Quien_Solicita' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre del encargado del SESP
							</div>
							<div class="col-md-6">
								<input id='PSECNombreEncargadoSESESP' name='PSECNombreEncargadoSESESP' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">

								Nombre del subcoordinador del SESESP
							</div>
							<div class="col-md-6">
								<input id='PSECNombreSubcoordinadorSESESP' name='PSECNombreSubcoordinadorSESESP' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						
						
					
					</div>
					<!-- Petición Solicitud de curso  -->
					<div id="divPSC" class='d-none'>

						<div class="row">
							<div class="col-md-6">
								Número de oficio
							</div>
							<div class="col-md-6">
								<input id='PSCNoFolio' name='PSCNoFolio' type="text" class="form-control" maxlength="10" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre a quien va dirigido el oficio
							</div>
							<div class="col-md-6">
								<input id='PSCNombreDestino' name='PSCNombreDestino' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre de quien solicita
							</div>
							<div class="col-md-6">
								<input id='PSCNombre_De_Quien_Solicita' name='PSCNombre_De_Quien_Solicita' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Puesto de quien solicita
							</div>
							<div class="col-md-6">
								<input id='PSCPuesto_De_Quien_Solicita' name='PSCPuesto_De_Quien_Solicita' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre del encargado del SESP
							</div>
							<div class="col-md-6">
								<input id='PSCNombreEncargadoSESP' name='PSCNombreEncargadoSESP' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre del subcoordinador del SI
							</div>
							<div class="col-md-6">
								<input id='PSCNombreSubcoordinadorSI' name='PSCNombreSubcoordinadorSI' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
								<div class="col-md-6">
									Nombre del encargado del despacho	
								</div>
								<div class="col-md-6">
									<input type="text" id="PSCNombreEncargadoDespacho" name="PSCNombreEncargadoDespacho" class="form-control" maxlength="60" required>
								</div>
						
						</div>
					</div>
					<!-- Petición de CUIP -->
					<div id="divPCUIP" class='d-none'>
						<div class="row">
							<div class="col-md-6">
								Número de oficio
							</div>
							<div class="col-md-6">
								<input id='CUIPNoFolio' name='CUIPNoFolio' type="text" class="form-control" maxlength="10" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre a quien va dirigido el oficio
							</div>
							<div class="col-md-6">
								<input id='CUIPNombreDestino' name='CUIPNombreDestino' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Fecha en que inició
							</div>
							<div class="col-md-6">
								<input id='CUIPFechaInicio' name='CUIPFechaInicio' type="date" class="form-control"  required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre de quien solicita
							</div>
							<div class="col-md-6">
								<input id='CUIPNombreDGPEP' name='CUIPNombreDGPEP' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Cargo de quien solicita
							</div>
							<div class="col-md-6">
								<input id='CargoDeQuienSolicita' name='CargoDeQuienSolicita' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre del Coordinador de Tecnologías y Proyectos Especiales del C4
							</div>
							<div class="col-md-6">
								<input id='CUIPNombreCoordinadorTyPEc4' name='CUIPNombreCoordinadorTyPEc4' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
					</div>
					<!-- Petición de cambio de adscripción -->
					<div id="divPCA" class='d-none'>
						<div class="row">
							<div class="col-md-6">
								Fecha a dar de baja
							</div>
							<div class="col-md-6">
								<input id='PCAFechaDarBaja' name='PCAFechaDarBaja' type="date" class="form-control"  required>
							</div>
						</div>
					</div>
					<!-- Petición solicitud de alta -->
					<div id="divPSA" class='d-none'>
						<div class="row">
							<div class="col-md-6">
								Número de oficio
							</div>
							<div class="col-md-6">
								<input id='PSANoFolio' name='PSANoFolio' type="text" class="form-control" maxlength="10" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre de quien hizo la petición
							</div>
							<div class="col-md-6">
								<input id='PSANombreRemitentePeticion' name='PSANombreRemitentePeticion' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Puesto
							</div>
							<div class="col-md-6">
								<input id='PSAPuesto' name='PSAPuesto' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre a quien va dirigido
							</div>
							<div class="col-md-6">
								<input id='PSANombreDestinoPeticion' name='PSANombreDestinoPeticion' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Puesto
							</div>
							<div class="col-md-6">
								<input id='PSAPuestoDestinoPeticion' name='PSAPuestoDestinoPeticion' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
							Nombre del encargado del despacho del Secretariado Ejecutivo del SESP
							</div>
							<div class="col-md-6">
								<input id='PSANombreEncargadoDespachoSESESP' name='PSANombreEncargadoDespachoSESESP' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
							Nombre del encargado del SESESP
							</div>
							<div class="col-md-6">
								<input id='PSANombreEncargadoSESESP' name='PSANombreEncargadoSESESP' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
							Nombre del subcoordinador de SESESP
							</div>
							<div class="col-md-6">
								<input id='PSANombreSubSESESP' name='PSANombreSubSESESP' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
					</div>
					<div id="divRSB" class='d-none'>
						<div class="row">
							<div class="col-md-6">
								Número de oficio
							</div>
							<div class="col-md-6">
								<input id='RSBNumeroFolio' name='RSBNumeroFolio' type="text" class="form-control" maxlength="10" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre a quien va dirigido el oficio
							</div>
							<div class="col-md-6">
								<input id='RSBNombreDestino' name='RSBNombreDestino' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Cargo a quien va dirigido el oficio
							</div>
							<div class="col-md-6">
								<input id='RSBCargoDestinoOficio' name='RSBCargoDestinoOficio' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Respuesta al oficio
							</div>
							<div class="col-md-6">
								<input id='RSBRespuestaOficio' name='RSBRespuestaOficio' type="text" class="form-control" maxlength="10" required>
							</div>
						</div>
						<br>
						<!-- <div class="row">
							<div class="col-md-6">
								Año
							</div>
							<div class="col-md-6">
								<input id='RSBAño' name='RSBAño' type="number" class="form-control" maxlength="20" required>
							</div>
						</div> -->
						<br>
						<div class="row">
							<div class="col-md-6">
							Nombre del encargado del despacho del Secretariado Ejecutivo del SESP
							</div>
							<div class="col-md-6">
								<input id='RSBNombreEncargadoDespachoSESP' name='RSBNombreEncargadoDespachoSESP' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre del coordinador de TI SESESP
							</div>
							<div class="col-md-6">
								<input id='RSBNombreCoordinadorTISESESP' name='RSBNombreCoordinadorTISESESP' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre del director general de operaciones e inteligencia SSP
							</div>
							<div class="col-md-6">
								<input id="RSBNombreDirectorGOISSP" name="RSBNombreDirectorGOISSP" type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre del subcoordinador de SI del SESESP
							</div>
							<div class="col-md-6">
								<input id="RSBNombreSubSISESESP" name="RSBNombreSubSISESESP" type="text" class="form-control" maxlength="60" required>
							</div>
						</div>

					</div>
					<div id="divRSA" class='d-none'>
						<div class="row">
							<div class="col-md-6">
								Número de oficio
							</div>
							<div class="col-md-6">
								<input id='RSANumeroFolio' name='RSANumeroFolio' type="text" class="form-control" maxlength="10" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Nombre a quien va dirigido el oficio
							</div>
							<div class="col-md-6">
								<input id='RSANombreDestino' name='RSANombreDestino' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Cargo a quien va dirigido el oficio
							</div>
							<div class="col-md-6">
								<input id='RSACargoDestino' name='RSACargoDestino' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>

						<br>
						<div class="row">
							<div class="col-md-6">
								Respuesta al oficio
							</div>
							<div class="col-md-6">
								<input id='RSARespuestaOficio' name='RSARespuestaOficio' type="text" class="form-control" maxlength="10" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								Fecha en que se hizo la solicitud
							</div>
							<div class="col-md-6">
								<input id='RSAFechaSolicitud' name='RSAFechaSolicitud' type="date" class="form-control"  required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
							Nombre del encargado del Secretariado Ejecutivo del SESESP
							</div>
							<div class="col-md-6">
								<input id='RSANombreEncargadoEjecutivoSESESP' name='RSANombreEncargadoEjecutivoSESESP' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
							Nombre del encargado del despacho
							</div>
							<div class="col-md-6">
								<input id='RSBNombreEncargadoDespachoSESP' name='RSBNombreEncargadoDespachoSESP' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
							Nombre del subcoordinador
							</div>
							<div class="col-md-6">
								<input id='RSBNombreSub' name='RSBNombreSub' type="text" class="form-control" maxlength="60" required>
							</div>
						</div>
						<br>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
</div>
<!-- JS -->
<script src="<?php echo base_url("assets/vendor/datatable/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/dataTables.responsive.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/datatable/responsive.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo base_url('assets/js/utils/catalogs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/index.js') ?>"></script>
<script>
	var replicationResult = '<?php echo $replicationResult; ?>';
	
    $(function() {
        objViewIndex.init();

		objViewIndex.actions.doIntervalReplication();

		if (replicationResult)
			objViewIndex.actions.showReplicationResult(replicationResult);

	});
	
	$("#optionPDF").change(function(){
		var option= $("#optionPDF").val();
		if(option=="PSB"){
			console.log("PSB");
			$("#divPSB").css("display","block");
			$("#divPSC").css("display","none");
			$("#divPSEC").css("display", "none");
			$("#divPCUIP").css("display","none");
			$("#divPCA").css("display","none");
			$("#divPSA").css("display","none");
			$("#divRSB").css("display","none");
			$("#divRSA").css("display","none");
		}
		else if(option=="PSC"){
			$("#divPSB").css("display","none");
			$("#divPSC").css("display","block");
			$("#divPSEC").css("display", "none");
			$("#divPCUIP").css("display","none");
			$("#divPCA").css("display","none");
			$("#divPSA").css("display","none");
			$("#divRSB").css("display","none");
			$("#divRSA").css("display","none");
		}
		else if(option=="PSEC"){
			$("#divPSB").css("display","none");
			$("#divPSC").css("display","none");
			$("#divPSEC").css("display", "block");
			$("#divPCUIP").css("display","none");
			$("#divPCA").css("display","none");
			$("#divPSA").css("display","none");
			$("#divRSB").css("display","none");
			$("#divRSA").css("display","none");
		}
		else if(option=="PCUIP"){
			$("#divPSB").css("display","none");
			$("#divPSC").css("display","none");
			$("#divPSEC").css("display", "none");
			$("#divPCUIP").css("display","block");
			$("#divPCA").css("display","none");
			$("#divPSA").css("display","none");
			$("#divRSB").css("display","none");
			$("#divRSA").css("display","none");
		}
		else if(option=="PCA"){
			$("#divPSB").css("display","none");
			$("#divPSC").css("display","none");
			$("#divPSEC").css("display", "none");
			$("#divPCUIP").css("display","none");
			$("#divPCA").css("display","block");
			$("#divPSA").css("display","none");
			$("#divRSB").css("display","none");
			$("#divRSA").css("display","none");	
		}
		else if(option=="PSA"){
			$("#divPSB").css("display","none");
			$("#divPSC").css("display","none");
			$("#divPSEC").css("display", "none");
			$("#divPCUIP").css("display","none");
			$("#divPCA").css("display","none");
			$("#divPSA").css("display","block");
			$("#divRSB").css("display","none");
			$("#divRSA").css("display","none");
		}
		else if(option=="RSB"){
			$("#divPSB").css("display","none");
			$("#divPSC").css("display","none");
			$("#divPSEC").css("display", "none");
			$("#divPCUIP").css("display","none");
			$("#divPCA").css("display","none");
			$("#divPSA").css("display","none");
			$("#divRSB").css("display","block");
			$("#divRSA").css("display","none");
		}
		else if(option=="RSA"){
			$("#divPSB").css("display","none");
			$("#divPSC").css("display","none");
			$("#divPSEC").css("display", "none");
			$("#divPCUIP").css("display","none");
			$("#divPCA").css("display","none");
			$("#divPSA").css("display","none");
			$("#divRSB").css("display","none");
			$("#divRSA").css("display","block");
		}
	});
</script>
<!-- /JS -->
