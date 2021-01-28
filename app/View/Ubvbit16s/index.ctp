<div class="ubvbit16s">
	<h2 class="titulo"><?php echo __('Auditoria'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario'); ?></th>
			<th><?php echo $this->Paginator->sort('servidor'); ?></th>
			<th><?php echo $this->Paginator->sort('operacion'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('tabla'); ?></th>
			<th><?php echo $this->Paginator->sort('campo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('campo2_id'); ?></th>
	</tr>
	<?php foreach ($ubvbit16s as $ubvbit16): ?>
	<tr>
		<td><?php echo h($ubvbit16['Ubvbit16']['id']); ?>&nbsp;</td>
		<td>
			<?php
				echo $this->Html->link($ubvbit16['Ubvbit16']['usuario'], array('controller' => 'users', 'action' => 'view', $ubvbit16['Ubvbit16']['user_id']));
            	//echo h($ubvbit16['Ubvbit16']['user_id']);
			?>&nbsp;
        </td>
		<!--<td><?php //echo h($ubvbit16['Ubvbit16']['usuario']); ?>&nbsp;</td>-->
		<td><?php echo h($ubvbit16['Ubvbit16']['servidor']); ?>&nbsp;</td>
		<td><?php echo h($ubvbit16['Ubvbit16']['operacion']); ?>&nbsp;</td>
		<td><?php echo h($ubvbit16['Ubvbit16']['fecha']); ?>&nbsp;</td>
		<td>
			<?php
			if($ubvbit16['Ubvbit16']['tabla']!='ubvdus10s_ubvmov13s' && $ubvbit16['Ubvbit16']['tabla']!='ubvdmo14s'){
			echo $this->Html->link($ubvbit16['Ubvbit16']['tabla'], array('controller' => $ubvbit16['Ubvbit16']['tabla'], 'action' => 'index'));
			}else
			{
				echo h($ubvbit16['Ubvbit16']['tabla']);
			}
			?>&nbsp;
        </td>
		<td>
			<?php
			if($ubvbit16['Ubvbit16']['tabla']!='ubvdus10s_ubvmov13s' && $ubvbit16['Ubvbit16']['tabla']!='ubvdmo14s')
			{
				echo $this->Html->link($ubvbit16['Ubvbit16']['campo_id'], array('controller' => $ubvbit16['Ubvbit16']['tabla'], 'action' => 'view', $ubvbit16['Ubvbit16']['campo_id']));
			}else
			{
				if($ubvbit16['Ubvbit16']['tabla']=='ubvdus10s_ubvmov13s')
				{
					echo $this->Html->link($ubvbit16['Ubvbit16']['campo_id'], array('controller' => 'ubvdus10s', 'action' => 'view', $ubvbit16['Ubvbit16']['campo_id']));
				}else
				echo h($ubvbit16['Ubvbit16']['campo_id']); 
			}

			?>&nbsp;
        </td>
		<td>
			<?php
				if($ubvbit16['Ubvbit16']['tabla']=='ubvdus10s_ubvmov13s')
				{
					echo $this->Html->link($ubvbit16['Ubvbit16']['campo2_id'], array('controller' => 'ubvmov13s ', 'action' => 'view', $ubvbit16['Ubvbit16']['campo2_id']));
				}else
				echo h($ubvbit16['Ubvbit16']['campo2_id']); 
				
				
				
            	//echo h($ubvbit16['Ubvbit16']['campo2_id']);
			?>&nbsp;
        </td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, mostrando {:current} registros de un total {:count}, iniciando en  el {:start}, finalizando en el {:end}')
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
    <br />
</div>