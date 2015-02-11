<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Navbar Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Latest compiled and minified CSS --> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href=“http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css”>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<link href="../assets/css/style.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
     <?php require('nav_customer.php'); ?>
      <div class="row">
        <div class="col-md-2"><u><a href="#">Go Back</a></u>
          <h4>Black Belt for staff</h4>
        </div>
        <div class="col-md-10"></div>
      </div>

     <div class="row">
        <div id="side_bar" class="col-md-3">
          <div class="row">
            <div class="col-md-12 product_img"></div>
          </div>
          <div class="row ">            
            <div class="col-md-3 img_1"></div>
            <div class="col-md-3 img_1"></div>
            <div class="col-md-3 img_1"></div>
            <div class="col-md-3"></div>            
          </div>
         </div>    


        <div class="col-xs-6 col-md-9"> 
         <p>Description about the product Description about the productDescription about the product Description about the productDescription Description about the product Description about the productDescriptionDescription about the productDescription about the productDescription about the productDescription about the productDescription about the productDescription about the productDescription about the productDescription about the productDescription about the productDescription Description about the product_img Description about the product Description about the product Description about the product Description about the product Description about the product Description about the product Description about the productDescription about the product Description about the productDescription about the product Description about the productDescription Description about the product Description about the ductDescriptionDescription about the productDescription about the productDescription about the productDescription about the productDescription about the productDescription about the productDescription about the productDescription about the productDescription about the productDescription Description about the product_img Description about the product Description about the product Description about the product Description about the product Description about the product Description about the product Description about the product Description about the productDescription Description about the product Description about the ductDescriptionDescription about the productDescription about the productDescription about the productDescription about the productDescription about the productDescription about the productDescription about the productDescription about the productDescription about the productDescription Description about the product_img Description about the product Description about the product Description about the product Description about the product Description about the product Description about the product Description about the product </p>         
        </div> 

      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <form class="form-inline" action='/customers/build_cart' method='post'>
           <!--  we will input the product id via query here -->
            <input type='hidden' name='product_id' value='5'> 
              <select name='qty' class="form-control">
                  <option value='1'>1($19.99)</option>
                  <option value='2'>2($39.99)</option>
                  <option value='3'>3($49.99)</option>
              </select> 
              <button type="submit" class="btn btn-primary">Buy</button>
          </form>      
        </div>
      </div>

      <div class="row">
          <div class="col-md-12"><h4 class="text-left">Similar Items</h4></div>
      </div>

      <div class="row">
        <figure class="col-md-2">
          <div class="image_product"></div>
          <figcaption class="text-center">Black Belt</figcaption>
        </figure>
        <figure class="col-md-2">
          <div class="image_product"></div>
          <figcaption class="text-center">Black Belt</figcaption>
        </figure>
        <figure class="col-md-2">
          <div class="image_product"></div>
          <figcaption class="text-center">Black Belt</figcaption>
        </figure>
       <figure class="col-md-2">
          <div class="image_product"></div>
          <figcaption class="text-center">Black Belt</figcaption>
        </figure>
        <figure class="col-md-2">
          <div class="image_product"></div>
          <figcaption class="text-center">Black Belt</figcaption>
        </figure>  
      </div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>