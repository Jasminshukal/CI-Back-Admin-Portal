<?php
/*
	This is user login system model
	And add update user functions
*/

class email_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function get_all_email($postdata)
	{
		if($postdata['limit']!=0)
        {
            $limit=" LIMIT ".$postdata['start'].",".$postdata['limit'];
        }else{
            $limit="";
        }

		$result=$this->db->query("select * from  tbl_email ORDER BY id DESC $limit ");
		return $result;
	}


	public function get_email_detail($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_email');
		$this->db->where('id', $id );
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 )
	    {
	        $row = $query->row_array();
	        return $row;
	    }	
	}

	public function email_update($id,$data)
	{
		$this->db->trans_start();
		$d=array("id"=>$id);
		Add_log("Update_email_id_".$id."_name_".$data['email_name']);
        $this->db->where($d);
        $this->db->update("tbl_email",$data);
        $this->db->trans_complete();

	}


	
	

}// Class
