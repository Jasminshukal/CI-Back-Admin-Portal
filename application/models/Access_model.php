<?php
/*
	This is user login system model
	And add update user functions
*/

class access_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function get_access_list()
	{
		$this->db->select('*');
		$this->db->from('tbl_access_permission');
		$query = $this->db->get();
		return $query;
	}
}
?>