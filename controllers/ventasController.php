<?php 



class ventasController{

	
	static public function TotalClientesMesController(){

		$resp = ventasModel::TotalClientesMesModel();
		echo  $resp["total"]; 
		 
	}

	

	static public function ProdVisitController(){


		$respuesta = ventasModel::ProdVisitModel();
		//var_dump($respuesta);

		if(count($respuesta)>0){				
			foreach ($respuesta as $row => $item) {

				if(!empty($item["precio"]))$precio = "$ ".number_format($item["precio"],2)." MXN";else $precio = null;

				echo '   				    <tr>
                                                <td><small>'.$item["nombre"].'</small></td> 
                                                <td class="text-navy small">'.$precio.'</td>
                                                <td class="text-warning">'.$item["visitas"].'</td>
                                                <td>
                                                <a href="index.php?bq=productos-dat&id='.PasarNumero($item["id"]).'"><i class="fa fa-pencil text-navy"></i></a></td>
                                            </tr>				 
				  '; 
			}

		}else{
			echo '<div class="alert alert-warning">No existen registros.</div>';
		}
	}


	
	static public function UltimoVentasController(){


		$respuesta = ventasModel::UltimoVentasModel();
		//var_dump($respuesta);

		if(count($respuesta)>0){				
			foreach ($respuesta as $row => $item) {

				if(!empty($item["monto"]))$monto = "$".$item["monto"]." MXN"; else $monto = null;
				if($item["estatus"]=='Completado')$sts = '<small class="label label-primary">Complet..-</small>'; else $sts = '<small class="label label-warning">Pend..-</small>';

				echo '   <tr>
                            <td>'.$sts.'</td>
                            <td class="small"><i class="fa fa-clock-o"></i> '.PresentarFecha($item["fecha"]).'</td>
                            <td class="small">'.$item["nombre"].'</td>
                            <td class="text-navy small"> '.$monto.' </td>
                         </tr>				 
				  '; 
			}

		}else{
			echo '<div class="alert alert-warning">No existen registros.</div>';
		}
	}


	
	static public function UltimoClientesController(){


		$respuesta = ventasModel::UltimoClientesModel();
		//var_dump($respuesta);

		if(count($respuesta)>0){
				
			foreach ($respuesta as $row => $item) {
				echo '
				<div class="feed-element">
                                        <div>
                                            <small class="pull-right text-navy">'.PresentarFecha($item["fecha"]).'</small>
                                            <strong>'.$item["nombre"].'</strong>
                                            <div>'.$item["observaciones"].'</div>
                                            <small class="text-muted">'.$item["email"].'</small>
                                        </div>
                                    </div>
				 
				  '; 
			}

		}else{
			echo '<div class="alert alert-warning">No existen registros.</div>';
		}
	}

	
	static public function TotalClientesController(){ 
			$dat =  ventasModel::TotalClientesModel();	
			echo $dat["total"];
	}

	
	static public function TotalProdController(){ 
			$dat =  ventasModel::TotalProdModel();	
			echo $dat["total"];
	}


	
	static public function SumaVentasController($var){ 
			return ventasModel::SumaVentasModel($var);	
	}




	
	static public function PublicarVentaController(){

		if(!empty($_GET["publish"]) && !empty($_GET["nombre"]) ){
			if(isset($_GET["sts"])){
				ventasModel::PublicarProductoModel($_GET["publish"], $_GET["sts"]);
			     bitacoraController::Registro("Se editó la venta ".$_GET["nombre"]." - ".$_GET["sts"]);
			     
			}
	   }

	}


	static public function ListaMetodoPagoController($id=null){
		$resp = ventasModel::ListaMetodoPagoModel();

		$back =  '
		 	 <select class="form-control  "  name="metodo" id="metodo"   >
		 	      <option value="">-Seleccionar Método-</option>';
		  		foreach ($resp as $key => $item) {
		  			if($id==$item["metodo"]) $select = "Selected"; else $select = "";
		  			if($item["metodo"]!="")$back .=  '<option value="'.$item["metodo"].'" '.$select.'>'.utf8_encode($item["metodo"]).'</option>';
		  		} 
        $back .=  '</select>';
        echo  $back;

	}


