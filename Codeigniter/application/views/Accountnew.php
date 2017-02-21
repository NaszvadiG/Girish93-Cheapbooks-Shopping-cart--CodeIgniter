
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
  <?php echo '<h1>Welcome '.$_SESSION['use'].'</h1>';?>
  </div>
  
    <div class="container">
    <div class="panel panel-default">
    <div class="panel-body bg-info">
    <form method="post">
    <label style="color:blue">Enter to search by Author or Title</label>
    <input type="text" name="searchby" class="search">
    <button type="submit" formaction="<?php echo base_url(); ?>index.php/loginprocess/index_title" class="btn btn-primary"  name="sbt">Search by Title</button>
    <button type="submit" formaction="<?php echo base_url(); ?>index.php/loginprocess/index_author" class="btn btn-success" class="author" name="sba">Search by Author</button>
    </form>
    <form method="post" action="<?php echo base_url(); ?>index.php/loginprocess/session_prev">
    <button type="submit" class="btn btn-primary">Previous Results</button>
    </form>
    <br>
    <form action="<?php echo base_url(); ?>index.php/loginprocess/logout">
    <button type="submit" class="btn btn-danger"  name="logout">Not in a mood to shop? Click here to Logout</button>
    </form>
    </div>
    </div>
    </div>
   
  
  
 <div class="container">
  <?php if(isset($title_message)){ ?>
  <div class="page-header">
  <?php echo "<h1><strong>Displaying ".$num_rows." results for your search:</strong></h1>"; ?> 
  </div>
   <div class="row">
  <?php foreach($title as $titles){
  ?>
  <div class="col-md-3">
  <div class="thumbnail text-center" >
  <div class="img-thumbnail" text-align="center">
  <img src="<?php echo base_url('images/'.$titles['ISBN'].'.jpeg') ?>">;
  </div>
  <form method="post" action="<?php echo base_url(); ?>index.php/cart/processcart/<?php echo $titles['ISBN']?>">
  <p><strong><?php echo $titles['Title']; ?></strong></p> 
  <p><strong><?php echo $titles['ISBN']; ?></strong></p>
  <p style="color:red">Copies:<?php echo $titles['Number']; ?></p>
  Select Quantity:<input type="number" name="quantity" min=1 max=25><br>
  <input type="hidden" name="hiddentitle" value="<?php echo $titles['Title'] ?>">
  <input type="hidden" name="hiddencopy" value="<?php echo $titles['Number'] ?>">
  <input type="hidden" name="hiddenprice" value="<?php echo $titles['Price'] ?>">
  <br><p><span><button type="submit" class="btn btn-success" name="cart"><span class="glyphicon glyphicon-shopping-cart"></span><?php echo $titles['name'].': '?>Add to Cart</button></span></p>
  <input type="hidden" name="hiddenwarecode" value="<?php echo $titles['warehouseCode'] ?>">
  </form>
  </div>
  </div>
  <?php }?>
  </div>
  <form>
  <label>Number of items in cart</label>
  <input type="text" name="cart2" class="shop" value="<?php $_SESSION['count']=0;
        if(isset($_POST['cart'])){
        $count = $_SESSION['count'] + 1;
        $_SESSION['count'] = $count; 
        }
         echo $_SESSION['count'];
        ?>">
  </form>
  <br>
  <form action="<?php echo base_url(); ?>index.php/cart/gotocart?>">
   <button type="submit" class="btn btn-primary"  name="goto"><span class="glyphicon glyphicon-shopping-cart"></span> Go to Shopping Cart</button></p>
  </form>
  <?php } ?>
  
  <?php if(isset($author_message)) { ?>
  <div class="page-header">
  <?php echo "<h1><strong>Displaying ".$num_rows." results for your search:</strong></h1>"; ?> 
  </div>
  <div class="row">
  <?php  foreach($author as $authors){ ?>
  <div class="col-md-3">
  <div class="thumbnail text-center" >
  <div class="img-thumbnail" text-align="center">
 <img src="<?php echo base_url('images/'.$authors['ISBN'].'.jpeg') ?>">;
  </div>
  <p><strong><?php echo $authors['Title']; ?></strong></p> 
  <p><strong><?php echo $authors['ISBN']; ?></strong></p>
  <p style="color:red">Copies:<?php echo $authors['Number']; ?></p>
   <form method="post" action="<?php echo base_url();?>index.php/cart/processcart/<?php echo $authors['ISBN']?>">
  Select Quantity:<input type="number" name="quantity" min=1 max=25><br>
  <input type="hidden" name="hiddentitle" value="<?php echo $authors['Title'] ?>">
  <input type="hidden" name="hiddenprice" value="<?php echo $authors['Price'] ?>">
  <input type="hidden" name="hiddencopy" value="<?php echo $authors['Number'] ?>">
 <br><p><span><button type="submit" class="btn btn-success" name="cart"><span class="glyphicon glyphicon-shopping-cart"></span><?php echo $authors['name'].': '?>Add to Cart</button></span></p>
 <input type="hidden" name="hiddenwarecode" value="<?php echo $authors['warehouseCode'] ?>">
  </form>
  </div>
  </div>
  <?php } ?>
  </div>
  <form>
  <label>Number of items in cart</label>
  <input type="text" name="cart2" class="shop" value="<?php $_SESSION['count']=0;
        if(isset($_POST['cart'])){
        $count = $_SESSION['count'] + 1;
        $_SESSION['count'] = $count; 
        }
        echo $_SESSION['count'];
        ?>">
  </form>
  <br>
  <form action="<?php echo base_url(); ?>index.php/cart/gotocart?>">
  <button type="submit"  class="btn btn-primary" name="goto"><span class="glyphicon glyphicon-shopping-cart"></span> Go to Shopping Cart</button></p>
  </form>
  <?php } ?>
  </div>



  

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url("bootstrap/css/js/bootstrap.min.js"); ?>"></script>
  </body>
</html>