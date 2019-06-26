<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('prepareImageDBString'))
{
    //Convierte cadena binaria a hexadecimal
	function prepareImageDBString($binaryFile)
    {
        $content = bin2hex($binaryFile);
        $out = "0x".$content;
        return $out;
    }
}

if ( ! function_exists('prepareImageString'))
{
    //Convierte cadena hexadecimal a binaria
	function prepareImageString($HexString)
    {
        $content = substr($HexString, 2);
        $out = hex2bin($content);      
        return $out;
    }
}