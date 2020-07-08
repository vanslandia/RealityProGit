<?php 

require_once "conexion.php";

class VideoModel{





	static public function SubirVideoModel($datos){
		$qry = "INSERT INTO videos SET video = :video  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":video", $datos, PDO::PARAM_STR);  

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		}
		$stmt->close();  
	}





	static public function MostrarVideoModel($datos){
		$qry = "SELECT video FROM videos WHERE video = :video  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":video", $datos, PDO::PARAM_STR);  

		$stmt->execute();
		return $stmt->fetch();
		

		$stmt->close();  
	}







	static public function ListaVideoModel(){
		$qry = "SELECT * FROM videos ORDER BY id DESC  ";

		$stmt = Conexion::conectar()->prepare($qry);  

		$stmt->execute();
		return $stmt->fetchAll();
		

		$stmt->close();  
	}




	static public function EliminarFileModel($valor){
		$qry = "DELETE FROM videos WHERE video = :video ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":video", $valor, PDO::PARAM_STR); 

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		}
		$stmt->close(); 
	}



	
}