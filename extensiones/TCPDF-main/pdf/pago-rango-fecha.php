<?php

require_once "../../../controladores/pagos.controlador.php";
require_once "../../../modelos/pagos.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";




class ReportePagoFecha{

	public $fechainicio;
	public $fechafin;

	public function traerReportePagoFecha(){

	$fechainicio = $this ->fechainicio;
	$fechafin = $this ->fechafin;

//============================================================+

require_once('tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
// class TCPDF extends TCPDF {

//     // Page footer
//     public function Footer() {
//         // Position at 15 mm from bottom
//         $this->SetY(-15);
//         // Set font
//         $this->SetFont('helvetica', 'I', 8);
//         // Page number
//         $this->Cell(0, 10, 'Pagina '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
//     }
// }

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetTitle('Reporte de pago por fechas');

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:25%"><img src="images/romeroLOGO.png"></td>

			<td style="background-color:white; width:40%">
				
				<div style="font-size:10px; text-align:left; line-height:15px;">
					
					      <section class="info-empleador">
							<p><strong>NIT:</strong> 678934013</p>
							<p><strong>Contacto:</strong> 3 3227281</p>
							<p><strong>Dirección:</strong> Zona/Los Lotes - Av. Bolivia</p>
						</section>

				</div>

			</td>

			<td style="background-color:#DEA69A; width:35%">

				<  <div class="info-fechas">
           			 <p><strong>Fecha de Emisión:</strong> 2022-01-21</p>
					  <p><strong>Período de Pago:</strong> Desde: 2024-03-26 Hasta: 2024-08-26</p>
       			 </div>

			</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

  <table style="font-size:12px; padding:5px 10px;">

		<tr>
		
		<td style=" background-color:white; width:50%; text-align:right; color:black">Desde: <b>$fechainicio</b></td>
		<td style=" background-color:white; width:50%; text-align:left; color:black">Hasta: <b>$fechafin</b></td>
		</tr>

	</table>

EOF;
$pdf->writeHTML($bloque2, false, false, false, false, '');
// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:#5D6D7E; color:white; width:6%; text-align:center"><b>N°</b></td>
		<td style="border: 1px solid #666; background-color:#5D6D7E; color:white; width:21%; text-align:center"><b>CLIENTE</b></td>
		<td style="border: 1px solid #666; background-color:#5D6D7E; color:white; width:20%; text-align:center"><b>CAJERA</b></td>
		<td style="border: 1px solid #666; background-color:#5D6D7E; color:white; width:21%; text-align:center"><b>TRABAJADOR</b></td>
		<td style="border: 1px solid #666; background-color:#5D6D7E; color:white; width:16%; text-align:center"><b>TOTAL</b></td>
		<td style="border: 1px solid #666; background-color:#5D6D7E; color:white; width:16%; text-align:center"><b>FECHA</b></td>
		</tr>

	</table>
	    

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

$respuesta = ControladorPagos::ctrEntreFechasPagos($fechainicio, $fechafin);

for($i = 0; $i < count($respuesta); $i++){

	$numeroPago = $respuesta[$i]["numeroPago"];

	$cliente = $respuesta[$i]["cliente"];

	$cajera = $respuesta[$i]["cajera"];

	$trabajador = $respuesta[$i]["trabajador"];

	$total = $respuesta[$i]["total"];

	$fecha = substr($respuesta[$i]["fecha"],0,-8) ;


$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:10%; text-align:center">
				$numeroPago
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:21%; text-align:center">
				$cliente
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:20%; text-align:center">
				$cajera
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:21%; text-align:center">
				$trabajador
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:16%; text-align:center">Bs.
				$total
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:16%; text-align:center">
				$fecha
			</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

$pdf->Output('pago-rango-fecha.pdf', 'I');


}

}

$boleta = new ReportePagoFecha();
$boleta -> fechainicio = $_GET["fechainicio"];
$boleta -> fechafin = $_GET["fechafin"];
$boleta -> traerReportePagoFecha();
?>