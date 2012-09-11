<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?php $this->load->view("head.php") ?>
<?php $this->load->view("script.php")?>
</head>

<body>
  <div id="pagina">
	<?php $this->load->view("cenefa.php")?>
	<?php $this->load->view("menu.php")?>        
			
	<div id="cuerpo"> 

	<h1>Login</h1>
    <div class="fverde">
		<p>Por favor, ingrese su usuario (direccion de email) y clave para ingresar a MargiolakisGlobal.</p>
		<div id="infoMessage"><?php echo $message;?></div>
	
    	<?php echo form_open("auth/loginback/?donde=$donde&id=$id");?>
    	
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
      	<div class="separador"></div>
      	<p><?php echo form_submit('submit', 'Ingresar');?></p>

      
    	<?php echo form_close();?>

	</div>
    
    </div>    
    <?php $this->load->view("pie.php") ?>
   
  </div><!--fin pagina-->
</body>

</html>
