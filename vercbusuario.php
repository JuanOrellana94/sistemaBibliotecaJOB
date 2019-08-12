<?php
  include("src/libs/vars.php");
  include("src/libs/sessionControl/conection.php");
  date_default_timezone_set("America/El_Salvador");
  if(!isset($_SESSION)){
      session_start();    
  }

  $xusuario = $_GET['codusu'];
  $sql = "SELECT usuprinom, ususegnom, usupriape, ususegape, usucarnet FROM usuario WHERE usucod = " . $xusuario;
   $resultado=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));      
?>

<html>
<body>
<p>
      <?php
      while($usuario = mysqli_fetch_assoc($resultado)) {          
          echo $usuario['usuprinom'] . " " . $usuario['ususegnom'] . " " . $usuario['usupriape'] . " " . $usuario['ususegape'] ."<br>";
          $codbarra =$xusuario . $usuario['usucarnet'] . '1234567890'; 
          echo "<img src='cbarra.php?xvalor=".$codbarra. "'>";          
      }
      echo "<br>" . $codbarra;
     ?>
    <?php echo "<br><br><a href=\"cbarrausupdf.php?codusu=" . $xusuario. "\">Mostrar PDF</a>"; ?>
</p>
</body>
</html>
