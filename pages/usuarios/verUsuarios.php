<!--ASPECTO VISUAL DE LA PAGINA DE Usuarios-->
    <!--CONTENEDOR PARA TABLA DE Usuarios/MODALES PARA AGREGAR Y ELIMINAR Usuarios--> 

    <?php
       
     ?>
<!--DIRECCION DE LA UBICACION ACTUAL-->     
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="escritorio.php">Escritorio</a></li>
      <li class="breadcrumb-item">Catalogos</li>   
      <!--CAMBIAR SIGUIENTE POR NOMBRE DE CADA CATEGORIA-->     
      <li class="breadcrumb-item" active  >Usuarios</li>
    </ol>
  </nav>        

<!--INICIO CONTENEDOR DE CATALOGO DE Usuarios-->    
<div class="container-fluid" > 
    <div class="col-sm-12">  
      <div class="card">   
        <div class="card-header">
          <div class="row mx-auto">
            <div style="vertical-align: middle; margin: 5px">
               <p class="font-weight-light"> <h3>  Catalogo de Usuarios</h3>  Administrar informacion de Usuarios.</p>       
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
                          <img src="img/icons/actualizarUsuario.png" width="45" height="45">
                        </button>

                        <button type="button" class="btn btn-light float-right"  data-toggle="modal" data-target="#newUsuarioModal"  >
                          <img data-toggle="tooltip" data-placement="top"  title="Nuevo Usuario" src="img/icons/usuarioNuevo.png" width="45" height="45">
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

<!--INICIAN MODALS PARA INSERTAR, MODIFICAR, ELIMINAR Usuarios-->


<!--MODAL PARA INSERTAR NUEVO Usuario-->
<div class="modal fade" id="newUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="newUsuarioModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newUsuarioModal"><img src="img/icons/usuarioNuevo.png" width="30" height="30"> Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formNuevoUsuario" name="formNuevoUsuario">
          <div class="row">           
          
            <table class="table">
            <tr>              
              <th>Primer Nombre</th>
              <th>Segundo Nombre</th>              
            </tr>
            <tr>
              <td><input type="text" class="form-control" name="formUsuarionom1" id="formUsuarionom1" aria-describedby="formUsuarionom1" placeholder="" onkeypress="return soloLetras(event);"></td>
              <td><input type="text" class="form-control" name="formUsuarionom2" id="formUsuarionom2" aria-describedby="formUsuarionom2" placeholder="" onkeypress="return soloLetras(event);"></td>
            </tr>
            <tr>              
              <th>Primer Apellido</th>
              <th>Segundo Apellido</th>              
            </tr>
            <tr>
              <td><input type="text" class="form-control" name="formUsuarioape1" id="formUsuarioape1" aria-describedby="formUsuarioape1" placeholder="" onkeypress="return soloLetras(event);"></td>
              <td><input type="text" class="form-control" name="formUsuarioape2" id="formUsuarioape2" aria-describedby="formUsuarioape2" placeholder="" onkeypress="return soloLetras(event);"></td>
            </tr>
            <tr>              
              <th>Usuario</th>
              <th>Contraseña</th>              
            </tr>
            <tr>
              <td><input type="text" class="form-control" name="formUsuariomote" id="formUsuariomote" aria-describedby="formUsuariomote" placeholder="" onkeypress="return soloLetras(event);"></td>
              <td><input type="password" class="form-control" name="formUsuariopass" id="formUsuariopass" aria-describedby="formUsuariopass" placeholder=""></td>
            </tr>
            <tr>              
              <th>Correo</th>
              <th>Bachillerato</th>              
            </tr>
            <tr>
              <td><input type="text" class="form-control" name="formUsuariocorreo" id="formUsuariocorreo" aria-describedby="formUsuariocorreo" placeholder=""></td>
              <td>
                <select class="form-control " name='formUsuariobachi' id='formUsuariobachi'>
                             <option value="">Seleccione bachillerato</option>
                             <option value="0">SALUD</option>
                             <option value="1">MECANICA</option>
                             <option value="2">CONTADURIA</option>                            
                                                       
                 </select> </td>              
            </tr>
             <tr>              
              <th>Seccion</th>
              <th>Año</th>              
            </tr>
            <tr>
           <td>
                <select class="form-control" name='formUsuarioseccion' id='formUsuarioseccion'>
                             <option value="">Seleccione la seccion</option>
                             <option value="0">SECCION A</option>
                             <option value="1">SECCION B</option>
                             <option value="2">SECCION C</option>                            
                             <option value="3">SECCION D</option>                            
                                                       
                 </select></td>
            <td>           
              <select class="form-control" name='formUsuarioanio' id='formUsuarioanio'>
                             <option value="">Seleccione el año</option>
                             <option value="0">PRIMER AÑO</option>
                             <option value="1">SEGUNDO AÑO</option>
                             <option value="2">TERCER AÑO</option>                         
                                                       
                 </select> </td>  
            </tr>             
             <tr>              
              <th>Carnet</th>
              <th>Tipo de cuenta</th>              
            </tr>
            <tr>
              <td><input type="text" class="form-control" name="formUsuariocarnet" id="formUsuariocarnet" aria-describedby="formUsuariocarnet" placeholder=""></td>
              <td>
                 <select class="form-control" name='formUsuariotipo' id='formUsuariotipo'>
                             <option value="">Seleccione tipo</option>
                             <option value="0">ADMINISTRADOR</option>
                             <option value="1">BIBLIOTECARIO</option>
                             <option value="2">PERSONAL ADMINISTRATIVO</option>
                             <option value="3">ESTUDIANTE</option> 
                                                       
                 </select> 
             

              </td>
            </tr>
              
          
          </table>  
           </div>        
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaNuevoUsuario" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="insertarUsuario()">Insertar</button>
      </div>
     
    </div>
  </div>
