<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

	class Terms_model extends CI_Model{

		function get_tnc(){
			$this->db->select('*');
			$this->db->where('page_slug','terms');
			$query = $this->db->get('pages_mng');
			$result = $query->result();
			return $result;

		}
		

		

	}
?>