<?php if($this->params['isAjax']==false){?>
<div class="ubvdus10s form">
<?php echo $this->Form->create('Ubvbie12',array('action' => 'pdfCantidad','type' => 'post',)); ?>
	<h3 class="titulo"><?php echo __('Cantidad por articulo'); ?></h3>
    <div class="gradiente">
    <?php
		echo $this->Form->input('Ubvsub06',array('label'=>'<b>Subcoordinacion <font color="#FF0000">*</font></b>','type'=>'select','autofocus'=>'autofocus','id'=>'Ubvsub06','options'=>$Ubvsub06s));
    ?>
    <div id="divCat"></div>
    <br /><br />
    <!--<input type="submit" value="Reporte" >-->
    
    <input type="button" value="Reporte" onclick="return repCanBie();">
    
    <br /><br />
    </div>
</div>
<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva U. administrativa'), array('controller' => 'ubvuad09s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar bien'), array('controller' => 'ubvbie12s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo bien'), array('controller' => 'ubvbie12s', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php
    $this->js->get('#Ubvsub06')->event(
										'change',
										$this->js->request(
														array('controller' => 'ubvbie12s', 'action' => 'repArticulo'),
														array(
															'update' => '#divCat',
															'async' => true,
															'dataExpression' => true,
															'method' => 'post',
															'data' => $this->js->serializeForm(array('isForm' => true, 'inline' => true))
															)
														)
										);
}else
{
	echo("<form id='categoria'>");
	echo $this->Form->input('Ubvcat04',array('label'=>'<b>Categoria <font color="#FF0000">*</font></b>','type'=>'select','id'=>'Ubvcat04', 'onChange'=>'return libAjax("Ubvbie12PdfCantidadForm","/ubv/ubvden08s/listaDeno","divDeno")','options'=>$Ubvcat04s));
	echo("<div id='divDeno'></div>");
	echo("</form>");
}
?>
