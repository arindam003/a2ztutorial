<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }
    // require_once('widgets/Widget.php');
    
    class Message extends MX_Controller{
        public function __construct(){
            
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Message_model');

        }

        public function index(){

        //echo 'hi';die;
        $data['message'] = $this->input->post('message');
        $data['user_id'] = $this->input->post('user_id');
        $data['teacher_id'] = $this->input->post('teacher_id');


        $dataclass['profile_data'] = $this->Message_model->get_user($data['teacher_id']);
        $teachermail = $dataclass['profile_data'][0]->email;


        //echo '<pre>';
        //print_r($data);die;
     
           $data_inserted = $this->Message_model->add_data($data);
           
          if($data_inserted){
               $msg['success'] = "Thank you"; 
                 $data['userdata'] =  $this->Message_model->get_user($data['user_id']);
                 $username = $data['userdata'][0]->name;
                 $usermail = $data['userdata'][0]->email;

                // mail to  client
                $to = $teachermail;
               
                $subject = "Want to Talk ";
                $message = 'Name :'. $username .',<br>';
                $message .= 'Message :'. $data['message'].',<br>';
                $message .= "Thank You<br><br>";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
             
                $headers .= "From: <".$usermail.">" . "\r\n";
                mail($to,$subject,$message,$headers);
                     

                   }
                   else{
                           
                          $msg['error'] = "error";
                        
                        }
               

             
    exit(json_encode($msg));
 }
  

}

?>
