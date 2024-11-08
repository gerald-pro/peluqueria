<?php

$item = null;
$valor = null;
$orden = "id";

// $pagos = ControladorPagos::ctrSumaTotalPagos();

$servicios = ControladorServicios::ctrMostrarServicios($item, $valor, $orden);
$totalServicios = count($servicios);

$clientes = ControladorClientes::ctrMostrarCliente($item, $valor);
$totalClientes = count($clientes);

$trabajadores = ControladorUsuarios::ctrMostrarTrabajadores($item, $valor, $orden);
$totalTrabajadores = count($trabajadores);

$cajeras = ControladorUsuarios::ctrMostrarCajera($item, $valor, $orden);
$totalCajeras = count($cajeras);


?>
        <div class="right_col" role="main" style="min-height: 720px;">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3  class="text-white" style="width:80%; margin-left:5%;margin-top:5%;">Pagina principal</h3>
                    </div>
                </div>
                <div class="clearfix bg-info"></div>
            </div>
            <div class="row" style="display: inline-block;">
                <div class="tile_count">
                    <div class="col-md-4 col-sm-4  tile_stats_count">
                        <span class="count_top" style="color:black"><i class="fa fa-table"></i><b>TOTAL DE SERVICIOS</b></span>
                        <div class="count blue"><?php echo number_format($totalServicios); ?></div>
                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i></span>
                    </div>
                    <!-- <div class="col-md-4 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-check-square"></i> Atenciones Recibidas</span>
                        <div class="count blue">Bs. </div>
                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i></span>
                    </div> -->
                    <div class="col-md-4 col-sm-4  tile_stats_count">
                        <span class="count_top" style="color:black"><i class="fa fa-user-md"></i><b>TOTAL TRABAJADORES</b></span>
                        <div class="count green"><?php echo number_format($totalTrabajadores); ?></div>
                        <span class="count_bottom">
                            Registrados</span>
                    </div>
                    <div class="col-md-4 col-sm-4  tile_stats_count">
                        <span class="count_top" style="color:black"><i class="fa fa-user"></i><b>TOTAL ADMINISTRADOR</b></span>
                        <div class="count green"><?php echo number_format($totalCajeras); ?></div>
                        <span class="count_bottom">
                            Registrados</span>
                    </div>
                    <div class="col-md-4 col-sm-4  tile_stats_count">
                        <span class="count_top" style="color:black"><i class="fa fa-users"></i><b>TOTAL CLIENTES</b></span>
                        <div class="count green"><?php echo number_format($totalClientes); ?></div>
                        <span class="count_bottom">
                            Registrados</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->