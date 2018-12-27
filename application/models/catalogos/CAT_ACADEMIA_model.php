<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CAT_ACADEMIA_model extends CI_Model {
        
        private $TABLE_NAME = 'CAT_ACADEMIA';
        private $FIELDS_SELECT = '*';

        public function __construct(){
                parent::__construct();
        }

        public function get(){
                $returnResponse = NULL;
                try {
                        $this->db->cache_on();
                        $this->db->select($this->FIELDS_SELECT);
                        $this->db->from($this->TABLE_NAME);
                        $query = $this->db->get();
                        $this->db->cache_off();

                        if (!$query){
                                throw new Exception($this->db->error()['message']);
                        }

                        $returnResponse = $query->result();
                }
                catch (Exception $e) {
                        log_message('error',$e->getMessage() . " [ GUID = {$this->config->item('GUID')} ]");
                        show_error("Error interno - GUID de rastreo [ {$this->config->item('GUID')} ]", 500, 'Ocurrió un error');
                }

                return $returnResponse;
        }

        public function getById($id){
                $returnResponse = NULL;
                try {
                        $this->db->cache_on();
                        $this->db->select($this->FIELDS_SELECT);
                        $this->db->from($this->TABLE_NAME);
                        $this->db->where('ID_ACADEMIA', $id);
                        $query = $this->db->get();
                        $this->db->cache_off();

                        if (!$query){
                                throw new Exception($this->db->error()['message']);
                        }

                        $returnResponse = $query->result();
                }
                catch (Exception $e) {
                        log_message('error',$e->getMessage() . " [ GUID = {$this->config->item('GUID')} ]");
                        show_error("Error interno - GUID de rastreo [ {$this->config->item('GUID')} ]", 500, 'Ocurrió un error');
                }

                return $returnResponse;
        }

        public function getByField($fieldValue = NULL){
                $returnResponse = NULL;
                try {
                        $this->db->cache_on();
                        $this->db->select($this->FIELDS_SELECT);
                        $this->db->from($this->TABLE_NAME);

                        foreach ($fieldValue as $key => $value) {
                                $this->db->where($key, $value);
                        }
                        
                        $query = $this->db->get();
                        $this->db->cache_off();

                        if (!$query){
                                throw new Exception($this->db->error()['message']);
                        }

                        $returnResponse = $query->result();
                }
                catch (Exception $e) {
                        log_message('error',$e->getMessage() . " [ GUID = {$this->config->item('GUID')} ]");
                        show_error("Error interno - GUID de rastreo [ {$this->config->item('GUID')} ]", 500, 'Ocurrió un error');
                }

                return $returnResponse;
        }

}