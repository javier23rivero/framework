
	<div class="table-responsive contenedor">
		
		<h2>Listado de usuarios</h2>
		 <?php if (!empty($users)): ?>

		<h5>Total de registros <span class="badge" style="color:#fff";><?php echo $usersCount; ?></span></h5>

		<a href="<?php echo APP_URL."/users/add/";?>" class="btn btn-info" ><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>  Agregar usuario</a><br><br>
		<table class="table table-bordered table-hover table-success" id="table">
			<tr class="table-inverse">
				<th class="table-inverse">ID</th>
				<th>Username</th>
				<th>Password</th>
				<th>Type</th>
				<?php if ($_SESSION["type_name"]=="Administradores") {?>
				<th>Accion</th>
				<?php }else{}?>
			</tr>
			<?php foreach ($users as $user): ?>
			
			 <tr>
			 	<td><?php echo $user["users"]["id"]; ?> </td>
			 	<td><?php echo $user["users"]["username"]; ?> </td>
			 	<td><?php echo $user["users"]["password"]; ?> </td>
			 	<td><?php echo $user["types"]["name"]; ?> </td>

			 	<?php if ($_SESSION["type_name"]=="Administradores") {?>
			 		<td>
			 		<div class="btn-group">
			 			
			 	<?php echo $this->Html->link("Edit", array("controller"=>"users", "method"=>"edit", "arg"=>$user["users"]["id"]));?>	
			 	<?php echo $this->Html->linkDelete("Delete", array("controller"=>"users", "method"=>"delete", "arg"=>$user["users"]["id"]));?>
			 		
			 		</div>
			 	</td>
			 	<?php }else{ ?>
			 		
			 	<?php } ?>
			 </tr>
			<?php endforeach; ?>
			
		</table>
		<?php  endif; ?>
	</div>

<!-- //Los valores son recibidos por la vista desde el controlador usersController
//echo "<pre>"; -->


