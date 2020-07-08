<?php 


class siteController{


	
	static public function DeleteSiteSocialMediaController(){
		if(   !empty($_GET["idBorrar"])  ){ 
				$respuesta = siteModel::DeleteSiteSocialMediuaModel($_GET["idBorrar"]);
				bitacoraController::Registro("Borró red ".$_GET["titulo"]);
  
				header("Location:index.php?bq=setting");
			 

		}
	}



	static public function SocialMediaController(){

		$respuesta = siteModel::SocialMediaModel();

		if(count($respuesta)>0){

			echo  ' <table class="table table-striped   table-hover dataTables-example" >';
			foreach ($respuesta as $row => $item) {

				if(empty($item["image"])){
						$icon = '<div class="btn text-white" style="background-color:'.$item["red"].'"><i class=" fa '.$item["icon"].'"></i></div>';
				 }else{
   						$icon = '<img src="'.$item["image"].'" width="35">';
				 }

				echo '
				 <tr> 
			        <td class="">'.$icon .'</td>
			        <td><small class="text-gray">'.substr($item["url"],0,40).'...</small></td> 
			        
			        </td>
			        <td><a href="javascript:EliminarRed(\''.$item["id"].'\', \''.$item["icon"].'\');"><span class=" fa fa-times text-danger"></span></a></td>
			      </tr>
			      '; 
			}
			echo '</table>';
		}else{
			echo '<div class="alert alert-warning">No existen registros.</div>';
		}

	}



	static public function AdminSeccionController($dat){
		$datos = siteModel::AdminSeccionModel($dat);
		//echo $datos["valor"];
		if($datos["valor"]=="Activo")return true; else return false;
	}


