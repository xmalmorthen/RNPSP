<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ajaxCatalogos extends CI_Controller {

	function __construct()
    {
		parent::__construct();		
	}
	
	public function index(){
		$query = $this->input->get('qry');
		$params = $this->input->get('params');
		
		if (! $this->input->is_ajax_request()) {
			if (ENVIRONMENT == 'production') redirect('Error/e404','location');
        }		

		try {
			if(!$query){
				throw new Exception('Parámetros incorrectos');
			}

			$deCrypt = Utils::deCrypt($query);

			if (!$deCrypt){
				throw new rulesException('Cadena inválida');
			}

			$this->load->model("catalogos/ajaxCatalogos_model",'catalogo');

			$fullQry = $deCrypt . ($params ? ' where ' . $params : '');

			$response = $this->catalogo->get($fullQry);

			$responseModel = $response;
		} 
		catch (rulesException $e){	
			header("HTTP/1.0 400 Bad Request");
		}
		catch (Exception $e) {
			header("HTTP/1.0 500 Internal Server Error");
			$responseModel = [];
		}
		
		header('Content-type: application/json');

        echo json_encode( [ 'results' => $responseModel ] );
        exit;
	}

	public function crypt($cad = NULL){
		$cad = $cad ? $cad : ($this->input->get('cad') ? $this->input->get('cad') : NULL);
		if (!$cad) 
			show_error("Petición erronea [ {$this->config->item('GUID')} ]", 400, 'Ocurrió un error');

		$crypt = Utils::crypt($cad);

		header('Content-type: application/json');
		echo json_encode( 
		[ 
		$cad => $crypt
		]);
		exit;
	}

	public function deCrypt($cad = NULL){
		$cad = $cad ? $cad : ($this->input->get('cad') ? $this->input->get('cad') : NULL);
		if (!$cad) 
			show_error("Petición erronea [ {$this->config->item('GUID')} ]", 400, 'Ocurrió un error');
	
		$deCrypt = $this->_deCrypt($cad);

		header('Content-type: application/json');
		echo json_encode( [ $cad => $deCrypt ]);
		exit;
	}
}
