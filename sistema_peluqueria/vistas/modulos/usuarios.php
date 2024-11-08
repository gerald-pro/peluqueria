        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>
                <div class="text-#17202A" style="width:98%; margin-left:2%;margin-top:2%;"> ADMINISTRAR USUARIO</div>
                </h3>
              </div>

            </div>

            <div class="clearfix bg-info"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">

                    <button class="btn btn-outline-info pull-right" data-toggle="modal" data-target="#modalAgregarUsuario">

                    <span class="fa fa-plus"></span> AGREGAR USUARIO

                    </button>

                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box">

                          <table id="datatable" class="table table-striped table-bordered dt-responsive tablas" style="width:100%">


                            <thead style="text-align:center; background-color:#D6CCCB; font-size:16px; color:#17202A;">

                              <tr>

                                <th style="width:10px">#</th>
                                <th>NOMBRES</th>
                                <th>USUARIO</th>
                                <th>FOTO</th>
                                <th>PERFIL</th>
                                <th>ESTADO</th>
                                <th>ÚLTIMO LOGIN</th>
                                <th>ACCIONES</th>

                              </tr>

                            </thead>

                            <tbody style="text-align:center">

                              <?php

                              $item = null;
                              $valor = null;

                              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                              foreach ($usuarios as $key => $value) {

                                echo ' <tr>
                              <td>'.($key+1).'</td>
                              <td>' . $value["nombre"] . '</td>
                              <td>' . $value["usuario"] . '</td>';

                                if ($value["foto"] != "") {

                                  echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>';
                                } else {

                                  echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                                }

                                echo '<td>' . $value["perfil"] . '</td>';

                                if ($value["estado"] != 0) {

                                  echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="0">Activado</button></td>';
                                } else {

                                  echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
                                }

                                echo '<td>' . $value["ultimo_login"] . '</td>
                              <td>

                                <div class="btn-group">

                                  <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-edit"></i></button>

                                  <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $value["id"] . '" fotoUsuario="' . $value["foto"] . '" usuario="' . $value["usuario"] . '"><i class="fa fa-trash"></i></button>

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
                MODAL AGREGAR USUARIO
                      ======================================-->

        <div id="modalAgregarUsuario" class="modal fade" role="dialog">

          <div class="modal-dialog">

            <div class="modal-content">

              <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                  CABEZA DEL MODAL
                  ======================================-->

                <div class="modal-header bg-info">

                  <h5 class="text-white">AGREGAR USUARIO</h5>

                  <button type="button" class="close" data-dismiss="modal">&times;</button>


                </div>

                <!--=====================================
                        CUERPO DEL MODAL
                      ======================================-->

                <div class="modal-body">

                  <div class="box-body">

                    <!-- ENTRADA PARA EL NOMBRE -->

                    <div class="form-group">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-user"></i></span>

                        <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

                      </div>

                    </div>

                    <!-- ENTRADA PARA EL USUARIO -->

                    <div class="form-group">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-key"></i></span>

                        <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

                      </div>

                    </div>

                    <!-- ENTRADA PARA LA CONTRASEÑA -->

                    <div class="form-group">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                        <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

                      </div>

                    </div>

                    <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

                    <div class="form-group">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <select class="form-control input-lg" name="nuevoPerfil" required>

                          <option value="">SELECCIONAR PERFIL</option>

                          <option value="Administrador">ADMINISRTRADOR</option>

                          <option value="Trabajador">EMPLEADO</option>

                        </select>

                      </div>

                    </div>

                    <!-- ENTRADA PARA SUBIR FOTO -->

                    <div class="form-group">

                      <div class="panel">SUBIR FOTO</div>

                      <input type="file" class="nuevaFoto" name="nuevaFoto">

                      <p class="help-block">Peso máximo de la foto 2MB</p>

                      <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                    </div>

                  </div>

                </div>

                      <!--=====================================
                      PIE DEL MODAL
                        ======================================-->

                <div class="modal-footer">

                  <button type="button" class="btn btn-outline-info" data-dismiss="modal" style="width:100PX">Salir</button>
                  <button type="submit" class="btn btn-outline-info"><span class="fa fa-save"></span>Guardar</button>

                </div>

                <?php

                $crearUsuario = new ControladorUsuarios();
                $crearUsuario->ctrCrearUsuario();

                ?>

              </form>

            </div>

          </div>

        </div>

                    <!--=====================================
                    MODAL EDITAR USUARIO
                      =====================================-->

        <div id="modalEditarUsuario" class="modal fade" role="dialog">

          <div class="modal-dialog">

            <div class="modal-content">

              <form role="form" method="post" enctype="multipart/form-data">

                    <!--=====================================
                    CABEZA DEL MODAL
                    ======================================-->

                <div class="modal-header bg-info">

                  <h5 class="text-white">EDITAR USUSARIO</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                      <!--=====================================
                        CUERPO DEL MODAL
                        ======================================-->

                <div class="modal-body">

                  <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                    <div class="form-group">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-user"></i></span>

                        <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

                      </div>

                    </div>

                        <!-- ENTRADA PARA EL USUARIO -->

                    <div class="form-group">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-key"></i></span>

                        <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

                      </div>

                    </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                    <div class="form-group">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                        <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                        <input type="hidden" id="passwordActual" name="passwordActual">

                      </div>

                    </div>

                          <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

                    <div class="form-group">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <select class="form-control input-lg" name="editarPerfil">

                          <option value="" id="editarPerfil"></option>

                          <option value="Administrador">ADMINISRTRADOR</option>

                          <option value="Trabajador">EMPLEADO</option>

                        </select>

                      </div>

                    </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->

                    <div class="form-group">

                      <div class="panel">SUBIR FOTO</div>

                      <input type="file" class="nuevaFoto" name="editarFoto">

                      <p class="help-block">Peso máximo de la foto 2MB</p>

                      <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                      <input type="hidden" name="fotoActual" id="fotoActual">

                    </div>

                  </div>

                </div>

                          <!--=====================================
                            PIE DEL MODAL
                                ======================================-->

                <div class="modal-footer">

                  <button type="button" class="btn btn-outline-info" data-dismiss="modal" style="width:100PX">Salir</button>
                  <button type="submit" class="btn btn-outline-info"><span class="fa fa-save"></span>Guardar</button>

                </div>

                <?php

                $editarUsuario = new ControladorUsuarios();
                $editarUsuario->ctrEditarUsuario();

                ?>

              </form>

            </div>

          </div>

        </div>

        <?php

        $borrarUsuario = new ControladorUsuarios();
        $borrarUsuario->ctrBorrarUsuario();

        ?>