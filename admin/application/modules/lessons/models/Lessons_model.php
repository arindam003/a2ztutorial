<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Lessons_model extends CI_Model{
   
	
	function get_data(){
		$this->db->select('*');
		$query = $this->db->get('tbl_lessons');
		$result = $query->result();
		return $result;

	}
	function add_data($data){
		$this->db->insert('tbl_lessons',$data);
		return $this->db->insert_id(); 
	}

	function get_data_by_id($id){
		$this->db->select('*');
		$this->db->where('less_id',$id);
		$query = $this->db->get('tbl_lessons');
		$result = $query->result();
		return $result;

	}
	function edit_data($data,$id){
		if(!empty($data))
			{
			 $this->db->where('less_id',$id);
             $this->db->update('tbl_lessons', $data);
			 return $this->db->affected_rows();
			}
		}

		public function delete_row_data($id) {
	      $this->db->where('less_id', $id);
	      $this->db->delete('tbl_lessons');
	    } 
}
?>