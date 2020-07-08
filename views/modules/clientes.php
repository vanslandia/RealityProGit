<?php


$contact = new contactController();
$contact->eliminarContactoController();

 ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Clientes </h2>
                   <ol class="breadcrumb">
                        <li>
                            Usuarios que han echo algún carrito en la tienda
                        </li> 
                    </ol>
                </div> 
</div>



<div  class="wrapper wrapper-content animated fadeInRight " style="padding-bottom: 0px;">
    <div class="row">

<?php echo $contact->listaContactoController('cliente'); ?>
 
    </div> <!-- row -->
</div> <!--wrapper wrapper-content animated fadeInRight  -->



