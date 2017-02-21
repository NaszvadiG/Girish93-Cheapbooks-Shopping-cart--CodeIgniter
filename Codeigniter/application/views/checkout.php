<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Welcome to CheapBooks</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url("bootstrap/css/Login.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          </button>
          <h1 class="navbar-brand">Welcome to CheapBooks-The best shopping retail services to buy your books</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">About</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page-header">
  <?php echo '<h1>CheckOut Page</h1>';?>
  </div>
  <div class="container">
  <div class="panel panel-default">
  <div class="panel-heading bg-grey">
  <h3 class="panel-title">Product Details</h3>
  </div>
  <table class="table table-bordered table-striped">
  <tbody>
  <tr>
  <th width=40%>ISBN</th>
  <th width=10%>Title</th>
  <th width=20%>Copies</th>
  <th width=15%>Quantity</th>
  <th width=5%>Price</th>
  <th width=15%>Total</th>
  <th width=5%>Remove</th>
  </tr>
  <?php
 if(!empty($_SESSION['shoppingcart']))
  {
  	if($message)
  	{
  		echo '<script>alert("Items added successfully");</script>';
  	}
  	$totalprice=0;
  	$action='delete';
  	foreach($_SESSION['shoppingcart'] as $key => $value)
  	{
  ?>
  <tr>
  <td><?php echo $value['ISBN'];  ?></td>
  <td><?php echo $value['Title'];  ?></td>
  <td><?php echo $value['Copies'];  ?></td>
  <td><?php echo $value['Quantity'];  ?></td>
  <td><?php echo $value['Price'];  ?></td>
  <td><?php echo $value['Price']*$value['Quantity'];  ?>
  <td><a href="<?php echo base_url();?>index.php/cart/deleteitem/<?php echo $action?>/<?php echo $value['ISBN']?>"><span class="text-danger">Remove</span></a></td>
  </tr>
<?php 
 $totalprice=$totalprice+($value['Price']*$value['Quantity']);
}
 ?>

<td colspan=3 align="right">Total</td>
  <td align="right">$<?php echo $totalprice ?></td>
  <td></td>
  </tr>
<?php } ?>
  </tbody>
 </table> 
 </div>  
 <form method="post" action="<?php echo base_url();?>index.php/cart/shipping">
 <button type="submit" class="btn btn-primary" class="author" name="buy">Confirm Order</button>	
 </form>	
 <br>
 <form action="<?php echo base_url(); ?>index.php/loginprocess/logout">
 <button type="submit" class="btn btn-danger"  name="logout">Not in a mood to shop? Click here to Logout</button>
 </form>
 </div>
 
 
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url("bootstrap/js/bootstrap.min.js"); ?>"></script>
  </body>
</html> 	