<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Contact_model extends CI_Model{
   
	
	function get_data(){
		$this->db->select('*');
		// $this->db->where('id',$id);
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_contact');
		$result = $query->result();
		return $result;

	}
	

		public function delete_row_data($id) {
	      $this->db->where('id', $id);
	      $this->db->delete('tbl_contact');
	    } 
}
?>