<?php 



class UsuariosController{


	static public function ListUserController(){
		$respuesta = usuariosModel::ListUserModel();

		if(count($respuesta)>0){

			foreach ($respuesta as $row => $item) {
				echo '
				 <tr>
			        <td><div class="text-gray f8">'.PresentarFecha($item["fecha"]).'</div></td>
			        <td><div class="bold">'.$item["nombre"].'</div></td>
			        <td class="text-warning">'.$item["nivel"].'</td>
			        <td><small>'.$item["email"].'</small></td>
			        <td><div class="text-gray">'. DecriptacionVar($item["password"],Keyboard).'</div></td>
			        <td>
			        <a href="index.php?bq=usuarios-dat&id='.PasarNumero($item["id"]).'">
			        <span id="'.$item["id"].'" class="fa fa-pencil editarusuario text-navy"  ></span>
			        </a>
			        
			        </td>
			        <td><a href="javascript:EliminarUser(\''.PasarNumero($item["id"]).'\', \''.$item["nombre"].'\');"><span class=" fa fa-times eliminarUsuario text-danger"></span></a></td>
			      </tr>
			      '; 
			}
		}else{
			echo '<div class="alert alert-warning">No existen registros.</div>';
		}
	}


	static public function GuardarUsuarioController(){

		if(isset($_POST["email"])){

			if($_POST["email"]!=""  ){

				$datos = array(
							"nombre"=>$_POST["nombre"],
							"nivel"=>$_POST["nivel"],
							"email"=>$_POST["email"],
							"password"=>EncriptacionVar($_POST["password"],Keyboard)
							);

				/*++++++++++++++++++++++++++++++++++++ 
				//  Notifiacion usuario
				 ++++++++++++++++++++++++++++++++++++*/
				  require("views/email/class.phpmailer.php");
				  require("views/email/class.smtp.php");
				  
				  
				  $logo = SiteController::LogoReturnController();
				  $path = SiteController::URLReturnController();
				  $site = SiteController::SiteNameReturnController();


				  $message ='
				  '.$logo.'
				  <br>
				  Estimado '.$_POST["nombre"].', se le ha asignado un usuario de administraci&oacute;n, '.$site.':<br><br>

				  U: '.$_POST["email"].'<br>
				  P: '.$_POST["password"].'
				  <br><br>
				  '.$path.'
				  ';

				  $mail = new PHPMailer(); 
				  $mail->IsSMTP();
				  $mail->SMTPAuth = emailAtuh; 
				  $mail->SMTPSecure = emailSecure;
				  $mail->Host = emailHost;
				  $mail->Port = emailPort;
				  $mail->Username = emailUser; 
				  $mail->Password = emailPass; 
				  $mail->From = emailUser; 
				  $mail->FromName = "RealityPro"; 
				  $mail->Subject = "Asignacion de usuario"; 
				  $mail->AddAddress($_POST["email"]); 
				  $mail->AddBCC('ivannss@msn.com'); 
				  $mail->Body = $message; 
				  $mail->MsgHTML($message);  
				  if(!$mail->Send()) echo $mail->ErrorInfo;

				
				$respuesta= usuariosModel::GuardarUsuarioModel($datos);
				bitacoraController::Registro("Agrego usuario ".$_POST["nombre"]);

				if($respuesta=="success"){
					 echo ' <script>  window.location = "index.php?bq=usuarios"; </script>';
				}
				


			}

		}

	}

	static public function DeleteUsuarioController(){
		if(isset($_GET["idBorrar"])){

			if($_GET["idBorrar"]!=""){
 
				$id = DeCryptFinal($_GET["idBorrar"]);
				$respuesta = usuariosModel::DeleteUsuarioModel($id);
				bitacoraController::Registro("Borró usuario ".$_GET["nombre"]);
 
				if($respuesta =="success"){
					echo ' <script>   window.location = "index.php?bq='.$_GET["bq"].'";  </script>';
				}



			}
		}
	}

	static public function UsuarioIdController($id=NULL){

		if(!empty($_GET["id"])){

			    $id = DeCryptFinal($_GET["id"]);
				$respuesta = usuariosModel::UsuarioIdModel($id);
				return $respuesta;
	    }

	    if(!empty($id)){
 
				$respuesta = usuariosModel::UsuarioIdModel($id);
				return $respuesta;
	    }

	}

	static public function UpdateUsuarioController(){
		if(isset($_POST["idEdit"])){

			if($_POST["idEdit"]!=""){


				$id = DeCryptFinal($_POST["idEdit"]);

				$datos = array(
							"nombre"=>$_POST["nombre"],
							"nivel"=>$_POST["nivel"],
							"email"=>$_POST["email"],
							"password"=>EncriptacionVar($_POST["password"],Keyboard),
							"id"=>$id
							);

				if( !empty($_FILES["filearchvo"]["name"]) ){ 
					$file = "views/images/slide/user_".$_SESSION["Id"].".jpg";
					if(file_exists($file))unlink($file);
				    move_uploaded_file($_FILES['filearchvo']['tmp_name'],  $file);
				    $_SESSION["Thumbail"] = "views/images/slide/user_".$_SESSION["Id"].".jpg";

				}

				$respuesta= usuariosModel::UpdateUsuarioModel($datos);
				bitacoraController::Registro("Actualizó usuario ".$_POST["nombre"]);

				if($respuesta=="success"){
					echo '
					<script>
					swal({
    			  			title:"Listo",
    			  			
    			  			text:"Los cambios se han guardado.",
    			  			alert:"success",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
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


	static public function UpdateMyDataUsuarioController(){
		if(   !empty( $_POST["nombreUsuario"] )  ){ 
 

				$datos = array(
							"nombre"=>$_POST["nombreUsuario"],
							"id"=>$_SESSION["Id"]
							);

				if(!empty($_POST["password"]))$datos["password"]=EncriptacionVar($_POST["password"],Keyboard);

				if( !empty($_FILES["thumbailUser"]["name"]) ){ 
					$file = "views/images/slide/user_".$_SESSION["Id"].".jpg";
					if(file_exists($file))unlink($file);
				    move_uploaded_file($_FILES['thumbailUser']['tmp_name'],  $file);
				    $_SESSION["Thumbail"] = "views/images/slide/user_".$_SESSION["Id"].".jpg"; 

				}

				$respuesta= usuariosModel::UpdateMyDataUsuarioController($datos);
				bitacoraController::Registro("Actualizó sus datos ".$_POST["nombreUsuario"]);

				if($respuesta=="success"){

					$_SESSION["Usuario"] = $_POST["nombreUsuario"];

					echo '
					<script>
					swal({
    			  			title:"Listo",
    			  			type: "success",  
    			  			text:"Los cambios se han guardado.",
    			  			alert:"success",
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",      //  Green : 1ab394    Red : DD6B55   
    			  			closeOnConfirm:false
    			  			}
    			  		);
					</script>';
				}

			}
	}







}








