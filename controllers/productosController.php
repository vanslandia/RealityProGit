<?php 


class productosController {


	static public function BorrarArchivosProdSilder(){
		if( !empty($_GET["idBorrarFile"])){
			productosModel::BorrarArchivosProdModel($_GET["idBorrarFile"]);
			bitacoraController::Registro("Borro Archivo ".$_GET["idBorrarFile"]);
		}
	}

	
	static public function ListaArchivosController(){
    // http://migohost.com.mx/agm/admin/index.php?bq=imagenes/adminviews/images/galeria/slider_17936.jpg
		$id = DeCryptFinal($_GET["id"]);
		$respuesta = productosModel::ListaArchivosModel($id);
		//var_dump($respuesta);

		if(is_array($respuesta)  && count($respuesta)>0){

				foreach ($respuesta as $row => $item) {
					 echo '

					  <div class="file-box">
                            <div class="file">
                                
                                    <span class="corner "><a href="javascript:BorrarArchivo('.$item["id"].', \''.$item["titulo"].'\', \''.$_GET["id"].'\')"  ><span class="text-danger"><i class="fa fa-times text-danger"></i></span></a></span>
                                    <div class="icon">
                                         <i class="fa fa-file"></i>
                                    </div>
                                       <div class="file-name"> '.$item["titulo"].' <br/> <small>Archivo: <a href="views/images/archivos/'.$item["archivo"].'" target="_blank">'.$item["archivo"].' </a></small>
                                    </div>
                                
                            </div>
                     </div>

					    
					   ';
				} 
			}else{
				echo '<div clasS="alert alert-warning">No hay archivos asociados</div>';
			}
	}



