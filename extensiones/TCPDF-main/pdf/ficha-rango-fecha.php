<?php

require_once "../../../controladores/fichas.controlador.php";
require_once "../../../modelos/fichas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";




class ReporteFichaFecha{

	public $fechainicio;
	public $fechafin;

	public function traerReporteFichaFecha(){

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

$pdf->SetTitle('Reporte de fichas');

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

<table>
		
<tr>
	
	<td style="width:150px"><img src="romeroLOGO.png"></td>

	<td style="background-color:#DEA69A; width:160px">
		
		<div style="font-size:12px; text-align:left; line-height:15px;">
			
			<br>
			<b>Nombre de la peluqueria:</b> "SALON DE BELLEZA "XIOMI"
			<br>
			<b>NIT:</b> 678934013
			<br>
			<b>Contacto:</b> 62838296
			<br>
			<b>Dirección:</b>  Calle/La paz - Calle/Ñuflo de Chavez

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
<td style="font-size:16px;background-color:white; width:100%; text-align:center; color:#0050FC "><br><b>BOLETA DE PAGO</b></td>
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
		<td style="border: 1px solid #666; background-color:#5D6D7E; color:white; width:21%; text-align:center"><b>Cliente</b></td>
		<td style="border: 1px solid #666; background-color:#5D6D7E; color:white; width:20%; text-align:center"><b>Cajera</b></td>
		<td style="border: 1px solid #666; background-color:#5D6D7E; color:white; width:21%; text-align:center"><b>Trabajador</b></td>
		<td style="border: 1px solid #666; background-color:#5D6D7E; color:white; width:16%; text-align:center"><b>Turno</b></td>
		<td style="border: 1px solid #666; background-color:#5D6D7E; color:white; width:16%; text-align:center"><b>Fecha</b></td>
		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

$respuesta = ControladorFichas::ctrEntreFechasFichas($fechainicio, $fechafin);

for($i = 0; $i < count($respuesta); $i++){

	$numero = $respuesta[$i]["numero"];

	$cliente = $respuesta[$i]["cliente"];

	$cajera = $respuesta[$i]["cajera"];

	$trabajador = $respuesta[$i]["trabajador"];

	$turno = $respuesta[$i]["turno"];

	$fecha = substr($respuesta[$i]["fecha"],0,-8) ;


$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:10%; text-align:center">
				$numero
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:21%; text-align:center">
				$cliente
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:18%; text-align:center">
				$cajera
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:21%; text-align:center">
				$trabajador
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:14%; text-align:center">
				$turno
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:16%; text-align:center">
				$fecha
			</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

$pdf->Output('ficha-rango-fecha.pdf', 'I');


}

}

$boleta = new ReporteFichaFecha();
$boleta -> fechainicio = $_GET["fechainicio"];
$boleta -> fechafin = $_GET["fechafin"];
$boleta -> traerReporteFichaFecha();
?>