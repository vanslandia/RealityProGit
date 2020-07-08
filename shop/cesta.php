<?php 


require "Controller.php";
require "Model.php";
require 'funciones.php';


$page = new Controller();


$page->UpdateProductoController();
$page->DeleteProductoController();

$cart = $page->NumProdUpdateMontoProdutoController();
$dat = $page->GetProdutoController();


?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>:: RealityPro Demo ::</title>

    <!-- Bootstrap core CSS -->
    <link href="../views/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="../views/css/animate.css" rel="stylesheet">
    <link href="../views/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../views/css/plugins/slick/slick.css" rel="stylesheet">
    <link href="../views/css/plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="../views/css/plugins/bootstrapSocial/bootstrap-social.css" rel="stylesheet">
    <link href="../views/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="../views/css/style.css" rel="stylesheet">
</head>
<body id="page-top" class="landing-page no-skin-config">
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php $page->GetSeccionSettingController(); ?>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="page-scroll" href="#page-top">Inicio</a></li>
                        <li><a class="page-scroll" href="#novedades">Novedades</a></li>
                        <li><a class="page-scroll" href="#contacto">Contacto</a></li>
                        <?php $page->GetCategoriasMenuLiController(); ?> 
                    </ul>
                </div>
            </div>
        </nav>
</div>
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php $page->GetSliderBulletCatController(); ?>
    </ol>
    <div class="carousel-inner" role="listbox">

        <?php $page->GetSliderCatController(); ?>
         


    </div>
    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



<section id="page-wrapper"  class="gray-bg" style="margin-left:0px; ">
       <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-md-9">

                    <div class="ibox">
                        <form method="post" name="formCart" id="formCart" class="form-horizontal"  >

                        <div class="ibox-title">
                            <span class="pull-right">(<strong><?php echo $cart["items"]; ?></strong>) items</span>
                            <h5>Productos agregados</h5>
                        </div>

                        <?php $page->ListProdCestaController();  ?>

                        
                        <div class="ibox-content"> 
                            
                            <a href="forma-pago.php?id=<?php echo $cart["cart"]?>">
                            <div class="btn btn-primary pull-right"><i class="fa fa fa-shopping-cart"></i> Pagar </div></a>
                            <button class="btn btn-warning pull-right" style="margin-right: .5em;"><i class="fa fa fa-refresh"></i> Actualizar cantidades </button>
                            <a href="index.php">
                            <div class="btn btn-white"><i class="fa fa-arrow-left"></i> Continuar comprando</div></a>

                        </div>
                    </form>
                    </div>

                </div>
                <div class="col-md-3">

                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Total</h5>
                        </div>
                        <div class="ibox-content">
                            <span>
                                Total
                            </span>
                            <h2 class="font-bold"> 
                                <?php if(!empty($cart["monto"])) echo "$".number_format($cart["monto"], 2)." MXN"; ?>
                                
                            </h2>

                            <hr/>
                            <span class="text-muted small">
                                *Precio con impuesto
                            </span>
                            <div class="m-t-sm">
                                <div class="btn-group">
                                <a href="forma-pago.php?id=<?php echo $cart["cart"]?>" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Pagar</a>
                                <a href="index.php" class="btn btn-white btn-sm"> Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ibox hide">
                        <div class="ibox-title">
                            <h5>Support</h5>
                        </div>
                        <div class="ibox-content text-center"> 

                            <h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
                            <span class="small">
                                Please contact with us if you have any questions. We are avalible 24h.
                            </span> 

                        </div>
                    </div>

                    <div class="ibox hide">
                        <div class="ibox-content">

                            <p class="font-bold">
                            Other products you may be interested
                            </p>

                            <hr/>
                            <div>
                                <a href="#" class="product-name"> Product 1</a>
                                <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                            <hr/>
                            <div>
                                <a href="#" class="product-name"> Product 2</a>
                                <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
</section>



<!-- Mainly scripts -->
<script src="../views/js/jquery-3.1.1.min.js"></script>
<script src="../views/js/bootstrap.min.js"></script>
<script src="../views/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="../views/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="../views/js/inspinia.js"></script>
<script src="../views/js/plugins/pace/pace.min.js"></script>
<script src="../views/js/plugins/wow/wow.min.js"></script>
<!-- slick carousel-->
<script src="../views/js/plugins/slick/slick.min.js"></script>
<script src="../views/js/plugins/sweetalert/sweetalert.min.js"></script>


<script>

function Eliminar(art, id){
        swal({
                        title: "Borrar !",
                        text: "Desea eliminar este artículo \n • "+art, 
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",       ///V:    1ab394      ///R:    DD6B55
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Borrar",
                        closeOnConfirm: false
                        }
                         ,function(isConfirm){   
                            if(isConfirm) window.location = "cesta.php?elim="+id;  
                        });
}



$(document).ready(function () {




 


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