</div>

<!--MODAL PARA MODIFICAR  Usuario-->

<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalEditarUsuario" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newUsuarioModal"><img src="img/icons/Bookstand.png" width="30" height="30">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formEditUsuario" name="formEditUsuario">
          <div class="row">
        <div class="form-group">

          <input type="text" class="form-control" name="editUsuariocod" id="editUsuariocod" aria-describedby="editUsuariocod" placeholder="" hidden>

         <table class="table">
            <tr>              
              <th>Primer Nombre</th>
              <th>Segundo Nombre</th>              
            </tr>
            <tr>
              <td><input type="text" class="form-control" name="editUsuarionom1" id="editUsuarionom1" aria-describedby="editUsuarionom1" placeholder="" onkeypress="return soloLetras(event);"></td>
              <td><input type="text" class="form-control" name="editUsuarionom2" id="editUsuarionom2" aria-describedby="editUsuarionom2" placeholder="" onkeypress="return soloLetras(event);"></td>
            </tr>
            <tr>              
              <th>Primer Apellido</th>
              <th>Segundo Apellido</th>              
            </tr>
            <tr>
              <td><input type="text" class="form-control" name="editUsuarioape1" id="editUsuarioape1" aria-describedby="editUsuarioape1" placeholder="" onkeypress="return soloLetras(event);"></td>
              <td><input type="text" class="form-control" name="editUsuarioape2" id="editUsuarioape2" aria-describedby="editUsuarioape2" placeholder="" onkeypress="return soloLetras(event);"></td>
            </tr>
            <tr>              
              <th>Usuario</th>
              <th>Contraseña Nueva:</th>              
            </tr>
            <tr>
              <td><input type="text" class="form-control" name="editUsuariomote" id="editUsuariomote" aria-describedby="editUsuariomote" placeholder=""></td>
              <td><input type="password" class="form-control" name="editUsuariopass" id="editUsuariopass" aria-describedby="editUsuariopass" placeholder=""></td>
            </tr>
            <tr>              
              <th>Correo</th>
              <th>Bachillerato</th>              
            </tr>
            <tr>
              <td><input type="text" class="form-control" name="editUsuariocorreo" id="editUsuariocorreo" aria-describedby="editUsuariocorreo" placeholder=""></td>   

              <td>
                <select class="form-control js-Dropdown-Busqueda" name='editUsuariobachi' id='editUsuariobachi'>
                             <option value="0">SALUD</option>
                             <option value="1">MECANICA</option>
                             <option value="2">CONTADURIA</option>                            
                                                       
                 </select> </td>   
            </tr>
             <tr>              
              <th>Seccion</th>
              <th>Año</th>              
            </tr>
            <tr>              
              <td>
                <select class="form-control js-Dropdown-Busqueda" name='editUsuarioseccion' id='editUsuarioseccion'>
                             <option value="0">SECCION A</option>
                             <option value="1">SECCION B</option>
                             <option value="2">SECCION C</option>                            
                             <option value="3">SECCION D</option>                            
                                                       
                 </select></td>             
              <td>           
              <select class="form-control js-Dropdown-Busqueda" name='editUsuarioaniobachi' id='editUsuarioaniobachi'>
                             <option value="0">PRIMER AÑO</option>
                             <option value="1">SEGUNDO AÑO</option>
                             <option value="2">TERCER AÑO</option>                         
                                                       
                 </select> </td>  
            </tr>             
             <tr>              
              <th>Carnet</th>
              <th>Tipo de cuenta</th>              
            </tr>
            <tr>
              <td><input type="text" class="form-control" name="editUsuariocarnet" id="editUsuariocarnet" aria-describedby="editUsuariocarnet" placeholder=""></td>
              <td>
                <select class="form-control js-Dropdown-Busqueda" name='editUsuarionivel' id='editUsuarionivel'>
                             <option value="0" selected>Administrador</option>
                             <option value="1">Bibliotecario</option>
                             <option value="2">Personal Administrativo</option>
                             <option value="3" selected>Estudiante</option> 
                                                       
                 </select></td>              

              
            </tr>
              
          
          </table>
              
              </div>
             
            
         
           </div>          
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaEditarUsuario" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarUsuario()">Editar</button>
      </div>
     
    </div>
  </div>
