$(document).ready(function(e) {
	$('#cargando').ajaxStart(function() {
		$('#cargando').fadeIn();
		//alert('entro');
        //$('this').fadeOut();
    });
	$('#cargando').ajaxStop(function() {
        $('#cargando').fadeOut();
    });
});
function chequearConfila(k)
{
	if(k.value<1)
	{
	$('#container #content #mensaje').removeClass('message').addClass('message');
	$('#container #content .error-message').remove();
		document.getElementById("mensaje").innerHTML="Se debe seleccionar algun bien para mover";
		return false;
	}else
	{
		quitarMensaje();
		return true;
	}
}
function comparar(k,j)
{
	if(k.value==j.value)
	{
		$('#container #content #mensaje').removeClass('message').addClass('message');
		$('#container #content .error-message').remove();
		document.getElementById("mensaje").innerHTML="las dependencias usuarias origen y destino no pueden ser iguales";
		return false;
	}else
	{
		quitarMensaje();
		return true;
	}
}
function compararPassword(k,j)
{
	if(k.value!=j.value)
	{
		colocarMensaje(k, 'Password y confirmar password deben ser iguales');
		k.focus();
		return false;
	}else{
		quitarMensaje();
		return true;}
}
function longitudPassword(k)
{
	if(k.value.length<6)
	{
		colocarMensaje(k, 'Debe contener al menos 6 caracteres');
		k.focus();
		return false;
	}else{
		quitarMensaje();
		return true;}
}
function chequearNumero(k)
{
	if(isNaN(k.value))
	{
		document.getElementById(k.id).value='';
		colocarMensaje(k, 'Este campo debe contener solo numeros');
		k.focus();
		return false;
	}
	else{
		quitarMensaje();
		return true;}
}
function reemplezarTodo(text, busca, reemplaza)
{
	while (text.value.toString().indexOf(busca) != -1)
	text.value = text.value.toString().replace(busca,reemplaza);
	document.getElementById(text.id).value=text.value;
	return true;
}

function chequearTelef(k){
if( !(/^\d{4}-\d{7}$/.test(k.value)) ) {
			colocarMensaje(k, 'Lo Sentimos: telefono invalido, formato es: 0000-0000000');
		 k.focus();
		 return false;
  }else{
		quitarMensaje();
		return true;
	  }
}

function chequearCi(k){
	if(k.value<2000000) {
			colocarMensaje(k, 'Lo Sentimos: cedula invalida');
		 k.focus();
		 return false;
  }else{
		quitarMensaje();
		return true;
	  }
}

function colocarMensaje(campo, texto)
{
	$('#container #content #mensaje').removeClass('message').addClass('message');
	$('#container #content .error-message').remove();
	document.getElementById("mensaje").innerHTML="Ha ocurrido un error, por favor verifica";
	$('#container #content #'+ campo.id+'').after('<div class="error-message">'+texto+'</div></div>');
}
function quitarMensaje()
{
	$('#container #content #mensaje').removeClass('message');
	$('#container #content .error-message').remove();
	document.getElementById("mensaje").innerHTML='';
}
function chequear(k)
{
cadena = k.value;
cadena = cadena.replace(/(^\s*)|(\s*$)/g,""); 
$('#container #content #repetido').remove();
document.getElementById(k.id).value=trim(document.getElementById(k.id).value).toUpperCase();
	if(cadena.length==0)
	{
		colocarMensaje(k, 'Este campo no puede estar vacio');
		k.focus();
	 	return false;
	}else{
		quitarMensaje();
		return true;
	}
}//fin de funcion chequear
function chequearUser(k)
{
cadena = k.value;
cadena = cadena.replace(/(^\s*)|(\s*$)/g,""); 
$('#container #content #repetido').remove();
document.getElementById(k.id).value=trim(document.getElementById(k.id).value);
	if(cadena.length==0)
	{
		colocarMensaje(k, 'Este campo no puede estar vacio');
		k.focus();
	 	return false;
	}else{
		quitarMensaje();
		return true;
	}
}//fin de funcion chequear
function chequearTexto(k)
{//usado para verificar  que la cadena solo texo
document.getElementById(k.id).value = k.value.toUpperCase();
document.getElementById(k.id).value=trim(document.getElementById(k.id).value);

	if(!isNaN(k.value))
	{
		colocarMensaje(k, 'Este campo debe contener texto');
		k.focus();
		return false;
	
	}else{
		quitarMensaje();
		return true;
	}
}
function chequearTextoUser(k)
{//usado para verificar  que la cadena solo texo
document.getElementById(k.id).value=trim(document.getElementById(k.id).value);

	if(!isNaN(k.value))
	{
		colocarMensaje(k, 'Este campo debe contener texto');
		k.focus();
		return false;
	
	}else{
		quitarMensaje();
		return true;
	}
}
function chequearNumero(k)
{//usado para verificar  que la cadena solo texo
document.getElementById(k.id).value = k.value.toUpperCase();
document.getElementById(k.id).value=trim(document.getElementById(k.id).value);

	if(isNaN(k.value))
	{
		colocarMensaje(k, 'Este campo debe contener solo numero');
		k.focus();
		return false;
	
	}else{
		quitarMensaje();
		return true;
	}
}

