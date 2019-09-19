<!--ASPECTO VISUAL DE LA PAGINA DE Estantes-->
    <!--CONTENEDOR PARA TABLA DE Estantes/MODALES PARA AGREGAR Y ELIMINAR Estantes--> 

    <?php
       if ($_SESSION['usuNivelNombre']=='Administrador') {
        # code...
           $bloqueo="disabled";
       }else{
        $bloqueo="";
       }   
     ?>

<br>
<!--INICIO CONTENEDOR DE CATALOGO DE Estantes-->    
<div class="container-fluid" > 
    <div class="col-sm-12">  
      <div class="card">   
        <div class="card-header">
          <div class="row mx-auto">
            <div style="vertical-align: middle;">
               <h4 class="card-title"> <a class="navbar-brand">
             
           <p class="font-weight-light"> </a>Catalogo de Estantes</h4> Administrar informacion de Estantes.</p>
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
                      <form name="formBusqueda" id="formBusqueda">          
                        <div class="input-group">               
                          <input type="text" class="form-control" placeholder="Realizar busqueda" id="textBusqueda" name="textBusqueda"> 
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-info" type="button" onclick="recargarTabla()"> Buscar </button>
                          </div> 
                        </div>
                        <small id="dateHelp" class="form-text text-muted">Herramienta de busqueda automatica.</small>
                      </form>                       
                    </div>
                    <div class="col-sm-3">
                      <div name="cargandoFeedback" id="cargandoFeedback" align="left"> </div>
                    </div>  
                    <div class="col-sm-2">
                      <div name="accionFeedback" id="accionFeedback"> </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="btn-group float-right" role="group" aria-label="Opciones"> 
                        <button class="btn btn-light float-right" type="button" onclick="recargarTablaLimpiar();" data-toggle="tooltip" data-placement="top" title="Recargar Tabla">
                          <img src="img/icons/BookstandReload.png" width="45" height="45">
                        </button>

                        <button type="button" class="btn btn-light float-right" <?php echo $bloqueo ?>  data-toggle="modal" data-target="#newEstanteModal"  >
                          <img data-toggle="tooltip" data-placement="top"  title="Nuevo Estante" src="img/icons/Bookstand+.png" width="45" height="45">
                        </button>
                        
                      </div>
                    </div>
                    </div>
                  
                    <div align="center" name="cargarTabla" id="cargarTabla"> </div>            
                </div>
              </div>
            </div>
          </div>  
        </div>
         <!--Fin delcuerpo del panel-->
      </div>
       <!--Fin Panel/card para el catalogo de libros-->
    </div>
</div>

<!--INICIAN MODALS PARA INSERTAR, MODIFICAR, ELIMINAR Estantes-->


<!--MODAL PARA INSERTAR NUEVO Estante-->
<div class="modal fade" id="newEstanteModal" tabindex="-1" role="dialog" aria-labelledby="newEstanteModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newEstanteModal"><img src="img/icons/Bookstand+.png" width="30" height="30"> Nuevo Estante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formNuevoEstante" name="formNuevoEstante">
          <div class="row">
           
            <div class="col-sm-10">

              <div class="form-group">
                <label for="TituloLabel">Nombre del Estante</label>
                <input type="text" class="form-control" name="formEstantenom" onkeyup="insertarModal(this,this.value);" id="formEstantenom" aria-describedby="formEstantenom" placeholder="">
              </div>
             
            </div>          
           </div>        
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaNuevoEstante" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="insertarEstante()">Insertar</button>
      </div>
     
    </div>
  </div>
</div>

<!--MODAL PARA MODIFICAR  Estante-->

<div class="modal fade" id="modalEditarEstante" tabindex="-1" role="dialog" aria-labelledby="modalEditarEstante" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newEstanteModal"><img src="img/icons/Bookstand.png" width="30" height="30">Editar Estante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formEditEstante" name="formEditEstante">
          <div class="row">
           
            <div class="col-sm-10">

              <div class="form-group">
                <label for="TituloLabel">Nombre</label>
                 <input type="text" class="form-control"  onkeyup="editarModal(this,this.value);" name="editestantecod" id="editestantecod" aria-describedby="editestantecod" placeholder="" hidden>
                <input type="text" class="form-control" name="editestantenom" id="editestantenom" aria-describedby="editestantenom" placeholder="">
              </div>
             
            </div>
         
           </div>          
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaEditarEstante" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btneditar" class="btn btn-primary" onclick="editarEstante()">Editar</button>
      </div>
     
    </div>
  </div>
