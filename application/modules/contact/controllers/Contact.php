<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class Contact extends MX_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Contact_model');
            //$this->load->library('email');

        }
         public function index(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $data['name']= strip_tags($this->input->post('name'));
                $data['email']= strip_tags($this->input->post('email'));
                $data['message']= strip_tags($this->input->post('message'));
                date_default_timezone_set('Europe/London');

                 $data['added_on']=date('Y-m-d H:i:s');
                //$data['added_on']=date('d/m/Y ');

                //echo date('d/m/Y ');

                 $this->form_validation->set_rules('name', 'Name', 'trim|required');
                 $this->form_validation->set_rules('email', 'Email', 'trim|required');
                 $this->form_validation->set_rules('message', 'Message', 'trim|required');

                 if($this->form_validation->run()== TRUE){
                    $data_inserted = $this->Contact_model->add_data($data);

                    // $from_email = "jayanti.mahetechnologies@gmail.com";
                   
                    //$this->load->library('email');

                    // $this->email->from('info@a2ztutorials.co.uk', 'A2Ztutorials');
                    // $this->email->to($data['email']);

                    // // $this->email->cc('another@another-example.com');
                    // // $this->email->bcc('them@their-example.com');

                    // $this->email->subject('Email Test');
                    // $this->email->message('Testing the email class.');

                    // $this->email->send();


                // mail to me
                $to = $data['email'];

                $subject = "Contact Request";

                $message = 'Dear '.$data['name'].',<br>';

                

                $message .= $data['message'].',<br>';
                $message .= "Thanks for your Contact<br><br>";


                $message .= "Regards,<br>"."A2Ztutorials";

                // Always set content-type when sending HTML email

                $headers = "MIME-Version: 1.0" . "\r\n";

                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers

                $headers .= 'From: <info@a2ztutorials.co.uk>' . "\r\n";


                //$headers .= 'Cc: myboss@example.com' . "\r\n";

                mail($to,$subject,$message,$headers);

               
                // mail to  client
                
                $to = "info@a2ztutorials.co.uk";
               
                $subject = "Contact Request";

                $message = 'Name : '.$data['name'].',<br>';
                $message .= 'Email :'.$data['email'].',<br>';

                //$message = $data['name'].',<br>';

                $message .= $data['message'].',<br>';

                $message .= "Thank You<br><br>";

                $message .= "Regards,<br>".$data['name'];

                // Always set content-type when sending HTML email

                $headers = "MIME-Version: 1.0" . "\r\n";

                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers

                
               
                 $headers .= "From: <".$data['email'].">" . "\r\n";

                //$headers .= 'Cc: myboss@example.com' . "\r\n";

                mail($to,$subject,$message,$headers);

               


                    $this->session->set_flashdata('success_msg', 'Thank You ! We will get back soon.');
                 }else{
                     $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                 }  
            }


            $this->template->set('title','Contact');
            $this->template->set_layout('layout_main','front');
            $this->template->build('contact',$data);
         }




    } 

?>