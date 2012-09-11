<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
<?php $this->load->view("head_abm.php") ?>
<?php $this->load->view("script_abm.php")?>
</head>

<body>
 	<div class="container_16">

		<?php $this->load->view("cenefa.php")?>
		<?php $this->load->view("menu_superior.php")?>        
		 	<div class="grid_6 prefix_5">
				<div class="box">		 		
					<div id="infoMessage"><?php echo $message;?></div>
	    			<?php echo form_open("auth/login");?>
	    			<fieldset><legend>LOGIN</legend>
					<p>Por favor, ingrese su usuario (direccion de email) y clave para ingresar al sitio.</p>
					<p>
	      			<label for="email">Email:</label>
	      			<?php echo form_input($identity);?>
	      			</p>
	      			<p>
	      			<label for="password">Password:</label>
	      			<?php echo form_input($password);?>
	      			</p>
	      			<p>
		      		<label for="remember">Recuerdame en este sitio:</label>
		      		<?php echo form_checkbox('remember', '1', FALSE);?>
		      		</p>
	      			<?php echo form_submit('submit', 'Ingresar');?>
	    			</fieldset>
	    			<?php echo form_close();?>
    			</div>
    		</div>
		<div class="clear"></div>        
    	<?php $this->load->view("pie.php") ?>
 
	</div>
</body>
</html>    