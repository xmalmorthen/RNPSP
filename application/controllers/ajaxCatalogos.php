<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ajaxCatalogos extends CI_Controller {

	function __construct()
    {
		parent::__construct();    
		$this->load->model('Principal_model');
	}
	
	public function index()
	{
		$query = $this->input->get('qry'); //'select ID_ACADEMIA as id, DESCRIPCION as text from CAT_ACADEMIA';
		//$query = 'select ID_ACADEMIA as id, DESCRIPCION as text from CAT_ACADEMIA';

		if (! $this->input->is_ajax_request()) {
			if (ENVIRONMENT == 'production') redirect('Error/e404','location');
        }		

		try {
			if(!$query){
				throw new Exception('Parámetros incorrectos');
			}

			$this->load->model("catalogos/ajaxCatalogos_model",'catalogo');

			$response = $this->catalogo->get($query);

			if ($response) {
				$responseModel = $response;
			}
		} catch (Exception $e) {
			$responseModel = [];
		}
		
        header('Content-type: application/json');
        echo json_encode( [ 'results' => $responseModel ] );
        exit;
	}
}
