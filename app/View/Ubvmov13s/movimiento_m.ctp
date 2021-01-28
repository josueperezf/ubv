<?php
if($this->request->is('ajax')==false)
{?>
<div class="ubvmov13s index">
	<h3 class="titulo"><?php echo __('Movimiento Mensuales'); ?></h3>
    <div class="gradiente">
    	<?php
        	echo $this->Form->create('Ubvmov13',array('action' => 'pdfMensual','type' => 'post'));
			echo $this->Form->input('Ubvsub06_id',array('id'=>'ubvsub06s2','label'=>'<b>Sub-coordinacion</b>','onchange'=>'return libAjax("Ubvmov13PdfMensualForm","/ubv/ubvuad09s/listUad/","divUad");'));
			echo('<div id="divUad"></div>');
			
		?>
        <div id="fechas"></div>
        <br /><br />
    	<input type="button" value="Reporte" onclick="return repMovM();">
    	<br /><br />        
	</div>
</div>



<div id="menu">
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo movimiento'), array('action' => 'add')); ?></li>

		<li><?php echo $this->Html->link(__('Listar D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva D. usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
	</ul>
</div>

<!-- evento-->
<?php
}else
{
echo $this->Form->input('depend',array('id'=>'depend','type'=>'select','label'=>'<b>Dependencia usuaria<font color="#FF0000">*</font></b>','options'=>$depend,'onchange'=>'return libAjax("Ubvmov13PdfMensualForm","/ubv/ubvmov13s/listarFechas/","algo")'));
echo('<div id="algo"></div>');
/*    $this->js->get('#depend')->event(
										'change',
										$this->js->request(
														array('action' => 'listarFechas'),
														array(
															'update' => '#fechas',
															'async' => true,
															'dataExpression' => true,
															'method' => 'post',
															'data' => $this->js->serializeForm(array('isForm' => true, 'inline' => true))
															)
														)
										);*/
	
}									
?>