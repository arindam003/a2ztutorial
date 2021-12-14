<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	
	
	// function validate($email,$password,$usertype_id){
		
	// 	$this->db->where('email', $email);
	// 	$this->db->where('password', $password);
	// 	$this->db->where('usertype_id', $usertype_id);

	// 	$query = $this->db->get('tbl_signup');
	// 	$row = $query->row();
	// 	if($usertype_id == '3'){


	// 		if($query->num_rows() > 0){
	// 			////***key/ variable name => field name

	// 			$teacherdata = array(
	// 				//'user_id'  			=> $row->uid,
	// 				'teacher_id' 		        => $row->id,
	// 				'teacher_email' 			=> $row->email,			
	// 				'teacher_password' 			=> $row->password,
	// 				'teacher_name'     			=> $row->name,
	// 				'teacher_usertype_id'		=> $row->usertype_id,
	// 				'teacher_is_logged_in' 		=> true
	// 			);

	// 			$this->session->set_userdata($teacherdata);

	// 			return TRUE;
	// 		}

	// 	}elseif($usertype_id == '1'){


	// 		if($query->num_rows() > 0){
	// 			////*** variable name => field name

	// 			$studentdata = array(
	// 				//'user_id'  			=> $row->uid,
	// 				'student_id' 		        => $row->id,
	// 				'student_email' 			=> $row->email,			
	// 				'student_password' 			=> $row->password,
	// 				'student_name'     			=> $row->name,
	// 				'student_usertype_id'		=> $row->usertype_id,
	// 				'student_is_logged_in' 		=> true
	// 			);

	// 			$this->session->set_userdata($studentdata);

				
	// 			return TRUE;
	// 		}

	// 	}else{
	// 		if($query->num_rows() > 0){
	// 			////*** variable name => field name

	// 			$parentdata = array(
	// 				//'user_id'  			=> $row->uid,
	// 				'parent_id' 		        => $row->id,
	// 				'parent_email' 				=> $row->email,			
	// 				'parent_password' 			=> $row->password,
	// 				'parent_name'     			=> $row->name,
	// 				'parent_usertype_id'		=> $row->usertype_id,
	// 				'parent_is_logged_in' 		=> true
	// 			);

	// 			$this->session->set_userdata($parentdata);

				
	// 			return TRUE;
	// 		}
	// 	}

	// }


				
}
?>