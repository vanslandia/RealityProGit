<?php

$inmueble = new inmueblesController();
$inmueble->EditarInmueblesController();
$dat = $inmueble->DatosInmuebleIdController();
 


 ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Editar <?php echo $dat["titulo"]; ?></h2>
                   <ol class="breadcrumb">
                        <li>
                            Edite los datos del inmueble
                        </li> 
                    </ol>
                </div> 
</div>

<form enctype="multipart/form-data" method="post" class="form-horizontal" onsubmit="validarInmueble();return document.validado">


<div  class="wrapper wrapper-content animated fadeInRight " style="padding-bottom: 0px;">
   
  <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><label class="label label-primary" style="margin-right: 10px;">
                                <i class="fa fa-cog"></i></label>  Características</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-down"></i>
                                </a> 
                                
                            </div>
                        </div>
                        <div class="ibox-content" style="display:none">   


                                  <!--  
                                   <div class="col-md-2"><input type="text" placeholder=".col-md-2" class="form-control"></div>
                                   <div class="col-md-3"><input type="text" placeholder=".col-md-3" class="form-control"></div>
                                   <div class="col-md-4"><input type="text" placeholder=".col-md-4" class="form-control"></div>
                                    -->
<div class="form-group "  >                                  
    <div class="col-md-4"><input type="text" value="<?php echo $dat["sup_terreno"];?>" id="sup_terreno" name="sup_terreno" placeholder="Sup. Terreno" class="form-control"></div>
    <div class="col-md-4"><input type="text" value="<?php echo $dat["sup_contruccion"];?>" id="sup_contruccion" name="sup_contruccion" placeholder="Sup Construcción" class="form-control"></div>
    <div class="col-md-4"><input type="text" value="<?php echo $dat["recamaras"];?>" id="recamaras" name="recamaras" placeholder="Num. recamara" class="form-control"></div>
</div>   <!-- form-group -->
<div class="form-group rowDetail"  >  
    <div class="col-md-4"><input type="text" value="<?php echo $dat["banios"];?>" id="banios" name="banios" placeholder="Num. baños" class="form-control"></div>
    <div class="col-md-4"><input type="text" value="<?php echo $dat["estacioamientos"];?>" id="estacioamientos" name="estacioamientos" placeholder="Estacionamientos" class="form-control"></div>
    <div class="col-md-4"><input type="text" value="<?php echo $dat["antiguedad"];?>" id="antiguedad" name="antiguedad" placeholder="Antigüedad " class="form-control"></div>                        
</div>  <!-- form-group -->

<div class="form-group rowDetail"  >  
    <div class="col-md-4"><input type="text" value="<?php echo $dat["niveles"];?>" id="niveles" name="niveles" placeholder="Niveles" class="form-control"></div>
    <div class="col-md-4"><input type="text" value="<?php echo $dat["mantenimiento"];?>" id="mantenimiento" name="mantenimiento" placeholder="Mantenimiento" class="form-control"></div>
    <div class="col-md-4"><input type="text" value="<?php echo $dat["altura"];?>" id="altura" name="altura" placeholder="Altura " class="form-control"></div>                        
</div>  <!-- form-group -->
<div class="form-group rowDetail"  >  
    <div class="col-md-4"><input type="text" value="<?php echo $dat["patio_maniobras"];?>" id="patio_maniobras" name="patio_maniobras" placeholder="Patio Maniobras" class="form-control"></div>
    <div class="col-md-4"><input type="text" value="<?php echo $dat["subestacion"];?>" id="subestacion" name="subestacion" placeholder="Subestación" class="form-control"></div>
    <div class="col-md-4"><input type="text" value="<?php echo $dat["oficinas"];?>" id="oficinas" name="oficinas" placeholder="Oficinas " class="form-control"></div>                        
</div>  <!-- form-group -->
<div class="form-group rowDetail"  >  
    <div class="col-md-4"><input type="text" value="<?php echo $dat["area_rentable"];?>" id="area_rentable" name="area_rentable" placeholder="Area Rentable" class="form-control"></div>
    <div class="col-md-4"><input type="text" value="<?php echo $dat["elevadores"];?>" id="elevadores" name="elevadores" placeholder="Elevadores" class="form-control"></div>
    <div class="col-md-4"><input type="text" value="<?php echo $dat["uso_suelo"];?>" id="uso_suelo" name="uso_suelo" placeholder="Uso de suelo " class="form-control"></div>                        
