<?php defined('BASEPATH') OR defined('INICONFIGFILE') OR  exit('No direct script access allowed');

 /*
* Autor: Miguel Angel Rueda Aguilar
* Fecha: 30-08-2018
* Descripción: Clase para caché de página
*/
class MyPageCache {         
    /*
    * Autor: Miguel Angel Rueda Aguilar
    * Fecha: 30-08-2018
    * Descripción: Guardar caché de página
    * Parámetros:
    *	Entrada: 
    *				 $cacheTime : tiempo de vigencia de caché
    */    
    public function save($cacheTime = DEFAULTTIMEPAGECACHE){        
        $CI =& get_instance();
        if (ENVIRONMENT != 'development') { 
            $CI->output->cache($cacheTime);
        }
    }

    /*
    * Autor: Miguel Angel Rueda Aguilar
    * Fecha: 30-08-2018
    * Descripción: Eliminar caché de página
    */
    public function reset(){
        $CI =& get_instance();
        return $CI->output->delete_cache();
    }
}