<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

	class Contact_model extends CI_Model{

		function add_data($data){
			$this->db->insert('tbl_contact',$data);
			return $this->db->insert_id();
		}

	}
?>