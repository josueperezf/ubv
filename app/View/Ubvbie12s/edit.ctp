<div class="ubvbie12s form">
<div id="nuevaMarca" style="width:300px; margin-left:36%; margin-top:90px; position:absolute"></div>
<?php echo $this->Form->create('Ubvbie12'); ?>
<h3 class="titulo"><?php echo __('Editar bien'); ?> </h3>
<div class="gradiente">
	<?php
		echo $this->Form->input('id',array('id'=>'id'));
		echo $this->Form->input('Ubvcat04s',array('options'=>$Ubvcat04s,'id'=>'Ubvcat04s','label'=>'<b>Categoria</b>','autofocus'=>'autofocus','id'=>'Ubvcat04s'));?>
		<div id="denominacion">
		<?php
		echo $this->Form->input('ubvden08_id',array('id'=>'ubvden08_id','label'=>'Denominacion'));
        ?></div><?php
		//echo $this->Form->input('ubvden08_id');
		echo $this->Form->input('estatus',array('type'=>'hidden','id'=>'estatus'));
		echo $this->Form->input('ubvdus10_id',array('type'=>'hidden'));
		echo $this->Form->input('fecha',array('type'=>'hidden','value'=>''));
		echo $this->Form->input('ubvdtm07_id',array('type'=>'hidden','value'=>''));
		?><div id="divMarca"><?php
		echo $this->Form->input('ubvmar01_id',array('label'=>'<b>Marca</b>'));?>
        </div><?php
		echo $this->Form->input('codigo',array('type'=>'hidden'));
		echo $this->Form->input('serial',array('id'=>'serial','maxlength'=>'20'));
		echo $this->Form->input('monto',array('type'=>'text','id'=>'monto','maxlength'=>'10'));
		echo $this->Form->input('descripcion',array('label'=>'<b>Descripcion</b>','maxlength'=>'100'));
	?>
<input type="button" name="guardar" value="Guardar" onclick="editBie();">
<br /><br />
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Listar bien'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar marcas'), array('controller' => 'ubvmar01s', 'action' => 'index')); ?> </li>
		<li><a href="#" class="nMarca">Nueva marca</a></li>
	</ul>
</div>
<?php
    $this->js->get('#Ubvcat04s')->event(
										'change',
										$this->js->request(
														array('controller' => 'ubvden08s', 'action' => 'listaDeno'),
														array(
															'update' => '#denominacion',
															'async' => true,
															'dataExpression' => true,
															'method' => 'post',
															'data' => $this->js->serializeForm(array('isForm' => true, 'inline' => true))
															)
														)
										);
    $this->js->get('.nMarca')->event(
										'click',
										$this->js->request(
														array('controller' => 'ubvmar01s', 'action' => 'add'),
														array(
															'update' => '#nuevaMarca',
															'async' => true,
															'dataExpression' => true,
															'method' => 'post',
															'data' => $this->js->serializeForm(array('isForm' => true, 'inline' => true))
															)
														)
										);
									
?>