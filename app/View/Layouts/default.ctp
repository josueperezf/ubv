<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'UBV Inventario');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('menuHorizontal','cake.generic','style','formulario','style3','menu'));
		echo $this->Html->script(array('jquery','js','validacion','swfobject'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->js->writeBuffer(array('cache'=>TRUE));
	?>
</head>
<body>
	<div id="container">
		<div id="header" align="center">
			<?php echo $this->Html->image('banner-ubv.bmp'); ?>
		</div>
        	
        <?php
		$user = $this->Session->read('Auth.User');
		if(!empty($user)){?>
        <div id='fichaUsuario'>
        	<table border="0">
            	<tr>
                	<td width="45%">
					<?php echo $this->Html->image('usuario.png',array('height'=>'110','width'=>'50')); ?>
                    <br />
                    <b><?php echo $user['username'];?></b>
                    </td>
                    <td>
                    <br /><br />
                    <b>Tipo:</b><br />
                    <b><?php echo $user['Group']['name'];?></b>
                    <?php
                    	echo $this->Html->image("salir.png", array("height"=>"30","width"=>"30","alt" => "Salir",
    'url' => array('controller' => 'Users', 'action' => 'logout')
));?>

                  </td>
               </tr> 
            </table>
		</div>
        
        <?php }?>
		<div id="content">
     <div id="mensaje" style="width:200px; position:absolute; margin-top:0px; font-size:14px; padding-top:0px; margin-left:75%; box-shadow: 5px 10px 15px #333333;"></div>
     <?php
     	if(!empty($user))
		 echo $this->element('menu/top_menu');
	 ?>
  <br />   
		<div id="cargando" class="cargando"><?php echo $this->Html->image('ajax-loader.gif')?></div>
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
            
		</div>
		<div id="footer">
			<?php /*echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);*/
			?>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>