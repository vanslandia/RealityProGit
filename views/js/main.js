/*++++++++++++++++++++++++++++++++++++  ==
//  usuarios
 ++++++++++++++++++++++++++++++++++++*/
 function remove_accent(str) {var map={'À':'A','Á':'A','Â':'A','Ã':'A','Ä':'A','Å':'A','Æ':'AE','Ç':'C','È':'E','É':'E','Ê':'E','Ë':'E','Ì':'I','Í':'I','Î':'I','Ï':'I','Ð':'D','Ñ':'N','Ò':'O','Ó':'O','Ô':'O','Õ':'O','Ö':'O','Ø':'O','Ù':'U','Ú':'U','Û':'U','Ü':'U','Ý':'Y','ß':'s','à':'a','á':'a','â':'a','ã':'a','ä':'a','å':'a','æ':'ae','ç':'c','è':'e','é':'e','ê':'e','ë':'e','ì':'i','í':'i','î':'i','ï':'i','ñ':'n','ò':'o','ó':'o','ô':'o','õ':'o','ö':'o','ø':'o','ù':'u','ú':'u','û':'u','ü':'u','ý':'y','ÿ':'y','Ā':'A','ā':'a','Ă':'A','ă':'a','Ą':'A','ą':'a','Ć':'C','ć':'c','Ĉ':'C','ĉ':'c','Ċ':'C','ċ':'c','Č':'C','č':'c','Ď':'D','ď':'d','Đ':'D','đ':'d','Ē':'E','ē':'e','Ĕ':'E','ĕ':'e','Ė':'E','ė':'e','Ę':'E','ę':'e','Ě':'E','ě':'e','Ĝ':'G','ĝ':'g','Ğ':'G','ğ':'g','Ġ':'G','ġ':'g','Ģ':'G','ģ':'g','Ĥ':'H','ĥ':'h','Ħ':'H','ħ':'h','Ĩ':'I','ĩ':'i','Ī':'I','ī':'i','Ĭ':'I','ĭ':'i','Į':'I','į':'i','İ':'I','ı':'i','Ĳ':'IJ','ĳ':'ij','Ĵ':'J','ĵ':'j','Ķ':'K','ķ':'k','Ĺ':'L','ĺ':'l','Ļ':'L','ļ':'l','Ľ':'L','ľ':'l','Ŀ':'L','ŀ':'l','Ł':'L','ł':'l','Ń':'N','ń':'n','Ņ':'N','ņ':'n','Ň':'N','ň':'n','ŉ':'n','Ō':'O','ō':'o','Ŏ':'O','ŏ':'o','Ő':'O','ő':'o','Œ':'OE','œ':'oe','Ŕ':'R','ŕ':'r','Ŗ':'R','ŗ':'r','Ř':'R','ř':'r','Ś':'S','ś':'s','Ŝ':'S','ŝ':'s','Ş':'S','ş':'s','Š':'S','š':'s','Ţ':'T','ţ':'t','Ť':'T','ť':'t','Ŧ':'T','ŧ':'t','Ũ':'U','ũ':'u','Ū':'U','ū':'u','Ŭ':'U','ŭ':'u','Ů':'U','ů':'u','Ű':'U','ű':'u','Ų':'U','ų':'u','Ŵ':'W','ŵ':'w','Ŷ':'Y','ŷ':'y','Ÿ':'Y','Ź':'Z','ź':'z','Ż':'Z','ż':'z','Ž':'Z','ž':'z','ſ':'s','ƒ':'f','Ơ':'O','ơ':'o','Ư':'U','ư':'u','Ǎ':'A','ǎ':'a','Ǐ':'I','ǐ':'i','Ǒ':'O','ǒ':'o','Ǔ':'U','ǔ':'u','Ǖ':'U','ǖ':'u','Ǘ':'U','ǘ':'u','Ǚ':'U','ǚ':'u','Ǜ':'U','ǜ':'u','Ǻ':'A','ǻ':'a','Ǽ':'AE','ǽ':'ae','Ǿ':'O','ǿ':'o'};var res='';for (var i=0;i<str.length;i++){c=str.charAt(i);res+=map[c]||c;}return res;} 


 
/*++++++++++++++++++++++++++++++++++++ 
//  Subir archivo
 ++++++++++++++++++++++++++++++++++++*/
function validarSubirArchivo(){
    var archivoFile = $("#archivoFile").val(); 
    var errores = "";
 

    if( archivoFile == "")errores = "• Seleccione un archivo \n"; 

    if(errores!=""){
                swal({
                      title: "Error !",
                      text: "Existe algunos errores al enviar los datos. \n"+errores,
                      type: "warning",
                      showCancelButton: false, 
                      confirmButtonColor: "#DD6B55", //V:    1ab394      ///R:    DD6B55
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                       });
    }
    //console.log("Res:", Inicial+"="+Avance);
    document.validado = (errores == "");
}





function EliminarRed(id, titulo){
                swal({
                      title: "Borrar !",
                      text: "Esta apunto de borrar este registro ",
                      type: "warning",
                      showCancelButton: true, 
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Borrar",
                      closeOnConfirm: false},
                      function(isConfirm){   
                            if(isConfirm) window.location = "index.php?bq=setting&titulo="+titulo+"&idBorrar="+id;  
                   });
}



function BorrarArchivo(id, titulo, url){
                swal({
                      title: "Borrar !",
                      text: "Esta apunto de borrar este registro " +titulo,
                      type: "warning",
                      showCancelButton: true, 
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Borrar",
                      closeOnConfirm: false},
                      function(isConfirm){   
                            if(isConfirm) window.location = "index.php?bq=productos-dat&tab=tab-3&id="+url+"&idBorrarFile="+id;  
                   });
}


function EliminarVenta(id, url){
                swal({
                      title: "Borrar !",
                      text: "Esta apunto de borrar este registro " ,
                      type: "warning",
                      showCancelButton: true, 
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Borrar",
                      closeOnConfirm: false},
                      function(isConfirm){   
                            if(isConfirm) window.location = "index.php?bq=pedidos-pendientes&idBorrar="+id+"&folio="+url;  
                   });
}



/*++++++++++++++++++++++++++++++++++++ 
//  Valida Inmueble
 ++++++++++++++++++++++++++++++++++++*/
function validarInmueble(){
    var titulo = $("#tituloNew").val();
    var tipo = $("#tipo_inmueble").val(); 
    var errores = "";
 

    if( titulo == "")errores = "• Capture el titulo del inmueble \n";
    if( tipo == "")errores = "• Capture el tipo del inmueble \n"; 

    if(errores!=""){
                swal({
                      title: "Error !",
                      text: "Existe algunos errores al enviar los datos. \n"+errores,
                      type: "warning",
                      showCancelButton: false, 
                      confirmButtonColor: "#DD6B55", //V:    1ab394      ///R:    DD6B55
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                       });
    }
    //console.log("Res:", Inicial+"="+Avance);
    document.validado = (errores == "");
}


/*++++++++++++++++++++++++++++++++++++ 
//  Valida Page
 ++++++++++++++++++++++++++++++++++++*/
function validarPage(){
    var titulo = $("#tituloPagina").val();
    var errores = "";
 

    if( titulo == "")errores = "• Capture el titulo de la página \n";

    if(errores!=""){
                swal({
                      title: "Error !",
                      text: "Existe algunos errores al enviar los datos. \n"+errores,
                      type: "warning",
                      showCancelButton: false, 
                      confirmButtonColor: "#DD6B55", //V:    1ab394      ///R:    DD6B55
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                       });
    }
    //console.log("Res:", Inicial+"="+Avance);
    document.validado = (errores == "");
}
/*++++++++++++++++++++++++++++++++++++ 
//  Elimina Page
 ++++++++++++++++++++++++++++++++++++*/
function EliminarPage(valor, titulo){
                   swal({
                        title: "Borrar !",
                        text: "Desea borrar el registro:\n • "+titulo, 
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",       ///V:    1ab394      ///R:    DD6B55
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Borrar",
                        closeOnConfirm: false
                        }
                         ,function(isConfirm){   
                            if(isConfirm) window.location = "index.php?bq=pages&idBorrar="+valor+"&nombre="+titulo;  
                        });

}
/*++++++++++++++++++++++++++++++++++++ 
//  Publica page
 ++++++++++++++++++++++++++++++++++++*/
function PublicarPage(valor, titulo, sts){
                   swal({
                        title: "Publicar !",
                        text: "Desea cambiar el estado de publicación de esta página:\n • "+titulo, 
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#1ab394",       ///V:    1ab394      ///R:    DD6B55
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Cambiar",
                        closeOnConfirm: false
                        }
                         ,function(isConfirm){   
                            if(isConfirm) window.location = "index.php?bq=pages&publish="+valor+"&sts="+sts+"&nombre="+titulo;  
                        });
}


function PublicarVenta(valor, titulo, sts){
                   swal({
                        title: "Cambiar estatus !",
                        text: "Desea cambiar el estatus de esta venta:\n • "+titulo, 
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#1ab394",       ///V:    1ab394      ///R:    DD6B55
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Cambiar",
                        closeOnConfirm: false
                        }
                         ,function(isConfirm){   
                            if(isConfirm) window.location = "index.php?bq=pedidos-concretados&publish="+valor+"&sts="+sts+"&nombre="+titulo;  
                        });
}



function PublicarSubCat(valor, titulo, sts){
                   swal({
                        title: "Publicar !",
                        text: "Desea cambiar el estado de publicación de esta categoría:\n • "+titulo, 
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#1ab394",       ///V:    1ab394      ///R:    DD6B55
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Cambiar",
                        closeOnConfirm: false
                        }
                         ,function(isConfirm){   
                            if(isConfirm) window.location = "index.php?bq=subcategorias&publish="+valor+"&sts="+sts+"&nombre="+titulo;  
                        });
}


function PublicarCat(valor, titulo, sts){
                   swal({
                        title: "Publicar !",
                        text: "Desea cambiar el estado de publicación de esta categoría:\n • "+titulo, 
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#1ab394",       ///V:    1ab394      ///R:    DD6B55
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Cambiar",
                        closeOnConfirm: false
                        }
                         ,function(isConfirm){   
                            if(isConfirm) window.location = "index.php?bq=categorias&publish="+valor+"&sts="+sts+"&nombre="+titulo;  
                        });
}

/*++++++++++++++++++++++++++++++++++++ 
//  Eliminar tipo inmueble
 ++++++++++++++++++++++++++++++++++++*/
function BorrarTipoInmueble(id, titulo){
  swal({
      title: 'Borrar',
      text: "¿Desea borrar este registro ?\n"+titulo,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Borrarlo!' },function(isConfirm){  
        if(isConfirm) window.location = "index.php?bq=propiedad-tipo-inmueble&idBorrar="+id+"&titulo="+titulo;  
    })
}

/*++++++++++++++++++++++++++++++++++++ 
//  Eliminar tipo inmueble
 ++++++++++++++++++++++++++++++++++++*/
