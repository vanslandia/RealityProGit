<?php 
require "../models/conexion.php";

class Model{


	
	static public function GetContenidoPageModel($id){
			try {

			$qry = "SELECT * FROM  pages  WHERE url = :url AND publish = '1' ORDER BY posicion ASC";


			$stmt = Conexion::conectar()->prepare($qry);  
			$stmt->bindParam(":url", $id, PDO::PARAM_INT);

			if($stmt->execute()){
				return $stmt->fetch();
			} 
			
		} catch (Exception $e) {
			echo "Existe Error:". $e->getMessage();
		}
	}




	static public function NodosSubMenuModel($id){
			try {

			$qry = "SELECT COUNT(*) AS total FROM  pages  WHERE parent = :parent AND publish = '1' ORDER BY posicion ASC";


			$stmt = Conexion::conectar()->prepare($qry);  
			$stmt->bindParam(":parent", $id, PDO::PARAM_INT);

			if($stmt->execute()){
				return $stmt->fetch();
			} 
			
		} catch (Exception $e) {
			echo "Existe Error:". $e->getMessage();
		}
	}


	static public function ItemPageModel($parent){
		try {

			$qry = "SELECT titulo, posicion, id, parent, menu_principal, url_personalizado, url, site_independeinte  FROM  pages  WHERE parent = :parent AND publish = '1' ORDER BY posicion ASC";


			$stmt = Conexion::conectar()->prepare($qry);  
			$stmt->bindParam(":parent", $parent, PDO::PARAM_INT);

			if($stmt->execute()){
				return $stmt->fetchAll();
			} 
			
		} catch (Exception $e) {
			echo "Existe Error:". $e->getMessage();
		}
	}


	

	static public function DeleteProductoModel($id){
		try{

			$qry = "DELETE FROM compras_producto  WHERE id = :id  ";
			$stmt = Conexion::Conectar()->prepare($qry);  
			$stmt->bindValue(":id", $id, PDO::PARAM_STR);  

			if($stmt->execute()){
				return "success";
			}else{
				return "fail";
			}  

			}catch(PDOException $e){
			    echo "Mi-Log-Error: " . $e->getMessage();
		}
	}



	static public function   UpdateDataCestaModel($dat){
		try{

			$qry = "UPDATE compras SET  monto = :monto WHERE id = :id  ";
			$stmt = Conexion::Conectar()->prepare($qry);  
			$stmt->bindValue(":monto", $dat["monto"], PDO::PARAM_STR); 
			$stmt->bindValue(":id", $dat["cart"], PDO::PARAM_STR); 

			if($stmt->execute()){
				return "success";
			}else{
				return "fail";
			}  

			}catch(PDOException $e){
			    echo "Mi-Log-Error: " . $e->getMessage();
		}
	}



	static public function UpdateProductoModel($id, $val){
		try{

			$qry = "UPDATE compras_producto SET cantidad = :cantidad WHERE id = :id  ";
			$stmt = Conexion::Conectar()->prepare($qry); 
			$stmt->bindValue(":cantidad", $val, PDO::PARAM_STR); 
			$stmt->bindValue(":id", $id, PDO::PARAM_STR); 

			if($stmt->execute()){
				return "success";
			}else{
				return "fail";
			}  

			}catch(PDOException $e){
			    echo "Mi-Log-Error: " . $e->getMessage();
		}
	}


