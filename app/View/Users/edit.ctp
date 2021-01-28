<div class="users form">
	<?php echo $this->Form->create('User');
    $userSession = $this->Session->read('Auth.User');
	$tipoGroup='select';
	if($userSession['group_id']==3)
		$tipoGroup='hidden';
	echo $this->Form->create('User');?>
    
		<h3 class="titulo"><?php echo __('Editar Usuario'); ?></h3>
        <div class="gradiente">
			<?php
				echo $this->Form->input('id',array('id'=>'id'));
				echo $this->Form->input('aux',array('type'=>'hidden','id'=>'aux','value'=>$this->data['User']['password']));
				echo $this->Form->input('ubvper11_id',array('type'=>'hidden','value'=>$this->data['User']['ubvper11_id']));
				echo $this->Form->input('ubvper11_id2',array('label'=>'<b>Personal</b>','type'=>'text','disabled'=>'disabled','value'=>$this->data['Ubvper11']['nombre']));
				echo $this->Form->input('username',array('label'=>'<b>Nombre de usuario</b>','maxlength'=>'15','id'=>'username'));
				echo $this->Form->input('password',array('maxlength'=>'10','id'=>'password'));
				echo $this->Form->input('password2',array('id'=>'password2','value'=>$this->data['User']['password'],'type'=>'password','label'=>'<b>Confirmar password<font color="#FF0000">*</font></b>'));
				echo $this->Form->input('group_id',array('label'=>'Tipo','type'=>$tipoGroup));
				if($userSession['group_id']==1)
					echo $this->Form->input('estatus',array('type'=>'checkbox','label'=>'<b>estatus</b>'));
				else if($userSession['group_id']==2 && $this->data['User']['username']!=$userSession['username'])
				echo $this->Form->input('estatus',array('type'=>'checkbox','label'=>'<b>estatus</b>'));
			?>
            <input type="button" name="guardar" value="Guardar" onclick="return editUser();">
            <br /><br />
        </div>
</div>
<div id="menu">
<?php
if($userSession['group_id']==2)
{
?>
	<ul>
        <li><?php echo $this->Html->link(__('Listar Usuario'), array('action' => 'index')); ?></li>
      </ul>
<?php }else if($userSession['group_id']==1){?>
	<ul>
    	<?php if($userSession['id']!=$this->request->data['User']['id']){?>
    	<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Estas seguro que deseas eliminar este usuario', $this->Form->value('User.id'))); ?></li>
        <?php }?>
		<li><?php echo $this->Html->link(__('Listar Usuario'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Grupos'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Grupo'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
    <?php }?>
</div>