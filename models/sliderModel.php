<?php 

require_once "conexion.php";

class sliderModel{
	
	static public function Path(){
		$qry = "SELECT * FROM website WHERE sector ='URL' ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->execute();

		return $stmt->fetch();
	}

	static public function SubirImagenDB($datos){
		$qry = "INSERT INTO slide SET imagen = :imagen  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":imagen", $datos, PDO::PARAM_STR);  

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		}
	}


	static public function ListaImagenDB(){
		$qry = "SELECT * FROM slide ORDER BY posicion ASC ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->execute();

		return $stmt->fetchAll();

	}

	static public function ListaEditImagenDB(){
		$qry = "SELECT * FROM slide ORDER BY posicion, id DESC ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->execute();

		return $stmt->fetchAll();
	}


	static public function EliminarImgModel($valor){
		$qry = "DELETE FROM slide WHERE imagen = :imagen ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":imagen", $valor, PDO::PARAM_STR); 

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		}

	}

	static public function EditSlideModel($datos){
		$qry = "UPDATE slide SET titulo = :titulo, descripcion = :descripcion WHERE imagen = :imagen";

		$stmt = Conexion::conectar()->prepare($qry);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR); 
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR); 
		$stmt->bindParam(":imagen", $datos["id"], PDO::PARAM_STR); 

		if($stmt->execute()){
			return "success";
		}else{
			return "fail";
		}

		
	}

	static public function ReviewSlideDataModel($datos){
		$qry = "SELECT * FROM slide  WHERE imagen = :imagen";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":imagen", $datos["id"], PDO::PARAM_STR); 

		$stmt->execute();

		return $stmt->fetch();
	}



	static public function OrdenSlideModel($datos){
		$qry = "UPDATE slide SET posicion = :orden WHERE imagen = :imagen";

		$stmt = Conexion::conectar()->prepare($qry);
		$stmt->bindParam(":orden", $datos["orden"], PDO::PARAM_INT);  
		$stmt->bindParam(":imagen", $datos["item"], PDO::PARAM_STR); 

		if($stmt->execute()){
			return "success";
		}else{
			return "fail";
		}
	}
 






}