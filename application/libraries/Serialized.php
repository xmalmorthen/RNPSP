
<?php defined('BASEPATH') OR defined('INICONFIGFILE') OR  exit('No direct script access allowed');

class Serialized{

    public function exist($idUsuario, $hashURL){
        $returnResponse = FALSE;
        $CI =& get_instance();
        try {
            $hashURL = hash('md5',$hashURL);

            $CI->db->cache_off();
            $CI->db->select('count(*) as existe');
            $CI->db->from('maSerializedData');
            $CI->db->where('idUsuario', $idUsuario);
            $CI->db->where('hashURL', $hashURL);

            $query = $CI->db->get();

            $response = $query->result();
            if (count($response) > 0) {
                $returnResponse = $response[0]->existe > 0 ? TRUE : FALSE;
            }
        }
        catch (Exception $e) {
            log_message('error',$e->getMessage() . " [ GUID = {$CI->config->item('GUID')} ]");                
        }
        return $returnResponse;
    }

    public function save($idUsuario, $hashURL, $data){
        $returnResponse = FALSE;
        $CI =& get_instance();

        try {
            $hashURL = hash('md5',$hashURL);
            $data = base64_encode(serialize($data));

            $serializedData = [
				'idUsuario'     => $idUsuario,
				'hashURL' 	    => $hashURL,
                'serialized'    => $data
			];

            $responseGet = $this->exist($idUsuario, $hashURL);

            if (!$responseGet) {
                $CI->db->insert('maSerializedData', $serializedData);
            } else{
                $CI->db->where('idUsuario', $idUsuario);
                $CI->db->where('hashURL', $hashURL);
                $CI->db->update('maSerializedData', $serializedData);
            }
            
            if ($CI->db->error()){
                if ($CI->db->error()['code'] !== '00000')
                    throw new Exception($CI->db->error()['message']);
            }
            $returnResponse = TRUE;
        }
        catch (Exception $e) {
            log_message('error',$e->getMessage() . " [ GUID = {$CI->config->item('GUID')} ]");
        }
        return $returnResponse;
    }

    public function get($idUsuario, $hashURL){
        $returnResponse = NULL;
        $CI =& get_instance();
        try {
            $hashURL = hash('md5',$hashURL);

            $CI->db->cache_off();
            $CI->db->select('*');
            $CI->db->from('maSerializedData');
            $CI->db->where('idUsuario', $idUsuario);
            $CI->db->where('hashURL', $hashURL);

            $query = $CI->db->get();

            $response = $query->result();

            if ($response){
                $response = $response[0];

                $decoded = base64_decode($response->serialized);
                $unSerial = unserialize($decoded);
                $returnResponse = $unSerial;
            }
        }
        catch (Exception $e) {
            log_message('error',$e->getMessage() . " [ GUID = {$CI->config->item('GUID')} ]");                
        }
        return $returnResponse;
    }

    public function reset($idUsuario, $hashURL){
        $returnResponse = NULL;
        $CI =& get_instance();
        try {
            $hashURL = hash('md5',$hashURL);
            
            $CI->db->where('idUsuario', $idUsuario);
            $CI->db->where('hashURL', $hashURL);
            $CI->db->delete('maSerializedData');
            if ($CI->db->error()){
                if ($CI->db->error()['code'] !== '00000')
                    throw new Exception($CI->db->error()['message']);
            }
            $returnResponse = TRUE;            
        }
        catch (Exception $e) {
            log_message('error',$e->getMessage() . " [ GUID = {$CI->config->item('GUID')} ]");                
        }
        return $returnResponse;
    }
}
