        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">

                      <?php

                            if($_SESSION["foto"] != ""){

                              echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

                            }else{


                              echo '<img src="vistas/img/usuarios/default/" class="user-image">';

                            }


                      ?>



                      <span class="hidden-xs"><?php  echo $_SESSION["nombre"]; ?></span>

                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Perfil</a>
                      <a class="dropdown-item"  href="salir"><i class="fa fa-sign-out pull-right"></i>Cerrar</a>
                    </div>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->