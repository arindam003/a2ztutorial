<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Faq_model extends CI_Model{
   
	
	function get_data(){
		$this->db->select('*');
		$query = $this->db->get('tbl_faq');
		$result = $query->result();
		return $result;

	}

	// function get_data(){
	// 	$this->db->select('tbl_faq_topics.*');
	// 	$this->db->select('tbl_faq.*');
	// 	$this->db->from('tbl_faq');
	// 	$this->db->join('tbl_faq_topics', 'tbl_faq.faq_id = tbl_faq_topics.id', 'INNER'); 
	// 	$query = $this->db->get();
	// 	//echo $this->db->last_query(); die;
	// 	$result = $query->result();
	// 	return $result;
	// }

	function get_faqtopics(){
		$this->db->select('*');
		$query = $this->db->get('tbl_faq_topics');

		$result = $query->result();
		return $result;
	}
	function add_faq($data){
		$this->db->insert('tbl_faq',$data);
		//echo $this->db->last_query(); die;
		return $this->db->insert_id(); 
	}

	function get_data_by_id($id){
		$this->db->select('*');
		$this->db->where('faq_id',$id);
		$query = $this->db->get('tbl_faq');
		$result = $query->result();
		return $result;

	}
	function edit_faq($data,$id){
		if(!empty($data))
			{
			 $this->db->where('faq_id',$id);
			 // $this->db->set($data);
             $this->db->update('tbl_faq', $data);
             //echo $this->db->last_query(); die;
			 return $this->db->affected_rows();
			}
		}
	function view_faq($id){
		$this->db->select('tbl_faq_topics.*');
		$this->db->select('tbl_faq.*');
		$this->db->from('tbl_faq_topics');
		$this->db->join('tbl_faq', 'tbl_faq_topics.id = tbl_faq.faq_id', 'INNER'); 
		$this->db->where('tbl_faq.faq_id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		$result = $query->result();
		return $result;

	}

		public function delete_row_data($id) {
	      $this->db->where('faq_id', $id);
	      $this->db->delete('tbl_faq');
	    } 
}
?>