</div>




<!--MODAL PARA ELIMINAR Usuario-->

<div class="modal fade" id="modalBorrarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalBorrarUsuario" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deleteUsuarioTitle"><img src="img/icons/BookEditWideDel.png" width="35" height="30"> Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="deleteForm" name="deleteForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Eliminar Usuario es una accion <b> Permanente </b> desea eliminar Usuario:</label></div>                
                <input type="text" class="form-control" name="delUsuariocod" id="delUsuariocod" aria-describedby="delUsuariocod" placeholder="Usuario" hidden="true">
                <input type="text" class="form-control" name="delUsuarionom" id="delUsuarionom" aria-describedby="delUsuarionom" placeholder="Usuario" hidden="true">
                           
                  <div id="labelBorrar" style="color: black; font-weight: bold; text-align: center;"></div>
                  <div align="center" name="cargarTablaRequisito" id="cargarTablaRequisito"></div>
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
        <div id="respuestaBorrarUsuario" style="color: red; font-weight: bold; text-align: center;"></div>         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-danger" onclick="deleteUsuario()">Eliminar</button>
      </div>
     
    </div>
  </div>
</div>

<!-- Modal alerta de activar cuenta -->

<div class="modal fade" id="modalusuarioactivar" tabindex="-1" role="dialog" aria-labelledby="modalusuarioactivar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">      
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formactivarusuario" name="formactivarusuario">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                  <div id="labelActivar" style="color: black; font-weight: bold; text-align: center;"></div>
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;">
            <div class="form-group" >
         <label for="TituloLabel"> <h6>Desea</h6><h4><b>ACTIVAR</b></h4><h6>la cuenta:</h6> </label>       
               <div id="respuestaactivarusuario" style="color: red; font-weight: bold; text-align: center;"></div>
                    <input type="hidden" class="form-control" name="varactivarusuariocod" id="varactivarusuariocod" aria-describedby="varactivarusuariocod" placeholder=""> 
                    
                  </div>
                 </div>
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
      <div id="respuestausuarioActivar" style="color: red; font-weight: bold; text-align: center;"></div>         
            <button type="button"  id="activarButton" name="activarButton" class="btn btn-success" onclick="activarUsuario()">ACTIVAR</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <div class="modal-footer" style="background: #D5D9DF;">
               
      </div>
     
    </div>
  </div>
  </div>
