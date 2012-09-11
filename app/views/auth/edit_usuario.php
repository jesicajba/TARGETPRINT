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
	<div class='fverde'>

	<h1>Registro de nuevo usuario</h1>
	<p>Por favor, ingrese los datos siguientes para concretar el registro.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
    <?php echo form_open("auth/editar_usuario");?>
    <fieldset>
      <legend>Datos personales</legend>
      <label>Primer Nombre:</label>
      <?php echo form_input($first_name);?>
      
      <label>Apellido:</label>
      <?php echo form_input($last_name);?>
      
      <label>Razon social:</label>
      <?php echo form_input($company);?>
      
      <label>Email:</label>
      <?php echo form_input($email);?>
      
      <label>Telefono:</label>
      <?php echo form_input($phone1);?><?php echo form_input($phone2);?><?php echo form_input($phone3);?>
      </fieldset>
      <fieldset><legend>Datos de acceso</legend>
      <label>Clave:</label>
      <?php echo form_input($password);?>
      
      <label>Confirmacion de clave:</label>
      <?php echo form_input($password_confirm);?>
      </fieldset>
      
      <p><?php echo form_submit('submit', 'Registrarse');?></p>

      
    <?php echo form_close();?>

</div>
    </div>    
    <?php $this->load->view("pie.php") ?>
   
  </div><!--fin pagina-->
</body>

</html>