<div class="contenedor">
	<div class="row">
		<div class="col-sm-4 col-md-4 col-xs-12">
			
		</div>
		<div class="col-sm-4 col-md-4 col-xs-12">
			<div class="panel panel-default">
			<div class="panel-heading"><strong>Formulario de edición</strong></div>
				<div class="panel-body">
						<form role="form" action="<?php echo APP_URL."/users/edit/";?>" method="POST" class="login-form">
							<div class="form-group">
								<input type="hidden" name="id" value="<?php echo $user["id"] ?>">
							</div>
					    	<div class="form-group">
					    		<label class="usr" for="form-username">Username</label>
					        	<input type="text" name="username" placeholder="Username..." class="form-username form-control username-password" value="<?php echo $user["username"];?>" id="form-username" required="required">
					        </div>
					        <div class="form-group">
					        	<label class="usr" for="NewPassword">Password</label>
					        	<input type="password" name="newPassword" value="" placeholder="New Password" class="form-password form-control username-password " id="form-password" >
					        </div>
					        <div class="form-group">
					        	<label class="usr" for="type_id">Types</label>
								<select class="form-control" name="type_id" id="type_id">
									<?php 
									foreach ($types as $type) :?>
									<?php if ($type["types"]["id"] == $user["type_id"]) {?>
										<option selected value="<?php echo $type["types"]["id"];?>">
											<?php echo $type["types"]["name"];?>
										</option>
									<?php }else{?>

										<option value="<?php echo $type["types"]["id"];?>">
											<?php echo $type["types"]["name"];?>
										</option>
									<?php }?>
									
									 <?php endforeach?>
								</select>
					        </div>
					        <button type="submit" class="btn btn-success" value="Entrar">Update</button>
							<a href="<?php echo APP_URL."/users";?>" class="btn btn-danger" role="button">Cancel</a>
					    </form><br>
			    </div>
	   		</div>
		</div>
		<div class="col-sm-4 col-md-4 col-xs-12">
			
		</div>
	</div>
</div>