</div>




<!--MODAL PARA ELIMINAR Estante-->

<div class="modal fade" id="modalBorrarEstante" tabindex="-1" role="dialog" aria-labelledby="modalBorrarEstante" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deleteEstanteTitle"><img src="img/icons/BookEditWideDel.png" width="35" height="30"> Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="deleteForm" name="deleteForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Eliminar Estante es una accion <b> Permanente </b> desea eliminar Estante:</label></div>                
                <input type="text" class="form-control" name="delestantecod" id="delestantecod" aria-describedby="delestantecod" placeholder="Estante" hidden="true">
                <input type="text" class="form-control" name="delestantenom" id="delestantenom" aria-describedby="delestantenom" placeholder="Estante" hidden="true">
                           
                  <div id="labelBorrar" style="color: red; font-weight: bold; text-align: center;"></div>
                  <div align="center" name="cargarTablaRequisito" id="cargarTablaRequisito"></div>
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
        <div id="respuestaBorrarEstante" style="color: red; font-weight: bold; text-align: center;"></div>         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-danger" onclick="deleteEstante()">Eliminar</button>
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
//ON ENTER INSERTAR/EDITAR ESTANTE
function insertarModal(elemento,content)
    {
    document.addEventListener('keyup', function(event) {
    if (event.keyCode == 13)
        {
        if(keyTimer){
            clearTimeout(keyTimer);
        }
        keyTimer = setTimeout(function () {
            insertarEstante(); 
        }, 500); 
        }

    });
}
function editarModal(elemento,content)
    {
    document.addEventListener('keyup', function(event) {
    if (event.keyCode == 13)
        {
        if(keyTimer){
            clearTimeout(keyTimer);
        }
        keyTimer = setTimeout(function () {
            editarEstante(); 
        }, 500);
        }

    });
}


//Funcion para recargar tabla
function recargarTabla(){
   //Mostrar gif de cargando a la par de la barra de busqueda
  $("#cargandoFeedback").show();
  $("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

  var busqueda=$("#textBusqueda").val();
  busqueda=busqueda.trim().replace(/ /g, '%20');
  $("#cargarTabla").load("pages/estantes/tablaEstantes.php?pagina=1&busqueda="+ busqueda);

  setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);
}


function recargarTablaLimpiar(){
    document.getElementById("formBusqueda").reset();
    $("#cargandoFeedback").show();
      $("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

    var busqueda=$("#textBusqueda").val();

  
    $("#cargarTabla").load("pages/estantes/tablaEstantes.php?pagina=1&busqueda="+busqueda);

    setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);



    

  
}




//INSERTAR NUEVO Estante
function insertarEstante(){

  if ($("#formEstantenom").val()==""){
    $("#respuestaNuevoEstante").show();
    $("#respuestaNuevoEstante").html("Campo de Nombre del Estante esta Vacio");  
  }else {
    $("#respuestaNuevoEstante").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/estantes/insertarEstante.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formNuevoEstante").serialize(),
              success: function (data){
                if (data==1) {
                    //success
                    $("#accionFeedback").show();
                    $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Nuevo Estante agregado </div>");
                     recargarTabla();
                     limpiarFormularioEstante();
                    setTimeout(
                        function() {
                          
                          $("#accionFeedback").hide(500);          
                    }, 6000);
                    $("#respuestaNuevoEstante").hide(500);
                    $('#newEstanteModal').modal('hide');

                } else if (data==0) {
                  //error
                  $("#respuestaNuevoEstante").show();
                  $("#respuestaNuevoEstante").html("<div class='alert alert-warning' role='alert'>Esta Estante ya ha sido agregado </div>");
                     recargarTabla();
                    setTimeout(
                        function() {
                          $("#respuestaNuevoEstante").hide(500);                                
                    }, 6000);
                    

                } else{
                  $("#respuestaNuevoEstante").show();
                  $("#respuestaNuevoEstante").html(data);
                     recargarTabla();

                    setTimeout(
                        function() {
                          $("#respuestaNuevoEstante").hide(500);                                
                    }, 6000);
                }

              }
            });

  }
}
//EDITAR Estante
function editarEstante(){

  if ($("#editestantenom").val()==""){
    $("#respuestaEditarEstante").show();
    $("#respuestaEditarEstante").html("Campo de Indicador del Estante esta Vacio");
  }
  else {
    $("#respuestaEditarEstante").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/estantes/editarEstante.php";
    $("#btneditar").attr("disabled", true);
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formEditEstante").serialize(),
              success: function (data){               
                if (data==1) {
                  //success
                  $("#accionFeedback").show();
                  $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Estante ha sido editado </div>");
                  recargarTabla();
                  setTimeout(
                      function() {
                        $("#accionFeedback").hide(500);
                        
                  }, 6000);
                  $("#respuestaEditarEstante").hide(500);    
                  $("#modalEditarEstante").modal('hide');
                  $("#btneditar").attr("disabled", false);

                } else if (data==0) {
                  //error
                  $("#respuestaEditarEstante").show();
                  $("#respuestaEditarEstante").html("<div class='alert alert-warning' role='alert'>Otro Estante ya esta registrado con estos datos </div>");    
                  setTimeout(
                      function() {
                        $("#respuestaEditarEstante").hide(500);
                        
                       
                  }, 6000);
                  
                } else {
                  //any other error
                  $("#respuestaEditarEstante").show();
                  $("#respuestaEditarEstante").html(data);                  
                  setTimeout(
                      function() {
                        $("#respuestaEditarEstante").hide(500);
                        
                       
                  }, 6000);
                }
                  


              }
            });

  }
}
//BORRAR FORMULARIO DE NUEVO Estante
function limpiarFormularioEstante(){
   document.getElementById("formNuevoEstante").reset();

}

