<div class="ubvmov13s index">
	<h3 class="titulo"><?php echo __('Movimiento'); ?></h3>
    <div class="gradiente">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','N'); ?></th>
			<th><?php echo $this->Paginator->sort('ubvdtm07_id','Razon de Movimiento'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($ubvmov13s as $ubvmov13): ?>
	<tr>
		<td><?php echo h($ubvmov13['Ubvmov13']['id']); ?>&nbsp;</td>
		<td>
			<?php echo h($ubvmov13['Ubvdtm07']['nombre']); ?>
		</td>
		<td><?php echo h($ubvmov13['Ubvmov13']['fecha']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $ubvmov13['Ubvmov13']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} registros de un total de {:count}, iniciando en {:start}, finalizando en {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
    <br /><br />
	</div>
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo movimiento'), array('action' => 'add')); ?></li>

		<li><?php echo $this->Html->link(__('Listar D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
	</ul>
</div>
