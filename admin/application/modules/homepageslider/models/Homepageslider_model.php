<?php
 if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

	class Homepageslider_model extends CI_Model{


		function add_slider_image($data){
		 if(!empty($data))
			{
		     $this->db->insert('homepage_banner',$data);
		     return $this->db->insert_id();
			}
  		}

  		function get_slider_image(){
		 $this->db->select('*');
		 $query = $this->db->get('homepage_banner');
		 $result = $query->result();
		 return $result;
		}
		
		function get_slider_by_id($id) {
		 $this->db->select('*');
     
		 $this->db->where('slide_id', $id);
		 $query = $this->db->get('homepage_banner');
		 $result = $query->result();
		 return $result;
	
  		}

  		function edit_slider_image($data,$id){
		if(!empty($data))
			{
			 $this->db->where('slide_id',$id);
             $this->db->update('homepage_banner', $data);
			 return $this->db->affected_rows();
			}
		}

		public function delete_row_data($id){
		  $this->db->where('slide_id', $id);
		  $this->db->delete('homepage_banner');
  		}	





	}
	

?>