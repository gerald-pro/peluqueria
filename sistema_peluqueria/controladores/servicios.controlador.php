<?php

class ControladorServicios
{
	/*=============================================
	CREAR SERVICIOS
	=============================================*/

	static public function ctrCrearServicio()
	{

		if (isset($_POST["nombreServicio"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ()+ ]+$/', $_POST["nombreServicio"]) &&
				preg_match('/^[0-9.]+$/', $_POST["precioServicio"])
			) {

				$tabla = "servicio";

				$datos = array(
					"nombre" => $_POST["nombreServicio"],
					"precio" => $_POST["precioServicio"]
				);

				$respuesta = ModeloServicios::mdlIngresarServicio($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

						swal({
							type: "success",
							title: "El servicio ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
										if (result.value) {

										window.location = "servicios";

										}
									})

						</script>';
				}
			} else {

				echo '<script>

					swal({
						type: "error",
						title: "¡El servicio no puede ir con los campos vacíos",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value) {

							window.location = "servicios";

							}
						})

				</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR SERVICIOS
	=============================================*/

	static public function ctrMostrarServicios($item, $valor)
	{

		$tabla = "servicio";

		$respuesta = ModeloServicios::mdlMostrarServicios($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR SERVICIOS
	=============================================*/

	static public function ctrEditarServicio()
	{

		if (isset($_POST["editarNombreServicio"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreServicio"]) &&
				preg_match('/^[0-9.]+$/', $_POST["editarPrecioServicio"])
			) {

				$tabla = "servicio";

				$datos = array(
					"idservicio" => $_POST["idServicio"],
					"nombre" => $_POST["editarNombreServicio"],
					"precio" => $_POST["editarPrecioServicio"],
				);

				$respuesta = ModeloServicios::mdlEditarServicio($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						type: "success",
						title: "El servicio ha sido cambiado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
									if (result.value) {

									window.location = "servicios";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						type: "error",
						title: "¡El servicio no puede ir vacío",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value) {

							window.location = "servicios";

							}
						})

				</script>';
			}
		}
	}

	static public function ctrMostrarDetalleServicios($item, $valor, $orden){

		$respuesta = ModeloServicios::mdlMostrarDetalleServicios($item, $valor, $orden);

		return $respuesta;

	}

	/*=============================================
	ELIMINAR SERVICIO
	=============================================*/

	static public function ctrBorrarServicio(){

		if(isset($_GET["idServicio"])){

			$tabla ="servicio";
			$datos = $_GET["idServicio"];

			$respuesta = ModeloServicios::mdlBorrarServicio($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					type: "success",
					title: "El servicio ha sido borrado correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					}).then(function(result){
								if (result.value) {

								window.location = "servicios";

								}
							})

				</script>';

			}

		}

	}
}