<?php 


class contactController{
	
	static public function listaContactoController($var){

		$respuesta = contactModel::listaContactoModel($var);

		if( count($respuesta) ){
			$row ="";

			foreach ($respuesta as $key => $item) {
				$row .='
				<div class="col-sm-4">
				                <div class="contact-box">
				                    <span class="fa fa-times pull-right text-danger borrarSuscriptor" data="'.$item["id"].'"></span>
				                    <div class="col-sm-4">

				                        <div class="text-center"> 
				                            <div class="m-t-xs font-bold"> <i class="fa fa-envelope-open" style="font-size: 3em; opacity: .2"></i></div>
				                        </div>
				                    </div>
				                    <div class="col-sm-8">
				                        <h3><strong>'.utf8_decode($item["nombre"]).'</strong></h3>
				                        <p><i class="fa fa-calendar-o"></i> <small>'.PresentarFecha($item["fecha"]).'</small></p>
				                        <p><i class="fa fa-map-marker"></i> <span class="text-navy">'.$item["email"].'</span></p>
				                        <p><i class="fa fa-mobile"></i> '.$item["telefono"].'</p>
				                        <address>
				                            <i class="fa fa-comments-o"></i> '.$item["observaciones"].'
				                        </address>
				                    </div>
				                    <div class="clearfix"></div>
				                      
				                </div>
				     </div>
				     ';
			}

		 
		   return $row;
	        
		}else{
			return '<div class="alert alert-warning">No hay registros.</div>';
		}

 }


 static public function eliminarContactoController(){
 	if(!empty($_GET["idBorrar"])){
 		contactModel::eliminarContactoModel($_GET["idBorrar"]);
 		bitacoraController::Registro("Borró suscriptor ");
 	}
 }


























}