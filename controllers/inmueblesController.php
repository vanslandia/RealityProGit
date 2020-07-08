<?php 


class inmueblesController{

	static public function DatosInmuebleIdController(){
		if(!empty($_GET["id"])){

			$id = DeCryptFinal($_GET["id"]);
			$respuesta = inmueblesModel::DatosInmuebleIdModel($id);
			//var_dump($respuesta);
			return $respuesta;
		}
	}

	static public function SubirImgArtController($datos){ 

		list($ancho, $alto) = getimagesize($datos["temporal"]);

		$myAncho = 500;
		$myAlto = 500;
		
		if($ancho < $myAncho || $alto < $myAlto){
			return 0;
		}else{
			$ruta = "article_".mt_rand(10,50000).".jpg";

			$origen = imagecreatefromjpeg($datos["temporal"]);

			$destino = imagecrop($origen, array("x"=>0, "y"=>0, "width"=>$myAncho, "height"=>$myAlto));
 
			imagejpeg($destino,  "../../views/images/inmuebles/temp/".$ruta);
			imagedestroy($destino); 

			return $ruta; 
 
		} 

	}

	static public function EditarInmueblesController(){

		if(isset($_POST["idEdit"])){

			if($_POST["idEdit"]!=""){

				$file="";
				$id = DeCryptFinal($_GET["id"]);

				if(!empty($_POST["tituloNew"]))$tituloNew = $_POST["tituloNew"]; else $tituloNew = null; 
				if(!empty($_POST["descripcion"]))$descripcion = $_POST["descripcion"]; else $descripcion = null;
				if(!empty($_POST["googlemaps"]))$googlemaps = $_POST["googlemaps"]; else $googlemaps = null;
				if(!empty($_POST["categoria"]))$categoria = $_POST["categoria"]; else $categoria = null;
				if(!empty($_POST["tipo_transaccion"]))$tipo_transaccion = $_POST["tipo_transaccion"]; else $tipo_transaccion = null;
				if(!empty($_POST["precio"]))$precio = $_POST["precio"]; else $precio = null;

				/*++++++++++++++++++++++++++++++++++++ 
				//  Detalles
				 ++++++++++++++++++++++++++++++++++++*/

				 if(!empty($_POST["sup_terreno"]))$sup_terreno = $_POST["sup_terreno"]; else $sup_terreno = null;
				 if(!empty($_POST["sup_contruccion"]))$sup_contruccion = $_POST["sup_contruccion"]; else $sup_contruccion = null;
				 if(!empty($_POST["recamaras"]))$recamaras = $_POST["recamaras"]; else $recamaras = null;
				 if(!empty($_POST["banios"]))$banios = $_POST["banios"]; else $banios = null;
				 if(!empty($_POST["estacioamientos"]))$estacioamientos = $_POST["estacioamientos"]; else $estacioamientos = null;
				 if(!empty($_POST["antiguedad"]))$antiguedad = $_POST["antiguedad"]; else $antiguedad = null;
				 if(!empty($_POST["niveles"]))$niveles = $_POST["niveles"]; else $niveles = null;
				 if(!empty($_POST["mantenimiento"]))$mantenimiento = $_POST["mantenimiento"]; else $mantenimiento = null;
				 if(!empty($_POST["altura"]))$altura = $_POST["altura"]; else $altura = null;
				 if(!empty($_POST["patio_maniobras"]))$patio_maniobras = $_POST["patio_maniobras"]; else $patio_maniobras = null;
				 if(!empty($_POST["subestacion"]))$subestacion = $_POST["subestacion"]; else $subestacion = null;
				 if(!empty($_POST["oficinas"]))$oficinas = $_POST["oficinas"]; else $oficinas = null;
				 if(!empty($_POST["area_rentable"]))$area_rentable = $_POST["area_rentable"]; else $area_rentable = null;
				 if(!empty($_POST["elevadores"]))$elevadores = $_POST["elevadores"]; else $elevadores = null;
				 if(!empty($_POST["uso_suelo"]))$uso_suelo = $_POST["uso_suelo"]; else $uso_suelo = null;
				 if(!empty($_POST["forma"]))$forma = $_POST["forma"]; else $forma = null;
				 if(!empty($_POST["frente"]))$frente = $_POST["frente"]; else $frente = null;
				 if(!empty($_POST["fondo"]))$fondo = $_POST["fondo"]; else $fondo = null;
				 if(!empty($_POST["topografia"]))$topografia = $_POST["topografia"]; else $topografia = null;
				 if(!empty($_POST["llaves"]))$llaves = $_POST["llaves"]; else $llaves = null;
				 if(!empty($_POST["frente_playa"]))$frente_playa = $_POST["frente_playa"]; else $frente_playa = null;

				$datos = array(
								"id"=>$id,
								"titulo"=>$tituloNew,
								"googlemaps"=>$googlemaps,
								"descripcion"=>$descripcion,
								"tipo_transaccion"=>$tipo_transaccion,
								"precio"=>$precio,
								"categoria"=>$categoria, 
								"sup_terreno"=>$sup_terreno,
								"sup_contruccion"=>$sup_contruccion,
								"recamaras"=>$recamaras,
								"banios"=>$banios,
								"estacioamientos"=>$estacioamientos,
								"antiguedad"=>$antiguedad,
								"niveles"=>$niveles,
								"mantenimiento"=>$mantenimiento,
								"altura"=>$altura,
								"patio_maniobras"=>$patio_maniobras,
								"subestacion"=>$subestacion,
								"oficinas"=>$oficinas,								
								"area_rentable"=>$area_rentable,
								"elevadores"=>$elevadores,
								"uso_suelo"=>$uso_suelo,
								"forma"=>$forma,
								"frente"=>$frente,
								"fondo"=>$fondo,
								"topografia"=>$topografia,
								"llaves"=>$llaves,
								"frente_playa"=>$frente_playa 
							);

				//var_dump($datos);
				//echo count($datos);


				if(!empty($_FILES["imagen"]["tmp_name"])){
					$myAncho = 500;
					$myAlto = 500;

					$imagen = $_FILES["imagen"]["tmp_name"];

					$file = "inmueble_".mt_rand(10,500000).".jpg";
					$datos['file']= $file;
					$ruta = "views/images/inmuebles/".$file;

					if(!empty($_POST["oldImg"])){
						$old = "views/images/inmuebles/".$_POST["oldImg"];
						if(file_exists($old ))unlink ($old );
					}


					$origen = imagecreatefromjpeg($imagen);

					$destino = imagecrop($origen, array("x"=>0, "y"=>0, "width"=>$myAncho, "height"=>$myAlto));
		 
					imagejpeg($destino,  $ruta);
					imagedestroy($destino); 
 
					
				}


				

				$respuesta = inmueblesModel::EditarinmueblesModel($datos);
				bitacoraController::Registro("Edito Inmueble ".$tituloNew);

				if($respuesta =="success"){
					echo '
					<script>
					swal({
    			  			title:"Listo",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
    			  			text:"Los cambios se han guardado.",
    			  			alert:"success",
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




	static public function GuardarInmueblesController(){

		if(isset($_POST["tituloNew"])){

			if($_POST["tituloNew"]!=""){

				 

				$myAncho = 500;
				$myAlto = 500;

				if(!empty($_FILES["imagen"]["tmp_name"])){
					$imagen = $_FILES["imagen"]["tmp_name"];

					$borrar = glob("views/images/inmuebles/temp/*");

					foreach ($borrar as $files) {
						unlink($files);
					}

					$file = "inmueble_".mt_rand(10,50000).".jpg";

					$ruta = "views/images/inmuebles/".$file;

					$origen = imagecreatefromjpeg($imagen);

					$destino = imagecrop($origen, array("x"=>0, "y"=>0, "width"=>$myAncho, "height"=>$myAlto));
	 
					imagejpeg($destino, $ruta);
					imagedestroy($destino);
				}else{
					$file = null;
				}

				if(!empty($_POST["tituloNew"]))$tituloNew = $_POST["tituloNew"]; else $tituloNew = null; 
				if(!empty($_POST["descripcion"]))$descripcion = $_POST["descripcion"]; else $descripcion = null;
				if(!empty($_POST["googlemaps"]))$googlemaps = $_POST["googlemaps"]; else $googlemaps = null;
				if(!empty($_POST["tipo_inmueble"]))$tipo_inmueble = $_POST["tipo_inmueble"]; else $tipo_inmueble = null;
				if(!empty($_POST["tipo_transaccion"]))$tipo_transaccion = $_POST["tipo_transaccion"]; else $tipo_transaccion = null;
				if(!empty($_POST["precio"]))$precio = $_POST["precio"]; else $precio = null;

				$datos = array(
								"titulo"=>$tituloNew, 
								"tipo_inmueble"=>$tipo_inmueble,
								"googlemaps"=>$googlemaps,
								"descripcion"=>$descripcion, 
								"tipo_transaccion"=>$tipo_transaccion, 
								"precio"=>$precio, 
								"imagen"=>$file
							);
				//var_dump($datos);

				$respuesta = inmueblesModel::GuardarinmueblesModel($datos);
				bitacoraController::Registro("Agregó Inmueble ".$tituloNew);

				

				
				if($respuesta=="success"){
					$utlimo = inmueblesModel::UltimoInmuebleModel();
					echo '


					<script>
					swal({
    			  			title:"Listo",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
    			  			text:"El Inmueble se ha guardado.",
    			  			alert:"success", 
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			},function(isConfirm){
    			  				if(isConfirm) window.location = "index.php?bq=propiedad-dat&id='.PasarNumero($utlimo["id"]).'";
    			  			}
    			  		);
					</script>';
				}else{
					echo '
					<script>
					swal({
    			  			title:"Error",
    			  			type: "warning",                     //  Green : 1ab394    Red : DD6B55 
    			  			text:"El Inmueble no se pudo guardar.",
    			  			alert:"warning",
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#DD6B55",
    			  			closeOnConfirm:false
    			  			}
    			  		);
					</script>';
				}



			}
		}

	}

	static public function PublicarInmueblesController(){

		if(!empty($_GET["publish"]) && !empty($_GET["nombre"]) ){
			if(isset($_GET["sts"])){
				inmueblesModel::PublicarinmueblesModel($_GET["publish"], $_GET["sts"]);
				bitacoraController::Registro("Publicó Inmueble ".$_GET["nombre"]);
			    if($_GET["sts"]==1)bitacoraController::Registro("Publicó Inmueble ".$_GET["nombre"]); else bitacoraController::Registro("Suspendio Inmueble ".$_GET["nombre"]);
			     
			}
	   }

	}

	static public function GaleriaThumbListcontroller($valor){
		$thumb='';
		    $thumImg = inmueblesModel::ListaEditGaleriaInmuebleModel($valor); 

		    if( count($thumImg )>0 ){

		    	foreach ($thumImg as $key => $value) {
		    		$thumb .='<img src="views/images/inmuebles/'.$value["imagen"].'" style="width:80px; margin:5px; " >';
		    	}

		    }
		    return $thumb;
	}



	static public function ListaInmueblesController(){

		if(empty($_POST["suceso"]))  $respuesta = inmueblesModel::ListInmuebleModel();
		if(!empty($_POST["suceso"]))  $respuesta = inmueblesModel::ListBuscarInmuebleModel($_POST["suceso"]);

		if(count($respuesta )>0){

		foreach ($respuesta as $row => $item) {

			$thumb="";

			if($item["publish"]==1){
				$sts = 0;
			}else{
				$sts = 1;
		    }

		     $thumImg = inmueblesModel::ListaEditGaleriaInmuebleModel($item["id"]); 

		    if( count($thumImg )>0 ){

		    	foreach ($thumImg as $key => $value) {
		    		$thumb .='<img src="views/images/inmuebles/'.$value["imagen"].'" style="width:30px; margin:5px; " >';
		    	}

		    }




			 echo '
			 <div class="col-lg-12" id="'.$item["id"].'">

			   <div class="row">
						<div class="col-md-9   ">
							<a href="index.php?bq=propiedad-img&id='.PasarNumero($item["id"]).'">
								<div type="button" class="btn btn-default btn-xs   text-navy ">Galería imagenes</div>
								</a>
						</div>					
						<div class="col-md-1  pull-right ">
							<a href="javascript:BorrarInmueble('.$item["id"].', \''.$item["imagen"].'\', \''.$item["titulo"].'\');"><h2 class="text-danger"><i class=" fa fa-times"></i></h2></a>
						</div>
						<div class="col-md-1  pull-right">
							<a href="javascript:PublicarInmueble('.$item["id"].', \''.$item["titulo"].'\', '.$sts.');"><h2 class="text-info"><i class=" fa fa-bullhorn "></i></h2></a>
						</div>
						<div class="col-md-1   pull-right">				
							<h2 class="text-navy " data="'.$item["id"].'" style="cursor:pointer">
						    <a href="index.php?bq=propiedad-dat&id='.PasarNumero($item["id"]).'"><i class="fa fa-pencil text-navy"></i></a></h2>
						</div>
					</div> 


					<div class="row">

						<div class="col-md-3">
						<img src="views/images/inmuebles/'.$item["imagen"].'" class="img-thumbnail">
						</div>

						<div class="col-md-9">
								<h1>'.$item["titulo"].' </h1>'.Publish($item["publish"],"small", "pull-right").'
								<p><b>'.$item["precio"].'</b></p>
								<p class="text-navy">'.$item["categoria"].' - '.$item["tipo_transaccion"].'</p>
								<i class="" style="font-size:.9em; color:#999;" >'.$item["descripcion"].'</i> 
								<div class="row thumbailDetail">
								'.$thumb.'
								</div>
								
								
						</div> <!-- 9 -->

					</div> <!-- row -->
					<hr>
			</div> <!-- 12 -->
			';
		}
		}else{
			echo '<div class="alert alert-warning">No hay registros.</div>';
		}

	}
	static public function BorrarInmueblesController(){
		if(isset($_GET["idBorrar"])){

			if($_GET["idBorrar"]!=""){

				$datos = array("id"=>$_GET["idBorrar"], "file"=>$_GET["file"]);
				$respuesta = inmueblesModel::BorrarinmueblesModel($datos); 
				bitacoraController::Registro("Eliminó Inmueble ".$_GET["titulo"]);

				$borrar = inmueblesModel::ListaEditGaleriaInmuebleModel($_GET["idBorrar"]);

				if( count($borrar)>0 ){
					foreach ($borrar as $key => $value) {
						 inmueblesModel::EliminarImgInmuebModel($value["imagen"]);
						 $archivo = 'views/images/inmuebles/'.$value["imagen"];
						 if (file_exists($archivo))unlink($archivo);
					}

				}



				$archivo = "../views/images/inmuebles/".$_GET["file"];
				if(file_exists($archivo )) unlink($archivo );

				if($respuesta =="success"){
					echo '
					<script>
					swal({
    			  			title:"Borrado",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
    			  			text:"El Inmueble se ha borrado.",
    			  			alert:"success",
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			},function(isConfirm){
    			  				if(isConfirm) window.location = "index.php?bq=propiedad";
    			  			}
    			  		);
					</script>';
				}



			}
		}
	}



	static public function ListaGaleriaInmuebleControllers(){

		if(!empty($_GET["id"])){

				$id = DeCryptFinal($_GET["id"]);
				$respuesta = inmueblesModel::ListaGaleriaInmuebleModel($id);

				foreach ($respuesta as $row => $item) {
					 echo '
					 <li id="'.$item["imagen"].'" class="bloqueSlide">
						<span class="fa fa-times  elimInmuebleImg "></span>
						<img src="views/images/inmuebles/'.$item["imagen"].'" class="handleImg">			
					</li>
					 ';
				} 
		}
	}


	static public function ListaEditGaleriaInmuebleControllers(){

		if(!empty($_GET["id"])){

				$id = DeCryptFinal($_GET["id"]);

					$respuesta = inmueblesModel::ListaEditGaleriaInmuebleModel($id);

					foreach ($respuesta as $row => $item) {
						 echo '
						 <li id="edit'.str_replace(".jpg", "", $item["imagen"]).'" >
							<span class="fa fa-pencil editGalPropiedad " style="background:#1ab394"></span>
							<img src="views/images/inmuebles/'.$item["imagen"].'" style="float:left; margin-bottom:10px" width="80%">
							<h1>'.$item["titulo"].'</h1>
							<p>'.$item["descripcion"].'</p>
						</li>
						 ';
					} 
		}

	}


static public function MostrarImg($datos){

		 
		$myAncho = 500; 

		$ext = explode(".", $datos["nombre"]);
        $extencion = end($ext); 
		$archivo = "propiedad_".mt_rand(10,50000).".".strtolower($extencion) ;
		$ruta = "../../views/images/inmuebles/".$archivo;

	 	InmuebleController::CopiarArchivo($datos["temporal"], $ruta);
		InmuebleController::Ajustar($myAncho, $ruta, $ruta);
 
		$respuesta = inmueblesModel::SubirImagenDB($archivo, $datos["inmueble"]);
			

			if($respuesta == "success"){
				return $archivo;
			}else{
				return 1;
			}
	}





	static public function EditGaleriaController($datos){

		inmueblesModel::EditGaleriaModel($datos);
		$respuesta = inmueblesModel::ReviewGaleriaDataModel($datos);
		bitacoraController::Registro("Editó Imagen Inmueble ".$respuesta["titulo"]);

		$enviar = array("titulo"=>$respuesta["titulo"],"descripcion"=>$respuesta["descripcion"]);

		echo  json_encode($enviar);
	}


	static public function EliminarImgInmuebController($valor){

			$file = "../../views/images/inmuebles/".$valor;
			if(file_exists($file)) unlink($file);
				$respuesta = inmueblesModel::EliminarImgInmuebModel($valor);
				bitacoraController::Registro("Eliminó Imagen Inmueble ".$valor);
				return $respuesta;
			 
			 

	}



	static public function OrdenImgInmuebController($datos){
		 inmueblesModel::OrdenImgInmuebModel($datos);
		 
	}

	static public function TipoInmuebleController(){
		$respuesta =  inmueblesModel::TipoInmuebleModel();
		$row  = '[';

		if(count($respuesta)>0){
			foreach ($respuesta as $key => $item) {
				$row .= '"'.$item["tipo"].'",';
			}
		}

		$row = substr ($row, 0, strlen($row) - 1).']';
		return $row;
	}


	static public function ComboTipoTransaccionInmuebleController($id=NULL){

		$respuesta =  inmueblesModel::ComboTipoTransaccionInmuebleModel();
		$row  = '<select name="tipo_transaccion" id="tipo_transaccion"  class="form-control"  style="margin-bottom: 10px;">';


		foreach ($respuesta as $key => $item) {

				$select = '';

				if($id==$item["tipo"])$select = 'Selected';

				$row .= '<option value="'.$item["tipo"].'"  '.$select .'>'.$item["tipo"].'</option>';

			}
		$row .='</select>';


		return $row;


	}



	static public function ListaTipoInmuebleController(){ 
		 $respuesta = inmueblesModel::ListaTipoInmuebleModel();

		if(count($respuesta )>0){

		foreach ($respuesta as $row => $item) { 

			 echo '
			 <li id="'.$item["id"].'" >
				<span style="background:#fff;">
				<h1 class="pull-left">'.$item["tipo"].' </h1> 

				<div class="col-md-1 forum-info pull-right">

				<a href="javascript:BorrarTipoInmueble('.$item["id"].',  \''.$item["tipo"].'\');"><h2 class="text-danger"><i class=" fa fa-times"></i></h2></a>
				</div> 
					<div class="col-md-1 forum-info pull-right EditarTipoInmueble" data-id="'.$item["id"].'" data-titulo="'.$item["tipo"].'">				
						         <h2 class="text-navy"  style="cursor:pointer">								
										<i class="fa fa-pencil "></i>								
								</h2> 
					</div>
				</span> 
				
				<div class="hr-line-dashed"></div>
			</li>
			';
		}
		}else{
			echo '<div class="alert alert-warning">No hay registros.</div>';
		}
	}


	static public function GuardarTipoInmuebleController(){

		if(!empty($_POST["tipoInmuebleAdd"])){
			$respuesta = inmueblesModel::GuardarTipoInmuebleModel($_POST["tipoInmuebleAdd"]);

			if($respuesta =="success"){
				bitacoraController::Registro("Editó Tipo Inmueble ".$_POST["tipoInmuebleAdd"]);
				echo '
					<script>
					swal({
    			  			title:"Guardado",
    			  			text:"Se guardo correctamente el nuevo tipo de inmueble.",
    			  			alert:"success",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			},function(isConfirm){
    			  				if(isConfirm) window.location = "index.php?bq=propiedad-tipo-inmueble";
    			  			}
    			  		);
					</script>';
			}else{
				echo '
					<script>
					swal({
    			  			title:"Error",
    			  			type: "warning",                     //  Green : 1ab394    Red : DD6B55 
    			  			text:"Hubo un error al guardar, intente de nuevo.",
    			  			alert:"warning",
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#DD6B55",
    			  			closeOnConfirm:false 
    			  			}
    			  		);
					</script>';
			}
		}

	}


	static public function ListaTipoTransaccionInmuebleController(){ 
		 $respuesta = inmueblesModel::ListaTipoTransaccionInmuebleModel();

		if(count($respuesta )>0){

		foreach ($respuesta as $row => $item) { 

			 echo '
			 <li id="'.$item["id"].'" >
				<span style="background:#fff;">
				<h1 class="pull-left">'.$item["tipo"].' </h1> 

				<div class="col-md-1 forum-info pull-right">

				<a href="javascript:BorrarTipoTransaccionInmueble('.$item["id"].',  \''.$item["tipo"].'\');"><h2 class="text-danger"><i class=" fa fa-times"></i></h2></a>
				</div> 
					<div class="col-md-1 forum-info pull-right EditarTipoInmueble" data-id="'.$item["id"].'" data-titulo="'.$item["tipo"].'">				
						         <h2 class="text-navy"  style="cursor:pointer">								
										<i class="fa fa-pencil "></i>								
								</h2> 
					</div>
				</span> 
				
				<div class="hr-line-dashed"></div>
			</li>
			';
		}
		}else{
			echo '<div class="alert alert-warning">No hay registros.</div>';
		}
	}


	static public function GuardarTipotransaccionInmuebleController(){

		if(!empty($_POST["tipoInmuebleAdd"])){
			$respuesta = inmueblesModel::GuardarTipotransaccionInmuebleModel($_POST["tipoInmuebleAdd"]);

			if($respuesta =="success"){
				bitacoraController::Registro("Editó Tipo Inmueble ".$_POST["tipoInmuebleAdd"]);
				echo '
					<script>
					swal({
    			  			title:"Guardado",
    			  			text:"Se guardo correctamente el nuevo tipo de inmueble.",
    			  			alert:"success",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			},function(isConfirm){
    			  				if(isConfirm) window.location = "index.php?bq=propiedad-tipo-transaccion";
    			  			}
    			  		);
					</script>';
			}else{
				echo '
					<script>
					swal({
    			  			title:"Error",
    			  			text:"Hubo un error al guardar, intente de nuevo.",
    			  			alert:"warning",
    			  			type: "warning",                     //  Green : 1ab394    Red : DD6B55 
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#DD6B55",
    			  			closeOnConfirm:false 
    			  			}
    			  		);
					</script>';
			}
		}

	}



	static public function EditarTipoInmuebleController(){

		if( !empty($_POST["titulo"]) && !empty($_POST["id"]) ){

				inmueblesModel::EditarTipoInmuebleModel($_POST["id"], $_POST["titulo"]);

				bitacoraController::Registro("Editó Tipo Inmueble ".$_POST["titulo"]);

				echo '
					<script>
					swal({
    			  			title:"Correcto",
    			  			text:"Se han guardado los cambios.",
    			  			alert:"success",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			},function(isConfirm){
    			  				if(isConfirm) window.location = "index.php?bq=propiedad-tipo-inmueble";
    			  			}
    			  		);
					</script>';

		}

	}

	static public function BorrarTipoInmuebleController(){
		if(!empty($_GET["idBorrar"]) && !empty($_GET["titulo"]) ){
			$respuesta = inmueblesModel::BorrarTipoInmuebleModel($_GET["idBorrar"]);


			if($respuesta =="success"){
				bitacoraController::Registro("Eliminó Tipo Inmueble ".$_GET["titulo"]);
				echo '
					<script>
					swal({
    			  			title:"Correcto",
    			  			text:"Se eliminó correctamente.",
    			  			alert:"success",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			},function(isConfirm){
    			  				if(isConfirm) window.location = "index.php?bq=propiedad-tipo-inmueble";
    			  			}
    			  		);
					</script>';
			}else{
				echo '
					<script>
					swal({
    			  			title:"Error",
    			  			text:"Hubo un error al borrar, intente de nuevo.",
    			  			alert:"warning",
    			  			type: "warning",                     //  Green : 1ab394    Red : DD6B55 
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#DD6B55",
    			  			closeOnConfirm:false 
    			  			}
    			  		);
					</script>';
			}
		}
	}



	static public function EditarTipoTransaccionInmuebleController(){

		if( !empty($_POST["titulo"]) && !empty($_POST["id"]) ){

				inmueblesModel::EditarTipoTransaccionInmuebleModel($_POST["id"], $_POST["titulo"]);

				bitacoraController::Registro("Editó Tipo Inmueble ".$_POST["titulo"]);

				echo '
					<script>
					swal({
    			  			title:"Correcto",
    			  			text:"Se han guardado los cambios.",
    			  			alert:"success",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			},function(isConfirm){
    			  				if(isConfirm) window.location = "index.php?bq=propiedad-tipo-transaccion";
    			  			}
    			  		);
					</script>';

		}

	}

	static public function BorrarTipotransaccionInmuebleController(){
		if(!empty($_GET["idBorrar"]) && !empty($_GET["titulo"]) ){
			$respuesta = inmueblesModel::BorrarTipotransaccionInmuebleModel($_GET["idBorrar"]);


			if($respuesta =="success"){
				bitacoraController::Registro("Eliminó Tipo Inmueble ".$_GET["titulo"]);
				echo '
					<script>
					swal({
    			  			title:"Correcto",
    			  			text:"Se eliminó correctamente.",
    			  			alert:"success",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			},function(isConfirm){
    			  				if(isConfirm) window.location = "index.php?bq=propiedad-tipo-transaccion";
    			  			}
    			  		);
					</script>';
			}else{
				echo '
					<script>
					swal({
    			  			title:"Error",
    			  			type: "warning",                     //  Green : 1ab394    Red : DD6B55 
    			  			text:"Hubo un error al borrar, intente de nuevo.",
    			  			alert:"warning",
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#DD6B55",
    			  			closeOnConfirm:false 
    			  			}
    			  		);
					</script>';
			}
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