<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../src/css/bootstrap.min.css">
  <link rel="stylesheet" href="../src/css/imgbutton.css">
  <link rel="stylesheet" href="../src/css/background.css">
 
  <script src="../src/js/bootstrap.min.js"></script>
  <script src="../src/js/jsSession.js"></script>
  <script src="../src/js/jquery-3.4.0.min.js"></script>

<TITLE>SISTEMA DE BIBLIOTECA, VERSION PROTOTIPO 1.0, 2019</TITLE>

<?php

  // if ($_SESSION["autorizado"]=='yes')
   //{
  //    header("location: escritorio.php");
  // }
?>
  </head>

<?php
  
  session_start();

   if (!isset($_SESSION["autorizado"]))
   {
      header("location: ../inicio.php?login=Required");
   } else if ($_SESSION["autorizado"]=="yes") {
      header("location: ../escritorio.php");
  }
?>
 

<body>
  <div class="row " style="height:100%">  
    <div class="col bg2">

      <div class="container vertical-center">

        <div class="col-sm">
          <div class="card center" style="width:400px;">                   
                <img class="card-img-top" src="../img/icons/Lblue.png" alt="Logo">          
            <div class="card-body text-center"> 
                <h2> Bienvenido <?php echo " ".$_SESSION['nombreComp'] ?> </h2>
                <h5> Antes de seguir a tu escritorio, indica una nueva contraseña </h5>
                    
                <form name="formRevisar" id="formRevisar" method="post" action="#">
                  <fieldset>
                    <div class="form-group">
                      <input class="form-control" placeholder="Contraseña" name="usuCodigo" hidden="true" id="usuCodigo" type="text" value=<?php echo " ".$_SESSION['usuCodigo'] ?> onkeypress="enter(event);">

                      <input class="form-control" placeholder="Contraseña" name="usuContrasena"  id="usuContrasena" autofocus="" type="password"
                        onkeypress="enter(event);" >
                      </div>
                      <div class="form-group">
                        <input class="form-control" placeholder="Confirmar Contraseña" name="usuContrasenadupe" id="usuContrasenadupe" type="password"
                         onkeypress="enter(event);">
                      </div>
                    </fieldset>
                </form>

               <div class="row">
                  <div class="col-sm-6">
                    <button type="button" class="btn btnAccess" onclick="checkRenew()" name="entryCheck">Actualizar</button> 
                  </div>
                   <div class="col-sm-6">
                    <button type="button" class="btn btnAccess" onclick="cerrarSession()" name="Salir">Volver</button>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-sm-12 ">   
                     <div id="infoCheck" style="color: #003764; font-weight: bold; text-align: center;"></div>
                    </div>
                </div>
            </div>

          </div>
        </div>

      
      </div>
      <div class=""></div>
    </div>  

  </div>
</body>

</html>
