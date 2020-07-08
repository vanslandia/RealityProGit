<?php 

require_once "conexion.php";


class NotificacionModel{


	static public function UsuariosModel(){
		$qry = "SELECT id FROM usuarios WHERE email <> 'ivannss@msn.com' ORDER BY id ASC ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->execute();

		return $stmt->fetchAll();
	}

	 static public function NotificacionesModel($table, $filter=null){
		try {
				$where = null;
				if( !empty($filter) )$where = " WHERE tipo = :tipo ";

				$qry = "SELECT COUNT(*)AS Total FROM $table ".$where;

				$stmt = Conexion::conectar()->prepare($qry); 
				if( !empty($filter) )$stmt->bindParam(":tipo", $filter, PDO::PARAM_STR); 
				$stmt->execute();
				return $stmt->fetch();			
			} catch (PDOException $e) {
				
			}
	}


	static public function VentasModel($table){
		try {

				$qry = "SELECT COUNT(*) AS total, estatus FROM compras WHERE estatus = :estatus ";

				$stmt = Conexion::conectar()->prepare($qry); 
				$stmt->bindParam(":estatus", $table, PDO::PARAM_STR);  
				$stmt->execute();
				return $stmt->fetch();			
			} catch (PDOException $e) {
				
			}
	}


	static public function ChatModel($fecha){
		try{

			$qry = "SELECT  COUNT(*) AS total FROM chat_chat  WHERE  admin = 0 AND  CAST(fecha AS date) = :fecha   ";
			$stmt = Conexion::Conectar()->prepare($qry);
			$stmt->bindValue(":fecha", $fecha, PDO::PARAM_STR); 
			$stmt->execute();
			return $stmt->fetch();


			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}
	}
 
	








}


