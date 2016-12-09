<div class="contenedor">
	<div class="row">
		<div class="col-sm-4 col-md-4 col-xs-12">
			
		</div>
		<div class="col-sm-4 col-md-4 col-xs-12">
			<div class="panel panel-default">
			<div class="panel-heading"><strong>Formulario de Edición</strong></div>
				<div class="panel-body">
					<form role="form" action="<?php echo APP_URL."/types/edit/";?>" method="POST" class="login-form">
						<div class="form-group">
							<input type="hidden" name="id" value="<?php echo $type["id"] ?>">
						</div>
				    	<div class="form-group">
				    		<label class="usr" for="form-name">Username</label>
				        	<input type="text" name="name" placeholder="name..." class="form-name form-control " value="<?php echo $type["name"];?>" id="form-name" >
				        </div>
				        <button type="submit" class="btn btn-primary" value="Entrar">Update</button>
						<a href="<?php echo APP_URL."/types";?>" class="btn btn-danger" role="button">Cancel</a>	
			    	</form><br>
			    </div>
	   		</div>
		</div>
		<div class="col-sm-4 col-md-4 col-xs-12">
			
		</div>
	</div>
</div>