<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class loginmodel extends CI_Model
{
function __construct() {
parent::__construct();
}
public function login_customer()
{
$Username=$_POST['username'];
$Password=md5($_POST['password']);
$query=$this->db->query("SELECT username,password FROM customers WHERE username='".$Username."' AND password='".$Password."'");
$data=array();
if(!empty($_POST['username'])&&!empty($_POST['password']))
{
if($query->num_rows()>0)
{
foreach($query->result() as $row)
{
	$data['user_name']=$row->username;
}
return $data;
}
}
}

public function account_customer_bytitle()
{
	if(isset($_POST['searchby']))
    {
	$search=$_POST['searchby'];
	$query=$this->db->query("SELECT a.Title,a.ISBN,b.Number,c.name,b.warehouseCode,a.Price FROM book a,stocks b,warehouse c WHERE a.Title LIKE '%$search%' AND a.ISBN=b.ISBN AND b.warehouseCode=c.warehouseCode");
    if(isset($_POST['sbt']))
    {
    if($query->num_rows()>0)
    {
     return $query->result_array();
    }
    }	
    }
}

public function account_customer_byauthor()
{
	if(isset($_POST['searchby']))
    {
    $search=$_POST['searchby'];
	$query=$this->db->query("SELECT a.Title,a.ISBN,d.Number,a.Price,e.name,d.warehouseCode FROM book a,author b,writtenby c,stocks d,warehouse e WHERE b.name LIKE '%$search%' AND b.SSN=c.SSN AND  c.ISBN=a.ISBN AND a.ISBN=d.ISBN AND d.warehouseCode=e.warehouseCode");
    if(isset($_POST['sba']))
    {
    if($query->num_rows()>0)
    {
     return $query->result_array();
    }
    }	
    }	

}


public function account_customer_prev()
{
	if(isset($_SESSION['searchvalue']))
    {
	$search=$_SESSION['searchvalue'];
	if(isset($_SESSION['bytitle']))
    {
	$query=$this->db->query("SELECT a.Title,a.ISBN,b.Number,c.name,b.warehouseCode,a.Price FROM book a,stocks b,warehouse c WHERE a.Title LIKE '%$search%' AND a.ISBN=b.ISBN AND b.warehouseCode=c.warehouseCode");
    if($query->num_rows()>0)
    {
     return $query->result_array();
    }
    }
    if(isset($_SESSION['byauthor']))
    {
    $query2=$this->db->query("SELECT a.Title,a.ISBN,d.Number,a.Price,e.name,d.warehouseCode FROM book a,author b,writtenby c,stocks d,warehouse e WHERE b.name LIKE '%$search%' AND b.SSN=c.SSN AND  c.ISBN=a.ISBN AND a.ISBN=d.ISBN AND d.warehouseCode=e.warehouseCode");
    if($query2->num_rows()>0)
    {
     return $query2->result_array();
    }
    }		
    }
}


}