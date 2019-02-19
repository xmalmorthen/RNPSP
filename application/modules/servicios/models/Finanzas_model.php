<?php
class Finanzas_model extends CI_Model {
    
    public $wsFinanzasHost;
    public $wsFinanzasUser;
    public $wsFinanzasPwd;
    
    function __construct(){
        parent::__construct();    
        $this->wsFinanzasHost = 'https://www.finanzas.col.gob.mx/nvo/ws/wsi.php?wsdl';
        $this->wsFinanzasUser = 'miempresa';
        $this->wsFinanzasPwd = '22d92c5b3892de0b745b73c7b6ad1d3f';
    }
    
    function verificaPago($folio){        
        try {
            $SoapClient = new SoapClient($this->wsFinanzasHost, array( 
                "login" => $this->wsFinanzasUser, 
                "password" => $this->wsFinanzasPwd, 
                "cache_wsdl" => WSDL_CACHE_NONE, 
                "trace" => 1 
            ));
            $results = $SoapClient->VerificaPago(array("folio" => $folio));
            
            if($results != FALSE){
                $results = (array)  current($results);
            }
            return $results;
        } catch (Exception $exc) {
            return false;
        }
    }
}