<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('memory_limit', '256M');
$settings= array();

class ajax_controller extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $result_settings=$this->db->query("select * from tbl_settings");
        if($result_settings->num_rows()>0)
        {
            foreach ($result_settings->result() as $field_row) {
                $this->settings[$field_row->field_name]=$field_row->field_value;
            }
        }
        $this->admin_model->valid_login();
        $this->load->helper('url');
        $this->load->model("email_model");
        $this->load->model("role_model");
        $this->load->model("access_model");
        $this->load->helper("my_helper");
        $this->load->library('pagination');
        $this->load->library('email');
        $this->load->library('Cropimg');
        $this->load->model("User_model");
        

        ///this is For Db Setting Use In Tempalte File 
    }
    
    public function index()
    {
        
    }

    public function update_role()
    {
        $postdata = $this->input->post();
        $access   = $this->access_model->get_access_list();
        foreach ($postdata['id'] as $id) {
            $update              = array();
            $update['id']        = $id;
            $update['role_name'] = $postdata[$id . "_role_name"];
            $arr                 = array();
            foreach ($access->result() as $access1) {
                $arr[$access1->access_name] = "";
                $key                        = $id . "_" . $access1->access_name;
                if (isset($postdata[$key])) {
                    $arr[$access1->access_name] = 1;
                } else {
                    $arr[$access1->access_name] = 0;
                }
            }
            $update['role_access']  = json_encode($arr);
            $update['date_updated'] = date('Y-m-d H:i:s');
            $result                 = $this->role_model->update_role($update, $id);
        }
        $array           = array();
        $array['update'] = 1;
        $array['status'] = 1;
        echo json_encode($array);
    }
    
    public function sendEmail($email, $subject, $message)
    {
        
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.wessexinvestment.com',
            'smtp_port' => '587',
            'smtp_user' => 'developer@wessexinvestment.com',
            'smtp_pass' => 'Admin@2019',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        // $config = Array();
        // $config['protocol'] = "mail";
        // $config['smtp_host'] = "localhost";
        // $config['smtp_port'] = "587";
        // $config['smtp_user'] = "developer@wessexinvestment.com"; 
        // $config['smtp_pass'] = "Admin@2019";
        // $config['charset'] = "utf-8";
        // $config['mailtype'] = "html";
        $ci     = get_instance();
        $ci->load->library('email');
        
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('Wessex Reporting', 'report@wessexinvestment.com');
        $this->email->to('jasmin@smart-webtech.com');
        $this->email->subject($subject);
        $this->email->message($message);
        //$this->email->attach($buffer, 'attachment', 'report.pdf', 'application/pdf');
        if ($this->email->send()) {
            $res = $this->email->print_debugger();
            return "Send successfully";
        } else {
            return $this->email->print_debugger();
            print_r($this->email->print_debugger());
        }
        print_r($this->email->print_debugger(array(
            'headers'
        )));
        
    }

    public function send_mail_test()
    {
        $id=1;
        $res=$this->email_model->get_email_detail($id);
        $subject=$res['email_subject'];
        $msg=$res['email_contact'];
        echo "welcome send mail  test";
        //sendEmail($email, $subject, $message)
    }
    
    public function get_all_email()
    {
        
        $postdata          = $this->input->post();
        $postdata['start'] = 0;
        $postdata['limit'] = 0;
        $ticket_total      = $this->email_model->get_all_email($postdata);
        $ticket_count      = 0;
        $limit             = 10;
        $uri               = $this->uri->uri_to_assoc(3);
        $page              = !empty($uri['page']) ? $uri['page'] : 0;
        $postdata['start'] = $page;
        $postdata['limit'] = $limit;
        
        
        $result_list = $this->email_model->get_all_email($postdata);
        
        $config['total_rows']      = $ticket_total->num_rows();
        $config["base_url"]        = base_url("ajax_controller/get_all_email/page/");
        $config["uri_segment"]     = 4;
        $config['per_page']        = $limit;
        $config['full_tag_open']   = "<ul class='pagination'>";
        $config['full_tag_close']  = "</ul>";
        $config['first_link']      = "<<";
        $config['first_tag_open']  = "<li>";
        $config['first_tag_close'] = "</li>";
        $config['last_link']       = ">>";
        $config['last_tag_open']   = "<li>";
        $config['last_tag_close']  = "</li>";
        $config['next_link']       = '&gt;';
        $config['next_tag_open']   = "<li class='next'>";
        $config['next_tag_close']  = "</li>";
        $config['prev_link']       = '&lt;';
        $config['prev_tag_open']   = "<li class='prev'>";
        $config['prev_tag_close']  = "</li>";
        $config['cur_tag_open']    = "<li class='green-haze'><a href='#'>";
        $config['cur_tag_close']   = "</a></li>";
        $config['num_tag_open']    = "<li>";
        $config['num_tag_close']   = "</li>";
        
        $this->pagination->initialize($config);
        $links = $this->pagination->create_links();
        $i     = 0;
        
        $html                = "";
        $data['result_list'] = $result_list;
        foreach ($result_list->result() as $row_email) {
            
            
            $item_data        = array();
            $item_data['row'] = $row_email;
            
            $html .= $this->load->view('templetes/email_card.php', $item_data, true);
        }
        $arr               = array();
        $arr['html']       = $html;
        $arr['pagination'] = $links;
        echo json_encode($arr);
        
    } /// public function


    public function get_all_user()
    {
        
        $postdata          = $this->input->post();
        $postdata['start'] = 0;
        $postdata['limit'] = 0;
        $ticket_total      = $this->User_model->get_all_user($postdata);
        $ticket_count      = 0;
        $limit             = 10;
        $uri               = $this->uri->uri_to_assoc(3);
        $page              = !empty($uri['page']) ? $uri['page'] : 0;
        $postdata['start'] = $page;
        $postdata['limit'] = $limit;
        $result_list = $this->User_model->get_all_user($postdata);
        $config['total_rows']      = $ticket_total->num_rows();
        $config["base_url"]        = base_url("ajax_controller/get_all_user/page/");
        $config["uri_segment"]     = 4;
        $config['per_page']        = $limit;
        $config['full_tag_open']   = "<ul class='pagination'>";
        $config['full_tag_close']  = "</ul>";
        $config['first_link']      = "<<";
        $config['first_tag_open']  = "<li>";
        $config['first_tag_close'] = "</li>";
        $config['last_link']       = ">>";
        $config['last_tag_open']   = "<li>";
        $config['last_tag_close']  = "</li>";
        $config['next_link']       = '&gt;';
        $config['next_tag_open']   = "<li class='next'>";
        $config['next_tag_close']  = "</li>";
        $config['prev_link']       = '&lt;';
        $config['prev_tag_open']   = "<li class='prev'>";
        $config['prev_tag_close']  = "</li>";
        $config['cur_tag_open']    = "<li class='green-haze'><a href='#'>";
        $config['cur_tag_close']   = "</a></li>";
        $config['num_tag_open']    = "<li>";
        $config['num_tag_close']   = "</li>";
        
        $this->pagination->initialize($config);
        $links = $this->pagination->create_links();
        $i     = 0;
        
        $html                = "";
        $data['result_list'] = $result_list;
        foreach ($result_list->result() as $row_email) {
            
            
            $item_data        = array();
            $item_data['row'] = $row_email;
            
            $html .= $this->load->view('templetes/user_list_card.php', $item_data, true);
        }
        $arr               = array();
        $arr['html']       = $html;
        $arr['pagination'] = $links;
        echo json_encode($arr);
        
    } /// public function
    //get_all_user


    public function get_order_list()
    {
        $postdata          = $this->input->post();
        $postdata['start'] = 0;
        $postdata['limit'] = 0;
        $order_total      = $this->Order_model->get_all_order_list($postdata);
        $ticket_count      = 0;
        $limit             = 10;
        $uri               = $this->uri->uri_to_assoc(3);
        $page              = !empty($uri['page']) ? $uri['page'] : 0;
        $postdata['start'] = $page;
        $postdata['limit'] = $limit;
        $result_list = $this->Order_model->get_all_order_list($postdata);
        $config['total_rows']      = $order_total->num_rows();
        $config["base_url"]        = base_url("ajax_controller/get_order_list/page/");
        $config["uri_segment"]     = 4;
        $config['per_page']        = $limit;
        $config['full_tag_open']   = "<ul class='pagination'>";
        $config['full_tag_close']  = "</ul>";
        $config['first_link']      = "<<";
        $config['first_tag_open']  = "<li>";
        $config['first_tag_close'] = "</li>";
        $config['last_link']       = ">>";
        $config['last_tag_open']   = "<li>";
        $config['last_tag_close']  = "</li>";
        $config['next_link']       = '&gt;';
        $config['next_tag_open']   = "<li class='next'>";
        $config['next_tag_close']  = "</li>";
        $config['prev_link']       = '&lt;';
        $config['prev_tag_open']   = "<li class='prev'>";
        $config['prev_tag_close']  = "</li>";
        $config['cur_tag_open']    = "<li class='green-haze'><a href='#'>";
        $config['cur_tag_close']   = "</a></li>";
        $config['num_tag_open']    = "<li>";
        $config['num_tag_close']   = "</li>";
        
        $this->pagination->initialize($config);
        $links = $this->pagination->create_links();
        $i     = 0;
        
        $html                = "";
        $data['result_list'] = $result_list;
        foreach ($result_list->result() as $row_email) {
            
            
            $item_data        = array();
            $item_data['row'] = $row_email;
            $item_data['setting'] = $this->settings;
            
            $html .= $this->load->view('templetes/order_card.php', $item_data, true);
        }
        $arr               = array();
        $arr['html']       = $html;
        $arr['pagination'] = $links;
        echo json_encode($arr);
        
    } /// public function
    //get_order_list
    
    
    public function update_email()
    {
        $postdata = $this->input->post();
        echo json_encode($postdata);
    } //UPDATE email 
    
    
    public function check_permission($arr, $name)
    {
        foreach ($arr as $key => $value) {
            if ($key == $name) {
                if ($value == 1)
                    return 1;
            }
        }
        return 0;
    } /// check permission for admin pages
    
    public function change_user_status()
    {
        $r = $this->check_permission($this->session->userdata("access"), "user_edit");
        if ($r == 0)
            return "";
        
        $post = $this->input->post();
        if ($post['id'] != "" && $post['status'] != "") {
            $id            = $this->input->post("id", TRUE);
            $upd           = array();
            $upd['status'] = $this->input->post("status", TRUE);
            $this->user_model->update_user($upd, $id);
        }
    } /// change_category_status 

    public function upload_crop_file()
    {
        $post=$this->input->post();
        if($post['action']="Image_change")
        {
            $name=$this->random_number();
            $output_file='assets/profile_img/'.$name.'.png';    
            $res=$this->base64_to_jpeg($post['image_data'],$output_file);
            if($res)
            {
                $id=$this->session->userdata("userid");
                $update=array();
                $update['profile_image']=$name.".png";
                $result_upload=$this->admin_model->update_profile($update,$id);
                $old_file="assets/profile_img/".$this->session->userdata('profile_image'); 
                $this->session->set_userdata('profile_image', $update['profile_image']); 
                if(file_exists($old_file))
                {
                    unlink($old_file);
                }
            }
        }
    }

    function random_number($maxlength = 17) {
        $chary = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
                        "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
                        "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $return_str = "";
        for ( $x=0; $x<=$maxlength; $x++ ) {
            $return_str .= $chary[rand(0, count($chary)-1)];
        }
        return $return_str;
    }

    public function base64_to_jpeg($base64_string, $output_file) 
    {
        $data = base64_decode($base64_string);
        $imagedata = base64_decode($base64_string);
        $file_name = $output_file;
        $uplode=file_put_contents($file_name,$data);
        
        if($uplode)
        {
            return true;
        }
    } // save chart image
} // class ends
