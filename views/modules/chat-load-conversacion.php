<?php 

//session_start();
require_once "../../controllers/chatController.php";
require_once "../../models/chatModel.php"; 
require_once "../funciones.php";



class CargarDatos{
 
	public function BuscarDatos($id){
 
		$respuesta = chatController::ConversacionChatIDController($id);
		//echo json_encode($respuesta);
		echo $respuesta;

	}

}



 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 #  Eliminar Imagen
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

if( !empty($_POST["id"])  || !empty($_GET["id"]) ){

	if( !empty($_POST["id"])  ){ $e = new CargarDatos();   $e->BuscarDatos($_POST["id"]);}
	if( !empty($_GET["id"]) ){ $e = new CargarDatos();   $e->BuscarDatos($_GET["id"]);}

}





































