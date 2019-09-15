<!--ASPECTO VISUAL DE LA PAGINA DE AUTORES-->
    <!--CONTENEDOR PARA TABLA DE AUTORES/MODALES PARA AGREGAR Y ELIMINAR AUTORES--> 

    <?php
      if ($_SESSION['usuNivelNombre']=='Administrador') {
        # code...
           $bloqueo="disabled";
       }else{
        $bloqueo="";
       } 
     ?>
<!--DIRECCION DE LA UBICACION ACTUAL-->     
<!--INICIO CONTENEDOR DE CATALOGO DE AUTORES-->    
<div class="container-fluid" > 
  <br>
    <div class="col-sm-12">  
      <div class="card">   
        <div class="card-header">
          <div class="row mx-auto">
            <div style="vertical-align: middle; margin: 5px">
               <p class="font-weight-light"> <h3>  Catalogo de Autores</h3>  Administrar informacion de autores.</p>       
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
                      <form name="formBusqueda" id="formBusqueda">          
                        <div class="input-group">               
                          <input type="text" class="form-control" placeholder="Realizar busqueda" id="textBusqueda" name="textBusqueda"> 
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-info" type="button" onclick="recargarTabla()"> Buscar </button>
                          </div> 
                        </div>
                        <small id="dateHelp" class="form-text text-muted">Herramienta de busqueda automatica.</small>
                      </form> 
                      <small id="dateHelp" class="form-text text-muted">Ordenar la tabla</small><br>
                      <form name="formBusqueda" id="formBusqueda">          
                        <div class="input-group">               
                          <select class="form-control" id="textBusquedaordenar" onchange="recargarTabla()">
                            <option value="0">ULTIMOS REGISTROS</option>
                            <option value="1">PRIMEROS REGISTROS</option>
                          </select>                          
                        </div>                        
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
                          <img src="img/icons/BookauthorReload.png" width="45" height="45">
                        </button>

                        <button type="button" class="btn btn-light float-right" <?php echo $bloqueo ?> data-toggle="modal" data-target="#newAuthorModal"  >
                          <img data-toggle="tooltip" data-placement="top"  title="Nuevo Autor" src="img/icons/Bookauthor+png.png" width="45" height="45">
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

<!--INICIAN MODALS PARA INSERTAR, MODIFICAR, ELIMINAR AUTORES-->


<!--MODAL PARA INSERTAR NUEVO AUTOR-->
<div class="modal fade" id="newAuthorModal" tabindex="-1" role="dialog" aria-labelledby="newAuthorModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newAuthorModal"><img src="img/icons/Bookauthor.png" width="30" height="30"> Nuevo Autor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formNuevoAutor" name="formNuevoAutor">
          <div class="row">
           
            <div class="col-sm-6">
              <div class="form-group">
                <label for="TituloLabel">Nombre</label>
                <input type="text" maxlength="40"  class="form-control" onkeyup="saltoForm(this,this.value)" name="formautnom" id="formautnom" aria-describedby="formautnom" placeholder="" onkeypress="">
              </div>
             
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="TituloLabel">Apellido</label>
                <input type="text" maxlength="40" class="form-control" name="formautape" onkeyup="saltoForm2(this,this.value)"  id="formautape" aria-describedby="formautape" placeholder="" onkeypress="" >
              </div>

            </div>
           </div>
           <div class="row">
             <div class="col-sm-12">
                <div class="form-group">
                  <label for="TituloLabel">Codigo Cutter</label>
                  <input type="text" maxlength="40" tabindex="2" class="form-control" onkeyup="sendInsert(this,this.value);" name="formautseud" id="formautseud" aria-describedby="formautseud" placeholder="">
                </div>
             </div>
           </div>
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaNuevoAutor" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="insertarAutor()">Insertar</button>
      </div>
     
    </div>
  </div>
</div>

