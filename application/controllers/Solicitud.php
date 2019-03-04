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
		
			//MODELO DE PRUEBA
			$model = [];
			$items = [];
			for ($i=1; $i <=1000 ; $i++) { 
				$item = array(
					'folio' => 'folio ' . $i,
					'Nombre' => 'Nombre ' . $i,
					'ApellidoPaterno' => 'Ap1 ' . $i,
					'ApellidoMaterno' => 'Ap2 ' . $i,
					'FechadeRegistro' => date('m/d/Y'),
					'TipodeSolicitud' => 'Solicitud ' . $i,
					'Estatus' => 'Estatus ' . $i,
					'options' => array(
						'id' => $i
					)
				);
				array_push( $items, $item );
			};
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
        
        public function ajaxGetSolicitudByCURP($CURP = NULL){
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
				
				//TODO: Tamata - Implementar la consulta para obtener datos de registro
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 Bad Request");
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

		public function ajaxGetSolicitudById($Id = NULL){
			if (!$Id)
				$Id = $this->input->get('Id');
		
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

			$responseModel = NULL;
			try {
				if(!$Id){
					throw new rulesException('Parámetros incorrectos');
				}
				
				$responseModel = true;
				//TODO: Tamata - Implementar la consulta para obtener datos de registro
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 Bad Request");
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
				
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->addNivelEstudios($model);
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
				$responseModel = $this->SOLICITUD_model->addDomicilio($model);
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
				$responseModel = $this->SOLICITUD_model->addReferencias($model);
				
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
				$responseModel = $this->SOLICITUD_model->addSocioEconomico($model);
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
				$responseModel = $this->SOLICITUD_model->addDependiente($model);
				Utils::pre($responseModel);
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
				$responseModel = $this->SOLICITUD_model->sp_B2_LAB_addEmpleoSeg($model);
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
				if (!$this->input->post())
					throw new rulesException('Petición inválida');

				$model = [];
				parse_str($_POST["model"], $model);
				
				//TODO: Tamata - Implementar

				$responseModel['status'] = true;
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
    }