<?php 
	//debug($cantidadbienes[0][0]['countBienSub(2)']);
	$idsub06=$this->request->params['pass'][0];
	$cantidadbienes=$cantidadbienes[0][0]['countBienSub('.$idsub06.')'];
	if($cantidadbienes>0)
		$tipo='hidden';
	else
		$tipo='checkbox';
?>
<div class="ubvsub06s form">
<?php echo $this->Form->create('Ubvsub06'); ?>
<h3 class="titulo"><?php echo __('Editar sub-coordinacion'); ?></h3>
<div class="gradiente">
	<?php
		echo $this->Form->input('id',array('id'=>'id'));
		echo $this->Form->input('ubvcoo03_id',array('label'=>'Unidad Administrativa'));
		echo $this->Form->input('ciudad',array('id'=>'ciudad'));
		echo $this->Form->input('nombre',array('id'=>'nombre'));
		echo $this->Form->input('direccion',array('id'=>'direccion'));
		echo $this->Form->input('estatus',array('type'=>$tipo,'id'=>'estatus'));
	?>
	<input type="button" id="guardar" name="guardar" value="Guardar" onclick="editSubCoo();">
	<br><br>
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Listar sub-coordinacion'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'add')); ?> </li>
	</ul>
</div>