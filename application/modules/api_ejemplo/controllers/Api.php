<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MX_Controller {

    public function index() {
        $this->load->view('api/api/index');
    }
}
