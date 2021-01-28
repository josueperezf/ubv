<?php
$userSession = $this->Session->read('Auth.User');
//debug($userSession);
?>
<div class="users index">
	<h3 class="titulo"><?php echo __('Usuarios'); ?></h3>
    <div class="gradiente">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('ubvper11_id','Personal'); ?></th>
			<th><?php echo $this->Paginator->sort('username','nombre usuario'); ?></th>
			<!--<th><?php //echo $this->Paginator->sort('password'); ?></th>-->
			<th>
				<?php
					if($userSession['group_id']==1 || $userSession['group_id']==2)
                	echo $this->Paginator->sort('group_id','Tipo');
				?>
            </th>
            <th><?php echo $this->Paginator->sort('estatus'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
    	foreach ($users as $user):
		//($user);
		if(($userSession['group_id']==3) && ($user['User']['username']==$userSession['username']))
		{
	?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
        <td><?php echo $user['Ubvper11']['nombre']?>&nbsp;</td>
		<td><?php echo h($user['User']['username']);?>&nbsp;</td>
        <td>&nbsp;</td>
		<!--<td><?php //echo h($user['User']['password']); ?>&nbsp;</td>-->
		<td>
			<?php
            	if($user['User']['estatus']==1)
					echo $this->Html->image('activo.png');
				else
					echo $this->Html->image('inactivo.png');
			?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id'])); ?>
		</td>
	</tr>
<?php }else if(($userSession['group_id']==2) && ($user['User']['group_id']!=1))
		{?>
			<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
        <td><?php echo $user['Ubvper11']['nombre']?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<!--<td><?php //echo h($user['User']['password']); ?>&nbsp;</td>-->
		<td>
			<?php
            	echo h($user['Group']['name']);
			?>
		</td>
        <td>
        <?php
            	if($user['User']['estatus']==1)
					echo $this->Html->image('activo.png');
				else
					echo $this->Html->image('inactivo.png');
			?>
         </td>
		<td class="actions">
		<?php
        	if($userSession['group_id']==1)
			?>
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id'])); ?>
		</td>
	</tr>	
		<?php 
		}
	else if($userSession['group_id']==1)
		{?>
			<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
        <td><?php echo $user['Ubvper11']['nombre']?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
		</td>
        <td>
			<?php
            	if($user['User']['estatus']==1)
					echo $this->Html->image('activo.png');
				else
					echo $this->Html->image('inactivo.png');
			?>
        </td>
		<td class="actions">
		<?php
        	if($userSession['group_id']==1)
			?>
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id'])); ?>
		</td>
	</tr>	
		<?php }
	endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} registros de un total de {:count} total, iniciando en el {:start} y terminando en el  {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
</div>

<div id="menu">
<?php if($userSession['group_id']==2)
{
	?>
    	<ul>
		<li><?php echo $this->Html->link(__('Nuevo usuario'), array('action' => 'add')); ?></li>
        </ul>
	<?php
}else if($userSession['group_id']==1){?>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo usuario'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Grupos'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Grupo'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
    <?php }?>
</div>
