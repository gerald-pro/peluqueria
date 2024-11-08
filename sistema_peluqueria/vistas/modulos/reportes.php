<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>REPORTES</h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-6 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">

                        <h3>PAGOS POR RANGO DE FECHAS</h3>

                    </div>
                    <div class="x_content">
                        <form action="/sistema_peluqueria/extensiones/TCPDF-main/pdf/pagosPorRangoFechas.php"
                            target="_blank">

                            <div class="x_title">
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-print">GENERAR
                                        REPORTES
                                    </i></button>
                                <div class="clearfix"></div>
                            </div>

                            <div class="col-md-6 col-sm-6 form-group">
                                <label>DESDE</label>
                                <input type="date" class="form-control" name="fechaInicioPagos" id="fechaInicioFicha"
                                    required>
                            </div>
                            <div class="col-md-6 col-sm-6 form-group row">
                                <label>HASTA</label>
                                <input type="date" class="form-control" name="fechaFinPagos" id="fechaFinFicha"
                                    required>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ==================================================================================== -->

            <div class="col-md-6 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">

                        <h3>TOTAL DE PAGOS POR CLIENTE</h3>

                    </div>
                    <div class="x_content">
                        <form action="/sistema_peluqueria/extensiones/TCPDF-main/pdf/pagosPorCliente.php"
                            target="_blank">

                            <div class="x_title">
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-print">GENERAR
                                        REPORTES
                                    </i></button>
                                <div class="clearfix"></div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-group"></i></span>
                                </div>
                                <select class="form-control" name="idCliente" required>
                                    <option value="">SELECCIONE CLIENTE</option>
                                    <?php

                                    $item = null;
                                    $valor = null;

                                    $cliente = ControladorClientes::ctrMostrarCliente($item, $valor);

                                    foreach ($cliente as $key => $value) {

                                        echo '<option value="' . $value["idcliente"] . '">' . $value["documento"] . ' - ' . $value["nombres"] . '</option>';

                                    }

                                    ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">

                        <h3>TOTAL DE PAGOS POR MES</h3>

                    </div>
                    <div class="x_content">
                        <form action="/sistema_peluqueria/extensiones/TCPDF-main/pdf/totalPagosMes.php" target="_blank">

                            <div class="x_title">
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-print">GENERAR
                                        REPORTES
                                    </i></button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ==================================================================================== -->

            <div class="col-md-6 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">

                        <h3>HISTORIAL DE CITAS POR CLIENTE</h3>

                    </div>
                    <div class="x_content">
                        <form action="/sistema_peluqueria/extensiones/TCPDF-main/pdf/historialCitasCliente.php"
                            target="_blank">

                            <div class="x_title">
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-print">GENERAR
                                        REPORTES
                                    </i></button>
                                <div class="clearfix"></div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-group"></i></span>
                                </div>
                                <select class="form-control" name="idCliente" required>
                                    <option value="">SELECCIONE CLIENTE</option>
                                    <?php

                                    $item = null;
                                    $valor = null;

                                    $cliente = ControladorClientes::ctrMostrarCliente($item, $valor);

                                    foreach ($cliente as $key => $value) {

                                        echo '<option value="' . $value["idcliente"] . '">' . $value["documento"] . ' - ' . $value["nombres"] . '</option>';

                                    }

                                    ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">

                        <h3>SERVICIOS MAS SOLICITADOS</h3>

                    </div>
                    <div class="x_content">
                        <form action="/sistema_peluqueria/extensiones/TCPDF-main/pdf/serviciosMasSolicitados.php"
                            target="_blank">

                            <div class="x_title">
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-print">GENERAR
                                        REPORTES
                                    </i></button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ==================================================================================== -->

            <div class="col-md-6 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">

                        <h3>TOTAL DE INGRESOS POR SERVICIO</h3>

                    </div>
                    <div class="x_content">
                        <form action="/sistema_peluqueria/extensiones/TCPDF-main/pdf/ingresoTotalPorServicio.php"
                            target="_blank">

                            <div class="x_title">
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-print">GENERAR
                                        REPORTES
                                    </i></button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">

                        <h3>SERVICIOS UTILIZADOS POR CLIENTE</h3>

                    </div>
                    <div class="x_content">
                        <form action="/sistema_peluqueria/extensiones/TCPDF-main/pdf/serviciosUtilizadosCliente.php"
                            target="_blank">

                            <div class="x_title">
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-print">GENERAR
                                        REPORTES
                                    </i></button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ==================================================================================== -->

            <div class="col-md-6 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">

                        <h3>TOTAL DE CITAS POR SERVICIO</h3>

                    </div>
                    <div class="x_content">
                        <form action="/sistema_peluqueria/extensiones/TCPDF-main/pdf/totalCitasPorServicio.php"
                            target="_blank">

                            <div class="x_title">
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-print">GENERAR
                                        REPORTES
                                    </i></button>
                                <div class="clearfix"></div>
                            </div>

                            <div class="col-md-6 col-sm-6 form-group">
                                <label>DESDE</label>
                                <input type="date" class="form-control" name="fechaInicio" required>
                            </div>
                            <div class="col-md-6 col-sm-6 form-group row">
                                <label>HASTA</label>
                                <input type="date" class="form-control" name="fechaFin" required>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">

                        <h3>CITAS POR TRABAJADOR</h3>

                    </div>
                    <div class="x_content">
                        <form action="/sistema_peluqueria/extensiones/TCPDF-main/pdf/citasPorTrabajador.php"
                            target="_blank">

                            <div class="x_title">
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-print">GENERAR
                                        REPORTES
                                    </i></button>
                                <div class="clearfix"></div>
                            </div>

                            <div class="col-md-6 col-sm-6 form-group">
                                <label>DESDE</label>
                                <input type="date" class="form-control" name="fechaInicio" required>
                            </div>
                            <div class="col-md-6 col-sm-6 form-group row">
                                <label>HASTA</label>
                                <input type="date" class="form-control" name="fechaFin" required>
                            </div>
                            <div class="col-md-6 col-sm-6 form-group row">
                                <select class="form-control" name="idTrabajador" required>
                                    <option value="">SELECCIONE TRABAJADOR</option>
                                    <?php

                                    $item = null;
                                    $valor = null;

                                    $cliente = ControladorUsuarios::ctrMostrarTrabajadores($item, $valor);

                                    foreach ($cliente as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';

                                    }

                                    ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ==================================================================================== -->

            <!-- <div class="col-md-6 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">

                        <h3>TOTAL DE CITAS POR SERVICIO</h3>

                    </div>
                    <div class="x_content">
                        <form action="/sistema_peluqueria/extensiones/TCPDF-main/pdf/totalCitasPorServicio.php"
                            target="_blank">

                            <div class="x_title">
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-print">GENERAR
                                        REPORTES
                                    </i></button>
                                <div class="clearfix"></div>
                            </div>

                            <div class="col-md-6 col-sm-6 form-group">
                                <label>DESDE</label>
                                <input type="date" class="form-control" name="fechaInicio" required>
                            </div>
                            <div class="col-md-6 col-sm-6 form-group row">
                                <label>HASTA</label>
                                <input type="date" class="form-control" name="fechaFin" required>
                            </div>
                            <div class="col-md-6 col-sm-6 form-group row">
                                <label>HASTA</label>
                                <select class="form-control" name="idCliente" required>
                                    <option value="">SELECCIONE CLIENTE</option>
                                
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

            </div> -->
        </div>
    </div>
    <!-- /page content -->