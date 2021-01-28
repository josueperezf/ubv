<div class="ubvmov13s form">
<div id="bienesMover" class="contenedorAjax ocultar">
</div>
<?php echo $this->Form->create('Ubvmov13'); ?>
		<h3 class="titulo"><?php echo __('Nuevo movimiento'); ?></h3>
        <div class="gradiente">
        <input type="hidden" name="indiceFila" id="indiceFila" value="0">
        <input type='hidden' name='idarray[]' id='idarray[]'>
        <input type='hidden' name='codigoarray[]' id='codigoarray[]'>
        <table border="0">
        <tr><td width="50%">
	<?php
		echo $this->Form->input('ubvdtm07_id',array('id'=>'ubvdtm07_id','type'=>'hidden','value'=>''));
		echo $this->Form->input('ubvtmv02s',array('id'=>'ubvtmv02s','onChange'=>'return cambiarValorSelect(this);','label'=>'<b>Tipo de movimiento<font color="#FF0000">*</font></b>','options'=>$ubvtmv02s,'style'=>'width:100%'));
		?>
        </td><td>
        <div id="listaRazones"></div>
        </td>
        </tr>
        <tr>
        <td colspan="2" style="background-color: #FFF; border-top:none; border-bottom:none">
        	<h3 class="subTitulo">Origen</h3>
        </td>
        </tr>
        </table>
		<?php
		echo $this->Form->input('sub06Desincorporacion',array('type'=>'hidden','id'=>'sub06Desincorporacion','value'=>$sub06Desincorporacion));
		echo $this->Form->input('Ubvuad09Desin',array('type'=>'hidden','id'=>'Ubvuad09Desin','value'=>$Ubvuad09Desin));
		echo $this->Form->input('Ubvdus10Desin',array('type'=>'hidden','id'=>'Ubvdus10Desin','value'=>$Ubvdus10Desin));
		
		echo $this->Form->input('fecha',array('type'=>'hidden','value'=>''));
		echo $this->Form->input('ubvsub06s',array('type'=>'select','label'=>'<b>Sub-coordinacion<font color="#FF0000">*</font></b>','id'=>'ubvsub06s','options'=>$ubvsub06s));?>
        <div id="Uad"></div>
        
        <?php
		//para el dependencia usuaria origen
		echo $this->Form->input('Ubvdus10',array('id'=>'Ubvdus10','type'=>'hidden'));
		//para la dependencia usuaria destino
		//echo $this->Form->input('ubvdus10_id',array('id'=>'ubvdus10_id','type'=>'hidden','value'=>''));
		
	?>
    <!--<div id="depDest"></div>-->
<h3 class="subTitulo">Destino</h3>
<?php
echo $this->Form->input('ubvsub06sD',array('type'=>'select','style'=>'display:none','label'=>'<b>Sub-coordinacion<font color="#FF0000">*</font></b>','id'=>'ubvsub06s2','options'=>$ubvsub06s,'onChange'=>'lisUadD();'));?>
<div id="UadD"></div>

<input type="button" name="mover" value="Mover" onclick="addMov();">
<br /><br />
</div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Listar D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php
    $this->js->get('#Ubvdus10')->event(
										'change',
										$this->js->request(
														array('controller' => 'ubvmov13s', 'action' => 'depDestino'),
														array(
															'update' => '#depDest',
															'async' => true,
															'dataExpression' => true,
															'method' => 'post',
															'data' => $this->js->serializeForm(array('isForm' => true, 'inline' => true))
															)
														)
										);


    $this->js->get('#ubvdus10_id2')->event(
										'change',
										$this->js->request(
														array('controller' => 'ubvmov13s', 'action' => 'depDestino'),
														array(
															'update' => '#subAjax',
															'async' => true,
															'dataExpression' => true,
															'method' => 'post',
															'data' => $this->js->serializeForm(array('isForm' => true, 'inline' => true))
															)
														)
										);


    $this->js->get('#ubvtmv02s')->event(
										'change',
										$this->js->request(
														array('controller' => 'ubvdtm07s', 'action' => 'listRaz'),
														array(
															'update' => '#listaRazones',
															'async' => true,
															'dataExpression' => true,
															'method' => 'post',
															'data' => $this->js->serializeForm(array('isForm' => true, 'inline' => true))
															)
														)
										);


    $this->js->get('#ubvsub06s')->event(
										'change',
										$this->js->request(
														array('controller' => 'ubvuad09s', 'action' => 'listMov'),
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