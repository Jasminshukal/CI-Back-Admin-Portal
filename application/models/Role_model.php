<?php
/*
	This is user login system model
	And add update user functions
*/
 
class role_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function get_permissions()
	{
		$arr=array();
		$this->db->select('*');
		$this->db->from('tbl_access_permission');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$arr[$row->access_name]=0;
		}
		return $arr;
	}// get permission

	public function add_role($data)
	{
		$this->db->insert('tbl_roles', $data); 
	}// insert new role
	public function get_role_list($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_roles');
		$this->db->where_not_in('id',$id);
		$this->db->where_not_in('role_name',"Super_Admin");
		
		$query = $this->db->get();
		return $query
;	}// get role list

	public function update_role($data,$id)
	{
		$this->db->where('id', $id);
    	$this->db->update("tbl_roles", $data);
	}/// update role data

	public function get_role_detail($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('tbl_roles');
		$query = $this->db->get();
		return $query;
	}// get role details

}// Class
