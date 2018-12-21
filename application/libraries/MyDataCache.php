<?php defined('BASEPATH') OR defined('INICONFIGFILE') OR  exit('No direct script access allowed');

/*
* Autor: Miguel Angel Rueda Aguilar
* Fecha: 30-08-2018
* Descripción: Clase para caché de contenidos e información
*/
class MyDataCache{
    /*
    * Autor: Miguel Angel Rueda Aguilar
    * Fecha: 30-08-2018
    * Descripción: Guardar caché
    * Parámetros:
    *	Entrada: 
    *				 $key : identificador de caché
    *                $data : información a cachar
    *                $cacheTime : tiempo de vigencia de caché
    *	Salida: 
    *				 TRUE si fue exitoso, FALSE en caso de error
    */    
    public function save($key, $data, $cacheTime = DEFAULTTIMEDATACACHE){
        $returnResponse = FALSE;
        $CI =& get_instance();
        if (ENVIRONMENT != 'development')  {
            $returnResponse = $CI->cache->file->save($key,$data,$cacheTime);
        }
        return $returnResponse;
    }

    /*
    * Autor: Miguel Angel Rueda Aguilar
    * Fecha: 30-08-2018
    * Descripción: Obtener caché
    * Parámetros:
    *	Entrada: 
    *				 $key : Identificador de caché
    *	Salida: 
    *				 Datos almacenados en caché
    */
    public function get($key){
        $CI =& get_instance();
        return $CI->cache->file->get($key);
    }

    /*
    * Autor: Miguel Angel Rueda Aguilar
    * Fecha: 30-08-2018
    * Descripción: Eliminar caché
    * Parámetros:
    *	Entrada: 
    *				 $key : Identificador de caché
    *	Salida: 
    *				 TRUE si fue exitoso, FALSE en caso de error
    */    
    public function reset($key){
        $CI =& get_instance();
        return $CI->cache->file->delete($key);        
    }
}
