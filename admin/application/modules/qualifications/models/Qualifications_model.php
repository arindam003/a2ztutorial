<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Qualifications_model extends CI_Model{
   
	
	function add_data($data){
		
		$this->db->insert('tbl_qualifications',$data);
		return $this->db->insert_id(); 
	}


// tbl_qualifications table respectively multiple table joining
	
public function get_data(){	
	$this->db->select('tbl_signup.*');
	$this->db->select('tbl_signup.name AS teacher_name');
	$this->db->select('tbl_subjects.name AS subject_name');
	$this->db->select('tbl_levels.name AS levels_name');
	$this->db->select('tbl_qualifications.*'); 
	$this->db->select('tbl_qualifications.qua_id');
	$this->db->select('tbl_qualifications.added_on AS date');
	$this->db->from('tbl_qualifications'); 
	$this->db->join('tbl_signup', 'tbl_qualifications.teacher_id = tbl_signup.id', 'INNER');
	$this->db->join('tbl_subjects', 'tbl_qualifications.subject_id = tbl_subjects.id', 'INNER');
	$this->db->join('tbl_levels', 'tbl_qualifications.levels_id = tbl_levels.id', 'INNER');
	$this->db->where('tbl_signup.usertype_id','3');
	//$this->db->where('tbl_qualifications.status','1');
	$this->db->order_by('tbl_qualifications.qua_id','desc');
	$query = $this->db->get();
	return $query->result();

	}


	// function check_qualifications($teacher_id,$subject_id,$levels_id,$grade_id){
	function check_qualifications($teacher_id,$subject_id,$levels_id){
		$this->db->select('*');
		$this->db->where('teacher_id',$teacher_id);
		$this->db->where('subject_id',$subject_id);
		$this->db->where('levels_id',$levels_id);
		// $this->db->where('grade_id',$grade_id);
		$query = $this->db->get('tbl_qualifications');
		$result = $query->result();
		return $result;
	}

	function get_data_by_id($id){
		$this->db->select('*');
		$this->db->where('qua_id',$id);
		$query = $this->db->get('tbl_qualifications');
		$result = $query->result();
		return $result;

	}
	function edit_data($data,$id){
		if(!empty($data))
			{
			 $this->db->where('qua_id',$id);
             $this->db->update('tbl_qualifications', $data);
             //echo $this->db->last_query(); die;
			 return $this->db->affected_rows();
			}
		}


	function get_subjects(){
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_subjects');
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


	function get_levels(){
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_levels');
		$result = $query->result();
		return $result;
	}

	function get_grade(){
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_grade');
		$result = $query->result();
		return $result;
	}

	public function delete_row_data($id) {
	      $this->db->where('qua_id', $id);
	      $this->db->delete('tbl_qualifications');
	    } 


	// update data (delete only browser...but have to database )display if active 
	public function update_data($data,$id) {
		if(!empty($data))
			{
      	$this->db->where('qua_id', $id);

     	$this->db->update('tbl_qualifications',$data);
     	//echo $this->db->last_query(); die;
	  	return $this->db->affected_rows();
    	} 
	}



	// public function delete_data($id) {
 //      $this->db->where('qua_id', $id);
 //      $this->db->where('status', '1');
 //      $this->db->update('tbl_qualifications');
	//   return $this->db->affected_rows();
 //    } 
	
	
	
	
	

	




		
}
?>