<?php defined('BASEPATH') or exit('No direct script access allowed');

class V3 extends REST_Controller
{
    public $data = array();
    public $contolador;
    function __construct()
    {
        $this->contolador = 6;
        parent::__construct();
        $this->data = array(
            'error' => false,
            'info' => array('mensaje' => array('EXITO'))
        );

    }
    function index_get()
    {
        redirect('correos/info/v3');
    }

    function enviar_post()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('correo', 'correo', 'trim|required');
        $this->form_validation->set_rules('titulo', 'titulo', 'trim|required');
        $this->form_validation->set_rules('contenido', 'contenido', 'trim|required');

        if ($this->form_validation->run($this) == true) {
            $correo = $this->input->post('correo');
            $titulo = $this->input->post('titulo');
            $contenido = $this->input->post('contenido');

            $idUsuario = $this->session->userdata('user_id');
            switch ($idUsuario) {
                case 1:
                case 9:
                    $this->load->model('CorreosV3_model');
                    $result = $this->CorreosV3_model->enviarDesarrollo($correo, $titulo, $contenido);
                    break;

                default:
                    $this->load->model('CorreosV3_model');
                    $result = $this->CorreosV3_model->enviar($correo, $titulo, $contenido);
                    break;
            }

            if ($result['error'] == false) {

            } else {
                $this->data['error'] = true;
                $this->data['info']['mensaje'] = array('Ha ocurrido un error al enviar el correo');
            }

        } else {

            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();

        }

        $this->response($this->data, 200);
    }

    function enviarMiEmpresa_post()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('destinatario', 'destinatario (Correo del destinatario)', 'trim|required');
        $this->form_validation->set_rules('titulo', 'titulo', 'trim|required');
        $this->form_validation->set_rules('contenido', 'contenido', 'trim|required');

        if ($this->form_validation->run($this) == true) {

            $correo = $this->input->post('destinatario');
            $titulo = $this->input->post('titulo');
            $contenido = $this->input->post('contenido');

            $this->load->model('CorreosV3_model');
            $result = $this->CorreosV3_model->enviarMiEmpresa($correo, $titulo, $contenido);

            if ($result['error'] == false) {

                $this->data['data'] = array(
                    'Detalle' => site_url('info/detalleBitadora?id=' . $result['id_correo'])
                );

            } else {

                $this->data['data'] = array(
                    'Detalle' => site_url('info/detalleBitadora?id=' . $result['id_correo'])
                );
                $this->data['error'] = true;
                $this->data['info']['mensaje'] = array('Ha ocurrido un error al enviar el correo');
            }

        } else {

            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();

        }

        $this->response($this->data, 200);
    }

    function enviarSGC_post()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('destinatario', 'destinatario (Correo del destinatario)', 'trim|required');
        $this->form_validation->set_rules('titulo', 'titulo', 'trim|required');
        $this->form_validation->set_rules('contenido', 'contenido', 'trim|required');

        if ($this->form_validation->run($this) == true) {

            $correo = $this->input->post('destinatario');
            $titulo = $this->input->post('titulo');
            $contenido = $this->input->post('contenido');

            $this->load->model('CorreosV3_model');
            $result = $this->CorreosV3_model->enviarSGC($correo, $titulo, $contenido);

            if ($result['error'] == false) {

                $this->data['data'] = array(
                    'Detalle' => site_url('info/detalleBitadora?id=' . $result['id_correo'])
                );

            } else {

                $this->data['data'] = array(
                    'Detalle' => site_url('info/detalleBitadora?id=' . $result['id_correo'])
                );
                $this->data['error'] = true;
                $this->data['info']['mensaje'] = array('Ha ocurrido un error al enviar el correo');
            }

        } else {

            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();

        }

        $this->response($this->data, 200);
    }

    function enviarPruebas_post()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('destinatario', 'destinatario (Correo del destinatario)', 'trim|required');
        $this->form_validation->set_rules('titulo', 'titulo', 'trim|required');
        $this->form_validation->set_rules('contenido', 'contenido', 'trim|required');

        if ($this->form_validation->run($this) == true) {

            $correo = $this->input->post('destinatario');
            $titulo = $this->input->post('titulo');
            $contenido = $this->input->post('contenido');

            $contenido = 'Destinatario original: ' . $correo . '<br/><hr style=" border: 0; border-bottom: 1px dashed #ccc; background: #999;" />' . $contenido;

            $user = $this->ion_auth->user()->row();
            $correo = $user->email;

            $this->load->model('CorreosV3_model');
            $result = $this->CorreosV3_model->enviar($correo, $titulo, $contenido);

            if ($result['error'] == false) {

                $this->data['data'] = array(
                    'Detalle' => site_url('info/detalleBitadora?id=' . $result['id_correo'])
                );

            } else {

                $this->data['data'] = array(
                    'Detalle' => site_url('info/detalleBitadora?id=' . $result['id_correo'])
                );
                $this->data['error'] = true;
                $this->data['info']['mensaje'] = array('Ha ocurrido un error al enviar el correo');
            }

        } else {

            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();

        }

        $this->response($this->data, 200);
    }


    public function bitacora_post()
    {

        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $draw = $this->input->post('draw');

        $order = $this->input->post('order');
        if (is_array($order)) {
            $order = current($order);
        }

        $this->load->model('DeBitacora_model');
        $count = $this->DeBitacora_model->CountConsultaDataTablesControlador($this->contolador);

        $data = array(
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $this->DeBitacora_model->ConsultaDataTablesControlador($start, $length, $this->contolador)
        );

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data))
            ->_display();
        exit;
    }

}