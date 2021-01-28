function guardarBienAjax()
{
	var parametros =
		{
			"ubvden08_id"	: document.getElementById('ubvden08_id').value,
			"ubvdus10_id" 	: document.getElementById('ubvdus10_id').value,
			"ubvmar01_id" 	: document.getElementById('ubvmar01_id').value,
			"ubvdtm07_id" 	: document.getElementById('ubvdtm07_id').value,
			"codigo" 		: document.getElementById('codigo').value,
			"serial" 		: document.getElementById('serial').value,
			"monto" 		: document.getElementById('monto').value,
			"fecha" 		: document.getElementById('fecha').value,
			"bandera" 		: document.getElementById('bandera').value,
			"descripcion" 	: document.getElementById('descripcion').value
		};
        $.ajax({
                data	:  parametros,
               	url		:   '/ubv/ubvbie12s/addAjax',
                type	:  'post',
                success	:  function (response) {
                        $("#camposDinamicos").html(response);
                }
        });
}
