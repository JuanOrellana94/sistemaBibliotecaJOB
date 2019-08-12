<?php 
   require 'fpdf/fpdf.php';
   include("src/libs/vars.php");
   include 'barcode.php';
   $conexion=mysqli_connect("$servidor","$usuario","$clave")or die ("Error al conectar");
   mysqli_select_db($conexion,"$base");

    $xusuario = $_GET['codusu'];   	
	
	$sql = "SELECT usuprinom, ususegnom, usupriape, ususegape, usucarnet FROM usuario WHERE usucod = " . $xusuario;
	$resultado=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
	
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetAutoPageBreak(true, 20);
	$pdf->SetFont('Arial','B',7);
	$y = $pdf->GetY();
	
	while($usuario = mysqli_fetch_assoc($resultado)) { 
		$datos= $usuario['usuprinom'] . " " . $usuario['ususegnom'] . " " . $usuario['usupriape'] . " " . $usuario['ususegape'];
		$code = $xusuario . $usuario['usucarnet'] . '1234567890';
		
		barcode('codigos/'.$code.'.png', $code, 20, 'horizontal', 'code128', true);
		$pdf->Cell(50,15,$datos,0,1,'C');
		$pdf->Image('codigos/'.$code.'.png',10,$y+10,50,0,'PNG');		
		
		$y = $y+25;
	}
	$pdf->Output();	
    
?>