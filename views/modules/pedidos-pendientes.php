<?php

 
getHeader();

$vent = new ventasController(); 
$vent->DeleteVentasController();

 
?> 


<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Pedidos pendientes</h2>
                   
                </div>
                <div class="col-lg-2">

                </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight ">
            <div class="row">
                <div class="col-lg-12 contSeccion">
                <div class="ibox float-e-margins"   style="padding-bottom: 0px; margin-bottom: 0px;">
                    <div class="ibox-title">
                        <h5>Últimos pendientes</h5>
                        <div class="ibox-tools">
                                    <a class="collapse-link">
                                        Buscar
                                        <i class="fa fa-chevron-down"></i>
                                    </a> 
                                </div>
                        
                    </div>
                     <div class="ibox-content ibox-heading" <?php if(empty($_POST["buscar"])) echo 'style="display:none"';  ?> >



                            <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                        <li class="<?php if(empty($_POST["avanzado"]))echo 'active'; ?>"><a data-toggle="tab" href="#tabs-1">  Buscar</a></li>                                         
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tabs-1" class="tab-pane <?php if(empty($_POST["avanzado"]))echo 'active'; ?>">
                                            <div class="panel-body">

                         <form method="post" name="addUsuario1" id="addUsuario1" class="form-horizontal" >   
                                <div class="form-group"> 
                                             <div class="col-md-3  " id="data_5">                                   
                                                <div class="input-group-date" style="position:absolute;"> 
                                                    <div class="input-daterange input-group" id="datepicker"  > 
                                                            <input type="text" class="input-sm form-control fechaIni" autocomplete="off"  name="start" placeholder="&#xF073; Desde: " style="font-family:Arial, FontAwesome" value="<?php if(isset($_POST["start"]))echo $_POST["start"];?>"/>
                                                            <span class="input-group-addon"> - </span> 
                                                            <input type="text" class="input-sm form-control fechaSin" autocomplete="off"  name="end" placeholder="&#xF073;  Hasta:" style="font-family:Arial, FontAwesome" value="<?php if(isset($_POST["end"]))echo $_POST["end"];?>" />
                                                     </div> 
                                                </div>  
                                              </div> <!--  --> 
                                                <div class="col-md-4 " > 
                                                    <input type="text" name="nombre" id="nombre" value="<?php if(isset($_POST["nombre"]))echo $_POST["nombre"];?>"  autocomplete="off"  class=" form-control" placeholder="Que desea buscar?" > 
                                                </div>
                                                <div class="col-md-2" > 
                                                    <?php $vent->ListaMetodoPagoController(); ?>
                                                </div> 
                                                 <div class="col-md-1 " >
                                                  <input type="hidden" name="buscar" id="buscar" value="OK">
                                                    <button class="btn btn-primary">Buscar</button>
                                                 </div> 
                                    </div>  <!--  form-group -->    
                           </form>
                                           
                                                
                                            </div> <!--  panel-body -->
                                        </div> <!-- tab-1 -->
                                        
                                        
                                    </div>  <!-- tab-content -->
                                </div> <!-- tabs-container -->

                       



                        </div>

                  
                </div>

                  <div class="ibox-content">

                        <div class="table-responsive">
                             <table class="table table-hover no-margins">
                                            <thead>
                                            <tr>
                                                <th>Fecha</th> 
                                                <th>Venta</th> 
                                                <th>Cliente</th>
                                                
                                                <th>Artículos</th> 
                                                <th>Envío</th>
                                                <td></td>
                                                <th>Método</th> 
                                                <th>Venta</th>
                                                <td></td> 
                                                <td></td>  
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $vent->ListasVentasController('Pendiente'); ?>
                                            </tbody>
                                        </table>
                        </div>

                    </div>
            </div>
            </div>
        </div>
 




<script>
 $(document).ready(function(){


  $('#data_5 .fechaSin').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
   });
  $('#data_5 .fechaIni').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
   });

 
 

});// jQuery 

</script>