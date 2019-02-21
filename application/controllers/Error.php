<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {
	
	function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
	}

	public function index()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Error ] - 500', "Error");		
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Error');
		// /TITLE BODY PAGE

		show_error('Error no controlado', 500, 'Ocurrió un error');
	}

	public function setError($err = null)
	{
		if (!$err)
			$err = $this->input->get('err') ? $this->input->get('err') : 'Error no especificado';

		
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Error ] - 500', "Error");
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Error');
		// /TITLE BODY PAGE

		show_error($err, 500, 'Ocurrió un error');
	}

	public function e404()
	{
        // BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Error ] - 404', "Error/e404");		
		// /BREADCRUMB

        // TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Error');
		// /TITLE BODY PAGE

		$currentURL = current_url();
		$params   = $_SERVER['QUERY_STRING'];
		$fullURL = $currentURL . ($params ? '?' . $params : ''); 
		show_404($fullURL);
	}

    public function noScript()
    {   
        echo $this->load->view('errors/template/error_scripts', NULL, TRUE);        
		exit(403);     
    }

    public function incompatible()
    {                
        echo $this->load->view('errors/template/error_incompatible', NULL, TRUE);
		exit(403);
    }

    public function noPrivilegio()
    {
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Error ] - Privilegios', "Error/noPrivilegio");		
		// /BREADCRUMB

        // TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Error');
		// /TITLE BODY PAGE

        show_error('Privilegios insuficientes!', 403, 'Privilegios');       
    }

	public function singleWindow()
    {
		echo $this->load->view('errors/template/error_singleWindow', NULL, TRUE);        
		exit(403);
    }

    public function noImplementado(){
        // BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Error ] - Implementación', "Error/noImplementado");		
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Error');
		// /TITLE BODY PAGE
        
        show_error('Funcionalidad no implementada!', 403, 'No implementado');
    }
	
}
