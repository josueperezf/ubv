<div class="ubvper11s index">
	<h3 class="titulo"><?php echo __('Personal'); ?></h3>
    <div class="gradiente">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','N'); ?></th>
			<th><?php echo $this->Paginator->sort('ubvcar05_id','Cargo'); ?></th>
			<th><?php echo $this->Paginator->sort('ubvdus10_id','D. usuaria'); ?></th>
			<th><?php echo $this->Paginator->sort('cedula'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('estatus'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($ubvper11s as $ubvper11): ?>
	<tr>
		<td><?php echo h($ubvper11['Ubvper11']['id']); ?>&nbsp;</td>
		<td>
			<?php echo h($ubvper11['Ubvcar05']['nombre']); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ubvper11['Ubvdus10']['nombre'], array('controller' => 'ubvdus10s', 'action' => 'view', $ubvper11['Ubvdus10']['id'])); ?>
		</td>
		<td><?php echo h($ubvper11['Ubvper11']['cedula']); ?>&nbsp;</td>
		<td><?php echo h($ubvper11['Ubvper11']['nombre']); ?>&nbsp;</td>
		<td>
			<?php
            	if($ubvper11['Ubvper11']['estatus']==1)
					echo $this->Html->image('activo.png');
				else
					echo $this->Html->image('inactivo.png');
			?>&nbsp;
        </td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $ubvper11['Ubvper11']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $ubvper11['Ubvper11']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} registros de un total de {:count} total, Iniciando en {:start}, finalizando en {:end}')
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
		<li><?php echo $this->Html->link(__('Nuevo personal'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
	</ul>
</div>
