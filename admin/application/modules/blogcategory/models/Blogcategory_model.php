<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Blogcategory_model extends CI_Model{
   
	
	function get_data(){
		$this->db->select('*');
		// $this->db->where('popular_subjects','1');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_blog_category');
		$result = $query->result();
		return $result;

	}
	function add_data($data){
		 $this->db->insert('tbl_blog_category',$data);
		//echo $this->db->last_query();die;
		return $this->db->insert_id(); 
	}

	function get_data_by_id($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_blog_category');
		$result = $query->result();
		return $result;

	}
	function edit_data($data,$id){
		if(!empty($data))
			{
			 $this->db->where('id',$id);
             $this->db->update('tbl_blog_category', $data);
			 return $this->db->affected_rows();
			}
		}

		public function delete_row_data($id) {
	      $this->db->where('id', $id);
	      $this->db->delete('tbl_blog_category');
	    }
	
	function get_user_type(){
		$this->db->select('*');
		//$this->db->where('popular_subjects','1');
		$this->db->order_by('type_id','desc');
		$query = $this->db->get('tbl_usertype');
		$result = $query->result();
		return $result;
	}     
}
?>