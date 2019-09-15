<!--ASPECTO VISUAL DE LA PAGINA DE EDITORIALES-->
    <!--CONTENEDOR PARA TABLA DE EDITORIALES/MODALES PARA AGREGAR Y ELIMINAR EDITORIALES--> 
    <?php 
       if ($_SESSION['usuNivelNombre']=='Administrador') {
        # code...
           $bloqueo="disabled";
       }else{
        $bloqueo="";
       }   
     ?>
<!--DIRECCION DE LA UBICACION ACTUAL-->     

<!--INICIO CONTENEDOR DE CATALOGO DE EDITORIALES-->    
<div class="container-fluid" > 
  <br>
    <div class="col-sm-12">  
      <div class="card">   
        <div class="card-header">
          <div class="row mx-auto">
            <div style="vertical-align: middle; margin: 5px">
               <p class="font-weight-light"> <h3>  Catalogo de Editoriales</h3>  Administrar informacion de Editoriales.</p>       
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

                        <button type="button" class="btn btn-light float-right" <?php echo $bloqueo ?>  data-toggle="modal" data-target="#newEditorialModal"  >
                          <img data-toggle="tooltip" data-placement="top"  title="Nuevo Editorial" src="img/icons/Bookaeditorial+.png" width="45" height="45">
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

<!--INICIAN MODALS PARA INSERTAR, MODIFICAR, ELIMINAR Editoriales-->


<!--MODAL PARA INSERTAR NUEVO EDITORIAL-->
<div class="modal fade" id="newEditorialModal" tabindex="-1" role="dialog" aria-labelledby="newEditorialModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newEditorialModal"><img src="img/icons/Bookaeditorial.png" width="30" height="30"> Nuevo Editorial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formNuevoEditorial" name="formNuevoEditorial">
          <div class="row">
           
            <div class="col-sm-10">

              <div class="form-group">
                <label for="TituloLabel">Nombre del editorial</label>
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();insertarModal(this,this.value);" type="text" maxlength="60" class="form-control" name="formeditorialnom" id="formeditorialnom" aria-describedby="formeditorialnom" placeholder="">
              </div>
             
            </div>          
           </div>        
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaNuevoEditorial" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="insertarEditorial()">Insertar</button>
      </div>
     
    </div>
  </div>
</div>

<!--MODAL PARA MODIFICAR  EDITORIAL-->

<div class="modal fade" id="modalEditarEditorial" tabindex="-1" role="dialog" aria-labelledby="modalEditarEditorial" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newEditorialModal"><img src="img/icons/Bookaeditorial.png" width="30" height="30">Editar Editorial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formEditEditorial" name="formEditEditorial">
          <div class="row">
           
            <div class="col-sm-10">

              <div class="form-group">
                <label for="TituloLabel">Nombre</label>
                 <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="editeditorialcod" id="editeditorialcod" aria-describedby="editeditorialcod" placeholder="" hidden>
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();editarModal(this,this.value);"  type="text" maxlength="60" class="form-control" name="editeditorialnom" id="editeditorialnom" aria-describedby="editeditorialnom" placeholder="">
              </div>
             
            </div>
         
           </div>          
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaEditarEditorial" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarEditorial()">Editar</button>
      </div>
     
    </div>
  </div>
</div>




<!--MODAL PARA ELIMINAR EDITORIAL-->

