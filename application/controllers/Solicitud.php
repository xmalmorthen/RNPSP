<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Solicitud extends CI_Controller {
        function __construct()
        {
            parent::__construct();    
            $this->load->library('breadcrumbs');
        }

		public function index(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
			$this->breadcrumbs->push('[ Solicitudes ] - Solicitudes - Persona - Alta', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Solicitudes ] - Solicitudes - Persona - Alta');
			// /TITLE BODY PAGE
			$this->load->model('SOLICITUD_model');
			$solicitudesList = $this->SOLICITUD_model->get();
			$model = [];
			$items = [];
			if(is_array($solicitudesList)){
				foreach ($solicitudesList as $value) {
					$item = array(
						'folio' => $value['FOLIO'],
						'Nombre' => $value['NOMBRE'],
						'ApellidoPaterno' => $value['PATERNO'],
						'ApellidoMaterno' => $value['MATERNO'],
						'FechadeRegistro' => $value['FECHA_REGISTRO'],
						'TipodeSolicitud' => $value['TIPO_OPERACION'],
						'Estatus' => $value['ESTATUS'],
						'options' => array(
							'id' => $value['FOLIO']
						)
					);
					array_push( $items, $item );	
				}
			}
			
			$model['items'] = $items;
			$this->load->view('Solicitud/index',$model);
        }

        public function Alta(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Solicitudes ] - Solicitudes - Persona - Alta', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Solicitudes ] - Solicitudes - Persona - Alta');
			// /TITLE BODY PAGE
			
			// FORM MODE
			$this->session->set_flashdata('formMode','add'); //MODO REGISTRO
			$this->load->view('Solicitud/Registro');
        }
		
		public function Modificar($id = null){
			if (!$id)
				show_error('Parámetros incorrecto', 403, 'Error en la petición');

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Solicitudes ] - Solicitudes - Modificar', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Solicitudes ] - Solicitudes - Modificar');
			// /TITLE BODY PAGE
		
			// FORM MODE
			$this->session->set_flashdata('formMode','edit'); //MODO EDICIÓN

			$this->load->view('Solicitud/Registro',array('id' => $id));
		}
		
        public function Ver(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Solicitudes ] - Solicitudes  - Ver', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Solicitudes ] - Solicitudes - Ver');
			// /TITLE BODY PAGE
		
			$this->load->view('Solicitud/Ver');
        }
        
        public function ajaxGetSolicitudByCURP($CURP = null){
			if (!$CURP)
				$CURP = $this->input->get('CURP');
		
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}		


			$responseModel = NULL;
			try {
				if(!$CURP){
					throw new rulesException('Parámetros incorrectos');
				}
				
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_validaCURP($CURP);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		public function ajaxGetSolicitudById($idRef = null){
			if (!$idRef)
				$idRef = $this->input->get('idRef');
		
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = NULL;
			try {
				if(!$idRef){
					throw new rulesException('Parámetros incorrectos');
				}
				
				$responseModel = false;
				//TODO: Tamata - Implementar la consulta para obtener datos de registro
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		//DATOS GENERALES SECTION
		public function ajaxSaveDatosGeneralesDatosPersonales(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->addDatosPersonales($model);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		public function ajaxSaveDatosGeneralesGenerarCIB(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B1_addPersonaCIB($model);
				
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		public function ajaxSaveDatosGeneralesDesarrolloacademico(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				/*
				*ALGUNOS DATOS ESTAN INCOMPLETOS
				*SE DEJO EL ID ALTENA FIJO
				*/
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B1_addNivelEstudios($model);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		public function ajaxSaveDatosGeneralesDomicilio(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B1_addDomicilio($model);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}
		
		public function ajaxSaveDatosGeneralesReferencia(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B2_DG_addReferencias($model);
				
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		public function ajaxSaveDatosGeneralesSocioeconomico(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B2_DG_addSocioEconomico($model);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		public function ajaxSaveDatosGeneralesDependiente(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B2_DG_addDependiente($model);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		//LABORAL SECTION
		public function ajaxSaveLaboralAdscripcion(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B1_addAdscripcion($model);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}
		
		public function ajaxSaveLaboralEmpleo(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B2_LAB_addEmpleoAdicional($model);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		public function ajaxSaveLaboralActitud(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B2_LAB_addActitud($model);
				
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		public function ajaxSaveLaboralComision(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B2_LAB_addComision($model);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		//CAPACITACION SECTION
		public function ajaxSaveCapacitacionIdioma(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				
				//TODO: Tamata - Implementar

				$responseModel['status'] = false;
				$responseModel['message'] = 'Método no implementado';				
				$responseModel['data'] = [];
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}
		
		public function ajaxSaveCapacitacionHabilidad(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				
				//TODO: Tamata - Implementar

				$responseModel['status'] = false;
				$responseModel['message'] = 'Método no implementado';				
				$responseModel['data'] = [];
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		//IDENTIFICACIÓN SECTION
		public function ajaxSaveIdentificacionMediafiliacion(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				
				//TODO: Tamata - Implementar

				$responseModel['status'] = false;
				$responseModel['message'] = 'Método no implementado';				
				$responseModel['data'] = [];
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		public function ajaxSaveIdentificacionSenia(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				
				//TODO: Tamata - Implementar

				$responseModel['status'] = false;
				$responseModel['message'] = 'Método no implementado';				
				$responseModel['data'] = [];
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		public function ajaxSaveIdentificacionFicha(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				$filesCount = count($_FILES['fichaFotografica']['name']);
				$errors = array();
				$files = array();

				if($filesCount == 0)
					throw new rulesException('No se encontraron archivos para guardar');

				foreach ($_FILES['fichaFotografica']['name'] as $key => $value) {
					$_FILES['_fichaFotografica']['name']      = $_FILES['fichaFotografica']['name'][$key];
					$_FILES['_fichaFotografica']['type']      = $_FILES['fichaFotografica']['type'][$key];
					$_FILES['_fichaFotografica']['tmp_name']  = $_FILES['fichaFotografica']['tmp_name'][$key];
					$_FILES['_fichaFotografica']['error']     = $_FILES['fichaFotografica']['error'][$key];
					$_FILES['_fichaFotografica']['size']      = $_FILES['fichaFotografica']['size'][$key];

					$config['upload_path']          = STATIC_DOCUMMENTS_PATH . 'fichaFotografica';
					$config['allowed_types']        = 'jpg|jpeg|png';
					$config['max_size']             = 10240;
					$config['max_width']            = 0;
					$config['max_height']           = 0;
					$config['encrypt_name']         = TRUE;

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('_fichaFotografica'))
					{
						array_push($errors,array('idDoc' => $key, 'error' => $this->upload->display_errors('', '')));
						$this->upload->error_msg = [];
						
					} else {
						$fileInfo = $this->upload->data();
						$data = array(
							"originalName" => $_FILES['_fichaFotografica']['name'],
							"name" => $fileInfo['file_name'], 
							"idDoc" => $key
						);
						array_push($files,$data);
					}
				}

				if (count($errors) == 0) {
					$outputMSG = "";

					//TODO: Tamata - Implementar el guardado de las referencias de archivos.
					// La variable [ $files ] contiene la lista de archivos subidos
					// La variable POST $this->input->post("pID_ALTERNA") contiene el ID_ALTERNA

					$responseModel['status'] = false;
					$responseModel['message'] = 'Método no implementado';
					$responseModel['data'] = [];

				} else {
					$responseModel['message'] = 'Error al intentar guardar';
					$responseModel['data'] = $errors;
				}				
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		public function ajaxSaveIdentificacionRegistrodecadactilar(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				$filesCount = count($_FILES['fichaDecadactilar']['name']);
				$errors = array();
				$files = array();

				if($filesCount == 0)
					throw new rulesException('No se encontraron archivos para guardar');
					

				foreach ($_FILES['fichaDecadactilar']['name'] as $key => $value) {
					$_FILES['_fichaDecadactilar']['name']      = $_FILES['fichaDecadactilar']['name'][$key];
					$_FILES['_fichaDecadactilar']['type']      = $_FILES['fichaDecadactilar']['type'][$key];
					$_FILES['_fichaDecadactilar']['tmp_name']  = $_FILES['fichaDecadactilar']['tmp_name'][$key];
					$_FILES['_fichaDecadactilar']['error']     = $_FILES['fichaDecadactilar']['error'][$key];
					$_FILES['_fichaDecadactilar']['size']      = $_FILES['fichaDecadactilar']['size'][$key];

					$config['upload_path']          = STATIC_DOCUMMENTS_PATH . 'fichaDecadactilar';
					$config['allowed_types']        = 'jpg|jpeg|png|pdf';
					$config['max_size']             = 10240;
					$config['max_width']            = 0;
					$config['max_height']           = 0;
					$config['encrypt_name']         = TRUE;

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('_fichaDecadactilar'))
					{
						array_push($errors,array('idDoc' => $key, 'error' => $this->upload->display_errors('', '')));
						$this->upload->error_msg = [];
						
					} else {
						$fileInfo = $this->upload->data();
						$data = array(
							"originalName" => $_FILES['_fichaDecadactilar']['name'],
							"name" => $fileInfo['file_name'], 
							"idDoc" => $key
						);
						array_push($files,$data);
					}
				}

				if (count($errors) == 0) {
					$outputMSG = "";

					//TODO: Tamata - Implementar el guardado de las referencias de archivos.
					// La variable [ $files ] contiene la lista de archivos subidos
					// La variable POST $this->input->post("pID_ALTERNA") contiene el ID_ALTERNA

					$responseModel['status'] = false;
					$responseModel['message'] = 'Método no implementado';
					$responseModel['data'] = [];

				} else {
					$responseModel['message'] = 'Error al intentar guardar';
					$responseModel['data'] = $errors;
				}				
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}
		
		public function ajaxSaveIdentificacionDocumento(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				$filesCount = count($_FILES['fichaDocumento']['name']);
				$errors = array();
				$files = array();

				if($filesCount == 0)
					throw new rulesException('No se encontraron archivos para guardar');
					

				foreach ($_FILES['fichaDocumento']['name'] as $key => $value) {
					$_FILES['_fichaDocumento']['name']      = $_FILES['fichaDocumento']['name'][$key];
					$_FILES['_fichaDocumento']['type']      = $_FILES['fichaDocumento']['type'][$key];
					$_FILES['_fichaDocumento']['tmp_name']  = $_FILES['fichaDocumento']['tmp_name'][$key];
					$_FILES['_fichaDocumento']['error']     = $_FILES['fichaDocumento']['error'][$key];
					$_FILES['_fichaDocumento']['size']      = $_FILES['fichaDocumento']['size'][$key];

					$config['upload_path']          = STATIC_DOCUMMENTS_PATH . 'fichaDocumento';
					$config['allowed_types']        = 'jpg|jpeg|png|pdf';
					$config['max_size']             = 10240;
					$config['max_width']            = 0;
					$config['max_height']           = 0;
					$config['encrypt_name']         = TRUE;

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('_fichaDocumento'))
					{
						array_push($errors,array('idDoc' => $key, 'error' => $this->upload->display_errors('', '')));
						$this->upload->error_msg = [];
						
					} else {
						$fileInfo = $this->upload->data();
						$data = array(
							"originalName" => $_FILES['_fichaDocumento']['name'],
							"name" => $fileInfo['file_name'], 
							"idDoc" => $key
						);
						array_push($files,$data);
					}
				}

				if (count($errors) == 0) {
					$outputMSG = "";

					//TODO: Tamata - Implementar el guardado de las referencias de archivos.
					// La variable [ $files ] contiene la lista de archivos subidos
					// La variable POST $this->input->post("pID_ALTERNA") contiene el ID_ALTERNA

					$responseModel['status'] = false;
					$responseModel['message'] = 'Método no implementado';
					$responseModel['data'] = [];

				} else {
					$responseModel['message'] = 'Error al intentar guardar';
					$responseModel['data'] = $errors;
				}				
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		public function ajaxSaveIdentificacionVoz(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = [
				'status' => false,
				'message'=> '',
				'data'=> null
			];

			try {
				$filesCount = count($_FILES['fichaVoz']['name']);
				$errors = array();
				$files = array();

				if($filesCount == 0)
					throw new rulesException('No se encontraron archivos para guardar');
					

				foreach ($_FILES['fichaVoz']['name'] as $key => $value) {
					$_FILES['_fichaVoz']['name']      = $_FILES['fichaVoz']['name'][$key];
					$_FILES['_fichaVoz']['type']      = $_FILES['fichaVoz']['type'][$key];
					$_FILES['_fichaVoz']['tmp_name']  = $_FILES['fichaVoz']['tmp_name'][$key];
					$_FILES['_fichaVoz']['error']     = $_FILES['fichaVoz']['error'][$key];
					$_FILES['_fichaVoz']['size']      = $_FILES['fichaVoz']['size'][$key];

					$config['upload_path']          = STATIC_DOCUMMENTS_PATH . 'fichaVoz';
					$config['allowed_types']        = 'mp3';
					$config['max_size']             = 10240;
					$config['max_width']            = 0;
					$config['max_height']           = 0;
					$config['encrypt_name']         = TRUE;

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('_fichaVoz'))
					{
						array_push($errors,array('idDoc' => $key, 'error' => $this->upload->display_errors('', '')));
						$this->upload->error_msg = [];
						
					} else {
						$fileInfo = $this->upload->data();
						$data = array(
							"originalName" => $_FILES['_fichaVoz']['name'],
							"name" => $fileInfo['file_name'], 
							"idDoc" => $key
						);
						array_push($files,$data);
					}
				}

				if (count($errors) == 0) {
					$outputMSG = "";

					//TODO: Tamata - Implementar el guardado de las referencias de archivos.
					// La variable [ $files ] contiene la lista de archivos subidos
					// La variable POST $this->input->post("pID_ALTERNA") contiene el ID_ALTERNA

					$responseModel['status'] = false;
					$responseModel['message'] = 'Método no implementado';
					$responseModel['data'] = [];

				} else {
					$responseModel['message'] = 'Error al intentar guardar';
					$responseModel['data'] = $errors;
				}				
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		/*
		* XMAL obtener datos pestaña "DATOS GELERALES" -> "Desarrollo academico"
		* get getNivelEstudios pID_ALTERNA,pCURP
		*/
		public function getNivelEstudios(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}
			$idAlterna = $this->input->get('pID_ALTERNA');
			$curp = $this->input->get('pCURP');
			try {
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B1_getNivelEstudios($idAlterna,$curp);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		/*
		* XMAL obtener datos pestaña "DATOS GELERALES" -> "Domicilio"
		* get getDomicilio pID_ALTERNA,pCURP
		*/
		public function getDomicilio(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}
			$idAlterna = $this->input->get('pID_ALTERNA');
			$curp = $this->input->get('pCURP');
			try {
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B1_getDomicilio($idAlterna,$curp);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		/*
		* XMAL obtener datos pestaña "DATOS GELERALES" -> "Referencia"
		* get getReferencias pID_ALTERNA,pCURP
		*/
		public function getReferencias(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}
			$idAlterna = $this->input->get('pID_ALTERNA');
			$curp = $this->input->get('pCURP');
			try {
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B2_DG_getReferencias($idAlterna,$curp);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		/*
		* XMAL obtener datos pestaña "DATOS GELERALES" -> "Socioeconómicos"
		* get getSocioEconomico pID_ALTERNA,pCURP
		*/
		public function getSocioEconomico(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}
			$idAlterna = $this->input->get('pID_ALTERNA');
			$curp = $this->input->get('pCURP');
			try {
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B2_DG_getSocioEconomico($idAlterna,$curp);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		/*
		* XMAL obtener datos pestaña "DATOS GELERALES" -> "Dependientes económicos"
		* get getDependientes pID_ALTERNA,pCURP
		*/
		public function getDependientes(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}
			$idAlterna = $this->input->get('pID_ALTERNA');
			$curp = $this->input->get('pCURP');
			try {
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B2_DG_getDependientes($idAlterna,$curp);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}
		
		/*
		* XMAL obtener datos pestaña "Laboral" -> "Adscripción actual"
		* get getAdscripcion pID_ALTERNA,pCURP
		# ejemplo: http://localhost/SGP/Solicitud/getAdscripcion?pID_ALTERNA=56
		*/
		public function getAdscripcion(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}
			$idAlterna = $this->input->get('pID_ALTERNA');
			$curp = $this->input->get('pCURP');
			try {
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B1_getAdscripcion($idAlterna,$curp);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		/*
		* XMAL obtener datos pestaña "Laboral" -> "Empleos diversos"
		* get sp_B1_getAdscripcion pID_ALTERNA,pCURP
		# EJEMPLO: http://localhost/SGP/Solicitud/getEmpleoAdicional?pID_ALTERNA=56
		*/
		public function getEmpleoAdicional(){
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}
			$idAlterna = $this->input->get('pID_ALTERNA');
			$curp = $this->input->get('pCURP');
			try {
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_B2_LAB_getEmpleoAdicional($idAlterna,$curp);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

    }