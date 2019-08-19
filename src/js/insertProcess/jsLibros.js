//CARGAR  RECARGAR TABLAS BUSQUEDA DE LIBROS SI BUSQUEDA TIENE VALOR
function recargarTabla(){

	 	$("#cargandoFeedback").show();
  		$("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

		var busqueda=$("#textBusqueda").val();
		busqueda=busqueda.trim().replace(/ /g, '%20');


	
		$("#cargarTablaLibros").load("src/libs/tables/tablaLibros.php?pagina=1&busqueda="+busqueda);

		setTimeout(	function() {
			$("#cargandoFeedback").hide(500);
					      			     
		}, 1000);	
}
//CARGAR  RECARGAR TABLAS LIMPIAR FORMULARIO DE BUSQUEDA

function recargarTablaLimpiar(){
		document.getElementById("formBusqueda").reset();
	 	$("#cargandoFeedback").show();
  		$("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

		var busqueda=$("#textBusqueda").val();



	
		$("#cargarTablaLibros").load("src/libs/tables/tablaLibros.php?pagina=1&busqueda="+busqueda);

		setTimeout(	function() {
			$("#cargandoFeedback").hide(500);
					      			     
		}, 1000);

}


function insertBook(){

	if ($("#libtit").val()==""){
		$("#answerPrint").show();
		$("#answerPrint").html("Campo de Titulo Vacio");
	} else if ($("#libtit").val().length<"5"){
		$("#answerPrint").show();
		$("#answerPrint").html("Titulo es demasiado corto");
	}else if ($("#editcod").val()==""){
		$("#answerPrint").show();
		$("#answerPrint").html("Seleccione una Editorial");
	} else if ($("#libdes").val()==""){
		$("#answerPrint").show();
		$("#answerPrint").html("Campo de descripcion vacio");
	}else if ($("#libdes").val().length<"20"){
		$("#answerPrint").show();
		$("#answerPrint").html("La descipcion es demasiado corta (20 Caracteres minimo)");
	} else if ($("#libnumpag").val()==""){
		$("#answerPrint").show();
		$("#answerPrint").html("Ingrese el numero de paginas");
	}else if ($("#autnom").val()==""){
		$("#answerPrint").show();
		$("#answerPrint").html("Seleccione un Autor");
	}else if ($("#libfecedi").val()==""){
		$("#answerPrint").show();
		$("#answerPrint").html("Indique la fecha de publicacion");
	}else if ($("#libisbn").val()==""){
		$("#answerPrint").show();
		$("#answerPrint").html("Ingrese el codigo ISBN del libro");
	}else if ($("#libisbn").val().length<"5"){
		$("#answerPrint").show();
		$("#answerPrint").html("Codigo ISBN Erroneo");
	}else if ($("#dewcod").val()==""){ 
		$("#answerPrint").show();
		$("#answerPrint").html("Seleccione codigo DEWEY");
	}else if ($("#libtags").val()==""){ 
		$("#answerPrint").show();
		$("#answerPrint").html("Seleccione almenos un criterio de busqueda");
	}else {
		$("#answerPrint").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
		var url = "src/libs/insertProcess/insertBook.php";
						$.ajax({
							type: "POST",
							url: url,
							data: $("#formNewBook").serialize(),
							success: function (data){
								if (data==1){
									//success
									$("#accionFeedback").show();
									$("#accionFeedback").html("<div class='alert alert-success' role='alert'> Libro insertado </div>");
									recargarTabla();
									clearFormBook();
									setTimeout(
									   	function() {
									      $("#accionFeedback").hide(500);
									      $("#answerPrint").hide(500);     
									}, 6000);
									$('#newBookModal').modal('hide');

								}else if (data==0){
									//error
									$("#answerPrint").show();
									$("#answerPrint").html("<div class='alert alert-warning' role='alert'> Ya existe un libro registrado con ese codigo ISBN </div>");
									recargarTabla();
									setTimeout(
									   	function() {
									      $("#answerPrint").hide(500);
									      $("#answerPrint").hide(500);     
									}, 6000);
								} else {
									//errores inesperados
									$("#answerPrint").show();
									$("#answerPrint").html(data);

								}						
									


							}
						});

	}
}

function updateBook(){

	if ($("#editlibtit").val()==""){
		$("#answerEditPrint").show();
		$("#answerEditPrint").html("Campo de Titulo Vacio");
	} else if ($("#editlibtit").val().length<"5"){
		$("#answerEditPrint").show();
		$("#answerEditPrint").html("Titulo es demasiado corto");
	}else if ($("#editeditcod").val()==""){
		$("#answerEditPrint").show();
		$("#answerEditPrint").html("Seleccione una Editorial");
	} else if ($("#editlibdes").val()==""){
		$("#answerEditPrint").show();
		$("#answerEditPrint").html("Campo de descripcion vacio");
	}else if ($("#editlibdes").val().length<"20"){
		$("#answerEditPrint").show();
		$("#answerEditPrint").html("La descipcion es demasiado corta (20 Caracteres minimo)");
	}else if ($("#editlibnumpag").val()==""){
		$("#answerEditPrint").show();
		$("#answerEditPrint").html("Ingrese el numero de paginas");
	}else if ($("#editgenautcod").val()==""){
		$("#answerEditPrint").show();
		$("#answerEditPrint").html("Seleccione un Autor");
	}else if ($("#editlibfecedi").val()==""){
		$("#answerEditPrint").show();
		$("#answerEditPrint").html("Indique la fecha de publicacion");
	}else if ($("#editlibisbn").val()==""){
		$("#answerEditPrint").show();
		$("#answerEditPrint").html("Ingrese el codigo ISBN del libro");
	}else if ($("#editlibisbn").val().length<"5"){
		$("#answerEditPrint").show();
		$("#answerEditPrint").html("Codigo ISBN Erroneo");
	}else if ($("#editdewcod").val()==""){
		$("#answerEditPrint").show();
		$("#answerEditPrint").html("Seleccione codigo dewey");
	}else if ($("#editlibtags").val()==""){ 
		$("#answerPrint").show();
		$("#answerPrint").html("Seleccione almenos un criterio de busqueda");
	}else {
		$("#answerEditPrint").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
		var url = "src/libs/insertProcess/updateBook.php";
						$.ajax({
							type: "POST",
							url: url,
							data: $("#formEditBook").serialize(),
							success: function (data){
								if (data==1) {
									//success
									$("#accionFeedback").show();
									$("#accionFeedback").html("<div class='alert alert-success' role='alert'> Libro correctamente actualizado </div>");
									 recargarTabla();
									 clearEditBook();
									setTimeout(
									   	function() {
									      $("#answerEditPrint").hide(500);
									      $("#accionFeedback").hide(500);
									      
									     
									}, 6000);
									$('#editBookModal').modal('hide');

								} else if (data==0) {
									//error
									$("#answerEditPrint").show();
									$("#answerEditPrint").html("<div class='alert alert-warning' role='alert'> Otro libro esta utilizando ese codigo ISBN </div>"); 
									 
									setTimeout(
									   	function() {
									      $("#answerEditPrint").hide(500);

									}, 6000);
									
								}	else{
									//errores inesperados
									$("#accionFeedback").show();
									$("#accionFeedback").html(data);

								}			
									
						}
						});

	}
}

function subirFotografia(){
   $("#errorMensaje").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
   var formData = new FormData($("#formFotografia")[0]);

  $.ajax({
   url: "src/libs/insertProcess/subirPortada.php",
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
     $("#formFotografia")[0].reset();
     $("#accionFeedback").show();
     $("#accionFeedback").html("<div class='alert alert-success' role='alert'> Portada actualizada </div>");
     setTimeout(
		function() {
		     
		      $("#accionFeedback").hide(500);		     
		}, 6000);
     $("#errorMensaje").hide(500);
     $("#errorMensaje").fadeOut();
	 $('#fotografiaModal').modal('hide');
    
    }
      },
    error: function(e) 
      {
    $("#errorMensaje").html(e).fadeIn();
    $("#errorMensaje").hide(500);
      }          
    });
}



