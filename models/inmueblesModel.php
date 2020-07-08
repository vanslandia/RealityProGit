<?php 
require_once "conexion.php";

class InmueblesModel{ 

	static public function GuardarInmueblesModel($datos){

		$qry = "INSERT INTO inmuebles SET titulo = :titulo, googlemaps = :googlemaps, categoria = :categoria,  descripcion = :descripcion, imagen=:imagen , precio=:precio, tipo_transaccion=:tipo_transaccion ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR); 
		$stmt->bindParam(":categoria", $datos["tipo_inmueble"], PDO::PARAM_STR); 
		$stmt->bindParam(":googlemaps", $datos["googlemaps"], PDO::PARAM_STR); 
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR); 
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR); 
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR); 
		$stmt->bindParam(":tipo_transaccion", $datos["tipo_transaccion"], PDO::PARAM_STR);  

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		} 

	}


	static public function UltimoInmuebleModel(){
		$qry = "SELECT id FROM  inmuebles  ORDER BY id DESC LIMIT 1  ";

		$stmt = Conexion::conectar()->prepare($qry);   

		$stmt->execute();
		return $stmt->fetch();
	}


	static public function DatosInmuebleIdModel($datos){

		$qry = "SELECT * FROM  inmuebles  WHERE id = :id  ";

		$stmt = Conexion::conectar()->prepare($qry);   
		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch();
	}


	static public function ListInmuebleModel(){

		$qry = "SELECT * FROM  inmuebles  ORDER BY id DESC LIMIT 20 ";

		$stmt = Conexion::conectar()->prepare($qry);   

		$stmt->execute();
		return $stmt->fetchAll();

 

	}

	static public function ListBuscarInmuebleModel($datos){

		$qry = "SELECT * FROM  inmuebles WHERE (titulo LIKE :termino OR categoria LIKE :termino OR precio LIKE :termino)  ";

		$stmt = Conexion::conectar()->prepare($qry);  
		$stmt->bindValue(":termino", "%".$datos."%", PDO::PARAM_STR); 

		$stmt->execute();
		return $stmt->fetchAll();

 

	}



	static public function BorrarInmueblesModel($datos){
		$qry = "DELETE FROM  inmuebles WHERE id = :id ";

		$stmt = Conexion::conectar()->prepare($qry);  

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);   

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		} 
	}

	static public function EditarInmueblesModel($datos){

		if (array_key_exists("file", $datos))  $st = 'imagen=:imagen,'; else $st=null;

		//var_dump($datos);

		$qry = "UPDATE inmuebles SET titulo = :titulo, googlemaps = :googlemaps, precio=:precio, tipo_transaccion=:tipo_transaccion,  descripcion = :descripcion, ".$st." categoria=:categoria ,
		sup_terreno=:sup_terreno,  sup_contruccion=:sup_contruccion, recamaras=:recamaras, banios=:banios, estacioamientos=:estacioamientos, antiguedad=:antiguedad,
		niveles=:niveles, mantenimiento=:mantenimiento, altura=:altura, patio_maniobras=:patio_maniobras, subestacion=:subestacion, oficinas=:oficinas, area_rentable=:area_rentable,
		elevadores	=:elevadores, uso_suelo=:uso_suelo	, forma=:forma, frente=:frente, fondo=:fondo, topografia=:topografia, llaves=:llaves, frente_playa=:frente_playa
		WHERE id = :id  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR); 
		$stmt->bindParam(":googlemaps", $datos["googlemaps"], PDO::PARAM_STR); 
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR); 
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR); 
		$stmt->bindParam(":tipo_transaccion", $datos["tipo_transaccion"], PDO::PARAM_STR); 
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR); 
		if (array_key_exists("file", $datos)  )  {$stmt->bindParam(":imagen", $datos["file"], PDO::PARAM_STR); }
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);  
		 $stmt->bindParam(":sup_terreno", $datos["sup_terreno"], PDO::PARAM_STR); 
		 $stmt->bindParam(":sup_contruccion", $datos["sup_contruccion"], PDO::PARAM_STR); 
		 $stmt->bindParam(":recamaras", $datos["recamaras"], PDO::PARAM_STR); 
		 $stmt->bindParam(":banios", $datos["banios"], PDO::PARAM_STR); 
		 $stmt->bindParam(":estacioamientos", $datos["estacioamientos"], PDO::PARAM_STR); 
		 $stmt->bindParam(":antiguedad", $datos["antiguedad"], PDO::PARAM_STR); 
		 $stmt->bindParam(":niveles", $datos["niveles"], PDO::PARAM_STR); 
		 $stmt->bindParam(":mantenimiento", $datos["mantenimiento"], PDO::PARAM_STR); 
		 $stmt->bindParam(":altura", $datos["altura"], PDO::PARAM_STR); 
		 $stmt->bindParam(":patio_maniobras", $datos["patio_maniobras"], PDO::PARAM_STR); 
		 $stmt->bindParam(":subestacion", $datos["subestacion"], PDO::PARAM_STR); 
		 $stmt->bindParam(":oficinas", $datos["oficinas"], PDO::PARAM_STR); 
		 $stmt->bindParam(":area_rentable", $datos["area_rentable"], PDO::PARAM_STR); 
		 $stmt->bindParam(":elevadores", $datos["elevadores"], PDO::PARAM_STR); 
		 $stmt->bindParam(":uso_suelo", $datos["uso_suelo"], PDO::PARAM_STR); 
		 $stmt->bindParam(":forma", $datos["forma"], PDO::PARAM_STR); 
		 $stmt->bindParam(":frente", $datos["frente"], PDO::PARAM_STR); 
		 $stmt->bindParam(":fondo", $datos["fondo"], PDO::PARAM_STR); 
		 $stmt->bindParam(":topografia", $datos["topografia"], PDO::PARAM_STR); 
		 $stmt->bindParam(":llaves", $datos["llaves"], PDO::PARAM_STR); 
		 $stmt->bindParam(":frente_playa", $datos["frente_playa"], PDO::PARAM_STR);   

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		} 


	}

	static public function publicarInmueblesModel($id, $publish){
		$qry = "UPDATE inmuebles SET publish = :publish  WHERE id = :id  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":id", $id, PDO::PARAM_INT); 
		$stmt->bindParam(":publish", $publish, PDO::PARAM_INT); 
		$stmt->execute();
	}

	static public function ListaGaleriaInmuebleModel($inmueble){
		$qry = "SELECT * FROM inmuebles_img WHERE inmueble=:inmueble  ORDER BY posicion ASC ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":inmueble", $inmueble, PDO::PARAM_INT); 
		$stmt->execute();

		return $stmt->fetchAll();

	}

	static public function ListaEditGaleriaInmuebleModel($id){
		$qry = "SELECT * FROM inmuebles_img WHERE inmueble=:inmueble ORDER BY posicion, id DESC ";

		$stmt = Conexion::conectar()->prepare($qry);
		$stmt->bindParam(":inmueble", $id, PDO::PARAM_INT);  
		$stmt->execute();

		return $stmt->fetchAll();
	}



	static public function SubirImagenDB($datos, $inmueble){
			$qry = "INSERT INTO inmuebles_img SET imagen = :imagen, inmueble=:inmueble  ";

			$stmt = Conexion::conectar()->prepare($qry); 
			$stmt->bindParam(":imagen", $datos, PDO::PARAM_STR);  
			$stmt->bindParam(":inmueble", $inmueble, PDO::PARAM_INT);  

			if($stmt->execute()){
				return "success"; 
			}else{
				return "fail"; 
			}
		}



	static public function EditGaleriaModel($datos){
			$qry = "UPDATE inmuebles_img SET titulo = :titulo, descripcion = :descripcion WHERE imagen = :imagen";

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

	static public function NumImgPropiedadModel($datos){
		$qry = "SELECT COUNT(*) AS total FROM inmuebles_img  WHERE inmueble = :inmueble";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":inmueble", $datos, PDO::PARAM_INT); 

		$stmt->execute();

		return $stmt->fetch();
	}

	static public function ReviewGaleriaDataModel($datos){
		$qry = "SELECT * FROM inmuebles_img  WHERE imagen = :imagen";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":imagen", $datos["id"], PDO::PARAM_STR); 

		$stmt->execute();

		return $stmt->fetch();
	}

	static public function EliminarImgInmuebModel($valor){
		$qry = "DELETE FROM inmuebles_img WHERE imagen = :imagen ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":imagen", $valor, PDO::PARAM_STR); 

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		}

	}

	static public function OrdenImgInmuebModel($datos){
		$qry = "UPDATE inmuebles_img SET posicion = :orden WHERE imagen = :imagen";

		$stmt = Conexion::conectar()->prepare($qry);
		$stmt->bindParam(":orden", $datos["orden"], PDO::PARAM_INT);  
		$stmt->bindParam(":imagen", $datos["item"], PDO::PARAM_STR); 

		if($stmt->execute()){
			return "success";
		}else{
			return "fail";
		}
	}

	static public function TipoInmuebleModel(){
		$qry = "SELECT tipo FROM inmuebles_tipo ORDER BY tipo ASC";

		$stmt = Conexion::conectar()->prepare($qry);  

		$stmt->execute();

		return $stmt->fetchAll();
	}


	static public function ComboTipoTransaccionInmuebleModel(){
		$qry = "SELECT tipo FROM inmuebles_transaccion ORDER BY tipo ASC";

		$stmt = Conexion::conectar()->prepare($qry);  

		$stmt->execute();

		return $stmt->fetchAll();
	}


	static public function ListaTipoInmuebleModel(){
		$qry = "SELECT * FROM inmuebles_tipo ORDER BY tipo ASC";

		$stmt = Conexion::conectar()->prepare($qry);  

		$stmt->execute();

		return $stmt->fetchAll();
	}

	static public function GuardarTipoInmuebleModel($datos){
		$qry = "INSERT INTO inmuebles_tipo SET tipo = :tipo   ";

			$stmt = Conexion::conectar()->prepare($qry); 
			$stmt->bindParam(":tipo", $datos, PDO::PARAM_STR);   

			if($stmt->execute()){
				return "success"; 
			}else{
				return "fail"; 
			}
	}

	static public function BorrarTipoInmuebleModel($valor){
		$qry = "DELETE FROM inmuebles_tipo WHERE id = :id ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":id", $valor, PDO::PARAM_INT); 

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		}
	}

	static public function EditarTipoInmuebleModel($id, $titulo){
		$qry = "UPDATE inmuebles_tipo SET tipo = :titulo WHERE id = :id";

		$stmt = Conexion::conectar()->prepare($qry);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);  
		$stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR); 

		if($stmt->execute()){
			return "success";
		}else{
			return "fail";
		}

	}


	static public function ListaTipoTransaccionInmuebleModel(){
		$qry = "SELECT * FROM inmuebles_transaccion ORDER BY tipo ASC";

		$stmt = Conexion::conectar()->prepare($qry);  

		$stmt->execute();

		return $stmt->fetchAll();
	}

	static public function GuardarTipotransaccionInmuebleModel($datos){
		$qry = "INSERT INTO inmuebles_transaccion SET tipo = :tipo   ";

			$stmt = Conexion::conectar()->prepare($qry); 
			$stmt->bindParam(":tipo", $datos, PDO::PARAM_STR);   

			if($stmt->execute()){
				return "success"; 
			}else{
				return "fail"; 
			}
	}

	static public function BorrarTipotransaccionInmuebleModel($valor){
		$qry = "DELETE FROM inmuebles_transaccion WHERE id = :id ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":id", $valor, PDO::PARAM_INT); 

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		}
	}

	static public function EditarTipoTransaccionInmuebleModel($id, $titulo){
		$qry = "UPDATE inmuebles_transaccion SET tipo = :titulo WHERE id = :id";

		$stmt = Conexion::conectar()->prepare($qry);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);  
		$stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR); 

		if($stmt->execute()){
			return "success";
		}else{
			return "fail";
		}

	}

























}