	static public function GetListProdCartModel($id){

		try{

			$qry = "SELECT P.nombre, P.intro, P.elink,  CP.cantidad, P.imagen, C.categoria, S.subcategoria, CP.id, P.precio, P.precio_ant  FROM compras_producto CP
					LEFT JOIN productos P ON P.id = CP.id_producto 
					LEFT JOIN categorias C ON C.id = P.categoria 
					LEFT JOIN subcategorias S ON S.id = P.subcategoria  
					WHERE CP.id_compra = :id_compra  ";
			$stmt = Conexion::Conectar()->prepare($qry); 
			$stmt->bindValue(":id_compra", $id, PDO::PARAM_STR); 

			$stmt->execute();
			return $stmt->fetchAll();


			}catch(PDOException $e){
			    echo "Mi-Log-Error: " . $e->getMessage();
		}		

	}

	
	static public function InsertProductoModel($cart, $prod){

		try{

		$qry = "INSERT INTO compras_producto SET id_compra = :id_compra, id_producto = :id_producto, cantidad = '1' ";
		$stmt = Conexion::Conectar()->prepare($qry); 
		$stmt->bindValue(":id_compra", $cart, PDO::PARAM_STR); 
		$stmt->bindValue(":id_producto", $prod, PDO::PARAM_STR); 

		if($stmt->execute()){
			return "success";
		}else{
			return "fail";
		}  

		}catch(PDOException $e){
		    echo "Mi-Log-Error: " . $e->getMessage();
	}



	}//



	
	static public function GetLastCompraModel(){

		try{

			$qry = "SELECT folio FROM compras ORDER BY id DESC LIMIT 1  ";
			$stmt = Conexion::Conectar()->prepare($qry); 

			$stmt->execute();
			return $stmt->fetch();


			}catch(PDOException $e){
			    echo "Mi-Log-Error: " . $e->getMessage();
		}



	}//

	
	static public function InsertUserCompraModel($dat, $folio){

		try{

		$qry = "INSERT INTO compras SET id_usuario = :id_usuario , folio = :folio , estatus = 'Pendiente'    ";
		$stmt = Conexion::Conectar()->prepare($qry);
		$stmt->bindValue(":id_usuario", $dat, PDO::PARAM_STR); 
		$stmt->bindValue(":folio", $folio, PDO::PARAM_STR); 

		$stmt->execute();  

		}catch(PDOException $e){
		    echo "Mi-Log-Error: " . $e->getMessage();
	}



	}//


	
	static public function GetCompraModel($dat){

		try{

		$qry = "SELECT * FROM compras WHERE id_usuario = :id_usuario AND estatus = 'Pendiente'   ";
		$stmt = Conexion::Conectar()->prepare($qry);
		$stmt->bindValue(":id_usuario", $dat, PDO::PARAM_STR); 

		$stmt->execute();
		return $stmt->fetch();


		}catch(PDOException $e){
		    echo "Mi-Log-Error: " . $e->getMessage();
	}



	}//


	
	static public function InsertUserModel($dat){

		try{

		$qry = "INSERT INTO suscriptores SET nombre = :nombre , tipo = 'cliente'    ";
		$stmt = Conexion::Conectar()->prepare($qry);
		$stmt->bindValue(":nombre", $dat, PDO::PARAM_STR); 

		$stmt->execute();  

		}catch(PDOException $e){
		    echo "Mi-Log-Error: " . $e->getMessage();
	}



	}//



	static public function GetUserModel($dat){

		try{

		$qry = "SELECT * FROM suscriptores WHERE nombre = :nombre AND tipo = 'cliente'   ";
		$stmt = Conexion::Conectar()->prepare($qry);
		$stmt->bindValue(":nombre", $dat, PDO::PARAM_STR); 

		$stmt->execute();
		return $stmt->fetch();


		}catch(PDOException $e){
		    echo "Mi-Log-Error: " . $e->getMessage();
	}



	}//

	
	static public function GetImageProductoModel($dat){

		try{

		$qry = "SELECT * FROM productos_img WHERE producto = :producto ";
		$stmt = Conexion::Conectar()->prepare($qry);
		$stmt->bindValue(":producto", $dat, PDO::PARAM_STR); 

		$stmt->execute();
		return $stmt->fetchAll();


		}catch(PDOException $e){
		    echo "Mi-Log-Error: " . $e->getMessage();
	}



	}//



	static public function GetProdutoModel($dat){
	  try{ 
		 
		$qry = "SELECT P.nombre, P.id,  C.categoria, P.intro, P.imagen, P.precio, P.elink, P.intro, P.descripcion, P.detalles, S.subcategoria, P.tags, P.precio_ant , P.codigo, P.stock, P.tipo_producto, P.nuevo, C.imagen AS portada
				FROM productos P
				LEFT JOIN categorias C ON C.id = P.categoria
				LEFT JOIN subcategorias S ON S.id = P.subcategoria
				WHERE P.estatus = '1' AND C.estatus = 1 AND P.elink =:elink  ";

		$stmt = Conexion::Conectar()->prepare($qry);
		$stmt->bindValue("elink", $dat, PDO::PARAM_STR); 

		$stmt->execute();
		return $stmt->fetch();

		}catch(PDOException $e){
		    echo "Mi-Log-Error: " . $e->getMessage();
	}

	}//


