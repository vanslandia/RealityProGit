<?php 

require_once "conexion.php";

class GaleriaModel{

	static public function SubirImagenGalDB($datos){ 
		$qry = "INSERT INTO galeria SET imagen = :imagen  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":imagen", $datos, PDO::PARAM_STR);  

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		} 
	}





	static public function ListaImagenDB(){
		$qry = "SELECT * FROM galeria ORDER BY posicion ASC ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->execute();

		return $stmt->fetchAll();

	}


	static public function EliminarImgModel($valor){
		$qry = "DELETE FROM galeria WHERE imagen = :imagen ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":imagen", $valor, PDO::PARAM_STR); 

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		}
		$stmt->close(); 

	}


	static public function OrdenModel($datos){
		$qry = "UPDATE galeria SET posicion = :orden WHERE imagen = :imagen";

		$stmt = Conexion::conectar()->prepare($qry);
		$stmt->bindParam(":orden", $datos["orden"], PDO::PARAM_INT);  
		$stmt->bindParam(":imagen", $datos["item"], PDO::PARAM_STR); 

		if($stmt->execute()){
			return "success";
		}else{
			return "fail";
		}
		$stmt->close(); 
	}







	 

}