function BorrarDesarrolloInmueble(id, titulo){
  swal({
      title: 'Borrar',
      text: "¿Desea borrar este registro ?\n"+titulo,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Borrarlo!' },function(isConfirm){  
        if(isConfirm) window.location = "index.php?bq=propiedad-desarrollo&idBorrar="+id+"&titulo="+titulo;  
    })
}


function EliminarSubCat(id, titulo){
  swal({
      title: 'Borrar',
      text: "¿Desea borrar este registro ?\n"+titulo,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Borrarlo!' },function(isConfirm){  
        if(isConfirm) window.location = "index.php?bq=subcategorias&idBorrar="+id+"&titulo="+titulo;  
    })
}

function EliminarCat(id, titulo){
  swal({
      title: 'Borrar',
      text: "¿Desea borrar este registro ?\n"+titulo,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Borrarlo!' },function(isConfirm){  
        if(isConfirm) window.location = "index.php?bq=categorias&idBorrar="+id+"&titulo="+titulo;  
    })
}

/*++++++++++++++++++++++++++++++++++++ 
//  Eliminar tipo inmueble
 ++++++++++++++++++++++++++++++++++++*/
function BorrarTipoTransaccionInmueble(id, titulo){
  swal({
      title: 'Borrar',
      text: "¿Desea borrar este registro ?\n"+titulo,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Borrarlo!' },function(isConfirm){  
        if(isConfirm) window.location = "index.php?bq=propiedad-tipo-transaccion&idBorrar="+id+"&titulo="+titulo;  
    })
}

/*++++++++++++++++++++++++++++++++++++ 
//  Eliminar articulo
 ++++++++++++++++++++++++++++++++++++*/
function BorrarInmueble(valor, file, titulo){ 
      swal({
      title: 'Borrar',
      text: "¿Desea borrar este registro ?\n"+titulo,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Borrarlo!' },function(isConfirm){  
        if(isConfirm) window.location = "index.php?bq=propiedad&idBorrar="+valor+"&file="+file+"&titulo="+titulo;  
    })

}

 

/*++++++++++++++++++++++++++++++++++++ 
//  Eliminar articulo
 ++++++++++++++++++++++++++++++++++++*/
function BorrarBlog(valor, file, titulo){ 
      swal({
      title: 'Borrar',
      text: "¿Desea borrar este registro ?\n"+titulo,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Borrarlo!' },function(isConfirm){  
        if(isConfirm) window.location = "index.php?bq=blog&idBorrar="+valor+"&file="+file+"&titulo="+titulo;  
    })

}

/*++++++++++++++++++++++++++++++++++++ 
//  Eliminar usuario
 ++++++++++++++++++++++++++++++++++++*/
function EliminarUser(valor, titulo){
                   swal({
                        title: "Borrar !",
                        text: "Desea borrar el registro:\n • "+titulo, 
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",       ///V:    1ab394      ///R:    DD6B55
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Borrar",
                        closeOnConfirm: false
                        }
                         ,function(isConfirm){   
                            if(isConfirm) window.location = "index.php?bq=usuarios&idBorrar="+valor+"&nombre="+titulo;  
                        });
}


function EliminarProduc(valor, titulo){
                   swal({
                        title: "Borrar !",
                        text: "Desea borrar el registro:\n • "+titulo, 
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",       ///V:    1ab394      ///R:    DD6B55
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Borrar",
                        closeOnConfirm: false
                        }
                         ,function(isConfirm){   
                            if(isConfirm) window.location = "index.php?bq=productos&idBorrar="+valor+"&nombre="+titulo;  
                        });
}

/*++++++++++++++++++++++++++++++++++++ 
//  Publicar Articulo
 ++++++++++++++++++++++++++++++++++++*/
function PublicarBlog(valor, titulo, sts){
                   swal({
                        title: "Publicar !",
                        text: "Desea cambiar el estado de publicación de este articulo:\n • "+titulo, 
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#1ab394",       ///V:    1ab394      ///R:    DD6B55
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Cambiar",
                        closeOnConfirm: false
                        }
                         ,function(isConfirm){   
                            if(isConfirm) window.location = "index.php?bq=blog&publish="+valor+"&sts="+sts+"&nombre="+titulo;  
                        });
}
function PublicarProd(valor, titulo, sts){
                   swal({
                        title: "Publicar !",
                        text: "Desea cambiar el estado de publicación de este producto:\n • "+titulo, 
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#1ab394",       ///V:    1ab394      ///R:    DD6B55
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Cambiar",
                        closeOnConfirm: false
                        }
                         ,function(isConfirm){   
                            if(isConfirm) window.location = "index.php?bq=productos&publish="+valor+"&sts="+sts+"&nombre="+titulo;  
                        });
}
/*++++++++++++++++++++++++++++++++++++ 
//  Publicar Inmueble
 ++++++++++++++++++++++++++++++++++++*/
function PublicarInmueble(valor, titulo, sts){
                   swal({
                        title: "Publicar !",
                        text: "Desea cambiar el estado de publicación de este inmueble:\n • "+titulo, 
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#1ab394",       ///V:    1ab394      ///R:    DD6B55
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Cambiar",
                        closeOnConfirm: false
                        }
                         ,function(isConfirm){   
                            if(isConfirm) window.location = "index.php?bq=propiedad&publish="+valor+"&sts="+sts+"&nombre="+titulo;  
                        });
}


/*++++++++++++++++++++++++++++++++++++ 
//  Validar bitacora
 ++++++++++++++++++++++++++++++++++++*/
function validarBitacora(){
    var titulo = $("#suceso").val();
    var errores = "";
 

    if( titulo == "")errores = "• Capture que busca \n";

    if(errores!=""){
                swal({
                      title: "Error !",
                      text: "Existe algunos errores al enviar los datos. \n"+errores,
                      type: "warning",
                      showCancelButton: false, 
                      confirmButtonColor: "#DD6B55", //V:    1ab394      ///R:    DD6B55
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                       });
    }
    //console.log("Res:", Inicial+"="+Avance);
    document.validado = (errores == "");
}

/*++++++++++++++++++++++++++++++++++++ 
//  Validar usuario
 ++++++++++++++++++++++++++++++++++++*/
function validarUsuario(){
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var errores = "";
 

    if( nombre == "")errores = "• Nombre usuario \n";
    if( email == "")errores = "• Nombre email \n";
    if( password == "")errores = "• Nombre password \n";

    if(errores!=""){
                swal({
                      title: "Error !",
                      text: "Existe algunos errores al enviar los datos. \n"+errores,
                      type: "warning",
                      showCancelButton: false, 
                      confirmButtonColor: "#DD6B55", //V:    1ab394      ///R:    DD6B55
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                       });
    }
    //console.log("Res:", Inicial+"="+Avance);
    document.validado = (errores == "");
}



/*++++++++++++++++++++++++++++++++++++ 
//  Validar Productos
 ++++++++++++++++++++++++++++++++++++*/
function validarProducto(){
    var nombre = $("#nombre").val(); 
    var errores = "";
 

    if( nombre == "")errores = "• Nombre \n"; 

    if(errores!=""){
                swal({
                      title: "Error !",
                      text: "Existe algunos errores al enviar los datos. \n"+errores,
                      type: "warning",
                      showCancelButton: false, 
                      confirmButtonColor: "#DD6B55", //V:    1ab394      ///R:    DD6B55
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                       });
    }
    //console.log("Res:", Inicial+"="+Avance);
    document.validado = (errores == "");
}



function validarCategoria(){
    var categoria = $("#categoria").val(); 
    var errores = "";
 

    if( categoria == "")errores = "• Categoria \n"; 

    if(errores!=""){
                swal({
                      title: "Error !",
                      text: "Existe algunos errores al enviar los datos. \n"+errores,
                      type: "warning",
                      showCancelButton: false, 
                      confirmButtonColor: "#DD6B55", //V:    1ab394      ///R:    DD6B55
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                       });
    }
    //console.log("Res:", Inicial+"="+Avance);
    document.validado = (errores == "");
}

/*++++++++++++++++++++++++++++++++++++ 
//  Validar Articulo
 ++++++++++++++++++++++++++++++++++++*/
function validarArticulo(){
    var nombre = $("#tituloNew").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var errores = "";
 

    if( nombre == "")errores = "• Titulo articulo \n"; 

    if(errores!=""){
                swal({
                      title: "Error !",
                      text: "Existe algunos errores al enviar los datos. \n"+errores,
                      type: "warning",
                      showCancelButton: false, 
                      confirmButtonColor: "#DD6B55", //V:    1ab394      ///R:    DD6B55
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                       });
    }
    //console.log("Res:", Inicial+"="+Avance);
    document.validado = (errores == "");
}

 function VerChatLoader(){
     var id = $("#chat").val();
     console.log("id", id);

  $("#discussion").html('<div class="text-center"><img src="views/img/cargando.gif" style="vertical-align:middle; width:20px;"> Cargando chat...</div>');


  var datos = new FormData();
        datos.append("id", id); 

  $.ajax({
        cache:false,
            contentType: false,
            processData: false,
            url:"views/modules/chat-load-conversacion.php",
            method:"POST",
            //dataType:"json",
             data:datos,
             timeout: 40000,
           beforeSend: function(){ 
              console.log("sending:"+id);
          },
          success:function(data) { 
              $("#discussion").html(data);
              console.log("success");
          },  error: function (xhr, desc, err)
              {
                  $("#discussion").html('<div class="alert alert-danger"><b>Error</b>, ha ocurrido un error con la conexión.</div>');
                  console.log("error");

              }

 
 
 
       });//ajax
 }





