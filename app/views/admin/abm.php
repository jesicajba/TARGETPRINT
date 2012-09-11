<?php include(APPPATH."views/admin/head_adm.php") ?>
<body>
 <div class="container">	
	<?php include (APPPATH."views/admin/cenefa.php")?>
	<?php include (APPPATH."views/admin/menu.php")?>

	<div class='row' id='cuerpo'>
		<?php echo $output; ?>
	</div>
	
	<div class="clear"></div>	
	<? include( APPPATH."views/admin/pie.php") ?>
</div>
<? include( APPPATH."views/admin/script_adm.php") ?>

</body>
</html>

