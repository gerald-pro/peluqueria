<?php

require_once "../../../modelos/pagos.modelo.php";
require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once '../../../extensiones/TCPDF-main/pdf/tcpdf_include.php';

// Establecer la zona horaria
date_default_timezone_set('America/La_Paz'); // Ajusta esto a tu zona horaria

// Array de meses en español
$mesesEspanol = array(
    'January' => 'Enero',
    'February' => 'Febrero',
    'March' => 'Marzo',
    'April' => 'Abril',
    'May' => 'Mayo',
    'June' => 'Junio',
    'July' => 'Julio',
    'August' => 'Agosto',
    'September' => 'Septiembre',
    'October' => 'Octubre',
    'November' => 'Noviembre',
    'December' => 'Diciembre'
);

// Extender la clase TCPDF para agregar encabezado y pie de página
class MYPDF extends TCPDF
{
    // Agregar un encabezado personalizado
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

    // Agregar un pie de página personalizado
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
$pdf->SetTitle('REPORTE DE PAGOS');
$pdf->SetSubject('Reporte de Pagos');

// Configuraciones de márgenes
$pdf->SetMargins(10, 50, 10);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(15);

// Agregar una página
$pdf->AddPage();

$respuestaPagos = ModeloPagos::mdlTotalPagosMes();

// Calcula la suma total de los ingresos
$sumaTotalIngresos = 0;
foreach ($respuestaPagos as $pagos) {
    $sumaTotalIngresos += $pagos['total_ingresos'];
}

// Estilo de la tabla
$html = '<h2 style="text-align:center;">TOTAL DE INGRESOS POR MES</h2>';
$html .= '<table border="1" cellpadding="5" cellspacing="0" style="border-collapse:collapse; width:100%; font-size:10px;">
<thead>
    <tr style="background-color:#c17fa1; color:white;">
        <th style="text-align:center; font-weight:bold; padding:5px;">Fecha</th>
        <th style="text-align:center; font-weight:bold; padding:5px;">Mes</th>
        <th style="text-align:center; font-weight:bold; padding:5px;">Total de Ingresos</th>
    </tr>
</thead>
<tbody>';

foreach ($respuestaPagos as $index => $pagos) {
    // Alternar el color de fondo de las filas
    $bgColor = ($index % 2 == 0) ? '#ffffff' : '#f9f9f9';
    // Formatear la fecha como día, mes y año
    $fechaCompleta = date('d-m-Y', strtotime($pagos['mes']));
    // Obtener el mes en texto y traducirlo al español
    $nombreMesIngles = date('F', strtotime($pagos['mes']));
    $nombreMes = $mesesEspanol[$nombreMesIngles];

    $html .= '<tr style="background-color: ' . $bgColor . ';">
        <td style="text-align:center; padding:5px;">' . $fechaCompleta . '</td>
        <td style="text-align:center; padding:5px;">' . ucfirst($nombreMes) . '</td>
        <td style="text-align:center; padding:5px;">Bs. ' . number_format($pagos['total_ingresos'], 0) . '</td>
    </tr>';
}

// Agregar la fila con la suma total
$html .= '<tr style="background-color:#d9edf7;">
    <td colspan="2" style="text-align:center; font-weight:bold; padding:5px;">Total</td>
    <td style="text-align:center; font-weight:bold; padding:5px;">Bs. ' . number_format($sumaTotalIngresos, 0) . '</td>
</tr>';

$html .= '</tbody></table>';

// Escribir el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Cerrar y enviar el PDF al navegador
$pdf->Output('total_ingresos_mes.pdf', 'I');

?>
