<?php

$inmueble = new inmueblesController(); 

$inmueble->PublicarInmueblesController(); 
$inmueble->BorrarInmueblesController();


 ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Inmuebles</h2>
                   <ol class="breadcrumb">
                        <li>
                            propiedades alojadas en el sistema
                        </li> 
                    </ol>
                </div> 
</div>



<div  class="wrapper wrapper-content animated fadeInRight " style="padding-bottom: 0px;">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Inmuebles </h5>
                    </div> 
                    <div class="ibox-content ibox-heading BuscadorSeccion">

                   <form id="form1" role="form" class="form-inline" name="form1" method="post" action="" onsubmit="validarBitacora();return document.validado"> 
 

                                                    <div class="form-group">
                                                        <label for="" class="sr-only">Suceso</label>
                                                        <input type="text" name="suceso" id="suceso" placeholder="Que desea buscar..." size="50"  class="form-control" >
                                                    </div> 
                                                    <input type="hidden" name="buscar" id="buscar" value="OK">
                                                    <button class="btn btn-primary" style="margin-top: 5px;" type="submit">Buscar</button>
                                        </form> 
                                    
                    </div> <!-- BuscadorSeccion -->

                    <div class="ibox-content" id="articulos">
					<div id="editarArticulo">
                        <div class="row">
                    <?php 
                     $inmueble->ListaInmueblesController();
                     ?> </div>
                     </div>

                    </div> <!--ibox-content  -->
            </div> <!-- ibox float-e-margins --> 
        </div> <!-- col-lg-12 --> 
    </div> <!-- row -->
</div> <!--wrapper wrapper-content animated fadeInRight  -->



