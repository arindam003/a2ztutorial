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
       $teacher_id = $this->uri->segment(2); // teacher name
       
         $dataclass['profile_data'] = $this->Profile_model->get_profile($teacher_id);
         $dataclass['qualification_data'] = $this->Profile_model->get_qualification($teacher_id);
         $dataclass['availability_data'] = $this->Profile_model->get_availability($teacher_id);
         //echo '<pre>';print_r($dataclass['qualification_data']);die;
         //$teachermail = $data['profile_data'][0]->email;
        // $teacher = $data['profile_data'][0]->id;
        // $slug_name= $data['profile_data'][0]->slug_name;

       
               

        $this->template->set('title','Profile');
        $this->template->set_layout('layout_main','front');
        $this->template->build('profile',$dataclass);
        
    }

   

    public function message_insert(){

      die("ok");

    //echo 'hi';die;
        $data['message'] = $this->input->post('message');
        $data['user_id'] = $this->input->post('user_id');
        $data['teacher_id'] = $this->input->post('teacher_id');


        $dataclass['profile_data'] = $this->Profile_model->get_profile($data['teacher_id']);
        $teachermail = $dataclass['profile_data'][0]->email;


        echo '<pre>';
        print_r($data);die;
     
           // $data_inserted = $this->Profile_model->add_data($data);
           
         // if($data_inserted){
              // $msg['success'] = "Thank you"; 
                // $data['userdata'] =  $this->Profile_model->get_user($data['user_id']);
                // $username = $data['userdata'][0]->name;
                // $usermail = $data['userdata'][0]->email;

                //// mail to  client
                // $to = $teachermail;
               
                // $subject = "Want to Talk ";
                // $message = 'Name :'. $username .',<br>';
                // $message .= 'Message :'. $data['message'].',<br>';
                // $message .= "Thank You<br><br>";
                // $headers = "MIME-Version: 1.0" . "\r\n";
                // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // // More headers
             
                // $headers .= "From: <".$usermail.">" . "\r\n";
                // mail($to,$subject,$message,$headers);
                     

                   // }
                   // else{
                           
                      //     $msg['error'] = "error";
                        
                      //   }
               

             
     //echo json_encode($msg);   
     exit();       

      


    }

   
        
        
} 

?>