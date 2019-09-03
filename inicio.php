<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="src/css/bootstrap.min.css">
  <link rel="stylesheet" href="src/css/imgbutton.css">
  <link rel="stylesheet" href="src/css/background.css">
 
 
  <script src="src/js/jquery-3.4.0.min.js"></script>
  <script src="src/js/bootstrap.min.js"></script>
  <script src="src/js/jsSession.js"></script>
  <script src="src/js/jsRedirects.js"></script>


<TITLE>SISTEMA DE BIBLIOTECA, VERSION PROTOTIPO 1.0, 2019</TITLE>

<?php
  session_start();


  if (isset($_SESSION["autorizado"])){
  if($_SESSION["autorizado"]=="yes"){
     if ($_SESSION['usuNivel'] == 0 || $_SESSION['usuNivel'] == 1 || $_SESSION['usuNivel'] == 4) {
          header("location: escritorio.php");     
       } else if ($_SESSION['usuNivel'] == 2  || $_SESSION['usuNivel'] == 3) {
         header("location: acciones.php?pageLocation=busqueda"); 
       }
  
  }else{
    header("location: pages/ConfirmarClave.php");
  }
 }

 
  // }
?>
  </head>

<body  >
  <div class="row" style="height:100%">  
    <div class="col bg">

      <div class="container vertical-center">

        

        <div class="col-sm">
          <div class="card center" style="width:400px;">                   
                <img class="card-img-top" src="img/icons/logo1-s.png" alt="Logo">          
            <div class="card-body text-center"> 
                <h2> Iniciar Sesion </h2>

                <?php 

        if (isset($_GET["login"])){
            if ($_GET["login"]=="Required"){ 
              ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 Para continuar, ingresa tus credenciales de acceso
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php
            }
        }
        ?>
                    
                <form name="formRevisar" id="formRevisar" method="post" action="#">
                    <fieldset>
                      <div class="form-group">
                        <input class="form-control" placeholder="Usuario" name="usuAccNombre"  id="usuAccNombre" type="text" autofocus=""
                        onkeypress="enter(event);">
                      </div>
                      <div class="form-group">
                        <input class="form-control" placeholder="Contraseña" name="usuContrasena" id="usuContrasena" type="password"
                         onkeypress="enter(event);">
                      </div>
                    </fieldset>
                </form>

                <div class="row">
                  <div class="col-sm-6">
                        <button type="button" class="btn btnAccess" onclick="checkUser()" name="entryCheck">Ingresar</button>
                  </div>
                  <div class="col-sm-6">
                          <button type="button" class="btn btnAccess" onclick="goBack()" name="goBack">Volver</button>
                  </div>
                </div>

           
                <div id="infoCheck" style="color: #003764; font-weight: bold; text-align: center;"></div>
            </div>

          </div>
        </div>

      
      </div>
      <div class=""></div>
    </div>  

  </div>
</body> 
<script>

function goBack(){

  window.location = "menuopt.php";

}
</script>


</html>
