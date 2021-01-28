<?php
//debug($ubvdus10s);
echo $this->Html->css(array('jquery-ui-1.10.2.custom','jquery-ui-1.10.2.custom.min'));
echo $this->Html->script(array('jquery-ui-1.10.2.custom.js','jquery-ui-1.10.2.custom.min','interface','calendario','enviarCamposBien','js','enviarCamposBien'));
if(count($ubvdus10s)>1)
{
?>
<div class="ubvbie12s form">
<h3 class="titulo">Nuevo bien</h3>
<div class="gradiente">
<div id="nuevaMarca" style="width:300px; margin-left:36%; margin-top:90px; position:absolute"></div>
<?php

 echo $this->Form->create('Ubvbie12'); ?>
    <?php 
		echo $this->Form->input('ubvdus10_id',array('id'=>'ubvdus10_id','label'=>'Depedencias de almacen','options'=>$ubvdus10s,'autofocus'=>'autofocus'));
		echo $this->Form->input('estatus',array('type'=>'hidden','id'=>'estatus','value'=>1));
		echo $this->Form->input('Ubvcat04s',array('options'=>$Ubvcat04s,'id'=>'Ubvcat04s','label'=>'<b>Categoria</b>'));?>
        <div id="denominacion">
		<?php
		echo $this->Form->input('ubvden08_id',array('id'=>'ubvden08_id','label'=>'Denominacion','options'=>array(0=>'SELECCIONE')));?>
        </div>
		<?php     
		//echo $this->Form->input('ubvdus10_id',array('id'=>'ubvdus10_id','type'=>'hidden','value'=>$ubvdus10s[0]['du']['id']));?>
        <div id="divMarca">
        <?php
		echo $this->Form->input('ubvmar01_id',array('id'=>'ubvmar01_id','label'=>'Marca'));?>
        </div>
		<div id="camposDinamicos">
        <?php
		echo $this->Form->input('ubvdtm07_id',array('id'=>'ubvdtm07_id','label'=>'<b>Razon de incorporacion<font color="#FF0000">*</font></b>','options'=>$Ubvdtm07s));
		echo $this->Form->input('fecha',array('id'=>'fecha','onfocus'=>'removerFoco();','maxlength'=>'0','label'=>'<b>Fecha<font color="#FF0000">*</font></b>'));
		?>
        
        <table id="prueba" border="0" cellpadding="0">
        	<tr >
            	<td style="border-bottom:none"><?php echo $this->Form->input('codigo',array('id'=>'codigo','placeholder'=>'Solo numeros','maxlength'=>'10','style'=>'width:90px'));?></td>
                <!-- ,'onblur'=>'mensajeOnBlur();'-->
                <td style="border-bottom:none"><?php echo $this->Form->input('serial',array('id'=>'serial','placeholder'=>'Opcional'));?></td>
                <td style="border-bottom:none"><?php echo $this->Form->input('monto',array('id'=>'monto','type'=>'text','alt'=>'dinero','placeholder'=>'decimales con punto (.)','maxlength'=>'10')); echo $this->Form->input('bandera',array('id'=>'bandera','type'=>'hidden','value'=>0));?></td>
            </tr>
            <tr>
            	<td colspan="3" class="input text" style="background-color:#FFF; border-bottom:none"><?php echo $this->Form->input('descripcion',array('id'=>'descripcion','placeholder'=>'Opcional','maxlength'=>'100')); ?></td>
                
            </tr>
            <tr>
            	<td colspan="3" style="border-bottom:none">
                	
                    <?php
						echo $this->Form->end();
                    ?>
                </td>
            </tr>
            <tr style="background-color:#FFF">
            	<td colspan="3">
				<?php 
                	echo $this->Html->link('Nuevo',array('action'=>'add'),array('title'=>'nuevo'));
				?>
                <input type="button" id="guardarBien" onclick="addBie();" name="guardar" value="Guardar" />
                </td>
            </tr>
            </table></div>
        
        
       

<br /><br />
</div>
</div>
<?php
}else{?>
<div class="ubvbie12s form">
<h3 class="titulo">Informacion</h3>
<div class="gradiente">
	<br /><br /> <p>Para la insercion de bienes es necesario que exista al menos una unidad adinistrativa y que esta posea dependecias usuarias asociadas.</p>
</div>
</div>
<?php
}?>
<div id="menu">
	<ul>

		<li><?php echo $this->Html->link(__('Listar bienes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar depend usuaria'), array('controller' => 'ubvdus10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva depend usuaria'), array('controller' => 'ubvdus10s', 'action' => 'add')); ?> </li>
        <li><a href="#" class="nMarca">Nueva marca</a></li>
	</ul>
</div>


<?php
//$this->js->get('.nMarca')->event('click', $this->js->alert('Hola!'));
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
										
/*marca*/
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

/*$this->js->get('#guardarAjax')->event(
									'click',
											$this->js->request(
												array('action' => 'addAjax'),
												array(
													'update' => ' #camposDinamicos',
													'async' => true,
													'dataExpression' => true,
													'method' => 'post',
													'data' =>$this->js->serializeForm(array('isForm' => true, 'inline' => true))
													)
													)
											);*/
?>