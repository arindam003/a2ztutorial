<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Forgotpassword extends MX_Controller{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Forgotpassword_model');
    }



    public function index() {
       
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
           
            $email= $this->input->post('email');
            $token['user_token']= $this->input->post('user_token');
             $user_token = rand(1000,9999);


          
            $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
            
            if ($this->form_validation->run() == true) { 
                

                $num_rows = $this->Forgotpassword_model->mail_exists($email);
            
                 // token_time// database 
                if($num_rows > 0){
                   
                $update = $this->Forgotpassword_model->update_token($email,$user_token,$token_time);

                $user_details = $this->Forgotpassword_model->get_user_data($email);
                    

                $user_id =  base64_encode($user_details[0]->id);
                    // echo $user_id ; die;

                     
                    
                    // mail to me
                $this->load->library('email');

                //$to = $email;
                $to = $email;

                $subject = "Reset Password ";

                $message = 'Please click on Reset password link <a href=" '.base_url('forgotpassword/resetpass').'/'.$user_token.'">Reset Password</a>';
               

                //$message .= '<br>Token Number'.' : '.$user_token.',<br>';

              
                $message .= "Thank You For Contracting Reset Password<br><br>";


               

                // Always set content-type when sending HTML email

                $headers = "MIME-Version: 1.0" . "\r\n";

                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers  //jayanti.mahetechnologies@gmail.com //jayanti.mahe@gmail.com
                //$headers .= 'From: <info@a2ztutorials.co.uk>' . 

                $headers .= 'From: <jayanti.mahetechnologies@gmail.com>' . "\r\n";


                //$headers .= 'Cc: myboss@example.com' . "\r\n";

                mail($to,$subject,$message,$headers);


               
                $this->session->set_flashdata('success_msg', 'Reset password link send to your mail ID'); 
                     redirect(base_url().'forgotpassword');
                 }

                else{
                       $this->session->set_flashdata('err_msg', 'Email id not register');
                       redirect(base_url().'forgotpassword');
                    }
                         
                 
                }
                    
                        
            
        }
        $this->template->set('title','Forgot Password');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('forgotpassword');

      
}

public function resetpass(){
        $get_token= $this->uri->segment(3);
            //$user_id = base64_decode($get_id); // for mail use id wise
           //echo $user_id ; die;
        $token_timing = $this->Forgotpassword_model->token_timing($get_token);
        
        $token_time = $token_timing[0]->token_time; //

         $newtimestamp = strtotime($token_time.'+ 1 minutes');
         $endtime = date('Y-m-d', strtotime($newtimestamp)); //

        // $token_time= explode(" ", $token_time);
        // $date= $token_time[0];
        // $time1= $token_time[1];

        // $endtime = date('Y-m-d H:i:s', $newtimestamp); 
        // $start_time= explode(" ", $endtime);
        // $date= $start_time[0];
        // $time2= $start_time[1];



        // $token_time= explode(" ", $token_time);
        // $date= $token_time[0];
        // $time1= strtotime($token_time[1]);



        // $endtime = date('Y-m-d H:i:s', $token_time); 
        // $start_time= explode(" ", $endtime);
        // $date= $start_time[0];
        // $time2= strtotime($start_time[1]);


        //print_r($time2);die;
        

        //$mins = ($time2 - $time1) / 60;

        //$mins = ($time2 - $time1);


        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $data_user['password']= md5($this->input->post('password'));
            $confirm_password= md5($this->input->post('confirm_password'));


            $this->form_validation->set_rules('password', 'password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');


    if($this->form_validation->run() == TRUE){ 

        
        //if($endtime < $token_time){
        //if($mins > 10){
            //if($time2 < $time1){
        if(!$endtime){

            $this->session->set_flashdata('err_msg', 'Please before 10 minutes , Timing is expired !');
            redirect(base_url().'forgotpassword/resetpass');
            //redirect(base_url().'login');
            

        }else{
             $data_last_id = $this->Forgotpassword_model->update_data('tbl_signup',$data_user,$get_token);
            $this->session->set_flashdata('success_msg', 'Password has been changed Successfully login with your new password');
            redirect(base_url().'login');
        }



       
            
         }else{
             $this->session->set_flashdata('err_msg', 'Please Enter Confirm and New Password Correctly!');
             redirect(base_url().'forgotpassword/resetpass');
         } 

    }
        $this->template->set('title','Reset Password');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('resetpassword');

    }
   

    
    
    
}
?>