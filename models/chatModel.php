<?php 

require_once "conexion.php";

class chatModel{


	static public function UltimaConversacionChatModel($fecha){

		try{

			$qry = "SELECT  C.id FROM chat_chat C  WHERE CAST(C.fecha AS date) = :fecha  ORDER BY C.id DESC";

			$qry = "SELECT  C.id FROM chat_chat C    ORDER BY C.id DESC";

			$stmt = Conexion::Conectar()->prepare($qry);
			$stmt->bindValue(":fecha", $fecha, PDO::PARAM_STR); 
			$stmt->execute();
			return $stmt->fetch();


			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}
	}

	static public function ListaDeChatModel($fecha){

		try{

			$qry = "SELECT U.user, U.id AS elUser, C.id, U.image FROM chat_chat C 
					LEFT JOIN chat_user U ON U.id = C.user
					WHERE CAST(C.fecha AS date) = :fecha 
					ORDER BY C.id DESC";

			$qry = "SELECT U.user, U.id AS elUser, C.id, U.image FROM chat_chat C  LEFT JOIN chat_user U ON U.id = C.user  ORDER BY C.id DESC";

			$stmt = Conexion::Conectar()->prepare($qry);
			$stmt->bindValue(":fecha", $fecha, PDO::PARAM_STR); 
			$stmt->execute();
			return $stmt->fetchAll();


			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}

	}



	
	static public function ConversacionChatNewModel($fecha){

		try{

			$qry = "SELECT  COUNT(*) AS Total FROM chat_chat C  WHERE CAST(C.fecha AS date) = :fecha AND admin = 0   ";

			$qry = "SELECT  COUNT(*) AS Total FROM chat_chat C  WHERE   admin = 0   ";

			$stmt = Conexion::Conectar()->prepare($qry);
			$stmt->bindValue(":fecha", $fecha, PDO::PARAM_STR); 
			$stmt->execute();
			return $stmt->fetch();


			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}
	}

	
	static public function AddAgenteAddModel($id, $agent, $message){

		try{

			$qry = "INSERT INTO chat_comments (user, chat, message) VALUES (:user, :chat, :message)  ";
			$stmt = Conexion::Conectar()->prepare($qry);
			$stmt->bindValue(":user", $agent, PDO::PARAM_STR); 
			$stmt->bindValue(":chat", $id, PDO::PARAM_STR); 
			$stmt->bindValue(":message", $message, PDO::PARAM_STR); 
			$stmt->execute();
			//return $stmt->fetchAll(); 

			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}

	}

	
	static public function UpdateAgenteCharModel($id, $agent){

		try{

			$qry = "UPDATE chat_chat SET admin = :agent WHERE id=:id ";
			$stmt = Conexion::Conectar()->prepare($qry);
			$stmt->bindValue(":agent", $agent, PDO::PARAM_STR); 
			$stmt->bindValue(":id", $id, PDO::PARAM_STR); 
			$stmt->execute();
			//return $stmt->fetchAll(); 

			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}

	}

	
	static public function UltimaRespuestaModel($chat){
		try{

			$qry = "SELECT  user FROM chat_comments  WHERE  chat = :chat ORDER BY id DESC LIMIT 1  ";
			$stmt = Conexion::Conectar()->prepare($qry);
			$stmt->bindValue(":chat", $chat, PDO::PARAM_STR); 
			$stmt->execute();
			return $stmt->fetch();


			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}
	}


	

	static public function ChatPendienteModel($id){
		try{

			$qry = "SELECT  admin FROM chat_chat  WHERE  id = :id   ";
			$stmt = Conexion::Conectar()->prepare($qry);
			$stmt->bindValue(":id", $id, PDO::PARAM_STR); 
			$stmt->execute();
			return $stmt->fetch();


			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}
	}






	

	static public function UltimaConversacionIdChatModel($id){

		try{

			$qry = "SELECT  C.id FROM chat_chat C  WHERE C.id  = :id  ORDER BY C.id DESC";
			$stmt = Conexion::Conectar()->prepare($qry);
			$stmt->bindValue(":id", $id, PDO::PARAM_STR); 
			$stmt->execute();
			return $stmt->fetch();


			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}
	}



	static public function ConversacionChatModel($id){
		try{

			$qry = "SELECT C.fecha, C.message, U.user, U.image 
					FROM chat_comments C 
					LEFT JOIN chat_chat Ch ON Ch.id = C.chat
					LEFT JOIN chat_user U ON U.id = C.user
					WHERE Ch.id = :id
					ORDER BY C.id DESC  
					";
			$stmt = Conexion::Conectar()->prepare($qry);
			$stmt->bindValue(":id", $id, PDO::PARAM_STR); 
			$stmt->execute();
			return $stmt->fetchAll();


			}catch(PDOException $e){
			    echo "Log-Error: " . $e->getMessage();
		}		

	}





















}