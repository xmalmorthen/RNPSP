<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/*
* Autor: Miguel Angel Rueda Aguilar
* Fecha: 30-08-2018
* Descripción: Clase de acceso por hook para verificar el acceso anínimo o por sesión
*/
class GetChecker {

    /*
    * Autor: Miguel Angel Rueda Aguilar
    * Fecha: 30-08-2018
    * Descripción: Funcioón para verificar la petición y redirigir según las restricciones de acceso
    * Parámetros:
    *	Entrada: 
    *				 $params : array de parámetros configurados en el hook de configuración
    */
    public function checkForGetNoCache($params = NULL)
    {   
        global $OUT, $CFG, $URI, $RTR;

        $action = strtolower($RTR->method);
        $controller = strtolower($RTR->class);
        $directory = strtolower($RTR->directory ? $RTR->directory : '/');

        if (in_array($controller, $params) || strpos($controller, 'assets') !== false) {  
            return;
        }
       
        $CFG->load('configSecurityAccess');

        $securityAccessArray = $CFG->item('securityAccess');

        $issetInsecurityAccessArray = isset($securityAccessArray[$directory][$controller][$action]);
        $securityMethod = securityMethods::unknown;

        if ($issetInsecurityAccessArray) {
            $securityMethod = $securityAccessArray[$directory][$controller][$action];            
        } else {
            $issetInsecurityAccessArray = isset($securityAccessArray[$directory][$controller]['all']);
            if ($issetInsecurityAccessArray) {
                $securityMethod = $securityAccessArray[$directory][$controller]['all'];
            }
        }
        
        switch ($securityMethod) {  
            case securityMethods::anonymous :

            break;
            case securityMethods::session :
                $this->_requireSession();
            break;            
            case securityMethods::userSession :
                $this->_requireUserSession();
            break;
            case securityMethods::unknown:
            default:
                if ($securityAccessArray['general']){
                    $this->{'_require' . DEFAULTSESSIONTYPE}();
                }
            break;
        }        

        if ($OUT->_display_cache($CFG, $URI) == TRUE){
            echo '<span id="fromCache" style="color: red;position: relative;float: right;margin-top: -22px;margin-right: 10px;">.</span>';
            exit();
        }     
        
    }

    /*
    * Autor: Miguel Angel Rueda Aguilar
    * Fecha: 30-08-2018
    * Descripción: función privada para la lógica de ruteo cuando se requiera sesión    
    */
    private function _requiresession(){        
        $this->_checkPrivilege();
    }

    /*
    * Autor: Miguel Angel Rueda Aguilar
    * Fecha: 30-08-2018
    * Descripción: función privada para la lógica de ruteo cuando se requiera sesión de usuario
    */
    private function _requireuserSession(){
        global $CFG, $URI;
        
        $user = isset($_SESSION[SESSIONVAR]) ? $_SESSION[SESSIONVAR] : NULL;

        if(!$user){                
            $redirectURI = $CFG->site_url(LOGINPAGE) . "?toGo=" . base64_encode($CFG->site_url($URI->uri_string));

            header('Location: ' . $redirectURI , TRUE,303);
            exit();
        }
        $this->_checkPrivilege();
    }

    /*
    * Autor: Miguel Angel Rueda Aguilar
    * Fecha: 20-11-2018
    * Descripción: función privada para verificar los privilegios de acceso de usuario
    */
    private function _checkPrivilege(){
        global $OUT, $CFG, $URI, $RTR;
        
        $securityAccessArray = $CFG->item('securityAccess');

        if ($securityAccessArray['privilegios'] === FALSE) return;

        $user = $_SESSION[SESSIONVAR];

        $action = strtolower($RTR->method);
        $controller = strtolower($RTR->class);
        $directory = strtolower($RTR->directory ? $RTR->directory : '/');

        $uri = $directory . $controller;

        $porciones = explode("/", $directory);        

        $privilegios = $user['privilegios'];

        //die(var_dump($privilegios));

        $access = false;
        foreach ($privilegios as $modulo => $privilegio) {
            foreach ($privilegio as $key => $value) {
				if ($value['Uri']) {
					if ( strtolower($value['Uri']) == strtolower($uri) ){
						$access = true;
						break;
					}
				}
            }
            if ($access == true) break;
        }

        if (!$access){
            $uri .= '/' . $action;
            foreach ($privilegios as $modulo => $privilegio) {
                foreach ($privilegio as $key => $value) {
                    if ($value['Uri']) {
                        if ( strtolower($value['Uri']) == strtolower($uri) ){
                            $access = true;
                            break;
                        }
                    }
                }
                if ($access == true) break;
            }
        }

        if (!$access){
            $redirectURI = $CFG->site_url('Error/noPrivilegio');
            header('Location: ' . $redirectURI , TRUE,303);
            exit();
        }
    }
}