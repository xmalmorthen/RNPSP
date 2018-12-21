<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function index()
	{
		// BREADCRUMB
		$this->mybreadcrumb->add('<i class="fa fa-home"></i>', base_url());		
		$this->session->set_flashdata('breadcrumb',$this->mybreadcrumb->render());
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Página principal');
		// /TITLE BODY PAGE

		$this->load->view('Principal/principalView');
	}
}
