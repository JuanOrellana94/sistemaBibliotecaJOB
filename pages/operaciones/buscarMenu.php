<!--ASPECTO VISUAL DE LA PAGINA DE AUTORES-->
    <!--CONTENEDOR PARA TABLA DE AUTORES/MODALES PARA AGREGAR Y ELIMINAR AUTORES--> 
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

    <link href="src/css/background.css" rel="stylesheet"/>

    <link href="src/css/select2.min.css" rel="stylesheet"/>
    <link href="src/css/select2-bootstrap4.css" rel="stylesheet"/>
    <script src="src/js/select2.min.js"></script>
    

  </head>

  <?php 
  include("src/libs/vars.php");
  include("src/libs/sessionControl/conection.php");

  session_start();

   ?>  
<body style="background-color:#003764;">
  
    <div class="row" style="margin-left: 1%; margin-right: 1%;">
      <div class="col-lg-10">
        <nav class="navbar navbar-expand-md" style="background-color:#003764;">
          <div >
            <img src="img/icons/LogoSys.png" width="100" height="100" alt="">
          </div>
          <div style="vertical-align: middle; margin: 5px; color:white">
               <p class="font-weight-light"> <h3> Consultas</h3></p>       
          </div>                       
        </nav>
      </div>
      <div class="col-lg-2">
        <?php
          if (!isset($_SESSION[ "autorizado" ])){
              ?>
              <div class="navbar flex-row-reverse text-white"  style="margin: 5px">
                <table>        
                  <tr>                  
                    <td align="center" width="100px" ><img class="pequeña" src="img/icons/User.png" alt=""></td>
                  </tr>
                  <tr>       
                    <td width="100px" align="center"><button  type="button" class="btn btn-outline-light my-2 my-sm-0" id="Iniciar"  onclick="rediLogin()">Acceder</button></td>
                  </tr>       
                </table>        
              </div>
             
              <?php
            } else  {
              ?>
              <div class="navbar flex-row-reverse  text-white"  style="margin: 5px">
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
              <?php
              
          }
        ?>
        
      </div>
    </div>
  

    <?php
     
     ?>
<!--DIRECCION DE LA UBICACION ACTUAL-->     
      

<!--INICIO CONTENEDOR DE CATALOGO DE AUTORES-->    
<div class="container-fluid" > 
    <div class="col-sm-12">  
      <div class="card">   
        <div class="card-header">

          <div class="row" style="margin-top: 10px">
         
            <div class="col-sm-5">
              <div class="row">
                <img src="img/icons/menuQueryLight.png" width="65" height="65" alt="" style="margin-right: 1%">
         


                <form name="formBusqueda" id="formBusqueda">          
                  <div class="input-group ">               
                    <input type="text" class="form-control form-control-lg" placeholder="Buscar libro" id="textBusqueda" name="textBusqueda"> 
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-info" type="button" onclick="recargarTabla()"> Buscar </button>
                    </div> 
                  </div>
                  <small id="dateHelp" class="form-text text-muted">Titulo del libro, autor, categoria, tematicas</small>
                </form>
              </div>                       
            </div>
            <div class="col-sm-3">
              <div name="cargandoFeedback" id="cargandoFeedback" align="left"> </div>
            </div>  
            <div class="col-sm-2">
              <div name="accionFeedback" id="accionFeedback"> </div>
            </div>
            <div class="col-sm-2">
              <div class="btn-group float-right" role="group" aria-label="Opciones"> 
                <button type="button" class="btn btn-light " data-toggle="modal" data-target="#prestamosModalSimple">
                          <img data-toggle="tooltip" data-placement="top" data-toggle="tooltip"  title="Bolsa de Libros" src="img/icons/itemPB.png" width="60" height="60">
                        </button>
                <button class="btn btn-light float-right" type="button" onclick="recargarTablaLimpiar();" data-toggle="tooltip" data-placement="top" title="Recargar Tabla">
                  <img src="img/icons/BookauthorReload.png" width="60" height="60">
                </button>
                <button class="btn btn-light float-right" type="button" onclick="rediMenuOPT();" data-toggle="tooltip" data-placement="top" title="Volver al menu principal">
                  <img src="img/icons/menuRegresar.png" width="60" height="60">
                </button>

               
                
              </div>
            </div>
          </div>
             
        </div>
        <!--Cuerpo del panel--> 
        <div class="card-body">              
          <div class="row">            
            <div class="col-md-12">
                    <div align="center" name="cargarTabla" id="cargarTabla"> </div>            
            </div>
          </div>  
        </div>
         <!--Fin delcuerpo del panel-->
      </div>
       <!--Fin Panel/card para el catalogo de libros-->
    </div>
