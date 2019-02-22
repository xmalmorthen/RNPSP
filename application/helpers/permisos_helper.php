<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('renderMenu'))
{
  function verificaPermiso($idPermiso){
    $CI =& get_instance();
    $sessionVar = $CI->session->local_userdata('permisos');

    $valido = false;
    if($sessionVar != false){
      foreach ($sessionVar as $value) {
        if($value['id_Permiso'] == $idPermiso && $value['acceso'] == 1){
          $valido = true;
        }
      }
    }
    return $valido;
  }
}