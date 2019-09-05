<!--ASPECTO VISUAL DE LA PAGINA DE categorias-->
    <!--CONTENEDOR PARA TABLA DE categorias/MODALES PARA AGREGAR Y ELIMINAR categorias--> 

    <?php
     if ($_SESSION['usuNivelNombre']=='Administrador') {
        # code...
           $bloqueo="disabled";
       }else{
        $bloqueo="";
       }  
     ?>
<!--DIRECCION DE LA UBICACION ACTUAL-->     
     

<!--INICIO CONTENEDOR DE CATALOGO DE categorias-->    
<div class="container-fluid" > 
  <br>
    <div class="col-sm-12">  
      <div class="card">   
        <div class="card-header">
          <div class="row mx-auto">
            <div style="vertical-align: middle; margin: 5px">
               <p class="font-weight-light"> <h3>  Catalogo de categorias</h3>  Administrar informacion de categorias.</p>       
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

                        <button type="button" class="btn btn-light float-right" <?php echo $bloqueo ?>  data-toggle="modal" data-target="#newcategoriaModal"  >
                          <img data-toggle="tooltip" data-placement="top"  title="Nuevo categoria" src="img/icons/Bookcatego+.png" width="45" height="45">
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

<!--INICIAN MODALS PARA INSERTAR, MODIFICAR, ELIMINAR categorias-->


<!--MODAL PARA INSERTAR NUEVO categoria-->
<div class="modal fade" id="newcategoriaModal" tabindex="-1" role="dialog" aria-labelledby="newcategoriaModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newcategoriaModal"><img src="img/icons/Bookcatego+.png" width="30" height="30"> Nuevo categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formNuevocategoria" name="formNuevocategoria">
          <div class="row">
           
            <div class="col-sm-10">

              <div class="form-group">
                <label for="TituloLabel">Nombre de la categoria</label>
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="formcategorianom" id="formcategorianom" aria-describedby="formcategorianom" placeholder="" onkeypress="">
                 <label for="TituloLabel">Codigo dewey de la categoria</label>
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="formcategoriacod" id="formcategoriacod" aria-describedby="formcategoriacod" placeholder="" onkeypress="return soloNumeros(event);">
              </div>
             
            </div>          
           </div>        
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaNuevocategoria" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="insertarcategoria()">Insertar</button>
      </div>
     
    </div>
  </div>
</div>

<!--MODAL PARA MODIFICAR  categoria-->

<div class="modal fade" id="modalEditarcategoria" tabindex="-1" role="dialog" aria-labelledby="modalEditarcategoria" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newcategoriaModal"><img src="img/icons/Bookcatego+.png" width="30" height="30">Editar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formEditcategoria" name="formEditcategoria">
          <div class="row">
           
            <div class="col-sm-10">

              <div class="form-group">
                <label for="TituloLabel">Nombre de la categoria</label>                 
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="editcategoriacod" id="editcategoriacod" aria-describedby="editcategoriacod" placeholder="" hidden>
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="editcategoriaclanom" id="editcategoriaclanom" aria-describedby="editcategoriaclanom" placeholder="" onkeypress="">
                <label for="TituloLabel">Codigo dewey de la categoria</label>
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="editcategoriadewcod" id="editcategoriadewcod" aria-describedby="editcategoriadewcod" placeholder="" onkeypress="return soloNumeros(event);">
              </div>
             
            </div>
         
           </div>          
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaEditarcategoria" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarcategoria()">Editar</button>
      </div>
     
    </div>
  </div>
</div>




<!--MODAL PARA ELIMINAR categoria-->

