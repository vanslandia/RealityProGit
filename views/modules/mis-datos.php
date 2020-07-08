<?php

 
getHeader();


$usuario = new usuariosController();
$usuario->UpdateUsuarioController();
$dat = $usuario->UsuarioIdController($_SESSION["Id"]); 

?> 
 


 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Editar mi perfil</h2> 
                </div>
                <div class="col-lg-2">

                </div>
            </div>

<div class="wrapper wrapper-content  animated fadeInRight">
           


<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Datos de usuario <small> Modifique sus datos y de click en guardar.</small></h5>
                            <div class="ibox-tools"> 
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal"  enctype="multipart/form-data">
                                <div class="form-group"><label class="col-sm-2 control-label"  >Nombre</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="nombre" id="nombre"  value="<?php echo $dat["nombre"];?>" class="form-control" placeholder="Nombre completo"></div>
                                </div> 
                                <div class="form-group"><label class="col-sm-2 control-label" >Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" id="email"  value="<?php echo $dat["email"];?>" class="form-control"  placeholder="ejemplo@ejemplo.com"> 
                                        <small class="help-block m-b-none">Este será utilizado para acceder a la plataforma.</small>
                                    </div>
                                </div> 
                                <div class="form-group"><label class="col-sm-2 control-label"  >Password</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="password" id="password"  value="<?php echo DecriptacionVar($dat["password"],Keyboard);?>" placeholder="Mínimo 6 caractéres" class="form-control"  ></div>
                                </div> 
                                  
 
                                  <div class="form-group"><label class="col-sm-2 control-label">Nivel </label>

                                    <div class="col-sm-10">
                                            <select class="form-control m-b" name="nivel" id="nivel">
                                                <option <?php if($dat["nivel"]=="")echo 'selected';?>>Administrador </option> 
                                            </select> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Thumbail</label>
                                    <div class="col-md-6">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput"  >
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Seleccionar</span>
                                            <span class="fileinput-exists">Cambiar</span>
                                             <!--  accept="application/pdf" placeholder="*Solo archivos PDF"-->
                                            <input type="file" id="fileinput" name="filearchvo" value=""  /> 
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                </div>  <!-- fileinput -->
                                    </div>
                                    <small>Imagen en .JPG</small>
                                </div>




                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2"> 
                                        <input type="hidden" name="idEdit" id="idEdit" value="<?php echo PasarNumero($_SESSION["Id"]);?>">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


</div>

 <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
 </script>












     