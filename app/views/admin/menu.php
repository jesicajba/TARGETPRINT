<div class="grid_16">
          <ul class="nav main">    
            	<li><?php echo anchor("/admin", "ABM Auxiliares"); ?>
	            	<ul>
						<li><?php echo anchor("/admin/abm_genero", "ABM de Genero de articulo "); ?></li>
						<li><?php echo anchor("/admin/abm_marca", "ABM de Marcas de articulos"); ?></li>
						<li><?php echo anchor("/admin/abm_seccion", "ABM de Seccion de articulos"); ?></li>
		            	<li><?php echo anchor("/admin/abm_tablatalle", "ABM Tabla de talles"); ?></li>
		            	<li><?php echo anchor("/admin/abm_tablacolor", "ABM Tabla de colores"); ?></li>
		            	<li><?php echo anchor("/admin/abm_talle", "Asignar Talles  a Tabla"); ?></li>
		            	<li><?php echo anchor("/admin/abm_color", "Asignar colores a Tabla"); ?></li>
					</ul>
				</li>
            	<li><?php echo anchor("/admin", "ABM de articulos"); ?>
	            	<ul>
						<li><?php echo anchor("/admin/abm_articulo", "ABM de articulos"); ?></li>
		            	<li><?php echo anchor("/admin/cambiar_precio", "Cambiar precios"); ?></li>
		            </ul>
	            </li>
            	<li><?php echo anchor("/admin", "Configurar"); ?>
	            	<ul>	            
						<li><?php echo anchor("/admin", "Datos generales"); ?></li>
						<li><?php echo anchor("/admin", "base de datos"); ?></li>
						<li><?php echo anchor("/admin", "Varios"); ?></li>
					</ul>
				</li>
            	<li><?php echo anchor("/admin", "Usuarios"); ?>
	            	<ul>	            
						<li><?php echo anchor("/auth", "Gestion de usuarios"); ?></li>
						<li><?php echo anchor("/auth/change_password", "Cambiar clave"); ?></li>
						<li><?php echo anchor("/auth/logout", "Logout"); ?></li>
					</ul>
				</li>
				<li class="secondary"><?php echo anchor("/", "Volver al Inicio"); ?></li>
            </ul>  
</div>    