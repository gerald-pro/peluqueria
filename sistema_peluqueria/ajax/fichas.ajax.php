<?php

require_once "../controladores/fichas.controlador.php";
require_once "../modelos/fichas.modelo.php";

class Ajaxfichas{

	/*=============================================
	NUMERO MAXIMO
	=============================================*/	

	public $idTrabajador;

	public function ajaxObtenerMaximaNumero(){

		$item = "idtrabajador";
		$valor = $this->idTrabajador;

		$respuesta = ControladorFichas::ctrMostrarFichasNumero($item, $valor);

		echo json_encode($respuesta);
	}

}

if(isset($_POST["idTrabajador"])){

	$fichas = new Ajaxfichas();
	$fichas -> idTrabajador = $_POST["idTrabajador"];
	$fichas -> ajaxObtenerMaximaNumero();

}