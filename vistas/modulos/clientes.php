 <Q!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <div class="text-white" style="width:98%; margin-left:5%;margin-top:5%;">ADMINISTRAR
                        CLIENTES</div>
                </h3>
            </div>

        </div>

        <div class="clearfix bg-info"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">

                        <button class="btn btn-outline-info pull-right" data-toggle="modal"
                            data-target="#modalAgregarCliente">

                            <span class="fa fa-plus"></span>AGREGAR CLIENTE

                        </button>

                        <button class="btn btn-outline-info pull-right btnReporteTotalClientes">

                            <span class="fa fa-print"></span>EXPORTAR

                        </button>

                        <form> <input type="button" class="btn btn-outline-info" value="volver"
                                onclick="history.back ()"> </form>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="Datatable" class="table table-striped table-bordered responsive tablas"
                                        style="#17202A:100%">

                                        <thead
                                        style="text-align:center; background-color:#c17fa1; font-size:16px; color:#f7f9f9;">

                                            <tr>

                                                <th style="width:10px">#</th>
                                                <th>CARNET</th>
                                                <th>NOMBRES</th>
                                                <th>APELLIDOS</th>
                                                <th>TELEFONO</th>
                                                <th>SEXO</th>
                                                <th>FECHA </th>
                                                <th>ACCIONES</th>

                                            </tr>

                                        </thead>
                                        <tbody>

                                            <?php

                                            $item = null;
                                            $valor = null;

                                            $cliente = ControladorClientes::ctrMostrarCliente($item, $valor);

                                            foreach ($cliente as $key => $value) {


                                                echo '<tr>

                                  <td>' . ($key + 1) . '</td>

                                  <td>' . $value["documento"] . '</td>

                                  <td>' . $value["nombres"] . '</td>

                                  <td>' . $value["apellidos"] . '</td>

                                  <td style="width:50px">' . $value["telefono"] . '</td>

                                  <td style="width:30px">' . $value["sexo"] . '</td>

                                  <td style="text-align:center">' . $value["fechaNacimiento"] . '</td>

                                  <td style="text-align:center">

                                    <div class="btn-group">

                                      <button class="btn btn-sm btn-warning btnEditarCliente"  idCliente="' . $value["idcliente"] . '" data-toggle="modal" data-target="#modalEditarCliente" style="width:90%; margin-left:1%"><i class="fa fa-edit"></i></button>

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
</div>
<!-- /page content -->

<!--=====================================
                      MODAL AGREGAR Cliente
                      ======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                  CABEZA DEL MODAL
                    ======================================-->

                <div class="modal-header  bg-info">

                    <h5 class="text-white">AGREGAR CLIENTE</h5>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <!--=====================================
                        CUERPO DEL MODAL
                          ======================================-->

                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" min="0" class="form-control input-lg" name="carnetP"
                                    placeholder="Ingresar cedula identidad">

                            </div>

                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nombreP"
                                    placeholder="Ingresar nombres" required>

                            </div>
                        </div>


                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="apellidoP"
                                    placeholder="Ingresar apellidos">

                            </div>

                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="number" class="form-control input-lg" name="telefonoP" min="0"
                                    placeholder="Ingresar telefono">

                            </div>

                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                                <input type="text" class="form-control input-lg" name="domicilioP"
                                    placeholder="Ingresar domicilio">

                            </div>

                        </div>
                        <div class="form-group row">

                            <div class="col-xs-12 col-sm-6">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-genderless"></i></span>

                                    <select class="form-control input-lg" name="sexoP">

                                        <option value=""> SEXO</option>

                                        <option value="masculino">MASCULINO</option>

                                        <option value="femenino">FEMENINO</option>

                                        <option value="otros">OTROS</option>

                                    </select>

                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-6">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                    <input type="date" class="form-control input-lg" name="fechaNacimientoP"
                                        placeholder="Fecha Nacimiento" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask
                                        required>

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
                        style="width:100PX">Salir</button>
                    <button type="submit" class="btn btn-outline-info"><span class="fa fa-save"></span>GUARDAR</button>

                </div>

                <?php

                $crearCliente = new ControladorClientes();
                $crearCliente->ctrCrearClientes();

                ?>

            </form>

        </div>

    </div>

</div>


<!--=====================================
            MODAL EDITAR CLIENTES
            ======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
              CABEZA DEL MODAL
              ======================================-->

                <div class="modal-header  bg-info">

                    <h5 class="text-white">EDITAR CLIENTES</h5>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <!--=====================================
                      CUERPO DEL MODAL
                  ======================================-->

                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="number" min="0" class="form-control input-lg" name="editarcarnetP"
                                    id="editarcarnetP" required>
                                <input type="hidden" id="idCliente" name="idCliente">

                            </div>

                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarnombreP" id="editarnombreP"
                                    required>

                            </div>

                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarapellidoP"
                                    id="editarapellidoP" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="number" class="form-control input-lg" name="editartelefonoP"
                                    id="editartelefonoP" required>

                            </div>

                        </div>

                        <div class="form-group">

                        </div>
                        <div class="form-group row">

                            <div class="col-xs-12 col-sm-6">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-genderless"></i></span>

                                    <select class="form-control input-lg" name="editarsexoP" required>

                                        <option value="" id="editarsexoP"></option>

                                        <option value="masculino">MASCULINO</option>

                                        <option value="femenino">FEMENINO</option>

                                    </select>

                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-6">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                    <input type="date" class="form-control input-lg" name="editarfechaNacimientoP"
                                        id="editarfechaNacimientoP" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask
                                        required>

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
                        style="width:100PX">Salir</button>
                    <button type="submit" class="btn btn-outline-info"><span class="fa fa-save"></span>GUARDAR</button>

                </div>
            </form>

            <?php

            $editarCliente = new ControladorClientes();
            $editarCliente->ctrEditarCliente();

            ?>

        </div>

    </div>

</div>