</div>  <!-- form-group -->
<div class="form-group rowDetail"  >  
    <div class="col-md-4"><input type="text" value="<?php echo $dat["forma"];?>" id="forma" name="forma" placeholder="Forma" class="form-control"></div>
    <div class="col-md-4"><input type="text" value="<?php echo $dat["frente"];?>" id="frente" name="frente" placeholder="Frente" class="form-control"></div>
    <div class="col-md-4"><input type="text" value="<?php echo $dat["fondo"];?>" id="fondo" name="fondo" placeholder="Fondo " class="form-control"></div>                        
</div>  <!-- form-group -->
<div class="form-group rowDetail"  >  
    <div class="col-md-4"><input type="text" value="<?php echo $dat["topografia"];?>" id="topografia" name="topografia" placeholder="Topografia" class="form-control"></div>
    <div class="col-md-4"><input type="text" value="<?php echo $dat["llaves"];?>" id="llaves" name="llaves" placeholder="Llaves" class="form-control"></div>
    <div class="col-md-4"><input type="text" value="<?php echo $dat["frente_playa"];?>" id="frente_playa" name="frente_playa" placeholder="Frente playa " class="form-control"></div>                        
</div>  <!-- form-group -->


                        <div class="hr-line-dashed"></div>

                                <div class="row" >
                                <input type="submit" id="guardarArticulo" class="btn btn-primary" value="Guardar">
                                </div> <!-- row -->
                            
                        </div> <!-- ibox-content -->
                    </div>
                </div>
            </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="ibox float-e-margins">
               <div class="ibox-title">
                        <h5>Datos del inmueble </h5>
                        <div class="ibox-tools">
                            <a href="index.php?bq=propiedad-img&id=<?php echo PasarNumero($dat["id"]);?>">
                            <div type="button" class="btn btn-default btn-xs pull-right text-navy ">Galería imagenes</div>
                            </a>
                  </div>
                </div> 
                    <div class="ibox-content" > 

                         <div  id="arrastreImagenArticulo">
                            <p>Galería de imagenes</p>
                            <?php 
                        echo $inmueble->GaleriaThumbListcontroller($dat["id"]);             
                             ?>
                        </div>


                        <div id="agregarArticulo"  >
        
                            

                                <input name="tituloNew" id="tituloNew" type="text" value="<?php echo $dat["titulo"]; ?>" placeholder="Título" class="form-control" >

                                <input name="categoria" id="categoria" value="<?php echo $dat["categoria"]; ?>"  type="text" placeholder="Tipo inmueble" class="form-control" >
 
                                <input name="precio" id="precio" type="text" value="<?php echo $dat["precio"]; ?>" placeholder=" $ 1,000 MXN" class="form-control" autocomplete="off" >  
                                
                                <div class="row">
                                    <p>Seleccione otra imagen para las listas (thumbail): 800px * 400px, peso máximo 2MB</p>
                                    <div class="col-md-4" >
                                        <div id="arrastreImagenArticulo">    
                                            <div id="imagenArticulo"><img src="views/images/inmuebles/<?php echo $dat["imagen"]; ?>" class="img-thumbnail"></div>
                                        </div> 
                                    </div>
                                    <div class="col-md-8"  >
                                        <input type="file" name="imagen" id="imagen"  class="btn btn-default" id="subirFoto" >
                                    </div>
                                    
                                </div> <!-- row  -->
                                

                                

                                

                                <select name="tipo_transaccion" id="tipo_transaccion"  class="form-control"  style="margin-bottom: 10px;">
                                    <option value="Renta" <?php if( $dat["tipo_transaccion"]=="Renta") echo 'selected'; ?>>Renta</option>
                                    <option value="Venta" <?php if( $dat["tipo_transaccion"]=="Venta") echo 'selected'; ?>>Venta</option>
                                </select>

                                <textarea name="descripcion" id="" cols="30" rows="5" placeholder="Descripción" class="form-control" style="margin-bottom: 10px;"><?php echo $dat["descripcion"]; ?></textarea>

                                <textarea name="googlemaps" id="" cols="30" rows="3" placeholder="<-- google maps -->" class="form-control" ><?php echo $dat["googlemaps"]; ?></textarea>
                                
                                <input type="hidden" name="idEdit" id="idEdit" value="OK">
                                <input type="hidden" name="oldImg" id="oldImg" value="<?php echo $dat["imagen"]; ?>">
                                <input type="submit" id="guardarArticulo" class="btn btn-primary" value="Guardar">

                            

                        </div>




                    </div> <!--ibox-content  -->
            </div> <!-- ibox float-e-margins --> 
        </div> <!-- col-lg-12 --> 
    </div> <!-- row -->
</div> <!--wrapper wrapper-content animated fadeInRight  -->

</form>

