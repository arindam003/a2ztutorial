<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

	class How_it_works_model extends CI_Model{

		function get_works(){
			$this->db->select('*');
			$this->db->where('page_slug','How-it-work');
			$query = $this->db->get('pages_mng');
			$result = $query->result();
			return $result;

		}
		function get_works2(){
			$this->db->select('*');
			$this->db->where('status','1');
			$query = $this->db->get('tbl_how_it_works');
			$result = $query->result();
			return $result;
		}

		
		
		

	}
?>