$(function() {


$(".verChat").click(function(){
  var id = $(this).attr("data-id");
  console.log("id", id);

  $("#discussion").html('<div class="text-center"><img src="views/img/cargando.gif" style="vertical-align:middle; width:20px;"> Cargando chat...</div>');


  var datos = new FormData();
        datos.append("id", id); 

  $.ajax({
        cache:false,
            contentType: false,
            processData: false,
            url:"views/modules/chat-load-conversacion.php",
            method:"POST",
            //dataType:"json",
             data:datos,
             timeout: 40000,
           beforeSend: function(){ 
              console.log("sending:"+id);
          },
          success:function(data) { 
              $("#discussion").html(data);
              console.log("success");
          },  error: function (xhr, desc, err)
              {
                  $("#discussion").html('<div class="alert alert-danger"><b>Error</b>, ha ocurrido un error con la conexión.</div>');
                  console.log("error");

              }

 
 
 
       });//ajax



});




















$(".navbar-minimalize").click(function(){

  var estatus = $( "body" ).hasClass( "mini-navbar" );

  var datos = new FormData();
        datos.append("menu", estatus);

  $.ajax({
            cache:false,
            contentType: false,
            processData: false,
            method: "POST",
            url: "views/modules/setting-nav.php", 
            data: datos ,
            success:function (respuesta){              
              console.log("Res:"+respuesta);
            }

        })


   
});



/*++++++++++++++++++++++++++++++++++++ 
//  Gestor usuarios
 ++++++++++++++++++++++++++++++++++++*/
$("#recuperar").click(function(){
    //console.log("entro");
    $("#loginFormUser").toggle();
    $("#recoverFormUser").toggle();    
});
$("#volver").click(function(){
    //console.log("entro");
    $("#loginFormUser").toggle();
    $("#recoverFormUser").toggle();    
});



$(".copiar").click(function(){
  var id = $(this).attr("data");  
  var aux = document.createElement("input");

  // Asigna el contenido del elemento especificado al valor del campo
  aux.setAttribute("value", id);

  // Añade el campo a la página
  document.body.appendChild(aux);

  // Selecciona el contenido del campo
  aux.select();

  // Copia el texto seleccionado
  document.execCommand("copy");

  // Elimina el campo de la página
  document.body.removeChild(aux);

});

/*++++++++++++++++++++++++++++++++++++ 
//  Eliminar suscriptores
 ++++++++++++++++++++++++++++++++++++*/

$(".selCatSubCat").change(function(){
  var valor = $(this).val();
  console.log(valor);

  var sel = $("#subcategoria");
   sel.empty(); 


  var datos = new FormData();
        datos.append("area", valor);
    $.ajax({
            cache:false,
            contentType: false,
            processData: false,
            method: "POST",
            url: "views/modules/load-subcat.php", 
            data: datos ,
            dataType:"json",
            success:function (respuesta){              
              console.log("R:", respuesta);
              
              sel.append('<option value=""> - Seleccionar -</option>');

              $.each( respuesta, function( index, value ){
                res = value.split(",");
             sel.append('<option value="' + res[0]+ '">' + res[1] + '</option>');
        });

                 
            }

        })

});



 $(".borrarSuscriptor").click(function(){
    var id = $(this).attr("data"); 
    console.log(id);

     swal({
                        title: "Eliminar !",
                        text: "Desea eliminar este dato\n  ", 
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",       ///V:    1ab394      ///R:    DD6B55
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Borrar",
                        closeOnConfirm: false
                        }
                         ,function(isConfirm){   
                            if(isConfirm) window.location = "index.php?bq=suscriptores&idBorrar="+id;  
      });
    

 });
/*++++++++++++++++++++++++++++++++++++ 
//  Paginas
 ++++++++++++++++++++++++++++++++++++*/
$("#tituloPagina").keyup(function(){

    var link = $(this).val();
    var chart= 0;

    console.log("val:",link);

    retorno1 = remove_accent(link);

        retorno1a = retorno1.replace(' ','-');
        retorno1b = retorno1a.replace(' ','-');
        retorno1c = retorno1b.replace(' ','-');
        retorno1d = retorno1c.replace(' ','-');
        retorno1e = retorno1d.replace(' ','-');
        retorno1f = retorno1e.replace(' ','-');
        retorno1g = retorno1f.replace(' ','-');
        retorno1h = retorno1g.replace(' ','-');
        retorno1i = retorno1h.replace(' ','-');
        retorno1j = retorno1i.replace(' ','-');
   

    retorno2 = retorno1j.replace(' ','-');
    retorno = retorno2.toLowerCase();
    

    $("#urlFriendly").html($("#path").val()+retorno.replace(' ','-'));
    $("#url").val(retorno.replace(' ','-'));
 


});

$("#nombre").keyup(function(){

    var link = $(this).val();
    var chart= 0;

    console.log("val:",link);

    retorno1 = remove_accent(link);

        retorno1a = retorno1.replace(' ','-');
        retorno1b = retorno1a.replace(' ','-');
        retorno1c = retorno1b.replace(' ','-');
        retorno1d = retorno1c.replace(' ','-');
        retorno1e = retorno1d.replace(' ','-');
        retorno1f = retorno1e.replace(' ','-');
        retorno1g = retorno1f.replace(' ','-');
        retorno1h = retorno1g.replace(' ','-');
        retorno1i = retorno1h.replace(' ','-');
        retorno1j = retorno1i.replace(' ','-');
   

    retorno2 = retorno1j.replace(' ','-');
    retorno = retorno2.toLowerCase();
    

    $("#urlFriendly").html($("#path").val()+retorno.replace(' ','-'));
    $("#url").val(retorno.replace(' ','-'));
 


});

$("#categoria").keyup(function(){

    var link = $(this).val();
    var chart= 0;

    console.log("val:",link);

    retorno1 = remove_accent(link);

        retorno1a = retorno1.replace(' ','-');
        retorno1b = retorno1a.replace(' ','-');
        retorno1c = retorno1b.replace(' ','-');
        retorno1d = retorno1c.replace(' ','-');
        retorno1e = retorno1d.replace(' ','-');
        retorno1f = retorno1e.replace(' ','-');
        retorno1g = retorno1f.replace(' ','-');
        retorno1h = retorno1g.replace(' ','-');
        retorno1i = retorno1h.replace(' ','-');
        retorno1j = retorno1i.replace(' ','-');
   

    retorno2 = retorno1j.replace(' ','-');
    retorno = retorno2.toLowerCase();
    

    $("#urlFriendly").html($("#path").val()+retorno.replace(' ','-'));
    $("#url").val(retorno.replace(' ','-'));
 


});


$("#subcategoria").keyup(function(){

    var link = $(this).val();
    var chart= 0;

    console.log("val:",link);

    retorno1 = remove_accent(link);

        retorno1a = retorno1.replace(' ','-');
        retorno1b = retorno1a.replace(' ','-');
        retorno1c = retorno1b.replace(' ','-');
        retorno1d = retorno1c.replace(' ','-');
        retorno1e = retorno1d.replace(' ','-');
        retorno1f = retorno1e.replace(' ','-');
        retorno1g = retorno1f.replace(' ','-');
        retorno1h = retorno1g.replace(' ','-');
        retorno1i = retorno1h.replace(' ','-');
        retorno1j = retorno1i.replace(' ','-');
   

    retorno2 = retorno1j.replace(' ','-');
    retorno = retorno2.toLowerCase();
    

    $("#urlFriendly").html($("#path").val()+retorno.replace(' ','-'));
    $("#url").val(retorno.replace(' ','-'));
 


});

/*++++++++++++++++++++++++++++++++++++ 
//  Menu
 ++++++++++++++++++++++++++++++++++++*/
var NumItems = $("#listaMenu li").length;
if(NumItems>0){  $("#nestable").css({border:'none'});  }

var updateOutput = function (e) {
        var list = e.length ? e : $(e.target), output = list.data('output');
        var SendArray  = []; 
        SendArray =  window.JSON.stringify(list.nestable('serialize'));
 


        var datos = new FormData();
        datos.append("list", SendArray);
        //console.log("Send:", SendArray);


        $.ajax({
            cache:false,
            contentType: false,
            processData: false,
            method: "POST", 
            url: "views/modules/pages-orden.php", 
            data: datos ,
            success:function (respuesta){ 
                 console.log("Respuesta:",respuesta);
                $( "#avisos" ).before('<script> window.setTimeout(function() { $(".labelChange").fadeTo(300, 0).slideUp(300, function(){ $(this).remove(); });}, 1000);</script><div class="labelChange label label-primary pull-right"><i class="fa fa-check"></i> Se ha guardado  </div>');
            }

        }).fail(function(jqXHR, textStatus, errorThrown){
            $( "#avisos" ).before('<script> window.setTimeout(function() { $(".labelChange").fadeTo(300, 0).slideUp(300, function(){ $(this).remove(); });}, 1000);</script><div class="labelChange label label-danger pull-right"><i class="fa fa-times"></i> Error  </div>');
        }); 
};

$('#nestable').nestable({   group: 1, maxDepth:3 }).on('change', updateOutput);







/*++++++++++++++++++++++++++++++++++++ 
//  Cargar Logo
 ++++++++++++++++++++++++++++++++++++*/

$("#logotipo").change(function(){
	imagen = this.files[0];
	tamanio = imagen.size;
	formato = imagen.type;
	viejo = $("#antiguo").val(); 
  extencion = 'jpg';

	maximo = 5000000;
	console.log("file:", imagen);



	if(tamanio > maximo){
		$("#subirLogo").before('<div class="alert alert-warning text-center">El tamaño es superior al permitido</div>');
	}else{
		$(".alert").remove();
	}
 
	if(formato == "image/jpeg"){
		extencion = 'jpg';
  }
  if(formato == "image/png"){
    extencion = 'png';
  }
  console.log("Ext:", extencion);
	

  //&& formato == "image/jpeg"
	if(tamanio < maximo ){

		var datos = new FormData();
		datos.append("logotipo", imagen);
		datos.append("logoactual", viejo);
    datos.append("ext", extencion);

		 

		$.ajax({
			url: "views/modules/siteAjax.php",
			method:"POST",
			data:datos,
			cache:false,
			contentType: false,
			processData: false,
    		beforeSend: function(){
    			$("#subirLogo").before("<div class='text-center' id='loaderSts'><img src='views/img/cargando.gif'> Cargando...</div>");
    		},
    		success: function(respuesta){ 
    			$("#loaderSts").remove();
    			console.log("respuesta:", respuesta);

          if(respuesta=="success"){
                swal({
                  title: "Listo !",
                  text:"El archivo subio correctamente.",
                  type: "success",
                  showCancelButton: false,
                  confirmButtonColor: "#1ab394",     ///V:    1ab394      ///R:    DD6B55
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false
                  }
                    ,function(isConfirm){
                            if(isConfirm) window.location = "index.php?bq=setting";
                          }
                  );
          }else{
                swal({
                  title: "Error",
                  text:"Hubo un error al guardar el producto.",
                  type: "warning",
                  showCancelButton: false,
                  confirmButtonColor: "#DD6B55",     ///V:    1ab394      ///R:    DD6B55
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: true
                  }
                   /* ,function(isConfirm){
                            if(isConfirm) window.location = "index.php?bq=setting";
                          }*/
                  );
          }
    			

    			
    			

    		}

		});
		 

	}



});








/*++++++++++++++++++++++++++++++++++++ 
//  Galeria Inmuebles
 ++++++++++++++++++++++++++++++++++++*/
 if( $("#galeriaInmueble").html()==0 ){
      $("#galeriaInmueble").css({"height" : "100px"});
}else{
      $("#galeriaInmueble").css({"height" : "auto"});
}
$("#galeriaInmueble").on("dragover", function(e){
    // detiene eventos definidos
    e.preventDefault();
    e.stopPropagation();
    $("#galeriaInmueble").css({"background":"url(views/images/pattern.jpg)"}); 
});

$("#galeriaInmueble").on("drop", function(e){
    // detiene eventos definidos
    e.preventDefault();
    e.stopPropagation(); 
    var Article = $(this).attr("data");
    var UrlId = $(this).attr("data-url");
    $("#galeriaInmueble").css({"background":"#fff"}); 
    //console.log(Article);

    var permitido = 2000000; // 2 MB
    var archivo = e.originalEvent.dataTransfer.files;
    var img = archivo[0];
    var tamanio = img.size;
    var formato = img.type;
    //console.log("archivo:", archivo);
    //console.log("type:", formato);


    if(Number(tamanio)>permitido){  
        $("#galeriaInmueble").before('<div class="alert alert-warning text-center">El tamaño es superior al permitido</div>'); 
    }else{
         

         if(formato=="image/jpeg" || formato=="image/png" ){
                 $(".alert").remove();
            }else{
                $("#galeriaInmueble").before('<div class="alert alert-warning text-center">El formato no es compatible .JPG</div>');
            }

    } // limit Tamaño

    
    

    /*=====================    Upload   ================= */
    if(Number(tamanio)<permitido && formato=="image/jpeg" || formato=="image/png" ){ // 2 MB
        var datos = new FormData();
        datos.append("imagen", img); 
        datos.append("articulo", Article); 
        //console.log("enviando");

        $.ajax({
            url: "views/ajax/propiedadtImgCrudAjax.php",
            method:"POST",
            data:datos,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $("#galeriaInmueble").before("<div class='text-center' id='loaderSts'><img src='views/images/cargando.gif'> Cargando...</div>");
            },
            success: function(respuesta){ 
                $("#loaderSts").remove();
                if(respuesta == 0){
                    //console.log("info:",respuesta); 
                    $("#galeriaInmueble").before('<div class="alert alert-warning text-center">La imagen es inferior al tamaño requerido.</div>');
                }else if (respuesta == 1) {
                        //console.log("info:",respuesta);  
                        $("#galeriaInmueble").before('<div class="alert alert-warning text-center">Hubo un error al guardar la imagen.</div>');
                    }else{ 
                        //console.log("url:",respuesta);  
                        $("#galeriaInmueble").css({"height" : "auto"});
                        $("#galeriaInmueble").append('<li id="'+respuesta+'" class="bloqueSlide"><span class="fa fa-times elimInmuebleImg"></span><img src="views/images/inmuebles/'+respuesta+'" class="handleImg"></li>');
                        // agregar item elemento de edicion
                        $("#ordenarTextSlide").append('<li><span class="fa fa-pencil editGalPropiedad" style="background:blue"></span> <img src="views/images/inmuebles/'+respuesta+'" style="float:left; margin-bottom:10px" width="80%"> <h1>Undefined</h1> <p>Undefined</p> </li>');

                        //window.location.reload();
                        /*=====================    sweet alert   ================= */
                        swal({
                            title:"Listo",
                            text:"La imagen subio correctamente.",
                            alert:"success",
                            confirmButtonText:"Cerrar",
                            confirmButtonColor: "#1ab394",
                            closeOnConfirm:false
                            },function(isConfirm){
                                if(isConfirm) window.location = "index.php?bq=propiedad-img&id="+UrlId;
                            }
                        );
                    }
                }
             
        });

    } 

});


$(".elimInmuebleImg").click(function(){

    var id = $(this).parent().attr("id"); 
    var datos = new FormData();
        datos.append("delete", id);
    var boxedit = id.replace(".jpg", "");
    var idRand = Math.floor((Math.random() * 100) + 1);

    $(this).parent().remove();
    $("#edit"+boxedit).remove();
    //console.log("Elim:",id);
    //console.log("id:", id);

    $.ajax({
            url: "views/ajax/propiedadtImgCrudAjax.php",
            method:"POST",
            data:datos,
            cache:false,
            contentType: false,
            processData: false,
            success: function(respuesta){   
                if(respuesta=="success"){ 
                    $("#galeriaInmueble").before('<div class="alert alert-info text-center" id="eliminacion'+idRand+'">La imagen fue eliminada.</div>');
                    $("#eliminacion"+idRand).fadeOut('slow');
                }else{
                    console.log("error:", respuesta);
                    $("#galeriaInmueble").before('<div class="alert alert-warning text-center"  id="eliminacion">Hubo un error al borrar.</div>');
                    } 
            }
                 
    }); 
    $("#galeriaInmueble").css({"minHeight" : "100px"});

});

/*=============================================
ORDENAR SLIDE   Propiedades  
=============================================*/

/* Ordenar Slide */
var almacenarOrdenImagenPropi = new Array();
var orderItemPropi = new Array();
var cambioOrdenImagenProp = false;

$("#ordenarImgInmueble").click(function(){

    $( "#galeriaInmueble").css({"cursor":"move"})
    $( "#galeriaInmueble span").hide()
         
    $( "#galeriaInmueble").sortable({
        revert: true,
        connectWith: ".bloqueSlide",
        handle: ".handleImg",   
        stop: function( event, ui ) {

        cambioOrdenImagenProp = true;

        for(var i= 0; i < $( "#galeriaInmueble li").length; i++){

            almacenarOrdenImagenPropi[i] = event.target.children[i].id; 
            orderItemPropi[i] = i+1;
            
            }
        }
    })

    $("#ordenarImgInmueble").hide();
    $("#guardarImgInmueble").show();

});


/* Guardar Orden Slide */ 

$("#guardarImgInmueble").click(function(){

    var id = $(this).attr("data");

    if(cambioOrdenImagenProp){

        $("#textoSlide ul").html("")

        for(var i= 0; i < $( "#galeriaInmueble li").length; i++){


            var actualizarOrden = new FormData();
            actualizarOrden.append("Item", almacenarOrdenImagenPropi[i]);
            actualizarOrden.append("Orden", orderItemPropi[i]);

            //console.log("ite:", almacenarOrdenImagenArt[i]);
           // console.log("Ord:", orderItemArt[i]);

            $.ajax({
                url: "views/ajax/propiedadtImgCrudAjax.php",
                method:"POST",
                data:actualizarOrden,
                cache:false,
                contentType: false,
                processData: false, 
                success: function(respuesta){    
                         
                     /*=====================    sweet alert   ================= */
                        swal({
                            title:"Listo",
                            text:"El nuevo orden se han guardado.",
                            alert:"success",
                            confirmButtonText:"Cerrar",
                            confirmButtonColor: "#1ab394",
                            closeOnConfirm:false
                            },function(isConfirm){
                                if(isConfirm) window.location = "index.php?bq=propiedad-img&id="+id;
                            }
                        );
                }// success: function
            });

            }
     }

    $("#galeriaInmueble").css({"cursor":"auto"}) 
    $("#galeriaInmueble span").show()

    $("#galeriaInmueble").disableSelection();

    $("#ordenarImgInmueble").show();

    $("#guardarImgInmueble").hide();

});








/*++++++++++++++++++++++++++++++++++++ 
//  Galeria Productos
 ++++++++++++++++++++++++++++++++++++*/
 if( $("#galeriaProducto").html()==0 ){
      $("#galeriaProducto").css({"height" : "100px"});
}else{
      $("#galeriaProducto").css({"height" : "auto"});
}
$("#galeriaProducto").on("dragover", function(e){
    // detiene eventos definidos
    e.preventDefault();
    e.stopPropagation();
    $("#galeriaProducto").css({"background":"url(views/images/pattern.jpg)"}); 
});

$("#galeriaProducto").on("drop", function(e){
    // detiene eventos definidos
    e.preventDefault();
    e.stopPropagation(); 
    var Article = $(this).attr("data");
    var UrlId = $(this).attr("data-url");
    $("#galeriaProducto").css({"background":"#fff"}); 
    //console.log(Article);

    var permitido = 2000000; // 2 MB
    var archivo = e.originalEvent.dataTransfer.files;
    var img = archivo[0];
    var tamanio = img.size;
    var formato = img.type;
    //console.log("archivo:", archivo);
    //console.log("type:", formato);


    if(Number(tamanio)>permitido){  
        $("#galeriaProducto").before('<div class="alert alert-warning text-center">El tamaño es superior al permitido</div>'); 
    }else{
         

         if(formato=="image/jpeg" || formato=="image/png" ){
                 $(".alert").remove();
            }else{
                $("#galeriaProducto").before('<div class="alert alert-warning text-center">El formato no es compatible .JPG</div>');
            }

    } // limit Tamaño

    
    

    /*=====================    Upload   ================= */
    if(Number(tamanio)<permitido && formato=="image/jpeg" || formato=="image/png" ){ // 2 MB
        var datos = new FormData();
        datos.append("imagen", img); 
        datos.append("articulo", Article); 
        //console.log("enviando");

        $.ajax({
            url: "views/ajax/productostImgCrudAjax.php",
            method:"POST",
            data:datos,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $("#galeriaProducto").before("<div class='text-center' id='loaderSts'><img src='views/images/cargando.gif'> Cargando...</div>");
            },
            success: function(respuesta){ 
                $("#loaderSts").remove();
                if(respuesta == 0){
                    //console.log("info:",respuesta); 
                    $("#galeriaProducto").before('<div class="alert alert-warning text-center">La imagen es inferior al tamaño requerido.</div>');
                }else if (respuesta == 1) {
                        //console.log("info:",respuesta);  
                        $("#galeriaProducto").before('<div class="alert alert-warning text-center">Hubo un error al guardar la imagen.</div>');
                    }else{ 
                        //console.log("url:",respuesta);  
                        $("#galeriaProducto").css({"height" : "auto"});
                        $("#galeriaProducto").append('<li id="'+respuesta+'" class="bloqueSlide"><span class="fa fa-times elimInmuebleImg"></span><img src="views/images/productos/'+respuesta+'" class="handleImg"></li>');
                        // agregar item elemento de edicion
                        $("#ordenarTextSlide").append('<li><span class="fa fa-pencil editGalProducto" style="background:blue"></span> <img src="views/images/productos/'+respuesta+'" style="float:left; margin-bottom:10px" width="80%"> <h1>Undefined</h1> <p>Undefined</p> </li>');

                        //window.location.reload();
                        /*=====================    sweet alert   ================= */
                        swal({
                            title:"Listo",
                            text:"La imagen subio correctamente.",
                            alert:"success",
                            confirmButtonText:"Cerrar",
                            confirmButtonColor: "#1ab394",
                            closeOnConfirm:false
                            },function(isConfirm){
                                if(isConfirm) window.location = "index.php?bq=productos-dat&tab=tab-2&id="+UrlId;
                            }
                        );
                    }
                }
             
        });

    } 

});




