<?php $idBien=$this->params['named']['bienRep'];?>
<div class=" ubvmov13s form">
<h3 class="titulo"> Operacion exitosa</h3>
<div class="gradiente" align="center">
	<?php echo $this->Html->image('MovimientoSatisfactorio.jpg',array('width'=>300,'height'=>300,'align'=>'center'));?>

</div>
</div>
<div id="menu">
	<ul>

		<li><?php echo $this->Html->link(__('Nuevo movimiento'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Imprimir'), array('controller'=>'ubvmov13s','action' => 'pdfMovimiento','idBien'=>$idBien)); ?></li>
	</ul>
</div>