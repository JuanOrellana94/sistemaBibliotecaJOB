<?php
   require '../../fpdf/fpdf.php';
   include("../../src/libs/vars.php");
   
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
         
         //termina la creacion de la imagen
          $contador=$contador+1;
          if ($orden==1) {
              $numejemplar= $ejemplar['ejemcod'];      
              $datos = $ejemplar['libtit'] . ", Ejemplar #" . $numejemplar;       
                       

              $code = $ejemplar['ejemcodbar'];         
              
               
               $pdf->SetXY($x, $y);
               $pdf->Cell($x+35,5,$datos,0,1,'C');
               $pdf->Image('http://localhost/sistemabiblioteca/pages/codbarras/cbarra.php?xvalor='.$code.'.gif',$x+5,$y+5,50,10,'gif');              
               $orden=2;
             }
             elseif ($orden==2) {
                  $numejemplar= $ejemplar['ejemcod'];      
                  $datos = $ejemplar['libtit'] . ", Ejemplar #" . $numejemplar;       
              

                 $code = $ejemplar['ejemcodbar'];           
                
                 
                    $pdf->SetXY($x+65, $y);
                    $pdf->Cell($x+35,5,$datos,0,1,'C');
                    $pdf->Image('http://localhost/sistemabiblioteca/pages/codbarras/cbarra.php?xvalor='.$code.'.gif',$x+70,$y+5,50,10,'gif');   
                    
                    $orden=3;
                }else{
                     $numejemplar= $ejemplar['ejemcod'];      
                     $datos = $ejemplar['libtit'] . ", Ejemplar #" . $numejemplar;        
                 

                    $code = $ejemplar['ejemcodbar']; 
                                   
                        
                         $pdf->SetXY($x+135, $y);
                         $pdf->Cell($x+35,5,$datos,0,1,'C');
                         $pdf->Image('http://localhost/sistemabiblioteca/pages/codbarras/cbarra.php?xvalor='.$code.'.gif',$x+140,$y+5,50,10,'gif');     
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
