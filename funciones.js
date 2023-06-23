function validarFormulario() {
	// Obtener los valores de los campos
	var nombre = document.getElementById("nombre").value.trim();
	var alias = document.getElementById("alias").value.trim();
	var rut = document.getElementById("rut").value.trim();
	var email = document.getElementById("email").value.trim();
	var region = document.getElementById("region").value;
	var comuna = document.getElementById("comuna").value;
	var candidato = document.getElementById("candidato").value;
	var enteradoDe = document.querySelectorAll('input[name="enteradoDe[]"]:checked');
	var web = document.getElementById("web");
	var tv = document.getElementById("TV");
	var redes_sociales = document.getElementById("redes_sociales");
	var amigo = document.getElementById("amigo");

	if(web.checked){
		web="S";
	}
	else{
		web="N";
	}
	if(tv.checked){
		tv="S";
	}else{
		tv="N";
	}
	if(redes_sociales.checked){
		redes_sociales="S";
	}else{
		redes_sociales="N";
	}
	if(amigo.checked){
		amigo="S";
	}else{
		amigo="N";
	}


	// Validar Nombre y Apellido (No debe estar en blanco)
	if (nombre === "") {
		alert("Por favor, ingresa tu Nombre y Apellido.");
		return false;
	}

	// Validar Alias (debe tener más de 5 caracteres y contener letras y números)
	if (alias.length < 5 || !alias.match(/^[a-zA-Z0-9]+$/)) {
		alert("El Alias debe tener al menos 5 caracteres y contener solo letras y números.");
		return false;
	}

	// Validar RUT (Formato Chile)
	if (!validarRut(rut)) {
		alert("Por favor, ingresa un RUT válido (Formato: 12345678-9).");
		return false;
	}

	// Validar Email (Formato estándar)
	if (!validarEmail(email)) {
		alert("Por favor, ingresa un correo electrónico válido.");
		return false;
	}

	// Validar Región y Comuna (No deben quedar en blanco)
	if (region === "" || comuna === "") {
		alert("Por favor, selecciona una Región y una Comuna.");
		return false;
	}

	// Validar Candidato (No debe quedar en blanco)
	if (candidato === "") {
		alert("Por favor, selecciona un Candidato.");
		return false;
	}

	// Validar "Cómo se enteró de nosotros" (Debe elegir al menos dos opciones)
	if (enteradoDe.length < 2) {
		alert("Por favor, selecciona al menos dos opciones en '¿Cómo se enteró de nosotros?'.");
		return false;
	}

	$.ajax({
		url:"subir.php",
		type:"GET",
		async:false,
		data:{
			accion:"Buscar",
			rut: rut
		},
		dataType:"json",
		success:function(data){
			$.each(data,function(index,dato){
				if(dato.cantidad==0)
				{
					subir_info(nombre,alias,
						rut,
						email,
						region,
						comuna,
						candidato,
						web,
						tv,
						redes_sociales,
						amigo
						);

				}
				else{
					alert("El rut ingresado ya cuenta con registro de votacion")
				}
			});
		}

	});

	
	
	return true;
}
function subir_info(nombre,alias,
	rut,
	email,
	region,
	comuna,
	candidato,
	web,
	tv,
	redes_sociales,
	amigo)
{
	$.ajax({
		url:"subir.php",
		type:"GET",
		async:false,
		data:{
			accion:"Subir",
			nombre: nombre,
			alias: alias,
			rut: rut,
			email: email,
			region:region,
			comuna:comuna,
			candidato: candidato,
			web: web,
			tv: tv,
			redes_sociales: redes_sociales,
			amigo: amigo
		},
		dataType:"json",
		success:function(data){
			alert(data);
		}
	});
}

// Función para validar el formato de RUT (Chile)
function validarRut(rut) {
	var suma = 0;
	var caracteres = "1234567890K";
	var peso = [3, 2, 7, 6, 5, 4, 3, 2];
	
	// Eliminar puntos y guiones del RUT
	rut = rut.replace(/[.-]/g, "");
	
	// Validar que el RUT tenga el formato correcto
	if (!/^[0-9]{7,8}[Kk0-9]$/.test(rut)) {
		return false;
	}
	
	// Validar el dígito verificador
	var digitoVerificador = rut.charAt(rut.length - 1);
	rut = rut.substring(0, rut.length - 1);
	
	
	return (digitoVerificador.toUpperCase() == digito(rut));
}
function digito(T) 
{
	var M=0,S=1;
	for(;T;T=Math.floor(T/10))
			S=(S+T%10*(9-M++%6))%11;     
	return S?S-1:'K';  
}

// Función para validar el formato de Email
function validarEmail(email) {
	var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	return pattern.test(email);
}

function comunas()
{
	var element =document.getElementById("region");

	var regiones = element.selectedIndex;

	var comunas = document.getElementById("comuna");
	for (var i = comunas.options.length - 1; i > 0; i--) {
		comunas.remove(i);
	}

	if(regiones>0)
	{
		$.ajax({
			url:"funciones.php",
			method:"GET",
			data:{accion:"Comuna",region:regiones},
			dataType:"json",
			success: function(data){
				var selectComuna = $("#comuna");
				$.each(data, function(index,comuna){
					selectComuna.append($("<option></option>")
					.attr("value",comuna.Id_Comuna)
					.text(comuna.Nombre));
				});
			},
			error:function(){
				alert("Ocurrio un error al obtener las comunas")
			}

		});
	}
}