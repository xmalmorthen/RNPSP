<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Solicitud extends CI_Controller {
        function __construct()
        {
            parent::__construct();    
            $this->load->library('breadcrumbs');
        }

		public function index(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Solicitudes ] - Solicitudes - Persona - Alta', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Solicitudes ] - Solicitudes - Persona - Alta');
			// /TITLE BODY PAGE
		
			//MODELO DE PRUEBA
			$model = [];
			$items = [];
			for ($i=1; $i <=1000 ; $i++) { 
				$item = array(
					'folio' => 'folio ' . $i,
					'Nombre' => 'Nombre ' . $i,
					'ApellidoPaterno' => 'Ap1 ' . $i,
					'ApellidoMaterno' => 'Ap2 ' . $i,
					'FechadeRegistro' => date('m/d/Y'),
					'TipodeSolicitud' => 'Solicitud ' . $i,
					'Estatus' => 'Estatus ' . $i,
					'options' => array(
						'id' => $i
					)
				);
				array_push( $items, $item );
			};
			$model['items'] = $items;

			$this->load->view('Solicitud/index',$model);
        }

        public function Alta(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Solicitudes ] - Solicitudes - Persona - Alta', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Solicitudes ] - Solicitudes - Persona - Alta');
			// /TITLE BODY PAGE
		
			$this->load->view('Solicitud/Registro');
        }
        
        public function Ver(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Solicitudes ] - Solicitudes  - Ver', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Solicitudes ] - Solicitudes - Ver');
			// /TITLE BODY PAGE
		
			$this->load->view('Solicitud/Ver');
        }
        
        public function Modificar(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Solicitudes ] - Solicitudes - Modificar', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Solicitudes ] - Solicitudes - Modificar');
			// /TITLE BODY PAGE
		
			$this->load->view('Solicitud/Modificar');
        }
        
      
    }



?>