function trim(cadena)
{
	for(i=0; i<cadena.length; )
	{
		if(cadena.charAt(i)==" ")
			cadena=cadena.substring(i+1, cadena.length);
		else
			break;
	}

	for(i=cadena.length-1; i>=0; i=cadena.length-1)
	{
		if(cadena.charAt(i)==" ")
			cadena=cadena.substring(0,i);
		else
			break;
	}
	return cadena;
}



function chequearLongitudFecha(k)
{//usado para verificar si la fecha esta bien escrita.
	if(k.value.length<10)
	{
		colocarMensaje(k,"Fecha invalida, seleccione de nuevo");
	 k.focus();
	 return false;
	}else{
		quitarMensaje();
		return true;
	}
}

function validarSelect(k)// funcion para validar los Select...!
{
	if(k.value==0 || k.value=='')
	{
		colocarMensaje(k,"Algun elemento de la lista debe ser seleccionado");
		k.focus();return false;
	}else
	{
		quitarMensaje();
		return true;
	}
}


/*se vaaaaaaaaaaaaaaaaaaaaaaaaaaa*/
function registrarMarca()
{
	if(chequear(document.getElementById('nombre')))
	if(campoRepetido(document.getElementById('concatenados'),document.getElementById('nombre')))
	{
		var parametros =
		{
			"nombre"	: document.getElementById('nombre').value
		};
        $.ajax({
                data:  parametros,
               url:   '/ubv/ubvmar01s/add',
                type:  'post',
                success:  function (response) {
                        $("#divMarca").html(response);
						ocultar('ejemplo');
                }
        });
	}
}

function removerFoco()
{
	document.getElementById('fecha').blur();
}
function mMensaje(texto)
{
	$('#container #content #mensaje').removeClass('message').addClass('message');
	$('#container #content .error-message').remove();
	document.getElementById("mensaje").innerHTML=texto;
}
function ocultar(id)
{
	$('#'+id+'').slideUp();	
}
function cargarBuscarBien()
{
		var parametros =
		{
			"ubvdus10_id"	: document.getElementById('ubvdus10_id').value
		};
		if(document.getElementById('ubvdus10_id').value!=0)
		{
			$("#divBuscarBien").fadeIn();
			$.ajax({
                data:  parametros,
               	url:   '/ubv/ubvbie12s/buscarBien',
                type:  'post',
                success:  function (response) {
                        $("#divBuscarBien").html(response);
                }
        	});
		}else
		{
			$("#divBuscarBien").fadeOut();
		}
}
function buscarUnBien()
{
		var parametros= $('#Ubvmov13AddForm').serialize();
		//alert(parametros);
        $.ajax({
                data:  parametros,
               url:   '/ubv/ubvbie12s/consultarBien',
                type:  'post',
                success:  function (response) {
                        $("#listadoBienes").html(response);
                }
        });

}