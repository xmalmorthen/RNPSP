<?php

function ____($Var, $Dump = false) {
	echo '<pre>';
		if($Dump == false) print_r($Var);
		else var_dump($Var);
	echo '</pre>';
	exit;
}

function getDateNow() {
	return date("Y-m-d h:i:s");
}

function Base64($String, $Force = 3, $Type = "Encode") {
	if($Force == 3) {
		if($Type == "Encode") return base64_encode(base64_encode(base64_encode($String)));
		else return base64_decode(base64_decode(base64_decode($String)));
	} elseif($Force == 2) {
		if($Type == "Encode") return base64_encode(base64_encode($String));
		else return base64_decode(base64_decode($String));
	} else {
		if($Type == "Encode") return base64_encode($String);
		else return base64_decode($String);
	}
}

function openUrl($Url) {
	$Session = curl_init($Url);

    curl_setopt($Session, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($Session, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($Session, CURLOPT_TIMEOUT, 5);
    curl_setopt($Session, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($Session, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES; rv:1.8.1.7) Gecko/20070914 Firefox/2.0.0.7');

    $Result = curl_exec($Session);

    curl_close($Session);

    return $Result;
}

function regexpCurp($Html) {
	$Curp = false;
	$Regexp = '/\<input type="hidden" name="([^\"]+)" value="([^\"]+)"\>/';
	preg_match_all($Regexp, $Html, $matchesCurp);

	foreach($matchesCurp[1] as $Key => $Match) {
		$Curp[$Match] = $matchesCurp[2][$Key];
	}

	return $Curp;
}

function regexpNacionalidad($Html) {
	$Regexp = '/\<td class="TablaTitulo"\>\<span class="NotaBlanca"\>Nacionalidad\<\/span\>\<\/td\>(?:[\s]+)\<td\>\<b class="Nota"\>([^\<]+)\<\/b\>\<\/td\>/s';
	preg_match($Regexp, $Html, $matchesNacionalidad);
	$Nacionalidad = $matchesNacionalidad[1];
	return $Nacionalidad;
}


function decrypt($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}

function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}
//End of file.
