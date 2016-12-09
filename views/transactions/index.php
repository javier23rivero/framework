
	<div class="table-responsive contenedor">
		<h2>Listado de transactions</h2>
		 <?php if (!empty($transactions)): ?>

		<h5>Total de registros <span class="badge" style="color:#fff";><?php echo $transactionsCount; ?></span></h5>
		<h5><strong>Balance</strong><span class="badge" style="color:#fff";><?php echo $transactionsBalance;?></span></h5>

		<a href="<?php echo APP_URL."/transactions/add/";?>" class="btn btn-info" ><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>  Agregar Transacción</a><br><br>
		<table class="table table-bordered table-hover table-success" id="table">
			<tr class="table-inverse">
				<th class="table-inverse">ID</th>
				<th>Cuenta</th>
				<th>Categoria</th>
				<th>Description</th>
				<th>Date</th>
				<th>Mount</th>
				<?php if ($_SESSION["type_name"]=="Administradores") {?>
				<th>Accion</th>
				<?php }else{}?>
			</tr>
			<?php foreach ($transactions as $transaction): ?>
			
			 <tr>
			 	<td><?php echo $transaction["transactions"]["id"]; ?> </td>
			 	<td><?php echo $transaction["accounts"]["name"]; ?> </td>
			 	<td><?php echo $transaction["categories"]["name"]; ?> </td>
			 	<td><?php echo $transaction["transactions"]["description"]; ?> </td>
			 	
			 	<td><?php 
			 		$date = new DateTime($transaction["transactions"]["date"]);
					echo $date->format('d-m-Y');
					?>
			 	</td>
			 	
			 	<td> 
			 		<?php if ($transaction["transactions"]["amount"]>0) {

			 		 $a = number_format($transaction["transactions"]["amount"],2,",",".");
			 		 echo "<p style='color:#50BEBE;'>$ $a</p>";
			 	}else{
			 		 $a = number_format($transaction["transactions"]["amount"],2,",",".");
			 		 echo "<p style='color:crimson;'>$ $a</p>";
			 		} ?>
			 	</td>

			 	<?php if ($_SESSION["type_name"]=="Administradores") {?>
			 		<td>
			 		<div class="btn-group">
			 			
			 	<?php echo $this->Html->link("Edit", array("controller"=>"transactions", "method"=>"edit", "arg"=>$transaction["transactions"]["id"]));?>	
			 	<?php echo $this->Html->linkDelete("Delete", array("controller"=>"transactions", "method"=>"delete", "arg"=>$transaction["transactions"]["id"]));?>
			 		
			 		</div>
			 	</td>
			 	<?php }else{ ?>
			 		
			 	<?php } ?>
			 </tr>
			<?php endforeach; ?>
			
		</table>
		<?php  endif; ?>
		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="QA7Q8D7SMQSZ8">
<input type="image" src="https://www.sandbox.paypal.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
<img alt="" border="0" src="https://www.sandbox.paypal.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>

	</div>

<!-- //Los valores son recibidos por la vista desde el controlador usersController
//echo "<pre>"; -->


