<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller 
{

	public function __construct()
	{
		parent:: __construct();
		$this->admin_model->valid_login();
	}

	public function index()
	{
		$Users=$this->check_permission($this->session->userdata("access"),"Users");
		if($Users==0)
		{
			redirect(base_url());
		}
		$this->view_data['title'] = "Manage Users";
		$this->view_data['menu'] = "Users";
		$this->view_data['page_heading']="Manage Users";
		$this->view_data['page_sub_heading']="";
		$this->view_data['arr_breadcrumb']=array("Home"=>base_url());
		$this->view_data['breadcrumb_home_logo']='<i class="icon-home"></i>';
		
		//$this->view_data['settings']=$this->settings;
	}// index method
}