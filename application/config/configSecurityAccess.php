<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Autor: Miguel Angel Rueda Aguilar
* Fecha: 30-08-2018
* Descripción: Archivo para configurar los accesos anónimos al sistema
* Configuración:
*	Array: 
*           anonymousAccess : nombre base del arreglo
*           directory       : Directorio donde se encuentra el controlador [ / en caso de que se encuentr en raíz ]
*           controller      : Nombre del controlador
*           action          : Nombre de la acción
* Nota:
*           El acceso anónimo es por controlador y acción, esto permite tener acciones de controlador
*           que no necesariamente sean accesibles anínimamente.
*/

/*
* Autor: Miguel Angel Rueda Aguilar
* Fecha: 01-09-2018
* Descripción: Enumerador de tipos de seguridad de acceso a los scripts
*/
abstract class securityMethods
{
    const unknown       = 0;
    const session       = 1;
    const userSession   = 2;    
    const anonymous     = 3;
}

/*
* Autor: Miguel Angel Rueda Aguilar
* Fecha: 01-09-2018
* Descripción: Variable de configuración general de acceso
*/
$config['securityAccess']['general'] = TRUE;

/*
* Autor: Miguel Angel Rueda Aguilar
* Fecha: 01-09-2018
* Descripción: Arreglo de configuración de accesos
*/

$config['securityAccess']['/']['error']['all']= securityMethods::anonymous;
$config['securityAccess']['/']['usersession']['all']= securityMethods::anonymous;
// $config['securityAccess']['/']['log']['all']= securityMethods::anonymous;
// $config['securityAccess']['pantalla_principal/']['index']['all']= securityMethods::anonymous;
// $config['securityAccess']['pantalla_principal/']['about']['all']= securityMethods::anonymous;
// $config['securityAccess']['recuperar_contrasenia/']['index']['all']= securityMethods::anonymous;
// $config['securityAccess']['solicitudes/']['linea']['all']= securityMethods::anonymous;

// $config['securityAccess']['test/']['index']['cachepage'] = securityMethods::userSession; //controlador raiz log, todos las acciones