<?php

 $site = new siteController();
 $site->URL();
 
$blog = new articuloController();
$res = $blog->GuardarArticulosController();
 


 ?>
 <script src="views/editor/ckeditor.js"></script> 
<script src="views/editor/adapters/jquery.js"></script>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Agregar Blog</h2>
                   <ol class="breadcrumb">
                        <li>
                            Completa los datos para agregar un artículo
                        </li> 
                    </ol>
                </div> 
</div>



<div  class="wrapper wrapper-content animated fadeInRight " style="padding-bottom: 0px;">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Datos del artículo </h5>
                    </div> 
                    <div class="ibox-content" > 


                        <div id="agregarArticulo"  >
        
                            <form enctype="multipart/form-data" method="post" class="form-horizontal"  onsubmit="validarArticulo();return document.validado">


                                 <div class="form-group">
                                    <label class="col-sm-2 control-label"  >Título</label> 
                                    <div class="col-sm-10">
                                        <input type="text" name="tituloNew" id="tituloNew"  class="form-control" placeholder="Título del Artículo">
                                    </div><span class="help-block m-b-none col-sm-offset-2"><small id="urlFriendly"> </small>   </span>
                                </div> 

                                <div class="form-group">
                                    <label class="col-sm-2 control-label"  >Introducción</label> 
                                    <div class="col-sm-10">
                                        <textarea name="intro" id="intro"   rows="3" placeholder="Introducción del Articulo (170 caractéres)" class="form-control" maxlength="170"  ></textarea>
                                    </div>
                                </div> 

                                 <div class="form-group">
                                    <label class="col-sm-2 control-label"  >Video</label> 
                                    <div class="col-sm-10">
                                        <input name="video" type="text" placeholder="http://youtube.com/" class="form-control"  >
                                    </div> 
                                </div> 
                                
                                <div class="row">
                                        <p>Portada del artículo. Tamaño recomendado: 400px * 400px, peso máximo 2MB</p>
                                        <div class="col-md-4" >
                                            <div id="arrastreImagenArticulo">    
                                        </div>
                                        </div>
                                        <div class="col-md-8" >
                                    <input type="file" name="imagen" class="btn btn-default" id="subirFoto" >
                                     </div>
                                </div>

                                 <div class="form-group">
                                    <div class="col-sm-12 control-label  text-left bold"  ><div class="text-left">Descripción</div></div>  
                                    <div class="col-sm-12">
                                       <textarea name="descripcion"  class="summernoteBlog"  id="" cols="30" rows="10" placeholder="Contenido del Articulo" class="form-control" ></textarea>
                                        
                                    </div> 
                                </div> 


                                

                                

                                <div class="hr-line-dashed"></div>
                                <input type="hidden" id="path" name="path" value="<?php echo $site->URL(); ?>">
                                 <input type="hidden" id="url" name="url" value="">
                                <input type="submit" id="guardarArticulo" class="btn btn-primary" value="Guardar Artículo">

                            </form>

                        </div>


                    </div> <!--ibox-content  -->
            </div> <!-- ibox float-e-margins --> 
        </div> <!-- col-lg-12 --> 
    </div> <!-- row -->
</div> <!--wrapper wrapper-content animated fadeInRight  -->



