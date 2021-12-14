<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

	class Profile_model extends CI_Model{

		function add_data($data){
			$this->db->insert('tbl_message',$data);
			//echo $this->db->last_query(); die;
			return $this->db->insert_id();
		}
		
		function get_profile($slugname){
			$this->db->select('*');
			$this->db->where('usertype_id','3');
			$this->db->where('slug_name',$slugname);
			//$this->db->where('slug_name',$slugname);
			$query = $this->db->get('tbl_signup');
			//echo $this->db->last_query(); die;
			$result = $query->result();
			 return $result;
		}

	public function get_qualification($slugname){	

			$this->db->select('tbl_signup.name AS teacher_name');
			$this->db->select('tbl_subjects.name AS subject_name');
			$this->db->select('tbl_levels.name AS levels_name');
			$this->db->select('tbl_grade.name AS grade_name');
			$this->db->select('tbl_qualifications.added_on AS date');
			$this->db->select('tbl_qualifications.qua_id');
			$this->db->select('tbl_qualifications.price');
			//$this->db->order_by('tbl_qualifications.id','desc');
			$this->db->from('tbl_qualifications'); 
			$this->db->join('tbl_signup', 'tbl_qualifications.teacher_id = tbl_signup.id', 'INNER');
			$this->db->join('tbl_subjects', 'tbl_qualifications.subject_id = tbl_subjects.id', 'INNER');
			$this->db->join('tbl_levels', 'tbl_qualifications.levels_id = tbl_levels.id', 'INNER');
			$this->db->join('tbl_grade', 'tbl_qualifications.grade_id = tbl_grade.id', 'INNER');
			$this->db->where('tbl_signup.slug_name',$slugname);
			$this->db->where('tbl_qualifications.status','1');
			$query = $this->db->get();
			return $query->result();
	}



###################### AVAILABILITY MANAGEMENT ( old table ) ######################
 ###################### tbl_days (mapping) / tbl_timing / tbl_signup ######################

	public function get_availability($slugname){	
		
		
		$this->db->select('tbl_signup.name'); 
		$this->db->select('tbl_timing.timing');
		$this->db->select('tbl_days.mon');
		$this->db->select('tbl_days.tue');
		$this->db->select('tbl_days.wed');
		$this->db->select('tbl_days.thu');
		$this->db->select('tbl_days.fri');
		$this->db->select('tbl_days.sat');
		$this->db->select('tbl_days.sun');
		$this->db->select('tbl_days.days_id');
		$this->db->from('tbl_days');
		$this->db->join('tbl_signup','tbl_days.teacher_id=tbl_signup.id','INNER');
		$this->db->join('tbl_timing','tbl_days.timing_id=tbl_timing.id','INNER');
		
		$this->db->where('tbl_days.status','1');
		$this->db->where('tbl_signup.slug_name',$slugname);
		

		$query = $this->db->get();
		$result = $query->result();
		return $result;
	 }

	// public function get_availability($id){	
	// 	$this->db->select('tbl_signup.name'); 
	// 	$this->db->select('tbl_timing.timing');
	// 	$this->db->select('tbl_dayname.days_name');
	// 	$this->db->select('tbl_availability.id as avail_id');
	// 	$this->db->select('tbl_availability.added_on');
		
		
	// 	$this->db->from('tbl_availability');
	// 	$this->db->join('tbl_signup','tbl_availability.teacher_id=tbl_signup.id','INNER');
	// 	$this->db->join('tbl_timing','tbl_availability.timing_id=tbl_timing.id','INNER');
	// 	$this->db->join('tbl_dayname','tbl_availability.dayname_id=tbl_dayname.id','INNER');
		
	// 	$this->db->where('tbl_availability.status','1');
		
	// 	$this->db->where('tbl_signup.id',$id);
		
	// 	$query = $this->db->get();
	// 	//echo $this->db->last_query(); die;
	// 	$result = $query->result();
	// 	return $result;
	//  }
		
		
		

	}
?>