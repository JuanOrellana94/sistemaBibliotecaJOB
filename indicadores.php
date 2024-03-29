<!--ASPECTO VISUAL DE LA PAGINA DE Estantes-->
    <!--CONTENEDOR PARA TABLA DE Estantes/MODALES PARA AGREGAR Y ELIMINAR Estantes--> 

<?php
  include("src/libs/vars.php");
  include("src/libs/sessionControl/conection.php");
  date_default_timezone_set("America/El_Salvador");
  if(!isset($_SESSION)){
      session_start();    
  }

  if (isset($_GET['consulta']) == true) {
    $xconsulta = $_GET['consulta'];
    switch ($xconsulta) {
      case '1':
        $sql = "SELECT count(libcod) As campo1 from libros"; 
        $linea = "Cantidad total de libros registrados: ";
        break;
      
      case '2':
        $sql = "SELECT count(ejemcod) As campo1 from ejemplareslibros"; 
        $linea = "Cantidad total de ejemplares registrados: ";        
        break;

      case '3':
        $sql = "SELECT count(ejemcod) As campo1  from ejemplareslibros WHERE ejemtipadq = 0"; 
        $linea = "Cantidad total de ejemplares donados: ";
        break;

      case '4':
        $sql = "SELECT count(ejemcod) As campo1  from ejemplareslibros WHERE ejemestu = 3"; 
        $linea = "Cantidad total de ejemplares extraviados: ";        
        break;

      case '5':
        $sql = "SELECT count(ejemcod) As campo1 from ejemplareslibros WHERE ejemconfis > 1"; 
        $linea = "Cantidad total de ejemplares en condicion de sustitucion: ";        
        break;

      case '6':
        $sql = "SELECT deweyclasificacion.dewtipcla As campo1, count(libros.libcod) As campo2 FROM libros INNER JOIN deweyclasificacion ON deweyclasificacion.dewcod = libros.dewcod"; 
        $linea = "Cantidad de libros por categorias: ";        
        break;

      case '7':
        $sql = "SELECT Count(usucod) As campo1 FROM usuario"; 
        $linea = "Cantidad total de cuentas de usuario registrados: ";        
        break;

      case '8':
        $sql = "SELECT Count(usucod) As campo1 FROM usuario WHERE usuestcue = 2"; 
        $linea = "Cantidad total de cuentas de usuario suspendidas: ";        
        break;                                        

      default:
        # code...
        break;
    }//fin de switch
   $resultado=mysqli_query($conexion, $sql) or die(mysqli_error($conexion));    
  } //fin de if    
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
    

  </head>
<?php 
  include("src/libs/vars.php");
  include("src/libs/sessionControl/conection.php");



   if (!isset($_SESSION[ "autorizado" ]))
   {
      header("location: inicio.php?login=Required");
   } else if ($_SESSION["autorizado"]=="renovar") {
      header("location: pages/ConfirmarClave.php");
   }

   ?>     


<body> 
 
