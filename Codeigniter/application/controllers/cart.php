<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class cart extends CI_Controller
{
function __construct() 
{
parent::__construct();
}
public function processcart($id)
{ 
$this->load->library('session');
if(isset($_POST['cart']))
{
  if(isset($_SESSION['shoppingcart']))
  {
    $item_id=array_column($_SESSION['shoppingcart'],$id);
    if(!in_array($id,$item_id))
    {
    if($_POST['quantity']>$_POST['hiddencopy'])
    {
      echo '<script>alert("Quantity not available");</script>';
    }
    $count=count($_SESSION['shoppingcart']);
    $item=array(
        "ISBN"=>$id,
        "Title"=>$_POST['hiddentitle'],
        "Copies"=>$_POST['hiddencopy'],
        "Quantity"=>$_POST['quantity'],
         "Price"=>$_POST['hiddenprice'],
         "Warehousecode"=>$_POST['hiddenwarecode']
    );
    $_SESSION['shoppingcart'][$count]=$item;
    redirect('loginprocess/session_prev');
    }
    else
    {
      echo '<script>alert("Item already added")</script>';
    }
    
  }
  else
  {
    $item=array(
        "ISBN"=>$id,
        "Title"=>$_POST['hiddentitle'],
        "Copies"=>$_POST['hiddencopy'],
        "Quantity"=>$_POST['quantity'],
        "Price"=>$_POST['hiddenprice'],
        "Warehousecode"=>$_POST['hiddenwarecode']
    );
    $_SESSION['shoppingcart'][0]=$item;
    redirect('loginprocess/session_prev');
  }

}
}
public function gotocart()
{
  $this->load->library('session');
  $this->load->view('cartview');	
}

public function addtotable()
{
  $data['message']="success";
  $this->load->library('session');
  $this->load->model('addmodel');
  $this->addmodel->add_to_table();
  $this->load->view('checkout',$data);	
}

public function shipping()
{
  $this->load->view('shippingorder');
}

public function review()
{
  $this->load->view('review');
}




public function deleteitem($action,$id)
{
if($id)
{
  if($action=="delete")
  {
    foreach($_SESSION['shoppingcart'] as $key => $value )
    {
      if($value['ISBN']==$id)
      {
        unset($_SESSION['shoppingcart'][$key]);
        $this->load->view('cartview');
        $_SESSION['count']=$_SESSION['count']-1;
      }
    }
  }
}
}
}
?>