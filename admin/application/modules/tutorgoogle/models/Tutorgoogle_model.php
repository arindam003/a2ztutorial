<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Tutorgoogle_model extends CI_Model{
	
   
	
	function get_data(){
		$this->db->select('*');
		$this->db->where('usertype_id','3');
		$this->db->order_by('id','desc');
		$query = $this->db->get('google_login');
		$result = $query->result();
		return $result;

	}

	function view_tutorgoogle($id){
		$this->db->select('google_login.*');
		$this->db->select('tbl_usertype.*');

		$this->db->from('google_login');
		$this->db->join('tbl_usertype', 'google_login.usertype_id=tbl_usertype.type_id', 'INNER'); 
		$this->db->where('google_login.usertype_id','3');
		$this->db->where('google_login.id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		$result = $query->result();
		return $result;

	}
	function get_usertype(){
		$this->db->select('*');
		$query = $this->db->get('tbl_usertype');
		$result = $query->result();
		return $result;
	}
	
	public function delete_row_data($id) {
	      $this->db->where('id', $id);
	      $this->db->delete('google_login');
	    } 



		
}
?>