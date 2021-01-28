<div class="ubvdus10s view">
<h3 class="titulo"><?php  echo __('Dependencia usuaria'); ?></h3>
<div class="gradiente">
	<dl>
		<dt><?php echo __('U. administrativa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ubvdus10['Ubvuad09']['nombre'], array('controller' => 'ubvuad09s', 'action' => 'view', $ubvdus10['Ubvuad09']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($ubvdus10['Ubvdus10']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estatus'); ?></dt>
		<dd>
			<?php
            	if($ubvdus10['Ubvdus10']['estatus']==1)
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
		<li><?php echo $this->Html->link(__('Editar D. usuaria'), array('action' => 'edit', $ubvdus10['Ubvdus10']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar D. usuaria'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva  U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar bien'), array('controller' => 'ubvbie12s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo bien'), array('controller' => 'ubvbie12s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar personal'), array('controller' => 'ubvper11s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo personal'), array('controller' => 'ubvper11s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo movimiento'), array('controller' => 'ubvmov13s', 'action' => 'add')); ?> </li>
	</ul>
</div>
<br />
<div class="related">
	<h3><?php echo __('Bienes relacionados'); ?></h3>
	<?php if (!empty($ubvdus10['Ubvbie12'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nr'); ?></th>
		<th><?php echo __('Denominacion'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Serial'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 1;
		foreach ($ubvdus10['Ubvbie12'] as $ubvbie12): ?>
		<tr>
			<td>
			<?php echo $i++ ?></td>
			<td><?php echo($denominaciones[$ubvbie12['ubvden08_id']]); ?></td>
			<td><?php echo $ubvbie12['codigo']; ?></td>
			<td><?php echo $ubvbie12['serial']; ?></td>
			<td><?php echo $ubvbie12['monto']; ?></td>
			<td><?php echo $ubvbie12['descripcion']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'ubvbie12s', 'action' => 'view', $ubvbie12['id']));
				if($ubvbie12['estatus']==1){
				echo $this->Html->link(__('Editar'), array('controller' => 'ubvbie12s', 'action' => 'edit', $ubvbie12['id'])); 
				}else{?><a style="color:#ccc"> Editar</a> <?php }?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>


			<?php echo $this->Html->link(__('Nuevo bien'), array('controller' => 'ubvbie12s', 'action' => 'add'),array('title'=>'nuevo')); ?> 
<br />
		
</div>
<br />
<div class="related">
	<h3><?php echo __('Personal relacionado'); ?></h3>
	<?php if (!empty($ubvdus10['Ubvper11'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Cedula'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Telefono'); ?></th>
		<th><?php echo __('Estatus'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ubvdus10['Ubvper11'] as $ubvper11): ?>
		<tr>
			<td><?php echo $ubvper11['cedula']; ?></td>
			<td><?php echo $ubvper11['nombre']; ?></td>
			<td><?php echo $ubvper11['telefono']; ?></td>
			<td><?php
            		if($ubvper11['estatus']==1)
						echo $this->Html->image('activo.png');
					else
						echo $this->Html->image('inactivo.png');
				?>
            </td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'ubvper11s', 'action' => 'view', $ubvper11['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'ubvper11s', 'action' => 'edit', $ubvper11['id'])); ?>
				<?php //echo $this->Form->postLink(__('Eliminar'), array('controller' => 'ubvper11s', 'action' => 'delete', $ubvper11['id']), null, __('Estas seguro que deseas eliminar el registro?', $ubvper11['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>


	<?php echo $this->Html->link(__('Nuevo personal'), array('controller' => 'ubvper11s', 'action' => 'add'),array('title'=>'nuevo')); ?>
<br /><br />
</div>