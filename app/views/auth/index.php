<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
<head>
<?php $this->load->view("head.php") ?>
<?php $this->load->view("script.php")?>
<script>

$(document).ready(function(){
	$("p a").button();
	$("table tbody tr:odd").addClass("impar");
	$("table tbody tr:even").addClass("par");
	$("table tbody tr").hover( function(){ $(this).css("background-color", "#ccc"); }, 
			function(){ if($(this).hasClass("impar")) 
						$(this).css("background-color", "#FEF1E9" );
					else
						$(this).css("background-color", "#FEF9ED" );
			} 
		);
		
});

</script> 
    <style>
        table tbody tr { margin: 15px; }
        table td { border-bottom: 1px dotted #303030; padding: 10px 10px 10px 10px; margin: 15px;}
        table thead th { background-color: #F1EDC2; padding: 10px 10px 10px 10px; }
        tr.impar { background-color: #FEF1E9; }
        tr.par { background-color: #FEF9ED; }
    </style>
</head>

<body>
  <div id="contenido">
	<?php $this->load->view("cenefa.php")?>
	<?php $this->load->view("menu.php")?>        
				
	<div id="cuerpo"> 

	<h1 class="ui-widget-header">Lista de usuarios</h1>
	
        <table cellpadding=0 cellspacing=0 width="90%" align="center">
		<thead>
			<th width="10%" align="center">ID</th>
			<th width="25%">USUARIO</th>
			<th width="55%">EMAIL</th>
            <th width="10%" align="center">ESTADO</th>
		</thead>
		<tbody>
		<?php foreach ($users as $user):?>
			<tr>				
				<td align="center"><?php echo $user->id; ?></td>
				<td><?php echo $user->username; ?></td>
				<td><?php echo $user->email; ?></td>
				<td align="center"><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, 'Activo') : anchor("aut/activate/". $user->id, 'Inactivo');?></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
	
	<p align="center"><a href="<?php echo site_url('auth/crear_usuario');?>">Crear nuevo usuario</a>


    </div>    
    <?php $this->load->view("pie.php") ?>
   
  </div><!--fin pagina-->
</body>

</html>
