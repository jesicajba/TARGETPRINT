<html>
<body>
	<h1>Activacion de cuenta <?php echo $identity;?></h1>
	<p>Falta un ultimo paso para poder acceder al sitio Medias Himalaya SA. <br />
		
	</p>
	<p>Por favor, haga clic en el enlace siguiente para  <?php echo anchor('auth/activate/'. $id .'/'. $activation, 'Activar la cuenta');?>.</p>
	<p>Muchas gracias por registrarse en nuestro sitio.
	</p>
</body>
</html>