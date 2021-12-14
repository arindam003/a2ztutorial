<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

class Tutors_model extends CI_Model{
	
	function add_data($data){
		$this->db->insert('tbl_signup',$data);
		//echo $this->db->last_query(); die;
		$last_id = $this->db->insert_id();
		return $last_id;
	}

	// function lastinsertid(){
			
	// 	$row = $this->db->select("*")->limit(1)->order_by('id',"DESC")->get("tbl_signup")->row();
	// 	//echo $this->db->last_query(); die;
	//     return $row->id;
	// }
	function add_subjectwiselevel($class){
		$this->db->insert('tbl_qualifications',$class);
		return $this->db->insert_id();
	}
	function add_data_subjectteacher($data_single){
		$this->db->insert('tbl_subject_map',$data_single);
		//echo $this->db->last_query(); die;
		return $this->db->insert_id();
	}
	function get_checking($email){
		$this->db->select('*');
		$this->db->where('email',$email);
		//$this->db->where('usertype_id','3');
		$query = $this->db->get('tbl_signup');
		$result = $query->result();
		return $result;
	}
	function get_signup($uname){
		$this->db->select('*');
		$this->db->where('usertype_id','3');
		$this->db->where('name',$uname);
		//$this->db->where('slug_name',$slug_name);
		$query = $this->db->get('tbl_signup');
		$result = $query->result();
		 return $result;
		}


		public function update_maildata($data,$code) {
		if(!empty($data))
			{
		$this->db->set('mail_status', '0');
			 $this->db->where('usertype_id','3');
      	$this->db->where('mail_verify', $code);

     	$this->db->update('tbl_signup',$data);
     	//echo $this->db->last_query(); die;
	  	return $this->db->affected_rows();
    	} 
	}

	

	function validate($email,$password){
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('usertype_id','3');
		$this->db->where('mail_status','1');
		// $this->db->where('status','1');
		$query = $this->db->get('tbl_signup');
		$row = $query->row();
		if($query->num_rows() > 0){
				$teacherdata = array(
					//'user_id'  			=> $row->uid,
					'teacher_id' 		        => $row->id,
					'teacher_email' 			=> $row->email,			
					'teacher_password' 			=> $row->password,
					'teacher_name'     			=> $row->name,
					'teacher_usertype_id'		=> $row->usertype_id,
					'teacher_is_logged_in' 		=> true
				);

				$this->session->set_userdata($teacherdata);
				//echo $this->db->last_query(); die;
				return TRUE;
		}	
	}

	function get_subjects(){
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_subjects');
		$result = $query->result();
		return $result;
	}
	function get_levels(){
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_levels');
		$result = $query->result();
		return $result;
	}

	function get_subject_offered(){
		$this->db->select('*');
		$query = $this->db->get('tbl_subjects');
		$result = $query->result();
		return $result;
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
			$this->db->where('usertype_id','3');
			$this->db->where('slug_name',$slug_name);
			$query = $this->db->get('tbl_signup');
			//echo $this->db->last_query(); die;
			$result = $query->result();
			return $result;
		}
		
	function edit_profile($data,$slug_name){
		if(!empty($data))
			{
			 $this->db->where('usertype_id','3');
			 $this->db->where('slug_name',$slug_name);
             $this->db->update('tbl_signup', $data);
             //echo $this->db->last_query(); die;
			 return $this->db->affected_rows();
			}
		}

		// change password

		function get_teacherdata_by_id($teacher_id){
			$this->db->select('*');
			$this->db->where('id',$teacher_id);
			$query =  $this->db->get('tbl_signup');
			$result = $query->result();
			return $result;
		}


		public function update_password($teacher_id,$new_pass){
		    $data = array(
		           'password' => $new_pass
		        );
		    $this->db->where('id', $teacher_id);
		    $this->db->update('tbl_signup', $data);
		    return true;
		}

		
		

	}
?>