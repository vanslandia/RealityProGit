<?php

getHeader();


 $site = new siteController();
 $site->URL();

$add = new productosController();
$add->UpdateSubCategoriasController();
$dat = $add->GetSubCategoriasController();

$thumb = $dat["imagen"];
if(file_exists($thumb))$thumb =$thumb; else $thumb = 'views/images/pattern.jpg';

?>

 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Editar de subcategoría</h2> 
                </div>
                <div class="col-lg-2">

                </div>
            </div>

<div class="wrapper wrapper-content  animated fadeInRight">
           

<form method="post" name="addUsuario" enctype="multipart/form-data" id="addUsuario" class="form-horizontal"  onsubmit="validarCategoria();return document.validado"  >
<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Datos de la subcategoría </h5>
                            <div class="ibox-tools"> 
                             </div>
                        </div>
                        <div class="ibox-content">
                            
                                <div class="form-group"><label class="col-sm-2 control-label"  >Portada</label>
                                    <div class="col-sm-3"><p class="static-form-control"> <img src="<?php echo $thumb;?>"  class="img-gd img-rounded "> </p> </div>
                                </div>
                                 <div class="form-group"><label class="col-sm-2 control-label"  >Categoría</label>
                                    <div class="col-sm-6">
                                         <?php echo $add->ListaCategoriasController($dat["categoria"]);  ?>
                                      </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label"  >Subcategoría</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="subcategoria" id="subcategoria" value="<?php echo $dat["subcategoria"];?>"  class="form-control"  autocomplete="off" ></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label"  >Oferta</label>
                                    <div class="col-sm-2">
                                        <div class="input-group  "> <input  value="<?php echo $dat["oferta"]; ?>" placeholder="0" type="text" class="form-control" name="oferta" id="oferta" autocomplete="off">
                                         <span class="input-group-addon">%</span></div> 
                                    </div>
                                    <div class="col-sm-8"><p class="static-form-control text-danger"><small>El descuento aplicará a todos los productos de la categoría.</small></p> </div>
                                </div>  
                                 
                                <div class="form-group"><label class="col-sm-2 control-label"  >Descripción</label>
                                    <div class="col-sm-10">
                                        <textarea name="descripcion" id="descripcion"   rows="6" class="form-control" placeholder="Descripcion del producto" ><?php echo $dat["descripcion"];?></textarea> 
                                    </div>
                                </div> 

                                   <div class="form-group"><label class="col-sm-2 control-label">Imagen en listas</label>

                                    <div class="col-sm-6"> 
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
                                            <small>Imagen de 300 x 300 px</small>
                                   
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label"  ></label>
                                    <div class="col-sm-8"><p class="static-form-control">Para cambiar la imagen de portada solo reemplace.</p> </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label"  > Tags</label>
                                    <div class="col-sm-8"><input class="tagsinput form-control" id="tags" name="tags"  type="text" value="<?php echo $dat["tags"];?>"/>
                                        <p class="small text-inof">Coloque el tag y de click fuera de la caja  de texto</p></div>
                                </div>

 
 
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <input type="hidden" id="path" name="path" value="<?php echo $site->URL(); ?>">
                                        <input type="hidden" id="url" name="url" value="<?php echo $dat["url"];?>">
                                        <button class="btn btn-primary" id="envio" type="submit">Guardar</button>
                                        
                                    </div>
                                </div>
                           
                        </div>
                    </div>
                </div>
            </div>


</div>


 

</form>
 

 <script>
     $('.tagsinput').tagsinput({
                tagClass: 'label label-primary'
            });
 </script>






     