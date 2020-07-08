<?php

 $site = new siteController();
 $site->URL();

 $page = new paginasController();
 $page->UpdatePaginaController();
 $dat = $page->PaginasDatosController();

?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Editar Página</h2>
                   <ol class="breadcrumb"> 
                    </ol>
                </div> 
</div>




<div  class="wrapper wrapper-content animated fadeInRight " style="padding-bottom: 0px;">
<form action="" method="POST" class="form-horizontal"  onsubmit="validarPage();return document.validado">
 <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><label class="label label-<?php Seo($dat["seo_titulo"],$dat["seo_slug"],$dat["seo_meta"]);?>" style="margin-right: 10px;"><i class="fa fa-check"></i></label>  SEO</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-down"></i>
                                </a> 
                                
                            </div>
                        </div>
                        <div class="ibox-content" style="display:none">
                           
                                <div class="form-group <?php if($dat["seo_titulo"]=="")echo 'has-error'; ?>">
                                    <label   class="sr-only">Titulo SEO</label>
                                    <input type="text" id="seo_titulo"  value="<?php echo $dat["seo_titulo"];?>"   name="seo_titulo" class="form-control" placeholder="Titulo | Sitio web"  >
                                </div>
                                <div class="form-group <?php if($dat["seo_slug"]=="")echo 'has-error'; ?> " >
                                    <label  class="sr-only">Slug</label>
                                    <input type="text" id="seo_slug" name="seo_slug" value="<?php echo $dat["seo_slug"];?>"  class="form-control " placeholder="Palabras clave separadas por comas"  >
                                </div>
                                <div class="form-group <?php if($dat["seo_meta"]=="")echo 'has-error'; ?> ">
                                    <label   class="sr-only">Meta Description</label>
                                    <textarea id="seo_meta" name="seo_meta" class="form-control" rows="3"><?php echo $dat["seo_meta"];?></textarea> 
                                </div> 
                            
                        </div>
                    </div>
                </div>
            </div>



    <div class="row">
        <div class="col-lg-12 ">
            <div class="ibox float-e-margins">
                 
                     <div class="ibox-content forum-container">

                
                    

                    <div class="form-group"> 
                    <label class="col-sm-1 control-label">Título</label>
                        <div class="col-sm-10">
                            <input type="text" name="tituloPagina"  id="tituloPagina"  value="<?php echo utf8_encode($dat["titulo"]);?>" placeholder="Título de página" class="form-control input-lg m-b">
                            <span class="help-block m-b-none"><small id="urlFriendly"><?php echo $site->URL(); ?>/<?php echo $dat["url"];?> </small>   </span>
                        </div>

                    </div>
                    <div class="hr-line-dashed"></div>


                    <div class="form-group">

                        <div class="col-sm-12"> 
                          <textarea name="descrip" id="descrip" class="summernote" rows="20" placeholder="Contenido de la página"><?php echo $dat["contenido"];?></textarea>
                           <div class="i-checks" id="box-sitios">
                        <label class="col-md-12  m-sm"> 
                            <input   type="checkbox" name="menuPrincipal" id="menuPrincipal" value="1" <?php if($dat["menu_principal"]==1)echo 'checked';  ?>> <i></i>Colocar en menu principal
                        </label>
                        <label  class="col-md-12  m-sm"> 
                            <input   type="checkbox" name="site_independeinte" id="site_independeinte" value="1" <?php if($dat["site_independeinte"]==1)echo 'checked';  ?>> <i></i>Sección Independiente
                        </label>
                    </div>            
                        </div>
                        <input type="hidden" id="publish" name="publish" value="1">
                        <input type="hidden" id="path" name="path" value="<?php echo $site->URL(); ?>">
                        <input type="hidden" id="url" name="url" value="<?php echo $dat["url"];?>">
                    
                    

                    </div>

                    <div class="form-group">
                                    <div class="col-sm-12 " align="center"> 
                                        <button type="submit" class="btn btn-primary" type="submit">Guardar</button>
                                    </div>
                      </div>



             

                            
                      </div>
            </div> <!-- ibox float-e-margins --> 
        </div> <!-- col-lg-12 --> 
    </div> <!-- row -->
       </form>
</div> <!--wrapper wrapper-content animated fadeInRight  -->


 <script>
$(document).ready(function () {

     $('.i-checks').iCheck({
          checkboxClass: 'icheckbox_square-green',
          radioClass: 'iradio_square-green',
     });
});
 </script>
