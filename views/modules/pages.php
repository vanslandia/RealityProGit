<?php

 $page = new paginasController();
 $page->PesonalizadoLinkPageController();
 $page->DeletePaginaController();
 $page->PublicarPageController();

 


 ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Páginas</h2>
                   <ol class="breadcrumb">
                        <li>
                            Secciones a editar
                        </li> 
                    </ol>
                </div> 
</div>



<div  class="wrapper wrapper-content animated fadeInRight " style="padding-bottom: 0px;">
    <div class="row">
        <div class="col-lg-4 ">
            <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Orden en el menu </h5>
                        <span class="pull-right" id="avisos"> </span>
                        <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-down"></i>
                                </a> 
                                
                            </div>
                        
                    </div> 
                     <div class="ibox-content " style="display:none;">
                          <form action="" method="POST" class="form-horizontal" >

                                <div class="form-group ">
                                    <input type="text" id="tituloLink"  value=""   name="tituloLink" class="form-control" placeholder="Titulo enlace " required="" >
                                </div>
                                <div class="form-group ">
                                    <input type="text" id="eLink"  value=""   name="eLink" class="form-control" placeholder="http://google.com" required="" >
                                </div>
                                 <div class="form-group">
                                    <div class="col-sm-12 "  align="right" > 
                                        <button type="submit" class="btn btn-primary" type="submit">Guardar</button>
                                    </div>
                                </div>

                          </form>
                     </div>
                    <div class="ibox-content2 orden_menu ">
<div class="dd" id="nestable"">
<?php                                        
    ArmarListaItemsPage($page->ListaItemsPages());

    function ArmarListaItemsPage($list) {?>
            <ol class="dd-list" id="listaMenu">  
                    <?php foreach($list as $item):   ?>                                                  
                     <li class="dd-item" data-id="<?php echo $item["id"]; ?>"> 
                        <div class="dd-handle" <?php if($item["menu_principal"]<>1)echo 'style="background: #FEEAEA"';  ?>> 
                            <span class="icon-move" ><i class="fa fa-bars text-navy"></i></span>    
                            <span class="bold" id="titulo<?php echo $item["id"]; ?>">
                                <?php if(!empty($item["url_personalizado"])) echo ' <i class="fa fa-link text-muted"></i>';  ?>
                                <?php echo utf8_encode($item["titulo"]); ?>
                                
                            </span>  
                        </div>
                        <?php if (array_key_exists("children", $item)): ?>
                        <?php ArmarListaItemsPage($item["children"]); ?>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
            </ol>
    <?php } ?>               
</div> <!-- nestable -->



                    </div> <!--ibox-content orden_menu  -->
            </div> <!-- ibox float-e-margins --> 
        </div> <!-- col-lg-12 --> 
 
        <div class="col-lg-8 ">
            <div class="ibox float-e-margins">
                    
                     <div class="ibox-content forum-container">
                        <h5>Es necesario publicar para que sean visibles</h5> 
                            <?php echo $page->ListPaginaController(); ?>
                        </div>
            </div> <!-- ibox float-e-margins --> 
        </div> <!-- col-lg-12 --> 
    </div> <!-- row -->
</div> <!--wrapper wrapper-content animated fadeInRight  -->



