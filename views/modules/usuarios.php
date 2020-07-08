<?php

 
getHeader();

$lista = new usuariosController(); 
$lista->DeleteUsuarioController();

 
?> 


<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Listado de usuarios</h2>
                   
                </div>
                <div class="col-lg-2">

                </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight ">
            <div class="row">
                <div class="col-lg-12 contSeccion">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Usuarios activos en la plataforma.</h5>
                        
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped   table-hover dataTables-example" >
                    <thead>

                    <tr>
                        <th>Registro</th>
                        <th>Nombre</th>
                        <th>Nivel</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                     
                     $lista->ListUserController();

                     ?> 

                    
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
 

