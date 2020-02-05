<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_template extends MY_Controller 
{

	public function __construct()
	{
		parent:: __construct();
		$this->admin_model->valid_login();
		$this->load->model("email_model");
	}

	public function index()
	{
		$Email_template=$this->check_permission($this->session->userdata("access"),"Email_template");
		if($Email_template==0)
		{
			redirect(base_url());
		}
		$this->view_data['title'] = "Email template";
		$this->view_data['menu'] = "Email_template";
		$this->view_data['page_heading']="Manage Email_template";
		$this->view_data['page_sub_heading']="";
		$this->view_data['arr_breadcrumb']=array("Home"=>base_url());
		$this->view_data['breadcrumb_home_logo']='<i class="icon-home"></i>';
		$this->view_data['back_button']=base_url(); 
	}// index method

	public function Edit($id)
	{
		$Email_template=$this->check_permission($this->session->userdata("access"),"Email_template");
		$result=$this->email_model->get_email_detail($id);
		if($Email_template==0)
		{
			redirect(base_url());
		}
		elseif(isset($result))
		{
		$post = $this->input->post(); 
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact', 'Contact', 'trim|required|xss_clean');
		$this->form_validation->set_rules('id', 'Id', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == TRUE)
		{
			$update=array();
			$update['email_contact']=$post['contact'];
			$update['email_name']=$post['name'];
			$update['email_subject']=$post['subject'];
			$page_id=$post['id'];
			//print_r($update);
			$update_email=$this->email_model->email_update($page_id,$update);
		}
		$this->view_data['title'] = "Edit Email template";
		$this->view_data['menu'] = "Email_template";
		$this->view_data['page_heading']="Edit Email Template";
		$this->view_data['page_sub_heading']="";
		$this->view_data['arr_breadcrumb']=array("Home"=>base_url());
		$this->view_data['breadcrumb_home_logo']='<i class="icon-home"></i>';
		$this->view_data['email_data']=$result;
		$this->view_data['back_button']=base_url();
		}
		else
		{
				redirect(base_url());	
		}
	}// index method
}