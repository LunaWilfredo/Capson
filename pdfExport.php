<?php
require_once 'PDF/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

ob_start();
require_once 'View/Report/report_pdf.php';
$html = ob_get_clean();
$html2pdf = new Html2Pdf('L','letter','es','true','UTF-8');
$html2pdf->pdf->SetDisplayMode('fullpage');
$html2pdf->writeHTML($html);
$html2pdf->output('Boleta.pdf');
?>