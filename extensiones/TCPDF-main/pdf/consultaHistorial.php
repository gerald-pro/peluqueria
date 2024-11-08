<?php

require_once "../../../controladores/consultas.controlador.php";
require_once "../../../modelos/consultas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

class ImprimirConsulta{

public $idConsulta;

public function traerConsulta(){

//TRAEMOS LA INFORMACION DEL HISTORIAL DE LA CONSULTA

$itemConsulta = "idconsulta";
$valorConsulta= $this ->idConsulta;

$respuestaConsulta = ControladorConsultas::ctrMostrarConsulta($itemConsulta, $valorConsulta);

$diagnostico = $respuestaConsulta["diagnostico"];
$presionArterial = $respuestaConsulta["presionArterial"];
$frecuencia = $respuestaConsulta["frecuencia"];
$oxigeno = $respuestaConsulta["oxigeno"];
$temperatura = $respuestaConsulta["temperatura"];
$glicemia = $respuestaConsulta["glicemia"];
$peso = $respuestaConsulta["peso"];
$fechaConsulta = $respuestaConsulta["fechaConsulta"];

//TRAEMOS INFORMACION DEL CLIENTE

$itemCliente = "idcliente";
$valorCliente = $respuestaConsulta["idcliente"];

$respuestaCliente = ControladorClientes::ctrMostrarCliente($itemCliente, $valorCliente);

//TRAEMOS LA INFORMACION DEL TRABAJADOR

$itemTrabajador = "id";
$valorTrabajador = $respuestaConsulta["idtrabajador"];

$respuestaTrabajador = ControladorUsuarios::ctrMostrarUsuarios($itemTrabajador, $valorTrabajador);


//REQUERIMOS LA CLASE TCPDF
require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetTitle('Historal trabajador');
$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

<table>
		
<tr>
	
	<td style="width:150px"><img src="romeroLOGO.png"></td>

	<td style="background-color:white; width:160px">
		
		<div style="font-size:12px; text-align:left; line-height:15px;">
			
			<br>
			<b>Nombre del salon de belleza:</b> "SALON DE BELLEZA "XIOMI"
			<br>
			<b>NIT:</b> 678934013
			<br>
			<b>Contacto:</b> 62003863
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

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="border: 1px solid #666; font-size:12px; padding:5px 10px;">
		<tr>
			<td style="background-color:#5D6D7E; color:white;border: 1px solid #666;"><b><i>DATOS DEL CLIENTE</i></b></td>
		</tr>
		<tr>
			<td style="background-color:white; width:40%">
			<i><b>Nombres Ap.Paterno Ap.Materno</b></i><br>
			$respuestaCliente[nombres] $respuestaCliente[apellidos]
			</td>
			<td style=" background-color:white; width:20%">
			<i><b>Documento</b></i><br>

			$respuestaCliente[documento]
			</td>
			<td style=" background-color:white; width:20%">
			<i><b>Edad</b></i><br>

			54
			</td>

			<td style=" background-color:white; width:20%">
			<i><b>Sexo</b></i><br>

			$respuestaCliente[sexo]
			</td>
		</tr>

		<tr>
			<td style=" background-color:white; width:40%">
			<i><b>Teléfono</b></i><br>

			$respuestaCliente[telefono]
			</td>

			<td style=" background-color:white; width:50%">
			<i><b>Direccíon</b></i><br>
			$respuestaCliente[direccion]
			</td>
		</tr>

	</table>

	<table style="border: 2px solid #666; font-size:12px; padding:5px 10px;">

		<tr>

			<td style="background-color:#5D6D7E ;color:white; border: 1px solid #666; width:100%"><b><i>TRABAJADOR</i></b></td>

		</tr>
		<tr>

			<td style="background-color:white; width:100%">
			<i><b>Nombre Completo</b></i><br>
			$respuestaTrabajador[nombre]
			</td>

		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');
// ---------------------------------------------------------
$bloque3 = <<<EOF

	<table style="border: 1.5px solid #666; font-size:12px; padding:5px 10px;">

		<tr>

		<td style="background-color:#5D6D7E; color:white; border:1px solid #666;"><b><i>REVISION</i></b></td>

		</tr>
		<tr>

		<td style="padding:5px 10px;"><b><i>Diagnostico :</i></b></td>

		</tr>
		<tr>

		<td style="background-color:white; width:100%; text-align:justify">
		$diagnostico
		</td>
		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
$bloque4 = <<<EOF

	<table style="font-size:12px; padding:5px 10px;">

		<tr>
		<hr>
		<td style="border:1px solid #666; background-color:white; width:30%">
		<b>Presion.A:</b>
		$presionArterial
		</td>

		<td style="border:1px solid #666; background-color:white; width:35%">
		<b>Frecuencia:</b>
		$frecuencia
		</td>

		<td style="border:1px solid #666; background-color:white; width:35%">
		<b>Oxigeno:</b>
		$oxigeno
		</td>

		</tr>
		<tr>

		<td style="border:1px solid #666; background-color:white; width:30%">
		<b>Temperatura:</b>
		$temperatura
		</td>

		<td style="border:1px solid #666; background-color:white; width:35%">
		<b>Glucemia:</b>
		$glicemia
		</td>

		<td style="border:1px solid #666; background-color:white; width:35%">
		<b>Peso:</b>
		$peso
		</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

//SALIDA DEL ARCHIVO

$pdf->Output('consulta.pdf', 'I');

}
}
$consulta = new ImprimirConsulta();
$consulta -> idConsulta = $_GET["idconsulta"];
$consulta -> traerConsulta();
?>