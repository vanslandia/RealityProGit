<?php

class ModulosModel{

	static public function LoadModulosModel($enlaces){ 
		$seccion="ingreso"; 

		if(!empty($_SESSION["LoginAcceso"]) && !empty($enlaces) ){  
			if(file_exists("views/modules/$enlaces.php"))$seccion = $enlaces; else $seccion="error"; 
		}  

		if($seccion == 'ingreso' && !empty($_SESSION["Id_user_personal"]) ){					 
			session_unset();
			session_destroy(); 
			header("Location: index.php");
		}
				 
		if($seccion == "salir"){
			if( !empty($_SESSION["LoginAcceso"]) ){ 
					session_unset();
					session_destroy();
			}
			$seccion = "ingreso";
		} 
		return "views/modules/$seccion.php"; 
	} 

}