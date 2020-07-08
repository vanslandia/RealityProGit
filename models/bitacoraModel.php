<?php 
require_once "conexion.php";

class BitacoraModel{


	static public function ListaSucesoModel(){
	
	try{

		$qry = "SELECT * FROM bitacora ORDER BY id DESC LIMIT 100";
		$stmt = Conexion::Conectar()->prepare($qry);
		$stmt->execute();
		return $stmt->fetchAll();


		}catch(PDOException $e){
		    echo "Log-Error: " . $e->getMessage();
	}




		
	}// function 


	static public function RegistroModel($datos){

		try{

			$qry = "INSERT INTO bitacora (usuario, suceso, ip) VALUES 
										 (:usuario, :suceso, :ip ) ";
			$stmt = Conexion::conectar()->prepare($qry); 
		    $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR); 
		    $stmt->bindParam(":suceso", $datos["suceso"], PDO::PARAM_STR); 
		    $stmt->bindParam(":ip", $datos["ip"], PDO::PARAM_STR);  

		    $stmt->execute();



			}catch(PDOException $e){
		    echo "Log-Error: " . $e->getMessage();
	
	       }

	}// function 





	static public function BuscarSucesoModel($datos, $item){
	
	try{

		$qry = "SELECT * FROM bitacora WHERE ".$item;
		$stmt = Conexion::Conectar()->prepare($qry);
		$stmt->execute($datos);
		return $stmt->fetchAll();


		}catch(PDOException $e){
		    echo "Log-Error: " . $e->getMessage();
	}




		
	}// function 































}