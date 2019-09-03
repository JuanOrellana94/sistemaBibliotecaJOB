

function enter(e){
	tecla=(document.all) ? e.keyCode : e.which;
	if (tecla==13){
		checkUser();
	};
}

function checkUser(){

	if ($("#usuAccNombre").val()==""){
		$("#infoCheck").show();
		$("#infoCheck").html("Ingrese sus credenciales de acceso");
	} else if ($("#usuAccNombre").val().length<"5"){
		$("#infoCheck").show();
		$("#infoCheck").html("Usuario invalido");
	} else if ($("#usuContrasena").val()==""){
		$("#infoCheck").show();
		$("#infoCheck").html("Ingrese su contraseña");
	}else if ($("#usuContrasena").val().length<"5"){
		$("#infoCheck").show();
		$("#infoCheck").html("Contraseña invalida");
	}else {
		$("#infoCheck").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
		var url = "src/libs/sessionControl/checkEntry.php";
						$.ajax({
							type: "POST",
							url: url,
							data: $("#formRevisar").serialize(),
							success: function (data){

								if(data=="0"){
									$("#infoCheck").removeClass("callout callout-success");
									$("#infoCheck").addClass("callout callout-danger");
									$("#infoCheck").html("<i class='fa fa-warning'></i> Usuario o Contraseña Incorrecto").show(500);
								}
								else if(data=="1"){
									$("#infoCheck").removeClass("callout callout-danger");
									$("#infoCheck").html(' Bienvenido <br> <img src="img/structures/replace.gif" style="max-width: 50%"> ').show(500);	
									setTimeout(function cerrar(){
										redirect();
									}, 2000);}
								else if(data=="1r"){
									$("#infoCheck").removeClass("callout callout-danger");
									$("#infoCheck").html(' Bienvenido <br> <img src="img/structures/replace.gif" style="max-width: 50%"> ').show(500);	
									setTimeout(function cerrar(){
										renewPassword();
									}, 2000);}
								else if(data=="2"){
									$("#infoCheck").removeClass("callout callout-success");
									$("#infoCheck").addClass("callout callout-danger");
									$("#infoCheck").html("<i class='fa fa-warning'></i> Cuenta desactivada").show(500);
								}
								else if(data=="3"){
									$("#infoCheck").removeClass("callout callout-success");
									$("#infoCheck").addClass("callout callout-danger");
									$("#infoCheck").html("<i class='fa fa-warning'></i> Cuenta bloqueada").show(500);
								} if(data=="4"){
									$("#infoCheck").removeClass("callout callout-danger");
									$("#infoCheck").html(' Bienvenido <br> <img src="img/structures/replace.gif" style="max-width: 50%"> ').show(500);	
									setTimeout(function cerrar(){
										rediConsulta();
									}, 2000);}
											
							}
					});
	}
}

//Funcion para confirmar nueva contraseña #FORMULARIO RENOVAR CONFIRMAR
function checkRenew(){

	if ($("#usuContrasena").val()==""){
		$("#infoCheck").show();
		$("#infoCheck").html("Ingrese una contraseña");
	} else if ($("#usuContrasena").val().length<"5"){
		$("#infoCheck").show();
		$("#infoCheck").html("Su contraseña es muy corta");
	} else if ($("#usuContrasenadupe").val()==""){
		$("#infoCheck").show();
		$("#infoCheck").html("Confirme su contraseña");
	} else if ($("#usuContrasenadupe").val().length<"5"){
		$("#infoCheck").show();
		$("#infoCheck").html("Su contraseña es muy corta");
	}  else if ($("#usuContrasena").val()!=$("#usuContrasenadupe").val()){
		$("#infoCheck").show();
		$("#infoCheck").html("Las contraseñas no coinciden");
	} else {
		$("#infoCheck").html('<img src="../img/structures/replace.gif" style="max-width: 50%">').show(500);
		var url = "../src/libs/sessionControl/updatePass.php";
						$.ajax({
							type: "POST",
							url: url,
							data: $("#formRevisar").serialize(),
							success: function (data){
								if(data=="success"){
									$("#infoCheck").removeClass("callout callout-danger");
									$("#infoCheck").html(' Contraseña actualizada <br> <img src="../img/structures/replace.gif" style="max-width: 50%"> ').show(500);	
									setTimeout(function cerrar(){
										 cerrarSession();
									}, 2000);} 
								else if (data=="0"){
									$("#infoCheck").removeClass("callout callout-success");
									$("#infoCheck").addClass("callout callout-danger");
									$("#infoCheck").html(" No puedes utilizar esa contraseña").show(500);
								} else {
									$("#infoCheck").removeClass("callout callout-success");
									$("#infoCheck").addClass("callout callout-danger");
									$("#infoCheck").html(" meit dis bad").show(500);
								}
							}
					});
	}
}



function redirect(){

	window.location = "escritorio.php";

}


function renewPassword(){

	window.location = "pages/ConfirmarClave.php";

}



//Funcion para cerrar sesion en la pantalla de actualizar contraseña
function cerrarSession(){
	var url="../src/libs/sessionControl/sesionCerrar.php";

	$.ajax({
		type: "POST",
		url: url,
		data: "valor="+1,
		success: function(data){
			
				window.location = "../inicio.php";
			
			
		}
	});
}

function cerrar(){
	var url="src/libs/sessionControl/sesionCerrar.php";

	$.ajax({
		type: "POST",
		url: url,
		data: "valor="+1,
		success: function(data){

			window.location = "menuopt.php";
			
			
		}
	});
}