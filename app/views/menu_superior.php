			<div class="grid_16">
			  <ul class="nav main" id="menu">
					<li id="first">
						<a href="/">Equipos Multifuncion</a>
						<ul>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Multifuncion 1</a>
							</li>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Multifuncion 2</a>
							</li>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Multifuncion 3</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="/">Impresoras</a>
						<ul>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Impresoras 1</a>
							</li>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Impresoras 2</a>
							</li>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Impresoras 3</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="/">Insumos</a>
						<ul>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Insumos 1</a>
							</li>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Insumos 2</a>
							</li>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Insumos 3</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="/">Insumos Alternativos</a>
						<ul>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Alternativos 1</a>
							</li>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Alternativos 2</a>
							</li>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Alternativos 3</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="/">Telefonía</a>
						<ul>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Telefonia 1</a>
							</li>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Telefonia 2</a>
							</li>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Telefonia 3</a>
							</li>
						</ul>
					</li>
                    <li>
						<a href="/">Accesorios</a>
						<ul>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Accesorios 1</a>
							</li>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Accesorios 2</a>
							</li>
							<li>
								<a href="<?php echo site_url(); ?>/catalogo/">Accesorios 3</a>
							</li>
						</ul>
					</li>
					<?php if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) : ?>
						<li><a href="<?php echo site_url(); ?>/admin/">Administracion</a></li>
					<?php endif; ?>
					<?php if ($this->ion_auth->logged_in()) : ?>
						<li><a href="<?php echo site_url(); ?>/auth/logout/">Logout</a></li>
					<?php  else : ?>
						<li><a href="<?php echo site_url(); ?>/auth/login/">Login</a></li>
						<li><a href="<?php echo site_url(); ?>/auth/crear_usuario/">Registro</a></li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="clear"></div>