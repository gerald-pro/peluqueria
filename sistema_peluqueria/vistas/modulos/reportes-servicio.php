<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <div class="text-#17202A" style="width:98%; margin-left:2%;margin-top:2%;"> REPORTES DE SERVICIO
                    </div>
                </h3>
            </div>

        </div>

        <div class="clearfix bg-info"></div>

        <div class="card">
            <div class="card-body">


                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a href="#reporte1" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <i class="mdi mdi-home-variant d-lg-none d-block"></i>
                            <span class="d-none d-lg-block">SERVICIOS MAS SOLICITADOS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#reporte2" data-toggle="tab" aria-expanded="true" class="nav-link active">
                            <i class="mdi mdi-account-circle d-lg-none d-block"></i>
                            <span class="d-none d-lg-block">TOTAL DE INGRESOS POR SERVICIO</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#reporte3" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <i class="mdi mdi-settings-outline d-lg-none d-block"></i>
                            <span class="d-none d-lg-block">SERVICIOS UTILIZADOS POR CLIENTE</span>
                        </a>
                    </li>
                    
                </ul>

                <div class="tab-content">

                    <!-- ==================================================================================== -->

                    <div class="tab-pane" id="reporte1">
                        <h4>SERVICIOS MAS SOLICITADOS</h4>

                        <button class="btn btn-outline-info pull-right btnReporteServicios1">
                            <span class="fa fa-print"></span>EXPORTAR PDF
                        </button>

                        <table class="table table-striped table-bordered dt-responsive tablas" style="width:100%">


                            <thead style="text-align:center; background-color:#D6CCCB; font-size:16px; color:#17202A;">

                                <tr>

                                    <th style="width:10px">#</th>
                                    <th>NOMBRE</th>
                                    <th>PRECIO</th>
                                    <th>SOLICITUDES</th>

                                </tr>

                            </thead>

                            <tbody style="text-align:center">

                                <?php
                                $servicios = ModeloServicios::mdlServiciosMasSolicitados();
                                foreach ($servicios as $key => $value) {
                                    echo '<tr>
                                                                    <td>' . ($key + 1) . '</td>
                                                                    <td>' . htmlspecialchars($value["nombre"]) . '</td>
                                                                    <td>' . htmlspecialchars($value["precio"]) . '</td>
                                                                    <td>' . htmlspecialchars($value["total_solicitudes"]) . '</td>
                                                                </tr>';
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>

                    <!-- ==================================================================================== -->

                    <div class="tab-pane show active" id="reporte2">

                        <h4>TOTAL DE INGRESOS POR SERVICIO</h4>
                        <button class="btn btn-outline-info pull-right btnReporteServicios2">
                            <span class="fa fa-print"></span>EXPORTAR PDF
                        </button>

                        <table class="table table-striped table-bordered dt-responsive tablas" style="width:100%">


                            <thead style="text-align:center; background-color:#D6CCCB; font-size:16px; color:#17202A;">

                                <tr>

                                    <th style="width:10px">#</th>
                                    <th>NOMBRE</th>
                                    <th>TOTAL DE INGRESOS</th>

                                </tr>

                            </thead>

                            <tbody style="text-align:center">

                                <?php
                                $servicios = ModeloServicios::mdlIngresoTotalPorServicio();
                                foreach ($servicios as $key => $value) {
                                    echo '<tr>
                                                                    <td>' . ($key + 1) . '</td>
                                                                    <td>' . htmlspecialchars($value["nombre"]) . '</td>
                                                                    <td>' . htmlspecialchars($value["total_ingresos"]) . '</td>
                                                                </tr>';
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>

                    <!-- ==================================================================================== -->

                    <div class="tab-pane" id="reporte3">

                        <h4>SERVICIOS UTILIZADOS POR CLIENTE</h4>

                        <button class="btn btn-outline-info pull-right btnReporteServicios2">
                            <span class="fa fa-print"></span>EXPORTAR PDF
                        </button>

                        <table class="table table-striped table-bordered dt-responsive tablas" style="width:100%">


                            <thead style="text-align:center; background-color:#D6CCCB; font-size:16px; color:#17202A;">

                                <tr>

                                    <th style="width:10px">#</th>
                                    <th>DOCUMETO</th>
                                    <th>NOMBRES</th>
                                    <th>APELLIDOS</th>
                                    <th>SERVICIO</th>
                                    <th>TOTAL USOS</th>

                                </tr>

                            </thead>

                            <tbody style="text-align:center">

                                <?php
                                $servicios = ModeloServicios::mdlServiciosUtilizadosCliente();
                                foreach ($servicios as $key => $value) {
                                    echo '<tr>
                                                                    <td>' . ($key + 1) . '</td>
                                                                    <td>' . htmlspecialchars($value["documento"]) . '</td>
                                                                    <td>' . htmlspecialchars($value["nombres"]) . '</td>
                                                                    <td>' . htmlspecialchars($value["apellidos"]) . '</td>
                                                                    <td>' . htmlspecialchars($value["servicio"]) . '</td>
                                                                    <td>' . htmlspecialchars($value["total_uso"]) . '</td>
                                                                </tr>';
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>
                </div>

            </div> <!-- end card-body-->
        </div>
    </div>
</div>

</div>



<!-- /page content -->