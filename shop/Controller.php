<?php 


class Controller{

	static public function MetasController(){
		if( !empty($_GET["p"])){
			if( !empty($_GET["p"])){
				$dat = Model::GetContenidoPageModel($_GET["p"]);
				//var_dump($dat);
				if( !empty($dat["titulo"]) ){
					echo ' 
					<meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
					<link rel="canonical" href="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" /> 
					<meta property="og:locale" content="es_ES" />
					<meta property="og:type" content="Page / Página" />
					<meta property="og:title" content="'.utf8_decode($dat["seo_titulo"]).'" />
					<meta property="og:description" content="'.utf8_decode(substr($dat["contenido"],0,80)).'..." />
					<meta property="og:url" content="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" /> 
					<meta property="og:site_name" content="'.self::GetSeccionSettingReturnController("Website").' - '.$dat["seo_titulo"].'" />
				    <meta name="description" content="'.utf8_decode(substr($dat["seo_meta"],0,80)).'...">
				    <meta name="author" content="'.self::GetSeccionSettingReturnController("Website").'">
				    <title>:: '.self::GetSeccionSettingReturnController("Website").' - '.$dat["seo_titulo"].' ::</title>';
				}else if($_GET["p"]=="categoria"){
					 

					$dat = Model::GetCategoryModel($_GET["id"]);
					//var_dump($dat);

					echo ' 
					<meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
					<link rel="canonical" href="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" /> 
					<meta property="og:locale" content="es_ES" />
					<meta property="og:type" content="Page / Página" />
					<meta property="og:title" content="'.utf8_decode($dat["categoria"]).'" />
					<meta property="og:description" content="'.utf8_decode(substr($dat["descripcion"],0,80)).'..." />
					<meta property="og:url" content="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" /> 
					<meta property="og:site_name" content="'.self::GetSeccionSettingReturnController("Website").' - '.$dat["categoria"].'" />
				    <meta name="description" content="'.utf8_decode(substr($dat["descripcion"],0,80)).'...">
				    <meta name="author" content="'.self::GetSeccionSettingReturnController("Website").'">
				    <title>:: '.self::GetSeccionSettingReturnController("Website").' - '.$dat["categoria"].' ::</title>';
				}else if($_GET["p"]=="producto"){
					 

					$dat = Model::GetProdutoModel($_GET["id"]);
					//var_dump($dat);
					$url = explode("/", $_SERVER["PHP_SELF"]); 

					echo ' 
					<meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
					<link rel="canonical" href="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" /> 
					<meta property="og:locale" content="es_ES" />
					<meta property="og:type" content="Page / Página" />
					<meta property="og:title" content="'.utf8_decode($dat["nombre"]).'" />
					<meta property="og:description" content="'.utf8_decode(substr($dat["descripcion"],0,80)).'..." />
					<meta property="og:image" content="http://'.$_SERVER['HTTP_HOST']."/".$url[1]."/".$dat["imagen"].'" />
					<meta property="og:url" content="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" /> 
					<meta property="og:site_name" content="'.self::GetSeccionSettingReturnController("Website").' - '.$dat["nombre"].'" />
				    <meta name="description" content="'.utf8_decode(substr($dat["descripcion"],0,80)).'...">
				    <meta name="author" content="'.self::GetSeccionSettingReturnController("Website").'">
				    <title>:: '.self::GetSeccionSettingReturnController("Website").' - '.$dat["nombre"].' ::</title>';
				}else{
					echo '  
				    <meta name="description" content="'.utf8_decode(self::GetSeccionSettingReturnController("Frase")).'">
				    <meta name="author" content="'.self::GetSeccionSettingReturnController("Website").'">
				    <title>:: '.self::GetSeccionSettingReturnController('Website').' - Productos ::</title>';
				}
			}

		}else {
			echo '  
				    <meta name="description" content="'.utf8_decode(self::GetSeccionSettingReturnController("Frase")).'">
				    <meta name="author" content="'.self::GetSeccionSettingReturnController("Website").'">
				    <title>:: '.self::GetSeccionSettingReturnController('Website').' ::</title>';
		}
	}






