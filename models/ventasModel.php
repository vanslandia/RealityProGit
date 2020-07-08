<?php 



class ventasModel{

	
	static public function TotalClientesMesModel(){

		$qry = "SELECT COUNT(*) AS total FROM suscriptores WHERE tipo = 'cliente' AND MONTH(fecha) = '".date("m")."'  ";

		$stmt = Conexion::conectar()->prepare($qry);  

		$stmt->execute();
		return $stmt->fetch();
	}

	
	static public function ProdVisitModel(){

		$qry = "SELECT nombre, precio, visitas, id FROM productos ORDER BY visitas DESC LIMIT 15 ";

		$stmt = Conexion::conectar()->prepare($qry);  

		$stmt->execute();
		return $stmt->fetchAll();
	}

	
	static public function UltimoVentasModel(){

		$qry = "SELECT compras.fecha, compras.estatus, compras.folio, compras.monto, suscriptores.nombre FROM compras 
				LEFT JOIN suscriptores ON suscriptores.id = compras.id_usuario 
				ORDER BY compras.id DESC LIMIT 10  ";

		$stmt = Conexion::conectar()->prepare($qry);  

		$stmt->execute();
		return $stmt->fetchAll();
	}



	static public function UltimoClientesModel(){

		$qry = "SELECT * FROM suscriptores WHERE tipo = 'cliente'  ORDER BY id DESC LIMIT 10  ";

		$stmt = Conexion::conectar()->prepare($qry);  

		$stmt->execute();
		return $stmt->fetchAll();
	}

	
	static public function TotalClientesModel(){

		$qry = "SELECT COUNT(*) AS total FROM suscriptores WHERE tipo = 'cliente'  ";

		$stmt = Conexion::conectar()->prepare($qry);  

		$stmt->execute();
		return $stmt->fetch();
	}


	static public function TotalProdModel(){

		$qry = "SELECT COUNT(*) AS total FROM productos  ";

		$stmt = Conexion::conectar()->prepare($qry);  

		$stmt->execute();
		return $stmt->fetch();
	}
	
	static public function SumaVentasModel($dat){

		$qry = "SELECT SUM(monto) AS total, COUNT(*) AS filas FROM compras WHERE estatus = :estatus ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindValue(":estatus", $dat, PDO::PARAM_STR); 

		$stmt->execute();
		return $stmt->fetch();
	}


	static public function PublicarProductoModel($id, $publish){
		$qry = "UPDATE compras SET estatus = :publish  WHERE id = :id  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":id", $id, PDO::PARAM_INT); 
		$stmt->bindParam(":publish", $publish, PDO::PARAM_STR); 
		$stmt->execute();
	}



	static public function DeleteVentasModel($id){

		$qry = "DELETE FROM  compras WHERE id = :id ";
		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindValue(":id", $id, PDO::PARAM_STR); 
		$stmt->execute();

		$qry2 = "DELETE FROM  compras_producto WHERE id_compra = :id_compra ";
		$stmt2 = Conexion::conectar()->prepare($qry2); 
		$stmt2->bindValue(":id_compra", $id, PDO::PARAM_STR); 
		$stmt2->execute(); 
	}



	static public function BuscaClienteModel($dat){

		$qry = "SELECT id FROM  suscriptores WHERE nombre LIKE :nombre ORDER BY id DESC LIMIT 1 ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindValue(":nombre", "%".$dat."%", PDO::PARAM_STR); 

		$stmt->execute();
		return $stmt->fetch();
	}

	
	static public function ListaMetodoPagoModel(){

		$qry = "SELECT metodo FROM  compras GROUP BY metodo ORDER BY metodo ASC ";

		$stmt = Conexion::conectar()->prepare($qry); 

		$stmt->execute();
		return $stmt->fetchAll();
	}


	
	static public function NumArtCompraModel($datos){

		$qry = "SELECT COUNT(*) AS total FROM  compras_producto WHERE id_compra = :id_compra ";

		$stmt = Conexion::conectar()->prepare($qry);
		$stmt->bindValue(":id_compra", $datos, PDO::PARAM_STR); 

		$stmt->execute();
		return $stmt->fetch();
	}

	
	static public function ListasVentasModel($datos){

		$filtros = null;

		if( array_key_exists("metodo", $datos))$filtros .= ' AND compras.metodo =:metodo ';
		if( array_key_exists("id_usuario", $datos))$filtros .= ' AND compras.id_usuario =:id_usuario ';
		if( array_key_exists("ini", $datos))$filtros .= ' AND compras.fecha BETWEEN :ini AND :fin  ';
		if( array_key_exists("nombre", $datos) && !empty( $datos["nombre"]))$filtros .= ' AND (compras.folio LIKE :nombre ) ';


		$qry = "SELECT compras.*,   suscriptores.email, suscriptores.nombre AS usuario  FROM  compras  
					LEFT JOIN suscriptores ON suscriptores.id = compras.id_usuario 
					WHERE compras.estatus =:estatus ".$filtros."
					ORDER  BY compras.id DESC ";

		$stmt = Conexion::conectar()->prepare($qry);   
		$stmt->bindValue(":estatus", $datos["estatus"], PDO::PARAM_STR);  
		if( array_key_exists("id_usuario", $datos))$stmt->bindValue(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
		if( array_key_exists("metodo", $datos))$stmt->bindValue(":metodo", $datos["metodo"], PDO::PARAM_STR);  
		if( array_key_exists("nombre", $datos))$stmt->bindValue(":nombre", $datos["nombre"], PDO::PARAM_STR); 
		if( array_key_exists("ini", $datos)){
			$stmt->bindValue(":ini", $datos["ini"], PDO::PARAM_STR); 
			$stmt->bindValue(":fin", $datos["fin"], PDO::PARAM_STR);  
		}
		//var_dump($datos);

		$stmt->execute();
		return $stmt->fetchAll();
	}
























}