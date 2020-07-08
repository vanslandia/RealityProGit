<?php 

require_once "conexion.php";

class PaginasModel{

	static public function PesonalizadoLinkPageModel($datos){
		try {

			$qry = "INSERT INTO pages SET titulo = :titulo, posicion = :posicion, parent = :parent, url_personalizado=:url_personalizado, publish=:publish ";

			$stmt = Conexion::conectar()->prepare($qry); 
			$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR); 
			$stmt->bindParam(":publish", $datos["publish"], PDO::PARAM_STR); 
			$stmt->bindParam(":posicion", $datos["posicion"], PDO::PARAM_INT);
			$stmt->bindParam(":parent", $datos["parent"], PDO::PARAM_INT); 
			$stmt->bindParam(":url_personalizado", $datos["url_personalizado"], PDO::PARAM_STR);   

			if($stmt->execute()){
				return "success"; 
			}else{
				return "fail"; 
			} 
		} catch (Exception $e) {
		    echo "Existe Error:". $e->getMessage();
		}
	}


	static public function AgregarPaginaModel($datos){
		try {

			$qry = "INSERT INTO pages SET titulo = :titulo, contenido = :contenido , url = :url , posicion = :posicion, parent = :parent, seo_titulo=:seo_titulo ";

			$stmt = Conexion::conectar()->prepare($qry); 
			$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR); 
			$stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR); 
			$stmt->bindParam(":posicion", $datos["posicion"], PDO::PARAM_INT);
			$stmt->bindParam(":parent", $datos["parent"], PDO::PARAM_INT); 
			$stmt->bindParam(":url", $datos["url"], PDO::PARAM_STR);  
			$stmt->bindParam(":seo_titulo", $datos["seo_titulo"], PDO::PARAM_STR);  

			if($stmt->execute()){
				return "success"; 
			}else{
				return "fail"; 
			} 
		} catch (Exception $e) {
		    echo "Existe Error:". $e->getMessage();
		}
	}


	static public function ListPaginaModel(){
		try {

			$qry = "SELECT * FROM  pages  ORDER BY titulo ASC ";

			$stmt = Conexion::conectar()->prepare($qry);  

			if($stmt->execute()){
				return $stmt->fetchAll();
			} 
			
		} catch (Exception $e) {
			echo "Existe Error:". $e->getMessage();
		}
	}

	static public function ItemPageModel($parent){
		try {

			$qry = "SELECT titulo, posicion, id, parent, menu_principal, url_personalizado  FROM  pages  WHERE parent = :parent AND publish = '1' ORDER BY posicion ASC";


			$stmt = Conexion::conectar()->prepare($qry);  
			$stmt->bindParam(":parent", $parent, PDO::PARAM_INT);

			if($stmt->execute()){
				return $stmt->fetchAll();
			} 
			
		} catch (Exception $e) {
			echo "Existe Error:". $e->getMessage();
		}
	}

	static public function PaginasDatosModel($id){
		try {

			$qry = "SELECT * FROM  pages  WHERE id = :id  ";


			$stmt = Conexion::conectar()->prepare($qry);  
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);

			if($stmt->execute()){
				return $stmt->fetch();
			} 
			
		} catch (Exception $e) {
			echo "Existe Error:". $e->getMessage();
		}
	}

	static public function DeletePaginaModel($id){
		try {

			$qry = "DELETE FROM pages  WHERE id = :id ";

			$stmt = Conexion::conectar()->prepare($qry); 
			$stmt->bindParam(":id", $id, PDO::PARAM_INT); 

			$stmt->execute();
			
		} catch (Exception $e) {
			echo "Existe Error:". $e->getMessage();
		}
	}


	static public function publicarPageModel($id, $publish){
		try {
			$qry = "UPDATE pages SET publish = :publish  WHERE id = :id  ";

			$stmt = Conexion::conectar()->prepare($qry); 
			$stmt->bindParam(":id", $id, PDO::PARAM_INT); 
			$stmt->bindParam(":publish", $publish, PDO::PARAM_INT); 
			$stmt->execute();
		} catch (Exception $e) {
			echo "Existe Error:". $e->getMessage();
		}

	}

	static public function OrdenarHijosPageModel($parent){
		try {
					$qry = "UPDATE pages SET parent = '0', posicion = '0' WHERE parent = :parent  ";

					$stmt = Conexion::conectar()->prepare($qry); 
					$stmt->bindParam(":parent", $parent, PDO::PARAM_INT);  
					$stmt->execute();
				} catch (Exception $e) {
					echo "Existe Error:". $e->getMessage();
				}
	}

	static public function UpdatePaginaModel($datos){
		try {

			$qry = "UPDATE pages SET site_independeinte =:site_independeinte, titulo = :titulo, contenido = :contenido , url = :url , publish = :publish , seo_titulo = :seo_titulo, seo_slug = :seo_slug, seo_meta = :seo_meta, menu_principal=:menu_principal WHERE id = :id ";

			$stmt = Conexion::conectar()->prepare($qry); 
			$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR); 
			$stmt->bindParam(":site_independeinte", $datos["site_independeinte"], PDO::PARAM_STR); 
			$stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR); 
			$stmt->bindParam(":publish", $datos["publish"], PDO::PARAM_INT); 
			$stmt->bindParam(":url", $datos["url"], PDO::PARAM_STR); 
			$stmt->bindParam(":seo_titulo", $datos["seo_titulo"], PDO::PARAM_STR);
			$stmt->bindParam(":seo_slug", $datos["seo_slug"], PDO::PARAM_STR);
			$stmt->bindParam(":seo_meta", $datos["seo_meta"], PDO::PARAM_STR);
			$stmt->bindParam(":menu_principal", $datos["menu_principal"], PDO::PARAM_INT);
			$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);   

			if($stmt->execute()){
				return "success"; 
			}else{
				return "fail"; 
			} 

		} catch (Exception $e) {
		    echo "Existe Error:". $e->getMessage();
		}
	}




























}