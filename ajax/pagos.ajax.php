<?php

require_once "../controladores/servicios.controlador.php";
require_once "../modelos/servicios.modelo.php";

class TablaPagoServicio
{
    /*=============================================
        MOSTRAR LA TABLA DE SERVICIOS
        =============================================*/
    public function mostrarTablaServiciosPago()
    {

        $item = null;
        $valor = null;

        $servicios = ControladorServicios::ctrMostrarServicios($item, $valor);

        if (count($servicios) == 0) {

            echo '{"data": []}';

            return;
        }

        $datosJson = '{
		    "data": [';

        for ($i = 0; $i < count($servicios); $i++) {

            /*=============================================
                TRAEMOS LAS ACCIONES
                ============================================*/

            $botones =  "<div class='btn-group'><button class='btn btn-sm btn-outline-info agregarProducto recuperarBoton' idServicio='" . $servicios[$i]["idservicio"] . "'>Agregar</button></div>";

            $datosJson .= '[
			    "' . ($i + 1) . '",
			    "' . $servicios[$i]["nombre"] . '",
			    "Bs '.number_format($servicios[$i]["precio"],2) . '",
			    "' . $botones . '"
			    ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .=   ']

		}';

        echo $datosJson;
    }
}
/*=============================================
ACTIVAR TABLA DE PAGO SERVICIOS
=============================================*/
$activarPagoServicios = new TablaPagoServicio();
$activarPagoServicios -> mostrarTablaServiciosPago();