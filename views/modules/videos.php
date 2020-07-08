<?php 

$videos = new videoController();


?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Videos</h2>
                   <ol class="breadcrumb">
                        <li>
                            Videos del sitio
                        </li> 
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
</div>



<div class="wrapper wrapper-content animated fadeInRight " >
    <div class="row">
        <div class="col-lg-12 ">
            <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Clips cargados </h5>
                    </div>
                    <div class="ibox-content" id="videos"> 

                        <form method="post"  enctype="multipart/form-data" > 
                                <input type="file" name="archivo"   id="archivo"  class="btn btn-default" required=""> 

                        </form>
  
                            <ul id="galeriaVideo">
                                <?php  
                                $videos->ListaVideoController();
                                 ?>
                            </ul>
                    </div>
            </div> <!-- ibox float-e-margins --> 
        </div> <!-- col-lg-12 --> 
    </div> <!-- row -->
</div> <!--wrapper wrapper-content animated fadeInRight  -->



 


 