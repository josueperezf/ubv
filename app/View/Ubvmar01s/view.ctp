<div class="ubvmar01s view">
<h3 class="titulo"><?php  echo __('Marca'); ?></h3>
<div class="gradiente">
	<dl>
		<dt><?php echo __('N'); ?>&deg;</dt>
		<dd>
			<?php echo h($ubvmar01['Ubvmar01']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($ubvmar01['Ubvmar01']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
    <br /><br />
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Editar marca'), array('action' => 'edit', $ubvmar01['Ubvmar01']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar marcas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva marca'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar bienes'), array('controller' => 'ubvbie12s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo bien'), array('controller' => 'ubvbie12s', 'action' => 'add')); ?> </li>
	</ul>
</div>
<br />
<div class="related">
	<h3><?php echo __('Bienes relacionados'); ?></h3>
	<?php if (!empty($ubvmar01['Ubvbie12'])): ?>
	<table cellpadding = "0" cellspacing = "0" border="0">
	<tr>
	    <th><?php echo __('Depen Usuaria'); ?></th>
	    <th><?php echo __('Denominacion'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Serial'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ubvmar01['Ubvbie12'] as $ubvbie12): ?>
		<tr>
        	<td>
				<?php
                	//echo($ubvdus10s[$ubvbie12['ubvdus10_id']]);
					echo $this->Html->link($ubvdus10s[$ubvbie12['ubvdus10_id']], array('controller' => 'ubvdus10s', 'action' => 'view', $ubvbie12['ubvdus10_id']));
				?>
            </td>
        	<td><?php echo $denominaciones[$ubvbie12['ubvden08_id']]; ?></td>
			<td><?php echo $ubvbie12['codigo']; ?></td>
			<td><?php echo $ubvbie12['serial']; ?></td>
			<td><?php echo $ubvbie12['monto']; ?></td>
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

<br />
<?php echo $this->Html->link(__('Nuevo bien'), array('controller' => 'ubvbie12s', 'action' => 'add'),array('title'=>'nuevo')); ?> 
<br /><br />
</div>
