<?php 
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home_model extends CI_Model{

  public function get_selectsubjects($subjectname){
        $this->db->select('*');
        //$this->db->order_by('name','asc');
        $this->db->where('subject_slugname',$subjectname);
        $query = $this->db->get('tbl_subjects');
        $result = $query->result();
        return $result;
    }

  

  // sidebar filter

  public function get_allsubjects(){
        $this->db->select('*');
        $this->db->where('status','1');
        $query = $this->db->get('tbl_subjects');
        //echo  $this->db->last_query(); die;
        $result = $query->result();
        return $result;
    }

  public function get_levels(){
        $this->db->select('*');
        $this->db->where('status','1');
        $query = $this->db->get('tbl_levels');
        $result = $query->result();
        return $result;
    }
    public function get_timing(){
        $this->db->select('*');
        $this->db->where('status','1');
        $query = $this->db->get('tbl_timing');
        $result = $query->result();
        return $result;
    }

   ############################# search by gender ##############################
    function gender_searching($gender){
      $this->db->select('tbl_signup.*');
      $this->db->select('tbl_signup.name AS teacher_name');
      $this->db->from('tbl_signup');
      $this->db->where('tbl_signup.usertype_id','3');
      $this->db->where('tbl_signup.gender',$gender);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
     }

  public function get_subjectteacher($slugname){
    $this->db->select('tbl_signup.*');  
    $this->db->select('tbl_signup.name AS teacher_name');
    $this->db->select('tbl_subjects.name AS subject_name');
    $this->db->select('tbl_subject_map.*');
    $this->db->from('tbl_subject_map'); 
    $this->db->join('tbl_subjects', 'tbl_subject_map.subject_id = tbl_subjects.id', 'INNER');
    $this->db->join('tbl_signup', 'tbl_subject_map.teacher_id = tbl_signup.id', 'INNER');
    $this->db->where('tbl_signup.usertype_id','3');
    $this->db->where('tbl_subjects.subject_slugname',$slugname);
    $this->db->order_by('tbl_subject_map.map_id','desc');
    
    $query = $this->db->get();
   $result = $query->result();

    return $result;

  }

   

   ############################# total search ##############################   
  function searching($subjectname,$lev_id,$gender){
      $this->db->select('tbl_signup.*');
      $this->db->select('tbl_signup.name AS teacher_name');
      $this->db->select('tbl_subjects.*');
      $this->db->select('tbl_signup.id as sign_id');
      $this->db->from('tbl_qualifications AS qua');
      $this->db->join('tbl_signup', 'qua.teacher_id = tbl_signup.id', 'INNER');
      $this->db->join('tbl_subjects', 'qua.subject_id = tbl_subjects.id', 'INNER');
      $this->db->where('tbl_subjects.subject_slugname',$subjectname);
      $this->db->where('qua.levels_id',$lev_id);
      $this->db->where('tbl_signup.gender',$gender);
      $query = $this->db->get();
      //echo  $this->db->last_query(); die;
      $result = $query->result();
      return $result;
     }

      //function get_allteacher($limit,$offset){
     function get_allteacher(){
      $this->db->select('*');
      $this->db->where('usertype_id','3');
      $this->db->order_by('id','desc');
      //$this->db->limit($limit,$offset);
        $query = $this->db->get('tbl_signup');
       $result = $query->result();
        return $result;
      }
      public function num_rows(){
        $this->db->select('*');
       $this->db->where('usertype_id','3');
        $query = $this->db->get('tbl_signup');
        $result = $query->num_rows();
        
        return $result;
      }



  // end sidbar filter

  public function get_subjects($subjects_id){
    $this->db->select('*');
    $this->db->where('id',$subjects_id);
    $query = $this->db->get('tbl_subjects');
    //echo $this->db->last_query();die;
    $result = $query->result();
    return $result;
  }

  public function get_popularsubject(){
        $this->db->select('*');
        $this->db->where('popular_subjects','1');
        $query = $this->db->get('tbl_subjects');
        $result = $query->result();
        return $result;
    }

  public function get_allsubject(){
        $this->db->select('*');
        $this->db->order_by('name','asc');
        $this->db->where('popular_subjects','0');
        $query = $this->db->get('tbl_subjects');
        $result = $query->result();
        return $result;
    }


	function get_homepage_banner(){
		$this->db->select('*');
    $this->db->where('status','1');
		$query = $this->db->get('homepage_banner');
    $result = $query->result(); 
		return $result;
	}
	function get_pages_data(){
	    $this->db->select('*');
      $this->db->where('page_slug','home');
      $query = $this->db->get('pages_mng');
	    $result = $query->result();
      return $result;
   }

  function get_faq(){
   	$this->db->select('*');
    $this->db->where('status','1');
   	$query = $this->db->get('tbl_faq');
   	$result = $query->result();
   	return $result;
  }
   function get_fetured(){
     $this->db->select('*');
     $this->db->where('status','1');
     $query =$this->db->get('tbl_featured');
     $result = $query->result();
     return $result;
   }
   

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

public function get_teacher($id){
    $this->db->select('tbl_signup.*');  
    $this->db->select('tbl_signup.name AS teacher_name');
    //$this->db->select('tbl_subjects.name AS subject_name');
    //$this->db->select('tbl_subject_map.*');
    
    $this->db->from('tbl_subject_map'); 
    $this->db->join('tbl_subjects', 'tbl_subject_map.subject_id = tbl_subjects.id', 'INNER');
    $this->db->join('tbl_signup', 'tbl_subject_map.teacher_id = tbl_signup.id', 'INNER');
    $this->db->where('tbl_signup.usertype_id','3');
    $this->db->where('tbl_subjects.id',$id);
    $this->db->order_by('tbl_subject_map.map_id','desc');
    
    $query = $this->db->get();
    //$this->db->last_query();
    return $query->result();

  }


  

}
?>