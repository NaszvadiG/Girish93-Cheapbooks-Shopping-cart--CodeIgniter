<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class registermodel extends CI_Model
{
function __construct() {
parent::__construct();
}
public function register_customer()
{

$username=$_POST['username'];
$address=$_POST['address'];
$email=$_POST['email'];
$pno=$_POST['pno'];
$password=$_POST['password'];
$this->db->query("INSERT INTO customers VALUES('".$username."','".md5($password)."','".$address."','".$pno."','".$email."')");
}
}
?>