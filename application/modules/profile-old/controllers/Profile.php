<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class Profile extends MX_Controller{
        public function __construct(){
            parent::__construct();
             //is_logged_in();
            $this->load->library('form_validation');
            $this->load->model('Profile_model');

        }
        public function index(){
           
            $teacher_id = $this->uri->segment(2);
           

                $data['profile_data'] = $this->Profile_model->get_profile($teacher_id);
                $data['qualification_data'] = $this->Profile_model->get_qualification($teacher_id);
                $data['availability_data'] = $this->Profile_model->get_availability($teacher_id);

                $teacher = $data['profile_data'][0]->id;
                //echo $teacher;die;
                // echo '<pre>';
                // print_r($data['profile_data']);
                // echo $data['profile_data'][0]->id; die;

              
                
                
                if($this->input->server('REQUEST_METHOD') == 'POST'){
                  

                   $datainsert['teacher_id'] = $teacher;

                    $datainsert['user_id'] = $this->session->userdata('student_id');

                    $datainsert['user_id'] = $this->session->userdata('parent_id');

                    $datainsert['message'] = strip_tags($this->input->post('message'));

                        $this->form_validation->set_rules('message', 'message', 'trim|required');

                     if($this->form_validation->run()== TRUE){
                                if($datainsert['user_id']){
                                $data_inserted = $this->Profile_model->add_data($datainsert);
                                
                                $this->session->set_flashdata('success_msg', 'Thank You ! We will get back soon.');
                                    }


                                    else{
                                        $this->session->set_flashdata('err_msg', 'Please Login First');
                                        redirect('login');
                                       }
                        }
                        else{
                             $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                         } 
                   }
               

                $this->template->set('title','Profile');
                $this->template->set_layout('layout_main','front');
                $this->template->build('profile',$data);
            
        }
        
        
        



    } 

?>