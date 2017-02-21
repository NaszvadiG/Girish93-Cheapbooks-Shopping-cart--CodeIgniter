<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginprocess extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

     function __construct() {
     parent::__construct();
     
 }

	 public function index()
	 {
	 	$this->load->library('session');
	 	$this->load->model('loginmodel');
	 	$data['logincustomer']=$this->loginmodel->login_customer();
	 	
	 	if($data['logincustomer'])
	 	{
	 	 	$_SESSION['use']=$data['logincustomer']['user_name'];
	 	 	$this->load->view('Accountnew',$_SESSION['use']);
	 	}
	 	else
	 	{
	 	$this->load->view('login');
	 	}  
	 }

	 public function index_title()
	 {
	 	$data['title_message']="success";
	 	$this->load->library('session');
	 	$this->load->model('loginmodel');
	 	$data['title']=$this->loginmodel->account_customer_bytitle();
	 	if($data['title'])
	 	{
	 	$_SESSION['searchvalue']=$this->input->post('searchby');
	 	$_SESSION['bytitle']=$this->input->post('sbt');
	 	$data['num_rows']=count($data['title']);
        $this->load->view('Accountnew',$data);
	 }
     }
	  public function index_author()
	 {
	 	$data['author_message']="success";
	 	$this->load->library('session');
	 	$this->load->model('loginmodel');
	 	$data['author']=$this->loginmodel->account_customer_byauthor();
	 	if($data['author'])
	 	{
	 	$_SESSION['searchvalue']=$this->input->post('searchby');
	 	$_SESSION['byauthor']=$this->input->post('sba');
	 	$data['num_rows']=count($data['author']);
        $this->load->view('Accountnew',$data);
	 }
	 }
      
     public function index_title_prev()
	 {
	 	$data['title_message']="success";
	 	$this->load->library('session');
	 	$this->load->model('loginmodel');
	 	$data['title']=$this->loginmodel->account_customer_bytitle();
	 	if($data['title'])
	 	{
	 	$_SESSION['searchvalue']=$this->input->post('searchby');
	 	$_SESSION['bytitle']=$this->input->post('sbt');
	 	$data['num_rows']=count($data['title']);
        $this->load->view('prevresnew',$data);
	 }
     } 
    
    public function index_author_prev()
	 {
	 	$data['author_message']="success";
	 	$this->load->library('session');
	 	$this->load->model('loginmodel');
	 	$data['author']=$this->loginmodel->account_customer_byauthor();
	 	if($data['author'])
	 	{
	 	$_SESSION['searchvalue']=$this->input->post('searchby');
	 	$_SESSION['byauthor']=$this->input->post('sba');
	 	$data['num_rows']=count($data['author']);
        $this->load->view('prevresnew',$data);
	 }
	 }


    public function session_prev()
	 {
	 	$data['prev_message']="success";
	 	$this->load->library('session');
	 	$this->load->model('loginmodel');
	 	$data['prev']=$this->loginmodel->account_customer_prev();
	 	if($data['prev'])
	 	{
	 	$data['num_rows']=count($data['prev']);
        $this->load->view('prevresnew',$data);
	 }
	 else
	 {
	    $this->load->view('prevresnew');	
	 }
     } 

   public function logout()
   {
   	$this->load->library('session');
   	$data['message2']="success";
   	$this->session->sess_destroy();
   	$this->load->view('login',$data);
   }
    


}