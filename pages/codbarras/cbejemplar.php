

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
               <p class="font-weight-light"> <h3>  Codigo de barra de ejemplares</h3>  Seleccione un libro: <br>
                Para mostrar el pdf de todos los ejemplares de un libro , seleecione por titulo del libro y realice click en  <b>Mostrar PDF</b></p>       
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
                            <?php 
                                     $selTable=mysqli_query($conexion,"SELECT * from $tablaLibros");                            
                             ?>
                             <td>
                              <select class="form-control js-Dropdown-Busqueda" name='codlib' id='codlib'>
                                <option value="">Seleccione un libro</option>
                               <?php  while ($dataLibros=mysqli_fetch_assoc($selTable)){  ?>                              
                               <option value="<?php echo $dataLibros['libcod'];  ?>"><?php echo $dataLibros['libtit'];  ?></option>
                               <?php } ?>                                                    
                               </select> </td></tr><tr> 
                              <td>                        
                               <button type="submit" class="btn btn-primary btn-block" onclick="generarpdf();"  >Mostrar PDF</button></td>                                
                             </div></tr><tr>
                             <td><div id="respuesta" style="color: red; font-weight: bold; text-align: center;"></div></td>
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
</html>
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

  if ($("#codlib").val()==""){
    $("#respuesta").show();
    $("#respuesta").html("&nbsp;&nbsp;Seleccione un titulo de libro"); 
      }else{
       var codlib = document.getElementById('codlib').value;
          var url = 'pages/codbarras/cbarraxloteejempdf.php?codlib='+codlib;
          $(location).attr('href',url);         
         
         
          }

      }  
                   
    



</script>;
