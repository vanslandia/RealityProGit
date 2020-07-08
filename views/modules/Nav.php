<?php 
$site = new siteController(); 
$alert = new notificacionController();
$user = new usuariosController();
$user->UpdateMyDataUsuarioController();
$dat = $user->UsuarioIdController($_SESSION["Id"]); 




$image = $_SESSION["Thumbail"];
if(file_exists($image) )$image = $_SESSION["Thumbail"]; else $image ='views/img/profile_small.jpg?'.mt_rand(1,500);


?>
<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu"  >
                <li class="nav-header">
                    <div class="dropdown profile-element" data-toggle="modal" data-target="#editMyData" style="cursor:pointer">   <span>
                             <img alt="image" class="img-circle" src="<?php echo $image;?>" width="48" />
                             </span>
                            <span class="clear"> <span class="block m-t-xs"> 
                                <strong class="font-bold text-white"><?php echo $_SESSION["Usuario"];?></strong>
                             </span> 
                           
                             <span class="text-white text-xs block"><small><?php echo $_SESSION["Nivel"];?> </small><i class="fa fa-cog text-white" style="opacity: .5"></i> </span>
                            
                              </span>   
                       
                    </div>
                    <div class="logo-element">
                         <?php $site->LogoController();  ?>
                    </div>
                </li>

<!--
*////////////////////////////////////////////////////
*  Administrador 
*///////////////////////////////////////////////////
-->
                <li  <?php ActiveMenu($_GET["bq"], 'setting');?>   >   
                    <a href="index.php?bq=setting"  ><i class="fa fa-th-large"></i> 
                        <span class="nav-label">Sitio</span> </a>
                 </li>
                 <li  <?php ActiveMenu($_GET["bq"], 'bitacora');?>   >  
                    <a href="index.php?bq=bitacora"  ><i class="fa fa-bars"></i> 
                        <span class="nav-label">Bitácora</span> </a>
                 </li>
              
                <li  <?php ActiveMenu($_GET["bq"], 'usuarios-dat,usuarios-add,usuarios');?>   >   
                    <a href="index.php?bq=usuarios"><i class="fa fa-user"></i> 
                        <span class="nav-label">Usuarios</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li ><a href="index.php?bq=usuarios-add">Agregar Usuario</a></li>
                        <li  ><a href="index.php?bq=usuarios">Usuarios <?php echo $alert->Usuarios(); ?></a></li>
                    </ul>
                </li>
                <?php if($site->AdminSeccionController('Chat') === true){ ?>  
                     <li  <?php ActiveMenu($_GET["bq"], 'chat');?>   >   
                        <a href="index.php?bq=chat-app"  ><i class="fa fa-comments"></i> 
                        <span class="nav-label" id="chat-alert">Chat <?php echo $alert->Chat(); ?></span> </a>
                     </li>
               <?php }  ?>
              
<!--
*////////////////////////////////////////////////////
*  Page  
*///////////////////////////////////////////////////
-->             
                <li  <?php ActiveMenu($_GET["bq"], 'pages-dat,pages-add,pages');?>     >   
                    <a href="index.php?bq=pages"><i class="fa fa fa-file-text"></i> 
                        <span class="nav-label">Páginas / Menu</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="index.php?bq=pages-add">Agregar Página</a></li>
                        <li  ><a href="index.php?bq=pages">Páginas <?php echo $alert->Notificacion("pages","warning"); ?></a></li>
                    </ul>
                </li>

                <li  <?php ActiveMenu($_GET["bq"], 'slide');?>     >   
                    <a href="index.php?bq=slide"><i class="fa fa-sliders"></i> 
                        <span class="nav-label">Slider</span>  <?php echo $alert->Notificacion("slide","info"); ?> </span></a> 
                </li>

                <li  <?php ActiveMenu($_GET["bq"], 'blog-img,blog-dat,blog-add,blog');?>    >   
                    <a href="index.php?bq=blog"><i class="fa fa-newspaper-o"></i> 
                        <span class="nav-label">Blog</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="index.php?bq=blog-add">Agregar Blog</a></li>
                        <li  ><a href="index.php?bq=blog">Blog <?php echo $alert->Notificacion("articulos","info"); ?></a></li>
                    </ul>
                </li>
                 
                <li    <?php ActiveMenu($_GET["bq"], 'imagenes');?>   >  
                    <a href="index.php?bq=imagenes"><i class="fa fa-picture-o"></i> 
                        <span class="nav-label">Imágenes</span> <?php echo $alert->Notificacion("galeria", ""); ?>  </a> 
                </li>
                <li    <?php ActiveMenu($_GET["bq"], 'videos');?>    >  
                    <a href="index.php?bq=videos"><i class="fa fa-video-camera"></i> 
                        <span class="nav-label">Videos</span>  <?php echo $alert->Notificacion("videos", "primary"); ?> </a> 
                </li>
                <li  <?php ActiveMenu($_GET["bq"], 'suscriptores');?>    >  
                    <a href="index.php?bq=suscriptores"><i class="fa fa-user-circle-o"></i> 
                        <span class="nav-label">Suscriptores</span> <?php echo $alert->Notificacion("suscriptores", "warning", "contacto"); ?></a>
                    
                </li>
