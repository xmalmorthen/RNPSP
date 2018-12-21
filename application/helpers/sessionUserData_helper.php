<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('getSessionUserData'))
{
	function getSessionUserData()
	{
        $returnResponse = null;
        $CI =& get_instance();
        if ($CI->session->has_userdata(SESSIONVAR)){
            $returnResponse = $CI->session->userdata(SESSIONVAR);
        }
        return $returnResponse;
	}
}