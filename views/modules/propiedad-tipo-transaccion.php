<?php

$cat = new inmueblesController();
$cat->GuardarTipotransaccionInmuebleController();

 
$cat->EditarTipoTransaccionInmuebleController();
$cat->BorrarTipotransaccionInmuebleController();


 ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Transacciones de inmueble</h2>
                   <ol class="breadcrumb">
                        <li>
                            Categorías alojadas en el sistema
                        </li> 
                    </ol>
                </div> 
</div>

<div  class="wrapper wrapper-content animated fadeInRight " style="padding-bottom: 0px;">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tipos de transaccion </h5>
                    </div>
                    <div class="ibox-content ibox-heading BuscadorSeccion">

                   <form id="form1" role="form" class="form-inline" name="form1" method="post" action="" require> 
                            <div class="form-group">
                                <label for="" class="">Agregar transacción</label>
                                <input type="text" name="tipoInmuebleAdd" id="tipoInmuebleAdd" placeholder="Agregar el nuevo tipo de inmueble" size="50"  class="form-control" required="" >
                            </div> 
                            <input type="hidden" name="buscar" id="buscar" value="OK">
                            <button class="btn btn-primary" style="margin-top: 5px;" type="submit">Guardar</button>
                    </form> 
                                    
                    </div> <!-- BuscadorSeccion -->
                     
                    <div class="ibox-content" id="articulos">
					<ul id="editarArticulo">
                    <?php 
                     $cat->ListaTipoTransaccionInmuebleController();
                     ?> 
                     </ul>

                    </div> <!--ibox-content  -->
            </div> <!-- ibox float-e-margins --> 
        </div> <!-- col-lg-12 --> 
    </div> <!-- row -->
</div> <!--wrapper wrapper-content animated fadeInRight  -->



