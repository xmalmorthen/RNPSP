<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MX_Controller
{
    public $data;
    public function __construct(){
        parent::__construct();
        $this->lang->load('auth');
    }
    
    public function index(){
        $this->carabiner->js('auth/auth/index.js');
        $this->data['title'] = $this->lang->line('login_heading');
        $this->load->view('/auth/index',$this->data);
    }
    
    public function login() {
    
        // validate form input
        $this->load->library('form_validation');
        $this->form_validation->set_rules('identity','Usuario', 'required');
        $this->form_validation->set_rules('password','Contraseña', 'required');
        
        if ($this->form_validation->run() === TRUE) {
            
            // check to see if the user is logging in
            // check for "remember me"
            $remember = (bool)$this->input->post('remember');
            $this->load->library('ion_auth');
            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                //if the login is successful
                $this->data['error'] = false;
                $this->data['mensaje'] = array($this->ion_auth->messages());

            } else {
                // if the login was un-successful
                $this->data['error'] = true;
                $this->data['mensaje'] = array($this->ion_auth->errors());

            }
        } else {
            $this->data['error'] = true;
            $this->data['mensaje'] = $this->form_validation->error_array();
        }

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($this->data))
            ->_display();
        exit;
        
    }

}