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
	<div class='verde'>
	<h1>Confirma desactivacion de usuario '<?php echo $user->username; ?>'</h1>
	
        <?php echo form_open("auth/deactivate/".$user->id);?>
        <?php echo form_fieldset("DESACTIVACION"); ?>
            <label for="confirm">Si:</label>
		<input type="radio" name="confirm" value="si" checked="checked" />
            <label for="confirm">No:</label>
		<input type="radio" name="confirm" value="no" />
      
            <?php echo form_hidden($csrf); ?>
            <?php echo form_hidden(array('id'=>$user->id)); ?>
            <?php echo form_fieldset_close(); ?>
            <?php echo form_submit('submit', 'submit');?>

        <?php echo form_close();?>

        </div>
    </div>    
    <?php $this->load->view("pie.php") ?>
   
  </div><!--fin pagina-->
</body>

</html>

</html>

