<?php
   require '../../fpdf/fpdf.php';
   include("../../src/libs/vars.php");
   
   $conexion=mysqli_connect("$servidor","$usuario","$clave")or die ("Error al conectar");
   mysqli_select_db($conexion,"$base");
   date_default_timezone_set("America/El_Salvador");
 

   $equitip = $_GET['equitip'];

  $sql = "SELECT $varexistcod, $varexistcodreg, $varexistcodbar, $varequitip FROM $tablaExistenciaequipo INNER JOIN $tablaEquipo ON $tablaExistenciaequipo.$varequicod = $tablaEquipo.$varequicod where $tablaEquipo.$varequicod = $equitip";
   $resultado=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  

       $pdf = new FPDF();
       $pdf->AddPage();       
       $pdf->SetFont('Arial','B',7);
       $y = $pdf->GetY();
       $x = $pdf->GetX(); 
       $orden=1;
       $contador=0;
       
      while($equipo = mysqli_fetch_assoc($resultado)) {      
          $contador=$contador+1;
          if ($orden==1) {
              $numequipo= $equipo[$varexistcod];      
              $datos = $equipo[$varequitip] . ", equipo #" . $numequipo;           
              $datos2 = $equipo[$varexistcodreg]; 
              $code = $equipo[$varexistcodbar];     
               $pdf->SetXY($x, $y);
               $pdf->Cell($x+35,5,$datos,0,1,'C');
               $pdf->Image('http://localhost/sistemabiblioteca/pages/codbarras/cbarra.php?xvalor='.$code.'.gif',$x+5,$y+5,50,10,'gif');       
               $pdf->Cell($x+45,25,$datos2,0,1,'C');       
               $orden=2;
             }
             elseif ($orden==2) {
                  $numequipo= $equipo[$varexistcod];      
                 $datos = $equipo[$varequitip] . ", equipo #" . $numequipo;       
                 $datos2 = $equipo[$varexistcodreg]; 
                 $code = $equipo[$varexistcodbar];   
                    $pdf->SetXY($x+65, $y);
                    $pdf->Cell($x+35,5,$datos,0,1,'C');
                    $pdf->Image('http://localhost/sistemabiblioteca/pages/codbarras/cbarra.php?xvalor='.$code.'.gif',$x+70,$y+5,50,10,'gif');
                    $pdf->Cell($x+175,25,$datos2,0,1,'C'); 
                    $orden=3;
                }elseif ($orden==3) {
                    $numequipo= $equipo[$varexistcod];      
                    $datos = $equipo[$varequitip] . ", equipo #" . $numequipo;           
                    $datos2 = $equipo[$varexistcodreg]; 
                    $code = $equipo[$varexistcodbar];
                         $pdf->SetXY($x+135, $y);
                         $pdf->Cell($x+35,5,$datos,0,1,'C');
                         $pdf->Image('http://localhost/sistemabiblioteca/pages/codbarras/cbarra.php?xvalor='.$code.'.gif',$x+140,$y+5,50,10,'gif');    
                         $pdf->Cell($x+315,25,$datos2,0,1,'C');     
                    $y = $y+21; //tamaño de la fila n + 1 
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
