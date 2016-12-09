<div class="contenedor">
	<div class="row">
		<div class="col-sm-4 col-md-4 col-xs-12">
			
		</div>
		<div class="col-sm-4 col-md-4 col-xs-12">
			<div class="panel panel-default">
			<div class="panel-heading"><strong>Formulario de Usario</strong></div>
				<div class="panel-body">
					<form role="form" action="<?php echo APP_URL."/users/add/";?>" method="POST" class="login-form">
				    	<div class="form-group">
				    		<label class="usr" for="form-username">Username</label>
				        	<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username" required="required" >
				        </div>
				        <div class="form-group">
				        	<label class="usr" for="Password">Password</label>
				        	<input type="password" name="password" value="" placeholder="Password" class="form-password form-control" id="form-password" required="required">
				        </div>
				        <div class="form-group">
				        	<label class="usr" for="type_id">Types</label>
							<select class="form-control" name="type_id" id="type_id">
								<?php 
								foreach ($types as $type) :?>
									<option value="<?php echo $type["types"]["id"];?>"><?php echo $type["types"]["name"];?></option>
								 <?php endforeach?>
							</select>
				        </div>
				        <button type="submit" class="btn btn-success" value="Entrar">Add</button>
				        <a href="<?php echo APP_URL."/users";?>" class="btn btn-danger" role="button">Cancel</a>
				    </form><br>
			    </div>
	   		</div>
		</div>
		<div class="col-sm-4 col-md-4 col-xs-12">
			
		</div>
	</div>

