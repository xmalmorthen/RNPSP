<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ajaxAPIs extends CI_Controller {

	function __construct()
    {
		parent::__construct();		
	}
	
	public function CURP(){
		$model = $this->input->get('model');
		$curp = $model['CURP'];
		if (!$curp) 
			$curp = $this->input->get('CURP');

		if (! $this->input->is_ajax_request()) {
			if (ENVIRONMENT == 'production') redirect('Error/e404','location');
        }
		$responseModel = null;
		try {
			if(!$curp){
				throw new processException('Parámetros incorrectos',400);
			}

			if (strlen($curp) < 18 || strlen($curp) > 20)
				throw new rulesException('Formato de CURP inválido',400);
			
			// $this->load->spark('restclient/2.1.0');
			// $this->load->library('rest');

			// $cnfg = (object)json_decode(CNFG);

			// $config = array(
			// 	'server' 			=> $cnfg->apis->wsCURPServer,
			// 	'ssl_verify_peer' 	=> FALSE,
			// 	'http_auth' 		=> 'basic',
			// 	'http_user' 		=> $cnfg->apis->wsCURPUser,
			// 	'http_pass' 		=> $cnfg->apis->wsCURPPwd
			// );

			// $parameters = array(
			// 	'curp' => strtoupper($curp)
			// );

			// $this->rest->initialize($config);
			// $wsResponse = $this->rest->get($cnfg->apis->wsCURPApiVersion . $cnfg->apis->wsCURPGetbyCURPMethod, $parameters, 'json');

			$this->load->model('CURP_model');
			$resp = $this->CURP_model->get(trim($curp));
			if($resp['status'] == false){
				throw new processException($resp['message'],400);
				$responseModel = [];
			}else{
				$resp['Response'] = $resp['data'];
				$responseModel = $resp;
			}
			// if ($this->curl->error_string){
			// 	throw new processException($this->curl->error_string,$this->rest->status());
			// } else if (!$wsResponse) {
			// 	throw new processException("El servicio respondió con un estatus [{$this->rest->status()}], no fue posible obtener la información", $this->rest->status());
			// } else {
			// 	if ($wsResponse->RESTService->StatusCode === '0')
			// 		throw new processException($wsResponse->RESTService->Message,400);
			// }

			// $responseModel = $wsResponse->Response;
		} 
		catch (rulesException $e){	
			header("HTTP/1.0 400 Bad Request");
		}
		catch (processException $e){	
			header("HTTP/1.0 " . $e->getCode() . " " . utf8_decode($e->getMessage()));
		}
		catch (Exception $e) {
			header("HTTP/1.0 500 " . utf8_decode($e->getMessage()));
			$responseModel = [];
		}
		header('Content-type: application/json');
        echo json_encode( $responseModel );
        exit;
	}

	public function vwGetAllCatNames(){
		if (! $this->input->is_ajax_request()) {
			if (ENVIRONMENT == 'production') redirect('Error/e404','location');
        }
		
		$responseModel = null;
		try {
			$this->load->model('ajaxAPIs_model');
			$responseModel = $this->ajaxAPIs_model->vwGetAllCatNames();
			
		} 
		catch (rulesException $e){	
			header("HTTP/1.0 400 Bad Request");
		}
		catch (processException $e){	
			header("HTTP/1.0 " . $e->getCode() . " " . utf8_decode($e->getMessage()));
		}
		catch (Exception $e) {
			header("HTTP/1.0 500 Internal Server Error");
			$responseModel = [];
		}
		
		header('Content-type: application/json');

        echo json_encode( $responseModel );
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
