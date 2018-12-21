<?php defined('BASEPATH') OR exit('No direct script access allowed');

$CI =& get_instance();
$cnfg = (object)json_decode(CNFG);
$superMainModel = [            
	"title" => $cnfg->general->title,
	"css"   => '',
	"body"  => $CI->load->view('errors/template/error_404',NULL,TRUE),
	"js"    => ''
];   
echo $CI->load->view('shared/masterPage',$superMainModel,TRUE);
?>