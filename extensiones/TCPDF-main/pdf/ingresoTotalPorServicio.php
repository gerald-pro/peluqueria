<?php

require_once "../../../controladores/servicios.controlador.php";
require_once "../../../modelos/servicios.modelo.php";
require_once '../../../extensiones/TCPDF-main/pdf/tcpdf_include.php';

date_default_timezone_set('America/La_Paz');

// Extender la clase TCPDF para agregar encabezado y pie de página
class MYPDF extends TCPDF
{
    public function Header()
    {
        $image_file = K_PATH_IMAGES . 'logo1.jpg';
        $this->Image($image_file, 10, 10, 25, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $bloque1 = <<<EOF
        <table style="width:100%; font-size:8px;">
            <tr>
                <td style="width:300px; vertical-align:top; text-align:right;">
                    <strong>NIT:</strong> 678934013 | 
                    <strong>Dirección:</strong> Av. El Palmar Zona Mercado 15 | 
                    <strong>Teléfono:</strong> 62003863<br>
                </td>
                <td style="width:155px; vertical-align:top; text-align:right;">
                    <strong>Nombre de la Empresa:</strong> SALON DE BELLEZA "XIOMI"<br>
                </td>
            </tr>
        </table>
EOF;
        $this->writeHTML($bloque1, false, false, false, false, '');
        $this->Ln(5);
        $this->Cell(0, 0, '', 'T', 1, 'C', 0, '', 1);
    }

    public function Footer()
    {
        $this->SetY(-20);
        $this->SetLineStyle(array('width' => 0.5, 'cap' => 'round', 'join' => 'round', 'dash' => 0, 'color' => array(0, 0, 0)));
        $this->Line(10, $this->GetY(), 200, $this->GetY());
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->getAliasNumPage() . ' de ' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 10, 'Generado el: ' . date('d-m-Y H:i:s'), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}

// Crear una nueva instancia del PDF personalizado
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true, 'UTF-8', false);

// Configuraciones básicas del PDF
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SALON DE BELLEZA "XIOMI"');
$pdf->SetTitle('INGRESO TOTAL POR SERVICIOS');
$pdf->SetSubject('Reporte de Servicios');

// Configuraciones de márgenes
$pdf->SetMargins(10, 50, 10);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(15);

// Agregar una página
$pdf->AddPage();

// Estilo de la tabla
$html = '<h2 style="text-align:center;">INGRESO TOTAL POR SERVICIOS</h2>';
$html .= '<table border="1" cellpadding="5" cellspacing="0" style="border-collapse:collapse; width:100%; font-size:10px;">
    <thead>
        <tr style="background-color:#c17fa1; color:white;">
            <th style="width:70%; text-align:center; font-weight:bold; padding:5px;">Nombre</th>
            <th style="width:30%; text-align:center; font-weight:bold; padding:5px;">Total de ingresos</th>
        </tr>
    </thead>
    <tbody>';

// Variable para acumular el total de ingresos
$totalIngresos = 0;

$respuesta = ModeloServicios::mdlIngresoTotalPorServicio();

foreach ($respuesta as $index => $servicios) {
    // Alternar el color de fondo de las filas
    $bgColor = ($index % 2 == 0) ? '#ffffff' : '#f9f9f9';

    // Convertir a número entero para quitar los decimales
    $ingresoEntero = intval($servicios['total_ingresos']);
    
    // Sumar al total de ingresos
    $totalIngresos += $ingresoEntero;

    $html .= '<tr style="background-color: ' . $bgColor . ';">
        <td style="width:70%; text-align:center; padding:5px;">' . $servicios['nombre'] . '</td>
        <td style="width:30%; text-align:center; padding:5px;">' . $ingresoEntero . '</td>
    </tr>';
}

$html .= '</tbody></table>';

// Agregar la tabla de suma total de ingresos al final
$html .= '<table border="1" cellpadding="5" cellspacing="0" style="border-collapse:collapse; width:100%; margin-top:15px; font-size:10px;">
    <tr style="background-color:#c17fa1; color:white;">
        <td style="width:70%; text-align:center; font-weight:bold; padding:5px;">SUMA TOTAL DE INGRESOS</td>
        <td style="width:30%; text-align:center; font-weight:bold; padding:5px;">' . $totalIngresos . '</td>
    </tr>
</table>';

// Escribir el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Cerrar y enviar el PDF al navegador
$pdf->Output('total_ingresos.pdf', 'I');

?>
