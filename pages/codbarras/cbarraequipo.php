<?php
  require '../../fpdf/fpdf.php';
  include("../../src/libs/vars.php");
  include("../../src/libs/sessionControl/conection.php");
  include 'barcode.php';
  $conexion=mysqli_connect("$servidor","$usuario","$clave")or die ("Error al conectar");
   mysqli_select_db($conexion,"$base");
   date_default_timezone_set("America/El_Salvador");
 

  $xequipo = $_GET['codequi'];
  $sql = "SELECT $varexistcod, $varexistcodreg, $varequitip, $varexistcodbar FROM $tablaExistenciaequipo INNER JOIN $tablaEquipo ON $tablaEquipo.$varequicod = $tablaExistenciaequipo.$varequicod WHERE  $tablaExistenciaequipo.$varexistcodreg =  '$xequipo';";
   $resultado=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  

       $pdf = new FPDF();
       $pdf->AddPage();
       $pdf->SetAutoPageBreak(true, 20);
       $pdf->SetFont('Arial','B',7);
       $y = $pdf->GetY(); 

      while($equipo = mysqli_fetch_assoc($resultado)) {    
           $numequipo= substr($equipo[$varexistcodreg],-5);      
           $datos = $equipo[$varequitip] . ", equipo #" . $numequipo;           
           $code =$equipo[$varexistcodbar];           
           
            barcode('codigos/'.$code.'.png', $code, 20, 'horizontal', 'code128', true);
            $pdf->Cell(50,15,$datos,0,1,'C');
            $pdf->Image('http://localhost/sistemabiblioteca/pages/codbarras/cbarra.php?xvalor='.$code.'.gif',10,$y+10,50,10,'gif');       
    
            $y = $y+25;          
        }
      $pdf->Output();
  ?>
      