</div>

<!-- Modal alerta de desactivar cuenta -->

<div class="modal fade" id="modalusuariodesactivar" tabindex="-1" role="dialog" aria-labelledby="modalusuariodesactivar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">      
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formdesactivarusuario" name="formdesactivarusuario">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                  <div id="labeDesactivar" style="color: black; font-weight: bold; text-align: center;"></div>
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;">
            <div class="form-group" >
         <label for="TituloLabel">  <h6>Desea</h6><h4><b>DESACTIVAR</b></h4><h6>la cuenta:</h6></label>       
               <div id="respuestadesactivarusuario" style="color: red; font-weight: bold; text-align: center;"></div>
                     <input type="hidden" class="form-control" name="vardesactivarusuariocod" id="vardesactivarusuariocod" aria-describedby="vardesactivarusuariocod" placeholder=""> 
                    
                  </div>
                 </div>
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
      
            <button type="button"  id="desactivarButton" name="desactivarButton" class="btn btn-danger" onclick="desactivarUsuario()">Aceptar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <div class="modal-footer" style="background: #D5D9DF;">
               
      </div>
     
    </div>
  </div>
  </div>
</div>




<!--Script para recargar tabla al abrir esta pagina el scrip esta incluido en <top.php> dir src/js/tables/loader.js-->
<script>
    window.onload = function () {     

      recargarTabla();
       setSelect2();

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
  $("#cargarTabla").load("pages/Usuarios/tablaUsuarios.php?pagina=1&busqueda="+ busqueda);

  setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);
}


function recargarTablaLimpiar(){
    document.getElementById("formBusqueda").reset();
    $("#cargandoFeedback").show();
      $("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

    var busqueda=$("#textBusqueda").val();

  
    $("#cargarTabla").load("pages/Usuarios/tablaUsuarios.php?pagina=1&busqueda="+busqueda);

    setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);



    

  
}


function activarUsuario(){
  if ($("#varactivarusuariocod").val()==""){
    $("#respuestaactivarusuario").show();
    $("#respuestaactivarusuario").html("Error al obtener el codigo del usuario");  
  }else {
    $("#respuestaactivarusuario").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/usuarios/activarUsuario.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: $("#varactivarusuariocod").serialize(), 
           success: function(data)             
           {
             $("#accionFeedback").show();
                    $("#accionFeedback").html("<div class='alert alert-success' role='alert'>cuenta activada con exito</div>");
                     recargarTabla();
                     limpiarFormularioUsuario();
                    setTimeout(
                        function() {
                          
                          $("#accionFeedback").hide(300);          
                    }, 6000);
                    $("#respuestaactivarusuario").hide(500);
                    $('#modalusuarioactivar').modal('hide');              
           }
       });
 } 
}
function desactivarUsuario(){
  if ($("#vardesactivarusuariocod").val()==""){
    $("#respuestadesactivarusuario").show();
    $("#respuestadesactivarusuario").html("Error al obtener el codigo del usuario");  
  }else {
    $("#respuestadesactivarusuario").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/usuarios/desactivarUsuario.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: $("#vardesactivarusuariocod").serialize(), 
           success: function(data)             
           {
             $("#accionFeedback").show();
                    $("#accionFeedback").html("<div class='alert alert-success' role='alert'>cuenta Desactivada con exito </div>");
                     recargarTabla();
                     limpiarFormularioUsuario();
                    setTimeout(
                        function() {
                          
                          $("#accionFeedback").hide(300);          
                    }, 6000);
                    $("#respuestadesactivarusuario").hide(300);
                    $('#modalusuariodesactivar').modal('hide');              
           }
       });
 } 
}



