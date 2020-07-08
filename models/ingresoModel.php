<?php

require_once "conexion.php";

class IngresoModel{

	static public function IngresoUsuariosModel($datosModel){

		try{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE email = :usuario");

		$stmt -> bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	    }catch(PDOException $e){
		    echo "Error: " . $e->getMessage();
		}

	}

	static public function BuscarUserExisteModel($datosModel){

		try{

		$stmt = Conexion::conectar()->prepare("SELECT email, password, nombre FROM usuarios WHERE email = :usuario");

		$stmt -> bindParam(":usuario", $datosModel, PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	    }catch(PDOException $e){
		    echo "Error: " . $e->getMessage();
		}

	}

	static public function intentosModel($datosModel){

		try{

				$stmt = Conexion::conectar()->prepare("UPDATE usuarios SET intentos = :intentos WHERE email = :usuario");

				$stmt -> bindParam(":intentos", $datosModel["actualizarIntentos"], PDO::PARAM_INT);
				$stmt -> bindParam(":usuario", $datosModel["usuarioActual"], PDO::PARAM_STR);

				if($stmt -> execute()){

					return "ok";

				} else{

					return "error";
				}

	   }catch(PDOException $e){
		    echo "Error: " . $e->getMessage();
		}
	}












}