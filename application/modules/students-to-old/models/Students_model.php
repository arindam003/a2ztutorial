<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

	class Students_model extends CI_Model{

	public function insert_googleuser($data){
        $this->db->insert('google_login', $data);

        return $this->db->insert_id();
    }
    public function insert_signupuser($data){
        $this->db->insert('tbl_signup', $data);
        //echo $this->db->last_query(); die; 
        return $this->db->insert_id();
    }


 //    function add_googlesignupid($signup_id){
 //    	$data = array(
 // 			'signup_id' => $signup_id
 //  		);

 //  		 $query = $this->db->insert('google_login',$data);
	// 	 return $query->result_array();
	// }

	function get_googleprofile(){
		$this->db->select('*');
		$this->db->where('usertype_id','1');
		$this->db->order_by('id',"desc");
		$this->db->limit(1);
		$query = $this->db->get('google_login');
		$result = $query->result();
		 return $result;
	}

 
	function get_signup(){
		$this->db->select('*');
		$this->db->where('usertype_id','1');
		$query = $this->db->get('tbl_signup');
		$result = $query->result();
		 return $result;
	}
	 function get_signup_profile($googleid,$googlemail){
		$this->db->select('google_login.id');
		$this->db->select('tbl_signup.*');
		$this->db->select('tbl_signup.id as sign_id');
		$this->db->from('tbl_signup');
		$this->db->join('google_login','tbl_signup.googlelogin_id=google_login.id','INNER');
		$this->db->where('tbl_signup.usertype_id','1');
		
		$this->db->where('tbl_signup.googlelogin_id',$googleid);
		$this->db->where('tbl_signup.email',$googlemail);
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		$result = $query->result();
		return $result;
	}

	// function get_signupprofile($googlemail){
	// 	$this->db->select('*');
	// 	$this->db->where('usertype_id','1');
	// 	$this->db->where('email',$googlemail);
	// 	$query = $this->db->get('tbl_signup');
	// 	$result = $query->result();
	// 	return $result;
	// }


	function mail_check($email){
		$this->db->select('id');
	    $this->db->where('email', $email);
	    //$this->db->where('usertype_id','1');
	    $query = $this->db->get('tbl_signup'); 
		$result = $query->result();
		return $result;
		}


function googlemail_check($email){
		$this->db->select('id');
	    $this->db->where('email', $email);
	    $this->db->where('usertype_id','1');
	    $query = $this->db->get('google_login'); 
		$result = $query->result();
		return $result;
		}
	function add_data($data){
		$this->db->insert('tbl_signup',$data);
		//echo $this->db->last_query(); die;
		return $this->db->insert_id();
	}

		function validate($email,$password){
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('usertype_id','1');
		// $this->db->where('status','1');
		$query = $this->db->get('tbl_signup');
		$row = $query->row();
		//if($usertype_id == '2'){
			if($query->num_rows() > 0){
				$studentdata = array(
					
					'student_id' 		        => $row->id,
					'student_email' 			=> $row->email,			
					'student_password' 			=> $row->password,
					'student_name'     			=> $row->name,
					'student_usertype_id'		=> $row->usertype_id,
					'student_is_logged_in' 		=> true
				);

				$this->session->set_userdata($studentdata);
				return TRUE;
			//}

		}
		
		
		
	}

		function get_profile($id){
			$this->db->select('*');
			$this->db->where('id',$id);
			//$this->db->where('category','Student');
			$query = $this->db->get('tbl_signup');
			$result = $query->result();
			 return $result;
		}

		function get_data($id){
			$this->db->select('*');
			$this->db->where('id',$id);
			//$this->db->where('category','Student');
			$query = $this->db->get('tbl_signup');
			$result = $query->result();
			 return $result;
		}

		function get_profiledata_by_id($slug_name){
			$this->db->select('*');
			$this->db->where('usertype_id','1');
			$this->db->where('slug_name',$slug_name);
			$query = $this->db->get('tbl_signup');
			$result = $query->result();
			return $result;
		}
		function edit_profile($data,$slug_name){
		if(!empty($data))
			{
			 $this->db->where('usertype_id','1');
			 $this->db->where('slug_name',$slug_name);
             $this->db->update('tbl_signup', $data);
			 return $this->db->affected_rows();
			}
		}

		function get_studentdata_by_id($student_id){
			$this->db->select('*');
			$this->db->where('id',$student_id);
			$query =  $this->db->get('tbl_signup');
			//echo $this->db->last_query(); die;
			$result = $query->result();
			return $result;
		}


		public function update_password($student_id,$new_pass){
		    $data = array(
		           'password' => $new_pass
		        );
		    $this->db->where('id', $student_id);
		    $this->db->update('tbl_signup', $data);
		    return true;
		}
		
	
	


	}
?>