/*=============================================
ORDENAR SLIDE   Propiedades  
=============================================*/

/* Ordenar Slide */
var almacenarOrdenImagenPropi = new Array();
var orderItemPropi = new Array();
var cambioOrdenImagenProp = false;

$("#ordenarImgProduct").click(function(){

    $( "#galeriaProducto").css({"cursor":"move"})
    $( "#galeriaProducto span").hide()
         
    $( "#galeriaProducto").sortable({
        revert: true,
        connectWith: ".bloqueSlide",
        handle: ".handleImg",   
        stop: function( event, ui ) {

        cambioOrdenImagenProp = true;

        for(var i= 0; i < $( "#galeriaProducto li").length; i++){

            almacenarOrdenImagenPropi[i] = event.target.children[i].id; 
            orderItemPropi[i] = i+1;
            
            }
        }
    })

    $("#ordenarImgProduct").hide();
    $("#guardarImgProduct").show();

});


/* Guardar Orden Slide */ 

$("#guardarImgProduct").click(function(){

    var id = $(this).attr("data");

    if(cambioOrdenImagenProp){

        $("#textoSlide ul").html("")

        for(var i= 0; i < $( "#galeriaProducto li").length; i++){


            var actualizarOrden = new FormData();
            actualizarOrden.append("Item", almacenarOrdenImagenPropi[i]);
            actualizarOrden.append("Orden", orderItemPropi[i]);

            //console.log("ite:", almacenarOrdenImagenArt[i]);
           // console.log("Ord:", orderItemArt[i]);

            $.ajax({
                url: "views/ajax/productostImgCrudAjax.php",
                method:"POST",
                data:actualizarOrden,
                cache:false,
                contentType: false,
                processData: false, 
                success: function(respuesta){    
                         
                     /*=====================    sweet alert   ================= */
                        swal({
                            title:"Listo",
                            text:"El nuevo orden se han guardado.",
                            alert:"success",
                            confirmButtonText:"Cerrar",
                            confirmButtonColor: "#1ab394",
                            closeOnConfirm:false
                            },function(isConfirm){
                                if(isConfirm) window.location = "index.php?bq=productos-img&id="+id;
                            }
                        );
                }// success: function
            });

            }
     }

    $("#galeriaProducto").css({"cursor":"auto"}) 
    $("#galeriaProducto span").show()

    $("#galeriaProducto").disableSelection();

    $("#ordenarImgProduct").show();

    $("#guardarImgProduct").hide();

});









