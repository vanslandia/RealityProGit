<?php

class modulosController{

	static public function LoadModulosController(){

		if(isset($_GET["bq"])) $enlaces = $_GET["bq"]; else $enlaces = "error"; 

		$respuesta = modulosModel::LoadModulosModel($enlaces);

		include $respuesta;

	}


}