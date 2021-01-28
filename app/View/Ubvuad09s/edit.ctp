<?php
	$cantidadBienesuad=$cantidadBienesuad[0][0]['count(b.id)'];
	if($cantidadBienesuad>0)
		$tipo='hidden';
	else
		$tipo='checkbox';
?>
<div class="ubvuad09s form">
<?php echo $this->Form->create('Ubvuad09'); ?>
<h3 class="titulo"><?php echo __('Editar Unidad administrativa'); ?></h3>
<div class="gradiente">
	<?php
		echo $this->Form->input('id',array('id'=>'id'));
		echo $this->Form->input('ubvtua15_id',array('label'=>'Tipo de U. administrativa'));
		echo $this->Form->input('ubvsub06_id',array('id'=>'ubvsub06_id','label'=>'sub-coordinacion'));
		echo $this->Form->input('nombre',array('id'=>'nombre'));
		echo $this->Form->input('telefono',array('id'=>'telefono'));
		echo $this->Form->input('estatus',array('type'=>$tipo));
	?>
    <input type="button" name="guardar" value="Guardar" id="guardar" onclick="editUad();">
    <br><br>
</div>
</div>
<div id="menu">
	<ul>

		<!--<li><?php //echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Ubvuad09.id')), null, __('Estas seguro que deseas eliminar?', $this->Form->value('Ubvuad09.id'))); ?></li>-->
		<li><?php echo $this->Html->link(__('Listar U. administrativa'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar sub-coordinacion'), array('controller' => 'ubvsub06s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva sub-coordinacion'), array('controller' => 'ubvsub06s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
	</ul>
</div>