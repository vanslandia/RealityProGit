<?php 


class articuloController{

	static public function DatosArticuloIdController(){
		if(!empty($_GET["id"])){

			$id = DeCryptFinal($_GET["id"]);
			$respuesta = articuloModel::DatosArticuloIdModel($id);
			//var_dump($respuesta);
			return $respuesta;
		}
	}

	static public function SubirImgArtController($datos){ 

		$myAncho = 400; 

		$ext = explode(".", $datos["imagen"]);
        $extencion = end($ext); 
		$archivo = "article_".mt_rand(10,50000).".".strtolower($extencion) ;
		$ruta = "../images/articulos/tmp/".$archivo;

	 	Self::CopiarArchivo($datos["temporal"], $ruta);
		//Self::Ajustar($myAncho, $ruta, $ruta);
 
		return $archivo;
		

	}

	static public function EditarArticulosController(){

		if(isset($_POST["idEdit"])){

			if($_POST["idEdit"]!=""){ 
 
				if(!empty($_POST["oldImg"]))$file = $_POST["oldImg"]; else $file = null;
				$url="";

				if(!empty($_FILES["imagen"]["tmp_name"])){  
					$borrar = glob("views/images/articulos/tmp/*");
					foreach ($borrar as $files) {
						unlink($files);
					} 
					$myAncho = 400; 
					$ext = explode(".", $_FILES["imagen"]["name"]);
			        $extencion = end($ext); 
					$archivo = "article_".mt_rand(10,50000).".".strtolower($extencion) ;
					$ruta = "views/images/articulos/".$archivo;

				 	Self::CopiarArchivo($_FILES["imagen"]["tmp_name"], $ruta);
					//ArticulosController::Ajustar($myAncho, $ruta, $ruta);
					$file=$archivo;
					if(file_exists("views/images/articulos/".$_POST["oldImg"]))unlink("views/images/articulos/".$_POST["oldImg"]);

				}


				    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
					 #  Imagenes summenote
					 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
					$vaciar = glob('views/images/tmp/*');
					foreach ($vaciar as $file) {
							copy($file, 'views/images/archivos'.str_replace('views/images/tmp', '', $file));
							unlink($file);
					}

				

				if(!empty($_POST["idEdit"]))$idEdit = $_POST["idEdit"]; else $idEdit = null;
				if(!empty($_POST["tituloNew"]))$titulo = $_POST["tituloNew"]; else $titulo = null;
				if(!empty($_POST["intro"]))$intro = $_POST["intro"]; else $intro = null;
				if(!empty($_POST["descripcion"]))$descripEdit = str_replace('views/images/tmp','views/images/archivos', $_POST["descripcion"] ) ; else $descripEdit = null;
				if(!empty($_POST["video"]))$video = $_POST["video"]; else $video = null;

				if($titulo!=""){
					require_once "class.url.php";
					$stri = new URLs();
					$url = $stri->makeLink( $titulo  );
				}


				

				$datos = array(
								"id"=>$idEdit,
								"titulo"=>$titulo,
								"url"=>$url,
								"intro"=>$intro,
								"descripcion"=>$descripEdit,
								"video"=>$video,
								"file"=>$file
							); 

				$respuesta = articuloModel::EditararticuloModel($datos);
				bitacoraController::Registro("Edito Blog ".$_POST["tituloNew"]);

				if($respuesta =="success"){
					echo '
					<script>
					swal({
    			  			title:"Listo",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
    			  			text:"Los cambios se han guardado.",
    			  			alert:"success",
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			} 
    			  		);
					</script>';
				}


		   }
		} 


	}




