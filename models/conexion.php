<?php 


class Conexion{

   public $driver;
   public function Conectar(){

      try {

         
            $driver = 'localhost';
            $dbname = 'rp2020';
            $user = 'root';
            $password = '';
            $port = '3306';
         /*
            $driver = 'localhost';
            $dbname = 'rp2018';
            $user = 'realiUse4';
            $password = 'S0uofndcj6896*';
            $port = '3306';
*/
            $link = new PDO("mysql:host=$driver;dbname=$dbname;port=$port",$user,$password);
            
            $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
            //var_dump($link);
            return $link;
      }catch(PDOException $e)  {
          echo '</title><div style="background:#E79F8F; font-family:verdana; border:#E24522 solid 1px; padding:1em; border-radius:5px; color:#B42100;">Hay un error con la conexi&oacute;n a la BD.<br>';
          echo "<small>Connection failed: " . $e->getMessage()."</small></div>";
       }
   }
}
 
/*
$a = new Conexion(); 
$a->Conectar(); 
*/


define("Keyboard", "VansD3velopEr6896*");

function EncriptacionVar($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}
 
function DecriptacionVar($string, $key) {
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
