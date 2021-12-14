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
             //$user_token = rand(1000,9999);
            $user_token = rand(100000, 999999); 
            $user_data = $this->Forgotpassword_model->mail_exists($email);
             
          
            $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
            
            if ($this->form_validation->run() == true) { 
                
              date_default_timezone_set('Europe/London');
                $token_time = date('h:i:s');
              
            if($user_data > 0){
              
                $update = $this->Forgotpassword_model->update_token($email,$user_token,$token_time);

                   
                $this->load->library('email');
                $to = $email;

                $subject = "Reset Password Link";
                $message = 'Hi <br><br>'
                          .'Your reset password request has been received. Please click <br>'
                          .'the below link to reset your password.<br><br>'
                          .'<a href=" '.base_url('forgotpassword/resetpass').'/'.$user_token.'">Reset Password</a>'
                          .'Thanks For Contracting Reset Password<br>';

               
                // Always set content-type when sending HTML email

                $headers = "MIME-Version: 1.0" . "\r\n";

                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

               
                //$headers .= 'From: <info@a2ztutorials.co.uk>' . 

                $headers .= 'From: <jayanti.mahe@gmail.com>' . "\r\n";


        mail($to,$subject,$message,$headers);
        $this->session->set_flashdata('success_msg', 'Reset password link sent to your registred email. Please verify with in 10mins'); 
        redirect(base_url().'forgotpassword');
                   
           

                

        } else{
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
         // echo $get_token;die;
           
        $token_timing = $this->Forgotpassword_model->token_timing($get_token);
        // echo '<pre>';
        // print_r($token_timing); die;
        
        $token_time = $token_timing[0]->token_time; 
         // if($this->checkExpiryDate($token_timing['token_time'])){

        
        $token_time = strtotime($token_time); 
      //echo $token_time; die;

        date_default_timezone_set('Europe/London');
        $endtime = date('h:i:s');
        $endtime =strtotime($endtime);


        $diff = date_diff($token_time, $endtime);
        
        //$mins = (($endtime - $token_time)/60);

//echo  $sec; die;
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $data_user['password']= md5($this->input->post('password'));
            $confirm_password= md5($this->input->post('confirm_password'));


            $this->form_validation->set_rules('password', 'password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');


        if($this->form_validation->run() == TRUE){ 
     
         
          if($diff < 600){
          //if($mins < 10){
            $data_last_id = $this->Forgotpassword_model->update_data('tbl_signup',$data_user,$get_token);
            $this->session->set_flashdata('success_msg', 'Password has been changed Successfully login with your new password');
            redirect(base_url().'login');
              }else{
               $this->session->set_flashdata('err_msg', 'Reset password link was expired');
               redirect(base_url('forgotpassword'));
              }
      }
          else{
             $this->session->set_flashdata('err_msg', 'Please Enter Confirm and New Password Correctly!');
             redirect(base_url().'forgotpassword/resetpass');
         } 
          

     }

// }
// else{
//   $this->session->set_flashdata('err_msg', 'Reset password link was expired!');
//   redirect(base_url().'forgotpassword');
// }

        $this->template->set('title','Reset Password');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('resetpassword');

    }
   



   public function checkExpiryDate(){
        $get_token= $this->uri->segment(3);
        $token_timing = $this->Forgotpassword_model->token_timing($get_token);
        $token_time = $token_timing[0]->token_time; 

        $token_time = strtotime($token_time);

    date_default_timezone_set('Europe/London');
    $endtime = date('h:i:s');
    $endtime =strtotime($endtime);


        $timeDiff = $endtime - $token_time;
        if($timeDiff < 900){
           echo 'ok <br>';
        }
        else
        {
            echo 'not ok <br>';
        }
    }

 



    
}    

?>