<?php
  require '../../fpdf/fpdf.php'; 
  include("../../src/libs/vars.php");
  include("../../src/libs/sessionControl/conection.php");
  date_default_timezone_set("America/El_Salvador");
  if(!isset($_SESSION)){
      session_start();    
  }

  $xusuario = $_GET['codusu'];
  $sql = "SELECT usuprinom, ususegnom, usupriape, ususegape, usucarnet, usucodbar  FROM usuario WHERE usucod = " . $xusuario;
   $resultado=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));      
?>

<html>
<body>
<p>
      <?php
      while($usuario = mysqli_fetch_assoc($resultado)) {          
          echo "<h5 align=left>". $usuario['usuprinom'] . " " . $usuario['ususegnom'] . " " . $usuario['usupriape'] . " " . $usuario['ususegape'] ."</h5>" ;         
          $code = $usuario['usucodbar'] ;
          echo "<div align=left> <img  src='pages/codbarras/cbarra.php?xvalor=".$code. "'  width='400' height='100'>  </div>";          
      }
    
     ?>
    <?php echo "<a href=\"pages/codbarras/cbarrausupdf.php?codusu=" . $xusuario. "\" target='_blank'>Mostrar PDF</a>"; ?>
</p>
</body>
</html>
