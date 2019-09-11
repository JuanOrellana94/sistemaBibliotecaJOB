<?php 
   require '../../fpdf/fpdf.php';
   include("../../src/libs/vars.php");
   
   $conexion=mysqli_connect("$servidor","$usuario","$clave")or die ("Error al conectar");
   mysqli_select_db($conexion,"$base");

    $codseccion = $_GET['codseccion']; 
    $codanio = $_GET['codanio']; 
    $codbachi = $_GET['codbachi'];  	
	
	$sql = "SELECT * FROM usuario WHERE ususecaul = $codseccion and usuanobac =  $codanio and usutipbac = $codbachi  and usuestcue = '0' ";
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
		          $code = $usuario['usucodbar'];
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
              
               $pdf->SetXY($x, $y);
               $pdf->Cell($x+40,5,utf8_decode($datos),0,1,'C');
               $pdf->Image('http://localhost/sistemabiblioteca/pages/codbarras/cbarra.php?xvalor='.$code.'.gif',$x,$y+5,50,10,'gif');
               $pdf->SetFont('Arial','B',6);  
              $pdf->Cell($x+40,25,utf8_decode($datos2),0,1,'C');
              $pdf->SetFont('Arial','B',7);             
               $orden=2;
             }
             elseif ($orden==2) {
                $datos= $usuario['usuprinom'] . " " . $usuario['ususegnom'] . " " . $usuario['usupriape'] . " " . $usuario['ususegape'];
                $code = $usuario['usucodbar'];
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

                  $pdf->SetXY($x+70, $y);
                  $pdf->Cell($x+40,5,utf8_decode($datos),0,1,'C');
                 $pdf->Image('http://localhost/sistemabiblioteca/pages/codbarras/cbarra.php?xvalor='.$code.'.gif',$x+75,$y+5,50,10,'gif'); 
                 $pdf->SetFont('Arial','B',6); 
                  $pdf->Cell($x+190,25,utf8_decode($datos2),0,1,'C'); 
                  $pdf->SetFont('Arial','B',7);                 
                    $orden=3;
                }else{
                    $datos= $usuario['usuprinom'] . " " . $usuario['ususegnom'] . " " . $usuario['usupriape'] . " " . $usuario['ususegape'];
                    $code = $usuario['usucodbar'];
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
                       
                    $pdf->SetXY($x+140, $y);
                    $pdf->Cell($x+40,5,utf8_decode($datos),0,1,'C');
                    $pdf->Image('http://localhost/sistemabiblioteca/pages/codbarras/cbarra.php?xvalor='.$code.'.gif',$x+145,$y+5,50,10,'gif');
                    $pdf->SetFont('Arial','B',6); 
                    $pdf->Cell($x+330,25,utf8_decode($datos2),0,1,'C');  
                    $pdf->SetFont('Arial','B',7);     
                    $y = $y+21;
                    $orden=1;

                } 
          if ($contador==36) {
             $pdf->AddPage();       
               $pdf->SetFont('Arial','B',7);
              $y = $pdf->GetY();
              $x = $pdf->GetX();
              $contador=0; 
           }     
	}
	$pdf->Output();	
    
?>