<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hellomodel extends CI_Model
{
    public function getProfile($name,$age)
    {
	return array("name"=>"Bond","Age"=>25);
}
}

?>