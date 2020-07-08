<?php

getHeader();


$add = new usuariosController();
$add->GuardarUsuarioController(); 


?>

 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Alta de envío</h2> 
                </div>
                <div class="col-lg-2">

                </div>
            </div>

<div class="wrapper wrapper-content  animated fadeInRight">
           

<form method="post" name="addUsuario" id="addUsuario" class="form-horizontal"  onsubmit="validarUsuario();return document.validado"  >
<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Datos del envío </h5>
                            <div class="ibox-tools"> 
                            </div>
                        </div>
                        <div class="ibox-content">
                            
                                <div class="form-group"><label class="col-sm-2 control-label"  >Título</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombre completo"></div>
                                </div> 
                                


                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                         <!--  -
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                    -->  <input type="hidden" name="sitiosSel">
                                        <button class="btn btn-primary" id="envio" type="submit">Guardar</button>
                                        
                                    </div>
                                </div>
                           
                        </div>
                    </div>
                </div>
            </div>


</div>


 

</form>
 






     