//INSERTAR NUEVO Usuario
function insertarUsuario(){

  if ($("#formUsuarionom1").val()==""){
    $("#respuestaNuevoUsuario").show();
    $("#respuestaNuevoUsuario").html("Campo de Primer Nombre del Usuario esta Vacio");  
  }else if ($("#formUsuarionom2").val()=="") {
    $("#respuestaNuevoUsuario").show();
    $("#respuestaNuevoUsuario").html("Campo de Segundo Nombre del Usuario esta Vacio");
  }else if ($("#formUsuarioape1").val()=="") {
    $("#respuestaNuevoUsuario").show();
    $("#respuestaNuevoUsuario").html("Campo de Primer Apellido del Usuario esta Vacio");
  }else if ($("#formUsuariomote").val()=="") {
    $("#respuestaNuevoUsuario").show();
    $("#respuestaNuevoUsuario").html("Campo Usuario esta Vacio");
  }else if ($("#formUsuariopass").val()=="") {
    $("#respuestaNuevoUsuario").show();
    $("#respuestaNuevoUsuario").html("Campo de Contraseña del Usuario esta Vacio");
  }else if ($("#formUsuariocorreo").val()=="") {
    $("#respuestaNuevoUsuario").show();
    $("#respuestaNuevoUsuario").html("Campo de Correo del Usuario esta Vacio");
  }else if ($("#formUsuarioseccion").val()=="") {
    $("#respuestaNuevoUsuario").show();
    $("#respuestaNuevoUsuario").html("Campo Seccion del Usuario esta Vacio");
  }else if ($("#formUsuarioanio").val()=="") {
    $("#respuestaNuevoUsuario").show();
    $("#respuestaNuevoUsuario").html("Campo año de bachillerato del Usuario esta Vacio");
  }else if ($("#formUsuariocarnet").val()=="") {
    $("#respuestaNuevoUsuario").show();
    $("#respuestaNuevoUsuario").html("Campo Carnet del Usuario esta Vacio");
  }else if ($("#formUsuariotipo").val()=="") {
    $("#respuestaNuevoUsuario").show();
    $("#respuestaNuevoUsuario").html("Campo tipo de Usuario esta Vacio");
  }
  else {
    $("#respuestaNuevoUsuario").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/Usuarios/insertarUsuario.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formNuevoUsuario").serialize(),
              success: function (data){
                if (data==1) {
                    //success
                    $("#accionFeedback").show();
                    $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Nuevo Usuario agregado </div>");
                     recargarTabla();
                     limpiarFormularioUsuario();
                    setTimeout(
                        function() {
                          
                          $("#accionFeedback").hide(500);          
                    }, 6000);
                    $("#respuestaNuevoUsuario").hide(500);
                    $('#newUsuarioModal').modal('hide');

                } else if (data==0) {
                  //error
                  $("#respuestaNuevoUsuario").show();
                  $("#respuestaNuevoUsuario").html("<div class='alert alert-warning' role='alert'>Esta Usuario ya ha sido agregado </div>");
                     recargarTabla();
                    setTimeout(
                        function() {
                          $("#respuestaNuevoUsuario").hide(500);                                
                    }, 6000);
                    

                } else{
                  $("#respuestaNuevoUsuario").show();
                  $("#respuestaNuevoUsuario").html(data);
                     recargarTabla();

                    setTimeout(
                        function() {
                          $("#respuestaNuevoUsuario").hide(500);                                
                    }, 6000);
                }

              }
            });

  }
}
//EDITAR Usuario
function editarUsuario(){

 if ($("#editUsuarionom1").val()==""){
    $("#respuestaEditarUsuario").show();
    $("#respuestaEditarUsuario").html("Campo de Primer Nombre del Usuario esta Vacio");  
  }else if ($("#editUsuarionom2").val()=="") {
    $("#respuestaEditarUsuario").show();
    $("#respuestaEditarUsuario").html("Campo de Segundo Nombre del Usuario esta Vacio");
  }else if ($("#editUsuarioape1").val()=="") {
    $("#respuestaEditarUsuario").show();
    $("#respuestaEditarUsuario").html("Campo de Primer Apellido del Usuario esta Vacio");
  }else if ($("#editUsuariomote").val()=="") {
    $("#respuestaEditarUsuario").show();
    $("#respuestaEditarUsuario").html("Campo Usuario esta Vacio");
  }else if ($("#editUsuariopass").val()=="") {
    $("#respuestaEditarUsuario").show();
    $("#respuestaEditarUsuario").html("Campo de Contraseña del Usuario esta Vacio");
  }else if ($("#editUsuariocorreo").val()=="") {
    $("#respuestaEditarUsuario").show();
    $("#respuestaEditarUsuario").html("Campo de Correo del Usuario esta Vacio");
  }else if ($("#editUsuarioseccion").val()=="") {
    $("#respuestaEditarUsuario").show();
    $("#respuestaEditarUsuario").html("Campo Seccion del Usuario esta Vacio");
  }else if ($("#editUsuarioanio").val()=="") {
    $("#respuestaEditarUsuario").show();
    $("#respuestaEditarUsuario").html("Campo año de bachillerato del Usuario esta Vacio");
  }else if ($("#editUsuariocarnet").val()=="") {
    $("#respuestaEditarUsuario").show();
    $("#respuestaEditarUsuario").html("Campo Carnet del Usuario esta Vacio");
  }else if ($("#editUsuariotipo").val()=="") {
    $("#respuestaEditarUsuario").show();
    $("#respuestaEditarUsuario").html("Campo tipo de Usuario esta Vacio");
  }  
  else {
    $("#respuestaEditarUsuario").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/usuarios/editarUsuario.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formEditUsuario").serialize(),
              success: function (data){               
                if (data==1) {
                  //success
                  $("#accionFeedback").show();
                  $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Usuario ha sido editado </div>");
                  recargarTabla();
                  setTimeout(
                      function() {
                        $("#accionFeedback").hide(500);
                        
                  }, 6000);
                  $("#respuestaEditarUsuario").hide(500);    
                  $("#modalEditarUsuario").modal('hide');

                } else if (data==0) {
                  //error
                  $("#respuestaEditarUsuario").show();
                  $("#respuestaEditarUsuario").html("<div class='alert alert-warning' role='alert'>Otro Usuario ya esta registrado con estos datos(carnet o correo) </div>");    
                  setTimeout(
                      function() {
                        $("#respuestaEditarUsuario").hide(500);
                        
                       
                  }, 6000);
                  
                } else {
                  //any other error
                  $("#respuestaEditarUsuario").show();
                  $("#respuestaEditarUsuario").html(data);                  
                  setTimeout(
                      function() {
                        $("#respuestaEditarUsuario").hide(500);
                        
                       
                  }, 6000);
                }
                  


              }
            });

  }
}
//BORRAR FORMULARIO DE NUEVO Usuario
function limpiarFormularioUsuario(){
   document.getElementById("formNuevoUsuario").reset();

}

