<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller
{
    public $data;
    public function __construct(){
        parent::__construct();
        $this->lang->load('auth');
    }
    
    public function index(){
        
//        $this->data['title'] = $this->lang->line('login_heading');
//        
//        
//        if($_SERVER['REQUEST_METHOD'] == 'POST'){
//            utils::pre($_POST);
//        }
//        
//        
//        // validate form input
//        $this->load->library('form_validation');
//        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
//        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');
//        if ($this->form_validation->run() === TRUE) {
//            // check to see if the user is logging in
//            // check for "remember me"
//            $remember = (bool)$this->input->post('remember');
//            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
//                //if the login is successful
//                //redirect them back to the home page
//                $this->session->set_flashdata('message', $this->ion_auth->messages());
//                redirect('/', 'refresh');
//            } else {
//                // if the login was un-successful
//                // redirect them back to the login page
//                $this->session->set_flashdata('message', $this->ion_auth->errors());
//                redirect('auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
//            }
//        } else {
//            // the user is not logging in so display the login page
//            // set the flash data error message if there is one
////            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
//            
//            
//        }
        
        $this->load->view('/home/index');
    }

}