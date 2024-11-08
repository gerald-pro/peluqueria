<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <div class="text-white" style="width:98%; margin-left:2%;margin-top:3%;">Administrar consultas
                    </div>
                </h3>
            </div>

        </div>

        <div class="clearfix bg-info"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="crear-consultas">
                            <button class="btn btn-outline-info pull-right">

                                <span class="fa fa-ticket"></span>NUEVA CONSULTA

                            </button>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="Datatable" class="table table-striped table-bordered responsive tablas"
                                    style="width:100%">

                                    <thead
                                        style="text-align:center; background-color:#5D6D7E; font-size:16px; color:white;">

                                        <tr>

                                            <th style="width:10px">#</th>
                                            <th>Cliente</th>
                                            <th>Edad</th>
                                            <th>Sexo</th>
                                            <th>Trabajador</th>
                                            <th>Diagnostico</th>
                                            <th>P.A</th>
                                            <th>F</th>
                                            <th>O<sub>2</sub></th>
                                            <th>T</th>
                                            <th>GL</th>
                                            <th>Peso</th>
                                            <th>Fecha</th>
                                            <th>Acciones</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php

                                        $item = null;
                                        $valor = null;

                                        $respuesta = ControladorConsultas::ctrMostrarConsulta($item, $valor);

                                        foreach ($respuesta as $key =>$value) {

                                            echo '<tr>
                                                    <td>' . ($key+1) . '</td>';

                                                    $itemCliente = "idcliente";
                                                    $valorCliente = $value["idcliente"];

                                                    $respuestaCliente = ControladorClientes::ctrMostrarCliente($itemCliente, $valorCliente);
                                                    echo '<td>' . $respuestaCliente["nombres"].' '.$respuestaCliente["apellidos"].'</td>';

                                                    $itemCliente = "idcliente";
                                                    $valorCliente = $value["idcliente"];

                                                    $respuestaCliente = ControladorClientes::ctrMostrarCliente($itemCliente, $valorCliente);
                                                    echo '<td>' . $respuestaCliente["fechaNacimiento"].'</td>';


                                                    $itemCliente = "idcliente";
                                                    $valorCliente = $value["idcliente"];

                                                    $respuestaCliente = ControladorClientes::ctrMostrarCliente($itemCliente, $valorCliente);
                                                    echo '<td>' . $respuestaCliente["sexo"].'</td>';

                                                    $itemUsuario = "id";
                                                    $valorUsuario = $value["idtrabajador"];

                                                    $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                                                    echo '<td>' . $respuestaUsuario["nombre"] . '</td>

                                                    <td>' . $value["diagnostico"] . '</td>
                                                    <td>' . $value["presionArterial"] . '</td>
                                                    <td>' . $value["frecuencia"] . '</td>
                                                    <td>' . $value["oxigeno"] . '</td>
                                                    <td>' . $value["temperatura"] . '</td>
                                                    <td>' . $value["glicemia"] . '</td>
                                                    <td>' . $value["peso"] . '</td>
                                                    <td>' . $value["fechaConsulta"] . '</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-info btnImprimirConsulta" historial="'.$value["idconsulta"]. '"><i class="fa fa-print"></i></button>
                                                            <button class="btn btn-info"><i class="fa fa-trash" style="width:90%;margin-left:3%"></i></button>
                                                            <button class="btn btn-danger" style="width:90%; margin-left:2%"><i class="fa fa-trash"></i></button>
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