	static public function GetContenidoPageController(){

		if( !empty($_GET["p"]) ){

			$dat = Model::GetContenidoPageModel($_GET["p"]);
			//var_dump($dat);

			if( !empty($dat["titulo"]) ){
				//return $dat;
				require_once "page.php";
			}else if($_GET["p"] == 'categoria') {
				require_once "list.php";
			}elseif($_GET["p"] == 'producto') {
				require_once "producto.php";
			}else{
				header("location:".self::GetSeccionSettingReturnController("URL")."?p=error");
			}

		}else{ 
			self::GetContenidoController();
		}

	}

	
	static public function GetContenidoPageSQLController(){
 			if( !empty($_GET["p"])   ) return  Model::GetContenidoPageModel($_GET["p"]);

	}


	static public function GetContenidoController(){

		$p = (!empty($_GET["p"]) )?$_GET["p"] : 'home';
		$file = $p.".php";
		if(file_exists($file))require_once $file; else require_once "error.php";

	}
 

	static public function DeleteProductoController(){
		if(!empty($_GET["elim"])){
			Model::DeleteProductoModel($_GET["elim"]);
			header("Locacion:cesta.php");
		}
	}

	
	static public function  NumProdUpdateMontoProdutoController(){
	 	if( isset($_COOKIE["ElCliente"])  ){
	 		$user = self::GetUserController($_COOKIE["ElCliente"]);
			$cart = self::GetCompraController($user["id"]);
			//var_dump($cart);

			$prod = Model::GetListProdCartModel($cart["id"]);
			if(is_array($prod) && count($prod)>0  ){
				$subTotal = 0;
				$Total = 0;
				$items = 0;
				foreach ($prod as $key => $dat) {
					$items = $items +$dat["cantidad"];
					$subTotal = ($dat["precio"]*$dat["cantidad"]);
					//echo $dat["nombre"]."  $".$dat["precio"]."|".$dat["cantidad"]." _ ".($dat["precio"]*$dat["cantidad"])."<br>";
					$Total = $Total + $subTotal;
				}
			}
		$datos = array("items"=>$items, "monto"=>$Total, "cart"=>$cart["id"], "folio"=>$cart["folio"]);
	 	Model::UpdateDataCestaModel($datos);


	 	return $datos;

	 	}

	 	

	}//




	static public function  UpdateProductoController(){
		if(!empty($_POST["update"])){

			$items = explode(",", $_POST["update"]);

			for ($i=0; $i < count($items) ; $i++) { 
				//echo $items[$i]."|".$_POST["item_".$items[$i]]."<br>";
				if(!empty($_POST["item_".$items[$i]])) Model::UpdateProductoModel($items[$i], $_POST["item_".$items[$i]]);
			}

		}
		




	}//


