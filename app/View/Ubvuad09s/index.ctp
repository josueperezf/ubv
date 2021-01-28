<div class="ubvuad09s index">
	<h3 class="titulo"><?php echo __('Unidad administrativa'); ?></h3>
    <div class="gradiente">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','N'); ?></th>
			<th><?php echo $this->Paginator->sort('ubvtua15_id','Tipo U. AD'); ?></th>
			<th><?php echo $this->Paginator->sort('ubvsub06_id','Sub-coordinacion'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('estatus'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($ubvuad09s as $ubvuad09): ?>
	<tr>
		<td><?php echo h($ubvuad09['Ubvuad09']['id']); ?>&nbsp;</td>
		<td>
			<?php echo($ubvuad09['Ubvtua15']['nombre'])?>
		</td>
		<td width="100px">
			<?php echo $this->Html->link($ubvuad09['Ubvsub06']['ciudad'], array('controller' => 'ubvsub06s', 'action' => 'view', $ubvuad09['Ubvsub06']['id'])); ?>
		</td>
		<td><?php echo h($ubvuad09['Ubvuad09']['nombre']); ?>&nbsp;</td>
		<td>
			<?php 
				if($ubvuad09['Ubvuad09']['estatus']==1)
					echo $this->Html->image('activo.png');
				else
					echo $this->Html->image('inactivo.png');
			?>&nbsp;
        </td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $ubvuad09['Ubvuad09']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $ubvuad09['Ubvuad09']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $ubvuad09['Ubvuad09']['id']), null, __('Estas seguro que deseas eliminar', $ubvuad09['Ubvuad09']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, mostrando {:current} registros de un total de {:count}, iniciando en el  {:start}, terminando en el {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
    <br><br>
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Nueva U. administrativa'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar sub-coordinacion'), array('controller' => 'ubvsub06s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva sub-coordinacion'), array('controller' => 'ubvsub06s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar depend usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
	</ul>
</div>
