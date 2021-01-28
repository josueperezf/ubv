<?php //debug($user);?>
<div class="users view">
<h2 class="titulo"><?php  echo __('Usuario'); ?></h2>
<div class="gradiente">
	<dl>
    	<dt><?php echo __('Personal'); ?></dt>
		<dd>
			<?php
				echo $this->Html->link($user['Ubvper11']['nombre'], array('controller' => 'ubvper11s', 'action' => 'view', $user['Ubvper11']['id']));
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre usuario'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha de Creado'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado El:'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Estatus'); ?></dt>
		<dd>
			<?php
				if($user['User']['estatus']==1)
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
		<li><?php echo $this->Html->link(__('Editar Usuario'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuario'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('action' => 'add')); ?> </li>
	</ul>
</div>
