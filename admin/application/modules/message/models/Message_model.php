<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Message_model extends CI_Model{


	function get_user(){
		$this->db->select('*');
		$category= array('1','2');
		$this->db->or_where_in('usertype_id', $category);
		$query = $this->db->get('tbl_signup');
		$result = $query->result();
		return $result;
	}
	function get_teacher(){
		$this->db->select('*');
		$this->db->where('usertype_id', '3');
		$query = $this->db->get('tbl_signup');
		//echo $this->db->last_query(); die;
		$result = $query->result();
		return $result;

	}
	function get_message_data(){
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_message');
		//echo $this->db->last_query(); die;
		$result = $query->result();
		return $result;
	}
   
	function add_message($data){
		$this->db->insert('tbl_message',$data);
		return $this->db->insert_id(); 
	}

	// function get_teacher_data(){
	// 	$this->db->select('*');
	// 	$this->db->where('category', 'Teacher');
	// 	$query = $this->db->get('tbl_signup');
	// 	$result = $query->result();
	// 	return $result;
	// }



	// function get_teacher_data($teacher_id){
	// 	$this->db->select('tbl_signup.id');
	// 	$this->db->select('tbl_signup.name as teacher_name');
	// 	$this->db->select('tbl_message.message');
	// 	$this->db->select('tbl_message.teacher_id');
	// 	$this->db->from('tbl_message'); 
	// 	$this->db->join('tbl_signup', 'tbl_message.teacher_id = tbl_signup.id', 'INNER');
	// 	$this->db->where('tbl_message.teacher_id', $teacher_id);
	// 	$query = $this->db->get();
	// 	//echo $this->db->last_query(); die;
	// 	$result = $query->result();
	// 	return $result;

	// }
	// function get_user_data(){
	// 	$this->db->select('tbl_signup.name as user_name');
	// 	$this->db->from('tbl_message'); 
	// 	$this->db->join('tbl_signup', 'tbl_message.user_id = tbl_signup.id', 'INNER');
	// 	$query = $this->db->get();
	// 	$result = $query->result();
	// 	return $result;

	// }
	

		public function delete_row_data($id) {
	      $this->db->where('id', $id);
	      $this->db->delete('tbl_message');
	    } 
}
?>