<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

	class Tutorregistration_model extends CI_Model{


		function get_checking($name,$email,$phone){
		$this->db->select('*');
		
		$this->db->where('name',$name);
		$this->db->where('email',$email);
		$this->db->where('phone',$phone);
		$query = $this->db->get('tbl_signup');
		
		$result = $query->result();
		return $result;
	}

		function add_data($data){
			$this->db->insert('tbl_signup',$data);
			//echo $this->db->last_query(); die;
			return $this->db->insert_id();
		}

	}
?>