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
  <style>

  	.image{
  		width: 50px;
  		height: 50px;
  		background-image: url('../../assets/engineer.jpg');
  		background-size: contain;
  		background-repeat: no-repeat;
  	}

  </style>

  <body role="document">
   <div class="container">
		<table class="table table-bordered">
		 	<thead>
		 		<tr>
			 		<th>Picture</th>
			 		<th>ID</th>
			 		<th>Name</th>
			 		<th>Inventory Count</th>
			 		<th>Quantity Sold</th>
			 		<th>Action</th>
		 		</tr>
		 	</thead>
		 	<tbody  class="table table-striped">
<?php 			foreach ($products as $product){ ?>
		 		<tr>
<?php             if (!empty($product['image_url'])){ ?>
                      <td><img class='image' src='<?= $product["image_url"] ?>' ></td>
<?php              }else{ ?>
                     <td>No Image</td>
<?php             } ?>
        			 		<td><?= $product['id']; ?></td>
        			 		<td><?= $product['name']; ?></td>
        			 		<td><?= $product['inventory_count']; ?></td>
        			 		<td><?= $product['amount_sold']; ?></td>
			 		<td>
			 			<div class="row">
						    <div class="col-xs-8 col-sm-6">
          						        <a class='text-center' href='/admins/edit/<?= $product['id']; ?>'>edit</a>
						    </div>
						    <div class="col-xs-4 col-sm-6">
          						        <a class='text-center' href='/admins/delete/<?= $product['id']; ?>'>delete</a>
						    </div>
						</div>
					</td>
				</tr>
<?php 			} ?>

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
