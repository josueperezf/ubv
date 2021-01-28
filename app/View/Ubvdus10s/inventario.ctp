<?php
if($this->request->is('ajax')==false)
{?>
<div class="ubvdus10s form">
	<?php echo $this->Form->create('Ubvdus10',array('action' => 'pdfInventario','type' => 'post',)); ?>
	<h3 class="titulo"><?php echo __('Inventario'); ?></h3>
    <div class="gradiente">
    <?php
		echo $this->Form->input('ubvsub06_id',array('label'=>'<b>Sub-coordinacion<font color="#FF0000">*</font></b>','id'=>'ubvsub06_id','onchange'=>'return libAjax("Ubvdus10PdfInventarioForm","/ubv/ubvdus10s/inventario/","divUad");'));
		
    ?>
    <input type="hidden" name="bandera" value=0>
    <div id="divUad"></div>
    <br /><br />
    <!--<input type="submit" value="Reporte" >-->
    <input type="button" value="Reporte" onclick="return invDus();">
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
		<li><?php echo $this->Html->link(__('Listar personal'), array('controller' => 'ubvper11s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo personal'), array('controller' => 'ubvper11s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo movimiento'), array('controller' => 'ubvmov13s', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php
}else
{		
	echo $this->Form->input('ubvuad09_id',array('label'=>'<b>Unidad Administrativa<font color="#FF0000">*</font></b>','id'=>'ubvuad09_id','onchange'=>'return libAjax("Ubvdus10PdfInventarioForm","/ubv/ubvdus10s/listDusper/","divDus");'));
	echo('<div id="divDus"></div>');
}?>