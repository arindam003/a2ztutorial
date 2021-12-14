<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

	class FindTutor_model extends CI_Model{

		
		// function get_findTutor(){
		// 	$this->db->select('*');
		// 	$this->db->where('usertype_id','3');
		// 	$this->db->order_by('id','desc');
		// 	$query = $this->db->get('tbl_signup');
		// 	$result = $query->result();
		// 	return $result;
		// }

		
		function searching($sub_id,$lev_id){
			
			$this->db->select('tbl_signup.*');
			$this->db->select('tbl_signup.id as sign_id');
			$this->db->select('tbl_usertype.*'); //*
		 	$this->db->select('tbl_subjects.id');
			$this->db->select('tbl_levels.id');
			$this->db->from('tbl_qualifications AS qua');
			$this->db->join('tbl_signup', 'qua.teacher_id = tbl_signup.id', 'INNER');
			$this->db->join('tbl_usertype', 'tbl_signup.usertype_id = tbl_usertype.type_id', 'INNER');//*
			$this->db->join('tbl_levels', 'qua.levels_id = tbl_levels.id', 'INNER');
			$this->db->join('tbl_subjects', 'qua.subject_id = tbl_subjects.id', 'INNER');
			
			$this->db->where('qua.subject_id',$sub_id);
			$this->db->or_where('qua.levels_id',$lev_id);
			// $this->db->or_where('tbl_signup.gender',$gender);

			$this->db->like('qua.subject_id', '%$sub_id%');
			$this->db->or_like('qua.levels_id', '%$lev_id%');
			$this->db->or_like('tbl_signup.gender', '%$gender%');

			$query = $this->db->get();
			//echo  $this->db->last_query(); die;
			$result = $query->result();
			return $result;
		 }

		function searching_gender($gender){
			
			$this->db->select('tbl_signup.*');
			$this->db->select('tbl_signup.id as sign_id');
			$this->db->select('tbl_subjects.id');
			$this->db->select('tbl_levels.id');
			$this->db->from('tbl_qualifications AS qua');
			$this->db->join('tbl_signup', 'qua.teacher_id = tbl_signup.id', 'INNER');
			$this->db->join('tbl_levels', 'qua.levels_id = tbl_levels.id', 'INNER');
			$this->db->join('tbl_subjects', 'qua.subject_id = tbl_subjects.id', 'INNER');
			$this->db->where('usertype_id','3');
			$this->db->where('tbl_signup.gender',$gender);	 // alternate gender
			//$this->db->or_where('tbl_signup.gender',$gender); // both gender
			
			$query = $this->db->get(); 

			//echo  $this->db->last_query(); die;
			$result = $query->result();
			return $result;
			
		}
 

	function searching_timing($timing){

		$this->db->select('tbl_signup.*'); 
		$this->db->select('tbl_signup.id as sign_id');
		$this->db->select('tbl_timing.timing');
	    
		$this->db->from('tbl_days');
		$this->db->join('tbl_signup','tbl_days.teacher_id=tbl_signup.id','INNER');
		$this->db->join('tbl_timing','tbl_days.timing_id=tbl_timing.id','INNER');
		$this->db->where('tbl_days.status','1');

		$this->db->where('tbl_days.timing_id',$timing);
		//$this->db->like('tbl_days.timing_id', '%$timing%');
		$query = $this->db->get();
		$result = $query->result();
		return $result;


	}

	function searching_days($days){

		$this->db->select('tbl_signup.*'); 
		$this->db->select('tbl_signup.id as sign_id');
		$this->db->select('tbl_timing.timing');
		$this->db->select('tbl_dayname.days_name');
		//$this->db->select('tbl_availability.id as avail_id');
	    
		$this->db->from('tbl_availability');
		$this->db->join('tbl_signup','tbl_availability.teacher_id=tbl_signup.id','INNER');
		$this->db->join('tbl_timing','tbl_availability.timing_id=tbl_timing.id','INNER');
		$this->db->join('tbl_dayname','tbl_availability.dayname_id=tbl_dayname.id','INNER');
		$this->db->where('tbl_availability.status','1');
		$this->db->where('tbl_availability.dayname_id',$days);
		
		//$this->db->like('tbl_availability.dayname_id', '%$days%');
		$query = $this->db->get();
		
		//echo  $this->db->last_query(); die;
		$result = $query->result();
		return $result;
	}

		
		function get_allteacher($limit,$offset){
			$this->db->select('*');
			$this->db->where('usertype_id','3');
			// $this->db->order_by('id','desc');
			$this->db->limit($limit,$offset);
		    $query = $this->db->get('tbl_signup');
		    //echo  $this->db->last_query(); die;
		    $result = $query->result();
		    return $result;
   		}


   		public function num_rows(){
   			$this->db->select('*');
			 $this->db->where('usertype_id','3');
	   		$query = $this->db->get('tbl_signup');
	   		$result = $query->num_rows();
	   		
	    	return $result;
   		}

   		public function get_subjects(){
   			$this->db->select('*');
   			$this->db->where('status','1');
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
		public function get_timing(){
   			$this->db->select('*');
   			$this->db->where('status','1');
   			$query = $this->db->get('tbl_timing');
   			$result = $query->result();
   			return $result;
		}
		public function get_pages(){
   			$this->db->select('*');
   			$this->db->where('status','1');
   			$this->db->where('page_slug','Findtutor');
   			$query = $this->db->get('pages_mng');
   			$result = $query->result();
   			return $result;
		}
		

	}
?>