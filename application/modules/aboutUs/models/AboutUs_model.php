<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

	class AboutUs_model extends CI_Model{

		function get_about(){
			$this->db->select('*');
			$this->db->where('page_slug','About Us');
			$query = $this->db->get('pages_mng');
			$result = $query->result();
			return $result;

		}
		
		// function get_ourteam(){
		//     $this->db->select('*');
	 //        $query = $this->db->get('tbl_ourteam');
		//     $result = $query->result();
	 //        return $result;
  //     	}
      	function get_ourteam($limit,$offset){
		$this->db->limit($limit,$offset);
	    $query = $this->db->get('tbl_ourteam');
	    $result = $query->result();
	    return $result;
   }
   public function num_rows(){
   		$query = $this->db->get('tbl_ourteam');
   		$result = $query->num_rows();
    	return $result;
   }

		

	}
?>