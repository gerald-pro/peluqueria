<?php

class ControladorClientes
{
		/**
		 *CREAR REGISTRO Cliente
		*/
	static public function ctrCrearClientes()
	{
		if (isset($_POST["carnetP"])) {

			if (
				preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreP"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellidoP"])
			) {

				$tabla = "cliente";

				$datos = array(
					"documento" => $_POST["carnetP"],
					"nombres" => $_POST["nombreP"],
					"apellidos" => $_POST["apellidoP"],
					"telefono" => $_POST["telefonoP"],
					"direccion" => $_POST["domicilioP"],
					"sexo" => $_POST["sexoP"],
					"fechaNacimiento" => $_POST["fechaNacimientoP"]
				);

				$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "Los datos del cliente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "fichas";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡Los datos del cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';
			}
		}
	}



	/*=============================================
	MOSTRAR Cliente
	=============================================*/

	static public function ctrMostrarCliente($item, $valor)
	{

		$tabla = "cliente";

		$respuesta = ModeloClientes::mdlMostraCliente($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR EDAD Cliente
	=============================================*/

	static public function ctrMostrarEdadCliente($item, $valor){

		$tabla = "cliente";

		$respuesta = ModeloClientes::MdlMostrarEdadCliente($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR TOTAL Cliente
	=============================================*/

	static public function ctrMostrarTotalCliente($item, $valor){

		$tabla = "cliente";

		$respuesta = ModeloClientes::MdlMostrarTotalCliente($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	EDITAR Cliente
	=============================================*/

	static public function ctrEditarCliente()
	{

		if (isset($_POST["editarcarnetP"])) {

			if (
				preg_match('/^[()\-0-9 ]+$/', $_POST["editarcarnetP"]) &&
				preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnombreP"]) &&
				preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarapellidoP"]) &&
				preg_match('/^[0-9]+$/', $_POST["editartelefonoP"])
			) {

				$tabla = "cliente";

				$datos = array(
					"idcliente" => $_POST["idCliente"],
					"documento" => $_POST["editarcarnetP"],
					"nombres" => $_POST["editarnombreP"],
					"apellidos" => $_POST["editarapellidoP"],
					"telefono" => $_POST["editartelefonoP"],
					"direccion" => $_POST["editardomicilioP"],
					"sexo" => $_POST["editarsexoP"],
					"fechaNacimiento" => $_POST["editarfechaNacimientoP"]
				);

				$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "Datos del Cliente ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡Los datos del cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';
			}
		}
	}

	/*=============================================
	ELIMINAR Cliente
	=============================================*/

	static public function ctrEliminarCliente()
	{

		if (isset($_GET["idCliente"])) {

			$tabla = "cliente";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "Los datos del cliente han sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				</script>';
			}
		}
	}
}
