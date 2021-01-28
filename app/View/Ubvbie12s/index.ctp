<div class="ubvbie12s index">
	<h3 class="titulo"><?php echo __('Bienes'); ?></h3>
    <div class="gradiente">
    <?php echo $this->Form->create('Ubvbie12'); ?>
    <table align="center" style="width:300px;" cellpadding="0" cellspacing="0">
    	<tr style="border-bottom:none">
        	<td style="border-bottom:none"><b> <abbr title="Codigo a buscar">Codigo:</abbr></b></td>
            <td style="border-bottom:none">
            	<?php echo $this->Form->input('codigoBuscar',array('label'=>'','name'=>'codigoBuscar','autofocus'=>'autofocus','value'=>'','placeholder'=>'Numeros','style'=>'width:100px'));?>
            </td>
            <td style="border-bottom:none" align="right">
            	<input type="button" value="Buscar" onclick="return indexBuscarBien();">
            </td>
        </tr>
	</table>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','N'); ?></th>
			<th><?php echo $this->Paginator->sort('ubvden08_id','Denominacion'); ?></th>
			<th><?php echo $this->Paginator->sort('ubvdus10_id','D. usuaria'); ?></th>
			<th><?php echo $this->Paginator->sort('ubvmar01_id','Marca'); ?></th>
			<th><?php echo $this->Paginator->sort('codigo'); ?></th>
			<th><?php echo $this->Paginator->sort('monto'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($ubvbie12s as $ubvbie12):?>
	<tr>
		<td><?php echo h($ubvbie12['Ubvbie12']['id']); ?>&nbsp;</td>
		<td>
			<?php echo h($ubvbie12['Ubvden08']['nombre']); ?>
		</td>
		<td><div style=" white-space: nowrap">
			<?php echo $this->Html->link($ubvbie12['Ubvdus10']['nombre'], array('controller' => 'ubvdus10s', 'action' => 'view', $ubvbie12['Ubvdus10']['id'])); ?>
            </div>
		</td>
		<td>
			<?php
            	//echo($ubvbie12['Ubvmar01']['nombre']);
				echo $this->Html->link($ubvbie12['Ubvmar01']['nombre'], array('controller' => 'ubvmar01s', 'action' => 'view', $ubvbie12['Ubvmar01']['id'])); ?>
		</td>
		<td><?php echo h($ubvbie12['Ubvbie12']['codigo']); ?>&nbsp;</td>
		<td><?php echo h($ubvbie12['Ubvbie12']['monto']); ?>&nbsp;</td>
		
		<td class="actions">
        	<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $ubvbie12['Ubvbie12']['id'])); ?>
			<?php
				if($ubvbie12['Ubvbie12']['estatus']==1){
            		echo $this->Html->link(__('Editar'), array('action' => 'edit', $ubvbie12['Ubvbie12']['id']));
				}else{?><a style="color:#ccc"> Editar</a> <?php }?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} registros de un total de {:count}, iniciando en  {:start}, terminando en {:end}')
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
		<li><?php echo $this->Html->link(__('Nuevo bien'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
	</ul>
</div>