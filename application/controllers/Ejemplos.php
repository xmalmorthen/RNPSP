<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ejemplos extends CI_Controller {

	function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
		$this->load->model('Ejemplos_model');
	}
	
	public function ejemplo1(){
		// BREADCRUMB

		$response = $this->Ejemplos_model->tmpTestXmal();
		Utils::pre($response);
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Ejemplos');
		// /TITLE BODY PAGE
		
		$model = [];
		try {
			// FIND SERIALIZED MODEL			
			$serialized = new Serialized();			
			$isSerialized = $serialized->exist($this->session->userdata(SESSIONVAR)['IdUsuario'],current_url());
			$this->session->set_flashdata('isSerializedFORM',$isSerialized);

			//

			$this->load->model('catalogos/CAT_ACADEMIA_model');

			// $response = $this->CAT_ACADEMIA_model->getById(1);
			// $response = $this->CAT_ACADEMIA_model->getByField([
			// 	'ID_ACADEMIA' => '1',
			// 	'DESCRIPCION' => 'INSTITUTO DE FORMACION EN AGUASCALIENTES'
			// ]);

			$model['data']['catalogs'] = [
				'CAT_ACADEMIA' => $this->CAT_ACADEMIA_model->get()
			];

			//die(var_dump($model->data->catalogs));

		} catch(Exception $e){		
			Msg_reporting::setOutputError($e->getMessage());
		}

		$this->load->view('Ejemplos/ejemplo1View',$model);
	}

	public function ajaxGetSample(){
		if (! $this->input->is_ajax_request()) {
			if (ENVIRONMENT == 'production') redirect('Error/e404','location');
        }

		// header("HTTP/1.0 400 Bad Request");
		header('Content-type: application/json');
        echo json_encode( [ 'results' => 'Prueba de respuesta ajax' ] );
        exit;		
		
	}
}