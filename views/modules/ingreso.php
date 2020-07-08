<?php


$ingreso = new ingresoController(); 

?>
<div class="middle-box text-center loginscreen animated fadeInDown">
        <div style="border:solid 1px #eee; padding: 1.3em; border-radius: 10px; background: #fff; ">
            <div align="center">

                <img src="views/img/<?php echo siteController::DatosSitioApp("logo");  ?>" width="80%">

            </div>
            <h3>Acceso</h3>
            <p>Introduzca sus datos para acceder. 
            </p>

             <form class="m-t" id="loginFormUser" role="form" method="post" action="" >
              <?php    

               $ingreso->IngresoUsuariosController(); 
               $ingreso->RecuperarUser();  
               ?>
                 
                <div class="form-group">
                    <input type="usuario" name="usuarioIngreso" class="form-control" placeholder="Usuario" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="passwordIngreso" class="form-control" placeholder="Password" required="">
                </div>

                <div class="form-group">
                    <span class="text-info" id="recuperar" style="cursor: pointer;">Recuperar Contraseña</span>
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                 
            </form>


            <form class="m-t" id="recoverFormUser" role="form" method="post" action="" style="display:none" >
                 <p class="text-warning">Coloque su email para envarle la contraseña.</p>
                <div class="form-group">
                    <input type="usuario" name="usuarioRecupera" class="form-control" placeholder="Email" required="">
                </div> 
                
                <div class="form-group">
                    <span class="text-info" id="volver" style="cursor: pointer;">Regresar</span>
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Enviar</button>

                 
            </form>

            <div class="row">
            <div class="col-md-12">
                <?php echo siteController::DatosSitioApp("Website");  ?> <br>&copy; Todos los derechos reservados. <small>  <?php echo date("Y");?></small>
            </div> 
        </div>
        </div>
    </div>











<div class="footer" style="color:#e7e7e7; text-align: center; background: transparent;border:0;">
         Power by @vansladia, Reality Pro &copy;
</div> <!-- footer -->