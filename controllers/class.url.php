<?php

class URLs {
	function LimpiarVariables($cadena){
	$cadena = strip_tags($cadena);
	return $cadena;
}

function makeLink($cadena){
    $separador = "-";
    $cadena = str_replace('a­', 'i', $cadena );
    $cadena = str_replace('ֳ­', 'i', $cadena );
    $cadena = str_replace('ד±', 'n', $cadena );
    $cadena = str_replace('ֳ±', 'n', $cadena );
    $cadena = str_replace('ֳ¡', 'a', $cadena );
    $cadena = str_replace('ד©', 'e', $cadena );
    $cadena = str_replace('ֳ©', 'e', $cadena );
    $cadena = str_replace('ד³', 'o', $cadena );
    $cadena = str_replace('ֳ³', 'o', $cadena );
    $cadena = str_replace('ד÷', 'u', $cadena );
    $cadena = str_replace('ֳ÷', 'u', $cadena );
    $cadena = str_replace('ד', 'a', $cadena );
    $cadena = str_replace('ֳ', 'a', $cadena );

    $cadena = strtolower(strtr($cadena, "ביםףתסֱֹֽ׃Úׁ-.", "aeiounaeioun  "));  

    $cadena = strtolower($cadena);
    $cadena = trim(str_replace("[^ A-Za-z0-9]", "", $cadena));
    $cadena = str_replace("[ \t\n\r]+ ", $separador, $cadena);
	  $cadena = strtr($cadena, ",<>'-.;:«»`()¿?!¡{}[]/=","                       "); 
  	$cadena = str_replace('"','', $cadena);
  	$cadena = str_replace('  ',' ', $cadena);  
  	$cadena = str_replace(' ','-', $cadena);  
  	$cadena = strtr($cadena, "üגהצ", "uaao");
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
$tofind = "ְֱֲֳִֵאבגדהוׂ׃װױײ״עףפץצרָֹÊֻטיךכַחּֽ־ֿלםמןÙÚÛÜשתûüÿׁס";
$replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
return(strtr(utf8_decode($cadena),$tofind,$replac));
}
function AcentosAsHTML($s) { 
   $s = str_replace("&aacute;","ב",$s); 
   $s = str_replace("&iacute;","ם",$s); 
   $s = str_replace("&eacute;","י",$s); 
   $s = str_replace("&oacute;","ף",$s); 
   $s = str_replace("&uacute;","ת",$s);
   $s = str_replace("&ntilde;","ס",$s); 
   return $s; 
} 

function AcentosAsPuntuacion($s) { 
   $s = str_replace("ב","&aacute;",$s); 
   $s = str_replace("ם","&iacute;",$s); 
   $s = str_replace("י","&eacute;",$s); 
   $s = str_replace("ף","&oacute;",$s); 
   $s = str_replace("ת","&uacute;",$s);
   $s = str_replace("ס","&ntilde;",$s); 
   return $s; 
}

}
?>