<div class="modal fade" id="modalBorrarEditorial" tabindex="-1" role="dialog" aria-labelledby="modalBorrarEditorial" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deleteEditorialTitle"><img src="img/icons/BookEditWideDel.png" width="35" height="30"> Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="deleteForm" name="deleteForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Eliminar Editorial es una accion <b> Permanente </b> desea eliminar Editorial:</label></div>                
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="deleditorialcod" id="deleditorialcod" aria-describedby="deleditorialcod" placeholder="Editorial" hidden="true">
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();"  onkeyup=""  type="text" class="form-control" name="deleditorialnom" id="deleditorialnom" aria-describedby="deleditorialnom" placeholder="Editorial" hidden="true">
                           
                  <div id="labelBorrar" style="color: red; font-weight: bold; text-align: center;"></div>
                  <div align="center" name="cargarTablaRequisito" id="cargarTablaRequisito"></div>
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
        <div id="respuestaBorrarEditorial" style="color: red; font-weight: bold; text-align: center;"></div>         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-danger" onclick="deleteEditorial()">Eliminar</button>
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
///ON ENTER HACER INSERT/UPDATE

function insertarModal(elemento,content)
    {
    document.addEventListener('keyup', function(event) {
    if (event.keyCode == 13)
        {
          if(keyTimer){
              clearTimeout(keyTimer);
          }
          keyTimer = setTimeout(function () {
              insertarEditorial(); 
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
              editarEditorial(); 
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
  $("#cargarTabla").load("pages/editoriales/tablaEditoriales.php?pagina=1&busqueda="+ busqueda);

  setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);
}


function recargarTablaLimpiar(){
    document.getElementById("formBusqueda").reset();
    $("#cargandoFeedback").show();
      $("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

    var busqueda=$("#textBusqueda").val();

  
    $("#cargarTabla").load("pages/editoriales/tablaEditoriales.php?pagina=1&busqueda="+busqueda);

    setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);



    

  
}




//INSERTAR NUEVO Editorial
function insertarEditorial(){

  if ($("#formeditorialnom").val()==""){
    $("#respuestaNuevoEditorial").show();
    $("#respuestaNuevoEditorial").html("Campo de Nombre del Editorial esta Vacio");  
  }else {
    $("#respuestaNuevoEditorial").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/editoriales/insertarEditorial.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formNuevoEditorial").serialize(),
              success: function (data){
                if (data==1) {
                    //success
                    $("#accionFeedback").show();
                    $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Nuevo Editorial agregado </div>");
                     recargarTabla();
                     limpiarFormularioEditorial();
                    setTimeout(
                        function() {
                          
                          $("#accionFeedback").hide(500);          
                    }, 6000);
                    $("#respuestaNuevoEditorial").hide(500);
                    $('#newEditorialModal').modal('hide');

                } else if (data==0) {
                  //error
                  $("#respuestaNuevoEditorial").show();
                  $("#respuestaNuevoEditorial").html("<div class='alert alert-warning' role='alert'>Esta Editorial ya ha sido agregado </div>");
                     recargarTabla();
                    setTimeout(
                        function() {
                          $("#respuestaNuevoEditorial").hide(500);                                
                    }, 6000);
                    

                } else{
                  $("#respuestaNuevoEditorial").show();
                  $("#respuestaNuevoEditorial").html(data);
                     recargarTabla();

                    setTimeout(
                        function() {
                          $("#respuestaNuevoEditorial").hide(500);                                
                    }, 6000);
                }

              }
            });

  }
}
//EDITAR Editorial
function editarEditorial(){

  if ($("#editeditorialnom").val()==""){
    $("#respuestaEditarEditorial").show();
    $("#respuestaEditarEditorial").html("Campo de Nombre del Editorial esta Vacio");
  }else if ($("#editeditorialpais").val()==""){
    $("#respuestaEditarEditorial").show();
    $("#respuestaEditarEditorial").html("Campo de Pais del Editoriale esta Vacio");
  }
  else {
    $("#respuestaEditarEditorial").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/editoriales/editarEditorial.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formEditEditorial").serialize(),
              success: function (data){               
                if (data==1) {
                  //success
                  $("#accionFeedback").show();
                  $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Editorial ha sido editado </div>");
                  recargarTabla();
                  setTimeout(
                      function() {
                        $("#accionFeedback").hide(500);
                        
                  }, 6000);
                  $("#respuestaEditarEditorial").hide(500);    
                  $("#modalEditarEditorial").modal('hide');

                } else if (data==0) {
                  //error
                  $("#respuestaEditarEditorial").show();
                  $("#respuestaEditarEditorial").html("<div class='alert alert-warning' role='alert'>Otro Editorial ya esta registrado con estos datos </div>");    
                  setTimeout(
                      function() {
                        $("#respuestaEditarEditorial").hide(500);
                        
                       
                  }, 6000);
                  
                } else {
                  //any other error
                  $("#respuestaEditarEditorial").show();
                  $("#respuestaEditarEditorial").html(data);                  
                  setTimeout(
                      function() {
                        $("#respuestaEditarEditorial").hide(500);
                        
                       
                  }, 6000);
                }
                  


              }
            });

  }
}
//BORRAR FORMULARIO DE NUEVO EDITORIAL
function limpiarFormularioEditorial(){
   document.getElementById("formNuevoEditorial").reset();

}

