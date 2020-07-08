<?php 

require_once "../../controllers/siteController.php";
require_once "../../models/siteModel.php";

class SiteAjax{

	public $temp;
	public $old;
	public $ext;
	public function UploadLogo(){

		$datos = array("imagen"=>$this->temp,"extencion"=>$this->ext, "vieja"=>$this->old); 
		$respuesta = siteController::UploadLogoController($datos);
		echo  $respuesta; 

	}




}



 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 #  Nueva Logotipo
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if(isset($_FILES["logotipo"]["name"])){

	if($_FILES["logotipo"]["name"]!=""){
		
		$img = new SiteAjax(); 
		$img->temp = $_FILES["logotipo"]["tmp_name"];
		$img->old = $_POST["logoactual"];
		$img->ext = $_POST["ext"];
		$img->UploadLogo();
	}

}