<?php if($site->AdminSeccionController('Inmobiliaria') === true){ ?>
<!--
*////////////////////////////////////////////////////
*  Propiedades 
*///////////////////////////////////////////////////
-->
                 <li  <?php ActiveMenu($_GET["bq"], 'propiedad-img,propiedad-dat,propiedad-add,propiedad');?>     >   
                    <a href="index.php?bq=propiedad"><i class="fa fa-building-o"></i> 
                        <span class="nav-label">Inmuebles</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="index.php?bq=propiedad-add">Agregar Inmueble</a></li>
                        <li  ><a href="index.php?bq=propiedad">Inmuebles <?php echo $alert->Notificacion("inmuebles","info"); ?></a></li>
                    </ul>
                </li>

                 <li   <?php ActiveMenu($_GET["bq"], 'propiedad-tipo-inmueble');?>   >  
                    <a href="index.php?bq=propiedad-tipo-inmueble"  ><i class="fa fa-bars"></i> 
                        <span class="nav-label">Tipo de inmueble</span> </a>
                 </li>
                 <li  <?php ActiveMenu($_GET["bq"], 'propiedad-tipo-transaccion');?>   >  
                    <a href="index.php?bq=propiedad-tipo-transaccion"  ><i class="fa fa-money"></i> 
                        <span class="nav-label">Transacción inmueble</span> </a>
                 </li>
<?php } ?>
<?php if($site->AdminSeccionController('Tienda') === true){ ?>
<!--
*////////////////////////////////////////////////////
*  Shop 
*///////////////////////////////////////////////////
-->
                <li   <?php ActiveMenu($_GET["bq"], 'stats');?>    >  
                    <a href="index.php?bq=stats"><i class="fa fa-bar-chart-o"></i> 
                        <span class="nav-label">Estadísticas</span> </a>
                 </li>
                 <li   <?php ActiveMenu($_GET["bq"], 'productos-dat,productos-add,productos');?>      >   
                    <a href="index.php?bq=productos"><i class="fa fa-archive"></i> 
                        <span class="nav-label">Productos</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="index.php?bq=productos-add">Agregar Producto</a></li>
                        <li  ><a href="index.php?bq=productos">Productos  <?php echo $alert->Notificacion("productos","info"); ?></a></li>
                    </ul>
                </li>
                <li   <?php ActiveMenu($_GET["bq"], 'categorias-dat,categorias-add,categorias');?>    > 
                    <a href="index.php?bq=categorias"><i class="fa fa-tag"></i> 
                        <span class="nav-label">Categorías</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="index.php?bq=categorias-add">Agregar Categoría</a></li>
                        <li  ><a href="index.php?bq=categorias">Categorías  <?php echo $alert->Notificacion("categorias","info"); ?></a></li>
                    </ul>
                </li> 
                <li  <?php ActiveMenu($_GET["bq"], 'subcategorias-dat,subcategorias-add,subcategorias');?>     >  
                    <a href="index.php?bq=subcategorias"><i class="fa fa-tags"></i> 
                        <span class="nav-label">Subcategorías</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="index.php?bq=subcategorias-add">Agregar Subcategoría</a></li>
                        <li  ><a href="index.php?bq=subcategorias">Subcategorías  <?php echo $alert->Notificacion("subcategorias","info"); ?></a></li>
                    </ul>
                </li> 
                <li   <?php ActiveMenu($_GET["bq"], 'pedidos-dat,pedidos-concretados,pedidos-pendientes,pedidos');?>    >   
                    <a href="index.php?bq=pedidos"><i class="fa fa-inbox"></i> 
                        <span class="nav-label">Pedidos</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="index.php?bq=pedidos-pendientes">Pendientes <?php echo $alert->Ventas("Pendiente"); ?></a></li>
                        <li  ><a href="index.php?bq=pedidos-concretados">Concretados  <?php echo $alert->Ventas("Completado"); ?></a></li>
                    </ul>
                </li>
                <li   <?php ActiveMenu($_GET["bq"], 'cupones-dat,cupones-add,cupones');?>    >  
                    <a href="index.php?bq=cupones"><i class="fa fa-magic"></i> 
                        <span class="nav-label">Cupones</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="index.php?bq=cupones-add">Agregar Cupón</a></li>
                        <li  ><a href="index.php?bq=cupones">Cupones</a></li>
                    </ul>
                </li>
                <li  <?php ActiveMenu($_GET["bq"], 'envios-dat,envios-add,envios');?>   >  
                    <a href="index.php?bq=envios"><i class="fa fa-send"></i> 
                        <span class="nav-label">Envios</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="index.php?bq=envios-add">Agregar Envio</a></li>
                        <li  ><a href="index.php?bq=envios">Envíos</a></li>
                    </ul>
                </li>
                <li  <?php ActiveMenu($_GET["bq"], 'clientes-dat,clientes');?>   >   
                    <a href="index.php?bq=clientes"><i class="fa fa-user-circle"></i> 
                        <span class="nav-label">Clientes</span>  <?php echo $alert->Notificacion("suscriptores", "warning", "cliente"); ?> </a> 
                </li>
 <?php } ?>


               


                
            </ul>

        </div>
    </nav>















