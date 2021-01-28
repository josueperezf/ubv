<div class="ubvmar01s index">
	<h3 class="titulo"><?php echo __('Marcas '); ?></h3>
    <div class="gradiente">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','N'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($ubvmar01s as $ubvmar01): ?>
	<tr>
		<td><?php echo h($ubvmar01['Ubvmar01']['id']); ?>&nbsp;</td>
		<td><?php echo h($ubvmar01['Ubvmar01']['nombre']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $ubvmar01['Ubvmar01']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $ubvmar01['Ubvmar01']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $ubvmar01['Ubvmar01']['id']), null, __('Estas seguro que deseas elminar el registro # %s?', $ubvmar01['Ubvmar01']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, mostrando {:current} registros de un total de  {:count}, iniciando del  {:start}, hasta el {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
    <br /><br />
	</div>
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Nueva marca'), array('action' => 'addPrincipal')); ?></li>
		<li><?php echo $this->Html->link(__('Listar bienes'), array('controller' => 'ubvbie12s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo bien'), array('controller' => 'ubvbie12s', 'action' => 'add')); ?> </li>
	</ul>
</div>
