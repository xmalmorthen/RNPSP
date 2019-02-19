<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('renderMenu'))
{
    function getMenu($mnu = null){

        if ($mnu === null) {
            $CI->db->select('idMnu');
            $CI->db->from('tblMnuCnfg');
            $CI->db->where('idSubMnu','NULL');    

            $query = $CI->db->get();
            if (!$query) throw new Exception("Error al procesar respuesta de bd");
            
            $response = $query->result();
            foreach ($response as $key => $value) {
                $value = getMenu($value);
            }

        } else {
            $CI->db->select('idMnu');
            $CI->db->from('tblMnuCnfg');
            $CI->db->where('idSubMnu','NULL');
        }

        $query = $CI->db->get();
        if (!$query) throw new Exception("Error al procesar respuesta de bd");
        
        $response = $query->result();

        
        $mnu = $response;

        foreach ($response as $key => $value) {
            $value = getMenu($value->idMnu);
        }



        $CI->db->select('menu');
        $CI->db->from('tblMnu');
        $CI->db->where('id',$idMnu);

        if ($mnu->idSumMnu) {
            getMenu();
        }


        $query = $CI->db->get();

        return $mnu;
    }
    
	function renderMenu() {
        $returnResponse = null;
        $CI =& get_instance();
        if (!$CI->session->has_userdata(SESSIONVAR)){
            // OBTENER MENÚ PUBLICO
        } else {
            $session = $CI->session->userdata(SESSIONVAR);
            // OBTENER MENÚ POR PERFIL
            try {
                $CI->db->select('*');
                $CI->db->from('tblMnuCnfg');

                $query = $CI->db->get();
                if (!$query) throw new Exception("Error al procesar respuesta de bd");
                
                $response = $query->result();

                $mnu = $response;

                foreach ($mnu as $key => $value) {
                    $value = getMenu($value->idMnu);
                }
            }
            catch (Exception $e) {
                log_message('error',$e->getMessage() . " [ GUID = {$CI->config->item('GUID')} ]");                
            }


        }
        return $returnResponse;
    }
}