<?php
require('fpdf186/fpdf.php');

class PDF extends FPDF {
    function Header() {
        $this->Image('./images/logoFssm.png', 10, 6, 30);
        $this->SetFont('Arial', 'B', 16);
        $this->SetTextColor(3, 3, 3);
        $this->Cell(0, 10, 'Student Exam Report', 0, 1, 'C');
        $this->Ln(10);
    }
}

$pdf = new PDF('P','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Get student data
$name = $_GET['name'];
$math = $_GET['math'];
$info = $_GET['info'];


$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(0, 10, 'Student Name: ' . $name, 0, 1);
$pdf->Cell(0, 10, 'Date: ' . date('Y-m-d'), 0, 1);
$pdf->Ln(5);

// Exam results data
$results = [
    "Math Exam" => $math,
    "Computer Science Exam" => $info
];


$col1_width = 80;
$col2_width = 40;
$table_width = $col1_width + $col2_width;


$xPos = ($pdf->GetPageWidth() - $table_width) / 2;


$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(0, 51, 102); 
$pdf->SetTextColor(255, 255, 255);
$pdf->SetX($xPos);
$pdf->Cell($col1_width, 10, 'Exam', 1, 0, 'C', true);
$pdf->Cell($col2_width, 10, 'Note', 1, 1, 'C', true);


$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);


foreach ($results as $subject => $score) {
    $pdf->SetX($xPos);
    $pdf->Cell($col1_width, 10, $subject, 1, 0, 'C');
    $pdf->Cell($col2_width, 10, $score . '/20', 1, 1, 'C');
}


$finalScore = array_sum($results) / count($results);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(255, 204, 0); 
$pdf->SetX($xPos);
$pdf->Cell($col1_width, 10, 'Final Average', 1, 0, 'C', true);
$pdf->Cell($col2_width, 10, round($finalScore, 2) . '/20', 1, 1, 'C', true);


$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 14);
if ($finalScore >= 10) {
    $pdf->SetTextColor(0, 153, 0); 
    $pdf->Cell(0, 10, 'Congratulations! You Passed ', 0, 1, 'C');
} else {
    $pdf->SetTextColor(204, 0, 0); 
    $pdf->Cell(0, 10, 'Sorry! You Failed ', 0, 1, 'C');
}


$pdf->Output();
?>
