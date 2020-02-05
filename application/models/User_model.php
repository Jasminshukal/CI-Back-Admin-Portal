<?php
/*
	This is user login system model
	And add update user functions
*/
class User_model extends CI_Model
{
    public function __construct()
	{
		parent:: __construct();
	}

	public function get_all_user($postdata)
	{
		if($postdata['limit']!=0)
        {
            $limit=" LIMIT ".$postdata['start'].",".$postdata['limit'];
        }else{
            $limit="";
		}
		
		$this->session->userdata();
		if($this->session->userdata("role_id")=="1")
		{
			$sql='SELECT * FROM tbl_users WHERE is_delete="0"';
		}
		else {
			$sql='SELECT * FROM tbl_users WHERE is_delete="0" AND is_developer="0"';
		}
		$sql=$sql.$limit;
		$result=$this->db->query($sql);
		return $result;
	}
}