<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <div class="text-#17202A" style="width:98%; margin-left:2%;margin-top:4%;">TIPO SERVICIO</div>
                </h3>
            </div>

        </div>

    </div>

    <div class="clearfix bg-info"></div>

    <div class="x_content">
        <div class="row">

            <!--=====================================
                    EL FORMULARIO
                ======================================-->
            <div class="col-md-6 col-sm-6">
                <div class="x_panel">
                    <div class="x_title"></div>
                    <div class="x_content">
                        <form role="form" method="post" class="formularioPago">
                            <div class="box-body">
                                <!--=====================================
                                    ENTRADA ADMINISTRADOR
                                    ======================================-->
                                <div class="form-group">
                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" id="nuevoCajera"
                                            value="<?php echo $_SESSION["nombre"]; ?>" readonly>
                                        <input type="hidden" class="form-control" name="idCajera"
                                            value="<?php echo $_SESSION["id"]; ?>">

                                    </div>
                                </div>

                                <!--=====================================
                                    ENTRADA DEL NUMERO PAGO
                                    ======================================-->

                                <div class="form-group">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                        <?php

                                            $item = null;
                                            $valor = null;

                                            $pagos = ControladorPagos::ctrMostrarPagos($item, $valor);

                                            if(!$pagos){

                                            echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="1001" readonly>';

                                            }else{

                                            foreach ($pagos as $key => $value) {

                                            }

                                            $numeroPago = $value["numeroPago"] + 1;

                                            echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$numeroPago.'" readonly>';

                                            }
                                            ?>
                                    </div>

                                </div>
                                <!--=====================================
                                        ENTRADA TRABAJADOR
                                        ======================================-->
                                <div class="form-group">
                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                                        <select class="form-control input-lg" id="seleccionarTrabajador"
                                            name="seleccionarTrabajador" required>

                                            <option value="">SELECCIONE TRABAJADOR</option>
                                            <?php

                                                $item = null;
                                                $valor = null;

                                                $categorias = ControladorUsuarios::ctrMostrarTrabajadores($item, $valor);

                                                foreach ($categorias as $key => $value) {

                                                echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                                                }

                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <!--=====================================
                                    ENTRADA Cliente
                                    ======================================-->
                                <div class="form-group">
                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <select class="form-control select2" id="seleccionarCliente"
                                            name="seleccionarCliente" required>
                                            <option selected="selected">SELECCIONAR CLIENTE</option>
                                            <?php

                                                $item = null;
                                                $valor = null;

                                                $clientes = ControladorClientes::ctrMostrarCliente($item, $valor);

                                                foreach ($clientes as $key => $value) {

                                                    echo '<option value="' . $value["idcliente"] . '">' . $value["nombres"] .' '. $value["apellidos"] . '</option>';
                                                }

                                                ?>
                                        </select>
                                        <span class="input-group-btn"><button type="button"
                                                class="btn btn-outline-secondary" data-toggle="modal"
                                                data-target="#modalAgregarCliente" data-dismiss="modal">AGREGAR
                                                CLIENTE</button></span>
                                    </div>
                                </div>
                                
                                <!--=====================================
                                ENTRADA PARA AGREGAR SERVICIO
                                ======================================-->
                                <div class="form-group row nuevoProducto">

                                </div>

                                <input type="hidden" id="listaProductos" name="listaProductos" required>

                                <div class="row">
                                    <div class="col-md-6 offset-md-6">
                                        <div class="x_content">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>TOTAL A PAGAR:</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="input-group">

                                                                <span class="input-group-addon"><b>Bs.</b></span>
                                                                <input type="text" class="form-control input-lg"
                                                                    id="nuevoTotalVenta" name="nuevoTotalVenta" total=""
                                                                    placeholder="00000" readonly required>
                                                                <input type="hidden" name="totalVenta" id="totalVenta">

                                                            </div>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <hr>

                                <div class="form-group row">

                                    <div class="col-xs-6" style="padding-right:0px">

                                        <div class="input-group">

                                            <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago"
                                                required>
                                                
                                                <option value="Efectivo">EFECTIVO</option>
                                                <option value="TC">QR</option>
                                            </select>

                                        </div>

                                    </div>

                                    <div class="cajasMetodoPago"></div>

                                    <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                                </div>

                                </br>

                            </div>
                            <div class="footer">

                                <button type="submit" class="btn btn-outline-info pull-right">GUARDAR PAGO</button>

                            </div>

                        </form>

                            <?php

                            $guardarVenta = new ControladorPagos();
                            $guardarVenta -> ctrCrearPago();

                            ?>
                    </div>

                </div>
            </div>
            <!--=====================================
                TABLA DE SERVICIOS
                ======================================-->
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title"></div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered dt-responsive tablaPagos"
                            style="text-align:center; width:100%; color:black;">

                            <thead style="text-align:center; background-color:#CCD1D1; font-size:16px; color:#17202A ;">

                                <tr>
                                    <th style="#17202A : 10px">#</th>
                                    <th>NOMBRE</th>
                                    <th>PRECIO</th>
                                    <th>ACCIONES</th>
                                </tr>

                            </thead>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
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
                                    placeholder="Ingresar apellidos" required>

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
                        style="width:100PX">SALIR</button>
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