<!--ASPECTO VISUAL DE LA PAGINA DE equipo-->
    <!--CONTENEDOR PARA TABLA DE equipo/MODALES PARA AGREGAR Y ELIMINAR equipo--> 

    <?php
        if ($_SESSION['usuNivelNombre']=='Administrador') {
        # code...
           $bloqueo="disabled";
       }else{
        $bloqueo="";
       }   
     ?>    

<!--INICIO CONTENEDOR DE CATALOGO DE equipo-->    
<div class="container-fluid" > 
    <div class="col-sm-12">  
      <div class="card">   
        <div class="card-header">
          <div class="row mx-auto">
            <div style="vertical-align: middle; margin: 5px">
               <p class="font-weight-light"> <h3>  Catalogo de equipo</h3>  Administrar informacion de equipo.</p>       
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
                          <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" placeholder="Realizar busqueda" id="textBusqueda" name="textBusqueda"> 
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
                          <img src="img/icons/BookediorialReload.png" width="45" height="45">
                        </button>

                        <button type="button" class="btn btn-light float-right" <?php echo $bloqueo ?>  data-toggle="modal" data-target="#newequipoModal"  >
                          <img data-toggle="tooltip" data-placement="top"  title="Nuevo equipo" src="img/icons/Bookcatego+.png" width="45" height="45">
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
       <!--Fin Panel/card para el catalogo de Equipos-->
    </div>
</div>

<!--INICIAN MODALS PARA INSERTAR, MODIFICAR, ELIMINAR equipo-->


<!--MODAL PARA INSERTAR NUEVO equipo-->
<div class="modal fade" id="newequipoModal" tabindex="-1" role="dialog" aria-labelledby="newequipoModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newequipoModal"><img src="img/icons/Bookcatego+.png" width="30" height="30"> Nuevo equipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formNuevoequipo" name="formNuevoequipo">
          <div class="row">
           
            <div class="col-sm-10">

              <div class="form-group">               
                <label for="TituloLabel">CODIGO</label>                 
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="formequicodifi" id="formequicodifi" aria-describedby="formequicodifi" placeholder="" onkeypress="return soloNumeros(event);" ><br>
                <label for="TituloLabel">NOMBRE EQUIPO</label>
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="formequiponom" id="formequiponom" aria-describedby="formequiponom" placeholder="" onkeypress=""><br>
                <label for="TituloLabel">DESCRIPCION DEL EQUIPO</label>
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="formequipodes" id="formequipodes" aria-describedby="formequipodes" placeholder="" >
              </div>
             
            </div>          
           </div>        
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaNuevoequipo" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="insertarequipo()">Insertar</button>
      </div>
     
    </div>
  </div>
</div>

<!--MODAL PARA MODIFICAR  equipo-->

<div class="modal fade" id="modalEditarequipo" tabindex="-1" role="dialog" aria-labelledby="modalEditarequipo" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newequipoModal"><img src="img/icons/Bookcatego+.png" width="30" height="30">Editar equipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formEditequipo" name="formEditequipo">
          <div class="row">
           
            <div class="col-sm-10">

              <div class="form-group">
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="editequicod" id="editequicod" aria-describedby="editequicod" placeholder="" hidden="">
                <label for="TituloLabel">CODIGO</label>                 
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="editequicodifi" id="editequicodifi" aria-describedby="editequicodifi" placeholder="" onkeypress="return soloNumeros(event);"><br>
                <label for="TituloLabel">NOMBRE EQUIPO</label>
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="editequiponom" id="editequiponom" aria-describedby="editequiponom" placeholder="" onkeypress=""><br>
                <label for="TituloLabel">DESCRIPCION DEL EQUIPO</label>
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="editequipodes" id="editequipodes" aria-describedby="editequipodes" placeholder="" >
              </div>
             
            </div>
         
           </div>          
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaEditarequipo" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarequipo()">Editar</button>
      </div>
     
    </div>
  </div>
</div>




<!--MODAL PARA ELIMINAR equipo-->

<div class="modal fade" id="modalBorrarequipo" tabindex="-1" role="dialog" aria-labelledby="modalBorrarequipo" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deleteequipoTitle"><img src="img/icons/BookEditWideDel.png" width="35" height="30"> Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="deleteForm" name="deleteForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Eliminar equipo es una accion <b> Permanente </b> desea eliminar equipo:</label></div>                
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="delequipocod" id="delequipocod" aria-describedby="delequipocod" placeholder="equipo" hidden="true">
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="delequiponom" id="delequiponom" aria-describedby="delequiponom" placeholder="equipo" hidden="true">
                           
                  <div id="labelBorrar" style="color: red; font-weight: bold; text-align: center;"></div>
                  <div align="center" name="cargarTablaRequisito" id="cargarTablaRequisito"></div>
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
        <div id="respuestaBorrarequipo" style="color: red; font-weight: bold; text-align: center;"></div>         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-danger" onclick="deleteequipo()">Eliminar</button>
      </div>
     
    </div>
  </div>
</div>

<!--MODAL PARA AGREGAR FOTOGRAFIA FOTO IMAGEN SUBIR-->

