<?php

getHeader();


 $site = new siteController();
 $site->URL();

$add = new productosController();
$add->GuardarProductoController(); 


?>

 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Alta de productos</h2> 
                </div>
                <div class="col-lg-2">

                </div>
            </div>

<div class="wrapper wrapper-content  animated fadeInRight">
           

<form method="post" name="addUsuario" enctype="multipart/form-data" id="addUsuario" class="form-horizontal"  onsubmit="validarProducto();return document.validado"  >
<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Datos del producto </h5>
                            <div class="ibox-tools"> 
                            </div>
                        </div>
                        <div class="ibox-content">
                            
                                <div class="form-group"><label class="col-md-2 control-label"  >Código</label>
                                    <div class="col-md-2">
                                        <input type="text" name="codigo" id="codigo"  class="form-control"  autocomplete="off" >
                                    </div>
                                    <label class="col-md-2 control-label"  >Tipo producto</label>
                                    <div class="col-md-2">
                                        <select name="tipo_producto" id="tipo_producto" class="form-control" >
                                            <option value="f">Físico</option>
                                            <option value="v">Virtual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-2 control-label"  >Nombre</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombre completo" required=""  autocomplete="off">
                                    <span class="help-block m-b-none"><small id="urlFriendly"> </small>   </span></div>

                                </div> 

                               <div class="form-group"><label class="col-md-2 control-label"  >Categoría</label>
                                    <div class="col-md-6">
                                        <?php echo $add->ListaCategoriasController(); ?>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-2 control-label"  >Subategoría</label>
                                    <div class="col-md-6">
                                        <select class="form-control m-b"  name="subcategoria" id="subcategoria" required="" >
                                        </select>
                                       <?php //echo $add->ListaSubCategoriasController(); ?>
                                       </div>
                                </div> 
                                 
                                <div class="form-group"><label class="col-md-2 control-label"  >Precio</label>
                                    <div class="col-md-3">
                                        <div class="input-group  "><span class="input-group-addon">$</span> <input type="text" class="form-control" name="precio" id="precio"> <span class="input-group-addon">MXN</span></div>
                                    </div>
                                 <label class="col-md-2 control-label"  >Precio anterior</label>
                                    <div class="col-md-3">
                                        <div class="input-group  "><span class="input-group-addon">$</span> <input type="text" class="form-control" name="precio_ant" id="precio_ant"> <span class="input-group-addon">MXN</span></div>
                                    </div>
                                </div> 
                                <div class="form-group"><label class="col-md-2 control-label"  >Descuento</label>
                                    <div class="col-md-2">
                                        <div class="input-group  "> <input  value="" placeholder="0" type="text" class="form-control" name="oferta" id="oferta" autocomplete="off">
                                         <span class="input-group-addon">%</span></div> 
                                    </div>
                                    <label class="col-md-2 control-label"  >Peso</label>
                                    <div class="col-md-2">
                                        <div class="input-group  "><input type="text" class="form-control" name="peso" id="peso"> <span class="input-group-addon">Kgs.</span></div>
                                    </div>
                                    <label class="col-md-2 control-label"  >Stock</label>
                                    <div class="col-md-2">
                                        <div class="input-group  "><input type="text" class="form-control" name="stock" id="stock"> <span class="input-group-addon">Unidades</span></div>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-md-2 control-label"  >Intro</label>
                                    <div class="col-md-10">
                                        <textarea name="intro" id="intro"   rows="2" class="form-control" placeholder="Intro para las listas de productos (opcional)" ></textarea> 
                                    </div>
                                </div> 
                                <div class="form-group"><label class="col-md-2 control-label"  >Descripción</label>
                                    <div class="col-md-10">
                                        <textarea name="descripcion" id="descripcion"   rows="6" class="form-control" placeholder="Descripcion del producto" ></textarea> 
                                    </div>
                                </div> 
                               <div class="form-group"><label class="col-md-2 control-label"  >Detalles</label>
                                    <div class="col-md-10">
                                        <textarea name="detalles" id="detalles"   rows="6" class="form-control" placeholder="Detalles del producto" ></textarea> 
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

                                 <div class="form-group"><label class="col-sm-2 control-label"  > Tags</label>
                                    <div class="col-sm-8"><input class="tagsinput form-control" id="tags" name="tags"  type="text" value=""/>
                                        <p class="small text-inof">Coloque el tag y de click fuera de la caja  de texto</p></div>
                                </div>

                                <div class="form-group"><label class="col-md-2 control-label"  > </label>
                                    <div class="col-md-10">
                                        <label> <input type="checkbox"  id="nuevo" name="nuevo" value="1"  class="i-checks"> Producto nuevo en el catálogo</label> 
                                        <small>(Producto de novedad)</small>
                                    </div>
                                </div> 

 


                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-2">
                                         <!--  -
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                    --> <input type="hidden" id="path" name="path" value="<?php echo $site->URL(); ?>/producto/">
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





     