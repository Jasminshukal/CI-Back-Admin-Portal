<?php
/*
	This is user login system model
	And add update user functions
*/
class admin_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper('My');
	}

	// Get total numbers of record  for home page
	public function get_home_data()
	{
		$total_session=$this->db->where('status',1)->count_all_results('tbl_search_session');
       return array("sessions"=>$total_session);

	}/// get_home_data

	/*--START LOGIN SYSTEM------------------------------------------------*/

		public function is_login()
		{
			$AppName = ($this->session->userdata("appname") == $this->settings['name'])?true:false;
			//return (intval($AppName)>0)?true:false;
			if(!$AppName){
				return (intval($AppName)>0)?true:false;
			}
			else 
			{
				$id = $this->session->userdata("userid");
				return (intval($id)>0)?true:false;
			}
		}

		public function valid_login()
		{
			if($this->session->userdata())
			{
				$AppName = ($this->session->userdata("appname") == $this->settings['name'])?true:false;
				$id = $this->session->userdata("userid");
				$is_login = (intval($id)>0)?true:false ;
				if(!$AppName){
					redirect( base_url("login") );
					exit();
				}
				if(!$is_login){
					redirect( base_url("login") );
					exit();
				}
			}
		}

		/*public function get_role()
		{
			return $this->session->userdata("role");
		}*/

		//this function is logout 
		public function logout()
		{
			Add_log("LOGOUT");
			$this->session->unset_userdata('role_name');
			$this->session->unset_userdata('access');
			$this->session->unset_userdata('role_id');
			$this->session->unset_userdata('profile_image');
			$this->session->unset_userdata('profile_name');
			$this->session->unset_userdata('appname');
			$this->session->unset_userdata('userid');
			$this->session->unset_userdata('useremail');
			$this->session->unset_userdata('username');
			session_destroy();
			redirect(base_url("login"));
		}

		public function change_password( $old_password, $new_password )
		{
			$result = array();
			$result['status'] = false;
			$result['message'] = "";

			$old_password = md5($old_password);
			$new_password = md5($new_password);

			$useremail = $this->session->userdata("useremail");
			$old_pass_result = $this->db->query("SELECT * FROM tbl_admin WHERE email = '".$this->db->escape_str($useremail)."' and password = '".$this->db->escape_str($old_password)."' ");
			if( $old_pass_result->num_rows() == 1 ){

				$this->db->where("email",$useremail);
				$this->db->where("password",$old_password);
				$res = $this->db->update("tbl_admin",[ "password" => $new_password ]);

				if( $res ){
					$result['message'] = "Successfully password changed";
					$result['status'] = true;
				}
			}else{
				$result['message'] = "Old password wrong";
			}

			return $result;
		}

		public function reset($email,$key,$new_password)
		{
			$result = array();
			$result['status'] = false;
			$result['message'] = "";

			//$key = md5($key);
			$new_password = md5($new_password);

			// $useremail = $this->session->userdata("useremail");
			$useremail = $email;
			$old_pass_result = $this->db->query("SELECT * FROM tbl_admin WHERE email = '".$this->db->escape_str($useremail)."' and psw_key = '".$this->db->escape_str($key)."' LIMIT 1");
			// echo "SELECT * FROM tbl_admin WHERE email = '".$this->db->escape_str($useremail)."' and psw_key = '".$this->db->escape_str($key)."' LIMIT 1";
			//print_r($old_pass_result);
			//die();
			if( $old_pass_result->num_rows() == 1 ){

				$this->db->where("email",$useremail);
				$this->db->where("psw_key",$key);
				$res = $this->db->update("tbl_admin",["password" => $new_password ,"psw_key" => ""]);

				if( $res ){
					$result['message'] = "Successfully password changed";
					$result['status'] = true;
				}
			}else{
				$result['message'] = "Key password wrong";
			}

			return $result;
		}

		public function get_role_permission($id)
		{
			$per=""; 
			$role="";

			$result=$this->db->query("select * from tbl_roles where id='$id' LIMIT 1");
			if($result->num_rows()>0)
			{
				$row=$result->result();
				$per=json_decode($row[0]->role_access);
				$role=$row[0]->role_name;
			}else{
				$result_r=$this->db->query("select * from tbl_access_permission ");
				$arr=array();
				foreach ($result_r->result() as $row) {
					$arr[$row->access_code]=0;
				}
				$per=$arr;
				$role="";
			}
			return array('per' => $per ,"role_name"=>$role);
		}//get_role_permission

		//login user if true login so Set session in data
		public function login($data)
		{
			$result = array();
			$result['status'] = false;
			$result['message'] = "";

			$data["password"] = md5($data["password"]);

			$this->db->where("email",$data["email"]);
			$this->db->where("password",$data["password"]);
			$this->db->where("status",1);
			$this->db->limit(1);

			$query_result = $this->db->get("tbl_admin");
			if($query_result->num_rows()>0){

				//set data in session
				$ip=$this->input->ip_address();
				$date=date('Y-m-d H:i:s');
				$db_result = $query_result->result_array()[0];
				$update_login=$this->db->query("UPDATE `tbl_admin` SET `last_login_ip`='".$ip."',`last_login_date`='".$date."' where id='".$db_result['id']."'");
				$userid = $db_result['id'];
				$username = $db_result['name'];
				$useremail = $db_result['email'];
				$access=$this->get_role_permission($db_result['role']);
				$this->session->set_userdata( array("appname"=>$this->settings['name'],"userid"=>$userid,"useremail"=>$useremail , "username" => $username,"role_name"=>$access['role_name'],"access"=>$access['per'],"role_id"=>$db_result['role'],"profile_name"=>$username,"profile_image"=>$db_result['profile_image'] ));
				Add_log("login ".$useremail);
				$result['status'] = true;
			}else{
				$result['message'] = "You are not authorised to login";
				$this->session->set_flashdata('msg', 'You are not authorised to login..');
			}

			return $result;
		}

	/*--STOP LOGIN SYSTEM------------------------------------------------*/


		public function get_profile($id)
		{
			$result=$this->db->query("select * from tbl_admin where id='$id' LIMIT 1");
			if($result)
			{
				if($result->num_rows()>0)
				{
					$row=$result->result();
					return $row[0];
				}
			}
		}
		////get profile detail 

		public function update_profile($data,$id)
		{
				$this->db->where("id",$id);
				$res = $this->db->update("tbl_admin",$data);
		}


		public function get_all_admin($postdata)
		{
			if($postdata['limit']!=0)
		    {
		        $limit=" LIMIT ".$postdata['start'].",".$postdata['limit'];
		    }else{
		        $limit="";
		    }

			// $result=$this->db->query("select * from tbl_admin Where NOT role='1' ORDER BY id DESC $limit ");
			$result=$this->db->query("select a.*,r.role_name from tbl_admin a LEFT JOIN tbl_roles r ON a.role=r.id WHERE NOT a.role='1' ORDER BY a.id DESC $limit ");
			return $result;
		}



}
