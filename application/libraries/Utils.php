<?php defined('BASEPATH') OR defined('INICONFIGFILE') OR  exit('No direct script access allowed');

class Utils {
    public function __construct() {}

    public static function parseDateMMDDYYYY($date){        
        $var = str_replace('/', '-', $date);
        return date("m/d/Y", strtotime($var));
    }
}
