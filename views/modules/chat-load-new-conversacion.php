<?php 

//session_start();
require_once "../../controllers/chatController.php";
require_once "../../models/chatModel.php"; 
require_once "../funciones.php";



class CargarDatos{
 
	public function BuscarDatos(){
 
		$respuesta = chatController::ConversacionChatNewController();
		//echo json_encode($respuesta);
		echo $respuesta;

	}

}



 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 #  Eliminar Imagen
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$e = new CargarDatos();   
$e->BuscarDatos();




































