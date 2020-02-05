<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('memory_limit', '256M');

class Migration_tbl extends CI_Controller 
{

	public function __construct()
	{
        parent:: __construct();
        $name=base_url("/Migration_tbl");
        define("THIS",$name);
        $this->load->dbforge();
	}
   
    public function index()
    {
        $sql="SELECT TABLE_NAME 
        FROM INFORMATION_SCHEMA.TABLES
        WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='".DATABASE_NAME_SET."'";
        
       // echo "Exist Table List <br>";
        
        $tables=$this->db->query($sql)->result_array();    
        $item_data['tables']=$tables;
        $html=$this->load->view('templetes/crate_db.php', $item_data, true);
        print_r($html);
        die();
    }
    //create db 
	public function Crate_BD()
	{
        $res=array();
        if($this->db->table_exists('tbl_settings'))
        {
            array_push($res,"tbl_settings Already Exist <br>");
        }   
        else
        {
            $this->tbl_settings();
            array_push($res,"Crate tbl_settings <br>");
            // echo "Crate tbl_settings <br>";
        }

        if($this->db->table_exists('tbl_admin'))
        {
            array_push($res,"tbl_admin Already Exist <br>");
            // echo "tbl_admin Already Exist <br>";
        }   
        else
        {
            $this->tbl_admin();
            array_push($res,"Crate tbl_admin <br>");
            // echo "Crate tbl_admin <br>";
        }

        if($this->db->table_exists('tbl_roles'))
        {
            array_push($res,"tbl_roles Already Exist <br>");
            // echo "tbl_roles Already Exist <br>";
        }   
        else
        {
            $this->tbl_roles();
            array_push($res,"Crate tbl_roles <br>");
            // echo "Crate tbl_roles <br>";
        }

        if($this->db->table_exists('tbl_access_permission'))
        {
            array_push($res,"tbl_access_permission Already Exist <br>");
            // echo "tbl_access_permission Already Exist <br>";
        }   
        else
        {
            $this->tbl_access_permission();
            array_push($res,"Crate tbl_access_permission <br>");
            // echo "Crate tbl_access_permission <br>";
        }

        if($this->db->table_exists('tbl_email'))
        {
            array_push($res,"tbl_email Already Exist <br>");
            // echo "tbl_email Already Exist <br>";
        }   
        else
        {
            $this->tbl_email();
            array_push($res,"Crate tbl_email <br>");
            // echo "Crate tbl_email <br>";
        }        

        // return 1;
        $item_data['res']=$res;
        $html=$this->load->view('templetes/crate_db.php', $item_data, true);
        echo $html;
        // crate_res_db
    }// index method

    public function tbl_settings()
    {

        $fields = array(
            'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => TRUE),
            'field_name' => array('type' => 'VARCHAR','constraint' => '200'),
            'field_value' => array('type' => 'TEXT','null' => TRUE),
        );

        $this->dbforge->add_field($fields);

        $this->dbforge->add_key('id', TRUE);
        // gives PRIMARY KEY (blog_id)
        $this->dbforge->create_table('tbl_settings');

        $data = array(
                array(
                    'field_name' => 'name' ,
                    'field_value' => 'Topp’d Off' ,
                ),
                array(
                    'field_name' => 'site_url' ,
                    'field_value' => FCPATH ,
                ),
                array(
                'field_name' => 'footer_text' ,
                'field_value' => 'Copyright © 2019. All Rights Reserved by Topp’d Off' ,
                ),
                array(
                'field_name' => 'theam_color' ,
                'field_value' => 'default' ,
                ), 
                array(
                    'field_name' => 'app_logo' ,
                    'field_value' => '15608526451840165156.jpg' ,
                    ),
                array(
                'field_name' => 'favicon' ,
                'field_value' => '15643990321694301241.ico' ,
                ),
                array(
                'field_name' => 'success_color' ,
                'field_value' => 'green-haze' ,
                ),
                array(
                'field_name' => 'danger_color' ,
                'field_value' => 'red-thunderbird' ,
                ),
                array(
                'field_name' => 'warning_button_color' ,
                'field_value' => 'yellow-soft' ,
                ),   
                array(
                'field_name' => 'layout' ,
                'field_value' => 'layout/default' ,
                )                                                
        );
        
        $this->db->insert_batch('tbl_settings', $data);
    }
    //Crate table tbl_settings

