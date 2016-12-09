

<div class="contenedor">
	<div class="row">
	<div class="col-md-4 col-sm-4 col-xs-12">
	</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading"><strong>Update Amount</strong></div>
					<div class="panel-body">
						<form role="form" action="<?php echo APP_URL."/transactions/edit/";?>" method="POST" class="login-form">
							<div class="form-group">
					        	<input type="hidden" name="id" value="<?php echo $transaction["id"]; ?>" class="form-id form-control" id="form-username" >
					        </div>
					        <div class="form-group">
					    		<label class="usr" for="form-amount">Mount</label>

					        	<input type="text" name="amount" value="<?php echo abs($transaction["amount"]); ?>"  class="form-amount form-control" id="amounts">
					        </div>
					        <div class="form-group">
					        	<label class="usr" for="account_id">Account</label>
								<select class="form-control" name="account_id" id="acccount_id">
									<?php 
									foreach ($accounts as $account) :?>
									<?php if ($account["accounts"]["id"] == $transaction["account_id"]) {?>
										<option selected value="<?php echo $account["accounts"]["id"];?>">
											<?php echo $account["accounts"]["name"];?>
										</option>
									<?php }else{?>

										<option value="<?php echo $account["transactions"]["id"];?>">
											<?php echo $account["accounts"]["name"];?>
										</option>
									<?php }?>
									
									 <?php endforeach?>
								</select>
					        </div>
					        <div class="form-group">
					        	<label class="usr" for="category_id">Category</label>
								<select class="form-control" name="category_id" id="category_id">
									<?php 
									foreach ($categories as $category) :?>
									<?php if ($category["categories"]["id"] == $transaction["account_id"]) {?>
										<option selected value="<?php echo $category["categories"]["id"];?>">
											<?php echo $category["categories"]["name"];?>
										</option>
									<?php }else{?>

										<option value="<?php echo $category["categories"]["id"];?>">
											<?php echo $category["categories"]["name"];?>
										</option>
									<?php }?>
									
									 <?php endforeach?>
								</select>
					        </div>
					        <div class="form-group">
								<label for="">Message</label>
								<textarea name="description" class="form-control" cols="10" rows="3"><?php echo $transaction["description"]; ?></textarea>
							</div>
							<div class="form-group">
					    		<label class="usr" for="form-date">Date</label>
					    		
					        	<input type="text" name="date" value="<?php echo $transaction["date"];?>"  class="form-date form-control" id="form-date" >
					        </div>
							
							<div class="form-group">
							<label>Type Transaction</label>
								<select class="form-control" name="typeTransaction" id="typeTransaction">
								<?php
									if ($transaction["amount"]<=0){ 
										echo '
										<option value="Egreso">Egreso</option>
										<option value="Ingreso">Ingreso</option>
										';
									}else{
										echo '
										<option value="Ingreso">Ingreso</option>
										<option value="Egreso">Egreso</option>
										';
									}?>
									
								
									
								</select>
							</div>

					        <button type="submit" class="btn btn-primary" id="reg">Update</button>
					        <a href="<?php echo APP_URL."/transactions";?>" class="btn btn-danger" role="button">Cancel</a>
					    </form><br>
				    </div>
				</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
	    </div>
	</div> 
</div>