<div class="modal fade" id="imagenModal" tabindex="-1" role="dialog" aria-labelledby="imagenModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newEditorialModalTittle"><img src="img/icons/BookCover.png" width="30" height="30"> Agregar una imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formImagen" name="formImagen ">
          <div class="row">         
            <div class="col-sm-12 ">
              <div class="form-group ">
                <div class="alert alert-success" role="alert">
                  Subir una imagen de equipo
                </div>
                
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="modalequicodimg" id="modalequicodimg" aria-describedby="modalequicodimg" placeholder="Codigo Equipo" hidden="true">
                 <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="modalequitipimg" id="modalequitipimg" aria-describedby="modalequitipimg" placeholder="Codigo Equipo" hidden="true">
                <div id="preview" class="d-flex justify-content-center"> <img src="img/icons/BookCover2.png" class="img-fluid"/></div>
                <div id="errorMensaje" class="d-flex justify-content-center"></div><br>
                     <div class="d-flex justify-content-center">
                      <input style="width:90%" id="subirPortada"  type="file" accept="image/jpeg" name="subirPortada" />
                    </div>                 
              </div>
     
            </div>
          </div> 
          <div class="d-flex justify-content-center">
            <div class="btn-group">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" type="submit" class="btn btn-primary" onclick="subirImagen()">Subir portada</button>
            </div>
          </div>     
        </form>
      </div>
      <div class="modal-footer d-flex justify-content-center" style="background: #D5D9DF;">
         
      
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
  busqueda=busqueda.trim().replace(/ /g, '%20');
  $("#cargarTabla").load("pages/equipo/tablaEquipo.php?pagina=1&busqueda="+ busqueda);

  setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);
}


function recargarTablaLimpiar(){
    document.getElementById("formBusqueda").reset();
    $("#cargandoFeedback").show();
      $("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

    var busqueda=$("#textBusqueda").val();

  
    $("#cargarTabla").load("pages/equipo/tablaEquipo.php?pagina=1&busqueda="+busqueda);

    setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);



    

  
}




//INSERTAR NUEVO equipo
function insertarequipo(){    
 if ($("#formequicodifi").val()=="") {
    $("#respuestaNuevoequipo").show();
    $("#respuestaNuevoequipo").html("Codigo del equipo esta Vacio");
  }else if ($("#formequiponom").val()==""){
    $("#respuestaNuevoequipo").show();
    $("#respuestaNuevoequipo").html("Campo de Nombre del equipo esta Vacio");
  }
  else {
    $("#respuestaNuevoequipo").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/equipo/insertarEquipo.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formNuevoequipo").serialize(),
              success: function (data){
                if (data==1) {
                    //success
                    $("#accionFeedback").show();
                    $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Nuevo equipo agregado </div>");
                     recargarTabla();
                     limpiarFormularioequipo();
                    setTimeout(
                        function() {
                          
                          $("#accionFeedback").hide(500);          
                    }, 6000);
                    $("#respuestaNuevoequipo").hide(500);
                    $('#newequipoModal').modal('hide');

                } else if (data==0) {
                  //error
                  $("#respuestaNuevoequipo").show();
                  $("#respuestaNuevoequipo").html("<div class='alert alert-warning' role='alert'>Este equipo ya ha sido agregado </div>");
                     recargarTabla();
                    setTimeout(
                        function() {
                          $("#respuestaNuevoequipo").hide(500);                                
                    }, 6000);
                    

                } else{
                  $("#respuestaNuevoequipo").show();
                  $("#respuestaNuevoequipo").html(data);
                     recargarTabla();

                    setTimeout(
                        function() {
                          $("#respuestaNuevoequipo").hide(500);                                
                    }, 6000);
                }

              }
            });

  }
}
//EDITAR equipo
function editarequipo(){  
  if ($("#editequicodifi").val()==""){
    $("#respuestaEditarequipo").show();
    $("#respuestaEditarequipo").html("Campo Codigo del equipo esta Vacio");
  }else if ($("#editequiponom").val()==""){
    $("#respuestaEditarequipo").show();
    $("#respuestaEditarequipo").html("Campo Nobre del equipo esta Vacio");
  }
  else {
    $("#respuestaEditarequipo").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/equipo/editarEquipo.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formEditequipo").serialize(),
              success: function (data){               
                if (data==1) {
                  //success
                  $("#accionFeedback").show();
                  $("#accionFeedback").html("<div class='alert alert-success' role='alert'>equipo ha sido editado </div>");
                  recargarTabla();
                  setTimeout(
                      function() {
                        $("#accionFeedback").hide(500);
                        
                  }, 6000);
                  $("#respuestaEditarequipo").hide(500);    
                  $("#modalEditarequipo").modal('hide');

                } else if (data==0) {
                  //error
                  $("#respuestaEditarequipo").show();
                  $("#respuestaEditarequipo").html("<div class='alert alert-warning' role='alert'>Otro equipo ya esta registrado con estos datos </div>");    
                  setTimeout(
                      function() {
                        $("#respuestaEditarequipo").hide(500);
                        
                       
                  }, 6000);
                  
                } else {
                  //any other error
                  $("#respuestaEditarequipo").show();
                  $("#respuestaEditarequipo").html(data);                  
                  setTimeout(
                      function() {
                        $("#respuestaEditarequipo").hide(500);
                        
                       
                  }, 6000);
                }
                  


              }
            });

  }
}