	static public function DeleteVentasController(){

		if(!empty($_GET["idBorrar"])   && !empty($_GET["folio"])){
			   $id = DeCryptFinal($_GET["idBorrar"]);
				    ventasModel::DeleteVentasModel($id);

				    bitacoraController::Registro("Borro la venta ".$_GET["folio"]);

					echo '
							<script>
							swal({
		    			  			title:"Borrado",
		    			  			
		    			  			text:"El registro fue borrado.",
		    			  			alert:"warning",
		    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
		    			  			confirmButtonText:"Cerrar",
		    			  			confirmButtonColor: "#DD6B55",
		    			  			closeOnConfirm:false},
					                      function(isConfirm){  
					                            if(isConfirm) window.location = "index.php?bq=pedidos-pendientes";  
		    			  			}
		    			  		);
							</script>';
				}
	}

	static public function ListasVentasController($dat){


		$datos = array("estatus"=>$dat);

		if(!empty($_POST["nombre"]))$datos["nombre"] = $_POST["nombre"];
		if(!empty($_POST["metodo"]))$datos["metodo"] = $_POST["metodo"];
		if(!empty($_POST["start"])  &&  !empty($_POST["end"])){ $datos["ini"] = $_POST["start"];  $datos["fin"] = $_POST["end"]; } 

		if(!empty($_POST["nombre"])){
			$client = ventasModel::BuscaClienteModel($_POST["nombre"]);
			if(!empty($client["id"])){
				$datos["id_usuario"] = $client["id"]; 
			     unset($datos["nombre"]); 
			 }
		}
		//var_dump($datos);

		$respuesta = ventasModel::ListasVentasModel($datos);
		//var_dump($respuesta);

		if(count($respuesta)>0){
				$total = null;
				
			foreach ($respuesta as $row => $item) {
				$precio = null;

				$art = ventasModel::NumArtCompraModel($item["id"]);

				if(!empty($item["monto"])){
					 $total += $item["monto"];
					$precio = "$".number_format($item["monto"],2)." MXN" ;
				}
				if($item["metodo"]=="paypal" || $item["metodo"]=="payu" )$metodo = '<img src="views/img/'.$item["metodo"].'.JPG" width="50">'; else $metodo  = null; 
				if($item["estatus"]=="Completado")$estatus = '<div class="label label-primary">Completado</div>'; else $estatus = '<div class="label label-warning">Pendiente</div>';
 				if($item["estatus"]=="Completado")$sts = "Pendiente"; else $sts = "Completado";

				echo '
				 <tr>
			        <td><div class="text-gray f8">'.PresentarFecha($item["fecha"]).'</div></td> 
			        <td><span class="small">'.$item["folio"].'</span></td>
			        <td><div class="bold">'.$item["usuario"].'</div><div class="small text-gray">'.$item["email"].'</div></td>			        
			        <td><span>'.$art["total"].'</span></td> 
			        <td><span>'.$item["envio"].'</span></td> 
			        <td>
			        <a href="javascript:PublicarVenta('.$item["id"].', \''.$item["folio"].'\', \''.$sts.'\');"> '.$estatus.' </a>
			        </td>
			        <td><span>'.$metodo.'</span></td> 
			        <td class="text-warning">'.$precio.'</td> 
			        <td><span class=" fa fa-search text-navy"></span></td> 
			        <td><a href="javascript:EliminarVenta(\''.PasarNumero($item["id"]).'\', \''.$item["folio"].'\');"><span class=" fa fa-times eliminarUsuario text-danger"></span></a></td>
			      </tr>
			      '; 
			}

			echo '<tr>
					<td colspan="6" class="text-right bold"><span >Total: </span></td>
					<td><span class="bold" >$ '.number_format($total, 2).' MXN</span</td>
					<td></td>
					<td></td>
			      </tr>';
		}else{
			echo '<div class="alert alert-warning">No existen registros.</div>';
		}
	}





























}