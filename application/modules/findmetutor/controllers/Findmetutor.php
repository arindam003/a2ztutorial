<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class Findmetutor extends MX_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Findmetutor_model');
            

        }
        public function index(){
            
           

            // echo '<pre>';
            // print_r($data['allsubject_data']); die;

            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $data['subjects_name']= strip_tags($this->input->post('select2-single-box'));
                $data['levels_name']= strip_tags($this->input->post('level'));
                $data['goal_name']= strip_tags($this->input->post('goal'));
                $data['lessons_name']= strip_tags($this->input->post('lesson'));
                $data['spend_price']= strip_tags($this->input->post('price'));
                $data['pick_date']= strip_tags($this->input->post('date'));
                $data['pick_time']= strip_tags($this->input->post('time'));
                $data['gender']= strip_tags($this->input->post('gender'));
                $data['message']= strip_tags($this->input->post('anything-else'));

                $data['fullname']= strip_tags($this->input->post('fullname'));
                $data['email']= strip_tags($this->input->post('email'));
                $data['phone']= strip_tags($this->input->post('phone'));
                

                date_default_timezone_set('Europe/London');

                 $data['added_on']=date('Y-m-d H:i:s');
              
                // echo '<pre>';
                //  print_r($data);die;
                
                 //$this->form_validation->set_rules('message', 'Message', 'trim|required');
                 $this->form_validation->set_rules('fullname', 'fullname', 'trim|required');
                 $this->form_validation->set_rules('email', 'email', 'trim|required');
                 $this->form_validation->set_rules('phone', 'phone', 'trim|required');

                 if($this->form_validation->run()== TRUE){

                
                    $data_inserted = $this->Findmetutor_model->add_data($data);


                  // mail to me
                $to = $data['email'];

                $subject = "Find me Tutor Request";

               $message .= "Thank You sent Request<br><br>";

                // Always set content-type when sending HTML email

                $headers = "MIME-Version: 1.0" . "\r\n";

                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers

                // $headers .= 'From: <info@a2ztutorials.co.uk>' . "\r\n";//jayanti.mahetechnologies@gmail.com
               $headers .= 'From: <info@a2ztutorials.co.uk>' . "\r\n";


                //$headers .= 'Cc: myboss@example.com' . "\r\n";

                mail($to,$subject,$message,$headers);



                 // mail to  client
                $to = "info@a2ztutorials.co.uk";
               
                $subject = "Find me Tutor Request";

                $message = 'Name : '.$data['fullname'].',<br>';

                $message .= 'Email : '.$data['email'].',<br>';
                $message .= 'Phone : '.$data['phone'].',<br>';
                $message .= 'Subject : '.$data['subjects_name'].',<br>';
                $message .= 'Levels : '.$data['levels_name'].',<br>';
                $message .= 'Goal : '.$data['goal_name'].',<br>';
                $message .= 'Lessons : '.$data['lessons_name'].',<br>';
                $message .= 'Price : '.$data['spend_price'].',<br>';
                $message .= 'Pick Date : '.$data['pick_date'].',<br>';
                $message .= 'Pick Time : '.$data['pick_time'].',<br>';
                $message .= 'Gender : '.$data['gender'].',<br>';


                $message .= 'Message : '.$data['message'].',<br>';
                $message .= "Thank You <br><br>";
                // Always set content-type when sending HTML email

                $headers = "MIME-Version: 1.0" . "\r\n";

                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers

                
               
                 $headers .= "From: <".$data['email'].">" . "\r\n";

                //$headers .= 'Cc: myboss@example.com' . "\r\n";

                mail($to,$subject,$message,$headers);






                    $this->session->set_flashdata('success_msg', 'Thank You ! We will get back soon.');
                     redirect('findmetutor');
                 }else{
                     $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                      redirect('findmetutor');

                 }  
            }

            $data['allsubject_data'] = $this->Findmetutor_model->get_allsubject();
            $data['popularsubject_data'] = $this->Findmetutor_model->get_popularsubject();
            $data['levels_data'] = $this->Findmetutor_model->get_levels();

            $data['goal_data'] = $this->Findmetutor_model->get_goal();
            $data['lessons_data'] = $this->Findmetutor_model->get_lessons();
            $data['spend_data'] = $this->Findmetutor_model->get_spend();
           

            $this->template->set('title','Findmetutor');
            $this->template->set_layout('layout_main','front');
            $this->template->build('findmetutor',$data);
        }

    } 

?>