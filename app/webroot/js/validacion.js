/**************Sub-coordinacion****************/
function addSubCoo()
{
	var parametros ={"nombre"	: document.getElementById('nombre').value};
	if(chequear(document.getElementById('ciudad')))
	if(chequearTexto(document.getElementById('ciudad')))
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(validacionAjax(document.getElementById('nombre'),parametros,'/ubv/ubvsub06s/validar_nombre'))
	if(chequear(document.getElementById('direccion')))
	if(chequearTexto(document.getElementById('direccion')))
	{
		document.getElementById('Ubvsub06AddForm').submit();
	}
}
function editSubCoo()
{
	var parametros ={	"nombre"	: document.getElementById('nombre').value,
						"id"		: document.getElementById('id').value,};
	if(chequear(document.getElementById('ciudad')))
	if(chequearTexto(document.getElementById('ciudad')))
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(validacionAjax(document.getElementById('nombre'),parametros,'/ubv/ubvsub06s/validar_nombre'))
	if(chequear(document.getElementById('direccion')))
	if(chequearTexto(document.getElementById('direccion')))
	{
		document.getElementById('Ubvsub06EditForm').submit();
	}
}

/*************Unidad administrativa************/
function addUad()
{
	var parametros ={
					"ubvsub06_id"	: document.getElementById('ubvsub06_id').value,
					"nombre"		: document.getElementById('nombre').value,
					"id"			: '',
					};
	if(validarSelect(document.getElementById('ubvsub06_id')))
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(validacionAjax(document.getElementById('nombre'),parametros,'/ubv/ubvuad09s/validar_nombre'))
	if(chequear(document.getElementById('telefono')))
	if(chequearTelef(document.getElementById('telefono')))
	{
		document.getElementById('Ubvuad09AddForm').submit();
	}
}
function editUad()
{
	var parametros ={
						"ubvsub06_id"	: document.getElementById('ubvsub06_id').value,
						"nombre"		: document.getElementById('nombre').value,
						"id"			: document.getElementById('id').value,};
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(validacionAjax(document.getElementById('nombre'),parametros,'/ubv/ubvuad09s/validar_nombre'))
	if(chequear(document.getElementById('telefono')))
	if(chequearTelef(document.getElementById('telefono')))
	{
		document.getElementById('Ubvuad09EditForm').submit();
	}
}

/*************Dependencia usuaria************/
function addDus()
{
	var parametros ={
						"Ubvsub06_id"	: document.getElementById('Ubvsub06_id').value,
						"ubvuad09_id"	: document.getElementById('ubvuad09_id').value,
						"nombre"		: document.getElementById('nombre').value,
						"id"			: '',
						
					};
	if(validarSelect(document.getElementById('ubvuad09_id')))
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(validacionAjax(document.getElementById('nombre'),parametros,'/ubv/ubvdus10s/validar_nombre'))
	{
		document.getElementById('Ubvdus10AddForm').submit();
	}
}

function editDus()
{
	var parametros ={
						"Ubvsub06_id"	: document.getElementById('Ubvsub06_id').value,
						"ubvuad09_id"	: document.getElementById('ubvuad09_id').value,
						"nombre"		: document.getElementById('nombre').value,
						"id"			: document.getElementById('id').value,};
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(validacionAjax(document.getElementById('nombre'),parametros,'/ubv/ubvdus10s/validar_nombre'))
	{
		document.getElementById('Ubvdus10EditForm').submit();
	}
}
//inventario de dependencia usuaria
function invDus()
{
	if(validarSelect(document.getElementById('ubvsub06_id')))
	if(validarSelect(document.getElementById('ubvuad09_id')))
	if(validarSelect(document.getElementById('ubvdus10_id2')))
	{
		document.getElementById('Ubvdus10PdfInventarioForm').submit();
	}
}

