<?php
session_start();
require('fpdf.php');

if (!isset($_SESSION['curriculo'])) {
    die("Nenhum currículo para gerar.");
}

$curriculo = $_SESSION['curriculo'];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,iconv('UTF-8', 'ISO-8859-1//TRANSLIT','Currículo de '.$curriculo['nome']),0,1,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial','',12);
$pdf->Cell(0,8,iconv('UTF-8', 'ISO-8859-1//TRANSLIT', 'E-mail: '.$curriculo['email']),0,1);
$pdf->Cell(0,8,iconv('UTF-8', 'ISO-8859-1//TRANSLIT','Telefone: '.$curriculo['telefone']),0,1);
$pdf->Ln(10);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,8,iconv('UTF-8', 'ISO-8859-1//TRANSLIT','Experiência Profissional:'),0,1);
$pdf->SetFont('Arial','',12);
foreach ($curriculo['experiencias'] as $exp) {
    $pdf->MultiCell(0,8,('- '.$exp));
}
$pdf->Ln(5);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,8,iconv('UTF-8', 'ISO-8859-1//TRANSLIT','Formação Acadêmica:'),0,1);
$pdf->SetFont('Arial','',12);
foreach ($curriculo['formacoes'] as $form) {
    $pdf->MultiCell(0,8,('- '.$form));
}

$pdf->Ln(10);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(0,8,iconv('UTF-8', 'ISO-8859-1//TRANSLIT','Gerado em: '.date('d/m/Y H:i:s')),0,1,'R');

$pdf->Output('I', 'Curriculo_'.$curriculo['nome'].'.pdf');
