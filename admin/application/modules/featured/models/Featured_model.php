<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Featured_model extends CI_Model{
   
	
	function get_data(){
		$this->db->select('*');
		$query = $this->db->get('tbl_featured');
		$result = $query->result();
		return $result;

	}
	function add_featured_image($data){
		$this->db->insert('tbl_featured',$data);
		return $this->db->insert_id(); 
	}

	function get_data_by_id($id){
		$this->db->select('*');
		$this->db->where('featured_id',$id);
		$query = $this->db->get('tbl_featured');
		$result = $query->result();
		return $result;

	}
	function edit_featured($data,$id){
		if(!empty($data))
			{
			 $this->db->where('featured_id',$id);
             $this->db->update('tbl_featured', $data);
			 return $this->db->affected_rows();
			}
		}

		public function delete_row_data($id) {
	      $this->db->where('featured_id', $id);
	      $this->db->delete('tbl_featured');
	    } 
}
?>