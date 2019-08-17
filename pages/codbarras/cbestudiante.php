
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
               <p class="font-weight-light"> <h3>  Codigo de barra estudiantes</h3>  Seleccione el tipo de bachillerato, la seccion y el año: <br>
                Para mostrar el pdf de todos los estudiantes inscritos, posteriormente  realice click en  <b>Mostrar PDF</b></p>       
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
                          <table class="table">
                            <tr>
                            <div id="formcod" name="formcod"  >
                             <td>
                             <select class="form-control js-Dropdown-Busqueda " name='bachi' id='bachi'>
                             <option value="">Seleccione bachillerato</option>
                             <option value="0">SALUD</option>
                             <option value="1">MECANICA</option>
                             <option value="2">CONTADURIA</option>                                                
                             </select> </td>
                             </tr>
                             <tr>                            
                             <td><select class="form-control js-Dropdown-Busqueda" name='seccion' id='seccion'>
                             <option value="">Seleccione un libro</option>
                             <option value="0">SECCION A</option>
                             <option value="1">SECCION B</option>
                             <option value="2">SECCION C</option>                            
                             <option value="3">SECCION D</option>                  
                                                       
                             </select></td>
                             </tr>
                             <tr>  
                             <td> <select class="form-control js-Dropdown-Busqueda" name='anio' id='anio'>
                             <option value="">Seleccione un libro</option>    
                             <option value="0">PRIMER AÑO</option>
                             <option value="1">SEGUNDO AÑO</option>
                             <option value="2">TERCER AÑO</option>                         
                                                       
                              </select>                               

                             </td>
                             </tr><tr>
                             <td>                            
                               <button type="submit" class="btn btn-primary btn-block" onclick="generarpdf();"  >Mostrar PDF</button></td>                                
                             </div> 
                             </tr><tr>
                             <td><div id="respuesta" style="color: red; font-weight: bold; text-align: center;"></div></td>
                              <td><div id="respuesta2" style="color: green; font-weight: bold; text-align: center;"></div></td>
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
    if($("#bachi").val()==""){
           $("#respuesta").show();
           $("#respuesta").html("&nbsp;&nbsp;Seleccione el tipo bachillerato para continuar"); 
      }else if ($("#seccion").val()==""){
          $("#respuesta").show();
          $("#respuesta").html("&nbsp;&nbsp;Seleccione una seccion para continuar"); 
      } else if($("#anio").val()==""){
           $("#respuesta").show();
           $("#respuesta").html("&nbsp;&nbsp;Seleccione una año para continuar"); 
      } 
      else{
       var seccion = document.getElementById('seccion').value;
       var anio = document.getElementById('anio').value;
       var bachi = document.getElementById('bachi').value;
       $("#respuesta").hide();
         $("#respuesta2").show();
           $("#respuesta2").html("&nbsp;&nbsp;PDF generado con exito");
            $("#respuesta2").hide(5000);
          var url = 'pages/codbarras/cbarraxloteusupdf.php?codseccion='+seccion+"&codanio="+anio+"&codbachi="+bachi;
          $(location).attr('href',url);         
         
         
          }

      }  
                   
    



</script>;
