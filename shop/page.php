<?php 
require_once "Controller.php";
require_once "Model.php";
require_once "funciones.php";
$page = new Controller();

$dat = $page->GetContenidoPageSQLController();

?>
<section id="" class="container p-lg" style="background: #f9f9f9; padding-top: 7em;" >
     <div class="row" style="border: solid 1px;">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1 class="text-danger"><?php echo utf8_encode($dat["titulo"]); ?> </h1>
            <p>Publicado el <?php echo PresentarFecha($dat["fecha"]); ?> </p>
        </div>
    </div>

    <div class="row m-lg  ">     
         <?php echo ArmarContenido(nl2br(utf8_decode($dat["contenido"]))); ?> 
    </div>


</section>


<section id="contacto" class="gray-section contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Contactanos</h1>
                <p>En breve resolveremos cualquier duda que tenga.</p>
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-3 col-lg-offset-3">
                <address>
                    <strong><span class="navy"><?php $page->GetSeccionSettingController('Website'); ?></span></strong><br/>
                    <?php 
                    $page->GetSeccionSettingController('Direccion');
                    $page->GetSeccionSettingController('Telefonos'); ?>
                </address>
            </div>
            <div class="col-lg-4">
                <p class="text-color">
                  <?php $page->GetSeccionSettingController('Texto Contacto'); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:<?php $page->GetSeccionSettingController('Contacto'); ?>" class="btn btn-primary">Enviar email</a>
                <p class="m-t-sm">
                    Tambien puedes seguirnos en nuestras redes sociales
                </p>
                <ul class="list-inline social-icon">
                    <li><a href="<?php $page->GetSeccionSettingController('Twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="<?php $page->GetSeccionSettingController('Facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="<?php $page->GetSeccionSettingController('Linkedin'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li><a href="<?php $page->GetSeccionSettingController('Youtube'); ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                    </li>
                    <li><a href="<?php $page->GetSeccionSettingController('Vimeo'); ?>" target="_blank"><i class="fa fa-vimeo"></i></a>
                    </li>
                    <li><a href="<?php $page->GetSeccionSettingController('Pinterest'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p><strong>&copy; <?php echo date("Y"); ?> <?php $page->GetSeccionSettingController('Website'); ?></strong><br/> 
                    Esta es una marca registrada y tiene todos los derechos reservados.
                </p>
            </div>
        </div>
    </div>
</section>