//BORRAR EDITORIAL
function deleteEditorial(){
  $("#borrarButton").attr("disabled", true);

  if ($("#deleditorialcod").val()==""){
    $("#respuestaBorrarEditorial").show();
    $("#respuestaBorrarEditorial").html("Codigo de Editorial necesario");
  }else {
    $("#labelBorrar").html('<img src="img/structures/replace.gif" style="max-width: 80%">').show(500);
    var url = "pages/editoriales/borrarEditorial.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#deleteForm").serialize(),
      success: function (data){
        recargarTabla()
        if (data=="0"){
          // ERROR, Editorial TIENE LIBROS INSCRITOS
          var url = "pages/editoriales/requisitosBorrarEdit.php";
           $.ajax({
              type: "POST",
              url: url,
              data: $("#deleteForm").serialize(),
              success: function (data){
                  $("#labelBorrar").show();
                  $("#notificationLabel").html("");
                  $("#labelBorrar").html("No se puede borrar a este Editorial. pues esta siendo usado por los libros:");
                  $("#cargarTablaRequisito").show();
                  $("#cargarTablaRequisito").html(data);                           
              }
            });
        }else if (data=="1"){  

          $("#labelBorrar").show();
          $("#notificationLabel").html("<label for='TituloLabel'>Operacion finalizada</label>");
          $("#labelBorrar").html("<h5>Editorial ha sido eliminado</h5>");

          $("#modalBorrarEditorial").modal('hide');
           //success
          $("#accionFeedback").show();
          $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Editorial Eliminado </div>");
           setTimeout(
              function() {
                 $("#accionFeedback").hide(500);                         
           }, 6000);
         
        }            
      }
    });
  }
}

 $('#modalEditarEditorial').on('show.bs.modal', function (event) {var button = $(event.relatedTarget) // Button that triggered the modal
      var vareditorialcod = button.data('vareditorialcod')
      var vareditorialnom = button.data('vareditorialnom')
        
      var modal = $(this)
      modal.find('.modal-title').text('Editar Editorial: ' + vareditorialnom );
     
      document.getElementById('editeditorialcod').value = vareditorialcod;
      document.getElementById('editeditorialnom').value = vareditorialnom;
      
      
      
    })

//Eliminar Editorial
  
     $('#modalBorrarEditorial').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var vareditorialcod = button.data('vareditorialcod')
      var vareditorialnom = button.data('vareditorialnom')     

      $('#borrarButton').attr("disabled", false);  


      var modal = $(this)

       $("#notificationLabel").html('Esta es una accion <h5> Permanente. </h5> Desea Eliminar registro?:');
       $("#cargarTablaRequisito").html('');


      $("#labelBorrar").html('<h5> '+vareditorialnom+' '+'<h5> ');
      document.getElementById('deleditorialcod').value = vareditorialcod;
      document.getElementById('deleditorialnom').value = vareditorialnom;
      
      
      
    })

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
       letras = "0123456789";
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
