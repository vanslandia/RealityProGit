<?php 


$lista = new bitacoraController();


?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Bítacora</h2>
                    <ol class="breadcrumb">
                        <li>
                             Sucesos ocurridos en la plataforma
                        </li> 
                    </ol>
                </div>
</div> <!-- row wrapper border-bottom white-bg page-heading  -->





<div class="row">
 <div class="col-lg-12 contSeccion">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Buscar</h5>
                                    <div class="ibox-tools">
                                       
                                    </div>
                                </div>
                                <div class="ibox-content ibox-heading BuscadorSeccion">

                                        <form id="form1" role="form" class="form-inline" name="form1" method="post" action="" onsubmit="validarBitacora();return document.validado"> 

			                                        <div class="col-sm-3 m-b-xs  " id="data_5">  
			                                            

				                                        <div class="input-group-date " style="  margin-top: 7px;">
				                                            <div class="input-daterange input-group" id="datepicker"  > 
				                                                    <input type="text" class="input-sm form-control fechaIni" name="fecha" placeholder=" &#xF073; Desde: " style="font-family:Arial, FontAwesome" value="<?php if(isset($_POST["fecha"]))echo $_POST["fecha"];?>" autocomplete="off"/>
				                                                    <span class="input-group-addon"> - </span> 
				                                                    <input type="text" class="input-sm form-control fechaSin"  name="fecha2" placeholder=" &#xF073; Hasta: " style="font-family:Arial, FontAwesome" value="<?php if(isset($_POST["fecha2"]))echo $_POST["fecha2"];?>"  autocomplete="off"/>
				                                                     
				                                            </div>
				                                        </div> 
			                                        </div> 


                                                    <div class="form-group">
                                                        <label for="" class="sr-only">Suceso</label>
                                                        <input type="text" name="suceso" id="suceso" placeholder="Que desea buscar..." size="50"  class="form-control" >
                                                    </div> 
                                                    <input type="hidden" name="buscar" id="buscar" value="OK">
                                                    <button class="btn btn-primary" style="margin-top: 5px;" type="submit">Buscar</button>
                                        </form> 
                                    
                                </div> <!-- BuscadorSeccion -->
                                <div class="ibox-content inspinia-timeline">

								<?php $lista->ListaSucesoController(); ?> 

								
                                </div> <!-- inspinia-timeline -->
                            </div> <!-- ibox float-e-margins -->
              </div>
 </div> <!-- row -->





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
