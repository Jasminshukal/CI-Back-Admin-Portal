<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin extends MY_Controller 
{
	public function __construct()
	{
		parent:: __construct();
		$this->layout_view="layout/blank_layout";
	}

	public function index()
	{
		redirect(base_url("login"));
	}

	//Login
	public function login()
	{
		$this->view_data['title'] = "Login";


		if( $this->admin_model->is_login() ){
			redirect(base_url()); //got to home or dashbord
		}

		if( $this->input->post() ){
	        $this->form_validation->set_rules('username', 'Email', 'trim|required|valid_email');
	        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			//$this->form_validation->set_error_delimiters("<div class='alert alert-danger' style='color: #D90022;'>", "</div>");

	        if ($this->form_validation->run() == TRUE)
	        {
	        	$form_data = array();
	            $form_data['email']=$this->input->post('username');
	            $form_data['password']=$this->input->post('password');

	            $check_login = $this->admin_model->login($form_data);
	            if( $check_login['status'] == true )
	            {
	                redirect(base_url());
	            } else {
	                $this->view_data['login_error'] = $check_login['message'];
	            }
	        }else{
	        	$this->view_data['login_error'] = validation_errors();
	        }

		}
		
	}


	public function logout()
	{
		$this->admin_model->logout(); //auto redirect on login page
	}


	public function reset()
	{
		$this->layout_view="layout/reset_layout";
		$this->view_data['title'] = "Set Password";
		if($this->input->post())
		{
			$post=$this->input->post();
			$this->form_validation->set_rules('email',"Email", 'trim|required');
			$this->form_validation->set_rules('key',"key", 'trim|required');
			$this->form_validation->set_rules('password',"Password", 'trim|required');
			$this->form_validation->set_rules('password1',"confirm password", 'trim|required|matches[password]');
			if( $this->form_validation->run() )
			{
				$post=$this->input->post();
				$res=$this->admin_model->reset($post['email'],$post['key'],$post['password']);
				if($res['status']==true)
				{
					echo "<br>ture";
					redirect(base_url("login"));
				}
				else
				{
					echo "<br> Not ture";
					$this->session->set_flashdata('msg', 'Try Again '.$res['message']);
					redirect(base_url("admin/reset"));
					
				}	
				
				//$res=$this->admin_model->reset($post['email'],$post['key'],"321");
				// $this->session->set_flashdata('msg', 'Password successfully changed');
			}
			else
			{
				$this->session->set_flashdata('error', validation_errors());
			}

		}
		// $this->admin_model->logout(); //auto redirect on login page
	}

	//forgot password
	public function forgot()
	{
		$this->view_data['title'] = "Forgot";
	}

	public function ChangePassword()
	{
		$this->view_data['title'] = "Change Password";
		$this->view_data['menu'] = "Change Password";	
		$this->view_data['back_button']=base_url(); 
		$this->view_data['page_heading']="Change Password";
		$this->view_data['page_sub_heading']="";
		$this->view_data['arr_breadcrumb']=array("Home"=>base_url("Dashboard"));	
		$this->view_data['breadcrumb_home_logo']='<i class="icon-home"></i>';

		$this->layout_view="layout/default";

		$this->view_data['title'] = "Change Password";

		if( $this->admin_model->is_login() == false ){
			redirect(base_url('login'));
		}

		if( $this->input->post() ){
			$this->form_validation->set_rules('old_password',"old password", 'trim|required');
			$this->form_validation->set_rules('new_password',"new password", 'trim|required');
			$this->form_validation->set_rules('new_conf_password',"confirm password", 'trim|required|matches[new_password]');
			if( $this->form_validation->run() )
			{
				$old_password = $this->input->post('old_password');
				$new_password = $this->input->post('new_password');
				$res = $this->admin_model->change_password($old_password,$new_password);

				if( $res['status'] == false ){
					$this->view_data['msg_error'] = $res['message'];
				}else{
					$this->view_data['msg_success'] = "Password successfully changed";
				}
			}
		}

	}

}
