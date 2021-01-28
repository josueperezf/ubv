<div class="ubvuad09s view">
<h3 class="titulo"><?php  echo __('Unidad administrativa'); ?></h3>
<div class="gradiente">
	<dl>
		<dt><?php echo __('Tipo U. admin'); ?></dt>
		<dd>
			<?php echo ($ubvuad09['Ubvtua15']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('sub-coordinacion'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ubvuad09['Ubvsub06']['ciudad'], array('controller' => 'ubvsub06s', 'action' => 'view', $ubvuad09['Ubvsub06']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($ubvuad09['Ubvuad09']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($ubvuad09['Ubvuad09']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estatus'); ?></dt>
		<dd>
			<?php
            	if($ubvuad09['Ubvuad09']['estatus']==1)
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
		<li><?php echo $this->Html->link(__('Editar U. administrativa'), array('action' => 'edit', $ubvuad09['Ubvuad09']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar U. administrativa'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva U. administrativa'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar sub-coordinacion'), array('controller' => 'ubvsub06s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva sub-coordinacion'), array('controller' => 'ubvsub06s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
	</ul>
</div>
<br />
<div class="related">
	<h3><?php echo __('Dependencias usuarias relacionadas'); ?></h3>
	<?php if (!empty($ubvuad09['Ubvdus10'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nr'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Estatus'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ubvuad09['Ubvdus10'] as $ubvdus10): ?>
		<tr>
			<td><?php echo $ubvdus10['id']; ?></td>
			<td><?php echo $ubvdus10['nombre']; ?></td>
			<td>
				<?php
                	if($ubvdus10['estatus']==1)
						echo $this->Html->image('activo.png');
					else
						echo $this->Html->image('inactivo.png');
				?>
            </td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'ubvdus10s', 'action' => 'view', $ubvdus10['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'ubvdus10s', 'action' => 'edit', $ubvdus10['id'])); ?>
				<?php //echo $this->Form->postLink(__('Eliminar'), array('controller' => 'ubvdus10s', 'action' => 'delete', $ubvdus10['id']), null, __('estas seguro que deseas eliminar el registro?', $ubvdus10['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
<br />

	<?php echo $this->Html->link(__('Nueva dependncia usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add'),array('title'=>'nuevo')); ?>

<br /><br />
</div>
