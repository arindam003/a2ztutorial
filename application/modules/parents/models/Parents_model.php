<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

	class Parents_model extends CI_Model{
		public function insert_user($data){
        $this->db->insert('google_login', $data);
        //echo $this->db->last_query(); die; 
        return $this->db->insert_id();
    }

    function get_googleprofile(){
		$this->db->select('*');
		$this->db->where('usertype_id','2');
		$query = $this->db->get('google_login');
		$result = $query->result();
		 return $result;
	}


	function mail_check($email){
		$this->db->select('id');
	    $this->db->where('email', $email);
	    //$this->db->where('usertype_id','2');
	    $query = $this->db->get('tbl_signup');
	    $result = $query->result();
			return $result;
	}

	function add_data($data){
			$this->db->insert('tbl_signup',$data);
			return $this->db->insert_id();
			//echo $this->db->last_query(); die;

		}
		

	function validate($email,$password){
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('usertype_id','2');
		// $this->db->where('status','1');
		$query = $this->db->get('tbl_signup');
		$row = $query->row();
		//if($usertype_id == '2'){
			if($query->num_rows() > 0){
				$parentdata = array(
					//'user_id'  			=> $row->uid,
					'parent_id' 		        => $row->id,
					'parent_email' 				=> $row->email,			
					'parent_password' 			=> $row->password,
					'parent_name'     			=> $row->name,
					'parent_usertype_id'		=> $row->usertype_id,
					'parent_is_logged_in' 		=> true
				);

				$this->session->set_userdata($parentdata);
				return TRUE;
			//}

		}
		
	}
		
		function get_profile($id){
			$this->db->select('*');
			$this->db->where('id',$id);
			
			$query = $this->db->get('tbl_signup');
			$result = $query->result();
			 return $result;
		}

		function get_data_by_id($slug_name){
			$this->db->select('*');
			$this->db->where('usertype_id','2');
			$this->db->where('slug_name',$slug_name);
			$query = $this->db->get('tbl_signup');
			$result = $query->result();
			return $result;
		}
		
	function edit_profile($data,$slug_name){
		if(!empty($data))
			{
			 $this->db->where('usertype_id','2');	
			 $this->db->where('slug_name',$slug_name);
             $this->db->update('tbl_signup', $data);
			 return $this->db->affected_rows();
			}
		}

		// change password

		function get_parentdata_by_id($parent_id){
			$this->db->select('*');
			$this->db->where('id',$parent_id);
			$query =  $this->db->get('tbl_signup');
			//echo $this->db->last_query(); die;
			$result = $query->result();
			return $result;
		}


		public function update_password($parent_id,$new_pass){
		    $data = array(
		           'password' => $new_pass
		        );
		    $this->db->where('id', $parent_id);
		    $this->db->update('tbl_signup', $data);
		    return true;
		}

		
		

	}
?>