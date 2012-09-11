<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
<?php $this->load->view("head.php") ?>
<?php $this->load->view("script.php")?>
</head>

<body>
  <div id="contenido">
	<?php $this->load->view("cenefa.php")?>
	<?php $this->load->view("menu.php")?>        
			
	<div id="cuerpo"> 

            <div class="fverde">
			<div class="espacio20">&nbsp;</div>
            <h1>Recordatorio de clave olvidada</h1>
            <p>Por favor, ingrese su Email asi le podremos enviar un email para restaurar sus datos de acceso.</p>

            <div class="ui-state-highlight"><?php echo $message;?></div>

            <?php echo form_open("auth/forgot_password");?>

            <?php echo form_fieldset("INGRESE su IDENTIDAD"); ?>
            <?php echo form_label("Email :", "email"); ?>
            <?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '45', 'value' => set_value('email'))); ?>
            <?php echo form_submit('submit', 'Enviar');?>
            
            <?php echo form_fieldset_close(); ?>    
            <?php echo form_close();?>

            </div>    
    </div>
    <div class="separador"></div>
    
    <?php $this->load->view("pie.php") ?>
   
  </div><!--fin pagina-->
</body>

</html>
