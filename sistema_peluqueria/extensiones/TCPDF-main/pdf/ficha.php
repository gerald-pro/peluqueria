<?php

require_once "../../../controladores/fichas.controlador.php";
require_once "../../../modelos/fichas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

class imprimirFicha{

public $numero;

public function traerImpresionFicha(){

//TRAEMOS LA INFORMACION DE LA FICHA

$itemFicha = "numero";
$valorFicha = $this->numero;

$respuestaFicha = ControladorFichas::ctrMostrarFichas($itemFicha, $valorFicha);

$fecha = substr($respuestaFicha["fecha"],0);

//TRAEMOS LA INFORMACIÓN DE LA CAJERA(O)

$itemCajera = "id";
$valorCajera = $respuestaFicha["idcajera"];

$respuestaCajera = ControladorUsuarios::ctrMostrarUsuarios($itemCajera, $valorCajera);

//TRAEMOS LA INFORMACIÓN DEL TRABAJADOR

$itemTrabajador = "id";
$valorTrabajador = $respuestaFicha["idtrabajador"];

$respuestaTrabajador = ControladorUsuarios::ctrMostrarUsuarios($itemTrabajador, $valorTrabajador);

//REQUERIMOS LA CLASE TCPDF
require_once('tcpdf_include.php');

// create new PDF document
$medidas = array(80,100);
$pdf = new TCPDF('P', 'mm', $medidas,true, 'UTF-8', false);

$pdf->SetTitle('Ficha');
$pdf->startPageGroup();

// add a page
$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOD

<table>
	
		<tr>
		
			<td style="font-size:12px; background-color:white; text-align:center; line-height:6.5px; width:100%">
        <b>SALON DE BELLEZA "XIOMI"</b> <br><br><br>
        <b>LA FORTALEZA DE DIOS</b> <br><br><br>
        <i><b>NIT :</b> 678934013</i><br><br>
        <i>Telf.: 3 3227281</i><br><br>
        <i>Dir: Zona Los Lotes -<br><br> Av. Bolivia</i><br><br>
			</td>
    </tr>
    <tr>
      <td style="background-color:white; text-align:center; line-height:3px; width:100%">
          -----------------------------------------<br><br>
          <h1>N° FICHA: $valorFicha</h1><br><br>
          -----------------------------------------<br><br><br><br>
      </td>
    </tr>
    <tr>
      <td style="font-size:11px; background-color:white; line-height:5px; width:100%; text-align:left;">
        Fecha: $fecha<br><br><br>
        Cajera: $respuestaCajera[nombre]<br><br><br>
        Trabajador: $respuestaTrabajador[nombre]
			</td>
		</tr>

	</table>

EOD;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------
//SALIDA DEL ARCHIVO.
$pdf->Output('ficha.pdf', 'I');

}

}
$ficha = new imprimirFicha();
$ficha -> numero = $_GET["numero"];
$ficha -> traerImpresionFicha();
?>