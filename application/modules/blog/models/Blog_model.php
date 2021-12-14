<?php 
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Blog_model extends CI_Model{

 // featured  
 
 function get_featured_data(){
        $this->db->select('*');
        $this->db->where('featured','1');
        $this->db->order_by('id','desc');
        $query = $this->db->get('tbl_blog');
        $result = $query->result();
        return $result;

    }  
    function get_blogcat_data(){
        $this->db->select('*');
        $this->db->where('status','1');
        $query = $this->db->get('tbl_blog_category');
        $result = $query->result();
        return $result;

    } 
    public function get_usertype_data(){
        $this->db->select('*');
        $query = $this->db->get('tbl_usertype');
        $result = $query->result();
        return $result;

        }

// student

function all_studentscatblog(){
    $this->db->select('*');
    $this->db->where('user_type_id','1');
    $this->db->where('status','1');
    $query = $this->db->get('tbl_blog_category');
    $result = $query->result();
    return $result;
   }
   
function all_studentsblog(){
    $this->db->select('*');
    $this->db->where('user_type_id','1');
    $query = $this->db->get('tbl_blog');
    $result = $query->result();
    return $result;
}
function all_studentsubcatblog($blog_subcatslug){
    $this->db->select('tbl_blog_category.*');
    $this->db->select('tbl_blog.*');
    $this->db->from('tbl_blog');
    $this->db->join('tbl_blog_category','tbl_blog.blog_cat_id=tbl_blog_category.id','INNER');
    $this->db->where('tbl_blog_category.user_type_id','1');
    $this->db->where('tbl_blog_category.slug',$blog_subcatslug);
    $query = $this->db->get();
    //echo $this->db->last_query();die;
    return $query->result();
   }
 

  function studentblogdetails($blog_slug){
    $this->db->select('*');
    $this->db->where('user_type_id','1');
    $this->db->where('blog_slug',$blog_slug);
    $query = $this->db->get('tbl_blog');
    $result = $query->result();
    return $result;
   }

   // end student     

// parent 
	
function all_parentblog(){
    $this->db->select('*');
    $this->db->order_by('id','desc');
    $this->db->where('user_type_id','2');
    $this->db->where('status','1');
    $query = $this->db->get('tbl_blog');
    $result = $query->result();
    return $result;
   }
   function all_parentcatblog(){
    $this->db->select('*');
    $this->db->where('user_type_id','2');
    $this->db->where('status','1');
    $query = $this->db->get('tbl_blog_category');
    $result = $query->result();
    return $result;
   }
   function all_parentsubcatblog($blog_subcatslug){
    $this->db->select('tbl_blog_category.*');
    $this->db->select('tbl_blog.*');
    $this->db->from('tbl_blog');
    $this->db->join('tbl_blog_category','tbl_blog.blog_cat_id=tbl_blog_category.id','INNER');
    $this->db->where('tbl_blog_category.user_type_id','2');
    $this->db->where('tbl_blog_category.slug',$blog_subcatslug);
    $query = $this->db->get();
    //echo $this->db->last_query();die;
    return $query->result();
   }
  function parentblogdetails($blog_slug){
    $this->db->select('*');
    $this->db->where('user_type_id','2');
    $this->db->where('blog_slug',$blog_slug);

    // $this->db->order_by('id','desc');
    $query = $this->db->get('tbl_blog');
    $result = $query->result();
    return $result;
   }

   function get_data_by_id($id){
        $this->db->select('*');
        $this->db->where('id',$id);
        $query = $this->db->get('tbl_blog');
        $result = $query->result();
        return $result;

    }
   
  
// end parent  

// teacher
   function all_tutorscatblog(){
    $this->db->select('*');
    $this->db->where('user_type_id','3');
    $query = $this->db->get('tbl_blog_category');
    $result = $query->result();
    return $result;
   }

function all_tutorsblog(){
    $this->db->select('*');
    $this->db->where('user_type_id','3');
    $query = $this->db->get('tbl_blog');
    $result = $query->result();
    return $result;
   }
   function all_tutorsubcatblog($blog_subcatslug){
    $this->db->select('tbl_blog_category.*');
    $this->db->select('tbl_blog.*');
    $this->db->from('tbl_blog');
    $this->db->join('tbl_blog_category','tbl_blog.blog_cat_id=tbl_blog_category.id','INNER');
    $this->db->where('tbl_blog_category.user_type_id','3');
    $this->db->where('tbl_blog_category.slug',$blog_subcatslug);
    $query = $this->db->get();
    //echo $this->db->last_query();die;
    return $query->result();
   }

   // function all_tutorsubcatblog($blog_subcatslug){
   //  $this->db->select('*');
   //  $this->db->where('user_type_id','3');
   //  $this->db->where('slug',$blog_subcatslug);
   //  $query = $this->db->get('tbl_blog_category');
   //  $result = $query->result();
   //  return $result;
   // }
function tutorsblogdetails($blog_slug){
    $this->db->select('*');
    $this->db->where('user_type_id','3');
    $this->db->where('blog_slug',$blog_slug);
    $query = $this->db->get('tbl_blog');
    $result = $query->result();
    return $result;
   }

 // end teacher    

// function all_blogdetails(){
//     $this->db->select('tbl_blog.*');
//     $this->db->select('tbl_blog_category.*');
//     $this->db->from('tbl_blog');
//     $this->db->join('tbl_blog_category','tbl_blog.blog_cat_id=tbl_blog_category.id','INNER');
//     $query = $this->db->get();
//     //echo $this->db->last_query();die;
//     return $query->result();
//    }






	

//  function all_parentcatblog($catname){
    
   //  $this->db->select('tbl_blog.*');
   //  $this->db->select('tbl_blog_category.*');
   //  //$this->db->select('tbl_usertype.*');
   //  $this->db->from('tbl_blog');
   //  //$this->db->join('tbl_usertype','tbl_blog_category.user_type_id=tbl_usertype.type_id','INNER');
   //  $this->db->join('tbl_blog_category','tbl_blog.blog_cat_id=tbl_blog_category.id','INNER');
   //  //$this->db->where('tbl_usertype.type_slug',$catname);
   //  $query = $this->db->get();
   //  //echo $this->db->last_query();die;
   //  return $query->result();
   // }


}
?>