<?php defined('BASEPATH') or exit('No direct script access allowed');

    class Preguntas extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->library('breadcrumbs');
        }

        public function index()
        {
            // BREADCRUMB
            $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
            $this->breadcrumbs->push('[ Preguntas ] - Preguntas - Preguntas de verificación', site_url('alta/cedula/datosPersonales'));
            // /BREADCRUMB
    
            // TITLE BODY PAGE
            $this->session->set_flashdata('titleBody', '[ Preguntas ] - Preguntas - Preguntas de verificación');
            // /TITLE BODY PAGE

            $this->db->select('contrasenaModificada');
            $this->db->from('cat_Usuarios');
            $query = $this->db->get();
            $response = $query->row_array();

            $preguntas = array(
                1=>'¿Cuál es el nombre de la mamá de tu mamá?',
                2=>'¿Cuál es el nombre del papá de tu papá?',
                3=>'¿Cuál es el nombre de tu mamá?',
                4=>'¿Cómo te llamaban en tu familia cuando eras niño?',
                5=>'¿En qué ciudad conociste a tu esposo(a), novio(a)?',
                6=>'¿Quién era el mejor amigo en infancia?',
                7=>'¿Porque calle vivías cuando tenías 10 años?',
                8=>'¿Cuál es la fecha de nacimiento de tu hermano mayor?',
                9=>'¿Cuál es el segundo nombre de tu hijo menor?',
                10=>'¿Cuál es el nombre de tu hermano mayor?'
            );
            $numPregunta = rand(1, 10);
            $data = array(
                'cambioContrasena' => 1,//$response['contrasenaModificada'],
                'pregunta' => $preguntas[$numPregunta],
                'idPregunta' => $numPregunta
            );
    
            $this->load->view('Preguntas/preguntasVerificacion',$data);
        }

        public function registroSave()
        {
            $dataResponse = array('message'=>array(),'status'=>'ok');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('pregunta1', '¿Cuál es el nombre de la mamá de tu mamá?', 'required|min_length[5]');
            $this->form_validation->set_rules('pregunta2', '¿Cuál es el nombre del papá de tu papá?', 'required|min_length[5]');
            $this->form_validation->set_rules('pregunta3', '¿Cuál es el nombre de tu mamá?', 'required|min_length[5]');
            $this->form_validation->set_rules('pregunta4', '¿Cómo te llamaban en tu familia cuando eras niño?', 'required|min_length[5]');
            $this->form_validation->set_rules('pregunta5', '¿En qué ciudad conociste a tu esposo(a), novio(a)?', 'required|min_length[5]');
            $this->form_validation->set_rules('pregunta6', '¿Quién era el mejor amigo en infancia?', 'required|min_length[5]');
            $this->form_validation->set_rules('pregunta7', '¿Porque calle vivías cuando tenías 10 años?', 'required|min_length[5]');
            $this->form_validation->set_rules('pregunta8', '¿Cuál es la fecha de nacimiento de tu hermano mayor?', 'required|min_length[5]');
            $this->form_validation->set_rules('pregunta9', '¿Cuál es el segundo nombre de tu hijo menor?', 'required|min_length[5]');
            $this->form_validation->set_rules('pregunta10', '¿Cuál es el nombre de tu hermano mayor?', 'required|min_length[5]');

            if ($this->form_validation->run($this) != false) {

                $this->load->library('uuid');
                $uuid = $this->uuid->v4();
                $idUsuario = $this->ion_auth->user()->row()->id;

                $this->db->where('id_Usuario',$idUsuario);
                $this->db->delete('de_RespuestasPreguntas');
                $dataInsert = array(
                    'id' => $uuid,
                    'id_Usuario' => $idUsuario,
                    'pregunta1' => $this->input->post('pregunta1'),
                    'pregunta2' => $this->input->post('pregunta2'),
                    'pregunta3' => $this->input->post('pregunta3'),
                    'pregunta4' => $this->input->post('pregunta4'),
                    'pregunta5' => $this->input->post('pregunta5'),
                    'pregunta6' => $this->input->post('pregunta6'),
                    'pregunta7' => $this->input->post('pregunta7'),
                    'pregunta8' => $this->input->post('pregunta8'),
                    'pregunta9' => $this->input->post('pregunta9'),
                    'pregunta10' => $this->input->post('pregunta10'),
                    'FechaRegistro' => date("Y-m-d H:i:s")
                );
                $this->db->insert('de_RespuestasPreguntas',$dataInsert);

                $dataUpdate = array(
                    'contrasenaModificada' => 0
                );
                $this->db->update('cat_Usuarios',$dataUpdate);

                
            } else {
                $dataResponse['status'] = 'error';
                $dataResponse['message'] = $this->form_validation->error_array();    
            }

            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($dataResponse))
                ->_display();
            exit;
        }

        public function registroSaveVerifica()
        {

            $dataResponse = array('message'=>array(),'status'=>'ok');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('preguntaSeguridad', $this->input->post('DescPreguntaSeguridad'), 'required|min_length[5]');

            if ($this->form_validation->run($this) != false) {
                $idUsuario = $this->ion_auth->user()->row()->id;
                // $this->db->close();
                // $this->db->reconnect();

                //$this->db->flush_cache();
                // $this->db->select('contrasenaModificada');
                $DB1 = $this->load->database('default', TRUE);
                $DB1->from('de_RespuestasPreguntas');
                $idPregunta = 'Pregunta'.$this->input->post('idPreguntaSeguridad');
                $respuestaPreg = $this->input->post('preguntaSeguridad');
                
                // echo "<pre>";
                // var_dump (array($idPregunta => $respuestaPreg,'id_Usuario'=>$idUsuario));
                // echo "</pre>";
                // exit();
                
                // $this->db->where('Pregunta'.$this->input->post('idPreguntaSeguridad'),$this->input->post('preguntaSeguridad'));
                // $this->db->where(array($idPregunta => $respuestaPreg));
                $DB1->where(array('id_Usuario'=>$idUsuario));
                $DB1->like($idPregunta,$this->input->post('preguntaSeguridad'));
                $DB1->order_by('FechaRegistro','desc');
                //utils::pre($this->db->last_query());
                $responseDB = $DB1->count_all_results();
                $DB1->close();

                $contadorIntentos = $this->session->userdata('contadorIntentos');
                if($responseDB == 0){
                    $dataResponse['status'] = 'fail';
                    $dataResponse['contadorIntentos'] = ($contadorIntentos == null? 2 : $contadorIntentos+1);
                }else{
                    $dataResponse['contadorIntentos'] = 0;
                }

                if($dataResponse['contadorIntentos'] == 4){
                    $upodate = array(
                        'active' => 0
                    );
                    $this->db->where('id',$idUsuario);
                    $this->db->update('cat_Usuarios',$upodate);
                    $dataResponse['status'] = 'failer';
                }
                $this->session->set_userdata('contadorIntentos',$dataResponse['contadorIntentos']);
                
                // $dataResponse['data'] = $this->db->
            } else {
                $dataResponse['status'] = 'error';
                $dataResponse['message'] = $this->form_validation->error_array();    
            }

            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($dataResponse))
                ->_display();
            exit;
        }
    }
