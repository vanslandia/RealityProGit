<?php

 
getHeader();

$chat = new chatController();  
$chat->AddRespuestacontroller();

 
?> 


<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Chat View</h2>
                   
                </div>
                <div class="col-lg-12">
                    <strong>Chat room </strong> las conversaciones con los diversos usuarios irán apareciendo en esta sección.
                </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight">
   
    <div class="row">
        <div class="col-lg-12">

                <div class="ibox chat-view">

                    <div class="ibox-title">
                        <div class="row">
                      
                        
                         <div id="data_5" class="col-md-12">  <small class="pull-right text-muted">Esta visualizando chat del <b class="text-navy bold"><?php echo PresentarFechaLarga(date("Y-m-d"))?></b></small>
                        <label class="col-md-1">Fecha </label>
                        <div id="datepicker" class="col-md-2" >
                          <input type="text" class="input-sm form-control fecha  " name="fecha" id="fecha" placeholder=" &#xF073; Desde: " style="font-family:Arial, FontAwesome" value="<?php if(isset($_GET["fecha"]))echo $_GET["fecha"]; else echo date("Y-m-d");?>" autocomplete="off"/>
                        </div></div> 
                    </div>
                    </div>


                    <div class="ibox-content">

                        <div class="row">

                            <div class="col-md-9 ">
                                <div class="chat-discussion" id="discussion">


                                    <?php  echo $chat->ConversacionChatController(); ?> 
 
                                </div> <!-- chat-discussion-->

                            </div>
                            <div class="col-md-3">
                                <div class="chat-users">


                                    <div class="users-list">

                                        <?php  $chat->ListaDeChatController(); ?> 

                                    </div> <!--users-list" -->

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12"> <form method="post" name="addUsuario" enctype="multipart/form-data" id="addUsuario" class="form-horizontalx"  >
                                <div class="chat-message-form">
                               
                                    <div class="form-group">

                                        <textarea class="form-control message-input " required="" name="message" id="message" placeholder="Coloque su respuesta"></textarea>

                                    </div>

                                    <div class="form-group ">
                                          <input type="hidden" name="chat" id="chat" value="">
                                          <button type="submit" class="btn btn-primary pull-right m-md" type="submit" >Enviar</button>
                                        
                                    </div>


                                </div></form>
                            </div>
                        </div>


                    </div>

                </div>
        </div>

    </div>


</div>
 

<script type="text/javascript">
    setInterval('VerChatLoader()',10000); 

$(document).ready(function(){


  $('#data_5 .fecha').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
   }); 

  $("#fecha").change(function(){
    window.location = 'index.php?bq=chat-app&fecha='+$(this).val();
  });


 
 

});// jQuery 
</script>


