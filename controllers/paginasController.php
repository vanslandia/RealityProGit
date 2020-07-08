<?php 

class paginasController{


	static public function PesonalizadoLinkPageController(){

		if( !empty($_POST["tituloLink"]) && !empty($_POST["eLink"]) ){ 
 

			$datos = array("url_personalizado"=>$_POST["eLink"] ,"titulo"=>utf8_decode($_POST["tituloLink"]),"posicion"=>0 ,"parent"=>0 ,"publish"=>1  );

			$respuesta = paginasModel::PesonalizadoLinkPageModel( $datos  );
			bitacoraController::Registro("Agregó Enlace Página ".utf8_decode($_POST["tituloLink"]));

			//var_dump($datos);

			if($respuesta =="success"){
					echo '
					<script>
					swal({
    			  			title:"Listo",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
    			  			text:"El enlace se ha guardado.",
    			  			alert:"success",
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			},function(isConfirm){
    			  				if(isConfirm) window.location = "index.php?bq=pages";
    			  			}
    			  		);
					</script>';
				}

		}
	}


	static public function AgregarPaginaController(){

		if( !empty($_POST["tituloPagina"]) && !empty($_POST["url"]) ){ 


			 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			 #  Imagenes summenote
			 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			$vaciar = glob('views/images/tmp/*');
			foreach ($vaciar as $file) {
					copy($file, 'views/images/archivos'.str_replace('views/images/tmp', '', $file));
					unlink($file);
			}


			if(!empty($_POST["descrip"]))$descrip = str_replace('views/images/tmp','views/images/archivos', $_POST["descrip"] ) ;else $descrip =null;

			$datos = array("titulo"=>utf8_decode($_POST["tituloPagina"]),"contenido"=>$descrip ,"url"=>$_POST["url"] ,"seo_titulo"=>utf8_decode($_POST["tituloPagina"]) ,"posicion"=>0 ,"parent"=>0  );

			$respuesta = paginasModel::AgregarPaginaModel( $datos  );
			bitacoraController::Registro("Agregó Página ".utf8_decode($_POST["tituloPagina"]));

			//var_dump($datos);

			if($respuesta =="success"){
					echo '
					<script>
					swal({
    			  			title:"Listo",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
    			  			text:"La pagina se ha guardado.",
    			  			alert:"success",
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			},function(isConfirm){
    			  				if(isConfirm) window.location = "index.php?bq=pages";
    			  			}
    			  		);
					</script>';
				}

		}

	}


	static public function ListPaginaController(){

		$respuesta = paginasModel::ListPaginaModel();

		if(count($respuesta)>0){

			$row = '';


			foreach ($respuesta as $key => $item) {
				$prumaryItem  ='';
				if($item["publish"]==1){
						$sts = 0;
					}else{
						$sts = 1;
				    }

				if($item["menu_principal"]==0) $prumaryItem = '<span class="text-danger"> - No aparece en menu principal</span>';

				if(!empty($item["url_personalizado"])){
				 $personalizado = ' style="display:none"'; 
				 $icon = ' <i class="fa fa-link text-muted"></i> <small class="text-info">Esto es un link externo</small>';
				 $linkPage = $item["url_personalizado"];
				 $edit = '#';
				}else{
					 $personalizado = '';
					 $icon = '';
					 $linkPage =SiteController::URL().'/'.$item["url"];
					  $edit = 'index.php?bq=pages-dat&id='.PasarNumero($item["id"]);
				}

				$row .='
				<div class="forum-item active">
		                                <div class="row">
		                                    <div class="col-lg-12">
		                                       <div class="col-lg-12">

		                                       <div class="row">

				                                         <div class="col-lg-9">
				                                         	<a href="'.$edit.'" class="forum-item-title">'.utf8_encode($item["titulo"]).$icon .'</a>
				                                         </div> <!-- 9 -->

				                                         <div class="col-lg-1 pull-right"  '.$personalizado .'>
					                                        <a href="index.php?bq=pages-dat&id='.PasarNumero($item["id"]).'" class="forum-item-title">
					                                                <span class="views-number text-navy">                                           
					                                                     <i class="fa fa-pencil"></i>
					                                       			 </span>  
					                                        </a>
		                                  			      </div>
		                                    
					                                    <div class="col-lg-1  pull-right"  '.$personalizado .'>
					                                         <a href="javascript:PublicarPage(\''.PasarNumero($item["id"]).'\', \''.utf8_encode($item["titulo"]).'\', '.$sts .')" class="forum-item-title">
					                                        <span class="views-number text-info">
					                                            <i class="fa fa-bullhorn"></i>
					                                        </span>
					                                        </a>
					                                    </div>

					                                    <div class="col-lg-1 pull-right">
					                                      <a href="javascript:EliminarPage(\''.PasarNumero($item["id"]).'\', \''.utf8_encode($item["titulo"]).'\')" class="forum-item-title">
					                                        <span class="views-number text-danger">
					                                            <i class="fa fa-times "></i>
					                                        </span>
					                                       </a>
					                                     </div> 
			                                     <div> 
			                                  <div class="row">
					                                     <div class="col-lg-12">

					                                            <small ><small class="text-black">'.$linkPage.'</small></small>
					                                        <div class="forum-sub-title">
					                                            <i class="fa fa-clock-o"></i>
					                                        <small>'.PresentarFechaLarga($item["fecha"]).'</small> '.Publish($item["publish"], "span", "pull-right").'
					                                        </div>
					                                        <small><small><span class="text-'.SeoNot($item["seo_titulo"],$item["seo_slug"],$item["seo_meta"]).'">SEO</span> '.$prumaryItem .'</small></small>
					                                     </div> <!-- 12 -->
		                                     </div> 


		                                       </div> <!-- 12 -->



		                                        

		                                        
		                                    </div> <!-- col-lg-12 -->

		                                    


                                        


                                        </div> <!--row-->
                                    </div>
                                </div>
                            </div>
                            ';
			}
			return $row;

		} else {
			return '<div class="alert alert-warning">No hay registros.</div>';
		}

	}


