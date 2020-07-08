<?php

getHeader();


 $site = new siteController();
 $site->URL();

$add = new productosController();
$add->GuardarCategoriasController(); 


?>

 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Alta de categorías</h2> 
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
                            <h5>Datos de categoría </h5>
                            <div class="ibox-tools"> 
                            </div>
                        </div>
                        <div class="ibox-content">
                            
                                <div class="form-group"><label class="col-sm-2 control-label"  >Categoría</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="categoria" id="categoria"  class="form-control"  autocomplete="off" ></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label"  >Oferta</label>
                                    <div class="col-sm-2">
                                        <div class="input-group  "> <input  value="" placeholder="0" type="text" class="form-control" name="oferta" id="oferta" autocomplete="off">
                                         <span class="input-group-addon">%</span></div> 
                                    </div>
                                    <div class="col-sm-8"><p class="static-form-control text-danger"><small>El descuento aplicará a todos los productos de la categoría.</small></p> </div>
                                </div> 
                                 
                                <div class="form-group"><label class="col-sm-2 control-label"  >Descripción</label>
                                    <div class="col-sm-10">
                                        <textarea name="descripcion" id="descripcion"   rows="6" class="form-control" placeholder="Descripcion del producto" ></textarea> 
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
                                            <small>Imagen de 1900 x 500 px (de preferencia para que se adapte bien)</small>
                                   
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label"  > Tags</label>
                                    <div class="col-sm-8"><input class="tagsinput form-control" id="tags" name="tags"  type="text" value=""/>
                                        <p class="small text-inof">Coloque el tag y de click fuera de la caja  de texto</p></div>
                                </div>

 

 
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                         <!--  -
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                    --> <input type="hidden" id="path" name="path" value="<?php echo $site->URL(); ?>">
                                    <input type="hidden" id="url" name="url" value="">
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




     