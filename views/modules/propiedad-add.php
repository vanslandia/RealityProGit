<?php

$inmueble = new inmueblesController();
$inmueble->GuardarInmueblesController();
 


 ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Agregar Inmueble</h2>
                   <ol class="breadcrumb">
                        <li>
                            Completa los datos para agregar una propiedad
                        </li> 
                    </ol>
                </div> 
</div>



<div  class="wrapper wrapper-content animated fadeInRight " style="padding-bottom: 0px;">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Datos del inmueble </h5>
                    </div> 
                    <div class="ibox-content" > 


                        <div id="agregarArticulo"  >
        
                            <form enctype="multipart/form-data" method="post"  onsubmit="validarInmueble();return document.validado">

                                <input name="tituloNew" id="tituloNew" type="text" placeholder="Título" class="form-control"  autocomplete="off">

                                <input name="tipo_inmueble" id="tipo_inmueble" type="text" data-provide="typeahead" data-source='<?php echo $inmueble->TipoInmuebleController();?>' placeholder="Describa el tipo inmueble" class="form-control" autocomplete="off" >

                                <input name="precio" id="precio" type="text" placeholder=" $ 1,000 MXN" class="form-control" autocomplete="off" >  
                                
                                <p>Imagen para las listas (thumbail): 800px * 400px, peso máximo 2MB</p>

                                <div class="fileinput fileinput-new input-group" data-provides="fileinput"  >
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Seleccionar</span>
                                            <span class="fileinput-exists">Cambiar</span>
                                             <!--  accept="application/pdf" placeholder="*Solo archivos PDF"-->
                                            <input type="file" id="fileinput" name="imagen" value=""  /> 
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                </div>  <!-- fileinput -->
 

                                
                                <?php echo $inmueble->ComboTipoTransaccionInmuebleController(); ?>

                                <textarea name="descripcion" id="" cols="30" rows="5" placeholder="Descripción" class="form-control" style="margin-bottom: 10px;"></textarea>

                                <textarea name="googlemaps" id="" cols="30" rows="3" placeholder="<-- google maps -->" class="form-control" ></textarea>
                                <div class="hr-line-dashed"></div>
                                <input type="submit" id="guardarArticulo" class="btn btn-primary" value="Guardar">

                            </form>

                        </div>


                    </div> <!--ibox-content  -->
            </div> <!-- ibox float-e-margins --> 
        </div> <!-- col-lg-12 --> 
    </div> <!-- row -->
</div> <!--wrapper wrapper-content animated fadeInRight  -->