	static public function ListProdCestaController(){
		if( isset($_COOKIE["ElCliente"])  ){

			$user = self::GetUserController($_COOKIE["ElCliente"]);
			$cart = self::GetCompraController($user["id"]);
			//var_dump($cart);

			$prod = Model::GetListProdCartModel($cart["id"]);
			//var_dump($prod);

			if(is_array($prod) && count($prod)>0  ){
				$row = null;
				$contador = 0;
				$arrayProd = null;

				foreach ($prod as $key => $dat) {
					$precio_ant = null;
					$subTotal = 0;

					$precio = "$ ".number_format($dat["precio"],2)." MXN";
					if(!empty($dat["precio_ant"])){
						$precio_ant = ' <s class="small text-gray">$'.number_format($dat["precio_ant"],2).'MXN</s>'; 
					}

					$subTotal = $subTotal+($dat["precio"]*$dat["cantidad"]);
					$contador++;
				 
				 
					
					$row .= '<div class="ibox-content">
			                            <div class="table-responsive">
			                                <table class="table shoping-cart-table">
			                                    <tbody>
			                                    <tr>
			                                        <td width="90">
			                                            <div class="cart-product-imitation">
			                                            	<img src="../'.$dat["imagen"].'" width="100%">
			                                            </div>
			                                        </td>
			                                        <td class="desc">
			                                            <h3>
			                                            <a href="detalle.php?id='.$dat["elink"].'" class="text-navy">
			                                                '.$dat["nombre"].'
			                                            </a>
			                                            </h3>
			                                            <p class="small">
			                                                '.$dat["intro"].'
			                                            </p>
			                                            <dl class="small m-b-none">
			                                                <dt>'.$dat["categoria"].'</dt>
			                                                <dd>'.$dat["subcategoria"].'</dd>
			                                            </dl>

			                                            <div class="m-t-sm">  
			                                                <a href="javascript:Eliminar(\''.$dat["nombre"].'\','.$dat["id"].');" class="text-danger"><i class="fa fa-trash"></i> Eliminar</a>
			                                            </div>
			                                        </td>

			                                        <td>
			                                            '.$precio.$precio_ant.'
			                                            
			                                        </td>
			                                        <td width="65">
			                                            <input type="number" min="1" max="100" class="form-control" name="item_'.$dat["id"].'" id="item_'.$dat["id"].'" value="'.$dat["cantidad"].'" placeholder="1" required>
			                                        </td>
			                                        <td>
			                                            <h4>
			                                                $'.number_format($subTotal,2).' MXN
			                                            </h4>
			                                        </td>
			                                    </tr>
			                                    </tbody>
			                                </table>
			                            </div>
			                        </div>'; 
			                        $arrayProd = $arrayProd.$dat["id"].",";

			           
			          }//foreach
			           echo $row.'<input type="hidden" id="update" name="update" value="'.$arrayProd.'">';
			       }//if
			 }// if

	}//


	
	static public function InsertProductoController($cart, $prod){
		 return Model::InsertProductoModel($cart, $prod); 
	}//


	
	static public function GetCompraController($dat){
		$cesta = Model::GetCompraModel($dat);

		if(empty($cesta["id"])){
			 $folio = Model::GetLastCompraModel();
			 $folio = (str_replace("COMP", "", $folio["folio"]))+1;
			 Model::InsertUserCompraModel($dat, "COMP".$folio);
			 $cesta = Model::GetUserModel($dat);
		} 
		return $cesta; 

	}//




	static public function GetUserController($dat){
		$resp = Model::GetUserModel($dat);

		if(empty($resp["id"])){
			 Model::InsertUserModel($dat);
			 $resp = Model::GetUserModel($dat);
		}

		return $resp;



	}


	static public function GetImageProductoController($dat){
		if(!empty($dat)){
			$resp = Model::GetImageProductoModel($dat);

			if(is_array($resp) &&  count($resp)>0){
				$row = null;

				foreach ($resp as $key => $dat) {

					 $row .='<div>
                                            <div class="image-imitation">
                                                 <img src="../views/images/productos/'.$dat["imagen"].'" width="300px">
                                            </div>
                            </div>';

				}

				echo $row;

			}

		}
	}//


