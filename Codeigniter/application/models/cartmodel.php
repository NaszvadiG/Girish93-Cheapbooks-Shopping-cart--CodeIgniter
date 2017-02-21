
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class cartmodel extends CI_Model
{
public function cartmod()
{ 
if(isset($_POST['cart']))
{
  if(isset($_SESSION['shoppingcart']))
  {
    $item_id=array_column($_SESSION['shoppingcart'],$_GET['id']);
    if(!in_array($_GET['id'],$item_id))
    {
    if($_POST['quantity']>$_POST['hiddencopy'])
    {
      echo '<script>alert("Quantity not available");</script>';
    }
    $count=count($_SESSION['shoppingcart']);
    $item=array(
        "ISBN"=>$_GET['id'],
        "Title"=>$_POST['hiddentitle'],
        "Copies"=>$_POST['hiddencopy'],
        "Quantity"=>$_POST['quantity'],
         "Price"=>$_POST['hiddenprice'],
         "Warehousecode"=>$_POST['hiddenwarecode']
    );
    $_SESSION['shoppingcart'][$count]=$item;
    redirect('loginprocess/session');
    }
    else
    {
      echo '<script>alert("Item already added")</script>';
    }
    
  }
  else
  {
    $item=array(
        "ISBN"=>$_GET['id'],
        "Title"=>$_POST['hiddentitle'],
        "Copies"=>$_POST['hiddencopy'],
        "Quantity"=>$_POST['quantity'],
        "Price"=>$_POST['hiddenprice'],
        "Warehousecode"=>$_POST['hiddenwarecode']
    );
    $_SESSION['shoppingcart'][0]=$item;
    $this->load->view('prevresnew');
  }
}
return $item;
}
}