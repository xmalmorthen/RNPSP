<?php
$this->nusoap_server->register("Enviar_Mail",
    array(
        "correo" => "xsd:string",
        "titulo" => "xsd:string",
        "mensaje" => "xsd:string",
        "destinatario" => "xsd:string"
        ),
    array(
        "return" => "xsd:string"
        ),
    "urn:".$this->server, 
    "urn:".$this->server."#Enviar_Mail",
    "rpc", 
    "encoded", 
    ""
);