<!--MODAL PARA MODIFICAR EDITAR CAMBIAR  AUTOR-->
<div class="modal fade" id="modalEditarAutor" tabindex="-1" role="dialog" aria-labelledby="modalEditarAutor" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newAuthorModal"><img src="img/icons/Bookauthor.png" width="30" height="30">Editar Autor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formEditarAutor" name="formEditarAutor"> <!-- NO SE USA EN NINGUNA OTRA PAGINA-->
          <div class="row">
           
            <div class="col-sm-6">

              <div class="form-group">
                <label for="TituloLabel">Nombre</label>
                 <input type="text" class="form-control" name="editautcod" id="editautcod" aria-describedby="editautcod" placeholder="" hidden>
                <input type="text" maxlength="40" class="form-control" onkeyup="saltoFormEdit(this,this.value)"  name="editautnom" id="editautnom" aria-describedby="editautnom" placeholder="" onkeypress="">
              </div>
             
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="TituloLabel">Apellido</label>
                <input type="text" maxlength="40" class="form-control" onkeyup="saltoFormEdit2(this,this.value)"  name="editautape" id="editautape" aria-describedby="editautape" placeholder="" onkeypress="">
              </div>

            </div>
           </div>
           <div class="row">
             <div class="col-sm-12">
                <div class="form-group">
                <label for="TituloLabel">Codigo Cutter</label>
                <input type="text" maxlength="40" class="form-control" onkeyup="sendEditar(this,this.value);" name="editautseud" id="editautseud" aria-describedby="editautseud" placeholder="">
              </div>

             </div>
           </div>
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaEditarAutor" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarAutor()">Editar</button>
      </div>
     
    </div>
  </div>
</div>




<!--MODAL PARA ELIMINAR AUTOR-->
<div class="modal fade" id="modalBorrarAutor" tabindex="-1" role="dialog" aria-labelledby="modalBorrarAutor" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="borrarAutorTitle"><img src="img/icons/BookEditWideDel.png" width="35" height="30"> Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="borrarFormulario" name="borrarFormulario">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Eliminar autor es una accion <b> Permanente </b> desea eliminar autor:</label></div>                
                <input type="text" class="form-control" name="delautcod" id="delautcod" aria-describedby="delautcod" placeholder="Editorial" hidden="true">
                <input type="text" class="form-control" name="delautnom" id="delautnom" aria-describedby="delautnom" placeholder="Editorial" hidden="true">
                <input type="text" class="form-control" name="delautape" id="delautape" aria-describedby="delautape" placeholder="Editorial" hidden="true">            
                  <div id="labelBorrar" style="color: red; font-weight: bold; text-align: center;"></div>
                  <div align="center" name="cargarTablaRequisito" id="cargarTablaRequisito"></div>
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
        <div id="respuestaBorrarAutor" style="color: red; font-weight: bold; text-align: center;"></div>         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-danger" onclick="borrarAutor()">Eliminar</button>
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

//ACTIVE FUNCTION WHEN PRESSING ENTER
function saltoForm(elemento,content)
    {
    document.addEventListener('keyup', function(event) {
    if (event.keyCode == 13)
        {
        next=elemento.tabIndex+1;
        document.formNuevoAutor.elements[next].focus()
        }

    });
}

function saltoForm2(elemento,content)
    {
    document.addEventListener('keyup', function(event) {
    if (event.keyCode == 13)
        {
          
       document.getElementById("formautseud").focus(); 
        }

    });
  }

  function sendInsert(elemento,content)
    {
    document.addEventListener('keyup', function(event) {
    if (event.keyCode == 13)
        {
          if(keyTimer){
              clearTimeout(keyTimer);
          }
          keyTimer = setTimeout(function () {
              insertarAutor(); 
          }, 500); 
        }

    });
  }
//FIN FUNCTIONES SALTO/INSERT VIA ENTER NUEVO AUTOR

