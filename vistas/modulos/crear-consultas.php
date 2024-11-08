<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <div class="text-white" style="width:98%; margin-left:2%;margin-top:4%;">Consultas</div>
                </h3>
            </div>

        </div>
    </div>
    <div class="clearfix bg-info"></div>
    <div class="x_content">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="clearfix"></div>
                    <div class="x_content">
                        <h2>Fichas por atender</h2>
                        <table id="Datatable" class="table table-striped table-bordered responsive tablas"
                            style="width:100%">
                            <thead style="text-align:center; background-color:#5D6D7E; font-size:16px; color:white;">
                                <tr>
                                    <th style="width:10px">#</th>
                                    <th>Fecha</th>
                                    <th>N° ficha</th>
                                    <th>Nombres</th>
                                    <th>Edad</th>
                                    <th>Sexo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody style="text-align:center">

                                <?php

                            $item = "f.idtrabajador";
                            $valor = $_SESSION["id"];

                            $respuesta = ControladorConsultas::ctrMostrarFichas($item, $valor);

                            foreach ($respuesta as $key => $value) {
                            

                            echo '<tr>

                                    <td>'.($key+1).'</td>

                                    <td>'.$value["fecha"].'</td>

                                    <td>'.$value["numero"].'</td>

                                    <td>'.$value["nombres"].' '.$value["apellidos"].'</td>

                                    <td>'.$value["fechaNacimiento"].'</td>

                                    <td>'.$value["sexo"].'</td>';

                                echo '
                                    <td>

                                        <div class="btn-group">
                                            
                                        <button class="btn btn-warning btnRealizarConsulta" data-toggle="modal" data-target="#consulta" idFicha="'.$value["idficha"].'" idCliente="'.$value["idCliente"].'" nombres="'.$value["nombres"].'" apellidos="'.$value["apellidos"].'" fechaNacimiento="'.$value["fechaNacimiento"].'" sexo="'.$value["sexo"].'"><i class="fa fa-pencil"></i></button>

                                        

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

<div id="consulta" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header  bg-info">

                    <h5 class="text-white">Realizar consulta</h5>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <!--=====================================
                    CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">
                    <div class="container-fluid">

                        <!--=====================================
                            ENTRADA  FECHA
                        ======================================-->
                        <div class="form-group row">

                            <div class="col-xs-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                    <?php
                                            date_default_timezone_set("America/La_Paz");
                                            $fechaActual = date('Y-m-d H:i:s');
                                            ?>
                                    <input type="datetime" class="form-control" id="fecha" name="fecha"
                                        value="<?php echo $fechaActual; ?>" readonly>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <p style="color:black; font-size:16px"><i><b>Datos del Cliente</b></i></p>
                        <hr>
                        <!--=====================================
                            ENTRADA  NOMBRE Cliente
                        ======================================-->
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12  form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Nombres:</span>
                                    <input type="text" class="form-control" id="nombreCliente" name="nombreCliente"
                                        readonly>
                                    <input type="hidden" id="nombreCliente" name="nombreCliente" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12  form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Apellidos:</span>
                                    <input type="text" class="form-control" id="apellidoCliente" name="apellidoCliente"
                                        readonly>
                                    <input type="hidden" id="idCliente" name="idCliente" readonly>
                                    <input type="hidden" id="idFicha" name="idFicha" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12  form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" style="width:85px">Edad:</span>
                                    <input type="text" class="form-control" id="fechaNacimiento" name="fechaNacimiento" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12  form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" style="width:85px">Sexo:</span>
                                    <input type="text" class="form-control" id="sexo" name="sexo" readonly>
                                </div>
                            </div>
                        </div>
                        <!--=====================================
                            ENTRADA PARA EL DIAGNOSTICO
                        ======================================-->
                        <label for="message" style="color:black; font-size:16px"><i><b>Diagnostico:</b></i></label>
                        <textarea id="diagnostico" class="form-control" cols="30" rows="4"
                            name="diagnostico" placeholder="Registre el diagnostico"></textarea>
                        <br>
                        <!--=====================================
                            ENTRADA PARA EL TRATAMIENTO
                        ======================================-->
                        <label for="message" style="color:black; font-size:16px"><i><b>Tratamiento:</b></i></label>
                        <textarea id="diagnostico" class="form-control" cols="30" rows="4"
                            name="tratamiento" placeholder="Registre el tratamiento"></textarea>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-4 col-sm-12  form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">P.A.</span>
                                    <input type="text" class="form-control" id="presion" name="presion" placeholder="Presión">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12  form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">F.</span>
                                    <input type="text" class="form-control" id="frecuencia" name="frecuencia" placeholder="Frecuencia">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12  form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">0<sub>2</sub>.</span>
                                    <input type="text" class="form-control" ide="oxigeno" name="oxigeno" placeholder="Oxigeno">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12  form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">T.</span>
                                    <input type="text" class="form-control" id="temperatura" name="temperatura" placeholder="Temperatura">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12  form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">GL.</span>
                                    <input type="text" class="form-control" id="glicemia" name="glicemia" placeholder="Glicemia">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12  form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">P.</i></span>
                                    <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-outline-info" data-dismiss="modal"
                        style="width:100px">Salir</button>
                    <button type="submit" class="btn btn-outline-info"><span class="fa fa-save"></span>Guardar</button>

                </div>

            </form>
            <?php

                $CrearConsulta = new ControladorConsultas();
                $CrearConsulta -> ctrCrearConsulta();

                ?>
        </div>

    </div>

</div>