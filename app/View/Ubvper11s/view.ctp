<div class="ubvper11s view">
<h3 class="titulo"><?php  echo __('Personal'); ?></h3>
<div class="gradiente">
	<dl>
		<dt><?php echo __('Cargo'); ?></dt>
		<dd>
			<?php echo ($ubvper11['Ubvcar05']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Depend usuaria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ubvper11['Ubvdus10']['nombre'], array('controller' => 'ubvdus10s', 'action' => 'view', $ubvper11['Ubvdus10']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cedula'); ?></dt>
		<dd>
			<?php echo h($ubvper11['Ubvper11']['cedula']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($ubvper11['Ubvper11']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($ubvper11['Ubvper11']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estatus'); ?></dt>
		<dd>
			<?php
			 	if($ubvper11['Ubvper11']['estatus']==1)
					echo $this->Html->image('activo.png');
				else
					echo $this->Html->image('inactivo.png');
			 ?>
			&nbsp;
		</dd>
	</dl>
    <br /><br />
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Editar personal'), array('action' => 'edit', $ubvper11['Ubvper11']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar personal'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo personal'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
	</ul>
</div>
