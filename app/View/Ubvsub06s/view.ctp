<div class="ubvsub06s view">
<h3 class="titulo"><?php  echo __('Sub-coordinacion'); ?></h3>
<div class="gradiente">
	<dl>
		<dt><?php echo __('Coordinacion'); ?></dt>
		<dd>
			<?php echo ($ubvsub06['Ubvcoo03']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciudad'); ?></dt>
		<dd>
			<?php echo h($ubvsub06['Ubvsub06']['ciudad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($ubvsub06['Ubvsub06']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($ubvsub06['Ubvsub06']['direccion']); ?>
			&nbsp;
		</dd>
		<dt>
		<?php echo __('Estatus'); ?></dt>
		<dd>
			<?php 
				if($ubvsub06['Ubvsub06']['estatus']==1)
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
		<li><?php echo $this->Html->link(__('Editar sub-coordinacion'), array('action' => 'edit', $ubvsub06['Ubvsub06']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List sub-coordinacion'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva sub-coordinacion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'add')); ?> </li>
	</ul>
    <br />
</div>
<div class="related">
	<h3><?php echo __('Unidades administrativas relacionadas'); ?></h3>
	<?php if (!empty($ubvsub06['Ubvuad09'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('N'); ?>&deg;</th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Telefono'); ?></th>
		<th><?php echo __('Estatus'); ?></th>
		<th><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
	
		$i = 0;
		foreach ($ubvsub06['Ubvuad09'] as $ubvuad09): ?>
		<tr>
			<td><?php echo $ubvuad09['id']; ?></td>
			<td><?php echo $ubvuad09['nombre']; ?></td>
			<td><?php echo $ubvuad09['telefono']; ?></td>
			<td>
				<?php
					 if($ubvuad09['estatus']==1)
					 	echo $this->Html->image('activo.png');
					 else
					 	echo $this->Html->image('inactivo.png');
				?>
            </td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'ubvuad09s', 'action' => 'view', $ubvuad09['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'ubvuad09s', 'action' => 'edit', $ubvuad09['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
<br />
  <?php
	echo $this->Html->link('Nueva U. administrativa',array('controller' => 'ubvuad09s', 'action' => 'add'),array('title'=>'nuevo'));
	?>
<br /><br />
 </div>