<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller 
{

	public function __construct()
	{
		parent:: __construct();
		$this->admin_model->valid_login();
		$this->load->model("role_model");
		$this->load->model("Access_model");
		$this->load->model("settings_model");
        $this->layout_view="layout/blank_layout";
	}
	public function index()
	{
		echo "string";
		die();
	}

    public function check_permission($arr,$name)
    {
        foreach ($arr as $key => $value) {
            if($key==$name)
            {
                if($value==1)
                    return 1;
            }
        }
        return 0;
    }/// check permission for admin pages

	public function view_logs()
    {

        $per_setting=$this->check_permission($this->session->userdata("access"),"Setting");
        if($per_setting==0)
        {
            redirect(base_url());
        }

    	$this->admin_model->valid_login();

        if( $this->input->cookie(md5("data")) == md5("admin") ){
            $this->logViewer = new \CILogViewer\CILogViewer();

            //update
            $this->input->set_cookie(md5('data'),md5("admin"),6000);

            echo $this->logViewer->showLogs();
        }else{

            if( $this->input->get("key") == "admin" ){
                $this->input->set_cookie(md5('data'),md5("admin"),6000);
                redirect(base_url( $this->router->fetch_class()."/".$this->router->fetch_method() ));
            }else{
                echo "Incorrect login ";
            }
        }
    }


}