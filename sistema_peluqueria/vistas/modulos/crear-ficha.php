
<!-- page content -->
<script src="../vistas/es.global.js"></script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <div class="text-white" style="width:98%; margin-left:2%;margin-top:4%;">Crear Citas</div>
                </h3>
                    
          
            </div>

        </div>

    </div>

    <div class="clearfix bg-info"></div>

    <div class="x_content">


    <a href="clientes">

<button class="btn btn-outline-info pull-right">

        <span class="fa fa-ticket"></span> CLIENTE
        
</button>
    
</a>

<a href="servicios">

<button class="btn btn-outline-info pull-right">

<span class="fa fa-ticket"></span>SERVICIO

</button>


</a>

<form> <span class="fas fa-hand-point-right" type = "button" value = "volver"></span>
<input type = "button" value = "volver" onclick = "history.back ()"> </form>

            <?php

              $item_m = "id";
              $valor_m = $_GET["idtrabajador"];
              $trabajador = ControladorUsuarios::ctrMostrarUsuarios($item_m, $valor_m);
              echo '<h1> Citas del Trabajador: '.$trabajador["nombre"]. '</h1>';     

              $citastrabajador = ControladorFichas::ctrMostrarFichasTrabajador($valor_m);
            ?>

            <!-- THE CALENDAR -->
            <script>
function init_calendar() {
    if (typeof ($.fn.fullCalendar) === 'undefined') { return; }
    console.log('init_calendar');

    var date = new Date(),
        d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear(),
        started,
        categoryClass;

    var calendar = $('#calendar').fullCalendar({
        locale: 'es', // Localización en español
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
        },
        buttonText: { // CAMBIO DE LOS BOTONES DE INGLES A ESPAÑOL//
            month: 'Mes',
            week: 'Semana',
            day: 'Día',
            list: 'Lista',
            today:'Hoy'
        },
        noEventsMessage: 'No hay eventos para mostrar',  //CAMBIO DE EVENTO VACIO DE INGLES A ESPAÑOL//
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            $('#fechaInicio').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
            $('#fechaFin').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
            $('#modalAgregarCita').modal();
        },
        eventClick: function(calEvent, jsEvent, view) {
            var id = calEvent.id;
            eliminarCita(id);
            calEvent.event.remove();
            alert(calEvent.id);
        },
        editable: true,
        events: [
            <?php
            foreach ($citastrabajador as $key => $value) {
                ?>
                {
                    id: '<?php echo $value['idficha']; ?>',
                    title: '<?php echo $value['nombres']." ".$value['apellidos']; ?>',
                    start: '<?php echo $value['inicio']; ?>',
                    end: '<?php echo $value['fin']; ?>',
                    color: '#e4bdb4  ' ,
                    textColor:'#161615  '
                },<?php
            }
            ?>
        ]
    });
};

function eliminarCita(id) {
    var idCita = id;

    swal({
        title: '¿Está seguro de borrar la cita?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar cita!'
    }).then(function(result) {
        if (result.value) {
            //alert(usuario);
            window.location = "index.php?ruta=fichas&idficha=" + idCita;
        }
    });
}
</script>

      <div id="calendar"></div>
    </div>

</div>

  <!--=====================================
MODAL AGREGAR CITA
======================================-->

<div id="modalAgregarCita" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" >
          <h5 class="modal-title">Agregar Cita</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            
        </div>

        

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->



        <div class="modal-body">
          

            <!-- ENTRADA PARA EL ADMISITRADOR-->
            
            <div class="form-group">
            
                 <input type="hidden" id="idtrabajador" name="idtrabajador" value="<?php echo $_GET["idtrabajador"] ?>">
             
            </div>

          
            <!-- ENTRADA PARA SELECCIONAR EL CLIENTE
             
            
            -->

            <div class="form-group">
              
              <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-users"></i></span> 
                </div>
                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                    <option value="">Seleccionar Cliente</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $pacientes = ControladorClientes::ctrMostrarCliente($item, $valor);

                       foreach ($pacientes as $key => $value) {

                        $cliente = $value["nombres"] . " ". $value["apellidos"];
                         echo '<option value="'.$value["idcliente"].'">'.$cliente.'</option>';
                        
                       }

                    ?>

                    </select>

              </div>
            </div>

            <div class="form-group">
              
              <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-users"></i></span> 
                </div>
                    <select class="form-control" id="seleccionarServicio" name="seleccionarServicio" required>

                    <option value="">Seleccionar Servicio</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $pacientes = ControladorServicios::ctrMostrarServicios($item, $valor);

                       foreach ($pacientes as $key => $value) {

                         echo '<option value="'.$value["idservicio"].'">'.$value["nombre"].'</option>';
                        
                       }

                    ?>

                    </select>

              </div>
            </div>
             <div class="form-group">
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span> 
                </div>
                <input type="text" class="form-control input-lg" name="fechaInicio" id="fechaInicio" readonly>
                
               </div>
             </div>
                
             <div class="form-group">
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span> 
                </div>
                <input type="text" class="form-control input-lg" name="fechaFin" id="fechaFin" readonly >
               </div>
             </div>

          
     </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer justify-content-end">

          <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Pedir Cita</button>
        </div>
        <?php

          $crearCita = new ControladorFichas();
          $crearCita -> ctrCrearFichas();

        ?>

      </form>


    </div>

  </div>

</div>

