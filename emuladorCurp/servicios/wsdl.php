<?php
include "../core/classes/nusoap/nusoap.php";
include "webservice.php";

$Server = new soap_server();
$Ns = 'http://localhost:'.$_SERVER['SERVER_PORT'].'/SGP/emuladorCurp/servicios/';
$Server->configurewsdl("webservice", $Ns);
$Server->wsdl->schematargetnamespace = $Ns;

//Definición de tipo de dato complejo.
$Server->wsdl->addComplexType(
	"Response", //Nombre del tipo de dato que va regresar.
	"complexType", //Tipo de dato.
	"struct", //Significa que retornar un vector.
	"all", // ??
	"", // RPC, pero no sabemos que es. ??
	array( // Definimos las posiciones.
		"XML" => array(
			"name" => "WS_CURPResult",
			"type" => "xsd:string"
		),
		"WS_CURPResult" => array(
			"name" => "WS_CURPResult",
			"type" => "xsd:string"
		),
		"Error" => array(
			"name" => "Error",
			"type" => "xsd:string"
		),
	)
);

$Server->register(
	"WS_CURP", //Nombre del procedimiento que se ejecutará en el archivo webservice.php
	array(//Arreglo con los parámetros que recibe el procedimiento.
		"CURP" => "xsd:string",
		"Cve_Usuario" => "xsd:string",
		'Pass' => "xsd:string", 
		'Usuario_Solicita' => "xsd:string"
	),
	array(
		"return" => "tns:Response"
	),
	$Ns,
	$Ns . "#WS_CURP",
	"rpc",
	"encoded",
	"Obtiene los datos"//Al ejecutar el webservice.php Se muestra en la interfaz, como descripción. Variable meramente informativa.
);

/*
 * Esto siempre debe estar, sirve para que muestre el WSDL.
 * */
$PostData = isset($GLOBALS["HTTP_RAW_POST_DATA"]) ? $GLOBALS["HTTP_RAW_POST_DATA"] : "";
$Server->service($PostData);
exit();
