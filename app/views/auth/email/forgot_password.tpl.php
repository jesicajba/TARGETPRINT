<html>
<body>
	<h1>Restablecer clave para <?php echo $identity;?></h1>
	<p>Por favor, haga clic sobre el enlace  <?php echo anchor('auth/reset_password/'. $forgotten_password_code, 'Restablecer clave');?>.</p>
</body>
</html>