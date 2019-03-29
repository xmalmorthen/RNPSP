<?php  if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

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

    public function get($curp)
    {
        try {
            $cnfg = (object)json_decode(CNFG);
            $client = new nusoap_client($cnfg->apis->wsCURPServer, false, false, false, false, false);
            $err = $client->getError();
            if ($err) {
                throw new Exception(htmlspecialchars($client->getDebug(), ENT_QUOTES));
            }

            $params = array(
                'CURP'=> $curp,
                'Cve_Usuario'=> $cnfg->apis->wsCURPUser,
                'Pass'=> $cnfg->apis->wsCURPPwd,
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
                    $this->response['data'] = (array_key_exists('WS_CURPResult', $result))? array(json_decode($result['WS_CURPResult'])) : array();
                    if (empty($this->response['data'])) {
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
