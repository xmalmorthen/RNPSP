<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Error');
		// /TITLE BODY PAGE
        // BREADCRUMB
		$this->session->set_flashdata('breadcrumb',NULL);
		// /BREADCRUMB
		show_error('Error no controlado', 500, 'Ocurrió un error');
	}

	public function e404()
	{
        // TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Error');
		// /TITLE BODY PAGE
        // BREADCRUMB
		$this->session->set_flashdata('breadcrumb',NULL);
		// /BREADCRUMB

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
        // TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Error');
		// /TITLE BODY PAGE
        // BREADCRUMB
		$this->session->set_flashdata('breadcrumb',NULL);
		// /BREADCRUMB
        show_error('Privilegios insuficientes!', 403, 'Privilegios');       
    }

    public function noImplementado(){
        // TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Error');
		// /TITLE BODY PAGE
        // BREADCRUMB
		$this->session->set_flashdata('breadcrumb',NULL);
		// /BREADCRUMB
        show_error('Funcionalidad no implementada!', 403, 'No implementado');
    }
	
}
