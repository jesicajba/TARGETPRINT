   	<?php echo form_open("auth/logininc?donde=".$this->uri->uri_string()); ?>
                   
   	<?php if ($this->session->flashdata("message")!="") echo "<div id='login_msj' class='ui-state-error'>" . $this->session->flashdata("message") . '</div>'; ?>
    
    <div id="login_reg">
    	<a href="<?php echo site_url()?>/auth/crear_usuario">Registrarse</a>
    </div>
   	
   	<div id="login_usu">
   		<?php echo form_label("Email : ", "identity"); 
              echo form_input(array('name' => 'identity', 'id' => 'identity', 'size' => '20', 'value' => set_value('identity'))); 
   		?>
   	</div>
   	
   	<div id="login_pass">
   		<?php echo form_label("Contraseña : ", "password");
              echo form_password(array('name' => 'password', 'id' => 'password', 'size' => '15', 'value' => set_value('password'))); 
        ?>
    </div>
	
	<div id="login_btn">
		<input type="image" src="img/play-button.png" alt="enviar">
	</div>
	<div id="login_pie">
    	<a href="<?php echo site_url()?>/auth/forgot_password">recordar contraseña</a>
	</div>
	        
   	<?php echo form_close(); ?>  