<div class="modal fade" id="modalBorrarcategoria" tabindex="-1" role="dialog" aria-labelledby="modalBorrarcategoria" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deletecategoriaTitle"><img src="img/icons/BookEditWideDel.png" width="35" height="30"> Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="deleteForm" name="deleteForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Eliminar categoria es una accion <b> Permanente </b> desea eliminar categoria:</label></div>                
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="delcategoriacod" id="delcategoriacod" aria-describedby="delcategoriacod" placeholder="categoria" hidden="true">
                <input style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" name="delcategorianom" id="delcategorianom" aria-describedby="delcategorianom" placeholder="categoria" hidden="true">
                           
                  <div id="labelBorrar" style="color: red; font-weight: bold; text-align: center;"></div>
                  <div align="center" name="cargarTablaRequisito" id="cargarTablaRequisito"></div>
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
        <div id="respuestaBorrarcategoria" style="color: red; font-weight: bold; text-align: center;"></div>         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-danger" onclick="deletecategoria()">Eliminar</button>
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
  $("#cargarTabla").load("pages/categorias/tablaCategorias.php?pagina=1&busqueda="+ busqueda);

  setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);
}


function recargarTablaLimpiar(){
    document.getElementById("formBusqueda").reset();
    $("#cargandoFeedback").show();
      $("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

    var busqueda=$("#textBusqueda").val();

  
    $("#cargarTabla").load("pages/categorias/tablaCategorias.php?pagina=1&busqueda="+busqueda);

    setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);



    

  
}




//INSERTAR NUEVO categoria
function insertarcategoria(){

  if ($("#formcategorianom").val()==""){
    $("#respuestaNuevocategoria").show();
    $("#respuestaNuevocategoria").html("Campo de Nombre del categoria esta Vacio");  
  }else if ($("#formcategoriacod").val()=="") {
    $("#respuestaNuevocategoria").show();
    $("#respuestaNuevocategoria").html("Campo Codigo de la categoria esta Vacio"); 
  }
  else {
    $("#respuestaNuevocategoria").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/categorias/insertarCategoria.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formNuevocategoria").serialize(),
              success: function (data){
                if (data==1) {
                    //success
                    $("#accionFeedback").show();
                    $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Nuevo categoria agregado </div>");
                     recargarTabla();
                     limpiarFormulariocategoria();
                    setTimeout(
                        function() {
                          
                          $("#accionFeedback").hide(500);          
                    }, 6000);
                    $("#respuestaNuevocategoria").hide(500);
                    $('#newcategoriaModal').modal('hide');

                } else if (data==0) {
                  //error
                  $("#respuestaNuevocategoria").show();
                  $("#respuestaNuevocategoria").html("<div class='alert alert-warning' role='alert'>Esta categoria ya ha sido agregado </div>");
                     recargarTabla();
                    setTimeout(
                        function() {
                          $("#respuestaNuevocategoria").hide(500);                                
                    }, 6000);
                    

                } else{
                  $("#respuestaNuevocategoria").show();
                  $("#respuestaNuevocategoria").html(data);
                     recargarTabla();

                    setTimeout(
                        function() {
                          $("#respuestaNuevocategoria").hide(500);                                
                    }, 6000);
                }

              }
            });

  }
}
//EDITAR categoria
function editarcategoria(){

  if ($("#editcategoriadewcod").val()==""){
    $("#respuestaEditarcategoria").show();
    $("#respuestaEditarcategoria").html("Campo Codigo de la categoria esta Vacio");
  }else if ($("#editcategoriaclanom").val()==""){
    $("#respuestaEditarcategoria").show();
    $("#respuestaEditarcategoria").html("Campo Nombre de la categoriae esta Vacio");
  }
  else {
    $("#respuestaEditarcategoria").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/categorias/editarCategoria.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formEditcategoria").serialize(),
              success: function (data){               
                if (data==1) {
                  //success
                  $("#accionFeedback").show();
                  $("#accionFeedback").html("<div class='alert alert-success' role='alert'>categoria ha sido editado </div>");
                  recargarTabla();
                  setTimeout(
                      function() {
                        $("#accionFeedback").hide(500);
                        
                  }, 6000);
                  $("#respuestaEditarcategoria").hide(500);    
                  $("#modalEditarcategoria").modal('hide');

                } else if (data==0) {
                  //error
                  $("#respuestaEditarcategoria").show();
                  $("#respuestaEditarcategoria").html("<div class='alert alert-warning' role='alert'>Otro categoria ya esta registrado con estos datos </div>");    
                  setTimeout(
                      function() {
                        $("#respuestaEditarcategoria").hide(500);
                        
                       
                  }, 6000);
                  
                } else {
                  //any other error
                  $("#respuestaEditarcategoria").show();
                  $("#respuestaEditarcategoria").html(data);                  
                  setTimeout(
                      function() {
                        $("#respuestaEditarcategoria").hide(500);
                        
                       
                  }, 6000);
                }
                  


              }
            });

  }
}
//BORRAR FORMULARIO DE NUEVO categoria
function limpiarFormulariocategoria(){
   document.getElementById("formNuevocategoria").reset();

}

