<?php

error_reporting(E_ALL);
include_once "includes.php";

function WS_CURP($curp,$cve_Usuario,$pass,$usuario_Solicita) {
	$Response["WS_CURPResult"] = '{"CURP":"'.$curp.'","apellido1":"MEDINA","apellido2":"MIRAMONTES","nombres":"OSCAR OMAR","sexo":"H","fechNac":"28/03/1983","nacionalidad":"MEX","nacDescripcion":"MEXICO","docProbatorio":"1","anioReg":"1983","foja":"","tomo":"","libro":"0001","numActa":"00831","CRIP":null,"numEntidadReg":"06","cveMunicipioReg":"002","NumRegExtranjeros":"","FolioCarta":"","cveEntidadNac":"CM","cveEntidadEmisora":"11003","statusCurp":"AN","Consulta":0,"StatusCode":"1","StatusResponse":"EXITO","Mensaje":"Consulta generada correctamente","ResponseKey":"2f509568-547d-4652-b79a-50c5e1800824","Fecha_Hora":"25/03/2019 17:44:45","Fuente_Busqueda":"WebServicie SESESP CURP"}';
	return $Response;
}