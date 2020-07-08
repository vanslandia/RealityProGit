<?php 

session_start();
require_once "../../controllers/productosController.php"; 
require_once "../../models/productosModel.php";
require_once "../../controllers/bitacoraController.php";
require_once "../../models/bitacoraModel.php";

class CrudSlideAjax{ 

	public $imagen;
	public $articulo;
	public $temp; 
	public function Upload(){

		$datos = array("nombre"=>$this->imagen, "temporal"=>$this->temp, "inmueble"=>$this->articulo); 
		$respuesta = productosController::MostrarImg($datos);
		echo  $respuesta; 
	}


 
	public $delete; 
	public function EliminarImgApp(){ 

		$respuesta = productosController::EliminarImgInmuebController($this->delete);
		echo $respuesta; 
	}




	public $id;
	public $titulo;
	public $descripcion; 
	function UpdateSlide(){

		$datos = array("id"=>$this->id,"titulo"=>$this->titulo,"descripcion"=>$this->descripcion ); 
		$respuesta = productosController::EditGaleriaController($datos);
		echo $respuesta;
	}


	public $item;
	public $orden;
	public function UpdateOrder(){
		$datos = array("orden"=>$this->orden, "item"=>$this->item);
		productosController::OrdenImgInmuebController($datos);
	}




 }

 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 #  Nueva imagen
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if(isset($_FILES["imagen"]["name"])){

	if($_FILES["imagen"]["name"]!=""){
		
		$img = new CrudSlideAjax();
		$img->imagen = $_FILES["imagen"]["name"];
		$img->temp = $_FILES["imagen"]["tmp_name"];
		$img->articulo = $_POST["articulo"];
		$img->Upload();
	}

}

 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 #  Update Imagen
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if(isset($_POST["id"])){

	if($_POST["id"]!=""){

		$e = new CrudSlideAjax();
		$e->id = $_POST["id"];
		$e->titulo = $_POST["titulo"];
		$e->descripcion = $_POST["descripcion"];
		$e->UpdateSlide();

	}

}

 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 #  Eliminar Imagen
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

if(isset($_POST["delete"])){

	if($_POST["delete"]!=""){

		$e = new CrudSlideAjax();
		$e->delete = $_POST["delete"];
		$e->EliminarImgApp();

	}

}

 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 #  Ordenar Imagen
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

if(isset($_POST["Orden"])){

	if($_POST["Orden"]!=""){

		$e = new CrudSlideAjax();
		$e->item = $_POST["Item"];
		$e->orden = $_POST["Orden"];
		$e->UpdateOrder();

	}

}

