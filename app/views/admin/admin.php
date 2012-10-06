<?php include(APPPATH."views/admin/head_adm960.php") ?>
<body>
 	<div class="container_16">
		<?php include (APPPATH."views/admin/cenefa.php")?>
		<?php include (APPPATH."views/admin/menu.php")?>

		<div class='grid_16'>
			<div class="box">
				<h3>PANEL de ADMINISTRACION</h3>
				<p>Realice aqui la configuracion de su catalogo</p>
				<ul>
					<li>Para crear nuevos articulos debe tener al menos un GENERO, MARCA y SECCION previamente cargadas para poder asignarlas</li>
					<li>Utilice tambien el panel para administrar la base de usuarios registrados</li>
				</ul>
			</div>
		</div>
		<? include( APPPATH."views/admin/pie.php") ?>
	</div>
	<? include( APPPATH."views/admin/script_adm960.php") ?>

</body>
</html>
