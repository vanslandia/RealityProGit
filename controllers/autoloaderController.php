<?php  

class autoloaderController{

	public function __construct(){
		spl_autoload_register(function($classname){
			$controller_path = "./controllers/".$classname.".php";
			$modelo_path = "./models/".$classname.".php";
			if(file_exists($controller_path)) require_once $controller_path;
			if(file_exists($modelo_path)) require_once $modelo_path;
		});
		
	}

	public function __destruct(){ 
		//unset($this); 
	}

}


