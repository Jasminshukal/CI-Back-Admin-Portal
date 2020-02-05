<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('memory_limit', '256M');

class Migration extends CI_Controller 
{

	public function __construct()
	{
		parent:: __construct();
		$this->load->model("email_model");
	}

	public function index()
	{
        echo "test";
        die();
    }// index method

    public function tbl_settings()
    {
        $this->load->dbforge();
        $fields = array(
            'id' => array(
                                     'type' => 'INT',
                                     'constraint' => 11,
                                     'auto_increment' => TRUE
                              ),
            'field_name' => array(
                                     'type' => 'VARCHAR',
                                     'constraint' => '200',
                              ),
            'field_value' => array(
                                     'type' => 'TEXT',
                                     'null' => TRUE,
                              ),
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
         $this->db->insert_batch('tbl_settings1', $data);
    } 

    public function Migration()
    {
        echo "test";
        $this->load->dbforge();
        $fields = array(
            'blog_id' => array(
                                     'type' => 'INT',
                                     'constraint' => 5,
                                     'unsigned' => TRUE,
                                     'auto_increment' => TRUE
                              ),
            'blog_title' => array(
                                     'type' => 'VARCHAR',
                                     'constraint' => '100',
                              ),
            'blog_author' => array(
                                     'type' =>'VARCHAR',
                                     'constraint' => '100',
                                     'default' => 'King of Town',
                              ),
            'blog_description' => array(
                                     'type' => 'TEXT',
                                     'null' => TRUE,
                              ),
        );

        $this->dbforge->add_field($fields);

        $this->dbforge->add_key('blog_id', TRUE);
        // gives PRIMARY KEY (blog_id)

        $this->dbforge->add_key('blog_title');
        // gives KEY (blog_title)
        $this->dbforge->create_table('blog');
    }

}