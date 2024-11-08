<?php

class ControladorFichas{

	/*=============================================
	MOSTRAR FICHAS
	=============================================*/

	static public function ctrMostrarFichas($item, $valor){

		$tabla = "ficha";

		$respuesta = ModeloFichas::mdlMostrarFichas($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrMostrarFichasTrabajador($valor){

		$tabla = "ficha";

		$respuesta = ModeloFichas::mdlMostrarFichasTrabajador($valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR FICHAS Trabajador
	=============================================*/

	static public function ctrMostrarFichasNumero($item, $valor){

		$tabla = "ficha";

		$respuesta = ModeloFichas::mdlMostrarFichasNumero($tabla, $item, $valor);

		return $respuesta;

	}

		/*=============================================
	RANGO FECHAS FICHAS
	=============================================*/	

	static public function ctrRangoFechasFichas($fechaInicial, $fechaFinal){

		$tabla = "ficha";

		$respuesta = ModeloFichas::mdlRangoFechasFichas($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
	}

  static public function ctrEntreFechasFichas($fechaInicial, $fechaFinal){

		$tabla = "ficha";

		$respuesta = ModeloFichas::mdlEntreFechasFichas($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
	}

	/*=============================================
	CREAR FICHA
	=============================================*/

	static public function ctrCrearFichas(){

		if(isset($_POST["fechaInicio"])){

			/*$tablaTrabajador = "usuarios";

			$item = "id";
			$valor = $_POST["seleccionarTrabajador"];

			$traerTrabajador = ModeloUsuarios::mdlMostrarUsuarios($tablaTrabajador, $item, $valor);

			$tablaClientes = "cliente";

			$item = "idcliente";
			$valor = $_POST["seleccionarCliente"];

			$traerCliente = ModeloClientes::mdlMostraCliente($tablaClientes, $item, $valor);
           */
			/*=============================================
			GUARDAR LA FICHA
			=============================================*/

			$tabla = "ficha";

			$datos = array("idtrabajador"=>$_POST["idtrabajador"],
						"idservicio"=>$_POST["seleccionarServicio"],
                        "idcliente"=>$_POST["seleccionarCliente"],
						"inicio"=>$_POST["fechaInicio"],
					     "fin"=>$_POST["fechaFin"]);

			$respuesta = ModeloFichas::mdlIngresarFichas($tabla, $datos);

			if($respuesta == "ok" ){

				echo'<script>

				swal({
					type: "success",
					title: "La Cita ha sido guardada correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					}).then((result) => {
								if (result.value) {

								window.location = "fichas";

								}
							})
				</script>';
			}
		}
	}
	/*=============================================
	ELIMINAR FICHA
	=============================================*/

	static public function ctrEliminarFicha(){

		if(isset($_GET["idficha"])){

			$tabla = "ficha";

			$respuesta = ModeloFichas::mdlEliminarFicha($tabla, $_GET["idficha"]);

			if($respuesta == "ok"){



				echo'<script>

				swal({
					type: "success",
					title: "La ficha ha sido borrada correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					}).then((result) => {
								if (result.value) {

								window.location = "fichas";

								}
							})

				</script>';

			}
		}

	}
}