	static public function GetProdutoController(){
		if(!empty($_GET["id"])){

			return Model::GetProdutoModel($_GET["id"]);

		}
	}


	
	static public function GetProdRandomSubCatController($cat=null){
		$resp = Model::GetProdRandomSubCatModel($cat);

		if(is_array($resp) && count($resp)>0 ){
			$row = null;
			$cont=0;

			foreach ($resp as $key => $dat) { 
				$mark = ($cont==0) ? 'active': null;
				$price = (!empty($dat["precio"])) ? '$'.number_format($dat["precio"]): null;
				$new = (($dat["nuevo"])>0) ? '<div class="label label-warning pull-right">NUEVO</div>': null;
				if(!empty($dat["precio_ant"]))$price= '$'.number_format($dat["precio_ant"]);
 

				


				 $row .= '<div class="col-md-3">
			                    <div class="ibox">
			                        <div class="ibox-content product-box">

			                            <div class="product-imitation" style="background: url(../'.$dat["imagen"].'); background-size: 100%; center center; background-repeat: no-repeat;" >
			                                
			                            </div>
			                            <div class="product-desc">
			                                <span class="product-price">
			                                    '.$price.'
			                                </span>
			                                <small class="text-muted">'.$dat["categoria"].'</small>
			                                <a href="'.self::URL('producto', $dat["elink"]).'" class="product-name"> '.$dat["nombre"].'</a>



			                                <div class="small m-t-xs">
			                                     '.$dat["intro"].'
			                                </div>
			                                <div class="m-t text-righ">

			                                    <a href="'.self::URL('producto', $dat["elink"]).'" class="btn btn-xs btn-outline btn-primary">Detalle <i class="fa fa-long-arrow-right"></i> </a>

			                                    '.$new.'
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </div>';
				$cont ++;
			}
			return $row;
		}
	}// method


	
	static public function GetProdRandomController($cat=null){
		$resp = Model::GetProdRandomModel($cat);

		if(is_array($resp) && count($resp)>0 ){
			$row = null;
			$cont=0;

			foreach ($resp as $key => $dat) { 
				$mark = ($cont==0) ? 'active': null;
				$price = (!empty($dat["precio"])) ? '$'.number_format($dat["precio"]): null;
				$new = (($dat["nuevo"])>0) ? '<div class="label label-warning pull-right">NUEVO</div>': null;
				if(!empty($dat["precio_ant"]))$price= '$'.number_format($dat["precio_ant"]);
 

				


				 $row .= '<div class="col-md-3">
			                    <div class="ibox">
			                        <div class="ibox-content product-box">

			                            <div class="product-imitation" style="background: url(../'.$dat["imagen"].'); background-size: 100%; center center; background-repeat: no-repeat;" >
			                                
			                            </div>
			                            <div class="product-desc">
			                                <span class="product-price">
			                                    '.$price.'
			                                </span>
			                                <small class="text-muted">'.$dat["categoria"].'</small>
			                                <a href="detalle.php?id='.$dat["elink"].'" class="product-name"> '.$dat["nombre"].'</a>



			                                <div class="small m-t-xs">
			                                     '.$dat["intro"].'
			                                </div>
			                                <div class="m-t text-righ">

			                                    <a href="detalle.php?id='.$dat["elink"].'" class="btn btn-xs btn-outline btn-primary">Detalle <i class="fa fa-long-arrow-right"></i> </a>

			                                    '.$new.'
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </div>';
				$cont ++;
			}
			return $row;
		}
	}// method


	static public function GetSeccionSettingController($sector){
		$resp = Model::GetSeccionSettingModel($sector);

		if(!empty($resp["valor"]) && $sector == 'logo'){
			$image = '../views/img/'.$resp["valor"];
			if(file_exists($image))echo '<a href="'.self::GetSeccionSettingReturnController("URL").'"><img src="'.$image.'" width="60%" ></a>';
		}else{
			echo $resp["valor"];
		}
	}// method

	static public function GetSeccionSettingReturnController($sector){
		$resp = Model::GetSeccionSettingModel($sector);

		if(!empty($resp["valor"]) && $sector == 'logo'){
			$image = '../views/img/'.$resp["valor"];
			if(file_exists($image))return '<a href="'.self::GetSeccionSettingController("URL").'"><img src="'.$image.'" width="60%" ></a>';
		}else{
			return  $resp["valor"];
		}
	}// method




	static public function URL($sec, $v1 = NULL, $v2 = NULL, $v3 = NULL){
		$var_type = self::GetSeccionSettingReturnController('Friendly');
		if($var_type=="Inactivo"){
			$cadenaURL = self::GetSeccionSettingReturnController('URL').'/index.php?p='.$sec;
	        if($v1)$cadenaURL .='&id='.$v1;
	        if($v2)$cadenaURL .='&sts='.$v2;
		}else{
			$cadenaURL = self::GetSeccionSettingReturnController('URL').'/'.$sec;
	        if($v1!='')$cadenaURL .='/'.$v1;
	        if($v2!='')$cadenaURL .='/'.$v2;

		}
		return $cadenaURL;
	}









