<?php

class ControladorConsultas
{

	/*=============================================
	MOSTRAR CONSULTAS
	=============================================*/

	static public function ctrMostrarConsulta($item, $valor){

		$tabla = "consulta";

		$respuesta = ModeloConsultas::mdlMostrarConsulta($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	ASIGNACION DE FICHAS POR Trabajador
	=============================================*/

	static public function ctrMostrarFichas($item, $valor)
	{
		$tabla = "ficha";

		$respuesta = ModeloConsultas::mdlMostrarFichasporatender($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CAMBIAR ESTADO DE FICHA A ATENDIDOS
	=============================================*/
	static public function ctrCambiarEstado($item, $valor){

		$tabla = "ficha";

		$respuesta = ModeloConsultas::mdlMostrarCambiarEstadoPorAtender($tabla, $item, $valor);

		return $respuesta;

	}


	/*=============================================
	CREAR CONSULTA
	=============================================*/

	static public function ctrCrearConsulta(){

		if(isset($_POST["fecha"])){

			//if(preg_match('/^[0-9 ]+$/', $_POST["nuevoPago"])){

			/*=============================================
			GUARDAR LA CONSULTA
			=============================================*/	

			$tabla = "consulta"; 


			$datos = array("idcliente"=>$_POST["idCliente"],
							"idtrabajador"=>$_SESSION["id"],
						   "diagnostico"=>$_POST["diagnostico"],
						   "presionArterial"=>$_POST["presion"],
						   "frecuencia"=>$_POST["frecuencia"],
						   "oxigeno"=>$_POST["oxigeno"],
						   "temperatura"=>$_POST["temperatura"],
						   "glicemia"=>$_POST["glicemia"],
						   "peso"=>$_POST["peso"],
						   "fechaConsulta"=>$_POST["fecha"]);

			$respuesta = ModeloConsultas::mdlIngresarConsulta($tabla, $datos);


			if($respuesta == "ok"){

				$tabla = "ficha"; 

				$item = "estado";

				$valor = $_POST["idFicha"];
				//$query = $tabla + ' / '+ $valor + ' /';
				$respuesta = ModeloConsultas::mdlMostrarCambiarEstadoPorAtender($tabla, $item, $valor);

				echo'<script>

				swal({
					  type: "success",
					  title: "La consulta ha sido guardada correctamente ",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "consultas";

								}
							})
				</script>';

				}

			}	

		}
}

?>