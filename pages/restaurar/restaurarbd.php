<head>
  <style type="text/css">
progress[value] {
  /* Reset the default appearance */
  -webkit-appearance: none;
   appearance: none;

  width: 250px;
  height: 20px;
}der-radius: 9px;  
}
  </style>
</head>
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
               <p class="font-weight-light"> <h3>  Restauracion de datos</h3>  Seleccione el archivo sql en su equipo mediante el boton Elegir archivos: <br>Posteriormente  realice click en Subir archivos, finalizado tendra la opcion de restaurar los datos.
               Presione <img src="img/icons/restaurar.png"  width="30" height="30"alt="restaurar" />
                para realizar la restauracion de los datos, </p>       
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
                         <form id="upload_form" enctype="multipart/form-data" method="post">  
                        
                         <input required="" style="width:100%" id="file1"  type="file" multiple  name="file1" accept=".sql" required="" /> <br><br>
                        
                         <table><tr><td>
                         <button type="button" class="btn btn-primary" onclick="uploadFile()">Subir Archivo</button> </td><td>                 
                        <progress id="barradeprogreso" value="0" max="100" style="width:300px"></progress></td> </tr>
                        </table>
                       <td><div id="respuesta" style="color: red; font-weight: bold; text-align: center;"></div></td>
                         <h3 id="estado"></h3>
                          <p id="peso_cargado"></p>                  
                         
                       </form>                   
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

<script>
/* Script written by Miguel Nunez @ minuvasoft10.com */
function _(el){
  return document.getElementById(el);
}
function uploadFile(){
  if($("#file1").val()==""){
           $("#respuesta").show();
           $("#respuesta").html("&nbsp;&nbsp;Seleccione un archivo tipo sql"); 
      }else{
        $("#respuesta").hide();
  var file = _("file1").files[0];
  //alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("file1", file);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "pages/restaurar/upload/upload4.php");
  ajax.send(formdata);
}
function progressHandler(event){
  _("peso_cargado").innerHTML = "Subiendo "+event.loaded+" bytes de "+event.total;
  var percent = (event.loaded / event.total) * 100;
  _("barradeprogreso").value = Math.round(percent);
  _("estado").innerHTML = Math.round(percent)+"% Subiendo... porfavor espera..";
}
function completeHandler(event){
  _("estado").innerHTML = event.target.responseText;
  _("barradeprogreso").value = 0;
}
function errorHandler(event){
  _("estado").innerHTML = "Upload Failed";
}
function abortHandler(event){
  _("estado").innerHTML = "Upload Aborted";
}
}
</script>