	static public function GuardarArticulosController(){

		if(isset($_POST["tituloNew"])){

			if($_POST["tituloNew"]!=""){
				$archivo="";


				$borrar = glob("views/images/articulos/tmp/*");

				foreach ($borrar as $files) {
					unlink($files);
				}


				/*
				$file = "article_".mt_rand(10,50000).".jpg";
				$ruta = "views/images/articulos/".$file;
				$origen = imagecreatefromjpeg($imagen);
				$destino = imagecrop($origen, array("x"=>0, "y"=>0, "width"=>$myAncho, "height"=>$myAlto)); 
				imagejpeg($destino, $ruta);
				imagedestroy($destino);
				*/
				if(!empty($_FILES["imagen"]["tmp_name"])){
			    	$myAncho = 400; 
					$ext = explode(".", $_FILES["imagen"]["name"]);
			        $extencion = end($ext); 
					$archivo = "article_".mt_rand(10,50000).".".strtolower($extencion) ;
					$ruta = "views/images/articulos/".$archivo;

				 	Self::CopiarArchivo($_FILES["imagen"]["tmp_name"], $ruta);
					Self::Ajustar($myAncho, $ruta, $ruta);
				}



				 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				 #  Imagenes summenote
				 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				$vaciar = glob('views/images/tmp/*');
				foreach ($vaciar as $file) {
						copy($file, 'views/images/archivos'.str_replace('views/images/tmp', '', $file));
						unlink($file);
				}



				if(!empty($_POST["tituloNew"]))$tituloNew = $_POST["tituloNew"];else $tituloNew = null;
				if(!empty($_POST["intro"]))$intro = $_POST["intro"];else $intro = null;
				if(!empty($_POST["descripcion"]))$descripcion = str_replace('views/images/tmp','views/images/archivos', $_POST["descripcion"] ) ; else $descripcion = null;
				if(!empty($_POST["video"]))$video = $_POST["video"];else $video = null;
				if(!empty($_POST["url"]))$url = $_POST["url"];else $url = null;


				$datos = array(
								"titulo"=>$tituloNew,
								"intro"=>$intro,
								"descripcion"=>$_POST["descripcion"],
								"video"=>$video,
								"url"=>$url,
								"imagen"=>$archivo
							);

				$respuesta = articuloModel::GuardararticuloModel($datos);
				bitacoraController::Registro("Agrego Blog ".$_POST["tituloNew"]);

				
				if($respuesta=="success"){
					echo '
					<script>
					swal({
    			  			title:"Listo",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
    			  			text:"El articulo se ha guardado.",
    			  			alert:"success",
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			},function(isConfirm){
    			  				if(isConfirm) window.location = "index.php?bq=blog";
    			  			}
    			  		);
					</script>';
				}



			}
		}

	}

	static public function PublicarArticulosController(){

		if(!empty($_GET["publish"]) && !empty($_GET["nombre"]) ){
			if(isset($_GET["sts"])){
				articuloModel::PublicarArticulosModel($_GET["publish"], $_GET["sts"]);
			    if($_GET["sts"]==1)bitacoraController::Registro("Publicó Blog ".$_GET["nombre"]); else bitacoraController::Registro("Suspendio Blog ".$_GET["nombre"]);
			     
			}
	   }

	}



	static public function ListaArticulosController(){

		if(empty($_POST["suceso"]))  $respuesta = articuloModel::ListarticuloModel();
		if(!empty($_POST["suceso"]))  $respuesta = articuloModel::ListBuscararticuloModel($_POST["suceso"]);
 

		if(count($respuesta)>0){


				foreach ($respuesta as $row => $item) {

					$thumb="";
					$portadaImg='<img src="views/images/pattern.jpg"   style="width:5%" >';

					if($item["publish"]==1){
						$sts = 0;
					}else{
						$sts = 1;
				    }

				    $thumImg = articuloModel::ListaEditGaleriaModel($item["id"]);

				    if( count($thumImg )>0 ){

				    	foreach ($thumImg as $key => $value) {
				    		$archivo = 'views/images/articulos/'.$value["imagen"];
				    		if(file_exists($archivo) && $value["imagen"]!="")$thumb .='<img src="'.$archivo.'" style="width:50px; margin:5px; " >';
				    	}

				    }

				    $portada = 'views/images/articulos/'.$item["imagen"];
				    if(file_exists($portada) && $item["imagen"]!="")$portadaImg ='<img src="'.$portada.'" class="img-thumbnail" >';


				     $site = SiteController::URL();
 					

					 echo '
					 <div class="col-lg-12" id="'.$item["id"].'">
					 
					
					<div class="row">
						<div class="col-md-9   ">
							<a href="index.php?bq=blog-img&id='.PasarNumero($item["id"]).'">
							<div type="button" class="btn btn-default btn-xs pull-left text-navy ">Galería imagenes</div>
							</a>
						</div>					
						<div class="col-md-1  pull-right ">
							<a href="javascript:BorrarBlog('.$item["id"].', \''.$item["imagen"].'\', \''.$item["titulo"].'\');"><h2 class="text-danger"><i class=" fa fa-times"></i></h2></a>
						</div>
						<div class="col-md-1  pull-right">
							<a href="javascript:PublicarBlog('.$item["id"].', \''.$item["titulo"].'\', '.$sts.');"><h2 class="text-info"><i class=" fa fa-bullhorn "></i></h2></a>
						</div>
						<div class="col-md-1   pull-right">				
							<h2 class="text-navy " data="'.$item["id"].'" style="cursor:pointer">
						    <a href="index.php?bq=blog-dat&id='.PasarNumero($item["id"]).'"><i class="fa fa-pencil text-navy"></i></a></h2>
						</div>
					</div> 

					<div class="row">
					<div class="col-md-3"> '.$portadaImg.'
					</div>
						<div class="col-md-9">  						
							<h1>'.$item["titulo"].' </h1><small><small class="text-navy">'.$site."/".$item["url"].'</small></small>'.Publish($item["publish"],"small", "pull-right").'
							<p>'.$item["intro"].'</p>
							<i class="hide" style="font-size:.9em; color:#999;" >'.$item["descripcion"].'</i>
							<div class="row thumbailDetail">
							'.$thumb.'
							</div>
							<div  class="text-navy" id="videoBlog">'.$item["video"].'</div>
							
						</div>
					</div>
						<hr>
					</div>
					';
				}
			}else{
				echo '<div class="alert alert-warning">No hay registros</div>';
			}

	}
	static public function BorrarArticulosController(){
		if(isset($_GET["idBorrar"])){

			if($_GET["idBorrar"]!=""){

				$datos = array("id"=>$_GET["idBorrar"], "file"=>$_GET["file"]);
				$respuesta = articuloModel::BorrararticuloModel($datos); 
				bitacoraController::Registro("Eliminó Blog ".$_GET["titulo"]);

				$archivo = "../views/images/articulos/".$_GET["file"];
				if(file_exists($archivo )) unlink($archivo );

				if($respuesta =="success"){
					echo '
					<script>
					swal({
    			  			title:"Borrado",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
    			  			text:"El articulo se ha borrado.",
    			  			alert:"success",
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			},function(isConfirm){
    			  				if(isConfirm) window.location = "index.php?bq=blog";
    			  			}
    			  		);
					</script>';
				}



			}
		}
	}



