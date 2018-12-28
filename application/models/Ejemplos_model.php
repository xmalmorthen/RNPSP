<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ejemplos_model extends CI_Model {
        
        public function __construct(){
                parent::__construct();
        }

        public function tmpTestXmal(){
                $returnResponse = NULL;
                try {
                        $exec = "DECLARE	
                                        @pID_ALTERNA int,
                                        @txtError varchar(250),
                                        @msg varchar(80),
                                        @tranEstatus int
                                
                                EXEC	[tmpTestXmal]
                                        @pID_ESTADO_EMISOR = ?,
                                        @pTIPO_OPERACION = N?,
                                        @pFECHA_ACTUALIZACION = ?,
                                        @pID_ALTERNA = @pID_ALTERNA OUTPUT,
                                        @txtError = @txtError OUTPUT,
                                        @msg = @msg OUTPUT,
                                        @tranEstatus = @tranEstatus OUTPUT
                                
                                SELECT	@pID_ALTERNA as N'pID_ALTERNA',
                                        @txtError as N'txtError',
                                        @msg as N'msg',
                                        @tranEstatus as N'tranEstatus'";

                        //$date = '23/11/1981';
                        $date = Utils::parseDateMMDDYYYY("23/11/1981");

                        $result = $this->db->query(
                                $exec,
                                array(
                                        1 ,
                                        'as' ,
                                        $date
                                )
                        );
                        
                        if (!$result){
                                throw new Exception($this->db->error()['message']);
                        }

                        $returnResponse = $result->result()[0];

                        if ($returnResponse->tranEstatus !== 1){
                                throw new rulesException($returnResponse->msg);
                        }
                } 
                catch (rulesException $e){
                        log_message('info',$e->getMessage() . " [ Principal_model - tmpTestXmal ] [ GUID = {$this->config->item('GUID')} ]");
                        throw $e;
                }
                catch (Exception $e) {
                        log_message('error',$e->getMessage() . " [ Principal_model - tmpTestXmal ] [ GUID = {$this->config->item('GUID')} ]");
                        show_error("Error interno - GUID de rastreo [ {$this->config->item('GUID')} ]", 500, 'Ocurrió un error');
                }

                return $returnResponse;
        }
}