//FUNCION SALTO/INSERT VIA ENTER EDITAR AUTIR
function saltoFormEdit(elemento,content)
    {
    document.addEventListener('keyup', function(event) {
    if (event.keyCode == 13)
      {
       document.getElementById("editautape").focus(); 
      }

    });
}
function saltoFormEdit2(elemento,content)
    {
    document.addEventListener('keyup', function(event) {
    if (event.keyCode == 13)
        {
       document.getElementById("editautseud").focus(); 
      }
    });
}
  function sendEditar(elemento,content)
    {
    document.addEventListener('keyup', function(event) {
    if (event.keyCode == 13)
        {
        if(keyTimer){
            clearTimeout(keyTimer);
        }
        keyTimer = setTimeout(function () {
            editarAutor(); 
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
  var ordenar=$("#textBusquedaordenar").val();  
  $("#cargarTabla").load("pages/autores/tablaAutores.php?pagina=1&busqueda="+ busqueda + "&ordenar=" + ordenar);

  setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);
}


function recargarTablaLimpiar(){
    document.getElementById("formBusqueda").reset();
    $("#cargandoFeedback").show();
      $("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

    var busqueda=$("#textBusqueda").val();
    var ordenar=$("#textBusquedaordenar").val();  
  $("#cargarTabla").load("pages/autores/tablaAutores.php?pagina=1&busqueda="+ busqueda + "&ordenar=" + ordenar);
    setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);



    

  
}




//INSERTAR NUEVO AUTOR
function insertarAutor(){

  if ($("#formautnom").val()==""){
    $("#respuestaNuevoAutor").show();
    $("#respuestaNuevoAutor").html("Campo de Nombre del Autor esta Vacio");
  }else if ($("#formautseud").val()==""){
    $("#respuestaNuevoAutor").show();
    $("#respuestaNuevoAutor").html("Campo de Cutter del Autor esta Vacio");
  }else {
    $("#respuestaNuevoAutor").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/autores/insertarAutor.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formNuevoAutor").serialize(),
              success: function (data){
                if (data==1) {
                    //success
                    $("#accionFeedback").show();
                    $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Nuevo Autor agregado </div>");
                     recargarTabla();
                     limpiarFormularioAutor();
                    setTimeout(
                        function() {
                          
                          $("#accionFeedback").hide(500);          
                    }, 6000);
                    $("#respuestaNuevoAutor").hide(500);
                    $('#newAuthorModal').modal('hide');

                } else if (data==0) {
                  //error
                  $("#respuestaNuevoAutor").show();
                  $("#respuestaNuevoAutor").html("<div class='alert alert-warning' role='alert'>Esta Autor ya ha sido agregado </div>");
                     recargarTabla();
                    setTimeout(
                        function() {
                          $("#respuestaNuevoAutor").hide(500);                                
                    }, 6000);
                    

                } else{
                  $("#respuestaNuevoAutor").show();
                  $("#respuestaNuevoAutor").html(data);
                     recargarTabla();

                    setTimeout(
                        function() {
                          $("#respuestaNuevoAutor").hide(500);                                
                    }, 6000);
                }

              }
            });

  }
}
//INSERTAR NUEVO AUTOR
function editarAutor(){

  if ($("#editautnom").val()==""){
    $("#respuestaEditarAutor").show();
    $("#respuestaEditarAutor").html("Campo de Nombre del Autor esta Vacio");
  }else if ($("#editautseud").val()==""){
    $("#respuestaEditarAutor").show();
    $("#respuestaEditarAutor").html("Campo de Cutter del Autor esta Vacio");
  }else {
    $("#respuestaEditarAutor").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/autores/editarAutores.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formEditarAutor").serialize(),
              success: function (data){               
                if (data==1) {
                  //success
                  $("#accionFeedback").show();
                  $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Autor ha sido editado </div>");
                  recargarTabla();
                  setTimeout(
                      function() {
                        $("#accionFeedback").hide(500);
                        
                  }, 6000);
                  $("#respuestaEditarAutor").hide(500);    
                  $("#modalEditarAutor").modal('hide');

                } else if (data==0) {
                  //error
                  $("#respuestaEditarAutor").show();
                  $("#respuestaEditarAutor").html("<div class='alert alert-warning' role='alert'>Otro Autor ya esta registrado con estos datos </div>");    
                  setTimeout(
                      function() {
                        $("#respuestaEditarAutor").hide(500);
                        
                       
                  }, 6000);
                  
                } else {
                  //any other error
                  $("#respuestaEditarAutor").show();
                  $("#respuestaEditarAutor").html(data);                  
                  setTimeout(
                      function() {
                        $("#respuestaEditarAutor").hide(500);
                        
                       
                  }, 6000);
                }
                  


              }
            });

  }
}
//BORRAR FORMULARIO DE NUEVO AUTOR
function limpiarFormularioAutor(){
   document.getElementById("formNuevoAutor").reset();

}

