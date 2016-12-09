<div class="contenedor">
	<div class="row">
		<div class="col-sm-4 col-md-4 col-xs-12">
			
		</div>
		<div class="col-sm-4 col-md-4 col-xs-12">
			<div class="panel panel-default">
			<div class="panel-heading"><strong>Formulario de Categorias</strong></div>
				<div class="panel-body">
					<form role="form" action="<?php echo APP_URL."/categories/add/";?>" method="POST" class="login-form">
							<div class="form-group">
					    		<label class="usr" for="form-name">Name</label>
					        	<input type="text" name="name" placeholder="Name category" class="form-name form-control" id="form-name" required/>
					        </div>
				        	   <button type="submit" class="btn btn-success" value="Entrar">Add</button>
							   <a href="<?php echo APP_URL."/categories";?>" class="btn btn-danger" role="button">Cancel</a>
				    </form><br>
			    </div>
	   		</div>
		</div>
		<div class="col-sm-4 col-md-4 col-xs-12">
			
		</div>
	</div>
</div>
