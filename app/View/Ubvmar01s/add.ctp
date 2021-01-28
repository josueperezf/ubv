<script>
//$( "#ejemplo" ).draggable();
$("#ejemplo").draggable();
</script>
<div id="ejemplo" style="box-shadow: 5px 5px 10px #999999; border-radius:10px;" class="ui-widget-content">
<h3 class="titulo" style="width:auto; border-radius:7px 7px 0px 0px; box-shadow:none;">Nueva marca</h3>
<div align="center" style="padding-top:10px;">
<?php echo $this->Form->create('Ubvmar01');
		echo $this->Form->input('nombre',array('id'=>'nombre','title'=>'La marca no puede estar vacia','autofocus'=>'autofocus','style'=>'width:120px'));
		?>
    <!--<input type="button" name="Guardar" value="Guardar" onclick="registrarMarca()">-->
    <input type="button" name="guardar" value="Guardar" onclick="addMar()">
    <input type="button" name="Cancelar" value="Cancelar" onclick="ocultar('ejemplo')">
<?php
	echo $this->Form->end(); ?>
<br />
</div>
</div>