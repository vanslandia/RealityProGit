<?php 
 
require_once "../../models/productosModel.php";
require_once "../../models/conexion.php";


class CargarOrigen{

	public $valor; 
	public function cargarOrigenItems(){
		$respuesta = productosModel::SelectSubcatXCatIdModel($this->valor);
		 //var_dump($respuesta);

		$data = array();
		foreach ($respuesta as $key => $item) { 
			$data[] = utf8_encode($item["id"].",".$item["subcategoria"]);
		}
		echo json_encode($data , JSON_UNESCAPED_UNICODE);

		//echo json_encode($respueta, JSON_UNESCAPED_UNICODE );
	}

}


if(    !empty($_POST["area"])    ){
	$a = new CargarOrigen();
	$a->valor = $_POST["area"];
	$a->cargarOrigenItems();
}

if(    !empty($_GET["area"])    ){
	$a = new CargarOrigen();
	$a->valor = $_GET["area"];
	$a->cargarOrigenItems();
}




