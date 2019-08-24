<?php
  require '../../fpdf/fpdf.php';
  include("../../src/libs/vars.php");
  include("../../src/libs/sessionControl/conection.php");
  date_default_timezone_set("America/El_Salvador");  

  $xejemplar = $_GET['codeje'];
  $codigoLib = $_GET['codigoLib'];
  $sql = "SELECT ejemcod,ejemcodreg, ejemcodbar, libtit FROM ejemplareslibros INNER JOIN libros ON libros.libcod = ejemplareslibros.libcod WHERE libros.libcod = '$codigoLib' AND  ejemplareslibros.ejemcodreg =  '$xejemplar' ";
   $resultado=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));      
?>

<html>
<body>
<p>
      <?php
      while($ejemplar = mysqli_fetch_assoc($resultado)) { 
          $numejemplar= $ejemplar['ejemcod'];           
          echo "<h5 align=left>".  $ejemplar['libtit'] . "</b>, Ejemplar #" . $numejemplar ."</h5>";         
        
          $codbarra = $ejemplar['ejemcodbar']; 
          echo "<div align=left> <img  src='pages/codbarras/cbarra.php?xvalor=".$codbarra. "'  width='400' height='100'>  </div>";          
        }          
      
     
  ?>
      <?php echo "<br><br><a href=\"pages/codbarras/cbarraejempdf.php?codeje=" . $xejemplar. "\">Mostrar PDF</a>"; ?>
</p>
</body>
</html>
