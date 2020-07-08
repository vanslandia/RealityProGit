<?php 


require "Controller.php";
require "Model.php";
require 'funciones.php';


$page = new Controller();


$page->UpdateProductoController();
$page->DeleteProductoController();

$cart = $page->NumProdUpdateMontoProdutoController();
//$dat = $page->GetProdutoController();


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

                <div class="col-lg-12">

                    <div class="ibox">
                        <div class="ibox-title">
                            Seleccione su forma de pago
                        </div>
                        <div class="ibox-content">

                      





                            <div class="panel-group payments-method" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-right">
                                            <i class="fa fa-cc-paypal text-success"></i>
                                        </div>
                                        <h5 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">PayPal</a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h2>Resumen</h2>
                                                    <strong>Productos:</strong>  <?php echo $cart["items"]; ?> <br/>
                                                    <strong>Total:</strong>  <span class="text-navy"><?php if(!empty($cart["monto"])) echo "$".number_format($cart["monto"], 2)." MXN"; ?></span>

                                                    <p class="m-t">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                        nisi ut aliquip ex ea commodo consequat.

                                                    </p>


                                                    
                                                    <form  id="compra" name="compra" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_self">
                                                        <input type="hidden" name="cmd" value="_cart">
                                                        <input type="hidden" name="upload" value="1">
                                                        <input type="hidden" name="business" value="ivannss@msn.com">
                                                        <input type="hidden" name="item_name_1" value="Pedido <?php echo $cart["folio"];?>">
                                                        <input type="hidden" name="amount_1" value="<?php if(!empty($cart["monto"])) echo number_format($cart["monto"],2); ?>">
                                                        <input type="hidden" name="quantity_1" value="1">
                                                        <input type="hidden" value="http://imee-control.com/realitypro/shop" name="return"/>
                                                        <input type="hidden" value="http://imee-control.com/realitypro/shop" name="cancel_return"/>
                                                        <input type="hidden" value="MXN" name="currency_code"/>
                                                        <input type="hidden" name="cn" value="Message">
                                                        <button type="submit" class="btn btn-primary pull-right">
                                                            <i class="fa fa-cc-paypal"> </i> Pagar con Paypal
                                                        </button>
                                                    </form>

                                                   

                                                </div>

                                            </div>


                                             </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-right">
                                            <i class="fa fa-cc-amex text-success"></i>
                                            <i class="fa fa-cc-mastercard text-warning"></i> 
                                        </div>
                                        <h5 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Dineromail</a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse ">
                                         <div class="panel-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h2>Resumen</h2>
                                                    <strong>Productos:</strong>  <?php echo $cart["items"]; ?> <br/>
                                                    <strong>Total:</strong>  <span class="text-navy"><?php if(!empty($cart["monto"])) echo "$".number_format($cart["monto"], 2)." MXN"; ?></span>

                                                    <p class="m-t">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                        nisi ut aliquip ex ea commodo consequat.

                                                    </p>

                                                    <form  id="compra" name="compra" action="https://mexico.dineromail.com/Shop/Shop_Ingreso.asp" method="post" target="_self">
                                                        <input type="hidden" name="NombreItem" value="Pedido <?php echo $cart["folio"];?>">
                                                        <input type="hidden" name="TipoMoneda" value="1"> 
                                                        <input type="hidden" name="PrecioItem" value="<?php if(!empty($cart["monto"])) echo number_format($cart["monto"],2); ?>">
                                                        <input type="hidden" name="E_Comercio" value="89798498"> 
                                                        <input type="hidden" name="NroItem" value="-"> 
                                                        <input type="hidden" name="image_url" value="1"> 
                                                        <input type="hidden" name="DireccionExito" value="http://imee-control.com/realitypro/shop"> 
                                                        <input type="hidden" name="DireccionFracaso" value="http://imee-control.com/realitypro/shop">  
                                                        <button type="submit" class="btn btn-primary pull-right">
                                                            <i class="fa fa-cc-paypal"> </i> Pagar con Dineromail
                                                        </button>
                                                    </form>

                                                </div>

                                            </div>


                                             </div>

                                    </div>
                                 </div>
                                 <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-right">
                                            <i class="fa fa-cc-amex text-success"></i>
                                            <i class="fa fa-cc-mastercard text-warning"></i>
                                            <i class="fa fa-cc-visa text-danger"></i>
                                        </div>
                                        <h5 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTree">PayU</a>
                                        </h5>
                                    </div>
                                    <div id="collapseTree" class="panel-collapse collapse ">
                                         <div class="panel-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h2>Resumen</h2>
                                                    <strong>Productos:</strong>  <?php echo $cart["items"]; ?> <br/>
                                                    <strong>Total:</strong>  <span class="text-navy"><?php if(!empty($cart["monto"])) echo "$".number_format($cart["monto"], 2)." MXN"; ?></span>

                                                    <p class="m-t">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                        nisi ut aliquip ex ea commodo consequat.

                                                    </p>

                                                     

                                                    <form  method="post" action="https://gateway.payulatam.com/ppp-web-gateway/pb.zul" accept-charset="UTF-8">                                
                                                            <input name="buttonId" type="hidden" value="1"/>
                                                            <input name="merchantId" type="hidden" value="1"/>
                                                            <input name="accountId" type="hidden" value="1"/>
                                                            <input name="description" type="hidden" value="Prueba"/>
                                                            <input name="referenceCode" type="hidden" value="Pedido <?php echo $cart["folio"];?>"/>
                                                            <input name="amount" type="hidden" value="<?php if(!empty($cart["monto"])) echo number_format($cart["monto"],2); ?>"/>
                                                            <input name="tax" type="hidden" value="0"/>
                                                            <input name="taxReturnBase" type="hidden" value="0"/>
                                                            <input name="shipmentValue" value="0" type="hidden"/>
                                                            <input name="currency" type="hidden" value=""/>
                                                            <input name="lng" type="hidden" value="es"/>
                                                            <input name="approvedResponseUrl" type="hidden" value="http://imee-control.com/realitypro/shop"/>
                                                            <input name="declinedResponseUrl" type="hidden" value="http://imee-control.com/realitypro/shop"/>
                                                            <input name="pendingResponseUrl" type="hidden" value="http://imee-control.com/realitypro/shop"/>
                                                            <input name="paymentMethods" type="hidden" value=""/>
                                                            <input name="displayShippingInformation" type="hidden" value="NO"/>
                                                            <input name="sourceUrl" id="urlOrigen" value="" type="hidden"/>
                                                            <input name="buttonType" value="SIMPLE" type="hidden"/>
                                                            <input name="signature" value="" type="hidden"/>
                                                             <button type="submit" class="btn btn-primary pull-right">
                                                                <i class="fa fa-cc-paypal"> </i> Pagar con Paypal
                                                             </button>
                                                     </form>

                                                </div>

                                            </div>


                                             </div>

                                    </div>
                                 </div>


                           






                        </div> <!-- ibox -->

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
