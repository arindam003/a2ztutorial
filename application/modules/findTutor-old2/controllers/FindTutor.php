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
            
           // $data['findTutor_data'] = $this->FindTutor_model->get_findTutor();
        
            $data['findtu']= $this->FindTutor_model->num_rows();
           
            $config['base_url'] = base_url('findTutor/index');
            $config['per_page'] = 4;
            $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
            $config['total_rows'] = $this->FindTutor_model->num_rows();
            $config["uri_segment"] = 3;

            //$total_page = ceil($config['total_rows']/$config['per_page']);
 
            

            //echo $total_page;die;

            $this->pagination->initialize($config);
           

           // $data["links"] = $this->pagination->create_links();

         $data['findTutor_data'] = $this->FindTutor_model->get_allteacher($config['per_page'],$page);

            // parameter config,offset //testimonials_data
             // $data['findTutor_data'] = $this->FindTutor_model->get_allteacher($config['per_page'],$this->uri->segment(3));

          
 

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
            $timing = $this->input->post('timing');
            $days = $this->input->post('days');
           
          

            $findTutor_sub = $this->FindTutor_model->searching($sub_id,$lev_id);
            // echo count($findTutor_sub);
            //  die;

            $findTutor_sub = $this->FindTutor_model->searching_gender($gender);

            $findTutor_sub = $this->FindTutor_model->searching_timing($timing);

           

            $findTutor_sub = $this->FindTutor_model->searching_days($days);

            
            // echo '<pre>';
            //  print_r($findTutor_sub); 
            //  die; 
      
        foreach($findTutor_sub as $find2){ 
             
                // echo '<pre>';
                // print_r($find2); die; 
           // echo count($find2);die;

            // <h2><span>'. count($find2).'</span> Tutors Available</h2>
            
            // <div class="row" >
          
         $offered = json_decode($find2->subject_offered);  
            echo 
            '
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="az-fat-tutor-img">'.
                        '<img  src="'.base_url().'admin/uploads/teacher_image/'.$find2->image_src.'" >'.
                           
                        '</div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                            <div class="az-fat-tutor-bio">
                            <h3>'.$find2->name.'</h3>
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
                        </div>'.
                    '</div>
                   ';
                   
                   } // end foreach loop
           

         exit();

        } // end method

    } 

?>