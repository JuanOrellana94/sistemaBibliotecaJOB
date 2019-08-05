<?php 
include("../vars.php");
include("conection.php");


//$usuAccount="19001";


$usuAccount=$_POST['usuAccNombre'];


$UsuPassword=md5($_POST['usuContrasena']);

//$UsuPassword=md5("19001");






$checkValidation="SELECT * from $tablaUsuarios WHERE $varContrasena='$UsuPassword' AND 
$varCarnet='$usuAccount' OR $varAccNombre='$usuAccount'";

$resultado=mysqli_query($conexion, $checkValidation) or die(mysqli_error($conexion));


$dataRow = mysqli_fetch_array($resultado);

if(isset($dataRow)){

  if($dataRow[$varCueEstatus]=="1"){

    //usuCueStatus. = 1= Desactivada
    echo "2";

  } else if($dataRow[$varCueEstatus]=="2") {
    //usuCueStatus. = 2= Bloqueada
    echo "3";



  }else if($dataRow[$varCueEstatus]=="0"){
    //Condiciones de acceso cumplidas, session starts
    session_start();
    $_SESSION['usuCodigo']=$dataRow[$varUsuCodigo];
    $_SESSION['usuAccount']=$dataRow[$varAccNombre];
    $_SESSION['usuPriNombre']=$dataRow[$varPriNombre];
    $_SESSION['usuSegNombre']=$dataRow[$varSegNombre];
    $_SESSION['usuPriApellido']=$dataRow[$varPriApellido];
    $_SESSION['varSegApellido']=$dataRow[$varSegApellido];
    $_SESSION['usuCarnet']=$dataRow[$varCarnet];
    $_SESSION['usuCorreo']=$dataRow[$varCorreo];
    $_SESSION['usuAnoBachi']=$dataRow[$varAnoBachi];
    $_SESSION['usuSecAula']=$dataRow[$varSecAula];
    $_SESSION['usuNivel']=$dataRow[$varNivel];



    if( $_SESSION['usuNivel'] == 0 ){
      $_SESSION['usuNivelNombre']="Administrador";
    }else  if( $_SESSION['usuNivel'] == 1 ){
      $_SESSION['usuNivelNombre']="Bibliotecario";
    }else  if( $_SESSION['usuNivel'] == 2 ){
      $_SESSION['usuNivelNombre']="Personal";
    }else  if( $_SESSION['usuNivel'] == 3 ){
      $_SESSION['usuNivelNombre']="Estudiante";
    }


    

    $_SESSION['nombreComp'] = $dataRow[$varPriNombre] .  " " . $dataRow[$varPriApellido];
    

    $usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];


    $insRegistro=mysqli_query($conexion,"
    INSERT INTO  $tablaBitacora(
      $varFecha,
      $varDesc,
      $varBitUsuCodigo,
      $varNomLibreria,
      $varNomPersona
      ) VALUES(
      NOW(),
      'ingreso exitosamente al sistema',
      '$usuCodigo',
      '---',
      '$bitPersonaName');")
    or die ('ERROR INS-INS:'.mysqli_error($conexion));


    if ($_POST['usuContrasena']==$usuAccount || $_POST['usuContrasena'] == "institutoJO19") {
      $_SESSION['autorizado']="renovar";  
    }else{
      $_SESSION['autorizado']="yes";  
    }

    if ($_SESSION['autorizado']=="renovar") {
      echo "1r";
    } else{
       echo "1";
    }
   
    //1 = Acceso al sistema

    }


  } else {

    echo "0";
         //Usuario existe/Password erroneo
  }


 ?>