<div class="row">
    <div id="menu" class="pretty navbar">    
    		<h1 class="logo"><img src="img/admin/titulo.png" /></h1>
            <ul>
            	<li><?php echo anchor("", "ABM Auxiliares"); ?>
            	<div class="dropdown">
	            	<ul>
						<li><?php echo anchor("/admin/abm_genero", "ABM de Genero de articulo "); ?></li>
						<li><?php echo anchor("/admin/abm_marca", "ABM de Marcas de articulos"); ?></li>
						<li><?php echo anchor("/admin/abm_seccion", "ABM de Seccion de articulos"); ?></li>
		            	<li><?php echo anchor("/admin/abm_tablatalle", "ABM Tabla de talles"); ?></li>
		            	<li><?php echo anchor("/admin/abm_tablacolor", "ABM Tabla de colores"); ?></li>
		            	<li><?php echo anchor("/admin/abm_talle", "Asignar Talles  a Tabla"); ?></li>
		            	<li><?php echo anchor("/admin/abm_color", "Asignar colores a Tabla"); ?></li>
					</ul>
				</div>
				</li>
            	<li><?php echo anchor("", "ABM de articulos"); ?>
            	<div class="dropdown">
	            	<ul>
						<li><?php echo anchor("/admin/abm_articulo", "ABM de articulos"); ?></li>
		            	<li><?php echo anchor("/admin/cambiar_precio", "Cambiar precios"); ?></li>
		            </ul>
	            </div>
	            </li>
            	<li><?php echo anchor("", "Configurar"); ?>
            	<div class="dropdown">
	            	<ul>	            
						<li><?php echo anchor("/", "Datos generales"); ?></li>
						<li><?php echo anchor("/", "base de datos"); ?></li>
						<li><?php echo anchor("/", "Varios"); ?></li>
					</ul>
				</div>
				</li>
            	<li><?php echo anchor("", "Usuarios"); ?>
            	<div class="dropdown">
	            	<ul>	            
						<li><?php echo anchor("/auth", "Gestion de usuarios"); ?></li>
						<li><?php echo anchor("/auth/change_password", "Cambiar clave"); ?></li>
						<li><?php echo anchor("/auth/logout", "Logout"); ?></li>
					</ul>
				</div>
				</li>
            </ul>  
    </div><!--fin menu-->
</div>    