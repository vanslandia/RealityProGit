<?php 

session_start();
require_once "../../controllers/galeriaController.php";
require_once "../../models/galeriaModel.php";
require_once "../../controllers/bitacoraController.php";
require_once "../../models/bitacoraModel.php";


class GaleriaCurdAjax{

	public $imagen;
	public $temp; 
	public function Upload(){

		$datos = array("nombre"=>$this->imagen, "temporal"=>$this->temp); 
		$respuesta = galeriaController::MostrarImgGaleria($datos);
		echo  $respuesta; 
	}




	public $delete; 
	public function EliminarImgApp(){ 

		$respuesta = galeriaController::EliminarImgController($this->delete);
		echo $respuesta; 
	}



	public $item;
	public $orden;
	public function UpdateOrder(){
		$datos = array("orden"=>$this->orden, "item"=>$this->item);
		galeriaController::OrdenController($datos);
 
	}






}



 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 #  Nueva imagen
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if(isset($_FILES["imagen"]["name"])){

	if($_FILES["imagen"]["name"]!=""){
		
		$img = new GaleriaCurdAjax();
		$img->imagen = $_FILES["imagen"]["name"];
		$img->temp = $_FILES["imagen"]["tmp_name"];
		$img->Upload();
	}

}


 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 #  Eliminar Imagen
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

if(isset($_POST["delete"])){

	if($_POST["delete"]!=""){

		$e = new GaleriaCurdAjax();
		$e->delete = $_POST["delete"];
		$e->EliminarImgApp();

	}

}



 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 #  Ordenar Imagen
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

if(isset($_POST["Orden"])){

	if($_POST["Orden"]!=""){

		$e = new GaleriaCurdAjax();
		$e->item = $_POST["Item"];
		$e->orden = $_POST["Orden"];
		$e->UpdateOrder();

	}

}











