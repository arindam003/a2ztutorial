<?php 
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Blog extends MX_Controller{

     public function __construct(){
        parent::__construct();
        $this->load->model('Blog_model');
        
     }

      public function index(){
          
         // $data['blogcat_data'] = $this->Blog_model->get_blogcat();
        

        $data['blogfeatured_data'] = $this->Blog_model->get_featured_data(); //tbl_blog
        $data['blogcat_data'] = $this->Blog_model->get_blogcat_data(); //tbl_blog_category
        $data['usertype_data'] = $this->Blog_model->get_usertype_data();

        $this->template->set('title','Blog');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('blog',$data);
      }

      public function students(){
        $blog_subcatslug= $this->uri->segment(3);
        $blog_slug= $this->uri->segment(4);
        // print_r($blog_subcatslug);
        // die;

        $data['students_catblog'] = $this->Blog_model->all_studentscatblog();
        $data['students_blog'] = $this->Blog_model->all_studentsblog();

        // echo '<pre>';
        // print_r($students_catblog);die; 
        if($blog_subcatslug){ 
            $dataclass['students_catblog'] = $this->Blog_model->all_studentscatblog();
            $dataclass['students_subcatblog'] = $this->Blog_model->all_studentsubcatblog($blog_subcatslug);

            $this->template->set('title','Blog');
            $this->template->set_layout('layout_main', 'front');
            $this->template->build('studentsubblog',$dataclass);
       }
       else{
            $this->template->set('title','Blog');
            $this->template->set_layout('layout_main', 'front');
            $this->template->build('studentsblog',$data);
       }
       if($blog_slug){
            
        $data['students_blogdetails'] = $this->Blog_model->studentblogdetails($blog_slug);
        
        
        $this->template->set('title','Blog');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('studentsblogdetails',$data);
    	}
       

      } 

      
      public function parents(){
        $blog_subcatslug= $this->uri->segment(3);
        $blog_slug= $this->uri->segment(4);
        $data['parents_blog'] = $this->Blog_model->all_parentblog();
        $data['parents_catblog'] = $this->Blog_model->all_parentcatblog();
         //  echo '<pre>';
         // print_r($parents_catblog);die;
        
        if($blog_subcatslug){

        $dataclass['parents_catblog'] = $this->Blog_model->all_parentcatblog();
        $dataclass['parents_subcatblog'] = $this->Blog_model->all_parentsubcatblog($blog_subcatslug);
        
        
        $this->template->set('title','Blog');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('parentsubblog',$dataclass);
        }
        else{
        
        $this->template->set('title','Blog');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('parentsblog',$data);
        
      }

       if($blog_slug){
            
        $data_class['parents_blogdetails'] = $this->Blog_model->parentblogdetails($blog_slug);
       
        $this->template->set('title','Blog');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('parentsblogdetails',$data_class);
    	}
    


  }

      

      public function tutors(){
        $blog_subcatslug= $this->uri->segment(3);
        $blog_slug= $this->uri->segment(4);;
        // print_r($blog_slug);
        // die;

        $data['tutors_catblog'] = $this->Blog_model->all_tutorscatblog();
        $data['tutors_blog'] = $this->Blog_model->all_tutorsblog();
       

         // echo '<pre>';
        // print_r($data['tutors_catblog']);die;
        if($blog_subcatslug){
        $dataclass['tutors_catblog'] = $this->Blog_model->all_tutorscatblog();
        $dataclass['tutors_subcatblog'] = $this->Blog_model->all_tutorsubcatblog($blog_subcatslug);
        
        
        $this->template->set('title','Blog');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('tutorsubblog',$dataclass);
        }
        else{
        
        $this->template->set('title','Blog');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('tutorsblog',$data);
        
      }
        if($blog_slug){
        $data['tutors_blogdetails'] = $this->Blog_model->tutorsblogdetails($blog_slug);
        
        $this->template->set('title','Blog');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('tutorsblogdetails',$data);
       }
     }


      



}


?>