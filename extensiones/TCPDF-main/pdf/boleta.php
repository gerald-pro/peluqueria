<?php

require_once "../../../controladores/pagos.controlador.php";
require_once "../../../modelos/pagos.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/servicios.controlador.php";
require_once "../../../modelos/servicios.modelo.php";

class imprimirBoletaPago{

public $numeroPago;

public function traerImpresionBloleta(){

//TRAEMOS LA INFORMACION DE PAGO DE SERVICIOS

$itemBoleta = "numeroPago";
$valorBoleta = $this ->numeroPago;

$respuestaBoleta = ControladorPagos::ctrMostrarPagos($itemBoleta, $valorBoleta);

$fecha = substr($respuestaBoleta["fecha"],0);
$total = number_format($respuestaBoleta["total"],2);

//TRAEMOS LA INFORMACIÓN DEL CLIENTES

$itemCliente = "idcliente";
$valorCliente = $respuestaBoleta["idcliente"];

$respuestaCliente = ControladorClientes::ctrMostrarCliente($itemCliente, $valorCliente);

//TREMOS LA INFORMACIÓN DEL TRABAJADOR

$itemTrabajador = "id";
$valorTrabajador = $respuestaBoleta["idtrabajador"];

$respuestaTrabajador = ControladorUsuarios::ctrMostrarUsuarios($itemTrabajador, $valorTrabajador);

//TRAEMOS LA INFORMACION DE LA CAJERA(O)

$itemCajera = "id";
$valorCajera = $respuestaBoleta["idcajera"];

$respuestaCajera = ControladorUsuarios::ctrMostrarUsuarios($itemCajera, $valorCajera);

require_once('tcpdf_include.php');

// create new PDF document

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetTitle('Boleta de pago');

$pdf->startPageGroup();
// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:30px"><img src="centro.PNG"></td>

			<td style="background-color:; width:300px">
				
				<div style="font-size:12px; text-align:left; line-height:15px;">
					
				 <h1>SALÓN DE BELLEZA "XIOMI"</h1>
					<p>NIT: 678934013</p>
					<p>CONTACTO: 62003863</p>
					<p>DIRECCIÓN: Av. El Palmar, Zona Mercado 15</p>
				
				</div>

			</td>

			<td style="background-color:white; width:170px">

				<div style="font-size:16px; text-align:rigth; color:red; line-height:15px;">
				<br>
				<b>N°:</b> $valorBoleta
				</div>
				<div style="font-size:12px; text-align:rigth;line-height:15px;">
				<b>Fecha:</b> $fecha
				</div>

			</td>

		</tr>
		<br>
		<tr>
		<td style="font-size:16px;background-color:white; width:100%; text-align:center; color:#0050FC "><br><h1>BOLETA DE SEGUIMIENTO </h1></td>
		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------
$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:40%">
			<b>DATOS DEL CLIENTE</b><br>

			$respuestaCliente[nombres] $respuestaCliente[apellidos]<br>
			</td>
			<td style="border: 1px solid #666; background-color:white; width:30%">
			<b>TRABAJADOR</b><br>

			$respuestaTrabajador[nombre]<br>
			</td>
			

		</tr>

		<tr>

		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
			 <h1>DETALLE DEL SERVICIO</h1>
		<tr>
		<td style="border: 1px solid #666; background-color:#c17fa1; color:white; width:40%; text-align:center"><b>SERVICIO</b></td>
		<td style="border: 1px solid #666; background-color:#c17fa1; color:white; width:15%; text-align:center"><b>CANTIDAD</b></td>
		<td style="border: 1px solid #666; background-color:#c17fa1; color:white; width:30%; text-align:center"><b>PRECIO</b></td>
		<td style="border: 1px solid #666; background-color:#c17fa1; color:white; width:15%; text-align:center"><b>TOTAL</b></td>
		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------

$itemPago = "idpagoservicio";
$valorPago = $respuestaBoleta["idpagoservicio"];
$orden = null;

$respuestaServicio = ControladorServicios::ctrMostrarDetalleServicios($itemPago, $valorPago, $orden);

for($i = 0; $i < count($respuestaServicio); $i++){

$nombre = $respuestaServicio[$i]['nombre'];

$cantidad = $respuestaServicio[$i]['cantidad'];

$valorUnitario = number_format($respuestaServicio[$i]["precio"],2);

$precioTotal = number_format($respuestaServicio[$i]["total"],2);


$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:40%; text-align:center">
			$nombre
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:15%; text-align:center">
				$cantidad
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:30%; text-align:center">
				$valorUnitario
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:15%; text-align:center">
				$precioTotal
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}
// ---------------------------------------------------------

$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; background-color:white; width:100%; text-align:center"></td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:#c17fa1; color:white; width:100px; text-align:center">
			<b>TOTAL</b>:
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				Bs. $total
			</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('boleta.pdf', 'I');

}

}
$boleta = new imprimirBoletaPago();
$boleta -> numeroPago = $_GET["numeroPago"];
$boleta -> traerImpresionBloleta();
?>