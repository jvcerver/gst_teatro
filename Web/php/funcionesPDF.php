<?php require_once('fpdf.php');
	  require_once '../Gestion/FuncionesDB.php';

function imprmirEntrada($codigo, $fecha, $hora, $butaca){
	$butaca = explode(':', $butaca);
	switch($butaca[0]){
		case 1:
			$butaca = "Platea-> F:" . $butaca[1] . " B:" . $butaca[2]; 
			break;
		case 2:
			$butaca = "Anfiteatro-> F:" . $butaca[1] . " B:" . $butaca[2]; 
			break;
		default:
			$butaca = "Palco " . ($butaca[0]-2) . "-> B:" . $butaca[2];
	}
	$infoObra=mysqli_fetch_array(verObraReservada($codigo));
	$pdf = new FPDF('P','mm','A4');
	$pdf->AddPage();
	$pdf->Image("../imagenes/obras/".$infoObra['uri'],110,10, 80, 80);
	$pdf->Ln(10);
	$pdf->SetFont('Arial','B',30);
	$pdf->SetTextColor(220,50,50);
	$pdf->Cell(90,10,$infoObra['nombre'],0,1,'C');
	$pdf->Ln(10);
	$pdf->SetFont('Arial','B',20);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(90,10,$fecha . " (". $hora .")",0,1,'C');
	$pdf->Ln(10);
	$pdf->Cell(90,10,$butaca,0,1,'C');
	$pdf->Ln(10);
	$pdf->SetFont('Arial','I',10);
	$pdf->Cell(90,10,"Cod " . $codigo,0,1,'R');
	$pdf->Output();
}
?>



