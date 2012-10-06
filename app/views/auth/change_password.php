<?php $this->load->view("admin/head_adm960.php") ?>
<body>
	<div class="container_16">
		<?php $this->load->view("admin/cenefa.php")?>
		<?php $this->load->view("admin/menu.php")?>        
			
		<div class="grid_16 block" id="cuerpo"> 
            <div><?php echo $message;?></div>

            <?php echo form_open("auth/change_password");?>
            <?php echo form_fieldset("CAMBIO DE CLAVE"); ?>
            <p>    
            <?php echo form_label("Clave anterior: " ); ?>
            <?php echo form_input($old_password);?>
      		</p>
      		<p>
            <?php echo form_label("Nueva clave:" ); ?>
            <?php echo form_input($new_password);?>
      		</p>
      		<p>
            <?php echo form_label("Confirme Nueva clave:"); ?>
            <?php echo form_input($new_password_confirm);?>
            </p>
            <?php echo form_fieldset_close(); ?>    
            <?php echo form_hidden($user_id);?>
            <p>
            <?php echo form_submit('submit', 'cambiar la clave');?>
            </p>
      
            <?php echo form_close();?>
        </div>   
   		<div class="clear"></div>
   		<?php $this->load->view("admin/pie.php") ?>
   	</div>
   <?php $this->load->view("admin/script_adm960.php")?>  
</body>
</html>
