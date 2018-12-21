<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		show_error('Error no controlado', 500, 'Ocurrió un error');
	}

	public function e404()
	{
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
        show_error('Privilegios insuficientes!', 403, 'Privilegios');       
    }

    public function noImplementado(){
        show_error('Funcionalidad no implementada!', 403, 'No implementado');
    }
	
}
