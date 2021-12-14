<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Days_model extends CI_Model{  
   
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
		$query = $this->db->get('tbl_dayname');
		//echo $this->db->last_query(); die;
		$result = $query->result();
		return $result;
	}

###################### DAYS MANAGEMENT ( new table)##################################
	
###################### tbl_dayname / tbl_timing /tbl_signup /tbl_availability ( mapping )###########


	function check_availability($teacher_id,$timing_id,$dayname_id){
		$this->db->select('*');
		
		$this->db->where('teacher_id',$teacher_id);
		$this->db->where('timing_id',$timing_id);
		$this->db->where('dayname_id',$dayname_id);
		$query = $this->db->get('tbl_availability');
		
		$result = $query->result();
		return $result;
	}


	function add_data($data){
		$this->db->insert('tbl_availability',$data);
		return $this->db->insert_id(); 
	}





	// multiple table joining 
	public function get_availability(){	
		
		
		$this->db->select('tbl_signup.name'); 
		$this->db->select('tbl_timing.timing');
		$this->db->select('tbl_dayname.days_name');
		$this->db->select('tbl_availability.id as avail_id');
		$this->db->select('tbl_availability.added_on');
		
		
		$this->db->from('tbl_availability');
		$this->db->join('tbl_signup','tbl_availability.teacher_id=tbl_signup.id','INNER');
		$this->db->join('tbl_timing','tbl_availability.timing_id=tbl_timing.id','INNER');
		$this->db->join('tbl_dayname','tbl_availability.dayname_id=tbl_dayname.id','INNER');
		
		$this->db->where('tbl_availability.status','1');
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		$result = $query->result();
		return $result;
	 }

	



	 public function update_data($data,$id) {
		if(!empty($data))
			{
      	$this->db->where('id', $id);

     	$this->db->update('tbl_availability',$data);
	  	return $this->db->affected_rows();
    	} 
	}

		public function delete_row_data($id) {
	      $this->db->where('id',$id);
	      $this->db->delete('tbl_availability');
	    } 
}
?>