function insertEditorial(){

	if ($("#modaleditnom").val()==""){
		$("#answerEditorialPrint").show();
		$("#answerEditorialPrint").html("Nombre de editorial vacio");
	}else if ($("#modaleditnom").val().length<"5"){
		$("#answerEditorialPrint").show();
		$("#answerEditorialPrint").html("Nombre de editorial demasiado corto");
	} else {
		$("#answerEditorialPrint").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
		var url = "src/libs/insertProcess/insertEditorial.php";
		$.ajax({
			type: "POST",
			url: url,
			data: $("#formNewEditorial").serialize(),
			success: function (data){								
					$("#answerEditorialPrint").show();
					$("#answerEditorialPrint").html(data);
					clearEditorial();
					reloadSelectEditoriales();
					reloadSelectEditorialesEditar();								
					setTimeout(
					   	function() {
					      $("#answerEditorialPrint").hide(500);
					      
					     
					}, 6000);


			}
		});
	}
}



function insertEditorial(){

	if ($("#modaleditnom").val()==""){
		$("#answerEditorialPrint").show();
		$("#answerEditorialPrint").html("Nombre de editorial vacio");
	} else {
		$("#answerEditorialPrint").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
		var url = "src/libs/insertProcess/insertEditorial.php";
		$.ajax({
			type: "POST",
			url: url,
			data: $("#formNewEditorial").serialize(),
			success: function (data){								
					$("#answerEditorialPrint").show();
					$("#answerEditorialPrint").html(data);
					clearEditorial();
					reloadSelectEditoriales();
					reloadSelectEditorialesEditar();								
					setTimeout(
					   	function() {
					      $("#answerEditorialPrint").hide(500);
					      
					     
					}, 6000);


			}
		});
	}
}

