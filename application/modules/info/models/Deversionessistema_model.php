<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class DeVersionesSistema_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    
    public function set($id_Sistema,$VersionGit){        
         $data = array(
             'id_Sistema' => $id_Sistema,
             'VersionGit' => $VersionGit,
            'id_Usuario' => $this->session->userdata('user_id')
        );
        $this->db->insert('de_VersionesSistema',$data);
        return $this->db->insert_id();
    }
    
}