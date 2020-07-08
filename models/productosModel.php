<?php 




class productosModel{



	static public function SelectSubcatXCatIdModel($categoria){ 
		//echo $datos.'<br>';
		$qry = "SELECT * FROM subcategorias WHERE  categoria = :categoria AND estatus = 1 ORDER BY id DESC ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":categoria", $categoria, PDO::PARAM_INT);  

		if($stmt->execute()){
			return $stmt->fetchAll();
		}else{
			return "fail"; 
		} 
	}

	static public function BorrarArchivosProdModel($valor){
		$qry = "DELETE FROM productos_files WHERE id = :id ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":id", $valor, PDO::PARAM_INT); 

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		} 

	}

	
	
	static public function SubirArchivosProdModel($producto,$archivo ,$titulo){ 
		$qry = "INSERT INTO productos_files SET producto = :producto, archivo = :archivo, titulo = :titulo  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":producto", $producto, PDO::PARAM_INT);  
		$stmt->bindParam(":archivo", $archivo, PDO::PARAM_STR);  
		$stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);  

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		} 
	}


	static public function ListaArchivosModel($datos){ 
		//echo $datos.'<br>';
		$qry = "SELECT * FROM productos_files WHERE  producto = :producto ORDER BY id DESC ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":producto", $datos, PDO::PARAM_INT);  

		if($stmt->execute()){
			return $stmt->fetchAll();
		}else{
			return "fail"; 
		} 
	}



 	static public function NumFotosProductoModel($dat){
 		$qry = "SELECT COUNT(*) AS total FROM  productos_img WHERE producto = :producto   ";

		$stmt = Conexion::conectar()->prepare($qry);   
		$stmt->bindParam(":producto", $dat, PDO::PARAM_INT);  

		$stmt->execute();
		return $stmt->fetch();	
 	}



	static public function ListaSubCategoriasModel($id=null){
		$where = ( !empty($id))? " AND categoria =:categoria ":null;

		$qry = "SELECT * FROM  subcategorias WHERE estatus = 1 ".$where." ORDER BY subcategoria ASC ";
		//echo $qry.$id;

		$stmt = Conexion::conectar()->prepare($qry);    
		if( !empty($id) )$stmt->bindParam(":categoria", $id, PDO::PARAM_INT);  
		$stmt->execute();
		return $stmt->fetchAll();
	}

	static public function ListaCategoriasModel(){
		$qry = "SELECT * FROM  categorias WHERE estatus = 1 ORDER BY categoria ASC ";

		$stmt = Conexion::conectar()->prepare($qry);    

		$stmt->execute();
		return $stmt->fetchAll();
	}


	static public function DeleteSubCategoriasModel($dat){

		 
		$qry = "DELETE FROM  subcategorias  WHERE id = :id AND estatus = 1 ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":id", $dat, PDO::PARAM_INT);   

		$stmt->execute(); 
	}


	static public function PublicarSubCategoriasModel($id, $publish){
		$qry = "UPDATE subcategorias SET estatus = :publish  WHERE id = :id  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":id", $id, PDO::PARAM_INT); 
		$stmt->bindParam(":publish", $publish, PDO::PARAM_INT); 
		$stmt->execute();
	}
	
	static public function UpdateSubCategoriasModel($datos){

		$stc = null;
		if(array_key_exists("imagen", $datos))$stc = " imagen = :imagen, ";


		$qry = "UPDATE subcategorias SET tags =:tags, subcategoria = :subcategoria, categoria = :categoria,  descripcion = :descripcion, ".$stc." url = :url, oferta=:oferta  WHERE id = :id ";

 		$stmt = Conexion::conectar()->prepare($qry);  
		$stmt->bindValue(":subcategoria", $datos["subcategoria"], PDO::PARAM_STR); 
		$stmt->bindValue(":tags", $datos["tags"], PDO::PARAM_STR);   
		$stmt->bindValue(":categoria", $datos["categoria"], PDO::PARAM_STR);   
		$stmt->bindValue(":descripcion", $datos["descripcion"], PDO::PARAM_STR); 
		$stmt->bindValue(":oferta", $datos["oferta"], PDO::PARAM_STR); 
		$stmt->bindValue(":url", $datos["url"], PDO::PARAM_STR);  
		if(array_key_exists("imagen", $datos))$stmt->bindValue(":imagen", $datos["imagen"], PDO::PARAM_STR);   
		$stmt->bindValue(":id", $datos["id"], PDO::PARAM_INT);     

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		} 

	}
	
	static public function GetSubCategoriasModel($dat){

		 
		$qry = "SELECT * FROM  subcategorias WHERE id =:id  ";

		$stmt = Conexion::conectar()->prepare($qry);   
		$stmt->bindValue(":id", $dat, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch();
	}

	static public function GuardarSubCategoriasModel($datos){
		$qry = "INSERT INTO subcategorias SET tags=:tags,  subcategoria =:subcategoria, categoria =:categoria, url=:url, descripcion=:descripcion ,  imagen=:imagen , oferta=:oferta ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":tags", $datos["tags"], PDO::PARAM_STR);  
		$stmt->bindParam(":subcategoria", $datos["subcategoria"], PDO::PARAM_STR);  
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);  
		$stmt->bindParam(":url", $datos["url"], PDO::PARAM_STR);  
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);  
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);     
		$stmt->bindValue(":oferta", $datos["oferta"], PDO::PARAM_STR);   

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		} 
	}

	static public function ListSubCategoriasController(){
		$qry = "SELECT S.estatus, S.subcategoria, S.id, S.oferta, S.fecha, S.descripcion, S.imagen, C.categoria FROM subcategorias S  
				LEFT JOIN categorias C ON C.id = S.categoria
				ORDER BY S.subcategoria ASC ";

		$stmt = Conexion::conectar()->prepare($qry);  
		$stmt->execute();

		return $stmt->fetchAll();
	}

	//

	
	static public function DeleteCategoriasModel($dat){

		 
		$qry = "DELETE FROM  categorias  WHERE id = :id  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":id", $dat, PDO::PARAM_INT);   

		$stmt->execute(); 
	}


	static public function PublicarCategoriasModel($id, $publish){
		$qry = "UPDATE categorias SET estatus = :publish  WHERE id = :id  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":id", $id, PDO::PARAM_INT); 
		$stmt->bindParam(":publish", $publish, PDO::PARAM_INT); 
		$stmt->execute();
	}
	
	static public function UpdateCategoriasModel($datos){

		$stc = null;
		if(array_key_exists("imagen", $datos))$stc = " imagen = :imagen, ";


		$qry = "UPDATE categorias SET tags=:tags, categoria = :categoria,  descripcion = :descripcion, ".$stc." url = :url, oferta=:oferta  WHERE id = :id ";

 		$stmt = Conexion::conectar()->prepare($qry);  
		$stmt->bindValue(":tags", $datos["tags"], PDO::PARAM_STR);
		$stmt->bindValue(":categoria", $datos["categoria"], PDO::PARAM_STR);   
		$stmt->bindValue(":descripcion", $datos["descripcion"], PDO::PARAM_STR); 
		$stmt->bindValue(":oferta", $datos["oferta"], PDO::PARAM_STR); 
		$stmt->bindValue(":url", $datos["url"], PDO::PARAM_STR);  
		if(array_key_exists("imagen", $datos))$stmt->bindValue(":imagen", $datos["imagen"], PDO::PARAM_STR);   
		$stmt->bindValue(":id", $datos["id"], PDO::PARAM_INT);     

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		} 

	}
	
	static public function GetCategoriasModel($dat){

		 
		$qry = "SELECT * FROM  categorias WHERE id =:id  ";

		$stmt = Conexion::conectar()->prepare($qry);   
		$stmt->bindValue(":id", $dat, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch();
	}

	static public function GuardarCategoriasModel($datos){
		$qry = "INSERT INTO categorias SET tags=:tags,  categoria =:categoria, url=:url, descripcion=:descripcion ,  imagen=:imagen , oferta=:oferta ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":tags", $datos["tags"], PDO::PARAM_STR);  
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);  
		$stmt->bindParam(":url", $datos["url"], PDO::PARAM_STR);  
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);  
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);     
		$stmt->bindValue(":oferta", $datos["oferta"], PDO::PARAM_STR);   

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		} 
	}

	static public function ListCategoriasController(){
		$qry = "SELECT * FROM categorias   ORDER BY categoria ASC ";

		$stmt = Conexion::conectar()->prepare($qry);  
		$stmt->execute();

		return $stmt->fetchAll();
	}

	
	static public function ListaGaleriaProductoModel($inmueble){
		$qry = "SELECT * FROM productos_img WHERE producto=:producto  ORDER BY posicion ASC ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":producto", $inmueble, PDO::PARAM_INT); 
		$stmt->execute();

		return $stmt->fetchAll();

	}
	
	static public function ListaEditGaleriaProductoModel($id){
		$qry = "SELECT * FROM productos_img WHERE producto=:producto ORDER BY posicion, id DESC ";

		$stmt = Conexion::conectar()->prepare($qry);
		$stmt->bindParam(":producto", $id, PDO::PARAM_INT);  
		$stmt->execute();

		return $stmt->fetchAll();
	}



	
	static public function UpdateProductoModel($datos){
		

		$stc = null;
		if(array_key_exists("imagen", $datos))$stc = " imagen=:imagen, ";


		$qry = "UPDATE productos SET tags=:tags, stock=:stock, codigo =:codigo, nombre=:nombre, elink=:elink , categoria=:categoria, subcategoria=:subcategoria, tipo_producto=:tipo_producto, oferta=:oferta,
				subsubcategoria =:subsubcategoria, intro=:intro, descripcion=:descripcion, ".$stc." precio_ant=:precio_ant, precio=:precio, peso=:peso, detalles=:detalles, nuevo=:nuevo
				WHERE id = :id ";


		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":tags", $datos["tags"], PDO::PARAM_STR);  
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);  
		$stmt->bindParam(":elink", $datos["elink"], PDO::PARAM_STR);  
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);  
		$stmt->bindParam(":subcategoria", $datos["subcategoria"], PDO::PARAM_STR);  
		$stmt->bindParam(":subsubcategoria", $datos["subsubcategoria"], PDO::PARAM_STR);  
		$stmt->bindParam(":intro", $datos["intro"], PDO::PARAM_STR);  
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);  
		if(array_key_exists("imagen", $datos))$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);  
		$stmt->bindParam(":precio_ant", $datos["precio_ant"], PDO::PARAM_INT);  
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_INT); 
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);   
		$stmt->bindParam(":tipo_producto", $datos["tipo_producto"], PDO::PARAM_STR);  
		$stmt->bindParam(":oferta", $datos["oferta"], PDO::PARAM_STR);  
		$stmt->bindParam(":peso", $datos["peso"], PDO::PARAM_STR);  
		$stmt->bindParam(":detalles", $datos["detalles"], PDO::PARAM_STR);  
		$stmt->bindParam(":nuevo", $datos["nuevo"], PDO::PARAM_STR); 
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);   
		//var_dump($datos); 

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		} 

	}
 
	static public function GetProductoModel($dat){
 
		$qry = "SELECT * FROM  productos WHERE id =:id  ";

		$stmt = Conexion::conectar()->prepare($qry);   
		$stmt->bindValue(":id", $dat, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch();
	}

	static public function PublicarProductoModel($id, $publish){
		$qry = "UPDATE productos SET estatus = :publish  WHERE id = :id  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":id", $id, PDO::PARAM_INT); 
		$stmt->bindParam(":publish", $publish, PDO::PARAM_INT); 
		$stmt->execute();
	}

	
	static public function DeleteProductoController($dat){

		 
		$qry = "DELETE FROM  productos  WHERE id = :id  ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":id", $dat, PDO::PARAM_INT);   

		$stmt->execute(); 
	}

	
	static public function listaCategoriasSuggestModel($dat){

		 
		$qry = "SELECT $dat FROM  productos  GROUP BY $dat ORDER BY $dat ASC ";

		$stmt = Conexion::conectar()->prepare($qry);   

		$stmt->execute();
		return $stmt->fetchAll();
	}

	
	public function GuardarProductoModel($datos){ 

		$qry = "INSERT INTO productos SET tags=:tags, stock=:stock, codigo =:codigo, nombre=:nombre, elink=:elink , categoria=:categoria, subcategoria=:subcategoria, tipo_producto =:tipo_producto, oferta=:oferta,
				subsubcategoria =:subsubcategoria, intro=:intro, descripcion=:descripcion, imagen=:imagen, precio_ant=:precio_ant, precio=:precio, peso=:peso, detalles=:detalles , nuevo=:nuevo";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":tags", $datos["tags"], PDO::PARAM_STR);  
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);  
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);  
		$stmt->bindParam(":elink", $datos["elink"], PDO::PARAM_STR);  
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);  
		$stmt->bindParam(":subcategoria", $datos["subcategoria"], PDO::PARAM_STR);  
		$stmt->bindParam(":subsubcategoria", $datos["subsubcategoria"], PDO::PARAM_STR);  
		$stmt->bindParam(":intro", $datos["intro"], PDO::PARAM_STR);  
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);  
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);  
		$stmt->bindParam(":precio_ant", $datos["precio_ant"], PDO::PARAM_INT);  
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_INT);   
		$stmt->bindParam(":tipo_producto", $datos["tipo_producto"], PDO::PARAM_STR);  
		$stmt->bindParam(":oferta", $datos["oferta"], PDO::PARAM_STR);  
		$stmt->bindParam(":peso", $datos["peso"], PDO::PARAM_STR);  
		$stmt->bindParam(":detalles", $datos["detalles"], PDO::PARAM_STR);  
		$stmt->bindParam(":nuevo", $datos["nuevo"], PDO::PARAM_STR);  
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);  

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		} 

	}


	
	static public function ListProductosModel($dat = null){

		try {
			$stc = null;
			if(array_key_exists("nombre", $dat))$stc .= " AND (productos.nombre LIKE :nombre OR productos.codigo LIKE :code)";
			if(array_key_exists("nuevos", $dat))$stc .= " AND productos.nuevo  = 1 ";
			if(array_key_exists("inactivos", $dat))$stc .= " AND productos.estatus  = 0 ";
			if(array_key_exists("ofertas", $dat))$stc .= " AND (productos.descuento IS NOT NULL OR productos.oferta_precio IS NOT NULL OR productos.precio_ant IS NOT NULL ) ";

			$qry = "SELECT productos.id, productos.nombre, productos.nuevo, productos.precio_ant, productos.imagen, productos.precio, productos.codigo, productos.fecha, productos.estatus, categorias.categoria, subcategorias.subcategoria FROM  productos  
					LEFT JOIN categorias ON categorias.id = productos.categoria
					LEFT JOIN subcategorias ON subcategorias.id = productos.subcategoria
					WHERE productos.id > 0 ".$stc." ORDER BY productos.id ASC LIMIT 30 ";

			$stmt = Conexion::conectar()->prepare($qry); 
			if(array_key_exists("nombre", $dat))$stmt->bindValue(":nombre", "%".$dat["nombre"]."%", PDO::PARAM_STR);    
			if(array_key_exists("nombre", $dat))$stmt->bindValue(":code", "%".$dat["nombre"]."%", PDO::PARAM_STR);  

			$stmt->execute();
			return $stmt->fetchAll();
		} catch (PDOException $e) {
			echo "Log SQLError: ".$qry."|" . $e->getMessage();
			
		}
		
	}



	public function SubirImagenDB($datos, $producto){
			$qry = "INSERT INTO productos_img SET imagen = :imagen, producto=:producto  ";

			$stmt = Conexion::conectar()->prepare($qry); 
			$stmt->bindParam(":imagen", $datos, PDO::PARAM_STR);  
			$stmt->bindParam(":producto", $producto, PDO::PARAM_INT);  

			if($stmt->execute()){
				return "success"; 
			}else{
				return "fail"; 
			}
		}


	public function EliminarImgInmuebModel($valor){
		$qry = "DELETE FROM productos_img WHERE imagen = :imagen ";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":imagen", $valor, PDO::PARAM_STR); 

		if($stmt->execute()){
			return "success"; 
		}else{
			return "fail"; 
		}

	}


	public function EditGaleriaModel($datos){
			$qry = "UPDATE productos_img SET titulo = :titulo, descripcion = :descripcion WHERE imagen = :imagen";

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


	public function ReviewGaleriaDataModel($datos){
		$qry = "SELECT * FROM productos_img  WHERE imagen = :imagen";

		$stmt = Conexion::conectar()->prepare($qry); 
		$stmt->bindParam(":imagen", $datos["id"], PDO::PARAM_STR); 

		$stmt->execute();

		return $stmt->fetch();
	}


	public function OrdenImgInmuebModel($datos){
		$qry = "UPDATE productos_img SET posicion = :orden WHERE imagen = :imagen";

		$stmt = Conexion::conectar()->prepare($qry);
		$stmt->bindParam(":orden", $datos["orden"], PDO::PARAM_INT);  
		$stmt->bindParam(":imagen", $datos["item"], PDO::PARAM_STR); 

		if($stmt->execute()){
			return "success";
		}else{
			return "fail";
		}
	}






























}