<?php
   require '../../fpdf/fpdf.php';
   include("../../src/libs/vars.php");
   include 'barcode.php';
   $conexion=mysqli_connect("$servidor","$usuario","$clave")or die ("Error al conectar");
   mysqli_select_db($conexion,"$base");
   date_default_timezone_set("America/El_Salvador");
 

   $libros = $_GET['codlib'];

  $sql = "SELECT ejemcod, ejemcodreg, ejemcodbar, libtit FROM ejemplareslibros INNER JOIN libros ON libros.libcod = ejemplareslibros.libcod where libros.libcod = $libros ";
   $resultado=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  

       $pdf = new FPDF();
       $pdf->AddPage();       
       $pdf->SetFont('Arial','B',7);
       $y = $pdf->GetY();
       $x = $pdf->GetX(); 
       $orden=1;
       $contador=0;
       
      while($ejemplar = mysqli_fetch_assoc($resultado)) {        
         
          $contador=$contador+1;
          if ($orden==1) {
              $numejemplar= substr($ejemplar['ejemcodreg'],-5);      
              $datos = $ejemplar['libtit'] . ", Ejemplar #" . $numejemplar;           
              $code ="01234568";            
              barcode('codigos/'.$code.'.png', $code, 150, 'horizontal', 'code39', true);
               
               $pdf->SetXY($x, $y);
               $pdf->Cell($x+40,5,$datos,0,1,'C');
               $pdf->Image('codigos/'.$code.'.png',$x+5,$y+5,40,10,'PNG');              
               $orden=2;
             }
             elseif ($orden==2) {
                  $numejemplar= substr($ejemplar['ejemcodreg'],-5);      
                  $datos = $ejemplar['libtit'] . ", Ejemplar #" . $numejemplar;           
                  $code ="0123456987";            
                
                  barcode('codigos/'.$code.'.png', $code, 150, 'horizontal', 'code39', true);
                    $pdf->SetXY($x+70, $y);
                    $pdf->Cell($x+30,5,$datos,0,1,'C');
                    $pdf->Image('codigos/'.$code.'.png',$x+70,$y+5,40,10,'PNG');   
                    
                    $orden=3;
                }else{
                   $numejemplar= substr($ejemplar['ejemcodreg'],-5);      
                    $datos = $ejemplar['libtit'] . ", Ejemplar #" . $numejemplar;           
                    $code ="123456";   
                                  
                         barcode('codigos/'.$code.'.png', $code, 150, 'horizontal', 'code39', true);
                         $pdf->SetXY($x+140, $y);
                         $pdf->Cell($x+40,5,$datos,0,1,'C');
                         $pdf->Image('codigos/'.$code.'.png',$x+140,$y+5,40,10,'PNG');     
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
