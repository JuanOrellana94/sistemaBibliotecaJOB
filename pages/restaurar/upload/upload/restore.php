<?php 
    session_start();
    include("../../../../src/libs/vars.php");
    include("../../../../src/libs/sessionControl/conection.php");
    $usuCodigo=$_SESSION['usuCodigo'];
    $bitPersonaName=$_SESSION['nombreComp'];
$borrarbase=mysqli_query($conexion,"DROP DATABASE sistemabiblioteca;") or die ('ERROR INS-INS:'.mysqli_error($conexion));
$crearnueva=mysqli_query($conexion,"CREATE DATABASE sistemabiblioteca;") or die ('ERROR INS-INS:'.mysqli_error($conexion)); 
// creando las tablas

 $filename = 'bdtablas.sql';
 import_tables('localhost','bibliocnx','Biblioteca123$','sistemabiblioteca',$filename);

function import_tables($host,$uname,$pass,$database, $filename,$tables = '*'){
    $connection = mysqli_connect($host,$uname,$pass)
    or die("Database Connection Failed");
    $selectdb = mysqli_select_db($connection, $database) or die("base de datos sin seleccionar"); 

$templine = '';
$lines = file($filename); 

foreach ($lines as $line){
    
    if (substr($line, 0, 2) == '--' || $line == '' || substr($line, 0, 2) == '/*' )
        continue;
        
        $templine .= $line;     
        if (substr(trim($line), -1, 1) == ';')        {
            mysqli_query($connection, $templine);
            $templine = '';
        }
    }
        
  }

  //llenando las tablas

   $filename2 = 'bdrespaldo.sql';
 import_data('localhost','bibliocnx','Biblioteca123$','sistemabiblioteca',$filename2);

function import_data($host,$uname,$pass,$database, $filename2,$tables = '*'){
    $connection = mysqli_connect($host,$uname,$pass)
    or die("Database Connection Failed");
    $selectdb = mysqli_select_db($connection, $database) or die("base de datos sin seleccionar"); 

$templine = '';
$lines = file($filename2); 

foreach ($lines as $line){
    
    if (substr($line, 0, 2) == '--' || $line == '' || substr($line, 0, 2) == '/*' )
        continue;
        
        $templine .= $line;     
        if (substr(trim($line), -1, 1) == ';')        {
            mysqli_query($connection, $templine);
            $templine = '';
        }
    }
        
  }
  $servidor="localhost";
  $usuario="bibliocnx";
  $clave="Biblioteca123$";
  $base="sistemabiblioteca";
    $conexion=mysqli_connect("$servidor","$usuario","$clave")or die ("Error al conectar");
    mysqli_select_db($conexion,"$base");
  $insRegistro=mysqli_query($conexion,"
            INSERT INTO  $tablaBitacora(
              $varFecha,
              $varDesc,
              $varBitUsuCodigo,
              $varNomLibreria,
              $varNomPersona
              ) VALUES(
              NOW(),
              'Realizo una restauracion de los datos',
              '$usuCodigo',
              '---',
              '$bitPersonaName');")
            or die ('ERROR INS-INS:'.mysqli_error($conexion));
        array_map('unlink', glob("$filename2"));

        echo ("<script LANGUAGE='JavaScript'>   window.alert('Datos restaurados correctamente');
    window.location.href='../../../../acciones.php?pageLocation=restaurar';  </script>"); 
 ?>
 