</div>




<!--MODAL PARA Realizar prestamos-->
<div class="modal fade" id="prestamosModal" tabindex="-1" role="dialog" aria-labelledby="prestamosModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" >
      <div class="modal-header" style="background-color:#003764; color:white;" >
        <h5 class="modal-title" id="prestamosModal"><img src="img/icons/itemPr.png" width="30" height="30"> Prestar Libro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >

        <?php if (!isset($_SESSION[ "autorizado" ])){ ?>

              <div class="alert  alert-warning" role="alert">
                 <p class="text-center"> Inicia sesion para poder realizar tus prestamos </p>
              </div>

              <div class="navbar border justify-content-center text-white"  style="margin: 5px">
                <table>        
                  <tr>                  
                    <td align="center" width="100px" ><img class="pequeña" src="img/icons/User.png" alt=""></td>
                  </tr>
                  <tr>       
                    <td width="100px" align="center"><button  type="button" class="btn btn-outline-primary my-2 my-sm-0" id="Iniciar"  onclick="rediLogin()">Acceder</button></td>
                  </tr>       
                </table>        
              </div>
          
        <?php } else{ ?>

            

            <form id="formCarritoCompras" name="formCarritoCompras"> 

            <div class="row">
              <div class="col-sm-12">
                <table class="table  table-hover table-responsive"  style="background-color: #FFFFFF; width: 100%">
                  <tbody>
                    <tr>
                      <td><div id="imagenPrestar"></div> </td>
                      <td><label><small> <p class="text-muted"> Agregar a prestamo:  </p></small><h5><div id=notificationLabel style="color: black; font-weight: bold;"></div></h5></label></td>
                      <td> <label for="libcantidad"><p class="text-muted"><small> Numero de Ejemplares </small> </p></label> <select class="form-control" style="width:100%; height:33px;" type="text" name="libcantidad" id="libcantidad">
                        <?php
                        $i=1;
                        while ($i <= 30) {              
                        ?>
                        <option value="<?php echo $i;  ?>"><?php echo $i;  ?></option> 
                        <?php
                         $i= $i+1;
                         }

                        ?>
                      </select> <input type="text" class="form-control" name="varlibcod" id="varlibcod" aria-describedby="varlibcod" hidden="true"> <input type="text" class="form-control" name="varlibtit" id="varlibtit" aria-describedby="varlibtit" hidden="true"><br> 
                      <button  type="button" class="btn btn-outline-primary my-2 my-sm-0" id="Iniciar"  onclick="insertarItem()">Agregar
                      </button> </td>
                    </tr> 
                  </tbody>
                </table>                
            </div>   
              
            </div>
            <div class="row border">

              <div class="col-sm-12">
                <div id="respuestaPrestamo" style="color: red; font-weight: bold; text-align: center;"></div>
                 <label for=""><h4>Tu lista de prestamo: </h4></label>   <div id="tablaPrestar"></div>

              </div> 
                    
            </div>

            </form>



          <?php } ?>

       

      </div>
      <div class="modal-footer"  style="background-color:#003764;">
         

         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
         <button type="button" class="btn btn-success" onclick="insertarAutor()">Enviar Prestamo</button>
      </div>
     
    </div>
  </div>
</div>

