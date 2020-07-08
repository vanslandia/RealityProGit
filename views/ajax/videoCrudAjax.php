<?php 

session_start();
require_once "../../controllers/videoController.php";
require_once "../../models/videoModel.php";
require_once "../../controllers/bitacoraController.php";
require_once "../../models/bitacoraModel.php";

class videoAjax{

	public $datos;
	public function SubirVideo(){
		$archivo = $this->datos;
		$respuesta = videoController::SubirVideoController($archivo);
		echo $respuesta;
	}

	public $delete; 
	public function EliminarFileApp(){ 
		$borrar = $this->delete;
		$respuesta = videoController::EliminarFileController($borrar);
		echo $respuesta; 
	}

}
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 #  Subir video
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if(isset($_FILES["archivoVideo"]["name"]) && isset($_FILES["archivoVideo"]["tmp_name"])){

	if($_FILES["archivoVideo"]["name"]!=""){

		$e = new videoAjax(); 
		$e->datos = $_FILES["archivoVideo"]["tmp_name"];
		$e->SubirVideo();

	}
}
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 #  Eliminar video
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

if(isset($_POST["delete"])){
	if($_POST["delete"]!=""){
		$e = new videoAjax();
		$e->delete = $_POST["delete"];
		$e->EliminarFileApp();
	}

}


