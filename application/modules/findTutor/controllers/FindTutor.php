<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class FindTutor extends MX_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('FindTutor_model');
            $this->load->library('pagination');
           
        }

        public function index(){
        
          $data['findtu']= $this->FindTutor_model->num_rows();
          
          $config['base_url'] = base_url('findTutor');
          $config["total_rows"] = $this->FindTutor_model->num_rows();
          $config['per_page'] = 4;
          $config["num_links"] = 2;
          $config["use_page_numbers"] = TRUE;
          $config["page_query_string"] = TRUE;

          if(($this->input->get('per_page')==TRUE)){
                $page_number = $this->input->get('per_page');
              
              }else{
                $page_number = 1;
             }
            
             $offset = ($page_number - 1)*$config["per_page"];

             $this->pagination->initialize($config);

            $data['findTutor_data'] = $this->FindTutor_model->get_allteacher($config['per_page'],$offset);

        $data['pages_data'] = $this->FindTutor_model->get_pages();
        $data['subjects_data'] = $this->FindTutor_model->get_subjects();
        $data['levels_data'] = $this->FindTutor_model->get_levels();
        $data['timing_data'] = $this->FindTutor_model->get_timing();

           

        $this->template->set('title','FindTutor');
        $this->template->set_layout('layout_main','front');
        $this->template->build('findTutor',$data);
    }



        
        public function ajax_data(){
          
            $sub_id = $this->input->post('sub_id');
            $lev_id = $this->input->post('lev_id');
            $gender = $this->input->post('checkboxes_gender');
            //echo $gender;die;
            // $timing = $this->input->post('timing');
            // $days = $this->input->post('days');

            

          if($gender==TRUE){
              $findTutor_sub = $this->FindTutor_model->gender_searching($gender);
              
            }elseif($sub_id==TRUE){
               $findTutor_sub = $this->FindTutor_model->subject_searching($sub_id);
            }
            
            else{
            $findTutor_sub = $this->FindTutor_model->searching($sub_id,$lev_id,$gender);
            }

        // if($lev_id==TRUE){
        //        $findTutor_sub = $this->FindTutor_model->level_searching($lev_id);
               
        //     }
           
        echo  '<h2><span>'.count($findTutor_sub).'</span> Tutors Available</h2>';
           
        foreach($findTutor_sub as $find2){ 
          $offered = json_decode($find2->subject_offered);  
            echo 
            ' <div class="row" >
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="az-fat-tutor-img">'.
                        '<img  src="'.base_url().'admin/uploads/teacher_image/'.$find2->image_src.'" >'.
                           
                        '</div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                            <div class="az-fat-tutor-bio">
                            <h3>'.$find2->teacher_name.'</h3>
                            <h6>'.$find2->university.' - '. $find2->degree.'</h6>
                            <small>'.$find2->yourbio.'</small> <br> <br>
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
                                    <button><a href="'.base_url('profile').'/'.$find2->slug_name.'">VIEW PROFILE</a>

                                      
                                    </button>
                                </div>
                            </div> 
                        </div>
                       </div>
                        </div></div></div>';
                   
                   } // end foreach loop
          exit();

        } // end method

    } 

?>