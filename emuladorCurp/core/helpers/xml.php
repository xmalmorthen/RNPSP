<?php
function getElementByName($Xml, $Start, $End) {
   global $Pos;
   
   $StartPos = strpos($Xml, $Start);
   
   if($StartPos === false) return false;
   
   $EndPos = strpos($Xml, $End);
   $EndPos = $EndPos + strlen($End);   
   $Pos = $EndPos;
   $EndPos = $EndPos - $StartPos;
   $EndPos = $EndPos - strlen($End);
   $Tag = substr($Xml, $StartPos, $EndPos);
   $Tag = substr($Tag, strlen($Start));

   return $Tag;

}

function getEdad($Dia = 0,$Mes = 0, $Ano = 0) {
	$diaAct = date('j');
	$mesAct = date('n');
	$anioAct = date('Y');
	 	
	$Edad = ($anioAct - $Ano);
	
	if($Edad > 0) {
		if($mesAct < $Mes) {
			$Edad = ($Edad - 1);
		} else {
			if($mesAct == $Mes){
				if($diaAct < $Dia){
					$Edad = ($Edad - 1);
				}
			}
		}
	}	
	
	return $Edad;
}

function cleanCURP($Html) {
	$Buscar = strstr($Html, '<body onLoad="window.focus()">');
	$Cadena = explode('<div align="left" class="PaginaTitulo">', $Buscar);
	$Otra = explode('<td class="TablaTitulo"><span class="NotaBlanca">Nacionalidad</span></td>', $Cadena[1]);
	$Nueva = explode('<td class="TablaTitulo"><span class="NotaBlanca">Entidad de Nacimiento</span></td>', $Otra[1]);
	$Nacionalidad = str_replace('<td><b class="Nota">', '', $Nueva[0]);
	$Nacionalidad = str_replace('</b></td>', '', $Nacionalidad);
	$Nacionalidad = str_replace('</tr>', '', $Nacionalidad);
	$Nacionalidad = str_replace('<tr class="RenglonTablaColor">', '', $Nacionalidad);
	echo $Cadena[0];		

	echo '<input name="Nacionalidad" type="hidden" value="'.trim($Nacionalidad).'" />';
}


function getHeader() {
	echo '<html>
		<head>
			<script src="../js/jquery.js" type="text/javascript"></script>

			<script>
			$(document).ready(function(){
				Obtener();
			});
			function Obtener() {
				Curp = $(\'input[name="strCurp"]\').attr("value");
				Apellido1 = $(\'input[name="strPrimerApellido"]\').attr("value");
				Apellido2 = $(\'input[name="strSegundoAplido"]\').attr("value");
				Nombre = $(\'input[name="strNombre"]\').attr("value");
				Sexo = $(\'input[name="strSexo"]\').attr("value");
				FechaNac = $(\'input[name="strFechanacimiento"]\').attr("value");
				CveEnt = $(\'input[name="strCveEnt"]\').attr("value");
				Nacionalidad = $(\'input[name="Nacionalidad"]\').attr("value");
				Url = \'webservice.php?curp=\' + Curp + \'&a_paterno=\' + Apellido1 + \'&a_materno=\' + Apellido2 + \'&nombre=\' + Nombre + \'&sexo=\' + Sexo + \'&fecha=\' + FechaNac + \'&cve=\' + CveEnt + \'&nac=\' + Nacionalidad;
				location.href = Url;
			}
			</script>		
	</head>

	';
}