	/*++++++++++++++++++++++++++++++++++++ 
	//  Menu Dinamico
	 ++++++++++++++++++++++++++++++++++++*/


	static public function MenuDinamico(){
		$menu = null; 
		$menu = self::ArmarListaItemsPage(self::ListaItemsPages(), 1); 
		/*++++++++++++++++++++++++++++++++++++ 
		//  Menu categorias (Link producto Categoria)
		 ++++++++++++++++++++++++++++++++++++*/ 
		$menu .= self::GetCategoriasMenuLiController();
		echo $menu;
	}

	static public  function ArmarListaItemsPage($list, $vuelta) {
				$li = null;  
				$url = null;
				// if(!empty($item["url_personalizado"])) echo ' <i class="fa fa-link text-muted"></i>';  

		 		foreach($list as $item):   
		 			$dropdown = null;
		 			$dropdownA = null;    
		 			$url = ( empty($item["url"]) )? self::GetSeccionSettingReturnController("URL")."#": self::URL($item["url"]);

		 			if( !empty($item["url_personalizado"]) ){
		 				$url = $item["url_personalizado"];

							$posicion_coincidencia = strpos($url, '#');
		 	
							if ($posicion_coincidencia === false) {
				     
				   			 } else {
				             $url = self::GetSeccionSettingReturnController("URL")."/".$url;
				            }
				      }else if($item["site_independeinte"]=="1"){
				      		$url = self::URL($item["url"]);
				      }
 

		 			$nodos = Model::NodosSubMenuModel($item["id"]);

		 			if($vuelta==1 && $nodos["total"]>0){
		 				$dropdown = 'class="dropdown"';
		 				$dropdownA = 'class="dropdown-toggle" data-toggle="dropdown"';
		 			}

		 			//

                     $li  .= '<li  '.$dropdown.'  data-id="'.$item["id"].'|'.$nodos["total"].'" id="titulo'.$item["id"].'">
                    			 <a '.(($vuelta==1)?'aria-expanded="false" role="button" href="'.$url.'" ':'href="'.$url.'"').' '.$dropdownA .' >'.utf8_encode($item["titulo"]).'</a>   ';
                          if (array_key_exists("children", $item)): $li  .= '<ul role="menu" class="dropdown-menu">'.self::ArmarListaItemsPage($item["children"], 2).'</ul>'; 
                          endif; 
                    $li  .= '</li>'.chr(10);
                  endforeach;

                  return $li;
      }

	
	static public function GetCategoriasMenuLiController(){
		$resp = Model::GetSliderCatModel();

		$row = '<li class="dropdown"><a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">Catálogo</a> ';
				if(is_array($resp) && count($resp)>0 ){
						$row .= '<ul role="menu" class="dropdown-menu">';
						foreach ($resp as $key => $dat) {  
							 $row .= '<li><a href="'.self::URL('categoria',$dat["url"]).'">'.$dat["categoria"].'</a></li>'; 
						}
						$row .= '</ul>'; 
					}
		$row .= '</li>'; 
		return  $row;
	}// method

	static public function ListaItemsPages($parent_id = 0) {
        $result = self::ItemPageController($parent_id);
        foreach($result as &$value) {
            $subresult = self::ListaItemsPages($value["id"]);
            if (count($subresult) > 0) {
                $value['children'] = $subresult;
             }
        }
        unset($value);
        return $result;
    }


	static public function ItemPageController($datos){

		$respuesta = Model::ItemPageModel($datos);
		return $respuesta;

	}



