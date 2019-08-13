<!--ASPECTO VISUAL DE LA PAGINA DE Estantes-->
    <!--CONTENEDOR PARA TABLA DE Estantes/MODALES PARA AGREGAR Y ELIMINAR Estantes--> 

<?php
  include("src/libs/vars.php");
  date_default_timezone_set("America/El_Salvador");
  if(!isset($_SESSION)){
      session_start();    
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
          
          <a class="dropdown-item disabled" href="#">Prestar</a>
          <a class="dropdown-item disabled" href="#">Devoluciones</a>
          <a class="dropdown-item disabled" href="#">Historial</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item disabled" href="#">Operaciones</a>
        </div>
      </li>
      <li class="nav-item dropdown" data-toggle="tooltip" data-placement="right" title="Estadistica">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <img src="img/icons/Est.png" width="65" height="65" alt="">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
          <a class="dropdown-item disabled" href="#">Indicadores</a>
          <a class="dropdown-item disabled" href="#">Reportes</a>
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
          <a class="dropdown-item" href="cbestudiante.php">Codigo de Barras Estudiantes</a>
          <a class="dropdown-item" href="cbejemplar.php">Codigo de Barras Ejemplares</a>
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
      <li class="breadcrumb-item">Utilerias</li>   
      <!--CAMBIAR SIGUIENTE POR NOMBRE DE CADA CATEGORIA-->     
      <li class="breadcrumb-item" active  >Respaldo de Datos</li>
    </ol>
  </nav>        

<!--INICIO CONTENEDOR DE CATALOGO DE  CODIGO DE BARRA LIBROS-->    
<div class="container-fluid" > 
    <div class="col-sm-12">  
      <div class="card">   
        <div class="card-header">
          <div class="row mx-auto">
            <div style="vertical-align: middle; margin: 5px">
               <p class="font-weight-light"> <h3>  Codigo de barra</h3>  Seleccione un libro: <br>
                Para mostrar el pdf de todos los ejemplares de un libro , seleecione por titulo del libro y realice click en  <b>Mostrar PDF</b></p>       
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
                    <div class="col-sm-5">                     
                        <div class="input-group">               
                          <table>
                            <tr>
                            <div id="formcod" name="formcod"  > 
                            <?php 
                                     $selTable=mysqli_query($conexion,"SELECT * from $tablaLibros");                            
                             ?>
                             <td>
                              <select class="form-control js-Dropdown-Busqueda" name='codlib' id='codlib'>
                                <option value="">Seleccione un libro</option>
                               <?php  while ($dataLibros=mysqli_fetch_assoc($selTable)){  ?>                              
                               <option value="<?php echo $dataLibros['libcod'];  ?>"><?php echo $dataLibros['libtit'];  ?></option>
                               <?php } ?>                                                    
                               </select> </td><td>                            
                               <button type="submit" class="btn btn-primary" onclick="generarpdf();"  >Mostrar PDF</button></td>                                
                             </div> 
                             <td><div id="respuesta" style="color: red; font-weight: bold; text-align: center;"></div></td>
                           </tr>
                           </table>                    
                          </div> 
                        </div>                                      
                    </div>
                </div>
              </div>
            </div>
          </div>  
        </div>
         <!--Fin delcuerpo del panel-->
    <div align="center" name="cargarTablaRequisito" id="cargarTablaRequisito"></div>
      </div>
       <!--Fin Panel/card para el catalogo de libros-->
    </div>
</div>
</html>
<script type="text/javascript">

    $('.js-Dropdown-Busqueda').select2({
        "selected": true
     });
     window.onload = function () {    

    
       setSelect2();

      
  };

  function setSelect2(){

  $('.js-Dropdown-Busqueda').select2();
    $('.js-Dropdown-Busqueda').select2({
    theme: 'bootstrap4',

            })

        }

  function generarpdf(){

  if ($("#codlib").val()==""){
    $("#respuesta").show();
    $("#respuesta").html("&nbsp;&nbsp;Seleccione un titulo de libro"); 
      }else{
       var codlib = document.getElementById('codlib').value;
          var url = 'cbarraxloteejempdf.php?codlib='+codlib;
          $(location).attr('href',url);         
         
         
          }

      }  
                   
    



</script>;
