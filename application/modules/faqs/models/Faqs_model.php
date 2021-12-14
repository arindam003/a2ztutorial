<?php 
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Faqs_model extends CI_Model{

	function get_faq(){
		$this->db->select('*');
		$this->db->where('status','1');
		$query = $this->db->get('tbl_faq');

		$result = $query->result();
		return $result;
	}
	
   
 //   function get_faqtopics(){
	// 	$this->db->select('*');
	// 	$this->db->where('status','1');
	// 	$query = $this->db->get('tbl_faq_topics');

	// 	$result = $query->result();
	// 	return $result;
	// }


}
?>