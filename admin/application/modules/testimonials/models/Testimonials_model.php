<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Testimonials_model extends CI_Model{
   
	

function get_data(){
	$this->db->select('tbl_testimonials.*');
	$this->db->select('tbl_testimonials.id as test_id');
	$this->db->select('tbl_testimonials.rating as test_rating');
	$this->db->select('tbl_signup.*');
	$this->db->select('tbl_signup.id as sign_id');
	$this->db->select('tbl_signup.name as sign_name');
	$this->db->select('tbl_usertype.*');
	$this->db->from('tbl_testimonials');
	$this->db->join('tbl_signup', 'tbl_testimonials.sender_id = tbl_signup.id', 'INNER'); 
	$this->db->join('tbl_usertype', 'tbl_signup.usertype_id=tbl_usertype.type_id', 'INNER');
	$this->db->order_by('tbl_testimonials.id', 'desc'); 
	$query = $this->db->get();
	//echo $this->db->last_query(); die;
	$result = $query->result();
	return $result;

}


function view_testimonials($test_id){
	$this->db->select('tbl_signup.*,tbl_signup.image_src as signup_image');
	$this->db->select('tbl_testimonials.*,tbl_testimonials.image_src as test_img');
    $this->db->select('tbl_signup.name as sign_name');
	$this->db->select('tbl_usertype.*');
    $this->db->select('tbl_subjects.*');
	$this->db->select('tbl_subjects.name as sub_name');
	$this->db->select('tbl_levels.*');
	$this->db->select('tbl_levels.name as lev_name');
	$this->db->from('tbl_testimonials');
	$this->db->join('tbl_signup', 'tbl_testimonials.sender_id = tbl_signup.id', 'INNER'); 
	$this->db->join('tbl_usertype', 'tbl_signup.usertype_id=tbl_usertype.type_id', 'INNER'); 
	$this->db->join('tbl_subjects', 'tbl_testimonials.subjects_id=tbl_subjects.id', 'INNER');
	$this->db->join('tbl_levels', 'tbl_testimonials.levels_id=tbl_levels.id', 'INNER');

	$this->db->where('tbl_testimonials.id',$test_id);
	$query = $this->db->get();
	//echo $this->db->last_query(); die;
	$result = $query->result();
	return $result;

}


// update
	function edit_data($data,$id){
		if(!empty($data)){
			 $this->db->where('id',$id);
             $query =$this->db->update('tbl_testimonials', $data);
             //echo $this->db->last_query(); die;

			 return $this->db->affected_rows();
			}
	}

	
	function teacher_testimonials(){
		$this->db->select('*');
		$this->db->where('usertype_id','3');
		$query = $this->db->get('tbl_signup');
		$result = $query->result();
		return $result;
	}


	
	function add_data($data){
		$this->db->insert('tbl_testimonials',$data);
		//echo $this->db->last_query(); die;
		return $this->db->insert_id(); 
	}

	function get_usertype(){
		$this->db->select('*');
		$query = $this->db->get('tbl_usertype');
		$result = $query->result();
		return $result;
	}
	function get_teacher(){
		$this->db->select('*');
		$query = $this->db->get('tbl_signup');
		$result = $query->result();
		return $result;

	}
	function get_subject(){
		$this->db->select('*');
		$query = $this->db->get('tbl_subjects');
		$result = $query->result();
		return $result;
	}
	function get_level(){
		$this->db->select('*');
		$query = $this->db->get('tbl_levels');
		$result = $query->result();
		return $result;
	}

function searching_testimonialsname($usertype_id){
		$this->db->select('*');
		$this->db->where('usertype_id', $usertype_id);
		$query = $this->db->get('tbl_signup');
		$result = $query->result();
		return $result;
	}

function getUserImage($userid){
		$this->db->select('*');
		$this->db->where('id', $userid);
		$query = $this->db->get('tbl_signup');
		$result = $query->result();
		return $result;
	}	
function searching_subjectwiseteacher($subjects_id){
	$this->db->select('tbl_subjects.*');
	$this->db->select('tbl_subjects.id as sub_id');
	$this->db->select('tbl_qualifications.*,');
	$this->db->select('tbl_signup.*');
	$this->db->select('tbl_signup.id as sign_id');
	$this->db->from('tbl_subjects');
	$this->db->join('tbl_qualifications', 'tbl_subjects.id = tbl_qualifications.subject_id', 'INNER'); 
	$this->db->join('tbl_signup', 'tbl_qualifications.teacher_id = tbl_signup.id', 'INNER'); 
	$this->db->where('tbl_subjects.id',$subjects_id);
	$query = $this->db->get();
	$result = $query->result();
	return $result;
}





	public function delete_row_data($id) {
      $this->db->where('id', $id);
      $this->db->delete('tbl_testimonials');
    } 
}
?>