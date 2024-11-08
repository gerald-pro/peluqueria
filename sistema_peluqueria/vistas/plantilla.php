<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SISTEMA WEB DEL SALON DE BELLEZA "XIOMI"</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="vistas/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vistas/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vistas/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vistas/vendors/iCheck/skins/flat/_all.css" rel="stylesheet">
    <link href="vistas/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="vistas/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vistas/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vistas/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vistas/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vistas/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vistas/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


    <!-- fullCalendar 
    <link rel="stylesheet" href="vistas/vendors/fullcalendar/main.css">
    -->

    <!-- fullCalendar -->
    <link rel="stylesheet" href="vistas/vendors/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="vistas/vendors/fullcalendar/dist/fullcalendar.print.min.css" media="print">
   


    

    <!-- Custom Theme Style -->
    <link href="vistas/build/css/custom.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="vistas/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="vistas/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="vistas/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vistas/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="vistas/build/css/custom.min.css" rel="stylesheet">
    <!-- SweetAlert -->
    <script src="vistas/vendors/sweetalert2/sweetalert2.all.js"></script>
    <!-- icheck -->
    <script src="vistas/vendors/iCheck/icheck.min.js"></script>
    <script src="vistas/vendors/moment/min/moment.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vistas/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vistas/vendors/moment/min/moment.min.js"></script>
    <script src="vistas/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="vistas/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="vistas/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="vistas/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="vistas/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="vistas/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="vistas/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="vistas/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="vistas/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="vistas/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="vistas/vendors/starrr/dist/starrr.js"></script>


  

    <!-- fullCalendar -->
    <script src="vistas/vendors/moment/moment.min.js"></script>
    <script src="vistas/vendors/moment/locales/locales.js"></script>
    <script src="vistas/vendors/fullcalendar/main.js"></script>
    <script src="vistas/vendors/fullcalendar/locales/es.js"></script>
    <script src="vistas/vendors/fullcalendar/locales-all.min.js"></script>


<!-- fullCalendar 
<script src="vistas/vendors/moment/moment.js"></script>
<script src="vistas/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
-->

   <!-- COLORES DE LA PLANTILLA -->

   <!-- MENU -->
    <style type="text/css">
      .left_col {background:#F5B7B1 ;}
      .nav_title {background:#F5B7B1  ; }
      .profile_info span {color: #000000}
      .profile_info h2 {color: #000000}

      /* cambiar color fijo del menu deslizante* fijo de inicio */
  .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #000000;
    background-color:#D98880;
  }

  .nav>li>a:hover, .nav>li>a:focus {
      background-color: #000000;
  }
  /* seleccionador del menu */
  .nav>li>a:hover, .nav>li>a:focus {
    color: #000000;
      background-color:#ffe1ee ;
  }
  a {
    color: #000000;
    text-decoration: none;
}
a {
    color: #000000;
    text-decoration: none;
}
      </style>

       <!-- ENCABEZADO -->
    <style type="text/css">
      .nav_menu { color:#F5B7B1  ;
      background-color:#F5B7B1  ;
      border-bottom: 2px solid  ; }

      .bg-info {
    background-color:#dededf !important;}

    .blue {
    color: #ff9800;}

    .green {
    color: ;}

    /*formulario */
    .x_panel {
      background:  ;}

      element.style {
    text-align: center;
    background-color:#31CAA5;
    font-size: 16px;
    color: white;}
    
/*COLOR DE LA LETRA DEL USUSARIO */
    a.user-profile {
    color:  !important;}


      </style>


      




    <!--=====================================
  PLUGINS DE CSS
  ======================================-->

</head>

<?php

if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

  echo '<body class="nav-md">';
  echo '<div class="container body">';
  echo '<div class="main_container">';
  /*=============================================
    MENU
    =============================================*/

  include "modulos/menu.php";

  /*=============================================
    HEAD
    =============================================*/

  include "modulos/cabezote.php";

  /*=============================================
    CONTENT
    =============================================*/

  if (isset($_GET["ruta"])) {

    if (
      $_GET["ruta"] == "inicio" ||
      $_GET["ruta"] == "usuarios" ||
      $_GET["ruta"] == "pagos" ||
      $_GET["ruta"] == "clientes" ||
      $_GET["ruta"] == "crear-pago" ||
      $_GET["ruta"] == "crear-ficha" ||
      $_GET["ruta"] == "fichas" ||
      $_GET["ruta"] == "consultas" ||
      $_GET["ruta"] == "crear-consultas" ||
      $_GET["ruta"] == "servicios" ||
      $_GET["ruta"] == "reportes" ||
      $_GET["ruta"] == "salir"
    ) {

      include "modulos/" . $_GET["ruta"] . ".php";
    } else {

      include "modulos/404.php";
    }
  } else {

    include "modulos/inicio.php";
  }

  /*=============================================
    FOOTER
    =============================================*/

  include "modulos/footer.php";

  echo '</div>';
  echo '</div>';
?>
<!-- jQuery -->
<script src="vistas/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="vistas/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="vistas/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="vistas/vendors/nprogress/nprogress.js"></script>
<!-- Datatables -->
<script src="vistas/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vistas/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vistas/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vistas/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="vistas/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="vistas/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vistas/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vistas/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="vistas/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="vistas/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="vistas/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="vistas/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="vistas/vendors/jszip/dist/jszip.min.js"></script>
<script src="vistas/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="vistas/vendors/pdfmake/build/vfs_fonts.js"></script>

<script src="vistas/vendors/jszip/dist/jszip.min.js"></script>
<script src="vistas/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="vistas/vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- FullCalendar --> 
<script src="vistas/vendors/moment/min/moment.min.js"></script> <!--cambio de idioma calendar --> 
<script src="vistas/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="vistas/vendors/fullcalendar/dist/lang/es.js"></script> <!--cambio de idioma calendar --> 





<!-- Custom Theme Scripts -->
<script src="vistas/build/js/custom.js"></script>

<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/servicios.js"></script>
<script src="vistas/js/pagos.js"></script>
<script src="vistas/js/ficha.js"></script>
<script src="vistas/js/boleta.js"></script>
<script src="vistas/js/consultas.js"></script>
<script src="vistas/js/reportes.js"></script>


<?php

  echo '</body>';
} else {

  include "modulos/login.php";
}

?>

</html>