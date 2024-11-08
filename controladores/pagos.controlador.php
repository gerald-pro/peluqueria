<?php

class ControladorPagos
{

	/*=============================================
			 MOSTRAR PAGOS
			 =============================================*/

	static public function ctrMostrarPagos($item, $valor)
	{

		$tabla = "pagoservicio";

		$respuesta = ModeloPagos::mdlMostrarPagos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
			 RANGO FECHAS
			 =============================================*/

	static public function ctrRangoFechasPagos($fechaInicial, $fechaFinal)
	{

		$tabla = "pagoservicio";

		$respuesta = ModeloPagos::mdlRangoFechasPagos($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;

	}

	static public function ctrEntreFechasPagos($fechaInicial, $fechaFinal)
	{

		$tabla = "pagoservicio";

		$respuesta = ModeloPagos::mdlEntreFechasPagos($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;

	}

	/*=============================================
			 SUMA TOTAL PAGOS SERVICIO
			 =============================================*/

	static public function ctrSumaTotalPagos()
	{

		$tabla = "pagoservicio";

		$respuesta = ModeloPagos::mdlSumaTotalPagos($tabla);

		return $respuesta;

	}

	/*============================================
			 CREAR PAGO
			 =============================================*/

	static public function ctrCrearPago()
	{

		if (isset($_POST["nuevaVenta"])) {

			$tablaTrabajadores = "usuarios";

			$item = "id";
			$valor = $_POST["seleccionarTrabajador"];

			$traerCliente = ModeloUsuarios::mdlMostrarUsuarios($tablaTrabajadores, $item, $valor);

			$tablacliente = "cliente";

			$item = "idcliente";
			$valor = $_POST["seleccionarCliente"];

			$traeridcliente = ModeloClientes::mdlMostraCliente($tablacliente, $item, $valor);

			//$item1a = "compras";
			//$valor1a = array_sum($totalProductosComprados) + $traerCliente["compras"];

			//$comprasCliente = ModeloClientes::mdlActualizarClientes($tablaClientes, $item1a, $valor1a, $valor);

			//$item1b = "ultima_compra";



			/*=============================================
									   GUARDAR LA COMPRA
									   =============================================*/

			$tabla = "pagoservicio";

			$datos = array(
				"idcajera" => $_POST["idCajera"],
				"numeroPago" => $_POST["nuevaVenta"],
				"idtrabajador" => $_POST["seleccionarTrabajador"],
				"idcliente" => $_POST["seleccionarCliente"],
				"servicio" => $_POST["listaProductos"],
				"total" => $_POST["totalVenta"],
				"metodo_pago" => ($_POST["nuevoMetodoPago"] == "Efectivo") ? $_POST["nuevoMetodoPago"] : $_POST["listaMetodoPago"]
			);

			$respuesta = ModeloPagos::mdlIngresarPagos($tabla, $datos);

			//obtener el id de la venta
			$tabla = "pagoservicio";
			$item = "numeroPago";
			$valor = $_POST["nuevaVenta"];
			$respuesta_venta = ModeloPagos::mdlMostrarPagos($tabla, $item, $valor);
			$idventa = $respuesta_venta["idpagoservicio"];

			//Agregar el detalle de la venta

			$tabla_detalle = "detallepagoservicio";
			$listaProductos = json_decode($_POST["listaProductos"], true);

			foreach ($listaProductos as $key => $value) {

				$datos_producto = array(
					"id_pagoservicio" => $idventa,
					"idservicio" => $value["idservicio"],
					"cantidad" => $value["cantidad"],
					"precio" => $value["precio"]
				);

				$respuesta_detalle = ModeloPagos::mdlIngresarDetallePago($tabla_detalle, $datos_producto);

			}
			if ($respuesta == "ok") {

				echo '<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "El pago ha sido guardado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "pagos";

								}
							})

				</script>';
			}
		}
	}

	/*=============================================
				ELIMINAR PAGO
				=============================================*/

	static public function ctrEliminarPago()
	{

		if (isset($_GET["idPago"])) {

			$tabla = "pagoservicio";

			$item = "idpagoservicio";
			$valor = $_GET["idPago"];

			$traerVenta = ModeloPagos::mdlMostrarPagos($tabla, $item, $valor);

			/*=============================================
									   ELIMINAR PAGO
									   =============================================*/

			//eliminar el detalle de la venta eliminada

			$tablaDetalle = "detallepagoservicio";
			$respuesta = ModeloPagos::mdlEliminarDetallePago($tablaDetalle, $_GET["idPago"]);

			$respuesta = ModeloPagos::mdlEliminarPago($tabla, $_GET["idPago"]);

			if ($respuesta == "ok") {



				echo '<script>

				swal({
					  type: "success",
					  title: "El pago ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "pagos";

								}
							})

				</script>';

			}
		}

	}


}