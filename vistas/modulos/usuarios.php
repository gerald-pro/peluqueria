 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>
          <div class="text-white" style="width:98%; margin-left:5%; margin-top:5%;">
            ADMINISTRAR USUARIO
          </div>
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
                  <table id="datatable" class="table table-striped table-bordered dt-responsive tablas" style="width:100%;">
                    <thead style="text-align:center; background-color:#c17fa1; font-size:16px; color:#f7f9f9;">
                      <tr>
                        <th style="width:10px">#</th>
                        <th>NOMBRES</th>
                        <th>USUARIO</th>
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
                        echo '<tr>
                          <td>' . ($key + 1) . '</td>
                          <td>' . $value["nombre"] . '</td>
                          <td>' . $value["usuario"] . '</td>
                          <td>' . $value["perfil"] . '</td>';
                          
                        echo '<td><button class="btn btn-' . ($value["estado"] != 0 ? 'success' : 'danger') . 
                             ' btn-xs btnActivar" idUsuario="' . $value["id"] . 
                             '" estadoUsuario="' . ($value["estado"] != 0 ? '0' : '1') . '">' . 
                             ($value["estado"] != 0 ? 'Activado' : 'Desactivado') . '</button></td>';

                        echo '<td>' . $value["ultimo_login"] . '</td>
                          <td>
                            <div class="btn-group">
                              <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id"] . 
                              '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-edit"></i></button>
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

<!-- MODAL AGREGAR USUARIO -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header bg-info">
          <h5 class="text-white">AGREGAR USUARIO</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="nuevoPerfil" required>
                  <option value="">SELECCIONAR PERFIL</option>
                  <option value="Administrador">ADMINISTRADOR</option>
                  <option value="Trabajador">TRABAJADOR</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-info" data-dismiss="modal" style="width:100px">Salir</button>
          <button type="submit" class="btn btn-outline-info"><span class="fa fa-save"></span> Guardar</button>
        </div>
        <?php
        $crearUsuario = new ControladorUsuarios();
        $crearUsuario->ctrCrearUsuario();
        ?>
      </form>
    </div>
  </div>
</div>

<!-- MODAL EDITAR USUARIO -->
<div id="modalEditarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header bg-info">
          <h5 class="text-white">EDITAR USUARIO</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" readonly>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">
                <input type="hidden" id="passwordActual" name="passwordActual">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="nuevoPerfil" required>
                  <option value="">SELECCIONAR PERFIL</option>
                  <option value="Administrador">ADMINISTRADOR</option>
                  <option value="Trabajador">TRABAJADOR</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-info" data-dismiss="modal" style="width:100px">Salir</button>
          <button type="submit" class="btn btn-outline-info"><span class="fa fa-save"></span> Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
 