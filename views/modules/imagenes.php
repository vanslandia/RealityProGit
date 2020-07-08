<?php 

 $galeria = new galeriaController();
 $galeria->SubirArchivosSilder();

?>
<div class="row wrapper border-bottom white-bg page-heading ">
                <div class="col-lg-10">
                    <h2>Imágenes</h2>
                   <ol class="breadcrumb">
                        <li>
                             Imagenes del sitio
                        </li> 
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
</div>



<div class="wrapper wrapper-content animated fadeInRight  "  >
    <div class="row">
        <div class="col-lg-12 ">
            <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Imagenes cargadas <small> **Seleccionar o arrastrar imagenes</small></h5>
                    </div>
                    <div class="ibox-content lightBoxGallery" id="galeria"> 

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

                        <p><span class="fa fa-arrow-down"></span>  Arrastra aquí tu imagen, tamaño recomendado: 600px * 600px</p>
                            
                            <ul id="lightbox" >
                                <?php  
                                $galeria->ListaGaleriaController();
                                 ?>
                                 <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                            
                            </ul>
                        <div class="row">
                            <button id="ordenarSlide" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Imágenes</button>
                            <button id="guardarSlide" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden</button>
                        </div><div id="blueimp-gallery" class="blueimp-gallery">
                                <div class="slides"></div>
                                <h3 class="title"></h3>
                                <a class="prev">‹</a>
                                <a class="next">›</a>
                                <a class="close">×</a>
                                <a class="play-pause"></a>
                                <ol class="indicator"></ol>
                            </div>
                    </div>
            </div> <!-- ibox float-e-margins --> 
        </div> <!-- col-lg-12 --> 


        <div class="col-md-12">
             <div class="ibox float-e-margins">
                 <div class="ibox-content"> 

               <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>

                    <tr>
                        <th>Imagen</th>
                        <th>URL</th> 
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                     
                     $galeria->ListaGaleriaURLController();

                     ?> 

                    
                    </table>
                        </div>
             </div> </div>
             

        </div>




    </div> <!-- row -->
</div> <!--wrapper wrapper-content animated fadeInRight  -->



 


 