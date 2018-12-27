<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
		$this->load->model('Principal_model');
	}
	
	public function index()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Página principal');
		// /TITLE BODY PAGE
		
		$model = [];
		try {
			//$response = $this->Principal_model->tmpTestXmal();

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

		$this->load->view('Principal/principalView',$model);
	}
}
