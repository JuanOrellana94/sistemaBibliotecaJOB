<?php 
   require 'fpdf/fpdf.php';
   include("src/libs/vars.php");
   include 'barcode.php';
   $conexion=mysqli_connect("$servidor","$usuario","$clave")or die ("Error al conectar");
   mysqli_select_db($conexion,"$base");

    $codseccion = $_GET['codseccion']; 
    $codanio = $_GET['codanio']; 
    $codbachi = $_GET['codbachi'];  	
	
	$sql = "SELECT usucod, usuprinom, ususegnom, usupriape, ususegape, usucarnet FROM usuario WHERE ususecaul = $codseccion and usuanobac =  $codanio and usutipbac = $codbachi  ";
	$resultado=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
	
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetAutoPageBreak(true, 20);
	$pdf->SetFont('Arial','B',7);
	$y = $pdf->GetY();
	$x = $pdf->GetX(); 
	$orden=1;
	$contador=0;
	while($usuario = mysqli_fetch_assoc($resultado)) {
	  
	    $contador=$contador+1;
	 
	    	# code...
	   
          if ($orden==1) {
              $datos= $usuario['usuprinom'] . " " . $usuario['ususegnom'] . " " . $usuario['usupriape'] . " " . $usuario['ususegape'];
		      $code = $usuario['usucod'] . $usuario['usucarnet'] . '1234567890';        
           
               barcode('codigos/'.$code.'.png', $code, 20, 'horizontal', 'code128', true);
               $pdf->SetXY($x, $y);
               $pdf->Cell($x+40,5,$datos,0,1,'C');
               $pdf->Image('codigos/'.$code.'.png',$x,$y+5,50,0,'PNG');               
               $orden=2;
             }
             elseif ($orden==2) {
                 $datos= $usuario['usuprinom'] . " " . $usuario['ususegnom'] . " " . $usuario['usupriape'] . " " . $usuario['ususegape'];
	             $code = $usuario['usucod'] . $usuario['usucarnet'] . '1234567890';

                barcode('codigos/'.$code.'.png', $code, 20, 'horizontal', 'code128', true);
                  $pdf->SetXY($x+70, $y);
                  $pdf->Cell($x+40,5,$datos,0,1,'C');
                 $pdf->Image('codigos/'.$code.'.png',$x+70,$y+5,50,0,'PNG');  
                    
                    $orden=3;
                }else{

                    $datos= $usuario['usuprinom'] . " " . $usuario['ususegnom'] . " " . $usuario['usupriape'] . " " . $usuario['ususegape'];
		            $code = $usuario['usucod'] . $usuario['usucarnet'] . '1234567890';           
           
                    barcode('codigos/'.$code.'.png', $code, 20, 'horizontal', 'code128', true);
                    $pdf->SetXY($x+140, $y);
                    $pdf->Cell($x+40,5,$datos,0,1,'C');
                    $pdf->Image('codigos/'.$code.'.png',$x+140,$y+5,50,0,'PNG');  
                    $y = $y+15;
                    $orden=1;

                } 
          if ($contador==54) {
             $pdf->AddPage();       
               $pdf->SetFont('Arial','B',7);
              $y = $pdf->GetY();
              $x = $pdf->GetX();
              $contador=0; 
           }           

	    
	}
	$pdf->Output();	
    
?>