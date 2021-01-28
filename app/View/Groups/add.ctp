<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
		<h3 class="titulo"><?php echo __('Add Group'); ?></h3>
        <div class="gradiente"> 
	<?php
		echo $this->Form->input('name');
		echo $this->Form->end(__('Submit')); ?>
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Grupos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
