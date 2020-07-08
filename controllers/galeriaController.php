<?php 

class galeriaController{


	static public function SubirArchivosSilder(){
		if(!empty($_FILES["archivoFile"]["name"])){

			$ruta = "slider_".mt_rand(10,50000).".jpg";
			copy($_FILES["archivoFile"]["tmp_name"], "views/images/galeria/".$ruta);
			$respuesta = galeriaModel::SubirImagenGalDB($ruta);	
			bitacoraController::Registro("Agregó Galeria ".$ruta);

			 

		}
	}



	static public function MostrarImgGaleria($datos){

	 
		$myAncho = 600; 

		$ext = explode(".", $datos["nombre"]);
        $extencion = end($ext); 
		$archivo = "galeria_".mt_rand(10,50000).".".strtolower($extencion) ;
		$ruta = "../../views/images/galeria/".$archivo;

	 	galeriaController::CopiarArchivo($datos["temporal"], $ruta);
		galeriaController::Ajustar($myAncho, $ruta, $ruta);
		bitacoraController::Registro("Agregó Galeria ".$archivo);
		$respuesta = galeriaModel::SubirImagenGalDB($archivo);

		if($respuesta == "success"){
				return $archivo;
			}else{
				return 1;
			}

	}


	static public function ListagaleriaController(){

		$respuesta = galeriaModel::ListaImagenDB();

		foreach ($respuesta as $row => $item) {
			 echo '
			 <li id="'.$item["imagen"].'" class="bloqueGaleria ">
			 <span class="fa fa-times elimImg"></span><a rel="grupo" data-gallery="" href="views/images/galeria/'.$item["imagen"].'">
			 <img src="views/images/galeria/'.$item["imagen"].'" class="handleImg" style="margin: 0px;"></a></li>
			 ';
		} 
	}

	static public function ListaGaleriaURLController(){

		$respuesta = galeriaModel::ListaImagenDB();

		$url = SiteController::URLReturnController();


		foreach ($respuesta as $row => $item) {
			 echo '
			 <tr>
				 <td>
				 <img src="views/images/galeria/'.$item["imagen"].'" class="handleImg" style="margin: 0px; width:50px;">
				 </td>
				 <td class="small">'.$url.'/views/images/galeria/'.$item["imagen"].'</td>
			 </tr>
			 ';
		} 
	}

	static public function EliminarImgController($valor){

		$file = "../../views/images/galeria/".$valor;
		if(file_exists($file)) unlink($file);
			$respuesta = galeriaModel::EliminarImgModel($valor);
			bitacoraController::Registro("Eliminó Galeria ".$valor);
			return $respuesta;
		 
		

		 

	}



	static public function OrdenController($datos){
		 galeriaModel::OrdenModel($datos);
		 
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
