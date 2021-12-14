<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

	class Signup_model extends CI_Model{

		function mail_check($email,$usertype_id){
			$this->db->select('id');
		    $this->db->where('email', $email);
		    $this->db->where('usertype_id', $usertype_id);
		    $query = $this->db->get('tbl_signup');
		    if($usertype_id == '1'){
				$result = $query->result();
				return $result;
			}elseif($usertype_id == '2'){
				$result = $query->result();
				return $result;

			}else{
				$result = $query->result();
				return $result;
			}
		}







		function add_data($data){
			$this->db->insert('tbl_signup',$data);
			return $this->db->insert_id();
		}
		function get_usertype(){
		$this->db->select('*');
		$query = $this->db->get('tbl_usertype');
		//echo $this->db->last_query(); die;
		$result = $query->result();
		return $result;

		}

	}
?>