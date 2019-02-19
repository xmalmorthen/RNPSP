<?php defined('BASEPATH') OR exit('No direct script access allowed');

class V1 extends REST_Controller
{
    public $data = array();
    function __construct()
    {
        parent::__construct();

        $this->data = array(
            'error' => false,
            'info' => array('mensaje'=>array('EXITO'),'cache'=>false),
            'data' => array()
        );
    }

    function header_post()
    {    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('idDependencia', 'idDependencia', 'trim|required');
        $this->form_validation->set_rules('archivos', 'archivos', 'trim');

        if ($this->form_validation->run($this) == TRUE)
        {
            $aDatos = array();
            //Id dependencia
            $dependencia = $this->input->post('idDependencia');
            //Recibe los archivos css y js 
            $aDatos['archivos'] = $this->input->post('archivos');
            
            $this->load->driver('cache',array('key_prefix' => REDIS));
            if(! $cache = $this->cache->redis->get('encabezado_'.md5($dependencia) )){
                $this->load->model('Dependencia_model');
                $aDatos['Dependencia'] = $this->Dependencia_model->getDependencia($dependencia);

                if($aDatos['Dependencia'] != false)
                { 
                    $aDatos['Dependencia']['padre'] = $this->Dependencia_model->getDependencia($aDatos['Dependencia']['id_padre']);
                } else {
                    $aDatos['Dependencia']['padre']="";
                    $aDatos['Dependencia']['padre']['url_sitio']="";
                    $aDatos['Dependencia']['padre']['dependencia']="";
                }

                $aDatos['navbar'] = $this->load->view('v1/navbar',false,TRUE);
                
                $html = base64_encode($this->load->view('v1/encabezado',$aDatos,TRUE));
                $this->cache->redis->save('encabezado_'.md5($dependencia), $html, REDIS_TIME);
                $this->data['data'] = $html;
            } else {
                $this->data['data'] = $cache;
                $this->data['info']['cache'] = true;
            }
            
            
            
        } else {
            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();
        }
        $this->response($this->data, 200);
    }
    
    function footer_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('idDependencia', 'idDependencia', 'trim|required');
        $this->form_validation->set_rules('archivos', 'archivos', 'trim');

        if ($this->form_validation->run($this) == TRUE)
        {
            $aDatos = array();
            $dependencia = $this->input->post('idDependencia');
            $aDatos['jquery'] = $this->input->post('archivos');
            
            $this->load->driver('cache',array('key_prefix' => REDIS));
            if(! $cache = $this->cache->redis->get('footer_'.md5($dependencia) ))
            {    
                $this->load->model('Dependencia_model');
                $oDependencia = $this->Dependencia_model->getDependencia($dependencia);

		$aDatos['dependencia'] = $oDependencia['dependencia'];
		$aDatos['codigo_seguimiento'] = $oDependencia['codigo_seguimiento'];
		
		$html = base64_encode($this->load->view('v1/footer',$aDatos,TRUE));	

                $this->cache->redis->save('footer_'.md5($dependencia), $html, REDIS_TIME);
                $this->data['data'] = $html;
            } else {
                $this->data['data'] = $cache;
                $this->data['info']['cache'] = true;
            }
            
        } else {
            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();
        }
        $this->response($this->data, 200);
        	
    }
    
    public function contenidos_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('idDependencia', 'dependencia', 'trim|required');
        $this->form_validation->set_rules('idCategoria', 'idCategoria', 'trim|required');
        $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
        $this->form_validation->set_rules('limit', 'limit', 'trim|required');
        $this->form_validation->set_rules('reg_ini', 'reg_ini', 'trim|required');
        $this->form_validation->set_rules('orden', 'orden', 'trim|required');

        if ($this->form_validation->run($this) == TRUE)
        {
            $idDependencia = $this->input->post('idDependencia');
            $idCategoria = $this->input->post('idCategoria');
            $fecha = $this->input->post('fecha');
            $limit = $this->input->post('limit');
            $reg_ini = $this->input->post('reg_ini');
            $orden = $this->input->post('orden');

            $this->load->driver('cache',array('key_prefix' => REDIS));
            if(! $cache = $this->cache->redis->get('contenidos_'.md5($idDependencia) ))
            {    
                $orden = ($orden == 'RAND')? "RAND()" : $orden;
                
                $this->load->model('Contenidos_model');
                $response = $this->Contenidos_model->getContenidos($idDependencia, $idCategoria, $fecha, $limit, $reg_ini, $orden);

                $adatos = array();
		if(is_array($response))
                {
                    foreach ($response as $registro)
                    {
                        if ($registro['fecha_bajado'] != '0000-00-00') {
                            $dStart = new DateTime($registro['fecha_bajado']);
                            $dEnd = new DateTime("now");
                            $dDiff = $dStart->diff($dEnd);
                            
                            if ($dStart <= $dEnd)
                            {
                                $aArchivos['registros']	= $this->Contenidos_model->getArchivos($idDependencia,$registro['id_cont']);
                                $aArchivos['ruta']      = 'http://www.colima-estado.gob.mx/archivos_prensa/banco_img/';
                                $registro['archivos']   = $aArchivos;
                                $adatos[]	= $registro;
                            }
                        } else {
                            $aArchivos['registros'] = $this->Contenidos_model->getArchivos($idDependencia,$registro['id_cont']);
                            $aArchivos['ruta']      = 'http://www.colima-estado.gob.mx/archivos_prensa/banco_img/';
                            $registro['archivos']   = $aArchivos;
                            $adatos[]  = $registro;
                        }
                        

                    }
                }
                $this->cache->redis->save('contenidos_'.md5($idDependencia), $adatos, REDIS_TIME);
                $this->data['data'] = $adatos;
            } else {
                $this->data['data'] = $cache;
                $this->data['info']['cache'] = true;
            }
            
        } 
        else {
            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();
        }
        $this->response($this->data, 200);    
    }
    
    public function contenido_post() 
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('idDependencia', 'idDependencia', 'trim|required');
        $this->form_validation->set_rules('idRegistro', 'idRegistro', 'trim|required');

        if ($this->form_validation->run($this) == TRUE)
        {
            $idDependencia = $this->input->post('idDependencia');
            $idRegistro = $this->input->post('idRegistro');

            $this->load->model('Contenidos_model');
            $contenido = $this->Contenidos_model->getContenido($idDependencia, $idRegistro);

            $adatos['cuerpo_cont']  = $contenido;
            $aArchivos['registros'] =  $this->Contenidos_model->getArchivos($idDependencia,$idRegistro);
            $aArchivos['ruta']      = 'http://www.colima-estado.gob.mx/archivos_prensa/banco_img/';
            $adatos['archivos']     =  $aArchivos;
            
            $this->data['data'] = $adatos;
            
        } else {
            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();
        }
        $this->response($this->data, 200);
    }
    
}