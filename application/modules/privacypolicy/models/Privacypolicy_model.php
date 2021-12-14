<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

	class Privacypolicy_model extends CI_Model{

		function get_Privacypolicy(){
			$this->db->select('*');
			$this->db->where('page_slug','privacypolicy');
			$query = $this->db->get('pages_mng');
			$result = $query->result();
			return $result;

		}
		

		

	}
?>