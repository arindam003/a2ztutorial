<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class Signup extends MX_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Signup_model');

        }
         public function index(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $data['name']= strip_tags($this->input->post('name'));
                $data['email']= strip_tags($this->input->post('email'));
                $data['phone']= strip_tags($this->input->post('phone'));
                //$data['password'] = strip_tags(($this->input->post('password')));
                $data['password'] = strip_tags(md5($this->input->post('password')));
                $data['usertype_id'] = strip_tags($this->input->post('usertype_id'));
                
              
                date_default_timezone_set('Europe/London');
                $data['added_on']=date('Y-m-d H:i:s');
               

                
                 $this->form_validation->set_rules('name', 'Name', 'trim|required');
                 $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                 $this->form_validation->set_rules('confirm_email', 'Confirm Mail', 'trim|required|matches[email]');
                $this->form_validation->set_rules('phone','phone','trim|required');
                $this->form_validation->set_rules('password','password','trim|required');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
                  
                 $this->form_validation->set_rules('usertype_id','usertype_id','trim|required');
                 
                //  echo '<pre>';
                // print_r($data); die;

                 $mailcheck = $this->Signup_model->mail_check($data['email'],$data['usertype_id']);

                 if(count($mailcheck) > 0) {
                    $this->session->set_flashdata('err_msg', 'Already Email Id exists'); 
                }else{

                 if($this->form_validation->run() == TRUE){  

                    
                    $data_inserted = $this->Signup_model->add_data($data);
                    
                    $this->session->set_flashdata('success_msg', 'Thank You !');
                    
                 }else{
                     $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                 } 

            } 
        }

            $data['usertype_data'] = $this->Signup_model->get_usertype();

            $this->template->set('title','Signup');
            $this->template->set_layout('layout_main','front');
            $this->template->build('signup',$data);
         }




    } 

?>