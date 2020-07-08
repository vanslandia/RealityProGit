<?php

getHeader();


 $site = new siteController();
 $site->URL();

$add = new productosController();
$add->UpdateProductoController();
$add->BorrarArchivosProdSilder();
$add->SubirArchivosProdSilder();
$add->SubirArchivosProdSelect();

$dat = $add->GetProductoController();

$thumb = $dat["imagen"];
if(file_exists($thumb))$thumb = $thumb; else $thumb = 'views/images/pattern.jpg';

//var_dump($dat);

?>

 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Editar de producto <?php echo $dat["nombre"]; ?></h2> 
                </div>
                <div class="col-lg-2">
                        
                </div>
            </div>

<div class="wrapper wrapper-content  animated fadeInRight">
           

<form method="post" name="addUsuario" enctype="multipart/form-data" id="addUsuario" class="form-horizontal"  onsubmit="validarProducto();return document.validado"  >
<div class="row">
                <div class="col-lg-12">





                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="<?php if(empty($_GET["tab"]) )echo "active";?>"><a data-toggle="tab" href="#tab-1">Datos del Producto</a></li>
                            <li class="<?php if(!empty($_GET["tab"]) && $_GET["tab"] =="tab-2")echo "active";?>"><a data-toggle="tab" href="#tab-2">Galería de imágenes</a></li>
                            <li class="<?php if(!empty($_GET["tab"]) && $_GET["tab"] =="tab-3")echo "active";?>"><a data-toggle="tab" href="#tab-3">Archivos relacionados</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane <?php if(empty($_GET["tab"]))echo "active";?> ">
                                <div class="panel-body">

                                    <div class="ibox-content">
                            
                                <div class="form-group"><label class="col-md-2 control-label"  >Portada</label>
                                    <div class="col-md-3"><p class="static-form-control"> 
                                        <img src="<?php echo $thumb;?>" class="img-sm img-rounded " style="width: 80px; height: 80px;"> </p> </div>
                                </div>
                                <div class="form-group"><label class="col-md-2 control-label"  >Código</label>
                                    <div class="col-md-2">
                                        <input type="text" value="<?php echo $dat["codigo"]; ?>" name="codigo" id="codigo"  class="form-control"  autocomplete="off" >
                                    </div>
                                     <label class="col-md-2 control-label"  >Tipo producto</label>
                                    <div class="col-md-2">
                                        <select name="tipo_producto" id="tipo_producto" class="form-control" >
                                            <option value="f" <?php if($dat["tipo_producto"]=="f")echo 'selected'; ?>>Físico</option>
                                            <option value="v" <?php if($dat["tipo_producto"]=="v")echo 'selected'; ?>>Virtual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-2 control-label"  >Nombre</label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo $dat["nombre"]; ?>" name="nombre" id="nombre"  class="form-control" placeholder="Nombre completo" required=""  autocomplete="off">
                                    <span class="help-block m-b-none"><small id="urlFriendly"><?php echo $site->URL(); ?>/producto/<?php echo $dat["elink"]; ?></small>   </span></div>
                                </div> 

                                <div class="form-group"><label class="col-md-2 control-label"  >Categoría</label>
                                    <div class="col-md-6">
                                        <?php echo $add->ListaCategoriasController($dat["categoria"]); ?>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-2 control-label"  >Subategoría</label>
                                    <div class="col-md-6">
                                       <?php echo $add->ListaSubCategoriasController($dat["categoria"], $dat["subcategoria"]); ?>
                                       </div>
                                </div> 
                                  
                                <div class="form-group"><label class="col-md-2 control-label"  >Precio</label>
                                    <div class="col-md-3">
                                        <div class="input-group  "><span class="input-group-addon">$</span> <input  value="<?php echo $dat["precio"]; ?>" type="text" class="form-control" name="precio" id="precio"> <span class="input-group-addon">MXN</span></div>
                                    </div><label class="col-md-2 control-label"  >Precio anterior</label>
                                    <div class="col-md-3">
                                        <div class="input-group  "><span class="input-group-addon">$</span> <input  value="<?php echo $dat["precio_ant"]; ?>" type="text" class="form-control" name="precio_ant" id="precio_ant"> <span class="input-group-addon">MXN</span></div>
                                    </div>
                                </div> 

                                 <div class="form-group"><label class="col-md-2 control-label"  >Descuento</label>
                                    <div class="col-md-2">
                                        <div class="input-group  "> <input  value="<?php echo $dat["oferta"]; ?>" placeholder="0" type="text" class="form-control" name="oferta" id="oferta" autocomplete="off">
                                         <span class="input-group-addon">%</span></div> 
                                    </div>
                                    <label class="col-md-2 control-label"  >Peso</label>
                                    <div class="col-md-2">
                                        <div class="input-group  "><input type="text" value="<?php echo $dat["peso"]; ?>" class="form-control" name="peso" id="peso"> <span class="input-group-addon">Kgs.</span></div>
                                    </div>
                                    <label class="col-md-2 control-label"  >Stock</label>
                                    <div class="col-md-2">
                                        <div class="input-group  "><input type="text" class="form-control"  value="<?php echo $dat["stock"]; ?>"  name="stock" id="stock"> <span class="input-group-addon">Unidades</span></div>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-md-2 control-label"  >Intro</label>
                                    <div class="col-md-10">
                                        <textarea name="intro" id="intro"   rows="2" class="form-control" placeholder="Intro para las listas de productos (opcional)" ><?php echo $dat["intro"]; ?></textarea> 
                                    </div>
                                </div> 
                                <div class="form-group"><label class="col-md-2 control-label"  >Descripción</label>
                                    <div class="col-md-10">
                                        <textarea name="descripcion" id="descripcion"   rows="6" class="form-control" placeholder="Descripcion del producto" ><?php echo $dat["descripcion"]; ?> </textarea> 
                                    </div>
                                </div> 
                                <div class="form-group"><label class="col-md-2 control-label"  >Detalles</label>
                                    <div class="col-md-10">
                                        <textarea name="detalles" id="detalles"   rows="6" class="form-control" placeholder="Detalles del producto" ><?php echo $dat["detalles"]; ?></textarea> 
                                    </div>
                                </div> 

                                   <div class="form-group"><label class="col-md-2 control-label">Imagen en listas</label>

                                    <div class="col-md-6"> 
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput" >
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Seleccionar</span>
                                            <span class="fileinput-exists">Cambiar</span>
                                            <input type="file" id="imagen" name="imagen" value="" accept="application/jpg" placeholder="*Solo archivos JPG" />
                                             
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                            </div>  <!-- fileinput -->
                                            </div> 
                                            <small>Imagen de 100 x 100 px</small>
                                   
                                </div>
                                <div class="form-group"><label class="col-md-2 control-label"  ></label>
                                    <div class="col-md-8"><p class="static-form-control">Para cambiar la imagen de portada solo reemplace.</p> </div>
                                </div>

                                 <div class="form-group"><label class="col-sm-2 control-label"  > Tags</label>
                                    <div class="col-sm-8"><input class="tagsinput form-control" id="tags" name="tags"  type="text" value="<?php echo $dat["tags"];?>"/>
                                        <p class="small text-inof">Coloque el tag y de click fuera de la caja  de texto</p></div>
                                </div>

                                 <div class="form-group"><label class="col-md-2 control-label"  > </label>
                                    <div class="col-md-10">
                                        <label> <input type="checkbox" id="nuevo" name="nuevo" value="1"     class="i-checks" <?php if($dat["nuevo"]>0)echo 'checked'; ?>> Producto nuevo en el catálogo</label> 
                                        <small>(Producto de novedad)</small>
                                    </div>
                                </div> 

 


                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-2">
                                        <input type="hidden" id="path" name="path" value="<?php echo $site->URL(); ?>/producto/">
                                        <input type="hidden" id="url" name="url" value="<?php echo $dat["elink"]; ?>">
                                        <button class="btn btn-primary" id="envio" type="submit">Guardar</button>
                                        
                                    </div>
                                </div>
                           
                        </div>
    </form>
                                    
                                </div> <!--panel-body  -->
                            </div>
                            <div id="tab-2" class="tab-pane <?php if(!empty($_GET["tab"]) && $_GET["tab"] =="tab-2")echo "active";?>">
                                 <div class="panel-body" id="imgSlide">


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



                                      <div class="ibox-content">
                                            <p align="center"><span class="fa fa-arrow-down"></span> Arrastra aquí tu imagen JPG, tamaño recomendado: 600px * 600px (2 MB)</p>

                                        <ul id="galeriaProducto" data="<?php echo $dat["id"]; ?>" data-url="<?php echo $_GET["id"];?>"> 
                                            <?php  

                                            $add->ListaGaleriaProductoControllers(); 
                                            
                                            ?>
                                        </ul>

                                        <div style="min-height: 50px;">

                                        <button id="ordenarImgProduct" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Slides</button>

                                        <button id="guardarImgProduct" data="<?php echo $_GET["id"];?>" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden Slides</button>
                                        </div> 

                                         

                                        </div> <!--ibox-content  -->


                                           
                                                            <div  id="textoSlide"  class="col-lg-12  ">

                                                                <div class="hr-line-dashed"></div>
                                                        
                                                                <a name="edicionGaleria"></a>
                                                                <ul id="ordenarTextSlide" style="border:none;" data-url="<?php echo $_GET["id"];?>">
                                                                    <?php   
                                                                    $add->ListaEditGaleriaProductoControllers();  
                                                                    ?>  
                                                                </ul>

                                                        
                                                             

                                                            </div> <!--ibox-content  --> 

                                    
                                </div> <!--panel-body  -->
                            </div>
                            <div id="tab-3" class="tab-pane <?php if(!empty($_GET["tab"]) && $_GET["tab"] =="tab-3")echo "active";?>">
                                 <div class="panel-body">




                                    <div class="ibox-content" > 
                                         <!--  Archivos -->
                                        <form enctype="multipart/form-data" method="post"  onsubmit="validarSubirArchivo();return document.validado">
                                                   <div class="row">  

                                                                <div class="col-md-5">
                                                                    <input type="text" name="nombrefile" class="form-control" id="nombrefile" value="" placeholder="Nombre del archivo" required="">
                                                                </div>


                                                                <div class="col-md-5 ">
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

                                                                <p><span class="fa fa-arrow-up"></span> Seleccione cualquier tipo de archivo menor a 3 MB</p>
                                                                
                                                                <div class="row">
                                                                <div class="ibox-content">
                                                                    <div class="col-lg-12 animated fadeInRight">
                                                                          <div class="row">
                                                                               <div class="col-lg-12">
                                                                        <?php  
                                                                        $add->ListaArchivosController();
                                                                         ?>
                                                                              </div>
                                                                          </div>
                                                                    </div>
                                                               </div>
                                                           </div>


                                                            </div>




                                    
                                </div> <!--panel-body  -->
                            </div>
                        </div>


                    </div> <!-- tab-container -->




 
                </div>
            </div>


</div>


 


 
 
<script>
            $(document).ready(function () {


                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });


                 $('.tagsinput').tagsinput({
                tagClass: 'label label-primary'
            });




            });
</script>





     