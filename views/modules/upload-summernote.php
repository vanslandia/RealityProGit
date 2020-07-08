<?php 


if( !empty($_FILES["file"]["name"])){
	if(!$_FILES["file"]["error"]){
		$titulo  = mt_rand(10, 5000);

		$extencion = explode('.', $_FILES["file"]["name"]);
		$archivo = $titulo.'.'.$extencion[1];
		$destino = '../images/tmp/'.$archivo;
		$origen = $_FILES["file"]["tmp_name"];

		move_uploaded_file($origen , $destino);

		echo 'views/images/tmp/'.$archivo;

	}else{
		echo $mensaje = 'Existe un error en el archivo:'.$_FILES["file"]["error"];
	}

}else{
	exit();
}