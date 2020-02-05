<?php
/*
	This is user login system model
	And add update user functions
*/

class settings_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}



	public function update_settings($field_name,$data)
	{
		$this->db->where('field_name', $field_name);
    	$this->db->update("tbl_settings", $data);
	}/// update menu item

	public function get_settings($field_name)
	{
    	$this->db->select('field_value');
    	$this->db->get("tbl_settings");
		$this->db->where('field_name', $field_name);
	}/// update menu item

	
	

}// Class