//BORRAR FORMULARIO DE NUEVO equipo
function limpiarFormularioequipo(){
   document.getElementById("formNuevoequipo").reset();

}




//BORRAR equipo
function deleteequipo(){
  $("#borrarButton").attr("disabled", true);

  if ($("#delequipocod").val()==""){
    $("#respuestaBorrarequipo").show();
    $("#respuestaBorrarequipo").html("Codigo de equipo necesario");
  }else {
    $("#labelBorrar").html('<img src="img/structures/replace.gif" style="max-width: 80%">').show(500);
    var url = "pages/equipo/borrarEquipo.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#deleteForm").serialize(),
      success: function (data){
        recargarTabla()
        if (data=="1"){  

          $("#labelBorrar").show();
          $("#notificationLabel").html("<label for='TituloLabel'>Operacion finalizada</label>");
          $("#labelBorrar").html("<h5>equipo ha sido eliminado</h5>");

          $("#modalBorrarequipo").modal('hide');
           //success
          $("#accionFeedback").show();
          $("#accionFeedback").html("<div class='alert alert-success' role='alert'>equipo Eliminado </div>");
           setTimeout(
              function() {
                 $("#accionFeedback").hide(500);                         
           }, 6000);
         
        }else if(data=="0"){

           $("#labelBorrar").show();
                     $("#notificationLabel").html("<label for='TituloLabel'>Operacion no realizada</label>");         
          $("#labelBorrar").html("<h5>Esta existencia no se puede eliminar, contiene equipos registrados</h5>");            


        }          
      }
    });
  }
}

function subirImagen(){
   $("#errorMensaje").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
   var formData = new FormData($("#formImagen")[0]);

  $.ajax({
   url: "pages/equipo/subirimagen.php",
   type: "POST",
   data: formData,
   contentType: false,
   cache: false,
   processData:false,
   beforeSend : function()
   {
    $("#preview").fadeOut();
   
   },
   success: function(data)
      {
    if(data==0)
    {
     // invalid file format.
     $("#errorMensaje").html("Archivo Invalido").fadeIn();
    }
    else if (data==1)
    { recargarTabla();
     // Ver imagen subida
     $("#preview").html(data).fadeIn();
     $("#formImagen")[0].reset();
     $("#accionFeedback").show();
     $("#accionFeedback").html("<div class='alert alert-success' role='alert'> Imagen actualizada </div>");
     setTimeout(
    function() {
         
          $("#accionFeedback").hide(500);        
    }, 6000);
     $("#errorMensaje").hide(500);
     $("#errorMensaje").fadeOut();
   $('#imagenModal').modal('hide');
    
    }
      },
    error: function(e) 
      {
    $("#errorMensaje").html(e).fadeIn();
    $("#errorMensaje").hide(500);
      }          
    });
}

 $('#modalEditarequipo').on('show.bs.modal', function (event) {var button = $(event.relatedTarget) // Button that triggered the modal
      var varequitip = button.data('varequitip')      
      var varequicodifi = button.data('varequicodifi')
      var varequicod = button.data('varequicod')
      var varequides = button.data('varequides')  
      var modal = $(this)
      modal.find('.modal-title').text('Editar equipo: ' + varequitip );
     
      document.getElementById('editequiponom').value = varequitip;
      document.getElementById('editequicodifi').value = varequicodifi;
      document.getElementById('editequipodes').value = varequides;
      document.getElementById('editequicod').value = varequicod;
    
      
      
      
    })

//Eliminar equipo
  
     $('#modalBorrarequipo').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varequitip = button.data('varequitip')
      var varequicod = button.data('varequicod')     

      $('#borrarButton').attr("disabled", false);  


      var modal = $(this)

       $("#notificationLabel").html('Esta es una accion <h5> Permanente. </h5> Desea Eliminar registro?:');
       $("#cargarTablaRequisito").html('');


      $("#labelBorrar").html('<h5> '+varequitip+' '+'<h5> ');
      document.getElementById('delequiponom').value = varequitip;
      document.getElementById('delequipocod').value = varequicod;
      
      
      
    })

// IMAGEN MODAL

 $('#imagenModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var varequitip = button.data('varequitip')
      var varequicod = button.data('varequicod')
      var varequimg = button.data('varequimg') // Extract info from data-* attributes

      $("#errorMensaje").html('').show(500);
     
      var modal = $(this)

      $("#preview").html('<img src="'+varequimg+'" style="max-width: 50%">')
      document.getElementById('modalequicodimg').value = varequicod;
      document.getElementById('modalequitipimg').value = varequitip;
      
      
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

    //onkeypress="return soloNumeros(event);" 

 function soloNumeros(evt){
       key = event.keyCode || evt.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "0123456789.";
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