	static public function UpdateSiteController(){
		if(!empty($_POST["datos"]) ){
			 for ($i=1; $i < 50; $i++) { 
				# code...
				if(isset($_POST["item".$i.""])){ 

						$datos = array("id"=>$i, "valor"=>$_POST["item".$i.""]);
				  		siteModel::UpdatesiteModel($datos);					 
				}
			} 

			echo '<script> swal({
                                     title: "Guardado ",
									  text: "Se han guardado las configuraciones.",
									  type: "success", 
									  confirmButtonColor: "#1ab394",    ///V:    1ab394      ///R:    DD6B55
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false},
									   function(isConfirm){   
								          if(isConfirm) window.location = "index.php?bq=setting";  
                                        }
                                     ); 
              </script>';
			bitacoraController::Registro("Modificó información del sitio web ");  	
		}  

	}

	static public function UpdateSiteSocialMediaController(){
		if( !empty($_POST["url"]) && !empty($_POST["red"])){

			$red = explode(",", $_POST["red"]);
			$logo = $red[0];
			$image = null;


			if(!empty($_FILES["logoRed"]["name"]) ){

					$ext = explode(".", $_FILES["logoRed"]["name"]);
			        $extencion = end($ext); 
					$archivo = "redes_".mt_rand(10,50000).".".strtolower($extencion) ;
					$ruta = "views/images/articulos/".$archivo;
					copy($_FILES["logoRed"]["tmp_name"], $ruta);
					$image =$ruta; 

			} 



			siteModel::UpdateRedesModel($red[1], $_POST["url"], $logo , $image);	
			bitacoraController::Registro("Agregó - ".$_POST["red"]);  

            header("Location:index.php?bq=setting");


		}
	}

	static public function URLController(){
		$respuesta = siteModel::URLModel(); 
		echo $respuesta["valor"];
	}

	static public function SiteNameController(){
		$respuesta = siteModel::SiteNameModel(); 
		echo $respuesta["valor"];
	}

	static public function URLReturnController(){
		$respuesta = siteModel::URLModel(); 
		return $respuesta["valor"];
	}

	static public function SiteNameReturnController(){
		$respuesta = siteModel::SiteNameModel(); 
		return $respuesta["valor"];
	}


	static public function InfoSiteController(){
		$respuesta = siteModel::InfositeModel(); 

		foreach ($respuesta as $row => $item) {

			$posicion_coincidencia = strpos($item["place"], "--");
			if($posicion_coincidencia === false){

					if($item["sector"]<> 'Friendly' && $item["sector"]<> 'Inmobiliaria' && $item["sector"]<> 'Tienda' && $item["sector"]<> 'Chat' && $item["sector"]<> 'Chat Whatsapp'){
						echo '
						<div class="form-group"><label class="col-sm-3 control-label">'.$item["sector"].'</label>
		                                    <div class="col-sm-8">
							                  <input  name="item'.$item["id"].'" value="'.$item["valor"].'" id="'.$item["sector"].'" type="text" placeholder="'.$item["place"].'" class="form-control"  >
							                  </div>
		                  </div> <!--  item -->';
		                }
		             if($item["sector"]== 'Friendly' || $item["sector"]== 'Inmobiliaria' || $item["sector"]== 'Tienda' || $item["sector"]== 'Chat'  || $item["sector"]== 'Chat Whatsapp'){

		             	if($item["valor"]=="Activo")$sel = 'Selected'; else $sel =null;
		             	if($item["valor"]=="Inactivo")$sel2 = 'Selected'; else $sel2 =null;
		             	echo '
						<div class="form-group"><label class="col-sm-3 control-label">'.$item["sector"].'</label>
		                                    <div class="col-sm-4">
		                                      <select  class="form-control" name="item'.$item["id"].'"   id="'.$item["sector"].'" >
		                                      	<option value="Activo" '.$sel.'>Activo</option>
		                                      	<option value="Inactivo" '.$sel2.' >Inactivo</option>
		                                      </select> 
							                </div>
		                  </div> <!--  item -->';
		             }


			}else{
				echo '
				<div class="form-group"><label class="col-sm-3 control-label">'.$item["sector"].'</label>
                                    <div class="col-sm-8">
                                    <textarea  name="item'.$item["id"].'" id="'.$item["sector"].'" cols="30" rows="3" placeholder="'.$item["place"].'" class="form-control" style="margin-bottom: 10px;"  aaarequired="" >'.$item["valor"].'</textarea>
                                    </div>
                  </div> <!--  item -->';

			}

			 


		}

	}



	static public function UploadLogoController($datos){


		list($ancho, $alto) = getimagesize($datos["imagen"]);

		$myAncho = 310;
		$myAlto = 80;


        $nombre = "logo_".mt_rand(10,50000).".".$datos["extencion"];
        $ruta = "../../views/img/".$nombre;
        if( copy($datos["imagen"], $ruta) ) {

		$oldFile = "../../views/img/".$datos["vieja"];
		if(file_exists($oldFile ))unlink($oldFile);

		$respuesta = siteModel::UploadLogoModel($nombre);
		

		if($respuesta == "success"){
				return $ruta;
			}else{
				return 1;
			}

	}


	}

	static public function LogoController(){

		$respuesta = siteModel::LogoModel();
		echo '<img src="views/img/'.$respuesta["valor"].'" class="img-responsive" alt="Image" width="110" style="display:inline"> ';;

	}

	static public function LogoReturnController(){

		$respuesta = siteModel::LogoModel();
		return '<img src="views/img/'.$respuesta["valor"].'" class="img-responsive" alt="Image" width="110" style="display:inline"> ';;

	}


	static public function LogoFileNow(){
		$respuesta = siteModel::LogoModel();
		echo '<input type="hidden" name="antiguo"   id="antiguo"  value="'.$respuesta["valor"].'">';
		
	}

	static public function DatosSitioApp($datos){ 
		
		 if(!empty($datos)){
		 	$respuesta = siteModel::DatosSitioAppModel($datos); 
		 	return $respuesta["valor"];
		 }

	}

	static public function URL(){
		$respuesta = siteModel::URLModel(); 
		return $respuesta["valor"];
	}









}









