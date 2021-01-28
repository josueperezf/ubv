<div align="center">
<h2 class="titulo" style="width:330px">Iniciar Sesion</h2>
<div class="gradiente" style="width:300px" align="center">
<?php
echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));
echo $this->Form->input('User.username',array('label'=>'Login','autofocus'=>'autofocus','style'=>'width:280px'));
echo $this->Form->input('User.password',array('label'=>'Password','style'=>'width:280px'));
echo $this->Form->end('Entrar');
?>
<br />
</div>
<br />
</div>