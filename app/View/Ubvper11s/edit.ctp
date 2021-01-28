<div class="ubvper11s form">
<?php echo $this->Form->create('Ubvper11'); ?>
		<h3 class="titulo"><?php echo __('Editar personal'); ?></h3>
        <div class="gradiente">
	<?php
		echo $this->Form->input('id',array('id'=>'id'));
		$aux=implode("-", array_keys($ubvcar05s))."-".implode("-", $ubvcar05s)."-".$this->data['Ubvdus10']['id'];
		echo $this->Form->input('carOculto',array('type'=>'hidden','id'=>'carOculto','value'=>$aux));
		echo $this->Form->input('ubvsub06s',array('type'=>'select','label'=>'<b>Sub-coordinacion<font color="#FF0000">*</font></b>','id'=>'ubvsub06s','options'=>$ubvsub06s));
		?>
        <div id="Uad">
        	<?php
				echo $this->Form->input('ubvdus10_id',array('id'=>'ubvdus10_id','label'=>'Depend usuaria'));
				echo $this->Form->input('ubvcar05_id3',array('id'=>'ubvcar05_id3','type'=>'select','label'=>'<b>Cargo<font color="#FF0000">*</font></b>','options'=>$ubvcar05s));
            ?>
        </div>
		<?php
		echo $this->Form->input('ubvcar05_id',array('type'=>'hidden','id'=>'ubvcar05_id','value'=>''));
		echo $this->Form->input('cedula',array('id'=>'cedula'));
		echo $this->Form->input('nombre',array('id'=>'nombre'));
		echo $this->Form->input('telefono',array('id'=>'telefono'));
		echo $this->Form->input('estatus',array('type'=>'checkbox'));
	?>
<input type="button" name="guardar" value="Guardar" onclick="editPer();">
<br /><br />
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Listar personal'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
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