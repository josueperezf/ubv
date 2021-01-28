<?php
class MensajeHelper extends AppHelper {
	public function campoMensaje($codigo,$texto)
	{
		?>
	<script>
		quitarMensaje();
		$('#container #content #<?php echo $codigo; ?>').after('<div class="error-message"><?php echo $texto; ?></div></div>');
    </script>
		<?php
	}
	public function quitarMensaje()
	{
		?>
        <script>
			quitarMensaje();
        </script>
		<?php
	}
}
