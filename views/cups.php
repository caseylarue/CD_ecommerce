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
        <div id="side_bar" class="col-xs-12 col-md-4">
          <form>
            <input type="text" name="search" placeholder="product name">
            <input type="submit" name="submit" value="Search">
          </form>
          <dl>
            <dt>Categories</dt>
            <dd><a href='/customers/shoes'>Tshirts(25)</a></dd>
            <dd><a href='/customers/shoes'>Shoes(35)</a></dd>
            <dd>Cups(5)</dd>
            <dd><a href='/customers/shoes'>Hats(35)</a></dd>
            <dd><a href='/customers/catalog' ><em>Show All(5)</em></a></dd>
          </dl>
        </div>    


        <div class="col-xs-6 col-md-8">  
         <div class="row">
          <div class="col-md-8"><h3>Tshirts (page 2)</h3></div>
          <div class="col-md-4">
            <ul class="list-inline list-unstyled ">
              <li><a href="#">first</a></li>
              <li><a href="#">prev</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">next</a></li>
            </ul>            
          </div>
        </div>        
          <div class="row">
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>       
          </div>
           <div class="row">
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>         
          </div>
           <div class="row">
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>         
          </div>
           <div class="row">
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>          
          </div>
           <div class="row">
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>
            <a class="col-md-2 image_cup" href="/customers/product"></a>          
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
          <nav>
            <ul class="pagination">
              <li>
                <a href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="col-md-2"></div>
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