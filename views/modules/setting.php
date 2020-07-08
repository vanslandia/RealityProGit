 <?php 


$site = new siteController();  
$site->UpdateSiteController(); 
$site->UpdateSiteSocialMediaController(); 
$site->DeleteSiteSocialMediaController(); 


 ?>
 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Configuración de sitio</h2>
                    <ol class="breadcrumb">
                        <li>
                             Edite las opciones del sitio web 
                        </li> 
                    </ol>
                </div>
</div> <!-- row wrapper border-bottom white-bg page-heading  -->


 <div class="row " style="margin-top: 1em;">
                <div class="col-md-7   ">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Configuración del sitio</h5>
                            <div class="ibox-tools">
                                
                            </div>
                        </div>
                        <div class="ibox-content"> 
                        <form name="form1"  id="form1" enctype="multipart/form-data"  method="post" class="form-horizontal"  > 
                                <div class="form-group"><label class="col-sm-3 control-label">
                                		<?php 
                                		$site->LogoController(); 
                                		$site->LogoFileNow();  
                                		?></label>
                                               <div class="col-sm-8">

                                 						<div class="fileinput fileinput-new input-group" data-provides="fileinput" style="margin-top: 1em;">
                                                                <div class="form-control" data-trigger="fileinput">
                                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                    <span class="fileinput-filename"></span>
                                                                </div>
                                                                <span class="input-group-addon btn btn-default btn-file">
                                                                    <span class="fileinput-new">Seleccionar</span>
                                                                    <span class="fileinput-exists">Subiendo</span>
                                                                    <input type="file" id="logotipo" name="logotipo" value="" /> 
                                                                </span>
                                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                                            </div>  <!-- fileinput -->



                                				</div>
                                     </div> <!--  item -->
                                 
                                <?php 
                                 $site->InfoSiteController();

                                ?>


                                                               <div class="hr-line-dashed"></div>
                                                                 
                                                                <div class="form-group">
                                                                    <div class="col-sm-12 " align="center"> 
                                                                    	<input name="datos" type="hidden" id="datos" value="OK" />
                                                						  
                                                                        <button type="submit" class="btn btn-primary" type="submit">Guardar Cambios</button>
                                                                    </div>
                                                                </div>


                            </form>
                        </div>
                    </div> 
                </div><!-- 8 -->
                 <div class="col-md-5  ">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Redes sociales</h5> 
                        </div>
                        <div class="ibox-content"> 
                             <form name="form1"  id="form1" enctype="multipart/form-data"  method="post" class="form-horizontal"  > 
                                     <div class="form-group">
                                          <div class="col-md-4 ">
                                               <select name="red" id="red"  class="form-control" id="">
                                                <option value="fab fa-facebook-f, #1475E0">Facebook</option>
                                                <option value="fab fa-instagram, #B18768">Instagram</option>
                                                <option value="fab fa-twitter, #00A6FF">Twitter</option>
                                                <option value="fab fa-youtube, #F95F62">Youtube</option>
                                                <option value="fab fa-linkedin, #F95F62">Linkedin</option>
                                                <option value="fab fa-pinterest, #F95F62">Pinterest</option>
                                                <option value="fab fa-vimeo, #F95F62">Vimeo</option>
                                                <option value="fab fa-google, #F95F62">Google</option>
                                              </select>                         
                                           </div>
                                            <div class="col-sm-8">
                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput"  >
                                                                <div class="form-control" data-trigger="fileinput">
                                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                    <span class="fileinput-filename"></span>
                                                                </div>
                                                                <span class="input-group-addon btn btn-default btn-file">
                                                                    <span class="fileinput-new">Seleccionar</span>
                                                                    <span class="fileinput-exists">Subiendo</span>
                                                                    <input type="file" id="logoRed" name="logoRed" value="" /> 
                                                                </span>
                                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                                            </div>  <!-- fileinput --> 
                                                </div>
                                            
                                       </div>
                                       <div class="form-group">
                                        <div class="col-md-10 ">
                                                <input type="text" class="form-control" name="url" id="url" required="" placeholder="http://facebook.com">
                                            </div>
                                            <div class="col-md-1 ">
                                                <button type="submit" class="btn btn-primary "><b>+</b></button>
                                            </div>
                                       </div>
                                </form>


                                <div class="hr-line-dashed"></div>

                                <?php $site->SocialMediaController();  ?>

                        </div>
                    </div>
                </div>





</div> <!-- row -->



