<?php

$this->nusoap_server->wsdl->addComplexType(
    'intArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(
        array(
            'ref' => 'SOAP-ENC:arrayType',
            'wsdl:arrayType' => 'xsd:integer[]'
        )
    ),
    'xsd:integer'
);

$this->nusoap_server->wsdl->addComplexType(
        'dataArray'         # Creamos nuestro propio tipo de datos, llamado Usuarios, lo vamos a utilizar para regresar la respuesta
        , 'complexType'    # Es de tipo complejo, es decir, un array o array asociativo
        , 'array'          # Su equivalencia en PHP en este caso, es de tipo array, ('struct' equivale a array asociativo)
        , ''               # Composición: 'all' | 'sequence' | 'choice', en nuestro caso no aplica
        , 'SOAP-ENC:Array' # Cómo se debe tratar y validar esta estructura de dato
        , array(           # Los elementos del array
              "XML" => array(
                    "name" => "XML",
                    "type" => "xsd:string"
              ),
              "Error" => array(
                    "name" => "ERROR",
                    "type" => "xsd:string"
              ),
        )
);

$this->nusoap_server->wsdl->addComplexType(
    'userInfo',
    'complextType',
    'struct',
    'sequence',
    '',
    array(
        'id' => array('name' => 'id', 'type' => 'xsd:integer'),
        'username' => array('name' => 'username', 'type' => 'xsd:string'),
        'email' => array('name' => 'email', 'type' => 'xsd:string')
    )
);


$this->nusoap_server->wsdl->addComplexType(
    'correos',
    'complextType',
    'struct',
    'sequence',
    '',
    array(
        'correo' => array('name' => 'correo', 'type' => 'xsd:integer'),
        'titulo' => array('name' => 'titulo', 'type' => 'xsd:string'),
        'mensaje' => array('name' => 'mensaje', 'type' => 'xsd:string'),
        'destinatario' => array('name' => 'destinatario', 'type' => 'xsd:string')
    )
);