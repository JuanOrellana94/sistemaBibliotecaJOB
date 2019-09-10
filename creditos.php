<!--ASPECTO VISUAL DE LA PAGINA DE AUTORES-->
<?php include("src/libs/vars.php"); ?>

<!--CONTENEDOR PARA TABLA DE AUTORES/MODALES PARA AGREGAR Y ELIMINAR AUTORES--> 
<!DOCTYPE html>
  <html lang="en">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <TITLE>SISTEMA DE BIBLIOTECA, <?php echo $sistemaVersion; ?>, 2019</TITLE>
    <!-- Bootstrap -->
    <script src="src/js/jquery-3.4.0.min.js"></script>
    <script src="src/js/bootstrap.bundle.min.js"></script>
    <script src="src/js/jsSession.js"></script>
    <script src="src/js/jsRedirects.js"></script>
   
    <!-- Bootstrap -->
    <link rel="stylesheet" href="src/css/bootstrap.css">  
    <!--<link rel="stylesheet" href="src/css/imgbutton.css"> -->
     <!-- credit here -->
    <link rel="stylesheet" href="src/css/datepickerPureCSS.css">
    <script src="src/js/insertProcess/jsLibros.js"></script>
    <link href="src/css/select2.min.css" rel="stylesheet"/>
    <link href="src/css/select2-bootstrap4.css" rel="stylesheet"/>
    <script src="src/js/select2.min.js"></script>
    <link  href="src/css/jquery.tagsinput.css" rel="stylesheet"/>
    <script src="src/js/jquery.tagsinput.js"></script>
     <link  href="src/css/Chart.min.css" rel="stylesheet"/>
    <script src="src/js/Chart.bundle.js"></script>

    <script src="src/js/sweetalert2.all.min.js"></script>
    

  </head>

  <?php 
  include("src/libs/vars.php");
  include("src/libs/sessionControl/conection.php");

  session_start();

   ?>  
   <br>
<body style="background-color:#bfbfbf;">

<!--DIRECCION DE LA UBICACION ACTUAL-->
<div class="container">
<div class="card text-white" style="width:100%; border-color:#003764">
  <div class="card-body"  style="background-color:#003764;">
    <div class="row mx-auto">
      <div class="col-lg-6">
        <img src="img/icons/LogoSys.png" class="img-fluid" alt="Responsive image">
      </div>
       <div class="col-lg-6">
        <img src="img/icons/logo1Cred.png" class="img-fluid" alt="Responsive image">  
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
      <h1 class="card-title text-center">Sistema Bibliotecario <?php echo  $sistemaVersion; ?></h1>   
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
      <h2 class="card-title text-center">Sistema desarollado por:</h2>   
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
   
        <p class="card-text text-right">Brandon Ismar Melara</p>
        <p class="card-text text-right">Yohalmo Adonay Rodriguez</p>
        <p class="card-text text-right">Juan Diego Medrano Orellana</p>
      </div>
      <div class="col-lg-6">
             <img src="img/icons/credTorc.png" class="img-fluid mx-auto" style="max-width: 18%" alt="Responsive image">   
      </div>
    </div>
      <br>
    <br>
    <div class="row">
      <div class="col-lg-12">
      <h2 class="card-title text-center">Agradecimientos especiales a:</h2>   
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <p class="card-text text-right">Lic. Ernesto Anibal</p>
        <p class="card-text text-right">Hno. César Gonzáles</p>
       
        <p class="card-text text-right">Lic. Hilda Gomez</p>
          <p class="card-text text-right">Lic. Verónica Herrera</p> 
      </div>
      <div class="col-lg-6">
         <p class="card-text text-left">Vilma Yaneth Alfaro</p>
        <p class="card-text text-left">ING. Herbert Fernández Tamayo</p>
        <p class="card-text text-left">Ing. Juan Carlos</p>

    
      </div>
    </div>
  <br><br>
  <div class="row">
    <div class="col-lg-12" >
      <img  src="img/icons/menuRegresar2.png" class="rounded mx-auto d-block" onclick="rediMenuOPT();" style="max-width: 18%; cursor: pointer;" alt="Responsive image" data-toggle="tooltip" data-placement="right"  title="Regresar">   
    </div>
  </div>
  <br><br>

  </div>
</div>
</div>
</body>

<script>

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>