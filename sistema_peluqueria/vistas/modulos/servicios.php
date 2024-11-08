<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>
          <div class="text-#17202A" style="width:98%; margin-left:2%;margin-top:2%;">ADMINISTRAR SERVICIOS</div>
        </h3>
      </div>

    </div>

    <div class="clearfix bg-info"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">

            <button class="btn btn-outline-info pull-right" data-toggle="modal" data-target="#modalAgregarServicio">

              <span class="fa fa-plus"></span> AGREGAR SERVICIO

            </button>


            <form> <input type="button" class="btn btn-outline-info" value="volver"
                onclick="history.back ()"> </form>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box">
                  <table id="datatable" class="table table-striped table-bordered dt-responsive tablas"
                    style="width:100%">

                    <thead style="text-align:center; background-color:#D6CCCB; font-size:16px; color:#17202A;">
                      <tr>

                        <th style="#17202A:10px">#</th>
                        <th>DESCRIPCION</th>
                        <th>PRECIO</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>

                      </tr>

                    </thead>

                    <tbody style="text-align:center">

                      <?php

                      $item = null;
                      $valor = null;

                      $servicios = ControladorServicios::ctrMostrarServicios($item, $valor);

                      foreach ($servicios as $key => $value) {

                        echo ' <tr>

                                <td>' . ($key + 1) . '</td>

                                <td>' . $value["nombre"] . '</td>
                                <td>Bs ' . number_format($value["precio"], 2) . '</td>';

                        if ($value["estado"] != 0) {

                          echo '<td><button class="btn btn-sm btn-success btn-xs btnActivarServicio" idServicio="' . $value["idservicio"] . '" estadoServicio="0">Activado</button></td>';
                        } else {

                          echo '<td><button class="btn btn-sm btn-danger btn-xs btnActivarServicio" idServicio="' . $value["idservicio"] . '" estadoServicio="1">Desactivado</button></td>';
                        }

                        echo '<td>

                                    <div class="btn-group">

                                      <button class="btn btn-warning btnEditarServicio" idServicio="' . $value["idservicio"] . '" data-toggle="modal" data-target="#modalEditarServicio"><i class="fa fa-edit"></i></button>

                                      <button class="btn btn-danger btnEliminarServicio" idServicio="' . $value["idservicio"] . '"><i class="fa fa-trash"></i></button>

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
          MODAL AGREGAR SERVICIO
          ======================================-->
<div id="modalAgregarServicio" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
                            CABEZA DEL MODAL
                          ======================================-->

        <div class="modal-header bg-info">

          <h5 class="text-white">AGREGAR SERVICIO</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!--=====================================
                    CUERPO DEL MODAL
                    ======================================-->

        <div class="modal-body">

          <div class="container-fluid">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="nombreServicio" name="nombreServicio"
                  placeholder="Nombre de servicio" required>

              </div>

            </div>
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                <input type="number" class="form-control input-lg" id="precioServicio" name="precioServicio" min="0"
                  step="any" placeholder="Precio" required>

              </div>

            </div>

          </div>
        </div>

        <!--=====================================
                            PIE DEL MODAL
                          ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-outline-info" data-dismiss="modal" style="width:100PX">SALIR</button>
          <button type="submit" class="btn btn-outline-info"><span class="fa fa-save"></span>GUARDAR</button>

        </div>

        <?php

        $crearServicio = new ControladorServicios();
        $crearServicio->ctrCrearServicio();

        ?>


      </form>

    </div>

  </div>

</div>


<!--=====================================
          MODAL EDITAR SERVICIO
          ======================================-->
<div id="modalEditarServicio" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
                            CABEZA DEL MODAL
                          ======================================-->

        <div class="modal-header bg-info">

          <h5 class="text-white">EDITAR SERVICIO</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!--=====================================
                    CUERPO DEL MODAL
                  ======================================-->

        <div class="modal-body">

          <div class="container-fluid">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarNombreServicio" name="editarNombreServicio"
                  required>
                <input type="hidden" id="idServicio" name="idServicio">

              </div>

            </div>
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                <input type="number" class="form-control input-lg" id="editarPrecioServicio" name="editarPrecioServicio"
                  min="0" step="any" required>

              </div>

            </div>
          </div>

        </div>

        <!--=====================================
                            PIE DEL MODAL
                          ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-outline-info" data-dismiss="modal" style="width:100PX">SALIR</button>
          <button type="submit" class="btn btn-outline-info"><span class="fa fa-save"></span>GUARDAR</button>

        </div>

        <?php

        $editarServicio = new ControladorServicios();
        $editarServicio->ctrEditarServicio();

        ?>


      </form>

    </div>

  </div>

</div>

<?php

$borrarServicio = new ControladorServicios();
;
$borrarServicio->ctrBorrarServicio();

?>