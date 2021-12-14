<?php 
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Reviews_model extends CI_Model{

	


	// function get_testimonials($limit,$offset){
 //    $this->db->order_by('tbl_testimonials.id','desc');
	// 	$this->db->limit($limit,$offset);
	//   $query = $this->db->get('tbl_testimonials');
	//   $result = $query->result();
	//   return $result;
 //   }

//   function get_testimonials($limit,$offset){
//   $this->db->select('tbl_signup.*');
//   $this->db->select('tbl_testimonials.*');
//   $this->db->select('tbl_signup.name as sign_name');
//   $this->db->select('tbl_usertype.*');
//   $this->db->from('tbl_testimonials');
//   $this->db->join('tbl_signup', 'tbl_testimonials.sender_id = tbl_signup.id', 'INNER'); 
//   $this->db->join('tbl_usertype', 'tbl_signup.usertype_id=tbl_usertype.type_id', 'INNER');
//   //$this->db->where('tbl_testimonials.status','1'); 
//   $this->db->order_by('tbl_testimonials.id','desc');
//   $this->db->limit($limit,$offset);
//   $query = $this->db->get();
//   //echo $this->db->last_query(); die;
//   $result = $query->result();
//   return $result;

// }

function get_testimonials(){
  $this->db->select('tbl_signup.*,tbl_signup.image_src as signup_image');
  $this->db->select('tbl_testimonials.*,tbl_testimonials.image_src as test_image');
  $this->db->select('tbl_signup.name as sign_name');
  $this->db->select('tbl_usertype.*');
  $this->db->from('tbl_testimonials');
  $this->db->join('tbl_signup', 'tbl_testimonials.sender_id = tbl_signup.id', 'INNER'); 
  $this->db->join('tbl_usertype', 'tbl_signup.usertype_id=tbl_usertype.type_id', 'INNER');
  //$this->db->where('tbl_testimonials.status','1'); 
  $this->db->order_by('tbl_testimonials.id','desc');
  //$this->db->limit($limit,$offset);
  $query = $this->db->get();
  //echo $this->db->last_query(); die;
  $result = $query->result();
  return $result;

}

   public function num_rows(){
   		$query = $this->db->get('tbl_testimonials');
   		$result = $query->num_rows();
    	return $result;
   }

   public function get_subjects(){
        $this->db->select('*');
        $this->db->where('status', '1');
        $query = $this->db->get('tbl_subjects');
        $result = $query->result();
        return $result;
    }
    public function get_levels(){
        $this->db->select('*');
        $this->db->where('status', '1');
        $query = $this->db->get('tbl_levels');
        $result = $query->result();
        return $result;
    }



}



?>