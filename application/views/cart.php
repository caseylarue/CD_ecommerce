<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Cart</title>

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
    <style type="text/css">
      #table_heading {
        background-color: #bdbdbd;
        font-weight: bold;
      }

      .total {
        font-weight: bold;
        font-size: 18px;
      }

      #input_forms {
        margin-top: 50px;
      }
    </style>
  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <?php require('nav_customer.php'); ?>
      <table class='table table-striped table-bordered'>
      <thead>
        <tr id='table_heading'>
          <td>Item</td>
          <td>Price</td>
          <td>Qty</td>
          <td>Total</td>
          <td>Update</td>
        </tr>
      </thead>
        <tbody>
<?php
      foreach($items as $item)
      {
?>
        <tr>
          <td><?=$item['name']?></td>
          <td><?=$item['price']?></td>
          <td><?=$item['qty']?></td>
          <td><?=$item['total']?></td>
          <td><a href="/customers/delete_item/<?=$item['product_id']?>"> delete</a></td>
        </tr>
<?php
      };
?>
          </tbody>
      </table>
      <div class='row'>
        <div class='col-md-7'></div>
        <div class='col-md-3 total'>$<?= $cart_total['item_total'] ?></div>
        <a href='/customers/catalog' class='col-md-35 btn btn-success' type='submit'>Continue Shopping</a>
      </div>

      <div id='input_forms'>
        <h2>Shipping Information</h2>
        <form action='/customers/checkout' method='post'>
          <div class='form-group row'>
            <div class='col-md-2'><label >First Name</label></div>
            <div class='col-md-4'><input type='text' name='shipping_first_name' class='form-control' placeholder='first name'></div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >Last Name</label></div>
            <div class='col-md-4'><input type='text' name='shipping_last_name' class='form-control' placeholder='last name'></div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >Address</label></div>
            <div class='col-md-4'><input type='text' name='shipping_address' class='form-control' placeholder='address'></div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >Address 2</label></div>
            <div class='col-md-4'><input type='text' name='shipping_address_2' class='form-control' placeholder='address'></div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >City</label></div>
            <div class='col-md-4'><input type='text' name='shipping_city' class='form-control' placeholder='city'></div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >State</label></div>
            <div class='col-md-4'><input type='text' name='shipping_state' class='form-control' placeholder='state'></div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >Zip</label></div>
            <div class='col-md-4'><input type='text' name='shipping_zip' class='form-control' placeholder='zip'></div>
          </div>
        <h2>Billing Information</h2>
          <div class='form-group row'>
            <div class='col-md-2'><label >First Name</label></div>
            <div class='col-md-4'><input type='text' name='billing_first_name' class='form-control' placeholder='first name'></div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >Last Name</label></div>
            <div class='col-md-4'><input type='text' name='billing_last_name' class='form-control' placeholder='last name'></div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >Address</label></div>
            <div class='col-md-4'><input type='text' name='billing_address' class='form-control' placeholder='address'></div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >Address 2</label></div>
            <div class='col-md-4'><input type='text' name='billing_address_2' class='form-control' placeholder='address'></div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >City</label></div>
            <div class='col-md-4'><input type='text' name='billing_city' class='form-control' placeholder='city'></div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >State</label></div>
            <div class='col-md-4'><input type='text' name='billing_state' class='form-control' placeholder='state'></div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >Zip</label></div>
            <div class='col-md-4'><input type='text' name='billing_zip' class='form-control' placeholder='zip'></div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >Card Type</label></div>
            <!-- <div class='col-md-4'><input type='text' name='billing_card_type' class='form-control' placeholder='zip'></div> -->
            <div class='col-md-4'>
              <select class='form-control' name='billing_card_type'>
                <option value='visa'>Visa</option>
                <option value='mastercard'>Mastercard</option>
                <option value='american_express'>American Express</option>
              </select>  
            </div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >Card #</label></div>
            <div class='col-md-4'><input type='text' name='billing_card_number' class='form-control' placeholder='XXXX XXXX XXXX XXXX'></div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >Security Code</label></div>
            <div class='col-md-4'><input type='text' name='billing_security_code' class='form-control' placeholder='XXX'></div>
          </div>
          <div class='form-group row'>
            <div class='col-md-2'><label >Expiration</label></div>
            <div class='col-md-4'><input type='text' name='billing_expiration' class='form-control' placeholder='XX / XX'></div>
          </div>
          <div class='form-group row'>
<?php   
            if(!empty($cart_total['item_total']))
            {
?>
                <div class='col-md-2'><button type='submit' class='form-control btn btn-primary'>Checkout</button></div>
<?php       }
            else
            {
?>
                <p>You have nothing in your cart</p>
<?php        }  
?>          
          </div>
        </form>
      </div> <!-- /end of forms div -->
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