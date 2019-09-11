<?php
  require '../../fpdf/fpdf.php';
  include("../../src/libs/vars.php");
  include("../../src/libs/sessionControl/conection.php");
  
  $conexion=mysqli_connect("$servidor","$usuario","$clave")or die ("Error al conectar");
   mysqli_select_db($conexion,"$base");
   date_default_timezone_set("America/El_Salvador");
 

  $xejemplar = $_GET['codeje'];
  $sql = "SELECT ejemcod, ejemcodreg, ejemcodbar, libtit FROM ejemplareslibros INNER JOIN libros ON libros.libcod = ejemplareslibros.libcod WHERE ejemplareslibros.ejemcodreg = '" . $xejemplar . "'";
   $resultado=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  

       $pdf = new FPDF();
       $pdf->AddPage();
       $pdf->SetAutoPageBreak(true, 20);
       $pdf->SetFont('Arial','B',7);
       $y = $pdf->GetY(); 

      while($ejemplar = mysqli_fetch_assoc($resultado)) {    
           $numejemplar= substr($ejemplar['ejemcodreg'],-5);      
           $datos = substr($ejemplar['libtit'], 0, 22)."". "..." . " Ej. #" . $numejemplar; 
           $datos2 = $ejemplar['ejemcodreg']; 
           $tamaño=strlen($ejemplar['ejemcod']);          
           $code = $ejemplar['ejemcodbar'];
            
            $pdf->Cell(55,15,utf8_decode($datos),0,1,'C');
            $pdf->Image('http://localhost/sistemabiblioteca/pages/codbarras/cbarra.php?xvalor='.$code.'.gif',15,$y+10,50,10,'gif');
          $pdf->Cell(55,15,utf8_decode($datos2),0,1,'C');   
    
            $y = $y+25;          
        }
      $pdf->Output();
  ?>
      