//BORRAR AUTOR
function borrarAutor(){
  $("#borrarButton").attr("disabled", true);

  if ($("#delautcod").val()==""){
    $("#respuestaBorrarAutor").show();
    $("#respuestaBorrarAutor").html("Codigo de Autor necesario");
  }else {
    $("#labelBorrar").html('<img src="img/structures/replace.gif" style="max-width: 80%">').show(500);
    var url = "pages/autores/borrarAutores.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#borrarFormulario").serialize(),
      success: function (data){
        recargarTabla()
        if (data=="0"){
          // ERROR, AUTOR TIENE LIBROS INSCRITOS
          var url = "pages/autores/requisitosBorrarAutores.php";
           $.ajax({
              type: "POST",
              url: url,
              data: $("#borrarFormulario").serialize(),
              success: function (data){
                  $("#labelBorrar").show();
                  $("#notificationLabel").html("");
                  $("#labelBorrar").html("No se puede borrar a este autor. pues esta siendo usado por los libros:");
                  $("#cargarTablaRequisito").show();
                  $("#cargarTablaRequisito").html(data);                           
              }
            });
        }else if (data=="1"){  

          $("#labelBorrar").show();
          $("#notificationLabel").html("<label for='TituloLabel'>Operacion finalizada</label>");
          $("#labelBorrar").html("<h5>Autor ha sido eliminado</h5>");

          $("#modalBorrarAutor").modal('hide');
           //success
          $("#accionFeedback").show();
          $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Autor Eliminado </div>");
           setTimeout(
              function() {
                 $("#accionFeedback").hide(500);                         
           }, 6000);
         
        }            
      }
    });
  }
}

//TRIGGER SE ACTIVA AL MOSTRAR UN MODAL   EDITAR 

 $('#modalEditarAutor').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var varautcod = button.data('varautcod')
      var varautnom = button.data('varautnom')
      var varautape = button.data('varautape')
      var varautseud = button.data('varautseud') 
      var modal = $(this)
      modal.find('.modal-title').text('Editar autor: ' + varautnom +' '+varautape);
     
      document.getElementById('editautcod').value = varautcod;
      document.getElementById('editautnom').value = varautnom;
      document.getElementById('editautape').value = varautape;
      document.getElementById('editautseud').value = varautseud;
 
    })
//TRIGGER SE ACTIVA AL MOSTRAR UN MODAL   ELIMINAR 
//Eliminar autor
  
     $('#modalBorrarAutor').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varautcod = button.data('varautcod')
      var varautnom = button.data('varautnom')
      var varautape = button.data('varautape') 

      $('#borrarButton').attr("disabled", false);  


      var modal = $(this)

       $("#notificationLabel").html('Esta es una accion <h5> Permanente. </h5> Desea Eliminar registro?:');
       $("#cargarTablaRequisito").html('');


      $("#labelBorrar").html('<h5> '+varautnom+' '+varautape+'<h5> ');
      document.getElementById('delautcod').value = varautcod;
      document.getElementById('delautnom').value = varautnom;
      document.getElementById('delautape').value = varautape;
      
      
    })

     // SOLO NUMEROS Y SOLO LETRAS

 function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}


function isNumberSysmbolKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode != 45 && charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

//onkeypress="return soloLetras(event);" 

 function soloLetras(evt){
       key = event.keyCode || evt.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

    

</script>
