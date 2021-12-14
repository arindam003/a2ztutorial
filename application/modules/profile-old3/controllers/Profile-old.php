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

                $teachermail = $data['profile_data'][0]->email;
				$teacher = $data['profile_data'][0]->id;
                $slug_name= $data['profile_data'][0]->slug_name;

        if($this->input->server('REQUEST_METHOD') == 'POST'){ 
            $this->form_validation->set_rules('message', 'message', 'trim|required');
                    // student message insert 
                if($this->session->userdata('student_id')){ //echo 'hi';die;
                    $student['teacher_id'] = $teacher;
                    $student['user_id'] = $this->session->userdata('student_id');
                    $student['message'] = strip_tags($this->input->post('message'));

                if($this->form_validation->run()== TRUE){
                    $data_inserted = $this->Profile_model->add_data($student);

                if($data_inserted){
                $data['userdata'] =  $this->Profile_model->get_user($student['user_id']);
                $username = $data['userdata'][0]->name;
                $usermail = $data['userdata'][0]->email;

                // mail to  client
                $to = $teachermail;
               
                $subject = "Want to Talk ";
                $message = 'Name :'. $username .',<br>';
                $message .= 'Message :'. $student['message'].',<br>';
                $message .= "Thank You<br><br>";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
             
                $headers .= "From: <".$usermail.">" . "\r\n";
                mail($to,$subject,$message,$headers);

                 $this->session->set_flashdata('success_msg', 'Thank You ! We will get back soon.');
                 redirect(base_url('profile').'/'.$slug_name);
                			}
               		}else{
                             $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                             redirect('login');
                         } 
                    }
                    // else{
                    //     $this->session->set_flashdata('err_msg', 'Please Login First');
                    //     redirect('login');
                        
                    //    }



        // parent message insert 
        if($this->session->userdata('parent_id')){ 

                $parent['teacher_id'] = $teacher;
                $parent['user_id'] = $this->session->userdata('parent_id');
                $parent['message'] = strip_tags($this->input->post('message'));

                 if($this->form_validation->run()== TRUE){
                        $data_inserted = $this->Profile_model->add_data($parent);

                        if($data_inserted){
                $data['userdata'] =  $this->Profile_model->get_user($parent['user_id']);
                $username = $data['userdata'][0]->name;
                $usermail = $data['userdata'][0]->email;

                // mail to  client
                $to = $teachermail;
               
                $subject = "Want to Talk to You";
                $message = 'Name :'. $username .',<br>';
                $message .= 'Message :'. $parent['message'].',<br>';
                $message .= "Thank You<br><br>";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
             
                $headers .= "From: <".$usermail.">" . "\r\n";
                mail($to,$subject,$message,$headers);

                 $this->session->set_flashdata('success_msg', 'Thank You ! We will get back soon.');
                 redirect(base_url('profile').'/'.$slug_name);
                			}
                       }else{
                     $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                    // redirect('login');
                 } 
        }else{
            $this->session->set_flashdata('err_msg', 'Please Login First');
            redirect('login');
           }
                    
 }
               

            $this->template->set('title','Profile');
            $this->template->set_layout('layout_main','front');
            $this->template->build('profile',$data);
        
    }
        
        
} 

?>