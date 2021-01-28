<ul class="mi-menu">
    <li><a href="/ubv/ubvbie12s/bienvenido">Inicio</a></li>
    <li><a href="#">Maestros</a>
    	<ul>
        	<li><a href="/ubv/ubvsub06s/index">Subcoordinacion</a></li>
    		<li><a href="/ubv/ubvuad09s/index">U. Administrativa</a></li>
    		<li><a href="/ubv/ubvdus10s/index">D. Usuaria</a></li>
            <li><a href="/ubv/ubvmar01s/index">Marca</a></li>
            <li><a href="/ubv/ubvper11s/index">Personal</a></li>
            <li><a href="#">
				<?php
                echo $this->Html->link(__('Usuarios'), array('controller'=>'Users','action' => 'index'));?>
            </li>
    	</ul>
    </li>
    <li><a href="#">Procesos</a>
    	<ul>
        	<li><a href="/ubv/ubvbie12s/index">Bienes</a></li>
    		<li><a href="/ubv/ubvmov13s/index">Movimientos</a></li>
    	</ul>
    </li>
    <li><a href="#">Reportes</a>
    	<ul>
        	<li><a href="/ubv/ubvdus10s/inventario">Inventario</a></li>
    		<li><a href="/ubv/ubvmov13s/movimientoM">Movimientos M.</a></li>
            <li><a href="/ubv/ubvbie12s/repArticulo">C. por articulo.</a></li>
            <?php
            	$user = $this->Session->read('Auth.User');
				if($user['group_id']==1)
				{
					
					echo('<li>');
					echo $this->Html->link(__('Auditoria'), array('controller'=>'ubvbit16s','action' => 'index'));
					echo('</li>');
				}
			?>
    	</ul>
    </li>
    <li>
    	<?php echo $this->Html->link(__('Ayuda'), array('controller'=>'ubvbit16s','action' => 'ayuda'));?>
    </li>
    <li>
	<?php 
			echo $this->Html->link(__('Salir'), array('controller'=>'Users','action' => 'logout'));?>
    </li>
</ul>