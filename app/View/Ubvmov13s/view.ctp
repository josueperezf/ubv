<div class="ubvmov13s view">
<h3 class="titulo"><?php  echo __('Movimiento'); ?></h3>
<div class="gradiente">
	<dl>
		<dt><?php echo __('Razon'); ?></dt>
		<dd>
			<?php echo $ubvmov13['Ubvdtm07']['nombre'];?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($ubvmov13['Ubvmov13']['fecha']); ?>
			&nbsp;
		</dd>
	</dl>
    <br /><br>
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Listar movimientos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Movimiento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Bienes relacionados'); ?></h3>
	<?php if (!empty($ubvmov13['Ubvdmo14'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Serial'); ?></th>
		<th><?php echo __('Denominacion'); ?></th>
		<th><?php echo __('Marca'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ubvmov13['Ubvdmo14'] as $ubvdmo14):?>
		<tr>
			<td><?php echo $bienes[$i]['Ubvbie12']['codigo'];?></td>
			<td><?php echo $bienes[$i]['Ubvbie12']['serial'];?></td>
			<td><?php echo $bienes[$i]['Ubvden08']['nombre'];?></td>
			<td><?php echo $bienes[$i]['Ubvmar01']['nombre'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'ubvbie12s', 'action' => 'view', $bienes[$i]['Ubvbie12']['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'ubvbie12s', 'action' => 'edit', $bienes[$i]['Ubvbie12']['id']));
				$i++?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>


</div>
<div class="related">
	<h3><?php echo __('Dependecias usuarias relaciondas'); ?></h3>
	<?php if (!empty($ubvmov13['Ubvdus10'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Estado'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ubvmov13['Ubvdus10'] as $ubvdus10):?>
		<tr>
			<td><?php echo $ubvdus10['nombre']; ?></td>
			<td>
				<?php
					if($ubvdus10['Ubvdus10sUbvmov13']['tipo']==1)
						echo('Origen');
					elseif ($ubvdus10['Ubvdus10sUbvmov13']['tipo']==2)
						echo('Destino');
					elseif ($ubvdus10['Ubvdus10sUbvmov13']['tipo']==3)
						echo('Correccion o cambios a bienes');
						 
					
				?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nueva depend usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
