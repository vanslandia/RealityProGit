<?php

class URLs {
	function LimpiarVariables($cadena){
	$cadena = strip_tags($cadena);
	return $cadena;
}

function makeLink($cadena){
    $separador = "-";
    $cadena = str_replace('a�', 'i', $cadena );
    $cadena = str_replace('í', 'i', $cadena );
    $cadena = str_replace('�', 'n', $cadena );
    $cadena = str_replace('ñ', 'n', $cadena );
    $cadena = str_replace('á', 'a', $cadena );
    $cadena = str_replace('�', 'e', $cadena );
    $cadena = str_replace('é', 'e', $cadena );
    $cadena = str_replace('�', 'o', $cadena );
    $cadena = str_replace('ó', 'o', $cadena );
    $cadena = str_replace('�', 'u', $cadena );
    $cadena = str_replace('ú', 'u', $cadena );
    $cadena = str_replace('�', 'a', $cadena );
    $cadena = str_replace('�', 'a', $cadena );

    $cadena = strtolower(strtr($cadena, "������������-.", "aeiounaeioun  "));  

    $cadena = strtolower($cadena);
    $cadena = trim(str_replace("[^ A-Za-z0-9]", "", $cadena));
    $cadena = str_replace("[ \t\n\r]+ ", $separador, $cadena);
	  $cadena = strtr($cadena, ",<>'-.;:��`()�?!�{}[]/=","                       "); 
  	$cadena = str_replace('"','', $cadena);
  	$cadena = str_replace('  ',' ', $cadena);  
  	$cadena = str_replace(' ','-', $cadena);  
  	$cadena = strtr($cadena, "����", "uaao");
	  $cadena = str_replace(' ', '-', $cadena );
    return $cadena; 
}

function unMakeLink($texto){
	$texto = rtrim($texto, '/');
	$texto = strip_tags($texto);
	$texto = str_replace('-', " ", $texto);	
	return $texto;
}

function LimpiarForm($texto){
	$texto = strip_tags($texto);
	$texto = htmlentities(utf8_decode($texto));
	return $texto;
}

function QuitarAcento($cadena){
$tofind = "�����������������������������������������������������";
$replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
return(strtr(utf8_decode($cadena),$tofind,$replac));
}
function AcentosAsHTML($s) { 
   $s = str_replace("&aacute;","�",$s); 
   $s = str_replace("&iacute;","�",$s); 
   $s = str_replace("&eacute;","�",$s); 
   $s = str_replace("&oacute;","�",$s); 
   $s = str_replace("&uacute;","�",$s);
   $s = str_replace("&ntilde;","�",$s); 
   return $s; 
} 

function AcentosAsPuntuacion($s) { 
   $s = str_replace("�","&aacute;",$s); 
   $s = str_replace("�","&iacute;",$s); 
   $s = str_replace("�","&eacute;",$s); 
   $s = str_replace("�","&oacute;",$s); 
   $s = str_replace("�","&uacute;",$s);
   $s = str_replace("�","&ntilde;",$s); 
   return $s; 
}

}
?>