<?php 

 

class sliderController{


	static public function SubirArchivosSlideSelect(){
		if(!empty($_FILES["archivoFile"]["name"]) ){
 

			$ext = Extencion($_FILES["archivoFile"]["name"]);
			$ruta = "slider_".mt_rand(10,50000).".".$ext;
			copy($_FILES["archivoFile"]["tmp_name"], "views/images/slide/".$ruta);


			$respuesta = sliderModel::SubirImagenDB($ruta );	
			bitacoraController::Registro("Agregó Slider ".$ruta);

			echo '<script> swal({
                                     title: "Guardado ",
									  text: "Se han guardado el archivo.",
									  type: "success", 
									  confirmButtonColor: "#1ab394",    ///V:    1ab394      ///R:    DD6B55
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false},
									   function(isConfirm){   
								          if(isConfirm) window.location = "index.php?bq=slide";  
                                        }
                                     ); 
                            </script>';


		}
	}




	static public function MostrarImg($datos){
 
 		$myAncho = 700; 

		$ext = explode(".", $datos["nombre"]);
        $extencion = end($ext); 
		$archivo = "slider_".mt_rand(10,50000).".".strtolower($extencion) ;
		$ruta = "../../views/images/slide/".$archivo;

		Self::CopiarArchivo($datos["temporal"], $ruta);
		Self::Ajustar($myAncho, $ruta, $ruta);

		$respuesta = sliderModel::SubirImagenDB($archivo);
		if($respuesta == "success"){
				return $archivo;
			}else{
				return 1;
		} 

	}




	static public function ListaSlideControllers(){

		$respuesta = sliderModel::ListaImagenDB();

		foreach ($respuesta as $row => $item) {
			 echo '
			 <li id="'.$item["imagen"].'" class="bloqueSlide">
				<span class="fa fa-times elimSlideImg"></span>
				<img src="views/images/slide/'.$item["imagen"].'" class="handleImg">			
			</li>
			 ';
		} 
	}

	static public function ListaEditSlideControllers(){
		$respuesta = sliderModel::ListaEditImagenDB();

		foreach ($respuesta as $row => $item) {
			 echo '
			 <li id="edit'.str_replace(".jpg", "", $item["imagen"]).'" >
				<span class="fa fa-pencil editSlider " style="background:#1ab394"></span>
				<img src="views/images/slide/'.$item["imagen"].'" style="float:left; margin-bottom:10px" width="80%">
				<h1>'.$item["titulo"].'</h1>
				<p>'.$item["descripcion"].'</p>
			</li>
			 ';
		} 

	}

	static public function EliminarImgController($valor){

		$file = "../../views/images/slide/".$valor;
		if(file_exists($file)) unlink($file); 
		$respuesta = sliderModel::EliminarImgModel($valor);
		return $respuesta;
		bitacoraController::Registro("Elimino Slider ".$valor);

		
		 

	}


	static public function EditSlideController($datos){

		sliderModel::EditSlideModel($datos);
		$respuesta = sliderModel::ReviewSlideDataModel($datos);
		bitacoraController::Registro("Edito Slider ".$respuesta["titulo"]);

		$enviar = array("titulo"=>$respuesta["titulo"],"descripcion"=>$respuesta["descripcion"]);

		echo  json_encode($enviar);
	}



	static public function OrdenSlideController($datos){
		 sliderModel::OrdensliderModel($datos);
		 
	}


	static public function SlidePrevControllers(){

		$respuesta = sliderModel::ListaImagenDB();
		$cont=0;

		foreach ($respuesta as $row => $item) {
			$cont++;
			if($cont==1)$primer = 'active'; else $primer = "";
			 echo '
			                       <div class="item '.$primer.'">
                                        <img alt="image"  class="img-responsive" src="views/images/slide/'.$item["imagen"].'">
                                        <div class="carousel-caption">
                                            <h1>'.$item["titulo"].'</h1>
                                            <p>'.$item["descripcion"].'</p>
                                        </div>
                                    </div>
			 ';
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