//BORRAR categoria
function deletecategoria(){
  $("#borrarButton").attr("disabled", true);

  if ($("#delcategoriacod").val()==""){
    $("#respuestaBorrarcategoria").show();
    $("#respuestaBorrarcategoria").html("Codigo de categoria necesario");
  }else {
    $("#labelBorrar").html('<img src="img/structures/replace.gif" style="max-width: 80%">').show(500);
    var url = "pages/categorias/borrarCategoria.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#deleteForm").serialize(),
      success: function (data){
        recargarTabla()
        if (data=="0"){
          // ERROR, categoria TIENE LIBROS INSCRITOS
          var url = "pages/categorias/requisitosBorrarCat.php";
           $.ajax({
              type: "POST",
              url: url,
              data: $("#deleteForm").serialize(),
              success: function (data){
                  $("#labelBorrar").show();
                  $("#notificationLabel").html("");
                  $("#labelBorrar").html("No se puede borrar esta categoria. pues esta siendo usado por los libros:");
                  $("#cargarTablaRequisito").show();
                  $("#cargarTablaRequisito").html(data);                           
              }
            });
        }else if (data=="1"){  

          $("#labelBorrar").show();
          $("#notificationLabel").html("<label for='TituloLabel'>Operacion finalizada</label>");
          $("#labelBorrar").html("<h5>categoria ha sido eliminado</h5>");

          $("#modalBorrarcategoria").modal('hide');
           //success
          $("#accionFeedback").show();
          $("#accionFeedback").html("<div class='alert alert-success' role='alert'>categoria Eliminado </div>");
           setTimeout(
              function() {
                 $("#accionFeedback").hide(500);                         
           }, 6000);
         
        }            
      }
    });
  }
}

 $('#modalEditarcategoria').on('show.bs.modal', function (event) {var button = $(event.relatedTarget) // Button that triggered the modal
      var vardewtipcla = button.data('vardewtipcla')      
      var vardewcod = button.data('vardewcod')
      var vardewcodcla = button.data('vardewcodcla')  
      var modal = $(this)
      modal.find('.modal-title').text('Editar categoria: ' + vardewcodcla );
     
      document.getElementById('editcategoriaclanom').value = vardewtipcla;
      document.getElementById('editcategoriacod').value = vardewcod;
      document.getElementById('editcategoriadewcod').value = vardewcodcla;

    
      
      
      
    })

//Eliminar categoria
  
     $('#modalBorrarcategoria').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var vardewtipcla = button.data('vardewtipcla')
      var vardewcod = button.data('vardewcod')     

      $('#borrarButton').attr("disabled", false);  


      var modal = $(this)

       $("#notificationLabel").html('Esta es una accion <h5> Permanente. </h5> Desea Eliminar registro?:');
       $("#cargarTablaRequisito").html('');


      $("#labelBorrar").html('<h5> '+vardewtipcla+' '+'<h5> ');
      document.getElementById('delcategorianom').value = vardewtipcla;
      document.getElementById('delcategoriacod').value = vardewcod;
      
      
      
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
