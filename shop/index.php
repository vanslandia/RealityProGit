<?php 


require_once "Controller.php";
require_once "Model.php";
require_once "funciones.php";


$page = new Controller();


?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <?php $page->MetasController(); ?> 

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="../views/css/animate.css" rel="stylesheet">
    <link href="../views/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../views/css/plugins/slick/slick.css" rel="stylesheet">
    <link href="../views/css/plugins/slick/slick-theme.css" rel="stylesheet">


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
                    <?php $page->GetSeccionSettingController('logo'); ?>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right"> 
                        <?php  $page->MenuDinamico();   ?> 
                    </ul>
                </div>
            </div>
        </nav>
</div>

<?php 

$page->GetContenidoPageController(); 

$page->GetWhatsAppController(); 


?> 

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