/*************Bienes************/
function addBie()
{
	var parametros ={"codigo"	: document.getElementById('codigo').value};
	if(validarSelect(document.getElementById('ubvdus10_id')))
	if(validarSelect(document.getElementById('Ubvcat04s')))
	if(validarSelect(document.getElementById('ubvden08_id')))
	if(validarSelect(document.getElementById('ubvmar01_id')))
	if(validarSelect(document.getElementById('ubvdtm07_id')))
	if(chequear(document.getElementById('fecha')))
	if(chequearLongitudFecha(document.getElementById('fecha')))
	if(chequear(document.getElementById('codigo')))
	if(chequearNumero(document.getElementById('codigo')))
	if(reemplezarTodo(document.getElementById('codigo'),'.',''))
	if(reemplezarTodo(document.getElementById('codigo'),',',''))
	if(chequearNumero(document.getElementById('codigo')))
	if(validacionAjax(document.getElementById('codigo'),parametros,'/ubv/ubvbie12s/validar_nombre'))
	if(chequear(document.getElementById('monto')))
	if(chequearNumero(document.getElementById('monto')))
	{
		guardarBienAjax();
	}
}
function editBie()
{
	if(validarSelect(document.getElementById('ubvden08_id')))
	if(chequear(document.getElementById('monto')))
	if(chequearNumero(document.getElementById('monto')))
	{
		document.getElementById('Ubvbie12EditForm').submit();
	}
	
}

