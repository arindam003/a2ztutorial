<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Subjectmap_model extends CI_Model{
   
	
	function add_data($data){
		
		$this->db->insert('tbl_subject_map',$data);
		return $this->db->insert_id(); 
	}

public function get_data(){	
	$this->db->select('tbl_signup.*');	
	$this->db->select('tbl_signup.name AS teacher_name');
	$this->db->select('tbl_subjects.name AS subject_name');
	$this->db->select('tbl_subject_map.*');
	
	$this->db->from('tbl_subject_map'); 
	$this->db->join('tbl_subjects', 'tbl_subject_map.subject_id = tbl_subjects.id', 'INNER');
	$this->db->join('tbl_signup', 'tbl_subject_map.teacher_id = tbl_signup.id', 'INNER');
	$this->db->order_by('tbl_subject_map.map_id','desc');
	$query = $this->db->get();
	return $query->result();

	}


	function check_subjectmap($teacher_id,$subject_id){
		$this->db->select('*');
		$this->db->where('teacher_id',$teacher_id);
		$this->db->where('subject_id',$subject_id);
		
		$query = $this->db->get('tbl_subject_map');
		$result = $query->result();
		return $result;
	}


	function get_subjects(){
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_subjects');
		$result = $query->result();
		return $result;
	}


	function get_teacher(){
		$this->db->select('*');
		$this->db->where('usertype_id','3');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_signup');
		$result = $query->result();
		return $result;

	}

	public function delete_row_data($map_id){
      $this->db->where('map_id', $map_id);

      $this->db->delete('tbl_subject_map');

    } 




		
}
?>