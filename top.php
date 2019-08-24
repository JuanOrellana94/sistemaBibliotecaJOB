<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <TITLE>SISTEMA DE BIBLIOTECA, VERSION PROTOTIPO 1.0, 2019</TITLE>
    <!-- Bootstrap -->
    <script src="src/js/jquery-3.4.0.min.js"></script>
    <script src="src/js/bootstrap.bundle.min.js"></script>
    <script src="src/js/jsSession.js"></script>
    <script src="src/js/jsRedirects.js"></script>
   
    <!-- Bootstrap -->
    <link rel="stylesheet" href="src/css/bootstrap.css">  
    <!--<link rel="stylesheet" href="src/css/imgbutton.css"> -->
     <!-- credit here -->
    <link rel="stylesheet" href="src/css/datePickerPureCSS.css">
    <script src="src/js/insertProcess/jsLibros.js"></script>

    <link href="src/css/select2.min.css" rel="stylesheet"/>
    <link href="src/css/select2-bootstrap4.css" rel="stylesheet"/>
    <script src="src/js/select2.min.js"></script>
    <link  href="src/css/jquery.tagsinput.css" rel="stylesheet"/>
    <script src="src/js/jquery.tagsinput.js"></script>
     <link  href="src/css/Chart.min.css" rel="stylesheet"/>
    <script src="src/js/Chart.bundle.js"></script>
    

  </head>
<?php 
  include("src/libs/vars.php");
  include("src/libs/sessionControl/conection.php");

  session_start();

   if (!isset($_SESSION[ "autorizado" ]))
   {
      header("location: inicio.php?login=Required");
   } else if ($_SESSION["autorizado"]=="renovar") {
      header("location: pages/ConfirmarClave.php");
   }else if ($_SESSION["usuNivelNombre"]=="Personal" || $_SESSION["usuNivelNombre"]=="Estudiante" ) {
     echo ("<script LANGUAGE='JavaScript'>   window.alert('Su nivel de cuenta solo permite ingresar a consultas: verifique sus credenciales');
    window.location.href='menuopt.php';  </script>");      
   }

   ?>     


<body>
 
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#003764;">
   
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01"> 
        <a class="navbar-brand" href="escritorio.php">
          <img src="img/icons/LogoSimple.png" width="90" height="90">
        </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item dropdown" data-toggle="tooltip" data-placement="left" title="Catalogos">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <img src="img/icons/book.png" width="65" height="65" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="catalogos.php?pageLocation=libros">Libros</a>
              <a class="dropdown-item" href="catalogos.php?pageLocation=autores">Autores</a>
              <a class="dropdown-item" href="catalogos.php?pageLocation=editoriales">Editoriales</a>
              <a class="dropdown-item" href="catalogos.php?pageLocation=estantes">Estantes</a>
              <a class="dropdown-item" href="catalogos.php?pageLocation=usuarios">Usuarios</a>
              <a class="dropdown-item" href="catalogos.php?pageLocation=categorias">Categorias</a>
              <a class="dropdown-item" href="catalogos.php?pageLocation=equipo">Equipo</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item disabled" href="#">Catalogos</a>
            </div>
          </li>
          <li class="nav-item dropdown"  data-toggle="tooltip" data-placement="left" title="Operaciones">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <img src="img/icons/Ops.png" width="65" height="65" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              
            <a class="dropdown-item " href="acciones.php?pageLocation=historial">Historial</a>  
            <a class="dropdown-item " href="acciones.php?pageLocation=prestamos">Prestar</a>
            <a class="dropdown-item " href="acciones.php?pageLocation=devoluciones">Devoluciones</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item disabled" href="#">Operaciones</a>
            </div>
          </li>
          <li class="nav-item dropdown" data-toggle="tooltip" data-placement="left" title="Estadistica">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <img src="img/icons/Est.png" width="65" height="65" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              
              <a class="dropdown-item " href="acciones.php?pageLocation=indicadores">Indicadores</a>
              <a class="dropdown-item " href="#">Reportes</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item disabled" href="#">Estadistica</a>
            </div>
          </li>
          <li class="nav-item dropdown" data-toggle="tooltip" data-placement="left"  title="Herramientas">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <img src="img/icons/utils.png" width="65" height="65" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="utilrespaldo.php">Respaldo de datos</a>
              <a class="dropdown-item" href="acciones.php?pageLocation=restaurar">Restaurar datos</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="acciones.php?pageLocation=codbarras">Codigo de Barras Estudiantes</a>
              <a class="dropdown-item" href="acciones.php?pageLocation=cbejemplar">Codigo de Barras Ejemplares</a>          
              <a class="dropdown-item" href="#">Herramientas</a>
            </div>
          </li>
          



        </ul>
    </div> 

    <div class="d-flex flex-row-reverse">
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
      <div class="dropdown">
        <button class="btn btn-outline-light btn-sm dropdown-toggle rounded-0" type="button" style="max-width: 205px; margin-right: 120px;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img style="max-width: 35px;" src="img/icons/User.png" alt="">  <?php echo " ".$_SESSION["usuPriNombre"]?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item disabled text-muted"><?php echo $_SESSION["usuNivelNombre"]?></a>
          <a class="dropdown-item disabled text-muted"><?php echo $_SESSION["nombreComp"]?></a>

          <a class="dropdown-item font-weight-bold" onclick="cerrar()">Cerrar sesión</a>
        </div>
      </div>
      <button class="btn btn-outline-light rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Volver al menu principal" onclick="rediMenuOPT();">
         <img style="max-width: 35px;" src="img/icons/menuRegresar.png">
      </button>
    </div>

   




   
  </nav>



  
