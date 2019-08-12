<?php
  require 'fpdf/fpdf.php';
  include("src/libs/vars.php");
  include 'barcode.php';
  $conexion=mysqli_connect("$servidor","$usuario","$clave")or die ("Error al conectar");
   mysqli_select_db($conexion,"$base");
   date_default_timezone_set("America/El_Salvador");
 

  $xejemplar = $_GET['codeje'];
  $sql = "SELECT ejemcod, ejemcodreg, libtit FROM ejemplareslibros INNER JOIN libros ON libros.libcod = ejemplareslibros.libcod WHERE ejemplareslibros.ejemcodreg = '" . $xejemplar . "'";
   $resultado=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  

       $pdf = new FPDF();
       $pdf->AddPage();
       $pdf->SetAutoPageBreak(true, 20);
       $pdf->SetFont('Arial','B',7);
       $y = $pdf->GetY(); 

      while($ejemplar = mysqli_fetch_assoc($resultado)) {    
           $numejemplar= substr($ejemplar['ejemcodreg'],-5);      
           $datos = $ejemplar['libtit'] . ", Ejemplar #" . $numejemplar;           
           $code =$ejemplar['ejemcod'] . str_replace("-", "", $ejemplar['ejemcodreg']) . '1234';           
           
            barcode('codigos/'.$code.'.png', $code, 20, 'horizontal', 'code128', true);
            $pdf->Cell(50,15,$datos,0,1,'C');
            $pdf->Image('codigos/'.$code.'.png',10,$y+10,50,0,'PNG');   
    
            $y = $y+25;          
        }
      $pdf->Output();
  ?>
      

