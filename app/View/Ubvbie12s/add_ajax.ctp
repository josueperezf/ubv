<?php 
echo $this->Html->script(array('js','enviarCamposBien'));
	if($estado=='bien')
	{	
	?>
	<script> mMensaje('El bien ha sido guardado');</script>
    <?php
	$codigo=$this->data['codigo'];
		echo $this->Form->input('ubvdtm07_id',array('id'=>'ubvdtm07_id','type'=>'hidden'));
		echo $this->Form->input('fecha',array('id'=>'fecha','type'=>'hidden'));
		echo $this->Form->input('estatus',array('type'=>'hidden','id'=>'estatus','value'=>1));
		?>
       <table id="prueba" border="0" cellpadding="0">
        	<tr>
            	<td style="border-bottom:none"><?php echo $this->Form->input('codigo',array('id'=>'codigo','value'=>'','label'=>'<b>Codigo<font color="#FF0000">*</font></b>','placeholder'=>'Solo numeros','maxlength'=>'10'));?></td> 
                <td style="border-bottom:none"><?php echo $this->Form->input('serial',array('id'=>'serial','value'=>'','placeholder'=>'opcional','maxlength'=>'20'));?></td>
                <td style="border-bottom:none"><?php echo $this->Form->input('monto',array('id'=>'monto','type'=>'text','value'=>'','label'=>'<b>Monto<font color="#FF0000">*</font></b>','placeholder'=>'decimales con punto (.)','maxlength'=>'10'));
				echo $this->Form->input('bandera',array('id'=>'bandera','value'=>1,'type'=>'hidden'));
				?></td>
            </tr>
            <tr>
            	<td colspan="3" style="border-bottom:none; background-color:#FFF "><?php echo $this->Form->input('descripcion',array('id'=>'descripcion','placeholder'=>'opcional')); ?></td>
                
            </tr>
            <tr>
            	<td colspan="3" style="border-bottom:none">
                	
                    <?php
						echo $this->Form->end();
                    ?>
                </td>
            </tr>
                <tr style="background-color:#FFF; border-bottom:none" >
            	<td colspan="3">
				<?php 
                	echo $this->Html->link('Nuevo',array('action'=>'add'),array('title'=>'nuevo'));
				?>
                <input type="button" id="guardarBien" onclick="addBie();" name="guardar" value="Guardar" />
                <input type="button" value="Finalizar e imprimir" onclick="return enviar(<?php echo($codigo)?>);">
                </td>
            </tr>
        </table>
        
<?php 
}   	
  ?>