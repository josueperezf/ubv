<div class="ubvuad09s form">
<?php echo $this->Form->create('Ubvuad09'); ?>
<h3 class="titulo"><?php echo __('Nueva unidad administrativa'); ?></h3>
<div class="gradiente">
	<?php
		echo $this->Form->input('ubvtua15_id',array('label'=>'Tipo de unidad administrativa','autofocus'=>'autofocus'));
		echo $this->Form->input('ubvsub06_id',array('id'=>'ubvsub06_id','label'=>'Sub coordinacion'));
		echo $this->Form->input('nombre',array('id'=>'nombre'));
		echo $this->Form->input('telefono',array('id'=>'telefono','placeholder'=>'0000-0000000'));
		echo $this->Form->input('estatus',array('type'=>'checkbox','checked'=>'checked'));
	?>
    <input type="button" name="guardar" id="guardar" value="Guardar" onclick="addUad();">
    <br><br>
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Listar U. administrativa'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar sub-coordinacion'), array('controller' => 'ubvsub06s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva sub-coordinacion'), array('controller' => 'ubvsub06s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
	</ul>
</div>