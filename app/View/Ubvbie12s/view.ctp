<div class="ubvbie12s view">
<h3 class="titulo"><?php  echo __('Bien'); ?></h3>
<?php //debug($ubvbie12);?>
<div class="gradiente">
	<dl>
		<dt><?php echo __('Denominacion'); ?></dt>
		<dd>
			<?php echo __($ubvbie12['Ubvden08']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Depend usuaria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ubvbie12['Ubvdus10']['nombre'], array('controller' => 'ubvdus10s', 'action' => 'view', $ubvbie12['Ubvdus10']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Marca'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ubvbie12['Ubvmar01']['nombre'], array('controller' => 'ubvmar01s', 'action' => 'view', $ubvbie12['Ubvmar01']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($ubvbie12['Ubvbie12']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Serial'); ?></dt>
		<dd>
			<?php echo h($ubvbie12['Ubvbie12']['serial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Monto'); ?></dt>
		<dd>
			<?php echo h($ubvbie12['Ubvbie12']['monto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($ubvbie12['Ubvbie12']['descripcion']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Estatus'); ?></dt>
		<dd>
			<?php
            	if($ubvbie12['Ubvbie12']['estatus']==1)
					echo $this->Html->image('activo.png');
				else
					echo $this->Html->image('inactivo.png');
			?>
		</dd>
	</dl>
    <br /><br />
</div>
</div>
<div id="menu">
	<ul>
		<li>
		<?php
		if($ubvbie12['Ubvbie12']['estatus']==1)
        	echo $this->Html->link(__('Editar bien'), array('action' => 'edit', $ubvbie12['Ubvbie12']['id']));
		?>
        </li>
		<li><?php echo $this->Html->link(__('Listar bien'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo bien'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar marca'), array('controller' => 'ubvmar01s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva marca'), array('controller' => 'ubvmar01s', 'action' => 'addPrincipal')); ?> </li>
	</ul>
</div>
