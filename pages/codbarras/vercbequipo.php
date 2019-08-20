<?php
  require '../../fpdf/fpdf.php';
  include("../../src/libs/vars.php");
  include("../../src/libs/sessionControl/conection.php");
  date_default_timezone_set("America/El_Salvador");  

  $xequipo = $_GET['codequi'];
  $codigoEqui = $_GET['codigoEqui'];
  $sql = "SELECT $varexistcod, $varexistcodreg, $varequitip FROM $tablaExistenciaequipo INNER JOIN $tablaEquipo ON $tablaEquipo.$varequicod = $tablaExistenciaequipo.$varequicod WHERE $tablaEquipo.$varequicod = '$codigoEqui' AND  $tablaExistenciaequipo.$varexistcodreg =  '$xequipo';";
   $resultado=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));      
?>

<html>
<body>
<p>
      <?php
      while($equipo = mysqli_fetch_assoc($resultado)) { 
          $numequipo= substr($equipo[$varexistcodreg],-5);           
          echo "<b>" . $equipo[$varequitip] . "</b>, equipo #" . $numequipo ."<br>";
          $codbarra =$equipo[$varexistcod] . str_replace("-", "", $equipo[$varexistcodreg]) . '1234'; 
          echo "<div><img src='pages/codbarras/cbarra.php?xvalor=".$codbarra. "'></div>";          
      }
      echo "<br>" . $codbarra;
  ?>

      <?php echo "<br><br><a href=\"pages/codbarras/cbarraequipo.php?codequi=" . $xequipo. "\">Mostrar PDF</a>"; ?>
</p>
</body>
</html>
