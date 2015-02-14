<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Edit Product</title>

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
  		width: 20px;
  		height: 20px;
  		background-image: url('../../assets/engineer.jpg');
  		background-size: contain;
  		background-repeat: no-repeat;
  	}

  	.button_row{
  		margin-top: 30px;
  	}

  </style>
 <?php var_dump($product) ?>
  <body role="document">
   	<div class="container">
   		<div class="row">

<?php   if ($product['function'] == 'add_new') {	?>
   			<div class="col-xs-6 col-md-11"><h3>Add Product</h3></div>
<?php   }else{ ?>
			<div class="col-xs-6 col-md-11"><h3>Edit Product - ID <?= $product['id'] ?></h3></div>
<?php   } ?>   			

			  <div class="col-xs-6 col-md-1"><a href='/admins/close'><span class="glyphicon glyphicon-remove text-bottom" aria-hidden="true"></a></div>
		</div>
<?php   if ($product['function'] == 'add_new') {	?>
   			<form class="form-horizontal" action='<?= "/admins/insert_product" ?>' method='post' enctype='multipart/form-data'>  
<?php   }else{ ?>
			<form class="form-horizontal" action='<?= "/admins/update_product" ?>' method='post' enctype='multipart/form-data'> 
<?php   } ?>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-10">
<?php   if ($product['function'] == 'add_new') {	?>
   				<input type="text" class="form-control" id="inputEmail3" name='name' placeholder="product name">
<?php   }else{ ?>
			 	<input type="text" class="form-control" id="inputEmail3" name='name' placeholder="<?= $product['name'] ?>">
<?php   } ?>			    	
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
			    <div class="col-sm-10">
<?php   if ($product['function'] == 'add_new') {	?>
   					<textarea class="form-control" rows="3" name='description'></textarea>
<?php   }else{ ?>
			 		<textarea class="form-control" rows="3" name='description' placeholder='<?= $product["description"] ?>'></textarea>
<?php   } ?>			    	
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Categories</label>
			    <div class="col-sm-10">
<?php   if ($product['function'] == 'add_new') {	?>
   					<select name='category'>
<?php   }else{ ?>
			 		<select name='category'>
<?php   } ?>
<?php   				foreach ($product['category'] as $category){ ?>
<?php 						if ($category["id"] == $product["category_id"]){ ?>
								<option value = '<?= $category["id"] ?>' selected><?= $category["name"] ?></option>
<?php						}else{ ?>
								<option value = '<?= $category["id"] ?>'><?= $category["name"] ?></option>
<?php 						} ?>
<?php 					}?>
			      	</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Or add new category</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" name='new_category'>
			    </div>
			  </div>

<!-- ************************* File Upload section ********************************* -->

<?php
          if($this->session->flashdata('errors') != NULL)
          {
            echo '<h4 class="text-danger text-center"><bold>'.$this->session->flashdata('errors').'</bold></h4>';
          }
?>
<?php 		// echo form_open_multipart('admins/do_upload'); ?>
			  <div class="form-group">
			  	<label for="inputPassword3" class="col-sm-2 control-label">Images</label>
			    <div class="col-sm-offset-2 col-sm-10">
			      <input type="submit" class="btn btn-default" name='upload' value='upload'/>
			    </div>
			  </div>
<?php        for($i=0; $i<3; $i++){ ?>
			  <div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
							<div class="row">
						      <div class="col-xs-8 col-sm-2">
						        <div class='image'></div>
						      </div>
						      <div class="col-xs-4 col-sm-5">
<?php   if (($product['function'] == 'edit')  && (isset($product['images']))) {	?>
   								 <input type='file' name='product_image_<?= $i ?>' value="<?= $product['images'][$i] ?>" size='20'/>
<?php   }else{ ?>
			 					
							    <input type='file' name='product_image_<?= $i ?>'size='20'/>			
<?php   } ?>		
							    <input type='hidden' name='product_id' value='<?= $product["id"] ?>' size='20'/>					      	
						      </div>
						      <div class="col-xs-4 col-sm-2">
						        	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						      </div>
						      <div class="col-xs-4 col-sm-3">
						        	<div class="checkbox">
									  <label>
<?php   if (($product['function'] == 'edit') && (isset($product['main_pic_flag'])) && ($product['main_pic_flags'][$i] == '1'))	{ ?>								  	
									    <input type="checkbox" name='<?= "main_pic_".$i ?>' checked>
<?php }else{ ?>
										<input type="checkbox" name='<?= "main_pic[".$i."]" ?>'>
<?php    } ?>
									    Main
									  </label>
									</div>
						      </div>
							</div>
					</div>
					<div class="col-md-2"></div>
			  </div>
<?php       } ?>
			<!-- /form> -->
<!-- ******************************************** Buttons at bottom of page *************************** -->

			  <div class="row">
					  <div class="col-md-4"></div>
					  <div class="col-md-4">
							<div class="row button_row">
							      <div class="col-xs-8 col-sm-4">
							        <a type="button" class="btn btn-default" href='/admins/cancel'>Cancel</a>
							      </div>
							      <div class="col-xs-4 col-sm-4">
							       <a type="button" class="btn btn-success" href='/admins/preview'>Preview</a>
							      </div>
							      <div class="col-xs-4 col-sm-4">
<?php 							if($product['function'] == 'add_new')  { ?>
							        <input type="submit" class="btn btn-info" name='submit' value='<?= "Add" ?>'>
<?php 							}else{  ?>
 									<input type="submit" class="btn btn-info" name='submit' value='<?= "Update" ?>'>	
<?php 							} ?> 														      
							      </div>
						    </div>
					  </div>
					  <div class="col-md-4"></div>
			  </div>
		</form>
		
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  </body>
</html>
