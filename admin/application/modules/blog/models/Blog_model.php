<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Blog_model extends CI_Model{
   
	
	function get_data(){
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_blog');
		$result = $query->result();
		return $result;

	}
	function add_data($data){
		$this->db->insert('tbl_blog',$data);
		return $this->db->insert_id(); 
	}

	function get_data_by_id($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_blog');
		$result = $query->result();
		return $result;

	}
	function edit_data($data,$id){
		if(!empty($data))
			{
			 $this->db->where('id',$id);
             $this->db->update('tbl_blog', $data);
			 return $this->db->affected_rows();
			}
		}

		public function delete_row_data($id) {
	      $this->db->where('id', $id);
	      $this->db->delete('tbl_blog');
	    } 

	    public function get_usertype(){
	    $this->db->select('*');
		$query = $this->db->get('tbl_usertype');
		$result = $query->result();
		return $result;

	    }

	    public function get_blog_category(){
	    $this->db->select('*');
	    $query = $this->db->get('tbl_blog_category');
		$result = $query->result();
		return $result;

	    }

	    public function get_userTypeblog_category($usertype){
	    $this->db->select('*');
	    $this->db->where('user_type_id', $usertype);
	    $query = $this->db->get('tbl_blog_category');
		$result = $query->result();
		return $result;

	    }

	    public function get_related_blog($cat_id,$id){
	    $this->db->select('*');
	    $this->db->where('blog_cat_id', $cat_id);
	    $this->db->where('id!=', $id);
	    $query = $this->db->get('tbl_blog');
		$result = $query->result();
		return $result;

	    }

	    function get_cat_usertype_wise($usertype_id){
		$this->db->select('*');
		$this->db->where('user_type_id', $usertype_id);
		$query = $this->db->get('tbl_blog_category');
		$result = $query->result();
		return $result;
	}
	function get_blog_cat_wise($cat_id){
		$this->db->select('*');
		$this->db->where('blog_cat_id', $cat_id);
		$query = $this->db->get('tbl_blog');
	    $result = $query->result(); 
		return $result;
	}

	function edit_get_blog_cat_wise($cat_id,$id){
		$this->db->select('*');
		$this->db->where('blog_cat_id', $cat_id);
		$this->db->where('id!=', $id);
		$query = $this->db->get('tbl_blog');
		$result = $query->result();
		return $result;
	}
}
?>