	static public function GetSeccionSettingModel($dat){

		try{

		$qry = "SELECT * FROM website WHERE sector = :sector ";
		$stmt = Conexion::Conectar()->prepare($qry);
		$stmt->bindValue(":sector", $dat, PDO::PARAM_STR); 

		$stmt->execute();
		return $stmt->fetch();


		}catch(PDOException $e){
		    echo "Mi-Log-Error: " . $e->getMessage();
	}



	}//


	static public function GetCategoryModel($dat=null){

		try{
			$filter = null;

			if(!empty($dat))$filter = ' AND  url = :url ';
		
		$qry = "SELECT * FROM categorias WHERE estatus = '1'  ".$filter." ORDER BY RAND()  ";

		$stmt = Conexion::Conectar()->prepare($qry);
		if(!empty($dat)) $stmt->bindValue(":url", $dat, PDO::PARAM_STR); 

		$stmt->execute();
		return $stmt->fetch();

		}catch(PDOException $e){
		    echo "Mi-Log-Error: " . $e->getMessage();
	}



	}//




	static public function GetSliderSubCatModel($dat=null){

		try{
			$filter = null;

			//if(!empty($dat))$filter = ' AND  categoria = :categoria ';
		
		$qry = "SELECT * FROM subcategorias WHERE categoria = :categoria AND estatus = '1'  ";

		$stmt = Conexion::Conectar()->prepare($qry);
		if(!empty($dat)) $stmt->bindValue(":categoria", $dat, PDO::PARAM_STR); 

		$stmt->execute();
		return $stmt->fetchAll();

		}catch(PDOException $e){
		    echo "Mi-Log-Error: " . $e->getMessage();
	}



	}//






	
	static public function GetSliderCatModel($dat=null){

		try{
			$filter = null;

			if(!empty($dat))$filter = ' AND  categoria = :categoria ';
		
		$qry = "SELECT * FROM categorias WHERE estatus = '1'  ".$filter." ORDER BY RAND()  ";

		$stmt = Conexion::Conectar()->prepare($qry);
		if(!empty($dat)) $stmt->bindValue(":categoria", $dat, PDO::PARAM_STR); 

		$stmt->execute();
		return $stmt->fetchAll();

		}catch(PDOException $e){
		    echo "Mi-Log-Error: " . $e->getMessage();
	}



	}//

	
	static public function GetProdRandomModel($dat=null){

		try{
			$filter = null;

			if(!empty($dat))$filter = ' AND  C.categoria LIKE  ?  ';
		 
		$qry = "SELECT P.nombre, C.categoria, P.intro, P.imagen, P.precio, P.precio_ant, P.elink, P.nuevo FROM productos P
				LEFT JOIN categorias C ON C.id = P.categoria
				WHERE P.estatus = '1' AND C.estatus = 1  ".$filter." ORDER BY RAND()  ";

		$stmt = Conexion::Conectar()->prepare($qry);
		if(!empty($dat)) $stmt->bindValue(1, "%".$dat."%", PDO::PARAM_STR); 

		$stmt->execute();
		return $stmt->fetchAll();

		}catch(PDOException $e){
		    echo "Mi-Log-Error: " . $e->getMessage();
	}



	}//






	static public function GetProdRandomSubCatModel($dat=null){

		try{
			$filter = null;

			//if(!empty($dat))$filter = ' AND  C.categoria LIKE  ?  ';
		 
		$qry = "SELECT P.nombre, C.categoria, P.intro, P.imagen, P.precio, P.precio_ant, P.elink, P.nuevo FROM productos P
				LEFT JOIN categorias C ON C.id = P.categoria
				WHERE P.estatus = '1' AND C.estatus = 1  AND subcategoria = :subcategoria ORDER BY RAND() LIMIT 3  ";

		$stmt = Conexion::Conectar()->prepare($qry);
		//if(!empty($dat)) $stmt->bindValue(1, "%".$dat."%", PDO::PARAM_STR); 
		$stmt->bindValue("subcategoria", $dat, PDO::PARAM_STR); 

		$stmt->execute();
		return $stmt->fetchAll();

		}catch(PDOException $e){
		    echo "Mi-Log-Error: " . $e->getMessage();
	}



	}//
















}




















