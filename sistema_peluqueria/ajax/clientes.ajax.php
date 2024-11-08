<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

	/*=============================================
	EDITAR Cliente
	=============================================*/	

	public $idCliente;

	public function ajaxEditarCliente(){

		$item = "idcliente";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarCliente($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR Cliente
=============================================*/	

if(isset($_POST["idCliente"])){

	$cliente = new AjaxClientes();
	$cliente -> idCliente = $_POST["idCliente"];
	$cliente -> ajaxEditarCliente();
}