<!--MODAL PARA VER prestamos  SOLO-->
<div class="modal fade" id="prestamosModalSimple" tabindex="-1" role="dialog" aria-labelledby="prestamosModalSimple" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" >
      <div class="modal-header" style="background-color:#003764; color:white;" >
        <h5 class="modal-title" id="prestamosModal"><img src="img/icons/itemPr.png" width="30" height="30"> Tu bolsa de prestamos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >

        <?php if (!isset($_SESSION[ "autorizado" ])){ ?>

              <div class="alert  alert-warning" role="alert">
                 <p class="text-center"> Inicia sesion para poder ver tu lista de Prestamos </p>
              </div>

              <div class="navbar border justify-content-center text-white"  style="margin: 5px">
                <table>        
                  <tr>                  
                    <td align="center" width="100px" ><img class="pequeña" src="img/icons/User.png" alt=""></td>
                  </tr>
                  <tr>       
                    <td width="100px" align="center"><button  type="button" class="btn btn-outline-primary my-2 my-sm-0" id="Iniciar"  onclick="rediLogin()">Acceder</button></td>
                  </tr>       
                </table>        
              </div>
          
        <?php } else{ ?>

            <form id="formCarritoCompras" name="formCarritoCompras"> 

            <div class="row border">

              <div class="col-sm-12">
                <div id="respuestaPrestamo" style="color: red; font-weight: bold; text-align: center;"></div>
                 <label for=""><h4>Tu lista de prestamo: </h4></label>   <div id="tablaPrestarSimple"></div>

              </div> 
                    
            </div>

            </form>



          <?php } ?>

       

      </div>
      <div class="modal-footer"  style="background-color:#003764;">
         
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
         <button type="button" class="btn btn-success" onclick="activarPrestamo()">Realizar Prestamo</button>
      </div>
     
    </div>
  </div>
</div>

<!--MODAL PARA borrar item-->
<div class="modal fade" id="borrarItemModal" tabindex="-1" role="dialog" aria-labelledby="borrarItemModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deleteEditorialTitle"><img src="img/icons/BookEditWideDel.png" width="35" height="30"> Remover</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="borrarItemForm" name="borrarItemForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Remover este libro de tu lista?</label></div>                
                <input type="text" class="form-control" name="delsolcodigo" id="delsolcodigo" aria-describedby="delsolcodigo" placeholder="" hidden="true">
                           
                  <div id="labelBorrar" style="color: black; font-weight: bold; text-align: center;"></div>
                  <div id="respuestaBorrarItem" style="color: red; font-weight: bold; text-align: center;"></div>
                  <div align="center" name="cargarTabla" id="cargarTablaBorrar"></div>
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
                
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-warning" onclick="borrarItem()">Remover</button>
      </div>
     
    </div>
  </div>
</div>













<!--Script para recargar tabla al abrir esta pagina el scrip esta incluido en <top.php> dir src/js/tables/loader.js-->
<script>
    window.onload = function () {     
        
      recargarTabla();

      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          recargarTabla();
          event.preventDefault();
          return false;
        
        }
      });
  };

//Funcion para recargar tabla

function recargarTabla(){
   //Mostrar gif de cargando a la par de la barra de busqueda
  $("#cargandoFeedback").show();
  $("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

  var busqueda=$("#textBusqueda").val();  
  $("#cargarTabla").load("pages/operaciones/tablaConsultas.php?pagina=1&busqueda="+ busqueda);

  setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);
}


function cargarPrestamos(){
   //Mostrar gif de cargando a la par de la barra de busqueda
  $("#tablaPrestar").show();
  $("#tablaPrestar").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);
  $("#tablaPrestar").load("pages/operaciones/tablaPrestamos.php");
  $("#tablaPrestarSimple").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);
  $("#tablaPrestarSimple").load("pages/operaciones/tablaPrestamos.php");
 
 
}
//insertar libro a la tabla de prestamos  carrito
function insertarItem(){

  if ($("#varlibcod").val()==""){
    $("#respuestaPrestamo").show();
    $("#respuestaPrestamo").html("Error Codigo de Libro");
  } else {
    $("#respuestaPrestamo").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/operaciones/insertarItem.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#formCarritoCompras").serialize(),
      success: function (data){
      if (data==0) {
        //error programado
        $("#respuestaPrestamo").show();
        $("#respuestaPrestamo").html("<div class='alert alert-warning' role='alert'> <img src='img/icons/warning.png' width='60' height='60'> Este libro ya se encuentra en tu listado de prestamo </div>");
        setTimeout(
              function() {
                $("#respuestaPrestamo").hide(500);     
              }, 6000);
      } else if (data==1) {

        $("#respuestaPrestamo").show();
        $("#respuestaPrestamo").html("<div class='alert alert-success' role='alert'> <img src='img/icons/wsuccess.png' width='60' height='60'>Añadido a tu lista de prestamo </div>");
         //reload funcion tabla prestar()
         cargarPrestamos();         
          setTimeout(
              function() {
                $("#respuestaPrestamo").hide(500);
                
               
          }, 6000);

      } else {
        $("#respuestaPrestamo").show();
        $("#respuestaPrestamo").html(data);
      }         
      }
    });
  }
}

