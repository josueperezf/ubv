<script> document.getElementById('indiceFila').value=0; </script>
<div style="width:40%">
<?php
	echo $this->Form->input('codigo',array('label'=>'<b>Codigo</b>','type'=>'text','id'=>'codigo','placeholder'=>'Codigo a buscar'));
?>
<input type="button" name="bb" value="Buscar bien" id="bb" onclick="buscarUnBien();">
</div>
<table cellpadding="0" cellspacing="0" id="tablaDinamica" border="0">
	<tr>
		<th>Codigo</th>
        <th>Denominacion</th>
        <th>Accion</th>
    </tr>
</table>
<div id="listadoBienes"></div>	
	<div id="divBuscarBien"></div>