$(".elimProductoImg").click(function(){

    var id = $(this).parent().attr("id"); 
    var datos = new FormData();
        datos.append("delete", id);
    var boxedit = id.replace(".jpg", "");
    var idRand = Math.floor((Math.random() * 100) + 1);

    $(this).parent().remove();
    $("#edit"+boxedit).remove();
    //console.log("Elim:",id);
    //console.log("id:", id);

    $.ajax({
            url: "views/ajax/productostImgCrudAjax.php",
            method:"POST",
            data:datos,
            cache:false,
            contentType: false,
            processData: false,
            success: function(respuesta){   
                if(respuesta=="success"){ 
                    $("#galeriaInmueble").before('<div class="alert alert-info text-center" id="eliminacion'+idRand+'">La imagen fue eliminada.</div>');
                    $("#eliminacion"+idRand).fadeOut('slow');
                }else{
                    console.log("error:", respuesta);
                    $("#galeriaInmueble").before('<div class="alert alert-warning text-center"  id="eliminacion">Hubo un error al borrar.</div>');
                    } 
            }
                 
    }); 
    $("#galeriaInmueble").css({"minHeight" : "100px"});

});







$(".editGalPropiedad").click(function(){

    var UrlId = $(this).parent().parent().attr("data-url");
    var id = $(this).parent().attr("id");
    var img = $(this).parent().children("img").attr("src"); 
    var titulo = $(this).parent().children("h1").html(); 
    var descrip = $(this).parent().children("p").html(); 
    //console.log("ID:", UrlId);

    $(this).parent().html('<img src="'+img+'" class="img-thumbnail"> <input type="text" id="sendTitulo" class="form-control" placeholder="Título" value="'+titulo+'"> <textarea id="sendDescrip" row="5" class="form-control" placeholder="Descripción">'+descrip+'</textarea> <button id="btnSave'+id+'" class="btn btn-primary pull-right" style="margin:10px">Guardar</button>');

    $("#btnSave"+id).click(function(){
        var ID = id.slice(4,30)+".jpg";
        var Titulo = $("#sendTitulo").val();
        var Descrip = $("#sendDescrip").val();

        var datos = new FormData();
        datos.append("id", ID);
        datos.append("titulo", Titulo);
        datos.append("descripcion", Descrip);
        //console.log("Id:", ID);

        $.ajax({
            url: "views/ajax/propiedadtImgCrudAjax.php",
            method:"POST",
            data:datos,
            cache:false,
            contentType: false,
            processData: false,
            dataType:"json",
            success: function(respuesta){    
                    //console.log("respuesta", respuesta);
                    $("#btnSave"+id).parent().html('<span class="fa fa-pencil editGalPropiedad" style="background:blue"></span> <img src="'+img+'" style="float:left; margin-bottom:10px" width="80%"> <h1>'+respuesta["titulo"]+'</h1> <p>'+respuesta["descripcion"]+'</p>');
                   

                   /*=====================    sweet alert   ================= */
                        swal({
                            title:"Listo",
                            text:"Los cambios se han guardado.",
                            alert:"success",
                            confirmButtonText:"Cerrar",
                            confirmButtonColor: "#1ab394",
                            closeOnConfirm:false
                            },function(isConfirm){
                                if(isConfirm) window.location = "index.php?bq=propiedad-img&id="+UrlId;
                            }
                        );

                 
            }// success: function

           });


    });

});







$(".editGalProducto").click(function(){

    var UrlId = $(this).parent().parent().attr("data-url");
    var id = $(this).parent().attr("id");
    var img = $(this).parent().children("img").attr("src"); 
    var titulo = $(this).parent().children("h1").html(); 
    var descrip = $(this).parent().children("p").html(); 
    //console.log("ID:", UrlId);

    $(this).parent().html('<img src="'+img+'" class="img-thumbnail"> <input type="text" id="sendTitulo" class="form-control" placeholder="Título" value="'+titulo+'"> <textarea id="sendDescrip" row="5" class="form-control" placeholder="Descripción">'+descrip+'</textarea> <button id="btnSave'+id+'" class="btn btn-primary pull-right" style="margin:10px">Guardar</button>');

    $("#btnSave"+id).click(function(){
        var ID = id.slice(4,30)+".jpg";
        var Titulo = $("#sendTitulo").val();
        var Descrip = $("#sendDescrip").val();

        var datos = new FormData();
        datos.append("id", ID);
        datos.append("titulo", Titulo);
        datos.append("descripcion", Descrip);
        //console.log("Id:", ID);

        $.ajax({
            url: "views/ajax/productostImgCrudAjax.php",
            method:"POST",
            data:datos,
            cache:false,
            contentType: false,
            processData: false,
            dataType:"json",
            success: function(respuesta){    
                    //console.log("respuesta", respuesta);
                    $("#btnSave"+id).parent().html('<span class="fa fa-pencil editGalProducto" style="background:blue"></span> <img src="'+img+'" style="float:left; margin-bottom:10px" width="80%"> <h1>'+respuesta["titulo"]+'</h1> <p>'+respuesta["descripcion"]+'</p>');
                   

                   /*=====================    sweet alert   ================= */
                        swal({
                            title:"Listo",
                            text:"Los cambios se han guardado.",
                            alert:"success",
                            confirmButtonText:"Cerrar",
                            confirmButtonColor: "#1ab394",
                            closeOnConfirm:false
                            },function(isConfirm){
                                if(isConfirm) window.location = "index.php?bq=productos-img&id="+UrlId;
                            }
                        );

                 
            }// success: function

           });


    });

});





















 





/*++++++++++++++++++++++++++++++++++++ 
//  Galeria Articulos
 ++++++++++++++++++++++++++++++++++++*/
 if( $("#galeriaArticulo").html()==0 ){
      $("#galeriaArticulo").css({"height" : "100px"});
}else{
      $("#galeriaArticulo").css({"height" : "auto"});
}
$("#galeriaArticulo").on("dragover", function(e){
    // detiene eventos definidos
    e.preventDefault();
    e.stopPropagation();
    $("#galeriaArticulo").css({"background":"url(views/images/pattern.jpg)"}); 
});

$("#galeriaArticulo").on("drop", function(e){
    // detiene eventos definidos
    e.preventDefault();
    e.stopPropagation(); 
    var Article = $(this).attr("data");
    var UrlId = $(this).attr("data-url");
    $("#galeriaArticulo").css({"background":"#fff"}); 
    //console.log(Article);

    var permitido = 2000000; // 2 MB
    var archivo = e.originalEvent.dataTransfer.files;
    var img = archivo[0];
    var tamanio = img.size;
    var formato = img.type;
    //console.log("archivo:", archivo);
    //console.log("type:", formato);


    if(Number(tamanio)>permitido){  
        $("#galeriaArticulo").before('<div class="alert alert-warning text-center">El tamaño es superior al permitido</div>'); 
    }else{
         

         if(formato=="image/jpeg" || formato=="image/png" ){
                 $(".alert").remove();
            }else{
                $("#galeriaArticulo").before('<div class="alert alert-warning text-center">El formato no es compatible .JPG</div>');
            }

    } // limit Tamaño

    
    

    /*=====================    Upload   ================= */
    if(Number(tamanio)<permitido && formato=="image/jpeg" || formato=="image/png" ){ // 2 MB
        var datos = new FormData();
        datos.append("imagen", img); 
        datos.append("articulo", Article); 
        //console.log("enviando");

        $.ajax({
            url: "views/ajax/artImgCrudAjax.php",
            method:"POST",
            data:datos,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $("#galeriaArticulo").before("<div class='text-center' id='loaderSts'><img src='views/images/cargando.gif'> Cargando...</div>");
            },
            success: function(respuesta){ 
                $("#loaderSts").remove();
                if(respuesta == 0){
                    //console.log("info:",respuesta); 
                    $("#galeriaArticulo").before('<div class="alert alert-warning text-center">La imagen es inferior al tamaño requerido.</div>');
                }else if (respuesta == 1) {
                        //console.log("info:",respuesta);  
                        $("#galeriaArticulo").before('<div class="alert alert-warning text-center">Hubo un error al guardar la imagen.</div>');
                    }else{ 
                        //console.log("url:",respuesta);  
                        $("#galeriaArticulo").css({"height" : "auto"});
                        $("#galeriaArticulo").append('<li id="'+respuesta+'" class="bloqueSlide"><span class="fa fa-times elimSlideImg"></span><img src="views/images/articulos/'+respuesta+'" class="handleImg"></li>');
                        // agregar item elemento de edicion
                        $("#ordenarTextSlide").append('<li><span class="fa fa-pencil editGalArt" style="background:blue"></span> <img src="views/images/articulos/'+respuesta+'" style="float:left; margin-bottom:10px" width="80%"> <h1>Undefined</h1> <p>Undefined</p> </li>');

                        //window.location.reload();
                        /*=====================    sweet alert   ================= */
                        swal({
                            title:"Listo",
                            text:"La imagen subio correctamente.",
                            alert:"success",
                            confirmButtonText:"Cerrar",
                            confirmButtonColor: "#1ab394",
                            closeOnConfirm:false
                            },function(isConfirm){
                                if(isConfirm) window.location = "index.php?bq=blog-img&id="+UrlId;
                            }
                        );
                    }
                }
             
        });

    } 

});


