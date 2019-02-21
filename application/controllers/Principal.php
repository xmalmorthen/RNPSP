<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
	}
	
	public function index()
	{
		//die(var_dump($this->session->userdata(SESSIONVAR)));

		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Página principal');
		// /TITLE BODY PAGE

		// $this->db
		// 	->select('1')
		// 	->from('cat_GrupoPermisos')
		// 	->where('cat_GrupoPermisos.id_PermisoMetodo = cat_PermisosMetodo.id_PermisoMetodo')
		// 	->where('cat_GrupoPermisos.id_Grupo',1);
		// $subQuery = $this->db->get_compiled_select();

		// $this->db
		// 	->select('cat_Controladores.id_Controllador,cat_Controladores.Nombre AS Controlador,cat_Metodos.id_Metodo,cat_Metodos.Nombre AS Metodo,cat_PermisosMetodo.id_PermisoMetodo,cat_PermisosMetodo.Permiso,('.$subQuery.') as acceso')
		// 	->from('cat_Controladores')
		// 	->join('cat_Metodos','cat_Metodos.id_Controllador = cat_Controladores.id_Controllador')
		// 	->join('cat_PermisosMetodo','cat_PermisosMetodo.id_Metodo = cat_Metodos.id_Metodo');
		// $query = $this->db->get_compiled_select();
		// Utils::pre($query);

		$this->load->view('Principal/principalView');
	}	
}
