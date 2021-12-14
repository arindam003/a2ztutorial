<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Availability_model extends CI_Model{  
   

   function check_availability($teacher_id,$timing_id){
		$this->db->select('*');
		$this->db->where('teacher_id',$teacher_id);
		$this->db->where('timing_id',$timing_id);
		$query = $this->db->get('tbl_days');
		//$this->db->last_query();die;
		$result = $query->result();
		return $result;
	}

	function get_timing(){
		$this->db->select('*');
		$query = $this->db->get('tbl_timing');
		$result = $query->result();
		return $result;
	}

	function get_teacher(){
		$this->db->select('*');
		$this->db->where('usertype_id','3');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_signup');
		$result = $query->result();
		return $result;
	}
	function get_days(){
		$this->db->select('*');
		$query = $this->db->get('tbl_days');
		//echo $this->db->last_query(); die;
		$result = $query->result();
		return $result;
	}


	function add_data($data){
		$this->db->insert('tbl_days',$data);
		return $this->db->insert_id(); 
	}


###################### AVAILABILITY MANAGEMENT ( old table ) ######################
 ###################### tbl_days (mapping) / tbl_timing / tbl_signup ######################

	// multiple table joining 
	public function get_availability(){	
		
		
		$this->db->select('tbl_signup.*'); 
		$this->db->select('tbl_timing.*');
		$this->db->select('tbl_days.*');
		$this->db->from('tbl_days');
		$this->db->join('tbl_signup','tbl_days.teacher_id=tbl_signup.id','INNER');
		$this->db->join('tbl_timing','tbl_days.timing_id=tbl_timing.id','INNER');
		
		 //$this->db->where('tbl_days.status','1');
		// $this->db->where('tbl_days.days_id','desc');

		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		$result = $query->result();
		return $result;
	 }
 // 	 function get_availability(){
	// 	$this->db->select('*');
	// 	$query = $this->db->get('tbl_days');
	// 	$result = $query->result();
	// 	return $result;
	// }
	


	function get_data_by_id($id){
		$this->db->select('*');
		$this->db->where('days_id',$id);
		$query = $this->db->get('tbl_days');
		$result = $query->result();
		return $result;

	}
	function edit_data($data,$id){
		if(!empty($data))
			{
			 $this->db->where('days_id',$id);
             $this->db->update('tbl_days', $data);
             //echo $this->db->last_query(); die;
			 return $this->db->affected_rows();
			}
		}

		public function delete_row_data($id) {
	      $this->db->where('days_id', $id);
	      $this->db->delete('tbl_days');
	    } 
}
?>