	static public function ListaGaleriaControllers(){

		if(!empty($_GET["id"])){

				$id = DeCryptFinal($_GET["id"]);
				$respuesta = articuloModel::ListaGaleriaModel($id);

				foreach ($respuesta as $row => $item) {
					 echo '
					 <li id="'.$item["imagen"].'" class="bloqueSlide">
						<span class="fa fa-times elimGaleriaArtImg"></span>
						<img src="views/images/articulos/'.$item["imagen"].'" class="handleImg">			
					</li>
					 ';
				} 
		}
	}


	static public function ListaEditGaleriaControllers(){

		if(!empty($_GET["id"])){

				$id = DeCryptFinal($_GET["id"]);

					$respuesta = articuloModel::ListaEditGaleriaModel($id);

					foreach ($respuesta as $row => $item) {
						 echo '
						 <li id="edit'.str_replace(".jpg", "", $item["imagen"]).'" >
							<span class="fa fa-pencil editGalArt " style="background:#1ab394"></span>
							<img src="views/images/articulos/'.$item["imagen"].'" style="float:left; margin-bottom:10px" width="80%">
							<h1>'.$item["titulo"].'</h1>
							<p>'.$item["descripcion"].'</p>
						</li>
						 ';
					} 
		}

	}


static public function MostrarImg($datos){
 

      /*
		list($ancho, $alto) = getimagesize($datos["tmporal"]);

		$myAncho = 500;
		$myAlto = 500;
		
		if($ancho < $myAncho || $alto < $myAlto){
			return 0;
		}else{
			$ruta = "blog_".mt_rand(10,500000000).".jpg";

			$origen = imagecreatefromjpeg($datos["tmporal"]);

			$destino = imagecrop($origen, array("x"=>0, "y"=>0, "width"=>$myAncho, "height"=>$myAlto));
 
			imagejpeg($destino,  "../../views/images/articulos/".$ruta);
			imagedestroy($destino); 

			$respuesta = articuloModel::SubirImagenDB($ruta, $datos["articulo"]);
			

			if($respuesta == "success"){
				return $ruta;
			}else{
				return 1;
			}
			 
 
		} 
		*/

		$myAncho = 500; 

		$ext = explode(".", $datos["nombre"]);
        $extencion = end($ext); 
		$archivo = "blog_".mt_rand(10,50000).".".strtolower($extencion) ;
		$ruta = "../../views/images/articulos/".$archivo;

	 	Self::CopiarArchivo($datos["tmporal"], $ruta);
		Self::Ajustar($myAncho, $ruta, $ruta);

		$respuesta = articuloModel::SubirImagenDB($archivo, $datos["articulo"]);
			

			if($respuesta == "success"){
				return $archivo;
			}else{
				return 1;
			} 

	}





	static public function EditGaleriaController($datos){

		articuloModel::EditGaleriaModel($datos);
		$respuesta = articuloModel::ReviewGaleriaDataModel($datos);
		bitacoraController::Registro("Edito Slider ".$respuesta["titulo"]);

		$enviar = array("titulo"=>$respuesta["titulo"],"descripcion"=>$respuesta["descripcion"]);

		echo  json_encode($enviar);
	}


	static public function EliminarImgArtController($valor){

			$file = "../../views/images/articulos/".$valor;
			if(file_exists($file)) unlink($file);
				$respuesta = articuloModel::EliminarImgArtModel($valor);
				bitacoraController::Registro("Elimino Slider ".$valor);
				return $respuesta;
		 
			 

	}



	static public function OrdenImgArtController($datos){
		 articuloModel::OrdenImgArtModel($datos);
		 
	}

	static public function resize($newWidth, $targetFile, $originalFile) {

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
    $image_save_func($tmp, "$targetFile.$new_image_ext");
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