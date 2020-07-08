<?php 

session_start();
require_once "../../controllers/usuariosController.php";
require_once "../../models/usuariosModel.php";
require_once "../../controllers/bitacoraController.php";
require_once "../../models/bitacoraModel.php";



class UsuariosAjax{

	public $ID;
	public function UsuarioId(){

		$datos = $this->ID;
		$respuesta = usuariosController::UsuarioIdController($datos);
		echo json_encode($respuesta);

	}

}



 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 #  Eliminar Imagen
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

if(isset($_POST["id"])){

	if($_POST["id"]!=""){

		$e = new UsuariosAjax();
		$e->ID = $_POST["id"]; 
		$e->UsuarioId();

	}

}
