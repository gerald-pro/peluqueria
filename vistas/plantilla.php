<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISTEMA WEB DEL SALON DE BELLEZA "XIOMI"</title>

  <!-- CSS Dependencies -->
  <!-- Bootstrap -->
  <link href="vistas/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="vistas/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="vistas/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="vistas/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="vistas/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="vistas/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="vistas/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="vistas/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="vistas/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Core JavaScript Dependencies -->
  <script src="vistas/vendors/jquery/dist/jquery.min.js"></script>
  <script src="vistas/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="vistas/vendors/fastclick/lib/fastclick.js"></script>
  <script src="vistas/vendors/nprogress/nprogress.js"></script>

  <!-- FullCalendar -->
  <link href="vistas/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
  <link href="vistas/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
  <!-- Calendar -->
  <script src="vistas/vendors/moment/min/moment.min.js"></script>
  <script src="vistas/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="vistas/vendors/fullcalendar/dist/lang/es.js"></script> <!--cambio de idioma calendar -->
  <!-- Select2 -->
  <link href="vistas/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Switchery -->
  <link href="vistas/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- Custom Theme -->
  <link href="vistas/build/css/custom.min.css" rel="stylesheet">
  <link href="vistas/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- SweetAlert -->
  <script src="vistas/vendors/sweetalert2/sweetalert2.all.js"></script>


  <!-- COLORES DE LA PLANTILLA -->
  <!-- login fondo -->
  <style>
    body.login {
      background-image: url('vistas/img/FONDO DE LOGIN.jpeg');
      /* Imagen de fondo */
      background-size: cover;
      /* Cubrir todo el fondo */
      background-repeat: no-repeat;
      /* No repetir la imagen */
      background-position: center;
      /* Centrar la imagen de fondo */
      height: 100vh;
      /* Altura completa de la pantalla */
      display: flex;
      justify-content: center;
      /* Centrar el formulario horizontalmente */
      align-items: center;
      /* Centrar el formulario verticalmente */
      font-family: 'Arial', sans-serif;
      margin: 0;
    }

    .login_wrapper {
      width: 100%;
      max-width: 400px;
      /* Ancho máximo del formulario */
      background: rgba(229, 113, 173, 0.30);
      /* Fondo blanco semitransparente */
      padding: 30px 20px;
      /* Espaciado interno */
      border-radius: 30px;
      /* Bordes redondeados */
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.9);
      /* Sombra suave */
      text-align: center;
    }

    /* Estilo para el icono y título del login */
    .login_wrapper img {
      width: 110px;
      /* Tamaño del ícono */
      margin-bottom: 20px;
      /* Espacio inferior debajo del ícono */
    }

    .login_wrapper h1 {
      font-size: 24px;
      color: #333;
      margin-bottom: 20px;
      /* Espacio inferior debajo del título */
    }

    /* Estilo para los campos de entrada */
    .login_wrapper input[type="text"],
    .login_wrapper input[type="password"] {
      width: 90%;
      /* Ancho de los campos de entrada */
      margin-bottom: 15px;
      /* Espacio entre los campos */
      padding: 10px;
      /* Espaciado interno para mayor claridad */
      border-radius: 5px;
      /* Bordes redondeados */
      border: 1px solid #ccc;
      /* Color del borde */
      font-size: 16px;
      /* Tamaño de fuente */
    }

    /* Estilo para el botón */
    .login_wrapper button {
      width: 90%;
      /* Ancho del botón */
      padding: 10px;
      border-radius: 5px;
      background-color: #5cb85c;
      color: white;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }

    /* Efecto hover en el botón */
    .login_wrapper button:hover {
      background-color: #4cae4c;
    }

    /* Estilo para el enlace de restablecimiento de contraseña */
    .login_wrapper .reset_pass {
      color: #007bff;
      font-size: 14px;
      text-decoration: none;
    }

    .login_wrapper .reset_pass:hover {
      text-decoration: underline;
    }
  </style>

  <!-- MENU -->
  <style type="text/css">
    .left_col,
    .nav_title {
      background: #c17fa1;
      /* Color de fondo unificado */
    }

    .main_container {
      background-color: #c17fa1;
      /* Color claro para el fondo principal */
    }

    .profile_info span {
      color: #000000;
    }

    .profile_info h2 {
      color: #000000;
    }

    /* Color de fondo para el menú deslizante y elementos activos */
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
      color: #000000;
      background-color: #c17fa1;
      /* Color para el item activo */
    }

    .nav>li>a:hover,
    .nav>li>a:focus {
      background-color: #000000;
    }

    /* seleccionador del menu */
    .nav>li>a:hover,
    .nav>li>a:focus {
      color: #000000;
      background-color: #ffe1ee;
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
    .nav_menu {
      background-color: #c17fa1;
      border-bottom: #c17fa1;
    }

    .bg-info {
      background-color: #c17fa1 !important;
    }

    .blue {
      color: #c17fa1;
    }

    .green {
      color: #c17fa1;
    }


    element.style {
      text-align: center;
      background-color: #31CAA5;
      font-size: 16px;
      color: white;
    }


    .btn-info {
      background-color: #c17fa1;
      /* Color personalizado para el botón */
      border-color: #a56c8e;
    }


    footer {
      color: #c17fa1;
      /* Texto en blanco */
    }
  </style>
</head>

<?php
if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
  echo '<body class="nav-md">';
  echo '<div class="container body">';
  echo '<div class="main_container">';

  include "modulos/menu.php";
  include "modulos/cabezote.php";

  if (isset($_GET["ruta"])) {
    $rutas_validas = [
      "inicio",
      "usuarios",
      "pagos",
      "clientes",
      "crear-pago",
      "crear-ficha",
      "fichas",
      "consultas",
      "crear-consultas",
      "servicios",
      "reportes",
      "salir"
    ];

    if (in_array($_GET["ruta"], $rutas_validas)) {
      include "modulos/" . $_GET["ruta"] . ".php";
    } else {
      include "modulos/404.php";
    }
  } else {
    include "modulos/inicio.php";
  }

  include "modulos/footer.php";

  echo '</div>';
  echo '</div>';
?>



  <!-- Plugin Dependencies -->
  <!-- Datatables -->
  <script src="vistas/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="vistas/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="vistas/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="vistas/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="vistas/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>

  <!-- bootstrap-daterangepicker -->
  <script src="vistas/vendors/moment/min/moment.min.js"></script>
  <script src="vistas/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Select2 -->
  <script src="vistas/vendors/select2/dist/js/select2.full.min.js"></script>


  <script src="vistas/vendors/iCheck/icheck.min.js"></script>

  <!-- InputMask -->
  <script src="vistas/vendors/input-mask/jquery.inputmask.js"></script>
  <script src="vistas/vendors/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="vistas/vendors/input-mask/jquery.inputmask.extensions.js"></script>

  <!-- jQuery Number -->
  <script src="vistas/vendors/jqueryNumber/jquerynumber.min.js"></script>

  <!-- SweetAlert -->
  <script src="vistas/vendors/sweetalert2/sweetalert2.all.js"></script>

  <!-- Custom Scripts -->
  <script src="vistas/js/plantilla.js"></script>
  <script src="vistas/js/usuarios.js"></script>
  <script src="vistas/js/clientes.js"></script>
  <script src="vistas/js/servicios.js"></script>
  <script src="vistas/js/pagos.js"></script>
  <script src="vistas/js/ficha.js"></script>
  <script src="vistas/js/boleta.js"></script>
  <script src="vistas/js/consultas.js"></script>
  <script src="vistas/js/reportes.js"></script>
  <script src="vistas/build/js/custom.js"></script>
<?php
  echo '</body>';
} else {
  include "modulos/login.php";
}
?>

</html>