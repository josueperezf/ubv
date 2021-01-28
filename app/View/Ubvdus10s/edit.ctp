<?php if($this->request->is('ajax')==false){
	if($cantidadbienes>0)
		$tipo='hidden';
	else
		$tipo='checkbox';
?>
<script>
$(document).ready(function(e) {
    $('#Ubvsub06_id').val(<?php echo $this->data['Ubvuad09']['ubvsub06_id'];?>);
});
</script>

<div class="ubvdus10s form">

<?php echo $this->Form->create('Ubvdus10'); ?>
<h3 class="titulo"><?php echo __('Editar dependencia usuaria'); ?></h3>
<div class="gradiente">
	<?php
		echo $this->Form->input('id',array('id'=>'id'));
		echo $this->Form->input('Ubvsub06_id',array('id'=>'Ubvsub06_id','label'=>'<b>Sub-coordinacion</b>','onchange'=>'return libAjax("Ubvdus10EditForm","/ubv/ubvdus10s/edit/","divDus");'));
		echo('<div id="divDus">');
		echo $this->Form->input('ubvuad09_id',array('id'=>'ubvuad09_id','label'=>'Unidad administrativa'));
		echo('</div>');
		echo $this->Form->input('nombre',array('id'=>'nombre'));
		echo $this->Form->input('estatus',array('type'=>$tipo));
	?>
<input type="button" name="guardar" id="guardar" value="Guardar" onclick="editDus();"><br /><br />
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Listar D. usuaria'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar bien'), array('controller' => 'ubvbie12s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo bien'), array('controller' => 'ubvbie12s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar personal'), array('controller' => 'ubvper11s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo personal'), array('controller' => 'ubvper11s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo movimiento'), array('controller' => 'ubvmov13s', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php
}else
{
	echo $this->Form->input('ubvuad09_id',array('id'=>'ubvuad09_id','label'=>'<b>Unidad administrativa<font color="red">*</font></b>'));
}
?>