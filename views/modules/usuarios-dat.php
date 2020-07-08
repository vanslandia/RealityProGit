<?php

getHeader();


$usuario = new usuariosController();
$usuario->UpdateUsuarioController();
$dat = $usuario->UsuarioIdController(); 
 


?>

 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Modificar datos</h2> 
                </div>
                <div class="col-lg-2">

                </div>
            </div>

<div class="wrapper wrapper-content  animated fadeInRight">
           

<form method="post" name="addUsuario" id="addUsuario" class="form-horizontal"  onsubmit="validarUsuarioUser();return document.validado"   >
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
                                        <input type="text" name="nombre" id="nombre" value="<?php echo $dat["nombre"];?>"  class="form-control" placeholder="Nombre completo"></div>
                                </div> 
                                <div class="form-group"><label class="col-sm-2 control-label" >Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" id="email" value="<?php echo $dat["email"];?>"  class="form-control emailNuevo"  placeholder="ejemplo@ejemplo.com"> 
                                         
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label"  >Password</label>

                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Mínimo 6 caractéres" value="<?php echo DecriptacionVar($dat["password"],Keyboard);?>"  class="form-control" name="password" id="password"></div>
                                </div> 
                                 

                                  <div class="form-group"><label class="col-sm-2 control-label">Nivel </label>

                                    <div class="col-sm-3"> 
                                         <select name="nivel" id="nivel"  class="form-control" >
                                             <option value="Administrador" <?php if($dat["nivel"]=="Administrador")echo 'selected';?>>Administrador</option>
                                         </select>
                                    </div>
                                </div>


                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <input type="hidden" name="idEdit" value="<?php echo PasarNumero($dat["id"]);?>">
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

 
});
 </script>







     