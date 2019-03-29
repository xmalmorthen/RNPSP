<?php  defined('BASEPATH') or exit('No direct script access allowed');

class EjemploCurp extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
      $this->load->model('CURP_model');
      $response = $this->CURP_model->get();
      Utils::pre($response);
      exit(0);
    }
}
