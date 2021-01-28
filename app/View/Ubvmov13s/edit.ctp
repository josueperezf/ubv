<div class="ubvmov13s form">
<?php echo $this->Form->create('Ubvmov13'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ubvmov13'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ubvdtm07_id');
		echo $this->Form->input('fecha');
		echo $this->Form->input('Ubvdus10');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ubvmov13.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Ubvmov13.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ubvmov13s'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ubvdtm07s'), array('controller' => 'ubvdtm07s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ubvdtm07'), array('controller' => 'ubvdtm07s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ubvdmo14s'), array('controller' => 'ubvdmo14s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ubvdmo14'), array('controller' => 'ubvdmo14s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ubvdus10s'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ubvdus10'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
	</ul>
</div>
