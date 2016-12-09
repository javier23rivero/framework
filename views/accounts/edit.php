<div class="contenedor">
	<div class="row">
		<div class="col-sm-4 col-md-4 col-xs-12">
			
		</div>
		<div class="col-sm-4 col-md-4 col-xs-12">
			<div class="panel panel-default">
			<div class="panel-heading"><strong>Formulario de Edición</strong></div>
				<div class="panel-body">
					<form role="form" action="<?php echo APP_URL."/accounts/edit/";?>" method="POST" class="login-form">
						<div class="form-group">
							<input type="hidden" name="id" value="<?php echo $account["id"] ?>">
						</div>
				    	<div class="form-group">
				    		<label class="usr" for="form-name-account">Username</label>
				        	<input type="text" name="name" placeholder="Name Account" class="form-name form-control" value="<?php echo $account["name"];?>" id="form-name" >
				        </div>
				        <div class="form-group">
				        	<label class="usr" for="user_id">User Account</label>
							<select class="form-control" name="user_id" id="user_id">
								<?php 
								foreach ($users as $user) :?>
								<?php if ($user["users"]["id"] == $account["user_id"]) {?>
									<option selected value="<?php echo $user["users"]["id"];?>">
										<?php echo $user["users"]["username"];?>
									</option>
								<?php }else{?>

									<option value="<?php echo $user["users"]["id"];?>">
										<?php echo $user["users"]["username"];?>
									</option>
								<?php }?>
								
								 <?php endforeach?>
							</select>
				        </div>
				        <button type="submit" class="btn btn-primary" value="Entrar">Update</button>
						<a href="<?php echo APP_URL."/accounts";?>" class="btn btn-danger" role="button">Cancel</a>
				    </form><br>
			    </div>
	   		</div>
		</div>
		<div class="col-sm-4 col-md-4 col-xs-12">
			
		</div>
	</div>
</div>

