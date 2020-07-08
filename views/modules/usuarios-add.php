<?php

getHeader();


$add = new usuariosController();
$add->GuardarUsuarioController(); 


?>

 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Alta de usuarios</h2> 
                </div>
                <div class="col-lg-2">

                </div>
            </div>

<div class="wrapper wrapper-content  animated fadeInRight">
           

<form method="post" name="addUsuario" id="addUsuario" class="form-horizontal"  >
<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Datos del usuario </h5>
                            <div class="ibox-tools"> 
                            </div>
                        </div>
                        <div class="ibox-content">
                            
                                <div class="form-group"><label class="col-sm-2 control-label"  >Nombre</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombre completo"></div>
                                </div> 
                                <div class="form-group"><label class="col-sm-2 control-label" >Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" id="email" class="form-control emailNuevo" autocomplete="off"  placeholder="ejemplo@ejemplo.com"> 
                                         
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label"  >Password</label>

                                    <div class="col-sm-10">
                                        <input type="password" placeholder="Mínimo 6 caractéres" class="form-control"  autocomplete="off"  id="password" name="password"></div>
                                </div> 
                                 

                                  <div class="form-group"><label class="col-sm-2 control-label">Nivel </label>

                                    <div class="col-sm-3"> 
                                         <select name="nivel" id="nivel"  class="form-control" >
                                             <option value="Administrador">Administrador</option>
                                         </select>
                                    </div>
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
 






     