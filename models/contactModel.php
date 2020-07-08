<?php 


class ContactModel{

	static public function listaContactoModel($datos){
		try{
			$qry = "SELECT * FROM suscriptores WHERE tipo = :tipo ORDER BY id DESC LIMIT 50";
			$stmt = Conexion::Conectar()->prepare($qry);
			$stmt->bindValue(":tipo", $datos, PDO::PARAM_STR);  
			$stmt->execute();
			return $stmt->fetchAll();


			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}
	}


	static public function eliminarContactoModel($datos){
		try{

			$qry = "DELETE FROM  suscriptores WHERE id = :id ";
			$stmt = Conexion::Conectar()->prepare($qry);
			$stmt->bindParam(":id", $datos, PDO::PARAM_INT);   
			$stmt->execute(); 

			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}
	}
























}