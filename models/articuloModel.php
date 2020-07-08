<?php 
require_once "conexion.php";

class articuloModel{ 

	static public function GuardarArticuloModel($datos){

		$qry = "INSERT INTO articulos SET titulo = :titulo, intro = :intro, descripcion = :descripcion, imagen=:imagen , url=:url  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR); 
		$stmt->bindParam(":intro", $datos["intro"], PDO::PARAM_STR); 
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR); 
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR); 
		$stmt->bindParam(":url", $datos["url"], PDO::PARAM_STR);  

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		} 

	}


	static public function DatosArticuloIdModel($datos){

		$qry = "SELECT * FROM  articulos  WHERE id = :id  ";

		$stmt = Conexion::conectar()->prepare($qry);   
		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch();
	}


	static public function ListArticuloModel(){

		$qry = "SELECT * FROM  articulos  ORDER BY id DESC LIMIT 10 ";

		$stmt = Conexion::conectar()->prepare($qry);   

		$stmt->execute();
		return $stmt->fetchAll();
	}

	static public function ListBuscarArticuloModel($datos){

		$qry = "SELECT * FROM  articulos WHERE (titulo LIKE :termino OR intro LIKE :termino OR descripcion LIKE :termino)  ";

		$stmt = Conexion::conectar()->prepare($qry);  
		$stmt->bindValue(":termino", "%".$datos."%", PDO::PARAM_STR); 

		$stmt->execute();
		return $stmt->fetchAll();

 

	}


	static public function BorrarArticuloModel($datos){
		$qry = "DELETE FROM  articulos WHERE id = :id ";

		$stmt = Conexion::conectar()->prepare($qry);  

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);   

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		} 
	}

	static public function EditarArticuloModel($datos){

		$qry = "UPDATE articulos SET titulo = :titulo, intro = :intro, descripcion = :descripcion, imagen=:imagen, video=:video, url=:url WHERE id = :id  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR); 
		$stmt->bindParam(":intro", $datos["intro"], PDO::PARAM_STR); 
		$stmt->bindParam(":video", $datos["video"], PDO::PARAM_STR); 
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR); 
		$stmt->bindParam(":imagen", $datos["file"], PDO::PARAM_STR); 
		$stmt->bindParam(":url", $datos["url"], PDO::PARAM_STR); 
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);  

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		} 


	}

	static public function publicarArticulosModel($id, $publish){
		$qry = "UPDATE articulos SET publish = :publish  WHERE id = :id  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":id", $id, PDO::PARAM_INT); 
		$stmt->bindParam(":publish", $publish, PDO::PARAM_INT); 
		$stmt->execute();
	}

	static public function ListaGaleriaModel($articulo){
		$qry = "SELECT * FROM articulos_img WHERE articulo=:articulo  ORDER BY posicion ASC ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":articulo", $articulo, PDO::PARAM_INT); 
		$stmt->execute();

		return $stmt->fetchAll();

	}

	static public function ListaEditGaleriaModel($id){
		$qry = "SELECT * FROM articulos_img WHERE articulo=:articulo ORDER BY posicion, id DESC ";

		$stmt = Conexion::conectar()->prepare($qry);
		$stmt->bindParam(":articulo", $id, PDO::PARAM_INT);  
		$stmt->execute();

		return $stmt->fetchAll();
	}



	static public function SubirImagenDB($datos, $articulo){
			$qry = "INSERT INTO articulos_img SET imagen = :imagen, articulo=:articulo  ";

			$stmt = Conexion::conectar()->prepare($qry); 
			$stmt->bindParam(":imagen", $datos, PDO::PARAM_STR);  
			$stmt->bindParam(":articulo", $articulo, PDO::PARAM_INT);  

			if($stmt->execute()){
				return "success"; 
			}else{
				return "fail"; 
			}
		}



	static public function EditGaleriaModel($datos){
			$qry = "UPDATE articulos_img SET titulo = :titulo, descripcion = :descripcion WHERE imagen = :imagen";

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

	static public function ReviewGaleriaDataModel($datos){
		$qry = "SELECT * FROM articulos_img  WHERE imagen = :imagen";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":imagen", $datos["id"], PDO::PARAM_STR); 

		$stmt->execute();

		return $stmt->fetch();
	}

	static public function EliminarImgArtModel($valor){
		$qry = "DELETE FROM articulos_img WHERE imagen = :imagen ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":imagen", $valor, PDO::PARAM_STR); 

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		}

	}

	static public function OrdenImgArtModel($datos){
		$qry = "UPDATE articulos_img SET posicion = :orden WHERE imagen = :imagen";

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