<div class="modal inmodal fade" id="editMyData" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header"> 
                                            <h4 class="modal-title">Modificar mis datos </h4>  
                                        </div>
                                        <div class="modal-body" id="">
<form  action="" method="post"  name="formDatos" id="formDatos"  enctype="multipart/form-data"  onSubmit="ValidarMisdatosPerfil();return document.validado" class="form-horizontal"  >
        <div class="form-group"><label class="col-md-2 control-label">Mi email</label>
               <div class="col-md-10">
                    <p class="form-control-static"><?php echo $_SESSION["Email"];?></p>
               </div>
         </div>

         <div class="form-group"><label class="col-md-2 control-label">Mi nombre</label>
               <div class="col-md-10">
                   <input type="text" class="form-control" name="nombreUsuario"  id="nombreUsuario" placeholder="Coloque su nombre completo"  value="<?php echo $_SESSION["Usuario"];?>" required="">
               </div>
         </div>

        <div class="form-group"><label class="col-md-2 control-label">Mi password</label>
               <div class="col-md-4">
                   <input type="password" class="form-control" name="password"  id="password"   value="" autocomplete="off"  >
               </div>
               <label class="col-md-2 control-label">Repita password</label>
               <div class="col-md-4">
                   <input type="password" class="form-control" name="password2"  id="password2"  value="" autocomplete="off"  >
               </div>
         </div>

         <div class="form-group">
                                <label class="col-md-2 control-label">Mi foto</label>
                                <div class="col-md-8  fileinput fileinput-new input-group" data-provides="fileinput" style="padding-left: 1em;">
                                <div class="form-control" data-trigger="fileinput">
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                <span class="fileinput-filename"></span>
                                </div>
                                <span class="input-group-addon btn btn-default btn-file">
                                    <span class="fileinput-new">Seleccionar</span>
                                    <span class="fileinput-exists">Cambiar</span>
                                    <input type="file" id="thumbailUser" name="thumbailUser" value=""   /> 
                                </span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                            </div>  <!-- fileinput -->

         </div>

         <div class="hr-line-dashed"></div>

                                  <div class="form-group">
                                    <div class="col-md-12  ">  
                                          <button type="submit" class="btn btn-primary pull-right" type="submit" >Guardar cambios</button>

                                        </div>
                                      </div>

</form>

                                            
                                        </div>

                                        <div class="modal-footer hidden">
                                            <input type="hidden" name="idEdit" id="idEdit" value="OK">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
 </div>



  <?php if($site->AdminSeccionController('Chat') === true){ ?>
  <script>
$(function() {
setInterval('NuevosChatLoader()',15000); 
 



});

 function NuevosChatLoader(){  




  $.ajax({
        cache:false,
            contentType: false,
            processData: false,
            url:"views/modules/chat-load-new-conversacion.php",
            method:"POST",
            //dataType:"json",
            // data:datos,
             timeout: 40000,
           beforeSend: function(){ 
              console.log("seek new chat");
          },
          success:function(data) { 
             // $("#discussion").html(data);
             console.log('Chat pendiente:'+data);

                      if(data>0){
                            
                            $("#chat-alert").html('Chat <span class="label label-danger pull-right">'+data+'</span>');

                             toastr.options = {
                                  closeButton: true,
                                  progressBar: true,
                                  showMethod: 'slideDown',
                                  timeOut: 11000 
                                  //onclick: 'index.php?bq=acuerdo-publicar'
                              };
                              toastr.options.onclick = function() { window.location = 'index.php?bq=chat-app'; }
                              toastr.error('Tiene '+data+' chat pendiente, da clic AQUI, para responder', data+' Nuevos chat');
                        }


              console.log("success");
          },  error: function (xhr, desc, err)
              {
                  //$("#discussion").html('<div class="alert alert-danger"><b>Error</b>, ha ocurrido un error con la conexión.</div>');
                  console.log("error new chat");

              }

 
 
 
       });//ajax
 }

  </script>

  <?php } ?>
