<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PERSONA_model extends MY_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getPersona($curp)
  {
    $returnResponse = null;
    try {
      $exec = "EXEC	sp_B1_getPersona @pCURP = ?";
      $result = $this->db->query($exec,array(
          $curp,
        )
      );

      if (!$result) {
        throw new Exception($this->db->error()['message']);
      }
      $returnResponse = $this->query_row($result);
    } catch (rulesException $e) {
      log_message('info', $e->getMessage() . " [ PERSONA_model - tmpTestXmal ] [ GUID = {$this->config->item('GUID')} ]");
      throw $e;
    } catch (Exception $e) {
      log_message('error', $e->getMessage() . " [ PERSONA_model - tmpTestXmal ] [ GUID = {$this->config->item('GUID')} ]");
      show_error("Error interno - GUID de rastreo [ {$this->config->item('GUID')} ]", 500, 'Ocurrió un error');
    }

    return $returnResponse;
  }
}
