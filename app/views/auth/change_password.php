<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
<?php $this->load->view("head.php") ?>
<?php $this->load->view("script.php")?>
</head>

<body>
<div>
  <div id="contenido">
	<?php $this->load->view("cenefa.php")?>
	<?php $this->load->view("menu.php")?>        
			
	<div id="cuerpo"> 
            <div class="fverde">
            	<div class="espacio20">&nbsp;</div>
                <h1>Cambio de clave</h1>

                <div class="ui-state-highlight"><?php echo $message;?></div>

                <?php echo form_open("auth/change_password");?>
                <?php echo form_fieldset("CAMBIO DE CLAVE"); ?>    
                <?php echo form_label("Clave anterior:" ); ?>
                <?php echo form_input($old_password);?>
      
                <?php echo form_label("Nueva clave:" ); ?>
                <?php echo form_input($new_password);?>
      
                <?php echo form_label("Confirme Nueva clave:"); ?>
                <?php echo form_input($new_password_confirm);?>
                <?php echo form_fieldset_close(); ?>    
                <?php echo form_input($user_id);?>
                <p><?php echo form_submit('submit', 'cambiar');?></p>
      
                <?php echo form_close();?>

            </div> <!-- fin verde -->   
   </div> <!-- fin cuerpo -->
   <div class="separador"></div>
   <?php $this->load->view("pie.php") ?>
   
  </div><!--fin contenido-->
</div>
</body>

</html>
