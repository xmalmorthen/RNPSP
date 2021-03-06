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
			
			if (strlen($curp) < 18 || strlen($curp) > 20){
				throw new rulesException('Formato de CURP inválido',400);
			}
			
			$cnfg = (object)json_decode(CNFG);	
			if(strtolower($cnfg->apis->wsCURPMetod) == 'rest'){
				$this->load->spark('restclient/2.1.0');
				$this->load->library('rest');

				$config = array(
					'server' 			=> $cnfg->apis->wsCURPServer,
					'ssl_verify_peer' 	=> FALSE,
					'http_auth' 		=> 'basic',
					'http_user' 		=> $cnfg->apis->wsCURPUser,
					'http_pass' 		=> $cnfg->apis->wsCURPPwd
				);
				$parameters = array(
					'curp' => strtoupper($curp)
				);

				$this->rest->initialize($config);
				$wsResponse = $this->rest->get($cnfg->apis->wsCURPApiVersion . $cnfg->apis->wsCURPGetbyCURPMethod, $parameters, 'json');

				if (!$wsResponse){
					Msg_reporting::error_log(json_encode([$this->curl->error_string, $this->rest->status()]));
					throw new processException('El servicio de consulta CURP no respondió',500);
				} else if ($this->curl->error_string){
					$error = [$this->curl->error_string, $this->rest->status()];
					throw new processException($this->curl->error_string,$this->rest->status());
				} else {
					if ($wsResponse->RESTService->StatusCode === '0')
						throw new processException($wsResponse->RESTService->Message,400);
				}

				$responseModel = $wsResponse->Response;
			}else{
				$this->load->model('CURP_model');
				$resp = $this->CURP_model->get(trim($curp));
				if($resp['status'] == false){
					throw new processException($resp['message'],400);
					$responseModel = [];
				}else{
					$responseModel = $resp['data'];
				}
			}
		} 
		catch (rulesException $e){	
			header("HTTP/1.0 400 Bad Request");
			Msg_reporting::error_log($e);
		}
		catch (processException $e){
			header("HTTP/1.0 " . ($e->getCode() != 0 ? $e->getCode() : 500) . " " . utf8_decode($e->getMessage()));
			Msg_reporting::error_log($e);
		}
		catch (Exception $e) {
			header("HTTP/1.0 500 " . utf8_decode($e->getMessage()));
			Msg_reporting::error_log($e);
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