function insertAuthor(){

	if ($("#formautnom").val()==""){
		$("#answerAuthorPrint").show();
		$("#answerAuthorPrint").html("Nombre del Autor vacio");
	} else if ($("#formautape").val()==""){
		$("#answerAuthorPrint").show();
		$("#answerAuthorPrint").html("Apellido del Autor vacio");
	} else 
	if ($("#formautseud").val()==""){
		$("#answerAuthorPrint").show();
		$("#answerAuthorPrint").html("Pseudonimo del Autor vacio");
	} else {
		$("#answerAuthorPrint").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
		var url = "src/libs/insertProcess/insertAuthor.php";
		$.ajax({
			type: "POST",
			url: url,
			data: $("#formNewAuthor").serialize(),
			success: function (data){								
					$("#answerAuthorPrint").show();
					$("#answerAuthorPrint").html(data);
					clearAutor();
					reloadSelectAutores();
					reloadSelectAutoresEditar()
					setTimeout(
					   	function() {
					      $("#answerAuthorPrint").hide(500);
					      
					     
					}, 6000);


			}
		});
	}
}

function deleteBook(){

	if ($("#modallibcod").val()==""){
		$("#answerDeletePrint").show();
		$("#answerDeletePrint").html("Codigo de Libro necesario");
	}else {
		$("#answerDeletePrint").html('<img src="img/structures/replace.gif" style="max-width: 60%">').show(500);
		var url = "src/libs/insertProcess/deleteBook.php";
		$.ajax({
			type: "POST",
			url: url,
			data: $("#deleteForm").serialize(),
			success: function (data){
					if (data==1) {
						//sucess
						$("#accionFeedback").show();
						$("#accionFeedback").html("<div class='alert alert-success' role='alert'> El libro fue eliminado </div>");
						recargarTabla();
						setTimeout(
						   	function() {
						      $("#answerDeletePrint").hide(500);
						      $("#accionFeedback").hide(500);
						      
						}, 6000);
						$('#deleteBookModal').modal('hide');
					} else if (data==0) {
						$("#answerDeletePrint").show();
						$("#answerDeletePrint").html("<div class='alert alert-danger' role='alert'>Error al eliminar: el libro contiene ejemplares registrados </div>");
						recargarTabla();
						setTimeout(
						   	function() {
						      $("#answerDeletePrint").hide(500);
						      
						      
						}, 6000);

					} else{
						$("#answerDeletePrint").show();
						$("#answerDeletePrint").html(data);

					}			
					
			}
		});
	}
}

function reloadSelectEditoriales(){

		var url = "src/libs/insertProcess/reloadSelectEditoriales.php";
		$.ajax({
			type: "POST",
			url: url,
			data: $("#formNewBook").serialize(),
			success: function (data){							
					$("#insertarSelectEditorialNuevo").show();
					$("#insertarSelectEditorialNuevo").html(data);
					setSelect2();
			}

			
		});
	
}

function reloadSelectEditorialesEditar(){

		var url = "src/libs/insertProcess/reloadSelectEditorialesEditar.php";
		$.ajax({
			type: "POST",
			url: url,
			data: $("#formNewBook").serialize(),
			success: function (data){							
					$("#insertarSelectEditorialEditar").show();
					$("#insertarSelectEditorialEditar").html(data);
					setSelect2();
			}

			
		});
	
}

function reloadSelectAutores(){

		var url = "src/libs/insertProcess/insertSelectAuthor.php";
		$.ajax({
			type: "POST",
			url: url,
			data: $("#formNewBook").serialize(),
			success: function (data){							
					$("#insertarSelectAutorNuevo").show();
					$("#insertarSelectAutorNuevo").html(data);
					setSelect2();
			}

			
		});
	
}
function reloadSelectAutoresEditar(){

		var url = "src/libs/insertProcess/insertSelectAuthorEdit.php";
		$.ajax({
			type: "POST",
			url: url,
			data: $("#formNewBook").serialize(),
			success: function (data){							
					$("#insertarSelectAutorEditar").show();
					$("#insertarSelectAutorEditar").html(data);
					setSelect2();
			}

			
		});
	
}


function clearEditBook(){
	 document.getElementById("formEditBook").reset();

}

function clearAutor(){
	 document.getElementById("formNewAuthor").reset();

}

function clearEditorial(){
	 document.getElementById("formNewEditorial").reset();

}


function clearFormBook(){
	 document.getElementById("formNewBook").reset();

}

// convertir todos los select con class js-Dropdown-Busqueda en dropbowns con busqueda
function setSelect2(){

	$('.js-Dropdown-Busqueda').select2();
    $('.js-Dropdown-Busqueda').select2({
    theme: 'bootstrap4',

    });

}


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