<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CurpV1_model extends CI_Model {
	
    public function __construct() {
            parent::__construct();
    }
    
    public function existeCurp($curp){
        $this->db
                ->from('WS05_ma_Curps')
                ->where('Curp',$curp)
                ->where('FechaVencimiento >=','CURDATE()',FALSE)
                ->order_by('FechaRegistro','desc');
        $existeCurp = $this->db->count_all_results();
        return ($existeCurp > 0)? TRUE : FALSE;
    }
    
    public function existeDatosCurp($nombre,$apellido1,$apellido2,$entidad,$fechaNacimiento,$genero){
        $this->db
                ->from('WS05_ma_Curps')
                
                ->where('Nombre',$nombre)
                ->where('Apellido1',$apellido1)
                ->where('Apellido2',$apellido2)
                ->where('Genero',$genero)
                //->where('EntidadNacimientoSigla',$entidad)
                ->where('FechaNacimiento',$fechaNacimiento)
                ->where('FechaVencimiento >=','CURDATE()',FALSE)
                ->order_by('FechaRegistro','desc');
        
        if(strlen(trim($entidad))>2){
            $this->db->where('EntidadNacimiento',$entidad);
        }else{
            $this->db->where('EntidadNacimientoSigla',$entidad);
        }
        
        $existeCurp = $this->db->count_all_results();
        return ($existeCurp > 0)? TRUE : FALSE;
    }
    
    public function getInfoCurp($curp) {
        $this->db
                ->select('Curp,Nombre,Apellido1,Apellido2,Genero,FechaNacimiento,EntidadNacimiento,Nacionalidad,Genero')
                ->from('WS05_ma_Curps')
                ->where('Curp',$curp)
                ->where('FechaVencimiento >=','CURDATE()',FALSE)
                ->order_by('FechaRegistro','desc')
                ->limit(1);
        $query = $this->db->get();
        $resultCurp = $query->row_array();
        $query->free_result();
        return $resultCurp;
    }
    public function getDatosCurp($nombre,$apellido1,$apellido2,$entidad,$fechaNacimiento,$genero) {
        $this->db
                ->select('Curp,Nombre,Apellido1,Apellido2,Genero,FechaNacimiento,EntidadNacimientoSigla as EntidadNacimiento,Nacionalidad,Genero')
                ->from('WS05_ma_Curps')
                ->where('Nombre',$nombre)
                ->where('Apellido1',$apellido1)
                ->where('Apellido2',$apellido2)
                ->where('Genero',$genero)
                //->where('EntidadNacimientoSigla',$entidad)
                ->where('FechaNacimiento',$fechaNacimiento)
                ->where('FechaVencimiento >=','CURDATE()',FALSE)
                ->order_by('FechaRegistro','desc')
                ->limit(1);
        if(strlen(trim($entidad))>2){
            $this->db->where('EntidadNacimiento',$entidad);
        }else{
            $this->db->where('EntidadNacimientoSigla',$entidad);
        }
        $query = $this->db->get();
        $resultCurp = $query->row_array();
        $query->free_result();
        return $resultCurp;
    }

    public function get_infoCurpWS($curp){
        
        //SE CARGA LA LIBRERIA DE LA CURP Y SE CONSUME EL SERVICIO WS DE CURP
        $this->load->spark('restclient/2.1.0');
        $this->restclient->initialize(array('server' => WS005_HOST,'http_auth'=>'basic','http_user'=>WS005_USR,'http_pass'=>WS005_PWD));
        $respuesta_ws = (array)$this->restclient->get('getInfo',array( str_replace(' ', '', (string)$curp) ));

        if(is_array($respuesta_ws) && isset($respuesta_ws['CURP'])){

            $resultCurp["Curp"]           = (string)(isset($respuesta_ws['CURP']))? $respuesta_ws['CURP'] : '';
            $resultCurp['Nombre']         = (string)(isset($respuesta_ws['Nombre']))? $respuesta_ws['Nombre'] : '';
            $resultCurp["Apellido1"]      = (string)(isset($respuesta_ws['Apellido1']))? $respuesta_ws['Apellido1'] : '';
            $resultCurp['Apellido2']      = (string)(array_key_exists('Apellido2', $respuesta_ws))? $respuesta_ws['Apellido2'] : '';
            $resultCurp['Genero']           = (string)(isset($respuesta_ws['Genero']))? $respuesta_ws['Genero'] : ((isset($respuesta_ws['Sexo']))? $respuesta_ws['Sexo'] : '' );
            $resultCurp['FechaNacimiento']= (string)(isset($respuesta_ws['Fecha_Nac']))? $respuesta_ws['Fecha_Nac'] : '';
            $resultCurp['EntidadNacimiento']        = (string)(isset($respuesta_ws['Entidad']))? $respuesta_ws['Entidad'] : '';
            $resultCurp['Nacionalidad']   = (string)(isset($respuesta_ws['Nacionalidad']))? $respuesta_ws['Nacionalidad'] : (isset($respuesta_ws['nacionalidad'])? $respuesta_ws['nacionalidad'] : '');
            if($resultCurp['Genero'] == 'HOMBRE'){
                $resultCurp['Genero'] = 'H';
            }elseif($resultCurp['Genero'] == 'MUJER'){
                $resultCurp['Genero'] = 'M';
            }

            $data = array(
                    'Curp'              => $resultCurp["Curp"],
                    'Nombre'            => $resultCurp['Nombre'],
                    'Apellido1'         => $resultCurp["Apellido1"],
                    'Apellido2'         => ((strlen($resultCurp['Apellido2'])>0)? $resultCurp['Apellido2'] : ''),
                    'Genero'              => $resultCurp['Genero'],
                    'EntidadNacimientoSigla' => $resultCurp['EntidadNacimiento'],
                    'FechaNacimiento'   => $resultCurp['FechaNacimiento'],
                    'Nacionalidad'      => $resultCurp['Nacionalidad'],
                    'RespuestaWS'       => @base64_encode(@json_encode($respuesta_ws))
            );
            $this->db->replace('WS05_ma_Curps', $data);
        } else {
            $resultCurp = FALSE;
        }
        
        return $resultCurp;
    }
    
    public function get_DatosCurpWS($nombre,$apellido1,$apellido2,$entidad,$fechaNacimiento,$genero){
        
        $contenido = array(
            'nombre'    => $nombre,
            'apaterno'  => $apellido1,
            'amaterno'  => $apellido2,
            'entidad'   => $entidad,
            'fechanac'  => $fechaNacimiento, 
            'sexo'      => $genero
        );
        
        //SE CARGA LA LIBRERIA DE LA CURP Y SE CONSUME EL SERVICIO WS DE CURP
        $this->load->spark('restclient/2.1.0');
        $this->restclient->initialize(array('server' => WS005_HOST,'http_auth'=>'basic','http_user'=>WS005_USR,'http_pass'=>WS005_PWD));
        $respuesta_ws = $this->restclient->get('getCurp',$contenido);

        if(is_array($respuesta_ws) && isset($respuesta_ws['CURP'])){

            $resultCurp["Curp"]           = (string)(isset($respuesta_ws['CURP']))? $respuesta_ws['CURP'] : '';
            $resultCurp['Nombre']         = (string)(isset($respuesta_ws['Nombre']))? $respuesta_ws['Nombre'] : '';
            $resultCurp["Apellido1"]      = (string)(isset($respuesta_ws['Apellido1']))? $respuesta_ws['Apellido1'] : '';
            $resultCurp['Apellido2']      = (string)(array_key_exists('Apellido2', $respuesta_ws))? $respuesta_ws['Apellido2'] : '';
            $resultCurp['Genero']           = (string)(isset($respuesta_ws['Genero']))? $respuesta_ws['Genero'] : ((isset($respuesta_ws['Sexo']))? $respuesta_ws['Sexo'] : '' );
            $resultCurp['FechaNacimiento']= (string)(isset($respuesta_ws['Fecha_Nac']))? $respuesta_ws['Fecha_Nac'] : '';
            $resultCurp['EntidadNacimiento']        = (string)(isset($respuesta_ws['Entidad']))? $respuesta_ws['Entidad'] : '';
            $resultCurp['Nacionalidad']   = (string)(isset($respuesta_ws['Nacionalidad']))? $respuesta_ws['Nacionalidad'] : (isset($respuesta_ws['nacionalidad'])? $respuesta_ws['nacionalidad'] : '');
            if($respuesta_ws['Sexo'] == 'HOMBRE'){
                $resultCurp['Genero'] = 'H';
            }elseif($respuesta_ws['Sexo'] == 'MUJER'){
                $resultCurp['Genero'] = 'M';
            }

            $data = array(
                    'Curp'              => $resultCurp["Curp"],
                    'Nombre'            => $resultCurp['Nombre'],
                    'Apellido1'         => $resultCurp["Apellido1"],
                    'Apellido2'         => ((strlen($resultCurp['Apellido2'])>0)? $resultCurp['Apellido2'] : ''),
                    'Genero'              => $resultCurp['Genero'],
                    'EntidadNacimientoSigla' => $resultCurp['EntidadNacimiento'],
                    'FechaNacimiento'   => $resultCurp['FechaNacimiento'],
                    'Nacionalidad'      => $resultCurp['Nacionalidad'],
                    'RespuestaWS'       => @base64_encode(@json_encode($respuesta_ws))
            );
            
            $this->db->replace('WS05_ma_Curps', $data);
        } else {
            $resultCurp = FALSE;
        }

        return $resultCurp;
    }
    
    public function buscar_curp($contenido = array()){
        $data = array();
        $respuesta_ws = false;
        
        $db = $this->load->database('default',TRUE);
        $query = $db->query("CALL pa_GetCurpDatos(?,?,?,?,?,?)",array($contenido["nombre"],$contenido["apaterno"],$contenido["amaterno"],$contenido["fechanac"],$contenido["sexo"],$contenido["entidad"]));
        
        $respuesta = $query->row_array();
        $num_respuesta = $query->num_rows();
        $query->next_result();
        $query->free_result();
        unset($db);

        if($num_respuesta > 0 && $respuesta['origen'] != 'database'){

            //SE CARGA LA LIBRERIA DE LA CURP Y SE CONSUME EL SERVICIO WS DE CURP
            $this->load->spark('restclient/2.1.0');
            $this->restclient->initialize(array('server' => WS_CURP,'http_auth'=>'basic','http_user'=>USR_CURP,'http_pass'=>PWD_CURP));
            
            $contenido["amaterno"] = (strlen(trim($contenido["amaterno"]))>0)? $contenido["amaterno"] : '%20';
            
            $respuesta_ws = $this->restclient->get('getCurp',$contenido);

            if(is_array($respuesta_ws) && isset($respuesta_ws['CURP'])){
                unset($respuesta);
                $respuesta['origen']       = (isset($respuesta_ws['estatus']))? $respuesta_ws['estatus'] : 'webservice';
                $respuesta["Curp"]           = (string)(isset($respuesta_ws['CURP']))? $respuesta_ws['CURP'] : '';
                $respuesta['Nombre']         = (string)(isset($respuesta_ws['Nombre']))? $respuesta_ws['Nombre'] : '';
                $respuesta["Apellido1"]      = (string)(isset($respuesta_ws['Apellido1']))? $respuesta_ws['Apellido1'] : '';
                $respuesta['Apellido2']      = (string)(isset($respuesta_ws['Apellido2']))? $respuesta_ws['Apellido2'] : '';
                $respuesta['Genero']           = (string)(isset($respuesta_ws['Genero']))? $respuesta_ws['Genero'] : ((isset($respuesta_ws['sexo']))? $respuesta_ws['sexo'] : '' );
                $respuesta['FechaNacimiento']= (string)(isset($respuesta_ws['Fecha_Nac']))? $respuesta_ws['Fecha_Nac'] : '';
                $respuesta['EntidadNacimiento']        = (string)(isset($respuesta_ws['Entidad']))? $respuesta_ws['Entidad'] : '';
                $respuesta['Nacionalidad']   = (string)(isset($respuesta_ws['Nacionalidad']))? $respuesta_ws['Nacionalidad'] : (isset($respuesta_ws['nacionalidad'])? $respuesta_ws['nacionalidad'] : '');
                if($respuesta['Genero'] == 'HOMBRE'){
                    $respuesta['Genero'] = 'H';
                }elseif($respuesta['Genero'] == 'MUJER'){
                    $respuesta['Genero'] = 'M';
                }
            }
        }        

        if($respuesta['origen'] != FALSE){
            ////////////// OBTENER EDAD ////////////////////

            if(array_key_exists('FechaNacimiento', $respuesta)){
                $fecha= explode('/',$respuesta['FechaNacimiento']); 
                if((is_array($fecha))&&(isset($fecha[2]))){
                    $fechanac2 = $fecha[2]."-".$fecha[1]."-".$fecha[0]; 
                }else{
                    $fechanac2 = $respuesta['FechaNacimiento'];
                }
                $fechaactual = date("Y-m-d");
                $fecha1 = new DateTime($fechanac2);
                $fecha2 = new DateTime($fechaactual);
                $edad = $fecha1->diff($fecha2);

                $respuesta["edad"] = $edad->y;
            }

            if(array_key_exists('origen', $respuesta) && $respuesta['origen'] == 'webservice'){

                $curp = $this->db->escape($respuesta['Curp']);
                $nombre = $this->db->escape($respuesta["Nombre"]);
                $a_paterno = $this->db->escape($respuesta['Apellido1']);
                $a_materno = $this->db->escape($respuesta['Apellido2']);
                $fechaNacimiento = $this->db->escape($respuesta['FechaNacimiento']);
                $sexo = $this->db->escape($respuesta['Genero']);
                $entidad = $this->db->escape($respuesta['EntidadNacimiento']);
                $nacionalidad = $this->db->escape($respuesta['Nacionalidad']);
                $respuesta_ws_sr = $this->db->escape(@base64_encode(@json_encode($respuesta_ws)));

                $db = $this->load->database('default',TRUE);
                $db->simple_query("CALL pa_setCurp({$curp},{$nombre},{$a_paterno},{$a_materno},{$fechaNacimiento},{$sexo},{$entidad},{$nacionalidad},{$respuesta_ws_sr})");
                unset($db);
            }
        }  else {
            $respuesta = false;
        }
        return $respuesta;
    }
}