/*************Marca************/
function addMar()
{
	document.getElementById('nombre').value=document.getElementById('nombre').value.toUpperCase();
	var parametros ={"nombre"	: document.getElementById('nombre').value};
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(validacionAjax(document.getElementById('nombre'),parametros,'/ubv/ubvmar01s/validar_nombre'))
	{
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
function addMarPri()
{
	var parametros ={"nombre"	: document.getElementById('nombre').value};
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(validacionAjax(document.getElementById('nombre'),parametros,'/ubv/ubvmar01s/validar_nombre'))
	{
		document.getElementById('Ubvmar01AddPrincipalForm').submit();
	}
	
}
function editMar()
{
	var parametros ={	"nombre"	: document.getElementById('nombre').value,
						"id"		: document.getElementById('id').value,};
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(validacionAjax(document.getElementById('nombre'),parametros,'/ubv/ubvmar01s/validar_nombre'))
	{
		document.getElementById('Ubvmar01EditForm').submit();
	}
}

/*************usuarios************/
function addUser()
{
	var parametros ={"username"	: document.getElementById('username').value};
	if(validarSelect(document.getElementById('ubvper11_id')))
	if(chequear(document.getElementById('username')))
	if(chequearTexto(document.getElementById('username')))
	if(chequearUser(document.getElementById('password')))
	if(chequearTextoUser(document.getElementById('password')))
	if(longitudPassword(document.getElementById('password')))
	if(chequearUser(document.getElementById('password2')))
	if(chequearTextoUser(document.getElementById('password2')))
	if(longitudPassword(document.getElementById('password2')))
	if(compararPassword(document.getElementById('password'),document.getElementById('password2')))
	if(validacionAjax(document.getElementById('username'),parametros,'/ubv/users/validar_nombre'))
	{
		document.getElementById('UserAddForm').submit();
	}
}
function editUser()
{
	var parametros ={"username"	: document.getElementById('username').value,
					 "id"		: document.getElementById('id').value,};
	if(chequear(document.getElementById('username')))
	if(chequearTexto(document.getElementById('username')))
	if(chequearUser(document.getElementById('password')))
	if(chequearTextoUser(document.getElementById('password')))
	if(longitudPassword(document.getElementById('password')))
	if(chequearUser(document.getElementById('password2')))
	if(chequearTextoUser(document.getElementById('password2')))
	if(longitudPassword(document.getElementById('password2')))
	if(compararPassword(document.getElementById('password'),document.getElementById('password2')))
	if(validacionAjax(document.getElementById('username'),parametros,'/ubv/users/validar_nombre'))
	{
		//alert(document.getElementById('username').value);
		//alert(document.getElementById('password').value);
		document.getElementById('UserEditForm').submit();
	}
}



/*************Personal************/
function addPer()
{
	var parametros ={"cedula"	: document.getElementById('cedula').value};
	if(validarSelect(document.getElementById('ubvsub06s')))
	if(validarSelect(document.getElementById('ubvuad09_id')))
	if(validarSelect(document.getElementById('ubvdus10_id2')))
	if(validarSelect(document.getElementById('ubvcar05_id2'))) 
	if(chequear(document.getElementById('cedula')))
	if(chequearNumero(document.getElementById('cedula')))
	if(reemplezarTodo(document.getElementById('cedula'),'.',''))
	if(reemplezarTodo(document.getElementById('cedula'),',',''))
	if(reemplezarTodo(document.getElementById('cedula'),'*',''))
	if(chequearCi(document.getElementById('cedula')))
	if(validacionAjax(document.getElementById('cedula'),parametros,'/ubv/ubvper11s/validar_nombre'))
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(chequear(document.getElementById('telefono')))
	if(chequearTelef(document.getElementById('telefono')))
	{
		document.getElementById('ubvcar05_id').value=document.getElementById('ubvcar05_id2').value;
		document.getElementById('ubvdus10_id').value=document.getElementById('ubvdus10_id2').value;
		document.getElementById('Ubvper11AddForm').submit();
	}
}

function editPer()
{
	var parametros ={	"cedula"	: document.getElementById('cedula').value,
						"id"		: document.getElementById('id').value,};
	var idvar='';
	var idcar='';
	if(document.getElementById('ubvdus10_id'))
	{
		idvar=document.getElementById('ubvdus10_id').id;
	}else if(document.getElementById('ubvdus10_id2'))
	{
		idvar=document.getElementById('ubvdus10_id2').id;quitarMensaje();
	}
	else
	{
		if(validarSelect(document.getElementById('ubvuad09_id'))){}
	}
	if(document.getElementById('ubvcar05_id3'))
	{
		idcar=document.getElementById('ubvcar05_id3').id;
	}else if(document.getElementById('ubvcar05_id2'))
	{
		idcar=document.getElementById('ubvcar05_id2').id;
	}
	if(validarSelect(document.getElementById(idvar)))
	if(validarSelect(document.getElementById(idcar)))
	if(chequear(document.getElementById('cedula')))
	if(reemplezarTodo(document.getElementById('cedula'),'.',''))
	if(chequearCi(document.getElementById('cedula')))
	if(validacionAjax(document.getElementById('cedula'),parametros,'/ubv/ubvper11s/validar_nombre'))
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(chequear(document.getElementById('telefono')))
	if(chequearTelef(document.getElementById('telefono')))
	{

		//document.getElementById('ubvdus10_id').value=document.getElementById('ubvdus10_id2').value;
		document.getElementById('ubvcar05_id').value=document.getElementById(idcar).value;
		document.getElementById('Ubvper11EditForm').submit();
	}
}

/*************Movimiento************/
function addMov()
{
	if(validarSelect(document.getElementById('ubvtmv02s')))
	if(validarSelect(document.getElementById('ubvdtm07_id2')))
	if(validarSelect(document.getElementById('ubvsub06s')))
	if(validarSelect(document.getElementById('ubvuad09_id')))
	if(validarSelect(document.getElementById('ubvdus10_id2')))
	if(chequearConfila(document.getElementById('indiceFila')))
	if(validarSelect(document.getElementById('ubvsub06s2')))
	if(validarSelect(document.getElementById('ubvuad09_id2')))
	if(validarSelect(document.getElementById('ubvdus10_id')))
	if(comparar(document.getElementById('ubvdus10_id'),document.getElementById('ubvdus10_id2')))
	{
		document.getElementById('ubvdtm07_id').value=document.getElementById('ubvdtm07_id2').value;
		document.getElementById('Ubvdus10').value=document.getElementById('ubvdus10_id2').value;
		document.getElementById('Ubvmov13AddForm').submit();
	}
}
function repMovM()
{
	
	if(validarSelect(document.getElementById('ubvsub06s2')))
	if(validarSelect(document.getElementById('ubvuad09_id')))
	if(validarSelect(document.getElementById('depend')))
	if(validarSelect(document.getElementById('ano')))
	if(validarSelect(document.getElementById('mes')))
	{
		document.getElementById('Ubvmov13PdfMensualForm').submit();
	}
}
function repCanBie()
{
	if(validarSelect(document.getElementById('Ubvsub06')))
	if(validarSelect(document.getElementById('Ubvcat04')))
	if(validarSelect(document.getElementById('ubvden08_id')))
	{
		document.getElementById('Ubvbie12PdfCantidadForm').submit();
	}
}
function lisDepUsu()
{
var parametros =
		{
			"ubvuad09_id"	: document.getElementById('ubvuad09_id').value
		};
        $.ajax({
                data	:  parametros,
               	url		:   '/ubv/ubvdus10s/listDusper',
                type	:  'post',
                success	:  function (response) {
                        $("#dus").html(response);
                }
        });

}

function listCargo()
{
var parametros =
		{
			"ubvdus10_id2"	: document.getElementById('ubvdus10_id2').value,
			"carOculto"	: document.getElementById('carOculto').value
		};
        $.ajax({
                data	:  parametros,
               	url		:   '/ubv/ubvcar05s/listCargo',
                type	:  'post',
                success	:  function (response) {
                        $("#cargo").html(response);
                }
        });


}
function lisDepUsu2()
{
var parametros =
		{
			"ubvuad09_id"	: document.getElementById('ubvuad09_id').value
		};
        $.ajax({
                data	:  parametros,
               	url		:   '/ubv/ubvdus10s/listDusmovorigen',
                type	:  'post',
                success	:  function (response) {
                        $("#dus").html(response);
                }
        });


}


function listarDus()
{
	var ubvdus10_id2='';
	if(document.getElementById('ubvdus10_id2'))
	{
		ubvdus10_id2=document.getElementById('ubvdus10_id2').value;
	}
var parametros =
		{
			"ubvuad09_id2"	: document.getElementById('ubvuad09_id2').value,
			"ubvdus10_id2"	: ubvdus10_id2
		};
        $.ajax({
                data	:  parametros,
               	url		:   '/ubv/ubvdus10s/listDusmovdestino',
                type	:  'post',
                success	:  function (response) {
                        $("#destino").html(response);
                }
        });

}


function depUsuD()
{
	
var parametros =
		{
			//"ubvuad09_id2"	: document.getElementById('ubvuad09_id2').value,
			"ubvdus10_id2"	: document.getElementById('ubvdus10_id2').value
		};
        $.ajax({
                data	:  parametros,
               	url		:   '/ubv/ubvmov13s/depDestino',
                type	:  'post',
                success	:  function (response) {
                        $("#bienes").html(response);
                }
        });

}


function lisUadD()
{
var parametros =
		{
			"ubvsub06s2"	: document.getElementById('ubvsub06s2').value
		};
        $.ajax({
                data	:  parametros,
               	url		:   '/ubv/ubvuad09s/listMovd',
                type	:  'post',
                success	:  function (response) {
                        $("#UadD").html(response);
                }
        });


}
function lisSub()
{
var parametros =
		{
			"ubvdus10_id2"	: document.getElementById('ubvdus10_id2').value
		};
        $.ajax({
                data	:  parametros,
               	url		:   '/ubv/ubvsub06s/listSub',
                type	:  'post',
                success	:  function (response) {
                        $("#contentDestino").html(response);
                }
        });


}


function validacionAjax(campo,parametros,url)
{
	var respuesta='';
	$('#container #content #repetido').remove();
	document.getElementById(campo.id).value=trim(document.getElementById(campo.id).value);
		 $.ajax({
                data	:  parametros,
				dataType: "json",
				async 	:false,
               	url		:   url,
                type	:  'post',
                success	:  function (response) {
						respuesta=response.estado;
						if (respuesta==false){
							$('#container #content #'+campo.id+'').after('<div class="repetido" id="repetido">Campo repetido</div></div>');
							 document.getElementById(campo.id).focus();
						}else $('#container #content #repetido').remove();
                }
        });
	return respuesta;
}
function enviar(parametro)
{
	document.getElementById("Ubvbie12AddForm").action="/ubv/ubvbie12s/pdfAsignacion/"+parametro;
	document.getElementById("Ubvbie12AddForm").submit();
}

function indexBuscarBien()
{
	document.getElementById("Ubvbie12IndexForm").submit();
}