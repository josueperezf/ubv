<?php //debug($ubvsub06s);?>
<div class="ubvsub06s index">
	<h3 class="titulo"><?php echo __('Sub-coordinacion'); ?></h3>
    <div class="gradiente">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','N'); ?></th>
			<th><?php echo $this->Paginator->sort('ciudad'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('estatus'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$indice = $this->Paginator->counter(array('format' => __('{:start}')));
    	foreach ($ubvsub06s as $ubvsub06):
	?>
	<tr>
		<td><?php /*echo h($ubvsub06['Ubvsub06']['id']);*/ echo $indice++?>&nbsp;</td>
		<td><?php echo h($ubvsub06['Ubvsub06']['ciudad']); ?>&nbsp;</td>
		<td><?php echo h($ubvsub06['Ubvsub06']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($ubvsub06['Ubvsub06']['direccion']); ?>&nbsp;</td>
		<td>
			<?php
				if($ubvsub06['Ubvsub06']['estatus']==1)
					echo $this->Html->image('activo.png');
				else
					echo $this->Html->image('inactivo.png');
			?>&nbsp;
        </td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $ubvsub06['Ubvsub06']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $ubvsub06['Ubvsub06']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $ubvsub06['Ubvsub06']['id']), null, __('Estas seguro que deseas eliminar el registro?', $ubvsub06['Ubvsub06']['id'])); ?>
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
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
</div>
<div id="menu" class="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Nueva sub-coordinacion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'add')); ?> </li>
	</ul>
</div>
