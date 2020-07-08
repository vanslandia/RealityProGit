<!DOCTYPE html>
<html> 
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    <title>:: <?php echo siteController::DatosSitioApp("Website");  ?>  | Administración ::</title>

  
    <link href="views/css/bootstrap.css" rel="stylesheet">
    <link href="views/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="views/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="views/css/plugins/dataTables/datatables.min.css" rel="stylesheet"> 

    <link href="views/css/animate.css" rel="stylesheet">
    <link href="views/css/style.css" rel="stylesheet">
    <link href="views/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="views/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="views/css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="views/css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="views/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="views/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="views/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="views/css/plugins/bootstrap-markdown/bootstrap-markdown.min.css" rel="stylesheet">
    <link href="views/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="views/js/plugins/datapicker/bootstrap-datetimepicker.css" rel="stylesheet"> 
    <link href="views/css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="views/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="views/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
    <link href="views/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="views/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="views/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="views/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="views/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
    <link href="views/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="views/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">


    <!--                                     Mainly scripts                      -->
    
    <script src="views/js/jquery-3.1.1.min.js"></script>
    
    <script src="views/js/bootstrap.min.js"></script>
    <script src="views/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="views/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="views/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Flot -->
    <script src="views/js/plugins/flot/jquery.flot.js"></script>
    <script src="views/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="views/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="views/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="views/js/plugins/flot/jquery.flot.pie.js"></script>
    <!-- Peity -->
    <script src="views/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="views/js/demo/peity-demo.js"></script>

    <!-- jquery UI
    <script src="views/js/plugins/jquery-ui/jquery-ui.min.js"></script>-->
    <!-- GITTER --> 
    <script src="views/js/plugins/gritter/jquery.gritter.min.js"></script> 
    <!-- Touch Punch - Touch Event Support for jQuery UI 
    <script src="views/js/plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>-->

    <!-- Custom and plugin javascript -->
    <script src="views/js/inspinia.js"></script>
    <script src="views/js/plugins/pace/pace.min.js"></script>
    
    <!-- Toastr --> 
    <script src="views/js/plugins/toastr/toastr.min.js"></script>

    <!-- Sparkline -->
    <script src="views/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="views/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="views/js/plugins/chartJs/Chart.min.js"></script>
    <!-- iCheck -->
    <script src="views/js/plugins/iCheck/icheck.min.js"></script>
    <!-- TouchSpin -->
    <script src="views/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- Bootstrap markdown -->
    <script src="views/js/plugins/bootstrap-markdown/bootstrap-markdown.js"></script>
    <script src="views/js/plugins/bootstrap-markdown/markdown.js"></script>
    <!-- Typehead -->
    <!-- FooTable -->
    <script src="views/js/plugins/footable/footable.all.min.js"></script>
    
    <script src="views/js/plugins/typehead/bootstrap3-typeahead.min.js"></script>
    <!-- Data picker -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
   <script src="views/js/plugins/datapicker/bootstrap-datepicker.js"></script>
   <script src="views/js/plugins/datapicker/bootstrap-datetimepicker.js"></script>
   <script src="views/js/plugins/sweetalert/sweetalert.min.js"></script>
   <!-- Jasny -->
    <script src="views/js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <!-- blueimp gallery -->
    <script src="views/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>



    <!-- ChartJS-->
    <script src="views/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Nestable List -->
    <script src="views/js/plugins/nestable/jquery.nestable.js"></script>
    <!-- IonRangeSlider -->
    <script src="views/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
    <!-- Flot -->
    <script src="views/js/plugins/flot/jquery.flot.js"></script>
    <script src="views/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="views/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="views/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="views/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="views/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="views/js/plugins/flot/curvedLines.js"></script>
    <!-- Switchery -->
    <script src="views/js/plugins/switchery/switchery.js"></script>

    <script src="views/js/plugins/ladda/spin.min.js"></script>
    <script src="views/js/plugins/ladda/ladda.min.js"></script>
    <script src="views/js/plugins/ladda/ladda.jquery.min.js"></script>
    <script src="views/js/plugins/steps/jquery.steps.min.js"></script>
    <!-- blueimp gallery -->
    <script src="views/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>


    <!-- ChartJS-->
    <script src="views/js/plugins/chartJs/Chart.min.js"></script>
    <!-- Nestable List -->
    <script src="views/js/plugins/nestable/jquery.nestable.js"></script>

    <!-- IonRangeSlider -->
    <script src="views/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
 

    <!-- Flot -->
    <script src="views/js/plugins/flot/jquery.flot.js"></script>
    <script src="views/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="views/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="views/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="views/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="views/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="views/js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Jvectormap 
    <script src="views/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="views/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->

    <!-- EayPIE -->
    <script src="views/js/plugins/easypiechart/jquery.easypiechart.js"></script>


    <!-- Sparkline -->
    <script src="views/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="views/js/demo/sparkline-demo.js"></script>
    <script src="views/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="views/js/main.js?<?php echo rand(5, 5000);?>"></script>
    <script src="views/js/plugins/summernote/summernote.min.js"></script>
 

  
</head>

<body   <?php getLogin(); ?>   class="<?php miniMenu();?>">
    <div id="wrapper">
        <?php 
        getNav();
        ?>

        <div id="page-wrapper" class="gray-bg">
               <?php  
               getHeader();
                 
                ?>
                <div class="wrapper wrapper-content"> 
                       <?php  
                        $modulo = new modulosController();
                        $modulo->LoadModulosController();
                        getFooter();
                        
                        ?>

                </div> <!--wrapper wrapper-content  -->
        
        </div> <!--page-wrapper  -->
    </div> <!--wrapper  -->

    
</body>

</html>
