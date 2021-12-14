<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

class Tutors_model extends CI_Model{
	
	function add_data($data){
		$this->db->insert('tbl_signup',$data);
		//echo $this->db->last_query(); die;
		return $this->db->insert_id();
	}
	function get_university(){
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_university');
		$result = $query->result();
		return $result;

	}
	function get_emaildomain(){
		$this->db->select('*');
		$query = $this->db->get('tbl_uni_emaildomain');
		$result = $query->result();
		return $result;

	}
	function searching_uni_domainmail($university_id){
		$this->db->select('*');
		$this->db->where('university_id', $university_id);
		$query = $this->db->get('tbl_uni_emaildomain');
		$result = $query->result();
		return $result;
	}
	
	function validate($uni_emaildomain,$password){
		$this->db->where('uni_emaildomain', $uni_emaildomain);
		$this->db->where('password', $password);
		$this->db->where('usertype_id','3');
		// $this->db->where('status','1');
		$query = $this->db->get('tbl_signup');
		$row = $query->row();
		if($query->num_rows() > 0){
				$teacherdata = array(
					//'user_id'  			=> $row->uid,
					'teacher_id' 		        => $row->id,
					'teacher_uni_emaildomain' 	=> $row->uni_emaildomain,			
					'teacher_password' 			=> $row->password,
					'teacher_name'     			=> $row->name,
					'teacher_usertype_id'		=> $row->usertype_id,
					'teacher_is_logged_in' 		=> true
				);

				$this->session->set_userdata($teacherdata);
				return TRUE;
		}	
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