$(".editGalArt").click(function(){

    var UrlId = $(this).parent().parent().attr("data-url");
    var id = $(this).parent().attr("id");
    var img = $(this).parent().children("img").attr("src"); 
    var titulo = $(this).parent().children("h1").html(); 
    var descrip = $(this).parent().children("p").html(); 
    //console.log("ID:", UrlId);

    $(this).parent().html('<img src="'+img+'" class="img-thumbnail"> <input type="text" id="sendTitulo" class="form-control" placeholder="Título" value="'+titulo+'"> <textarea id="sendDescrip" row="5" class="form-control" placeholder="Descripción">'+descrip+'</textarea> <button id="btnSave'+id+'" class="btn btn-primary pull-right" style="margin:10px">Guardar</button>');

    $("#btnSave"+id).click(function(){
        var ID = id.slice(4,30)+".jpg";
        var Titulo = $("#sendTitulo").val();
        var Descrip = $("#sendDescrip").val();

        var datos = new FormData();
        datos.append("id", ID);
        datos.append("titulo", Titulo);
        datos.append("descripcion", Descrip);
        //console.log("Id:", ID);

        $.ajax({
            url: "views/ajax/artImgCrudAjax.php",
            method:"POST",
            data:datos,
            cache:false,
            contentType: false,
            processData: false,
            dataType:"json",
            success: function(respuesta){    
                    //console.log("respuesta", respuesta);
                    $("#btnSave"+id).parent().html('<span class="fa fa-pencil editGalArt" style="background:blue"></span> <img src="../views/images/articulos/'+respuesta["imagen"]+'" style="float:left; margin-bottom:10px" width="80%"> <h1>'+respuesta["titulo"]+'</h1> <p>'+respuesta["descripcion"]+'</p>');
                   

                   /*=====================    sweet alert   ================= */
                        swal({
                            title:"Listo",
                            text:"Los cambios se han guardado.",
                            alert:"success",
                            confirmButtonText:"Cerrar",
                            confirmButtonColor: "#1ab394",
                            closeOnConfirm:false
                            },function(isConfirm){
                                if(isConfirm) window.location = "index.php?bq=blog-img&id="+UrlId;
                            }
                        );

                 
            }// success: function

           });


    });

});


$(".elimGaleriaArtImg").click(function(){

    var id = $(this).parent().attr("id"); 
    var datos = new FormData();
        datos.append("delete", id);
    var boxedit = id.replace(".jpg", "");
    var idRand = Math.floor((Math.random() * 100) + 1);

    $(this).parent().remove();
    $("#edit"+boxedit).remove();
    //console.log("Elim:",id);
    //console.log("id:", id);

    $.ajax({
            url: "views/ajax/artImgCrudAjax.php",
            method:"POST",
            data:datos,
            cache:false,
            contentType: false,
            processData: false,
            success: function(respuesta){   
                if(respuesta=="success"){ 
                    $("#galeriaArticulo").before('<div class="alert alert-info text-center" id="eliminacion'+idRand+'">La imagen fue eliminada.</div>');
                    $("#eliminacion"+idRand).fadeOut('slow');
                }else{
                    console.log("error:", respuesta);
                    $("#galeriaArticulo").before('<div class="alert alert-warning text-center"  id="eliminacion">Hubo un error al borrar.</div>');
                    } 
            }
                 
    }); 
    $("#galeriaArticulo").css({"minHeight" : "100px"});

});









/*++++++++++++++++++++++++++++++++++++ 
//  Area Dragdrop SLIDE
 ++++++++++++++++++++++++++++++++++++*/
if( $("#columnasSlide").html()==0 ){
	  $("#columnasSlide").css({"height" : "100px"});
}else{
	  $("#columnasSlide").css({"height" : "auto"});
}



/*=====================    Validacion Img   ================= */

$("#columnasSlide").on("dragover", function(e){
	// detiene eventos definidos
	e.preventDefault();
	e.stopPropagation();
	$("#columnasSlide").css({"background":"url(views/images/pattern.jpg)"}); 
});
$("#columnasSlide").on("drop", function(e){
	// detiene eventos definidos
	e.preventDefault();
	e.stopPropagation(); 
	$("#columnasSlide").css({"background":"#fff"}); 

	var permitido = 2000000; // 2 MB
	var archivo = e.originalEvent.dataTransfer.files;
	var img = archivo[0];
	var tamanio = img.size;
	var formato = img.type; 


	if(Number(tamanio)>permitido){  
		$("#columnasSlide").before('<div class="alert alert-warning text-center">El tamaño es superior al permitido</div>'); 
	}else{
		 

         if(formato=="image/jpeg" || formato=="image/png" ){
                 $(".alert").remove();
            }else{
                $("#columnasSlide").before('<div class="alert alert-warning text-center">El formato no es compatible .JPG</div>');
            }

	} // limit Tamaño

	
	

	/*=====================    Upload   ================= */
    if(Number(tamanio)<permitido && formato=="image/jpeg" || formato=="image/png" ){ // 2 MB
    	var datos = new FormData();
    	datos.append("imagen", img); 
    	//console.log("enviando");

    	$.ajax({
    		url: "views/ajax/slideCrudAjax.php",
    		method:"POST",
			data:datos,
			cache:false,
			contentType: false,
			processData: false,
    		beforeSend: function(){
    			$("#columnasSlide").before("<div class='text-center' id='loaderSts'><img src='views/images/cargando.gif'> Cargando...</div>");
    		},
    		success: function(respuesta){ 
    			$("#loaderSts").remove();
    			if(respuesta == 0){
    				//console.log("info:",respuesta); 
    				$("#columnasSlide").before('<div class="alert alert-warning text-center">La imagen es inferior al tamaño requerido.</div>');
    			}else if (respuesta == 1) {
	    				//console.log("info:",respuesta);  
	    				$("#columnasSlide").before('<div class="alert alert-warning text-center">Hubo un error al guardar la imagen.</div>');
    				}else{ 
    					//console.log("url:",respuesta);  
    					$("#columnasSlide").css({"height" : "auto"});
    			  		$("#columnasSlide").append('<li id="'+respuesta+'" class="bloqueSlide"><span class="fa fa-times elimSlideImg"></span><img src="views/images/slide/'+respuesta+'" class="handleImg"></li>');
    			  		// agregar item elemento de edicion
    			  		$("#ordenarTextSlide").append('<li><span class="fa fa-pencil editSlider" style="background:blue"></span> <img src="views/images/slide/'+respuesta+'" style="float:left; margin-bottom:10px" width="80%"> <h1>Undefined</h1> <p>Undefined</p> </li>');

    			  		//window.location.reload();
    			  		/*=====================    sweet alert   ================= */
    			  		swal({
    			  			title:"Listo",
    			  			text:"La imagen subio correctamente.",
    			  			alert:"success",
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			},function(isConfirm){
    			  				if(isConfirm) window.location = "index.php?bq=slide";
    			  			}
    			  		);
    				}
    			}
    		 
    	});

    } 

});




/*=====================    Validacion Img   ================= */


/*=====================    Eliminar Img   ================= */


$(".elimSlideImg").click(function(){

	var id = $(this).parent().attr("id"); 
	var datos = new FormData();
    	datos.append("delete", id);
    var boxedit = id.replace(".jpg", "");
    var idRand = Math.floor((Math.random() * 100) + 1);

    $(this).parent().remove();
    $("#edit"+boxedit).remove();
    //console.log("Elim:",boxedit);
    console.log("id:", id);

	$.ajax({
		    url: "views/ajax/slideCrudAjax.php",
    		method:"POST",
			data:datos,
			cache:false,
			contentType: false,
			processData: false,
			success: function(respuesta){   
    		    if(respuesta=="success"){ 
    			    $("#columnasSlide").before('<div class="alert alert-info text-center" id="eliminacion'+idRand+'">La imagen fue eliminada.</div>');
    			    $("#eliminacion"+idRand).fadeOut('slow');
    			}else{
    				console.log("error:", respuesta);
					$("#columnasSlide").before('<div class="alert alert-warning text-center"  id="eliminacion">Hubo un error al borrar.</div>');
    				} 
    		}
    			 
	}); 
	$("#columnasSlide").css({"minHeight" : "100px"});

});

/*=====================    Editar Img   ================= */

$(".editSlider").click(function(){


	var id = $(this).parent().attr("id");
	var img = $(this).parent().children("img").attr("src"); 
	var titulo = $(this).parent().children("h1").html(); 
	var descrip = $(this).parent().children("p").html(); 
	console.log("ID:", id);

	$(this).parent().html('<img src="'+img+'" class="img-thumbnail"> <input type="text" id="sendTitulo" class="form-control" placeholder="Título" value="'+titulo+'"> <textarea id="sendDescrip" row="5" class="form-control" placeholder="Descripción">'+descrip+'</textarea> <button id="btnSaveeditslider'+id+'" class="btn btn-primary pull-right" style="margin:10px">Guardar</button>');

	$("#btnSaveeditslider"+id).click(function(){
		var ID = id.slice(4,30)+".jpg";
		var Titulo = $("#sendTitulo").val();
		var Descrip = $("#sendDescrip").val();

		var datos = new FormData();
    	datos.append("id", ID);
    	datos.append("titulo", Titulo);
    	datos.append("descripcion", Descrip);
    	console.log("Id-saveslider:", ID);

    	$.ajax({
    	    url: "views/ajax/slideCrudAjax.php",
    		method:"POST",
			data:datos,
			cache:false,
			contentType: false,
			processData: false,
			dataType:"json",
			success: function(respuesta){    
    		    	console.log("respuesta", respuesta);
    			    $("#btnSave"+id).parent().html('<span class="fa fa-pencil editSlider" style="background:blue"></span> <img src="../views/images/slide/'+respuesta["imagen"]+'" style="float:left; margin-bottom:10px" width="80%"> <h1>'+respuesta["titulo"]+'</h1> <p>'+respuesta["descripcion"]+'</p>');
    			   

    			   /*=====================    sweet alert   ================= */
    			  		swal({
    			  			title:"Listo",
    			  			text:"Los cambios se han guardado.",
    			  			alert:"success",
    			  			confirmButtonText:"Cerrar",
    			  			confirmButtonColor: "#1ab394",
    			  			closeOnConfirm:false
    			  			},function(isConfirm){
    			  				if(isConfirm) window.location = "index.php?bq=slide&ok&"+id+"#edicionGaleria";
    			  			}
    			  		);

    			 
    		}// success: function

    	   });


	});

});


/*=============================================
ORDENAR SLIDE     
=============================================*/

/* Ordenar Slide */
var almacenarOrdenImagen = new Array();
var orderItem = new Array();
var cambioOrdenImagen = false;

$("#ordenarSlide").click(function(){

    $( "#columnasSlide").css({"cursor":"move"})
    $( "#columnasSlide span").hide()
         
    $( "#columnasSlide").sortable({
        revert: true,
        connectWith: ".bloqueSlide",
        handle: ".handleImg",   
        stop: function( event, ui ) {

        cambioOrdenImagen = true;

        for(var i= 0; i < $( "#columnasSlide li").length; i++){

            almacenarOrdenImagen[i] = event.target.children[i].id; 
            orderItem[i] = i+1;
            /*
            console.log("ordernID:", almacenarOrdenImagen[i]);
            console.log("orden:", orderItem[i]);
            */

            
            }
        }
    })

    $("#ordenarSlide").hide();
    $("#guardarSlide").show();

})

