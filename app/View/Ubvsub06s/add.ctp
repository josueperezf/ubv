<div class="ubvsub06s form">
<?php echo $this->Form->create('Ubvsub06'); ?>
<h3 class="titulo"><?php echo __('Nueva Sub-Coordinacion'); ?></h3>
<div class="gradiente">
	<?php
		echo $this->Form->input('ubvcoo03_id',array('label'=>'Coordinacion'));
		echo $this->Form->input('ciudad',array('id'=>'ciudad','title'=>'Suministrar la ciudad es obligatoria','autofocus'=>'autofocus'));
		echo $this->Form->input('nombre',array('id'=>'nombre'));
		?>
        <div id="pruebaValidacion"></div>
		<?php
		echo $this->Form->input('direccion',array('id'=>'direccion'));
		echo $this->Form->input('estatus',array('type'=>'checkbox','id'=>'estatus','checked'=>'checked'));
	?>
    <input type="button" id="guardar" name="guardar" value="Guardar" onclick="addSubCoo();">
    <br><br>
</div>
</div>
<div id="menu">
	<ul>

		<li><?php echo $this->Html->link(__('Listar sub-coordinacion'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'add')); ?> </li>
	</ul>
</div>