	/*++++++++++++++++++++++++++++++++++++ 
	//  Menu dinamico
	 ++++++++++++++++++++++++++++++++++++*/













	
	static public function GetSliderCatController(){
		$resp = Model::GetSliderCatModel();

		if(is_array($resp) && count($resp)>0 ){
			$row = null;
			$cont=0;

			foreach ($resp as $key => $dat) { 
				$mark = ($cont==0) ? 'active': null;
				 $row .= '<div class="item '. $mark.'">
				            <div class="container">
				                <div class="carousel-caption blank">
				                    <h1>'.$dat["descripcion"].'</h1>
				                    <p>'.$dat["categoria"].'</p>
				                    <p><a class="btn btn-lg btn-primary" href="#"" role="button">Ver mas</a></p>
				                </div>
				            </div>
				            <!-- Set background for slide in css -->
				            <div class="header-back " style="background: url(../'.$dat["imagen"].') 50% 0 no-repeat;"></div>
				        </div>';
				$cont ++;
			}
			echo $row;
		}
	}// method



	static public function GetSliderBulletCatController(){
		$resp = Model::GetSliderCatModel();

		if(is_array($resp) && count($resp)>0 ){
			$row = null;
			$cont=0;

			foreach ($resp as $key => $dat) { 
				$mark = ($cont==0) ? 'active': null;
				 $row .= '<li data-target="#inSlider" data-slide-to="'.$cont.'" class="'.$mark .'"></li>';
				$cont ++;
			}
			echo $row;
		}
	}// method



	
	static public function GetCategoryController(){
		if( !empty($_GET["id"]) )return Model::GetCategoryModel($_GET["id"]);
	}



	
	static public function GetDinamicSectionSubCategoriasController($id){

		$catQry = Model::GetSliderSubCatModel($id);
		if(is_array($catQry) && count($catQry)>0 ){
			$sector = null;
			$list = null;
			foreach ($catQry as $key => $datCat) { 
				$sector .= '<section id="cat-'.$datCat["id"].'" class="container services">
							     <div class="row">
							        <div class="col-lg-12 text-center">
							            <div class="navy-line"></div>
							            <h1>'.$datCat["subcategoria"].' </h1>
							            <p>'.$datCat["descripcion"].'  </p>
							        </div>

							        
							    </div>		
							    <div class="row"> 
							        '.self::GetProdRandomSubCatController($datCat["id"]).'     
							    </div>
							</section>';
							/*<div class="col-lg-12   m-t-n-lg wow zoomIn" style="margin-top:30px; margin-bottom:50px;">
					                <img src="../'.$datCat["imagen"].'" class="img-responsive" alt="'.$datCat["categoria"].'" style="border-radius:5px;">
					            </div>*/

			}
			echo $sector;
		}


		
	}// method




	
	static public function GetDinamicSectionCategoriasController(){

		$catQry = Model::GetSliderCatModel();
		if(is_array($catQry) && count($catQry)>0 ){
			$sector = null;
			$list = null;
			foreach ($catQry as $key => $datCat) { 
				$sector .= '<section id="cat-'.$datCat["id"].'" class="container services">
							     <div class="row">
							        <div class="col-lg-12 text-center">
							            <div class="navy-line"></div>
							            <h1>'.$datCat["categoria"].' </h1>
							            <p>'.$datCat["descripcion"].'  </p>
							        </div>

							        <div class="col-lg-12   m-t-n-lg wow zoomIn" style="margin-top:30px; margin-bottom:50px;">
					                <img src="../'.$datCat["imagen"].'" class="img-responsive" alt="'.$datCat["categoria"].'" style="border-radius:5px;">
					            </div>
							    </div>		
							    <div class="row"> 
							    '.self::GetProdRandomController($datCat["categoria"]).'         
							    </div>
							</section>';

			}
			echo $sector;
		}


		
	}// method





	
	static public function GetWhatsAppController(){
		$wht = self::GetSeccionSettingReturnController('Chat Whatsapp');

		if($wht=='Activo'){
			echo '<div id="small-chat"> 
				        <a class="btn btn-block btn-social btn-bitbucket" href="https://api.whatsapp.com/send?phone='.self::GetSeccionSettingReturnController('Telefonos').'&text=Hola, me pueden dar informes" target="_blank"  style="background: #0dc152; border-radius: 1.5em;">
				                         <span class="bold text-white">Chatea con nosotros</span>  <i class="fa fa-whatsapp text-white" style="font-style: 2.5em;"></i> 
				          </a>
				    </div>';
		}
	}










}






























