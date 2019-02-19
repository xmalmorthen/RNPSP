<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class DeBitacoraCurp_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    /*==========================================================================*
     * GUARDA UN REGISTRO EN LA BITACORA
     *==========================================================================*/
    public function set($guid,$contenido){
        $insert = array(
            'id_Bitacora'   => $guid,
            'Contenido'     => base64_encode($contenido),
            'UsuarioRegistro' => $this->session->userdata('user_id')
        );
        $this->db->insert('WS05_de_BitacoraCurp',$insert);
        return $guid;
    }
    
    /*==========================================================================*
     * CONSULTA BITACORA PARA DATATABLES
     *==========================================================================*/
    public function ConsultaDataTables($start,$length) {
        $this->db
                ->select("id_Bitacora,de_Bitacora.id_Metodo,DatosEntrada,DatosSalida,ROUND(TiempoEjecucion,3) as TiempoEjecucion,Estatus,UsuarioRegistro,DATE_FORMAT(FechaRegistro,'%d-%m-%Y %h:%i:%s %p') as FechaRegistro,CONCAT_WS('',ca_Modulos.Nombre,SPACE(1),'(',ca_Controladores.Nombre,')',SPACE(1),ca_Metodos.Nombre) as Metodo",false)
                ->from('de_Bitacora','de_Bitacora.id_Metodo = ca_Metodos.id_Metodo')
                ->join('ca_Metodos','de_Bitacora.id_Metodo = ca_Metodos.id_Metodo')
                ->join('ca_Controladores','ca_Metodos.id_Controlador = ca_Controladores.id_Controlador')
                ->join('ca_Modulos','ca_Controladores.id_Modulo = ca_Modulos.id_Modulo')
                ->order_by('de_Bitacora.FechaRegistro','desc');
        if($start == 0){
            $this->db->limit($length);
        } else {
            $this->db->limit($length,$start);
        }
                
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)? $query->result_array() : false;
        //utils::pre($this->db->last_query());
        $query->free_result();
        return $result;
    }
    
    /*==========================================================================*
     * CONSULTA NUMERO REGISTROS BITACORA PARA DATATABLES
     *==========================================================================*/
    public function CountConsultaDataTables() {
        $this->db->from('de_Bitacora');
        return $this->db->count_all_results();
    }
    
    /*==========================================================================*
     * CONSULTA NUMERO REGISTROS BITACORA PARA DATATABLES
     *==========================================================================*/
    public function CountHoyConsultaDataTables() {
        $this->db->from('de_Bitacora');
        $this->db->where('DATE(de_Bitacora.FechaRegistro) = CURDATE()',FALSE,FALSE);
        return $this->db->count_all_results();
    }
    
    /*==========================================================================*
     * CONSULTA EL REGISTROS BITACORA
     *==========================================================================*/
    public function getBitacora_id($id) {
        $this->db
                ->select("id_Bitacora,de_Bitacora.id_Metodo,DatosEntrada,DatosSalida,ROUND(TiempoEjecucion,3) as TiempoEjecucion,Estatus,UsuarioRegistro,DATE_FORMAT(FechaRegistro,'%d-%m-%Y %h:%i:%s %p') as FechaRegistro,CONCAT_WS('',ca_Modulos.Nombre,SPACE(1),'(',ca_Controladores.Nombre,')',SPACE(1),ca_Metodos.Nombre) as Metodo,de_Bitacora.DatosEntrada,de_Bitacora.DatosSalida",false)
                ->from('de_Bitacora','de_Bitacora.id_Metodo = ca_Metodos.id_Metodo')
                ->join('ca_Metodos','de_Bitacora.id_Metodo = ca_Metodos.id_Metodo')
                ->join('ca_Controladores','ca_Metodos.id_Controlador = ca_Controladores.id_Controlador')
                ->join('ca_Modulos','ca_Controladores.id_Modulo = ca_Modulos.id_Modulo')
                ->order_by('FechaRegistro','desc')
                ->where('id_Bitacora',$id);
        $query = $this->db->get();
        $result = $query->row_array();
        $num_rows = $query->num_rows();
        $query->free_result();
        return $result;
    }
    
    public function getCantidadAccesosMes() {
        $this->db
                ->select('Cantidad,Mes,MesNombre')
                ->from('vw_BitacoraCantidadMes');
        $query = $this->db->get();
        $respuesta = ($query->num_rows())? $query->result_array() : false;
        $query->free_result();
        return $respuesta;
    }
    
    public function getCantidadAccesosDia() {
        $this->db
                ->select('Cantidad,Dia,DiaNombre')
                ->from('vw_BitacoraCantidadDia');
        $query = $this->db->get();
        $respuesta = ($query->num_rows())? $query->result_array() : false;
        $query->free_result();
        return $respuesta;
    }
    

    
    public function geModuloPermisoUsuario($usuario,$contraseña,$id_Funcion){
        $this->db
            ->distinct()
            ->from('ca_Usuarios')
            ->join('re_UsuariosFunciones','re_UsuariosFunciones.id_Usuario = ca_Usuarios.id_Usuario')
            ->where(array('re_UsuariosFunciones.id_Funcion' => $id_Funcion, 'ca_Usuarios.Usuario' => $usuario, 'ca_Usuarios.Contrasenia'=>$contraseña));
        $query = $this->db->get();
        $result = $query->row_array();
        $num_rows = $query->num_rows();
        return ($num_rows > 0)? $result : false;
    }
    
    public function getBitacora_Metodo($idMetodo) {
        $query = $this->db->query("SELECT
            bitacora.LogFecha,
                (SELECT count(id_Metodo) FROM de_Bitacora WHERE de_Bitacora.Error = 0 AND DATE(de_Bitacora.LogFecha) = bitacora.LogFecha AND de_Bitacora.id_Metodo = {$idMetodo} ) as 'exito',
                (SELECT count(id_Metodo) FROM de_Bitacora WHERE de_Bitacora.Error = 1 AND DATE(de_Bitacora.LogFecha) = bitacora.LogFecha AND de_Bitacora.id_Metodo = {$idMetodo}) as 'error'
            FROM
                (SELECT DISTINCT DATE(de_Bitacora.LogFecha) as LogFecha FROM de_Bitacora WHERE de_Bitacora.id_Metodo = {$idMetodo} )
            as bitacora",FALSE);
               
        $result = ($query->num_rows() > 0)? $query->result_array() : false;
       
        $query->free_result();
        return $result;
    }

}