/* Guardar Orden Slide */ 

$("#guardarSlide").click(function(){

    if(cambioOrdenImagen){

        $("#textoSlide ul").html("")

        for(var i= 0; i < $( "#columnasSlide li").length; i++){


            var actualizarOrden = new FormData();
            actualizarOrden.append("Item", almacenarOrdenImagen[i]);
            actualizarOrden.append("Orden", orderItem[i]);

            $.ajax({
                url: "views/ajax/slideCrudAjax.php",
                method:"POST",
                data:actualizarOrden,
                cache:false,
                contentType: false,
                processData: false, 
                success: function(respuesta){    
                         
                     /*=====================    sweet alert   ================= */
                        swal({
                            title:"Listo",
                            text:"El nuevo orden se han guardado.",
                            alert:"success",
                            confirmButtonText:"Cerrar",
                            confirmButtonColor: "#1ab394",
                            closeOnConfirm:false
                            },function(isConfirm){
                                if(isConfirm) window.location = "index.php?bq=slide";
                            }
                        );
                }// success: function
            });

            }
     }

    $("#columnasSlide").css({"cursor":"auto"}) 
    $("#columnasSlide span").show()

    $("#columnasSlide").disableSelection();

    $("#ordenarSlide").show();

    $("#guardarSlide").hide();

})


/*=====  Fin de ORDENAR SLIDE   ======*/



/*++++++++++++++++++++++++++++++++++++ 
//  Ordenar Img Article
 ++++++++++++++++++++++++++++++++++++*/


/*=============================================
ORDENAR SLIDE     
=============================================*/

/* Ordenar Slide */
var almacenarOrdenImagenArt = new Array();
var orderItemArt = new Array();
var cambioOrdenImagenArt = false;

$("#ordenarImgArt").click(function(){

    $( "#galeriaArticulo").css({"cursor":"move"})
    $( "#galeriaArticulo span").hide()
         
    $( "#galeriaArticulo").sortable({
        revert: true,
        connectWith: ".bloqueSlide",
        handle: ".handleImg",   
        stop: function( event, ui ) {

        cambioOrdenImagenArt = true;

        for(var i= 0; i < $( "#galeriaArticulo li").length; i++){

            almacenarOrdenImagenArt[i] = event.target.children[i].id; 
            orderItemArt[i] = i+1;
            
            }
        }
    })

    $("#ordenarImgArt").hide();
    $("#guardarImgArt").show();

});

/* Guardar Orden Slide */ 

$("#guardarImgArt").click(function(){

    var id = $(this).attr("data");

    if(cambioOrdenImagenArt){

        $("#textoSlide ul").html("")

        for(var i= 0; i < $( "#galeriaArticulo li").length; i++){


            var actualizarOrden = new FormData();
            actualizarOrden.append("Item", almacenarOrdenImagenArt[i]);
            actualizarOrden.append("Orden", orderItemArt[i]);

            //console.log("ite:", almacenarOrdenImagenArt[i]);
           // console.log("Ord:", orderItemArt[i]);

            $.ajax({
                url: "views/ajax/artImgCrudAjax.php",
                method:"POST",
                data:actualizarOrden,
                cache:false,
                contentType: false,
                processData: false, 
                success: function(respuesta){    
                         
                     /*=====================    sweet alert   ================= */
                        swal({
                            title:"Listo",
                            text:"El nuevo orden se han guardado.",
                            alert:"success",
                            confirmButtonText:"Cerrar",
                            confirmButtonColor: "#1ab394",
                            closeOnConfirm:false
                            },function(isConfirm){
                                if(isConfirm) window.location = "index.php?bq=blog-img&id="+id;
                            }
                        );
                }// success: function
            });

            }
     }

    $("#galeriaArticulo").css({"cursor":"auto"}) 
    $("#galeriaArticulo span").show()

    $("#galeriaArticulo").disableSelection();

    $("#ordenarImgArt").show();

    $("#guardarImgArt").hide();

});

























/*++++++++++++++++++++++++++++++++++++ 
//  AgregarForma articulo
 ++++++++++++++++++++++++++++++++++++*/

 

 $("#btnAgregarArt").click(function(){
    $("#agregarArticulo").toggle(400);
 });




