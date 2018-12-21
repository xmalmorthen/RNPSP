<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('validaDBResponseAndShowError'))
{
	function validaDBResponseAndShowError($response)
	{
        if (! $response) {
            show_error(ERROR_GET_DB,500,"Ocurrió un ERROR");
        } 
        return $response;
	}
}

if ( ! function_exists('validaDBDuplicateEntry'))
{
	function validaDBDuplicateEntry($refThrow, $error = NULL)
	{
        $returnResponse = FALSE;
        if ($error) {
            if ($error['code'] == 1062){
                $returnResponse = TRUE;
            } else {
                throw new Exception($error['message'] . ' [ {$refThrow} ]');
            }
        } else {
            throw new Exception("Error desconocido [ {$refThrow} ]");
        }
        
        return $returnResponse;
	}
}

if ( ! function_exists('checkExistDBError'))
{
	function checkExistDBError()
	{
        $CI =& get_instance();
        $returnResponse = FALSE;
        if ($CI->db->error() != NULL) {
            $error = $CI->db->error();
            if ($error['code'] != 0){
                $returnResponse = TRUE;
            }
        }        
        return $returnResponse;
    }
}