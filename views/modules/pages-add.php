<?php

 $site = new siteController();
 $site->URL();

 $page = new paginasController();
 $page->AgregarPaginaController();


?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Agregar Página</h2>
                   <ol class="breadcrumb"> 
                    </ol>
                </div> 
</div>




<div  class="wrapper wrapper-content animated fadeInRight " style="padding-bottom: 0px;">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="ibox float-e-margins">
                 
                     <div class="ibox-content forum-container">

                <form action="" method="POST" class="form-horizontal" onsubmit="validarPage();return document.validado">
                    

                    <div class="form-group"> 
                    <label class="col-sm-1 control-label">Título</label>
                        <div class="col-sm-10">
                            <input type="text" id="tituloPagina" name="tituloPagina" autocomplete="off" placeholder="Título de página" class="form-control input-lg m-b">
                            <span class="help-block m-b-none"><small id="urlFriendly"> </small>   </span>
                        </div>

                    </div>
                    <div class="hr-line-dashed"></div>


                    <div class="form-group">

                        <div class="col-sm-12"> 
                          <textarea name="descrip" class="summernote" rows="20" placeholder="Contenido de la página"></textarea>
                                       
                        </div>
                        <input type="hidden" id="path" name="path" value="<?php echo $site->URL(); ?>/">
                        <input type="hidden" id="url" name="url" value="">
                                
                    </div>

                    <div class="form-group">
                                    <div class="col-sm-12 " align="center"> 
                                        <button type="submit" class="btn btn-primary" type="submit">Guardar</button>
                                    </div>
                                </div>



                </form>

                            
                      </div>
            </div> <!-- ibox float-e-margins --> 
        </div> <!-- col-lg-12 --> 
    </div> <!-- row -->
</div> <!--wrapper wrapper-content animated fadeInRight  -->



