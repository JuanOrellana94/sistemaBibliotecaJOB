<!--ASPECTO VISUAL DE LA PAGINA DE Estantes-->
    <!--CONTENEDOR PARA TABLA DE Estantes/MODALES PARA AGREGAR Y ELIMINAR Estantes--> 

<?php
/*
TODO: zip del archivo backup, subir el zip a un google drive administrado por el equipo de tesis, evaluar la conveniencia de una funcion de restore.
*/
//  include("top.php");
  include("src/libs/vars.php");

  date_default_timezone_set("America/El_Salvador");
  if(!isset($_SESSION)){
      session_start();    
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $archivo = 'bkbiblioteca_' . date("d-m-Y_H:i:s") . '.sql';      
    $comando = "mysqldump --add-drop-table --host=$servidor --user=$usuario --password=$clave $base > $archivo";
    echo exec("$comando");    
    try{
        fwrite($archivo_manejador, $comando);
        fclose($archivo_manejador);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($archivo));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($archivo));
        ob_clean();
        flush();
        readfile($archivo);
        unlink($archivo);      
        //header('Location: utilrespaldo.php');
        exit();
        
      }catch(\Exception $e){
        echo 'error en el proceso de bk' . $e->getMessage(); //TODO: favor incluir en la bitacora global del sistema
      }//fin de catch

  }     
?>
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

  include("src/libs/sessionControl/conection.php");


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
       
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <div class="row ">
            <div class="col-lg-2 col-md-2 col-sm-4"  style="max-width: 100px">
               <a class="navbar-brand" href="escritorio.php">
                  <img src="img/icons/LogoSimple.png" width="90" height="90">
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4"  style="max-width: 100px">
              <li class="nav-item dropdown" data-toggle="tooltip" data-placement="left" title="Catalogos" style="max-width: 100px">
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
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4" style="max-width: 100px">
              <li class="nav-item dropdown"  data-toggle="tooltip" data-placement="left" title="Operaciones" style="max-width: 100px">
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
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4" style="max-width: 100px">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tooltip" data-placement="left" title="Estadistica" style="max-width: 100px" href="acciones.php?pageLocation=indicadores">
                  <img src="img/icons/Est.png" width="65" height="65" alt="">
                </a>
            </li>
          
        
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4" style="max-width: 100px">
              <li class="nav-item dropdown" data-toggle="tooltip" data-placement="left"  title="Herramientas" style="max-width: 100px">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="img/icons/utils.png" width="65" height="65" alt="">
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="utilrespaldo.php">Respaldo de datos</a>
                <a class="dropdown-item" href="acciones.php?pageLocation=restaurar">Restaurar datos</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="acciones.php?pageLocation=codbarras">Codigo de Barras Estudiantes</a>
                <a class="dropdown-item" href="acciones.php?pageLocation=cbejemplar">Codigo de Barras Ejemplares</a> 
                <div class="dropdown-divider"></div>        
                <a class="dropdown-item disabled" href="#">Herramientas</a>         

              </div>
              </li>
            </div>
          </div>

          
          
          
          



        </ul>
    </div> 

    <div class="d-flex flex-row-reverse">
            <div class="col-lg-2 col-md-2 col-sm-4">
             
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
             
            </div>
     
      <div class="dropdown">
        <button class="btn btn-outline-light btn-sm dropdown-toggle rounded-0" type="button" style="max-width: 205px; margin-right: 120px;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img style="max-width: 35px;" src="img/icons/User.png" alt="">  <?php echo " ".$_SESSION["usuPriNombre"]?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item disabled text-muted"><?php echo $_SESSION["usuNivelNombre"]?></a>
          <a class="dropdown-item disabled text-muted"><?php echo $_SESSION["nombreComp"]?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item font-weight-bold" style="cursor: pointer;" onclick="cerrar()">Cerrar sesión</a>
        </div>
      </div>
      <button class="btn btn-outline-light rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Volver al menu principal" onclick="rediMenuOPT();">
         <img style="max-width: 35px;" src="img/icons/menuRegresar.png">
      </button>
    </div>
</nav>


<!--DIRECCION DE LA UBICACION ACTUAL-->     
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="escritorio.php">Escritorio</a></li>
      <li class="breadcrumb-item">Utilerias</li>   
      <!--CAMBIAR SIGUIENTE POR NOMBRE DE CADA CATEGORIA-->     
      <li class="breadcrumb-item" active  >Respaldo de Datos</li>
    </ol>
  </nav>        

<!--INICIO CONTENEDOR DE CATALOGO DE Estantes-->    
<div class="container-fluid" > 
    <div class="col-sm-12">  
      <div class="card">   
        <div class="card-header">
          <div class="row mx-auto">
            <div style="vertical-align: middle; margin: 5px">
               <p class="font-weight-light"> <h3>  Respaldo de Datos</h3>  Operaciones de respaldo y recuperacion de datos: <br>
                Para realizar una copia de la ultima version de la base de datos del sistema presione el boton <b>Respaldo de Datos</b></p>       
            </div>           
          </div>     
        </div>
        <!--Cuerpo del panel--> 
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="card-body">              
          <div class="row">            
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-5">
                      <form name="formBusqueda" id="formBusqueda">          
                        <div class="input-group">               
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-info" type="submit"> Respaldo de Datos </button>
                          </div> 
                        </div>
                      </form>                       
                    </div>
                </div>
              </div>
            </div>
          </div>  
        </div>
         <!--Fin delcuerpo del panel-->
       </form>
      </div>
       <!--Fin Panel/card para el catalogo de libros-->
    </div>
</div>
</form>
</html>