function recargarTablaLimpiar(){
    document.getElementById("formBusqueda").reset();
    $("#cargandoFeedback").show();
      $("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

    var busqueda=$("#textBusqueda").val();

  
    $("#cargarTabla").load("pages/operaciones/tablaConsultas.php?pagina=1&busqueda="+busqueda);

    setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);
 
}


function borrarItem(){

  if ($("#delsolcod").val()==""){
    $("#respuestaBorrarItem").show();
    $("#respuestaBorrarItem").html("Codigo de Libro necesario");
  }else {
    $("#respuestaBorrarItem").html('<img src="img/structures/replace.gif" style="max-width: 60%">').show(500);
    var url = "pages/operaciones/borrarItem.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#borrarItemForm").serialize(),
      success: function (data){
          if (data==1) {
            //sucess
            $("#respuestaBorrarItem").show();
            $("#respuestaBorrarItem").html("<div class='alert alert-success' role='alert'> Item Borrado </div>");
            cargarPrestamos();
            setTimeout(
                function() {
                  $("#respuestaBorrarItem").hide(500);
                  $("#accionFeedback").hide(500);
                  
            }, 6000);
            $('#borrarItemModal').modal('hide');
          } else if (data==0) {
            $("#respuestaBorrarItem").show();
            $("#respuestaBorrarItem").html("<div class='alert alert-danger' role='alert'> Error </div>");
            cargarPrestamos();
            setTimeout(
                function() {
                  $("#respuestaBorrarItem").hide(500);
                  
                  
            }, 6000);

          } else{
            $("#respuestaBorrarItem").show();
            $("#respuestaBorrarItem").html(data);

          }     
          
      }
    });
  }
}




//TRIGGER SE ACTIVA AL MOSTRAR UN MODAL   EDITAR 

 $('#prestamosModal').on('show.bs.modal', function (event) {
      $("#respuestaPrestamo").hide();
      var button = $(event.relatedTarget) // Button that triggered the modal
      var varlibcod = button.data('varlibcod')
      var varlibtit = button.data('varlibtit')
      var varlibpor = button.data('varlibpor')
      var varlibaut = button.data('varlibaut')
      var modal = $(this)

      cargarPrestamos();

      $("#imagenPrestar").html('<img src="'+varlibpor+'" width="70" height="100">');
       document.getElementById('varlibcod').value = varlibcod;
      $("#notificationLabel").html(varlibtit+' <br> - <small>'+varlibaut+'</small>');

      //document.getElementById('varlibtit').value = varlibtit;
      //document.getElementById('editautnom').value = varlibtit;
 
    })

 $('#prestamosModalSimple').on('show.bs.modal', function (event) {
      $("#respuestaPrestamo").hide();
      var button = $(event.relatedTarget) // Button that triggered the modal
      var varlibcod = button.data('varlibcod')
      var modal = $(this)

      cargarPrestamos();
      //document.getElementById('varlibcod').value = varlibcod;
      //document.getElementById('varlibtit').value = varlibtit;
      //document.getElementById('editautnom').value = varlibtit;
 
    })
//TRIGGER SE ACTIVA AL MOSTRAR UN MODAL   ELIMINAR 
//Eliminar item de lista de prestamo
  
   $('#borrarItemModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varsolcod = button.data('varsolcod')
      $('#borrarButton').attr("disabled", false);  

      var modal = $(this)
      
      $("#respuestaBorrarItem").html(" ");

       $("#notificationLabel").html('Remover este libro de tu lista?');
       $("#cargarTablaRequisito").html('');

      document.getElementById('delsolcodigo').value = varsolcod;

      
      
    })

</script>
