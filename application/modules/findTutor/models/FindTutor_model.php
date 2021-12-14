<?php
	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}

	class FindTutor_model extends CI_Model{

		
############################# total search ##############################		
		
		function searching($sub_id,$lev_id,$gender){
			
			$this->db->select('tbl_signup.*');
			$this->db->select('tbl_signup.name AS teacher_name');
			$this->db->select('tbl_signup.id as sign_id');
			$this->db->from('tbl_qualifications AS qua');
			$this->db->join('tbl_signup', 'qua.teacher_id = tbl_signup.id', 'INNER');
			$this->db->where('qua.subject_id',$sub_id);
			$this->db->where('qua.levels_id',$lev_id);
			$this->db->where('tbl_signup.gender',$gender);
			$query = $this->db->get();
			//echo  $this->db->last_query(); die;
			$result = $query->result();
			return $result;
		 }
############################# search by gender ##############################
function gender_searching($gender){
      $this->db->select('tbl_signup.*');
      $this->db->select('tbl_signup.name AS teacher_name');
      $this->db->from('tbl_signup');
      $this->db->where('tbl_signup.usertype_id','3');
      $this->db->where('tbl_signup.gender',$gender);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
     }
############################# search by subject ##############################
function subject_searching($sub_id){
	
	$this->db->select('tbl_signup.*');
	$this->db->select('tbl_signup.name AS teacher_name');
	$this->db->select('tbl_signup.id as sign_id');
	$this->db->from('tbl_subject_map AS qua');
	$this->db->join('tbl_signup', 'qua.teacher_id = tbl_signup.id', 'INNER');
	$this->db->where('qua.subject_id',$sub_id);
	$query = $this->db->get();
	//echo  $this->db->last_query(); die;
	$result = $query->result();
	return $result;
 }	
############################# search by level ##############################



// repeat data
		 function level_searching($lev_id){
			
			$this->db->select('tbl_signup.*');
			$this->db->select('tbl_signup.name AS teacher_name');
			//$this->db->select('tbl_levels.*');
			//$this->db->select('tbl_qualifications.*');
			$this->db->from('tbl_qualifications');
			$this->db->join('tbl_signup', 'tbl_qualifications.teacher_id = tbl_signup.id', 'INNER');
			//$this->db->join('tbl_levels', 'tbl_qualifications.levels_id = tbl_levels.id', 'INNER');
			$this->db->where('tbl_qualifications.levels_id',$lev_id);
			//$this->db->where('tbl_levels.id',$lev_id);
			$query = $this->db->get();
			//echo  $this->db->last_query(); die;
			$result = $query->result();
			return $result;
		 }







		 // old
		// function level_searching($lev_id){
			
		// 	$this->db->select('*');
		// 	$this->db->from('tbl_qualifications');
		// 	$this->db->join('tbl_signup', 'tbl_qualifications.teacher_id = tbl_signup.id', 'INNER');
		// 	//$this->db->where('qua.subject_id',$sub_id);
		// 	$this->db->where('tbl_qualifications.levels_id',$lev_id);
		// 	//$this->db->where('tbl_signup.gender',$gender);
		// 	$query = $this->db->get('tbl_qualifications');
		// 	echo  $this->db->last_query(); die;
		// 	$result = $query->result();
		// 	return $result;
		//  }
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
	$this->db->where('status','1');
	$this->db->order_by('id','desc');
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