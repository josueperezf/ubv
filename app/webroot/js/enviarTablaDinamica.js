$(document).ready(function(e) {
		$('#container #content #bienesMover').removeClass('ocultar');
		indiceFila=document.getElementById('indiceFila').value;
		id=document.getElementById('id').value;
		codigo=document.getElementById('codigo').value;
		document.getElementById('codigo').value='';
		nombreD=document.getElementById('nombreD').value;
		if(id)if(codigo)if(nombreD)

			 addFila(codigo, nombreD, id);
});
function addFila(codigo, nombreD, id)
{
	indiceFilaFormulario=document.getElementById('indiceFila').value;
	//alert('indice  '+indiceFilaFormulario);
	myNewRow = document.getElementById("tablaDinamica").insertRow(-1);
	myNewRow.id=indiceFilaFormulario;
	myNewCell=myNewRow.insertCell(-1);
	
		
	myNewCell.innerHTML="<td>"+codigo+"</td>";
	myNewCell=myNewRow.insertCell(-1);
	myNewCell.innerHTML="<td>"+nombreD+"</td>";
	myNewCell=myNewRow.insertCell(-1);
	myNewCell.innerHTML="<td><input type='button' value='Eliminar' onClick='removeFila(this);'><input type='hidden' id='idarray["+id+"]' name='idarray["+id+"]' value='"+id+"'><input type='hidden' id='codigoarray["+codigo+"]' name='codigoarray["+codigo+"]' value='"+codigo+"'></td>";
	//myNewCell=myNewRow.insertCell(-1);

//alert("id   "+id);
//alert("con indice         :  "+document.getElementById('idarray['+id+']').value);
	document.getElementById('indiceFila').value++;
	
	
}

function removeFila(obj){
var oTr = obj;
while(oTr.nodeName.toLowerCase()!='tr'){
oTr=oTr.parentNode;
}
var root = oTr.parentNode;
root.removeChild(oTr);
document.getElementById('indiceFila').value--;
}