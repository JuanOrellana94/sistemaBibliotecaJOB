<?php 
include("../vars.php");
include("conection.php");

session_start();
$usuCodigo=$_POST['usuCodigo'];
$usuContrasena=md5($_POST['usuContrasena']);

$bitPersonaName=$_SESSION['nombreComp'];

//$usuCodigo="2";
//$usuContrasena=md5("clave1");



    $insRegistro=mysqli_query($conexion,"
      UPDATE  $tablaUsuarios SET
        $varContrasena='$usuContrasena'
      WHERE $varUsuCodigo='$usuCodigo';") 
      or die ('ERROR INS-INS:'.mysqli_error($conexion));

    $insRegistro=mysqli_query($conexion,"
      INSERT INTO  $tablaBitacora(
        $varFecha,
        $varDesc,
        $varBitUsuCodigo,
        $varNomLibreria,
        $varNomPersona
        ) VALUES(
        NOW(),
        ' realizo un cambio de clave exitosamente',
        '$usuCodigo',
        '---',
        '$bitPersonaName');")
      or die ('ERROR INS-INS:'.mysqli_error($conexion));


    $_SESSION[ 'autorizado' ]="yes";  
    echo "success";
           
      



 ?>