<?php
if(!array_key_exists('Ubvmov13',$this->data))
	$llamar='lisDepUsu();';
else
 	$llamar='return libAjax("Ubvmov13PdfMensualForm","/ubv/ubvmov13s/movimientoM/","dus")';
	
	echo $this->Form->input('ubvuad09_id',array('id'=>'ubvuad09_id','label'=>'<b>Unidad administrativa<font color="#FF0000">*</font></b>','options'=>$ubvuad09_id,'onChange'=>$llamar));
?>
<div id="dus"></div>