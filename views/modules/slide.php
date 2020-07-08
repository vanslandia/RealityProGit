<?php 


$slider = new sliderController(); 
$slider->SubirArchivosSlideSelect();


 ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Slide</h2>
                   <ol class="breadcrumb">
                        <li>
                             Galería de imagenes del sitio
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
                        <h5>Imagenes del slider  	 </h5>
                    </div> 

                    <div class="ibox-content">
                          <!--  Archivos -->
                                    <form enctype="multipart/form-data" method="post"  onsubmit="validarSubirArchivo();return document.validado">
                                               <div class="row">             
                                                            <div class="col-md-9 col-md-offset-1">
                                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> 
                                                                        <span class="fileinput-filename"></span></div>
                                                                    <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Seleccionar Archivo</span>
                                                                    <span class="fileinput-exists">Cambiar</span><input type="file"  name="archivoFile" id="archivoFile"></span>
                                                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                                            </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="submit" class="btn btn-primary">Subir</button>
                                                            </div>
                                                </div>
                                    </form> 
                                     <!--  Archivos -->  

						<p align="center"><span class="fa fa-arrow-down"></span> Arrastra aquí tu imagen, tamaño recomendado: 940px * 320px (2 MB)</p>

					<ul id="columnasSlide"> 
						<?php  
						$slider->ListaSlideControllers(); 
						
						?>
					</ul>

					<div style="min-height: 50px;">

					<button id="ordenarSlide" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Slides</button>

					<button id="guardarSlide" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden Slides</button>
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
                        <h5>Editar del slider   </h5>
                    </div>
                    <div  id="textoSlide"  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    	<div class="hr-line-dashed"></div>
				
						<a name="edicionGaleria"></a>
                    	<ul id="ordenarTextSlide">
							<?php   
							$slider->ListaEditSlideControllers();  
							?>  
						</ul>

				
                     

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
                        <h5>Slider   	 </h5>
                    </div>
                    <div  id="slide"  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

						<div class="hr-line-dashed"></div>

 					<div >
                            <div class="carousel slide" id="carousel2">
                                <ol class="carousel-indicators">
                                    <li data-slide-to="0" data-target="#carousel2"  class="active"></li>
                                    <li data-slide-to="1" data-target="#carousel2"></li>
                                    <li data-slide-to="2" data-target="#carousel2" class=""></li>
                                </ol>
                                <div class="carousel-inner" style="margin-bottom: 50px;">

                                	<?php   
										$slider->SlidePrevControllers();  
										?>  

                                  
                                </div>
                                <a data-slide="prev" href="#carousel2" class="left carousel-control">
                                    <span class="icon-prev"></span>
                                </a>
                                <a data-slide="next" href="#carousel2" class="right carousel-control">
                                    <span class="icon-next"></span>
                                </a>
                            </div> <!--  carousel slide-->
                              
							

					 
				
                     

                    </div> <!--ibox-content  -->
                    </div> <!--ibox-content  -->
            </div> <!-- ibox float-e-margins --> 
        </div> <!-- col-lg-12 --> 
    </div> <!-- row -->
</div> <!--wrapper wrapper-content animated fadeInRight  -->