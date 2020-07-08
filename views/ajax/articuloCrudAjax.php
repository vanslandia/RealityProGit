<?php 

session_start();
require_once "../../controllers/articuloController.php";
require_once "../../models/articuloModel.php";
require_once "../../controllers/bitacoraController.php";
require_once "../../models/bitacoraModel.php";

class ArticuloAjax{

	public $archivo;
	public $temp;
	public function SubirImgArt(){

		$datos = array("imagen"=>$this->archivo, "temporal"=>$this->temp);

		$respuesta = articuloController::SubirImgArtController($datos);

		echo $respuesta;

	}


}


 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 #  Eliminar Imagen
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

if(isset($_FILES["imagen"]["name"])){

	if($_FILES["imagen"]["name"]!=""){

		$e = new ArticuloAjax();
		$e->archivo = $_FILES["imagen"]["name"];
		$e->temp = $_FILES["imagen"]["tmp_name"];
		$e->SubirImgArt();

	}

}