<?php
if($bien=='')
	$this->Mensaje->campoMensaje('codigo','Este codigo no ha sido encontrado en la dependencia usuaria seleccionada');
elseif($bien==3)
	$this->Mensaje->campoMensaje('codigo','Ya se encuentra en la lista');
elseif($bien!='') 
{
?>
<input type="hidden" name="id" id="id" value="<?php echo $bien['Ubvbie12']['id'];?>">
<input type="hidden" name="codigo" id="codigo" value="<?php echo $bien['Ubvbie12']['codigo'];?>">
<input type="hidden" name="nombreD" id="nombreD" value="<?php echo $bien['Ubvden08']['nombre'];?>">
<?php 
echo $this->Html->script(array('enviarTablaDinamica'));
$this->Mensaje->quitarMensaje();
}?>