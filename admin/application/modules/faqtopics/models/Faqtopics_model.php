<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Faqtopics_model extends CI_Model{
   
	
	function get_data(){
		$this->db->select('*');
		// $this->db->where('popular_subjects','1');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_faq_topics');
		$result = $query->result();
		return $result;

	}
	function add_data($data){
		 $this->db->insert('tbl_faq_topics',$data);
		//echo $this->db->last_query();die;
		return $this->db->insert_id(); 
	}

	function get_data_by_id($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_faq_topics');
		$result = $query->result();
		return $result;

	}
	function edit_data($data,$id){
		if(!empty($data))
			{
			 $this->db->where('id',$id);
             $this->db->update('tbl_faq_topics', $data);
			 return $this->db->affected_rows();
			}
		}

		public function delete_row_data($id) {
	      $this->db->where('id', $id);
	      $this->db->delete('tbl_faq_topics');
	    } 
}
?>