<?php 

class videoController{

	static public function SubirVideoController($datos){

		$name = "video_".mt_rand(100,50000).".mp4";

		$ruta = "../../views/videos/";
 
		move_uploaded_file($datos, $ruta.$name); 

		videoModel::SubirvideoModel($name);

		if(  file_exists($ruta.$name)  ){
			$respuesta = videoModel::MostrarvideoModel($name);
			bitacoraController::Registro("Agregó video ".$name);
			echo  $respuesta["video"];
		}else{
			echo "error".$datos;
		}

	}


	static public function ListaVideoController(){
		$respuesta = videoModel::ListavideoModel();

		foreach ($respuesta as $row => $item) {
			 echo '
			 <li id="'.$item["video"].'"><span class="fa fa-times deleteVideo"></span><video controls><source src="views/videos/'.$item["video"].'" type="video/mp4"></video></li> ';
		} 
	}




	static public function EliminarFileController($valor){
		$file = "../../views/videos/".$valor;
		
		 	unlink($file);
			$respuesta = videoModel::EliminarFileModel($valor);
			bitacoraController::Registro("Eliminó video ".$valor);
			return $respuesta;
		
	}









}