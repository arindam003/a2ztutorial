<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

	class MenuSubject_model extends CI_Model{




		public function get_menuSubject($slugname,$limit,$offset){
		$this->db->select('tbl_signup.*');	
		$this->db->select('tbl_signup.name AS teacher_name');
		
		$this->db->from('tbl_subject_map'); 
		$this->db->join('tbl_subjects', 'tbl_subject_map.subject_id = tbl_subjects.id', 'INNER');
		$this->db->join('tbl_signup', 'tbl_subject_map.teacher_id = tbl_signup.id', 'INNER');
		$this->db->where('tbl_signup.usertype_id','3');
		$this->db->where('tbl_subjects.subject_slugname',$slugname);
		$this->db->order_by('tbl_subject_map.map_id','desc');
		$this->db->limit($limit,$offset);
		$query = $this->db->get();
		//$this->db->last_query();
		return $query->result();

	}

	public function menu_num_rows($slugname){
		$this->db->select('tbl_signup.*');	
		$this->db->select('tbl_signup.name AS teacher_name');
		$this->db->select('tbl_subjects.name AS subject_name');
		$this->db->select('tbl_subject_map.*');
		$this->db->from('tbl_subject_map'); 
		$this->db->join('tbl_subjects', 'tbl_subject_map.subject_id = tbl_subjects.id', 'INNER');
		$this->db->join('tbl_signup', 'tbl_subject_map.teacher_id = tbl_signup.id', 'INNER');
		$this->db->where('tbl_signup.usertype_id','3');
		$this->db->where('tbl_subjects.subject_slugname',$slugname);
		$this->db->order_by('tbl_subject_map.map_id','desc');
		
		$query = $this->db->get();
		$result = $query->num_rows();
		//echo  $this->db->last_query(); die;

		return $result;

	}
	

		

	}
?>