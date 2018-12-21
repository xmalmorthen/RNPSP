<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta extends CI_Controller {

	public function tipo($tipo = NULL)
	{
		// BREADCRUMB
		$this->mybreadcrumb->add('<i class="fa fa-home"></i>', base_url());		
		$this->mybreadcrumb->add('Consulta', base_url('Consulta'));		
		$this->session->set_flashdata('breadcrumb',$this->mybreadcrumb->render());
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Consulta');
		// /TITLE BODY PAGE

		$this->load->view('Consulta/consultaView');
	}
}