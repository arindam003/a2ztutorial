<?php 
//error_reporting(E_ALL & ~E_NOTICE);
//echo 'hi';die;
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

if (! defined('BASEPATH')) { exit('No direct script access allowed'); }

class Home extends MX_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->library('form_validation');
    }



      public function index(){
  //echo 'hi';die;

      // $subjects= strip_tags($this->input->post('subjects'));

      // $data['subject_data'] = $this->Home_model->get_subjects($subjects);


        $data['home_banner'] = $this->Home_model->get_homepage_banner();
        $data['home_page'] = $this->Home_model->get_pages_data();
        $data['faq_data'] = $this->Home_model->get_faq();
        $data['featured_data'] = $this->Home_model->get_fetured();
        $data['testimonials_data'] = $this->Home_model->get_testimonials();
        
        //echo '<pre>';print_r($data['testimonials_data']);die;



        $data['popularsubject_data'] = $this->Home_model->get_popularsubject();

        $data['allsubject_data'] = $this->Home_model->get_allsubject();

        
        $this->template->set('title','Home');

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('home',$data);

       

      }

       public function see_tutors(){
           
        $subjectname= $this->uri->segment(3);
         //print_r($subjectname);die;
        //$data['subjectteacher_numdata'] = $this->Home_model->get_subjectteacher_numrows($subjectname);
        $data['allsubjects_data'] = $this->Home_model->get_allsubjects();
        $data['subjectteacher_data'] = $this->Home_model->get_subjectteacher($subjectname); //te_list
         
        

       
        // echo '<pre>';
        // print_r($data['allsubjects_data']);die;

        $data['subjects_data'] = $this->Home_model->get_selectsubjects($subjectname);
        $data['levels_data'] = $this->Home_model->get_levels();
        $data['timing_data'] = $this->Home_model->get_timing();


        $this->template->set('title','See tutors');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('seetutors',$data);
       }

      



//sidbar filter 

      public function ajax_data(){



        // $subjectname = $this->input->post('sub_id');
        $subjectname = $this->input->post('sub_id');
         //$subjectname= $this->uri->segment(3);
        

        $lev_id = $this->input->post('lev_id');

        $gender = $this->input->post('checkboxes_gender');

        if($gender==TRUE){
              $findTutor_sub = $this->Home_model->gender_searching($gender);
             
            }
            elseif($subjectname==TRUE){
               $findTutor_sub = $this->Home_model->get_subjectteacher($subjectname);
            }
            // elseif($lev_id==TRUE){
            //    $findTutor_sub = $this->Home_model->level_searching($lev_id);
            // }
            else{
            $findTutor_sub = $this->Home_model->searching($subjectname,$lev_id,$gender);
            }

       echo  ' <section class="az-fat-tutors">
      <div class="container" id="findtutorSec">   
      <h2><span>'.count($findTutor_sub).'</span> Tutors Available</h2>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">';  
 foreach($findTutor_sub as $find2){ 

          $offered = json_decode($find2->subject_offered);  

            echo 

            ' 
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="az-fat-tutor-img"> '.'<img  src="'.base_url().'admin/uploads/teacher_image/'.$find2->image_src.'" >'.'</div>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
            <div class="az-fat-tutor-bio">
              <h3>'.$find2->teacher_name.'</h3>
              <h6>'.$find2->university.' - '. $find2->degree.'</h6>
              <div class="qualified-button">
                <p> </p>
              </div>
              <p class="qualified-button" style="color: #80bf1f;font-size : 80%;"> </p>
              <small>'.$find2->yourbio.'</small> <br> <br>
              <br>
               <p>Subjects: <span>' .

                               implode(' , ', $offered).

                            '</span>

                               

                            </p>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="az-fat-tutor-descr">
             <h6>£'.$find2->price.'<small>/ HR</small></h6>
              <p><span><i class="fas fa-star"></i></span>'.$find2->rating.'</p>
               <p><span><i class="fas fa-clipboard"></i></span>'.$find2->total_reviews.'<small>Reviews</small></p>
              <p><span><i class="fas fa-chalkboard-teacher"></i></span>'.$find2->total_session.'<small>Lessons Completed</small></p>
              <div class="az-fat-tutors-button">
                <button><a href="'.base_url('profile').'/'.$find2->slug_name.'">VIEW PROFILE</a> </button>
              </div>
            </div>
          </div>
        </div>';
         } // end foreach loop
        exit();
     echo'  </div>
    </div>
  </div>
</section>';

				

        } // end method



// main search

 public function teacher_data(){



        $subjects_id = $this->input->post('subjects_id');
        $subject_data = $this->Home_model->get_subjects($subjects_id);
        $teacherdata = $this->Home_model->get_teacher($subject_data[0]->id);

  foreach($teacherdata as $teacher){

  	//echo '<pre>';print_r($teacher);die;

             $offered = json_decode($teacher->subject_offered);  

            echo 

            '<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >

                <div class="row">

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">

                        <div class="az-fat-tutor-img">'.

                        '<img  src="'.base_url().'admin/uploads/teacher_image/'.$teacher->image_src.'" >'.

                           

                        '</div>

                        </div>

                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">

                            <div class="az-fat-tutor-bio">

                            <h3>'.$teacher->name.'</h3>

                            <h6>'.$teacher->university.' - '. $teacher->degree.'</h6>

                            <small>'.$teacher->yourbio.'</small> <br> <br>

                            <p>Subjects: <span>' .

                               implode(' , ', $offered).

                            '</span>

                               

                            </p>

                            </div>

                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

                            <div class="az-fat-tutor-descr">

                                <h6>£'.$teacher->price.'<small>/ HR</small></h6>

                                <p><span><i class="fas fa-star"></i></span>'.$teacher->rating.'</p>

                                <p><span><i class="fas fa-clipboard"></i></span>'.$teacher->total_reviews.'<small>Reviews</small></p>

                                <p><span><i class="fas fa-chalkboard-teacher"></i></span>'.$teacher->total_session.'<small>Lessons Completed</small></p>

                                <div class="az-fat-tutors-button">

                                <a href="'.base_url('profile').'/'.$teacher->slug_name.'">

                                    <button>

                                        VIEW PROFILE

                                    </button>

                                    </a>

                                </div>

                            </div> 

                        </div>

                       </div>

                        </div>'.

                    '</div>'; 

                  }  // end foreach loop

                exit();



      } // end method







}





?>