<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class How_it_works_model extends CI_Model{
   
	
	function get_data(){
		$this->db->select('*');
		$query = $this->db->get('tbl_how_it_works');
		$result = $query->result();
		return $result;

	}
	function add_how_it_works($data){
		$this->db->insert('tbl_how_it_works',$data);
		return $this->db->insert_id(); 
	}

	function get_data_by_id($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_how_it_works');
		$result = $query->result();
		return $result;

	}
	function edit_how_it_works($data,$id){
		if(!empty($data))
			{
			 $this->db->where('id',$id);
             $this->db->update('tbl_how_it_works', $data);
			 return $this->db->affected_rows();
			}
		}

		public function delete_row_data($id) {
	      $this->db->where('id', $id);
	      $this->db->delete('tbl_how_it_works');
	    } 
}
?>