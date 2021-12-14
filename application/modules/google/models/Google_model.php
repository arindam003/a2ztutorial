<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Google_model extends CI_Model{
	function mail_check($email,$usertype_id){
			$this->db->select('id');
		    $this->db->where('email', $email);
		    $this->db->where('usertype_id', $usertype_id);
		    $query = $this->db->get('tbl_signup');
		    if($usertype_id == '1'){
				$result = $query->result();
				return $result;
			}elseif($usertype_id == '2'){
				$result = $query->result();
				return $result;

			}else{
				$result = $query->result();
				return $result;
			}
		}
   
	
	function get_data(){
		$this->db->select('*');
		$this->db->where('usertype_id','1');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_signup');
		$result = $query->result();
		return $result;

	}
	function add_data($data){
		$this->db->insert('tbl_signup',$data);
		//echo $this->db->last_query(); die;
		return $this->db->insert_id(); 

	}
	function get_data_by_id($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_signup');
		$result = $query->result();
		return $result;
	}

	function get_usertype(){
		$this->db->select('*');
		$query = $this->db->get('tbl_usertype');
		$result = $query->result();
		return $result;

	}
	
	function edit_data($data,$id){
		if(!empty($data)){   
		$this->db->where('id',$id);
		$this->db->update('tbl_signup',$data);
        return $this->db->affected_rows();
		}
	}

	public function delete_row_data($id) {
	      $this->db->where('id', $id);
	      $this->db->delete('tbl_signup');
	    } 



		
}
?>