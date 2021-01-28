<div class="users form">
<?php echo $this->Form->create('User');
$userSession = $this->Session->read('Auth.User');
?>
<h3 class="titulo">Nuevo usuario</h3>
<div class="gradiente">
	<?php
		echo $this->Form->input('ubvper11_id',array('id'=>'ubvper11_id','label'=>'<b>Personal<font color="#FF0000">*</font><b>','autofocus'=>'autofocus'));
		echo $this->Form->input('username',array('label'=>'Nombre usuario','id'=>'username','maxlength'=>'15'));
		echo $this->Form->input('password',array('id'=>'password','maxlength'=>'10'));
		echo $this->Form->input('password2',array('id'=>'password2','type'=>'password','label'=>'<b>Confirmar password<font color="#FF0000">*</font></b>'));
		echo $this->Form->input('group_id',array('label'=>'Tipo'));
		echo $this->Form->input('estatus',array('type'=>'hidden','value'=>'1'));
		
	?>
    <input type="button" name="guardar" value="Guardar" onclick="return addUser();">
</div>
</div>
<div id="menu">
<?php if($userSession['group_id']==2){?>
	<ul>

		<li><?php echo $this->Html->link(__('Listar usuarios'), array('action' => 'index')); ?></li>
     </ul>
<?php }else if($userSession['group_id']==1){?>
	<ul>
	<li><?php echo $this->Html->link(__('Listar usuarios'), array('action' => 'index')); ?></li>
	
		<li><?php echo $this->Html->link(__('Listar Grupos'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Grupo'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
    <?php }?>
</div>