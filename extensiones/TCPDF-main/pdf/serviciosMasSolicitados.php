<?php 

require_once "../../../controladores/servicios.controlador.php";
require_once "../../../modelos/servicios.modelo.php";
require_once '../../../extensiones/TCPDF-main/pdf/tcpdf_include.php';

// Establecer la zona horaria
date_default_timezone_set('America/La_Paz'); // Ajusta esto a tu zona horaria

// Extender la clase TCPDF para agregar encabezado y pie de página
class MYPDF extends TCPDF
{
    // Agregar un encabezado personalizado
    public function Header()
    {
        // Logo
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
$pdf->SetTitle('SERVICIOS MAS SOLICITADOS');
$pdf->SetSubject('Reporte de Servicios');

// Configuraciones de márgenes
$pdf->SetMargins(10, 50, 10);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(15);

// Agregar una página
$pdf->AddPage();

// Estilo de la tabla
$html = '<h2 style="text-align:center;">SERVICIOS MAS SOLICITADOS</h2>';
$html .= '<table border="1" cellpadding="5" cellspacing="0" style="border-collapse:collapse; width:100%; font-size:10px;">
    <thead>
        <tr style="background-color:#c17fa1; color:white;">
            <th style="width:40%; text-align:center; font-weight:bold; padding:5px;">Nombre</th>
            <th style="width:20%; text-align:center; font-weight:bold; padding:5px;">Precio</th>
            <th style="width:20%; text-align:center; font-weight:bold; padding:5px;">Solicitudes</th>
            <th style="width:20%; text-align:center; font-weight:bold; padding:5px;">Total por Servicio</th>
        </tr>
    </thead>
    <tbody>';

$respuesta = ModeloServicios::mdlServiciosMasSolicitados();
$totalGeneral = 0; // Variable para acumular el total de todos los servicios

foreach ($respuesta as $index => $servicios) {
    // Alternar el color de fondo de las filas
    $bgColor = ($index % 2 == 0) ? '#ffffff' : '#f9f9f9';

    // Calcular el total por servicio
    $totalPorServicio = $servicios['precio'] * $servicios['total_solicitudes'];
    $totalGeneral += $totalPorServicio; // Acumular en el total general

    $html .= '<tr style="background-color: ' . $bgColor . ';">
        <td style="width:40%; text-align:center; padding:5px;">' . $servicios['nombre'] . '</td>
        <td style="width:20%; text-align:center; padding:5px;">' . number_format($servicios['precio'], 0, '.', ',') . ' Bs.</td>
        <td style="width:20%; text-align:center; padding:5px;">' . $servicios['total_solicitudes'] . '</td>
        <td style="width:20%; text-align:center; padding:5px;">' . number_format($totalPorServicio, 0, '.', ',') . ' Bs.</td>
    </tr>';
}

// Agregar una fila para la suma total de "Total por Servicio"
$html .= '<tr style="background-color:#c17fa1; color:white;">
        <td colspan="3" style="text-align:right; font-weight:bold; padding:5px;">Suma Total:</td>
        <td style="text-align:center; font-weight:bold; padding:5px;">' . number_format($totalGeneral, 0, '.', ',') . ' Bs.</td>
    </tr>';

$html .= '</tbody></table>';

// Escribir el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Cerrar y enviar el PDF al navegador
$pdf->Output('clientes_totales.pdf', 'I');

?>
