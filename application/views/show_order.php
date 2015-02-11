<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Products Dashboard</title>

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

	<style> 
	    body {
	        padding-top: 60px;
	    }

	    .customer_info {
	    	height: 450px;
	    	border: 1px solid silver;
	    }

	    .shipping_info{
	    	margin: 25px 0px;
	    }

	    .totals{
	    	width: 50%;
	    	margin-left: 200px;
	    	border: 1px solid silver;
	    }

	</style>
  </head>

  <body>
   <div class="container">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Dojo eCommerce</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a>Dashboard</a></li>
            <li><a href="/admins/orders">Orders</a></li>
            <li><a class="active" href="/admins/products">Products</a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#contact"></a></li>
            <li><a href="/admins/index">Log Off</a></li>
          </ul>
        </div><!--/.nav-collapse -->
    </nav>
    <div class="row">
		  <div class="col-md-3">
		  	<div class='customer_info'>
			  	<p>Order ID: <?=$order['id'] ?></p>
			  	<div class='shipping_info'>
			  		<p>Customer shipping info</p>
			  		<p>Name: Bob </p>
			  		<p>Address: 123 Dojo Way </p>
			  		<p>City: Seattle </p>
			  		<p>State: WA </p>
			  		<p>zip: 98133 </p>
			  	</div>
			  	<div class='billing_info'>
			  		<p>Customer billing info</p>
			  		<p>Name: Bob </p>
			  		<p>Address: 123 Dojo Way </p>
			  		<p>City: Seattle </p>
			  		<p>State: WA </p>
			  		<p>zip: 98133 </p>
			  	</div>
		 	</div>
		  </div>
		  <div class="col-md-9">
		  		<table class="table table-bordered">
				 	<thead>
				 		<tr>
				 			<th>ID</th>
							<th>Item</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total</th>
				 		</tr>
				 	</thead>
				 	<tbody>
				 		<tr>
				 			<td>35</td>
							<td>cup</td>
							<td>$9.99</td>
							<td>1</td>
							<td>$9.99</td>
				 		</tr>
				 		<tr>
				 			<td>35</td>
							<td>cup</td>
							<td>$9.99</td>
							<td>1</td>
							<td>$9.99</td>
				 		</tr>
				 	</tbody>
				</table>
				<div class="row">
				    <div class="col-xs-8 col-sm-6">
				        <p class=' btn-success'>Status shipped</p>
				    </div>
				    <div class="col-xs-4 col-sm-6">
				    	<div class='totals'>
					         <p>Subtotal: $29.98</p>
					         <p>Shipping: $1.00</p>
					         <p>Total Price: $30.98</p>
				     	</div>
				    </div>
				</div>
		  </div>
	</div>
		
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