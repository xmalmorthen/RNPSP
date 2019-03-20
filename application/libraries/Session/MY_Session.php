<?php defined('BASEPATH') or exit('No direct script access allowed.');

class MY_Session extends CI_Session
{

  public function __construct(array $params = array())
  {
    if ($this->ignore_sessions())
      return;
    parent::__construct();
  }
  function ignore_sessions()
  {
    $uri = str_replace("//", "/", $_SERVER['REQUEST_URI']);
    if (strpos($uri, '/ignore_this_controller/') === 0)
      return true;
    return false;
  }

  public function local_sess_regenerate($param){
    return $this->sess_regenerate($param);
  }

  public function local_userdata($key = false){
    $session = $this->userdata(SESSIONVAR);
    if($key != false && is_array($session) && array_key_exists($key,$session)){
      return $session[$key];
    }else{
      return $session;
    }
  }

  public function local_set_userdata($session_data)
  {
    return $this->set_userdata(SESSIONVAR,$session_data);
  }
}