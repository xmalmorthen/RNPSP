<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Cedula extends CI_Controller {
    function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
	}	
    public function Objetos_asignados()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de Aspirante', site_url('alta/cedula/aspirante'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante');
		// /TITLE BODY PAGE

		$this->load->view('Objetos_asignados/index');
	}

}


?>