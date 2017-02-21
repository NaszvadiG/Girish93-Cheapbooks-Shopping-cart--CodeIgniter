<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class addmodel extends CI_Model
{
function __construct() {
parent::__construct();
}
public function add_to_table()
{
$BasketID=md5(uniqid(rand(),true));
$this->db->query("INSERT INTO shoppingbasket VALUES('".$BasketID."','".$_SESSION['use']."')");
 if(!empty($_SESSION['shoppingcart']))
  {
  	$totalprice=0;
  	foreach($_SESSION['shoppingcart'] as $key => $value)
  	{
    $this->db->query("INSERT INTO contains VALUES('".$value['ISBN']."','".$BasketID."','".$value['Quantity']."')");
    $this->db->query("INSERT INTO shippingorder VALUES('".$value['ISBN']."','".$value['Warehousecode']."','".$_SESSION['use']."','".$value['Quantity']."')");  	
    $this->db->query("UPDATE stocks SET number=number-'".$value['Quantity']."' WHERE ISBN='".$value['ISBN']."' AND warehouseCode='".$value['Warehousecode']."'");
    }
  }
}
}