//BORRAR Estante
function deleteEstante(){
  $("#borrarButton").attr("disabled", true);

  if ($("#delestantecod").val()==""){
    $("#respuestaBorrarEstante").show();
    $("#respuestaBorrarEstante").html("Codigo de Estante necesario");
  }else {
    $("#labelBorrar").html('<img src="img/structures/replace.gif" style="max-width: 80%">').show(500);
    var url = "pages/estantes/borrarEstante.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#deleteForm").serialize(),
      success: function (data){
        recargarTabla()
        if (data=="0"){
          // ERROR, Estante TIENE LIBROS INSCRITOS
          var url = "pages/estantes/requisitosBorrarEstante.php";
           $.ajax({
              type: "POST",
              url: url,
              data: $("#deleteForm").serialize(),
              success: function (data){
                  $("#labelBorrar").show();
                  $("#notificationLabel").html("");
                  $("#labelBorrar").html("No se puede borrar el Estante. contiene ejemplares ubicados en el:");
                  $("#cargarTablaRequisito").show();
                  $("#cargarTablaRequisito").html(data);                           
              }
            });
        }else if (data=="1"){  

          $("#labelBorrar").show();
          $("#notificationLabel").html("<label for='TituloLabel'>Operacion finalizada</label>");
          $("#labelBorrar").html("<h5>Estante ha sido eliminado</h5>");

          $("#modalBorrarEstante").modal('hide');
           //success
          $("#accionFeedback").show();
          $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Estante Eliminado </div>");
           setTimeout(
              function() {
                 $("#accionFeedback").hide(500);                         
           }, 6000);
         
        }            
      }
    });
  }
}

 $('#modalEditarEstante').on('show.bs.modal', function (event) {var button = $(event.relatedTarget) // Button that triggered the modal
      var varestantecod = button.data('varestantecod')
      var varestantenom = button.data('varestantenom')
        
      var modal = $(this)
      modal.find('.modal-title').text('Editar Estante: ' + varestantenom );
     
      document.getElementById('editestantecod').value = varestantecod;
      document.getElementById('editestantenom').value = varestantenom;
      
      
      
    })

//Eliminar Estante
  
     $('#modalBorrarEstante').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varestantecod = button.data('varestantecod')
      var varestantenom = button.data('varestantenom')     

      $('#borrarButton').attr("disabled", false);  


      var modal = $(this)

       $("#notificationLabel").html('Esta es una accion <h5> Permanente. </h5> Desea Eliminar registro?:');
       $("#cargarTablaRequisito").html('');


      $("#labelBorrar").html('<h5> '+varestantenom+' '+'<h5> ');
      document.getElementById('delestantecod').value = varestantecod;
      document.getElementById('delestantenom').value = varestantenom;
      
      
      
    })

</script>
