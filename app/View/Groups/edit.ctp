<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
		<h3 class="titulo"><?php echo __('Editar Grupo'); ?></h3>
        <div class="gradiente">
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label'=>'nombre'));
		echo $this->Form->end(__('Submit'));
	?>
    <p align="justify">La modificación de este contenido es de uso delicado y su alteración puede incidir en el funcionamiento del sistema, si desconoce lo anteriormente mencionado y desea continuar con la modificación, por favor comuníquese con algún programador.</p>
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Grupo'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Usuario'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
