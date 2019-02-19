<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
CREATE TABLE IF NOT EXISTS `weather` (
  `id` int(11) NOT NULL auto_increment,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `recorded_at` datetime NOT NULL,
  `temp` float NOT NULL,
  `conditions` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
*/
class Weather_model extends CI_Model {

    public $timestamp = false;
    public $data = false;
    public $ubicacion;
        
    function __construct(){
        parent::__construct();
    }

    public function get($ubicacion){
        $this->ubicacion = $ubicacion;
        $this->getLatest();

        return $this->data;
    }

    private function getLatest(){
            # load from db first..
            //$this->loadFromDatabase();
            # this will fetch and store weather..
            if($this->timeToGetNewWeather() == true):
                $this->fetchAndStoreWeather();
            endif;
	}
	
	private function timeToGetNewWeather() {
        if($this->timestamp == false){
            return true;
        }elseif(strtotime($this->timestamp." +45 minutes") < time()){
            return true;
        }else
            return false;
	}
	
	private function loadFromDatabase(){
            $this->db
                    ->select('id_EstadoTiempo,id_Usuario,Ubicacion,CodigoLocalizacion,Temperatura,Condicion,CodigoCondicion,PuntoObservacion,FechaObservacion,FechaLog,TemperaturaMinima,TemperaturaMaxima,Fuente,Icono')
                    ->where('Ubicacion',$this->ubicacion);
            $this->db->order_by('id_EstadoTiempo','desc');
            $stats = $this->db->get('WS01_de_EstadoTiempo',1)->row();

            if(is_object($stats)){
                $this->timestamp = $stats->FechaLog;
                $this->data = array(
                    'CodigoLocalizacion' => $stats->CodigoLocalizacion,
                    'Temperatura' => $stats->Temperatura,
                    'Condicion' => $stats->Condicion,
                    'CodigoCondicion' => $stats->CodigoCondicion,
                    'PuntoObservacion' => $stats->PuntoObservacion,
                    'TemperaturaMinima' => $stats->TemperaturaMinima,
                    'TemperaturaMaxima' => $stats->TemperaturaMaxima,
                    'Icono' => $stats->Icono,
                    'Fuente' => $stats->Fuente
                );
            }else{
                $this->timestamp = false;
            }
	}
	
    private function fetchAndStoreWeather(){
        $ciudad = $this->ubicacion;
        $url = 'http://weather.service.msn.com/data.aspx?weasearchstr='.urlencode($ciudad).'&culture=es-MX&weadegreetype=C&src=outlook';
        $xml = $this->stream_remote_file($url);
        
        $this->load->library('Simplexml');
        $weatherData = $this->simplexml->xml_parse($xml);
        utils::pre($weatherData);
        if(is_array($weatherData)) {
            $fields = array();
            if(isset($weatherData['weather']['current']['@attributes'])){
                        $fields['Ubicacion'] = $ciudad;
                        $fields['CodigoLocalizacion'] = $weatherData['weather']['@attributes']['weatherlocationcode'];
                        
                        $fields['Temperatura'] = (int)$weatherData['weather']['current']['@attributes']['temperature'];
                        $fields['Condicion'] = $weatherData['weather']['current']['@attributes']['skytext'];
                        $fields['CodigoCondicion'] = (int)$weatherData['weather']['current']['@attributes']['skycode'];
                        $fields['PuntoObservacion'] = $weatherData['weather']['current']['@attributes']['observationpoint'];
                        $fields['FechaObservacion'] = date('Y-m-d H:i:s',strtotime($weatherData['weather']['current']['@attributes']['date'].' '.$weatherData['weather']['current']['@attributes']['observationtime']));
                        
                        $fields['TemperaturaMinima'] = $weatherData['weather']['forecast'][1]['@attributes']['low'];
                        $fields['TemperaturaMaxima'] = $weatherData['weather']['forecast'][1]['@attributes']['high'];
                        
            }else{
                        $fields['Ubicacion'] = $ciudad;
                        $fields['CodigoLocalizacion'] = $weatherData['weather'][0]['@attributes']['weatherlocationcode'];
                        
                        $fields['Temperatura'] = (int)$weatherData['weather'][0]['current']['@attributes']['temperature'];
                        $fields['Condicion'] = $weatherData['weather'][0]['current']['@attributes']['skytext'];
                        $fields['CodigoCondicion'] = (int)$weatherData['weather'][0]['current']['@attributes']['skycode'];
                        $fields['PuntoObservacion'] = $weatherData['weather'][0]['current']['@attributes']['observationpoint'];
                        $fields['FechaObservacion'] = date('Y-m-d H:i:s',strtotime($weatherData['weather'][0]['current']['@attributes']['date'].' '.$weatherData['weather'][0]['current']['@attributes']['observationtime']));
                        
                        $fields['TemperaturaMinima'] = $weatherData['weather'][0]['forecast'][1]['@attributes']['low'];
                        $fields['TemperaturaMaxima'] = $weatherData['weather'][0]['forecast'][1]['@attributes']['high'];
            }
            $fields['Fuente'] = 'MSN Weather';
            //$fields['Icono'] = $this->iconoClima($fields['CodigoCondicion']);
            $fields['id_Usuario'] = $this->session->userdata('user_id');
            
            $this->db->insert('WS01_de_EstadoTiempo', $fields);
        }
        $this->loadFromDatabase();
		
	}
	
	private function stream_remote_file($url){
		$handle = fopen($url, "rb");
		$contents = stream_get_contents($handle);
		fclose($handle);
		return $contents;
 	}
        
        private function iconoClima($codigoCondicion){
            
            $config = @parse_ini_file( dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'third_party'.DIRECTORY_SEPARATOR.'iconos'.DIRECTORY_SEPARATOR.'iconos_dia.ini');
            if($config == FALSE){ die('No se encontro el archivo INI'); }
            
            $icono = array_key_exists($codigoCondicion,$config)? $config[$codigoCondicion] : $config['34'];
            return $icono;
        }
}
?>