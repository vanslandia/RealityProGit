<?php

 
getHeader();

$lista = new usuariosController(); 
$lista->DeleteUsuarioController();

 
?> 


<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Listado de cupones</h2>
                   
                </div>
                <div class="col-lg-2">

                </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight ">
            <div class="row">
                <div class="col-lg-12 contSeccion">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Últimos cupones</h5>
                        <div class="ibox-tools">
                                    <a class="collapse-link">
                                        Buscar
                                        <i class="fa fa-chevron-down"></i>
                                    </a> 
                                </div>
                        
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                             <table class="table table-hover no-margins">
                                            <thead>
                                            <tr>
                                                <th>Artículo</th> 
                                                <th>Precio</th> 
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><small>Sillón de lona</small></td> 
                                                <td class="text-navy"> $ 3,000.00 MXN</td>
                                                <td><i class="fa fa-pencil text-navy"></i></td>
                                            </tr>
                                            </tbody>
                                        </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
 

