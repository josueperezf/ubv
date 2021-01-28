<?php //debug($ubvsub06s)?>
<div class="ubvdus10s index">
	<h3 class="titulo"><?php echo __('Dependencia Usuaria'); ?></h3>
    <div class="gradiente">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','N'); ?></th>
            <th><?php echo ('Sub coordinacion') ?></th>
			<th><?php echo $this->Paginator->sort('ubvuad09_id','U. administrativa'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('estatus'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
    
	<?php foreach ($ubvdus10s as $ubvdus10): //debug($ubvdus10);?>
	<tr>
		<td><?php echo h($ubvdus10['Ubvdus10']['id']); ?>&nbsp;</td>
        <td>
			<?php
			
            	echo $this->Html->link($ubvsub06s[$ubvdus10['Ubvuad09']['ubvsub06_id']], array('controller' => 'ubvsub06s', 'action' => 'view', $ubvdus10['Ubvuad09']['ubvsub06_id']));
			?>
        </td>
		<td>
			<?php
            	echo $this->Html->link($ubvdus10['Ubvuad09']['nombre'], array('controller' => 'ubvuad09s', 'action' => 'view', $ubvdus10['Ubvuad09']['id']));
				
			?>
		</td>
		<td><?php echo h($ubvdus10['Ubvdus10']['nombre']); ?>&nbsp;</td>
		<td>
			<?php
            	if($ubvdus10['Ubvdus10']['estatus']==1)
					echo $this->Html->Image('activo.png');
				else
					echo $this->Html->image('inactivo.png');
			?>&nbsp;
        </td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $ubvdus10['Ubvdus10']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $ubvdus10['Ubvdus10']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} registros de un total de {:count}, iniciando en el {:start}, terminando en el{:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
    <br />
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar bien'), array('controller' => 'ubvbie12s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo bien'), array('controller' => 'ubvbie12s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar personal'), array('controller' => 'ubvper11s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo personal'), array('controller' => 'ubvper11s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo movimiento'), array('controller' => 'ubvmov13s', 'action' => 'add')); ?> </li>
	</ul>
</div>
