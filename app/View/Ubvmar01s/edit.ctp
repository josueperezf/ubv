<div class="ubvmar01s form">
<?php echo $this->Form->create('Ubvmar01'); ?>
<h3 class="titulo"><?php echo __('Editar marca'); ?></h3>
<div class="gradiente">
	<?php
		echo $this->Form->input('id',array('id'=>'id'));
		echo $this->Form->input('nombre',array('id'=>'nombre'));
	?>
<?php //echo $this->Form->end(__('Guardar')); ?>
<input type="button" name="guardar" value="Guardar" onclick="editMar();">
<br /><br />
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Listar marca'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar bienes'), array('controller' => 'ubvbie12s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo bienes'), array('controller' => 'ubvbie12s', 'action' => 'add')); ?> </li>
	</ul>
</div>
