<?php 


$blog = new articuloController();
$dat = $blog->DatosArticuloIdController();

?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $dat["titulo"]; ?></h2>
                   <ol class="breadcrumb">
                        <li>
                             Edite la galería de imagenes de este artículo
                        </li> 
                    </ol>
                    
                </div>
                <div class="col-lg-2">

                </div>
</div>



<div id="imgSlide" class="wrapper wrapper-content animated fadeInRight " style="padding-bottom: 0px;">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Imagenes	 </h5>

                        <div class="ibox-tools">                               
                                <a href="index.php?bq=blog"> <div type="button" class="btn btn-default btn-xs  text-navy ">Regresar</div>  </a>
                         </div>

                    </div>

                    

                    <div class="ibox-content">
						<p align="center"><span class="fa fa-arrow-down"></span> Arrastra aquí tu imagen, tamaño recomendado: 600px * 600px (2 MB)</p>

					<ul id="galeriaArticulo" data="<?php echo $dat["id"]; ?>" data-url="<?php echo $_GET["id"];?>"> 
						<?php  

						$blog->ListaGaleriaControllers(); 
						
						?>
					</ul>

					<div style="min-height: 50px;">

					<button id="ordenarImgArt" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Slides</button>

					<button id="guardarImgArt" data="<?php echo $_GET["id"];?>" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden Slides</button>
                    </div> 

                     

                    </div> <!--ibox-content  -->
            </div> <!-- ibox float-e-margins --> 
        </div> <!-- col-lg-12 --> 
    </div> <!-- row -->
</div> <!--wrapper wrapper-content animated fadeInRight  -->





<div   class="wrapper wrapper-content animated fadeInRight ">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Editar del imagenes   </h5>
                    </div>
                    <div  id="textoSlide"  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    	<div class="hr-line-dashed"></div>
				
						<a name="edicionGaleria"></a>
                    	<ul id="ordenarTextSlide"  data-url="<?php echo $_GET["id"];?>">
							<?php   
							$blog->ListaEditGaleriaControllers();  
							?>  
						</ul>

				
                     

                    </div> <!--ibox-content  -->
            </div> <!-- ibox float-e-margins --> 
        </div> <!-- col-lg-12 --> 
    </div> <!-- row -->
</div> <!--wrapper wrapper-content animated fadeInRight  -->
