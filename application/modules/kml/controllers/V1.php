<?php defined('BASEPATH') OR exit('No direct script access allowed');

class V1 extends REST_Controller
{
    public $data = array();
    function __construct()
    {
        parent::__construct();

        $this->data = array(
            'error' => false,
            'info' => array('mensaje'=>array('EXITO')),
            'data' => array()
        );
    }

    function mapa_get(){
        $opcion = $this->input->get('id');
        $this->load->helper('file');
        
        switch ($opcion) {
            case 2:
                $string = read_file(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'prueba'.DIRECTORY_SEPARATOR.'poligono.kml'); 

                break;
            case 3:
                $string = read_file(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'prueba'.DIRECTORY_SEPARATOR.'fregonaso.kml'); 

                break;
            case 4:
                $string = read_file(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'prueba'.DIRECTORY_SEPARATOR.'patrimoniales.kmz'); 
                break;

            default:
                $string = read_file(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'prueba'.DIRECTORY_SEPARATOR.'complex.kml'); 
                break;
        }
        
        print($string);
        exit();
        utils::pre($string);
    }
    
    public function read_get() {
        $string = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'prueba'.DIRECTORY_SEPARATOR.'complex.kml'; 
         
        $doc = new DOMDocument();
        $doc->load( $string );//xml file loading here
        utils::pre($doc);
        $employees = $doc->getElementsByTagName( "employee" );
        foreach( $employees as $employee )
        {
          $names = $employee->getElementsByTagName( "name" );
          $name = $names->item(0)->nodeValue;

          $ages= $employee->getElementsByTagName( "age" );
          $age= $ages->item(0)->nodeValue;

          $salaries = $employee->getElementsByTagName( "salary" );
          $salary = $salaries->item(0)->nodeValue;

          echo "<b>$name - $age - $salary\n</b><br>";
          }
    }
}