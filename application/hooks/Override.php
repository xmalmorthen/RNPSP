<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Override {

    public function output($params = NULL)
    {   
        $CI =& get_instance();
        $out = $CI->output->get_output();

        $cnfg = (object)json_decode(CNFG);

        $superMainModel = [            
            "title" => $cnfg->general->title,
            "css"   => '',
            "body"  => $out,
            "js"    => ''
        ];        

        if ($CI->session->flashdata('noLayout') === TRUE){
            $CI->session->set_flashdata('noLayout',FALSE);
            echo $out;
        } else {
            # temporal
            $CI->load->library('table');
            $CI->table->set_template(array(
                'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">'
            ));
            $permisos = $_SESSION[SESSIONVAR]['permisos'];
            if($_SESSION[SESSIONVAR]['permisosTab'] == 1){
                $CI->table->set_heading(array('ID','TAB','Descripcion', 'Permiso'));
                foreach ($permisos as $key => $value) {
                    $CI->table->add_row(array($value['id_Permiso'],$value['Tab'], $value['Permiso'], $value['acceso']));    
                }
            }else{
                $CI->table->set_heading(array('ID','Descripcion', 'Permiso'));
                foreach ($permisos as $key => $value) {
                    $CI->table->add_row(array($value['id_Permiso'], $value['Permiso'], $value['acceso']));    
                }
            }
            $superMainModel['permisos'] = $CI->table->generate();
            
            echo $CI->load->view('shared/masterPage',$superMainModel,TRUE);
        }

        return;
    }
}