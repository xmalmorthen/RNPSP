<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ajaxSerealize extends CI_Controller {

	function __construct()
    {
		parent::__construct();		
	}
	
	public function ajaxSaveProgress(){
		if (!$this->input->is_ajax_request()) {
			redirect('Error/e404','location');
        }
		if (!$this->input->post()) {
			redirect('Error/e404','location');
        }

        $responseModel = array ( 
            'status' => false,
            'message' => 'No especificado'
        );

		$model = array();
		parse_str($_POST["model"], $model);

		try {
			if (!isset($model['current_url'])){
				throw new Exception('Falta especificar la URL para serializar');
			}

			$serialized = new Serialized();
			// SEREALIZAR MODELO
			$isSerialized = $serialized->save($this->session->userdata(SESSIONVAR)['IdUsuario'],$model['current_url'],$model);
			if (!$isSerialized){
				throw new Exception('Error al guardar avance, favor de intentarlo de nuevo');
			}

			$responseModel = array ( 
				'status' => TRUE,
				'message' => 'Éxito'
			);
		} catch (Exception $e) {
			$responseModel['message'] = $e->getMessage();
		}
		
        header('Content-type: application/json');
        echo json_encode( $responseModel );
        exit;
	}	

	public function ajaxGetProgress(){
		if (!$this->input->is_ajax_request()) {
			redirect('Error/e404','location');
        }
		if (!$this->input->post()) {
			redirect('Error/e404','location');
        }

        $responseModel = array ( 
            'status' => false,
            'message' => 'No especificado'
        );

		$model = $_POST["model"];

		try {
			if (!isset($model)){
				throw new Exception('Falta especificar la URL para serializar');
			}

			$serialized = new Serialized();

			// SEREALIZAR MODELO
			$serialized = $serialized->get($this->session->userdata(SESSIONVAR)['IdUsuario'],$model);
			if (!$serialized){
				throw new Exception('Error al obtener información del formulario, favor de intentarlo de nuevo');
			}

			$responseModel = array ( 
				'status' => TRUE,
				'message' => 'Éxito',
				'serializedData' => $serialized
			);
		} catch (Exception $e) {
			$msg = utf8_decode($e->getMessage());
			header("HTTP/1.0 500 {$msg}");
			$responseModel['message'] = $e->getMessage();
		}
		
        header('Content-type: application/json');
        echo json_encode( $responseModel );
        exit;
	}
}