<nav class="navbar navbar-expand-lg" style="background-color:#003764;"> <a class="navbar-brand text-white" href="escritorio.php" title="Inicio">  
  <img src="img/icons/LogoSimple.png" width="125" height="120"> </a>   
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <img src="img/icons/Collapse.png" width="65" height="65" alt="">
  </button>

  <div class="collapse navbar-collapse  text-white" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown" data-toggle="tooltip" data-placement="right" title="Catalogos">
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
      <li class="nav-item dropdown"  data-toggle="tooltip" data-placement="right" title="Operaciones">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <img src="img/icons/Ops.png" width="65" height="65" alt="">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
          <a class="dropdown-item" href="#">Prestar</a>
          <a class="dropdown-item" href="#">Devoluciones</a>
          <a class="dropdown-item" href="#">Historial</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item disabled" href="#">Operaciones</a>
        </div>
      </li>
      <li class="nav-item dropdown" data-toggle="tooltip" data-placement="right" title="Estadistica">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <img src="img/icons/Est.png" width="65" height="65" alt="">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
          <a class="dropdown-item" href="#">Indicadores</a>
          <a class="dropdown-item" href="#">Reportes</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item disabled" href="#">Estadistica</a>
        </div>
      </li>
      <li class="nav-item dropdown" data-toggle="tooltip" data-placement="right"  title="Herramientas">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <img src="img/icons/utils.png" width="65" height="65" alt="">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
          <a class="dropdown-item" href="utilrespaldo.php">Respaldo de datos</a>
          <a class="dropdown-item" href="utilerias.php?pageLocation=cbarras">Codigo de Barras</a>
          <a class="dropdown-item" href="utilerias.php?pageLocation=historial">Historial</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item disabled" href="#">Herramientas</a>
        </div>
      </li>
      <button class="btn  float-right" type="button" onclick="rediMenuOPT();" data-toggle="tooltip" data-placement="top" title="Volver al menu principal">
                <img src="img/icons/menuRegresar.png" width="65" height="65">
      </button>

    </ul> 

    <div class="navbar-nav flex-row ml-md-auto d-none d-md-flex text-white">
      
        <table>        
          <tr>
            <td align="right" width="130px"> <font color="white"> <?php echo $_SESSION["nombreComp"]?></font></td>
            <td></td>
            <td align="center" width="100px" ><img class="pequeña" src="img/icons/User.png" alt=""></td>
          </tr>
          <tr>
            <td align="right" width="130px">  <font color="white"><?php echo $_SESSION["usuNivelNombre"]?> </font></td>
            <td></td>
            <td width="100px" align="center"><button  type="button" class="btn btn-outline-light my-2 my-sm-0" id="cerrarSec"  onclick="cerrar()">Cerrar</button></td>
          </tr>       
       </table>      
    
  </div>
  </div>
</nav>

<!--DIRECCION DE LA UBICACION ACTUAL-->     
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="escritorio.php">Escritorio</a></li>
      <li class="breadcrumb-item">Estadistica</li>   
      <!--CAMBIAR SIGUIENTE POR NOMBRE DE CADA CATEGORIA-->     
      <li class="breadcrumb-item" active  >Indicadores</li>
    </ol>
  </nav>        

<!--INICIO CONTENEDOR DE CATALOGO DE Estantes-->    
<div class="container-fluid" > 
    <div class="col-sm-12">  
      <div class="card">   
        <div class="card-header">
          <div class="row mx-auto">
            <div style="vertical-align: middle; margin: 5px">
               <p class="font-weight-light"> <h3>  Cuadro de Indicadores Basicos</h3>  Seleccione alguna de los siguientes indicadores disponibles: </p>       
            </div>           
          </div>     
        </div>
        <!--Cuerpo del panel--> 
        <div class="card-body">              
          <div class="row">            
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-10">
                      <a href="indicadores.php?consulta=1">1. Total de libros registrados</a>&nbsp; | 
                      <a href="indicadores.php?consulta=2">2. Total de ejemplares registrados</a>&nbsp; |
                      <a href="indicadores.php?consulta=3">3. Total de ejemplares donados</a>&nbsp; |                                            
                      <a href="indicadores.php?consulta=4">4. Ejemplares extraviados</a>&nbsp; |<br>                  
                      <a href="indicadores.php?consulta=5">5. Ejemplares en condicion de sustitucion</a>&nbsp; | 
                      <a href="indicadores.php?consulta=6">6. Total de Libros por Categoria</a>&nbsp; | <br>
                      <a href="indicadores.php?consulta=7">7. Total de cuentas de usuario registradas</a>&nbsp; |                                            
                      <a href="indicadores.php?consulta=8">8. Cuentas de usuarios suspendidas</a>&nbsp; |                                            
                    </div>
                </div>

                  <div class="row">
                    <div class="col-sm-10">
                      <?php
                        
                          while($indicador = mysqli_fetch_assoc($resultado)) {          
                            if($xconsulta !=6){
                              echo $linea . "<b>" . $indicador['campo1'] . "</b>";
                            }
                            else{
                              echo $indicador['campo1'] . "&nbsp;<b>" . $indicador['campo2'] . "</b>"; 
                            }
                          }                          
                      ?>
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