	static public function SubirArchivosProdSilder(){
		if(!empty($_FILES["archivoFile"]["name"])   && !empty($_GET["id"])  && !empty($_POST["nombrefile"])){

			$id = DeCryptFinal($_GET["id"]);

			$ext = Extencion($_FILES["archivoFile"]["name"]);
			$ruta = "file_".mt_rand(10,50000).".".$ext;
			copy($_FILES["archivoFile"]["tmp_name"], "views/images/archivos/".$ruta);


			$respuesta = productosModel::SubirArchivosProdModel($id, $ruta,   $_POST["nombrefile"]);	
			bitacoraController::Registro("Agregó Archivo ".$ruta);

			echo '<script> swal({
                                     title: "Guardado ",
									  text: "Se han guardado el archivo '.$_POST["nombrefile"].'.",
									  type: "success", 
									  confirmButtonColor: "#1ab394",    ///V:    1ab394      ///R:    DD6B55
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false},
									   function(isConfirm){   
								          if(isConfirm) window.location = "index.php?bq=productos-dat&tab=tab-3&id='.$_GET["id"].'";  
                                        }
                                     ); 
                            </script>';


		}
	}




	static public function ListaGaleriaProductoControllers(){

		if(!empty($_GET["id"])){

				$id = DeCryptFinal($_GET["id"]);
				$respuesta = productosModel::ListaGaleriaProductoModel($id);

				foreach ($respuesta as $row => $item) {
					 echo '
					 <li id="'.$item["imagen"].'" class="bloqueSlide">
						<span class="fa fa-times  elimProductoImg "></span>
						<img src="views/images/productos/'.$item["imagen"].'" class="handleImg">			
					</li>
					 ';
				} 
		}
	}

	public function ListaEditGaleriaProductoControllers(){

		if(!empty($_GET["id"])){

				$id = DeCryptFinal($_GET["id"]);

					$respuesta = productosModel::ListaEditGaleriaProductoModel($id);

					foreach ($respuesta as $row => $item) {
						 echo '
						 <li id="edit'.str_replace(".jpg", "", $item["imagen"]).'" >
							<span class="fa fa-pencil editGalProducto " style="background:#1ab394"></span>
							<img src="views/images/productos/'.$item["imagen"].'" style="float:left; margin-bottom:10px" width="80%">
							<h1>'.$item["titulo"].'</h1>
							<p>'.$item["descripcion"].'</p>
						</li>
						 ';
					} 
		}

	}


	
	static public function UpdateProductoController(){

		 if(!empty($_POST["nombre"])  && !empty($_GET["id"]) ){
		 	$id = DeCryptFinal($_GET["id"]);


			


			if(!empty($_POST["codigo"]))$codigo = $_POST["codigo"]; else $codigo = null;
			if(!empty($_POST["nombre"]))$nombre = $_POST["nombre"]; else $nombre = null;
			if(!empty($_POST["categoria"]))$categoria = $_POST["categoria"]; else $categoria = null;
			if(!empty($_POST["subcategoria"]))$subcategoria = $_POST["subcategoria"]; else $subcategoria = null;
			if(!empty($_POST["subsubcategoria"]))$subsubcategoria = $_POST["subsubcategoria"]; else $subsubcategoria = null;
			if(!empty($_POST["intro"]))$intro = $_POST["intro"]; else $intro = null;
			if(!empty($_POST["descripcion"]))$descripcion = $_POST["descripcion"]; else $descripcion = null;
			if(!empty($_POST["precio_ant"]))$precio_ant = $_POST["precio_ant"]; else $precio_ant = null;
			if(!empty($_POST["precio"]))$precio = $_POST["precio"]; else $precio = null;
			if(!empty($_POST["url"]))$url = $_POST["url"]; else $url = null; 

			if(!empty($_POST["tipo_producto"]))$tipo_producto = $_POST["tipo_producto"]; else $tipo_producto = null;
			if(!empty($_POST["oferta"]))$oferta = $_POST["oferta"]; else $oferta = null; 
			if(!empty($_POST["peso"]))$peso = $_POST["peso"]; else $peso = null; 
			if(!empty($_POST["detalles"]))$detalles = $_POST["detalles"]; else $detalles = null; 
			if(!empty($_POST["nuevo"]))$nuevo = $_POST["nuevo"]; else $nuevo = null; 
			if(!empty($_POST["tags"]))$tags = $_POST["tags"]; else $tags = null; 
			if(!empty($_POST["stock"]))$stock = $_POST["stock"]; else $stock = null; 

			$datos = array("id"=>$id,"tags"=>$tags, "stock"=>$stock, "codigo"=>$codigo,"nombre"=>$nombre,"categoria"=>$categoria,"subcategoria"=>$subcategoria,"subsubcategoria"=>$subsubcategoria,"intro"=>$intro,"descripcion"=>$descripcion,"precio_ant"=>$precio_ant,"precio"=>$precio,"elink"=>$url,"tipo_producto"=>$tipo_producto,"oferta"=>$oferta,"peso"=>$peso,"detalles"=>$detalles,"nuevo"=>$nuevo  );
			

			if(!empty($_FILES["imagen"]["tmp_name"])){
								$myAncho = 100;
								$myAlto = 100;

								$imagen = $_FILES["imagen"]["tmp_name"];


								$file = "product_".mt_rand(10,500000).".jpg";
								$ruta = "views/images/articulos/".$file;

								$origen = imagecreatefromjpeg($imagen);
								imagejpeg($origen,  $ruta); 
								if(!empty($ruta))$imagen = $ruta; else $imagen = null;
								$datos["imagen"] = $imagen; 

			}

			$resp = productosModel::UpdateProductoModel($datos);
			bitacoraController::Registro("Edito producto ".$_POST["nombre"]);


			if($resp=="success"){
					 		echo '<script> swal({
                                     title: "Guardado ",
									  text: "Se han guardado los datos producto '.$nombre.'.",
									  type: "success", 
									  confirmButtonColor: "#1ab394",    ///V:    1ab394      ///R:    DD6B55
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false},
									   function(isConfirm){   
								          if(isConfirm) window.location = "index.php?bq=productos-dat&id='.$_GET["id"].'";  
                                        }
                                     ); 
                            </script>';
					 	}else{
					 		 echo ' <script> 
					 			swal({
                                     title: "Error !",
									  text: "Hay un al guardar los datos",
									  type: "warning", 
									  confirmButtonColor: "#DD6B55",    ///V:    1ab394      ///R:    DD6B55
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
                            		}); 
                            </script>';
			}



		}

	}

	static public function GetProductoController(){

		if(!empty($_GET["id"])){
			$id = DeCryptFinal($_GET["id"]);
		    return $dat =  productosModel::GetProductoModel($id); 
		}
		 

	}



	static public function PublicarProductoController(){

		if(!empty($_GET["publish"]) && !empty($_GET["nombre"]) ){
			if(isset($_GET["sts"])){
				productosModel::PublicarProductoModel($_GET["publish"], $_GET["sts"]);
			    if($_GET["sts"]==1)bitacoraController::Registro("Publicó Producto ".$_GET["nombre"]); else bitacoraController::Registro("Suspendio Producto ".$_GET["nombre"]);
			     
			}
	   }

	}



	static public function listaCategoriasSuggestController($dat){
		$respuesta =  productosModel::listaCategoriasSuggestModel($dat);
		$row  = '[';

		if(count($respuesta)>0){
			foreach ($respuesta as $key => $item) {
				$row .= '"'.$item[$dat].'",';
			}
		}

		$row = substr ($row, 0, strlen($row) - 1).']';
		return $row;
	}

	
	static public function GuardarProductoController(){

		if(!empty($_POST["nombre"])){



			if( !empty($_FILES["imagen"]["tmp_name"]) ) {
					$myAncho = 100;
					$myAlto = 100;

					$imagen = $_FILES["imagen"]["tmp_name"];


					$file = "product_".mt_rand(10,500000).".jpg";
					$ruta = "views/images/articulos/".$file;

					$origen = imagecreatefromjpeg($imagen);
					imagejpeg($origen,  $ruta);

					/*
					$destino = imagecrop($origen, array("x"=>0, "y"=>0, "width"=>$myAncho, "height"=>$myAlto));
		 
					imagejpeg($destino,  $ruta);
					imagedestroy($destino); 
					*/

				}


			if(!empty($_POST["codigo"]))$codigo = $_POST["codigo"]; else $codigo = null;
			if(!empty($_POST["nombre"]))$nombre = $_POST["nombre"]; else $nombre = null;
			if(!empty($_POST["categoria"]))$categoria = $_POST["categoria"]; else $categoria = null;
			if(!empty($_POST["subcategoria"]))$subcategoria = $_POST["subcategoria"]; else $subcategoria = null;
			if(!empty($_POST["subsubcategoria"]))$subsubcategoria = $_POST["subsubcategoria"]; else $subsubcategoria = null;
			if(!empty($_POST["intro"]))$intro = $_POST["intro"]; else $intro = null;
			if(!empty($_POST["descripcion"]))$descripcion = $_POST["descripcion"]; else $descripcion = null;
			if(!empty($ruta))$imagen = $ruta; else $imagen = null;
			if(!empty($_POST["precio_ant"]))$precio_ant = $_POST["precio_ant"]; else $precio_ant = null;
			if(!empty($_POST["precio"]))$precio = $_POST["precio"]; else $precio = null;
			if(!empty($_POST["url"]))$url = $_POST["url"]; else $url = null; 

			if(!empty($_POST["tipo_producto"]))$tipo_producto = $_POST["tipo_producto"]; else $tipo_producto = null;
			if(!empty($_POST["oferta"]))$oferta = $_POST["oferta"]; else $oferta = null; 
			if(!empty($_POST["peso"]))$peso = $_POST["peso"]; else $peso = null; 
			if(!empty($_POST["detalles"]))$detalles = $_POST["detalles"]; else $detalles = null; 
			if(!empty($_POST["nuevo"]))$nuevo = $_POST["nuevo"]; else $nuevo = null; 
			if(!empty($_POST["tags"]))$tags = $_POST["tags"]; else $tags = null; 
			if(!empty($_POST["stock"]))$stock = $_POST["stock"]; else $stock = null; 



			$datos = array("codigo"=>$codigo, "tags"=>$tags, "stock"=>$stock, "nombre"=>$nombre,"categoria"=>$categoria,"subcategoria"=>$subcategoria,"subsubcategoria"=>$subsubcategoria,"intro"=>$intro,"descripcion"=>$descripcion,"imagen"=>$imagen,"precio_ant"=>$precio_ant,"precio"=>$precio,"elink"=>$url,"tipo_producto"=>$tipo_producto,"oferta"=>$oferta,"peso"=>$peso,"detalles"=>$detalles,"nuevo"=>$nuevo  );

			$resp = productosModel::GuardarProductoModel($datos);
			bitacoraController::Registro("Agrego producto ".$_POST["nombre"]);


			if($resp=="success"){
					 		echo '<script> swal({
                                     title: "Guardado ",
									  text: "Se han guardado los datos '.$nombre.'.",
									  type: "success", 
									  confirmButtonColor: "#1ab394",    ///V:    1ab394      ///R:    DD6B55
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false},
									   function(isConfirm){   
								          if(isConfirm) window.location = "index.php?bq=productos";  
                                        }
                                     ); 
                            </script>';
					 	}else{
					 		 echo ' <script> 
					 			swal({
                                     title: "Error !",
									  text: "Hay un al guardar los datos",
									  type: "warning", 
									  confirmButtonColor: "#DD6B55",    ///V:    1ab394      ///R:    DD6B55
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
                            		}); 
                            </script>';
			}



		}

	}






	
	static public function ListProductosController(){

		$datos = array();
		if(!empty($_POST["nombre"]))$datos["nombre"] = $_POST["nombre"];
		if(!empty($_POST["nuevos"]))$datos["nuevos"] = $_POST["nuevos"];
		if(!empty($_POST["ofertas"]))$datos["ofertas"] = $_POST["ofertas"];
		if(!empty($_POST["inactivos"]))$datos["inactivos"] = $_POST["inactivos"];

		$dat = productosModel::ListProductosModel($datos);

		if(count($dat)>0 && is_array($dat)){

			foreach ($dat as $row => $item) {

				$precio = number_format($item["precio"],2);

				if($item["estatus"]==1)$estatus = '<div class="label label-primary">Activo</div>'; else $estatus = '<div class="label label-warning">Inactivo</div>';
				if($precio>0)$precio  = "$ ".$precio." MXN"; else $precio = null;
				if($item["precio_ant"])$precio .= "<div class='text-gray' style='text-decoration: line-through; '>$ ".number_format($item["precio_ant"],2)." MXN</div>";
				if($item["estatus"]==0)$sts = 1; else $sts = 0;
				if($item["nuevo"]=="1")$nuevo = "<i class='fa fa-star text-warning'></i>"; else $nuevo = null;
				$img = productosModel::NumFotosProductoModel($item["id"]);

				$thumb = $item["imagen"];
				if(file_exists($thumb))$thumb =$thumb; else $thumb = 'views/images/pattern.jpg';

				echo '
				 <tr>
			        <td><div class="text-gray f8">'.PresentarFecha($item["fecha"]).'</div></td>
			        <td> <img src="'.$thumb.'" class="img-sm img-rounded "> </td> 
			        <td><div class="bold"> '.$item["nombre"].' </div>
						<div class="text-gray">'.$item["codigo"].'</div>
			        </td>
			        <td  >
			        	<h5 class="text-navy">'.$item["categoria"].'</h5>
			        	<h6 class="text-info">'.$item["subcategoria"].'</h6> 
			        </td>
			        <td><small>'.$precio.'</small></td> 
			        <td>'.$nuevo.'</td> 
			        <td class=" text-info">'.$img["total"].' <i class="fa fa-file-image-o"></i></td>
			        <td>
			        <a href="javascript:PublicarProd('.$item["id"].', \''.$item["nombre"].'\', '.$sts.');"> '.$estatus.' </a>
			        </td>
			        <td>
			        <a href="index.php?bq=productos-dat&id='.PasarNumero($item["id"]).'">
			        <span id="'.$item["id"].'" class="fa fa-pencil editarusuario text-navy"  ></span>
			        </a>
			        
			        </td>
			        <td>
			        <a href="javascript:EliminarProduc(\''.PasarNumero($item["id"]).'\', \''.$item["nombre"].'\');"><span class=" fa fa-times eliminarUsuario text-danger"></span></a>
			        </td>
			      </tr>
			      '; 


			}
		}else{
			echo '<div class="alert alert-warning">No existen registros.</div>';
		}


	}


	static public function DeleteProductoController(){
		if(!empty($_GET["idBorrar"])){
			$id = DeCryptFinal($_GET["idBorrar"]);
		    productosModel::DeleteProductoController($id);
		    bitacoraController::Registro("Borro producto ".$_GET["nombre"]);
		}

	}


	



	public function EliminarImgInmuebController($valor){

			$file = "../../views/images/productos/".$valor;
			if(file_exists($file))unlink($file);
				$respuesta = productosModel::EliminarImgInmuebModel($valor);
				bitacoraController::Registro("Eliminó Imagen Producto ".$valor);
				return $respuesta;	
			 

	}




	public function EditGaleriaController($datos){

		productosModel::EditGaleriaModel($datos);
		$respuesta = productosModel::ReviewGaleriaDataModel($datos);
		bitacoraController::Registro("Editó Imagen Producto ".$respuesta["titulo"]);

		$enviar = array("titulo"=>$respuesta["titulo"],"descripcion"=>$respuesta["descripcion"]);

		echo  json_encode($enviar);
	}

	public function OrdenImgInmuebController($datos){
		 productosModel::OrdenImgInmuebModel($datos);
		 
	}




 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 #  Categorias
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++



	static public function ListCategoriasController(){
		$resp = productosModel::ListCategoriasController();

		if(count($resp)>0 && is_array($resp)){

			foreach ($resp as $row => $item) {

				
 

				if($item["estatus"]==1)$estatus = '<div class="label label-primary">Activo</div>'; else $estatus = '<div class="label label-warning">Inactivo</div>';  
				if($item["estatus"]==0)$sts = 1; else $sts = 0;
				if($item["oferta"]>0)$oferta = "Desc. ".$item["oferta"]."%"; else $oferta = '';

				$thumb = $item["imagen"];
				if(file_exists($thumb))$thumb =$thumb; else $thumb = 'views/images/pattern.jpg';

				echo '
				 <tr>
			        <td><div class="text-gray f8">'.PresentarFecha($item["fecha"]).'</div></td>
			        <td class="text-info small">'.$oferta.'</td>
			        <td class="text-navy">'.$item["categoria"].'</td>
			        <td>'.substr($item["descripcion"],0,80).'...</td>
			        <td> <img src="'.$thumb.'" class="img-sm img-rounded "> </td>
			          
			        <td>
			        <a href="javascript:PublicarCat('.$item["id"].', \''.$item["categoria"].'\', '.$sts.');"> '.$estatus.' </a>
			        </td> 

			        <td>
			        <a href="index.php?bq=categorias-dat&id='.PasarNumero($item["id"]).'">
			       		 <span id="'.$item["id"].'" class="fa fa-pencil editarusuario text-navy"  ></span>
			        </a>
			        
			        </td>
			        <td>
			        <a href="javascript:EliminarCat(\''.PasarNumero($item["id"]).'\', \''.$item["categoria"].'\');"><span class=" fa fa-times eliminarUsuario text-danger"></span></a>
			        </td>
			      </tr>
			      '; 


			}
		}else{
			echo '<div class="alert alert-warning">No existen registros.</div>';
		}

	}



	
	static public function GuardarCategoriasController(){
		if(!empty($_POST["categoria"])){
			$imagen = '';


			if(   !empty($_FILES["imagen"]["name"])   ){
					$myAncho = 100;
					$myAlto = 100;

					$imagen = $_FILES["imagen"]["tmp_name"];


					$file = "category_".mt_rand(10,500000).".jpg";
					$ruta = "views/images/articulos/".$file;

					$origen = imagecreatefromjpeg($imagen);
					imagejpeg($origen,  $ruta);
					$imagen =$ruta ; 
				}

			if(!empty($_POST["categoria"]))$categoria = $_POST["categoria"]; else $categoria =null;
			if(!empty($_POST["descripcion"]))$descripcion = $_POST["descripcion"]; else $descripcion =null;
			if(!empty($_POST["url"]))$url = $_POST["url"]; else $url =null;
			if(!empty($_POST["oferta"]))$oferta = $_POST["oferta"]; else $oferta =null;
			if(!empty($_POST["tags"]))$tags = $_POST["tags"]; else $tags =null;

			$datos = array("categoria"=>$categoria, "tags"=>$tags, "descripcion"=>$descripcion,"imagen"=>$imagen,"url"=>$url, "oferta"=>$oferta  );

			$resp = productosModel::GuardarCategoriasModel($datos);
			bitacoraController::Registro("Agrego categoria ".$_POST["categoria"]);


			if($resp=="success"){
					 		echo '<script> swal({
                                     title: "Guardado ",
									  text: "Se han guardado los datos '.$categoria.'.",
									  type: "success", 
									  confirmButtonColor: "#1ab394",    ///V:    1ab394      ///R:    DD6B55
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false},
									   function(isConfirm){   
								          if(isConfirm) window.location = "index.php?bq=categorias";  
                                        }
                                     ); 
                            </script>';
					 	}else{
					 		 echo ' <script> 
					 			swal({
                                     title: "Error !",
									  text: "Hay un al guardar los datos",
									  type: "warning", 
									  confirmButtonColor: "#DD6B55",    ///V:    1ab394      ///R:    DD6B55
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
                            		}); 
                            </script>';
			}


		}
		
	}

	static public function UpdateCategoriasController(){
		 if(!empty($_POST["categoria"])  && !empty($_GET["id"]) ){
		 	$id = DeCryptFinal($_GET["id"]);

			if(!empty($_POST["categoria"]))$categoria = $_POST["categoria"]; else $categoria = null;
			if(!empty($_POST["descripcion"]))$descripcion = $_POST["descripcion"]; else $descripcion = null; 
			if(!empty($_POST["url"]))$url = $_POST["url"]; else $url = null; 
			if(!empty($_POST["oferta"]))$oferta = $_POST["oferta"]; else $oferta = null; 
			if(!empty($_POST["tags"]))$tags = $_POST["tags"]; else $tags = null; 

			$datos = array("id"=>$id, "tags"=>$tags, "categoria"=>$categoria,"descripcion"=>$descripcion,"url"=>$url, "oferta"=>$oferta   );
			

			if(!empty($_FILES["imagen"]["tmp_name"])){
								$myAncho = 100;
								$myAlto = 100;

								$imagen = $_FILES["imagen"]["tmp_name"];


								$file = "category_".mt_rand(10,500000).".jpg";
								$ruta = "views/images/articulos/".$file;

								$origen = imagecreatefromjpeg($imagen);
								imagejpeg($origen,  $ruta); 
								if(!empty($ruta))$imagen = $ruta; else $imagen = null;
								$datos["imagen"] = $imagen; 

			}

			$resp = productosModel::UpdateCategoriasModel($datos);
			bitacoraController::Registro("Edito categoria ".$_POST["categoria"]);


			if($resp=="success"){
					 		echo '<script> swal({
                                     title: "Guardado ",
									  text: "Se han guardado los datos '.$categoria.'.",
									  type: "success", 
									  confirmButtonColor: "#1ab394",    ///V:    1ab394      ///R:    DD6B55
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false},
									   /*function(isConfirm){   
								          if(isConfirm) window.location = "index.php?bq=categorias";  
                                        }*/
                                     ); 
                            </script>';
					 	}else{
					 		 echo ' <script> 
					 			swal({
                                     title: "Error !",
									  text: "Hay un al guardar los datos",
									  type: "warning", 
									  confirmButtonColor: "#DD6B55",    ///V:    1ab394      ///R:    DD6B55
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
                            		}); 
                            </script>';
			}



		}
	}



	static public function DeleteCategoriasController(){
		if(!empty($_GET["idBorrar"])){
			$id = DeCryptFinal($_GET["idBorrar"]);
		    productosModel::DeleteCategoriasModel($id);
		    bitacoraController::Registro("Borro categoria ".$_GET["titulo"]);
		}
	}

	static public function PublicarCategoriasController(){
		if(!empty($_GET["publish"]) && !empty($_GET["nombre"]) ){
			if(isset($_GET["sts"])){
				productosModel::PublicarCategoriasModel($_GET["publish"], $_GET["sts"]);
			    if($_GET["sts"]==1)bitacoraController::Registro("Publicó categoria ".$_GET["nombre"]); else bitacoraController::Registro("Suspendio categoria ".$_GET["nombre"]);
			     
			}
	   }
	}

	
	

	static public function GetCategoriasController(){
		if(!empty($_GET["id"])){
			$id = DeCryptFinal($_GET["id"]);
			return productosModel::GetCategoriasModel($id);
		}

	}



	/*++++++++++++++++++++++++++++++++++++ 
	//  Subcategorias
	 ++++++++++++++++++++++++++++++++++++*/ 



	static public function ListSubCategoriasController(){
		$resp = productosModel::ListSubCategoriasController();

		if(count($resp)>0 && is_array($resp)){

			foreach ($resp as $row => $item) {
 

				if($item["estatus"]==1)$estatus = '<div class="label label-primary">Activo</div>'; else $estatus = '<div class="label label-warning">Inactivo</div>';  
				if($item["estatus"]==0)$sts = 1; else $sts = 0;
				if($item["oferta"]>0)$oferta = "Desc. ".$item["oferta"]."%"; else $oferta = '';

				$thumb = $item["imagen"];
				if(file_exists($thumb))$thumb =$thumb; else $thumb = 'views/images/pattern.jpg';
				if(empty($item["categoria"]))$cat = '<span class="text-danger">Sin categoría</span>'; else $cat = $item["categoria"];

				echo '
				 <tr>
			        <td><div class="text-gray f8">'.PresentarFecha($item["fecha"]).'</div></td>
			        <td class="text-info small">'.$oferta.'</td>
			        <td class="text-navy">'.$item["subcategoria"].'<div class="small text-gray">'.$cat.'</div></td>
			        <td>'.substr($item["descripcion"],0,80).'...</td>
			        <td> <img src="'.$thumb.'" class="img-sm img-rounded "> </td>
			          
			        <td>
			        <a href="javascript:PublicarSubCat('.$item["id"].', \''.$item["subcategoria"].'\', '.$sts.');"> '.$estatus.' </a>
			        </td> 
			        <td>
			        <a href="index.php?bq=subcategorias-dat&id='.PasarNumero($item["id"]).'">
			       		 <span id="'.$item["id"].'" class="fa fa-pencil editarusuario text-navy"  ></span>
			        </a>
			        
			        </td>
			        <td>
			        <a href="javascript:EliminarSubCat(\''.PasarNumero($item["id"]).'\', \''.$item["subcategoria"].'\');"><span class=" fa fa-times eliminarUsuario text-danger"></span></a>
			        </td>
			      </tr>
			      '; 


			}
		}else{
			echo '<div class="alert alert-warning">No existen registros.</div>';
		}

	}



	
	static public function GuardarSubCategoriasController(){
		if(!empty($_POST["categoria"])){
			$imagen = '';


			if(!empty($_FILES["imagen"]["tmp_name"])){
					$myAncho = 100;
					$myAlto = 100;

					$imagen = $_FILES["imagen"]["tmp_name"];


					$file = "subcategory_".mt_rand(10,500000).".jpg";
					$ruta = "views/images/articulos/".$file;

					$origen = imagecreatefromjpeg($imagen);
					imagejpeg($origen,  $ruta);
					$imagen =$ruta ; 
				}

			if(!empty($_POST["categoria"]))$categoria = $_POST["categoria"]; else $categoria =null;
			if(!empty($_POST["subcategoria"]))$subcategoria = $_POST["subcategoria"]; else $subcategoria =null;
			if(!empty($_POST["descripcion"]))$descripcion = $_POST["descripcion"]; else $descripcion =null;
			if(!empty($_POST["url"]))$url = $_POST["url"]; else $url =null;
			if(!empty($_POST["oferta"]))$oferta = $_POST["oferta"]; else $oferta =null;
			if(!empty($_POST["tags"]))$tags = $_POST["tags"]; else $tags =null;

			$datos = array("subcategoria"=>$subcategoria,"tags"=>$tags, "categoria"=>$categoria, "descripcion"=>$descripcion,"imagen"=>$imagen,"url"=>$url, "oferta"=>$oferta  );

			$resp = productosModel::GuardarSubCategoriasModel($datos);
			bitacoraController::Registro("Agrego subcategoria ".$_POST["subcategoria"]);


			if($resp=="success"){
					 		echo '<script> swal({
                                     title: "Guardado ",
									  text: "Se han guardado los datos '.$subcategoria.'.",
									  type: "success", 
									  confirmButtonColor: "#1ab394",    ///V:    1ab394      ///R:    DD6B55
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false},
									   function(isConfirm){   
								          if(isConfirm) window.location = "index.php?bq=subcategorias";  
                                        }
                                     ); 
                            </script>';
					 	}else{
					 		 echo ' <script> 
					 			swal({
                                     title: "Error !",
									  text: "Hay un al guardar los datos",
									  type: "warning", 
									  confirmButtonColor: "#DD6B55",    ///V:    1ab394      ///R:    DD6B55
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
                            		}); 
                            </script>';
			}


		}
		
	}



	static public function DeleteSubCategoriasController(){
		if(!empty($_GET["idBorrar"])){
			$id = DeCryptFinal($_GET["idBorrar"]);
		    productosModel::DeleteSubCategoriasModel($id);
		    bitacoraController::Registro("Borro subcategoria ".$_GET["titulo"]);
		}
	}

	static public function PublicarSubCategoriasController(){
		if(!empty($_GET["publish"]) && !empty($_GET["nombre"]) ){
			if(isset($_GET["sts"])){
				productosModel::PublicarSubCategoriasModel($_GET["publish"], $_GET["sts"]);
			    if($_GET["sts"]==1)bitacoraController::Registro("Publicó subcategoria ".$_GET["nombre"]); else bitacoraController::Registro("Suspendio subcategoria ".$_GET["nombre"]);
			     
			}
	   }
	}

	
	static public function UpdateSubCategoriasController(){
		 if(!empty($_POST["categoria"])  && !empty($_GET["id"]) ){
		 	$id = DeCryptFinal($_GET["id"]);

			if(!empty($_POST["categoria"]))$categoria = $_POST["categoria"]; else $categoria = null;
			if(!empty($_POST["subcategoria"]))$subcategoria = $_POST["subcategoria"]; else $subcategoria = null;
			if(!empty($_POST["descripcion"]))$descripcion = $_POST["descripcion"]; else $descripcion = null; 
			if(!empty($_POST["url"]))$url = $_POST["url"]; else $url = null; 
			if(!empty($_POST["oferta"]))$oferta = $_POST["oferta"]; else $oferta = null; 
			if(!empty($_POST["tags"]))$tags = $_POST["tags"]; else $tags = null; 

			$datos = array("id"=>$id,"tags"=>$tags, "subcategoria"=>$subcategoria, "categoria"=>$categoria,"descripcion"=>$descripcion,"url"=>$url, "oferta"=>$oferta   );
			

			if(!empty($_FILES["imagen"]["tmp_name"])){
								$myAncho = 100;
								$myAlto = 100;

								$imagen = $_FILES["imagen"]["tmp_name"];


								$file = "subcategory_".mt_rand(10,500000).".jpg";
								$ruta = "views/images/articulos/".$file;

								$origen = imagecreatefromjpeg($imagen);
								imagejpeg($origen,  $ruta); 
								if(!empty($ruta))$imagen = $ruta; else $imagen = null;
								$datos["imagen"] = $imagen; 

			}

			$resp = productosModel::UpdateSubCategoriasModel($datos);
			bitacoraController::Registro("Edito subcategoria ".$_POST["subcategoria"]);


			if($resp=="success"){
					 		echo '<script> swal({
                                     title: "Guardado ",
									  text: "Se han guardado los datos '.$subcategoria.'.",
									  type: "success", 
									  confirmButtonColor: "#1ab394",    ///V:    1ab394      ///R:    DD6B55
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false},
									   /*function(isConfirm){   
								          if(isConfirm) window.location = "index.php?bq=subcategorias";  
                                        }*/
                                     ); 
                            </script>';
					 	}else{
					 		 echo ' <script> 
					 			swal({
                                     title: "Error !",
									  text: "Hay un al guardar los datos",
									  type: "warning", 
									  confirmButtonColor: "#DD6B55",    ///V:    1ab394      ///R:    DD6B55
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
                            		}); 
                            </script>';
			}



		}
	}

	static public function GetSubCategoriasController(){
		if(!empty($_GET["id"])){
			$id = DeCryptFinal($_GET["id"]);
			return productosModel::GetSubCategoriasModel($id);
		}

	}


	static public function ListaCategoriasController($id=null){
        
        $datosUser = productosModel::ListaCategoriasModel(); 
		$back =  '
		 	 <select class="form-control m-b selCatSubCat"  name="categoria" id="categoria" >
		 	      <option value="">-Seleccionar Categoría-</option>';
		  		foreach ($datosUser as $key => $item) {
		  			if($id==$item["id"]) $select = "Selected"; else $select = "";
		  			if($item["categoria"]!="")$back .=  '<option value="'.utf8_decode($item["id"]).'" '.$select.'>'.$item["categoria"].'</option>';
		  		} 
        $back .=  '</select>';
        return $back;
	}

	static public function ListaSubCategoriasController($cat=null, $id=null){
        
        $datosUser = productosModel::ListaSubCategoriasModel($cat); 
		$back =  '
		 	 <select class="form-control m-b"  name="subcategoria" id="subcategoria" >
		 	      <option value="">-Seleccionar Subcategoría-</option>';
		  		foreach ($datosUser as $key => $item) {
		  			if($id==$item["id"]) $select = "Selected"; else $select = "";
		  			if($item["subcategoria"]!="")$back .=  '<option value="'.utf8_decode($item["id"]).'" '.$select.'>'.$item["subcategoria"].'</option>';
		  		} 
        $back .=  '</select>';
        return $back;
	}
	



	/*++++++++++++++++++++++++++++++++++++ 
	//  Imagenes productos
	 ++++++++++++++++++++++++++++++++++++*/
	 public function MostrarImg($datos){

		// Obtenemos el ancho y alto del array 
		list($ancho, $alto) = getimagesize($datos["temporal"]);
		$myAncho = 700; 

		$ext = explode(".", $datos["nombre"]);
        $extencion = end($ext); 
		$archivo = "product_".mt_rand(10,50000).".".strtolower($extencion) ;
		$ruta = "../../views/images/productos/".$archivo;

	 	Self::CopiarArchivo($datos["temporal"], $ruta);
		Self::Ajustar($myAncho, $ruta, $ruta);
		bitacoraController::Registro("Agregó Imagen producto ".$archivo);
		$respuesta = productosModel::SubirImagenDB($archivo, $datos["inmueble"]);

		if($respuesta == "success"){
				return $archivo;
			}else{
				return 1;
			}
        
		
	}


/*++++++++++++++++++++++++++++++++++++ 
//  Redimencionar imagen
 ++++++++++++++++++++++++++++++++++++*/
 static public function CopiarArchivo($desde, $destino){
   if (!@copy($desde, $destino)){
            $errors[] = $desde . "no se pudo copiar en "  . $destino;
         }
}
static public function Ajustar($newWidth, $targetFile, $originalFile) {

    $info = getimagesize($originalFile);
    $mime = $info['mime'];

    switch ($mime) {
            case 'image/jpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;

            case 'image/png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
                    break;

            case 'image/gif':
                    $image_create_func = 'imagecreatefromgif';
                    $image_save_func = 'imagegif';
                    $new_image_ext = 'gif';
                    break;

            default: 
                    throw new Exception('Unknown image type.');
    }

    $img = $image_create_func($originalFile);
    list($width, $height) = getimagesize($originalFile);

    $newHeight = ($height / $width) * $newWidth;
    $tmp = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    if (file_exists($targetFile)) {
            unlink($targetFile);
    }
    $image_save_func($tmp, "$targetFile");
}


 
 




























}