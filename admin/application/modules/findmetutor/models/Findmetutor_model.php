<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Findmetutor_model extends CI_Model{
   
	
/// tbl_findeme table respectively  
// public function get_data(){	
// 	$this->db->select('tbl_findeme.*');
// 	$this->db->select('tbl_goal.*');
// 	$this->db->select('tbl_lessons.*');
// 	$this->db->select('tbl_spend.*');
	
// 	$this->db->from('tbl_findeme'); 
// 	$this->db->join('tbl_goal', 'tbl_findeme.goal_id = tbl_goal.go_id', 'INNER');
// 	$this->db->join('tbl_lessons', 'tbl_findeme.lessons_id = tbl_lessons.less_id', 'INNER');
// 	$this->db->join('tbl_spend', 'tbl_findeme.spend_id = tbl_spend.sp_id', 'INNER');
// 	//$this->db->where('tbl_findeme.status','1');
// 	$this->db->order_by('tbl_findeme.find_id','desc');
// 	$query = $this->db->get();
// 	return $query->result();
// }

public function get_data(){
	$this->db->select('*');
	$this->db->order_by('find_id','desc');
	$query = $this->db->get('tbl_findeme');
	$result = $query->result();
	return $result;

}

public function view_findmerequest($id){
	$this->db->select('*');
	$this->db->where('find_id',$id);
	$query = $this->db->get('tbl_findeme');
	$result = $query->result();
	return $result;
}

// public function view_findmerequest($id){
// 	$this->db->select('tbl_subjects.*');
// 	$this->db->select('tbl_subjects.name as sub_name');
// 	$this->db->select('tbl_levels.*');
// 	$this->db->select('tbl_levels.name as lev_name');
// 	$this->db->select('tbl_findeme.*');
// 	$this->db->select('tbl_goal.*');
// 	//$this->db->select('tbl_goal.name as lev_name');
// 	$this->db->select('tbl_lessons.*');
// 	$this->db->select('tbl_spend.*');
	
	
// 	$this->db->from('tbl_findeme'); 
// 	$this->db->join('tbl_subjects', 'tbl_findeme.subjects_id = tbl_subjects.id', 'INNER');
// 	$this->db->join('tbl_levels', 'tbl_findeme.levels_id = tbl_levels.id', 'INNER');
// 	$this->db->join('tbl_goal', 'tbl_findeme.goal_id = tbl_goal.go_id', 'INNER');
// 	$this->db->join('tbl_lessons', 'tbl_findeme.lessons_id = tbl_lessons.less_id', 'INNER');
// 	$this->db->join('tbl_spend', 'tbl_findeme.spend_id = tbl_spend.sp_id', 'INNER');

// 	$this->db->where('tbl_findeme.find_id',$id);
// 	$query = $this->db->get();
// 	return $query->result();

// }

	//update data (delete only browser...but have to database )display if active 
	// public function update_data($data,$id) {
	// 	if(!empty($data))
	// 		{
 //      	$this->db->where('find_id', $id);

 //     	$this->db->update('tbl_findeme',$data);
 //     	//echo $this->db->last_query(); die;
	//   	return $this->db->affected_rows();
 //    	} 
	// }



	
	public function delete_row_data($id) {
	      $this->db->where('find_id', $id);
	      $this->db->delete('tbl_findeme');
	    } 
	
	
	
	

	




		
}
?>