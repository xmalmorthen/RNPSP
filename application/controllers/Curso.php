<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Curso extends CI_controller{
        function __construct(){
            parent::__construct();
            $this->load->library("breadcrumbs");
        }
        
        function index(){
            // BREADCRUMB
            $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
            $this->breadcrumbs->push('[ Curso ] - Curso - Administración de curso', site_url('alta/cedula/datosPersonales'));
            // /BREADCRUMB
        
            // TITLE BODY PAGE
            $this->session->set_flashdata('titleBody','[ Curso ] - Curso - Administración de curso');
            // /TITLE BODY PAGE

            $this->load->model('SOLICITUD_model');
			$solicitudesList = $this->SOLICITUD_model->get();
			
            $model = [];
			$items = [];

			if(is_array($solicitudesList)){
				foreach ($solicitudesList as $value) {
					$item = array(
						'Nombre' => $value['NOMBRE'],
						'ApellidoPaterno' => $value['PATERNO'],
						'ApellidoMaterno' => $value['MATERNO'],
						'Adscripcion' => $value['NOMBRE_DPCIA'],
						'Estatus' => $value['DESCRIPCION_ESTATUS'],
						'options' => array(
							'id' => $value['FOLIO'],
                            'ads' => $value['ID_DEPENDENCIA']
						)
					);
					array_push( $items, $item );	
				}
			}
			
			$model['items'] = $items;
            $this->load->view("Curso/administrarCurso",$model);
        }

        function validar($id = null, $ads = null){
            if (!$id || !$ads)
				show_error('Parámetros incorrecto', 403, 'Error en la petición');

            // BREADCRUMB
            $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
            $this->breadcrumbs->push('[ Curso ] - Curso - Formulario de curso', site_url('alta/cedula/datosPersonales'));
            // /BREADCRUMB

            $this->load->model('CURSO_model');
            $responseModel = $this->CURSO_model->getInfo($id);

            $model = [
                'pID_ALTERNA' => $id,
                'pID_DEPENDENCIA' => $ads,
                'pCURP' => $responseModel['status'] ? $responseModel['data']['CURP'] : '-',
                'pCUIP' => $responseModel['status'] ? $responseModel['data']['CUIP'] : '-',
                'pNOMBRE' => $responseModel['status'] ? $responseModel['data']['NOMBRE'] : '-',
                'pPATERNO' => $responseModel['status'] ? $responseModel['data']['PATERNO'] : '-',
                'pMATERNO' => $responseModel['status'] ? $responseModel['data']['MATERNO'] : '-',
                'pFECHA_NAC' => $responseModel['status'] ? $responseModel['data']['FECHA_NAC'] : '-',
                'pRFC' => $responseModel['status'] ? $responseModel['data']['RFC'] : '-'
            ];

            // TITLE BODY PAGE
            $this->session->set_flashdata('titleBody','[ Curso ] - Curso - Formulario de curso');
            // /TITLE BODY PAGE
            $this->load->view("Curso/formularioCurso", $model);
        }

        function ajaxValidar(){
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
				$responseModel = $this->CURSO_model->validar($model);

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