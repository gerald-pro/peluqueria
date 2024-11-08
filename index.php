<?php 

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/pagos.controlador.php";
require_once "controladores/fichas.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/consultas.controlador.php";
require_once "controladores/servicios.controlador.php";
require_once "controladores/reportes.controlador.php";








require_once "modelos/usuarios.modelo.php";
require_once "modelos/pagos.modelo.php";
require_once "modelos/fichas.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/consultas.modelo.php";
require_once "modelos/servicios.modelo.php";
require_once "modelos/reportes.modelo.php";
$plantilla= new ControladorPlantilla();
$plantilla->crtPlantilla();

?>


