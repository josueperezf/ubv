<div class="ubvbit16s index">
	<h2 class="titulo"><?php  echo __('Ayuda'); ?></h2>
	<div class="gradiente">
    	<div id="videos" style="height:800px;">
        <h3>Presentacion</h3>
        	<iframe class='tscplayer_inline' width='100%' height='70%' name='tsc_player' src='/ubv/files/precentacion/precentacion_player.html' scrolling='no' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
	</div>
</div>   
<div id="menu">
	<ul>
		<li><a href="javascript:videos('precentacion');">Presentacion </a> </li>
        <li><a href="javascript:videos('maestro');"> Maestro</a> </li>
        <li><a href="javascript:videos('proceso');">Proceso</a> </li>
		<li><a href="javascript:videos('reportes');">Reportes</a> </li>
        <?php
        	$user = $this->Session->read('Auth.User');
			if($user['group_id']==1){
		?>
        <li><a href="javascript:videos('auditoria');">Auditoria</a> </li>
        <?php }?>
	</ul>
</div>

<div align="center">
<br />
<?php
/*echo $this->Html->media(
     array('video.mp4', array('src' => 'sistema_direcciondelinea.mp4', 'type' => "video/ogg; codecs='theora, vorbis'")),
     array('autoplay')
 ); */?>
</div>
<br />