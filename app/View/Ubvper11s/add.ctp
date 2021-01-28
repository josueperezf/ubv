<div class="ubvper11s form">
<?php echo $this->Form->create('Ubvper11'); ?>
<h3 class="titulo"><?php echo __('Nuevo personal'); ?></h3>
<div class="gradiente">
	<?php
		echo $this->Form->input('carOculto',array('type'=>'hidden','id'=>'carOculto','value'=>''));
        echo $this->Form->input('ubvsub06s',array('type'=>'select','label'=>'<b>Sub-coordinacion<font color="#FF0000">*</font></b>','id'=>'ubvsub06s','options'=>$ubvsub06s));
		?>
        <div id="Uad">
        </div>
		<?php
		echo $this->Form->input('ubvdus10_id',array('type'=>'hidden','id'=>'ubvdus10_id'));
		echo $this->Form->input('ubvcar05_id',array('id'=>'ubvcar05_id','type'=>'hidden'));
		echo $this->Form->input('cedula',array('type'=>'text','placeholder'=>'Este debe poseer solo numeros','id'=>'cedula','maxlength'=>8));
		echo $this->Form->input('nombre',array('id'=>'nombre'));
		echo $this->Form->input('telefono',array('type'=>'text','id'=>'telefono','placeholder'=>'0000-0000000'));
		echo $this->Form->input('estatus',array('type'=>'checkbox','checked'=>'checked'));
	?>
<input type="button" name="Guardar" value="Guardar" onclick="addPer();"><br /><br />
</div>
</div>
<div id="menu">
	<ul>

		<li><?php echo $this->Html->link(__('Listar personal'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar depend usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva depend usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php
    $this->js->get('#ubvsub06s')->event(
										'change',
										$this->js->request(
														array('controller' => 'ubvuad09s', 'action' => 'listUad'),
														array(
															'update' => '#Uad',
															'async' => true,
															'dataExpression' => true,
															'method' => 'post',
															'data' => $this->js->serializeForm(array('isForm' => true, 'inline' => true))
															)
														)
										);
										
?>