<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class BecometutorMid_model extends CI_Model{
   
	
	function get_data(){
		$this->db->select('*');
		$query = $this->db->get('tbl_becometutor');
		$result = $query->result();
		return $result;

	}
	function add_image($data){
		$this->db->insert('tbl_becometutor',$data);
		return $this->db->insert_id(); 
	}

	function get_data_by_id($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_becometutor');
		$result = $query->result();
		return $result;

	}
	function edit_data($data,$id){
		if(!empty($data))
			{
			 $this->db->where('id',$id);
             $this->db->update('tbl_becometutor', $data);
			 return $this->db->affected_rows();
			}
		}

		public function delete_row_data($id) {
	      $this->db->where('id', $id);
	      $this->db->delete('tbl_becometutor');
	    } 
}
?>