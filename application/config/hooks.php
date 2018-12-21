<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

// $hook['post_controller_constructor'][] = array(
//     'class' => 'GetChecker',
//     'function' => 'checkForGetNoCache',
//     'filename' => 'GetChecker.php',
//     'filepath' => 'hooks',
//     // Aqui va el array con los nombres de controlador que NO necesita verificacion de acceso.
//     'params'   => array(
//     )
// );

$hook['display_override'] = array(
  'class'    => 'Override',
  'function' => 'output',
  'filename' => 'Override.php',
  'filepath' => 'hooks',
  'params'   => array()
);