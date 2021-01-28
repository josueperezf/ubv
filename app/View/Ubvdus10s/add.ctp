<?php if($this->request->is('ajax')==false){?>
<div class="ubvdus10s form">
<?php echo $this->Form->create('Ubvdus10'); ?>
	<h3 class="titulo"><?php echo __('Nueva dependencia usuaria'); ?></h3>
    <div class="gradiente">
	<?php
		echo $this->Form->input('Ubvsub06_id',array('id'=>'Ubvsub06_id','label'=>'<b>Sub-coordinacion</b>','onchange'=>'return libAjax("Ubvdus10AddForm","/ubv/ubvdus10s/add/","divDus");'));
		echo('<div id="divDus"><label><b>Unidad administrativa<font color="red">*</font></b></label><select id="ubvuad09_id"><option value="0">SELECCIONE</option></select></div>');
		echo $this->Form->input('nombre',array('id'=>'nombre'));
		echo $this->Form->input('estatus',array('type'=>'checkbox','checked'=>'checked'));
	?>
    <input type="button" name="guardar" id="guardar" value="Guardar" onclick="addDus();">
<br /><br />
</div>

</div>

<div id="menu">
	<ul>

		<li><?php echo $this->Html->link(__('Listar depend usuaria'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar bien'), array('controller' => 'ubvbie12s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo bien'), array('controller' => 'ubvbie12s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar personal'), array('controller' => 'ubvper11s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo personal'), array('controller' => 'ubvper11s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar movimientos'), array('controller' => 'ubvmov13s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo movimiento'), array('controller' => 'ubvmov13s', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php
}else
{
	echo $this->Form->input('ubvuad09_id',array('id'=>'ubvuad09_id','label'=>'<b>Unidad administrativa<font color="red">*</font></b>'));
}
?>