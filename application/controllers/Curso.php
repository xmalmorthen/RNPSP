<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Curso extends CI_controller{
        function __construct(){
            parent::__construct();
            $this->load->library("breadcrumbs");
            $this->checkAccess();
        }

        private function checkAccess(){
            if ( $_SESSION[SESSIONVAR]['idTipoUsuario'] != 1 && $_SESSION[SESSIONVAR]['idTipoUsuario'] != 5 ){ // solo usuario superadmin y capacitador
                redirect('Error/noPrivilegio');
            }
        }

        function index(){
            // BREADCRUMB
            $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
            $this->breadcrumbs->push('[ Curso ] - Curso - Formulario de curso', site_url('curso'));
            // /BREADCRUMB
        
            // TITLE BODY PAGE
            $this->session->set_flashdata('titleBody','[ Curso ] - Curso - Administración de curso');
            // /TITLE BODY PAGE
            
            $this->load->view("Curso/formularioCurso");
        }
        
        function ajaxGetData($CURP = null){
            if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}

            if (!$CURP)
				$CURP = $this->input->get('CURP');

            $responseModel = NULL;
			try {
				
				if(!$CURP){
					throw new rulesException('Parámetros incorrectos');
				}
				                
				$this->load->model('CURSO_model');
				$responseModel = $this->CURSO_model->sp_getDatosPersonaCurso($CURP);

			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
                Msg_reporting::error_log($e);
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 " . utf8_decode($e->getMessage()));
                Msg_reporting::error_log($e);
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;

        }

        function ajaxSaveCurso(){
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
				                
				$this->load->model('CURSO_model');
				$responseModel = $this->CURSO_model->sp_addRegistroCurso($model);

			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 " . utf8_decode($e->getMessage()));
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
            
        }

        
    }