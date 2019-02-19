<?php
class Contenidos_model extends CI_Model{
    public $dbColimaEstado;
    public function __construct() {
        parent::__construct();
       
        $this->load->config('config');
        $db = $this->config->item('dbColimaEstado');
        $ci = & get_instance();
        $this->dbColimaEstado = $this->load->database($db,true);
        unset($ci);
        
    }

    public function getContenidos($idDependencia=0,$idCategoria=0,$fecha='',$limit=0,$reg_ini=0,$orden='')
    {
        $this->dbColimaEstado
                ->select('id_cont,titulo,cuerpo_cont,texto_link,orden,id_categoria,id_dpcia,palabras_clave,fecha_publicacion,fecha_bajado,descripcion,claveM')
                ->from('webcontenidos')
                ->where('id_dpcia',$idDependencia);

        if($idCategoria!=0)
        {
            $this->dbColimaEstado->where('id_categoria',$idCategoria);
        }
				
        if($fecha!= '')
        {
            $this->dbColimaEstado->where('fecha_publicacion >=',$fecha);
        }
        
        if($limit!= 0)
        {
            $this->dbColimaEstado->limit($limit,$reg_ini);
        }
        
        if($orden!= '')
        {
            $this->dbColimaEstado->order_by($orden);
        }
        		
        $query = $this->dbColimaEstado->get();
        $result = ($query->num_rows() > 0)? $query->result_array() : false;
        $query->free_result();

	return $result;
    }
    
    public function getArchivos($idDependencia=0,$idCon=0)
    {
        $this->dbColimaEstado
                ->select('id_archivo,id_contenido,nom_archivo')
                ->from('archivos_contenidos')
                ->join('webcontenidos','webcontenidos.id_cont = archivos_contenidos.id_contenido');

        if($idCon!=0)
        {
            $this->dbColimaEstado
                    ->where('id_contenido',$idCon)
                    ->order_by("id_archivo", "Desc");
        }

        $query = $this->dbColimaEstado->get();
        $result = ($query->num_rows() > 0)? $query->result_array() : false;
        $query->free_result();
        return $result;
    }
    
    public function getContenido($idDependencia,$idRegistro)
    {
        $this->dbColimaEstado
                ->select('webcontenidos.id_cont,webcontenidos.titulo,webcontenidos.cuerpo_cont,webcontenidos.texto_link,webcontenidos.orden,webcontenidos.id_pertenece,webcontenidos.fecha,webcontenidos.id_categoria,webcontenidos.id_user,webcontenidos.id_dpcia,webcontenidos.pprincipal,webcontenidos.palabras_clave,webcontenidos.fecha_publicacion,webcontenidos.fecha_bajado,webcontenidos.descripcion,webcontenidos.claveM,webcontenidos.fecha_publicacion_material,webcontenidos.active_banner,cat_secciones.id_seccion,cat_secciones.seccion,cat_secciones.id_padre,cat_secciones.activo')
                ->from('webcontenidos')
                ->join('cat_secciones','webcontenidos.id_categoria = cat_secciones.id_seccion','left')
                ->where('webcontenidos.id_cont',$idRegistro)
                ->where('webcontenidos.id_dpcia',$idDependencia);
        
        $query = $this->dbColimaEstado->get();
        $result = ($query->num_rows() > 0)? $query->row_array() : false;
        $query->free_result();
        return $result;
    }
}