    public function tbl_admin()
    {

        $fields = array(
            'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => TRUE),
            'email' => array('type' => 'VARCHAR','constraint' => '200'),
            'password' => array('type' => 'VARCHAR','constraint' => '200','null' => FALSE),     
            'psw_key' => array('type' => 'VARCHAR','constraint' => '200','null' => FALSE),  
            'name' => array('type' => 'VARCHAR','constraint' => '200'),                         
            'last_login_ip' => array('type' => 'VARCHAR','constraint' => '200'),       
            'last_login_date' => array('type' => 'datetime','null' => TRUE),
            'role' => array('type' => 'INT','constraint' => 11),
            'status' => array('type' => 'varchar','constraint' => 1,'default' => '1','COMMENT' => '1="active" 2="inactive"'),
            'profile_image' => array('type' => 'TEXT','null' => TRUE),
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_admin');
        $data = array(
            array('email' => 'admin@gmail.com' ,'password' => '202cb962ac59075b964b07152d234b70','name'=>'Jone Doi','last_login_ip'=>'::1','last_login_date'=>'2019-08-16 12:28:46','role'=>'1','status'=>'1','profile_image'=>'HJaxtZxFi695MR3SZU.png','psw_key'=>''),
            array('email' => 'admin@admin.com','password' => '202cb962ac59075b964b07152d234b70','name'=>'test admin','last_login_ip'=>'::1','last_login_date'=>'2019-08-16 12:28:46','role'=>'2','status'=>'1','profile_image'=>'HJaxtZxFi695MR3SZU.png','psw_key'=>'')                                                
        );
        $this->db->insert_batch('tbl_admin', $data);
    }
    //Crate table tbl_admin


    public function tbl_roles()
    {

        $fields = array(
            'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => TRUE),
            'role_name' => array('type' => 'VARCHAR','constraint' => '200'),
            'role_access' => array('type' => 'TEXT','null' => TRUE),
            'date_added' => array('type' => 'datetime','null' => TRUE),
            'date_updated' => array('type' => 'datetime','null' => TRUE)
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_roles');
        $data = array(
            array('role_name' => 'Super_Admin' ,'role_access' => '{"Users":1,"Setting":1,"Email_template":1,"Changepassword":1}','date_added'=>'2019-03-01 00:00:00','date_updated'=>'2019-03-09 08:42:45'),
            array('role_name' => 'admin','role_access' => '{"Users":1,"Setting":1,"Email_template":1,"Changepassword":1}','date_added'=>'2019-03-01 00:00:00','date_updated'=>'2019-03-09 08:42:45')                                                
        );
        
        $this->db->insert_batch('tbl_roles', $data);
    }
    //Crate table tbl_roles

    public function tbl_access_permission()
    {

        $fields = array(
            'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => TRUE),
            'access_name' => array('type' => 'TEXT','null' => TRUE),
            'access_code' => array('type' => 'TEXT','null' => TRUE),
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_access_permission');
        $data = array(
            array('access_name' => 'Users' ,'access_code' => 'Users'),
            array('access_name' => 'Setting','access_code' => 'Setting'),
            array('access_name' => 'Email_template','access_code' => 'Email_template'),
            array('access_name' => 'Changepassword','access_code' => 'Changepassword')
        );
        $this->db->insert_batch('tbl_access_permission', $data);
    }
    //Crate table tbl_access_permission

    public function tbl_email()
    {

        $fields = array(
            'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => TRUE),
            'email_contact' => array('type' => 'TEXT','null' => TRUE),
            'email_name' => array('type' => 'TEXT','null' => TRUE),
            'email_subject' => array('type' => 'TEXT','null' => TRUE)
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_email');
        $data = array(
            array('email_contact' => 'hello {[NAME]}\r\n','email_name' => 'Welcome','email_subject' => 'welcome Subject')
        );
        $this->db->insert_batch('tbl_email', $data);
    }
    //Crate table tbl_email

}