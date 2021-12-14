<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Teacher_model extends CI_Model{

	// function mail_check($email,$usertype_id){
	// 		$this->db->select('id');
	// 	    $this->db->where('email', $email);
	// 	    $this->db->where('usertype_id', $usertype_id);
	// 	    $query = $this->db->get('tbl_signup');
	// 	    if($usertype_id == '1'){
	// 			$result = $query->result();
	// 			return $result;
	// 		}elseif($usertype_id == '2'){
	// 			$result = $query->result();
	// 			return $result;

	// 		}else{
	// 			$result = $query->result();
	// 			return $result;
	// 		}
	// 	}
   
	
	function get_data(){
		$this->db->select('*');
		$this->db->where('usertype_id','3');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_signup');
		$result = $query->result();
		return $result;

	}
	function add_data($data){
		$this->db->insert('tbl_signup',$data);
		//echo $this->db->last_query(); die;
		return $this->db->insert_id(); 

	}

	// function get_data_by_id($id){
	// 	$this->db->select('tbl_university.*');
	// 	$this->db->select('tbl_signup.*');
	// 	$this->db->from('tbl_signup');
	// 	$this->db->join('tbl_university','tbl_signup.university=tbl_university.id','INNER');
	// 	 $this->db->where('tbl_signup.id',$id);
	// 	$query = $this->db->get();
	// 	$result = $query->result();

	// 	return $result;
	// }

	function searching_uni_domainmail($university_id){
		$this->db->select('*');
		$this->db->where('university_id',$university_id);
		$query = $this->db->get('tbl_uni_emaildomain');
		$result = $query->result();
		return $result;

	}
	

	function get_data_by_id($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_signup');
		$result = $query->result();

		return $result;
	}
	function edit_teacher($data,$id){
		if(!empty($data)){   
		$this->db->where('id',$id);
		$this->db->update('tbl_signup',$data);
		//echo $this->db->last_query(); die;
        return $this->db->affected_rows();
		}
	}
	function get_university(){
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_university');
		$result = $query->result();
		return $result;

	}
	function get_subjects(){
		$this->db->select('*');
		$query = $this->db->get('tbl_subjects');
		$result = $query->result();
		return $result;
	}
	function get_subject_offered(){
		$this->db->select('*');
		$query = $this->db->get('tbl_subjects');
		$result = $query->result();
		return $result;
	}
	

	public function download($id){
		$query = $this->db->get_where('tbl_signup',array('id'=>$id));
		$result = $query->result();
		return $result;
		//return $query->row_array();
	}

	public function delete_row_data($id) {
	      $this->db->where('id', $id);
	      $this->db->delete('tbl_signup');
	    } 



		
}
?>