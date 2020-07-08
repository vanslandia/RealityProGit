<?php 
 

require_once "Controller.php";
require_once "Model.php";
require_once 'funciones.php';


$page = new Controller();
$dat = $page->GetProdutoController();
//var_dump($dat);


?> 
 <div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php //$page->GetSliderBulletCatController(); ?>
    </ol>
    <div class="carousel-inner" role="listbox">
                <div class="item active">
                            <div class="container">
                                <div class="carousel-caption blank">
                                    <h1><?php echo $dat["categoria"];?></h1>
                                    <p><?php echo $dat["descripcion"];?></p> 
                                </div>
                            </div>
                            <!-- Set background for slide in css -->
                            <div class="header-back " style="background: url(../<?php echo $dat["portada"];?>) 50% 0 no-repeat;"></div>
                        </div>
    </div>
     <!-- 
    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>-->
</div>



<section id="page-wrapper"  class="gray-bg" style="margin-left:0px; ">
<div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-md-5">


                                    <div class="product-images">

                                        <?php $page->GetImageProductoController($dat["id"]); ?> 


                                    </div>

                                </div>
                                <div class="col-md-7">
                                    <div class="  text-navy"><?php echo $dat["categoria"]; ?> / <?php echo $dat["subcategoria"]; ?></div>

                                    <?php echo  $nuevo = (!empty($dat["nuevo"])) ? '<div class="label label-warning pull-right">Producto NUEVO</div>' : null ; ?> 

                                    <h2 class="font-bold m-b-xs">
                                        <?php echo $dat["nombre"]; ?> 
                                    </h2>
                                    <div><small class="text-gray small pull-right"><?php echo $dat["codigo"]; ?> </small></div>
                                    <small><?php echo $dat["intro"]; ?></small>
                                    <div class="m-t-md"> 
                                        <h2 class="product-main-price" <?php echo $new = (!empty($dat["precio_ant"])) ? "style='text-decoration:line-through; ' ": null ; ?> >
                                            <?php echo $price = (!empty($dat["precio"])) ? "$ ".number_format($dat["precio"],2) ."MXN": null ; ?> <small class="text-muted hide">Exclude Tax</small> </h2>
                                            <?php echo $new = (!empty($dat["precio_ant"])) ? '<h1 class="product-main-price text-navy">$ '.number_format($dat["precio_ant"],2).' MXN</h1> ': null ; ?>
                                    </div>
                                    <hr>

                                    <h4>Descripción del Producto</h4>

                                    <div class="small text-muted">
                                        <?php echo $dat["descripcion"]; ?>
                                    </div>
                                    <dl class="small m-t-md">
                                        <?php echo $dat["detalles"]; ?>
                                    </dl>
                                    <div class="text-gray small">
                                        <?php echo $new = ($dat["tipo_producto"]=="f") ? " <i class='fa fa-archive text-muted'></i> ".number_format($dat["stock"])." en existencia": null ; ?> 
                                    </div>

                                    <div class="p-xs  text-right">
                                        <a class="btn btn-social-icon btn-facebook" href="<?php $page->GetSeccionSettingController('Facebook'); ?>"><span class="fa fa-facebook"></span></a>
                                        <a class="btn btn-social-icon btn-twitter" href="<?php $page->GetSeccionSettingController('Twitter'); ?>"><span class="fa fa-twitter"></span></a> 

                                    </div>
                                     

                                    <div class="p-xs  ">
                                        <h5 class="tag-title">Tags</h5>
                                        <ul class="tag-list" style="padding: 0">
                                            <?php Tag($dat["tags"]); ?>
                                            
                                        </ul>
                                    </div>
                                    <br>
                                     <div class="hr-line-dashed"></div>

                                    <br> 
                                     

                                    <div>
                                        <div class="btn-group">
                                            <button class="btn btn-primary btn-sm btnAgregar" data-id="<?php echo $dat["id"];?>" ><i class="fa fa-cart-plus"></i> Agregar al carro</button>
                                            <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Favorito </button>
                                            <button class="btn btn-white btn-sm"><i class="fa fa-envelope"></i> Contactar</button>
                                        </div>
                                    </div>



                                </div>
                            </div>

                        </div>
                        <div class="ibox-footer hide">
                            <span class="pull-right">
                                Full stock - <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
                            </span>
                            The generated Lorem Ipsum is therefore always free
                        </div>
                    </div>

                </div>
            </div>




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

 
<script>

$(document).ready(function () {

$(".btnAgregar").click(function(){
    var id = $(this).attr("data-id");

    console.log(id);

    var datos = new FormData();
        datos.append("id", id);
    //$(this).hide();

    $.ajax({
            url: "addCart.php",
            method:"POST",
            data:datos,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend: function(){
               //$(".btnAgregar").before("<div class='text-center small text-muted' id='loaderSts'><img src='../views/img/cargando.gif'> Guardando...</div>");
               $(".btnAgregar").html("<i class='fa fa-check'></i> Enviado");
            },
            success: function(respuesta){ 
                $("#loaderSts").remove();
                console.log("respuesta:", respuesta); 
                swal({
                        title: "Guardado !",
                        text:"El  artículo se guardo correctamente.",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#1ab394",     ///V:    1ab394      ///R:    DD6B55
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Ir al carrito",
                        closeOnConfirm: false
                        }
                        ,function(isConfirm){
                                if(isConfirm) window.location = "cesta.php";
                            }
                            ); 

                
                

            }

        });




});




         $('.product-images').slick({
            dots: true
        });


        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
});

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

</body>
</html>
