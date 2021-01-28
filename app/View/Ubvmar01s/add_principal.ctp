<div class="ubvmar01s form">
<?php echo $this->Form->create('Ubvmar01');?>
<h3 class="titulo"><?php echo __('Nueva marca'); ?></h3>
<div class="gradiente">
<?php
		echo $this->Form->input('nombre',array('id'=>'nombre','title'=>'La marca no puede estar vacia','autofocus'=>'autofocus'));
		?>
    <!--<input type="button" name="Guardar" value="Guardar" onclick="registrarMarca()">-->
    <input type="button" name="guardar" value="Guardar" onclick="addMarPri()">
    <br /><br />
<?php
	echo $this->Form->end(); ?>
</div>
</div>


<div id="menu">
	<ul>

		<li><?php echo $this->Html->link(__('Listar marcas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar bienes'), array('controller' => 'ubvbie12s', 'action' => 'index')); ?> </li>
	</ul>
</div>