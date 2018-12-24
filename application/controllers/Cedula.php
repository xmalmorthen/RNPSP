<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cedula extends CI_Controller {

	public function persona()
	{
		// BREADCRUMB
		$this->mybreadcrumb->add('<i class="fa fa-home"></i>', base_url());		
		$this->mybreadcrumb->add('[ Cédula ] Alta de Persona', base_url('alta/cedula/persona'));
		$this->session->set_flashdata('breadcrumb',$this->mybreadcrumb->render());
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/cedulaView');
	}

	public function aspirante()
	{
		// BREADCRUMB
		$this->mybreadcrumb->add('<i class="fa fa-home"></i>', base_url());		
		$this->mybreadcrumb->add('[ Cédula ] Alta de Aspirante', base_url('alta/cedula/aspirante'));
		$this->session->set_flashdata('breadcrumb',$this->mybreadcrumb->render());
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/cedulaView');
	}

	public function replicar()
	{
		// BREADCRUMB
		$this->mybreadcrumb->add('<i class="fa fa-home"></i>', base_url());		
		$this->mybreadcrumb->add('[ Cédula ] Replicar', base_url('cedula/replicar'));
		$this->session->set_flashdata('breadcrumb',$this->mybreadcrumb->render());
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Replicar');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/cedulaView');
	}
}