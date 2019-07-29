<!--ASPECTO VISUAL DE LA PAGINA DE AUTORES-->
    <!--CONTENEDOR PARA MENU DE PRESTAMOS HACER PRESTAMOS--> 
    <?php

     ?>
<!--DIRECCION DE LA UBICACION ACTUAL-->     
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="escritorio.php">Escritorio</a></li>
      <li class="breadcrumb-item">Operaciones</li>   
      <!--CAMBIAR SIGUIENTE POR NOMBRE DE CADA CATEGORIA-->     
      <li class="breadcrumb-item" active  >Devoluciones</li>
    </ol>
  </nav>        

<!--INICIO CONTENEDOR DE PRESTAMOS-->
<body style="background-color:#d7dbec;">
<div class="container-fluid">
  
    <div class="row mb-4">
      <div class="col-lg-3"></div>
      <div class="col-sm-6 col-md-6 col-lg-5 " style="min-height: 100%; height:100%; ">
        <!--Area de Solicitudes pendientes-->
        <div class="card bg-light border-primary h-100">
          <div class="card-body"  >
            <h5 class="card-title"> <a class="navbar-brand" href="acciones.php?pageLocation=devoluciones">
             <img src="img/icons/Book.png" width="50" height="50" alt="">
            </a>  Devoluciones </h5>
             <div class="dropdown-divider"></div>
             <div class="row">

               <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
                 <br>
              
                   <div class='alert alert-warning' role='alert'> Insertar codigo del articulo a devolver  </div>
                  
                   
                 <input type="text" class="form-control text-center" placeholder="Codigo del Articulo" id="textDevolucionCode" name="textDevolucionCode"> 
                 <div id="devoMensajes"></div>

               </div>
               <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
                 <!-- -->
                 <div id="contentDevoluciones"></div>

               </div>
             </div>
             <div class="dropdown-divider"></div>


          </div>
        </div>
      </div>
       <div class="col-sm-6 col-md-6 col-lg-3 " >
        <!--Area de Solicitudes pendientes-->
       
      </div>
    </div>
  
</div>


<script>

  document.getElementById("textDevolucionCode").focus(); 

  var devoBuscar = document.getElementById("textDevolucionCode");

  devoBuscar.addEventListener("keydown", function (e) {
        if (e.keyCode === 13) {  //revisar si tecla presionada es Enter
        buscarDevoItem();
        }
      });


  function buscarDevoItem(){
     
    $("#devoMensajes").show();
    $("#devoMensajes").html(' <img src="img/structures/replace.gif" style="max-width: 60%;">').show(200);

    var textDevolucion=$("#textDevolucionCode").val();      

    $("#contentDevoluciones").load("pages/operaciones/infoDevolucion.php?busqueda="+textDevolucion);
    setTimeout( function() {
        $("#devoMensajes").hide(500);
     }, 1000);
  }
  
</script>
<!--Script para recargar tabla al abrir esta pagina el scrip esta incluido en <top.php> dir src/js/tables/loader.js-->