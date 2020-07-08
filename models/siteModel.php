<?php 

require_once "conexion.php";

class SiteModel{



	static public function DeleteSiteSocialMediuaModel($id){
		$qry = "DELETE FROM redes_sociales WHERE id = :id  ";

		$stmt = Conexion::conectar()->prepare($qry);  
		$stmt->bindParam(":id", $id, PDO::PARAM_STR);  

		$stmt->execute();
	}


	static public function AdminSeccionModel($dat){
		$qry = "SELECT valor FROM  website WHERE sector = '$dat'  ";

		$stmt = Conexion::conectar()->prepare($qry);   

		$stmt->execute();
		return $stmt->fetch();
	}

	static public function URLModel(){
		$qry = "SELECT valor FROM  website WHERE sector = 'URL' ORDER BY id ASC ";

		$stmt = Conexion::conectar()->prepare($qry);   

		$stmt->execute();
		return $stmt->fetch();
	}

	static public function UpdateSiteModel($datos){

		$qry = "UPDATE website SET valor = :valor WHERE id = :id  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR); 
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);  

		$stmt->execute();

	}


	static public function UpdateRedesModel($red, $url, $icon, $image){

		$qry = "INSERT INTO redes_sociales (red, icon, url, image) VALUES (:red, :icon, :url, :image) ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":red", $red, PDO::PARAM_STR); 
		$stmt->bindParam(":icon", $icon, PDO::PARAM_STR);  
		$stmt->bindParam(":url", $url, PDO::PARAM_STR);
		$stmt->bindParam(":image", $image, PDO::PARAM_STR);  

		$stmt->execute();

	}


	
	static public function SocialMediaModel(){
		$qry = "SELECT * FROM  redes_sociales ORDER BY id DESC";

		$stmt = Conexion::conectar()->prepare($qry);   

		$stmt->execute();
		return $stmt->fetchAll();
	}


	static public function SiteNameModel(){
		$qry = "SELECT valor FROM  website WHERE sector = 'Website' ORDER BY id ASC ";

		$stmt = Conexion::conectar()->prepare($qry);   

		$stmt->execute();
		return $stmt->fetch();
	}

	static public function InfoSiteModel(){
		$qry = "SELECT * FROM  website WHERE sector <> 'logo' ORDER BY id ASC ";

		$stmt = Conexion::conectar()->prepare($qry);   

		$stmt->execute();
		return $stmt->fetchAll();


		$stmt->close();  
	}


	static public function UploadLogoModel($datos){
		$qry = "UPDATE website SET valor = :valor WHERE sector = 'logo' ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":valor", $datos, PDO::PARAM_STR);  

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		}
		$stmt->close();  
	}


	static public function LogoModel(){
		$qry = "SELECT valor FROM  website WHERE sector = 'logo' ";

		$stmt = Conexion::conectar()->prepare($qry);   

		$stmt->execute();
		return $stmt->fetch(); 

	}

	static public function DatosSitioAppModel($datos){
		$qry = "SELECT valor FROM website WHERE sector = :valor ";

		$stmt = Conexion::conectar()->prepare($qry);   
		$stmt->bindParam(":valor", $datos, PDO::PARAM_STR);  

		$stmt->execute();
		return $stmt->fetch(); 
	}








}






