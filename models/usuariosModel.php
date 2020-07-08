<?php 

require_once "conexion.php";

class UsuariosModel{

	static public function ListUserModel(){

		try{

			$qry = "SELECT * FROM  usuarios WHERE email <> 'ivannss@msn.com'  ORDER BY id DESC ";

			$stmt = Conexion::conectar()->prepare($qry);   

			$stmt->execute();
			return $stmt->fetchAll();


			$stmt->close();  
		}catch(PDOException $e){
		    echo "Log-Error: " . $e->getMessage();
	}


	}



	static public function GuardarUsuarioModel($datos){

		try{

			$qry = "INSERT INTO usuarios SET  nombre = :nombre, nivel = :nivel, email=:email , password=:password  ";

			$stmt = Conexion::conectar()->prepare($qry); 
			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR); 
			$stmt->bindParam(":nivel", $datos["nivel"], PDO::PARAM_STR); 
			$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);  
			$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);  

			if($stmt->execute()){
				return "success"; 
			}else{
				return "fail"; 
			} 

		
		}catch(PDOException $e){
		    echo "Log-Error: " . $e->getMessage();
	}


	}


	static public function DeleteUsuarioModel($datos){

		try{
				$qry = "DELETE FROM  usuarios WHERE id = :id ";

				$stmt = Conexion::conectar()->prepare($qry);  

				$stmt->bindParam(":id", $datos, PDO::PARAM_INT);   

				if($stmt->execute()){
					return "success"; 
				}else{
					return "fail"; 
				}
			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}

	}




	static public function UsuarioIdModel($datos){

		try{

				$qry = "SELECT * FROM  usuarios  WHERE id =:id ";

				$stmt = Conexion::conectar()->prepare($qry);   
				$stmt->bindParam(":id", $datos, PDO::PARAM_INT);   

				$stmt->execute();
				return $stmt->fetch();
			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}
	}

	static public function UpdateUsuarioModel($datos){

		try{
			
				$qry = "UPDATE usuarios SET nombre = :nombre, nivel = :nivel, email=:email , password=:password WHERE id = :id ";

				$stmt = Conexion::conectar()->prepare($qry); 
				$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR); 
				$stmt->bindParam(":nivel", $datos["nivel"], PDO::PARAM_STR); 
				$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);  
				$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);  
				$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);  

				if($stmt->execute()){
					return "success"; 
				}else{
					return "fail"; 
				}
			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}

	}



	static public function UpdateMyDataUsuarioController($datos){

		try{	
				$option = null;

				if(array_key_exists("password", $datos))$option = " , password=:password ";

			
				$qry = "UPDATE usuarios SET nombre = :nombre  $option WHERE id = :id ";

				$stmt = Conexion::conectar()->prepare($qry); 
				$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);  
				if(array_key_exists("password", $datos))$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);  
				$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);  

				if($stmt->execute()){
					return "success"; 
				}else{
					return "fail"; 
				}
			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}

	}









}