//BORRAR Usuario
function deleteUsuario(){
  $("#borrarButton").attr("disabled", true);

  if ($("#varUsuariocod").val()==""){
    $("#respuestaBorrarUsuario").show();
    $("#respuestaBorrarUsuario").html("Codigo de Usuario necesario");
  }else {
    $("#labelBorrar").html('<img src="img/structures/replace.gif" style="max-width: 80%">').show(500);
    var url = "pages/Usuarios/borrarUsuario.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#deleteForm").serialize(),
      success: function (data){
        recargarTabla()
        if (data=="0"){
          // ERROR, Usuario TIENE LIBROS INSCRITOS
          var url = "pages/Usuarios/requisitosBorrarUsuario.php";
           $.ajax({
              type: "POST",
              url: url,
              data: $("#deleteForm").serialize(),
              success: function (data){
                  $("#labelBorrar").show();
                  $("#notificationLabel").html("");
                  $("#labelBorrar").html("No se puede borrar el Usuario. contiene ejemplares ubicados en el:");
                  $("#cargarTablaRequisito").show();
                  $("#cargarTablaRequisito").html(data);                           
              }
            });
        }else if (data=="1"){  

          $("#labelBorrar").show();
          $("#notificationLabel").html("<label for='TituloLabel'>Operacion finalizada</label>");
          $("#labelBorrar").html("<h5>Usuario ha sido eliminado</h5>");

          $("#modalBorrarUsuario").modal('hide');
           //success
          $("#accionFeedback").show();
          $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Usuario Eliminado </div>");
           setTimeout(
              function() {
                 $("#accionFeedback").hide(500);                         
           }, 6000);
         
        }            
      }
    });
  }
}

 $('#modalEditarUsuario').on('show.bs.modal', function (event) {var button = $(event.relatedTarget) // Button that triggered the modal
      var varusuariocod = button.data('varusuariocod')
      var varusuarionom1 = button.data('varusuarionom1')
      var varusuarionom2 = button.data('varusuarionom2')
      var varusuarioape1 = button.data('varusuarioape1')
      var varusuarioape2 = button.data('varusuarioape2')
      var varusuariocarnet = button.data('varusuariocarnet')
      var varusuariocorreo = button.data('varusuariocorreo')
      var varusuariomote = button.data('varusuariomote')
      var varusuarioaniobachi = button.data('varusuarioaniobachi')
      var varusuarioaula = button.data('varusuarioaula')
      var varusuariobachi = button.data('varusuariobachi')
      var varusuarionivel = button.data('varusuarionivel')
      var varusuarioestado = button.data('varusuarioestado')


        
      var modal = $(this)
      modal.find('.modal-title').text('Editar Usuario: ' + varusuarionom1 );
     
       document.getElementById('editUsuariocod').value = varusuariocod;
       document.getElementById('editUsuarionom1').value = varusuarionom1;
       document.getElementById('editUsuarionom2').value = varusuarionom2;
       document.getElementById('editUsuarioape1').value = varusuarioape1;
       document.getElementById('editUsuarioape2').value = varusuarioape2;
       document.getElementById('editUsuariocarnet').value = varusuariocarnet;
       document.getElementById('editUsuariocorreo').value = varusuariocorreo;
       document.getElementById('editUsuariomote').value = varusuariomote;
       document.getElementById('editUsuarioaniobachi').value = varusuarioaniobachi;
       document.getElementById('editUsuarioseccion').value = varusuarioaula;
       document.getElementById('editUsuariobachi').value = varusuariobachi;
       document.getElementById('editUsuarionivel').value = varusuarionivel;
       

      
        
    $('.js-Dropdown-Busqueda').select2({
        "selected": true
     });
      
      
    })

//Eliminar Usuario
  
     $('#modalBorrarUsuario').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varUsuariocod = button.data('varUsuariocod')
      var varUsuarionom = button.data('varUsuarionom')     

      $('#borrarButton').attr("disabled", false);  


      var modal = $(this)

       $("#notificationLabel").html('Esta es una accion <h5> Permanente. </h5> Desea Eliminar registro?:');
       $("#cargarTablaRequisito").html('');


      $("#labelBorrar").html('<h5> '+varUsuarionom+' '+'<h5> ');
      document.getElementById('delUsuariocod').value = varUsuariocod;
      document.getElementById('delUsuarionom').value = varUsuarionom;
      
      
      
    })
  $('#modalusuarioactivar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
       

       var varusuariomodificarcodigo = button.data('varusuariomodificarcodigo')
       var modal = $(this)      
       document.getElementById('varactivarusuariocod').value = varusuariomodificarcodigo;      
      
    })
  $('#modalusuariodesactivar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
       

       var varusuariomodificarcodigo = button.data('varusuariomodificarcodigo')
       var modal = $(this)      
       document.getElementById('vardesactivarusuariocod').value = varusuariomodificarcodigo;      
      
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
