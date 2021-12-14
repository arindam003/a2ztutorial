<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

	class Findmetutor_model extends CI_Model{

      public function add_data($data){

        $this->db->insert('tbl_findeme',$data);
       // echo $this->db->last_query(); die;
         return $this->db->insert_id();
      }

		
		public function get_allsubject(){
			$this->db->select('*');
			$this->db->where('popular_subjects','0');
			$query = $this->db->get('tbl_subjects');
			$result = $query->result();
			return $result;
		}

		public function get_popularsubject(){
			$this->db->select('*');
			$this->db->where('popular_subjects','1');
			$query = $this->db->get('tbl_subjects');
			$result = $query->result();
			return $result;
		}

      public function get_levels(){
			$this->db->select('*');
			$this->db->where('status','1');
			$query = $this->db->get('tbl_levels');
			$result = $query->result();
			return $result;
		}
      public function get_goal(){
         $this->db->select('*');
         $this->db->where('status','1');
         $query = $this->db->get('tbl_goal');
         $result = $query->result();
         return $result;
      }
      public function get_lessons(){
         $this->db->select('*');
         $this->db->where('status','1');
         $query = $this->db->get('tbl_lessons');
         $result = $query->result();
         return $result;
      }
      public function get_spend(){
         $this->db->select('*');
         $this->db->where('status','1');
         $query = $this->db->get('tbl_spend');
         $result = $query->result();
         return $result;
      }

      

	

	}
?>