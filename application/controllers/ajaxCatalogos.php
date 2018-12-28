<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ajaxCatalogos extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->model('Principal_model');
	}
	
	public function index()
	{
		$query = $this->input->get('qry');
		
		if (! $this->input->is_ajax_request()) {
			if (ENVIRONMENT == 'production') redirect('Error/e404','location');
        }		

		try {
			if(!$query){
				throw new Exception('Parámetros incorrectos');
			}

			$deCrypt = $this->_deCrypt($query);

			if (!$deCrypt){
				throw new rulesException('Cadena inválida');
			}

			$this->load->model("catalogos/ajaxCatalogos_model",'catalogo');

			$response = $this->catalogo->get($deCrypt);

			if ($response) {
				$responseModel = $response;
			}
		} 
		catch (rulesException $e){	
			header("HTTP/1.0 400 Bad Request");
		}
		catch (Exception $e) {
			header("HTTP/1.0 500 Internal Server Error");
			$responseModel = [];
		}
		
		//$this->output->set_header('Content-type: application/json');
		header('Content-type: application/json');

        echo json_encode( [ 'results' => $responseModel ] );
        exit;
	}

	private function _crypt($cad){
		return base64_encode($this->encrypt->encode($cad));
	}

	public function crypt($cad = NULL){
		$cad = $cad ? $cad : ($this->input->get('cad') ? $this->input->get('cad') : NULL);
		if (!$cad) 
			show_error("Petición erronea [ {$this->config->item('GUID')} ]", 400, 'Ocurrió un error');

		$crypt = $this->_crypt($cad);

		header('Content-type: application/json');
		echo json_encode( 
		[ 
		$cad => $crypt
		]);
		exit;
	}

	private function _deCrypt($cad){
		return $this->encrypt->decode(base64_decode($cad));
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