$("#subirFoto").on("change", function(){
    
    permitido = 2000000; // 2 MB  
    imagen = this.files[0];
    //console.log("Img:", imagen);
    tamanio = imagen.size;
    formato = imagen.type; 
    //console.log("data", permitido);

    if(Number(tamanio)>permitido){  
        $("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El tamaño es superior al permitido</div>'); 
    }else{
        
        if(formato=="image/jpeg" || formato=="image/png" ){
             $(".alert").remove();
        }else{
            $("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El formato no es compatible .JPG</div>');
        }

    } // limit Tamaño


    if(Number(tamanio)<permitido && formato=="image/jpeg" || formato=="image/png" ){ // 2 MB

        var datos = new FormData();
        datos.append("imagen", imagen); 

        $.ajax({
            url: "views/ajax/articuloCrudAjax.php",
            method:"POST",
            data:datos,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $("#arrastreImagenArticulo").before("<div class='text-center' id='loaderSts'><img src='views/images/cargando.gif'> Cargando...</div>");
            },
            success: function(respuesta){ 
                 console.log("respuesta:", respuesta);
                 $("#loaderSts").remove();
                 $("#arrastreImagenArticulo").html('<div id="imagenArticulo"><img src="views/images/articulos/tmp/'+respuesta+'" class="img-thumbnail"></div>');
     
                } 
        }); 

    }

    


});



/*++++++++++++++++++++++++++++++++++++ 
//  Editar Tipo Inmueble
 ++++++++++++++++++++++++++++++++++++*/


$(".EditarTipoInmueble").click(function(){
   // console.log("Entro");

   var id = $(this).attr("data-id");
    var titulo = $(this).attr("data-titulo"); 

    $(this).parent().parent().html('<form method="post" enctype="multipart/form-data"><span> <input type="submit" style="width:10%; padding:5px 0; margin-top:4px;" class="btn btn-primary pull-right" value="Guardar"></span> <input type="text" value="'+titulo+'" name="titulo"><input type="hidden" name="id" value="'+id+'" ><hr></form>');
 
 

});




/*++++++++++++++++++++++++++++++++++++ 
//  Editar Articulo
 ++++++++++++++++++++++++++++++++++++*/


$(".editarArticuloLista").click(function(){
   // console.log("Entro");

    var id = $(this).attr("data");

    var img = $(this).parent().parent().parent().children("img").attr("src"); 
    var titulo = $(this).parent().parent().parent().children("h1").html(); 
    var intro = $(this).parent().parent().parent().children("p").html(); 
    var descrip = $(this).parent().parent().parent().children("i").html()
    var video = $(this).parent().parent().parent().children("#videoBlog").html(); 
    console.log("Editar", video);



    archivo = img.replace("views/images/articulos/", "");

    $(this).parent().parent().html('<form method="post" enctype="multipart/form-data"><span> <input type="submit" style="width:10%; padding:5px 0; margin-top:4px;" class="btn btn-primary pull-right" value="Guardar"></span><div id="editarImagen"><input type="file"  id="imagenNueva" style="display:none;"><div id="nuevaFoto"><span class="fa fa-times cambiarImagen"></span><img src="'+img+'" id="imgActual" class="img-thumbnail"></div></div><input type="hidden" value="'+id+'" name="idEdit"><input type="hidden" value="'+archivo+'" name="oldImg"><input type="text" value="'+titulo+'" name="titulo"><textarea cols="30" rows="4" name="intro">'+intro+'</textarea><textarea   id="editarContenido" cols="30" rows="10"  name="descripEdit">'+descrip+'</textarea><input type="text" value="'+video+'" name="video"><hr></form>');

    $(".cambiarImagen").click(function(){
                    $(this).hide();
                    $("#nuevaFoto").html("");


                    $("#imagenNueva").show();
                    $("#imagenNueva").css({"width":"90%"});
                    $("#imagenNueva").attr("name","imagenNueva");
                    $("#imagenNueva").attr("require",true);

                    $("#imagenNueva").change(function(){


                permitido = 2000000; // 2 MB  
                imagen = this.files[0];
               // console.log("Img:", imagen);
                tamanio = imagen.size;
                formato = imagen.type; 
                //console.log("permitido:", permitido);

                if(Number(tamanio)>permitido){  
                    $("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El tamaño es superior al permitido</div>'); 
                }else{
                    
                    if(formato=="image/jpeg" || formato=="image/png" ){
                         $(".alert").remove();
                    }else{
                        $("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El formato no es compatible .JPG</div>');
                    }

                } // limit Tamaño


                if(Number(tamanio)<permitido && formato=="image/jpeg" || formato=="image/png" ){ // 2 MB

                    var datos = new FormData();
                    datos.append("imagen", imagen); 

                    $.ajax({
                        url: "views/ajax/articuloCrudAjax.php",
                        method:"POST",
                        data:datos,
                        cache:false,
                        contentType: false,
                        processData: false,
                        beforeSend: function(){
                            $("#nuevaFoto").html("<div class='text-center' id='loaderSts'><img src='views/images/cargando.gif'> Cargando...</div>");
                        },
                        success: function(respuesta){ 
                            console.log("respuesta:", respuesta);
                             $("#loaderSts").remove();
                             $("#nuevaFoto").html('<img src="views/images/articulos/temp/'+respuesta+'" class="img-thumbnail">');
                 
                            } 
                    }); 

                }



        });

    });









});





























/*++++++++++++++++++++++++++++++++++++ 
//  Area Dragdrop
 ++++++++++++++++++++++++++++++++++++*/
if( $("#lightbox").html()==0 ){
      $("#lightbox").css({"height" : "100px"});
}else{
      $("#lightbox").css({"height" : "auto"});
}



/*=====================    Validacion Img   ================= */

$("#lightbox").on("dragover", function(e){
    // detiene eventos definidos
    e.preventDefault();
    e.stopPropagation();
    $("#lightbox").css({"background":"url(views/images/pattern.jpg)"}); 
    //console.log("hover");
});
$("#lightbox").on("drop", function(e){
    // detiene eventos definidos
    e.preventDefault();
    e.stopPropagation(); 
    $("#lightbox").css({"background":"#fff"}); 

    var permitido = 2000000; // 2 MB
    var archivo = e.originalEvent.dataTransfer.files;
    var img = archivo[0];
    var tamanio = img.size;
    var formato = img.type;
    //console.log("archivo:", archivo);
    //console.log("type:", formato);


    if(Number(tamanio)>permitido){  
        $("#lightbox").before('<div class="alert alert-warning text-center">El tamaño es superior al permitido</div>'); 
    }else{
         

         if(formato=="image/jpeg" || formato=="image/png" ){
                 $(".alert").remove();
            }else{
                $("#lightbox").before('<div class="alert alert-warning text-center">El formato no es compatible .JPG</div>');
            }

    } // limit Tamaño

    
    

    /*=====================    Upload   ================= */
    if(Number(tamanio)<permitido && formato=="image/jpeg" || formato=="image/png" ){ // 2 MB
        var datos = new FormData();
        datos.append("imagen", img); 
        //console.log("enviando");

        $.ajax({
            url: "views/ajax/galeriaCrudAjax.php",
            method:"POST",
            data:datos,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $("#lightbox").before("<div class='text-center' id='loaderSts'><img src='views/images/cargando.gif'> Cargando...</div>");
            },
            success: function(respuesta){ 
                $("#loaderSts").remove();
                if(respuesta == 0){
                    //console.log("info:",respuesta); 
                    $("#lightbox").before('<div class="alert alert-warning text-center">La imagen es inferior al tamaño requerido.</div>');
                }else if (respuesta == 1) {
                        //console.log("info:",respuesta);  
                        $("#lightbox").before('<div class="alert alert-warning text-center">Hubo un error al guardar la imagen.</div>');
                    }else{ 
                        //console.log("url:",respuesta);  
                        $("#lightbox").css({"height" : "auto"});
                        $("#lightbox").append('<li><span class="fa fa-times elimImg"></span><a rel="grupo" href="views/images/galeria/'+respuesta+'"><img src="views/images/galeria/'+respuesta+'"></a></li>');
                        // agregar item elemento de edicion
                         
                        //window.location.reload();
                        /*=====================    sweet alert   ================= */
                        swal({
                            title:"Listo",
                            text:"La imagen subio correctamente.",
                            alert:"success",
                            confirmButtonText:"Cerrar",   ///V:    1ab394      ///R:    DD6B55
                            confirmButtonColor: "#1ab394",
                            closeOnConfirm:false
                            },function(isConfirm){
                                if(isConfirm) window.location = "index.php?bq=imagenes";
                            }
                        );
                    }
                }
             
        });

    } 

});
/*=====================    Validacion Img   ================= */


/*=====================    Eliminar Img   ================= */


$(".elimImg").click(function(){
    
    console.log("id:", id);


    var id = $(this).parent().attr("id"); 
    var datos = new FormData();
        datos.append("delete", id);
    var boxedit = id.replace(".jpg", "");
    var idRand = Math.floor((Math.random() * 100) + 1);

    $(this).parent().remove();  

    $.ajax({
            url: "views/ajax/galeriaCrudAjax.php",
            method:"POST",
            data:datos,
            cache:false,
            contentType: false,
            processData: false,
            success: function(respuesta){   
                if(respuesta=="success"){ 
                    $("#lightbox").before('<div class="alert alert-info text-center" id="eliminacion'+idRand+'">La imagen fue eliminada.</div>');
                    $("#eliminacion"+idRand).fadeOut('slow');
                }else{
                    $("#lightbox").before('<div class="alert alert-warning text-center"  id="eliminacion">hubo un error al borrar.</div>');
                    } 
            }
                 
    }); 
    $("#lightbox").css({"minHeight" : "100px"});
                

     

});









/*=============================================
ORDENAR SLIDE     
=============================================*/

/* Ordenar Slide */
var almacenarOrdenImagen = new Array();
var orderItem = new Array();
var cambioOrdenImagen = false;

$("#ordenarSlide").click(function(){

    $( "#lightbox").css({"cursor":"move"})
    $( "#lightbox span").hide();

    /* Incluir en li class : bloqueGaleria  y img : handleImg */
         
    $( "#lightbox").sortable({
        revert: true,
        connectWith: ".bloqueGaleria",
        handle: ".handleImg",   
        stop: function( event, ui ) {

        cambioOrdenImagen = true;

        for(var i= 0; i < $( "#lightbox li").length; i++){

            almacenarOrdenImagen[i] = event.target.children[i].id; 
            orderItem[i] = i+1;
            /*
            console.log("ordernID:", almacenarOrdenImagen[i]);
            console.log("orden:", orderItem[i]);
            */

            
            }
        }
    })

    $("#ordenarSlide").hide();
    $("#guardarSlide").show();

})

/* Guardar Orden Slide */ 

$("#guardarSlide").click(function(){

    if(cambioOrdenImagen){

       // $("#textoSlide ul").html("")

        for(var i= 0; i < $( "#lightbox li").length; i++){


            var actualizarOrden = new FormData();
            actualizarOrden.append("Item", almacenarOrdenImagen[i]);
            actualizarOrden.append("Orden", orderItem[i]);

            $.ajax({
                url: "views/ajax/galeriaCrudAjax.php",
                method:"POST",
                data:actualizarOrden,
                cache:false,
                contentType: false,
                processData: false, 
                success: function(respuesta){    
                         
                     /*=====================    sweet alert   ================= */
                        swal({
                            title:"Listo",
                            text:"El nuevo orden se han guardado.",
                            alert:"success",
                            confirmButtonText:"Cerrar",
                            confirmButtonColor: "#1ab394",  ///V:    1ab394      ///R:    DD6B55
                            closeOnConfirm:false
                            },function(isConfirm){
                                if(isConfirm) window.location = "index.php?bq=imagenes";
                            }
                        );
                }// success: function
            });

            }
     }

    $("#lightbox").css({"cursor":"auto"}) 
    $("#lightbox span").show()

    $("#lightbox").disableSelection();

    $("#ordenarSlide").show();

    $("#guardarSlide").hide();

})


/*=====  Fin de ORDENAR SLIDE   ======*/




/*=====================    Subir video   ================= */
 
if( $("#galeriaVideo").html()==0 ){
      $("#galeriaVideo").css({"height" : "100px"}); 
}else{
      $("#galeriaVideo").css({"height" : "auto"});
}

$("#archivo").change(function(){

    video = this.files[0];
    tamanio = video.size;
    formato = video.type;

    maximo = 50000000;
    console.log("file:", video);

     

    if(tamanio > maximo){
        $("#galeriaVideo").before('<div class="alert alert-warning text-center">El tamaño es superior al permitido</div>');
    }else{
        $(".alert").remove();
    }

    if(formato != "video/mp4"){
        $("#galeriaVideo").before('<div class="alert alert-warning text-center">El formato es incorrecto (.mp4)</div>');
    }else{
        $(".alert").remove();
    }


    if(tamanio < maximo && formato == "video/mp4"){

        var datos = new FormData();
        datos.append("archivoVideo", video);

        $.ajax({ 
            url: "views/ajax/videoCrudAjax.php",
            method:"POST",
            data:datos,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $("#galeriaVideo").before("<div class='text-center' id='loaderSts'><img src='views/images/cargando.gif'> Cargando...</div>");
            },
            success: function(respuesta){ 

                console.log("Resp:", respuesta);

                if(respuesta !="error"){
                $("#loaderSts").remove();
                $("#galeriaVideo").append('<li id="'+respuesta+'"><span class="fa fa-times deleteVideo"></span><video controls><source src="views/videos/'+respuesta+'" type="video/mp4"></video></li>');

                swal({
                            title:"Listo",
                            text:"El archivo subio correctamente.",
                            alert:"success",
                            confirmButtonText:"Cerrar",
                            confirmButtonColor: "#1ab394",  ///V:    1ab394      ///R:    DD6B55
                            closeOnConfirm:false
                            },function(isConfirm){
                                if(isConfirm) window.location = "index.php?bq=videos";
                            }
                        );

            }else{
                $("#loaderSts").remove();
                swal({
                            title:"Error",
                            text:"Ocurrio un error al subir el video, intente de nuevo.",
                            type:"warning",
                            confirmButtonText:"Cerrar",
                            confirmButtonColor: "#DD6B55",  ///V:    1ab394      ///R:    DD6B55
                            closeOnConfirm:false
                            } 
                        );
            }



            }

        });

    }
    

 

});



/*=====================    Eliminar video   ================= */

$(".deleteVideo").click(function(){
    
 
    
 

    var id = $(this).parent().attr("id"); 
    var datos = new FormData();
        datos.append("delete", id); 
    var idRand = Math.floor((Math.random() * 100) + 1);

    //console.log("id:", id);

    $(this).parent().remove();  

    $.ajax({
            url: "views/ajax/videoCrudAjax.php",
            method:"POST",
            data:datos,
            cache:false,
            contentType: false,
            processData: false,
            success: function(respuesta){   
                if(respuesta=="success"){ 
                    $("#galeriaVideo").before('<div class="alert alert-info text-center" id="eliminacion'+idRand+'">El archivo fue eliminada.</div>');
                    $("#eliminacion"+idRand).fadeOut('slow');
                }else{
                    $("#galeriaVideo").before('<div class="alert alert-warning text-center"  id="eliminacion">hubo un error al borrar.</div>');
                    } 
            }
                 
    });  
 
                

     

});








  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //Paginas
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$('.summernote').summernote({
        toolbar: [
          // [groupName, [list of button]]
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'images', 'table']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height'],'hr'],
          ['insert', ['link', 'picture']],
          ['view', [ 'codeview' ]],
        ],
        height: 600,
        //width:900,
        tabsize: 2,
        followingToolbar: true,
        callbacks:{
          onImageUpload: function(files){
            //console.log(files);
            for (var i = 0; i < files.length; i++) {
               upload(files[i]);
            }
          }
        } 
});

function upload(files){
  //console.log(files);
  var datos =  new FormData();
  datos.append('file', files, files.name);
  datos.append('url', path);
  $.ajax({
      url:'views/modules/upload-summernote.php',
      method:'post',
      data:datos,
      contentType:false,
      cache:false,
      processData:false,
      success:function(respuesta){
        $('.summernote').summernote("insertImage", respuesta);
      },
      error:function(jqXHR, testStatus, errorThrown){
        console.log(textStatus+' '+errorThrown);
      }
  });
}


 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 // blog
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++


$('.summernoteBlog').summernote({
        toolbar: [
          // [groupName, [list of button]]
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'images', 'table']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height'],'hr'],
          ['insert', ['link', 'picture']],
          ['view', [ 'codeview' ]],
        ],
        height: 600,
        //width:900,
        tabsize: 2,
        followingToolbar: true,
        callbacks:{
          onImageUpload: function(files){
            //console.log(files);
            for (var i = 0; i < files.length; i++) {
               uploadBlog(files[i]);
            }
          }
        } 
});

function uploadBlog(files){
  //console.log(files);
  var datos =  new FormData();
  datos.append('file', files, files.name);
  datos.append('url', path);
  $.ajax({
      url:'views/modules/upload-blog-summernote.php',
      method:'post',
      data:datos,
      contentType:false,
      cache:false,
      processData:false,
      success:function(respuesta){
        $('.summernoteBlog').summernote("insertImage", respuesta);
      },
      error:function(jqXHR, testStatus, errorThrown){
        console.log(textStatus+' '+errorThrown);
      }
  });
}












}); // jQuery




























