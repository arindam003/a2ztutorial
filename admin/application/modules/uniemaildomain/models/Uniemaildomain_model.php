<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Uniemaildomain_model extends CI_Model{
 
	
	function get_data(){
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_uni_emaildomain');
		$result = $query->result();
		return $result;

	}
	function get_university(){
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_university');
		$result = $query->result();
		return $result;

	}

	function add_data($data){
		$this->db->insert('tbl_uni_emaildomain',$data);
		return $this->db->insert_id(); 
	}

	function get_data_by_id($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_uni_emaildomain');
		$result = $query->result();
		return $result;

	}
	function edit_data($data,$id){
		if(!empty($data))
			{
			 $this->db->where('id',$id);
             $this->db->update('tbl_uni_emaildomain', $data);
			 return $this->db->affected_rows();
			}
		}

		public function delete_row_data($id) {
	      $this->db->where('id', $id);
	      $this->db->delete('tbl_uni_emaildomain');
	    } 
}
?>