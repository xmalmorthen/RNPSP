<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cedula extends CI_Controller {

	public function index()
	{
		// BREADCRUMB
		$this->mybreadcrumb->add('<i class="fa fa-home"></i>', base_url());		
		$this->mybreadcrumb->add('Cédula', base_url('Cedula'));		
		$this->session->set_flashdata('breadcrumb',$this->mybreadcrumb->render());
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Cédula');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/cedulaView');
	}
}