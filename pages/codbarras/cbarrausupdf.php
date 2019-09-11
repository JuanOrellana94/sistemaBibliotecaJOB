<?php 
   require '../../fpdf/fpdf.php';
   include("../../src/libs/vars.php");
   include("../../src/libs/sessionControl/conection.php");

   $conexion=mysqli_connect("$servidor","$usuario","$clave")or die ("Error al conectar");
   mysqli_select_db($conexion,"$base");

    $xusuario = $_GET['codusu'];   	
	
	$sql = "SELECT * FROM usuario WHERE usucod = " . $xusuario;
	$resultado=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
	
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetAutoPageBreak(true, 20);
	$pdf->SetFont('Arial','B',7);
	$y = $pdf->GetY();
	
	while($usuario = mysqli_fetch_assoc($resultado)) { 
		$datos= $usuario['usuprinom'] . " " . $usuario['ususegnom'] . " " . $usuario['usupriape'] . " " . $usuario['ususegape'];
		
		$code = $usuario['usucodbar'] ;

		                             $ANIO=""; 
						           switch ($usuario['usuanobac']) {
                                           case '0':
                                               $ANIO="PRIMER AÑO";
                                           break;
                                           case '1':
                                                $ANIO="SEGUNDO AÑO";
                                           break;
                                           case '2':
                                               $ANIO="TERCER AÑO";
                                           break;
                                           default:
                                                $ANIO=" ";
                                           break;
                                                                                   
                                      }  
                                      $SECCION=""; 
						           switch ($usuario['ususecaul']) {
                                           case '0':
                                               $SECCION="SECCION A";
                                           break;
                                           case '1':
                                               $SECCION="SECCION B";
                                           break;
                                           case '2':
                                               $SECCION="SECCION C";
                                           break;
                                           case '3':
                                               $SECCION="SECCION D";
                                           break;
                                           default:
                                                $SECCION=" ";
                                           break;                                           
                                      } 
                                      $BACHI=""; 
						           switch ($usuario['usutipbac']) {
                                           case '0':
                                               $BACHI="SALUD";
                                           break;
                                           case '1':
                                                $BACHI="MECANICA";
                                           break;
                                           case '2':
                                               $BACHI="CONTADURIA";
                                           break;
                                           default:
                                                $BACHI=" ";
                                           break;                                                                                    
                                      } 

        $datos2=  $ANIO . ", " . $BACHI . ", " . $SECCION;
		$pdf->Cell(50,15,utf8_decode($datos),0,1,'C');
		$pdf->Image('http://localhost/sistemabiblioteca/pages/codbarras/cbarra.php?xvalor='.$code.'.gif',10,$y+10,50,10,'gif');
		$pdf->SetFont('Arial','B',6); 		
		$pdf->Cell(45,15,utf8_decode($datos2),0,1,'C');
		$pdf->SetFont('Arial','B',7); 
		$y = $y+25;
	}
	$pdf->Output();	
    
?>