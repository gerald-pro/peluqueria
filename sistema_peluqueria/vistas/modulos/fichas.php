<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <div class="text-#17202A" style="#17202A:98%; margin-left:5%;margin-top:3%;">ADMINISTRAR CITAS 
                    </div>
                </h3>
            </div>

        </div>
        

        <div class="clearfix bg-info"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            
  
                              <?php

                                $item = null;
                                $valor = null;

                                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                                foreach ($usuarios as $key => $value){
                                   echo '<div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                                    
                                    <div class="tile-stats">';
;
                                     
                                     echo '<div class="count">'.$value["nombre"].'</div> ';  
                                     echo '  
                                   
                                     <a href="index.php?ruta=crear-ficha&idtrabajador='.$value["id"].'" class="">
                                         <i class="fa fa-caret-square-o-right fa-5x fa-fw" ></i> 
                                      </a>
                                          
                                    </div>
                                  </div> ';
                                 }
                               ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <?php

  $borrarCita = new ControladorFichas();
  $borrarCita -> ctrEliminarFicha();

?>
<!-- /page content -->