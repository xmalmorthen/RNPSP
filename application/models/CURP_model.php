<?php  if (! defined('BASEPATH')) {exit('No direct script access allowed');}

class CURP_model extends CI_Model
{
  public $response = array();
    public function __construct()
    {
        parent::__construct();
        $this->response = array(
          'status' => false,
          'message'=> '',
          'data'=> null
        );
    }

    public function get()
    {
        try {
            $client = new nusoap_client("http://10.10.20.132/sgp/emuladorCurp/servicios/wsdl.php?wsdl", false, false, false, false, false);
            $err = $client->getError();
            if ($err) {
                throw new Exception(htmlspecialchars($client->getDebug(), ENT_QUOTES));
            }

            $params = array(
                'CURP'=> "AAAA970612MMNLVN09",
                'Cve_Usuario'=> 'REPSP',
                'Pass'=> 'R3p5p*2019',
                'Usuario_Solicita'=> ''
            );
            $result = $client->call('WS_CURP', $params, 'http://localhost', 'http://localhost');
            if ($client->fault) {
                throw new Exception('Fault (Expect - The request contains an invalid SOAP body)</h2>');
            } else {
                $err = $client->getError();
                if ($err) {
                    throw new Exception((string)$err);
                } else {
                  $this->response['status'] = true;
                  $this->response['data'] = (array_key_exists('WS_CURPResult',$result))? (array)json_decode($result['WS_CURPResult']) : array();
                  if(empty($this->response['data'])){
                    throw new Exception('No se logo decodificar la respuesta del ws');
                  }
                }
            }
        } catch (Exception $e) {
          $this->response['status'] = false;
          $this->response['message'] = $e->getMessage();
          Msg_reporting::setOutputError($e->getMessage());
        }
        return $this->response;
        
    }
}
