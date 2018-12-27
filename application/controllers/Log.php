<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {
    
    function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
	}  
    
    function index(){
        redirect('log/show');
    }
    
    function show(){
        // CONFIGURATIONS
		$this->session->set_flashdata('noLayout',TRUE);
		// /CONFIGURATIONS
        
        $this->load->spark( 'fire_log/0.8.2');
    }  
    
}

/* End of file log.php */
/* Location: ./application/controllers/errorlog.php */