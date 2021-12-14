<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

	class Message_model extends CI_Model{

		function add_data($data){

		$this->db->insert('tbl_message',$data);

		//echo $this->db->last_query(); die;

		return $this->db->insert_id();

	}

	function get_user($userid){
		$this->db->select('*');
		$this->db->where('id',$userid);
		$query = $this->db->get('tbl_signup');
		$result = $query->result();
		return $result;
	}	

		
}
?>