	static public function DeletePaginaController(){
		if( !empty($_GET["idBorrar"]) && !empty($_GET["nombre"])  ){ 

			$delete = DeCryptFinal($_GET["idBorrar"]);
			paginasModel::DeletePaginaModel($delete);
			paginasModel::OrdenarHijosPageModel($delete);
			bitacoraController::Registro("Eliminó Página ".utf8_decode($_GET["nombre"]));
		}

	}

	static public function PublicarPageController(){

		if(!empty($_GET["publish"]) && !empty($_GET["nombre"]) ){
			if(isset($_GET["sts"])){
				$pub = DeCryptFinal($_GET["publish"]);

				paginasModel::PublicarPageModel($pub, $_GET["sts"]);

				if($_GET["sts"]==0)paginasModel::OrdenarHijosPageModel($pub);

			    if($_GET["sts"]==1)bitacoraController::Registro("Publicó Página ".$_GET["nombre"]); else bitacoraController::Registro("Suspendio Página ".$_GET["nombre"]);
			     
			}
	   }

	}

	static public function PaginasDatosController(){
		if( !empty($_GET["id"])  ){ 

			$id = DeCryptFinal($_GET["id"]);
			$datos = paginasModel::PaginasDatosModel($id);
			return $datos;
		}
	}

	static public function UpdatePaginaController(){
 
		if( !empty($_POST["tituloPagina"]) && !empty($_POST["url"]) && !empty($_GET["id"])  ){ 

			$id = DeCryptFinal($_GET["id"]);
			$menu_principal = 0;

			 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			 #  Imagenes summenote
			 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			$vaciar = glob('views/images/tmp/*');
			foreach ($vaciar as $file) {
					copy($file, 'views/images/archivos'.str_replace('views/images/tmp', '', $file));
					unlink($file);
			}


			if(!empty($_POST["menuPrincipal"]) && $_POST["menuPrincipal"] == 1)$menu_principal = 1;
			if(!empty($_POST["publish"]))$publish =$_POST["publish"] ;else $publish =null;
			if(!empty($_POST["descrip"]))$descrip =str_replace('views/images/tmp','views/images/archivos', $_POST["descrip"] ) ;else $descrip =null;
			if(!empty($_POST["seo_titulo"]))$seo_titulo =$_POST["seo_titulo"] ;else $seo_titulo =null;
			if(!empty($_POST["seo_slug"]))$seo_slug =$_POST["seo_slug"] ;else $seo_slug =null;
			if(!empty($_POST["seo_meta"]))$seo_meta =$_POST["seo_meta"] ;else $seo_meta =null;
			if(!empty($_POST["site_independeinte"]))$site_independeinte =$_POST["site_independeinte"] ;else $site_independeinte =null;

			$datos = array("site_independeinte"=>$site_independeinte,"titulo"=>utf8_decode($_POST["tituloPagina"]),"contenido"=>$descrip ,"url"=>$_POST["url"] ,"publish"=>$publish, "id"=>$id, "seo_titulo"=>$seo_titulo, "seo_slug"=>$seo_slug, "seo_meta"=>$seo_meta, "menu_principal"=>$menu_principal );

		//	var_dump($datos);
			$respuest = paginasModel::UpdatePaginaModel($datos);
			bitacoraController::Registro("Editó Página ".utf8_decode($_POST["tituloPagina"]));

			if($respuest =="success"){
					echo '
					<script>
					swal({
    			  			title:"Listo",
    			  			type: "success",                     //  Green : 1ab394    Red : DD6B55 
    			  			text:"La pagina se ha guardado.",
    			  			alert:"success",
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			}     			  		);
					</script>';
				}

		 


		} 

	}


	static public function ListaItemsPages($parent_id = 0) {
        $result = PaginasController::ItemPageController($parent_id);
        foreach($result as &$value) {
            $subresult = PaginasController::ListaItemsPages($value["id"]);
            if (count($subresult) > 0) {
                $value['children'] = $subresult;
             }
        }
        unset($value);
        return $result;
    }


	static public function ItemPageController($datos){

		$respuesta = paginasModel::ItemPageModel($datos);
		return $respuesta;

	}

























}