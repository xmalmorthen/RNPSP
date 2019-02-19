<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
CREATE TABLE IF NOT EXISTS `weather` (
  `id` int(11) NOT NULL auto_increment,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `recorded_at` datetime NOT NULL,
  `temp` float NOT NULL,
  `conditions` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
**/

class Api_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function getEstructuraGeneral(){
        $estructura = array(
            array(
                'Nodo' => 'error',
                'Nombre' => '',
                'Tipo' =>'Bit'
            ),
            array(
                'Nodo' => 'info',
                'Nombre' => 'id',
                'Tipo' => 'String'
            ),
            array(
                'Nodo' => 'info',
                'Nombre' => 'fecha',
                'Tipo' => 'Date'
            ),
            array(
                'Nodo' => 'info',
                'Nombre' => 'hora',
                'Tipo' => 'Time'
            ),
            array(
                'Nodo' => 'info',
                'Nombre' => 'tiempoEjecucion',
                'Tipo' => 'Decimal'
            ),
            array(
                'Nodo' => 'info',
                'Nombre' => 'sistemaEjecucion',
                'Tipo' => 'String',
            ),
            array(
                'Nodo' => 'info',
                'Nombre' => 'usuarioEjecucion',
                'Tipo' => 'String',
            ),
            array(
                'Nodo' => 'info',
                'Nombre' => 'detalle',
                'Tipo' => 'String',
            ),
            array(
                'Nodo' => 'info',
                'Nombre' => 'mensaje',
                'Tipo' => 'Object',
            )
        );
        return $estructura;
    }
}
?>
