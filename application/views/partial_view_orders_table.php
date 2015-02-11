<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Theme Template for Bootstrap</title>

      <!-- Bootstrap -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->

  </head>

  <body role="document">
   <div class="container">
		<table class="table table-bordered">
		 	<thead>
		 		<tr>
			 		<th>Order ID</th>
			 		<th>Name</th>
			 		<th>Date</th>
			 		<th>Billing Address</th>
			 		<th>Total</th>
			 		<th>Status</th>
		 		</tr>
		 	</thead>
		 	<tbody  class="table table-striped">
<?php
				foreach($orders as $order)
				{
?>
					<tr>
				 		<td class='text-center'><a href="/admins/show_order/<?= $order['id'] ?>"><?= $order['id'] ?></a></td>
				 		<td><?= $order['first_name']." ".$order['last_name'] ?></td>
				 		<td><?= $order['created_at'] ?></td>
				 		<td><?= $order['address1']." ".$order['address2'].", ".$order['city']." ".$order['state']." ".$order['zipcode'] ?></td>
				 		<td>$<?= $order['grand_total'] ?></td>
				 		<td>
<?php
				 			if($order['status'] == 'in_process')
				 			{
?>
				 			<form action='/admins/change_order_status/<?= $order['id'] ?>' method='post'>
				 				<select name='status'>
				 					<option value='in_process'>Order In Process</option>
				 					<option value='shipped'>Shipped</option>
				 					<option value='cancelled'>Cancelled</option>
				 				</select>
				 				<button type='submit'>Update</button>
				 			</form>
<?php
				 			}
				 			elseif($order['status'] == 'shipped')
				 			{
?>
								<form action='/admins/change_order_status/<?= $order['id'] ?>' method='post'>
					 				<select name='status'>
					 					<option value='shipped'>Shipped</option>
					 					<option value='in_process'>Order In Process</option>
					 					<option value='cancelled'>Cancelled</option>
					 				</select>
					 				<button type='submit'>Update</button>
					 			</form>							
<?php	
				 			}
				 			else
				 			{
?>
								<form action='/admins/change_order_status/<?= $order['id'] ?>' method='post'>
					 				<select name='status'>
					 					<option value='cancelled'>Cancelled</option>
					 					<option value='shipped'>Shipped</option>
					 					<option value='in_process'>Order In Process</option>
					 				</select>
					 				<button type='submit'>Update</button>
					 			</form>	
<?php						}
?>
				 		</td>
					<tr>
<?php
				}
?>			 		
		 	</body>
		</table>
    
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
