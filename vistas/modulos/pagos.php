<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <div class="text-white"  style="#17202A:98%; margin-left:5%;margin-top:5%;">ADMINISTRAR PAGOS
                    </div>
                </h3>
            </div>

        </div>

        <div class="clearfix bg-info"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="crear-pago">
                            <button class="btn btn-outline-info pull-right" data-toggle="modal"
                                data-target="#modalAgregarUsuario">

                                <span class="fa fa-ticket"></span>NUEVO PAGO

                            </button>
                        </a>
                        <form> <span class="fas fa-hand-point-right" type = "button" value = "volver"></span>
<input type = "button" value = "volver" onclick = "history.back ()"> </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable" class="table table-striped table-bordered dt-responsive tablas"
                                    style="color:black; width:100%">
                                    <thead
                                    style="text-align:center; background-color:#c17fa1; font-size:16px; color:#f7f9f9;">
                                            <tr>
                                                <th style="#17202A:10px">#</th>
                                                <th>N° Pago</th>
                                                <th>Cliente</th>
                                                <th>Fecha</th>
                                                <th>Pago total</th>
                                                <th>Forma de pago</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
    <?php
        $item = null;
        $valor = null;
        $respuesta = ControladorPagos::ctrMostrarPagos($item, $valor);

        foreach ($respuesta as $key => $value) {
            echo '<tr>
                <td>' . ($key + 1) . '</td>  <!-- Número de Pago Generado -->
                <td style="text-align:center">' . ($key + 1) . '</td>';  // Generación desde 1

            $itemCliente = "idcliente";
            $valorCliente = $value["idcliente"];
            $respuestaCliente = ControladorClientes::ctrMostrarCliente($itemCliente, $valorCliente);

            echo '<td>' . $respuestaCliente["nombres"] . ' ' . $respuestaCliente["apellidos"] . '</td>
                <td>' . $value["fecha"] . '</td>
                <td style="text-align:center">Bs ' . number_format($value["total"], 2) . '</td>
                <td>' . $value["metodo_pago"] . '</td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-info btnImprimirPago" boletaPago="' . $value["numeroPago"] . '">
                            <i class="fa fa-print"></i>
                        </button>
                        <button class="btn btn-info btnDescargarPago" boletaPago="' . $value["numeroPago"] . '" style="width:90%; margin-left:1%">
                            <i class="fa fa-download"></i>
                        </button>
                    </div>
                </td>
            </tr>';
        }
    ?>
</tbody>


                                </table>

                               

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->