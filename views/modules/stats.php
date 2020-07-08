<?php 


$vent = new ventasController();
$compl = $vent->SumaVentasController('Completado');

if($compl["total"] > 0 ) $mCompl =  "$ ". number_format($compl["total"], 2). " MXN"; else $mCompl =null;

$pend = $vent->SumaVentasController('Pendiente');
if($pend["total"] > 0 ) $mPend =  "$ ". number_format($pend["total"], 2). " MXN"; else $mPend =null;


?>
<div  class="wrapper wrapper-content animated fadeInRight " style="padding-bottom: 0px;">
    <div class="row">

    	<div class="col-lg-3">
    		           <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <a href="index.php?bq=pedidos-concretados">
                                <span class="label label-primary pull-right">Ver todos</span></a>
                                <h5>Ventas cerradas</h5>
                            </div>
                            <div class="ibox-content">
                                <h2 class="no-margins"><?php echo $mCompl; ?></h2>
                                <div class="stat-percent font-bold text-navy"><i class="fa fa-check"></i></div>
                                <small><?php echo $compl["filas"]; ?> pedidos</small>
                            </div>
                        </div>
    	</div>

        <div class="col-lg-3">
                       <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <a href="index.php?bq=pedidos-pendientes">
                                <span class="label label-warning pull-right">Ver todos</span></a>
                                <h5>Pedidos pend.</h5>
                            </div>
                            <div class="ibox-content">
                                <h2 class="no-margins"><?php echo $mPend; ?></h2>
                                <div class="stat-percent font-bold text-warning"> <i class="fa fa-clock-o"></i></div>
                                <small><?php echo $pend["filas"]; ?> Pedidos</small>
                            </div>
                        </div>
        </div>

        <div class="col-lg-3">
                       <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <a href="index.php?bq=productos">
                                <span class="label label-success pull-right">Ver todos</span></a>
                                <h5>Productos</h5>
                            </div>
                            <div class="ibox-content">
                                <h2 class="no-margins"><?php $vent->TotalProdController(); ?> productos</h2>
                                <div class="stat-percent font-bold text-muted"> <i class="fa fa-inbox"></i></div> 
                                <small>Todas las categorías</small>
                            </div>
                        </div>
        </div>

        <div class="col-lg-3">
                       <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <a href="index.php?bq=clientes">
                                <span class="label label-info pull-right">Ver todos</span></a>
                                <h5>Clientes</h5>
                            </div>
                            <div class="ibox-content">
                                <h2 class="no-margins"><?php $vent->TotalClientesController(); ?> Clientes</h2>
                                <div class="stat-percent font-bold text-muted"> <i class="fa fa-user"></i></div>
                                <small><?php $vent->TotalClientesMesController(); ?> Nuevos este mes</small>
                            </div>
                        </div>
        </div>



   </div>  <!-- row -->






    <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Ventas</h5>
                                <div class="pull-right"> 
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-9">
                                    <div class="flot-chart">
                                        <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <ul class="stat-list">

                                        <li>
                                            <h2 class="no-margins">$ 2,346 MXN</h2>
                                            <small>Ventas Totales</small>
                                            <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 48%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">$ 4,422 MXN</h2>
                                            <small>Mes anterior</small>
                                            <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 60%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">$ 9,180 MXN</h2>
                                            <small>Pedidos no concretados</small>
                                            <div class="stat-percent">22% <i class="fa fa-clock-o text-warning"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 22%;" class="progress-bar progress-bar-warning "></div>
                                            </div>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>


                <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Clientes</h5>
                                 <!-- 
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div> -->
                            </div>
                            <div class="ibox-content ibox-heading">
                                <h3><i class="fa fa-user-o"></i> Últimos clientes</h3>
                                <small><i class="fa fa-tim"></i> Más recientes registrados en el sitio</small>
                            </div>
                            <div class="ibox-content">
                                <div class="feed-activity-list">

                                    <?php $vent->UltimoClientesController(); ?>
 

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Pedidos</h5>
                                       <!-- 
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div> -->
                                    </div>
                                    <div class="ibox-content">
                                        <table class="table table-hover no-margins">
                                            <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Fecha</th>
                                                <th>Cliente</th>
                                                <th>Monto</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                                <?php $vent->UltimoVentasController(); ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Productos más vistos</h5>
                                        <!-- 
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div> -->
                                    </div>
                                    <div class="ibox-content">
                                        <table class="table table-hover no-margins">
                                            <thead>
                                            <tr>
                                                <th>Artículo</th>
                                                <th>Precio</th> 
                                                <th>Visitas</th> 
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                                 <?php $vent->ProdVisitController(); ?>

                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    

                    </div>


                </div>






 </div> <!-- wrapper -->




<script>
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "Number of orders",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Payments",
                    data: data2,
                    yaxis: 2,
                    color: "#1C84C6",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.4
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>




